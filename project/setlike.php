<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$userid=$obj['userid'];
$like=$obj['like'];
$dislike=$obj['dislike'];

if(!empty($like)){

  $Sql_Query = "update user set likeuser='$like' where userid='$userid'";
  if(mysqli_query($con,$Sql_Query)){
 
  }
		else {}
}
	
if(!empty($dislike)){

  $Sql_Query = "update user set dislike='$dislike' where userid='$userid'";
  if(mysqli_query($con,$Sql_Query)){
 
  }
		else {}
}	
        mysqli_close($con);

?>