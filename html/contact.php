<?php
session_start();
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
        <li><a href="../html/userpanel.php">
            <div class="icon">
                <i class="far fa-user"></i>
            </div>
            <div class ="bt">User Panel</div>
        </a>
        </li>
    </ul>
</nav>

<nav class="welcome">
    <h1>Contact Information</h1>
    <br>
    <p> To get in contact with any of our agents you have to submit an application <br>
        through this form underneath, you should provide every details for <br>
        better support.</p>
        <br>
        <br>
</nav>
    
            
<nav class="welcome">
    <h1>Contact!</h1>
<br>
<?php
if (isset($_SESSION['contacted'])) :
?>
    <div id=
    'popupGreen'
    >Thank you for your enquiry, we will be contacting you shortly.</div>   
<?php

unset($_SESSION['contacted']);
endif;

?>

<?php
if (isset($_SESSION['NameEmailOrReason'])) :
?>
    <div id=
    'popupRed'
    >Please, for better support fill all the details.</div>  
     
<?php

unset($_SESSION['NameEmailOrReason']);
endif;

?>
<br>
    
    <form id="formFeedback" action="../php/contact.php" method="post" name ="contactForm"><br>
        Name: <input type = "text" name="name" /><br>
        E-mail: <input type = "text" name="email" /><br>
        <textarea rows="4" cols="50" name="reason"> </textarea> <br>
        <input type="submit" name="submit" value="Send Enquire">
    </form>

<br><br>
</nav>
<br>
<br>
<div class="footer">
Created by Gabriel<br>
For a school project</div>
    
<script src ="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="../scripts/menu.js"></script>
</body>
</html>
