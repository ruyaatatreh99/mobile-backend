<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$userid=$obj['userid'];
$comment=$obj['text'];
$name=$obj['name'];
$image=$obj['image'];

$Sql_Query = "insert into comments (comment,userid,name,image) values ('$comment','$userid','$name','$image')";

       if(mysqli_query($con,$Sql_Query)){
       $MSG = 'Posted' ;
       $json = json_encode($MSG);
       echo $json ;
	   }
        else{
        echo 'Try Again';
        }
		
        mysqli_close($con);

?>
