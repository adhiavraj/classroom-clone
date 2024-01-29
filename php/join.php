<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Class</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <link rel="stylesheet" href="../css/joinClass.css">
</head>


<body>

<?php
session_start();
include "connection.php"; ?>

<div class="all-contents">

<nav class="navbar-dark bg-dark mb-2 navbar sticky-top shadow p-2 d-flex">

<div class="flex-grow-0 mr-3">
    <img class="d-flex" src="https://upload.wikimedia.org/wikipedia/commons/5/59/Google_Classroom_Logo.png" alt="Image Not Found!" width="32" height="32" />
</div>

<div class="flex-grow-1 class-name">

    <a class="navbar-brand">
        <p class="class-name">Classroom</p>
    </a>

</div>

</nav>

    <div class="container jc">

    
    <form action="" method="post">

        <br><br>
        <p><label class="font-weight-bold bg-info text-white text-center p-3 edit" for="code" >Enter Your Code To Join Class:</label></p>
        <br><br>
        <div class="container wrapper">
        <div class="input-data">

          <!-- <input type="text" name="section" required placeholder=" "> -->
          <input class="input-group input-group-lg " type="text" id="code" name="sjCode" required placeholder=" ">
          <label>Enter Code</label>
          <br>

        </div>
      </div>
        <br>
        <input type="submit" value="Join Class" name="joinBtn" class="btn btn-success">

    </form>
    </div>
</div>

<?php

if(isset($_POST['joinBtn'])) {

    $_SESSION['jCode'] = $_POST['sjCode'];
    
    $semail = $_SESSION['inputEmail'];
    $spass = $_SESSION['inputPassword'];


    $stuid = "SELECT * from students where email='$semail' and password='$spass'";
    $runsid = mysqli_query($connection, $stuid);
    $fetchsid = mysqli_fetch_assoc($runsid);

    $_SESSION['sid'] = $fetchsid['sid'];
    $sid = $_SESSION['sid']; 
    
    
    $stuJoinCode = $_SESSION['jCode'];


    $checkCode = "SELECT * from class where code='$stuJoinCode'";
    $runCheckCode = mysqli_query($connection, $checkCode);
    $checkData = mysqli_fetch_assoc($runCheckCode);

    $codeClassId = $checkData['c_id'];
    echo $codeClassId;

    $ics = "INSERT into stuclass values($sid,$codeClassId)";
    $runics = mysqli_query($connection, $ics);


    header("Location: joined-class.php");

}
?>
</body>

</html>