<?php
session_start();
include "connection.php";


if(isset($_POST['createClassBtn'])) { // This condition doesn't make sense but its ok

        $email = $_SESSION['inputEmail']; // From Login Page
        $pass = $_SESSION['inputPassword']; // From Login Page

        $checkTeacher = "SELECT * from teacher where email='$email' and password='$pass'";
        $result = mysqli_query($connection, $checkTeacher);
        $check = mysqli_fetch_array($result);

        if ($check) {
          header("Location: createClass.php");
        } else {
            header("Location: createTeacherClass.php");
        }
    }
?>
