<?php
// Kết nối đến cơ sở dữ liệu
include 'config.php';

// Kiểm tra xem dữ liệu đã được gửi từ biểu mẫu sửa nhân viên hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các trường thông tin đã được điền và không rỗng
    if (isset($_POST['maNV']) && isset($_POST['tenNV']) && isset($_POST['phai']) && isset($_POST['noiSinh']) && isset($_POST['maPhong']) && isset($_POST['luong'])) {
        // Lấy dữ liệu từ biểu mẫu
        $maNV = $_POST['maNV'];
        $tenNV = $_POST['tenNV'];
        $phai = $_POST['phai'];
        $noiSinh = $_POST['noiSinh'];
        $maPhong = $_POST['maPhong'];
        $luong = $_POST['luong'];

        // Câu truy vấn SQL để cập nhật thông tin của nhân viên trong cơ sở dữ liệu
        $sql = "UPDATE nhanvien SET TenNV='$tenNV', Phai='$phai', NoiSinh='$noiSinh', MaPhong='$maPhong', Luong='$luong' WHERE MaNV='$maNV'";

        // Thực thi câu truy vấn
        if (mysqli_query($conn, $sql)) {
            echo "Thông tin nhân viên đã được cập nhật thành công.";
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
