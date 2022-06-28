<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$bid=$obj['bid'];

      $Sql_Query = "SELECT SUM (itemprice)FROM shoppingcart WHERE condition bid='$bid'";
	  if(mysqli_query($con,$Sql_Query)){
		  
		   $product = json_encode( $Sql_Query);
        echo $product ; 
	  }
	  else{
		  
		  
	  }
    
		
        mysqli_close($con);

?>