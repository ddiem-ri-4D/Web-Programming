<?php
    include "../../../lib/DataProvider.php";

    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $ten = $_POST["txtTen"];
        $sql = "UPDATE LoaiSanPham SET TenLoaiSanPham = '$ten' WHERE MaLoaiSanPham = $id";
        
        DataProvider::ExecuteQuery($sql);
    }

    DataProvider::ChangeURL("../../index.php?c=3");

?>