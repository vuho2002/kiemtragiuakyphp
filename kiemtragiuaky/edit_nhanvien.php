<?php
// Kết nối đến cơ sở dữ liệu
include 'config.php';

// Kiểm tra xem có tham số mã nhân viên được truyền qua URL hay không
if(isset($_GET['id'])) {
    $maNV = $_GET['id'];

    // Tạo câu truy vấn SQL để lấy thông tin của nhân viên dựa trên mã nhân viên
    $sql = "SELECT * FROM nhanvien WHERE MaNV = '$maNV'";
    $result = mysqli_query($conn, $sql);

    // Kiểm tra xem có dòng dữ liệu nào được trả về hay không
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // Lấy thông tin của nhân viên từ kết quả truy vấn
        // Hiển thị biểu mẫu để người dùng có thể sửa thông tin của nhân viên
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sửa Nhân viên</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="container">
                <h2>Sửa Nhân viên</h2>
                <form action="update_nhanvien.php" method="post">
                    <input type="hidden" name="maNV" value="<?php echo $row['MaNV']; ?>">
                    <label for="tenNV">Tên Nhân Viên:</label><br>
                    <input type="text" id="tenNV" name="tenNV" value="<?php echo $row['TenNV']; ?>"><br>
                    
                    <label for="phai">Phái:</label><br>
                    <input type="text" id="phai" name="phai" value="<?php echo $row['Phai']; ?>"><br>
                    
                    <label for="noiSinh">Nơi Sinh:</label><br>
                    <input type="text" id="noiSinh" name="noiSinh" value="<?php echo $row['NoiSinh']; ?>"><br>
                    
                    <label for="maPhong">Mã Phòng:</label><br>
                    <input type="text" id="maPhong" name="maPhong" value="<?php echo $row['MaPhong']; ?>"><br>
                    
                    <label for="luong">Lương:</label><br>
                    <input type="text" id="luong" name="luong" value="<?php echo $row['Luong']; ?>"><br>
                    
                    <input type="submit" value="Cập nhật">
                </form>
            </div>
        </body>
        </html>
<?php
    } else {
        echo "Không tìm thấy nhân viên có mã " . $maNV;
    }
} else {
    echo "Không có mã nhân viên được cung cấp";
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
