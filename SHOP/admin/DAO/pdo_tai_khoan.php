<?php

class procedure_tai_khoan
{

    function login($ma_kh)
    {
        $sql = "SELECT * FROM khach_hang where ma_kh=?";
        $result = pdo_query($sql, $ma_kh);
       
        return $result;
    }

    function thong_tin_kh(){
        $sql = "SELECT * from khach_hang ";
        $result = pdo_query($sql);
        return $result;
    } 


    function thong_tin_tk_by_id($ma_kh){
        $sql = "SELECT * from khach_hang where ma_kh=?";
        $result = pdo_query($sql, $ma_kh);
        return $result;
    }

    function add_khach_hang($ma_kh, $mat_khau , $ho_ten, $hinh, $email)
    {
        $sql = "INSERT into khach_hang(ma_kh, mat_khau , ho_ten, kick_hoat,hinh, email, vai_tro) values(?,?,?,?,?,?,?)";

        $kick_hoat = 0;
        $vai_tro = 0;
        $new_khach_hang = pdo_execute($sql, $ma_kh, $mat_khau,  $ho_ten,  $kick_hoat, $hinh, $email, $vai_tro );

        if ($new_khach_hang) {
            return "Thêm thành viên " . $new_khach_hang;
        } else {
            return "Thêm thành viên " . $new_khach_hang;
        }
    }


    function update_khach_hang($ma_kh, $ho_ten, $hinh, $email )
    {
        $sql = "UPDATE khach_hang SET  ho_ten=?, hinh=?, email=? WHERE ma_kh=?";
        $new_khach_hang = pdo_execute($sql, $ho_ten, $hinh,  $email, $ma_kh);

        if ($new_khach_hang) {
            return "Update thành viên " . $new_khach_hang;
        } else {
            return "Update thành viên " . $new_khach_hang;
        }
    }

    function update_mk($ma_kh, $mat_khau){
        $sql = "UPDATE khach_hang SET  mat_khau=? WHERE ma_kh=?";
        $new_mk = pdo_execute($sql, $mat_khau , $ma_kh);

        if ($new_mk) {
            return "Update thành viên " . $new_mk;
        } else {
            return "Update thành viên " . $new_mk;
        }
    }
    
}
