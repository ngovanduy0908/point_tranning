<?php
    ob_start();
    session_start();
    require_once('../../db/dbhelper.php');
    $path='../../';
    if(isset($_SESSION['user'])){

        $svDiemTBHK = $svCitizen = $svMonitor = $svNCKH1 = $svNCKH2 = $svNCKH3 
        = $svOlympic1 = $svOlympic2 = $svOlympic3 = $svOlympic4 = $svNoRegulation 
        = $svOnTime = $svAbandon = $svUnTrueTime = $svNoFullStudy = $svNoCard 
        = $svNoAtivities = $svNoPayFee = $svFullActive = $svAchievementCity 
        = $svAchievementSchool = $svAdvise = $svIrresponsible = $svNoCultural 
        = $svPositiveStudy = $svPositiveLove = $svWarn = $svNoProtect
        = $svBonus = $svIrresponsibleMonitor = $svRightRule = $sum = $check = 0;

        if(isset($_GET['maSv'])){
            $maSv = $_GET['maSv'];
            // var_dump($maSv);
        }
        $maHK = $_SESSION['maHK']; 
        // var_dump($maHK);
        // var_dump($maSv);
        $sql = "SELECT 
                students.*, class.class_name as class_name, course.name as course_name, department.name as department_name, role.name as role_name 
                from students, class, course, department, role
                where 
                students.maLop = class.maLop 
                and students.role_id = role.id
                and class.maKhoaHoc = course.maKhoaHoc 
                and class.maKhoa = department.maKhoa 
                and students.maSv = '$maSv'";

        $result = $connect->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $role_name = $row['role_name'];
            $arr_level_one = ['Lớp Trưởng', 'Phó Bí Thư Liên Chi', 'Bí Thư Chi Đoàn'];
            $arr_level_two = ['Lớp Phó', 'Phó Bí Thư Chi Đoàn', 'Hội Trưởng Hội SV'];
            // echo $role_name;
        }
        require_once $path.'get_point_to_brower.php';
        $sqlHK = "select * from semester where maHK = '$maHK'";
        $hk = $connect->query($sqlHK);
        if($hk->num_rows > 0){
            $hkItem = $hk->fetch_assoc();
        }

        $sqlDiemSv = "select * from point_student where maSv = '$maSv' and maHk = '$maHK'";
        $diemSV = $connect->query($sqlDiemSv);
        if($diemSV->num_rows > 0){
            $diemSVItem = $diemSV->fetch_assoc();
            $check = 1;
            // Các đầu điểm của mục 1
            $svDiemTBHK = $diemSVItem['svDiemTBHK'];
            $svNCKH1 = $diemSVItem['svNCKH1'];
            $svNCKH2 = $diemSVItem['svNCKH2'];
            $svNCKH3 = $diemSVItem['svNCKH3'];
            $svOlympic1 = $diemSVItem['svOlympic1'];
            $svOlympic2 = $diemSVItem['svOlympic2'];
            $svOlympic3 = $diemSVItem['svOlympic3'];
            $svOlympic4 = $diemSVItem['svOlympic4'];
            $svNoRegulation = $diemSVItem['svNoRegulation'];
            $svOnTime = $diemSVItem['svOnTime'];
            $svAbandon = $diemSVItem['svAbandon'];
            $svUnTrueTime = $diemSVItem['svUnTrueTime'];
            $sumOfOne = $svDiemTBHK + $svNCKH1 + $svNCKH2 + $svNCKH3 + $svOlympic1 + $svOlympic2 + $svOlympic3 + $svOlympic4 + $svNoRegulation + $svOnTime + $svAbandon + $svUnTrueTime;
            if($sumOfOne < 0){
                $sumOfOne = 0;
            }
            // Các đầu điểm của mục 2
            $svRightRule = $diemSVItem['svRightRule'];
            $svCitizen = $diemSVItem['svCitizen'];
            $svNoFullStudy = $diemSVItem['svNoFullStudy'];
            $svNoCard = $diemSVItem['svNoCard'];
            $svNoAtivities = $diemSVItem['svNoAtivities'];
            $svNoPayFee = $diemSVItem['svNoPayFee'];
            $sumOfTwo = $svRightRule + $svCitizen + $svNoFullStudy + $svNoAtivities + $svNoPayFee + $svNoCard;
            if($sumOfTwo < 0){
                $sumOfTwo = 0;
            }
            // Các đầu điểm mục 3
            $svFullActive = $diemSVItem['svFullActive'];
            $svAchievementSchool = $diemSVItem['svAchievementSchool'];
            $svAchievementCity = $diemSVItem['svAchievementCity'];
            $svAdvise = $diemSVItem['svAdvise'];
            $svIrresponsible = $diemSVItem['svIrresponsible'];
            $svNoCultural = $diemSVItem['svNoCultural'];
            $sumOfThree = $svFullActive + $svAchievementCity + $svAchievementSchool + $svAdvise + $svIrresponsible + $svNoCultural;
            if($sumOfThree < 0){
                $sumOfThree = 0;
            }

            // Các đầu điểm mục 4
            $svPositiveStudy = $diemSVItem['svPositiveStudy'];
            $svPositiveLove = $diemSVItem['svPositiveLove'];
            $svWarn = $diemSVItem['svWarn'];
            $svNoProtect = $diemSVItem['svNoProtect'];
            $sumOfFour = $svPositiveLove + $svPositiveStudy + $svWarn + $svNoProtect;
            if($sumOfFour < 0){
                $sumOfFour = 0;
            }
            // Các đầu điểm mục 5
            $svMonitor = $diemSVItem['svMonitor'];
            $svBonus = $diemSVItem['svBonus'];
            $svIrresponsibleMonitor = $diemSVItem['svIrresponsibleMonitor'];
            $sumOfFive = $svMonitor + $svBonus + $svIrresponsibleMonitor;
            if($sumOfFive < 0){
                $sumOfFive = 0;
            }

            $sum = $sumOfOne + $sumOfTwo + $sumOfThree + $sumOfFour + $sumOfFive;

        }
        // Lấy điểm ở bảng lớp trưởng
            $ltDiemTBHK = $ltCitizen = $ltMonitor = $ltNCKH1 = $ltNCKH2 = $ltNCKH3 
            = $ltOlympic1 = $ltOlympic2 = $ltOlympic3 = $ltOlympic4 = $ltNoRegulation 
            = $ltOnTime = $ltAbandon = $ltUnTrueTime = $ltNoFullStudy = $ltNoCard 
            =  $ltNoAtivities = $ltNoPayFee = $ltFullActive = $ltAchievementCity 
            = $ltAchievementSchool = $ltAdvise = $ltIrresponsible = $ltNoCultural 
            = $ltPositiveStudy = $ltPositiveLove = $ltWarn = $ltNoProtect = $ltBonus 
            = $ltIrresponsibleMonitor = $ltRightRule = $sumLT = 0;
        
            $sqlDiemLt = "select * from point_monitor where maSv = '$maSv' and maHK = '$maHK'";
            $diemLT = $connect->query($sqlDiemLt);

            if($diemLT->num_rows > 0){
                $diemLTItem = $diemLT->fetch_assoc();
                $check = 2;
                $checkOne = 1;
                // Các đầu điểm của mục 1
                $ltDiemTBHK = $diemLTItem['ltDiemTBHK'];
                $ltNCKH1 = $diemLTItem['ltNCKH1'];
                $ltNCKH2 = $diemLTItem['ltNCKH2'];
                $ltNCKH3 = $diemLTItem['ltNCKH3'];
                $ltOlympic1 = $diemLTItem['ltOlympic1'];
                $ltOlympic2 = $diemLTItem['ltOlympic2'];
                $ltOlympic3 = $diemLTItem['ltOlympic3'];
                $ltOlympic4 = $diemLTItem['ltOlympic4'];
                $ltNoRegulation = $diemLTItem['ltNoRegulation'];
                $ltOnTime = $diemLTItem['ltOnTime'];
                $ltAbandon = $diemLTItem['ltAbandon'];
                $ltUnTrueTime = $diemLTItem['ltUnTrueTime'];
                $sumOfOneLT = $ltDiemTBHK + $ltNCKH1 + $ltNCKH2 + $ltNCKH3 + $ltOlympic1 + $ltOlympic2 + $ltOlympic3 + $ltOlympic4 + $ltNoRegulation + $ltOnTime + $ltAbandon + $ltUnTrueTime;
                if($sumOfOneLT < 0){
                    $sumOfOneLT = 0;
                }
                // Các đầu điểm của mục 2
                $ltRightRule = $diemLTItem['ltRightRule'];
                $ltCitizen = $diemLTItem['ltCitizen'];
                $ltNoFullStudy = $diemLTItem['ltNoFullStudy'];
                $ltNoCard = $diemLTItem['ltNoCard'];
                $ltNoAtivities = $diemLTItem['ltNoAtivities'];
                $ltNoPayFee = $diemLTItem['ltNoPayFee'];
                $sumOfTwoLT = $ltRightRule + $ltCitizen + $ltNoFullStudy + $ltNoAtivities + $ltNoPayFee + $ltNoCard;
                if($sumOfTwoLT < 0){
                    $sumOfTwoLT = 0;
                }
                // Các đầu điểm mục 3
                $ltFullActive = $diemLTItem['ltFullActive'];
                $ltAchievementSchool = $diemLTItem['ltAchievementSchool'];
                $ltAchievementCity = $diemLTItem['ltAchievementCity'];
                $ltAdvise = $diemLTItem['ltAdvise'];
                $ltIrresponsible = $diemLTItem['ltIrresponsible'];
                $ltNoCultural = $diemLTItem['ltNoCultural'];
                $sumOfThreeLT = $ltFullActive + $ltAchievementCity + $ltAchievementSchool + $ltAdvise + $ltIrresponsible + $ltNoCultural;
                if($sumOfThreeLT < 0){
                    $sumOfThreeLT = 0;
                }

                // Các đầu điểm mục 4
                $ltPositiveStudy = $diemLTItem['ltPositiveStudy'];
                $ltPositiveLove = $diemLTItem['ltPositiveLove'];
                $ltWarn = $diemLTItem['ltWarn'];
                $ltNoProtect = $diemLTItem['ltNoProtect'];
                $sumOfFourLT = $ltPositiveLove + $ltPositiveStudy + $ltWarn + $ltNoProtect;
                if($sumOfFourLT < 0){
                    $sumOfFourLT = 0;
                }
                // Các đầu điểm mục 5
                $ltMonitor = $diemLTItem['ltMonitor'];
                $ltBonus = $diemLTItem['ltBonus'];
                $ltIrresponsibleMonitor = $diemLTItem['ltIrresponsibleMonitor'];
                $sumOfFiveLT = $ltMonitor + $ltBonus + $ltIrresponsibleMonitor;
                if($sumOfFiveLT < 0){
                    $sumOfFiveLT = 0;
                }

                $sumLT = $sumOfOneLT + $sumOfTwoLT + $sumOfThreeLT + $sumOfFourLT + $sumOfFiveLT;
            }
            // Lấy điểm ở bảng điểm giáo viên xét diemgv
            $gvDiemTBHK = $gvCitizen = $gvMonitor = $gvNCKH1 = $gvNCKH2 = $gvNCKH3 
            = $gvOlympic1 = $gvOlympic2 = $gvOlympic3 = $gvOlympic4 = $gvNoRegulation 
            = $gvOnTime = $gvAbandon = $gvUnTrueTime = $gvNoFullStudy = $gvNoCard 
            = $gvNoAtivities = $gvNoPayFee = $gvFullActive = $gvAchievementCity 
            = $gvAchievementSchool = $gvAdvise = $gvIrresponsible = $gvNoCultural 
            = $gvPositiveStudy = $gvPositiveLove = $gvWarn = $gvNoProtect = $gvBonus 
            = $gvIrresponsibleMonitor = $gvRightRule = $sumGV = 0;
        
            $sqlDiemGv = "select * from point_teacher where maSv = '$maSv' and maHK = '$maHK'";
            $diemGV = $connect->query($sqlDiemGv);
            if($diemGV->num_rows > 0){
                $diemGVItem = $diemGV->fetch_assoc();
                $check = 3;
                $checkTwo = 1;
                // Các đầu điểm của mục 1
                $gvDiemTBHK = $diemGVItem['gvDiemTBHK'];
                $gvNCKH1 = $diemGVItem['gvNCKH1'];
                $gvNCKH2 = $diemGVItem['gvNCKH2'];
                $gvNCKH3 = $diemGVItem['gvNCKH3'];
                $gvOlympic1 = $diemGVItem['gvOlympic1'];
                $gvOlympic2 = $diemGVItem['gvOlympic2'];
                $gvOlympic3 = $diemGVItem['gvOlympic3'];
                $gvOlympic4 = $diemGVItem['gvOlympic4'];
                $gvNoRegulation = $diemGVItem['gvNoRegulation'];
                $gvOnTime = $diemGVItem['gvOnTime'];
                $gvAbandon = $diemGVItem['gvAbandon'];
                $gvUnTrueTime = $diemGVItem['gvUnTrueTime'];
                $sumOfOneGV = $gvDiemTBHK + $gvNCKH1 + $gvNCKH2 + $gvNCKH3 + $gvOlympic1 + $gvOlympic2 + $gvOlympic3 + $gvOlympic4 + $gvNoRegulation + $gvOnTime + $gvAbandon + $gvUnTrueTime;
                if($sumOfOneGV < 0){
                    $sumOfOneGV = 0;
                }
                // Các đầu điểm của mục 2
                $gvRightRule = $diemGVItem['gvRightRule'];
                $gvCitizen = $diemGVItem['gvCitizen'];
                $gvNoFullStudy = $diemGVItem['gvNoFullStudy'];
                $gvNoCard = $diemGVItem['gvNoCard'];
                $gvNoAtivities = $diemGVItem['gvNoAtivities'];
                $gvNoPayFee = $diemGVItem['gvNoPayFee'];
                $sumOfTwoGV = $gvRightRule + $gvCitizen + $gvNoFullStudy + $gvNoAtivities + $gvNoPayFee + $gvNoCard;
                if($sumOfTwoGV < 0){
                    $sumOfTwoGV = 0;
                }
                // Các đầu điểm mục 3
                $gvFullActive = $diemGVItem['gvFullActive'];
                $gvAchievementSchool = $diemGVItem['gvAchievementSchool'];
                $gvAchievementCity = $diemGVItem['gvAchievementCity'];
                $gvAdvise = $diemGVItem['gvAdvise'];
                $gvIrresponsible = $diemGVItem['gvIrresponsible'];
                $gvNoCultural = $diemGVItem['gvNoCultural'];
                $sumOfThreeGV = $gvFullActive + $gvAchievementCity + $gvAchievementSchool + $gvAdvise + $gvIrresponsible + $gvNoCultural;
                if($sumOfThreeGV < 0){
                    $sumOfThreeGV = 0;
                }

                // Các đầu điểm mục 4
                $gvPositiveStudy = $diemGVItem['gvPositiveStudy'];
                $gvPositiveLove = $diemGVItem['gvPositiveLove'];
                $gvWarn = $diemGVItem['gvWarn'];
                $gvNoProtect = $diemGVItem['gvNoProtect'];
                $sumOfFourGV = $gvPositiveLove + $gvPositiveStudy + $gvWarn + $gvNoProtect;
                if($sumOfFourGV < 0){
                    $sumOfFourGV = 0;
                }
                // Các đầu điểm mục 5
                $gvMonitor = $diemGVItem['gvMonitor'];
                $gvBonus = $diemGVItem['gvBonus'];
                $gvIrresponsibleMonitor = $diemGVItem['gvIrresponsibleMonitor'];
                $sumOfFiveGV = $gvMonitor + $gvBonus + $gvIrresponsibleMonitor;
                if($sumOfFiveGV < 0){
                    $sumOfFiveGV = 0;
                }

                $sumGV = $sumOfOneGV + $sumOfTwoGV + $sumOfThreeGV + $sumOfFourGV + $sumOfFiveGV;
                
            }
            $gvNote = "";
            $sql = "select * from point where point.maSv = '$maSv' and point.maHK = '$maHK'";
            $sql_run = $connect->query($sql);
            if($sql_run->num_rows > 0){
                $pointItem = $sql_run->fetch_assoc();
                $gvNote = $pointItem['gvNote'];
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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/grid.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../../assets/css/mark.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        
    </style>

</head>
<body>
    <div class="main grid wide">
        <header class="main__header">
            <div class="header">
                <img src="../../assets/img/LOGO_DTDH.png" alt="" class="header__img">
            </div>
        </header>
        <div class="main__body">
            <a href="./index.php"><button type = "submit" class="btn btn-primary mt-1"></i>Trang Chủ</button></a>
            <span class="main__body_checkbox">Duyệt <input type="checkbox" name="" id="checkBox"></span>
            <h4 class="main__body_heading">Chấm Điểm Rèn Luyện Cho <?= $row['name'] ?> (Chức vụ: <?=$role_name?>)</h4>
            <?php
                require_once $path.'table_display_point.php';
            ?>
            <div class="main__body_container">
                <div class="container__header">
                    <div class="container__header-title">
                        <span class="container__header-title-one">
                            <p class="" style="margin-bottom: 0px">BỘ GIÁO DỤC VÀ ĐÀO TẠO</p>
                            <p class="container__header-title-school">TRƯỜNG ĐẠI HỌC MỎ - ĐỊA CHẤT</p>
                        </span>
                        <span class="container__header-title-two">
                            <p class="container__header-title-school">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
                            <p style="font-weight: bold; "><u>Độc lập - Tự do - Hạnh phúc</u></p>
                        </span>
                    </div>
                    <div class="container__header-heading">
                        <h5 style="text-align: center">PHIẾU ĐÁNH GIÁ KẾT QUẢ RÈN LUYỆN CHO SINH VIÊN</h5>
                        <p style="text-align: center; font-style: italic;">(Ban hành kèm theo Quyết định số: 148 /QĐ-MĐC ngày 05 tháng 3 năm 2021)</p>
                    </div>
                    <div class="container__header-info">
                        <div class="row">
                            <div class="col-lg-6">Họ tên: <?= $row['name']?></div>
                            <div class="col-lg-6">Mã số SV: <?=$maSv?></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">Lớp:<?=$row['class_name']?></div>
                            <div class="col-lg-2">Khoá: <?=$row['course_name']?></div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-6">Khoa: <?=$row['department_name']?></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">Học kỳ: <?=$hkItem['semester']?></div>    
                            <div class="col-lg-6">Năm học: <?=$hkItem['year']?></div>
                        </div>
                    </div>
                </div>
                <div class="container__content">
                    <form action="" method="POST">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center; width: 70%; padding: 0px; line-height: 83.5px">Nội dung đánh giá</th>
                                    <th>Điểm do SV tự đánh giá</th>
                                    <th>Điểm do lớp đánh giá</th>
                                    <th>Điểm do hội đồng Khoa đánh giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold">I. <u>Đánh giá về ý thức và kết quả học tập</u></span> <span style="font-style: italic;">(Tính điểm thi lần 1. Tổng điểm: 0 - 30 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Phần cộng điểm</span> (tổng điểm có thể chấm quá 30 khi SV đạt giải NCKH, thi Olimpic cấp Bộ hoặc cấp Quốc gia)</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4">
                                    a). Kết quả học tập:
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Điểm TBCHT ≥ 3,6: ..............................................................……….......(+20đ)
                                    </td>
                                    <td>                                
                                        <input type="radio" name="svDiemTBHK" id="" value="20" <?php echo ($svDiemTBHK == '20') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="radio" name="ltDiemTBHK" id="" value="20" <?php echo ($ltDiemTBHK == '20') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="radio" name="gvDiemTBHK" id="" value="20" 
                                        <?php 
                                            // echo ($gvDiemTBHK == '20') ? "checked" :  "" 
                                            echo ($point_average >= 3.6) ? "checked" :  "" 

                                        ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Điểm TBCHT từ 3,2 đến 3,59: ............................................................(+18)
                                    </td>
                                    <td>                                
                                        <input type="radio" name="svDiemTBHK" id="" value="18" <?php echo ($svDiemTBHK == '18') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="radio" name="ltDiemTBHK" id="" value="18" <?php echo ($ltDiemTBHK == '18') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="radio" name="gvDiemTBHK" id="" value="18" 
                                        <?php 
                                            // echo ($gvDiemTBHK == '18') ? "checked" :  ""
                                            echo ($point_average >= 3.2 && $point_average <= 3.59) ? "checked" :  "" 

                                        ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Điểm TBCHT từ 2,5 đến 3,19: ...........................................................(+16đ)
                                    </td>
                                    <td>                                
                                        <input type="radio" name="svDiemTBHK" id="" value="16" <?php echo ($svDiemTBHK == '16') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="radio" name="ltDiemTBHK" id="" value="16" <?php echo ($ltDiemTBHK == '16') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="radio" name="gvDiemTBHK" id="" value="16" 
                                        <?php 
                                            // echo ($gvDiemTBHK == '16') ? "checked" :  ""
                                            echo ($point_average >= 2.5 && $point_average <= 3.19) ? "checked" :  "" 

                                        ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Điểm TBCHT từ 2,0 đến 2,49: ..........................................................(+12đ)
                                    </td>
                                    <td>                                
                                        <input type="radio" name="svDiemTBHK" id="" value="12" <?php echo ($svDiemTBHK == '12') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="radio" name="ltDiemTBHK" id="" value="12" <?php echo ($ltDiemTBHK == '12') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="radio" name="gvDiemTBHK" id="" value="12" 
                                        <?php 
                                            echo ($point_average >= 2.0 && $point_average <= 2.49) ? "checked" :  "" 
                                            // echo ($gvDiemTBHK == '12') ? "checked" :  "" 
                                        ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Điểm TBCHT từ 1,5 đến 1,99: ..........................................................(+10đ)
                                    </td>
                                    <td>                                
                                        <input type="radio" name="svDiemTBHK" id="" value="10" <?php echo ($svDiemTBHK == '10') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="radio" name="ltDiemTBHK" id="" value="10" <?php echo ($ltDiemTBHK == '10') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="radio" name="gvDiemTBHK" id="" value="10" 
                                        <?php 
                                            // echo ($gvDiemTBHK == '10') ? "checked" :  "" 
                                            echo ($point_average >= 1.5 && $point_average <= 1.99) ? "checked" :  "" 

                                        ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                    - Điểm TBCHT từ 1,0 đến 1,49: ............................................................(+8đ)
                                    </td>
                                    <td>                                
                                        <input type="radio" name="svDiemTBHK" id="" value="8" <?php echo ($svDiemTBHK == '8') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="radio" name="ltDiemTBHK" id="" value="8" <?php echo ($ltDiemTBHK == '8') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="radio" name="gvDiemTBHK" id="" value="8" 
                                        <?php 
                                            // echo ($gvDiemTBHK == '8') ? "checked" :  "" 
                                            echo ($point_average >= 1.0 && $point_average <= 1.49) ? "checked" :  "" 

                                        ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        b). Nghiên cứu khoa học, thi Olympic, Robocon và các cuộc thi khác:
                                        <span>(cộng điểm thưởng theo QĐ số 1171/QĐ-MĐC ngày 12/11/2020 về quản lý KHCN của trường Đại học Mỏ-Địa chất)*</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Đạt giải NCKH cấp Bộ và giải tương đương tối đa………………..….(+8đ)
                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="svNCKH1" id="" value="8" <?php echo ($svNCKH1 == '8') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="svNCKH1" id="" value="<?= $svNCKH1 ?>" min="0" max="8">

                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="ltNCKH1" id="" value="8" <?php echo ($ltNCKH1 == '8') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="ltNCKH1" id="" value="<?= $ltNCKH1 ?>" min="0" max="8">

                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="gvNCKH1" id="" value="8" <?php echo ($gvNCKH1 == '8') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="gvNCKH1" id="" value="<?= $gvNCKH1 ?>" min="0" max="8">

                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Đạt giải NCKH cấp Trường, Tiểu ban chuyên môn tối đa: ………..... (+6đ)
                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="svNCKH2" id="" value="6" <?php echo ($svNCKH2 == '6') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="svNCKH2" id="" value="<?= $svNCKH2 ?>"  min="0" max="6">

                                        
                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="ltNCKH2" id="" value="6" <?php echo ($ltNCKH2 == '6') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="ltNCKH2" id="" value="<?= $ltNCKH2 ?>"  min="0" max="6">

                                        
                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="gvNCKH2" id="" value="6" <?php echo ($gvNCKH2 == '6') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="gvNCKH2" id="" value="<?= $gvNCKH2 ?>"  min="0" max="6">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                    - Đạt giải NCKH khác tối đa: ……....……………..……………...…….(+6đ)
                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="svNCKH3" id="" value="6" <?php echo ($svNCKH3 == '6') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="svNCKH3" id="" value="<?= $svNCKH3 ?>"  min="0" max="6">

                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="ltNCKH3" id="" value="6" <?php echo ($ltNCKH3 == '6') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="ltNCKH3" id="" value="<?= $ltNCKH3 ?>"  min="0" max="6">

                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="gvNCKH3" id="" value="6" <?php echo ($gvNCKH3 == '6') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="gvNCKH3" id="" value="<?= $gvNCKH3 ?>"  min="0" max="6">

                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                    - Đạt giải Olympic cấp Quốc gia tối đa: ………...…………………….(+10đ)
                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="svOlympic1" id="" value="10" <?php echo ($svOlympic1 == '10') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="svOlympic1" id="" value="<?= $svOlympic1 ?>"  min="0" max="10">

                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="ltOlympic1" id="" value="10" <?php echo ($ltOlympic1 == '10') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="ltOlympic1" id="" value="<?= $ltOlympic1 ?>"  min="0" max="10">

                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="gvOlympic1" id="" value="10" <?php echo ($gvOlympic1 == '10') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="gvOlympic1" id="" value="<?= $gvOlympic1 ?>"  min="0" max="10">

                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Tham gia Olympic cấp Quốc gia tối đa: ………...…… ..……….…....(+6đ)
                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="svOlympic2" id="" value="6" <?php echo ($svOlympic2 == '6') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="svOlympic2" id="" value="<?= $svOlympic2 ?>"  min="0" max="6">

                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="ltOlympic2" id="" value="6" <?php echo ($ltOlympic2 == '6') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="ltOlympic2" id="" value="<?= $ltOlympic2 ?>"  min="0" max="6">

                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="gvOlympic2" id="" value="6" <?php echo ($gvOlympic2 == '6') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="gvOlympic2" id="" value="<?= $gvOlympic2 ?>"  min="0" max="6">

                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Đạt giải Olympic cấp Trường tối đa: …........................................................(+5đ)
                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="svOlympic3" id="" value="5" <?php echo ($svOlympic3 == '5') ? "checked" :  "" ?>> -->
                                        <input type="number" name="svOlympic3" id="" value="<?= $svOlympic3 ?>"  min="0" max="5">

                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="ltOlympic3" id="" value="5" <?php echo ($ltOlympic3 == '5') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="ltOlympic3" id="" value="<?= $ltOlympic3 ?>"  min="0" max="5">

                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="gvOlympic3" id="" value="5" <?php echo ($gvOlympic3 == '5') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="gvOlympic3" id="" value="<?= $gvOlympic3 ?>"  min="0" max="5">

                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Tham gia Olympic cấp Trường tối đa: ………...………. …….............(+2đ)
                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="svOlympic4" id="" value="2" <?php echo ($svOlympic4 == '2') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="svOlympic4" id="" value="<?= $svOlympic4 ?>"  min="0" max="2">

                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="ltOlympic4" id="" value="2" <?php echo ($ltOlympic4 == '2') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="ltOlympic4" id="" value="<?= $ltOlympic4 ?>"  min="0" max="2">

                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="gvOlympic4" id="" value="2" <?php echo ($gvOlympic4 == '2') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="gvOlympic4" id="" value="<?= $gvOlympic4 ?>"  min="0" max="2">

                                    </td>
                                </tr>
                                
                                <tr>
                                    <td colspan="4">
                                        c) Việc thực hiện nội quy học tập, quy chế thi, kiểm tra
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Không vi phạm quy chế thi, kiểm tra:………………….………….......(+3đ)
                                    </td>
                                    <td>                                
                                        <input type="checkbox" name="svNoRegulation" id="" value="3" <?php echo ($svNoRegulation == '3') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="checkbox" name="ltNoRegulation" id="" value="3" <?php echo ($ltNoRegulation == '3') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="checkbox" name="gvNoRegulation" id="" value="3" <?php echo ($gvNoRegulation == '3') ? "checked" :  "" ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Đi học đầy đủ, đúng giờ: ………………….......................…………....(+2đ)
                                    </td>
                                    <td>                                
                                        <input type="checkbox" name="svOnTime" id="" value="2" <?php echo ($svOnTime == '2') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="checkbox" name="ltOnTime" id="" value="2" <?php echo ($ltOnTime == '2') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>                                
                                        <input type="checkbox" name="gvOnTime" id="" value="2" <?php echo ($gvOnTime == '2') ? "checked" :  "" ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold; font-style: italic;">2. Phần trừ điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        a). Đã đăng ký, nhưng bỏ không tham tham gia nghiên cứu khoa học, thi Olympic, Robocon và các cuộc thi khác tương đương: ........................ (-15đ)</td>                    
                                    </td>
                                    <td>
                                        <!-- <input type="checkbox" name="svAbandon" id="" value="-15" <?php echo ($svAbandon == '-15') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="svAbandon" id="" value="<?= $svAbandon ?>" min="-15" max="0" >

                                    </td>
                                    <td>
                                        <!-- <input type="checkbox" name="ltAbandon" id="" value="-15" <?php echo ($ltAbandon == '-15') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="ltAbandon" id="" value="<?= $ltAbandon ?>" min="-15" max="0" >

                                    </td>
                                    <td>
                                        <!-- <input type="checkbox" name="gvAbandon" id="" value="-15" <?php echo ($gvAbandon == '-15') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="gvAbandon" id="" value="<?= $gvAbandon ?>" min="-15" max="0" >

                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        b). Không đi học, đi không đúng giờ: .………………...………......(-2đ/buổi)
                                    </td>
                                    <td>
                                        <select name="svUnTrueTime" id="svUnTrueTime">
                                            <?php
                                                for($i = 0; $i <= 5; $i++) {
                                                    if($svUnTrueTime == ($i * (-2))){
                                                        echo '
                                                        <option selected value="'.($i * (-2)).'">'.($i).'</option>           
                                                    ';
                                                    }
                                                    else{
                                                        echo '
                                                            <option value="'.($i * (-2)).'">'.($i).'</option>           
                                                        ';
                                                    }
                                                }
                                            ?>
                                            

                                        </select>
                                        <!-- <input type="checkbox" name="" id="" value="-2">  -->
                                    </td>
                                    <td>
                                        <select name="ltUnTrueTime" id="ltUnTrueTime">
                                            <?php
                                                for($i = 0; $i <= 5; $i++) {
                                                    if($ltUnTrueTime == ($i * (-2))){
                                                        echo '
                                                        <option selected value="'.($i * (-2)).'">'.($i).'</option>           
                                                    ';
                                                    }
                                                    else{
                                                        echo '
                                                            <option value="'.($i * (-2)).'">'.($i).'</option>           
                                                        ';
                                                    }
                                                }
                                            ?>
                                            

                                        </select>
                                        <!-- <input type="checkbox" name="" id="" value="-2">  -->
                                    </td>
                                    <td>
                                        <select name="gvUnTrueTime" id="gvUnTrueTime">
                                            <?php
                                                for($i = 0; $i <= 5; $i++) {
                                                    if($gvUnTrueTime == ($i * (-2))){
                                                        echo '
                                                        <option selected value="'.($i * (-2)).'">'.($i).'</option>           
                                                    ';
                                                    }
                                                    else{
                                                        echo '
                                                            <option value="'.($i * (-2)).'">'.($i).'</option>           
                                                        ';
                                                    }
                                                }
                                            ?>
                                            

                                        </select>
                                        <!-- <input type="checkbox" name="" id="" value="-2">  -->
                                    </td>
                                </tr>

                                <tr>
                                    <td width="70%">
                                        <h5>Cộng mục I</h5>
                                    </td>
                                    <td colspan="4">
                                        <input type="number" class="sum_one sum_item" value="0">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold">II.<u>Đánh giá về ý thức và kết quả chấp hành nội quy, quy chế của Trường</u></span> <span style="font-style: italic;">(Tổng điểm: 0 - 25 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Phần cộng điểm</span></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="70%">a). Chấp hành tốt nội quy, quy chế của Trường, không vi phạm kỷ luật….(+10đ)</td>
                                                            
                                    
                                    <td>
                                        <input type="checkbox" name="svRightRule" id="" value="10" <?php echo ($svRightRule == '10') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="ltRightRule" id="" value="10" <?php echo ($ltRightRule == '10') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="gvRightRule" id="" value="10" <?php echo ($gvRightRule == '10') ? "checked" :  "" ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        b). Kết quả học tập Tuần sinh hoạt công dân sinh viên
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        Điểm lần 1 ≥ 90:………………...........................................................(+15đ)
                                    </td>
                                    <td>
                                        <input type="radio" name="svCitizen" id="" value="15" <?php echo ($svCitizen == '15') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="radio" name="ltCitizen" id="" value="15" <?php echo ($ltCitizen == '15') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="radio" name="gvCitizen" id="" value="15" 
                                        <?php 
                                            // echo ($gvCitizen == '15') ? "checked" :  "" 
                                            echo ($point_citizen >= 90) ? "checked" :  "" 

                                        ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        Điểm lần 1 từ 65 đến 89 điểm:…...................................................(+10đ)
                                    </td>
                                    <td>
                                        <input type="radio" name="svCitizen" id="" value="10" <?php echo ($svCitizen == '10') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="radio" name="ltCitizen" id="" value="10" <?php echo ($ltCitizen == '10') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="radio" name="gvCitizen" id="" value="10" 
                                        <?php 
                                            // echo ($gvCitizen == '10') ? "checked" :  "" 
                                            echo ($point_citizen >= 65 && $point_citizen <= 89) ? "checked" :  "" 

                                        ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        Điểm lần 1 từ 50 đến 65 điểm:….....................................................(+5đ)
                                    </td>
                                    <td>
                                        <input type="radio" name="svCitizen" id="" value="5" <?php echo ($svCitizen == '5') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="radio" name="ltCitizen" id="" value="5" <?php echo ($ltCitizen == '5') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="radio" name="gvCitizen" id="" value="5" 
                                        <?php 
                                            // echo ($gvCitizen == '5') ? "checked" :  ""
                                            echo ($point_citizen >= 50 && $point_citizen <= 65) ? "checked" :  "" 

                                        ?>> 
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold; font-style: italic;">2. Phần trừ điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">a). Không tham gia học tập đầy đủ, nghiêm túc nghị quyết, nội quy, quy chế, tuần sinh hoạt công dân sinh viên:..…....................................................(-10đ)</td>     
                                    <td>
                                        <input type="checkbox" name="svNoFullStudy" id="" value="-10" <?php echo ($svNoFullStudy == '-10') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="ltNoFullStudy" id="" value="-10" <?php echo ($ltNoFullStudy == '-10') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="gvNoFullStudy" id="" value="-10" <?php echo ($gvNoFullStudy == '-10') ? "checked" :  "" ?>> 
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td width="70%">
                                        b). Không đeo thẻ sinh viên trong khuôn viên Trường:..............…....(-5đ/lần)
                                    </td>
                                    <td>
                                        <select name="svNoCard" id="svNoCard">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($svNoCard == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select>
                                        <!-- <input type="text" name="" id="" value="">  -->
                                    </td>
                                    <td>
                                        <select name="ltNoCard" id="ltNoCard">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($ltNoCard == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select>
                                        <!-- <input type="text" name="" id="" value="">  -->
                                    </td>
                                    <td>
                                        <select name="gvNoCard" id="gvNoCard">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($gvNoCard == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select>
                                        <!-- <input type="text" name="" id="" value="">  -->
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        c). Không tham gia các buổi sinh hoạt lớp, họp, hội nghị, giao ban, tập huấn và các hoạt động khác khi Nhà trường yêu cầu:..................................(-5đ/lần)
                                    </td>
                                    <td>
                                        <select name="svNoAtivities" id="svNoAtivities">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($svNoAtivities == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select>    
                                        <!-- <input type="text" name="" id="" value="">  -->
                                    </td>
                                    <td>
                                        <select name="ltNoAtivities" id="ltNoAtivities">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($ltNoAtivities == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select>    
                                        <!-- <input type="text" name="" id="" value="">  -->
                                    </td>
                                    <td>
                                        <select name="gvNoAtivities" id="gvNoAtivities">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($gvNoAtivities == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select>    
                                        <!-- <input type="text" name="" id="" value="">  -->
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        d). Đóng học phí không đúng quy định trong học kỳ:….........................(-10đ)
                                    </td>
                                    <td>
                                        <input type="checkbox" name="svNoPayFee" id="" value="-10" <?php echo ($svNoPayFee == '-10') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="ltNoPayFee" id="" value="-10" <?php echo ($ltNoPayFee == '-10') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="gvNoPayFee" id="" value="-10" <?php echo ($gvNoPayFee == '-10') ? "checked" :  "" ?>> 
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td width="70%">
                                        <h5>Cộng mục II</h5>
                                    </td>
                                    <td colspan="3">
                                        <input type="number" name="" id="" class="sum_two sum_item" value="">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold">III.<u> Đánh giá về ý thức và kết quả tham gia các hoạt động chính trị, xã hội, văn hoá, văn nghệ, thể thao, phòng chống các tệ nạn xã hội</u></span> <span style="font-style: italic;">(Tổng điểm: 0 - 20 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Phần cộng điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        a). Tham gia đầy đủ các hoạt động, sinh hoạt do Trường, Khoa, Lớp, Đoàn TN, Hội SV tổ chức:......................................................................…….(+13đ)
                                    </td>                      
                                    <td>
                                        <input type="checkbox" name="svFullActive" id="" value="13" <?php echo ($svFullActive == '13') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="ltFullActive" id="" value="13" <?php echo ($ltFullActive == '13') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="gvFullActive" id="" value="13" <?php echo ($gvFullActive == '13') ? "checked" :  "" ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        b). Có thành tích hoạt động chính trị, xã hội, văn hoá, văn nghệ, thể thao, đoàn thể và đấu tranh phòng chống các tệ nạn xã hội được tuyên dương, khen thưởng (lấy mức khen thưởng cao nhất):
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Cấp Trường: ……………………….……………….……………...… (+3đ)
                                    </td>
                                    <td>
                                        <!-- <input type="checkbox" name="svAchievementSchool" id="" value="3" <?php echo ($svAchievementSchool == '3') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="svAchievementSchool" id="" value="<?= $svAchievementSchool ?>" min="0" max="3">

                                    </td>
                                    <td>
                                        <!-- <input type="checkbox" name="ltAchievementSchool" id="" value="3" <?php echo ($ltAchievementSchool == '3') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="ltAchievementSchool" id="" value="<?= $ltAchievementSchool ?>" min="0" max="3">

                                    </td>
                                    <td>
                                        <!-- <input type="checkbox" name="gvAchievementSchool" id="" value="3" <?php echo ($gvAchievementSchool == '3') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="gvAchievementSchool" id="" value="<?= $gvAchievementSchool ?>" min="0" max="3">

                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Cấp tỉnh, thành phố trở lên:……...……...………………..................... (+5đ)
                                    </td>
                                    <td>
                                        <!-- <input type="checkbox" name="svAchievementCity" id="" value="5" <?php echo ($svAchievementCity == '5') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="svAchievementCity" id="" value="<?= $svAchievementCity ?>" min="0" max="5">

                                    </td>
                                    <td>
                                        <!-- <input type="checkbox" name="ltAchievementCity" id="" value="5" <?php echo ($ltAchievementCity == '5') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="ltAchievementCity" id="" value="<?= $ltAchievementCity ?>" min="0" max="5">

                                    </td>
                                    <td>
                                        <!-- <input type="checkbox" name="gvAchievementCity" id="" value="5" <?php echo ($gvAchievementCity == '5') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="gvAchievementCity" id="" value="<?= $gvAchievementCity ?>" min="0" max="5">

                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        c). Tham gia các hoạt động tư vấn tuyển sinh (có xác nhận của phòng QHCC&DN):…………………………………………( +2đ/lần)
                                    </td>
                                    <td>                                    
                                        <select name="svAdvise" id="svAdvise">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($svAdvise == ($i * (2))){
                                                            echo '
                                                            <option selected value="'.($i * (2)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (2)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select>                                        
                                    </td>
                                    <td>                                    
                                        <select name="ltAdvise" id="ltAdvise">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($ltAdvise == ($i * (2))){
                                                            echo '
                                                            <option selected value="'.($i * (2)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (2)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select>                                        
                                    </td>
                                    <td>                                    
                                        <select name="gvAdvise" id="gvAdvise">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($gvAdvise == ($i * (2))){
                                                            echo '
                                                            <option selected value="'.($i * (2)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (2)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select>                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold; font-style: italic;">2. Phần trừ điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">- Không tham gia hoạt động, sinh hoạt khi được phân công: ……….(-5đ/lần)</td>     
                                    <td>
                                        <select name="svIrresponsible" id="svIrresponsible">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($svIrresponsible == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select>  
                                        <!-- <input type="text" name="" id="" value="">  -->
                                    </td>
                                    <td>
                                        <select name="ltIrresponsible" id="ltIrresponsible">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($ltIrresponsible == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select>  
                                        <!-- <input type="text" name="" id="" value="">  -->
                                    </td>
                                    <td>
                                        <select name="gvIrresponsible" id="gvIrresponsible">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($gvIrresponsible == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select>  
                                        <!-- <input type="text" name="" id="" value="">  -->
                                    </td>
                                </tr>         
                                <tr>
                                    <td width="70%">
                                        - Vi phạm Quy định về văn hoá học đường cho sinh viên:.................(-5đ/lần)
                                    </td>
                                    <td>
                                        <select name="svNoCultural" id="svNoCultural">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($svNoCultural == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select> 
                                        <!-- <input type="text" name="" id="" value="">  -->
                                    </td>
                                    <td>
                                        <select name="ltNoCultural" id="ltNoCultural">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($ltNoCultural == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select> 
                                        <!-- <input type="text" name="" id="" value="">  -->
                                    </td>
                                    <td>
                                        <select name="gvNoCultural" id="gvNoCultural">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($gvNoCultural == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select> 
                                        <!-- <input type="text" name="" id="" value="">  -->
                                    </td>
                                </tr>

                                <tr>
                                    <td width="70%">
                                        <h5>Cộng mục III</h5>
                                    </td>
                                    <td colspan="4">
                                        <input type="number" class="sum_three sum_item" value=0>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold">IV.<u> Đánh giá về phẩm chất công dân và quan hệ công đồng </u></span> <span style="font-style: italic;">(Tổng điểm: 0 - 15 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Phần cộng điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                    a). Tích cực tham gia học tập, tìm hiểu và chấp hành tốt chủ trương của Đảng, chính sách, pháp luật của Nhà nước:….........................................(+10đ)
                                    </td>                      
                                    <td>
                                        <input type="checkbox" name="svPositiveStudy" id="" value="10" <?php echo ($svPositiveStudy == '10') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="ltPositiveStudy" id="" value="10" <?php echo ($ltPositiveStudy == '10') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="gvPositiveStudy" id="" value="10" <?php echo ($gvPositiveStudy == '10') ? "checked" :  "" ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    b). Tích cực tham gia các hoạt động nhân đạo, từ thiện vì cộng đồng; phong trào thanh niên tình nguyện; phong trào giúp đỡ nhân dân và bạn bè khi gặp thiên tai, khó khăn, hoạn nạn:...................................................................(+5đ)
                                    </td>
                                    <td>
                                        <input type="checkbox" name="svPositiveLove" id="" value="5" <?php echo ($svPositiveLove == '5') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="ltPositiveLove" id="" value="5" <?php echo ($ltPositiveLove == '5') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="gvPositiveLove" id="" value="5" <?php echo ($gvPositiveLove == '5') ? "checked" :  "" ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold; font-style: italic;">2. Phần trừ điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">- Gây mất đoàn kết trong tập thể lớp:........................................................(-5đ)</td>     
                                    <td>
                                        <input type="checkbox" name="svWarn" id="" value="-5" <?php echo ($svWarn == '-5') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="ltWarn" id="" value="-5" <?php echo ($ltWarn == '-5') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="gvWarn" id="" value="-5" <?php echo ($gvWarn == '-5') ? "checked" :  "" ?>> 
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td width="70%">
                                        - Không đóng BHYT đúng hạn: .............................................................(-20đ)
                                    </td>
                                    <td>
                                        <input type="checkbox" name="svNoProtect" id="" value="-20" <?php echo ($svNoProtect == '-20') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="ltNoProtect" id="" value="-20" <?php echo ($ltNoProtect == '-20') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="gvNoProtect" id="" value="-20" <?php echo ($gvNoProtect == '-20') ? "checked" :  "" ?>> 
                                    </td>
                                </tr>

                                <tr>
                                    <td width="70%">
                                        <h5>Cộng mục IV</h5>
                                    </td>
                                    <td colspan="4">
                                        <input type="number" class="sum_four sum_item" value="0">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold">V.<u>Đánh giá về ý thức và kết quả tham gia phụ trách lớp, các đoàn thể tổ chức khác trong Trường</u></span> <span style="font-style: italic;">(Tổng điểm: 0 - 10 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Phần cộng điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">a). Là thành viên Ban cán sự lớp quản lý sinh viên, cán bộ Đoàn TN, Hội SV hoàn thành nhiệm vụ:</td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Lớp trưởng, Phó Bí thư Liên chi, Bí thư Chi đoàn:…..…….................(+7đ)
                                    </td>                      
                                    <td>
                                        <input type="radio" name="svMonitor" id="" value="7" <?php echo ($svMonitor == '7') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="radio" name="ltMonitor" id="" value="7" <?php echo ($ltMonitor == '7') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="radio" name="gvMonitor" id="" value="7" 
                                        <?php 
                                        // echo ($gvMonitor == '7') ? "checked" :  "" 
                                        echo (in_array($role_name, $arr_level_one)) ? "checked" : "" ; 

                                        ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                    - Lớp phó, Phó Bí thư Chi đoàn, Hội trưởng Hội SV:........…………......(+5đ)
                                    </td>                      
                                    <td>
                                        <input type="radio" name="svMonitor" id="" value="5" <?php echo ($svMonitor == '5') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="radio" name="ltMonitor" id="" value="5" <?php echo ($ltMonitor == '5') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="radio" name="gvMonitor" id="" value="5" 
                                        <?php
                                        //  echo ($gvMonitor == '5') ? "checked" :  "" 
                                        echo (in_array($role_name, $arr_level_two)) ? "checked" : "" ; 

                                        ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    b). Được các cấp khen thưởng: ....….................….................………......(+3đ)
                                    </td>
                                    <td>
                                        <input type="checkbox" name="svBonus" id="" value="3" <?php echo ($svBonus == '3') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="ltBonus" id="" value="3" <?php echo ($ltBonus == '3') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="gvBonus" id="" value="3" <?php echo ($gvBonus == '3') ? "checked" :  "" ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p><span style="font-weight: bold; font-style: italic;">2. Phần trừ điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">- Là thành viên Ban cán sự lớp quản lý sinh viên, lớp học phần; cán bộ Đoàn TN, Hội SV thiếu trách nhiệm với tập thể lớp:...................................(-5đ/lần)</td>     
                                    <td>
                                        <select name="svIrresponsibleMonitor" id="svIrresponsibleMonitor">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($svIrresponsibleMonitor == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select> 
                               
                                    </td>
                                    <td>
                                        <select name="ltIrresponsibleMonitor" id="ltIrresponsibleMonitor">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($ltIrresponsibleMonitor == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select> 
                               
                                    </td>
                                    <td>
                                        <select name="gvIrresponsibleMonitor" id="gvIrresponsibleMonitor">
                                                <?php
                                                    for($i = 0; $i <= 5; $i++) {
                                                        if($gvIrresponsibleMonitor == ($i * (-5))){
                                                            echo '
                                                            <option selected value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        else{
                                                            echo '
                                                            <option value="'.($i * (-5)).'">'.($i).'</option>           
                                                        ';
                                                        }
                                                        
                                                    }
                                                ?>
                                        </select> 
                               
                                    </td>
                                </tr>

                                <tr>
                                    <td width="70%">
                                        <h5>Cộng mục V</h5>
                                    </td>
                                    <td colspan="4">
                                        <input type="number" class="sum_five sum_item" value="0">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4"><h5>Ghi chú</h5></td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        
                                        <textarea name="gvNote" id="gvNote" cols="" rows="" style="width: 100%"><?php echo $gvNote ?></textarea>
                                    </td>
                                </tr>
                                

                                <tr class="sum_all">
                                    <td>
                                        <h5 style="color: red; width: 70px;">Tổng: </h5>
                                    </td>
                                    <td>
                                        <input type="number" class="sum_mark-student" value="0">
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                        
                        <button type="submit" class="btn btn-success btn_save">Lưu</button>
                    </form>
                    <?php
                        require_once $path.'display_sum_point_student.php';
                    ?>
                    <?php
                        if(isset($_POST['gvNCKH1'])){
                            $gvDiemTBHK = $_POST['gvDiemTBHK'] ?? 0;
                            
                            $gvCitizen  = $_POST['gvCitizen'] ?? 0;
                            
                            $gvMonitor  = $_POST['gvMonitor'] ?? 0;
                            
                            // $gvNCKH1  = $_POST['gvNCKH1'] ?? 0;
                            $gvNCKH1 = (!empty($_POST['gvNCKH1'])) ? $_POST['gvNCKH1'] : 0;
                            
                            // $gvNCKH2  = $_POST['gvNCKH2'] ?? 0;
                            $gvNCKH2 = (!empty($_POST['gvNCKH2'])) ? $_POST['gvNCKH2'] : 0;
                            
                            // $gvNCKH3  = $_POST['gvNCKH3'] ?? 0;
                            $gvNCKH3 = (!empty($_POST['gvNCKH3'])) ? $_POST['gvNCKH3'] : 0;
                            
                            // $gvOlympic1  = $_POST['gvOlympic1'] ?? 0;
                            $gvOlympic1 = (!empty($_POST['gvOlympic1'])) ? $_POST['gvOlympic1'] : 0;
                            
                            // $gvOlympic2  = $_POST['gvOlympic2'] ?? 0;
                            $gvOlympic2 = (!empty($_POST['gvOlympic2'])) ? $_POST['gvOlympic2'] : 0;
                            
                            // $gvOlympic3 = $_POST['gvOlympic3'] ?? 0;
                            $gvOlympic3 = (!empty($_POST['gvOlympic3'])) ? $_POST['gvOlympic3'] : 0;
                            
                            // $gvOlympic4 = $_POST['gvOlympic4'] ?? 0;
                            $gvOlympic4 = (!empty($_POST['gvOlympic4'])) ? $_POST['gvOlympic4'] : 0;
                            
                            $gvNoRegulation = $_POST['gvNoRegulation'] ?? 0;
                            
                            $gvOnTime = $_POST['gvOnTime'] ?? 0;
                            
                            // $gvAbandon = $_POST['gvAbandon'] ?? 0;
                            $gvAbandon = (!empty($_POST['gvAbandon'])) ? $_POST['gvAbandon'] : 0;

                            
                            $gvUnTrueTime = $_POST['gvUnTrueTime'] ?? 0;
                            
                            $gvNoFullStudy = $_POST['gvNoFullStudy'] ?? 0;
                            
                            $gvNoCard = $_POST['gvNoCard'] ?? 0;
                            
                            $gvNoAtivities = $_POST['gvNoAtivities'] ?? 0;
                            
                            $gvNoPayFee  = $_POST['gvNoPayFee'] ?? 0;
                            
                            $gvFullActive  = $_POST['gvFullActive'] ?? 0;
                            
                            // $gvAchievementCity = $_POST['gvAchievementCity'] ?? 0;
                            $gvAchievementCity = (!empty($_POST['gvAchievementCity'])) ? $_POST['gvAchievementCity'] : 0;

                            
                            // $gvAchievementSchool = $_POST['gvAchievementSchool'] ?? 0;
                            $gvAchievementSchool = (!empty($_POST['gvAchievementSchool'])) ? $_POST['gvAchievementSchool'] : 0;

                            
                            $gvAdvise  = $_POST['gvAdvise'] ?? 0;
                            
                            $gvIrresponsible  = $_POST['gvIrresponsible'] ?? 0;
                            
                            $gvNoCultural = $_POST['gvNoCultural'] ?? 0;
                            
                            $gvPositiveStudy = $_POST['gvPositiveStudy'] ?? 0;
                            
                            $gvPositiveLove  = $_POST['gvPositiveLove'] ?? 0;
                            
                            $gvWarn  = $_POST['gvWarn'] ?? 0;
                            
                            $gvNoProtect = $_POST['gvNoProtect'] ?? 0;
                            
                            $gvBonus = $_POST['gvBonus'] ?? 0;
                            
                            $gvIrresponsibleMonitor  = $_POST['gvIrresponsibleMonitor'] ?? 0;
                            
                            $gvRightRule = $_POST['gvRightRule'] ?? 0;

                            $gvNote = $_POST['gvNote'] ?? '';

                            $sumMarkGV = $gvDiemTBHK + $gvCitizen + $gvMonitor + $gvNCKH1 + $gvNCKH2 + $gvNCKH3 + $gvOlympic1 + 
                                        $gvOlympic2 + $gvOlympic3 + $gvOlympic4 + $gvNoRegulation + $gvOnTime + $gvAbandon + $gvUnTrueTime +
                                        $gvNoFullStudy + $gvNoCard + $gvNoAtivities + $gvNoPayFee + $gvFullActive + $gvAchievementCity + 
                                        $gvAchievementSchool + $gvAdvise + $gvIrresponsible + $gvNoCultural + $gvPositiveLove + $gvPositiveStudy +
                                        $gvWarn + $gvNoProtect + $gvBonus + $gvIrresponsibleMonitor + $gvRightRule; 
                            
                            $sql = "select * from point_teacher where maSv = '$maSv' and maHK = '$maHK'";
                            $result = $connect->query($sql);
                            // update
                            if($result->num_rows > 0){
                                $sql = "update point_teacher
                                        set 
                                        gvDiemTBHK = '$gvDiemTBHK', 
                                        gvNCKH1  = '$gvNCKH1', 
                                        gvNCKH2 = '$gvNCKH2', 
                                        gvNCKH3 = '$gvNCKH3', 
                                        gvOlympic1 = '$gvOlympic1', 
                                        gvOlympic2 = '$gvOlympic2',
                                        gvOlympic3 = '$gvOlympic3', 
                                        gvOlympic4 = '$gvOlympic4', 
                                        gvNoRegulation = '$gvNoRegulation', 
                                        gvOnTime = '$gvOnTime', 
                                        gvAbandon = '$gvAbandon', 
                                        gvUnTrueTime = '$gvUnTrueTime',
                                        gvRightRule = '$gvRightRule', 
                                        gvCitizen = '$gvCitizen', 
                                        gvNoFullStudy = '$gvNoFullStudy', 
                                        gvNoCard = '$gvNoCard', 
                                        gvNoAtivities = '$gvNoAtivities', 
                                        gvNoPayFee = '$gvNoPayFee',
                                        gvFullActive = '$gvFullActive', 
                                        gvAchievementSchool = '$gvAchievementSchool', 
                                        gvAchievementCity = '$gvAchievementCity', 
                                        gvAdvise = '$gvAdvise', 
                                        gvIrresponsible = '$gvIrresponsible',
                                        gvNoCultural = '$gvNoCultural', 
                                        gvPositiveStudy = '$gvPositiveStudy', 
                                        gvPositiveLove = '$gvPositiveLove', 
                                        gvWarn = '$gvWarn', 
                                        gvNoProtect = '$gvNoProtect', 
                                        gvMonitor = '$gvMonitor',
                                        gvBonus = '$gvBonus', 
                                        gvIrresponsibleMonitor = '$gvIrresponsibleMonitor'
                                        where 
                                        maSv = '$maSv' and maHK = '$maHK'";

                                $update_point_teacher = "update point 
                                                         set 
                                                         point_teacher = '$sumMarkGV', 
                                                         gvNote = '$gvNote',
                                                         status_teacher = 1 
                                                         where 
                                                         maSv = '$maSv' and maHK = '$maHK'";
                                if($connect->query($sql) && $connect->query($update_point_teacher)){
                                    header('Location: ./index.php');
                                }
                                else{
                                    echo $connect->error;
                                    echo '<br>'.$sql;
                                }
                            }
                            // insert
                            else{
                                $sql = "INSERT INTO `point_teacher` 
                                (`maSv`, 
                                `gvDiemTBHK`, 
                                `gvCitizen`, 
                                `gvMonitor`, 
                                `gvNCKH1`, 
                                `gvNCKH2`, 
                                `gvNCKH3`, 
                                `gvOlympic1`, 
                                `gvOlympic2`, 
                                `gvOlympic3`, 
                                `gvOlympic4`, 
                                `gvNoRegulation`, 
                                `gvOnTime`, 
                                `gvAbandon`, 
                                `gvUnTrueTime`, 
                                `gvNoFullStudy`, 
                                `gvNoCard`, 
                                `gvNoAtivities`, 
                                `gvNoPayFee`, 
                                `gvFullActive`, 
                                `gvAchievementSchool`, 
                                `gvAchievementCity`, 
                                `gvAdvise`, 
                                `gvIrresponsible`, 
                                `gvNoCultural`, 
                                `gvPositiveStudy`, 
                                `gvPositiveLove`, 
                                `gvWarn`, 
                                `gvNoProtect`, 
                                `gvBonus`, 
                                `gvIrresponsibleMonitor`, 
                                `maHK`, 
                                `gvRightRule`
                                )
                                VALUES 
                                ('$maSv', 
                                '$gvDiemTBHK', 
                                '$gvCitizen', 
                                '$gvMonitor', 
                                '$gvNCKH1', 
                                '$gvNCKH2', 
                                '$gvNCKH3', 
                                '$gvOlympic1', 
                                '$gvOlympic2', 
                                '$gvOlympic3', 
                                '$gvOlympic4', 
                                '$gvNoRegulation', 
                                '$gvOnTime', 
                                '$gvAbandon', 
                                '$gvUnTrueTime', 
                                '$gvNoFullStudy', 
                                '$gvNoCard', 
                                '$gvNoAtivities', 
                                '$gvNoPayFee', 
                                '$gvFullActive', 
                                '$gvAchievementSchool', 
                                '$gvAchievementCity', 
                                '$gvAdvise', 
                                '$gvIrresponsible', 
                                '$gvNoCultural', 
                                '$gvPositiveStudy', 
                                '$gvPositiveLove', 
                                '$gvWarn', 
                                '$gvNoProtect', 
                                '$gvBonus', 
                                '$gvIrresponsibleMonitor', 
                                '$maHK', 
                                '$gvRightRule')
                                ";

                                $update_point_teacher = "update point 
                                                         set 
                                                         point_teacher = '$sumMarkGV', 
                                                         gvNote = '$gvNote',
                                                         status_teacher = 1 
                                                         where 
                                                         maSv = '$maSv' and maHK = '$maHK'";
                                
                                if($connect->query($sql) && $connect->query($update_point_teacher)){
                                    header('Location: ./index.php');
                                }    
                                else{
                                    echo $connect->error;
                                    echo '<br>'.$sql;
                                }
                        }
                        }
                    ?>
                </div>
            </div>
        </div>
       
    </div>
        <!-- <script src="../../assets/js/teacherCheckPoint.js"></script> -->
        <script src="../../assets/js/checkbox_teacher.js"></script>
        <script src="../../assets/js/browser_teacher_mark.js"></script>

        <!-- <script src="../../assets/js/test2.js"></script> -->

        
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
    <?php
        ob_end_flush();
    ?>
</body>
</html>