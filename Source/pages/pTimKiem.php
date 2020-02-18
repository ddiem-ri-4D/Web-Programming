<h1 id="1111" style="text-align: center; margin-top: 100px; font-weight: bold;"><a href ="#">Kết quả tìm kiếm</a></h1>
<div id="pagesAjax">
    <?php
        //để kiểm tra một biến nào đó đã được khởi tạo trong bộ nhớ của máy tính hay chưa, 
        //nếu nó đã khởi tạo (tồn tại) thì sẽ trả về TRUE và ngược lại sẽ trả về FALSE.
        if(isset($_SESSION["sqlSearch"])){
            unset($_SESSION["sqlSearch"]);
        }
        //Hàm unset() sẽ loại bỏ một hoặc nhiều biến được truyền vào. 
        //Hàm unset() cũng có thể được sử dụng để loại bỏ một phần tử xác định trong mảng
        if(isset($_POST["txtSearch"]))
        {
            $sProduct = $_POST["txtSearch"];

            if(isset($_POST['checkboxProducerAll'])){
                $strProcuder = '1';
            }
            else{
                if(isset($_POST['checkboxProducer'])){
                    $arr = $_POST['checkboxProducer'];
                    $strProcuder = 'MaHangSanXuat = '.implode(' or MaHangSanXuat = ', $arr); 
                }
                else{

                    $strProcuder = '1'; 
                }
            }

            if(isset($_POST['checkboxTypeProAll'])){
                $strTypePro = '1';
            }
            else{
                if(isset($_POST['checkboxTypePro'])){
                    $arr = $_POST['checkboxTypePro'];
                    $strTypePro = 'MaLoaiSanPham = '.implode(' or MaLoaiSanPham = ', $arr); 
                }
                else{
                    $strTypePro = '1'; 
                }
            }

            if($_POST["radioSort"] == 'newProduct'){
                $strSort = 'NgayNhap DESC';
            }
            else if($_POST["radioSort"] == 'sellProductMax'){
                $strSort = 'SoLuongBan DESC';
            }
            else if($_POST["radioSort"] == 'famousProduct'){
                $strSort = 'SoLuocXem DESC';
            }
            else if($_POST["radioSort"] == 'priceProductLowToHigh'){
                $strSort = 'GiaSanPham ASC';
            }
            else{
                $strSort = 'GiaSanPham DESC';
            }

            $page = 1;
            $recordStart = ($page - 1)*4; 
            $strPagination = "LIMIT $recordStart, 4";

            $sql = " SELECT * 
                     FROM SanPham
                     WHERE BiXoa = 0
                         AND TenSanPham LIKE N'%$sProduct%' 
                         AND ($strProcuder)
                         AND ($strTypePro) 
                     ORDER BY $strSort 
                     $strPagination ";

            $_SESSION["sqlSearch"] = "  SELECT * 
                                        FROM SanPham
                                        WHERE BiXoa = 0
                                            AND TenSanPham LIKE N'%$sProduct%' 
                                            AND ($strProcuder)
                                            AND ($strTypePro) 
                                        ORDER BY $strSort "; 

            $result = DataProvider::ExecuteQuery($sql);

            if(mysqli_num_rows($result) == 0){
                echo "<h3 style='text-align:center; color:#999; padding: 62px 0 0;'>Không tìm thấy kết quả phù hợp</h3>";
            }
            else
            {
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                    <div class="col-md-3 product-men yes-marg animated wow slideInUp" data-wow-delay=".3s">		
		        		<div class="men-pro-item simpleCart_shelfItem">
                            <a href ="index.php?a=4&id=<?php echo $row["MaSanPham"]; ?>#1111" style="color:#333;">
					            <div class="men-thumb-item">
                                    <img src="img/<?php echo $row["HinhURL"]; ?>" class="pro-image-front"/>
                                    <img src="img/<?php echo $row["HinhURL"]; ?>" class="pro-image-back"/>
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
            }
        }
        else
            DataProvider::ChangeURL("index.php?a=404");
    ?>
    <?php
        $sqlGetPagesNumber = "  SELECT * 
                                FROM SanPham
                                WHERE BiXoa = 0
                                    AND TenSanPham LIKE N'%$sProduct%' 
                                    AND ($strProcuder)
                                    AND ($strTypePro) 
                                ORDER BY $strSort ";
        $result1 = DataProvider::ExecuteQuery($sqlGetPagesNumber);

        $count = mysqli_num_rows($result1);
        $numOfPages = floor(($count - 1)/4 + 1);
    ?>
    <ul  class="pagination">
        <li><a onclick="loadPrePage(<?php if($page == 1) echo $numOfPages; else echo $page - 1; ?>, <?php echo $numOfPages;?>)"
        class="btn-pages"><</a></li>
        <?php
            for($i = 0; $i < $numOfPages; $i++){
                ?>
                <li>
                    <a name="checkPage" <?php if($page == $i+1) echo "class='active'" ;?> 
                        onclick="loadPage(<?php echo $i+1; ?>, <?php echo $numOfPages ?>)">
                    <?php echo $i+1; ?>
                    </a>    
                </li>
            <?php
            }
            ?>
        <li><a onclick="loadNextPage(<?php if($page == $numOfPages) echo 1; echo $page + 1; ?>, <?php echo $numOfPages;?>)">></a></li>
    </ul>
</div>
<script>
    function loadPrePage(page, numOfPages){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pagesAjax").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "pages/Ajax/pAjaxPaginationTimKiem.php?p="+page+"&ps="+numOfPages, true);
        xhttp.send();
    }
    function loadNextPage(page, numOfPages){

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pagesAjax").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "pages/Ajax/pAjaxPaginationTimKiem.php?p="+page+"&ps="+numOfPages, true);
        xhttp.send();
    }
    function loadPage(page, numOfPages){

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pagesAjax").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "pages/Ajax/pAjaxPaginationTimKiem.php?p="+page+"&ps="+numOfPages, true);
        xhttp.send();
    }

</script>
