<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Long Vũ Tiến</title>
    <link rel="stylesheet" href="css/all.min.css">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fileCss/layout.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://cdn.tiny.cloud/1/hqu7rkbua1f9yiw4o0umokh5blx2hry628dd0p6banxt3z84/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>
    <header>
        <div class=" w-9/12 mx-auto">
            <div class="grid-cols-12 text-center gap-8 flex justify-between">
                <div class="col-span-2 my-auto">
                    <a href="index.php"><img src="image/logo-black.png" alt=""></a>
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
                    <ul style="margin: 0;padding: 0;">
                        <a href="index.php?gio_hang">
                            <li class="hover-black inline-block p-7 px-8" style="border-left: 1px solid #C8C8C8;"><i class="fas fa-cart-plus text-lg"></i><span><?php if (isset($_SESSION['count_product'])) {
                                                                                                                                                                    echo $_SESSION['count_product'];
                                                                                                                                                                } ?></span></li>
                        </a>
                        <a href="index.php?tai_khoan">
                            <li class="hover-black inline-block p-7 px-8" style="border-left: 1px solid #C8C8C8;"><i class="fas fa-user text-lg"></i></li>
                        </a>
                     
                        <a onclick="return confirm('Bạn có chắc muốn đăng xuất không ?')" href="index.php?thong_tin_tk&dang_xuat=logout">
                            <li class="hover-black inline-block p-7 px-8" style="border-right: 1px solid #C8C8C8; border-left: 1px solid #C8C8C8;"><i class="fas fa-sign-out-alt text-lg"></i></li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end header-top -->

        <div style="background-color: #3f3f3f;">
            <div class=" w-9/12 mx-auto flex justify-between">
                <ul class="">
                    <li class="inline-block px-4 py-2" style="color: #FE7522;"><a href="index.php?home">Trang chủ</a></li>
                    <li class="inline-block px-4 py-2 text-white doVang"><a href="index.php?gioi_thieu">Giới thiệu</a></li>
                    <li class="inline-block px-4 py-2 text-white doVang"><a href="index.php?lien_he">Liên hệ</a></li>
                    <li class="inline-block px-4 py-2 text-white doVang"><a href="index.php?gop_y">Góp ý</a></li>
                    <li class="inline-block px-4 py-2 text-white doVang"><a href="index.php?hoi_dap">Hỏi đáp</a></li>
                    <?php


                    // session_start();
                    if (isset($_SESSION['id_kh'])) {

                        $result = $pdo_tai_khoan->thong_tin_tk_by_id($_SESSION['id_kh']);
                        if (!empty($result)) {
                            foreach ($result as $u) {
                                if ($u['vai_tro'] == 1) {
                                    echo "<li class='inline-block px-4 py-2 text-white doVang'><a href='admin/hang_hoa/'>Quản lý</a></li>";
                                }
                            }
                        }
                    }
                    ?>
                </ul>
                <p class="my-auto text-white"><i class="far fa-laugh-wink pr-2"></i> <?php
                                                                                        if (isset($_SESSION['name'])) {
                                                                                            echo "Xin chào " . $_SESSION['name'];
                                                                                        }
                                                                                        ?></p>

            </div>
        </div>
    </header>