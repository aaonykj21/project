<?php
$host='localhost';
$user='root';
$pass=''; 
$db='sandwich_shop'; 
$conn=mysqli_connect($host,$user,$pass,$db);
if($conn) { echo "Connection successful";}
else { echo "Connection error";}
?>