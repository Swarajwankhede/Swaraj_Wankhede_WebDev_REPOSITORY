<?php
session_start();
include("../db_connect.php");

if (isset($_POST['adminloginbtn'])) {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $qry = "SELECT * FROM admins WHERE email='$email' AND password='$pass'";
    $res = mysqli_query($con,$qry);

    if (mysqli_num_rows($res)>0) {
        $_SESSION['admin']=$email;
        header('location:admin_dashboard.php');
        exit();
    }
    else{
        $_SESSION['msg'] = "Invalid Student ID or Password";
        header("Location: ../index.php");
        exit();
    }
}
?>
