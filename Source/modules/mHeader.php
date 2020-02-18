
 <!-- header-bot -->
 <div class="header-bot" style="padding: 0;">
    <div class="container-header">
        <div>
            <h1><a href="index.php" style="font-weight: bold;">WinTribe Fashion</a></h1>
        </div>
        <div class="container-header-search">
            <form action="index.php?a=7#1111" method="POST" >
                <div class="form-search">
                    <div class="input-search">
                        <input type="text" name="txtSearch" placeholder="Nhập tên sản phẩm cần tìm..."
                                 required>
                    </div>
                    <div class="btnfilter">
                        <input class="btnfilter-btn" id="btnfilter-btn" type="checkbox" 
                            style="outline: none;" onclick="focusFilter()">
                        <a href="#">
                            <i class="fas fa-filter"></i>
                            <i class="fas fa-chevron-down fa-xs"></i>
                        </a>
                        <div class="btnfilter-drop-items" id="filter-items"zcz
                                tabindex="0" onblur="lostFocusFilter()">
                            <h2 style="font-size: 1rem; font-weight: bold; text-align: center; margin: 10px 0 0px;">
                                Chọn tiêu chí tìm kiếm
                            </h2>
                            <p>Hãng sản xuất</p>
                            <div class="filter-doccument" id="filter-doccument-Type">
                                <label>
                                    <span>Tất cả</span>
                                    <input type="checkbox" name="checkboxProducerAll" value="nameProducer" 
                                           onclick="checkAll(this, 'checkboxProducer[]')">
                                    <span class="checkmark-checkbox"></span>
                                </label>
                               
                            <?php 
                                $sql = " SELECT MaHangSanXuat, TenHangSanXuat
                                         from HangSanXuat";
                                $result = DataProvider::ExecuteQuery($sql);
                                while($row = mysqli_fetch_array($result))
                                {
                            ?>
                                <label>
                                    <span><?php echo $row["TenHangSanXuat"]; ?></span>
                                    <input type="checkbox" name="checkboxProducer[]" value="<?php echo $row["MaHangSanXuat"]; ?>"
                                           onclick="checkItems('checkboxProducerAll')">
                                    <span class="checkmark-checkbox"></span>
                                </label>
                            <?php
                                }
                            ?>
                            </div>
                            
                            <p>Loại sản phẩm</p>
                            <div class="filter-doccument" id="filter-doccument-Type">
                                <label>
                                    <span>Tất cả</span>
                                    <input type="checkbox" name="checkboxTypeProAll" value="nameProduct" 
                                           onclick="checkAll(this, 'checkboxTypePro[]')">
                                    <span class="checkmark-checkbox"></span>
                                </label>
                            
                            <?php 
                                $sql = " SELECT MaLoaiSanPham, TenLoaiSanPham
                                         from LoaiSanPham";
                                $result = DataProvider::ExecuteQuery($sql);
                                while($row = mysqli_fetch_array($result))
                                {
                            ?>
                                <label>
                                    <span><?php echo $row["TenLoaiSanPham"]; ?></span>
                                    <input type="checkbox" name="checkboxTypePro[]" value="<?php echo $row["MaLoaiSanPham"]; ?>"
                                           onclick="checkItems('checkboxTypeProAll')">
                                    <span class="checkmark-checkbox"></span>
                                </label>
                            <?php
                                }
                            ?>
                            </div>
                            
                            <p>Sắp xếp theo</p>
                            <div class="filter-doccument">
                                <label>
                                    <span>Sản phẩm mới nhất</span>
                                    <input type="radio" name="radioSort" value="newProduct" checked>
                                    <span class="checkmark-radio"></span>
                                </label>
                                <label>
                                    <span>Sản phẩm bán chạy nhất</span>
                                    <input type="radio" name="radioSort" value="sellProductMax">
                                    <span class="checkmark-radio"></span>
                                </label>
                                <label>
                                    <span>Sản phẩm được xem nhiều nhất</span>
                                    <input type="radio" name="radioSort" value="famousProduct">
                                    <span class="checkmark-radio"></span>
                                </label>
                                <label>
                                    <span>Giá sản phẩm từ thấp -> cao</span>
                                    <input type="radio" name="radioSort" value="priceProductLowToHigh">
                                    <span class="checkmark-radio"></span>
                                </label>
                                <label>
                                    <span>Giá sản phẩm từ cao -> thấp</span>
                                    <input type="radio" name="radioSort" value="priceProductHighToLow">
                                    <span class="checkmark-radio"></span>
                                </label>
                            </div>
                            
                            <p style="color:red; font-size: 0.6rem; font-weight:bold; padding: 5px 10px 0 10px">
                                *Khách hàng lưu ý: Trường hợp loại SP hoặc HSX không được chọn sẽ mặc định chọn tất cả.
                            </p>
                        </div>
                                                   
                    </div>
                    <div class="btnsubmit" style="height:50px;">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
        <div class="login-link">
            <a style="text-align: center; color: #212529; display: block; position: relative; width: 70px; text-decoration: none;" target="_blank" href="https://github.com/diemKiriKiri/">
                <i style="font-size: 28px; display: block;" class="fab fa-github"></i>
			    <span>Github</span>                                   
			</a>
            <?php
                if(isset($_SESSION["MaTaiKhoan"]) == false){
            ?>
                    <a href="index.php?a=6#1111">
                        Đăng nhập 
                        <i class="fas fa-user fa-lg" style="color: #FDA30E;"></i>
                    </a>
            <?php
                }
                else{
                    if($_SESSION["MaLoaiTaiKhoan"] == 1){
            ?>
                    <div class="user-dropdown">   
                        <a title="<?php echo $_SESSION["TenHienThi"]; ?>">
                            <i class="fas fa-user fa-lg" style="transform: none;"></i>
                            <?php
                                if(strlen($_SESSION["TenHienThi"]) > 15) 
                                    echo substr($_SESSION["TenHienThi"], 0, 15)."...";
                                else
                                    echo $_SESSION["TenHienThi"];
                            ?>
                            <i class="fas fa-chevron-down fa-xs"></i>
                        </a>
                        <div class="user-dropdown-items">
                            <a href="modules/xlDangXuat.php">Đăng Xuất</a>
                        </div>
                    </div> 
            <?php
                    }
                    else if($_SESSION["MaLoaiTaiKhoan"] == 2){
                       DataProvider::ChangeURL("Admin/index.php");
                    }
                    else{
                        DataProvider::ChangeURL("pages/pError.php?id=2");
                    }
                }
            ?>
        </div>
    </div>
