<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = '';
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);
$json = file_get_contents('php://input');
$obj = json_decode($json,true);


$userid=$obj['userid'];

$Sql_Query = "select * from user where userid='$userid'";
 $run_query = mysqli_query($con,$Sql_Query);
$count = mysqli_num_rows($run_query);
 
if($count == 1){
 $row = mysqli_fetch_assoc($run_query);
 $SuccessLoginJson = json_encode($row);
 echo $SuccessLoginJson ; 
 
 }
 
 else{

$InvalidMSG = 'Invalid Username or Password Please Try Again' ;
$InvalidMSGJSon = json_encode($InvalidMSG);
 echo $InvalidMSGJSon ;
 
 }
 
 mysqli_close($con);
?>