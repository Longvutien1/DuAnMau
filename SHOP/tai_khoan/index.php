<?php
    

    if (!isset($_SESSION['isLogin'])) {
        session_destroy();
        header("Location:tai_khoan/dang_nhap.php");
    }else{
        header("Location:index.php?thong_tin_tk");
    }
    // session_destroy();
?>