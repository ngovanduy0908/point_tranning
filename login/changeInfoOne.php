<?php
    ob_start();
	session_start();
	require_once('../db/dbhelper.php');
    $path = '../';
	$msg = $email = $password = $role_id = $maGv = $maSv = $phone_number = "";
    if(isset($_SESSION['user'])){
        $role_id = $_SESSION['user']['role_id'];
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }
    if(isset($_POST['phone_number'])){
        $phone_number = $_POST['phone_number'];
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay Đổi Thông Tin Lần Đầu</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- <link rel="stylesheet" href="../assets/css/base.css"> -->
	<link rel="stylesheet" href="../assets/css/login.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/base_1.css">
    <link rel="stylesheet" href="../assets/css/footer.css">

	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="" style="background: #e7e1e1;padding: 30px 60px;">
            <div class="main__form panel panel-primary form-login">
                <div class="panel-heading">
                    <h2 class="text-center">Thêm Email Và Thay Đổi Mật Khẩu</h2>
                </div>
                <div class="panel-body">
                <form action="" class="needs-validation" novalidate method="post">
                    <div class="form-group">
                        <label for="email">Nhập Email:</label>
                        <input type="text" class="form-control" id="email"  name="email" required value="<?= $email ?>">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Nhập Mật Khẩu Mới:</label>
                        <input type="password" class="form-control" id="pwd"  name="password" required value="<?= $password ?>">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
            
                    <div class="form-group">
                        <label for="pwd">Nhập số điện thoại:</label>
                        <input type="text" class="form-control" id="pwd" name="phone_number" required value="<?= $phone_number ?>">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="./login.php" class="btn btn-warning">Quay lại</a>
                </form>
                </div>
                <?php
                    if(!empty($_POST['email'])){
                        $email = $_POST['email'];

                        if(!empty($_POST['password'])){
                            $password = $_POST['password'];
                        }

                        if(!empty($_POST['phone_number'])){
                            $phone_number = $_POST['phone_number'];
                        }

                        if($role_id == 2){

                            $maGv = $_SESSION['user']['maGv'];

                            $sql = "select * from teacher where email = '$email' and maGv <> '$maGv'";

                            $result = $connect->query($sql);

                            if($result->num_rows > 0){
                                $msg = "Email: ".$email." đã tồn tại. Vui lòng nhập email khác";
                            }

                            else{
                                if($password == '12356@'){
                                    $msg = "Vui lòng nhập mật khẩu khác với mật khẩu mặc định";
                                }
                                else{
                                    $sql = "update teacher set email='$email', password = '$password', phone_number = '$phone_number' where maGv = '$maGv'";
                                    if($connect->query($sql)){
                                        header('Location: ../teacher/chooseClass.php');
                                    }
                                    else{
                                        echo $connect->error;
                                    }
                                }
                            }

                        }

                        if($role_id == 3 || $role_id ==  4 || $role_id ==  5 || $role_id ==  6 || $role_id == 7 || $role_id ==  8 || $role_id ==  9){
                            $maSv = $_SESSION['user']['maSv'];
                            $sql = "select * from students where email = '$email' and maSv <> '$maSv'";
                            $result = $connect->query($sql);
                            if($result->num_rows > 0){
                                $msg = "Email: ".$email." đã tồn tại. Vui lòng nhập email khác";
                            }
                            else{
                                if($password == '123456'){
                                    $msg = "Vui lòng nhập mật khẩu khác mật khẩu mặc định";
                                }
                                else{
                                    $sql = "update students set email='$email', password = '$password', phone_number = '$phone_number' where maSv = '$maSv'";
                                    if($connect->query($sql)){
                                        header('Location: ../student/index.php');
                                    }
                                    else{
                                        echo $connect->error;
                                    }
                                }
                            }
                        }
                        
                        
                    }
                ?>
            </div>
            <h4><?= $msg ?></h4>
        </div>
        <?php
            require_once $path.'footer.php';
            ob_end_flush();
        ?>
    </div>
</body>
<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

</script>
<style>
    .main__footer {
    padding: 12px 0 50px;
    object-fit: cover;
    /* position: relative; */
    /* position: fixed; */
    bottom: 0;
    width: 100%;
    color: #fff;
    position: relative;
}
    .form-login{
        background: #fff;
    }
</style>
</html>