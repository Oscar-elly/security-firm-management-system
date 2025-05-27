<?php
session_start();
require_once "config/database.php";
require_once __DIR__ . "/classes/User.php";

$user = new User($pdo);
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->login($email, $password)) {
        if ($_SESSION['user_role'] == 'admin') {
            header("Location: admin/index.php");
        } elseif ($_SESSION['user_role'] == 'guard') {
            header("Location: guard/index.php");
        } elseif ($_SESSION['user_role'] == 'client') {
            header("Location: client/index.php");
        }
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login | Security System</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      background-color: #eafff1;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .login-container {
      max-width: 400px;
      width: 100%;
      margin: 80px auto;
      background: #fff;
      border-radius: 20px;
      padding: 40px 35px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    }
    .login-container h2 {
      color: #222;
      text-align: center;
      margin-bottom: 20px;
    }
    .btn-login {
      width: 100%;
      background-color: #37b887;
      border: none;
      padding: 12px;
      font-weight: bold;
      font-size: 16px;
      border-radius: 10px;
      margin-top: 10px;
    }
    .btn-login:hover {
      background-color: #2e9c73;
    }
    .form-control {
      border-radius: 10px;
    }
    .alert {
     font-size: 14px;
      padding: 10px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>🔐 Admin Login</h2>
    <?php if ($error): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="mb-3">
        <label>Email</label>
        <div>
          <input type="email" name="email" class="form-control" required />
        </div>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <div>
        <input type="password" name="password" class="form-control" required />
        </div>
      </div>
      <button class="btn btn-login mt-3">Login</button>
    </form>
  </div>
</body>
</html>
