<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$sid=$obj['sid'];
$bid=$obj['bid'];
$text=$obj['text'];

	
$Sql_Query = "DELETE FROM message WHERE sid='$sid' and bid='$bid' and text='$text'";

       if(mysqli_query($con,$Sql_Query)){
       $MSG = 'Note Deleted';
       $json = json_encode($MSG);
       echo $json ;
	   }
        else{
        echo 'Try Again';
        }
		
        mysqli_close($con);

?>
