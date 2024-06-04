<style>
	#txQuanlity_detail{
		width:50px;
	}
</style>
<?php
if(isset($_GET['id']) ) $id=$_GET['id'];
$getdetail="SELECT * FROM sanpham WHERE MA_SP=$id ";
$resultDetail=mysqli_query($connect,$getdetail);
$row_product_detail=mysqli_fetch_assoc($resultDetail);
$tensp=$row_product_detail['TEN_SP'];

$price =$row_product_detail['DON_GIA'];
$getTbSize="SELECT KICH_THUOC,SO_LUONG FROM sanpham WHERE TEN_SP='".$tensp."'";
$resultTbSize=mysqli_query($connect,$getTbSize);
/*Kiem tra còn hàng hay không*/
$sum=0;
$resultTbGia=mysqli_query($connect,$getTbSize);
$quanlityOfSize=array();
while($array_Gia=mysqli_fetch_array($resultTbGia)){
	$size=$array_Gia['KICH_THUOC'];
	$tmp=array("$size"=>$array_Gia['SO_LUONG']);
	$quanlityOfSize+=$tmp;
	$disableSize["$size"]="";
	if($quanlityOfSize["$size"]==0)
		$disableSize["$size"]="disabled";
    $sum+=$array_Gia['SO_LUONG'];
}
$disable="";$notification="";$disableQuanlity="";
if (!isset($_GET["size"]))
	$disableQuanlity="disabled";
if ( $sum > 0)  $checksoluong="Còn Hàng"; else {$checksoluong="Hết Hàng";$disable="disabled"; $notification="Sản Phẩm Đã Hết! Xin Quý Khách Vui Lòng Chọn Sản Phẩm Khác !";}

?>
<script>
var selectedSize='<?php
		$selSize="";
		if(isset($_GET['size']))
			$selSize=$_GET['size'];
		echo $selSize;
	?>';
</script>
<div  class="detail">
	<div style="margin: 30px 0;" class="row chitiet">
		<div class="col-md-6 col-sm-12 images" style="padding-right: 5ex;">
			<div class="wrap"  style="padding-right: 5ex;">
				<img id="myImgDetail" class="item img-fluid" src="image/<?php  echo $row_product_detail['HINH_ANH_URL'] ?>" id="img-product-detail" >
				<!-- <strong>Phóng To:</strong>
                <div id="myResultIMGDetail" class="img-zoom-result"></div>	 -->
			</div>


				
		</div>
		<div class="col-md-6 col-sm-12" style="padding-right: 6ex;">
				<div class="titleproduct"><?php  echo $row_product_detail['TEN_SP'] ?></div>
				<div class="price-chitiet">
					<span>Giá bán:</span>
					<strong  style="color: red;font-size: 29px" > <?php  echo number_format($price) ?> VNĐ</strong>
					
				</div>
				<div class="possibility-chitiet">
					<span style="    color: #5F4C0B;font-weight: bold;">Tình trạng:</span>
					<strong class="warn" ><?php echo $checksoluong ?></strong>( Còn: <?php echo $sum ?> sản phẩm ) 
				</div>
				<hr style=" boder: 2ex solid rgb(19, 17, 17); margin: 2ex 3px;">
				<div class="details">
					<span style="text-decoration: underline;">Điểm nổi bật</span>
					<p > <?php echo $row_product_detail['MO_TA'] ?> </p>
				</div>	
				
				<form id="detailForm" action="<?php echo  $_SERVER['REQUEST_URI']; ?>" method="POST">
                	<input type="hidden" name="cart" value="add" />
                    <div class="btn-size_chitiet">
                            <h4 class="ega-swatch__heading font-weight-bold">KÍCH THƯỚC</h4>
                            <div class="size-chitiet">
                           
                            <?php
							$product=$id;
							
							
							
                            while($array_Size=mysqli_fetch_array($resultTbSize)){
                                $size=$array_Size['KICH_THUOC']
                            ?>
                            <a href="index.php?quanly=detail&id=<?php echo $id ?>&product=<?php echo $product++ ?>&size=<?php echo $size ?>">
                                <button type="button" <?php echo $disableSize["$size"] ?> class="btn-chitiet btn-outline-dark" id="btSize<?php echo $size ?>_detail">
                                    <?php  echo $array_Size['KICH_THUOC']?>
                                </button>
                            </a>
                            <?php } ?>
                                
                            </div>
                        </div>
                    <div class="qty-chitiet">
                        <label class="qty-name font-weight-bold">SỐ LƯỢNG: </label>
                        <div class="buttons_added">
                            <input <?php echo $disableQuanlity; ?> style="cursor: pointer;" class="minus is-form" type="button" value="-" onclick="adjustQuanlity(this)">
                            <input <?php echo $disableQuanlity; ?> aria-label="quantity" id="txQuanlity_detail" class="input-qty" min="1" name="quanlity" type="number" value=1 onchange="validateQuanlity(this)">
                            <input <?php echo $disableQuanlity; ?> style="cursor: pointer;" class="plus is-form" type="button" value="+" onclick="adjustQuanlity(this)">
                        </div>
                    </div>
                </form>
				<div class=" button-chitiet row">
					<button type="button" <?php echo $disable ?> id="btAddCart" class="btn btn-outline-primary col-md-4  col-sm-12" value="add" style="float: left;" onclick="checkQuanlity()"><a  style="    font-weight: bold;text-decoration: none;color: #3B0B39"> Thêm Vào Giỏ Hàng</a> </button>
				</div>
                        </br></br>
                <span class="sold-out" ><?php echo $notification ?> </span>
                
			</div> 
				
			 
		</div>
			
	</div>
