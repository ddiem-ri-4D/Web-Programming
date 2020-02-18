<div style=" margin: 0 20px">
    <h1 id="1111" style="color: #FDA30E;">Error 404</h1>
    <?php
        if(isset($_GET["id"]))
        {
            switch($_GET["id"]){
                case 1:
                    echo "Tên đăng nhập và mật khẩu không tồn tại!!</br>";
                    echo "<a href='javascript:window.history.back(-1);'>Quay lại trang trước</a>";
                    break;
                case 2:
                    echo "Người dùng không hợp lệ, không thể truy cập trang web này!!";
                    echo "<a href='javascript:window.history.back(-1);'>Quay lại trang trước</a>";
                    break;
                case 3:
                    echo "Đăng kí thất bại, tên đăng nhập đã tồn tại!! </br>";
                    echo "<a href='javascript:window.history.back(-1);>
                            Quay lại trang trước
                          </a>";
                    break;
                case 4:
                    echo "Sản phẩm bạn chọn đã hết hàng!!</br>";
                    echo "<a href='javascript:window.history.back(-1);'>Quay lại trang trước</a>";
                    break;
            }
        }
    ?>
</div>

<script>

</script>