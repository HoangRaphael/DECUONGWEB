<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiemtra.php</title>
    <link rel="stylesheet" href="Cau2.css">
</head>
<body >
<?php
function fibonacci($n){
    if($n==0||$n==1||$n==2) return true;
    $so1=0;$so2=1;$kq=1;
    while($kq<$n)
    {
        $so1=$so2;
        $so2=$kq;
        $kq=$so1+$so2;
    }
    if($kq==$n) return true;
    else return false;
}

function SoChinhPhuong($n){
    if($n<=0) return false;
    if(((int)sqrt($n))*((int)sqrt($n))==$n) return true;
    else return false;
}

?>
<?php
  if(isset($_POST["submit"])&&isset($_POST["so"])&&isset($_POST["pt"])){
  $pt=$_POST["pt"];
  $so=$_POST["so"];
  switch ($pt) {
   case 'sofibo':
      if(fibonacci ($so)) $Resuft="$so là số Fibonacci";
      else $Resuft= "$so không phải là số Fibonacci";
      break; 
   case 'sochinhphuong':
      if(SoChinhPhuong($so)) $Resuft="$so là số chính phương";
      else $Resuft= "$so không phải là số chính phương";
   break;
    default:
          break;
            }
    }
?>

<form action="" method="POST">
<div class="container">
    <div class="form" id="form">
        <div class="content">
            <h1>KIỂM TRA</h1>
            <div class="group">
                     Chọn:
                     <input type="radio" name="pt" value="sochinhphuong"/> Chính phương
                     <input type="radio" name="pt" value="sofibo"/> Fibonacci                  
                </div>

            <div class="group">
                    <label for="number">Nhập vào một số:</label>
                    <input type="number" name="so" value="<?php if(isset($_POST["submit"])&&isset($_POST["so"])&&isset($_POST["pt"]))
                    { echo ($so);
                      }
                  ?>">
                </div>

            <div class="group">
                    Kết quả:
                    <input size="29" type="text" id="ketqua" name="ketqua" readonly value="<?php if(isset($_POST["submit"]) && isset($_POST["so"]) && isset($_POST["pt"])) { echo ($Resuft);}?>">             
                </div>
            <div class="button">
            <input type="submit" name="submit" value="Thực hiện">
            </div>
        </div>
    </div>
</div>
</body>
</html>
