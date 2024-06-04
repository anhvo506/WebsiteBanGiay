<?php
    session_start();
    // if (isset($_POST['log']) ==TRUE)
    if(!empty($_POST) && isset($_POST))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];

        include("db/MySQLConnect.php");
        $sql="SELECT * FROM `taikhoan` WHERE EMAIL= '$email' AND MAT_KHAU ='$password'AND MA_GROUP_QUYEN !=3";
		$result = mysqli_query($connect,$sql);
       

        $sql1="SELECT * FROM `taikhoan` WHERE EMAIL= '$email' AND MAT_KHAU =md5('$password') AND MA_GROUP_QUYEN =3";
        $result1 = mysqli_query($connect,$sql1);

        if(mysqli_num_rows($result)>0) {
            $result1=mysqli_query($connect,$sql);
            $data = mysqli_fetch_assoc($result1);
            $name1=$data['TEN_DANG_NHAP'];
            $temp=$data['MA_GROUP_QUYEN'];
            $_SESSION['id_nhom_quyen']=$temp;
			$_SESSION['admin_name']=$name1;
			$_SESSION['admin_login']=true;
            echo 2;
        } 
        else if(mysqli_num_rows($result1)>0) {
           
            //Lấy Tên Người Dùng
            $resultname =mysqli_query($connect,$sql1);
            $username = mysqli_fetch_assoc($resultname);
            $name=$username['TEN_DANG_NHAP'];
            $_SESSION['customer_name'] = $name;
            $_SESSION['login']=true;
            echo 1;
        }
     
	}
?>
