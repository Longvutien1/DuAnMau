<?php
    // require_once '../PDO/pdo.php';
    // require_once '../admin/DAO/pdo_hang_hoa.php';


    $product_add = new procedure_hang_hoa();
    $id = isset($_GET['id_addtoCart']) ? (int)$_GET['id_addtoCart'] : '';

    $product = $product_add->add_to_cart($id);
    echo "<pre>";
   
    // var_dump($product);
    // nếu mà tồn tại product thì check giỏ hàng
    if ($product) {
        if (isset($_SESSION['cart'])) {
            // var_dump("đã tồn tại giỏ hàng");
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['qtity'] += 1;  // số lượng
            }else{
                $_SESSION['cart'][$id]['qtity'] = 1;  // số lượng
            } 
            $_SESSION['cart'][$id]['ten_hh'] = $product[0]['ten_hh']; //name
            $_SESSION['cart'][$id]['don_gia'] = $product[0]['don_gia']; //giá
            $_SESSION['cart'][$id]['giam_gia'] = $product[0]['giam_gia']; //giảm giá
            $_SESSION['cart'][$id]['hinh'] = $product[0]['hinh']; //ảnh
            $_SESSION['cart'][$id]['ngay_nhap'] = $product[0]['ngay_nhap']; //ngày nhập
            $_SESSION['cart'][$id]['mo_ta'] = $product[0]['mo_ta']; //mô tả
            $_SESSION['cart'][$id]['dac_biet'] = $product[0]['dac_biet']; //đặc biệt
            $_SESSION['cart'][$id]['so_luot_xem'] = $product[0]['so_luot_xem']; //số lượt xem
            $_SESSION['cart'][$id]['ma_loai'] = $product[0]['ma_loai']; //mã loại

      //      $_SESSION['cart'][$id]['status'] = $product[0]['productStatus'];  //trạng thái (còn hàng or hết hàng)
            $_SESSION['success'] = "Tồn tại giỏ hàng, cập nhật thành công !";
            $_SESSION['count_product'] =0;
            foreach ($_SESSION['cart'] as $key => $value) {
                $_SESSION['count_product'] += $value['qtity'];
            }
            
             
            // var_dump($_SESSION['cart'][$id]['image']);
            header("location:index.php");  
            
        } else {
            // var_dump("chưa tồn tại");
            $_SESSION['cart'][$id]['ten_hh'] = $product[0]['ten_hh']; //name
            $_SESSION['cart'][$id]['don_gia'] = $product[0]['don_gia']; //giá
            $_SESSION['cart'][$id]['giam_gia'] = $product[0]['giam_gia']; //giảm giá
            $_SESSION['cart'][$id]['hinh'] = $product[0]['hinh']; //ảnh
            $_SESSION['cart'][$id]['ngay_nhap'] = $product[0]['ngay_nhap']; //ngày nhập
            $_SESSION['cart'][$id]['mo_ta'] = $product[0]['mo_ta']; //mô tả
            $_SESSION['cart'][$id]['dac_biet'] = $product[0]['dac_biet']; //đặc biệt
            $_SESSION['cart'][$id]['so_luot_xem'] = $product[0]['so_luot_xem']; //số lượt xem
            $_SESSION['cart'][$id]['ma_loai'] = $product[0]['ma_loai']; //mã loại


            $_SESSION['cart'][$id]['qtity'] = 1;  // số lượng

            $_SESSION['count_product'] =0;
            foreach ($_SESSION['cart'] as $key => $value) {
                $_SESSION['count_product'] += $value['qtity'];
            }
      //      $_SESSION['cart'][$id]['status'] = $product[0]['productStatus'];  //trạng thái (còn hàng or hết hàng)
            $_SESSION['success'] = "Tạo mới giỏ hàng thành công !";
            header("location:index.php");   
            // echo   $_SESSION['success'] ;
          
        }
    }else{
        $_SESSION['success'] = "Không tồn tại sản phẩm !";
        header("location:index.php");     
    }
  

?>