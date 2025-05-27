<?php include "../includes/sidebar.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <div id="main-content" class="main-content">
    <h3>Hello, <?= $_SESSION['user_name'] ?> 👋</h3>
    <p><h5>Here are some Quick Acess.</h5></p>

    <div class="card p-4 mt-4">
      <a href="guards/index.php" class="btn btn-success m-2">👮 Manage Guards</a>
      <a href="duty/index.php" class="btn btn-primary m-2">📅 View Schedules</a>
      <a href="incidents/index.php" class="btn btn-danger m-2">🚨 View Incidents</a>
    </div>
  </div>

</body>
</html>
