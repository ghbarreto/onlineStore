<?php
//starts the session
session_start();
//$session_start();

// include the instance
include('connection.php');

// check if user completed the form, if not, return him to the login page.
// and show him a pop up that he didn't fill all the requirements.
if (empty($_POST['User']) || empty($_POST['Password'])) {
    $_SESSION['not_authenticated'] = true;
    header('Location: ../html/log-in.php');
    exit();
}

$user = mysqli_real_escape_string($conn, $_POST['User']);
$password = mysqli_real_escape_string($conn, $_POST['Password']);
// if user completed the form, then it sends the user and the password to the db.

//checks the info.
$query ="CALL checkAvailability('$user', '$password')";
$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

// if logged in the user will be redirected to the userpanel, if not, it will be redirected to the log-in page.
if ($row == 1) {
    $_SESSION['user'] = $user;
    header('Location: ../html/userpanel.php');
} else {
    $_SESSION['not_authenticated'] = true;
    header('Location: ../html/log-in.php');
    exit();
}
