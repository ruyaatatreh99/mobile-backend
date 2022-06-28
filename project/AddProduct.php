<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);
$obj = json_decode(file_get_contents("php://input"), true);
$productname=$obj['productname'];
$discription=$obj['discription'];
$price=$obj['price'];
$type=$obj['type'];
$image=$obj['image'];
$userid=$obj['userid'];
$state=$obj['state'];

    if( empty($productname) && empty($discription)&& empty($price)&&empty($type) && empty($image)){
    $ErrorMSG = 'fill all information';
    $ErrorJson = json_encode($ErrorMSG);
    echo $ErrorJson ;
    exit();	
    }
	else{
$Sql_Query = "insert into product (name,bio,price,type,image,userid,state) values ('$productname','$discription','$price','$type','$image','$userid','$state')";
      if( mysqli_query($con,$Sql_Query)){
       $MSG = 'product added Successfully' ;
       $json = json_encode($MSG);
        echo $json ;
        }
        else{
        echo 'Try Again';
        }
	}
        mysqli_close($con);
?>