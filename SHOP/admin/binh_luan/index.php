<?php
require_once '../../PDO/pdo.php';
require_once '../DAO/pdo_binh_luan.php';

extract($_REQUEST);
$pdo_binh_luan = new procedure_binh_luan();

if (array_key_exists('chi_tiet', $_REQUEST)) {
    $ma_hh = $_REQUEST['ma_hh'];
    $ten_hh = $pdo_binh_luan->name_hh_by_id($ma_hh);
    // var_dump($ten_hh);

    $result = $pdo_binh_luan->list_bl_by_ma_hh($ma_hh);
    $VIEW_PAGE = "chi_tiet.php";
} else if (array_key_exists('list_btn', $_REQUEST)) {

    $VIEW_PAGE = "list.php";
} else if (array_key_exists('id_delete', $_REQUEST)) {
    $ma_bl = $_REQUEST['id_delete'];
    $result_del = $pdo_binh_luan->delete_binh_luan($ma_bl);
    $VIEW_PAGE = "index.php";
    // hiển thị lại ds
    if ($result_del) {
        echo "<script> alert('$result_del')</script>";
        unset($result_del);
        header("refresh:0.1;url=index.php");
    }
} else if (array_key_exists('del_click', $_REQUEST)) {
    $mang = array();
    $mang = count($_POST['check_sp']);
    for ($i = 0; $i < $mang; $i++) {
        $delete_id = $_POST['check_sp'][$i];
        $result_del_sp = $pdo_binh_luan->delete_binh_luan($delete_id);
    }

    if ($result_del_sp) {
        echo "<script> alert('$result_del_sp')</script>";
        unset($result_del_sp);
        header("refresh:0.5;url=index.php");
    }
    $VIEW_PAGE = "chi_tiet.php";
} else {
    $VIEW_PAGE = "list.php";
}

require_once '../index.php';
