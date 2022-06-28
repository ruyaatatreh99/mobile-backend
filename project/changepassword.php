<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = '';
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);
$json = file_get_contents('php://input');
$obj = json_decode($json,true);


$email=$obj['email'];
$Rpassword=$obj['Rpassword'];
$newpassword=$obj['newpassword'];


if(empty($newpassword) || empty($Rpassword)|| empty($email)  ){
    $EmailExistMSG = 'fill all information';
    $EmailExistJson = json_encode($EmailExistMSG);
     echo $EmailExistJson ; 
	 exit();

}
if($newpassword != $Rpassword){
    $EmailExistMSG = 'passwords not match!';
    $EmailExistJson = json_encode($EmailExistMSG);
     echo $EmailExistJson ; 
	  exit();
}
if(strlen($newpassword) < 9  ){
	 $EmailExistMSG = 'Password is weak';
     $EmailExistJson = json_encode($EmailExistMSG);
     echo $EmailExistJson ; 
	 exit();
	}

$CheckSQL = "SELECT * FROM user WHERE email='$email'";
$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

if(isset($check)){
 
  $Sql_Query = "UPDATE user SET password='$newpassword' WHERE email='$email'";
        if( mysqli_query($con,$Sql_Query)){
       $MSG = 'password updatated Successfully' ;
       $json = json_encode($MSG);
        echo $json ;
        }
		 else{
        echo 'Try Again';
        }
}
    else{
       $EmailExistMSG = 'Email Not Exist, Please Try Again';
   $EmailExistJson = json_encode($EmailExistMSG);
    echo $EmailExistJson ; 
    
		
        }
        mysqli_close($con);

?>
