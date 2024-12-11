<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm mới sinh viên</title>
</head>
<body>
    <h1>Thêm mới sinh viên</h1>
    <form action="add_Stu.php" method="post">
        <label for="fullname">Họ và tên:</label>
        <input type="text" id="fullname" name="fullname" required><br>

        <label for="dob">Ngày sinh:</label>
        <input type="date" id="dob" name="dob" required><br>

        <label>Giới tính:</label>
        <input type="radio" id="gender_male" name="gender" value="1" required> Nam
        <input type="radio" id="gender_female" name="gender" value="0" required> Nữ<br>

        <label for="hometown">Quê quán:</label>
        <input type="text" id="hometown" name="hometown" required><br>

        <label for="level">Trình độ học vấn:</label>
        <select id="level" name="level" required>
            <option value="0">Tiến sĩ</option>
            <option value="1">Thạc sĩ</option>
            <option value="2">Kỹ sư</option>
            <option value="3">Khác</option>
        </select><br>

        <label for="group_id">Nhóm:</label>
        <input type="number" id="group_id" name="group_id" required><br>

        <button type="submit">Lưu</button>
    </form>
</body>
</html>
