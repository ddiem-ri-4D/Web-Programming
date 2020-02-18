
<!-- Sản phẩm mới -->
<div class="animated wow slideInUp" data-wow-delay=".3s">
    <h1 id="1111" style="text-align: center; margin-top: 100px; font-weight: bold;"><a href ="#">Sản phẩm mới nhất</a></h1>
    <?php
       $sql = "SELECT * FROM SanPham WHERE BiXoa = 0 ORDER BY NgayNhap DESC LIMIT 0, 10";
       $result = DataProvider::ExecuteQuery($sql);
       while($row = mysqli_fetch_array($result))
       {
           ?>
               <div class="col-md-3 product-men yes-marg animated wow slideInUp" data-wow-delay="0.3s">		
				<div class="men-pro-item simpleCart_shelfItem">
                    <a href ="index.php?a=4&id=<?php echo $row["MaSanPham"]; ?>#1111" style="color:#333;">
				        <div class="men-thumb-item">
                            <img src="images/<?php echo $row["HinhURL"]; ?>" class="pro-image-front"/>
                            <img src="images/<?php echo $row["HinhURL"]; ?>" class="pro-image-back"/>
                        </div>
                        <div class="item-info-product ">
                            <div class="pname"><?php echo $row["TenSanPham"];?></div>
                            <div class="info-product-price">
                                <div class="pprice">Giá: <?php echo number_format($row["GiaSanPham"]);?>đ</div>
                            </div>
                            <div>
                                <a href ="index.php?a=4&id=<?php echo $row["MaSanPham"]; ?>#1111" class="item_add single-item hvr-outline-out button2">Chi tiết </a>                               
                            </div>                             
                        </div>
                    </a>
                </div>
               </div>
           <?php
       }
    ?>
</div>
<div class="clearfix"></div>

