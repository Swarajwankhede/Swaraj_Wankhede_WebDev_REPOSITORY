<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
     <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand">
            <i class="bi bi-list pr-5"></i>Admin Panel
        </span>
    </nav>
    <div id="sidebar" class="sidebar">
        <a href="admin_profile.php">Profile</a>
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="manage_complaints.php">Manage Complaints</a>
        <a href="user_management.php">Manage Students</a>
        <a href="view_feedbackS.php">Feedback</a>
        <a href="../logout.php">Logout</a>
    </div>

</body>
</html>
