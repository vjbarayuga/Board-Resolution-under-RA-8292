<?php
session_start();
include 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();
        if (hash('sha256', $password) === $user['password']) {
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit;
        }
    }
    $error = "Invalid username or password!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f4f7fc;
    }
    .login-card {
      width: 100%;
      max-width: 400px;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      background-color: white;
    }
    .form-control {
      height: 45px;
    }
    .btn-primary {
      width: 100%;
      height: 45px;
    }
    .register-link {
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<div class="login-container">
  <div class="login-card">
    <h3 class="text-center mb-4">Login</h3>
    
    <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>
      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <div class="d-grid gap-2">
        <button class="btn btn-primary" type="submit">Login</button>
      </div>
    </form>

    <div class="register-link">
      <a href="register.php">Don't have an account? Register here</a>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
