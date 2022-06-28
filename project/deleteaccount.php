<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = '';
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass,$DBName);

$obj = json_decode(file_get_contents("php://input"), true);


$email=$obj['email'];
$password=$obj['password'];
$userid=$obj['userid'];

if( empty($password)|| empty($email)){
    $EmailExistMSG = 'Enter email and password';
    $EmailExistJson = json_encode($EmailExistMSG);
     echo $EmailExistJson ; 
	 exit();
}

$CheckSQL = "SELECT * FROM user WHERE email='$email' and userid='$userid'";
$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));;

if(isset($check)){
     $Sql_Query = "DELETE FROM user WHERE email ='$email'";
  
	   if( mysqli_query($con,$Sql_Query)){
		   
		   
       $MSG =  'Account deleted' ;
       $json = json_encode($MSG);
        echo $json ;
        }
        else{
        echo 'Try Again';
        }
    }
    else{
         $EmailExistMSG = 'Invalid Username or Password Please Try Again';
         $EmailExistJson = json_encode($EmailExistMSG);
         echo $EmailExistJson ; 
        }
		   $Sql_Query1 = "DELETE FROM product WHERE userid ='$userid'"; 
		   if( mysqli_query($con,$Sql_Query1)){} else{}
		    $Sql_Query2 = "DELETE FROM shoppingcart WHERE bid ='$userid'"; 
		   if( mysqli_query($con,$Sql_Query2)){}else{}
		    $Sql_Query3 = "DELETE FROM wishlist WHERE bid ='$userid'"; 
		   if( mysqli_query($con,$Sql_Query3)){}else{}
		     $Sql_Query4 = "DELETE FROM todolist WHERE userid ='$userid'"; 
		   if( mysqli_query($con,$Sql_Query4)){}else{}
		     $Sql_Query5 = "DELETE FROM comments WHERE userid ='$userid'"; 
		   if( mysqli_query($con,$Sql_Query5)){}else{}
		     $Sql_Query6 = "DELETE FROM wishlist WHERE sid ='$userid'";
		   if( mysqli_query($con,$Sql_Query6)){}else{}
		     $Sql_Query7 = "DELETE FROM shoppingcart WHERE sid ='$userid'"; 
		   if( mysqli_query($con,$Sql_Query7)){}else{}
        mysqli_close($con);

?>
