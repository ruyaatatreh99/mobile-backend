<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);
$obj = json_decode(file_get_contents("php://input"), true);


$id=$obj['id'];
$state=$obj['state'];

   
$CheckSQL = "UPDATE product SET state='$state' WHERE id='$id'";
      if( mysqli_query($con,$CheckSQL)){
       $MSG = 'Information edited Successfully' ;
       $json = json_encode($MSG);
        echo $json ;
        }
        else{
         $MSG = 'unable to edit info' ;
       $json = json_encode($MSG);
        }
	
        mysqli_close($con);
?>