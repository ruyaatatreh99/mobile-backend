<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$id=$obj['id'];
	
$Sql_Query = "DELETE FROM comments WHERE id='$id'";
       if(mysqli_query($con,$Sql_Query)){
       $MSG = 'comment Deleted';
       $json = json_encode($MSG);
       echo $json ;
	   }
        else{
        echo 'Try Again';
        }
		
        mysqli_close($con);

?>
