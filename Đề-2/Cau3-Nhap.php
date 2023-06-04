<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "qlsinhvien";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $masv = $_POST["masv"];
    $tensv = $_POST["tensv"];
    $ngaysinh = $_POST["ngaysinh"];
    $gioitinh = $_POST["gioitinh"];
    $diachi = $_POST["diachisv"];

    $sql = "INSERT INTO sinhvien (masv, tensv, ngaysinh, gioitinh, diachisv)
            VALUES ('$masv', '$tensv', '$ngaysinh', '$gioitinh', '$diachi')";

    if (mysqli_query($conn, $sql)) {
        $message = "Thêm dữ liệu thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" .  mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nhập và xem dữ liệu sinh viên</title>
</head>
<style>
    .hehe{
        margin-left: 70px;
        margin-top: -18px;
    }
    .xem{
        margin-top: 10px;
    }
</style>
<body>
    
<h1>Nhập dữ liệu sinh viên</h1>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
    Mã sinh viên: <input type="text" name="masv"><br>
    Tên sinh viên: <input type="text" name="tensv"><br>
    Ngày sinh: <input type="date" name="ngaysinh"><br>
    Giới tính: <input type="radio" name="gioitinh" value="Nam">Nam
              <input type="radio" name="gioitinh" value="Nữ">Nữ<br>
    Địa chỉ: <input type="text" name="diachi"><br>
    <div class="xem">
    <input type="submit" value="Thêm"></div>
</form>
<form method="POST" action="xem.php">
    <div class="hehe">
    <input type="submit" value="Xem">
    </div>
</form>
</form>
	<?php if (!empty($message)) {
        echo $message;
    } ?>
</body>
</html>