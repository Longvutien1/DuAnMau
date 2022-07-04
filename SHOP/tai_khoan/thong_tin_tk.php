
<?php

if (isset($_GET['dang_xuat']) && $_GET['dang_xuat'] == "logout") {
    session_destroy();
    header('location: index.php');
    exit;
}
?>
<section class="w-9/12 m-auto mt-8 mb-16">
    <div class="grid grid-cols-12 gap-8">
   
        <div class="col-span-12">
            <?php
            

            $error = "";

            // require '../PDO/pdo_tai_khoan.php';
          
            $result = $pdo_tai_khoan->thong_tin_tk_by_id($_SESSION['id_kh']);
            if (!empty($result)) {
                foreach ($result as $u) {
                    $avatar = $u['hinh'];
                    $ten_dang_nhap = $u['ma_kh'];
                    $ho_ten = $u['ho_ten'];
                    $email = $u['email'];
                }
            }

            if (isset($_POST['btn_update'])) {
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $anh_dai_dien = $_FILES['anh_dai_dien']['name'];
                $anh_dai_dien_tmp = $_FILES['anh_dai_dien']['tmp_name'];

                if ($anh_dai_dien == "") {
                    $anh_dai_dien = $avatar;
                }
                // validate
                if ($ho_ten == "") {
                    $error = "Họ tên không được để trống !";
                } else if ($email == "") {
                    $error = "Email không được để trống !";
                } else {
                    $_SESSION['name'] = $ho_ten;
                    $result_update = $pdo_tai_khoan->update_khach_hang($ten_dang_nhap, $ho_ten, $anh_dai_dien, $email);
                    move_uploaded_file($anh_dai_dien_tmp, 'admin/anh/' . $anh_dai_dien);
                }
            }

            if (isset($result_update)) {
                echo "<script> alert('$result_update')</script>";
                

            }
            ?>

            <h2 class="text-center p-3 mb-8 text-xl" style="background-color:#3F3F3F ; color: #fff; border-radius: 8px;"> CẬP NHẬT TÀI KHOẢN </h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-12 gap-8">
                    <div class="col-span-3 h-20">
                        <img src="admin/anh/<?php echo $avatar ?>" alt="" style="max-width: 100%; width: 300px; height: 300px; border-radius: 100%;">
                    </div>
                    <!-- end ảnh đại diện -->
                    <div class="col-span-9">
                        <div>
                            <div class="mb-4">
                                <p>Tên đăng nhập</p>
                                <input type="text" name="ten_dang_nhap" style="background-color: #D1D1D1; border:1px solid black; width: 100%;height: 30px; padding: 8px;" value="<?php echo $ten_dang_nhap ?>" placeholder="Auto Number" readonly>
                            </div>
                            <div class="mb-4">
                                <p>Họ và tên</p>
                                <input type="text" name="ho_ten" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;" value="<?php echo $ho_ten ?>">
                            </div>
                            <div class="mb-4">
                                <p>Địa chỉ email</p>
                                <input type="email" name="email" style="border:1px solid black; width: 100%;height: 30px; padding: 4px;" value="<?php echo $email ?>">
                            </div>
                            <div class="mb-4">
                                <p>Ảnh đại diện</p>
                                <input type="file" name="anh_dai_dien" style="border:1px solid black; width: 100%;height: 35px; padding: 4px;">
                            </div>
                            <p style="color: red;"><?php if ($error != "") echo $error; ?></p>
                            <!-- <input   type="submit" name="btn_update" value=""> -->
                            <button type="submit" name="btn_update" class="py-1 px-4" style="background-color: #3f3f3f; color: #fff;">Cập nhật</button>
                            <a href="index.php?doi_mk" class="py-1 px-4 ml-4" style="background-color: #3f3f3f; color: #fff;">Đổi mật khẩu</a>
                            <a onclick="return confirm('Bạn có chắc muốn đăng xuất không ?')" href="index.php?thong_tin_tk&dang_xuat=logout" class="py-1 px-4 ml-4" style="background-color: #3f3f3f; color: #fff;">Đăng xuất</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>

