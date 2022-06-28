<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = '';
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$userid=$obj['userid'];
$ry = array();

  $Sql_Query = "SELECT * FROM product WHERE userid='$userid'";
 $run_query = mysqli_query($con,$Sql_Query);

//$count = mysqli_num_rows($run_query);
	
if (mysqli_num_rows($run_query) > 0) {
 while($result= mysqli_fetch_assoc($run_query)) 
 {
	 
array_push($ry,$result );
 }
 $product = json_encode(array('results' => $ry));
 echo $product ; 
	}
	else {
  $product = json_encode('No Posts Yet');
 echo $product ; 
}
	

 mysqli_close($con);
 ?>

