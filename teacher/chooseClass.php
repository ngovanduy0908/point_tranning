<?php
ob_start();
    session_start();
    require_once('../db/dbhelper.php');
    $path = '../';
    if(isset($_SESSION['user'])){
        $maGv = $_SESSION['user']['maGv'];
    }
    // var_dump($maGv);

    // var_dump($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/base_1.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main__body">
            <h4 class="main__body_heading"><?=$_SESSION['user']['name']?> - Trang Chủ</h4>
            <div class="main__body_container">
                <ul class="body__container_list row grid wide">
                    
                    <!-- <li class="body__container_item ">
                        <a href="../login/logout.php" class="body__container_link">Đăng xuất</a>
                    </li> -->
                    <li class="">
                        <a href="./dateTime.php" class="body__container_link">Xét thời gian chấm điểm</a>  
                    </li>
                    
                    
                    
                    <li class="" style="height: 44px; width: 308px">
                        <form action="" class="needs-validation" method="POST">
                            <div class="form-group">
                                <select name="maLop" id="" class="form-control" style="width: 78%;">
                                    <option value="">--Chọn Lớp--</option>
    
                                    <?php
                                        $sql = "select * from class where maGv = '$maGv'";
                                        $result = $connect->query($sql);
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                echo '
                                                    <option value="'.$row['maLop'].'">'.$row['class_name'].'</option>
                                                
                                                ';
                                            }
                                        }
                                    ?>
                                </select>
                
                            </div>
                            <button class="float-right btn_choose">Chọn</button>
                        
                        </form>
                    </li>    
                    

                    <li class="change-info">
                        <a href="#" class="body__container_link">Đổi thông tin cá nhân</a>
                         
                        <ul class="change_info_list">
                            <li class="change_info_item">
                                <a href="./changeInfo/changePassword.php" class="change_info_link">Thay đổi mật khẩu</a>
                            </li>
                            <li class="change_info_item">
                                <a href="./changeInfo/changeEmail.php" class="change_info_link">Thay đổi email</a>
                            </li>
                            
                        </ul>
                        
                    </li>

                    <li class="">
                        <a href="../login/logout.php" class="body__container_link">Đăng xuất</a>
                    </li>
                    

    
                </ul>
            </div>

            <div class="main__body_container_deadline grid wide mt-4">
                <div class="row">
                    <div class="col-lg-5">
                        <?php
                            $sql = "select * from deadline where maGv = '$maGv'";

                            $result = $connect->query($sql);
                            if($result->num_rows > 0){
                                $row = $result->fetch_assoc();
                                ?>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>Thời gian</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>SV bắt đầu chấm</td>
                                        <td><?= $row['start_time_student']?></td>
                                    </tr>
                                    <tr>
                                        <td>SV kết thúc chấm</td>
                                        <td><?= $row['end_time_student']?></td>
                                    </tr>
                                    <tr>
                                        <td>Lớp trưởng bắt đầu xét</td>
                                        <td><?= $row['end_time_monitor']?></td>
                                    </tr>
                                    
                                </table>
                                
                            <?php
                            }
                        ?>

                    </div>

                    <div class="col-lg-7">
                        <div class="app__main_intro_slider_image">
        
                            <img src="https://humg.edu.vn/content/tintuc/PublishingImages/ipe-%20v.2.png" alt="" id="app__main_intro_slider">
                            <img src="https://humg.edu.vn/content/tintuc/PublishingImages/fix11.jpg" alt="" id="app__main_intro_slider">
                            <img src="https://humg.edu.vn/content/tintuc/PublishingImages/Banner%20Hoi%20nghi/2022/ict%202022.jpg" alt="" id="app__main_intro_slider">
                            <img src="https://humg.edu.vn/content/tintuc/PublishingImages/Banner%20Hoi%20nghi/2021/pano%20chay%20web%20truong.jpg" alt="" id="app__main_intro_slider">
                            <img src="https://humg.edu.vn/content/tintuc/PublishingImages/SuKien/2022/emma6.jpg" alt="" id="app__main_intro_slider">
                            <img src="https://humg.edu.vn/content/tintuc/PublishingImages/banner%20paxt%20th%E1%BB%A9%205.jpg" alt="" id="app__main_intro_slider">

                        </div>
                    </div>
                </div>

               
            </div>
        </div>

        <?php
            require_once '../footer.php';
        ?>
        <?php
            if(isset($_POST['maLop'])){
                $maLop = $_POST['maLop'];
                $_SESSION['maLop'] = $maLop;
                header("Location: index.php");
            }
        ?>
        
    </div>
        <!-- <script src="../assets/js/footer_1.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
    <style>

        .change-info{
            position: relative;
            cursor: pointer;
        }

        .change-info:hover .change_info_icon{
            color: #d0c3c3;
        }

        .change-info:hover .change_info_list{
            display: block;
        }

        .change_info_list{
            position: absolute;
            top: 44px;
            right: 0;
            list-style: none;
            background-color: rgba(127,192,238,0.6);
            z-index: 2;
            width: 160px;
            text-align: right;
            border-radius: 6px;
            display: none;
        }

        .change_info_list::before{
            content: "";
            display: block;
            position: absolute;
            border-width: 15px 17px;
            border-style: solid;
            border-color: transparent transparent rgba(127,192,238,0.6) transparent;
            top: -28px;
            right: 0;
        }

        .change_info_link{
            display: block;
            padding: 5px 8px;
            color: #1c1e1e;

        }

        .upload_point_link:hover,
        .change_info_link:hover{
            text-decoration: none;
        }

        .change_info_icon{
            color: white;
            font-size: 34px;
        }

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


        .change-info-sub {
            display: none;
        }
        .change-info:hover .change-info-sub{
            display:block;
        }

        .body__container_list{
            justify-content: space-between;
            align-items: center;
        }

        .needs-validation{
            position: relative;
            top: 3px;
        }

        .btn_choose{
            position: absolute;
            top: 1px;
            right: -10px;
            padding: 4px 6px;
            border-radius: 5px;
        }

    
        .app__main_intro_slider_image img{
            width: 100%;
            object-fit: cover;
        }

        
        .body__container_link{
            position: relative;
        }

        .change-info-sub{
            position: absolute;
            top: 218px;
            background: #ccc;
            z-index: 1;
            list-style: none;
            padding: 5px 14px;
            right: 168px;
            border-radius: 5px;
        }
        
    </style>  
<script type="text/javascript">
    $('.app__main_intro_slider_image').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows:false,
    speed:2000,
    autoplay: true,
    autoplaySpeed: 2000,
    });

    var filtered = false;

    $('.js-filter').on('click', function(){
    if (filtered === false) {
        $('.app__main_intro_slider_image').slick('slickFilter',':even');
        $(this).text('Unfilter Slides');
        filtered = true;
    } else {
        $('.app__main_intro_slider_image').slick('slickUnfilter');
        $(this).text('Filter Slides');
        filtered = false;
    }
    });
</script>   
</body>
<?php
ob_end_flush();
?>
</html>