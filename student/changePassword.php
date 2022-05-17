<?php
    ob_start();
    session_start();
    require_once('../db/dbhelper.php');
    $path = '../';
    $msg = $passwordOld = "";

    if(isset($_SESSION['user'])){
        $maSv = $_SESSION['user']['maSv'];
    }
    if(isset($_POST['passwordOld'])){
        $passwordOld = $_POST['passwordOld'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

   

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="main ">
        <header class="main__header grid wide">
            <div class="header">
                <img src="../assets/img/LOGO_DTDH.png" alt="" class="header__img">
            </div>
        </header>
        <div class="main__body grid wide">
            <h4 class="main__body_heading"><?=$_SESSION['user']['name']?> - Thay đổi mật khẩu</h4>
            <div class="main__body_container mt-3">
                <form method="POST" style="width: 400px;margin: 0 auto;border: 2px solid;padding: 8px 12px;border-radius: 5px;">
                    <div class="form-group">
                        <label for="passwordOld">Nhập mật khẩu cũ:</label>
                        <input type="text" class="form-control" placeholder="Vd: 123456" name="passwordOld" id="passwordOld" required minlength="6" value="<?php echo $passwordOld ?>">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="form-group">
                        <label for="passwordNew">Nhập mật khẩu mới:</label>
                        <input type="text" class="form-control" id="passwordNew" name="passwordNew" required minlength="6">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="form-group">
                        <label for="passwordNewAgain">Nhập lại mật khẩu mới:</label>
                        <input type="password" class="form-control" id="passwordNewAgain"  name="passwordNewAgain" required minlength="6">
                        <span class="errorMes" style="color: red"></span>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <button  class="btn btn-primary">Submit</button>
                    <a href="index.php" class="btn btn-warning ml-3">Quay Lại</a>

                </form>
                <?php
                    if(isset($_POST['passwordOld'])){
                        $passwordOld = $_POST['passwordOld'];

                        if(isset($_POST['passwordNew'])){
                            $passwordNew = $_POST['passwordNew'];
                        }

                        if(isset($_POST['passwordNew'])){
                            $passwordNewAgain = $_POST['passwordNewAgain'];
                        }

                        $sql = "select * from students where maSv = '$maSv' and password = '$passwordOld'";
                        $result = $connect->query($sql);

                        if($result->num_rows > 0){
                            $sql = "update students set password = '$passwordNewAgain' where maSv = '$maSv'";
                            if($connect->query($sql)){
                                
                                
                                header('Location: afterChangePW.php');
                            }
                        }
                        else{
                            $msg = "Mật Khẩu cũ không chính xác. Vui lòng nhập lại";
                        }
                    }
                    ob_end_flush();
                ?>  
                <h4><?=$msg?></h4>

            </div>
        </div>
        <?php
            require_once $path.'footer.php';
        ?>
        
       
    </div>
                    
        <script>
// Disable form submissions if there are invalid fields
            var errorMes = document.querySelector('.errorMes');
            var passwordNew = document.querySelector('#passwordNew');
            var passwordNewAgain = document.querySelector('#passwordNewAgain');
            passwordNewAgain.onblur = function() {
                if(passwordNew.value != passwordNewAgain.value){
                    errorMes.innerText = "Mật khẩu không khớp với mật khẩu mới";
                }
            }
            passwordNewAgain.onkeyup = function() {
                errorMes.innerText = ""
            };
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
</body>
</html>