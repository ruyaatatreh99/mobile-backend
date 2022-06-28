<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);
$obj = json_decode(file_get_contents("php://input"), true);
   
$bid=$obj['bid'];
 $Sql_Query = "SELECT * FROM user WHERE userid='$bid'";
 $run_query = mysqli_query($con,$Sql_Query);

$count = mysqli_num_rows($run_query);


while($result= mysqli_fetch_assoc($run_query)) 
{
$username=$result['name'];
$address=$result['address'];
$phone=$result['phonenumber'];

}
  
  $Sql_Query1 = "SELECT * FROM shoppingcart WHERE bid='$bid'";
 $run_query1 = mysqli_query($con,$Sql_Query1);
$count = mysqli_num_rows($run_query1);
if($count>0){
while($row= mysqli_fetch_assoc($run_query1)) 
{
	$pid=$row['pid'];
	$sid=$row['sid'];
$name=$row['name'];
$image=$row['image'];
$itemno=$row['itemno'];
$itemprice=$row['itemprice'];

$o= "INSERT INTO userordder (bid,sid,pid, itemno, itemprice, name, image, username, address, phone) VALUES ('$bid','$sid','$pid','$itemno','$itemprice','$name','$image','$username','$address','$phone')";
$s=mysqli_query($con, $o);
  
	   if ($s) {
 $Sql_Query2 = "DELETE FROM shoppingcart WHERE bid='$bid'";
 $run_query2 = mysqli_query($con,$Sql_Query2);
}
 else {}

} 
 $Sql_Query3 =  "update user set total=0 where userid ='$bid'";
 $run_query3 = mysqli_query($con,$Sql_Query3);
     $MSG = 'order sent' ;
      $json = json_encode($MSG);
       echo $json ;
}
else{
	     $MSG = 'No order to send' ;
      $json = json_encode($MSG);
       echo $json ;
}

mysqli_close($con);

?>
