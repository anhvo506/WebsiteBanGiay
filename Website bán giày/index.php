<?php
session_start();
include("db/MySQLConnect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/header-website.png" type="image/png" />  
	<title>Giày Store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
    html{
        scroll-behavior: smooth;
    }
    </style>
	
</head>
<body>
<script src="js/jquery.js"></script>
<div class="container-fluid index " id="index" >

	 <!--NAVIGATION-->
    <script>
		function showCartContainer(){
			document.getElementById("cart_container").style.display="block";
			var t=document.getElementById("productCart").childElementCount;
			if(t>4){
				document.getElementById("titleCart").style.width="98.7%";
				document.getElementById("XSign_cart").style.color="black";
			}
			else{
				document.getElementById("titleCart").style.width="100%";	
				document.getElementById("XSign_cart").style.color="white";
			}
		}
	</script>
	<?php require("Navigation.php"); ?>
	
    


    <!--CONTENT-->
    <div class="content">
        <!--BANNER-->
        <?php 
		include("cart.php");
		include("deliveryInfor.php");
        if(!isset($_GET['quanly'])){
         require("slideshow_banner.php"); 
         require("index_product.php"); }
         else if($_GET['quanly']=='user'){
             require("user.php");
         }
         else if($_GET['quanly']=='product'){
             require("allproduct.php");
         }
      
        else if($_GET['quanly']=='detail' ) {
            require("detail.php");
        }
        else if($_GET['quanly']=='search' ) {
            require("search.php");
        }
        
        ?>
	



    </div>
<!--FOOTER-->
<?php require("footer.php");  ?>


</div>



<script src="js/bootstrap.js"></script>
<script src="js/main.js"></script>

</body>

</html>
<?php

?>
