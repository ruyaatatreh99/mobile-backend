<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$userid=$obj['userid'];

	
$Sql_Query = "update user set cost='0',profit='0' where userid='$userid'";

       if(mysqli_query($con,$Sql_Query)){
	   }
		else{}
        mysqli_close($con);

?>
