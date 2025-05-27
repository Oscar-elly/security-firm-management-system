<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
?>

<style>
  .sidebar {
    width: 220px;
    height: 100vh;
    background-color: #d7f8e7;
    position: fixed;
    top: 0;
    left: 0;
    padding: 30px 20px;
    font-family: 'Segoe UI', sans-serif;
    transition: transform 0.3s ease-in-out;
    z-index: 999;
  }

  .sidebar.closed{
    transform: translateX(-100%);
  }

  .toggle-btn {
    background-color: transparent;
    border: none;
    font-size: 24px;
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 1000;
  }

  .sidebar h4 {
    font-weight: bold;
  }
  .sidebar a {
    display: block;
    color: #333;
    text-decoration: none;
    margin: 15px 0;
    font-weight: 500;
  }
  .sidebar a:hover {
    color: #2e9c73;
  }
  .logout-btn {
    background-color: #f34f4f;
    color: #fff;
    padding: 6px 14px;
    border-radius: 8px;
    text-align: center;
    display: inline-block;
    margin-top: 30px;
    
  }
  .logout-btn:hover {
    background-color: #d03838;
  }

   @media (max-width: 768px) {
    .sidebar {
      transform: translateX(-100%);
    }

  .sidebar.open{
    transform: translateX(0);
  }
  
  .main-content {
  margin-left: 240px;
  padding: 30px;
  transition: all 0.3s ease-in-out;
}

@media (max-width: 768px) {
  .main-content {
    margin-left: 0;
  }
}


  
</style>

<!-- Toggle Button -->
<button class="toggle-btn" onclick="toggleSidebar()">☰</button>

<!-- Sidebar Content -->
<div id="sidebar" class="sidebar closed">
  <h4>🔐 Dashboard</h4>
  <a href="index.php">🏠 Dashboard</a>
  <a href="guards/index.php">👮 Guard Management</a>
  <a href="duty/index.php">📅 Duty Schedules</a>
  <a href="incidents/index.php">🚨 Incident Reports</a>
  <a href="requests/index.php">📩 Client Requests</a>
  <a href="reports/index.php">📊 Reports</a>
  <a href="../logout.php" class="logout-btn">🚪 Logout</a>
</div>

<script>
  function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const content = document.getElementById("main-content");

    sidebar.classList.toggle("open");

    if (sidebar.classList.contains("open")) {
      content.style.marginLeft = "240px";
    } else {
      content.style.marginLeft = "0";
    }
  }
</script>
