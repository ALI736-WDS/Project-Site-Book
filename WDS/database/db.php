<?php
//$servername = "localhost" ;
//$dbh = "shafaye1_weblog_ketab_sara" ;
//$username = "shafaye1_elahi2" ;
//$password = "AliShPHM254747736477LGSN3478" ;
//
//$SET_UTF8=array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
//
//try {
//  $conn = new PDO("mysql:host=$servername; dbh=$dbh;", $username, $password, $SET_UTF8);
//  // set the PDO error mode to exception
//  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//// <strong>  echo "Connected successfully"; </strong>
//} catch(PDOException $e) {
//  echo "Connection failed: " . $e->getMessage();
//}
?>

<?php
$servername = "localhost" ;
$dbh = "shafaye1_weblog_ketab_sara" ;
$username = "root" ;
$password = "" ;

$SET_UTF8=array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');

try {
  $conn = new PDO("mysql:host=$servername; dbh=$dbh;", $username, $password, $SET_UTF8);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// <strong>  echo "Connected successfully"; </strong>
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
//   $conn->mysqli_query("SET CHARACTER SET 'utf8'") ;
}
?>