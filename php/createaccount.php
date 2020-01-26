<?php
//starts the session
session_start();

// include the instance
include('connection.php');

if (isset($_POST['AddUser']) && isset($_POST['AddPassword']) && ($_POST['AddUser'] == '' || $_POST['AddPassword'] == '')) {
    $_SESSION['novalues'] = true;
    header('Location: ../html/signup.php'); // if user hasn't entered ID or PASSSWORD it doesn't let the user proceed.
    exit();
}
// getting the form values into variables.
$user = $_POST['AddUser'];
$password = $_POST['AddPassword'];

// check if user already exists
$check = "CALL checkUser('$user')'";

// run the sql queries to check the user
$result = mysqli_query($conn, $check);
$row = mysqli_fetch_array($result, MYSQLI_NUM);

// check if the user already exists then the pop up will appear.
if ($row[0] >= 1) {
    $_SESSION['alreadyExists'] = true;
    header('Location: ../html/signup.php');
} else { // if user does not exist, then it adds the query
    $sql = "CALL loginCreation('$user', '$password')";
    
    if (mysqli_query($conn, $sql)) { // sends message welcoming the new user.
        $_SESSION['newUser'] = true;
        header('Location: ../html/signup.php');
    } else {
        $_SESSION['alreadyExists'] = true;
        header('Location: ../html/signup.php');
    }

}


exit();

?>
