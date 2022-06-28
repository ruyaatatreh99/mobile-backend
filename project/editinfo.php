<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_Pass = ""; 
$DBName = "project";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_Pass, $DBName);

$obj = json_decode(file_get_contents("php://input"), true);

$name=$obj['name'];
$password=$obj['password'];
$email=$obj['email'];
$address=$obj['address'];
$phone=$obj['phone'];
$bio=$obj['bio'];
$image=$obj['image'];
$userid=$obj['userid'];
if(!empty($email)){
$CheckSQL = "UPDATE user SET name='$email' WHERE userid='$userid'";
if(mysqli_query($con,$CheckSQL)){
 
} 
else {

}
}
if(!empty($name)){
$CheckSQL = "update user set name='$name'where userid='$userid'";

if(mysqli_query($con,$CheckSQL)){
 
} 
else {

}
}

if(!empty($address)){
$CheckSQL = "UPDATE user SET address='$address' WHERE userid='$userid'";
if(mysqli_query($con,$CheckSQL)){
 
} 
else {

}
}
if(!empty($password)){
$CheckSQL = "UPDATE user SET password='$password' WHERE userid='$userid'";
if(mysqli_query($con,$CheckSQL)){
 
} 
else {

}
}
if(!empty($phone)){
$CheckSQL = "UPDATE user SET phone='$phone' WHERE userid='$userid'";
if(mysqli_query($con,$CheckSQL)){
 
} 
else {

}
}
if(!empty($bio)){
$CheckSQL = "UPDATE user SET bio='$bio' WHERE userid='$userid'";
if(mysqli_query($con,$CheckSQL)){
 
} 
else {

}
}
if(!empty($image)){
$CheckSQL = "UPDATE user SET image='$image' WHERE userid='$userid'";
if(mysqli_query($con,$CheckSQL)){

} 
else {

}
}



  $MSG = 'Information edited Successfully' ;
       $json = json_encode($MSG);
        echo $json ;

mysqli_close($con);
?>