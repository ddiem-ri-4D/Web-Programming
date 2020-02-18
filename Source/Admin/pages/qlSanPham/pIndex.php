<div class="col-md-9 content" style="margin-left:30px">
    <div class="panel-heading" style="background-color:#c4e17f">
        <h1>Quản lý sản phẩm </h1>
    </div><br> 
    <div class='table-responsive'>
    <?php
        $a = 1;
        if(isset($_GET["a"]))
            $a = $_GET["a"];
            
        switch ($a){
            case 1:
                include "pages/qlsanPham/pDanhSach.php";
            break;
            case 2:
                include "pages/qlsanPham/pCapNhat.php";
            break;
            case 3:
                include "pages/qlsanPham/pThemMoi.php";
            break;
            default:
                include "pages/pError.php";
            break;
        }
    ?>

    </div>
</div>