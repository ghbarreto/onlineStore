<?
include('connection.php');

if(isset($_COOKIE['name'])){
    $namec = $_COOKIE['name'];
    $search = $conn -> prepare('select * from messages');
    $search -> execute();
    $amount = $search -> rowCount();


    if($amount > 0){
        echo "<h3>Welcome to the chat, ".$namec."</h3>";
        while($row = $search -> fetch(PDO::FETCH_ASSOC)){
            
            $name = $row['name'];
            $message = $row['message'];
            $hour = $row['time'];
            $ip = $row['ip'];

            
           
            echo "<p>[".$hour."] <b title='".$hour."'>".$name."</b>: ".$message." </p>"; 
            
        }
    }else{
        echo "<h3> Welcome to the chat ".$namec."</h3><br/>";
        echo "<p>No messages yet...</p>";
    }
}
$c = $_COOKIE['chat'];
if($amount != $c){
    setcookie('chat',$amount);
    echo "<script>$('#messages').animate({scrollTop: 9999}, 1000);</script>";
}
?>