<?php

class mysqlconnector
{
    public function connectToMysql()
    {
        // parametri za vezu
        $server="localhost";
        $user="root";
        $password="";
        $baza="todolist";

        // ostvarivanje veze
        $ConnectBase=mysqli_connect($server, $user, $password, $baza);

        // sta ako dodje ili ne dodje do konekcije
        if(!$ConnectBase) {
            echo "Ovo ne radi";
        } else {
         echo "Ovo radi<br>";

    
        }
        return $ConnectBase;
    }
}
?>