<?php
/*
Instance php.
 */

//  db setup
define('HOST', '127.0.0.1');
define('user', 'ghbarreto');
define('password', '');
define('db', 'login');

$conn = mysqli_connect(HOST, user, password, db) or die('wasnt able to connect');

function clearConnection($conn){
    while($conn->more_results()){
       $conn->next_result();
       $conn->use_result();
    }
}