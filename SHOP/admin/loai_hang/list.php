<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#3F3F3F ; color: #fff; border-radius: 8px;"> QUẢN LÝ LOẠI HÀNG</h2>
<div class="my-8 text-center">
    <?php

    $tong_so_lh = $pdo_loai_hang->list__count_loai_hang();
    // var_dump($tong_so_hh);
    $so_trang = ceil($tong_so_lh / 5);
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
<div class="float-right mb-2">

    <form action="" method="GET">
        <input class="w-52 h-8 p-4 font-bold border rounded-md" name="search" type="text" placeholder="Search" value="<?php if (isset($_GET['search'])) {
                                                                                                                            echo $_GET['search'];
                                                                                                                        } ?>">
        <input style="background: #3F3F3F; color: #fff;" class="p-1 px-3 rounded-md" type="submit" value="Submit">
    </form>
    <!-- end search -->

</div>

<form action="" method="POST">
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Mã Loại</th>
                <th>Tên Loại</th>
                <th>Quản lí</th>
            </tr>

        </thead>
        <tbody>
            <?php




            // kiểm tra search
            if (isset($_GET['search']) && !empty($_GET['search'])) {

                $result = $pdo_loai_hang->search_ten_loai($_GET['search']);
                // var_dump($result);
                if ($result) {
                    echo "<h3 class='mt-2' style='color: green;font-weight: 600;'> Tìm thấy " . count($result) . " loại hàng </h3>";
                } else {
                    echo "<h3 class='mt-2' style='color:red;font-weight: 600;'> Không tìm thấy loại hàng nào !</h3>";
                }
            } else {
                $result = $pdo_loai_hang->list_loai_hang();
            }
            if (!empty($result)) {
                foreach ($result as $u) :
            ?>
                    <tr>
                        <td><input type="checkbox" name="check_sp[]" value="<?php echo $u['ma_loai'] ?>" <?php if (isset($_POST['click_all'])) {
                                                                                                                echo "checked='checked'";
                                                                                                            } ?>></td>
                        <td><?php echo $u['ma_loai'] ?></td>
                        <td><?php echo $u['ten_loai'] ?></td>
                        <td>
                            <a href="index.php?update_btn&ma_loai=<?php echo $u['ma_loai'] ?>"><i class="material-icons " style="color: #FFC107;">&#xE254;</i></a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa loại hàng này không ?')" href="index.php?id_delete=<?php echo $u['ma_loai'] ?>"><i class="material-icons" style="color: #E34724;">&#xE872;</i></a>
                        </td>
                    </tr>
            <?php

                endforeach;
            } ?>

        </tbody>
    </table>
    <div class="row mt-4">
        <button class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f" name="click_all" type="submit">Chọn tất cả</button>
        <button class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f">Bỏ chọn tất cả</button>

        <input onclick="return confirm('Bạn có chắc muốn xóa loại hàng này không ?')" type="submit" value="Xóa các mục chọn" name="del_click" class=" py-1 px-4 " style="border-radius: 4px; border: 1px solid #3f3f3f; background-color: #fff;">
        <!-- <a href="index.php?del_click=<?php ?>" class="px-4 py-1 border border-black">Xóa các mục chọn</a> -->
        <a href="index.php?add_btn" style="border-radius: 4px; border: 1px solid #3f3f3f" class=" py-1 px-4 ">Nhập thêm</a>

    </div>
</form>
<div class="mt-4">
    <?php if (isset($_GET['search']) && !empty($_GET['search'])) { ?>
        <form action="" method="POST">
            <button type="submit" name="all_product" class="p-1 px-3 rounded-md" style="background: #3F3F3F; color: #fff;">Tất cả loại hàng</button>
        </form>
    <?php } ?>
</div>
<!--end all sản phẩm  -->