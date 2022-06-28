<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);
$obj = json_decode(file_get_contents("php://input"), true);
$name=$obj['productname'];
$price=$obj['price'];
$type=$obj['type'];
$bio=$obj['discription'];
$image=$obj['image'];
$pid=$obj['pid'];
if(!empty($type)){
$CheckSQL = "UPDATE product SET type='$type' WHERE pid='$pid'";
if(mysqli_query($con,$CheckSQL)){} 
else {}
}
if(!empty($name)){
$CheckSQL1 = "update  product set name='$name' where pid='$pid'";
if(mysqli_query($con,$CheckSQL1)){} 
else {}
}
if(!empty($price)){
$CheckSQ2L = "UPDATE product SET price='$price' WHERE pid='$pid'";
if(mysqli_query($con,$CheckSQL2)){} 
else {}
}
if(!empty($bio)){
$CheckSQL3 = "UPDATE product SET bio='$bio' WHERE pid='$pid'";
if(mysqli_query($con,$CheckSQL3)){} 
else {}
}
if(!empty($image)){
$CheckSQL4 = "UPDATE product SET image='$image' WHERE pid='$pid'";
if(mysqli_query($con,$CheckSQL4)){} 
else {}
}
$MSG = 'product edited' ;
$json = json_encode($MSG);
echo $json ;
mysqli_close($con);
?>