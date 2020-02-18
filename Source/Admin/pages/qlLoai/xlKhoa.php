<?php
    include "../../../lib/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];

        //Kiểm tra có sản phẩm thuộc về loại đnag muốn xóa hay không?
        $sql = "SELECT COUNT(*) FROM SanPham WHERE MaLoaiSanPham = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if($row[0] == 0)
        {
            //Thực hiện xóa loại san rphaamr ra khỏi DB
            $sql = "DELETE FROM LoaiSanPham WHERE MaLoaiSanPham = $id";
        }
        else
        {
            //Thực hiện khóa loại sản phẩm do đã có sản phẩm thuộc về loại này
            $sql = "UPDATE LoaiSanPham SET BiXoa = 1 - BiXoa WHERE MaLoaiSanPham = $id";
        }

        DataProvider::ExecuteQuery($sql);
    }

    DataProvider::ChangeURL("../../index.php?c=3");
?>