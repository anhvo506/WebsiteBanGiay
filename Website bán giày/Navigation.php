<?php 
          $index="";$product="";
                if(!isset($_GET['quanly'])) $index="active";
                else if($_GET['quanly']=='product') $product="active";
                
                  $getLoaiSP=mysqli_query($connect,"SELECT DISTINCT LOAI_SP FROM sanpham;");
?>
<nav class="navbar navbar-expand-lg navbar-light menunav " id="navbar">

	<div class="col-md-2 col-sm-8"> 
        <a href="index.php">
        <img src="image/logogiay.png" alt="" srcset="" style="width: 120px;">
        </a>
      
    </div>

   <div class="col-md-10 col-sm-2">
        <button class="navbar-toggler d-block d-lg-none" type="button" id="navbarSupportedContent" style="float: right;">
		  <span class="navbar-toggler-icon"  ></span>
          <span class="navbar-toggler-icon" ></span>
          <span class="navbar-toggler-icon" ></span>
		</button>
        <div class="navbar-collapse collapse " id="" >
        <ul class="navbar-nav mr-auto">
        
                <li class="nav-item <?php echo $index ?>">
                <a class="nav-link " href="index.php" style="color: #fff">TRANG CHỦ</span></a>
                </li>
               
                <li class="nav-item <?php echo $product?> dropdown fullmenu" >
                <a class="nav-link " onclick="" id="navbarDropdown" href="index.php?quanly=product" >
                SẢN PHẨM
                </a>
				        <div class="dropdown-content" id="product">
                <?php
                  while ($row_category= mysqli_fetch_array($getLoaiSP)){
                ?>
                    <a class="dropdown-item " href="index.php?quanly=product&type=<?php echo $row_category['LOAI_SP']  ?>"><?php echo $row_category['LOAI_SP'] ?></a> 
                <?php
                  }
                ?>
                </div>
                
                </li>

		    </ul>
        <div class="menu">
            
            <a style="padding-right: 10px;" href="
            <?php
                if(isset($_SESSION['login'])) {
                    if($_SESSION['login']) echo "index.php?quanly=user";
                    // echo "login.php";
                }
                else echo "login.php";
            ?>">
            <?php
                if(isset($_SESSION['login'])) {
                    if($_SESSION['login']) echo $_SESSION['customer_name'];
                    else echo "Đăng Nhập";
                }
                else echo "Đăng Nhập";
            ?>    
        </a>
            
            <?php
            if(isset($_SESSION['login'])) {
                if($_SESSION['login'])  {
                 
                    ?>
                    <a style="padding-right: 10px;" href="logout.php">Đăng Xuất</a>
                    <?php
                }
            } else {
                ?>
                <a style="padding-right: 10px;" href="register.php">Đăng Ký</a>
                <?php
            }
                
            ?>
            
        </div>
		  <button class="btn btn-outline-success my-2 my-sm-0 openBtn  " id="navbarDropdown" type="submit" onclick="openSearch()"><i class="fa fa-search"></i></button>
		  <div class="nav-item icon" style="margin-right: 5ex;" >
         
      <div class="nav-item icon" style="margin-right: 5ex;" onclick="showCartContainer()">
			  <a  class="icon-button"><i class="fas fa-cart-plus"></i></a>
		  </div>
		  </div>
	</div>
   </div>
    
   
</nav>


<div class="navbar-collapse collapse " id="navbarContent" >
        <ul class="navbar-nav mr-auto">
        
                <li class="nav-item <?php echo $index ?>">
                <a class="nav-link " href="index.php" style="color: #fff">TRANG CHỦ</span></a>
                </li>
               
                <li class="nav-item <?php echo $product?> dropdown fullmenu" >
                <a class="nav-link " onclick="" id="navbarDropdown" href="index.php?quanly=product" >
                SẢN PHẨM
                </a>
				        <div class="dropdown-content" id="product">
                <?php
                  while ($row_category= mysqli_fetch_array($getLoaiSP)){
                ?>
                    <a class="dropdown-item " href="index.php?quanly=product&type=<?php echo $row_category['LOAI_SP']  ?>"><?php echo $row_category['LOAI_SP'] ?></a> 
                <?php
                  }
                ?>
                </div>
                
                </li>

		    </ul>
        <div class="menu"  style="padding-left: 10px; margin-top: 30px;">
            
            <a style="padding-right: 10px;" href="
            <?php
                if(isset($_SESSION['login'])) {
                    if($_SESSION['login']) echo "index.php?quanly=user";
                    echo "login.php";
                }
                else echo "login.php";
            ?>">
            <?php
                if(isset($_SESSION['login'])) {
                    if($_SESSION['login']) echo $_SESSION['customer_name'];
                    else echo "Đăng Nhập";
                }
                else echo "Đăng Nhập";
            ?>    
        </a>
            
            <?php
            if(isset($_SESSION['login'])) {
                if($_SESSION['login'])  {
                 
                    ?>
                    <a style="padding-right: 10px;" href="logout.php">Đăng Xuất</a>
                    <?php
                }
            } else {
                ?>
                <a style="padding-right: 10px;" href="register.php">Đăng Ký</a>
                <?php
            }
                
            ?>
            
        </div>
		  <button class="btn btn-outline-success my-2 my-sm-0 openBtn  " style="margin-left: 10px;" id="navbarDropdown" type="submit" ><i class="fa fa-search"></i></button>
		  <div class="nav-item icon" style="margin-right: 5ex;" onclick="showCartContainer()">
			  <a  class="icon-button"><i class="fas fa-cart-plus"></i></a>
		  </div>
		  </div>
	</div>

   

      <!--Search-->
      <div id="myOverlay" class="overlaysearch">
			<span class="closebtn" onclick="closeSearch()" title="Đóng Tìm Kiếm">×</span>
			<div class="overlay-content">
			  <form action="index.php?quanly=search" method ="post">
				<input type="text" style="font-weight: bold; color: #333;" placeholder="Tìm Kiếm..." name="search_product">
				<button type="submit" name="search_submit"><i class="fa fa-search  text-light"></i></button>
			  </form>
			</div>
		  </div>	

