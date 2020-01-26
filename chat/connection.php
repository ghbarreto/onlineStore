<?

$username = 'ghbarreto';
$password = '';
$dbhost ='127.0.0.1';
$dbname ='login';

$a = 'mysql:host='.$dbhost.';dbname='.$dbname;
$conn = new PDO($a, $username, $password);


?>