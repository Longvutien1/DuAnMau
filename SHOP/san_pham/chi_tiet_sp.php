<style>
    table {
        border: 1px solid #E8E8E8;
        border-collapse: collapse;
        width: 100%;
        text-align: left;
        font-weight: 900;
        padding: 10px;
    }

    th {
        border: 1px solid #E8E8E8;
        background-color: #E8E8E8;
        padding: 5px 10px;
    }

    img {
        vertical-align: middle;
    }

    .tong {
        position: relative;
    }

    .cursor {
        cursor: pointer;
    }

    .mySlides {
        display: block;
        overflow: hidden;

    }

    .mySlides img {
        transition: all 0.25s ease-in-out;
    }

    .mySlides:hover img {
        transform: scale(1.3);
    }

    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 87%;
        width: auto;
        padding: 16px;
        /* margin-top: -52px; */
        color: rgb(73, 62, 62);
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: -37px;
        border-radius: 0 3px 3px 0;
    }

    .prev {
        left: -37px;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
    }

    .row::after {
        content: "";
        display: table;
        clear: both;
    }

    .col {
        float: left;
        width: 25%;
        padding: 5px;
    }

    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    .imgChinh {
        background-image: url(../Assignment/img_product/01.jpg);
    }

    h2:hover {
        color: #FE7522;
        transition: all 0.2s ease-in-out;
    }

    .spanHover:hover {
        color: #FE7522;
    }

    .sp_cung_loai:hover {
        text-decoration: underline;
        color: #FE7522;
    }

    .sp_cung_loai {
        color: #3F9CD6;
    }
</style>


