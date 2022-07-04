<?php
require '../PDO/pdo.php';
require '../admin/DAO/pdo_tai_khoan.php';
session_start();
$error = "";
$pdo_tai_khoan = new procedure_tai_khoan();

// require '../PDO/pdo_tai_khoan.php';


if (isset($_POST['btn_forgot_password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // check xem tài khoản đó có tồn tại hay không 
    $check_id_kh = $pdo_tai_khoan->thong_tin_kh();
    if (!empty($check_id_kh)) {
        foreach ($check_id_kh as $u) {
            if ($u['ma_kh'] == $username) {
                $username = $u['ma_kh'];
            }
        }
    }


    $result = $pdo_tai_khoan->thong_tin_tk_by_id($username);
    if (!empty($result)) {
        foreach ($result as $u) {
            $ma_kh = $u['ma_kh'];
            $email_kh = $u['email'];
            $mat_khau = $u['mat_khau'];
        }
    }


    // validate
    if ($username == "" || $email == "") {
        $error = "Không được để trống thông tin";
    } else if ($username != $ma_kh) {
        $error = "Tên tài khoản không tồn tại";
    } else if ($email != $email_kh) {
        $error = "Email không chính xác";
    } else {
        $forgot_password = $mat_khau;
    }
}

if (isset($result_update_mk)) {
    echo "<script> alert('$result_update_mk')</script>";
    header("refresh:0.5;url=thong_tin_tk.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../fileCss/login.css">
</head>

<body>
    <div class="container">
        <div>
            <span>Welcome back</span>
            <h2>Forget password</h2>
            <form action="" method="POST">
                <p class="p">User name</p>
                <input type="text" name="username" id="input" placeholder="Username">

                <p>Email</p>
                <input type="email" name="email" id="input" placeholder="Email">



                <?php
                if (isset($forgot_password)) {
                    echo "<p>Your Password</p>";
                    echo " <input type='text' name='email' id='input' placeholder='Email' value='$forgot_password' >";
                }
                ?>

                <div class="check " style="float:right">
                    <a href="dang_nhap.php" class="forgot">Login now ?</a>
                </div>
                <button type="submit" id="login" name="btn_forgot_password"> Find Password</button>
            </form>

            <button id="btn">
                <p class="google">Or sign-in with google</p>
            </button>
            <p style="color: red;"><?php if ($error != "") echo $error; ?></p>
            <p class="pp2 " style="color: #DDD8D3;">Dont have an account ? <a class="join" href="dang_ky.php">Join free today</a></p>

        </div>
    </div>

</body>

</html>