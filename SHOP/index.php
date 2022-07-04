
<?php
    require 'PDO/pdo.php';
    require 'admin/DAO/pdo_binh_luan.php';
    require 'admin/DAO/pdo_hang_hoa.php';
    require 'admin/DAO/pdo_khach_hang.php';
    require 'admin/DAO/pdo_loai_hang.php';
    require 'admin/DAO/pdo_tai_khoan.php';
    require 'admin/DAO/pdo_thong_ke.php';

    $pdo_binh_luan = new procedure_binh_luan;
    $pdo_hang_hoa = new procedure_hang_hoa;
    $pdo_khach_hang = new procedure_khach_hang;
    $pdo_loai_hang = new procedure_loai_hang;
    $pdo_tai_khoan = new procedure_tai_khoan;
    $pdo_thong_ke = new procedure_thong_ke;
    extract($_REQUEST);
    // $pdo_thong_ke = new procedure_thong_ke();
     if (array_key_exists('gio_hang', $_REQUEST)) {

        $VIEW_PAGE = "gio_hang/index.php";
        
    }  else if (array_key_exists('del_productCart', $_REQUEST)) {

        $VIEW_PAGE = "gio_hang/index.php";
    }else if (array_key_exists('tai_khoan', $_REQUEST)) {

        $VIEW_PAGE = "tai_khoan/index.php";
    } else if (array_key_exists('dang_nhap', $_REQUEST)) {

        $VIEW_PAGE = "tai_khoan/dang_nhap.php";
    } else if (array_key_exists('thong_tin_tk', $_REQUEST)) {

        $VIEW_PAGE = "tai_khoan/thong_tin_tk.php";
    } else if (array_key_exists('doi_mk', $_REQUEST)) {

        $VIEW_PAGE = "tai_khoan/doi_mk.php";
    }  else if (array_key_exists('home', $_REQUEST)) {

        $VIEW_PAGE = "inc/main.php";
    }else if (array_key_exists('chi_tiet_sp', $_REQUEST)) {

        $VIEW_PAGE = "san_pham/chi_tiet_sp.php";
    }else if (array_key_exists('gioi_thieu', $_REQUEST)) {

        $VIEW_PAGE = "home/gioi_thieu.php";
    }else if (array_key_exists('add_to_cart', $_REQUEST)) {

        $VIEW_PAGE = "gio_hang/add_to_cart.php";
    }
    
    
    
    else if (array_key_exists('lien_he', $_REQUEST)) {

        $VIEW_PAGE = "home/lien_he.php";
    }else if (array_key_exists('gop_y', $_REQUEST)) {

        $VIEW_PAGE = "home/gop_y.php";
    }else if (array_key_exists('hoi_dap', $_REQUEST)) {

        $VIEW_PAGE = "home/hoi_dap.php";
    }else {
        $VIEW_PAGE = "inc/main.php";
    }
    require_once 'layout.php';
