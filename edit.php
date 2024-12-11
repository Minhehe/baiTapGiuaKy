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

// Lấy thông tin sinh viên
$sql = "SELECT * FROM table_Students WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin sinh viên</title>
</head>
<body>
    <h1>Sửa thông tin sinh viên</h1>
    <form action="upd_stu.php" method="post">
        <input type="hidden" name="id"  value="<?php echo $row['id']; ?>">

        <label for="fullname">Họ và tên:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>" required><br>

        <label for="dob">Ngày sinh:</label>
        <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>" required><br>

        <label>Giới tính:</label>
        <input type="radio" name="gender" value="1" <?php echo ($row['gender'] == 1) ? 'checked' : ''; ?>> Nam
        <input type="radio" name="gender" value="0" <?php echo ($row['gender'] == 0) ? 'checked' : ''; ?>> Nữ<br>

        <label for="hometown">Quê quán:</label>
        <input type="text" id="hometown" name="hometown" value="<?php echo $row['hometown']; ?>" required><br>

        <label for="level">Trình độ học vấn:</label>
        <select id="level" name="level" required>
            <option value="0" <?php echo ($row['level'] == 0) ? 'selected' : ''; ?>>Tiến sĩ</option>
            <option value="1" <?php echo ($row['level'] == 1) ? 'selected' : ''; ?>>Thạc sĩ</option>
            <option value="2" <?php echo ($row['level'] == 2) ? 'selected' : ''; ?>>Kỹ sư</option>
            <option value="3" <?php echo ($row['level'] == 3) ? 'selected' : ''; ?>>Khác</option>
        </select><br>

        <label for="group_id">Nhóm:</label>
        <input type="number" id="group_id" name="group_id" required><br>


        <button type="submit">Lưu</button>
    </form>
</body>
</html>

<?php $conn->close(); ?>
