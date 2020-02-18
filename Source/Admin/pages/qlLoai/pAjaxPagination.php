<?php 
    include "../../../lib/DataProvider.php"; 
    session_start();
?>
<div style="overflow-x:scroll;">
    <table cellspacing="0" border="1" class="table table-hover table-striped" style="font-size:12px">
        <tr>
            <th width ="100">Mã loại sản phẩm</th>
            <th width ="180">Tên loại sản phẩm</th>
            <th width ="75">Tình trạng</th>
            <th width ="100">Thao tác</th>
        </tr>
        <?php
            $txtSearch = 1;

            if(isset($_SESSION["search"])){
                $txtSearch = $_SESSION["search"];
                $txtSearch = "TenLoaiSanPham LIKE N'%$txtSearch%' ";
            }
        
            $page = 1;
            if(isset($_GET["p"]) && isset($_GET["ps"])){
                if($_GET["p"] >= 1 && $_GET["p"] <= $_GET["ps"]){
                    $page = $_GET["p"];
                }
            }
            $recordStart = ($page - 1)*5;
            $strPagination = "LIMIT $recordStart, 5";
           
            $sql = "SELECT MaLoaiSanPham, TenLoaiSanPham, BiXoa 
                    FROM LoaiSanPham
                    WHERE $txtSearch 
                    $strPagination ";
            $result = DataProvider::ExecuteQuery($sql);
            while($row = mysqli_fetch_array($result))
            {
                ?>
                    <tr>
                        <td><?php echo $row["MaLoaiSanPham"];?></td>
                        <td><?php echo $row["TenLoaiSanPham"];?></td>
                        <td>
                            <?php
                                if($row["BiXoa"]==1)
                                    echo "<img src ='images/locked.png'/>";
                                else
                                    echo "<img src ='images/active.png'/>";
                            ?>
                        </td>
                        <td>
                           <a href="pages/qlLoai/xlKhoa.php?id=<?php echo $row ["MaLoaiSanPham"]?>">
                               <img src ="images/lock.png"/>
                           </a>
                            <a href = "index.php?c=3&a=2&id=<?php echo $row["MaLoaiSanPham"]?>">
                                <img src="images/edit.png"/>    
                            </a>
                        </td>
                    </tr>
                <?php
            }
        ?>
    </table>
    <?php
        $sqlGetPagesNumber = "  SELECT * FROM LoaiSanPham
                                WHERE $txtSearch  ";
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