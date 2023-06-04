<!DOCTYPE html>
<html>
<head>
	<title>Xem danh sách sinh viên</title>
</head>
<body>

	<h1>Danh sách sinh viên</h1>

	<?php
	// Kết nối đến MySQL
	$conn = mysqli_connect("localhost", "root", "", "qlsinhvien");
	if (!$conn) {
		die("Kết nối không thành công: " . mysqli_connect_error());
	}

	// Thực hiện truy vấn SQL để lấy danh sách sinh viên
	$sql = "SELECT masv, tensv, ngaysinh, gioitinh, diachisv FROM sinhvien";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// Hiển thị bảng danh sách sinh viên
		echo "<table border='1'>
			<tr>
				<th>Mã SV</th>
				<th>Tên SV</th>
				<th>Ngày sinh</th>
				<th>Giới tính</th>
				<th>Địa chỉ</th>
			</tr>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr>
				<td>" . $row["masv"] . "</td>
				<td>" . $row["tensv"] . "</td>
				<td>" .$row["ngaysinh"] . "</td>
				<td>" . $row["gioitinh"] . "</td>
				<td>" . $row["diachisv"] . "</td>
			</tr>";
		}
		echo "</table>";
	} else {
		echo "Không có sinh viên nào trong cơ sở dữ liệu";
	}

	// Đóng kết nối
	mysqli_close($conn);
	?>

</body>
</html>