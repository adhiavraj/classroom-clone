<?php

session_start();
// Check if the form was submitted

    // Connect to the database
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'crclone';

    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // Check if the connection was successful
    if (!$connection) {
        die('Connection error: ' . mysqli_connect_error());
    }
    
    $name = $_SESSION['inputEmail'];
    $pass = $_SESSION['inputPassword'];


    // SQL query to insert the data into the 'register' table
    $insert_query = "INSERT INTO register (email, password) VALUES (?, ?)";

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($connection, $insert_query);
    mysqli_stmt_bind_param($stmt, "ss", $name, $pass);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {

        echo "Registration successfull!";
        header("Location: ../index.php");
        // You can redirect the user to another page or display a success message here
    } else {
        echo "Error: " . mysqli_error($connection);
        // Handle the error, display an error message, or redirect to an error page
    }

    // Close the statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
    // session_destroy();


?>
