<?php
    session_start();
    // var_dump($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .body__container_link hover{
            color:black;
            background-color: linear-gradient( 35deg, #ccffff,#ffcccc);
            text-decoration:none ;
            font-size:25px;    
            border-radius:15px;
            padding-left:30px;
            padding-right:30px;
            padding-bottom:3px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="img" style="background-image: url(https://bophanmotcua.humg.edu.vn/Images/Humg3.jpg); background-repeat: no-repeat; width: 100%; height: 160px; background-size: 100% 135px; margin-top: -10px;">
        </div>
        <div class="nav" style="margin-top: -41px; background-color: rgb(45, 142, 206); width: 100%; height: 30px; border-radius: 5px; display: flex; justify-content: space-around;">
            <ul style="list-style: none; display: flex; justify-content: space-around;">
                <li class="body__container_item"><a class="body__container_link" href="index.php" style="text-decoration: none; font-size: 25px; color: white; font-family: Teko, sans-serif; ">Trang chủ </a></li>
                <li class="body__container_item"><a class="body__container_link" href="../admin/teacher/index.php"  style="text-decoration: none; font-size: 25px; color: white; font-family: Teko, sans-serif;margin-left:100px;">Quản lý giáo viên</a></li>
                <li class="body__container_item"><a class="body__container_link" href="../admin/class/index.php"  style="text-decoration: none; font-size: 25px; color: white; font-family: Teko, sans-serif;margin-left:100px;">Quản lý lớp học</a></li>
                <li class="body__container_item"><a class="body__container_link" href="../login/logout.php"  style="text-decoration: none; font-size: 25px; color: white; font-family: Teko, sans-serif;margin-left:100px;">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
    <div class="mid">
        <h4 class="main__body_heading" style="text-align:center;"><?=$_SESSION['user']['name']?></h4>
        <div class="slider" >
            <div class="content">
                <div class="title" style="height: 100px;">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel"
                        style="z-index:-999;">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"
                                aria-label="Slide 4"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="2000">
                                <img src="http://humg.edu.vn/content/tintuc/PublishingImages/dai-hoc-mo-dia-chat.jpg"
                                    class="d-block w-100" alt="..."  style="width:70%;height:500px">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="https://truongvietnam.net/wp-content/uploads/2022/01/dai-hoc-mo-dia-chat.jpg"
                                    class="d-block w-100" alt="..." style="width:70%;height:500px">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="https://humg.edu.vn/content/tintuc/PublishingImages/CSVC/truoc%20nha%20a_humg.jpg"
                                    class="d-block w-100" alt="..." style="width:70%;height:500px">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="https://humg.edu.vn/content/tintuc/PublishingImages/CSVC/khong%20gian%20doc%20sach%201.jpg"
                                    class="d-block w-100" alt="..." style="width:70%;height:500px">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <script src="./footer.js"></script>
    </div>
</body>
</html>