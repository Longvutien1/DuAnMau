<?php
require_once '../../PDO/pdo.php';
require_once '../DAO/pdo_hang_hoa.php';

extract($_REQUEST);
$pdo_hang_hoa = new procedure_hang_hoa();
$error = "";
// trang add
if (array_key_exists('add_btn', $_REQUEST)) {
    $VIEW_PAGE = "new.php";

    // trang list
} else if (array_key_exists('list_btn', $_REQUEST)) {

    $VIEW_PAGE = "list.php";

    // trang update
} else if (array_key_exists('update_btn', $_REQUEST)) {
    // lấy dữ liệu từ form
    $ma_hh = $_REQUEST['ma_hh'];
    $result = $pdo_hang_hoa->list_hang_hoa_theo_id($ma_hh);
    // var_dump($result);
    foreach ($result as $u) {
        extract($u);
       
    }
    
    // show dữ liệu
    $VIEW_PAGE = "update.php";

    // khi click add
} else if (array_key_exists('btn_add', $_REQUEST)) {
    
    $ten_hang_hoa = $_POST['ten_hh'];
    $don_gia = $_POST['don_gia'];
    $giam_gia = $_POST['giam_gia'];
    $loai_hang = $_POST['loai_hang'];
    $hinh_anh = $_FILES['productImage']['name'];
    $hinh_anh_tmp = $_FILES['productImage']['tmp_name'];
    $ngay_nhap = $_POST['ngay_nhap'];
    $mo_ta = $_POST['mo_ta'];

    if (isset($_POST['hangDacBiet']) && $_POST['hangDacBiet'] == 'Đặc biệt') {
        $hangDacBiet = 1;
    } else {
        $hangDacBiet = 0;
    }
    // var_dump($hangDacBiet);
    // die;
    // validate
    if ($ten_hang_hoa == "") {
        $error = "Tên hàng hóa không được để trống";
    } else if ($don_gia == "") {
        $error = "Đơn giá không được để trống";
    } else if ($giam_gia == "") {
        $error = "Giảm giá không được để trống";
    } else if ($hinh_anh == "") {
        $error = "Hình ảnh không được để trống";
    } else if ($ngay_nhap == "") {
        $error = "Ngày nhập không được để trống";
    } else {
        $result_add = $pdo_hang_hoa->add_hang_hoa($ten_hang_hoa, $don_gia, $giam_gia, $hinh_anh, $ngay_nhap, $mo_ta, $hangDacBiet, $loai_hang);
        move_uploaded_file($hinh_anh_tmp, '../../../SHOP/admin/anh/' . $hinh_anh);
    }
    
    if (isset($result_add)) {
        echo "<script> alert('$result_add')</script>";
        // echo $update_user;
        header("refresh:0.5;url=index.php");
    }
    $VIEW_PAGE = "new.php";

    //khi click update
} else if (array_key_exists('btn_update', $_REQUEST)) {
    // lấy dữ liệu từ form
    $ma_hh = $_REQUEST['ma_hh'];
    $result = $pdo_hang_hoa->list_hang_hoa_theo_id($ma_hh);
    foreach ($result as $u) {
        extract($u);
    }
    $ten_hang_hoa = $_POST['ten_hh'];
    $don_gia2 = $_POST['don_gia'];
    $giam_gia2 = $_POST['giam_gia'];
    $loai_hang2 = $_POST['loai_hang'];
    $productImage = $_FILES['productImage']['name'];
    $hinh_anh_tmp = $_FILES['productImage']['tmp_name'];
    $ngay_nhap2 = $_POST['ngay_nhap'];
    $mo_ta2 = $_POST['mo_ta'];

    if (isset($_POST['hangDacBiet']) && $_POST['hangDacBiet'] == 'Đặc biệt') {
        $hangDacBiet = 1;
    } else {
        $hangDacBiet = 0;
    }

    if ($productImage == "") {
        $productImage = $u['hinh'];
    }

    // validate
    if ($ten_hang_hoa == "") {
        $error = "Tên hàng hóa không được để trống";
    } else if ($don_gia2 == "") {
        $error = "Đơn giá không được để trống";
    } else if ($giam_gia2 == "") {
        $error = "Giảm giá không được để trống";
    } else if ($ngay_nhap2 == "") {
        $error = "Ngày nhập không được để trống";
    } else {

        $result_update = $pdo_hang_hoa->update_hang_hoa($ten_hang_hoa, $don_gia2, $giam_gia2, $productImage, $ngay_nhap2, $mo_ta2, $hangDacBiet, $loai_hang, $ma_hh);
        move_uploaded_file($hinh_anh_tmp, '../../../SHOP/admin/anh/' . $productImage);
    }


    if (isset($result_update)) {
        echo "<script> alert('$result_update')</script>";
        // echo $update_user;
        header("refresh:0.5;url=index.php");
    }
    $VIEW_PAGE = "update.php";

    // xóa 1 sp
} else if (array_key_exists('btn_delete', $_REQUEST)) {
    $ma_hh = $_REQUEST['btn_delete'];
    $result_del = $pdo_hang_hoa->delete_hang_hoa($ma_hh);
    if (isset($result_del)) {
        echo "<script> alert('$result_del')</script>";
        unset($result_del);
        header("refresh:0.5;url=index.php");
    }

    $VIEW_PAGE = "list.php";

    // xóa nhiều sp
} else if (array_key_exists('del_click', $_REQUEST)) {
    $mang = array();
    $mang = count($_POST['check_sp']);
    for ($i = 0; $i < $mang; $i++) {
        $delete_id = $_POST['check_sp'][$i];
        $result_del_sp = $pdo_hang_hoa->delete_hang_hoa($delete_id);
    }

    if ($result_del_sp) {
        echo "<script> alert('$result_del_sp')</script>";
        unset($result_del_sp);
        header("refresh:0.5;url=index.php");
    }

    $VIEW_PAGE = "list.php";

    // trang update
}  else {
    $VIEW_PAGE = "list.php";
}

require_once '../index.php';
