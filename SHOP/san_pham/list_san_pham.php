    <p class="my-auto" style="font-weight: 600;color: green; ">
        <?php
        if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }

        ?>
    </p>
    <!-- form tìm kiếm sản phẩm -->
    <form action="" method="GET">

        <div style="display: flex; justify-content: flex-end;">
            <input class="w-52 h-8 p-4 font-bold border rounded-md" name="search" type="text" placeholder="Search" value="<?php if (isset($_GET['search'])) {
                                                                                                                                echo $_GET['search'];
                                                                                                                            } ?>">
            <input style="background: #3F3F3F; color: #fff; margin-left:10px ;" class="p-1 px-3 rounded-md" type="submit" name="submitSearch" value="Submit">
        </div>
        <?php
        // require '../admin/DAO/pdo_hang_hoa.php';
        $pdo_hang_hoa = new procedure_hang_hoa();
        if (isset($_POST['all_product'])) {
            unset($_GET['search']);
            // unset($_GET('submitSearch'));
            $result = $pdo_hang_hoa->list_hang_hoa_home();
        }
        // kiểm tra search
        if (isset($_GET['submitSearch']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $result = $pdo_hang_hoa->search_product($_GET['search']);
            if ($result) {
                echo "<h3 class=' m-1' style='color: green;font-weight: 600;'> Tìm thấy " . count($result) . " sản phẩm </h3>";
            } else {
                echo "<h3 class=' m-1' style='color:red;font-weight: 600;'> Không tìm thấy sản phẩm nào !</h3>";
            }
        } else if (isset($_GET['name_category'])) {
            $name_category = $_GET['name_category'];
            $result = $pdo_hang_hoa->search_product_by_ten_loai($name_category);
        } else if (isset($_GET['search_loai'])) {
            $search_loai = $_GET['search_loai'];
            $result = $pdo_hang_hoa->search_product_by_ten_loai($_GET['search_loai']);
        } else if (isset($_GET['name_product'])) {
            $name_product = $_GET['name_product'];
            $result = $pdo_hang_hoa->list_product_by_ten_hh($_GET['name_product']);
        } else {
            $result = $pdo_hang_hoa->list_hang_hoa_home();
        }
        ?>
    </form>

    <section class="my-8 grid grid-cols-3 gap-8  lg:grid lg:grid-cols-12 lg:gap-8">
        <?php

        if (!empty($result)) {
            foreach ($result as $u) : ?>
                <article class="col-span-1 text-center lg:col-span-4">
                    <div class="item-img" style="width: 262px;height: 326px;">
                        <a class="product-image" href="index.php?chi_tiet_sp&ma_hh=<?php echo $u['ma_hh'] ?>"><img src="admin/anh/<?= $u['hinh'] ?> " style="max-width: 100%;"></a>
                        <div class="action-bot">
                            <ul class="add-to-links">
                                <li><a class="wrap-addtocart" href="index.php?add_to_cart&id_addtoCart=<?php echo $u['ma_hh'] ?>"><i class="fas fa-shopping-cart"></i></a></li>
                                <li><a class="wrap-addtocart" href=""><i class="fas fa-heart"></i></a></li>
                                <li><a class="wrap-addtocart" href=""><i class="fas fa-random"></i></a></li>
                                <li><a class="wrap-addtocart" href=""><i class="fas fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <h3 class="mb-0 text-lg " style="font-family: Raleway, sans-serif !important;font-weight: 600;"> <?php echo $u['ten_hh'] ?></h3>
                    <div>
                        <span class="text-gray-400 text-lg font-semibold line-through">$<?php echo $u['don_gia'] ?>.00</span>
                        <span class="text-yellow-500 text-xl font-semibold">
                        $<?php echo $u['don_gia'] - ($u['don_gia']*$u['giam_gia'] / 100) ?>
                            .00</span>
                    </div>
                </article>
        <?php endforeach;
        }  ?>
    </section>
    <div class="mt-4">
        <?php if (isset($_GET['submitSearch']) && !empty($_GET['search'])) { ?>
            <form action="" method="POST">
                <button type="submit" name="all_product" class="p-1 px-3 rounded-md" style="background: #3F3F3F; color: #fff;">Tất cả sản phẩm</button>
            </form>
        <?php } ?>
    </div>
    <!--end all sản phẩm  -->
    <!-- end danh sách sản phẩm -->
    <div class="my-8 text-center">
        <?php
        $tong_so_hh = $pdo_hang_hoa->list__count_hang_hoa();
        // var_dump($tong_so_hh);
        $so_trang = ceil($tong_so_hh / 15);
        // var_dump($so_trang);

        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        ?>
        <div class="w3-container">
            <div class="w3-bar">
                <ul>
                    <?php if ($page > 1) {
                    ?>
                        <li class="inline-block"> <a href="?page=<?php echo $page - 1 ?>" class='w3-button'>&laquo;</a> </li>
                    <?php } ?>

                    <?php
                    for ($i = 1; $i <= $so_trang; $i++) { ?>
                        <li class="inline-block" <?php echo $i == $page ? 'style="background-color: #3F3F3F;color:#fff; border-radius: 8px;"' : '' ?>><a href="index.php?page=<?php echo $i ?><?php echo isset($search)  ? "&search=$search&submitSearch=Submit" : '' ?><?php echo isset($search_loai) ? "&search_loai=$search_loai" : '' ?><?php echo isset($name_category) ? "&name_category=$name_category" : '' ?><?php echo isset($name_product) ? "&name_product=$name_product" : '' ?>" class='w3-button'><?php echo $i ?></a> </li>
                    <?php } ?>

                    <?php if ($page < $so_trang) {
                    ?>
                        <li class="inline-block"><a href="?page=<?php echo $page + 1 ?>" class='w3-button'>&raquo;</a></li>
                    <?php } ?>

                </ul>

            </div>

        </div>

    </div>