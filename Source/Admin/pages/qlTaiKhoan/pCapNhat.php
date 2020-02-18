<div class="col-sm-12 " align="center">	
  <div class="panel-heading">
    <form action="pages/qlTaiKhoan/xlCapNhat.php" method="get">
        <fieldset>
            <legend style="font-size: 25px;">Cập nhật thông tin tài khoản</legend>
            <?php
                if(isset($_GET["id"]))
                {
                    $id = $_GET["id"];
                    $sql="SELECT TenDangNhap, MaLoaiTaiKhoan FROM TaiKhoan WHERE MaTaiKhoan = $id";
                    $result = DataProvider::ExecuteQuery($sql);
                    $row = mysqli_fetch_array($result);
                    $TenDangNhap = $row["TenDangNhap"];
                    $MaLoaiTaiKhoan = $row["MaLoaiTaiKhoan"]; 
                }
            ?>
            <div class="col-sm-6">
                <span style="font-size: 18px;">Tên đăng nhập: </span>
                <?php echo $TenDangNhap; ?>
            </div>
            <div class="col-sm-6">
                <span style="font-size: 18px;">Loại tài khoản: </span>
                <select style = "border: 2px solid #0756345e;" name="cmbLoaiTaiKhoan">
                    <?php
                        $sql = "SELECT * FROM LoaiTaiKhoan";
                        $result= DataProvider::ExecuteQuery($sql);
                        while($row = mysqli_fetch_array($result))
                        {
                            if($row["MaLoaiTaiKhoan"] == $MaLoaiTaiKhoan)
                                echo "<option value = '".$row["MaLoaiTaiKhoan"]."' selected>".$row["TenLoaiTaiKhoan"]."</option>";
                            else
                                echo "<option value = '".$row["MaLoaiTaiKhoan"]."'>".$row["TenLoaiTaiKhoan"]."</option>";                          
                        }
                    ?>
                </select>
                <input type="hidden" name="id" value ="<?php echo $id; ?>"/>
            </div>
            <div>
                <div class="btn-add">
                    <button type="submit" class="btn btn-success btn-block center"> Cập nhật </button>
                </div>
            </div>
        </fieldset>
    </form>
    </div>
</div>