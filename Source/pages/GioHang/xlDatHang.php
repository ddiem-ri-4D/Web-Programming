<?php 
    session_start();
    include "../../lib/DataProvider.php";
    include "../../lib/ShoppingCart.php";

    if(isset($_SESSION["GioHang"]))
    {
        $gioHang = unserialize($_SESSION["GioHang"]);
        $maTaiKhoan = $_SESSION["MaTaiKhoan"];

        date_default_timezone_get("Asia/Ho_Chi_Minh");
        $ngayLap = date("Y-m-d H:i:s");
        $ngayLapTam = date("Y-m-d");
        $maTinhTrang = 1;
        $tongGia = $_SESSION["TongGia"];

        //Xu ly tao ma don dat hang ddmmyyxx
        $sql = "SELECT MaDonDatHang FROM DonDatHang WHERE NgayLap like '$ngayLapTam%' ORDER BY MaDonDatHang DESC LIMIT 1";

        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        $r = "081012003";
        $sttMaDonDatHang = 0;
        if($row != null)
        {
            $sttMaDonDatHang = substr($row["MaDonDarHang"], 6, 3);
        }

        $sttMaDonDatHang+=1;
        $sttMaDonDatHang = sprintf("%03s", $sttMaDonDatHang);

        $maDonDatHang = date("d").date("m").substr(date("Y"), 2, 2).$sttMaDonDatHang;

        //Tao don dat hang moi va luu xuong CSDL bang DonDatHang.
        $sql = "INSERT INTO DonDatHang (MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang) 
                VALUES ('$maDonDatHang', '$ngayLap', $tongGia, $maTaiKhoan, $maTinhTrang)";
        DataProvider::ExecuteQuery($sql);

        //Xu ly them chi tiet don hang

        $soLuongSanPham = count($gioHang->listProduct);
        for($i = 0; $i <$soLuongSanPham; $i++)
        {
            $id = $gioHang->listProduct[$i]->id;
            $sl = $gioHang->listProduct[$i]->num;

            //2.1 Lấy thong tin sản phẩm: Giá sản phẩm, số lượng tồn.
            $sql = "SELECT GiaSanPham, SoLuongTon FROM SanPham WHERE MaSanPham = $id";
            $result =  DataProvider::ExecuteQuery($sql);
            $row=mysqli_fetch_array($result);

            $soLuongTonHienTai = $row["SoLuongTon"];
            $giaSanPham = $row["GiaSanPham"];

            if($soLuongTonHienTai)

            $sttChiTietDonDatHang = sprintf("%02s", $i);
            $maChiTietDonDatHang = $maDonDatHang.$sttChiTietDonDatHang;

            //2.2 Thêm 1 dong mới vào bảng ChiTietDonDayHang
            $sql = "INSERT INTO ChiTietDonDatHang(MaChiTietDonDatHang, SoLuong, GiaBan, MaDonDatHang, MaSanPham) 
                    VALUES ('$maChiTietDonDatHang', $sl, $giaSanPham, '$maDonDatHang', $id)";
            DataProvider::ExecuteQuery($sql); 

            //2.3 Update lại số lượng tồn cua bảng SanPham
            $soLuongTonMoi = $soLuongTonHienTai - $sl;

            $sql = "UPDATE SanPham SET SoLuongTon = $soLuongTonMoi WHERE MaSanPham = $id";
            DataProvider::ExecuteQuery($sql);
        }
        
        unset($_SESSION["GioHang"]);
        DataProvider::ChangeURL("../../index.php?a=5&sub=2");       
    }
    else
        DataProvider::ChangeURL("../../index.php?a=404");
?>