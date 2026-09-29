<?php
// ================================================================
// KanaBags LLC – Admin Orders Dashboard
// Access at: http://localhost/api/admin.php
// IMPORTANT: Secure this with a password in production!
// ================================================================

// Simple password protection — CHANGE THIS IN PRODUCTION
$admin_password = 'kanabags2026admin'; // <-- Change this!

session_start();

if (isset($_POST['password'])) {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['kb_admin'] = true;
    } else {
        $login_error = 'Invalid password.';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

$authenticated = !empty($_SESSION['kb_admin']);

if (!$authenticated): ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>KanaBags Admin Login</title>
<style>
body { background:#071a0f; color:#d4ecd9; font-family:Inter,sans-serif; display:flex; align-items:center; justify-content:center; min-height:100vh; margin:0; }
.box { background:#0e2218; border:1px solid rgba(61,179,107,.15); border-radius:16px; padding:2.5rem; width:360px; }
h2 { color:#6fdba0; margin-bottom:1.5rem; font-family:Outfit,sans-serif; }
input { width:100%; padding:.875rem; background:#132a1e; border:1px solid rgba(61,179,107,.2); border-radius:8px; color:#edf9f2; font-size:.95rem; margin-bottom:1rem; box-sizing:border-box; outline:none; }
button { width:100%; padding:1rem; background:linear-gradient(135deg,#25a864,#3cc97b); color:#fff; border:none; border-radius:10px; font-weight:700; font-size:1rem; cursor:pointer; }
.err { color:#ffb3b3; font-size:.88rem; margin-bottom:1rem; }
</style>
</head>
<body>
<div class="box">
  <h2>🌿 KanaBags Admin</h2>
  <?php if (!empty($login_error)): ?><div class="err">⚠️ <?= htmlspecialchars($login_error) ?></div><?php endif; ?>
  <form method="POST">
    <input type="password" name="password" placeholder="Admin password" required autofocus />
    <button type="submit">Login</button>
  </form>
</div>
</body>
</html>
<?php exit; endif;

require_once __DIR__ . '/config.php';
$db = get_db();

// Handle status updates
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $stmt = $db->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->execute([$_POST['status'], (int)$_POST['order_id']]);
    header('Location: admin.php');
    exit;
}

// Fetch data
$orders = $db->query("SELECT * FROM orders ORDER BY created_at DESC")->fetchAll();
$messages = $db->query("SELECT * FROM contact_messages ORDER BY created_at DESC")->fetchAll();
$new_orders = $db->query("SELECT COUNT(*) FROM orders WHERE status='new'")->fetchColumn();
$new_messages = $db->query("SELECT COUNT(*) FROM contact_messages WHERE is_read=0")->fetchColumn();

// Mark messages read
$db->exec("UPDATE contact_messages SET is_read=1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="robots" content="noindex,nofollow">
<title>KanaBags LLC – Admin Dashboard</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{background:#071a0f;color:#d4ecd9;font-family:Inter,sans-serif;font-size:14px}
.topbar{background:#0e2218;border-bottom:1px solid rgba(61,179,107,.15);padding:1rem 2rem;display:flex;align-items:center;justify-content:space-between}
.logo{font-family:Outfit,sans-serif;font-weight:800;font-size:1.2rem;color:#edf9f2}
.logo span{color:#3cc97b}
.logout{color:#5f9c79;font-size:.85rem;text-decoration:none}
.logout:hover{color:#3cc97b}
.main{padding:2rem;max-width:1400px;margin:0 auto}
.stat-row{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-bottom:2rem}
.stat{background:#0e2218;border:1px solid rgba(61,179,107,.15);border-radius:12px;padding:1.25rem}
.stat .num{font-family:Outfit,sans-serif;font-size:1.8rem;font-weight:800;color:#3cc97b}
.stat .lbl{font-size:.8rem;color:#5f9c79;margin-top:.25rem}
h2{font-family:Outfit,sans-serif;color:#6fdba0;margin:1.5rem 0 1rem;font-size:1.1rem}
table{width:100%;border-collapse:collapse;background:#0e2218;border-radius:12px;overflow:hidden}
th{background:#132a1e;color:#3cc97b;font-size:.78rem;text-transform:uppercase;letter-spacing:.08em;padding:.75rem 1rem;text-align:left}
td{padding:.75rem 1rem;border-bottom:1px solid rgba(61,179,107,.08);font-size:.85rem;color:#9dd4b3;vertical-align:top}
tr:last-child td{border-bottom:none}
tr:hover td{background:rgba(37,168,100,.04)}
.badge{display:inline-block;padding:.2rem .6rem;border-radius:999px;font-size:.72rem;font-weight:700;text-transform:uppercase}
.b-new{background:rgba(37,168,100,.2);color:#3cc97b;border:1px solid rgba(37,168,100,.3)}
.b-reviewing{background:rgba(168,168,37,.15);color:#d4c347;border:1px solid rgba(168,168,37,.3)}
.b-quoted{background:rgba(37,100,168,.15);color:#7ab3d9;border:1px solid rgba(37,100,168,.3)}
.b-fulfilled{background:rgba(37,168,37,.15);color:#6dda6d;border:1px solid rgba(37,168,37,.3)}
.b-cancelled{background:rgba(168,37,37,.15);color:#d97a7a;border:1px solid rgba(168,37,37,.3)}
select{background:#132a1e;border:1px solid rgba(61,179,107,.2);border-radius:6px;color:#d4ecd9;padding:.3rem .5rem;font-size:.8rem}
button.upd{background:#25a864;color:#fff;border:none;border-radius:6px;padding:.3rem .75rem;font-size:.8rem;cursor:pointer}
button.upd:hover{background:#3cc97b}
.section-wrap{margin-bottom:2rem}
pre{white-space:pre-wrap;font-size:.82rem;color:#9dd4b3;background:#0a1f12;padding:.5rem;border-radius:6px;margin-top:.25rem}
</style>
</head>
<body>
<div class="topbar">
  <div class="logo">🌿 KanaBags <span>Admin</span></div>
  <a href="?logout" class="logout">Logout →</a>
</div>
<div class="main">
  <div class="stat-row">
    <div class="stat"><div class="num"><?= count($orders) ?></div><div class="lbl">Total Orders</div></div>
    <div class="stat"><div class="num"><?= $new_orders ?></div><div class="lbl">New (Unreviewed)</div></div>
    <div class="stat"><div class="num"><?= count($messages) ?></div><div class="lbl">Contact Messages</div></div>
    <div class="stat"><div class="num"><?= $new_messages ?></div><div class="lbl">Unread Messages</div></div>
  </div>

  <!-- Orders -->
  <div class="section-wrap">
    <h2>📦 Orders / RFPs</h2>
    <table>
      <thead>
        <tr>
          <th>#ID</th><th>Company</th><th>Contact</th><th>Email</th>
          <th>Product</th><th>Volume</th><th>Sample</th><th>Status</th><th>Date</th><th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($orders as $o): ?>
        <tr>
          <td>#<?= $o['id'] ?></td>
          <td><strong style="color:#edf9f2"><?= htmlspecialchars($o['company_name']) ?></strong></td>
          <td><?= htmlspecialchars($o['contact_name']) ?></td>
          <td><a href="mailto:<?= htmlspecialchars($o['email']) ?>" style="color:#3cc97b"><?= htmlspecialchars($o['email']) ?></a></td>
          <td><?= htmlspecialchars($o['product_type']) ?></td>
          <td><?= htmlspecialchars($o['monthly_volume']) ?></td>
          <td><?= $o['request_sample'] ? '✅ Yes' : '—' ?></td>
          <td><span class="badge b-<?= $o['status'] ?>"><?= $o['status'] ?></span></td>
          <td><?= date('M j, Y', strtotime($o['created_at'])) ?></td>
          <td>
            <form method="POST" style="display:flex;gap:.4rem;align-items:center">
              <input type="hidden" name="update_status" value="1">
              <input type="hidden" name="order_id" value="<?= $o['id'] ?>">
              <select name="status">
                <?php foreach(['new','reviewing','quoted','fulfilled','cancelled'] as $s): ?>
                  <option value="<?=$s?>" <?=$o['status']===$s?'selected':''?>><?=$s?></option>
                <?php endforeach; ?>
              </select>
              <button class="upd" type="submit">Update</button>
            </form>
          </td>
        </tr>
        <?php if ($o['notes']): ?>
        <tr><td colspan="10" style="padding:.25rem 1rem .75rem">
          <em style="color:#5f9c79;font-size:.78rem">Notes:</em>
          <pre><?= htmlspecialchars($o['notes']) ?></pre>
        </td></tr>
        <?php endif; ?>
      <?php endforeach; ?>
      <?php if (!$orders): ?>
        <tr><td colspan="10" style="text-align:center;color:#5f9c79;padding:2rem">No orders yet.</td></tr>
      <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Messages -->
  <div class="section-wrap">
    <h2>✉️ Contact Messages</h2>
    <table>
      <thead>
        <tr><th>#ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Date</th></tr>
      </thead>
      <tbody>
      <?php foreach ($messages as $m): ?>
        <tr>
          <td>#<?= $m['id'] ?></td>
          <td><?= htmlspecialchars($m['name']) ?></td>
          <td><a href="mailto:<?= htmlspecialchars($m['email']) ?>" style="color:#3cc97b"><?= htmlspecialchars($m['email']) ?></a></td>
          <td><?= htmlspecialchars($m['subject']) ?></td>
          <td style="max-width:300px"><pre><?= htmlspecialchars($m['message']) ?></pre></td>
          <td><?= date('M j, Y g:ia', strtotime($m['created_at'])) ?></td>
        </tr>
      <?php endforeach; ?>
      <?php if (!$messages): ?>
        <tr><td colspan="6" style="text-align:center;color:#5f9c79;padding:2rem">No messages yet.</td></tr>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
