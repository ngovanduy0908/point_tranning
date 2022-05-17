<?php
    ob_start();
    session_start();
    require_once('../../db/dbhelper.php');
    $path = '../../';
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

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main__body grid wide">
            
            <a href="../index.php" class="body__container_link mt-2"><button class="btn btn-warning"><i class="fas fa-arrow-circle-left"></i>Quay Lại</button></a>
                
            <h4 class="main__body_heading"><?=$_SESSION['user']['name']?> - Chọn Kì Xét Điểm Rèn Luyện</h4>
            <div class="main__body_container mt-4">
                <div class="row">
                    <div class="col-lg-4" style="margin-top: 90px;">
                        <form action="" class="needs-validation" novalidate method="POST">
                            <div class="form-group">
                                <select name="maHK" id="" class="form-control">
                                    <option value="">--Chọn Kì Xét ĐRL--</option>
                                    <?php
                                        $sql = "select * from semester where status = '1'";
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
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        
                            <button type="submit" class="btn btn-primary" style="width: 100px">Chọn</button>
                        </form>
                    </div>
                    <div class="col-lg-8">
                        <?php
                            require_once '../../slide.php';
                        ?>
                    </div>
                </div>
                <?php
                    if(isset($_POST['maHK'])){
                        $maHK = $_POST['maHK'];
                        $_SESSION['maHK'] = $maHK;
                        header('Location: index.php');
                    }
                ?>
            </div>
        </div>
        <?php
            require_once '../../footer.php';
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