<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);


$text=$obj['text'];
$noteid=$obj['noteid'];
$userid=$obj['userid'];
$color=$obj['color'];


	
$Sql_Query = "insert into todolist (noteid,text,userid,color) values ('$noteid','$text','$userid','$color')";

       if(mysqli_query($con,$Sql_Query)){
       $MSG = 'Added' ;
       $json = json_encode($MSG);
       echo $json ;
	   }
        else{
        echo 'Try Again';
        }
		
        mysqli_close($con);

?>