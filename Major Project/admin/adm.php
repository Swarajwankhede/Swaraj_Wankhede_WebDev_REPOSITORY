<?php
session_start();
include("../db_connect.php");
if (!isset($_SESSION['admin'])) {
    header("location: admin_login.php");
    exit();
}
//total users
    $qry1="SELECT COUNT(*) AS total FROM students WHERE request_status='Approved'";
    $res1=mysqli_query($con,$qry1);
    $users = mysqli_fetch_assoc($res1);

// total complaints
    $qry2="SELECT COUNT(*) AS total FROM complaints";
    $res2=mysqli_query($con,$qry2);
    $complaints= mysqli_fetch_assoc($res2);


// solved complaints
    $qry3="SELECT COUNT(*) AS total FROM complaints WHERE status='Resolved'";
    $res3=mysqli_query($con,$qry3);
    $solved = mysqli_fetch_assoc($res3);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="cs.css">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand">
            <i class="bi bi-list pr-5" onclick="openSidebar()"></i>Admin Panel
        </span>
    </nav>
    <div id="sidebar" class="sidebar">
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="admin_profile.php">Profile</a>
        <a href="manage_complaints.php">Manage Complaints</a>
        <a href="user_management.php">User Management</a>
    </div>
    <div class="content">
        <div class="container mt-4">
           <div class="row mt-4">

  <!-- Total Complaints -->
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background:#00c0ef;">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h2>150</h2>
            <p class="mb-0">Total Complaints</p>
          </div>
          <i class="bi bi-chat-dots" style="font-size:60px; opacity:0.3;"></i>
        </div>
      </div>
      <div class="card-footer text-center">
        <a href="#" class="text-white">More info →</a>
      </div>
    </div>
  </div>

  <!-- Total Users -->
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background:#00a65a;">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h2>53</h2>
            <p class="mb-0">Total Users</p>
          </div>
          <i class="bi bi-people" style="font-size:60px; opacity:0.3;"></i>
        </div>
      </div>
      <div class="card-footer text-center">
        <a href="#" class="text-white">More info →</a>
      </div>
    </div>
  </div>

  <!-- Complaints Solved -->
  <div class="col-md-4">
    <div class="card text-white mb-3" style="background:#f39c12;">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h2>44</h2>
            <p class="mb-0">Complaints Solved</p>
          </div>
          <i class="bi bi-check-circle" style="font-size:60px; opacity:0.3;"></i>
        </div>
      </div>
      <div class="card-footer text-center">
        <a href="#" class="text-white">More info →</a>
      </div>
    </div>
  </div>

</div>

    </div>
    </div>
    <script>
        function openSidebar() {
            let sb = document.getElementById("sidebar");
            if (sb.style.width === "250px") {
                sb.style.width = "0";
            } else {
                sb.style.width = "250px";
            }
        }

    </script>
</body>
</html>
