<?php
session_start();
include("../db_connect.php");

if (isset($_POST['registerbtn'])) {

    $stdid=$_POST['studentid'];
    $name =$_POST['name'];
    $email=$_POST['email'];
    $pass =$_POST['password'];

    $emailRegex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $passRegex  = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,15}$/";
    if (!preg_match($emailRegex, $email)) {
        $_SESSION['msg'] = "Invalid email format";
        header("Location: ../index.php");
        exit();
    }
    if (!preg_match($passRegex, $pass)) {
        $_SESSION['msg'] = "Password must be strong (8–15 chars, upper, lower, number, symbol)";
        header("Location: ../index.php");
        exit();
    }

    $check="SELECT * FROM students WHERE STUDENT_ID='$studentid' OR EMAIL='$email'";
    $res=mysqli_query($con, $check);

    if (mysqli_num_rows($res) >0) {
        $_SESSION['msg'] = "Student ID or Email already exists";
        header("location: ../index.php");
        exit();
    }
    $qry = "INSERT INTO students(STUDENT_ID, NAME, EMAIL, PASSWORD, REQUEST_STATUS)VALUES('$stdid','$name', '$email', '$pass', 'Pending')";

    if (mysqli_query($con, $qry)) {
        $_SESSION['registered']=true;
        $_SESSION['msg'] = "Registration Successful. Wait for admin approval.";
        header("location: ../index.php");
        exit();
    } 
    else {
        $_SESSION['msg'] = "Registration Failed";
        header("Location: student_register.php");
        exit();
    }
}
?>
