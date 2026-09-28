<?php
session_start();
include("../db_connect.php");
include("student_sidebar.php");
if (isset($_POST['submitbtn'])) {

    $stdid =$_SESSION['student_id'];
    $cat= $_POST['category'];
    $comp=$_POST['complaint'];

    $qry = "INSERT INTO complaints (student_id, category, complaint) VALUES ('$stdid', '$cat', '$comp')";

    mysqli_query($con, $qry);

    $_SESSION['msg'] = "Complaint Submitted Successfully";
    header("location: submit_complaint.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Complaint</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="student.css">
</head>
<body>

<div class="container send-complaint mt-5">
    <h4>Submit Complaint</h4>
    <form method="post">
        Category
        <select name="category" class="form-control mb-2" style="width: 500px;" required>
            <option value="">-- Select Category --</option>
            <option>Academic</option>
            <option>Infrastructure</option>
            <option>Examination</option>
            <option>Hostel</option>
            <option>Other</option>
        </select>

        Complaint
        <textarea name="complaint" class="form-control mb-3" style="width: 500px;" required></textarea>

        <button name="submitbtn" class="btn btn-success">
            Submit
        </button>
    </form>
</div>

</body>
</html>
