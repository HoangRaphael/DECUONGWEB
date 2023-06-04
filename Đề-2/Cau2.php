
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Câu 5</title>
    <link rel="stylesheet" href="Cau2.php">
</head>
<body >
<?php
function SoHoanHao($n){
    if($n==0) return false;
    $sum=0;
    for($i=1;$i<=$n/2;$i++)
    {
        if($n%$i==0) $sum+=$i;
    }
    if($sum==$n) return true;
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
   case 'sohoanhao':
      if(SoHoanHao ($so)) $Resuft="$so là số hoàn hảo";
      else $Resuft= "$so không phải là số hoàn hảo";
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
                     <input type="radio" name="pt" value="sohoanhao"/> Hoàn hảo               
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
