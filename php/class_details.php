<?php


include "connection.php";
session_start();

$classID = $_SESSION['classID'];
echo $classID;

    $fetchClassName = "SELECT cname from c_details where c_id='$classID'";
    $r1 = mysqli_query($connection, $fetchClassName);
    $getClassName = mysqli_fetch_assoc($r1);
    $className = $getClassName['cname'];
    echo "<br>";
    echo $className; 
    $_SESSION['className'] = $className; 
    echo "<br>";
    echo $_SESSION['className'];

?>