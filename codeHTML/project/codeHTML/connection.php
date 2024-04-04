<?php
$host='localhost:3036';
$user='root';
$pass=''; 
$db='sandwich'; 
$conn=mysqli_connect($host,$user,$pass,$db);
if($conn) { echo "Connection successful";}
else { echo "Connection error";}
?>