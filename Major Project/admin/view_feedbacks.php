<?php
session_start();
include("../db_connect.php");
include("admin_sidebar.php");

$qry = "SELECT f.feedback, f.rating, f.submitted_at, c.id, c.category, s.NAME FROM feedback f JOIN complaints c ON f.COMPLAINT_ID = c.id JOIN students s ON f.STUDENT_ID = s.ID ORDER BY f.SUBMITTED_AT DESC";

$res = mysqli_query($con, $qry);

?>

<!DOCTYPE html>
<html>
<head>
<title>Student Feedback</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="admin.css">
</head>

<body>
<div class="content">
    <div class="container mt-4">
    
    <h4>Student Feedback</h4>
    
        <table class="table table-bordered">
        <tr style="background-color:yellowgreen;">
            <th>Complaint ID</th>
            <th>Student</th>
            <th>Category</th>
            <th>Rating</th>
            <th>Feedback</th>
            <th>Date</th>
        </tr>
        
        <?php if (mysqli_num_rows($res) == 0) { ?>
        <tr>
            <td colspan="6" class="text-center text-danger">
                No feedback submitted yet
            </td>
        </tr>
        <?php } else {
        while ($row = mysqli_fetch_assoc($res)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['NAME']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td>
                <span>
                    <?php echo $row['rating']; ?>/5
                </span>
            </td>
            <td><?php echo $row['feedback']; ?></td>
            <td><?php echo $row['submitted_at']; ?></td>
        </tr>
        <?php }} ?>
        
        </table>
    
    </div>
</div>
</body>
</html>