
<header >
        <div class=" w-9/12 mx-auto">
            <div class="grid-cols-12 text-center gap-8 flex justify-between">
                <div class="col-span-2 my-auto">
                    <a href="../../index.php"><img src="../../image/logo-black.png" alt=""></a>
                    <!-- logo -->
                </div>
                <div class="col-span-9 my-auto">
                    <form action="" class="flex">
                        <input class="text w-56 h-8 2xl:w-96 xl:80 lg:w-60 " style="outline: none; border: 1px solid #C8C8C8; padding: 5px; border-radius: 0%;" type="text">
                        <button class="btn w-9 h-8" style="background-color: #3f3f3f;color: #fff;margin-left: -4px;border-radius: 0%; "><i class="fas fa-search"></i></button>
                    </form>

                </div>
                <!-- menu -->
                <div class="col-span-3 my-auto flex justify-between">
                    <ul style="margin: 0;padding: 0;" >
                            <a href="../../index.php?gio_hang">
                                <li class="hover-black inline-block p-7 px-8"style="border-left: 1px solid #C8C8C8;" ><i class="fas fa-cart-plus text-lg"></i></li>
                            </a>
                            <a href="../../tai_khoan">
                                <li class="hover-black inline-block p-7 px-8" style="border-left: 1px solid #C8C8C8;"><i class="fas fa-user text-lg"></i></li>
                            </a>
                            <a href="../../tai_khoan/dang_nhap.php">
                                <li class="hover-black inline-block p-7 px-8"style="border-right: 1px solid #C8C8C8; border-left: 1px solid #C8C8C8;"  ><i class="fas fa-sign-out-alt text-lg"></i></li>
                            </a>
                        </ul>
                </div>
            </div>
        </div>
        <!-- end header-top -->

        <div style="background-color: #3f3f3f;">
            <div class=" w-9/12 mx-auto flex justify-between">
                <ul class="">
                    <li class="inline-block px-4 py-2" style="color: #FE7522;"><a href="../../index.php">Trang chủ</a></li>
                    <li class="inline-block px-4 py-2 text-white doVang"><a href="../../index.php?gioi_thieu">Giới thiệu</a></li>
                    <li class="inline-block px-4 py-2 text-white doVang"><a href="../../index.php?lien_he">Liên hệ</a></li>
                    <li class="inline-block px-4 py-2 text-white doVang"><a href="../../index.php?gop_y">Góp ý</a></li>
                    <li class="inline-block px-4 py-2 text-white doVang"><a href="../../index.php?hoi_dap">Hỏi đáp</a></li>
                    <li class="inline-block px-4 py-2 text-white doVang"><a href="index.php">Quản lý</a></li>
                </ul>
                <p class="my-auto text-white"><i class="far fa-laugh-wink pr-2"></i> <?php
                                                                                        if (isset($_SESSION['name'])) {
                                                                                            echo "Xin chào " . $_SESSION['name'];
                                                                                        }
                                                                                        ?></p>
            </div>
        </div>
    </header>