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
    <script>

    </script>
</head>
<body>
<a href="proposal/proposal.html" id="proposal">PROPOSAL</a>
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
                    <i class="fas fa-phone-square"></i>
                </div>
                <div class ="bt">Contact</div>
            </a>
        </li>
        <li>
            <a href="html/about.php">
            <div class="icon">
                <i class="fas fa-question-circle"></i>
            </div>
                <div class ="bt">About</div>
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
<?php
if (isset($_SESSION['novalues'])) :
?>

    <div id=
    "popupGreen"
    >Please, add username AND password</div>
        
<?php
unset($_SESSION['novalues']);
endif;
?>

<?php
if (isset($_SESSION['not_authenticated'])) :
?>

    <div id="popupRed"
    >Error: user or password incorrect!</div>
        
<?php
endif;
unset($_SESSION['not_authenticated']);
?>

<nav class="welcome"> 
    <h1>Log In</h1>
    <p> Please, provide your details to proceed.
        
        <br>
        <form action="../php/login.php" class="boxLogin" method="POST">
            <div class="login"> 
            <div>
                <input class ="loginInput" type="text" name="User" placeholder="Username"> 
            </div>  
            <div>  
                <input class ="loginInput" type="password" name="Password" placeholder="Password">
            </div>
            <input type="submit" class="submitbt" value="Log In">
            <a href="signup.php" class ="signupA">
            <span class ="signup">Register</span>
            </a>
            <br>
            </div>
            
        </form>
        <br>
        <br>
    </p>

    </p>
</nav>



</body>
<script src ="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="../scripts/menu.js"></script>
</html>
