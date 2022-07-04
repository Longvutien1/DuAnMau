<?php

//  session_destroy();
$id = isset($_GET['id_del']) ? (int)$_GET['id_del'] : '';
// var_dump($id);
if ($id) {
    if (array_key_exists($id, $_SESSION['cart'])) {
        unset($_SESSION['cart'][$id]);
        $_SESSION['success_gio_hang'] = "Xóa sản phẩm thành công !";
        header("refresh:0.2;url=index.php?gio_hang");
    }
}


?>
<style>
    table {
        border: 1px solid #3F3F3F;
        border-collapse: collapse;
        width: 100%;
        text-align: center;


    }

    .th {
        border: 1px solid #3F3F3F;
        border-right: 1px solid #fff;
        background-color: #3F3F3F;
        color: white;
        padding: 5px 10px;
    }

    th {
        /* border: 1px solid #3F3F3F; */
        background-color: #3F3F3F;
        color: white;

    }

    td {
        /* border-collapse: collapse; */
        border: 1px solid #3F3F3F;
        padding: 15px;
        /* border-bottom: 1px solid #3F3F3F; */
    }
</style>

<main style="background-color: #EBEDF5;">

    <section class="py-12">

        <div class="w-9/12 m-auto " style="background-color: #fff; border-radius: 8px; padding: 40px; ">
            <h2 style="font-size: 30px; font-weight: 800;line-height: 0px;">Giỏ hàng</h2>
            <div class="flex justify-between">
                <p class="my-auto" style="color: green; font-weight: 600; ">
                    <?php
                    if (isset($_SESSION['success_gio_hang'])) {
                        echo $_SESSION['success_gio_hang'];
                        unset($_SESSION['success_gio_hang']);
                    }
                    ?>
                </p>
                <!-- form tìm kiếm sản phẩm -->
                <form action="" method="POST">
                    <input class="w-52 h-8 p-4 font-bold border rounded-md" name="search" type="text" placeholder="Search" value="<?php if (isset($_POST['search'])) {
                                                                                                                                        echo $_POST['search'];
                                                                                                                                    } ?>">
                    <input style="background: #3F3F3F; color: #fff;" class="p-1 px-3 rounded-md" type="submit" name="submitSearch" value="Submit">

                </form>
                <!-- end search -->
            </div>

            <form action="">

                <div>
                    <table style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th class="th">Mã SP </th>
                                <th class="th">Ảnh sản phẩm</th>
                                <th class="th">Tên sản phẩm </th>
                                <th class="th">Số lượng </th>
                                <th class="th">Giá </th>
                                <th class="th">Ngày nhập</th>
                                <th class="th">Đặc biệt</th>
                                <th class="">Xóa</th>

                            </tr>
                            <tr>


                            </tr>
                        </thead>
                        <tbody style="font-weight: 600;">
                            <?php
                            $list_product2 = new procedure_hang_hoa();
                            // kiểm tra search
                            if (isset($_POST['submitSearch']) && !empty($_POST['search'])) {

                                $result = $list_product2->search_product($_POST['search']);
                                if ($result) {
                                    $thongBao =  "<h3 class=' m-1' style='color: green;font-weight: 600;'> Tìm thấy 1 sản phẩm </h3>";
                                    echo $thongBao;
                                } else {
                                    $thongBao2 = "<h3 class=' m-1' style='color:red;font-weight: 600;'> Không tìm thấy sản phẩm nào !</h3>";
                                    echo $thongBao2;
                                }
                            }
                            if (!isset($_SESSION['cart'])) {
                                echo "Không có sản phẩm nào trong giỏ hàng";
                            }
                            ?>

                            <?php

                            if (isset($_SESSION['cart'])) {
                                if (isset($thongBao)) {
                                    foreach ($_SESSION['cart'] as $key => $value) :
                                        if ($value['ten_hh'] == $_POST['search']) {  ?>
                                            <tr>
                                                <td><?php echo $key ?> </td>
                                                <td><img class="mx-auto" src="admin/anh/<?= $value['hinh'] ?>" width="120"></td>
                                                <td><?php echo $value['ten_hh'] ?></td>
                                                <td><?php echo $value['qtity'] ?></td>
                                                <td class="text-yellow-500 text-lg font-semibold">$<?php echo $value['don_gia'] ?>.00</td>
                                                <td><?php echo $value['ngay_nhap'] ?></td>
                                                <td><?php echo $value['dac_biet'] == 1 ? "Hàng đặc biệt" : "Bình thường" ?></td>
                                                <td>
                                                    <a href="../gio_hang/del_productCart.php?id_del=<?php echo $key ?>"> <i class="fas fa-trash-alt" style="color: #E34724;"></i></a>
                                                </td>

                                            </tr>

                                    <?php }
                                    endforeach; ?>
                                    <?php
                                } else  if (isset($thongBao2)) {
                                } else {
                                    foreach ($_SESSION['cart'] as $key => $value) : ?>
                                        <tr>
                                            <td><?php echo $key ?> </td>
                                            <td><img class="mx-auto" src="admin/anh/<?= $value['hinh'] ?>" width="120"></td>
                                            <td><?php echo $value['ten_hh'] ?></td>
                                            <td><?php echo $value['qtity'] ?></td>
                                            <td class="text-yellow-500 text-lg font-semibold">$<?php echo $value['don_gia'] ?>.00</td>
                                            <td><?php echo $value['ngay_nhap'] ?></td>
                                            <td><?php echo $value['dac_biet'] == 1 ? "Hàng đặc biệt" : "Bình thường" ?></td>
                                            <td>
                                                <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không ?')" href="index.php?del_productCart&id_del=<?php echo $key ?>"> <i class="fas fa-trash-alt" style="color: #E34724;"></i></a>
                                            </td>

                                        </tr>
                            <?php
                                    endforeach;
                                }
                            }  ?>

                        </tbody>
                        <tfoot style=" color:red;font-weight: 700;font-size: 20px;">
                            <?php
                            $tong = 0;
                            $dem = 0;
                            $_SESSION['count_product'] = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) :
                                    $dem = (int)$value['qtity'] *  (int)$value['don_gia'];
                                    $tong += $dem;
                                    $_SESSION['count_product'] += (int)$value['qtity'];
                                endforeach;
                            }
                            ?>

                            <tr>
                                <td colspan="3">Tổng tiền: </td>
                                <td colspan="4"> $<?php echo $tong ?>.00 </td>

                            </tr>

                        </tfoot>
                    </table>
                </div>
            </form>
            <!-- end danh sách sản phẩm -->
            <div class="mt-4">
                <?php if (isset($_POST['submitSearch']) && !empty($_POST['search'])) { ?>
                    <form action="" method="POST">
                        <button type="submit" name="all_product" class="p-1 px-3 rounded-md" style="background: #3F3F3F; color: #fff;">All Product</button>
                    </form>
                <?php } ?>
            </div>
            <!--end all sản phẩm  -->
        </div>

    </section>
</main>