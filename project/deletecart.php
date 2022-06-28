<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$pid=$obj['pid'];
$bid=$obj['bid'];
$sum=0;

	
$Sql_Query = "DELETE FROM shoppingcart WHERE pid='$pid' and bid='$bid'";

       if(mysqli_query($con,$Sql_Query)){
		        $res = mysqli_query($con,"SELECT itemprice FROM shoppingcart WHERE  bid='$bid'");
if (mysqli_num_rows($res) > 0) {
 
  while($row = mysqli_fetch_assoc($res)) {
    $sum += $row["itemprice"];
  }
  
}

  $Sql_Query1 = "update user set total='$sum' where userid='$bid'";
  if(mysqli_query($con,$Sql_Query1)){
 $p = json_encode($sum);
 echo $p ; 
  
  }
	   }
        else{
        echo 'Try Again';
        }
		
        mysqli_close($con);

?>