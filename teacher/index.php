<?php
    session_start();
    // var_dump($_SESSION['user']);
    // var_dump($_SESSION['maLop']);

    require_once('../db/dbhelper.php');
    $path = '../';
    if(isset($_SESSION['user'])){
        $maGv = $_SESSION['user']['maGv'];
        $maLop = $_SESSION['maLop'];
        // $maLop = $_SE
        // var_dump($maLop);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Lớp Học</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/base_1.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="main ">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main__body">
            <h4 class="main__body_heading"><?=$_SESSION['user']['name']?>-<?= $maLop ?></h4>
            <!-- <a href="../login/logout.php" class="btn btn-warning" style="position: relative;top: -11px;left: 11%;">Đăng Xuất</a> -->
            
            
            <div class="main__body_container">
                <ul class="body__container_list row grid wide">
                    <li class="body__container_item">
                        <a href="./backChooseClass.php" class="body__container_link">Trang Chủ</a>
                    </li>
                    <li class="body__container_item">
                        <a href="./studentManager/index.php" class="body__container_link">Quản Lý Sinh Viên</a>
                    </li>
                    <li class="body__container_item">
                        <a href="./browser/chooseSemConsider.php" class="body__container_link">Chấm Điểm SV</a>
                    </li>
                    <!-- <li class="body__container_item">
                        <a href="./monitor/classMonitor.php" class="body__container_link">Chọn Lớp Trưởng</a>
                        
                    </li> -->
                    <li class="body__container_item">
                        <a href="./chooseSemConsider.php" class="body__container_link">Xuất File Điểm</a>

                        
                        <!-- <a href="./dateTime.php" class="body__container_link">Chọn Ngày Chấm</a> -->
                    </li>
                    <li class="body__container_item">
                        <a href="./charts/index.php" class="body__container_link">Thống kê</a>
    
                    </li>
                    <li class="body__container_item">
                        <a href="../login/logout.php" class="logout body__container_link">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
    
                    </li>
                    <!-- <li class="upload_point">
                        <a href="#" class="body__container_link">Upload điểm</a>  
                        <ul class="upload_point_list">
                            <li class="upload_point_item">
                                <a href="" class="upload_point_link">Upload điểm tuần CDSV</a>
                            </li>
                            <li class="upload_point_item">
                                <a href="" class="upload_point_link">Upload điểm TBHK</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <?php 
                require_once '../slide.php';
            ?>
        </div>
        <?php
            require_once '../footer.php';
        ?>
        <!-- <script src="../assets/js/footer_1.js"></script> -->
    </div>
    <style>
       
        .body__container_list{
            display: flex;
            justify-content: space-between;
        }

        /* .logout{
            position: relative;
            top: -38px;
            left: 88%;
            font-size: 24px;
        } */

        .upload_point{
            position: relative;
        }

        .upload_point:hover .upload_point_list{
            display: block;
        }

        .upload_point_list{
            position: absolute;
            top: 46px;
            right:0;
            list-style: none;
            background-color: rgba(127,192,238,0.6);
            text-align: right;
            width: 200px;
            z-index: 2;
            border-radius: 6px;
            display: none;
        }

        .upload_point_list::before{
            content:"";
            position: absolute;
            top: -16px;
            right: 0;
            display: block;
            background-color: transparent;
            width: 120px;
            height: 24px;
            display: block;
        }

        

        .upload_point_link{
            padding: 5px 8px;
            display: block;
            color: #1c1e1e;
            
        }
    </style>
</body>
</html>