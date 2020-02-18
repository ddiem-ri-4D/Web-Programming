
	<?php 
		session_start();
        include "../lib/DataProvider.php";
        
		if($_POST['username'] && $_POST['password'])
		{
			$us = $_POST['username'];
			$ps = $_POST['password'];
			$sql = "SELECT * FROM TaiKhoan WHERE TenDangNhap = '$us' AND MatKhau = '$ps' AND  BiXoa = 0";
            
            $result =  DataProvider::ExecuteQuery($sql);
            $row = mysqli_fetch_array($result);

            if($row == null)
                DataProvider::ChangeURL("../index.php?a=404&id=1");
            else
            {
                //Đăng nhập thành công --> Lưu Session
                $_SESSION["MaTaiKhoan"] = $row["MaTaiKhoan"];
                $_SESSION["MaLoaiTaiKhoan"] = $row["MaLoaiTaiKhoan"];
                $_SESSION["TenHienThi"] = $row["TenHienThi"];

                if($row["MaLoaiTaiKhoan"] == 2)
                {
                    //Tai khoan Admin
                    DataProvider::ChangeURL("../Admin/index.php");
                }
                else
                {
                    //tai khoan  User thuong
                    DataProvider::ChangeURL("../index.php");
                    //  $curURL = $_SESSION["path"];
                    //  if(strpos($curURL, "a=404&id=1") == 20)
                    //      DataProvider::ChangeURL("index.php");
                    //  else
                    //      DataProvider::ChangeURL($curURL);
                }
            }
        }
        else
            DataProvider::ChangeURL("../index.php?a=404&id=1");
 ?>
	