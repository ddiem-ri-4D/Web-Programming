<?php 
    include "../../../lib/DataProvider.php"; 
    session_start();
?>
<div style="overflow-x:scroll;">
    <table cellspacing = "0" border="1" class="table table-hover table-striped" style="font-size:12px">
        <tr>
            <th width ="100">STT</th>
            <th width ="150">Mã đơn đặt hàng</th>
            <th width ="200">Ngày lập</th>
            <th width ="150">Khách hàng</th>
            <th width ="150">Tổng thành tiền</th>
            <th width ="150">Tình trạng</th>
            <th width ="200">Thao tác</th>
        </tr>
        <?php
            $txtSearch = 1;
        
            if(isset($_SESSION["search"])){
                    $txtSearch = $_SESSION["search"];
                    $txtSearch = "d.MaDonDatHang LIKE N'%$txtSearch%' ";
                }
        
            $page = 1;
            if(isset($_GET["p"]) && isset($_GET["ps"])){
                if($_GET["p"] >= 1 && $_GET["p"] <= $_GET["ps"]){
                    $page = $_GET["p"];
                }
            }
            $recordStart = ($page - 1)*5;
            $strPagination = "LIMIT $recordStart, 5";
        
        
            $sql = " SELECT d.MaDonDatHang, d.NgayLap, d.MaTinhTrang, d.TongThanhTien, t.TenHienThi, tt.TenTinhTrang 
                     FROM DonDatHang d, TaiKhoan t, TinhTrang tt
                     WHERE d.MaTaiKhoan = t.MaTaiKhoan 
                           AND d.MaTinhTrang = tt.MaTinhTrang
                           AND $txtSearch 
                     ORDER BY d.NgayLap DESC, d.MaDonDatHang ASC 
                     $strPagination ";
            $result = DataProvider::ExecuteQuery($sql);
            $i = ($page - 1)*5 + 1;
            while($row = mysqli_fetch_array($result))
            {
                $c = "";
                switch($row["MaTinhTrang"]){
                    case 2:
                        $c = "classGiaoHang";
                    break;
                    case 3:
                        $c = "classThanhToan";
                    break;
                    case 4:
                        $c = "classHuy";
                    break;
                }
                ?>
                   <tr class="<?php echo $c; ?>">
                        <td><?php echo $i++;?></td>
                        <td><?php echo $row["MaDonDatHang"];?></td>
                        <td><?php echo $row["NgayLap"];?></td>
                        <td><?php echo $row["TenHienThi"];?></td>
                        <td><?php echo $row["TongThanhTien"];?></td>
                        <td><?php echo $row["TenTinhTrang"];?></td>
                        <td>
                            <!-- <a href="pages/qlLoai/xlKhoa.php?id=<?php echo $row ["MaDonDatHang"]?>">
                                <img src ="images/lock.png"/>
                            </a> -->
                            <a href="index.php?c=5&a=2&id=<?php echo $row["MaDonDatHang"]?>">
                                <img src="images/edit.png"/>
                            </a>
                        </td>
                   </tr>        
                <?php
            }
        ?>
    </table>
    <?php
        $sqlGetPagesNumber = "  SELECT * FROM DonDatHang d, TaiKhoan t, TinhTrang tt
                                WHERE d.MaTaiKhoan = t.MaTaiKhoan 
                                      AND d.MaTinhTrang = tt.MaTinhTrang
                                      AND $txtSearch";

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