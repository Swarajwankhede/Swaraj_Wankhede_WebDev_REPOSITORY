<?php
session_start();
include("../db_connect.php");
include("student_sidebar.php");
if (isset($_SESSION['feedmsg'])) {
    echo "<script>alert('" . $_SESSION['feedmsg'] . "');</script>";
    unset($_SESSION['feedmsg']);
}
if (!isset($_SESSION['student_id'])) {
    header("location: student_login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

$qry = "SELECT * FROM complaints WHERE student_id='$student_id'";
$res = mysqli_query($con, $qry);
$row=mysqli_fetch_assoc($res);
$_SESSION['cid']=$row['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Complaint Status</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="student.css">
</head>
<body>

<div class="container view-complaint mt-4 " >
    <h4 style="margin-left: 0px;">Your Complaints</h4>
    <table class="table table-bordered " >
        <tr style="background-color:yellowgreen;">
            <th>COMPLAINT ID</th>
            <th>Category</th>
            <th>Complaint</th>
            <th>Status</th>
            <th>Admin Response</th>
            <th>Date</th>
            <th>Feedback</th>
        </tr>
        <?php if (mysqli_num_rows($res) == 0) {?>
            <tr>
        <td colspan="6" class="text-center text-danger">
            <h4 style="color: red;">No data found</h4>
        </td>
    </tr>
       
<?php } else{
      while($row=mysqli_fetch_assoc($res)){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['complaint']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['admin_response']; ?></td>
            <td><?php echo $row['complaint_sended']; ?></td>
            <td>
                <?php if ($row['status'] == 'Resolved') { ?>
                    <form action="feedback.php" method="post">
                        <input type="hidden" name="cid" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="btn btn-info btn-sm">
                            Give Feedback
                        </button>
                    </form>
                <?php } else { ?>
                    <span class="text-muted">Feedback locked</span>
                <?php } ?>
            </td>
        </tr>
        
    <?php } }?>
    </table>
   
</div>

</body>
</html>