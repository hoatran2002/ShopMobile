<?php
session_start();
require_once ('../Config.php');
require_once ('../system/Database.php');
require_once ('../system/load.php');
require_once ('../system/core.php');
$auth = loadModel('auth');
?>

<?php
if (isset($_POST['DANGNHAP'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    if ($auth->auth_check($username) == true) {
        $user = $auth->auth_guard($username, $password);
        if ($user != FALSE) {
            $_SESSION['user_admin'] = $username;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_fullname'] = $user['user_fullname'];
            redirect('index.php');
        } else {
            $error_password = 'Mật khẩu không chính xác';
        }
    } else {
        $error_username = 'Tên đăng nhập không tồn tại';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Đăng Nhập Hệ Thống</title>
		<link rel="stylesheet" href="/public/css/bootstrap.css">
	</head>
	<body>
		<style>
			.khung {
				max-width: 500px;
				max-height: 500px;
				margin: auto;
				border-radius: 10px;
				border: 1px solid #ccc;
			}
		</style>
		<form name="formlogin" action="" method="post">
			<div class="khung p-5 mt-5">
				<h3>ĐĂNG NHẬP HỆ THỐNG</h3>
				<fieldset class="form-group">
						<label>Tên Đăng Nhập hoặc Email</label>
						<input type="text" class="form-control" name="username" placeholder="Tên Đăng Nhập hoặc Email">
				</fieldset>
				<fieldset class="form-group">
						<label>Mật Khẩu</label>
						<input type="password" class="form-control" name="password" placeholder="Mật Khẩu">
				</fieldset>
				<fieldset class="form-group">
						<button class="btn btn-success" name="DANGNHAP" type="submit">Đăng Nhập</button>
				</fieldset>
				<fieldset class="form-group">
				<?php
				if (isset($error_username)) {
					echo $error_username;
				}
				if (isset($error_password)) {
				    echo $error_password;
				}
				?>
				</fieldset>
			</div>	
		</form>
	</body>
</html>