
<li class="menu__item"><a class="menu__link" href="#">Nhà sản xuất</a>  
    <div class="dropdown-content">
    <?php
            $sql = "SELECT * FROM HangSanXuat WHERE BiXoa = 0";
            $result = DataProvider::ExecuteQuery($sql);
            while($row = mysqli_fetch_array($result))
            {
                ?>  
                    <a href="index.php?a=2&id=<?php echo $row["MaHangSanXuat"]; ?>#1111">
                        <?php echo $row["TenHangSanXuat"]; ?>
                    </a>
                <?php
            }
        ?>     
    </div>    
</li>