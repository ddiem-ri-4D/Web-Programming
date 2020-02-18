<div class="col-sm-12 ">	
    <div class="panel-heading">
        <form action="pages/qlHang/xlThemMoi.php" method="post" onsubmit="return KiemTra();" enctype ="multipart/form-data">
        <fieldset>
                <legend class="col-sm-12" style="font-size: 25px;">Thêm mới hãng sản xuất</legend>
                <div>
                    <span>Tên hãng sản xuất: </span>
                    <input type = "text" name ="txtTen" id = "txtTen"/>
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
        var ten = document.getElementById("txtTen");
        var err = document.getElementById("error");
        if(ten.value == "")
        {
            err.innerHTML = "Tên hãng sản xuất không được rỗng";
            ten.focus();
            return false;
        }
        else
            err.innerHTML = "";
            
        return true;
    }
</script>