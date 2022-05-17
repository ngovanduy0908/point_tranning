<?php
ob_start();
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
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/base_1.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="main">
        <?php
            require_once '../header.php';
        ?>
        <div class="main_body">
            <div class="main__body_container mt-3">
                <ul class="body__container_list row grid wide">
                    <li class="body__container_item ">
                        <a href="#" class="body__container_link">TRANG CHỦ</a>
                    </li>
    
                    <li class="body__container_item ">
                        <a href="../noti.php" class="body__container_link" target="_blank">GIỚI THIỆU</a>
                    </li>
    
                    <li class="body__container_item ">
                        <a href="https://daotao.humg.edu.vn/#/home" class="body__container_link" target="_blank">TRANG WEB ĐÀO TẠO</a>
                    </li>
    
                    <li class="body__container_item ">
                        <a href="https://it.humg.edu.vn/Pages/home.aspx?msclkid=dc999dc7c13311ecbd32bdd7dc00fc28" class="body__container_link" target="_blank">TRANG WEB CNTT</a>
                    </li>
    
                    <li class="body__container_item ">
                        <a href="https://humg.edu.vn/Pages/home.aspx" class="body__container_link" target="_blank">TRANG WEB HUMG</a>
                    </li>
    
                    
    
                </ul>
            </div>

            <div class="main_body_login">
                <?php
                    require_once './form_login.php';
                ?>
            </div>
        </div>

        <?php
            require_once '../footer.php';
        ?>
    </div>
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
		$connect->close();
		ob_end_flush();
	?>
	<h6 class="mes_err"><?= $msg ?></h6>	

    <style>
    .body__container_list {
        justify-content: space-between;
        align-items: center;
    }
    .main__footer{
        padding-top: 11px;
    }
    .mes_err{
        position: absolute;
        top: 240px;
        transform: translateX(-12%);
        left: 32%;
        z-index: 10;
	}
    </style>
</body>
</html>