<?php
session_start();

 ?>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web design sample project</title>
    <link rel="stylesheet" href="../../css/all.min.css">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../fileCss/layout.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <script src="https://cdn.tiny.cloud/1/hqu7rkbua1f9yiw4o0umokh5blx2hry628dd0p6banxt3z84/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        /* :root {
            --main-color: #027581;
            --color-dark: #1D2231;
            --text-grey: #8390A2;
        }

        * {
            margin: 0;
            padding: 0;
            text-decoration: none;
            list-style-type: none;
            box-sizing: border-box;
        } */

        #sidebar-toggle {
            display: none;
        }

        .sidebar {
            height: 100%;
            width: 240px;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
            background: #3f3f3f;
            color: #fff;
            overflow-y: auto;
            transition: width 500ms;
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
            padding: 0rem 1rem;
        }

        .sidebar-menu {
            padding: 1rem;
        }

        .sidebar li {
            margin-bottom: 1.5rem;
        }

        .sidebar a {
            color: #fff;
            font-size: .8rem;
        }

        .sidebar a span:last-child {
            padding-left: .6rem;
        }

        #sidebar-toggle:checked~.sidebar {
            width: 60px;
        }

        #sidebar-toggle:checked~.sidebar .sidebar-header h3 span,
        #sidebar-toggle:checked~.sidebar li span:last-child {
            display: none;
        }

        #sidebar-toggle:checked~.sidebar .sidebar-header,
        #sidebar-toggle:checked~.sidebar li {
            display: flex;
            justify-content: center;
        }

        #sidebar-toggle:checked~.main-content {
            margin-left: 60px;
        }

        #sidebar-toggle:checked~.main-content header {
            left: 60px;

        }

        .main-content {
            position: relative;
            margin-left: 240px;
            transition: margin-left 500ms;
        }



        .search-wrapper {
            display: flex;
            align-items: center;
        }

        .search-wrapper input {
            border: 0;
            outline: 0;
            padding: 1rem;
            height: 38px;
        }

        .social-icons {
            display: flex;
            align-items: center;
        }

        .social-icons span,
        .social-icons div {
            margin-left: 1.2rem;
        }

        .social-icons div {
            height: 38px;
            width: 38px;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url(img/1.jpg);
            border-radius: 50%;
        }

        main {
            /* margin-top: 60px; */
            background: #f1f5f9;
            min-height: 90vh;
            padding: 1rem 3rem;
        }

        .dash-title {
            color: var(--color-dark);
            margin-bottom: 1rem;
        }

        .dash-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-column-gap: 3rem;
        }

        .card-single {
            background: #fff;
            border-radius: 7px;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 1.3rem 1rem;
            display: flex;
            align-items: center;
        }

        .card-body span {
            font-size: 1.5rem;
            color: #777;
            padding-right: 1.4rem;
        }

        .card-body h5 {
            color: var(--text-grey);
            font-size: 1rem;
        }

        .card-body h4 {
            color: var(--color-dark);
            font-size: 1.1rem;
            margin-top: .2rem;
        }

        .card-footer {
            padding: .2rem 1rem;
            background: #f9fafc;
        }

        .card-footer a {
            color: var(--main-color);
        }

        .recent {
            margin-top: 3rem;
            margin-bottom: 3rem;
        }

        .activity-grid {
            display: grid;
            grid-template-columns: 75% 25%;
            grid-column-gap: 1.5rem;
        }

        .activity-card,
        .summary-card,
        .bday-card {
            background: #fff;
            border-radius: 7px;
        }

        .activity-card h3 {
            color: var(--text-grey);
            margin: 1rem;
        }

        table {
            border: 1px solid #3F3F3F;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            font-weight: 600;

        }

        th {
            border: 1px solid #3F3F3F;
            border-right: 1px solid #fff;
            background-color: #3F3F3F;
            color: white;
            padding: 5px 10px;
        }



        .badge {
            padding: .2rem 1rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: .7rem;
        }

        .badge.success {
            background: #DEF7EC;
            color: var(--main-color);
        }

        .badge.warning {
            background: #F0F6B2;
            color: orange;
        }

        .td-team {
            display: flex;
            align-items: center;
        }

        .img-1,
        .img-2,
        .img-3 {
            height: 38px;
            width: 38px;
            border-radius: 50%;
            margin-left: -15px;
            border: 3px solid #efefef;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .img-1 {
            background-image: url(img/1.jpg);
        }

        .img-2 {
            background-image: url(img/2.jpg);
        }

        .img-3 {
            background-image: url(img/3.jpeg);
        }

        .summary-card {
            margin-bottom: 1.5rem;
            padding-top: .5rem;
            padding-bottom: .5rem;
        }

        .summary-single {
            padding: .5rem 1rem;
            display: flex;
            align-items: center;
        }

        .summary-single span {
            font-size: 1.5rem;
            color: #777;
            padding-right: 1rem;
        }

        .summary-single h5 {
            color: var(--main-color);
            font-size: 1.1rem;
            margin-bottom: 0rem !important;
        }

        .summary-single small {
            font-weight: 700;
            color: var(--text-grey);
        }

        .bday-flex {
            display: flex;
            align-items: center;
            margin-bottom: .3rem;
        }

        .bday-card {
            padding: 1rem;
        }

        .bday-img {
            height: 60px;
            width: 60px;
            border-radius: 50%;
            border: 3px solid #efefef;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url(img/3.jpeg);
            margin-right: .7rem;
        }

        .text-center {
            text-align: center;
        }

        .text-center button {
            background: var(--main-color);
            color: #fff;
            border: 1px solid var(--main-color);
            border-radius: 4px;

        }

        @media only screen and (max-width: 1200px) {
            .sidebar {
                width: 60px;
                z-index: 150;
            }

            .sidebar .sidebar-header h3 span,
            .sidebar li span:last-child {
                display: none;
            }

            .sidebar .sidebar-header,
            .sidebar li {
                display: flex;
                justify-content: center;
            }

            .main-content {
                margin-left: 60px;
            }

            .main-content header {
                left: 60px;
                width: calc(100% - 60px);
            }

            #sidebar-toggle:checked~.sidebar {
                width: 240px;
            }

            #sidebar-toggle:checked~.sidebar .sidebar-header h3 span,
            #sidebar-toggle:checked~.sidebar li span:last-child {
                display: inline;
            }

            #sidebar-toggle:checked~.sidebar .sidebar-header {
                display: flex;
                justify-content: space-between;
            }

            #sidebar-toggle:checked~.sidebar li {
                display: block;
            }

            #sidebar-toggle:checked~.main-content {
                margin-left: 60px;
            }

            #sidebar-toggle:checked~.main-content header {
                left: 60px;
            }
        }

        @media only screen and (max-width: 860px) {
            .dash-cards {
                grid-template-columns: repeat(2, 1fr);
            }


            .card-single {
                margin-bottom: 1rem;
            }

            .activity-grid {
                display: block;
            }

            .summary {
                margin-top: 1.5rem;
            }
        }

        @media only screen and (max-width: 600px) {
            .dash-cards {
                grid-template-columns: 100%;
            }
        }

        @media only screen and (max-width: 450px) {
            main {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }





        .action-button {
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #0f0f0f6e;
            color: #ffffff;
            padding: 5px;

        }

        .action-button a {
            color: rgb(0, 0, 0);

        }

        .action-button:hover {
            background-color: #8390a2;
            color: #ffffff;

        }

        .link-action {
            text-decoration: none;

        }

        .link-action:hover {
            color: #ffffff;
            text-decoration: none;
        }

        h1 {
            color: #1d2231;
        }

        img {
            width: 80px;
        }
    </style>
</head>

<body>

    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <!-- <h3 class="brand">
                <span class="ti-unlink"></span>
                
            </h3> -->
            <a href=""><img class="max-w-full" src="../../image/logo-while.png" alt="" width="100" height="50"></a>

            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="../../index.php">
                        <span class="ti-home"></span>
                        <span>Trang Chủ</span>
                    </a>
                </li>
                <li>
                    <a href="../../../../Dự án mẫu/SHOP/admin/loai_hang/">
                        <span class="ti-face-smile"></span>
                        <span>Loại hàng</span>
                    </a>
                </li>
                <li>
                    <a href="../../../../Dự án mẫu/SHOP/admin/hang_hoa/">
                        <span class="ti-face-smile"></span>
                        <span>Hàng Hóa</span>
                    </a>
                </li>
                <li>
                    <a href="../../../../Dự án mẫu/SHOP/admin/khach_hang/">
                        <span class="ti-agenda"></span>
                        <span>Khách Hàng</span>
                    </a>
                </li>
                <li>
                    <a href="../../../../Dự án mẫu/SHOP/admin/binh_luan/">
                        <span class="ti-clipboard"></span>
                        <span>Bình Luận</span>
                    </a>
                </li>
                <li>
                    <a href="../../../../Dự án mẫu/SHOP/admin/thong_ke/">
                        <span class="ti-settings"></span>
                        <span>Thống Kê</span>
                    </a>
                </li>
              
            </ul>
        </div>
  </div>