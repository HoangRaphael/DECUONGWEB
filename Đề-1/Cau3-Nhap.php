<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "qlgiaohang";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $makhach = $_POST["makhach"];
    $tenkhach = $_POST["tenkhach"];
    $dienthoai = $_POST["dienthoai"];
    $diachi = $_POST["diachi"];

    $sql = "INSERT INTO khach (makhach, tenkhach, dienthoai, diachisv)
            VALUES ('$makhach', '$tenkhach', '$dienthoai', '$diachi')";

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
    <title>Nhập và xem dữ liệu khách hàng</title>
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
    
<h1>Nhập thông tin khách hàng</h1>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
    Mã khách hàng: <input type="text" name="makhach"><br>
    Tên hàng khách : <input type="text" name="tenkhach"><br>
    Điện thoại : <input type="number" name="dienthoai"><br>
    Địa chỉ: <input type="text" name="diachisv"><br>
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
