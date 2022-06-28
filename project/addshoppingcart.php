<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);
   
   $bid=$obj['bid'];
   $pid=$obj['pid'];
  $Sql_Query = "SELECT * FROM product WHERE id='$pid'";
 $run_query = mysqli_query($con,$Sql_Query);
$count = mysqli_num_rows($run_query);
	$sum=0;

 while($result= mysqli_fetch_assoc($run_query)) 
 {
$sid=$result['userid'];
$name=$result['name'];
$image=$result['image'];
$bio=$result['bio'];
$price=$result['price'];
$type=$result['type'];
$rate=$result['rate']; 
 }
 
 $CheckSQL = "SELECT * FROM shoppingcart WHERE pid='$pid'";
$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));


if(isset($check)){
 
    $MSG = 'Product Already Exist';
   $json = json_encode($MSG);
        echo $json ;
    
    }
    else{
     $addtoshoppingcart= "insert into shoppingcart (bid,pid,sid,name,image,bio,rate,price,type,itemno,itemprice) values ('$bid','$pid','$sid','$name','$image','$bio','$rate','$price','$type','1','$price')";
	 
         if( mysqli_query($con,$addtoshoppingcart)){
       $MSG = 'product added to shopping cart' ;
      $json = json_encode($MSG);
       echo $json ;
        }
        else{
        echo 'Try Again';
        }
        }
		  $res = mysqli_query($con,"SELECT itemprice FROM shoppingcart WHERE  bid='$bid'");
  if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {
  $sum += $row["itemprice"];
  }
  }

  $Sql_Query1 = "update user set total='$sum' where userid='$bid'";
  if(mysqli_query($con,$Sql_Query1)){  
  }
     

        mysqli_close($con);

?>