<?php
    include "../../../lib/DataProvider.php";

    if(isset($_POST["cmbTaiKhoan"]))
    {
        $ngaydat = $_POST["txtNgayDat"];
        $maTaiKhoan = $_POST['cmbTaiKhoan'];
        $tinhTrang = $_POST['cmbTinhTrang'];

        $dateValue = strtotime($ngaydat);          

        $year = substr(date("Y", $dateValue), 2, 2); 
        $month = date("m", $dateValue); 
        $day = date("d", $dateValue);
       
        //set id tự động cấp
        $id = (string)(str_pad($day, 2, '0', STR_PAD_LEFT).str_pad($month, 2, '0', STR_PAD_LEFT).$year);
        $sttid = 0;
        do{
            $sttid = $sttid + 1;
            $sttid = str_pad($sttid, 3, '0', STR_PAD_LEFT);
            $sqlCheckID = "SELECT * FROM DonDatHang 
                           WHERE left(MaDonDatHang, 6) = '$id' AND right(MaDonDatHang, 3) = '$sttid' ";   
            $result = DataProvider::ExecuteQuery($sqlCheckID);
        }while(mysqli_num_rows($result) > 0);
        $id = $id.str_pad($sttid, 3, '0', STR_PAD_LEFT);
        //-------------id tự cấp-------------

        $sql = "INSERT INTO DonDatHang(MaDonDatHang, TongThanhTien, NgayLap, MaTaiKhoan, MaTinhTrang) 
                VALUES ('$id', 0, '$ngaydat', $maTaiKhoan, $tinhTrang)";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=5");
?>