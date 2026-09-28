<?php
session_start();
include("../db_connect.php");
include("student_sidebar.php");
$sid=$_SESSION['student_id'];
$res=mysqli_query($con,"SELECT * FROM students WHERE id='$sid'");
$row=mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Profile</title>
	<link rel="stylesheet" type="text/css" href="student.css">
</head>
<body>
	<div class="content">
    <div class="container con-profile mt-2">
        <h3 class="mb-4">Admin Profile</h3>

        <div class="card shadow">
            <div class="card-body profile">

                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" class="form-control" 
                           value="<?php echo $row['NAME']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Student ID</label>
                    <input type="text" class="form-control" 
                           value="<?php echo $row['STUDENT_ID']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" 
                           value="<?php echo $row['EMAIL']; ?>" readonly>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>

