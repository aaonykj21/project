
<?php
require 'connection.php';


// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจาก POST request
$breads = $_POST['breads'];
$meats = $_POST['meats'];
$vegetables = $_POST['vegetables'];
$sauces = $_POST['sauces'];
$toppings = $_POST['toppings'];

// สร้างคำสั่ง SQL สำหรับการเพิ่มข้อมูลลงในฐานข้อมูล
$sql = "INSERT INTO orders (breads, meats, vegetables, sauces, toppings)
        VALUES ('$breads', '$meats', '$vegetables', '$sauces', '$toppings')";

// ทำการบันทึกข้อมูลลงในฐานข้อมูล
if ($conn->query($sql) === TRUE) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// ปิดการเชื่อมต่อกับ MySQL
$conn->close();
?>