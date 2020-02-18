<?php 
    include "../../lib/DataProvider.php";
    include "../../lib/ShoppingCart.php"; 
    
    session_start();
?>

<h1 id="1111" style="text-align: center; margin-bottom: 50px; font-weight: bold;"><a href="#">Quản lý giỏ hàng</a></h1>
    <table class="timetable_sub" >
        <thead>
	    	<tr>
	    		<th>STT</th>
	    		<th>Tên sản phẩm</th>
	    		<th>Hình</th>
                <th>Giá</th>
                <th>Số lượng</th>
	    		<th>Thao tác</th>
	    	</tr>
	    </thead>
        <?php
            $tongGia = 0;
            if(isset($_SESSION["GioHang"]))
            {
                $gioHang = unserialize($_SESSION["GioHang"]);

                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                    $gioHang->delete($id);
                    $_SESSION["GioHang"] = serialize($gioHang);
                }

                $soSanPham = count($gioHang->listProduct);

                for($i = 0;$i < $soSanPham;$i++) {

                    $id = $gioHang->listProduct[$i]->id;
                    $sql = "SELECT * FROM SanPham WHERE MaSanPham = $id";

                    $result = DataProvider::ExecuteQuery($sql);
                    $row = mysqli_fetch_array($result);

                    ?>

                    <form id="1111" name="frmGioHang" action ="pages/GioHang/xlCapNhatGioHang.php" method="post" >
                        <tr>
                            <td><?php echo $i + 1;?></td>
                            <td>
                                <?php echo $row["TenSanPham"]; ?>
                            </td>
                            <td align = "center">
                                <img src ="img/<?php echo $row["HinhURL"]; ?>" width="50">
                            </td>
                            <td>
                                <?php echo $row["GiaSanPham"]; ?>
                            </td>
                            <td>
                                <input type="number" name="txtSL" value="<?php echo $gioHang->listProduct[$i]->num; ?>" min="1" max="99999"  style = "border: 1px solid #FDA30E; text-align: center; width:50px;"/>
                                <input type="hidden" name="hdID" value="<?php echo $gioHang->listProduct[$i]->id; ?>" />
                            </td>
                            <td>
                                <input style = " background-color: #fda30ea1;; padding: 3px;"  type="submit" value="Cập nhật số lượng" />
                                <input style = " background-color: #fda30ea1;; padding: 3px;"  type="button" value="Xóa sản phẩm" 
                                        onclick="deleteProductCart(<?php echo $id; ?>)"/>
                            </td>
                        </tr>
                    </form>

                    <?php
                     $tongGia+= $row["GiaSanPham"] * $gioHang->listProduct[$i]->num;
                }
            }

            $_SESSION["TongGia"] = $tongGia;
        ?>
    </table>

    <div class="pprice">
            Tổng Thành Tiền: <?php echo $tongGia; ?>đ
    </div>
    <!-- <a href="pages/GioHang/xlDatHang.php"> -->
    <!-- </a> -->
    <div style = "margin: 2em 0 0 0em;" class="checkout-right-basket animated wow slideInLeft" data-wow-delay=".5s">
        <a href="pages/GioHang/xlDatHang.php"><span class="glyphicon " aria-hidden="true"></span>Đặt hàng</a>
</div>