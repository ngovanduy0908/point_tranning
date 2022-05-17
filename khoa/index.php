<?php
    session_start();
    // var_dump($_SESSION['user']);
    $path = '../';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khoa/Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/base_1.css">
    
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/footer.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="main ">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main__body">
            <h4 class="main__body_heading"><?=$_SESSION['user']['name']?></h4>
            <div class="main__body_container">
                <ul class="body__container_list grid wide row">
                    <li class="body__container_item">
                        <a href="index.php" class="body__container_link">Trang Chủ</a>
                    </li>
                    <li class="body__container_item">
                        <a href="../admin/teacher/index.php" class="body__container_link">Quản Lý Giáo Viên</a>
                    </li>
                    <li class="body__container_item">
                        <a href="../admin/class/index.php" class="body__container_link">Quản Lý Lớp Học</a>
                    </li>
                    <li class="body__container_item">
                        <a href="./selection.php" class="body__container_link">Thống kê Điểm Rèn Luyện</a>
                    </li>
                    <li class="body__container_item">
                        <a href="../login/logout.php" class="body__container_link">Đăng Xuất</a>
                    </li>
                </ul>
            </div>

            <?php
                require_once '../slide.php'
            ?> 
        </div>


              
        <?php
            require_once '../footer.php';
        ?>
    </div>
    <!-- <script src="../assets/js/footer_1.js"></script> -->
    <style>
        .body__container_list{
            display: flex;
            justify-content: space-between;
        }
    </style>
</body>
</html>