<?php
session_start();

require_once('../db/dbhelper.php');
$path = '../';
$msg = $maSv = $password  = $role_id = "";

if (isset($_SESSION['user'])) {
	$_SESSION['user']['role_id'] = '';
	if ($_SESSION['user']['role_id'] === 1) {
		header('Location:./khoa/index.php');
		die();
	}
	if ($_SESSION['user']['role_id'] === 2) {
		header('Location:./admin/teacher/index.php');
		die();
	}
	if ($_SESSION['user']['role_id'] === 3 || $_SESSION['user']['role_id'] === 4) {
		header('Location:./admin/student/index.php');
		die();
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng Nhập</title>
</head>

<body>
	<script src="../assets/js/login_1.js"></script>
	<?php
		// require_once $path.'header.php';
	?>
	<?php
		// require_once './login_1.php';
	?>
	<?php
		if (!empty($_POST['tk'])) {

			$tk = $_POST['tk'];

			if (!empty($_POST['password'])) {
				$password = $_POST['password'];
			}
			// var_dump($tk);
			if ($tk == 'humg881966') {
				$sql = "select * from admin where tk = '$tk' and mk = '$password'";
				$result = $connect->query($sql);
				if ($result->num_rows > 0) {
					$user = $result->fetch_assoc();
					$_SESSION['user'] = $user;
					header('Location: ../admin/humg/index.php');
				} else {
					$msg = "Vui lòng kiểm tra lại tài khoản hoặc mật khẩu";
				}
			} 
			else if (preg_match("/-/", $tk)) {
				if ($password === '12356@') {
					$sql = "select * from teacher where maGv='$tk' and password='$password'";
					$result = $connect->query($sql);
					if ($result->num_rows > 0) {
						$user = $result->fetch_assoc();
						$_SESSION['user'] = $user;
						header('Location: changeInfoOne.php');
					} else {
						$msg = "Vui lòng kiểm tra lại tài khoản hoặc mật khẩu";
					}
				} else {
					$sql = "select * from teacher where maGv='$tk' and password='$password'";
					$result = $connect->query($sql);
					if ($result->num_rows > 0) {
						$user = $result->fetch_assoc();
						$_SESSION['user'] = $user;
						header('Location: ../teacher/chooseClass.php');
					} else {
						$msg = "Vui lòng kiểm tra lại tài khoản hoặc mật khẩu";
					}
				}

			} 
			else if (preg_match("/humg/", $tk)) {
				$sql = "select * from department where account='$tk' and password='$password'";
				$result = $connect->query($sql);
				if ($result->num_rows > 0) {
					$user = $result->fetch_assoc();
					$_SESSION['user'] = $user;
					header('Location: ../khoa/index.php');
				} else {
					$msg = "Vui lòng kiểm tra lại tài khoản hoặc mật khẩu";
				}
			} else {
				if ($password === '123456') {
					$sql = "select * from students where maSv='$tk' and password='123456'";
					$result = $connect->query($sql);
					if ($result->num_rows > 0) {
						$user = $result->fetch_assoc();
						$_SESSION['user'] = $user;
						header('Location: changeInfoOne.php');
					} else {
						$msg = "Vui lòng kiểm tra lại tài khoản hoặc mật khẩu";
					}
				} else {
					$sql = "select * from students where maSv='$tk' and password='$password'";
					$result = $connect->query($sql);
					if ($result->num_rows > 0) {
						$user = $result->fetch_assoc();

						$_SESSION['user'] = $user;

						header('Location: ../student/index.php');
					} else {
						$msg = "Vui lòng kiểm tra lại tài khoản hoặc mật khẩu";
					}
				}
			}
		}
	?>
	<h3 class="mes_err"><?php echo $msg ?></h3>	
	<style>
		body{
			padding: 0;
			margin: 0;
		}
		.mes_err{
			position: relative;
			top: -490px;
			transform: translateX(-12%);
			left: 50%;

		}
	</style>			
</body>

</html>