<?php
session_start();
include('../php/verify_login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
    <link rel="stylesheet/less" type="text/css" media="screen" href="../style/menu.less" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/3.7.1/less.min.js"></script>
</head>
<body>
<a href="../proposal/proposal.html" id="proposal">PROPOSAL</a>
<img id="imgHeader" src="../images/beauty.jpeg" alt="Welcome">

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
            <a href="feedback.php">
                <div class="iconMobile">
                    <i class="far fa-comment-alt"></i>
                </div>
                <div class ="btt">Feedback</div>
            </a>
        </li>
        <li class="selectLog">
            <a href="feedback.php">
                <div class="iconMobile">
                    <i class="fas fa-comments"></i>
                </div>
                <div class ="feedbackPage">Chat</div>
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
    <h1>Thank you for chilling with us!</h1>

        <br> <br><div>Hello <?php echo $_SESSION['user']; ?>! Please, have fun talking <br>to people in our hangout section! </div><br><br>
</nav>

<nav class="welcome">
    <h1> Hangout!</h1>
    <br>
    <p>To go to our hangout page please click <a class="aHovers" href="../chat/index.php">here</a></p>
<br><br>
<div class="footer">
Created by Gabriel<br>
For a school project</div>
</body>


<script src ="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="../scripts/menu.js"></script>
</html>
