<?php 
require '../PDO/pdo.php';
require '../admin/DAO/pdo_tai_khoan.php';
$error = "";
if (isset($_POST['btn_login'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $pdo_tai_khoan = new procedure_tai_khoan();
    $result =  $pdo_tai_khoan->login($username);
    foreach ($result as $u) {
        $ma_hoa_mk = password_verify($pass, $u['mat_khau']);
        // var_dump($ma_hoa_mk);
        // die;
    }
    if ($ma_hoa_mk == true) {
        session_start();
        $_SESSION['isLogin'] = true;
        // if (isset($_SESSION['isLogin'])) {
        //     var_dump($_SESSION['isLogin']);
        // }
        foreach ($result as $u) {
            $_SESSION['name'] = $u['ho_ten'];
            $_SESSION['id_kh'] = $u['ma_kh'];
        }

        // var_dump($_SESSION['name']);
        echo "<script> alert('Đăng nhập thành công')</script>";
        header("refresh:0.5;url=../index.php");
    } else {
        $error = "Sai thông tin đăng nhập ! ";
    }


    //    nếu người dùng click remember  thì tạo ra cookie
    if (isset($_POST['remember'])) {
        setcookie('username',$username);
        setcookie('pass',$pass);
     }else {
         // ngược lại hủy cookie
         setcookie('username', "");
         setcookie('pass',"");
     }

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
            <h2>Login to your account</h2>
            <form action="" method="POST">

                <p class="p">User Name</p>
                <input type="text" name="username" id="input" placeholder="Username" value="<?php if (isset($_COOKIE['user'])) echo $_COOKIE['username'] ?>">

                <p>Password</p>
                <input type="password" name="pass" id="input" placeholder="******" value="<?php if (isset($_COOKIE['pass'])) echo $_COOKIE['pass'] ?>">

                <div class="check">
                    <span><input type="checkbox" name="remember" id="ck" >Remember me</span>
                    <a href="quen_mk.php" class="forgot">Forgot password ?</a>
                </div>
                <div>
                    <p style="color: red;"><?php if ($error != "") echo $error; ?></p>
                </div>
                <button type="submit" id="login" name="btn_login"> Login now</button>
            </form>
            <button id="btn">
                <p class="google">Or sign-in with google</p>
            </button>

            <p class="pp2 " style="color: #DDD8D3;">Dont have an account ? <a class="join" href="dang_ky.php">Join free today</a></p>

        </div>
    </div>


</body>

</html>