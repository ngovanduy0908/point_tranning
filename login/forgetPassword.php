<?php
	require_once('../db/dbhelper.php');
    $email = $msg = '';
    $path = '../';
    if(isset($_POST['send'])){
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $sql = "select * from students where email = '$email'";
            $result = $connect->query($sql);
            if($result->num_rows > 0){
                $matKhauMoi = md5(rand(0,9999));
                $matKhauMoi = substr($matKhauMoi ,0 ,8);
                $sql = "update students set password = '$matKhauMoi' where email = '$email'";
                if($connect->query($sql) == true){
                    // $msg = "Đã cập nhập mật khẩu";
                   $kq = guiMatKhauMoi($email, $matKhauMoi);
                   if($kq == true){
                         $msg = "Đã cập nhập mật khẩu. Vui lòng kiểm tra Email để lấy mật khẩu mới";
                   }
                   else{
                    $msg = "Fail";
                   }
                }
            }
            else{
                $msg = "Email không tồn tại. Vui lòng nhập lại email";
            }
        }
    }

?>

<?php
    function guiMatKhauMoi($email, $matKhauMoi){
        require "PHPMailer-master/src/PHPMailer.php"; 
        require "PHPMailer-master/src/SMTP.php"; 
        require 'PHPMailer-master/src/Exception.php'; 
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug
            $mail->isSMTP();  
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'j2teamnvd@gmail.com'; // SMTP username
            $mail->Password = 'duy0342517826';   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
            $mail->Port = 465;  // port to connect to                
            $mail->setFrom('j2teamnvd@gmail.com', 'HUMG'); 
            $mail->addAddress($email); 
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Thư cấp lại mật khẩu';
            $noidungthu = "<p>Bạn nhận được thư này, do bạn hoặc ai đó yêu cầu mật khẩu mới từ
            chúng tôi .Mật khẩu của bạn là {$matKhauMoi}</p>"; 
            $mail->Body = $noidungthu;
            $mail->smtpConnect( array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            $mail->send();
            return true;
        } catch (Exception $e) {
           return false;
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy lại mật khẩu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/base_1.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
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

            <div class="main_body_login mt-3">
                <div class="login-box">
                    <h2>Lấy Lại Mật Khẩu</h2>
                    <form method="post" action="">
                        <div class="user-box">
                            <input type="email" name="email" required="">
                            <label>Nhập email đã đăng ký</label>
                        </div>
                        
                        <button type="submit" class="" name="send">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Submit
                        </button>
                        <a href="./login.php" style="color: #fff;" class="ml-2">Quay lại</a>
                    </form>
                    </div>
                </div>
        </div>
        <h3 style="color: red;" class="text-center mes-error mt-2"><?=$msg?></h3>
        <?php
            require_once '../footer.php';
        ?>
    </div>
</body>
<!-- <script src="../assets/js/forgotPassword.js"></script> -->

</script>
<style>
    .mes-error{
        /* position: relative; */
        /* top: 500px; */
        /* left: 50%; */
        /* transform: translateX(-10%); */
        margin: 0px;
        font-size: 20px;
    }
    .body__container_list {
        justify-content: space-between;
        align-items: center;
    }

.login-box {
  /* position: absolute; */
  /* top: 50%; */
  left: 50%;
  width: 400px;
  padding: 40px;
  /* transform: translate(-50%, -50%); */
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
  margin: 0 auto;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form button {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px;
  border: none;
  background-color: transparent;
}

.login-box button:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.login-box button span {
  position: absolute;
  display: block;
}

.login-box button span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box button span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box button span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box button span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}

</style>
</html>