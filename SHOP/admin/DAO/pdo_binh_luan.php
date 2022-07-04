<?php
// require '../../PDO/pdo.php';
class procedure_binh_luan
{

    function add_binh_luan($ma_kh, $ma_hh, $noi_dung, $ngay_bl)
    {
        $sql = "INSERT into binh_luan(ma_kh, ma_hh, noi_dung, ngay_bl) values(?,?,?,?)";
        $new_binh_luan = pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl);

        if ($new_binh_luan) {
            return "Thêm bình luận " . $new_binh_luan;
        } else {
            return "Thêm bình luận " . $new_binh_luan;
        }
    }

    function update_binh_luan($ma_kh, $ma_hh, $noi_dung, $ngay_bl, $ma_bl)
    {
        $sql = "UPDATE binh_luan SET ma_kh=?, ma_hh=?, noi_dung=?, ngay_bl=? WHERE ma_bl=?";
        $new_binh_luan = pdo_execute($ma_kh, $ma_hh, $noi_dung, $ngay_bl, $ma_bl);

        if ($new_binh_luan) {
            return "Thêm hàng hóa " . $new_binh_luan;
        } else {
            return "Thêm hàng hóa " . $new_binh_luan;
        }
    }

    function list_binh_luan()
    {
        $limit = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $sql = "SELECT b.ten_hh, count(a.ma_hh) as 'so_bl', a.ma_bl, a.ngay_bl, a.ma_hh, MAX(a.ngay_bl) as 'bl_moi_nhat', MIN(a.ngay_bl) as 'bl_cu_nhat'
             FROM binh_luan a
            join hang_hoa b on a.ma_hh = b.ma_hh
            group by b.ten_hh
            order by ma_bl desc limit $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }
 

    function list__count_binh_luan()
    {
        $sql = "SELECT count(ma_bl) as 'count_bl' FROM binh_luan order by ma_bl desc";
        $value = pdo_query_value($sql);
        return $value;
    }

    // danh sách người bình luận theo id khách hàng
    function list_people_bl_by_id($ma_kh)
    {
        $sql = "SELECT b.ho_ten FROM binh_luan a
            join khach_hang b on a.ma_kh = b.ma_kh
        where a.ma_kh=?
        order by ma_bl desc";
        $row = pdo_query($sql, $ma_kh);
        return $row;
    }

    // danh sách tên sản phẩm theo id hàng hóa
    function list_product_by_id($ma_hh)
    {
        $sql = "SELECT ten_hh FROM hang_hoa a
            join binh_luan b on a.ma_hh = b.ma_hh
            where b.ma_hh = ?
            group by ten_hh
            " ;

        $row = pdo_query($sql, $ma_hh);
        return $row;
    }

    // danh sách những bình luận theo id hàng hóa
    function list_bl_by_ma_hh($ma_hh){
        $sql = "SELECT *, c.ho_ten FROM binh_luan a
            join hang_hoa b on a.ma_hh = b.ma_hh
            join khach_hang c on a.ma_kh = c.ma_kh
        where a.ma_hh=?
        order by ma_bl desc";
        $row = pdo_query($sql, $ma_hh);
        return $row;
    }
    // select bình luận theo id
    // tìm sản phẩm
    public function name_hh_by_id($ma_hh)
    {
        $sql = "SELECT b.ten_hh FROM binh_luan a
            join hang_hoa b on a.ma_hh = b.ma_hh
        where a.ma_hh=?
        order by ma_bl desc";
        $row = pdo_query_value($sql, $ma_hh);
        return $row;
    }

    function delete_binh_luan($ma_bl)
    {
        $sql = "DELETE FROM binh_luan where ma_bl=?";
        $result = pdo_execute($sql, $ma_bl);

        if ($result) {
            return "Xóa bình luận " . $result;
        } else {
            return "Xóa bình luận " . $result;
        }
    }



    // tìm sản phẩm
    public function search_product($search)
    {
        $limit = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $sql = "SELECT b.ten_hh, count(a.ma_hh) as 'so_bl', a.ma_bl, a.ngay_bl, a.ma_hh, MAX(a.ngay_bl) as 'bl_moi_nhat', MIN(a.ngay_bl) as 'bl_cu_nhat'  FROM binh_luan a
            join hang_hoa b on a.ma_hh = b.ma_hh
            where ten_hh LIKE '%$search%'
            group by b.ten_hh
            order by ma_bl desc limit  $start, $limit";
        $row = pdo_query($sql);
        return $row;

    }
   
}
