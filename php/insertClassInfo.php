<?php


include "connection.php";
session_start(); 

$email = $_SESSION['inputEmail'];
$pass = $_SESSION['inputPassword'];

$q3 = "SELECT t_id from teacher where email= '$email' and password = '$pass'";
$r3 = mysqli_query($connection, $q3);
$gtid = mysqli_fetch_assoc($r3);

$_SESSION['logged_tid'] = $gtid['t_id'];


$cname = $_SESSION['className'];
$sname = $_SESSION['sectionName'];
$subname = $_SESSION['subjectName'];
$tid = $_SESSION['logged_tid'];
$code = $_SESSION['generated_code'];

// Columns in class table : c_id  cname  cmsg  code  t_id 

$q1 = "INSERT into class values ('','$cname','$code', '$tid')";
$r1 = mysqli_query($connection, $q1);

header("Location: ../index.php");


?>