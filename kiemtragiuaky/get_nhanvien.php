<?php
include 'config.php';

$sql = "SELECT * FROM nhanvien";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Thông Tin Sinh Viên</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Mã Nhân Viên</th><th>Tên Nhân Viên</th><th>Giới Tính</th><th>Nơi Sinh</th><th>Mã Phòng</th><th>Lương</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["MaNV"]."</td>";
        echo "<td>".$row["TenNV"]."</td>";
        echo "<td>".$row["Phai"]."</td>";
        echo "<td>".$row["NoiSinh"]."</td>";
        echo "<td>".$row["MaPhong"]."</td>";
        echo "<td>".$row["Luong"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 kết quả";
}

mysqli_close($conn);
?>
