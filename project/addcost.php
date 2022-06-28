<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$cost=$obj['cost'];
$userid=$obj['userid'];

	
$Sql_Query = "update user set cost='$cost' where userid='$userid'";

       if(mysqli_query($con,$Sql_Query)){
		   $Sql_Query = "select * from user where userid='$userid' ";
           $run_query = mysqli_query($con,$Sql_Query);
           $count = mysqli_num_rows($run_query);
 
if($count == 1){
 $row = mysqli_fetch_assoc($run_query);
 $SuccessLoginJson = json_encode($row);
 echo $SuccessLoginJson ; 
 
 }
       $MSG = 'save' ;
       $json = json_encode($MSG);
       echo $json ;
	   }
        else{
        echo 'Try Again';
        }
		
        mysqli_close($con);

?>
