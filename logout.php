
<?php 

require_once('mysqlconnector.php');
$ConnectBase=(new mysqlconnector())->connectToMysql();


$sql_logout="UPDATE users SET active=0 WHERE active=1";

session_start();
$_SESSION["data"]=[];

// provera
if(mysqli_query($ConnectBase, $sql_logout)) {
    header("Location: login.html");  
 }else {
    echo "Sql command failed". mysqli_error($ConnectBase);
  }
  


?>
