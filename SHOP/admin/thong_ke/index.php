<?php
    require_once '../../PDO/pdo.php';
    require_once '../DAO/pdo_thong_ke.php';

    extract($_REQUEST);
    $pdo_thong_ke = new procedure_thong_ke();
     if (array_key_exists('list_btn', $_REQUEST)) {

        $VIEW_PAGE = "list.php";
       
    }else  if (array_key_exists('bieu_do', $_REQUEST)) {

        $VIEW_PAGE = "bieu_do.php";
    } else {
        $VIEW_PAGE = "list.php";
    }

    require_once '../index.php';
