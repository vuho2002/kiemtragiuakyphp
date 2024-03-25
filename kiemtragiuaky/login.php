<!-- login_process.php -->
<?php
session_start();

// Kiểm tra xem người dùng đã nhập thông tin đăng nhập chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý thông tin đăng nhập
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập với cơ sở dữ liệu
    // Nếu thông tin đúng, thiết lập session và chuyển hướng đến trang danh sách nhân viên
    if ($username === "admin" && $password === "password") { // Thay thế bằng xác thực với cơ sở dữ liệu thực tế
        $_SESSION['username'] = $username;
        header('Location: list_nhanvien.php');
        exit();
    } else {
        // Thông báo lỗi nếu thông tin đăng nhập không đúng
        echo "Tên đăng nhập hoặc mật khẩu không đúng";
    }
}
?>
