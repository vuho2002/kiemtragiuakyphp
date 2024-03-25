<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sinh viên</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Danh sách Nhân viên</h2>
        <table>
            <thead>
                <tr>
                    <th style="width: 10%;">Mã NV</th>
                    <th style="width: 20%;">Tên NV</th>
                    <th style="width: 10%;">Phái</th>
                    <th style="width: 20%;">Nơi Sinh</th>
                    <th style="width: 20%;">Mã Phòng</th>
                    <th style="width: 20%;">Lương</th>
                    <th style="width: 10%;">Action</th> <!-- Thêm cột Action -->
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';

                $result_per_page = 5;

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
                $this_page_first_result = ($page - 1) * $result_per_page;

                $sql = "SELECT * FROM nhanvien LIMIT $this_page_first_result, $result_per_page";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row["MaNV"]."</td>";
                        echo "<td>".$row["TenNV"]."</td>";
                        echo "<td>";
                        if ($row["Phai"] == 'NU') {
                            echo '<img src="images/nu.jpg" alt="Nữ" style="width: 50px;">';
                        } else {
                            echo '<img src="images/man.jpg" alt="Nam" style="width: 50px;">';
                        }
                        echo "</td>";
                        echo "<td>".$row["NoiSinh"]."</td>";
                        echo "<td>".$row["MaPhong"]."</td>";
                        echo "<td>".$row["Luong"]."</td>";
                        // Thêm nút Xóa và Sửa
                        echo "<td><a href='delete_nhanvien.php?id=" . $row["MaNV"] . "'>Xóa</a> | <a href='edit_nhanvien.php?id=" . $row["MaNV"] . "'>Sửa</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>

        <?php
        include 'config.php';

        $sql = "SELECT COUNT(*) AS total FROM nhanvien";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $total_pages = ceil($row["total"] / $result_per_page);

        echo "<br>";
        for ($page = 1; $page <= $total_pages; $page++) {
            echo '<a href="list_nhanvien.php?page=' . $page . '">' . $page . '</a> ';
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
