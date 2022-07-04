<?php
    // require '../PDO/pdo.php';
    require '../admin/DAO/pdo_binh_luan.php';
    require '../admin/DAO/pdo_hang_hoa.php';
    require '../admin/DAO/pdo_khach_hang.php';
    require '../admin/DAO/pdo_loai_hang.php';
    // require '../admin/DAO/pdo_tai_khoan.php';
    require '../admin/DAO/pdo_thong_ke.php';

    $pdo_binh_luan = new procedure_binh_luan;
    $pdo_hang_hoa = new procedure_hang_hoa;
    $pdo_khach_hang = new procedure_khach_hang;
    $pdo_loai_hang = new procedure_loai_hang;
    // $pdo_tai_khoan = new procedure_tai_khoan;
    $pdo_thong_ke = new procedure_thong_ke;
    extract($_REQUEST);
    // $pdo_thong_ke = new procedure_thong_ke();
     if (array_key_exists('gio_hang', $_REQUEST)) {

        $VIEW_PAGE = "../gio_hang/index.php";
    } else if (array_key_exists('home', $_REQUEST)) {

        $VIEW_PAGE = "../inc/main.php";
    }else {
        $VIEW_PAGE = "../inc/main.php";
    }

    require_once '../index.php';
