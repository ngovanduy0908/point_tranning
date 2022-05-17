<?php
	require_once('../../db/dbhelper.php');
    $path = '../../';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUMG</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/grid.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/base_1.css">

    <link rel="stylesheet" href="../../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="main">
        <?php
            require_once '../../header.php';
        ?>
        <h4 class="main__body_heading">HUMG</h4>
        <div class="main__body main__body_container">

            <nav class="nav nav-pills grid wide body__container_list">
                <a href="./department/index.php" class="nav-item nav-link body__container_link">
                    <i class="fas fa-building"></i> Quản lý khoa
                </a>
                <a href="./course/index.php" class="nav-item nav-link body__container_link">
                    <i class="fas fa-key"></i> Quản lý khóa học
                </a>
                <a href="./system/index.php" class="nav-item nav-link body__container_link">
                    <i class="fas fa-book"></i></i> Quản lý học kì
                </a>
                <a href="../../login/logout.php" class="nav-item nav-link body__container_link">
                    <i class="fas fa-sign-out-alt"></i> Đăng xuất
                </a>
            </nav>
        </div>
        <?php
            require_once '../../slide.php';
        ?>
        <?php
            require_once '../../footer.php';
        ?>

       
    </div>

   
    
    <style>
        .main__body_form{
            border: 2px solid #79cff3;
            border-radius: 4px;
            padding-top: 5px; 
            padding-bottom: 5px; 
        }
        .body__container_list{
            justify-content: space-between;
            align-items: center;
        }
    </style>
</body>

</html>