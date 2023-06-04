<!DOCTYPE html>
<html>
<head>
    <title>Xem danh sách thư viện</title>
</head>
<body>

    <h1>Danh sách thư viện</h1>

    <?php
    // Kết nối đến MySQL
    $conn = mysqli_connect("localhost", "root", "", "qlsinhvien");
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    // Thực hiện truy vấn SQL để lấy danh sách 
    $sql = "SELECT masach, tensach, tentacgia, nhaxuatban, namxuatban FROM sach";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Hiển thị bảng danh sách 
        echo "<table border='1'>
            <tr>
                <th>Mã sách</th>
                <th>Tên sách</th>
                <th>Tên tác giả</th>
                <th>Nhà xuất bản</th>
                <th>Năm xuất bản</th>
            </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . $row["masach"] . "</td>
                <td>" . $row["tensach"] . "</td>
                <td>" . $row["tentacgia"] . "</td>
                <td>" . $row["nhaxuatban"] . "</td>
                <td>" . $row["namxuatban"] . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "Không có sách nào trong cơ sở dữ liệu";
    }
