<?php
require '../PDO/pdo.php';
require '../admin/DAO/pdo_tai_khoan.php';
$error = "";
if (isset($_POST['btn_register'])) {

    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $pass_confirm = $_POST['pass_confirm'];

    
    // $pass_confirm = password_hash($pass_confirm, PASSWORD_DEFAULT);
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $avatar = $_FILES['avatar']['name'];
    $avatar_tmp = $_FILES['avatar']['tmp_name'];

    $pdo_tai_khoan = new procedure_tai_khoan();
    $kh_old = $pdo_tai_khoan->thong_tin_kh();
    if (!empty($kh_old)) {
        foreach ($kh_old as $u) {
            if ($u['ma_kh'] == $username) {
                // var_dump($u['ma_kh']);
                $tk_da_ton_tai = "Tài khoản đã tồn tại !";
            }
        }
    }

    if ($username == "") {
        $error = "Tên tài khoản không được để trống !";
    } else if (isset($tk_da_ton_tai)) {
        $error = $tk_da_ton_tai;
    } else if ($pass == "") {
        $error = "Mật khẩu không được để trống !";
    } else if ($pass_confirm != $pass) {
        $error = 'Mật khẩu không trùng khớp';
    } else if ($full_name == "") {
        $error = 'Họ tên không được để trống';
    } else if ($email == "") {
        $error = 'Email không được để trống !';
    } else if ($avatar == "") {
        $error = 'Hình ảnh không được để trống !';
    } else {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        echo $pass;
        $result = $pdo_tai_khoan->add_khach_hang($username, $pass, $full_name, $avatar, $email);
        move_uploaded_file($avatar_tmp, '../admin/anh/' . $avatar);
    }
}

if (isset($result)) {
    echo "<script> alert('$result')</script>";
    header("refresh:0.5;url=dang_nhap.php");
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
    <div class="container" style=" margin-bottom: 100px;">
        <div>
            <span>Welcome back</span>
            <h2>Register new account</h2>
            <form action="" method="POST" enctype="multipart/form-data">

                <div>
                    <p class="p">User Name</p>
                    <input type="text" name="username" id="input" placeholder="Username" value="">
                </div>

                <p>Password</p>
                <input type="password" name="pass" id="input" placeholder="******" value="">

                <p>Confirm Password</p>
                <input type="password" name="pass_confirm" id="input" placeholder="******" value="">

                <p>Full name</p>
                <input type="text" name="full_name" id="input" placeholder="******" value="">

                <p>Email</p>
                <input type="email" name="email" id="input" placeholder="******" value="">

                <p>Avatar</p>
                <input type="file" name="avatar" id="input" placeholder="******" value="">

                <!-- <div class="check">
                    <span style="color: #DDD8D3; "><input type="checkbox" name="remember" id="ck" >Remember me</span>
                </div> -->
                <button type="submit" id="login" name="btn_register"> Register now</button>
            </form>
            <p style="color: red;">
                <?php
                if ($error != "") {
                    echo $error;
                }
                ?>
            </p>
            <p class="pp2 " style="color: #DDD8D3;">Dont have an account ? <a class="join" href="dang_ky.php">Join free today</a></p>

        </div>
    </div>


</body>

</html>