<?php
// ================================================================
// KanaBags LLC – Order / RFP Submission Endpoint
// POST /api/order.php
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

$company_name     = clean($data['company_name']     ?? '');
$contact_name     = clean($data['contact_name']     ?? '');
$email            = filter_var(trim($data['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$phone            = clean($data['phone']            ?? '');
$product_type     = clean($data['product_type']     ?? '');
$monthly_volume   = clean($data['monthly_volume']   ?? '');
$lead_time        = clean($data['lead_time']        ?? '');
$cup_sizes        = clean($data['cup_sizes']        ?? '');
$lining           = clean($data['lining']           ?? '');
$request_sample   = !empty($data['request_sample']) ? 1 : 0;
$shipping_address = clean($data['shipping_address'] ?? '');
$notes            = clean($data['notes']            ?? '');

$errors = [];
if (!$company_name)   $errors[] = 'Company name is required.';
if (!$contact_name)   $errors[] = 'Contact name is required.';
if (!$email)          $errors[] = 'A valid corporate email is required.';
if (!$product_type)   $errors[] = 'Please select a product type.';
if (!$monthly_volume) $errors[] = 'Please select a monthly volume target.';
if ($request_sample && !$shipping_address) $errors[] = 'Shipping address is required for sample kits.';

if ($errors) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

// ── Insert into Database ──────────────────────────────────────────
try {
    $db = get_db();
    $stmt = $db->prepare("
        INSERT INTO orders
            (company_name, contact_name, email, phone, product_type,
             monthly_volume, lead_time, cup_sizes, lining, request_sample,
             shipping_address, notes)
        VALUES
            (:company_name, :contact_name, :email, :phone, :product_type,
             :monthly_volume, :lead_time, :cup_sizes, :lining, :request_sample,
             :shipping_address, :notes)
    ");
    $stmt->execute(compact(
        'company_name', 'contact_name', 'email', 'phone', 'product_type',
        'monthly_volume', 'lead_time', 'cup_sizes', 'lining', 'request_sample',
        'shipping_address', 'notes'
    ));
    $order_id = $db->lastInsertId();

    // ── Send Notification Email (optional – requires mail server) ─
    $to      = ADMIN_EMAIL;
    $subject = "[KanaBags] New Order RFP #$order_id – $company_name";
    $body    = "New enterprise inquiry received.\n\n"
             . "Order ID: #$order_id\n"
             . "Company: $company_name\n"
             . "Contact: $contact_name\n"
             . "Email: $email\n"
             . "Phone: $phone\n"
             . "Product: $product_type\n"
             . "Volume: $monthly_volume\n"
             . "Lead Time: $lead_time\n"
             . "Sample Requested: " . ($request_sample ? "Yes – $shipping_address" : "No") . "\n"
             . "Notes:\n$notes\n";
    $headers = "From: noreply@kanabagsllc.net\r\nReply-To: $email";
    @mail($to, $subject, $body, $headers);

    echo json_encode([
        'success'  => true,
        'order_id' => $order_id,
        'message'  => 'Your RFP has been submitted. We will contact you within 24 hours.',
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error. Please try again later.']);
}
