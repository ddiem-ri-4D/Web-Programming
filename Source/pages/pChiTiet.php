<h1 id="1111" style ="text-align: center; font-weight: bold;"><a href ="#">Thông tin chi tiết sản phẩm</a></h1>
<?php
    if(isset($_GET["id"]))
        $id = $_GET["id"];
    else
        DataProvider::ChangeURL("index.php?a=404");

    $sql = "SELECT s.MaSanPham, s.TenSanPham, s.GiaSanPham, s.SoLuongTon, s.SoLuongBan, s.SoLuocXem, s.HinhURL, s.MoTa, h.TenHangSanXuat, 
    l.TenLoaiSanPham FROM SanPham s, HangSanXuat h, LoaiSanpham l WHERE s.BiXoa = 0 AND  s.MaHangSanXuat = h.MaHangSanXuat 
    AND s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaSanPham = $id"; 
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);

    if($row == null)
        DataProvider::ChangeURL("index.php?a=404");
?>
<div class="single animated wow slideInUp" data-wow-delay=".3s" style="padding-bottom: 0;">
    <div id="container">
        <div class="img-detail">
            <img src="img/<?php echo $row["HinhURL"];?>" width = 30%>
        </div>
    
        <div class="col-md-7 single-right-left" style="text-align: center; margin-top: 100px;">
            <div>
                <!-- <span class="item_price">Tên sản phẩm:</span> -->
                <h3 class="item_price" style="padding-bottom: 10px;"><?php echo $row["TenSanPham"];?></h3>
            </div>
            <div>
                <span class="icolor-quality-right" style="font-weight: bold;">Giá:</span>
                <span class="item_price"><?php echo number_format($row["GiaSanPham"]);?> đ</span>
            </div>
            <div>
                <span class="color-quality-right" style="font-weight: bold;">Hãng sản xuất:</span>
                <span class="item_price"><?php echo $row["TenHangSanXuat"];?></span>
            </div>
            <div>
                <span class="color-quality-right" style="font-weight: bold;">Loại sản phẩm:</span>
                <span class="item_price"><?php echo $row["TenLoaiSanPham"];?></span>
            </div>
            <div>
                <span class="color-quality-right" style="font-weight: bold;">Số lượng:</span>
                <span class="item_price"><?php echo $row["SoLuongTon"];?> sản phẩm</span>
            </div>
            <div>
                <span class="color-quality-right" style="font-weight: bold;">Số lượng đã bán:</span>
                <span class="item_price"><?php echo $row["SoLuongBan"];?> sản phẩm</span>
            </div>
            <div>
                <span class="color-quality-right" style="font-weight: bold;">Số lược xem:</span>
                <span class="item_price"><?php echo $row["SoLuocXem"] + 1;?> lược</span>
            </div>
            <div id ="mota">
                <?php echo $row["MoTa"];?>
            </div>
            <div class="giohang">
                <?php
                    if(isset($_SESSION["MaTaiKhoan"]))
                    {
                        ?>                      
                            <div class="occasion-cart">
                                <a  class="item_add hvr-outline-out button2" 
                                    <?php
                                        if($row["SoLuongTon"] < 1)
                                            echo "href='index.php?a=404&id=4'";
                                        else
                                            echo "href='index.php?a=5&id=".$row['MaSanPham']."#1111'";
                                    ?> 
                                    >
                                    Add to cart
                                </a>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>  
    </div>
    <div class="same-kind">
        <h1 style="text-align:center; font-weight: bold; user-select: none;"><a href ="#">Sản phẩm cùng loại</a></h1>
        <div class="product-items">
        <?php
            $sql = "SELECT * FROM SanPham
                    WHERE MaLoaiSanPham in 
                        (SELECT MaLoaiSanPham FROM SanPham WHERE MaSanPham = $id)
                    LIMIT 0, 5";
            $result = DataProvider::ExecuteQuery($sql);

            while($row1 = mysqli_fetch_array($result)){
                ?>
                    <a class="item" href ="index.php?a=4&id=<?php echo $row1["MaSanPham"]; ?>#1111">
                        <img src="img/<?php echo $row1["HinhURL"]; ?>">
                        <div class="item-content">
                            <span>
                                <?php
                                    if(strlen($row1["TenSanPham"]) > 14){
                                        echo substr($row1["TenSanPham"], 0, 14)."...";
                                    }
                                    else{
                                        echo $row1["TenSanPham"];
                                    }
                                ?>
                            </span>
                            <span>Giá: <?php echo number_format($row1["GiaSanPham"]); ?>đ</span>
                            <div>Chi tiết </div>
                        </div>
                    </a>
                <?php
            }
        ?>
        </div>      
    </div>
</div>
<?php 
    //Cap nhat lai so luoc xem vao CSDL
    $SoLuocXem = $row["SoLuocXem"] + 1;
    $sql = "UPDATE SanPham SET SoLuocXem = $SoLuocXem
            WHERE  MaSanPham = $id";
    DataProvider::ExecuteQuery($sql);
?>