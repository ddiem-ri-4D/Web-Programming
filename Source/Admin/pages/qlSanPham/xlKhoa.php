<?php
    include "../../../lib/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];

        $sql = "UPDATE SanPham SET BiXoa = 1 - BiXoa WHERE MaSanPham = $id";
        DataProvider::ExecuteQuery($sql);
    }

    DataProvider::ChangeURL("../../index.php?c=2");
?>