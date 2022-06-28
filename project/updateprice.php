<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);
   
   $userid=$obj['userid'];
   $bid=$obj['bid'];
   $name=$obj['name'];
  $price=$obj['price'];
$profit=0;
 $Sql_Query1 = "SELECT * FROM user WHERE userid='$userid'";
 $run_query1 = mysqli_query($con,$Sql_Query1);
$count = mysqli_num_rows($run_query1);
if($count == 1){
while($row= mysqli_fetch_assoc($run_query1)) 
{
	$profit=$row['profit'];

} 
}
$profit += $price;
$Sql_Query = "update user set profit='$profit' where userid ='$userid'";	 
         if( mysqli_query($con,$Sql_Query)){
			 $order= "DELETE FROM userordder WHERE sid ='$userid' and bid='$bid' and name='$name' and status='accept'";
             if( mysqli_query($con,$order)){
				 
				 $InvalidMSG = 'Done!' ;
$InvalidMSGJSon = json_encode($InvalidMSG);
 echo $InvalidMSGJSon ;
				 
			 }
             else{}

		 }
		 else{echo 'Try again';}

	
		
       
		
     

        mysqli_close($con);

?>