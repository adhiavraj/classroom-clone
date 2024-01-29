<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Teacher Class</title>
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

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'crclone';

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$connection) {
    die('Connection error: ' . mysqli_connect_error());
}

$email = $_SESSION['inputEmail']; // $SESSION['inputEmail']; - From register / login input box.
$pass = $_SESSION['inputPassword']; // $SESSION['inputPassword']; - From register / login input box.


$query = "SELECT * FROM teacher WHERE email = '$email' AND password='$pass'"; //password
$result = mysqli_query($connection, $query);
$check = mysqli_fetch_array($result);


if(!$check){
    $proceed = "
    
        
        <h3>You have to be signed in as a Teacher! Do you want to continue Proceed.?</h3>
        
        <form method='post'>

        <br>
        <br>
        
        <div class='container d-flex justify-content-center'>
        
        <button type='submit' name='yes' class='mybtn text-center btn-primary btn-lg'>Proceed</button> 

        
        <button type='submit' name='no' class='mybtn text-center btn-dark btn-lg'>Cancel</button> 

        </div>
   
        </form>";

    echo $proceed;
} else {
    header("Location: createClass.php");
}


if(isset($_POST['yes'])) // yes - create button
{

    $_SESSION['t_email'] = $_SESSION['inputEmail'];
    $_SESSION['t_password'] = $_SESSION['inputPassword'];

    $t_mail = $_SESSION['t_email'];
    $t_password = $_SESSION['t_password'];

    $insert_query = "INSERT INTO teacher (email, password) VALUES (?, ?)";
    
    $stmt = mysqli_prepare($connection, $insert_query);
    mysqli_stmt_bind_param($stmt, "ss", $t_mail, $t_password);
    
    if (mysqli_stmt_execute($stmt)) {
        
        echo "Registration successful!";
        header("Location: createClass.php");
       
    }
    

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
    
}
if(isset($_POST['no']))
{
    header("Location: ../index.php");
}

?>