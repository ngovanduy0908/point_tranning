<?php
    session_start();
    require_once('../../db/dbhelper.php');
    // var_dump($_SESSION['user']);
    if(isset($_SESSION['user'])){
        $maGv = $_SESSION['user']['maGv'];
        $maLop = $_SESSION['maLop'];
        // var_dump($maLop);
    }
    $maSv = $name = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/grid.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <link rel="stylesheet" href="../../assets/css/form.css">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="main">
        <header class="main__header grid wide">
            <div class="header">
                <img src="../../assets/img/LOGO_DTDH.png" alt="" class="header__img">
            </div>
        </header>
        <div class="main__body grid wide">
            <h4 class="main__body_heading">Quản Lý Sinh Viên - Thêm Sinh Viên</h4>
            <div class="main__body_container">
                <form action="" method="POST" class="form_css mb-5 mt-5">
                    
                    <div class="form-group">
                        <input type="text" placeholder="Nhập Mã Sinh Viên..." name="maSv" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Nhập Tên Sinh Viên..." name="name" class="form-control">
                    </div>
                    
                
                    <button class="btn btn-success">Lưu</button>
                    <a href="./index.php" class="btn btn-warning ml-2">Trở Lại</a>
                   
                    <?php
                        if(!empty($_POST['maSv']) && !empty($_POST['name'])){
                            $maSv = $_POST['maSv'];
                            $name = $_POST['name'];
                           
                         
                            $sql = "insert into students(maSv, name, role_id, maLop, password) values ('$maSv', '$name', '4', '$maLop', '123456')";
                            if($connect->query($sql)){
                                header('Location: index.php');
                                // echo 'Thành công';
                            }
                            else{
                                echo $connect->error;
                            }
                        }
                    ?>
                </form>
            </div>
        </div>

        <?php
            require_once '../../footer.php';
        ?>
    </div>
</body>
</html>