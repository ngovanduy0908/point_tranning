<?php
ob_start();
    session_start();
    require_once('../db/dbhelper.php');
    $path = '../';
    if(isset($_SESSION['user'])){
        $maGv = $_SESSION['user']['maGv'];
        $maLop = $_SESSION['maLop'];
        // var_dump($maLop);
        // var_dump($maGv);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Choose Semester</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/footer.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="main ">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main__body grid wide">
            
                
            <h4 class="main__body_heading"><?=$_SESSION['user']['name']?> - Xuất File Danh Sách ĐRL - <?= $maLop ?></h4>
            <div class="main__body_container mt-3" style="margin-bottom: 33px;">
            <form action="" class="needs-validation mb-2" novalidate method="POST" style="border: 2px solid;width: 500px; margin: 0 auto;padding: 8px 12px;border-radius: 6px;">
                <div class="form-group">
                    Chọn kì
                    <select name="maHK" id="" class="form-control">
                        
                        <?php
                            $sql = "select * from semester order by rank asc";
                            $result = $connect->query($sql);
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo '
                                        <option value="'.$row['maHK'].'">'.$row['name'].'</option>                    
                                    ';
                                }
                            }
                        ?>

                    </select>
                </div>
        
                <div class="form-group">
                    Danh sách
                    <select name="level_point" id="" class="form-control">
                        <option value="0">Cả lớp</option>
                        <option value="1">SV Xuất Sắc</option>
                        <option value="2">SV Giỏi</option>
                        <option value="3">SV Khá</option>
                        <option value="4">SV Trung Bình</option>
                        <option value="9">SV Trung Bình Khá</option>

                        <option value="7">SV Yếu</option>
                        <option value="8">SV Kém</option>

                        <option value="5">SV Điểm rèn luyện >= 70</option>
                        <option value="6">SV Điểm rèn luyện < 50</option>

                    </select>
                </div>
                   
                
               
                <button type="submit" class="btn btn-primary" style="width: 100px">Chọn</button>
                <a href="./index.php" class="ml-3 btn btn-warning">Quay Lại</a>

            </form>
            <?php
                if(isset($_POST['maHK'])){
                    $maHK = $_POST['maHK'];
                    $level_point = $_POST['level_point'];
                    $_SESSION['maHK'] = $maHK;
                    $_SESSION['level_point'] = $level_point;
                    header('Location: exportFile.php');
                }
            ?>
            </div>
        </div>

        <?php
            require_once '../footer.php';
            ob_end_flush()
        ?>
       
    </div>
    
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
</body>
</html>