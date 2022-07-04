<h2 class="text-center p-3 mb-8 text-xl" style="background-color:#3F3F3F ; color: #fff; border-radius: 8px;">THỐNG KÊ HÀNG HÓA TỪNG LOẠI</h2>
<form action="index.php" method="POST">
    <div class="my-8 text-center">
        <?php
        $pdo_loai_hang = new procedure_thong_ke();
        $tong_so_lh = $pdo_loai_hang->list__count_loai_hang();
        // var_dump($tong_so_hh);
        $so_trang = ceil($tong_so_lh / 10);
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
    <table class="mb-4">
        <thead>
            <tr>
                <th>LOẠI HÀNG</th>
                <th>SỐ LƯỢNG</th>
                <th>GIÁ CAO NHẤT</th>
                <th>GIÁ THẤP NHẤT</th>
                <th>GIÁ TRUNG BÌNH</th>
            </tr>

        </thead>
        <tbody>
            <?php
            $pdpo_thong_ke = new procedure_thong_ke();
            $result = $pdpo_thong_ke->list_thong_ke();
            if (!empty($result)) {

                foreach ($result as $u) :
                    // var_dump($u['ten_loai']);
            ?>
                    <tr>
                        <td><?php echo $u['ten_loai'] ?></td>
                        <td><?php echo $u['so_luong'] ?></td>
                        <td><?php echo isset($u['gia_max']) ? $u["gia_max"] : 0 ?></td>
                        <td><?php echo isset($u['gia_min']) ? $u["gia_min"] : 0 ?></td>
                        <td><?php echo isset($u['gia_tb']) ? $u["gia_tb"] : 0 ?></td>
                    </tr>
            <?php endforeach;
            } ?>


        </tbody>
    </table>
    <a href="index.php?bieu_do" class="px-4 py-1 border border-black">Xem biểu đồ</a>

</form>