<div class="col-sm-12 ">	
    <div class="panel-heading">
        <form action="pages/qlDonDatHang/xlThemMoi.php" method="post" enctype ="multipart/form-data">
            <fieldset>
                <legend class="col-sm-12" style="font-size: 25px;">Thêm mới đơn đặt hàng</legend>
                <!-- <div >
                    <span style="font-size: 16px;">Mã đơn đặt hàng: </span>
                    <input style = "border-radius: 4px; margin-bottom: 10px;" type = "text" name ="id" id="id"/>
                    <i id ="errid"></i>
                </div> -->
                <div>
                    <span style="font-size: 16px;">Tên tài khoản: </span>
                    <select style = "border-radius: 4px; margin-bottom: 10px;" name="cmbTaiKhoan">
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
                </div>
                <!-- <div >
                    <span style="font-size: 16px;">Tổng thành tiền: </span>
                    <input style = "border-radius: 4px; margin-bottom: 10px;" type = "text" name ="txtTien" id="txtTien"/>
                    <i id ="errTien"></i>
                </div> -->
                <div>
                    <span style="font-size: 16px;">Ngày đặt hàng: </span>
                    <input style = "border-radius: 4px; margin-bottom: 10px;" type = "date" name ="txtNgayDat" id="txtNgayDat"/>
                    <i id ="errNgayDat"></i>
                </div>
                <div>
                <span style="font-size: 16px;">Tình trạng: </span>
                <select style = "border-radius: 4px; margin-bottom: 10px;" name="cmbTinhTrang">
                    <?php
                        $sql = "SELECT * FROM TinhTrang";
                        $result = DataProvider::ExecuteQuery($sql);
                        while($row = mysqli_fetch_array($result)){
                            ?>
                                <option value="<?php echo $row["MaTinhTrang"]; ?>"><?php echo $row["TenTinhTrang"];?></option>
                            <?php
                        }
                    ?>
                </select>
                </div>
                <div id = "error"></div>
                <div class="btn-add">
                    <button type="submit" class="btn btn-success btn-block center"> Thêm mới </button></div>
                 </div>
            </fieldset>
        </form>
    </div>
</div>

<script type ="text/javascript">
    function KiemTra()
    {
        var co = true;

        var ten = document.getElementById("id");
        var err = document.getElementById("errid");
        if(ten.value == "")
        {
            err.innerHTML = "Mã đơn hàng không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";

        // var ten = document.getElementById("txtTien");
        // var err = document.getElementById("errTien");
        // if(ten.value == "")
        // {
        //     err.innerHTML = "Tổng thành tiền không được rỗng";
        //     ten.focus();
        //     return false;
        // }
        // else
        //     err.innerHTML = "";

        var ten = document.getElementById("txtNgayDat");
        var err = document.getElementById("errNgayDat");
        if(var_dump(validateDate(ten.value)))
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