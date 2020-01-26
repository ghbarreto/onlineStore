<?php
include('connection.php');
session_start();

// if user doesn't fill name or email it doesn't run the sql
if (isset($_POST['name']) && isset($_POST['email']) && ($_POST['name'] == '' || $_POST['email'] == '')) {
    $_SESSION['NameEmailOrReason'] = true;
    header('Location: ../html/contact.php');
    exit();
}
// if reason is not filled, does not run the sql
if (!strlen(trim($_POST['reason']))){
    $_SESSION['NameEmailorReason'] = true;
    header('Location: ../html/contact.php');
    exit();
}

// assign the variables to the values the user filled in the forms
$contactName = $_POST['name'];
$email = $_POST['email'];
$reason = $_POST['reason'];

// calling the insert procedure
$run = "CALL contactSend('$contactName', '$email', '$reason')";

// sending a message that the content was inserted.
if ($conn->query($run) === true) {
    $_SESSION['contacted'] = true;
    header('Location: ../html/contact.php');
}
?>