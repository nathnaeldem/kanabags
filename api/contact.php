<?php
// ================================================================
// KanaBags LLC – Contact Message Endpoint
// POST /api/contact.php
// ================================================================
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

require_once __DIR__ . '/config.php';

// ── Parse JSON Body ───────────────────────────────────────────────
$raw  = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid JSON payload.']);
    exit;
}

// ── Sanitise & Validate ───────────────────────────────────────────
function clean(string $v): string {
    return htmlspecialchars(strip_tags(trim($v)), ENT_QUOTES, 'UTF-8');
}

$name    = clean($data['name']    ?? '');
$email   = filter_var(trim($data['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$subject = clean($data['subject'] ?? '');
$message = clean($data['message'] ?? '');

$errors = [];
if (!$name)    $errors[] = 'Name is required.';
if (!$email)   $errors[] = 'A valid email address is required.';
if (!$subject) $errors[] = 'Subject is required.';
if (!$message) $errors[] = 'Message cannot be empty.';

if ($errors) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

// ── Insert into Database ──────────────────────────────────────────
try {
    $db = get_db();
    $stmt = $db->prepare("
        INSERT INTO contact_messages (name, email, subject, message)
        VALUES (:name, :email, :subject, :message)
    ");
    $stmt->execute(compact('name', 'email', 'subject', 'message'));
    $msg_id = $db->lastInsertId();

    // ── Send Notification Email ───────────────────────────────────
    $to      = ADMIN_EMAIL;
    $subj    = "[KanaBags] Contact Message #$msg_id – $subject";
    $body    = "New contact message received.\n\n"
             . "ID: #$msg_id\n"
             . "Name: $name\n"
             . "Email: $email\n"
             . "Subject: $subject\n\n"
             . "Message:\n$message\n";
    $headers = "From: noreply@kanabagsllc.net\r\nReply-To: $email";
    @mail($to, $subj, $body, $headers);

    echo json_encode([
        'success' => true,
        'id'      => $msg_id,
        'message' => 'Your message has been sent. We will reply within 24 hours.',
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error. Please try again later.']);
}
