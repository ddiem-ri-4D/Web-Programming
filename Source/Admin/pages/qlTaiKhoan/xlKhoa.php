<?php
    include "../../../lib/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sql = "UPDATE TaiKhoan SET BiXoa = 1 - BiXoa WHERE MaTaiKhoan = $id";
        DataProvider::ExecuteQuery($sql);
    }

    DataProvider::ChangeURL("../../index.php?c=1");

?>