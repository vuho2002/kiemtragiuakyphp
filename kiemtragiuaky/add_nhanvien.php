<?php
// Kết nối đến cơ sở dữ liệu
include 'config.php'; // Sử dụng kết nối từ file config.php

// Lấy dữ liệu từ form
$maNV = $_POST['maNV'];
$tenNV = $_POST['tenNV'];
$phai = $_POST['phai'];
$noiSinh = $_POST['noiSinh'];
$maPhong = $_POST['maPhong'];
$luong = $_POST['luong'];

// Thêm thông tin sinh viên vào cơ sở dữ liệu
$sql = "INSERT INTO nhanvien (MaNV, TenNV, Phai, NoiSinh, MaPhong, Luong)
        VALUES ('$maNV', '$tenNV', '$phai', '$noiSinh', '$maPhong', '$luong')";

if (mysqli_query($conn, $sql)) {
    echo "New student information added successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Đóng kết nối
mysqli_close($conn);
?>
