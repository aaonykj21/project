<?php
session_start();
require 'connection.php';

// รับข้อมูลจาก POST request
$bread = $_POST['bread'];
$meat = $_POST['meat'];
$vegetable = $_POST['vegetable'];
$sauce = $_POST['sauce'];
$topping = $_POST['topping'];

// สร้างคำสั่ง SQL สำหรับการเพิ่มข้อมูลลงในฐานข้อมูล
$query = mysqli_query($conn, "INSERT INTO order_detail(bread_name,meat_name,veg_name,sauce_name,topping_name) VALUES('{$bread}','{$meat}', '{$vegetable}', '{$sauce}', '{$topping}')") or die('query_failed');
/*$sql = "INSERT INTO order (bread_nameENG, meat_nameENG, vegetable_nameENG, sauce_nameENG, topping_nameENG)
        VALUES ('$bread', '$meat', '$vegetable', '$sauce', '$topping')";*/

// ทำการบันทึกข้อมูลลงในฐานข้อมูล
if ($query) {
    /*echo "Record added successfully";*/
    $_SESSION['message'] = 'Order Saved';
} else {
    $_SESSION['message'] = 'Order could not be saved';
    /*echo "Error: " . $sql . "<br>" . $conn->error;*/
}

// ปิดการเชื่อมต่อกับ MySQL
$conn->close();
?>