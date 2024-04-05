
<?php
require 'connection.php';


// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

// สร้างคำสั่ง SQL สำหรับการเพิ่มข้อมูลลงในฐานข้อมูล
$sql = "INSERT INTO order_detail (bread_name, meat_name, veg_name, sauce_name, topping_name)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $data['bread'], $data['meat'], $data['vegetable'], $data['sauce'], $data['topping']);

// ทำการบันทึกข้อมูลลงในฐานข้อมูล
if ($stmt->execute()) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// ปิดการเชื่อมต่อกับ MySQL
$stmt->close();
$conn->close();
?>