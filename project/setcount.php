<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$bid=$obj['bid'];
$pid=$obj['pid'];
$itemno=$obj['itemno'];
$itemprice=$obj['itemprice'];
$sum=0;
$pprice=$itemno * $itemprice;


  $Sql_Query = "update shoppingcart set itemno='$itemno',itemprice='$pprice' where bid='$bid' and pid='$pid'";
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
		else {}
		
        mysqli_close($con);

?>