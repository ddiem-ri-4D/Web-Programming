<?php 
     if(!isset($_GET["id"]))
     DataProvider::ChangeURL("index.php?c=404");

     $id = $_GET["id"];
     $sql = "SELECT * FROM HangSanXuat WHERE MaHangSanXuat = $id";
     $result = DataProvider::ExecuteQuery($sql);
     $row = mysqli_fetch_array($result);
?>
<div class="col-sm-12">	
  <div class="panel-heading">
    <form action="pages/qlHang/xlCapNhat.php" method="post" onsubmit="return KiemTra();">
        <fieldset>
            <legend style="font-size: 25px;">Cập nhật thông tin Nhà sản xuất</legend>  
            <div >
                <span style="font-size: 16px;">Tên hãng sản xuất: </span>
                <input type ="text" name ="txtTen" id = "txtTen" value = "<?php echo $row["TenHangSanXuat"];?>"/>
                <input type ="hidden" name ="id" value="<?php echo $row["MaHangSanXuat"];?>"/>
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
            err.innerHTML = "Tên hãng sản xuất không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML ="";

        return true;
    }
</script>