<?php
    session_start();
    include "lib/DataProvider.php";

    //Luu lai duong dan hien tai
    $_SESSION["path"] = $_SERVER["REQUEST_URI"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WinTribe Fashion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="img/project.png" size="16x16">
    <link href="https://fonts.googleapis.com/css?family=Lato|Quicksand&display=swap" rel="stylesheet">
    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    
    <!-- for bootstrap working -->
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/js.js"></script>

    <link rel="stylesheet" href="css/animate.css">
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <!-- pignose css -->
    <link href="css/pignose.layerslider.css" rel="stylesheet" type="text/css" media="all">
    <!-- //pignose css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/css.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
</head>
   
<body>
    <div id="wrapper"> 
        <?php
            include "modules/mHeader.php";
            include "modules/mSlidebar.php";
        ?>

        <div id="content">
            <?php
                $a = 1;
                if(isset($_GET["a"]) == true)
                    $a = $_GET["a"];
                
                switch($a){
                    case 1:
                        include "pages/pIndex.php";
                        break;
                    case 2:
                        include "pages/pSanPhamTheoHang.php";
                        break;
                    case 3:
                        include "pages/pSanPhamTheoLoai.php";
                        break;
                    case 4:
                        include "pages/pChiTiet.php";
                        break;
                    case 5:
                        include "pages/GioHang/pIndex.php";
                        break;
                    case 6:
                        include "pages/TaoTaiKhoan/pIndex.php";
                        break;
                    case 7:
                        include "pages/pTimKiem.php";
                        break;
                    default:
                        include "pages/pError.php";
                        break;
                }
            ?>
        </div>

        <?php include "modules/mFooter.php"; ?>
        
    </div>
</body>
</html>
