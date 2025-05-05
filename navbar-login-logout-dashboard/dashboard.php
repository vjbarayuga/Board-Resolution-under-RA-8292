
<!--
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
  <h2>Welcome, <?= htmlspecialchars($user['username']) ?> (<?= $user['role'] ?>)</h2>
  <a href="logout.php" class="btn btn-danger mb-3">Logout</a>

  <div class="mb-3">
    <a href="index.php" class="btn btn-primary">📦 Inventory</a>
    <a href="add_stock.php" class="btn btn-success">➕ Add Stock</a>
    <a href="checkout_stock.php" class="btn btn-warning">➖ Checkout Stock</a>
    <a href="stock_history.php" class="btn btn-info">📄 Stock History</a>
  </div>
</body>
</html> -->


<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- ✅ Navbar -->
<?php include 'navbar.php'; ?>

<!-- ✅ Page Content -->
<div class="container py-4">
  <h2>Dashboard</h2>
  <p class="text-muted">Manage your inventory using the options above.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
