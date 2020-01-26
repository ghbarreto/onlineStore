<?php
session_start();
include('../php/verify_login.php');
include('../php/connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/jquery.barrating.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/themes/fontawesome-stars.css"> 
    <script src="../scripts/menu.js"></script>
    <link rel="stylesheet/less" type="text/css" media="screen" href="../style/menu.less" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/3.7.1/less.min.js"></script>
    
</head>
<body>
<a href="../proposal/proposal.html" id="proposal">PROPOSAL</a>
<img id="imgHeader"src="../images/beauty.jpeg" alt="Welcome">
<?php



    

?>
<div class="container" id="arrows">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
</div>
<nav id = "single-nav" role="navigation">
    <ul>
        <li>
            <a href="../index.php">
                <div class="icon">
                    <i class="fa fa-home"></i>
                </div>
                <div class ="bt">Home</div>
            </a>

        </li>
        
        <li>
            <a href="../aboot.php">
            <div class="icon">
                <i class="fas fa-question-circle"></i>
            </div>
                <div class ="bt">About</div>
            </a>
        </li>
        <li>
            <a href="../html/contact.php">
                <div class="icon">
                    <i class="fas fa-phone-square"></i>
                </div>
                <div class ="bt">Contact</div>
            </a>
        </li>

        <li>
            <a href="../html/jobs.php">
                <div class="icon">
                    <i class="far fa-building"></i>
                </div>
                <div class ="bt">Jobs</div>
            </a>
        </li>
        <li>
            <a href="../html/userpanel.php">
                <div class="icon">
                <i class="far fa-user"></i>
                </div>
                <div class ="bt">User Panel</div>
            </a>
        </li>
    </ul>
</nav>

<nav>
    <ul class="mobileUL">
        <li class="selectLog">
            <a class="green" href="feedback.php">
                <div class="iconMobile">
                    <i class="far fa-comment-alt"></i>
                </div>
                <div class ="feedbackPage">Feedback</div>
            </a>
        </li>
        <li class="selectLog">
            <a href="hangout.php">
                <div class="iconMobile">
                    <i class="fas fa-comments"></i>
                </div>
                <div class ="btt">Chat</div>
            </a>
        </li>
        <li class="selectLog">
            <a href="order.php">
                <div class="iconMobile">
                    <i class="fas fa-cart-plus"></i>
                </div>
                <div class ="btt">Cart</div>
            </a>
        </li>
    </ul>
</nav>

<nav class="welcome">
    <h1>Feedback!</h1>

<?php
if (isset($_SESSION['CommentInserted'])) :
?>
    <div id=
    'popupGreen'
    >Thank you for your Feedback</div>   
<?php

unset($_SESSION['CommentInserted']);
endif;

?>

<?php
if (isset($_SESSION['Error'])) :
?>
    <div id=
    'popupRed'
    >Please, fill all the blanks.</div>  
     
<?php

unset($_SESSION['Error']);
endif;

?>
    
    <form id="formFeedback" action="../php/feedback.php" method="post" name ="commentform" action="insertcomment"><br>
    <div class="br-wrapper br-theme-fontawesome-stars">
      <select name ="rating" id="example">
        <option value="1"></option>
        <option value="2"></option>
        <option value="3"></option>
        <option value="4"></option>
        <option value="5"></option>
      </select> 
    </div>

        Name: <input type = "text" name="commentername" /><br>
        <textarea rows="4" cols="50" name="feedbackTest" > </textarea> <br>
        <input type="submit" name="submit" id="aButton" class="button"value="Send Feedback">
      
    </form>
<br><br>
    
</nav>


<nav class="welcome">

    <?php
    $run = "CALL `runFeedbacks`()";

    $feed = mysqli_query($conn, $run);
    $feedbacks = mysqli_num_rows($feed);

    echo '<div id="feedbackCount">We currently have <span id="feedbackNumber">' . $feedbacks . '</span> feedbacks. </div><br/><br/><br/>';
    
        if ($feedbacks > 0) {
        while ($a = mysqli_fetch_array($feed)) {
            $name = $a['name'];
            $comments = $a['feedback'];
            $ratings = $a['ratings'];
            
            echo "<div class='feedbacks'>
            
                <div class ='feedbacksName' id='nameFeedback' >Name: $name </div>
                <div class ='feedbacksName'> $ratings stars</div>
                <div class ='feedbacksComment' > $comments </div>
                
                </div> ";
        
        }
    }
    ?>
<br>
<div class="footer">
Created by Gabriel<br>
For a school project</div>
</nav>

</body>
</html>
