<?php
session_start();
$_SESSION['isLog'] = false;
header("Location: ../index.php");
?>