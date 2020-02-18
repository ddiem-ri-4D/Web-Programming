<?php
    session_start();
    session_destroy();

    include"../lib/DataProvider.php";
    DataProvider::ChangeURL("../index.php");
?>


