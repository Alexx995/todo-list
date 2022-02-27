
<?php

require_once('mysqlconnector.php');
$ConnectBase=(new mysqlconnector())->connectToMysql();
session_start();
$ime=$_POST["ime"];
$prezime=$_POST["prezime"];
$telefon=$_POST["telefon"];
$email=$_POST["mail"];
$password=$_POST["password"];

$_SESSION["email"] = $email;

$sql_user_in_base="INSERT INTO users (ime, prezime, telefon, email, pasword, active)
 VALUES('$ime', '$prezime', '$telefon', '$email', '$password', 1)";

//session_start();

$query = mysqli_query($ConnectBase, $sql_user_in_base);

$sql_find_name = "SELECT ime, prezime FROM users WHERE active=1 ";
$Namequery = mysqli_query($ConnectBase, $sql_find_name);
$User_name = mysqli_fetch_assoc($Namequery);
$Print_name_register = implode(' ', $User_name);


$_SESSION["register_name"] = $Print_name_register;
header("Location: tabela.html");




?>
