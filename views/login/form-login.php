<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <?php include_once './views/nhanvien/layout/style.php';
    if (isset($_COOKIE['member_login']) && $_COOKIE['member_login'] != "") {
        $a = $_COOKIE['member_login'];
        $sql = "select * from user 
        where user_name =  '$a' ";
        $user = pdo_query_one($sql);
    }
    ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="form-login">
            <div class="card card-outline">
                <div class="card-header text-center form-header">
                    <a href="http://localhost:81/Assignment_group7/admin" class="brand-link" style="text-align: center;">
                        <img src="http://localhost:81/Assignment_group7/public/upload/header/grandrestaurant_logo.png" alt="Grand Logo" class="img-fluid" style="opacity:1">
                    </a>
                </div>
                <div class="card-body">
                    <p style="color: red;"><?= isset($_GET['err']) ? 'Tài khoản không tồn tại hoặc mật khẩu không chính xác' : ''; ?></p>
                    <form action="<?= BASE_URL . 'login/submit' ?>" method="post" >
                        <div class="input-group mb-5">
                            <input type="text" name="user_name" value="<?= isset($_COOKIE["member_login"]) && $_COOKIE['member_login'] != "" ? $user['user_name'] :  ""; ?>" class="form-control" placeholder="Username" autocomplete="off">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-5">
                            <input type="password" name="password" class="form-control" placeholder="Password" value="<?= isset($_COOKIE["member_login"]) && $_COOKIE['member_login'] != "" ? $user['password'] :  ""; ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input name="remember" type="checkbox" id="remember" <?php if (isset($_COOKIE["member_login"])) { ?> checked <?php } ?>>
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <?php include_once './views/nhanvien/layout/script.php'; ?>
</body>

</html>