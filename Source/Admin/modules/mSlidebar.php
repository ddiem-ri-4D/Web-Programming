<div class="col-md-2 sidebar" style="margin-left:20px">
    <div class="row">
        <div class="absolute-wrapper"> </div>
        <!-- Menu -->
        <div class="side-menu" >
            <nav class="navbar navbar-default" role="navigation" >
                <!-- Main Menu -->
                <div class="side-menu-container" >
                    <ul class="nav navbar-nav" >
                        <li><button type="button" class="btn btn-default btn-primary" onClick="location.href='../admin/index.php'"> <i class="fas fa-home"></i> Dashboard </button></li> 
                        <li><button type="button" class="btn btn-default btn-warning" onClick="location.href='index.php?c=1'"<?php if($c == 1) echo "class='selected'"; ?>> <i class="fas fa-user-edit"></i> Quản lý Tài khoản  </button></li>
                        <li><button type="button" class="btn btn-default btn-info" onClick="location.href='index.php?c=2'"<?php if($c == 2) echo "class='selected'"; ?>> <i class="fas fa-user-edit"></i> Quản lý Sản phẩm </button></li>
                        <li><button type="button" class="btn btn-default btn-success" onClick="location.href='index.php?c=3'"<?php if($c == 3) echo "class='selected'"; ?>> <i class="fas fa-user-edit"></i> Quản lý Loại sản phẩm</button></li>
                        <li><button type="button" class="btn btn-default btn-info" onClick="location.href='index.php?c=4'"<?php if($c == 4) echo "class='selected'"; ?>> <i class="fas fa-user-edit"></i> Quản lý Nhà sản xuất </button></li>
                        <li><button type="button" class="btn btn-default btn-warning" onClick="location.href='index.php?c=5'"<?php if($c == 5) echo "class='selected'"; ?>> <i class="fas fa-user-edit"></i> Quản lý Đơn đặt hàng </button></li>
                        <li><button type="button" class="btn btn-default btn-danger" onClick="location.href='../modules/xlDangXuat.php'"> <i class="fas fa-sign-out-alt"></i> Logout </button></li>
                    </ul>
				</div>
            </nav>
        </div>
    </div>
</div>