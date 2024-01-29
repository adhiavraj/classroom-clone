<?php

include "connection.php";
session_start();

$email = $_SESSION['inputEmail'];
$pass = $_SESSION['inputPassword'];


$q3 = "SELECT t_id from teacher where email='$email' and password='$pass'";
$r3 = mysqli_query($connection, $q3);
$fetchTeacherId = mysqli_fetch_assoc($r3);
$teacherId = $fetchTeacherId['t_id'];


$q4 = "SELECT c_id from class where t_id = '$teacherId'";
$r4 = mysqli_query($connection, $q4);


$cidValues = array();

while ($row = mysqli_fetch_assoc($r1)) {
    $cidValues[] = $row['cid'];
}

foreach ($cidValues as $cidVal) {
    $q7 = "INSERT into ttinfo (tid, cid) values($teacherId, $cidVal)";
    $r7 = mysqli_query($connection, $q3);

    if (!$r3) {
        die("Insertion failed: " . mysqli_error($connection));
    }
    else {
        echo "DATA INSERTED !";
    }
}




$q5 = "INSERT into ttinfo (tid, cid) values('$teacherId','$tffcid')";
$r5 = mysqli_query($connection, $q5);


$_SESSION['generated_code'] = $gnCode;
echo $gnCode;



if(isset($gnCode)){

    $q1 = "SELECT c_id from class where code='$gnCode'";
    $r1 = mysqli_query($connection, $q1);
    $fetchCid = mysqli_fetch_assoc($r1);
    $classId = $fetchCid['c_id'];
    
}

$q2 = "INSERT into ttclass(tid, cid) values('$teacherId','$getClassId')";
$r2 = mysqli_query($connection, $q2);

if($r2) {
    echo "Inserted Data Soksesfuli";
}
else {
    
    echo "Everything will be ohkay";
}


?>