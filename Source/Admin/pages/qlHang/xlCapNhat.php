<?php
    include "../../../lib/DataProvider.php";

    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $ten = $_POST["txtTen"];
        $sql = "UPDATE HangSanXuat SET TenHangSanXuat = '$ten' WHERE MaHangSanXuat = $id";
        
        DataProvider::ExecuteQuery($sql);
    }

    DataProvider::ChangeURL("../../index.php?c=4");

?>