<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    
    $con = mysqli_connect('localhost','ghbarreto','');
    
    mysqli_select_db($con, 'user');
    

    $nome = "asd";
    $senha = "wes";
    
    $s = "select * from user where username = $nome";
    
    $result = mysqli_query($con, $s);
    
    $num = mysqli_num_rows($result);
    
    if($num == 1){
      echo "Nome ja utilizado";
    }else{
      $reg = "insert into user(user, senha) values ($nome, $senha)";
      mysqli_query($con, $reg);
      echo "Registrado com sucesso";
    }
    
    ?>
</body>
</html>