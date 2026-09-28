<?php
session_start();
include("../db_connect.php");
include("student_sidebar.php");
if (!isset($_SESSION['student_id'])) {
    header("location: student_login.php");
    exit();
}
$cid = $_POST['cid'];
$sid = $_SESSION['student_id'];
if (isset($_POST['submit'])) {

    $cid = $_POST['cid'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    $check = mysqli_query($con,"SELECT * FROM feedback WHERE COMPLAINT_ID='$cid' AND STUDENT_ID='$sid'");

    if (mysqli_num_rows($check) > 0) {
        $_SESSION['feedmsg'] = "Feedback already submitted";
        header("location: view_complaints.php");
        exit();
    }

    $qry = "INSERT INTO feedback (complaint_id, student_id, rating,feedback) VALUES ('$cid','$sid','$rating','$feedback')";

    if (mysqli_query($con, $qry)) {
        $_SESSION['feedmsg'] = "Feedback submitted successfully";
    } else {
        $_SESSION['feedmsg'] = "Feedback submission failed";
    }
    header("location: view_complaints.php");
    exit();
}
if (!isset($_POST['cid'])) {
    header("location: view_complaints.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Feedback</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="content mt-0">
	<div class="container send-complaint		 mt-0">
	    <h4 style="padding-bottom: 20px;text-align: center;">Complaint Feedback</h4>
	
	    <form method="post">
	
	        <input type="hidden" name="cid" value="<?php echo $cid; ?>">
	
	        <div class="form-group">
	            <label>Rating</label>
	            <select name="rating" class="form-control" style="width: 500px;"required>
	                <option value="">Select</option>
	                <option value="1">Poor</option>
	                <option value="2">Fair</option>
	                <option value="3">Good</option>
	                <option value="4">Very Good</option>
	                <option value="5">Excellent</option>
	            </select>
	        </div>
	
	        <div class="form-group">
	            <label>Your Feedback</label>
	            <textarea name="feedback" class="form-control" rows="4" required style="width:500px;">	</textarea>
	        </div>
	
	        <button type="submit" name="submit" class="btn btn-success">
            Submit Feedback
        </button>
	</form>
	</div>
</div>
</body>
</html>