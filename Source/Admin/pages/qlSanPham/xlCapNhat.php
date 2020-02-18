<?php
     include "../../../lib/DataProvider.php";
     
    if(isset($_POST["txtTen"]))
	{
		$ten = $_POST["txtTen"];
		$gia = $_POST["txtGia"];
		$hang = $_POST["cmbHang"];
		$loai = $_POST["cmbLoai"];
		$ton = $_POST["txtTon"];
		$ban = $_POST["txtBan"];
		$id = $_POST["id"];

		if(isset($_POST["txtMoTa"]))
			$MoTa = $_POST["txtMoTa"];
		else
			$MoTa = '';
		
		if(isset($_FILES["fHinh"]) && $_FILES["fHinh"]["size"] > 0)
		{	
			//Thực hiện upload file
			move_uploaded_file($_FILES["fHinh"]["tmp_name"], "../img/".$_FILES["fHinh"]["name"]);

			if(file_exists("../img/".$_FILES["fHinh"]["name"]))
				$hinhURL = $_FILES["fHinh"]["name"];
			else
				$hinhURL = "errorUpload.png";
		
			$sql = "UPDATE SanPham SET TenSanPham = '$ten', GiaSanPham = $gia, MaLoaiSanPham = $loai, MaHangSanXuat = $hang, SoLuongTon = $ton, SoLuongBan = $ban, MoTa = '$MoTa', HinhURL = '$hinhURL' WHERE MaSanPham = $id";
		}
		else
		{
			$sql = "UPDATE SanPham SET TenSanPham = '$ten', GiaSanPham = $gia, MaLoaiSanPham = $loai, MaHangSanXuat = $hang, SoLuongTon = $ton, SoLuongBan = $ban, MoTa = '$MoTa' WHERE MaSanPham = $id";
		}
		
		echo $sql;
		
		DataProvider::ExecuteQuery($sql);
	}

    DataProvider::ChangeURL("../../index.php?c=2");

?>