<script>
	function changeFocus(){
		var size="<?php
			if(isset($_GET['size']))
				$selSize=$_GET['size'];
			echo $selSize;
		?>";
		if(size=='39'){
			document.getElementById("btSize39_detail").style.backgroundColor="#343a40";
			document.getElementById("btSize39_detail").style.color="#FFF"
			document.getElementById("btSize40_detail").style.backgroundColor="";
			document.getElementById("btSize40_detail").style.color="#343a40"
			document.getElementById("btSize41_detail").style.backgroundColor="";
			document.getElementById("btSize41_detail").style.color="#343a40"
		}
		if(size=='40'){
			document.getElementById("btSize39_detail").style.backgroundColor="";
			document.getElementById("btSize39_detail").style.color="#343a40"
			document.getElementById("btSize40_detail").style.backgroundColor="#343a40";
			document.getElementById("btSize40_detail").style.color="#FFF"
			document.getElementById("btSize41_detail").style.backgroundColor="";
			document.getElementById("btSize41_detail").style.color="#343a40"
		}
		if(size=="41"){
		document.getElementById("btSize39_detail").style.backgroundColor="";
		document.getElementById("btSize39_detail").style.color="#343a40"
		document.getElementById("btSize40_detail").style.backgroundColor="";
		document.getElementById("btSize40_detail").style.color="#343a40"
		document.getElementById("btSize41_detail").style.backgroundColor="#343a40";
		document.getElementById("btSize41_detail").style.color="#FFF"
		}
	}
	changeFocus();
	function adjustQuanlity(obj){
		var op=obj.value;
		var MAX=parseInt(<?php
			if(isset($_GET["size"])){
				if(isset($_SESSION["cart_item"][$_GET["product"]]["quanlity"]))
					echo $quanlityOfSize[$_GET["size"]] - $_SESSION["cart_item"][$_GET["product"]]["quanlity"];
				else
					echo $quanlityOfSize[$_GET["size"]];
			}
			else
				echo 0;
		?>);
		var txQuanlity=document.getElementById("txQuanlity_detail");
		if(op=='+'){
			if(txQuanlity.value<MAX)
				txQuanlity.value++;
			else
				alert("Số lượng size <?php if(isset($_GET["size"])) echo $_GET["size"]; ?> đã đạt tối đa");
		}
		else
			if(txQuanlity.value>0)
				txQuanlity.value--;
		if(document.getElementById("txQuanlity_detail").value==0)
			document.getElementById("btAddCart").disabled="disabled";
		else
			document.getElementById("btAddCart").disabled="";
	}
	function validateQuanlity(obj){
		var MAX=parseInt(<?php
			if(isset($_GET["size"])){
				if(isset($_SESSION["cart_item"][$_GET["product"]]["quanlity"]))
					echo $quanlityOfSize[$_GET["size"]] - $_SESSION["cart_item"][$_GET["product"]]["quanlity"];
				else
					echo $quanlityOfSize[$_GET["size"]];
			}
			else
				echo 0;
		?>);
		if(obj.value>MAX){
			alert("Size <?php if(isset($_GET["size"])) echo $_GET["size"]; ?> chỉ còn "+MAX+" sản phẩm");
			obj.value=MAX;
		}
		if(obj.value<0)
			obj.value=0;
		if(obj.value=="")
			obj.value=0;
		if(MAX==0)
			obj.value=0;	
		if(document.getElementById("txQuanlity_detail").value==0)
			document.getElementById("btAddCart").disabled="disabled";
		else
			document.getElementById("btAddCart").disabled="";			
	}
	function checkQuanlity(){

		detailForm.submit();
	}
	if(document.getElementById("txQuanlity_detail").value==0)
		document.getElementById("btAddCart").disabled="disabled";
	else
		document.getElementById("btAddCart").disabled="";
</script>