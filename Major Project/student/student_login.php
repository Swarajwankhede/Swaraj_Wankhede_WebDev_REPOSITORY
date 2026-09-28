<?php
session_start();
include("../db_connect.php");

if (isset($_POST['studentloginbtn'])) {
    $stdid = $_POST['studentid'];
    $pass  = $_POST['password'];

    $qry = "SELECT * FROM students WHERE STUDENT_ID='$stdid' AND PASSWORD='$pass'";
    $res = mysqli_query($con, $qry);

    if (mysqli_num_rows($res)>0) {
        $row = mysqli_fetch_assoc($res);
        if(isset($row['REQUEST_STATUS']) && $row['REQUEST_STATUS'] == 'Rejected') {
            $_SESSION['msg'] = "Your request has been rejected";
            header("Location: ../index.php");
            exit();
        }
        elseif  (isset($row['REQUEST_STATUS']) && $row['REQUEST_STATUS'] != 'Approved') {
            $_SESSION['msg'] = "Your account is not approved yet";
            header("Location: ../index.php");
            exit();
        }
        unset($_SESSION['registered']);
        $_SESSION['stdid']=$stdid;
        $_SESSION['student_id'] = $row['ID'];
        header("Location: student_dashboard.php");
        exit();

    } else {
        $_SESSION['msg'] = "Invalid Student ID or Password";
        header("Location: ../index.php");
        exit();
    }
}
?>
