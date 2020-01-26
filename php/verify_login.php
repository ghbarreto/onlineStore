<?php
if (!isset($_SESSION)) {
    session_start();
}   // this verify if the user is logged in, if yes, then he will be able
    // to see the content in the page that this is included, if not, 
    // then the user will be redirected to the login page, forcing him to log in.
if (!$_SESSION['user']) {
    header('Location: ../html/log-in.php');
    exit();
}