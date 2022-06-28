<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = '';
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);
$json = file_get_contents('php://input');
$obj = json_decode($json,true);


$email=$obj['email'];
$password=$obj['password'];

/*if( empty($password)|| empty($email)){
    $EmailExistMSG = 'Enter email and password';
    $EmailExistJson = json_encode($EmailExistMSG);
     echo $EmailExistJson ; 
	 exit();

}*/

$Sql_Query = "select * from user where email = '$email' and password = '$password' ";
 $run_query = mysqli_query($con,$Sql_Query);
$count = mysqli_num_rows($run_query);
 
if($count == 1){
 
 //$SuccessLoginMsg = 'Data Matched';
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