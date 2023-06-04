<!DOCTYPE html>
<html>
<head>
    <title>Xem danh sách sinh viên</title>
</head>
<body>

    <h1>Danh sách khách hàng</h1>

    <?php
    // Kết nối đến MySQL
    $conn = mysqli_connect("localhost", "root", "", "qlsinhvien");
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    // Thực hiện truy vấn SQL để lấy danh sách khách hàng
    $sql = "SELECT makhach, tenkhach, dienthoai, diachi FROM khach";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Hiển thị bảng danh sách khách hàng
        echo "<table border='1'>
            <tr>
                <th>Mã khách hàng</th>
                <th>Tên hàng khách</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
            </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . $row["makhach"] . "</td>
                <td>" . $row["tenkhach"] . "</td>
                <td>" . $row["dienthoai"] . "</td>
                <td>" . $row["diachi"] . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "Không có hàng khách nào trong cơ sở dữ liệu";
    }

    // Đóng kết nối
    mysqli_close($conn);
    ?>

</body>
</html>
