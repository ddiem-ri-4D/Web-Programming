<?php 
    $_SESSION["captcha_code"] = substr( md5(rand()), 0, 6); 
    echo $_SESSION["captcha_code"];
?>
