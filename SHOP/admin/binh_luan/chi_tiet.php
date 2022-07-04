<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#3F3F3F ; color: #fff; border-radius: 8px;"> CHI TIẾT BÌNH LUẬN</h2>
<div class="my-8 text-center">
    <?php

    $tong_so_bl = $pdo_binh_luan->list__count_binh_luan();
    // var_dump($tong_so_hh);
    $so_trang = ceil($tong_so_bl / 10);
    // var_dump($so_trang);
    if (isset($_POST['all_product'])) {
        unset($_GET['search']);
    }
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    ?>
    <div class="w3-container">
        <div class="w3-bar">
            <ul>
                <?php if ($page > 1) {
                ?>
                    <li class="inline-block"> <a href="?page=<?php echo $page - 1 ?><?php echo isset($search) ? "&search=$search" : '' ?>" class='w3-button'>&laquo;</a> </li>
                <?php } ?>

                <?php
                for ($i = 1; $i <= $so_trang; $i++) { ?>
                    <li class="inline-block" <?php echo $i == $page ? 'style="background-color: #3F3F3F;color:#fff; border-radius: 8px;"' : '' ?>><a href="index.php?page=<?php echo $i ?><?php echo isset($search) ? "&search=$search" : '' ?>" class='w3-button'><?php echo $i ?></a> </li>
                <?php } ?>

                <?php if ($page < $so_trang) {
                ?>
                    <li class="inline-block"><a href="?page=<?php echo $page + 1 ?><?php echo isset($search) ? "&search=$search" : '' ?>" class='w3-button'>&raquo;</a></li>
                <?php } ?>

            </ul>

        </div>

    </div>

</div>
<h2 class="text-center p-3 mb-2 text-xl">HÀNG HÓA: <?php
                                                    // var_dump($result);
                                                    if (isset($ten_hh)) {
                                                        echo $ten_hh;
                                                    }
                                                    ?></h2>
<form action="index.php" method="POST">
    <table>
        <thead>
            <tr>
                <th></th>
                <th>MÃ BL</th>
                <th>NỘI DUNG BL</th>
                <th>NGÀY BÌNH LUẬN</th>
                <th>NGƯỜI BÌNH LUẬN</th>
                <th>QUẢN LÍ</th>
            </tr>

        </thead>
        <tbody>
            <?php


            if (!empty($result)) {
                foreach ($result as $u) :
            ?>
                    <tr>
                        <td><input type="checkbox" name="check_sp[]" value="<?php echo $u['ma_bl'] ?>" <?php if (isset($_POST['click_all'])) {
                                                                                                            echo "checked='checked'";
                                                                                                        } ?>></td>
                        <td><?php echo $u['ma_bl'] ?></td>
                        <td><?php echo $u['noi_dung'] ?></td>
                        <td><?php echo $u['ngay_bl'] ?></td>
                        <td><?php echo $u['ho_ten'] ?>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc muốn xóa bình luận này không ?')" href="index.php?id_delete=<?php echo $u['ma_bl'] ?>"><i class="material-icons" style="color: #E34724;">&#xE872;</i></a>
                        </td>
                    </tr>
            <?php endforeach;
            } ?>


        </tbody>
    </table>
    <div class="row mt-4">
        <button class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f" name="click_all" type="submit">Chọn tất cả</button>
        <button class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f">Bỏ chọn tất cả</button>
        <input onclick="return confirm('Bạn có chắc muốn xóa loại hàng này không ?')" type="submit" value="Xóa các mục chọn" name="del_click" class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f; background-color: #fff;">
        <a href="index.php?list_btn" class="px-4 py-1 border border-black">Danh sách bình luận</a>
    </div>
</form>