<?php
// Kết nối tới cơ sở dữ liệu
$host = '127.0.0.1';
$username = 'root';
$password = '12345678';
$dbname = 'QLSV_NguyenDuyMinh';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý tìm kiếm
$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// Truy vấn danh sách sinh viên theo tên hoặc quê quán
$sql = "SELECT * FROM table_Students WHERE fullname LIKE ? OR hometown LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%" . $search . "%";
$stmt->bind_param('ss', $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Chuyển đổi giới tính và trình độ học vấn
function genderText($gender) {
    return $gender == 1 ? 'Nam' : 'Nữ';
}

function levelText($level) {
    switch ($level) {
        case 0: return 'Tiến sĩ';
        case 1: return 'Thạc sĩ';
        case 2: return 'Kỹ sư';
        case 3: return 'Khác';
    }
}

// Hàm để định dạng ngày sinh theo dạng dd-mm-yyyy
function formatDate($date) {
    return date('d-m-Y', strtotime($date));  // Định dạng ngày thành dd-mm-yyyy
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <h1>Danh sách sinh viên</h1>

    <!-- Form tìm kiếm -->
    <form method="get" action="">
        <input type="text" name="search" placeholder="Nhập tên hoặc quê quán" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Tìm kiếm</button>
    </form>
    <a href="add.php">Thêm sinh viên mới</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Quê quán</th>
            <th>Trình độ học vấn</th>
            <th>Nhóm</th>
            <th>Thao tác</th>
        </tr>
        <?php if ($result->num_rows > 0) { ?>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo formatDate($row['dob']); ?></td>
                <td><?php echo genderText($row['gender']); ?></td>
                <td><?php echo $row['hometown']; ?></td>
                <td><?php echo levelText($row['level']); ?></td>
                <td><?php echo $row['group_id']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Sửa</a> | 
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">Xóa</a>
                </td>
            </tr>
            <?php } ?>
        <?php } else { ?>
            <tr><td colspan="8">Không tìm thấy kết quả.</td></tr>
        <?php } ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
