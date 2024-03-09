<?php
$host='sql310.infinityfree.com';
$user='if0_35759249';
$pass='Aon210846'; 
$db='if0_35759249_sandwich_shop'; 
$con=mysqli_connect($host,$user,$pass,$db);
if($con) { echo "Connection successful";}
else { echo "Connection error";}
?>