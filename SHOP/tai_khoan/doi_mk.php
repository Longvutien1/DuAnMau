<?php 
    $error = "";

    // require '../PDO/pdo_tai_khoan.php';
    $pdo_tai_khoan = new procedure_tai_khoan();
    $result = $pdo_tai_khoan->thong_tin_tk_by_id($_SESSION['id_kh']);
    if (!empty($result)) {
        foreach ($result as $u) {
            $avatar = $u['hinh'];
            $ten_dang_nhap = $u['ma_kh'];
            $ho_ten = $u['ho_ten'];
            $email = $u['email'];
            $mat_khau = $u['mat_khau'];
            
        }
    }

    if (isset($_POST['btn_doi_mk'])) {
        $mat_khau_cu = $_POST['mat_khau_cu'];
        foreach ($result as $u) {
            $mat_khau_cu = password_verify($mat_khau_cu, $u['mat_khau']);
            // var_dump($ma_hoa_mk);
            // die;
        }
        $mat_khau_moi = $_POST['mat_khau_moi'];
        $mat_khau_moi2 = $_POST['mat_khau_moi2'];

        if ($mat_khau_cu == "" || $mat_khau_moi == "") {
            $error = "Không được để trống thông tin";
        } else if ($mat_khau_cu != $mat_khau) {
            $error = "Mật khẩu không chính xác";
        } else if ($mat_khau_moi2 != $mat_khau_moi) {
            $error = "Mật khẩu không trùng khớp";
        } else {
            $mat_khau_moi = password_hash($mat_khau_moi, PASSWORD_DEFAULT);
            $result_update_mk = $pdo_tai_khoan->update_mk($ten_dang_nhap, $mat_khau_moi);
        }
    }

    if (isset($result_update_mk)) {
        echo "<script> alert('$result_update_mk')</script>";
        header("refresh:0.5;url=index.php?thong_tin_tk");
    }

?>
<section class="w-9/12 m-auto mt-8 mb-16">
    <div class="grid grid-cols-12 gap-8">
       
        <div class="col-span-12">
            <h2 class="text-center p-3 mb-8 text-xl" style="background-color:#3F3F3F ; color: #fff; border-radius: 8px;">ĐỔI MẬT KHẨU</h2>
            <div class="">
                <div>

                    <form action="" method="POST">
                        <div class="grid grid-cols-12 gap-8">
                            <div class="col-span-3 h-20">
                                <img src="admin/anh/<?php echo $avatar ?>" alt="" style="max-width: 100%; width: 300px; height: 300px; border-radius: 100%;">
                            </div>
                            <!-- end ảnh đại diện -->
                            <div class="col-span-9">
                                <div class="mb-4">
                                    <p>Tên đăng nhập</p>
                                    <input type="text" name="ten_dang_nhap" style="background-color: #D1D1D1;outline: none; border:1px solid black; width: 100%;height: 30px; padding: 8px;" placeholder="Tên đăng nhập" value="<?php echo $ten_dang_nhap ?>" readonly>
                                </div>
                                <div class="mb-2">
                                    <p>Mật khẩu cũ</p>
                                    <input type="password" name="mat_khau_cu" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;">
                                </div>
                                <div class="mb-2">
                                    <p>Mật khẩu mới</p>
                                    <input type="password" name="mat_khau_moi" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;">
                                </div>
                                <div class="mb-2">
                                    <p>Xác nhận mật khẩu mới</p>
                                    <input type="password" name="mat_khau_moi2" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;">
                                </div>
                                <p style="color: red;"><?php if ($error != "") echo $error; ?></p>
                                <input class="py-1 px-4" name="btn_doi_mk" style="background-color: #3f3f3f; color: #fff;" type="submit" value="Đổi mật khẩu">
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

