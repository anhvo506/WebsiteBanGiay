<?php 
include("../../db/MySQLConnect.php");
if (isset($_GET['deletesp'])) {
    $id_ma_sp = $_GET['deletesp'];
    $delete = "DELETE FROM sanpham WHERE MA_SP ='$id_ma_sp'";
    mysqli_query($connect, $delete);
    echo $delete;
    header('Location: index.php?manage=products');
}
?>