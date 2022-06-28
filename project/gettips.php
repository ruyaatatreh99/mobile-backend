<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = '';
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$id=$obj['id'];

$ry = array();

  $Sql_Query = "SELECT * FROM tips where id='$id'";
 $run_query = mysqli_query($con,$Sql_Query);

	
if (mysqli_num_rows($run_query) > 0) {
 while($result= mysqli_fetch_assoc($run_query)) 
 {
	 
  $product = json_encode($result['Text']);
 echo $product ; 
 }

	}
	
	else {

}
	

 mysqli_close($con);
 ?>

