<?php

require_once ('mysqlconnector.php');

class UserService
{
    public function getLoggedInUser()
    {
        $ConnectBase = (new mysqlconnector())->connectToMysql();
        $sql_logged_user = "SELECT id FROM users WHERE active=1";
        $userloggedquery = mysqli_query($ConnectBase, $sql_logged_user);
        $userlogged = mysqli_fetch_assoc($userloggedquery);
        $Logged_user = implode($userlogged);
        return $Logged_user;
    }

}


?>