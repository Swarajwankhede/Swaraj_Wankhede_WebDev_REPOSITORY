<?php
session_start();
include("../db_connect.php");
include("admin_sidebar.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin_sidebar.css">
</head>
<body>

    <div class="welcome">
        <h2 id="wel">Welcome, Admin!</h2>
    </div>
    <div class="content">
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-4">
                        <div class="card text-white" style="background:#00c0ef;">
                        <div class="card-body text-center">
                            <div>
                        <h2><?php echo $users['total']; ?></h2>
                        <p class="mb-0">Total Students</p>
                        </div>
                            <i class="bi bi-people"></i>
                    </div>
                    </div>
                </div>    
                <div class="col-md-4">
                    <div class="card text-white" style="background:#f39c12;">
                        <div class="card-body text-center">
                           <div> <h2><?php echo $complaints['total']; ?></h2>
                            <p class="mb-0">Total Complaints</p></div>
                            <div>
                            <i class="bi bi-chat-dots"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card text-white " style="background:#00a65a;">
                        <div class="card-body text-center">
                            <div><h2><?php echo $solved['total']; ?></h2>
                            <p class="mb-0">Complaints Solved</p>
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
