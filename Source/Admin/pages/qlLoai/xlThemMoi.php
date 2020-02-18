<?php
    include "../../../lib/DataProvider.php";

    if(isset($_POST["txtTen"]))
    {
        $ten = $_POST["txtTen"];

        $sql = "INSERT INTO LoaiSanPham(TenLoaiSanPham, BiXoa) VALUES ('$ten', 0) ";
        DataProvider::ExecuteQuery($sql);
    }

    DataProvider::ChangeURL("../../index.php?c=3");
?>