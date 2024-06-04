<?php
class PerPage {
	public $perpage;
	
	function __construct() {
		$this->perpage = 6;
	}
	
	function getAllPageLinks($count,$href) {
		$output = '';
		if(!isset($_GET["page"])) $_GET["page"] = 1;
		if($this->perpage != 0)
			$pages  = ceil($count/$this->perpage);
		if($pages>1) {
			if($_GET["page"] == 1) //o trangg dau tien
				$output = $output . '<span class="link first disabled">&#8810;</span><span class="link disabled">&#60;</span>';
			else	
				$output = $output . '<a href="#header" class="link first" onclick="getresult(\'' . $href . (1) . '\')" >&#8810;</a><a href="#header" class="link" onclick="getresult(\'' . $href . ($_GET["page"]-1) . '\')" >&#60;</a>';
			

			if(($_GET["page"]-3)>0) { //kiểm tra xem có cần hiển thị liên kết đến trang 1
				if($_GET["page"] == 1)
					$output = $output . '<span id=1 class="link current">1</span>';
				else				
					$output = $output . '<a href="#header" class="link" onclick="getresult(\'' . $href . '1\')" >1</a>';
			}
			// if(($_GET["page"]-3)>1) {
			// 		$output = $output . '<span class="dotSign">...</span>';
			// }
			
			for($i=($_GET["page"]-2); $i<=($_GET["page"]+2); $i++)	{  //tạo các liên kết đến các trang con 
				if($i<1) continue;
				if($i>$pages) break;
				if($_GET["page"] == $i)
					$output = $output . '<span id='.$i.' class="link current">'.$i.'</span>';
				else				
					$output = $output . '<a href="#header" class="link" onclick="getresult(\'' . $href . $i . '\')" >'.$i.'</a>';
			}
			
			// if(($pages-($_GET["page"]+2))>1) {
			// 	$output = $output . '<span class="dotSign">...</span>';
			// }
			// if(($pages-($_GET["page"]+2))>0) {
			// 	if($_GET["page"] == $pages)
			// 		$output = $output . '<span id=' . ($pages) .' class="link current">' . ($pages) .'</span>';
			// 	else				
			// 		$output = $output . '<a href="#header" class="link" onclick="getresult(\'' . $href .  ($pages) .'\')" >' . ($pages) .'</a>';
			// }
			
			if($_GET["page"] < $pages)  //có ít nhất một trang tiếp theo hai liên kết sẽ được thêm vào biến $output để chuyển đến trang tiếp theo và trang cuối cùng
				$output = $output . '<a href="#header" class="link" onclick="getresult(\'' . $href . ($_GET["page"]+1) . '\')" >></a><a href="#header" class="link" onclick="getresult(\'' . $href . ($pages) . '\')" >&#8811;</a>';
			else				
				$output = $output . '<span class="link disabled">></span><span class="link disabled">&#8811;</span>';
			
			
		}
		return $output;
	}
}
?>