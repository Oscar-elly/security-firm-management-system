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
        // Redirect based on role
        if ($_SESSION['user_role'] == 'admin') {
            header("Location: admin/index.php");
        } elseif ($_SESSION['user_role'] == 'guard') {
            header("Location: guard/index.php");
        } elseif ($_SESSION['user_role'] == 'client') {
            header("Location: client/index.php");
        }
        exit;
    } else {
        $error = "Invalid credentials.";//changed line in comments
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Security Firm</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="container p-5">
    <h2>Login</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST" class="w-50">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required />
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required />
        </div>
        <button class="btn btn-primary">Login</button>
    </form>
</body>
</html>
