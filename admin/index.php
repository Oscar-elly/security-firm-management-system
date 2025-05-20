<?php
require_once "../includes/auth.php"; // Protect the page
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body class="p-5">
  <h2>Welcome, <?= $_SESSION[' name'] ?> 👋</h2>
  <p>You are logged in as <strong><?= $_SESSION[' role'] ?></strong></p>

  <div class="mt-4">
    <a href="guards/index.php" class="btn btn-primary mb-2">👮 Manage Guards</a><br>
    <a href="duty/index.php" class="btn btn-primary mb-2">📅 Duty Schedules</a><br>
    <a href="incidents/index.php" class="btn btn-primary mb-2">🚨 Incident Reports</a><br>
    <a href="requests/index.php" class="btn btn-primary mb-2">📩 Client Requests</a><br>
    <a href="reports/index.php" class="btn btn-primary mb-2">📊 Reports</a><br>
    <a href="../logout.php" class="btn btn-danger mt-4">🚪 Logout</a>
  </div>
</body>
</html>
