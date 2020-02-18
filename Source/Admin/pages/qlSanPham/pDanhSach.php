<div class="sideBar">
    <a href="index.php?c=2&a=3" style="text-decoration: none;">
        <div>
            <button class="btn btn-success btn-block center"> Thêm sản phẩm </button>
        </div>
    </a>
    <div>
        <form action="index.php?c=2&a=1" method="POST" style="display:flex;">
            <input class="sidebar-search" type="text" name="txtSearch" placeholder="Nhập tên sản phẩm cần tìm..." required>
            <input class="btn btn-success btn-block center" type="submit" name="search" value="Tìm Kiếm">
        </form>
    </div>
</div>
<div id="pagesAjax">
    <div style="overflow-x:scroll;">
        <table cellspacing = "0" border="1" class="table  table-hover table-striped" style="font-size:12px">
            <tr>
                <th width ="80">STT</th>
                <th width ="150">Tên Sản phẩm</th>
                <th width ="200">Hình</th>
                <th width ="100">Giá</th>
                <th width ="100">Ngày nhập</th>
                <th width ="100">Số lượng tồn</th>
                <th width ="100">Số lượng bán</th>
                <th width ="100">Số lượt xem</th>
                <th width ="100">Loại</th>
                <th width ="100">Hãng</th>
                <th width ="400">Mô tả</th>
                <th width ="100">Trạng thái</th>
                <th width ="400">Thao tác</th>
            </tr>
            <?php
                $txtSearch = 1;
                
                if(isset($_SESSION["search"])){
                    unset($_SESSION["search"]);
                }

                if(isset($_POST["search"])){
                    if(isset($_POST["txtSearch"])){
                        $_SESSION["search"] = $_POST["txtSearch"];
                        $txtSearch = $_POST["txtSearch"];
                        $txtSearch = "s.TenSanPham LIKE N'%$txtSearch%' ";
                    }
                }

                $page = 1;
                $recordStart = ($page - 1)*5;
                $strPagination = "LIMIT $recordStart, 5";

                $sql = "SELECT s.MaSanPham, s.TenSanPham, s.HinhURL, s.GiaSanPham, s.NgayNhap, 
                               s.SoLuongTon, s.SoLuongBan, s.SoLuocXem, s.MoTa, s.BiXoa, 
                               l.TenLoaiSanPham, h.TenHangSanXuat
                        FROM SanPham s, LoaiSanPham l, HangSanXuat h 
                        WHERE s.MaLoaiSanPham = l.MaLoaiSanPham 
                        AND s.MaHangSanXuat = h.MaHangSanXuat AND $txtSearch
                        ORDER BY s.MaSanPham DESC 
                        $strPagination ";
                $result = DataProvider::ExecuteQuery($sql);
                $i = 1;
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row["TenSanPham"]; ?></td>
                            <td>
                                <img src="../images/<?php echo $row["HinhURL"]; ?>" height ="50"/>
                            </td>
                            <td><?php echo $row["GiaSanPham"];; ?></td>
                            <td><?php echo $row["NgayNhap"];; ?></td>
                            <td><?php echo $row["SoLuongTon"];; ?></td>
                            <td><?php echo $row["SoLuongBan"];; ?></td>
                            <td><?php echo $row["SoLuocXem"];; ?></td>
                            <td><?php echo $row["TenLoaiSanPham"];; ?></td>
                            <td><?php echo $row["TenHangSanXuat"];; ?></td>
                            <td>
                                <?php
                                    if(strlen($row["MoTa"]) > 20)
                                        $sMoTa = substr($row["MoTa"], 0, 20)."...";
                                    else
                                        $sMoTa = $row["MoTa"];
                                    echo $sMoTa;
                                ?>
                                <div class="fullMoTa">
                                    <?php echo $row["MoTa"];?>
                                </div>
                            </td>            
                            <td>
                                <?php
                                    if($row["BiXoa"] == 1)
                                        echo "<img src = 'images/locked.png'/>";
                                    else
                                        echo "<img src = 'images/active.png'/>";
                                ?>
                            </td>
                            <td>
                                <a href="pages/qlSanPham/xlKhoa.php?id=<?php echo $row ["MaSanPham"]?>">
                                    <img src ="images/lock.png"/>
                                </a>
                                <a href="index.php?c=2&a=2&id=<?php echo $row ["MaSanPham"]?>">
                                    <img src ="images/edit.png"/>
                                </a>
                            </td>
                        </tr>
                    <?php
                }
            ?>
        </table>
        <?php
            $sqlGetPagesNumber = "  SELECT * FROM SanPham s, LoaiSanPham l, HangSanXuat h 
                                    WHERE s.MaLoaiSanPham = l.MaLoaiSanPham 
                                    AND s.MaHangSanXuat = h.MaHangSanXuat AND $txtSearch ";

            $result1 = DataProvider::ExecuteQuery($sqlGetPagesNumber);
           
            $count = mysqli_num_rows($result1);
            $numOfPages = floor(($count - 1)/5 + 1);
        ?>
    </div>
    <ul  class="pagination">
        <li><a style="margin:0" onclick="loadPrePage(<?php if($page == 1) echo $numOfPages; else echo $page - 1; ?>, <?php echo $numOfPages;?>)"
        class="btn-pages"><</a></li>
        <?php
            for($i = 0; $i < $numOfPages; $i++){
                ?>
                <li>
                    <a style="margin:0" name="checkPage" <?php if($page == $i+1) echo "class='active'" ;?> 
                        onclick="loadPage(<?php echo $i+1; ?>, <?php echo $numOfPages ?>)">
                        <?php echo $i+1; ?>
                    </a>    
                </li>
                <?php
            }
            ?>
        <li><a style="margin:0" onclick="loadNextPage(<?php if($page == $numOfPages) echo 1; echo $page + 1; ?>, <?php echo $numOfPages;?>)">></a></li>
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
        xhttp.open("GET", "pages/qlSanPham/pAjaxPagination.php?p="+page+"&ps="+numOfPages, true);
        xhttp.send();
    }
    function loadNextPage(page, numOfPages){

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pagesAjax").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "pages/qlSanPham/pAjaxPagination.php?p="+page+"&ps="+numOfPages, true);
        xhttp.send();
    }
    function loadPage(page, numOfPages){

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("pagesAjax").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "pages/qlSanPham/pAjaxPagination.php?p="+page+"&ps="+numOfPages, true);
        xhttp.send();
    }
</script>