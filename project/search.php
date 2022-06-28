<?php

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass,$DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$search=$obj['search'];
$checked=$obj['checked'];
$ry = array();

if(empty($search)){
    $EmailExistMSG = 'Enter to search';
    $EmailExistJson = json_encode($EmailExistMSG);
     echo $EmailExistJson ; 
	 exit();

}

if($checked=='Highprice'){
$Sql_Query = "SELECT * FROM product WHERE (type like '%$search' or name like '%$search%' or bio like '%$search%' ) ORDER BY price ASC ";

 $run_query = mysqli_query($con,$Sql_Query);
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
}
else if($checked=='Lowprice'){
$Sql_Query1 = "SELECT * FROM product WHERE (type like '%$search' or name like '%$search%' or bio like '%$search%' ) ORDER BY price DESC ";

 $run_query1 = mysqli_query($con,$Sql_Query1);
if (mysqli_num_rows($run_query1) > 0) {
 while($result= mysqli_fetch_assoc($run_query1)) 
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
}
	else{
$Sql_Query2 = "SELECT * FROM product WHERE (type like '%$search' or name like '%$search%' or bio like '%$search%' ) ORDER BY rate DESC ";

 $run_query2 = mysqli_query($con,$Sql_Query2);

//$count = mysqli_num_rows($run_query);

if (mysqli_num_rows($run_query2) > 0) {
 while($result= mysqli_fetch_assoc($run_query2)) 
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
	}

 mysqli_close($con);



 ?>