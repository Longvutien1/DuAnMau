    <?php
    require_once '../../PDO/pdo.php';
    require_once '../DAO/pdo_khach_hang.php';

    extract($_REQUEST);
    $pdo_khach_hang = new procedure_khach_hang();
    $error = "";

    if (array_key_exists('add_btn', $_REQUEST)) {
        $VIEW_PAGE = "new.php";
    } else if (array_key_exists('list_btn', $_REQUEST)) {

        $VIEW_PAGE = "list.php";
    } else if (array_key_exists('btn_add', $_REQUEST)) {

        $ma_kh = $_POST['ma_kh'];
        $ho_ten = $_POST['ho_va_ten'];
        $mat_khau = $_POST['mat_khau'];
        $xac_nhan_mat_khau = $_POST['xac_nhan_mat_khau'];
        $email = $_POST['email'];
        $hinh_anh = $_FILES['hinh_anh']['name'];
        $tmp_hinh_anh = $_FILES['hinh_anh']['tmp_name'];

        if (isset($_POST['kick_hoat']) && $_POST['kick_hoat'] == 'Kích hoạt') {
            $kick_hoat = 1;
        } else {
            $kick_hoat = 0;
        }
        if (isset($_POST['vai_tro']) && $_POST['vai_tro'] == 'Nhân viên') {
            $vai_tro = 1;
        } else {
            $vai_tro = 0;
        }
        $list_kh = $pdo_khach_hang->list_khach_hang();
        foreach ($list_kh as $u) {
            if ($ma_kh == $u['ma_kh']) {
                $ma_kh_tt = "Đã tồn tại";
            }
        }
        // validate
        if ($ma_kh == "") {
            $error = "Mã khách hàng không được để trống !";
        } else if (strlen($ma_kh) < 6 ) {
            $error = "Mã khách hàng phải lớn hơn 6 kí tự !";
        } else if (isset($ma_kh_tt)) {
            $error = "Mã khách hàng đã tồn tại, vui lòng nhập id khác !";
        } else if ($ho_ten == "") {
            $error = "Họ tên không được để trống !";
        } else if (strlen($ho_ten) < 6 ) {
            $error = "Họ tên không được nhỏ hơn 6 kí tự !";
        } else if ($mat_khau == "") {
            $error = "Mật khẩu không được để trống !";
        }else if (strlen($mat_khau) < 6 ) {
            $error = "Mật khẩu không được nhỏ hơn 6 kí tự !";
        } else if ($xac_nhan_mat_khau != $mat_khau) {
            $error = 'Mật khẩu không trùng khớp';
        } else if ($hinh_anh == "") {
            $error = 'Hình ảnh không được để trống !';
        } else {
            // var_dump($_POST['vai_tro']);
            // mã hóa mk
            $mat_khau = password_hash($mat_khau, PASSWORD_DEFAULT);
            $result = $pdo_khach_hang->add_khach_hang($ma_kh, $mat_khau, $ho_ten, $kick_hoat, $hinh_anh, $email, $vai_tro);
            move_uploaded_file($tmp_hinh_anh, '../../../SHOP/admin/anh/' . $hinh_anh);
        }
        if (isset($result)) {
            echo "<script> alert('$result')</script>";
            header("refresh:0.5;url=index.php");
        }

        $VIEW_PAGE = "new.php";
        
       


        // update_kh
    } else if (array_key_exists('update_btn', $_REQUEST)) {
        // lấy dữ liệu từ form
        $ma_kh = $_REQUEST['ma_kh'];
        $result = $pdo_khach_hang->list_kh_theo_id($ma_kh);
        foreach ($result as $u) {
            extract($u);
        }

        // show dữ liệu
        $VIEW_PAGE = "update.php";
    } else if (array_key_exists('btn_update', $_REQUEST)) {
        // lấy dữ liệu từ form
        $ma_kh = $_REQUEST['ma_kh'];
        $result = $pdo_khach_hang->list_kh_theo_id($ma_kh);
        foreach ($result as $u) {
            extract($u);
        }
        $ma_kh = $_POST['ma_kh'];
        $ho_ten = $_POST['ho_va_ten'];
        $mat_khau = $_POST['mat_khau'];
        $xac_nhan_mat_khau = $_POST['xac_nhan_mat_khau'];
        $email = $_POST['email'];
        $hinh_anh = $_FILES['hinh_anh']['name'];
        $tmp_hinh_anh = $_FILES['hinh_anh']['tmp_name'];

        if (isset($_POST['kick_hoat']) && $_POST['kick_hoat'] == 'Kích hoạt') {
            $kick_hoat = 1;
        } else {
            $kick_hoat = 0;
        }
        if (isset($_POST['vai_tro']) && $_POST['vai_tro'] == 'Nhân viên') {
            $vai_tro = 1;
        } else {
            $vai_tro = 0;
        }

        if ($hinh_anh == "") {
            $hinh_anh = $hinh;
        }
        // validate
        if ($ho_ten == "") {
            $error = "Họ tên không được để trống !";
        } else if (strlen($ho_ten) < 6 ) {
            $error = "Họ tên không được nhỏ hơn 6 kí tự !";
        } else if ($mat_khau == "") {
            $error = "Mật khẩu không được để trống !";
        }else if (strlen($mat_khau) < 6 ) {
            $error = "Mật khẩu không được nhỏ hơn 6 kí tự !";
        } else if ($xac_nhan_mat_khau != $mat_khau) {
            $error = 'Mật khẩu không trùng khớp';
        } else {
            $pdo_khach_hang = new procedure_khach_hang();
            $result = $pdo_khach_hang->update_hang_hoa($ma_kh, $mat_khau, $ho_ten, $kick_hoat, $hinh_anh, $email, $vai_tro);
            move_uploaded_file($tmp_hinh_anh, '../../../SHOP/admin/anh/' . $hinh_anh);
            if (isset($result)) {
                echo "<script> alert('$result')</script>";
                header("refresh:0.5;url=index.php");
            }
        }
        
        // show dữ liệu
        $VIEW_PAGE = "update.php";
    } else if (array_key_exists('btn_delete', $_REQUEST)) {
        $id_del = $_GET['btn_delete'];
        $result_del = $pdo_khach_hang->delete_khach_hang($id_del);
        $VIEW_PAGE = "list.php";

        // hiển thị lại ds
        if (isset($result_del)) {
            echo "<script> alert('$result_del')</script>";
            unset($result_del);
            header("refresh:0.5;url=index.php");
        }
    } else if (array_key_exists('del_click', $_REQUEST)) {
        $mang = array();
        $mang = count($_POST['check_sp']);
        for ($i = 0; $i < $mang; $i++) {
            $delete_id = $_POST['check_sp'][$i];
            $result_del_sp = $pdo_khach_hang->delete_khach_hang($delete_id);
        }
        $VIEW_PAGE = "list.php";
        if ($result_del_sp) {
            echo "<script> alert('$result_del_sp')</script>";
            unset($result_del_sp);
            // header("refresh:0.5;url=index.php");
        }
    } else {
        $VIEW_PAGE = "list.php";
    }

    require_once '../index.php';
