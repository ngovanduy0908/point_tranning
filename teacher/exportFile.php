<?php
session_start();
require_once('../db/dbhelper.php');
$path = '../';
if (isset($_SESSION['maHK'])) {
    $maHK = $_SESSION['maHK'];
    $maLop = $_SESSION['maLop'];
    $level_point = $_SESSION['level_point'];
    $msg = $maKhoa = "";

    $sql_class = "select * from class where maLop = '$maLop'";
    $sql_class_run = $connect->query($sql_class);
    if($sql_class_run->num_rows > 0){
        $sql_class_item = $sql_class_run->fetch_assoc();
    }

    $sql_semester = "select * from semester where maHK = '$maHK'";
    $sql_semester_run = $connect->query($sql_semester);
    if($sql_semester_run->num_rows > 0){
        $sql_semester_item = $sql_semester_run->fetch_assoc();
    }
 
    $sql_get_ma_khoa = "select maKhoa from class where maLop = '$maLop'";
    $sql_get_ma_khoa_run = $connect->query($sql_get_ma_khoa);
    if($sql_get_ma_khoa_run->num_rows > 0){
        $sql_get_ma_khoa_item = $sql_get_ma_khoa_run->fetch_assoc();
        $maKhoa = $sql_get_ma_khoa_item['maKhoa'];
        
        $sql = "select * from department where maKhoa = '$maKhoa'";
        $sql_department = $connect->query($sql);
        if($sql_department->num_rows > 0){
            $sql_department_item = $sql_department->fetch_assoc();
        }
    }

    $gvDiemTBHK = $gvCitizen = $gvMonitor = $gvNCKH1 = $gvNCKH2 = $gvNCKH3 
    = $gvOlympic1 = $gvOlympic2 = $gvOlympic3 = $gvOlympic4 = $gvNoRegulation 
    = $gvOnTime = $gvAbandon = $gvUnTrueTime = $gvNoFullStudy = $gvNoCard 
    = $gvNoAtivities = $gvNoPayFee = $gvFullActive = $gvAchievementCity 
    = $gvAchievementSchool = $gvAdvise = $gvIrresponsible = $gvNoCultural 
    = $gvPositiveStudy = $gvPositiveLove = $gvWarn = $gvNoProtect = $gvBonus 
    = $gvIrresponsibleMonitor = $gvRightRule = $sumGV = 0;

    require_once './select_point_student.php';

    $sql_student_point_run = $connect->query($sql_student_point);
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xuất Điểm Rèn Luyện</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/base_1.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>

<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>

        <div class="main_body grid wide">
            <div style="display: flex; align-items: center" class="mt-3">
                <a href="./chooseSemConsider.php" class="btn btn-primary mr-3">Quay lại</a>
            
                <form action="export_file_mark.php" method="POST">
                    <input type="text" name="export_file" id="" value="xlsx" hidden>
                    <button type="submit" name="export_btn" class="btn btn-success">Export</button>
                </form>

            </div>
        
            <h5 class="text-center"><?= $msg ?></h5>
            <h6 class="text-center">Lớp <?= $sql_class_item['class_name'] ?></h6>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>MSSV</th>
                        <th>Họ và tên</th>
                        <th>(1)</th>
                        <th>(2)</th>
                        <th>(3)</th>
                        <th>(4)</th>
                        <th>(5)</th>
                        <th>Cộng điểm</th>
                        <th>Xử lý kỉ luật</th>
                        <th>Tổng điểm rèn luyện</th>
                        <th>Số điện thoại</th>
                        <th>Ghi chú</th>
                        <th>Chức vụ</th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php
                    
                    if($sql_student_point_run->num_rows > 0){
                        $index = 0;
                        while($sql_student_point_item = $sql_student_point_run->fetch_assoc()){
                                $index++;
                                $student_name = $sql_student_point_item['name'];
                                $student_msv = $sql_student_point_item['maSv'];
                                $student_phone_number = $sql_student_point_item['phone_number'];
                                $role_name = $sql_student_point_item['role_name'];
                                $gvNote = $sql_student_point_item['gvNote'];
                                $sum_point = $sql_student_point_item['point_teacher'];
                                $gvDiemTBHK = $sql_student_point_item['gvDiemTBHK'];
                                $gvNCKH1 = $sql_student_point_item['gvNCKH1'];
                                $gvNCKH2 = $sql_student_point_item['gvNCKH2'];
                                $gvNCKH3 = $sql_student_point_item['gvNCKH3'];
                                $gvOlympic1 = $sql_student_point_item['gvOlympic1'];
                                $gvOlympic2 = $sql_student_point_item['gvOlympic2'];
                                $gvOlympic3 = $sql_student_point_item['gvOlympic3'];
                                $gvOlympic4 = $sql_student_point_item['gvOlympic4'];
                                $gvNoRegulation = $sql_student_point_item['gvNoRegulation'];
                                $gvOnTime = $sql_student_point_item['gvOnTime'];
                                $gvAbandon = $sql_student_point_item['gvAbandon'];
                                $gvUnTrueTime = $sql_student_point_item['gvUnTrueTime'];
                
                                $sumOfOneGV = $gvDiemTBHK + $gvNCKH1 + $gvNCKH2 + $gvNCKH3 + $gvOlympic1 + $gvOlympic2 + $gvOlympic3 + $gvOlympic4 
                                            + $gvNoRegulation + $gvOnTime + $gvAbandon + $gvUnTrueTime;
                
                                
                                // Các đầu điểm của mục 2
                                $gvRightRule = $sql_student_point_item['gvRightRule'];
                                $gvCitizen = $sql_student_point_item['gvCitizen'];
                                $gvNoFullStudy = $sql_student_point_item['gvNoFullStudy'];
                                $gvNoCard = $sql_student_point_item['gvNoCard'];
                                $gvNoAtivities = $sql_student_point_item['gvNoAtivities'];
                                $gvNoPayFee = $sql_student_point_item['gvNoPayFee'];
                
                                $sumOfTwoGV = $gvRightRule + $gvCitizen + $gvNoFullStudy + $gvNoAtivities + $gvNoPayFee + $gvNoCard;
                                
                                // Các đầu điểm mục 3
                                $gvFullActive = $sql_student_point_item['gvFullActive'];
                                $gvAchievementSchool = $sql_student_point_item['gvAchievementSchool'];
                                $gvAchievementCity = $sql_student_point_item['gvAchievementCity'];
                                $gvAdvise = $sql_student_point_item['gvAdvise'];
                                $gvIrresponsible = $sql_student_point_item['gvIrresponsible'];
                                $gvNoCultural = $sql_student_point_item['gvNoCultural'];
                
                                $sumOfThreeGV = $gvFullActive + $gvAchievementCity + $gvAchievementSchool 
                                                + $gvAdvise + $gvIrresponsible + $gvNoCultural;
                               
                
                                // Các đầu điểm mục 4
                                $gvPositiveStudy = $sql_student_point_item['gvPositiveStudy'];
                                $gvPositiveLove = $sql_student_point_item['gvPositiveLove'];
                                $gvWarn = $sql_student_point_item['gvWarn'];
                                $gvNoProtect = $sql_student_point_item['gvNoProtect'];
                
                                $sumOfFourGV = $gvPositiveLove + $gvPositiveStudy + $gvWarn + $gvNoProtect;
                                
                                // Các đầu điểm mục 5
                                $gvMonitor = $sql_student_point_item['gvMonitor'];
                                $gvBonus = $sql_student_point_item['gvBonus'];
                                $gvIrresponsibleMonitor = $sql_student_point_item['gvIrresponsibleMonitor'];
                
                                $sumOfFiveGV = $gvMonitor + $gvBonus + $gvIrresponsibleMonitor;
                                
                                $sumGV = $sumOfOneGV + $sumOfTwoGV + $sumOfThreeGV + $sumOfFourGV + $sumOfFiveGV;
        
        
                                echo '
                        
                                <tr>
                                    <td>'.$index.'</td>
                                    <td>'.$student_msv.'</td>
                                    <td>'.$student_name.'</td>
                                    <td>'.$sumOfOneGV.'</td>
                                    <td>'.$sumOfTwoGV.'</td>
                                    <td>'.$sumOfThreeGV.'</td>
                                    <td>'.$sumOfFourGV.'</td>
                                    <td>'.$sumOfFiveGV.'</td>
                                    <td>'.$sumGV.'</td>
                                    <td></td>
                                    <td>'.$sum_point.'</td>
                                    <td>'.$student_phone_number.'</td>
                                    <td>'.$gvNote.'</td>
                                    <td>'.$role_name.'</td>
                                    
                                </tr>
                                                
                        
                        ';
                        }
                    }
                    
                    
                            
                        
                    
                    ?>
                </tbody>
            </table>
        </div>

        <?php
            require_once '../footer.php';
        ?>
    </div>
</body>

</html>