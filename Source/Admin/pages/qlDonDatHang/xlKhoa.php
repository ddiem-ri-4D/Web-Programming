<?php
    include "../../../lib/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];

        $sql = "SELECT COUNT(*) FROM TaiKhoan WHERE MaTaiKhoan = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if($row[0] == 0)
        {
            //Thực hiện xóa hang ra khỏi DB
            $sql = "DELETE FROM DonDatHang WHERE MaTaiKhoan = $id";
        }
        else
        {
            $sql = "UPDATE DonDatHang SET BiXoa = 1 - BiXoa WHERE MaTaiKhoan = $id";
        }

        DataProvider::ExecuteQuery($sql);
    }

    DataProvider::ChangeURL("../../index.php?c=5");
?>