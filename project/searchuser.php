<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";

$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass,$DBName);
$obj = json_decode(file_get_contents("php://input"), true);

$search1=$obj['search1'];
$ry = array();
if(empty($search1)){
    $EmailExistMSG = 'Enter to search';
    $EmailExistJson = json_encode($EmailExistMSG);
     echo $EmailExistJson ; 
	 exit();
}

$Sql_Query = "SELECT * FROM user WHERE (name like '%$search1%' or bio like '%$search1%' or address like '%$search1%' )";
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
  $product = json_encode('No Result!');
 echo $product ; 
}
	
 mysqli_close($con);
 ?>