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


            $Sql_Query1 = "UPDATE user SET itemno='$itemno' WHERE userid='$bid'";

if(mysqli_query($con,$Sql_Query1)){
	
}
else{}
  $Sql_Query = "SELECT * FROM product WHERE id='$pid'";
 $run_query = mysqli_query($con,$Sql_Query);
$count = mysqli_num_rows($run_query);
	

 while($result= mysqli_fetch_assoc($run_query)) 
 {
$sid=$result['userid'];;
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
 
    $EmailExistMSG = 'Product Already Exist';
   $EmailExistJson = json_encode($EmailExistMSG);
    echo $EmailExistJson ; 
    
    }
    else{
     $addtoshoppingcart= "insert into shoppingcart (bid,pid,sid,name,image,bio,rate,price,type) values ('$bid','$pid','$sid','$name','$image','$bio','$rate','$price','$type')";
         if( mysqli_query($con,$addtoshoppingcart)){
       $MSG = 'product added to shopping cart' ;
       $json = json_encode($MSG);
 
        echo $json ;
        }
        else{
        echo 'Try Again';
        }
        }


        mysqli_close($con);

?>