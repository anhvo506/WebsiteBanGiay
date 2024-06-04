<?php
include("../../../db/MySQLConnect.php");
if(isset($_POST)){
    $TenSP=$_POST['tensanpham'];
    $Loai=$_POST['loai'];
    $Mota=$_POST['mota'];
    $Dongia=$_POST['dongia'];
    $Size=$_POST['size'];
    $Soluong=$_POST['soluong'];
    $Url=$_POST['url'];

     # Thêm vào bảng Sản Phẩm
     $query2="INSERT INTO `sanpham`( `TEN_SP`, `SO_LUONG`, `DON_GIA`, `LOAI_SP`, `KICH_THUOC`, `MO_TA`, `HINH_ANH_URL`) 
     VALUES ('$TenSP','$Soluong','$Dongia','$Loai','$Size','$Mota','$Url')";
     mysqli_query($connect,$query2);

   

  
    header("Location:../index.php?manage=products#them");


}





?>