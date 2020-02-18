<?php 
    if(!isset($_GET["id"]))
        DataProvider::ChangeURL("index.php?c=404");
    
    $id = $_GET["id"];
    $sql = "SELECT d.MaDonDatHang, d.NgayLap, d.TongThanhTien, t.TenHienThi, t.DiaChi, t.DienThoai, 
    tt.MaTinhTrang, tt.TenTinhTrang FROM DonDatHang d, TaiKhoan t, TinhTrang tt
    WHERE d.MaTaiKhoan = t.MaTaiKhoan AND d.MaTinhTrang = tt.MaTinhTrang  AND d.MaDonDatHang = $id";
    $result = DataProvider::ExecuteQuery($sql); 
    $row = mysqli_fetch_array($result);
?>
 <fieldset style="font-size: 14px;">
    <legend style="font-size: 25px;">Thông tin đơn đặt hàng </legend>
    <div>
        <span>Mã đơn đặt hàng: </span>
        <?php echo $row["MaDonDatHang"];?>
    </div>
    <div>
        <span>Ngày đặt hàng: </span>
        <?php echo $row["NgayLap"];?>
    </div>
    <div>
        <span>Tên khách hàng: </span>
        <?php echo $row["TenHienThi"];?>
    </div>
    <div>
        <span>Địa chỉ giao hàng: </span>
        <?php echo $row["DiaChi"];?>
    </div>
    <div>
        <span>Tổng thành tiền: </span>
        <?php echo $row["TongThanhTien"];?> đồng
    </div>
    <div class="btntinhtrang" style="margin: 20px;"> 
        <a class="col-sm-3" href="pages/qlDonDatHang/xlDonDatHang.php?a=2&id=<?php echo $id; ?>" style="text-decoration: none;">
            <button class="btn btn-info btn-block center "> Đang giao hàng </button>
        </a>
        <a class="col-sm-3" href="pages/qlDonDatHang/xlDonDatHang.php?a=3&id=<?php echo $id; ?>" style="text-decoration: none;">
            <button class="btn btn-success btn-block center"> Thanh toán </button>
        </a>
        <a class="col-sm-3" href="pages/qlDonDatHang/xlDonDatHang.php?a=4&id=<?php echo $id; ?>" style="text-decoration: none;">
            <button class="btn btn-danger btn-block center"> Hủy </button>
        </a>
        <a class="col-sm-3" href="#" onclick="window.print();" style="text-decoration: none;">
            <button class="btn btn-warning btn-block center"> In đơn hàng </button>
        </a>    
    </div>
</fieldset>
<h2 style="font-size: 25px;">Chi tiết đơn hàng</h2>
<div class="col-sm-12">	
    <div class="panel-heading">
        <table cellspacing = "0" border="1" class="table table-hover table-striped" style="font-size:12px">
            <tr>
                <th width ="100">STT</th>
                <th width ="150">Tên sản phẩm</th>
                <th width ="100">Hình</th>
                <th width ="100">Số lượng</th>
                <th width ="200">Gía bán</th>
            </tr>
            <?php
                $sql = "SELECT s.TenSanPham, s.HinhURL, c.SoLuong, c.GiaBan FROM ChiTietDonDatHang c, SanPham s
                WHERE c.MaSanPham = s.MaSanPham AND c.MaDonDatHang = $id";
                $result = DataProvider::ExecuteQuery($sql);
                $i = 1;
                while($row = mysqli_fetch_array($result))
                {         
                    ?>
                    <tr class="<?php echo $c; ?>">
                            <td><?php echo $i++;?></td>
                            <td><?php echo $row["TenSanPham"];?></td>           
                            <td>
                                <img src="images/<?php echo $row["HinhURL"]; ?>" height="35"/>
                            </td>                  
                            <td><?php echo $row["SoLuong"];?></td>
                            <td><?php echo $row["GiaBan"];?></td>
                    </tr>        
                    <?php
                }
            ?>
        </table>
    </div>
</div>