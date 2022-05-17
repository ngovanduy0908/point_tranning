<?php
    ob_start();
    session_start();
    require_once('../../db/dbhelper.php');
    $path = '../../';
    $msg = $emailOld = "";

    if(isset($_SESSION['user'])){
        $maGv = $_SESSION['user']['maGv'];
        $sql = "select * from teacher where maGv = '$maGv'";
        $result = $connect->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $emailOld = $row['email'];
        }
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
    <link rel="stylesheet" href="../../assets/css/grid.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    

    

</head>
<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main__body grid wide">
            <h4 class="main__body_heading"><?=$_SESSION['user']['name']?> - Thay đổi email</h4>
            <div class="main__body_container mb-2" style="width: 400px;margin: 0 auto;border: 2px solid;padding: 8px 12px;border-radius: 6px;">
                <form method="POST">
                    <div class="form-group">
                        <label for="emailOld">Nhập email cũ:</label>
                        <input type="text" class="form-control" name="emailOld" id="emailOld" required minlength="6" value="<?php echo $emailOld ?>">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="emailNew">Nhập email mới:</label>
                        <input type="text" class="form-control" id="emailNew" name="emailNew" required minlength="6">
                        <div id="email-mes" style="color: red"></div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    
                    <button  class="btn btn-primary">Lưu</button>
                    <a href="../chooseClass.php" class="btn btn-warning ml-2">Quay lại</a>

                </form>
                <?php
                    if(isset($_POST['emailOld'])){
                        $emailOld = $_POST['emailOld'];
                        if(isset($_POST['emailNew'])){
                            $emailNew = $_POST['emailNew'];
                        }
                        
                        $sql = "select * from teacher where email = '$emailOld' and maGv = '$maGv'  ";
                        $result = $connect->query($sql);
                        if($result->num_rows > 0){
                            $sql = "select * from teacher where email  = '$emailNew' and maGv <> '$maGv'";
                            $checkEmail = $connect->query($sql);
                            if($checkEmail->num_rows > 0){
                                $msg = $emailNew." đã tồn tại";
                            }
                            else{
                                $sql = "update teacher set email = '$emailNew' where maGv = '$maGv'";
                                if($connect->query($sql)){
                                    
                                    
                                    header('Location: ./afterChangeEmail.php');
                                }
                            }
                        }
                        else{
                            $msg = "Email cũ không chính xác. Vui lòng nhập lại";
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
                var emailNew  = document.querySelector('#emailNew')
             
                emailNew.onblur = function (){

                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(!emailNew.value.match(mailformat))
                {
                // alert("Valid email address!");
                    document.querySelector('#email-mes').innerText = 'Địa chỉ email không hợp lệ';
                }
            }
            emailNew.onkeyup = function() {
                document.querySelector('#email-mes').innerText = "";
            };
            

    </script>
</body>
</html>