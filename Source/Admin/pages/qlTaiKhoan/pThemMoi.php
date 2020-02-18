<div class="col-sm-12 ">	
    <div class="panel-heading">
        <form action="pages/qlTaiKhoan/xlThemMoi.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend style="font-size: 25px;">Tạo tài khoản mới</legend>
                <div>
                    <span style="font-size: 14px;">Tên đăng nhập:</span>
                    <input style=" margin-bottom: 10px; border-radius: 1px;" type='text' name='txtTen' required >
                    <i id = "errTen"></i>
                </div>
                <div>
                    <span style="font-size: 14px;">Tên hiển thị:</span>
                    <input style=" margin-bottom: 10px; border-radius: 1px;" type='text' name='txtTenHienThi' required >
                    <i id ="errTenHienThi"></i>
                </div>              
                <div>
                    <span style="font-size: 14px;">Địa chỉ:</span>
                    <input style=" margin-bottom: 10px; border-radius: 1px;" type='text' name='txtDiaChi' required >
                    <i id ="errDiaChi"></i>
                </div>
                <div>
                    <span style="font-size: 14px;">Điện thoại:</span>
                    <input style=" margin-bottom: 10px; border-radius: 1px;" type='tel' name='txtDienThoai' required >
                    <i id ="errDienThoai"></i>
                </div>
                <div>
                    <span style="font-size: 14px;">Email:</span>
                    <input style="margin-bottom: 10px; border-radius: 1px;" type="email" name='txtEmail' required >
                    <i id ="errEmail"></i>
                </div>
                <div>
                    <span style="font-size: 14px;">Loại tài khoản:</span>
                    <select style=" margin-bottom: 10px; border-radius: 1px;" name="cmbLoaiTaiKhoan">
                        <?php
                            $sql = "SELECT * FROM LoaiTaiKhoan";
                            $result = DataProvider::ExecuteQuery($sql);
                            while($row = mysqli_fetch_array($result))
                            {
                                echo "<option value='".$row["MaLoaiTaiKhoan"]."'>".$row["TenLoaiTaiKhoan"]."</option>";
                            }
                        ?>			
                    </select>
                </div>
                <div>
                    <div class="btn-add">
                        <button type="submit" class="btn btn-success btn-block center"> Tạo tài khoản </button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<script type="text/javascript">
	function KiemTra()
	{
        var ten = document.getElementById("txtTen");
        var err = document.getElementById("errTen");
        if(ten.value == "")
        {
            err.innerHTML = "Tên đăng nhập không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";

        var ten = document.getElementById("txtTenHienThi");
        var err = document.getElementById("errTenHienThi");
        if(ten.value == "")
        {
            err.innerHTML = "Tên hiển thị không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";

		return true;
	}
</script>