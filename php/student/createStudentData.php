<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating Student Class</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>
<body>

<style>
    *{
        margin: 10px;
        padding: 10px;
    }
    body{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .mybtn{
            
        align-items: center;
        width: 130px;
        padding: 5px;
        margin: 10px;
    
    }
    
</style>

</body>
</html>

<?php

session_start();
include "../connection.php";

$email = $_SESSION['inputEmail']; // $SESSION['inputEmail']; - From register / login input box.
$pass = $_SESSION['inputPassword']; // $SESSION['inputPassword']; - From register / login input box.


$query = "SELECT * FROM teacher WHERE email = '$email' and password='$pass'"; 
$result = mysqli_query($connection, $query);
$check = mysqli_fetch_assoc($result);

$checkStu = "SELECT * FROM students WHERE email = '$email' AND password='$pass'";
$runCheckStu = mysqli_query($connection, $checkStu);
$checkingStu = mysqli_fetch_assoc($runCheckStu);


if($check) {
    $gotoCreate = "
    
    <div class='container d-flex justify-content-center'>
        <h3>You have already singed in as a Teacher!</h3>
        </div>
        
        <form method='post'>

        <br>
    
        <div class='container d-flex justify-content-center'>
        <button type='submit' name='gocreate' class='mybtn text-center btn-primary btn-lg'>Create Class</button>
        </div>
   
        </form>";

    echo $gotoCreate;

}


if($checkingStu) { 
    header("Location: ../join.php");
}


if(!$checkingStu && !isset($check)) {
    $makeStu = "
    
        <h3>You have to be signed in as a Student! Do you want to continue Proceed.?</h3>
        
        <form method='post'>

        <br>
        <br>
        
        <div class='container d-flex justify-content-center'>
        
        <button type='submit' name='yStu' class='mybtn text-center btn-primary btn-lg'>Proceed</button> 

        <button type='submit' name='nStu' class='mybtn text-center btn-dark btn-lg'>Cancel</button> 

        </div>
   
        </form>";

    echo $makeStu;
}



if(isset($_POST['yStu'])) // yes - create button
{

    $_SESSION['s_email'] = $_SESSION['inputEmail'];
    $_SESSION['s_password'] = $_SESSION['inputPassword'];

    $t_mail = $_SESSION['s_email'];
    $t_password = $_SESSION['s_password'];

    $insert_query = "INSERT INTO students (email, password) VALUES (?, ?)";
    
    $stmt = mysqli_prepare($connection, $insert_query);
    mysqli_stmt_bind_param($stmt, "ss", $t_mail, $t_password);
    
    if (mysqli_stmt_execute($stmt)) {
        
        header("Location: ../join.php");
       
    } else {
        echo "Error: " . mysqli_error($connection);
       
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($connection);

    
    
}

if(isset($_POST['gocreate'])) {
    header("Location: ../../index.php");
}



?>
