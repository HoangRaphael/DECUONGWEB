<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "qlthuvien";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $masach = $_POST["masach"];
    $tensach = $_POST["tensach"];
    $tentacgia = $_POST["tentacgia"];
    $nhaxuatban = $_POST["nhaxuatban"];
    $namxuatban = $_POST["namxuatban"];

    $sql = "INSERT INTO sach (masach, tensach, tentacgia, nhaxuatban, namxuatban)
            VALUES ('$masach', '$tensach', '$tentacgia', '$nhaxuatban','$namxuatban')";

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
    <title>Nhập và xem dữ liệu sách</title>
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
    
<h1>Nhập thông tin sách </h1>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
    Mã sách: <input type="text" name="masach"><br>
    Tên sách : <input type="text" name="tensach"><br>
    Tên tác giả : <input type="text" name="tentacgia"><br>
    Nhà xuất bản: <input type="text" name="nhaxuatban"><br>
    Năm xuất bản: <input type="number" name="namxuatban"><br>
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

