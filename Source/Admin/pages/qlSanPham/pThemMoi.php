<div class="col-sm-12 ">	
    <div class="panel-heading">
        <form action="pages/qlSanPham/xlThemMoi.php" method="post" onsubmit="return KiemTra();" enctype="multipart/form-data">
            <fieldset class="themSanPham">
                <legend style="font-size: 25px;">Thêm sản phẩm mới</legend>
                <div>
                    <span style="font-size: 14px;">Tên sản phẩm:</span>
                    <input style=" margin-bottom: 10px; border-radius: 1px;" type="text" name="txtTen" id="txtTen" />
                    <i id="errTen"></i>
                </div>
                <div>
                    <span style="font-size: 14px;">Hãng sản xuất: </span>
                    <select style=" margin-bottom: 10px; border-radius: 1px;" name="cmbHang">
                        <?php
                            $sql = "SELECT * FROM HangSanXuat WHERE BiXoa = 0";
                            $result = DataProvider::ExecuteQuery($sql);
                            while($row = mysqli_fetch_array($result)){
                                ?>
                                    <option value="<?php echo $row["MaHangSanXuat"]; ?>"><?php echo $row["TenHangSanXuat"]; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <span style="font-size: 14px;">Loại sản phẩm: </span>
                    <select style=" margin-bottom: 10px; border-radius: 1px;" name="cmbLoai">
                        <?php
                            $sql = "SELECT * FROM LoaiSanPham WHERE BiXoa = 0";
                            $result = DataProvider::ExecuteQuery($sql);
                            while($row = mysqli_fetch_array($result)){
                                ?>
                                    <option value="<?php echo $row["MaLoaiSanPham"]; ?>"><?php echo $row["TenLoaiSanPham"]; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <span style="font-size: 14px;">Giá: </span>
                    <input style=" margin-bottom: 10px; border-radius: 1px;" type="number" min="100000" max="10000000" step="1000" name="txtGia" id="txtGia" />
                    <i id="errGia"></i>
                </div>
                <div>
                    <span style="font-size: 14px;">Số lượng tồn: </span>
                    <input style=" margin-bottom: 10px; border-radius: 1px;" type="text" name="txtTon" id="txtTon" />
                    <i id="errTon"></i>
                </div>
                <div>
                    <span style="font-size: 14px;">Mô tả: </span>
                    <textarea style=" margin-bottom: 10px; border-radius: 1px;" name="txtMoTa"></textarea>
                </div>
                <div>
                    <span style="font-size: 14px;">Hình: </span>
                    <input style=" margin-bottom: 10px; border-radius: 1px;" type="file" name="fHinh" required/>
                </div>
                <div>
                    <div class="btn-add">
                        <button type="submit" class="btn btn-success btn-block center"> Thêm sản phẩm </button>
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
			err.innerHTML = "Tên sản phẩm không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";

		var ten = document.getElementById("txtGia");
		var err = document.getElementById("errGia");
		if(ten.value == "")
		{
			err.innerHTML = "Giá sản phẩm không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";

		var ten = document.getElementById("txtTon");
		var err = document.getElementById("errTon");
		if(ten.value == "")
		{
			err.innerHTML = "Số lượng tồn không được rỗng";
			ten.focus();
			return false;
		}
		else
			err.innerHTML = "";

		return true;
	}
</script>