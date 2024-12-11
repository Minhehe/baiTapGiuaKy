<?php
// Kết nối cơ sở dữ liệu
$host = '127.0.0.1';
$username = 'root';
$password = '12345678';
$dbname = 'QLSV_NguyenDuyMinh';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$id = $_POST['id'];
$fullname = $_POST['fullname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$hometown = $_POST['hometown'];
$level = $_POST['level'];
$group_id = $_POST['group_id'];

// Cập nhật dữ liệu vào bảng
$sql = "UPDATE table_Students 
        SET fullname = '$fullname', dob = '$dob', gender = '$gender', hometown = '$hometown', 
            level = '$level', group_id = '$group_id' 
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Cập nhật sinh viên thành công!";
    header("Location: index.php"); // Quay lại trang danh sách
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
