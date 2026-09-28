<?php
session_start();
include("../db_connect.php");
include("student_sidebar.php");
if (!isset($_SESSION['student_id'])) {
    header("location: student_login.php");
    exit();
}
$sid = $_SESSION['student_id'];
$stdid=$_SESSION['stdid'];
$qry="SELECT * FROM students WHERE student_id='$stdid'";
$res=mysqli_query($con,$qry);
$row=mysqli_fetch_assoc($res);
// total complaints by student
$total = mysqli_fetch_assoc(
    mysqli_query($con,"SELECT COUNT(*) AS total FROM complaints WHERE student_id='$sid'")
);

// resolved complaints
$solved = mysqli_fetch_assoc(
    mysqli_query($con,"SELECT COUNT(*) AS total FROM complaints 
                       WHERE student_id='$sid' AND status='Resolved'")
);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="student.css">
</head>
<body>
<!-- Content -->
<div class="content mt-1">
<div class="welcome mt-1" id="wel">
        <h2 >Welcome, <?php echo $row['NAME'];?> </h2>
    </div>
        <div class="container mt-4">
            <div class="row"> 
                <div class="col-md-6">
                    <div class="card text-white" style="background:#f39c12;">
                        <div class="card-body text-center">
                           <div> <h2><?php echo $total['total']; ?></h2>
                            <p class="mb-0">Total Complaints</p></div>
                            <div>
                            <i class="bi bi-chat-dots"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card text-white " style="background:#00a65a;">
                        <div class="card-body text-center">
                            <div><h2><?php echo $solved['total']; ?></h2>
                            <p class="mb-0">Resolved Complaints</p>
                            </div>
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</body>
</html>
