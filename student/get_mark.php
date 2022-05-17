<?php
    session_start();

    require_once('../db/dbhelper.php');

    if(isset($_SESSION['user'])){

        $maSv = $_SESSION['user']['maSv'];
        
        

        if(isset($_GET['maHK'])){

            $maHK = $_GET['maHK'];

            $sql_student_point = "select * from point where maSv = '$maSv' and maHk = '$maHK'";
            $sql_student_point_run = $connect->query($sql_student_point);
            if($sql_student_point_run->num_rows > 0){
                $sql_student_point_item = $sql_student_point_run->fetch_assoc();
                $ltNote = $sql_student_point_item['ltNote'];
                $gvNote = $sql_student_point_item['gvNote'];
            }

            $sqlHK = "select * from semester where maHK = '$maHK'";

            $hk = $connect->query($sqlHK);
            if($hk->num_rows > 0){
                $hkItem = $hk->fetch_assoc();
            }

            $sql = "SELECT students.*, class.class_name as class_name, course.name as course_name, department.name as department_name
            from students, class, course, department 
            where students.maLop = class.maLop 
            and class.maKhoaHoc = course.maKhoaHoc 
            and class.maKhoa = department.maKhoa
            and students.maSv = '$maSv'";

            $result = $connect->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
            }

            $svDiemTBHK = $svCitizen = $svMonitor = $svNCKH1 = $svNCKH2 = $svNCKH3 = $svOlympic1 = $svOlympic2 = $svOlympic3 = $svOlympic4 
            = $svNoRegulation = $svOnTime = $svAbandon = $svUnTrueTime = $svNoFullStudy = $svNoCard =  $svNoAtivities = $svNoPayFee 
            = $svFullActive = $svAchievementCity = $svAchievementSchool = $svAdvise = $svIrresponsible = $svNoCultural = $svPositiveStudy 
            = $svPositiveLove = $svWarn = $svNoProtect = $svBonus = $svIrresponsibleMonitor = $svRightRule 
            = $sum = $check = $checkOne =  $checkTwo  =  $sumOfOne = $sumOfTwo = $sumOfThree = $sumOfFour = $sumOfFive = 0;
        
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


            $ltDiemTBHK = $ltCitizen = $ltMonitor = $ltNCKH1 = $ltNCKH2 = $ltNCKH3 = $ltOlympic1 = $ltOlympic2 = $ltOlympic3 = $ltOlympic4 = $ltNoRegulation = $ltOnTime = $ltAbandon = $ltUnTrueTime = $ltNoFullStudy = $ltNoCard =  $ltNoAtivities = $ltNoPayFee = $ltFullActive = $ltAchievementCity = $ltAchievementSchool = $ltAdvise = $ltIrresponsible = 
            $ltNoCultural = $ltPositiveStudy = $ltPositiveLove = $ltWarn = $ltNoProtect = $ltBonus = $ltIrresponsibleMonitor = $ltRightRule = $sumLT = 0;
        
            $sqlDiemLt = "select * from point_monitor where maSv = '$maSv' and maHk = '$maHK'";
            $diemLT = $connect->query($sqlDiemLt);
            if($diemLT->num_rows > 0){
                $diemLTItem = $diemLT->fetch_assoc();
                $checkOne = 1;
                $check = 2;

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
            // Bảng giáo viên
            $gvDiemTBHK = $gvCitizen = $gvMonitor = $gvNCKH1 = $gvNCKH2 = $gvNCKH3 = $gvOlympic1 = $gvOlympic2 = $gvOlympic3 = $gvOlympic4 = $gvNoRegulation = $gvOnTime = $gvAbandon = $gvUnTrueTime = $gvNoFullStudy = $gvNoCard =  $gvNoAtivities = $gvNoPayFee = $gvFullActive = $gvAchievementCity = $gvAchievementSchool = $gvAdvise = $gvIrresponsible = 
            $gvNoCultural = $gvPositiveStudy = $gvPositiveLove = $gvWarn = $gvNoProtect = $gvBonus = $gvIrresponsibleMonitor = $gvRightRule = $sumGV = 0;
            $sqlDiemGv = "select * from point_teacher where maSv = '$maSv' and maHk = '$maHK'";
            $diemGV = $connect->query($sqlDiemGv);
            if($diemGV->num_rows > 0){
                $diemGVItem = $diemGV->fetch_assoc();
                $checkTwo = 1;
                $check = 3;
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
        }
    }
    
?>