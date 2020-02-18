<?php
    session_start();
    include "../lib/DataProvider.php";

    //Kiểm tra người dùng có đăng nhập tài khoản với quyền Admin hay chưa?
    if(!isset($_SESSION["MaLoaiTaiKhoan"]) || $_SESSION["MaLoaiTaiKhoan"] != 2)
        DataProvider::ChangeURL("../index.php");
    
    $c = 0;
    if(isset($_GET["c"]))
        $c = $_GET["c"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phân hệ quản lý</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <link rel ="stylesheet" type="text/css" href="css/k.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
</head>
<body>
    <div class="container-fluid main-container">
        <?php include "modules/mHeader.php" ;?>
        <?php include "modules/mSlidebar.php"; ?>
        <div id="content">
            <?php
                switch($c){
                    case 0:
                        include "pages/pIndex.php";
                        break;
                    case 1:
                        include "pages/qlTaikhoan/pIndex.php";
                        break;
                    case 2:
                        include "pages/qlSanPham/pIndex.php";
                        break;
                    case 3:
                        include "pages/qlLoai/pIndex.php";
                        break;
                    case 4:
                        include "pages/qlHang/pIndex.php";
                        break;
                    case 5:
                        include "pages/qlDonDatHang/pIndex.php";
                        break;
                    default:
                        include "pages/pError.php";
                        break;
                }
            ?>
        </div>
        <?php include("modules/mjs.php"); ?>
    </div>
</body>
</html>