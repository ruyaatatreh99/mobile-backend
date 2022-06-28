<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$rating=$obj['rating'];
$id=$obj['id'];


	
$Sql_Query = "update product set rate='$rating' where id='$id'";
$Sql_Query1 = "update shoppingcart set rate='$rating' where pid='$id'";
$Sql_Query2= "update wishlist set rate='$rating' where pid='$id'";

       if(mysqli_query($con,$Sql_Query)){
       $MSG = 'save' ;
       $json = json_encode($MSG);
       echo $json ;
	   }
        else{
        echo 'Try Again';
        }
		
		 if(mysqli_query($con,$Sql_Query1)){
      
	   }
        else{
  
        }
		 if(mysqli_query($con,$Sql_Query2)){
      
	   }
        else{

        }
		
        mysqli_close($con);

?>
