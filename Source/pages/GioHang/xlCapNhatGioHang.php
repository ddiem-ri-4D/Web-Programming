<?php
    session_start();
    include "../../lib/DataProvider.php";
    include "../../lib/ShoppingCart.php";

    if(isset($_POST["txtSL"]))
    {
        $sl = $_POST["txtSL"];
        if(is_nan($sl) == false)
        {
            //Neu so luong la so thi moi xu ly
            $id = $_POST["hdID"];
            $gioHang = unserialize($_SESSION["GioHang"]);

            if($sl > 0)
            {
                //Xu ly cap nhat so luong moi
                $gioHang->update($id, $sl);
                $_SESSION["GioHang"] = serialize($gioHang);
            }  
            else
            {
                if($sl == 0)
                {
                    $gioHang->delete($id);

                    $_SESSION["GioHang"] = serialize($gioHang);
                }
            }      
            
            DataProvider::ChangeURL("../../index.php?a=5#1111"); 
        }
        else
        {
            //Neu so luong moi khong phai la so thi khong xu ly mac dinh đá về trang quản lý giỏ hàng
            DataProvider::ChangeURL("../../index.php?a=5#1111");
        }      
    }
    else
    {
        DataProvider::ChangeURL("../../index.php?a=404");
    }
?>
