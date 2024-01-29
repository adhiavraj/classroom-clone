<?php
// This file is only for the use to store data about class and to make this file usable to another file
include "connection.php";
session_start();

    $gnCode = $_SESSION['generated_code']; // Generated Code

    $q2 = "SELECT c_id from class where code = '$gnCode'";
    $r2 = mysqli_query($connection, $q2);
    $cid = mysqli_fetch_assoc($r2);
    $classID = $cid['c_id'];

    $_SESSION['cid'] = $classID; 

    $q1 = "INSERT into cinfo (cid) values ('$classID')";
    $r1 = mysqli_query($connection, $q1);

if (isset($_POST['className'], $_POST['sectionName'], $_POST['subjectName'], $_POST['roomName'])) {

    header("Location: insertClassInfo.php");
    exit;


} else {

    echo "Error To Store the Class Information In createClassInfo.php";
}


?>