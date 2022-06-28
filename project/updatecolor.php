<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);
$obj = json_decode(file_get_contents("php://input"), true);


$userid=$obj['userid'];
$color=$obj['text'];
$noteid=$obj['noteid'];

if($color==1)$color='true';
else $color='false';
   
$CheckSQL = "UPDATE todolist SET color='$color' WHERE userid='$userid' and noteid='$noteid'";
      if( mysqli_query($con,$CheckSQL)){
       $MSG = 'Information edited Successfully' ;
       $json = json_encode($MSG);
        echo $json ;
        }
        else{
         $MSG = 'Try Again' ;
       $json = json_encode($MSG);
        }
	
        mysqli_close($con);
?>