<?php
if(isset($_COOKIE['name'])){
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="css/chat.less"/>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="function.js"></script>
        
        <title>Chat</title>
    </head>
    <body>
        <a class="aHovers"href="../html/hangout.php">Return</a>
        <div id="messages"></div>
        <form method ="post" onsubmit ="send(); return false;">
        <input type="text" name="message" id="message" placeholder="Send a message" maxlength="50" autocomplete="off"/>
    </form>
    </body>
    </html>'
    
;}else{
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">  
        
        <title>Chat</title>
    </head>
    <body>
    <a style="
    text-decoration: none;
    font-weight: bold;
    color: lightsalmon;
    " 
    href="../html/hangout.php">Return</a>
        <div id="messages"></div>
        <form method ="post">
        <input type="text" name="name" id="name" placeholder="What is your name" maxlength="15" autocomplete="off"/>
        <input type="submit" name="go" id="go" value="Log in"/>
    </form>
    </body>
    </html>
    ';
}

if(isset($_POST['go'])){
    setcookie('name', $_POST['name']);
    header('Location: ./');
}
?>