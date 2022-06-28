<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass,$DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$name=$obj['name'];
$password=$obj['password'];
$email=$obj['email'];
$address=$obj['address'];
$phone=$obj['phone'];

$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";

if(empty($name) || empty($password)|| empty($email) || empty($address) || empty($phone) ){
    $EmailExistMSG = 'fill all information';
    $EmailExistJson = json_encode($EmailExistMSG);
     echo $EmailExistJson ; 
	 exit();

}
if(!preg_match($emailValidation,$email)){
		 $EmailExistMSG = 'email is not valid';
    $EmailExistJson = json_encode($EmailExistMSG);
     echo $EmailExistJson ; 
	 exit();
	}
	if(!preg_match($number,$phone)){
		 $EmailExistMSG = 'Mobile number must be 10 digit';
    $EmailExistJson = json_encode($EmailExistMSG);
     echo $EmailExistJson ; 
	 exit();
	}
	if(!(strlen($phone) == 10)){
		 $EmailExistMSG = 'Mobile number must be 10 digit';
    $EmailExistJson = json_encode($EmailExistMSG);
     echo $EmailExistJson ; 
	 exit();
	}
	if(strlen($password) < 9 ){
			 $EmailExistMSG = 'Password is weak';
    $EmailExistJson = json_encode($EmailExistMSG);
     echo $EmailExistJson ; 
	 exit();
	}
	
$CheckSQL = "SELECT * FROM user WHERE email='$email'";
$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));


if(isset($check)){
 
    $EmailExistMSG = 'Email Already Exist, Please Try Again';
   $EmailExistJson = json_encode($EmailExistMSG);
    echo $EmailExistJson ; 
    
    }
    else{
       $Sql_Query = "insert into user (name,email,password,address,phonenumber) values ('$name','$email','$password','$address','$phone')";
  
	   if( mysqli_query($con,$Sql_Query)){
       $MSG = 'User Registered Successfully' ;
       $json = json_encode($MSG);
        echo $json ;
        }
        else{
        echo 'Try Again';
        }
        }
        mysqli_close($con);

?>
