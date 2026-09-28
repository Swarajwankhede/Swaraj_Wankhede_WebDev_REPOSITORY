<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="student.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand">
            <i class="bi bi-list pr-5"></i>Student Panel
        </span>
    </nav>

<div id="sidebar" class="sidebar">
    <a href="student_profile.php">Profile</a>
    <a href="student_dashboard.php">Dashboard</a>
    <a href="submit_complaint.php">Add Complaint</a>
    <a href="view_complaints.php">My Complaints</a>
    <a href="../logout.php">Logout</a>
</div>

</body>
</html>