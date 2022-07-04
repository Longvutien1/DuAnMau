<?php

    function pdo_get_connection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $port = "3307";
        try {
            $connect = new PDO("mysql:host=$servername;dbname=shop;port=3307", $username, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connect;
        } catch (PDOException $e) {
            echo "Lỗi kết nối: ". $e->getMessage();
        }
    } 

    // pdo_get_connection();
    // "insert into loai(ten_loai) values(?)", "labtop"
    // "update loai set ten_loai = ? where ma_loai = ?", "labtop" , "1"

    function pdo_execute($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $connect = pdo_get_connection();
            $stmt = $connect->prepare($sql);
            $kq = $stmt->execute($sql_args);
            if ($kq) {
                return "Thành công";
            }else{
                return "Thất bại";
            }
        } catch (PDOException $e) {
            throw $e;
        }
        finally{
            unset($connect);
        }
    }

    function pdo_query($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $connect = pdo_get_connection();
            $stmt = $connect->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetchAll();
            return $row;
        } catch (PDOException $e) {
            throw $e;
        }
        finally{
            unset($connect);
        }
    }

   function pdo_query_one($sql){
        $sql_args = array_slice(func_get_args(), 1);
        
        try {
            $connect = pdo_get_connection();
            $stmt = $connect->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            throw $e;
        }
        finally{
            unset($connect);
        }

   }
//   truy vấn 1 dữ liệu


function pdo_query_value($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

?>