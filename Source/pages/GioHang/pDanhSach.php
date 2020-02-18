<div id="1111" class="container">
<div id="listProductCart" class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".3s"
        style="overflow: visible;">
    <h1 style="text-align: center; margin-bottom: 50px; font-weight: bold;"><a href="#">Quản lý giỏ hàng</a></h1>
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
                
                $soSanPham = count($gioHang->listProduct);

                for($i = 0;$i < $soSanPham;$i++) {
                    
                    $num = $gioHang->listProduct[$i]->num;
                    $id = $gioHang->listProduct[$i]->id;
                    $sql = "SELECT * FROM SanPham WHERE MaSanPham = $id";

                    $result = DataProvider::ExecuteQuery($sql);
                    $row = mysqli_fetch_array($result);
                    
                    ?>

                    <form name="frmGioHang" action ="pages/GioHang/xlCapNhatGioHang.php" method="post" >
                        <tr>
                            <td><?php echo $i + 1;?></td>
                            <td >
                                <?php 
                                    if(strlen($row["TenSanPham"]) > 30)
                                        echo substr($row["TenSanPham"], 0, 30)."...";
                                    else
                                        echo $row["TenSanPham"];
                                ?>
                            </td>
                            <td align = "center">
                                <img src ="img/<?php echo $row["HinhURL"]; ?>" width="50">
                            </td>
                            <td>
                                <?php echo number_format($row["GiaSanPham"]); ?>
                            </td>
                            <td>
                                <input type="number" name="txtSL" value="<?php echo $num; ?>" min="0" max="<?php echo $row["SoLuongTon"]; ?>"  style = "border: 1px solid #FDA30E; text-align: center; width:50px;" required/>
                                <input type="hidden" name="hdID" value="<?php echo $id; ?>" />
                            </td>
                            <td>
                                <input style = " background-color: #fda30ea1; padding: 3px;"  type="submit" value="Cập nhật số lượng" />
                                <input style = " background-color: #fda30ea1; padding: 3px;"  type="button" value="Xóa sản phẩm" 
                                        onclick="deleteProductCart(<?php echo $id; ?>)"/>
                            </td>
                        </tr>
                    </form>
                    
                    <?php
                    $tongGia += $row["GiaSanPham"] * $gioHang->listProduct[$i]->num;
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
</div>

<script>
    function deleteProductCart(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("listProductCart").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "pages/GioHang/pAjaxDeleteProductCart.php?id="+id, true);
        xhttp.send();
    }
</script>
