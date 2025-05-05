<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav Bar</title>
</head>
<body>
    <!-- navbar.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">📦 InventorySys</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
      aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Inventory</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_stock.php">Add Stock</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="checkout_stock.php">Checkout Stock</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="stock_history.php">Stock History</a>
        </li>
      </ul>
      <span class="navbar-text me-3 text-white">
        👤 <?= htmlspecialchars($_SESSION['user']['username']) ?> (<?= htmlspecialchars($_SESSION['user']['role']) ?>)
      </span>
      <a href="logout.php" class="btn btn-outline-light">Logout</a>
    </div>
  </div>
</nav>

</body>
</html>