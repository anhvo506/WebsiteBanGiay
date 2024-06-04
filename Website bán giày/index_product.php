<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
<div class="col-md-12">
    <div class="product-body">
        <div class="col-12">
            <h4 class="pro-heading text-center text-lg-left"><span>Sports </span> Collection</h4>
        </div>
    

    <div class="product-list row">
    <?php
include("db/MySQLConnect.php");
$sql = "SELECT sp.MA_SP ,sp.TEN_SP,sp.DON_GIA,sp.HINH_ANH_URL FROM sanpham as sp WHERE sp.SO_LUONG>0 GROUP BY TEN_SP LIMIT 4";
// $sql="SELECT p.MA_SP,p.TEN_SP,SUM(od.SO_LUONG) AS TotalQuantity ,p.DON_GIA,p.HINH_ANH_URL 
// from sanpham as p inner join chitiethoadon as od on p.MA_SP = od.MA_SP 
// GROUP BY p.TEN_SP ORDER BY SUM(od.SO_LUONG) DESC LIMIT 4";
$result =mysqli_query($connect,$sql);
while($row = mysqli_fetch_array($result)) {   

    ?>
                    <!-- <div id="idsp" ></div> -->
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="row product-item">
                                             <div class="col-12 p-item-img">
                                                 <img src="./image/<?php echo $row['HINH_ANH_URL']; ?>" alt="images">
                                                 <div class="p-item-overlay text-center d-flex justify-content-center align-items-center">
                                                     <div class="btn-container">

                                                     <a class="btn our-btn btn-gradient rounded-pill" href="index.php?quanly=detail&id=<?php echo $row['MA_SP']; ?>">XEM CHI TIẾT</a>
                                                     </div>
                                                 </div>
                                             </div>
                                            <div class="col-12 p-item-detail">
                                              <h4 class="text-center p-item-name">
                                              <?php echo $row['TEN_SP'];?>
                                              </h4>
                                              <p class="text-center p-item-price" style="font-weight: 500; font-size: 18px; color: red;">
                                                <?php echo number_format($row['DON_GIA']); ?>
                                              </p>
                                            </div>
                                        </div>
                                    </div>

<?php }
?>
       

<button type="button" class="btn btn-outline-warning extendend"><a href="index.php?quanly=product"> Xem Thêm</a> </button>

<br>

</div>
    </div>
    
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/main.js"></script>
<!-- <script>
    $(document).ready(function() {
  $('.btnChiTiet').click(function() {
    var id = $(this).data('id');
    $.ajax({
      type: 'GET',
      url: 'detail.php',
      data: {id: id},
      success: function() {
        window.location.href = 'detail.php?id=' + id;
      }
    });
  });
});
</script> -->
</body>
</html>