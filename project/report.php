<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$id=$obj['id'];
$r=0;


  $Sql_Query = "select report from  comments user where id='$id'";
$result = mysqli_query($con,$Sql_Query);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $r=$row["report"];
  }
} else {
  echo "0 results";
}
$r +=1;

  $Sql_Query1 = "update comments set report='$r' where id='$id'";
  if(mysqli_query($con,$Sql_Query1)){
  $SuccessLoginJson = json_encode('Report comment');
 echo $SuccessLoginJson ; 
  }
		else {}
	
        mysqli_close($con);

?>