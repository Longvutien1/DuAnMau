<?php
// require '../../PDO/pdo.php';
class procedure_hang_hoa
{

    function add_hang_hoa($ten_hh, $don_gia, $giam_gia, $hinh_anh,  $ngay_nhap, $mo_ta, $dac_biet, $ma_loai_hang)
    {
        $sql = "INSERT into hang_hoa(ten_hh, don_gia, giam_gia, hinh, ngay_nhap, mo_ta, dac_biet, ma_loai) values(?,?,?,?,?,?,?,?)";
        $new_loai_hang = pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh_anh,  $ngay_nhap, $mo_ta, $dac_biet, $ma_loai_hang);

        if ($new_loai_hang) {
            return "Thêm hàng hóa " . $new_loai_hang;
        } else {
            return "Thêm hàng hóa " . $new_loai_hang;
        }
    }

    function update_hang_hoa($ten_hh, $don_gia, $giam_gia, $hinh_anh,  $ngay_nhap, $mo_ta, $dac_biet, $ma_loai_hang, $ma_hh)
    {
        $sql = "UPDATE hang_hoa SET ten_hh=?, don_gia=?, giam_gia=?, hinh=?, ngay_nhap=?, mo_ta=?, dac_biet=?, ma_loai=? WHERE ma_hh=?";
        $new_loai_hang = pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh_anh,  $ngay_nhap, $mo_ta, $dac_biet, $ma_loai_hang, $ma_hh);

        if ($new_loai_hang) {
            return "Sửa hàng hóa " . $new_loai_hang;
        } else {
            return "Sửa hàng hóa " . $new_loai_hang;
        }
    }

    // tăng số lượt xem
    function tang_so_luot_Xem($ma_hh)
    {
        $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 where ma_hh=?";
        $row = pdo_execute($sql, $ma_hh);
        return $row;
    }

    function list__count_hang_hoa()
    {
        $sql = "SELECT count(ma_hh) as 'count_hh' FROM hang_hoa order by ma_hh desc";
        $value = pdo_query_value($sql);
        return $value;
    }

    function list_hang_hoa()
    {
        $limit = 3;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;
        // $so_trang = ceil();
        //    $row = 3; số lượng bản ghi trên 1 trang
        //    $from = ($pages - 1) * $row; vị trí bắt đầu lấy ra các bản ghi

        $sql = "SELECT * FROM hang_hoa order by ma_hh desc limit $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }

    function list_hang_hoa_home()
    {
        $limit = 15; 
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;


        $sql = "SELECT * FROM hang_hoa order by ma_hh desc limit $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }


    // danh sách hàng hóa theo loại
    function list_hang_hoa_theo_loai($ma_loai)
    {
        $limit = 3;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;
        $sql = "SELECT * FROM hang_hoa where ma_loai=? order by ma_hh desc limit $start, $limit";
        $row = pdo_query($sql, $ma_loai);
        return $row;
    }

    // danh sách hàng hóa theo id
    function list_hang_hoa_theo_id($ma_hh)
    {
        $sql = "SELECT a.*, b.ten_loai FROM hang_hoa a
        join loai_hang b on a.ma_loai = b.ma_loai
        where ma_hh=? order by ma_hh desc";
        $row = pdo_query($sql, $ma_hh);
        return $row;
    }

    function list_loai_hang()
    {
        $sql = "SELECT * FROM loai_hang ";
        $row = pdo_query($sql);
        return $row;
    }

    function ten_loai_hang($ma_loai)
    {

        $sql = "SELECT ten_loai FROM loai_hang where ma_loai='$ma_loai'";

        $result = pdo_query_value($sql);
        return $result;
    }

    function delete_hang_hoa($ma_hh)
    {
        $sql = "DELETE FROM hang_hoa where ma_hh=?";
        $result = pdo_execute($sql, $ma_hh);

        if ($result) {
            return "Xóa sản phẩm " . $result;
        } else {
            return "Xóa sản phẩm " . $result;
        }
    }

    function select_hh_top_10()
    {
        $sql = "SELECT * FROM hang_hoa where so_luot_xem >= 0
        order by so_luot_xem desc limit 0,10";
        $row = pdo_query($sql);
        return $row;
    }





    // tìm sản phẩm
     function search_product($search)
    {
        $limit = 3;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;
        $sql = "SELECT * FROM hang_hoa where ten_hh LIKE '%$search%' order by ma_hh desc limit  $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }

     function search_product_by_ten_loai($search)
    {
        $limit = 15;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;

        $sql = "SELECT * FROM hang_hoa a
        join loai_hang b on a.ma_loai = b.ma_loai
        where b.ten_loai LIKE '%$search%' 
        order by a.ma_hh desc limit  $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }

     function list_product_by_ten_hh($search)
    {
        $limit = 15;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $start = ($page - 1) * $limit;

        $sql = "SELECT * FROM hang_hoa where ten_hh LIKE '%$search%' order by ma_hh desc limit  $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }

    // thêm sản phẩm vào giỏ hàng
    function add_to_cart($id_product){
        $sql = "SELECT * FROM hang_hoa where ma_hh='$id_product'";
        $row = pdo_query($sql);
        return $row;
    }

}
