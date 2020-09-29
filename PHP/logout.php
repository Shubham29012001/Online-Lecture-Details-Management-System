<?php
session_start();
    $_SESSION['Loggedin'] = false;
    $_SESSION['msg'] = "Logout Successfully";
    header("location:../php/login.php");

?>