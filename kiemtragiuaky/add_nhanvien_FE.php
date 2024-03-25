<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Information</title>
</head>
<body>
    <h2>Add Student Information</h2>
    <form action="add_nhanvien.php" method="post">
        <label for="maNV">Mã Nhân Viên:</label><br>
        <input type="text" id="maNV" name="maNV"><br>
        
        <label for="tenNV">Tên Nhân Viên:</label><br>
        <input type="text" id="tenNV" name="tenNV"><br>
        
        <label for="phai">Phái:</label><br>
        <input type="text" id="phai" name="phai"><br>
        
        <label for="noiSinh">Nơi Sinh:</label><br>
        <input type="text" id="noiSinh" name="noiSinh"><br>
        
        <label for="maPhong">Mã Phòng:</label><br>
        <input type="text" id="maPhong" name="maPhong"><br>
        
        <label for="luong">Lương:</label><br>
        <input type="text" id="luong" name="luong"><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
