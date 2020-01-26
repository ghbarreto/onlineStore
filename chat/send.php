<?php
include('connection.php');
date_default_timezone_set('America/Vancouver');

if(isset($_COOKIE['name'])){
    $name = strip_tags($_COOKIE['name']);
    $messages = htmlspecialchars($_POST['message']);
    $time = date('H:i:s');
    $ip = $_SERVER['REMOVE_ADDR'];

    $sql = $conn -> prepare('insert into messages(name, message, time, ip) values(:n,:m,:h,:i)');
    $sql -> bindValue(':n', $name);
    $sql -> bindValue(':m', $messages);
    $sql -> bindValue(':h', $time);
    $sql -> bindValue(':i', $ip);
    $sql -> execute();
    $s -> $sql -> rowCount();

    setcookie('chat', $s);
}
?>