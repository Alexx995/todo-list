<?php

require_once('UserService.php');
require_once('mysqlconnector.php');
$ConnectBase = (new mysqlconnector())->connectToMysql();

$email = $_POST["mail"];
$password = $_POST["password"];

$sql_find_user = "SELECT * FROM users WHERE email='$email' AND pasword='$password' ";


$resultquery = mysqli_query($ConnectBase, $sql_find_user);
while (($row = mysqli_fetch_assoc($resultquery))) {
    $data[] = $row;
}


session_start();
$_SESSION["error"] = "";

if (empty($data)) {
    $_SESSION["error"] = "There is no such account, please register";
    header("Location: login.html");
    return;
}


$sql_user_logged = "UPDATE users SET active=1 WHERE email='$email' AND pasword='$password' ";


$query = mysqli_query($ConnectBase, $sql_user_logged);


$sql_find_name = "SELECT ime, prezime FROM users WHERE active=1 ";
$Namequery = mysqli_query($ConnectBase, $sql_find_name);
$User_name = mysqli_fetch_assoc($Namequery);
$Print_name_surname = implode(' ', $User_name);

$Logged_user = (new UserService())->getLoggedInUser();
$tasks = "SELECT * FROM obaveze WHERE user_id='$Logged_user'";
$tasks_query = mysqli_query($ConnectBase, $tasks);

$taskData=[];

while (($row = mysqli_fetch_assoc($tasks_query))) {
    $taskData[] = $row;
}

$_SESSION["data"] = $taskData;

$_SESSION["printname"] = $Print_name_surname;
header("Location: tabela.html");

?>