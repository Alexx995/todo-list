<?php
        
    require_once('mysqlconnector.php');
    require_once('UserService.php');

    $ConnectBase=(new mysqlconnector())->connectToMysql();

        
    
    $task=$_POST['task'];
    


    session_start();
        
if(empty($task)){
    $_SESSION["error"]="You have entered an empty field, fill in the obligation";
    header("Location: tabela.html"); 
    return;
    }



    $UserLogged = (new UserService())->getLoggedInUser();



   $sql_task_in_base="INSERT INTO obaveze (task, user_id) VALUES('$task', '$UserLogged') ";




if (mysqli_query($ConnectBase, $sql_task_in_base)) {
    header("Location: prikaztodo.php");
} else {
    echo "Sql command failed" . mysqli_error($ConnectBase);
}
  
                         
        



        ?>