<div class="w-full ml-auto mr-auto">
    <section class="mb-14" style="background-color: #F4F5F5;">
        <div class=" text-center py-12">
            <h1 class="text-5xl text-gray-600 font-normal pb-3">SIMPLE PRODUCT 02</h1>
            <span class="text-sm font-semibold">Home</span>
            <span class="text-sm px-3 font-semibold">></span>
            <span class="text-sm text-yellow-600 font-semibold">SIMPLE PRODUCT 02</span>
        </div>
    </section> <!-- banner -->
    <?php
    $pdo_hh = new procedure_hang_hoa();
    // tăng số lượt xem
    $pdo_hh->tang_so_luot_Xem($_GET['ma_hh']);

    $result = $pdo_hh->list_hang_hoa_theo_id($_GET['ma_hh']);

    if (!empty($result)) {
        foreach ($result as $u) :
            $ma_loai = $u['ma_loai'];
    ?>
            <section class="w-9/12 mx-auto my-14 ">
                <div class="grid  gap-8 sm:grid sm:grid-cols-5 sm: gap-8">
                    <div class="col-span-2">
                        <div class="tong">
                            <div class="mb-8">
                                <div class="mySlides">
                                    <img src="admin/anh/<?php echo $u['hinh'] ?>" style="width:100%; height: 100%;">
                                </div>

                            </div>
                            <!-- end ảnh chính -->

                        </div>


                    </div>
                    <div class="col-span-3">
                        <h2 class="text-3xl font-bold " style="line-height: 0.8;"><?php echo $u['ten_hh'] ?></h2>
                        <p class="pt-8 text-sm">Be the first to review this product</p>
                        <h3 class="text-3xl font-bold mt-4 mb-3" style="color: #FE7522;font-family: Raleway, sans-serif !important;">$<?php echo $u['don_gia'] ?>.00</h3>
                        <h4 class="text-sm font-black text-black pb-1">QUICK OVERVIEW</h4>
                        <p class="text-sm pb-3" style="border-bottom: 1px solid #EFEFEF;"><?php echo $u['mo_ta'] ?></p>
                        <div class="py-3">
                            <span class="text-sm"> *Manufacturer:</span>
                            <span class="spanHover text-sm px-3">Armani</span>
                            <span class="spanHover text-sm  ">Buberry</span>
                            <span class="float-right text-sm font-bold" style="color: #FE7522;">* Required Fields</span>
                        </div>
                        <div class="pt-2 pb-8 " style="border-bottom: 1px solid #EFEFEF;">
                            <span class="text-sm pr-3"> *Color:</span>
                            <span class="black " style="padding: 6px; background-color: black;">111</span><span class=" pl-1 pr-3">Black</span>
                            <span class="blue" style="padding: 6px; background-color: blue; color: blue;">111</span><span class=" pl-1 pr-3">Blue</span>
                            <span class="green hidden lg:inline-block" style="padding: 6px; background-color: green; color: green;">111</span><span class=" pl-1 pr-3 hidden lg:inline-block">Green</span>
                            <span class="red hidden xl:inline-block" style="padding: 6px; background-color: red; color: red;">111</span><span class=" pl-1 pr-3 hidden xl:inline-block">Red</span>
                            <span class="while hidden xl:inline-block" style="padding: 6px; background-color: white; color: white; border: 1px solid #e6e3e3;">111</span><span class=" pl-1 pr-3  hidden xl:inline-block">While</span>
                        </div>
                        <div class="py-6 relative">
                            <input type="text" style="border: 1px solid #9B9B9B; width: 57px;  height: 57px; text-align: center;" value="1" id="so1">
                            <div class="grid grid-rows-1 absolute xl:left-8 " style="top: 22%;  left: 50px; ">
                                <button onclick="tang()" style="width: 30px; height: 30px; background-color: #9B9B9B; outline: none;"><i class="fas fa-angle-up"></i></button>
                                <button onclick="giam()" style="width: 30px; height: 30px;  background-color: #9B9B9B;outline: none; margin-top: -2px;"> <i class="fas fa-angle-down  "></i></button>
                            </div>


                        </div>
                        <!-- End số lượng -->
                        <div>
                            <ul>
                                <li class="inline-block pr-4 hidden xl:inline-block"><i class=" hover-black fas fa-heart p-5" style="border: 1px solid #9B9B9B;"></i></li>
                                <li class="inline-block px-4 hidden 2xl:inline-block"><i class=" hover-black fas fa-random p-5" style="border: 1px solid #9B9B9B;"></i></li>
                                <li class="inline-block px-4 hidden 2xl:inline-block"><i class=" hover-black fas fa-envelope p-5" style="border: 1px solid #9B9B9B;"></i></li>
                                <li class="inline-block px-4 ">
                                    <a href="index.php?add_to_cart&id_addtoCart=<?php echo $u['ma_hh'] ?>">
                                    <button class="btn" style="width: 200px; height: 57px; "><i class="fas fa-shopping-cart " style="     text-align: center;  height: 100%; border-right: 1px solid #5A5A5A; padding-right: 21px;  padding-top: 21px;    margin-right: 18px;"></i>ADD TO CART</button>
                                    </a>
                                    
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div>
                    <ul class="py-8 " style="border-bottom: 1px solid #F4F5F5;">
                        <li class="inline-block pr-4 "><a class="text-2xl font-bold" href="">DESCRIPTION</a></li>
                        <li class="hidden pr-4 sm:inline-block"><a class="text-2xl font-bold" href="">TAGS</a></li>
                        <li class="hidden pr-4 sm:inline-block"><a class="text-2xl font-bold" href="">REVIEW</a></li>
                        <li class="hidden pr-4 sm:inline-block"><a class="text-2xl font-bold" href="">CUSTOM TAB</a></li>
                    </ul>
                    <p class="font-semibold pt-8 hidden xl:block">Ut metus. Maecenas dapibus nibh eu est. Proin faucibus pharetra nibh. Integer aliquet tellus in felis. Quisque mi pede, imperdiet a, dapibus vel, bibendum rhoncus, nulla. Sed eu velit. Maecenas molestie, ipsum nec nonummy mattis, ipsum lectus imperdiet nibh, sit amet accumsan nunc nunc et lorem. Quisque at augue. Donec elit ligula, pellentesque id, feugiat sed, malesuada a, turpis. Donec nunc quam, commodo ut, venenatis ut, feugiat quis, tortor. Nunc id risus vestibulum turpis facilisis fringilla. Pellentesque turpis ipsum, ultrices at, consequat sit amet, sollicitudin at, pede. Suspendisse potenti. Fusce eu ante sit amet lacus cursus tempor. Donec bibendum, metus nec tristique mollis, metus felis pellentesque sapien, eu mattis turpis lorem quis quam.</p>
                    <p class="font-semibold py-2 ">Cras ut ante et est elementum tristique. Curabitur pulvinar massa in tellus. Nullam eu massa. Etiam nulla. Sed in dui. Curabitur eleifend leo sit amet lorem vehicula venenatis. Mauris suscipit purus vitae dui.</p>

                </div>
                <!-- end_thông tin sản phẩm  -->

                <div class="mt-8">

                    <table>
                        <thead>
                            <tr>
                                <th>BÌNH LUẬN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <ul style="list-style: disc;  padding: 10px 30px;">
                                        <?php
                                        $pdo_binh_luan = new procedure_binh_luan();
                                        // var_dump($_SESSION['name']);
                                        if (isset($_POST['binh_luan']) && !empty($_POST['binh_luan'])) {
                                            $binh_luan = $_POST['binh_luan'];
                                            $ma_kh = $_SESSION['id_kh'];

                                            $ngay_bl = date_format(date_create(), 'Y-m-d');
                                            $add_bl = $pdo_binh_luan->add_binh_luan($ma_kh, $_GET['ma_hh'], $_POST['binh_luan'], $ngay_bl);
                                        }


                                        $result_bl = $pdo_binh_luan->list_bl_by_ma_hh($_GET['ma_hh']);
                                        if (!empty($result_bl)) {
                                            foreach ($result_bl as $u) :

                                        ?>

                                                <li>
                                                    <div style="display: flex; justify-content: space-between;">
                                                        <span><?php echo $u['noi_dung'] ?></span>
                                                        <div>
                                                            <span><?php echo $u['ho_ten'] ?></span>
                                                            <span class="ml-3 font-normal"><?php echo $u['ngay_bl'] ?></span>
                                                        </div>
                                                    </div>

                                                </li>

                                        <?php endforeach;
                                        }
                                        ?>

                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>

                            <th>
                                <?php if (isset($_SESSION['id_kh'])) {

                                ?>
                                    <form action="" method="POST">
                                        <input type="text" name="binh_luan" class="w-full p-1 outline-none">
                                    </form>
                                <?php
                                } else {
                                    echo " <p style='color: red;'>Đăng nhập để bình luận về sản phẩm này</p>";
                                } ?>
                            </th>

                        </tfoot>
                    </table>


                </div>
                <!-- end bình luận -->

                <div class="mt-8">

                    <table>
                        <thead>
                            <tr>
                                <th>SẢN PHẨM CÙNG LOẠI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <ul style="list-style: disc;  padding: 10px 30px;">
                                        <?php


                                        $result_list_hh = $pdo_hh->list_hang_hoa_theo_loai($ma_loai);
                                        if (!empty($result_list_hh)) {
                                            foreach ($result_list_hh as $u) :

                                        ?>
                                                <li> <a href="index.php?chi_tiet_sp&ma_hh=<?php echo $u['ma_hh'] ?>"><span class="sp_cung_loai"><?php echo $u['ten_hh'] ?></span></a> </li>

                                        <?php endforeach;
                                        }
                                        ?>

                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>

            </section>
            <!-- End-main -->

    <?php endforeach;
    } ?>



</div>