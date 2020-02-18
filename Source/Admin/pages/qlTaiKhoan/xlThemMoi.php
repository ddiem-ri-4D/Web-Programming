<?php
    include "../../../lib/DataProvider.php";

    // if(isset($_GET["txtTen"]))
    // {
        $ten = $_POST["txtTen"];
        $tenHienThi = $_POST['txtTenHienThi'];
        $diaChi = $_POST['txtDiaChi'];
        $dienThoai = $_POST['txtDienThoai'];
        $email = $_POST['txtEmail'];
        $maLoaiTaiKhoan = $_POST['cmbLoaiTaiKhoan'];

        $sql = "INSERT INTO TaiKhoan(TenDangNhap, MatKhau, TenHienThi, DiaChi, DienThoai, Email, MaLoaiTaiKhoan) 
                VALUES('$ten', '1', '$tenHienThi', '$diaChi', '$dienThoai', '$email'  , $maLoaiTaiKhoan)";
        DataProvider::ExecuteQuery($sql);
    //}

    DataProvider::ChangeURL("../../index.php?c=1");
?>