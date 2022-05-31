<?php
    ob_start();
    session_start();
    require_once('../db/dbhelper.php');
    $path = '../';
    if(isset($_SESSION['user'])){
        $svDiemTBHK = $svCitizen = $svMonitor = $svNCKH1 = $svNCKH2 = $svNCKH3 = $svOlympic1 = $svOlympic2 = $svOlympic3 = $svOlympic4 
        = $svNoRegulation = $svOnTime = $svAbandon = $svUnTrueTime = $svNoFullStudy = $svNoCard =  $svNoAtivities = $svNoPayFee 
        = $svFullActive = $svAchievementCity = $svAchievementSchool = $svAdvise = $svIrresponsible = $svNoCultural 
        = $svPositiveStudy = $svPositiveLove = $svWarn = $svNoProtect = $svBonus = $svIrresponsibleMonitor 
        = $svRightRule = $sum = $check = 0;
        $ltMonitor = '';
        if(isset($_GET['maSv'])){
            $maSv = $_GET['maSv'];
        }

        $maHK = $_SESSION['maHK'];

        $sql_proof_status = 0;
        $sql_proof = "select * from student_proof_mark where maSv = '$maSv' and maHK = '$maHK'";
        $sql_proof_run = $connect->query($sql_proof);
        if($sql_proof_run-> num_rows > 0){
            $sql_proof_status = 1;
        }

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
        }

        require_once $path.'get_point_to_brower.php';

        // echo $row['role_name'];
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
            $ltDiemTBHK = $ltCitizen  = $ltNCKH1 = $ltNCKH2 = $ltNCKH3 = $ltOlympic1 = $ltOlympic2 = $ltOlympic3 = $ltOlympic4 = $ltNoRegulation = $ltOnTime = $ltAbandon = $ltUnTrueTime = $ltNoFullStudy = $ltNoCard =  $ltNoAtivities = $ltNoPayFee = $ltFullActive = $ltAchievementCity = $ltAchievementSchool = $ltAdvise = $ltIrresponsible = 
            $ltNoCultural = $ltPositiveStudy = $ltPositiveLove = $ltWarn = $ltNoProtect = $ltBonus = $ltIrresponsibleMonitor = $ltRightRule = $sumLT = 0;
        
            $sqlDiemLt = "select * from point_monitor where maSv = '$maSv' and maHk = '$maHK'";
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
        $ltNote = '';
        $sql = "select * from point where point.maSv = '$maSv' and point.maHK = '$maHK'";
        $sql_run = $connect->query($sql);
        if($sql_run->num_rows > 0){
            $pointItem = $sql_run->fetch_assoc();
            $ltNote = $pointItem['ltNote'];
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browser Point Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/mark.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>
    <div class="main grid wide">

        <header class="main__header">
            <div class="header">
                <img src="../assets/img/LOGO_DTDH.png" alt="" class="header__img">
            </div>
        </header>

        <div class="main__body">
            <a href="./index.php" class="btn btn-primary mt-3">Trang Chủ</a>
            
           
            <span class="main__body_checkbox">Duyệt <input type="checkbox" name="" id="checkBox" class="btn_checkbox"></span>

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
                    <form action="" method="post">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center; width: 80%; padding: 0px; line-height: 83.5px">Nội dung đánh giá</th>
                                    <th>Điểm do SV tự đánh giá</th>
                                    <th>Điểm do lớp đánh giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3">
                                        <p><span style="font-weight: bold">I. <u>Đánh giá về ý thức và kết quả học tập</u></span> <span style="font-style: italic;">(Tính điểm thi lần 1. Tổng điểm: 0 - 30 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Phần cộng điểm</span> (tổng điểm có thể chấm quá 30 khi SV đạt giải NCKH, thi Olimpic cấp Bộ hoặc cấp Quốc gia)</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
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
                                        <input type="radio" name="ltDiemTBHK" id="" value="20" 
                                        <?php 
                                        // echo ($ltDiemTBHK == '20') ? "checked" :  "" 
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
                                        <input type="radio" name="ltDiemTBHK" id="" value="18" 
                                        <?php 
                                            // echo ($ltDiemTBHK == '18') ? "checked" :  "" 
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
                                        <input type="radio" name="ltDiemTBHK" id="" value="16" 
                                        <?php 
                                            // echo ($ltDiemTBHK == '16') ? "checked" :  "" 
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
                                        <input type="radio" name="ltDiemTBHK" id="" value="12" 
                                        <?php 
                                        // echo ($ltDiemTBHK == '12') ? "checked" :  "" 
                                            echo ($point_average >= 2.0 && $point_average <= 2.49) ? "checked" :  "" 

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
                                        <input type="radio" name="ltDiemTBHK" id="" value="10" 
                                        <?php 
                                            // echo ($ltDiemTBHK == '10') ? "checked" :  "" 
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
                                        <input type="radio" name="ltDiemTBHK" id="" value="8" 
                                        <?php 
                                        // echo ($ltDiemTBHK == '8') ? "checked" :  "" 
                                            echo ($point_average >= 1.0 && $point_average <= 1.49) ? "checked" :  "" 

                                        ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
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
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Đạt giải Olympic cấp Trường tối đa: …........................................................(+5đ)
                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="svOlympic3" id="" value="5" <?php echo ($svOlympic3 == '5') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="svOlympic3" id="" value="<?= $svOlympic3 ?>"  min="0" max="5">

                                    </td>
                                    <td>                                
                                        <!-- <input type="checkbox" name="ltOlympic3" id="" value="5" <?php echo ($ltOlympic3 == '5') ? "checked" :  "" ?>>  -->
                                        <input type="number" name="ltOlympic3" id="" value="<?= $ltOlympic3 ?>"  min="0" max="5">

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
                                </tr>
                                
                                <tr>
                                    <td colspan="3">
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
                                </tr>
                                <tr>
                                    <td colspan="3">
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
                                </tr>
                                <tr>
                                    <td width="70%">
                                        <h5>Cộng mục I</h5>
                                    </td>
                                    <td colspan="3">
                                        <input type="number" class="sum_one sum_item" value="0">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td colspan="3">
                                        <p><span style="font-weight: bold">II.<u>Đánh giá về ý thức và kết quả chấp hành nội quy, quy chế của Trường</u></span> <span style="font-style: italic;">(Tổng điểm: 0 - 25 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
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
                                </tr>
                                <tr>
                                    <td colspan="3">
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
                                        <input type="radio" name="ltCitizen" id="" value="15" 
                                        <?php 
                                            // echo ($ltCitizen == '15') ? "checked" :  "" 
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
                                        <input type="radio" name="ltCitizen" id="" value="10" 
                                        <?php 
                                            // echo ($ltCitizen == '10') ? "checked" :  "" 
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
                                        <input type="radio" name="ltCitizen" id="" value="5" 
                                        <?php 
                                            echo ($point_citizen >= 50 && $point_citizen <= 65) ? "checked" :  "" 

                                            // echo ($ltCitizen == '5') ? "checked" :  "" 
                                        ?>> 
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
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
                                    <td colspan="3">
                                        <p><span style="font-weight: bold">III.<u> Đánh giá về ý thức và kết quả tham gia các hoạt động chính trị, xã hội, văn hoá, văn nghệ, thể thao, phòng chống các tệ nạn xã hội</u></span> <span style="font-style: italic;">(Tổng điểm: 0 - 20 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
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
                                </tr>
                                <tr>
                                    <td colspan="3">
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
                                </tr>
                                <tr>
                                    <td colspan="3">
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
                                </tr>
                                
                                <tr>
                                    <td width="70%">
                                        <h5>Cộng mục III</h5>
                                    </td>
                                    <td colspan="3">
                                        <input type="number" class="sum_three sum_item" value=0>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        <p><span style="font-weight: bold">IV.<u> Đánh giá về phẩm chất công dân và quan hệ công đồng </u></span> <span style="font-style: italic;">(Tổng điểm: 0 - 15 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
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
                                </tr>
                                <tr>
                                    <td colspan="3">
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
                                </tr>

                                <tr>
                                    <td width="70%">
                                        <h5>Cộng mục IV</h5>
                                    </td>
                                    <td colspan="3">
                                        <input type="number" class="sum_four sum_item" value="0">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        <p><span style="font-weight: bold">V.<u>Đánh giá về ý thức và kết quả tham gia phụ trách lớp, các đoàn thể tổ chức khác trong Trường</u></span> <span style="font-style: italic;">(Tổng điểm: 0 - 10 điểm)</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <p><span style="font-weight: bold; font-style: italic;">1. Phần cộng điểm</span></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">a). Là thành viên Ban cán sự lớp quản lý sinh viên, cán bộ Đoàn TN, Hội SV hoàn thành nhiệm vụ:</td>
                                </tr>
                                <tr>
                                    <td width="70%" colspan="2">
                                    -Không có chức vụ 
                                    </td>  
                                                       
                                    <td>
                                        <input type="radio" name="ltMonitor" id="" value="0" <?php echo ($ltMonitor == '0') ? "checked" :  "" ?>> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="70%">
                                        - Lớp trưởng, Phó Bí thư Liên chi, Bí thư Chi đoàn:…..…….................(+7đ)
                                    </td>                      
                                    <td>
                                        <?php
                                        ?>
                                        <input type="radio" name="svMonitor" id="" value="7" <?php echo ($svMonitor == '7') ? "checked" :  "" ?>> 
                                    </td>
                                    <td>
                                        <input type="radio" name="ltMonitor" id="" value="7" <?php 
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
                                        <input type="radio" name="ltMonitor" id="" value="5" <?php
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
                                </tr>
                                <tr>
                                    <td colspan="3">
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
                                </tr>

                                <tr>
                                    <td width="70%">
                                        <h5>Cộng mục V</h5>
                                    </td>
                                    <td colspan="3">
                                        <input type="number" class="sum_five sum_item" value="0">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3"><h5>Ghi chú</h5></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <textarea name="ltNote" id="ltNote" cols="" rows="" style="width: 100%"><?php echo $ltNote ?></textarea>
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
                        
                        <button class="btn_save btn btn-success">Lưu</button>
                    </form>
                    <?php
                        require_once $path.'display_sum_point_student.php';
                    ?>
                    <?php
                        if(isset($_POST['ltNCKH1'])){
                                $ltDiemTBHK = $_POST['ltDiemTBHK'] ?? 0;
                            
                                $ltCitizen  = $_POST['ltCitizen'] ?? 0;
                            
                                $ltMonitor  = $_POST['ltMonitor'] ?? 0;
                            
                                // $ltNCKH1  = $_POST['ltNCKH1'] ?? 0;
                                $ltNCKH1 = (!empty($_POST['ltNCKH1'])) ? $_POST['ltNCKH1'] : 0;
                            
                                // $ltNCKH2  = $_POST['ltNCKH2'] ?? 0;
                                $ltNCKH2 = (!empty($_POST['ltNCKH2'])) ? $_POST['ltNCKH2'] : 0;

                            
                                // $ltNCKH3  = $_POST['ltNCKH3'] ?? 0;
                                $ltNCKH3 = (!empty($_POST['ltNCKH3'])) ? $_POST['ltNCKH3'] : 0;

                            
                                // $ltOlympic1  = $_POST['ltOlympic1'] ?? 0;
                                $ltOlympic1 = (!empty($_POST['ltOlympic1'])) ? $_POST['ltOlympic1'] : 0;

                            
                                // $ltOlympic2  = $_POST['ltOlympic2'] ?? 0;
                                $ltOlympic2 = (!empty($_POST['ltOlympic2'])) ? $_POST['ltOlympic2'] : 0;

                            
                                // $ltOlympic3 = $_POST['ltOlympic3'] ?? 0;
                                $ltOlympic3 = (!empty($_POST['ltOlympic3'])) ? $_POST['ltOlympic3'] : 0;

                            
                                // $ltOlympic4 = $_POST['ltOlympic4'] ?? 0;
                                $ltOlympic4 = (!empty($_POST['ltOlympic4'])) ? $_POST['ltOlympic4'] : 0;

                            
                                $ltNoRegulation = $_POST['ltNoRegulation'] ?? 0;
                            
                                $ltOnTime = $_POST['ltOnTime'] ?? 0;
                            
                                // $ltAbandon = $_POST['ltAbandon'] ?? 0;
                                $ltAbandon = (!empty($_POST['ltAbandon'])) ? $_POST['ltAbandon'] : 0;

                            
                                $ltUnTrueTime = $_POST['ltUnTrueTime'] ?? 0;
                            
                                $ltNoFullStudy = $_POST['ltNoFullStudy'] ?? 0;
                            
                                $ltNoCard = $_POST['ltNoCard'] ?? 0;
                            
                                $ltNoAtivities = $_POST['ltNoAtivities'] ?? 0;
                            
                                $ltNoPayFee  = $_POST['ltNoPayFee'] ?? 0;
                            
                                $ltFullActive  = $_POST['ltFullActive'] ?? 0;
                            
                                // $ltAchievementCity = $_POST['ltAchievementCity'] ?? 0;
                                $ltAchievementCity = (!empty($_POST['ltAchievementCity'])) ? $_POST['ltAchievementCity'] : 0;

                            
                                // $ltAchievementSchool = $_POST['ltAchievementSchool'] ?? 0;
                                $ltAchievementSchool = (!empty($_POST['ltAchievementSchool'])) ? $_POST['ltAchievementSchool'] : 0;

                            
                                $ltAdvise  = $_POST['ltAdvise'] ?? 0;
                            
                                $ltIrresponsible  = $_POST['ltIrresponsible'] ?? 0;
                            
                                $ltNoCultural = $_POST['ltNoCultural'] ?? 0;
                            
                                $ltPositiveStudy = $_POST['ltPositiveStudy'] ?? 0;
                            
                                $ltPositiveLove  = $_POST['ltPositiveLove'] ?? 0;
                            
                                $ltWarn  = $_POST['ltWarn'] ?? 0;
                            
                                $ltNoProtect = $_POST['ltNoProtect'] ?? 0;
                            
                                $ltBonus = $_POST['ltBonus'] ?? 0;
                            
                                $ltIrresponsibleMonitor  = $_POST['ltIrresponsibleMonitor'] ?? 0;
                            
                                $ltRightRule = $_POST['ltRightRule'] ?? 0;

                                $ltNote = $_POST['ltNote'] ?? '';

                            $sumOfOneLT = $ltDiemTBHK + $ltNCKH1 + $ltNCKH2 + $ltNCKH3 
                                        + $ltOlympic1 + $ltOlympic2 + $ltOlympic3 + $ltOlympic4 
                                        + $ltNoRegulation + $ltOnTime + $ltAbandon + $ltUnTrueTime;

                            // if($sumOfOneLT < 0){
                            //     $sumOfOneLT = 0;
                            // }

                            $sumOfTwoLT = $ltRightRule + $ltCitizen + $ltNoFullStudy + $ltNoAtivities + $ltNoPayFee + $ltNoCard;
                            // if($sumOfTwoLT < 0){
                            //     $sumOfTwoLT = 0;
                            // }

                            $sumOfThreeLT = $ltFullActive + $ltAchievementCity + $ltAchievementSchool 
                                            + $ltAdvise + $ltIrresponsible + $ltNoCultural;
                            // if($sumOfThreeLT < 0){
                            //     $sumOfThreeLT = 0;
                            // }

                            $sumOfFourLT = $ltPositiveLove + $ltPositiveStudy + $ltWarn + $ltNoProtect;
                            // if($sumOfFourLT < 0){
                            //     $sumOfFourLT = 0;
                            // }

                            $sumOfFiveLT = $ltMonitor + $ltBonus + $ltIrresponsibleMonitor;
                            // if($sumOfFiveLT < 0){
                            //     $sumOfFiveLT = 0;
                            // }

                            $sumMarkLT = $sumOfOneLT + $sumOfTwoLT + $sumOfThreeLT + $sumOfFourLT + $sumOfFiveLT;
                           
                            
                            $sql = "select * from point_monitor where maSv = '$maSv' and maHK = '$maHK'";
                            $result = $connect->query($sql);
                            // var_dump($result);
                            // update
                            if($result->num_rows > 0){
                                $sql = "update point_monitor
                                        set 
                                        ltDiemTBHK = '$ltDiemTBHK', 
                                        ltNCKH1  = '$ltNCKH1', 
                                        ltNCKH2 = '$ltNCKH2', 
                                        ltNCKH3 = '$ltNCKH3', 
                                        ltOlympic1 = '$ltOlympic1', 
                                        ltOlympic2 = '$ltOlympic2',
                                        ltOlympic3 = '$ltOlympic3', 
                                        ltOlympic4 = '$ltOlympic4', 
                                        ltNoRegulation = '$ltNoRegulation', 
                                        ltOnTime = '$ltOnTime', 
                                        ltAbandon = '$ltAbandon', 
                                        ltUnTrueTime = '$ltUnTrueTime',
                                        ltRightRule = '$ltRightRule', 
                                        ltCitizen = '$ltCitizen', 
                                        ltNoFullStudy = '$ltNoFullStudy', 
                                        ltNoCard = '$ltNoCard', 
                                        ltNoAtivities = '$ltNoAtivities', 
                                        ltNoPayFee = '$ltNoPayFee',
                                        ltFullActive = '$ltFullActive', 
                                        ltAchievementSchool = '$ltAchievementSchool', 
                                        ltAchievementCity = '$ltAchievementCity', 
                                        ltAdvise = '$ltAdvise', 
                                        ltIrresponsible = '$ltIrresponsible',
                                        ltNoCultural = '$ltNoCultural', 
                                        ltPositiveStudy = '$ltPositiveStudy', 
                                        ltPositiveLove = '$ltPositiveLove', 
                                        ltWarn = '$ltWarn', 
                                        ltNoProtect = '$ltNoProtect', 
                                        ltMonitor = '$ltMonitor',
                                        ltBonus = '$ltBonus', 
                                        ltIrresponsibleMonitor = '$ltIrresponsibleMonitor'
                                        where
                                        maSv = '$maSv' and maHK = '$maHK'";

                                $update_point_monitor = "update point 
                                                         set 
                                                         point_monitor = '$sumMarkLT', 
                                                         ltNote = '$ltNote',
                                                         status = 1 
                                                         where 
                                                         maSv = '$maSv' and maHK = '$maHK'";

                                if($connect->query($sql) && $connect->query($update_point_monitor)){
                        
                                    header('Location: ./index.php');
                                    // echo 'Thành công';

                                }
                                else{
                                    echo $connect->error;
                                    // echo 'Lỗi';
                                }
                            }
                            // insert
                            else{
                                $sql = "INSERT INTO 
                                        `point_monitor` 
                                        (`maSv`, 
                                        `ltDiemTBHK`, 
                                        `ltCitizen`, 
                                        `ltMonitor`, 
                                        `ltNCKH1`, 
                                        `ltNCKH2`, 
                                        `ltNCKH3`, 
                                        `ltOlympic1`, 
                                        `ltOlympic2`, 
                                        `ltOlympic3`, 
                                        `ltOlympic4`, 
                                        `ltNoRegulation`, 
                                        `ltOnTime`, 
                                        `ltAbandon`, 
                                        `ltUnTrueTime`, 
                                        `ltNoFullStudy`, 
                                        `ltNoCard`, 
                                        `ltNoAtivities`, 
                                        `ltNoPayFee`, 
                                        `ltFullActive`, 
                                        `ltAchievementSchool`, 
                                        `ltAchievementCity`, 
                                        `ltAdvise`, 
                                        `ltIrresponsible`, 
                                        `ltNoCultural`, 
                                        `ltPositiveStudy`, 
                                        `ltPositiveLove`, 
                                        `ltWarn`, 
                                        `ltNoProtect`, 
                                        `ltBonus`, 
                                        `ltIrresponsibleMonitor`, 
                                        `maHK`, 
                                        `ltRightRule`
                                        )
                                        VALUES 
                                        ('$maSv', 
                                        '$ltDiemTBHK', 
                                        '$ltCitizen', 
                                        '$ltMonitor', 
                                        '$ltNCKH1', 
                                        '$ltNCKH2', 
                                        '$ltNCKH3', 
                                        '$ltOlympic1', 
                                        '$ltOlympic2', 
                                        '$ltOlympic3', 
                                        '$ltOlympic4', 
                                        '$ltNoRegulation', 
                                        '$ltOnTime', 
                                        '$ltAbandon', 
                                        '$ltUnTrueTime', 
                                        '$ltNoFullStudy', 
                                        '$ltNoCard', 
                                        '$ltNoAtivities', 
                                        '$ltNoPayFee', 
                                        '$ltFullActive', 
                                        '$ltAchievementSchool', 
                                        '$ltAchievementCity', 
                                        '$ltAdvise', 
                                        '$ltIrresponsible', 
                                        '$ltNoCultural', 
                                        '$ltPositiveStudy', 
                                        '$ltPositiveLove', 
                                        '$ltWarn', 
                                        '$ltNoProtect', 
                                        '$ltBonus', 
                                        '$ltIrresponsibleMonitor', 
                                        '$maHK', 
                                        '$ltRightRule'
                                        )";
                                $update_point_monitor = "update point 
                                                         set 
                                                         point_monitor = '$sumMarkLT', 
                                                         ltNote = '$ltNote',
                                                         status = 1 
                                                         where 
                                                         maSv = '$maSv' and maHK = '$maHK'";
                                
                                if($connect->query($sql) && $connect->query($update_point_monitor)){
                                    header('Location: ./index.php');
                                    // echo 'Thành công';
                                }    
                                else{
                                    echo $connect->error;
                                    // echo 'Lỗi';
                                }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
       
    </div>
        <!-- <script src = "../assets/js/test.js"></script> -->
        <!-- <script src = "../assets/js/monitorCheckPoint.js"></script> -->
        <script src = "../assets/js/checkbox.js"></script>
        <script src = "../assets/js/browser_monitor_mark.js"></script>



        
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
<style>
    .main__body_checkbox{
    float: right;
    font-size: 16px;
    font-weight: bold;
}
</style>
</html>