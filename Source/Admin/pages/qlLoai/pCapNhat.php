  <?php 
     if(!isset($_GET["id"]))
         DataProvider::ChangeURL("index.php?c=404");

     $id = $_GET["id"];
     $sql = "SELECT * FROM LoaiSanPham WHERE MaLoaiSanPham = $id";
     $result = DataProvider::ExecuteQuery($sql);
     $row = mysqli_fetch_array($result);
?>
<div class="col-sm-12">	
  <div class="panel-heading">
    <form action="pages/qlLoai/xlCapNhat.php" method="post" onsubmit="return KiemTra();">
        <fieldset>
            <legend style="font-size: 25px;">Cập nhật thông tin loại sản phẩm</legend>  
            <div >
                <span style="font-size: 14px;">Tên loại sản phẩm: </span>
                <input type ="text" name ="txtTen" id = "txtTen" value = "<?php echo $row["TenLoaiSanPham"];?>"/>
                <input type ="hidden" name ="id" value="<?php echo $row["MaLoaiSanPham"];?>"/>
                <div class="btn-add">
                    <button type="submit" class="btn btn-success btn-block center"> Cập nhật </button>
                </div>
                </div>
                    <div id = "error">
                </div>
        </fieldset>
    </form>
    </div>
</div>
<script type="text/javascript">
    function KiemTra()
    {
        var ten = document.getElementById("txtTen");
        var err = document.getElementById("error");
        if(ten.value == "")
        {
            err.innerHTML = "Tên loại không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML ="";

        return true;
    }
</script>