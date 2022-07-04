<?php

class procedure_loai_hang
{

    function add_loai_hang($ten_loai)
    {
        $sql = "INSERT into loai_hang(ten_loai) values(?)";
        $new_loai_hang = pdo_execute($sql, $ten_loai);

        if ($new_loai_hang) {
            return "Thêm loại hàng " . $new_loai_hang;
        } else {
            return "Thêm loại hàng " . $new_loai_hang;
        }
    }

    function update_loai_hang($ten_loai,$ma_loai){
        $sql = "UPDATE loai_hang set ten_loai=? where ma_loai=?";
        $result = pdo_execute($sql, $ten_loai, $ma_loai);
        if ($result) {
            return "Update loại hàng " . $result;
        } else {
            return "Update loại hàng " . $result;
        }
    }


    function list_loai_hang()
    {
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        
        $start = ($page - 1) * $limit;
        // $so_trang = ceil();
        //    $row = 3; số lượng bản ghi trên 1 trang
        //    $from = ($pages - 1) * $row; vị trí bắt đầu lấy ra các bản ghi

        $sql = "SELECT * FROM loai_hang order by ma_loai desc limit $start, $limit";
        $row = pdo_query($sql);
        return $row;
    }

    function list_loai_hang_by_id($ma_loai)
    {
       
        $sql = "SELECT * FROM loai_hang 
        where ma_loai = ?
        order by ma_loai desc";
        $row = pdo_query($sql,$ma_loai);
        return $row;
    }

    function list__count_loai_hang()
    {
        $sql = "SELECT count(ma_loai) as 'count_loai' FROM loai_hang order by ma_loai desc";
        $value = pdo_query_value($sql);
        return $value;
    }

    function delete_loai_hang($ma_loai){
        $sql = "DELETE FROM loai_hang where ma_loai='$ma_loai'";
        $result = pdo_execute($sql);

        if ($result) {
            return "Xóa loại hàng " . $result;
        } else {
            return "Xóa loại hàng " . $result;
        }
    }

    // tìm sản phẩm
    public function search_ten_loai($search)
    {
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        
        $start = ($page - 1) * $limit;
        $sql = "SELECT * FROM loai_hang where ten_loai LIKE '%$search%' order by ma_loai desc limit  $start, $limit";
        $row = pdo_query($sql);
        return $row;                                                                                                                            
    }
}
