<?php
include('connection.php');
session_start();

if (!strlen(trim($_POST['feedbackTest']))){
    $_SESSION['Error'] = true;
    header('Location: ../html/feedback.php');
    exit();
}

if(isset($_POST['commentername']) && ($_POST['commentername'] == '')) {
    $_SESSION['Error'] = true;
    header('Location: ../html/feedback.php');
    exit();
}

// get the form values
$ratings = $_POST['rating'];
$names = $_POST['commentername'];
$feedbacks = $_POST['feedbackTest'];
// insert the feedback into the db
$insert ="CALL createFeedback('$names', '$feedbacks', '$ratings')";

//if sql succeeds, message is displayed.
if ($conn->query($insert) === true) {
    $_SESSION['CommentInserted'] = true;
    header('Location: ../html/feedback.php');
    
}


?>