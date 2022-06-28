<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$pid=$obj['pid'];
$bid=$obj['bid'];


	
$Sql_Query = "DELETE FROM wishlist WHERE pid='$pid' and bid='$bid'";

       if(mysqli_query($con,$Sql_Query)){
       $MSG = 'product Deleted';
       $json = json_encode($MSG);
       echo $json ;
	   }
        else{
        echo 'Try Again';
        }
		
        mysqli_close($con);

?>
