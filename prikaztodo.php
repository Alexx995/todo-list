<?php
require_once('mysqlconnector.php');
require_once('UserService.php');


$ConnectBase = (new mysqlconnector())->connectToMysql();


$Logged_user = (new UserService())->getLoggedInUser();


$tasks = "SELECT * FROM obaveze WHERE user_id='$Logged_user'";
$tasks_query = mysqli_query($ConnectBase, $tasks);


while(($row = mysqli_fetch_assoc($tasks_query))) {
    $data[] = $row;
}



session_start();

$_SESSION["data"] = $data;


header("Location: tabela.html");


?>