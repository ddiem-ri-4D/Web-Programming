<h1 id="1111" style ="text-align: center; font-weight: bold;"><a href="#">Sản phẩm theo hãng</a></h1>
<div id="pagesAjax">
    <?php
        if(isset($_GET["id"]))
            $id = $_GET["id"];
        else
            DataProvider::ChangeURL("index.php?a=404");

        $page = 1;
        $recordStart = ($page - 1)*4; 
        $strPagination = "LIMIT $recordStart, 4";

        $sql = "SELECT * FROM SanPham 
                WHERE BiXoa = 0 
                    AND MaHangSanXuat = $id
                $strPagination ";

        $result = DataProvider::ExecuteQuery($sql);

        while($row = mysqli_fetch_array($result))
        {
            ?>
               <div class="col-md-3 product-men yes-marg animated wow slideInUp" data-wow-delay=".3s">		
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
    <?php
        $sqlGetPagesNumber = "  SELECT * FROM SanPham 
                                WHERE BiXoa = 0 
                                    AND MaHangSanXuat = $id";

        $result1 = DataProvider::ExecuteQuery($sqlGetPagesNumber);
        
        $count = mysqli_num_rows($result1);
        $numOfPages = floor(($count - 1)/4 + 1);
    ?>
    <ul  class="pagination">
        <li><a onclick="loadPrePage(<?php if($page == 1) echo $numOfPages; else echo $page - 1; ?>, <?php echo $id; ?>, <?php echo $numOfPages;?>)"
        class="btn-pages"><</a></li>
        <?php
            for($i = 0; $i < $numOfPages; $i++){
                ?>
                <li>
                    <a name="checkPage" <?php if($page == $i+1) echo "class='active'" ;?> 
                        onclick="loadPage(<?php echo $i+1; ?>, <?php echo $id; ?>, <?php echo $numOfPages ?>)">
                    <?php echo $i+1; ?>
                </a>    
            </li>
            <?php
            }
            ?>
        <li><a onclick="loadNextPage(<?php if($page == $numOfPages) echo 1; echo $page + 1; ?>, <?php echo $id; ?>, <?php echo $numOfPages;?>)">></a></li>
    </ul>
</div>
<script>
    function loadPrePage(page, id, numOfPages){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pagesAjax").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "pages/Ajax/pAjaxPaginationSanPhamTheoHang.php?p="+page+"&id="+id+"&ps="+numOfPages, true);
        xhttp.send();
    }
    function loadNextPage(page, id, numOfPages){

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pagesAjax").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "pages/Ajax/pAjaxPaginationSanPhamTheoHang.php?p="+page+"&id="+id+"&ps="+numOfPages, true);
        xhttp.send();
    }
    function loadPage(page, id, numOfPages){

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pagesAjax").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "pages/Ajax/pAjaxPaginationSanPhamTheoHang.php?p="+page+"&id="+id+"&ps="+numOfPages, true);
        xhttp.send();
    }

</script>