<?php
        
        require_once('mysqlconnector.php');
       $ConnectBase=(new mysqlconnector())->connectToMysql();

        $sql_delete_task="DELETE FROM obaveze WHERE id={$_POST['id']}";


// provera

if(mysqli_query($ConnectBase, $sql_delete_task)) {
    header("Location: prikaztodo.php");  
 }else {
    echo "Sql command failed". mysqli_error($ConnectBase);
  }
  

?>