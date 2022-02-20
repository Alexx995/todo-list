
<?php

require_once('mysqlconnector.php');
$ConnectBase=(new mysqlconnector())->connectToMysql();

$ime=$_POST["ime"];
$prezime=$_POST["prezime"];
$telefon=$_POST["telefon"];
$mail=$_POST["mail"];
$password=$_POST["password"];

$sql_user_in_base="INSERT INTO users (ime, prezime, telefon, email, pasword, active)
 VALUES('$ime', '$prezime', '$telefon', '$mail', '$password', 1)";


session_start();

// provera
if(mysqli_query($ConnectBase, $sql_user_in_base)) {
    $_SESSION["welcome"] = "Welcome, you have successfully registered";
    header("Location: tabela.html");  
 }else {
    echo "Sql command failed". mysqli_error($ConnectBase);
  }



?>
