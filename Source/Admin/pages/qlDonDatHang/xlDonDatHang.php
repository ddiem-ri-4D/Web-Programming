<?php
    include "../../../lib/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $a = $_GET["a"];

        //Kiểm tra có sản phẩm thuộc về hãng đang muốn xóa hay không?
        $sql = "UPDATE DonDatHang SET MaTinhTrang = $a WHERE MaDonDatHang = $id";
        DataProvider::ExecuteQuery($sql);
        
        //Cập nhật số lượng tồn của sản phẩm đối với các đơn hàng bị hủy
        if( $a == 4)
        {
            $sql = "SELECT MaSanPham, SoLuong FROM ChiTietDonDatHang WHERE MaDonDatHang = $id";
            $result = DataProvider::ExecuteQuery($sql);
            while($row = mysqli_fetch_array($result))
            {
                $soLuong = $row["SoLuong"];
                $maSanPham = $row["MaSanPham"];
                $sql = "UPDATE SanPham SET SoLuongTon = SoLuongTon +  $soLuong WHERE MaSanPham = $maSanPham";
                DataProvider::ExecuteQuery($sql);
            }
        }  
    }
    DataProvider::ChangeURL("../../index.php?c=5");
?>