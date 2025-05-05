<?php 
include 'config/db.php'; 
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user']; // 👈 assuming user info is stored like this
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- ✅ Navbar -->
<?php include 'navbar.php'; ?>

<div class="container py-5">
  <h2>📦 Inventory Dashboard</h2>
  <div class="mb-3">
    <a href="add_stock.php" class="btn btn-success">➕ Add Stock</a>
    <a href="checkout_stock.php" class="btn btn-warning">➖ Checkout Stock</a>
    <a href="stock_history.php" class="btn btn-info">📄 View History</a>
    <a href="dashboard.php" class="btn btn-secondary">Back</a>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Category</th>
          <th>Item Name</th>
          <th>Description</th>
          <th>Quantity</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = $conn->query("
          SELECT s.id, s.name, s.description, s.quantity, c.name AS category_name
          FROM stocks s
          JOIN categories c ON s.category_id = c.id
          ORDER BY s.id DESC
        ");

        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['category_name']) ?></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['description']) ?></td>
          <td><?= htmlspecialchars($row['quantity']) ?></td>
          <td style="min-width: 160px;" class="d-flex gap-2">
            <a href="edit_stock.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-secondary">Edit</a>
            <a href="delete_stock.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')">Delete</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- ✅ Bootstrap JS (needed for navbar toggle on mobile) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
