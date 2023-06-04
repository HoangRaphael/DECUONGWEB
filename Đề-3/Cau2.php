
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Câu 4</title>
    <link rel="stylesheet" href="Cau2.css">
</head>
<body >
<?php
function SoNguyenTo($n){
    if($n<=1) return false;
    for($i=2;$i<=sqrt($n);$i++)
    {
        if($n % $i  == 0) return false;
    }
    return true;
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
   case 'songuyento':
      if(SoNguyenTo ($so)) $Resuft="$so là số nguyên tố";
      else $Resuft= "$so không phải là số nguyên tố";
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
                     <input type="radio" name="pt" value="songuyento"/> Nguyên tố
                     <input type="radio" name="pt" value="sochinhphuong"/> Chính phương                   
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
