<?php
// Kết nối đến cơ sở dữ liệu
include 'config.php';

// Kiểm tra xem có tham số mã nhân viên được truyền qua URL hay không
if(isset($_GET['id'])) {
    $maNV = $_GET['id'];

    // Tạo câu truy vấn SQL để xóa nhân viên dựa trên mã nhân viên
    $sql = "DELETE FROM nhanvien WHERE MaNV = '$maNV'";
    
    // Thực thi câu truy vấn
    if(mysqli_query($conn, $sql)) {
        // Nếu xóa thành công, chuyển hướng người dùng đến trang danh sách nhân viên
        header("Location: list_nhanvien.php");
        exit(); // Dừng kịch bản PHP
    } else {
        // Nếu có lỗi xảy ra, hiển thị thông báo lỗi
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>
