<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);
   
   $bid=$obj['bid'];
   $sid=$obj['sid'];
   $bname=$obj['bname'];
    $sname=$obj['sname'];
   $msgtext=$obj['msgtext'];
   $simage=$obj['simage'];
  $status=$obj['status'];
  $name=$obj['name'];
 
     $addmsg= "insert into message (sid,sname,simage,bid,bname,text,status,productname) values ('$sid','$sname','$simage','$bid','$bname','$msgtext','$status','$name')";
$Sql_Query = "update userordder set status='$status' where bid ='$bid' and sid='$sid' and name='$name'";	 
         if( mysqli_query($con,$Sql_Query)){
			 	 	if ($status=='decline'){
			 $deltetdeclineorder= "DELETE FROM userordder WHERE bid ='$bid' and sid='$sid' and name='$name' and status='decline'";
             if( mysqli_query($con,$deltetdeclineorder)){}
             else{}
  
	
		}
		 }
		  if( mysqli_query($con,$addmsg)){
       $MSG = 'message sent' ;
      $json = json_encode($MSG);
       echo $json ;
        }
        else{
        echo 'Try Again';
        }
	
		
       
		
     

        mysqli_close($con);

?>