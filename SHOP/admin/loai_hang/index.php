    <?php
    require_once '../../PDO/pdo.php';
    require_once '../DAO/pdo_loai_hang.php';
    require_once '../DAO/pdo_hang_hoa.php';
    extract($_REQUEST);
    $pdo_loai_hang = new procedure_loai_hang();
    $pdo_hang_hoa = new procedure_hang_hoa();
    $error = "";

    if (array_key_exists('add_btn', $_REQUEST)) {
        $VIEW_PAGE = "new.php";
    } else if (array_key_exists('list_btn', $_REQUEST)) {

        $VIEW_PAGE = "list.php";
    } else if (array_key_exists('update_btn', $_REQUEST)) {
        // lấy dữ liệu từ form
        $ma_loai = $_REQUEST['ma_loai'];
        
        $result = $pdo_loai_hang->list_loai_hang_by_id($ma_loai);
        foreach ($result as $u) {
            extract($u);
        }
        // show dữ liệu
        $VIEW_PAGE = "update.php";
    } else if (array_key_exists('cap_nhat', $_REQUEST)) {

        $ten_loai = $_POST['ten_loai'];
        $ma_loai = $_POST['ma_loai'];

        if ($ten_loai == "") {
            $error = "Không được để trống tên loại";

        }else{
            $update_loai = $pdo_loai_hang->update_loai_hang($ten_loai, $ma_loai);
            if (isset($update_loai)) {
                echo "<script> alert('$update_loai')</script>";
                header("refresh:0.2;url=index.php");
            }
        }
        // var_dump($error);
        // die;
        $VIEW_PAGE = "update.php";
    } else if (array_key_exists('id_delete', $_REQUEST)) {
        $ma_loai = $_REQUEST['id_delete'];

        $check_ma_loai = $pdo_hang_hoa->list_hang_hoa_theo_loai($ma_loai);

        if (isset($check_ma_loai[0]['ma_loai'])) {
            echo "<script> alert('Loại hàng này đã tồn tại trong sản phẩm khác, vui lòng kiểm tra lại !')</script>";
            // header("refresh:0.5;url=index.php");
        } else {
            $result_del = $pdo_loai_hang->delete_loai_hang($ma_loai);
            echo "<script> alert('$result_del')</script>";
            unset($ma_loai);

            // hiển thị lại ds
            header("refresh:0.5;url=index.php");
        }
        $VIEW_PAGE = "list.php";
    } else if (array_key_exists('del_click', $_REQUEST)) {
        $mang = array();
        $mang = count($_POST['check_sp']);
        for ($i = 0; $i < $mang; $i++) {
            $delete_id = $_POST['check_sp'][$i];
            $result_del_sp = $pdo_loai_hang->delete_loai_hang($delete_id);
        }
        
        if ($result_del_sp) {
            echo "<script> alert('$result_del_sp')</script>";
            unset($result_del_sp);
            header("refresh:0.5;url=index.php");
        }
        $VIEW_PAGE = "list.php";
    } else if (array_key_exists('btn_add', $_REQUEST)) {
        $ten_loai = $_POST['ten_loai'];
        if ($ten_loai == "") {
            $error = "Không được để trống tên loại";
        }
        else{
            $new_loai_hang = $pdo_loai_hang->add_loai_hang($ten_loai);
        }
        
        if (isset($new_loai_hang)) {
            echo "<script> alert('$new_loai_hang')</script>";
            header("refresh:0.2;url=index.php");
        }
        $VIEW_PAGE = "new.php";
    } else {
        $VIEW_PAGE = "list.php";
    }

    require_once '../index.php';
