<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);
$obj = json_decode(file_get_contents("php://input"), true);

$text=$obj['text'];

    if( empty($text)){
    $ErrorMSG = 'fill all information';
    $ErrorJson = json_encode($ErrorMSG);
    echo $ErrorJson ;
    exit();	
    }
	else{
$Sql_Query = "insert into tips (text) values ('$text')";
      if( mysqli_query($con,$Sql_Query)){
       $MSG = 'tip added Successfully' ;
       $json = json_encode($MSG);
        echo $json ;
        }
        else{
        echo 'Try Again';
        }
	}
        mysqli_close($con);
?>