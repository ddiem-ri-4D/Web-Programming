<li class="menu__item">
    <a class="menu__link" href="#">Loại Sản Phẩm</a>
    <div class="dropdown-content">
    <?php
        $sql = "SELECT * FROM LoaiSanPham WHERE BiXoa = 0";
        $result = DataProvider::ExecuteQuery($sql);
        while($row = mysqli_fetch_array($result))
        {
            ?>
                <a href="index.php?a=3&id=<?php echo $row["MaLoaiSanPham"];?>#1111">
                    <?php echo $row["TenLoaiSanPham"];?>
                </a>
            <?php
        }
    ?>  
    </div>    
</li>





