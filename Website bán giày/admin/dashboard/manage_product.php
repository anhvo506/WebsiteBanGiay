        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Quản lý sản phẩm</h3>
              </div>

              <div class="title_right">
               
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
            

              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Thông Tin Sản Phẩm</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                         
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                  <form class="form-inline" action="" method="" id="form-search-product">
                      <label for="tensp" class="mr-sm-2">TÊN :</label>
                      <input type="text" class="form-control mb-2 mr-sm-2"  id="tensp" placeholder="Điền Tên Sản Phẩm" name="tensp" >

                      <label for="giamin" class="mr-sm-2">GIÁ TỪ:</label>
                      <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Điền Giá" name="giamin" >

                      <label for="giamax" class="mr-sm-2">GIÁ ĐẾN:</label>
                      <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Điền Giá" name="giamax" >

                      <label for="loai" class="mr-sm-2">LOẠI:</label>                    
                      <select class=" form-control mb-2 mr-sm-2" id="loai"  name="loai">
                      <option value="Không">Không</option>
                        <?php $get_Loai=mysqli_query($connect,"SELECT DISTINCT LOAI_SP from sanpham  ");
                        while($row_Loai= mysqli_fetch_array($get_Loai)) {       ?>
                        <option value="<?php echo $row_Loai['LOAI_SP']?>"><?php echo $row_Loai['LOAI_SP']?></option>
                      <?php  } ?>
                      </select>

                      <label for="size" class="mr-sm-2">KÍCH THƯỚC:</label>
                      <select class=" form-control mb-2 mr-sm-2" id="size"  name="size">
                      <option value="Không">Không</option>
                        <?php $get_Size=mysqli_query($connect,"SELECT DISTINCT KICH_THUOC from sanpham  ");
                        while($row_Size= mysqli_fetch_array($get_Size)) {       ?>
                        <option value="<?php echo $row_Size['KICH_THUOC']?>"><?php echo $row_Size['KICH_THUOC']?></option>
                      <?php  } ?>
                      </select>
                      <input type="button" id='search-submit' class=" btn btn-warning form-control mb-2 mr-sm-2"value="Tìm" >
                  </form>
                   
                    </p>
                    <!-- <div class="table-responsive"> -->
                    <?php 
                      $query1="SELECT * FROM sanpham";
                      $products = mysqli_query($connect,$query1);
                    ?>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>

                                <th scope = "col">STT</th>
                                <th scope = "col">Tên Sản Phẩm</th>
                                <th scope = "col">Số Lượng</th>
                                <th scope = "col">Đơn Giá</th>
                                <th scope = "col">Loại</th>
                                <th scope = "col">Kích Thước</th>
                                <th scope = "col">Mô Tả</th>
                                <th scope = "col">Hình Ảnh</th>
                                <th scope = "col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody class="search_content">
                        <?php foreach ($products as $product): ?>
                            <tr>
                              <td><?php echo $product['MA_SP']?></td>
                              <td><?php echo $product['TEN_SP']?></td>
                              <td><?php echo $product['SO_LUONG']?></td>
                              <td><?php echo $product['DON_GIA']?></td>
                              <td><?php echo $product['LOAI_SP']?></td>
                              <td><?php echo $product['KICH_THUOC']?></td>
                              <td style="width:30%"> <?php echo $product['MO_TA'] ?> </td>
                              <td style="width:10%"><?php echo $product['HINH_ANH_URL']?></td>
                              <td>
                                  <a href="./action_update_manage_product.php?id=<?php echo $product['MA_SP'] ?>" class="btn btn-primary">Sửa</a>
                                  <button type="button" class="btn btn-success" ><a style="color: white;" href="delete_product.php?deletesp=<?php echo $product['MA_SP'] ?>">Xóa</a></button>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>

                        </table>
                    <!-- </div> -->
							
						
                  </div>
                </div>
              </div>
           

            <div class="col-md-6 col-sm-6">
                  
                  <h2>Nhập Sản Phẩm </h2>
        <form action="./action/add_product.php" method="post" id="them-chi-tiet-phieu-nhap" style="height: ">
            
            
                 
                  <div class="form-group">
                  <label for="masanpham">MÃ SẢN PHẨM:</label>
                  <input type="text" class="form-control" id="masanpham" placeholder="Mã sản phẩm"  name="masanpham" disabled value="">
                  </div>
                  <div class="form-group">
                  <label for="tensanpham">TÊN SẢN PHẨM</label>
                  <input type="text" class="form-control" id="tensanpham" placeholder="Nhập tên sản phẩm" name="tensanpham" value="">
                  <span class="form-message" id="" style="color:red"></span>
                  </div>
                  <label for="loai">LOẠI</label>
                  <select class="form-control" id="loai" placeholder="Nhập loại sản phẩm" name="loai">
                    <option value="Adidas">Adidas</option>
                    <option value="Nike">Nike</option>
                    <option value="Mizuno">Mizuno</option>
                    <option value="Vans">Vans</option>
          
                  </select>
                  <label for="size">KÍCH THƯỚC</label>
                  <select class="form-control" id="size" placeholder="Nhập kích thước" name="size">
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    
                  </select>

                  <div class="form-group">
                  <label for="mota">MÔ TẢ</label>
                  <input type="text" class="form-control" id="mota" placeholder="Mô tả sản phẩm" name="mota" value="" require>
                  <span class="form-message" id="" style="color:red"></span>
                  </div>

                  <div class="form-group">
                  <label for="dongia">ĐƠN GIÁ</label>
                  <input  type="text" class="form-control" id="dongia" placeholder="Nhập đơn giá" name="dongia" value=""require>
                  <span class="form-message" id="" style="color:red"></span>
                  </div>
                  
                  <div class="form-group">
                  <label for="soluong">SỐ LƯỢNG</label>
                  <input type="text" class="form-control" id="soluong" placeholder="Nhập số lượng" name="soluong" value=""require>
                  <span class="form-message" id="" style="color:red"></span>
                  </div>
                  
                  <div class="form-group">
                  <label for="url">HÌNH ẢNH</label>
                  <input type="file" class="form-control" id="url" placeholder="Nhập Tổng Tiền" name="url" value="<?php echo $showTien ?>">
                  <span class="form-message" style="color:red"></span>
                  </div>
                
                  <button type="submit"  class="btn btn-success">Thêm</button>

              </form></div>
          </div>

          </div>
        </div>
        <!-- /page content -->

        <script type="text/javascript">
    $(document).ready(function(){
	  $("#search-submit").click( function(){

		//  kiểm tra thông tin đăng ký hợp lệ hay chưa
		$.ajax({
		  url: './action/action_search_manage_product.php',
		  method: 'get',
		  data: $('#form-search-product').serialize(),
		  success : function(response){
          $('.search_content').html(response);
		  	//alert(response);
      
            }

          })

        });

      });

</script>
