<?php
$host = '127.0.0.1';
$username = 'root';
$password = '12345678';
$dbname = 'QLSV_NguyenDuyMinh';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id']; // Lấy id sinh viên từ URL

// Xóa sinh viên
$sql = "DELETE FROM table_Students WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Xóa sinh viên thành công!";
    $conn->query("ALTER TABLE table_Students AUTO_INCREMENT = 1");
    header("Location: index.php"); // Quay lại trang danh sách
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
