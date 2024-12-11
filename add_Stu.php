<?php
$host = '127.0.0.1';
$username = 'root';
$password = '12345678';
$dbname = 'QLSV_NguyenDuyMinh';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$fullname = $_POST['fullname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$hometown = $_POST['hometown'];
$level = $_POST['level'];
$group_id = $_POST['group_id'];

// Chèn dữ liệu vào bảng
$sql = "INSERT INTO table_Students (fullname, dob, gender, hometown, level, group_id) 
        VALUES ('$fullname', '$dob', '$gender', '$hometown', '$level', '$group_id')";

if ($conn->query($sql) === TRUE) {
    echo "Thêm sinh viên thành công!";
    header("Location: index.php"); // Quay lại trang danh sách
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
