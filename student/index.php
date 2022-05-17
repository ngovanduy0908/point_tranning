<?php

session_start();

require_once('../db/dbhelper.php');
$path = '../';
if (isset($_SESSION['user'])) {
    $maSv = $_SESSION['user']['maSv'];

    $sql = "select * from students where maSv='$maSv'";

    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $svItem = $result->fetch_assoc();

        $role_id = $svItem['role_id'];

        $maLop = $svItem['maLop'];

        $sql = "SELECT deadline.* from deadline, teacher, class 
        where deadline.maGv = teacher.maGv 
        and teacher.maGv = class.maGv 
        and class.maLop = '$maLop'";

        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            $deadlineItem = $result->fetch_assoc();
            $start_time_student = $deadlineItem['start_time_student'];
            $end_time_student = $deadlineItem['end_time_student'];
            $end_time_monitor = $deadlineItem['end_time_monitor'];
            $curDate = date('Y-m-d');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Index</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/base_1.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/main.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main__body ">
            <h4 class="main__body_heading mb-2"><?= $_SESSION['user']['name'] ?></h4>

            <div class="main__body_container">

                <ul class="row main__body_container_list grid wide">

                    <?php
                    echo '
                    <input type="date" name="" id="start_time_student" value="' . $start_time_student . '" hidden>
                    <input type="date" name="" id="end_time_student" value="' . $end_time_student . '" hidden>
                    <input type="date" name="" id="end_time_monitor" value="' . $end_time_monitor . '" hidden>';


                    if ($start_time_student <= $curDate && $curDate <= $end_time_student) {
                        echo '
                            <li>
                                <a href="./chooseSemester.php" class="body__container_link">Chấm điểm rèn luyện</a>
                                <div id="countdown">
                                        <div id="tiles">
                                            <span id="day"></span>
                                            <span id="hour"></span>
                                            <span id="minute"></span>
                                            <span id="second">></span>
                                        </div>
                                        
                                    </div>
                            </li>                       
                            ';
                    }

                    // if($curDate > $end_time_student && $curDate <= $end_time_monitor){
                    //     echo 'Đéo';
                    // }
                    // else{
                    //     echo "Cay vl";
                    // }
                    if ($role_id == '3') {
                        if ($end_time_student < $curDate && $curDate <= $end_time_monitor) {
                            // echo "Yêu em";
                            echo '
                                <li>
                                    <a href="../monitor/chooseSemConsider.php" class="body__container_link">Xét điểm rèn luyện cho lớp</a>
                                    <div id="countdown">
                                        <div id="tiles">
                                            <span id="daySecond"></span>
                                            <span id="hourSecond"></span>
                                            <span id="minuteSecond"></span>
                                            <span id="secondSecond">></span>
                                        </div>
                                        
                                    </div>
                                </li>   
                                
                               
                            ';
                        }
                        
                        echo '

                        <li>
                            <a href="./selection.php" class="body__container_link">Xuất File điểm</a>
                        </li>
                        ';
                    }

                    ?>

                    <li>
                        <a href="./showSemester.php" class="body__container_link">Xem điểm rèn luyện</a>
                    </li>

                    <li class="change-info">
                        <a href="#" class="body__container_link">Thay đổi thông tin cá nhân</a>
                        <ul class="change-info-sub">
                            <li><a href="./changePassword.php">Thay đổi mật khẩu</a></li>
                            <li><a href="./changeEmail.php">Thay đổi email</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="../login/logout.php" class="body__container_link">Đăng xuất</a>
                    </li>

                </ul>

            </div>

            <?php
                require_once '../slide.php';
            ?>
        </div>

        <?php
            require_once '../footer.php';
        ?>

    </div>


    <script>
        let thoi_gian_ket_thuc_1 = document.getElementById('end_time_student').value;

        let thoi_gian_ket_thuc_2 = document.getElementById('end_time_monitor').value;

        let thoi_gian_ket_thuc_1_ms = new Date(thoi_gian_ket_thuc_1).getTime();

        let thoi_gian_ket_thuc_2_ms = new Date(thoi_gian_ket_thuc_2).getTime();
        
        var ngay_hien_tai = new Date().getTime();
                   
        function thoi_gian_cham() {
            /*Lấy thời gian ngày hiện tại (mily giây) */
            var ngay_hien_tai = new Date().getTime();

            var thoi_gian_con_lai = (thoi_gian_ket_thuc_1_ms + 17 * 60 * 60 * 1000) - (ngay_hien_tai);
            
            if (thoi_gian_con_lai > 0) {
                /*Chuyển đơn vị thời gian tương ứng sang mili giây*/

                var giay = 1000;
                var phut = giay * 60;
                var gio = phut * 60;
                var ngay = gio * 24;

                /*Tìm ra thời gian theo ngày, giờ, phút giây còn lại thông qua cách chia lấy dư(%) và làm tròn số(Math.floor) trong Javascript*/
                var d = Math.floor(thoi_gian_con_lai / (ngay));
                var h = Math.floor((thoi_gian_con_lai % (ngay)) / (gio));
                var m = Math.floor((thoi_gian_con_lai % (gio)) / (phut));
                var s = Math.floor((thoi_gian_con_lai % (phut)) / (giay));

                /*Hiển thị kết quả ra các thẻ Div với ID tương ứng*/
                document.getElementById("day").innerText = d;
                document.getElementById("hour").innerText = h;
                document.getElementById("minute").innerText = m;
                document.getElementById("second").innerText = s;
            }
        }

        function thoi_gian_xet() {
            /*Lấy thời gian ngày hiện tại (mily giây) */
            var ngay_hien_tai = new Date().getTime();

            var thoi_gian_con_lai = (thoi_gian_ket_thuc_2_ms + 17 * 60 * 60 * 1000) - (ngay_hien_tai);
            /*Chuyển đơn vị thời gian tương ứng sang mili giây*/
            var giay = 1000;
            var phut = giay * 60;
            var gio = phut * 60;
            var ngay = gio * 24;

            
            /*Tìm ra thời gian theo ngày, giờ, phút giây còn lại thông qua cách chia lấy dư(%) và làm tròn số(Math.floor) trong Javascript*/
            var d = Math.floor(thoi_gian_con_lai / (ngay));
            var h = Math.floor((thoi_gian_con_lai % (ngay)) / (gio));
            var m = Math.floor((thoi_gian_con_lai % (gio)) / (phut));
            var s = Math.floor((thoi_gian_con_lai % (phut)) / (giay));

            /*Hiển thị kết quả ra các thẻ Div với ID tương ứng*/
            document.getElementById("daySecond").innerText = d;
            document.getElementById("hourSecond").innerText = h;
            document.getElementById("minuteSecond").innerText = m;
            document.getElementById("secondSecond").innerText = s;
            
        }
        // console.log(document.getElementById("daySecond"))
        

        /*Thiết Lập hàm sẽ tự động chạy lại sau 1s*/
        setInterval(function() {
            thoi_gian_cham()
        }, 1000)

        setInterval(function() {
            thoi_gian_xet()
        }, 1000)

    </script>
    <!-- <script src="../assets/js/footer_1.js"></script> -->
    <style>
        .change-info-sub {
            box-shadow: 0 4px 4px 1px;
            display: block;
            background: #c2e8f1;
            border-radius: 5px;
            position: absolute;
            top: 44px;
            z-index: 3;
            list-style: none;
            width: 218px;
            display: none;
        }

        .change-info:hover .change-info-sub {
            display: block;
        }

        .main__body_container_list{
            position: relative;
        }

        

        .change-info-sub a{
            color: #000;
            display: block;
            padding: 5px 18px;
            font-size: 18px;
        }

        .change-info-sub a:hover{
            color: #000;
            text-decoration: none;
        }

       

        #countdown{
            width: 245px;
            height: 45px;
            text-align: center;
            background: #222;
            background-image: -webkit-linear-gradient(top, #222, #333, #333, #222); 
            background-image:    -moz-linear-gradient(top, #222, #333, #333, #222);
            background-image:     -ms-linear-gradient(top, #222, #333, #333, #222);
            background-image:      -o-linear-gradient(top, #222, #333, #333, #222);
            border: 1px solid #111;
            border-radius: 5px;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.6);
            margin: auto;
            padding: 24px 0;
            position: absolute;
            top: 115px; bottom: 0; left: -78%; right: 0;
        }

        #countdown:before{
            content:"";
            width: 8px;
            height: 48px;
            background: #444;
            background-image: -webkit-linear-gradient(top, #555, #444, #444, #555); 
            background-image:    -moz-linear-gradient(top, #555, #444, #444, #555);
            background-image:     -ms-linear-gradient(top, #555, #444, #444, #555);
            background-image:      -o-linear-gradient(top, #555, #444, #444, #555);
            border: 1px solid #111;
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
            display: block;
            position: absolute;
            top: 0px; left: -10px;
        }

        #countdown:after{
            content:"";
            width: 8px;
            height: 48px;
            background: #444;
            background-image: -webkit-linear-gradient(top, #555, #444, #444, #555); 
            background-image:    -moz-linear-gradient(top, #555, #444, #444, #555);
            background-image:     -ms-linear-gradient(top, #555, #444, #444, #555);
            background-image:      -o-linear-gradient(top, #555, #444, #444, #555);
            border: 1px solid #111;
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
            display: block;
            position: absolute;
            top: 0px; right: -10px;
        }

        #countdown #tiles{
            position: relative;
            z-index: 1;
            top: -24px;
        }

        #countdown #tiles > span{
            width: 40px;
            max-width: 40px;
            font: bold 20px 'Droid Sans', Arial, sans-serif;
            text-align: center;
            color: #111;
            background-color: #ddd;
            background-image: -webkit-linear-gradient(top, #bbb, #eee); 
            background-image:    -moz-linear-gradient(top, #bbb, #eee);
            background-image:     -ms-linear-gradient(top, #bbb, #eee);
            background-image:      -o-linear-gradient(top, #bbb, #eee);
            border-top: 1px solid #fff;
            border-radius: 3px;
            box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.7);
            margin: 0 7px;
            padding: 12px 0;
            display: inline-block;
            position: relative;
        }

        #countdown #tiles > span:before{
            content:"";
            width: 100%;
            height: 13px;
            background: #111;
            display: block;
            padding: 0 3px;
            position: absolute;
            top: 41%; left: -3px;
            z-index: -1;
        }

        #countdown #tiles > span:after{
            content:"";
            width: 100%;
            height: 1px;
            background: #eee;
            border-top: 1px solid #333;
            display: block;
            position: absolute;
            top: 48%; left: 0;
        }

        #countdown .labels{
            width: 100%;
            height: 25px;
            text-align: center;
            position: absolute;
            bottom: 8px;
        }

        #countdown .labels li{
            width: 102px;
            font: bold 15px 'Droid Sans', Arial, sans-serif;
            color: #f47321;
            text-shadow: 1px 1px 0px #000;
            text-align: center;
            text-transform: uppercase;
            display: inline-block;
        }
    </style>
</body>

</html>