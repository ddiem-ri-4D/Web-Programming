<div class="col-sm-12 ">	
    <div class="panel-heading">
        <from action = "pages/qlDonDatHang/xlThemMoi.php" method ="post" onsubmit="return KiemTra();" enctype ="multipart/form-data">
            <fieldset >
                <legend class="col-sm-12" style="font-size: 25px;">Thêm đơn đặt hàng</legend>
                <div class="col-sm-6">
                    <span style="font-size: 16px;">Tên tài khoản: </span>
                    <select style = "border-radius: 4px; margin-bottom: 10px;" name ="txtTen" id = "txtTen">
                        <?php
                            $sql = "SELECT * FROM TaiKhoan WHERE BiXoa = 0";
                            $result = DataProvider::ExecuteQuery($sql);
                            while($row = mysqli_fetch_array($result)){
                                ?>
                                    <option value="<?php echo $row["MaTaiKhoan"]; ?>"><?php echo $row["TenHienThi"];?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <i id = "errTen"></i>
                </div>
                <div class="col-sm-6">
                    <span style="font-size: 16px;">Tổng thành tiền: </span>
                    <input style = "border-radius: 4px; margin-bottom: 10px;" type = "text" name ="txtTien" id="txtTien"/>
                    <i id ="errTien"></i>
                </div>
                <div class="col-sm-6">
                    <span style="font-size: 16px;">Ngày đặt hàng: </span>
                    <input style = "border-radius: 4px; margin-bottom: 10px;" type = "text" name ="txtGia" id="txtNgayDat"/>
                    <i id ="errNgayDat"></i>
                </div>
                <div>           
                    <div class="col-sm-3" style="margin:20px;">
                        <button type="submit" class="btn btn-success btn-block center" style="font-size: 18px; margin-left: 250px; margin-top: 50px;"> Thêm mới </button></div>
                    </div>
                </div>
            </fieldset>
        </from>
    </div>
</div>
<script type ="text/javascript">
    function KiemTra()
    {
        var ten = document.getElementById("txtTen");
        var err = document.getElementById("errTen");
        if(ten.value == "")
        {
            err.innerHTML = "Tên tài khoản không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";
        
        var ten = document.getElementById("txtTien");
        var err = document.getElementById("errTien");
        if(ten.value == "")
        {
            err.innerHTML = "Tổng thành tiền không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";

        var ten = document.getElementById("txtNgayDat");
        var err = document.getElementById("errNgayDat");
        if(ten.value == "")
        {
            err.innerHTML = "Ngày đặt không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";
            
        return true;
    }
</script>