</div>
<!-- //header-bot -->

<div class="ban-top">
	<div class="container">
    
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                </div>
                <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav menu__list">               
                        <?php
                            include "modules/mHang.php";
                            include "modules/mLoai.php";
                        ?>
                    </ul>
                </div>
                
            </div>
            </nav>	
        </div>
        
		<div class="top_nav_right" style="width: 15%;">			
            <div class="cart box_1">
                 <?php 
					$checkout = "";
					if(isset($_SESSION["MaTaiKhoan"]))
						$checkout = "index.php?a=5#1111";
					else
						$checkout = "index.php?a=6#1111";
				?>
					<a href="<?= $checkout ?>">
						<h3> <div class="total">
							<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
							<span class="simpleCart_total"></span> 
							
						</h3>
					</a>
					<p><a href="javascript:;" class="simpleCart_empty">Your Cart</a></p>
                </div>	     
            </div>  
        <div class="clearfix"></div>
    </div>
</div>


<script>
    function checkAll(source, name){
        var check2 = document.getElementsByName(name);
        for(var i = 0; i < check2.length; i++)
            check2[i].checked = source.checked;
    }

    function checkItems(name){
        var check1 = document.getElementsByName(name);
        check1[0].checked = false;
    }


    function focusFilter(){
        if(document.getElementById("filter-items").offsetHeight == 0){
            document.getElementById("filter-items").style.height = "690px";
            document.getElementById("filter-items").focus();
        }
        else
        {
            document.getElementById("filter-items").style.height = "0";
            document.getElementById("btnfilter-btn").checked = false;
        }
    }

    function lostFocusFilter(){
        if(document.getElementById("btnfilter-btn").checked == true){
            document.getElementById("filter-items").style.height = "0";
            document.getElementById("btnfilter-btn").checked = false;
        }
    }
</script>  