<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-dashboard"></i> <span>Giày Store</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../image/logogiay.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xin Chào,</span>
                <h2><?php if (isset( $_SESSION['admin_name']) ) {
							if( $_SESSION['admin_name'])  echo $_SESSION['admin_name']; }?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Tổng Quan</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Trang Chủ <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <?php
                    /*Phân Quyền Linh Động*/
                      $get="SELECT * FROM `quyen` WHERE quyen.MA_GROUP_QUYEN=".$_SESSION['id_nhom_quyen']."";
                      $result=mysqli_query($connect,$get);
                      while ($data=mysqli_fetch_array($result)){
                        if($data['MA_DANH_MUC'] == 1) $id_quyen="orders";
                        else if($data['MA_DANH_MUC'] == 2) $id_quyen="products";
                        else if($data['MA_DANH_MUC'] == 3) $id_quyen="accounts";
                        else if($data['MA_DANH_MUC'] == 4) $id_quyen="user";
                        else  $id_quyen="permission";
                    ?>
                      <li><a href="index.php?manage=<?php echo $id_quyen ?>"><?php echo $data['TEN_QUYEN']  ?></a></li>
                 
                    <?php
                      }
                    ?>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Thống Kê <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?manage=thongke">Bảng Thống Kê</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            
          </div>
        </div>