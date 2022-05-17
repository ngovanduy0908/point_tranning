<?php
    session_start();
    require_once('../db/dbhelper.php');
    $path = '../';
    if(isset($_SESSION)){
        $maHK = $level_point = "";
        $maLop = $_SESSION['user']['maLop'];
        if(isset($_POST['maHK'])){
            $maHK = $_POST['maHK'];
        }
        if(isset($_POST['level_point'])){
            $level_point = $_POST['level_point'];
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selection Export File</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/base_1.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main__body grid wide">
            <h4 class="main__body_heading mb-4"><?= $_SESSION['user']['name'] ?></h4>
            <form action="" class="mb-4" method="POST" style="border: 2px solid;width: 500px; margin: 0 auto;padding: 8px 12px;border-radius: 6px;">
                <div class="form-group">
                    Chọn Kì
                    <select name="maHK" id="" class="form-control">
                    <?php
                    $sql = "select * from semester";
                    $result = $connect->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if($row['maHK'] == $maHK){
                                echo '
                                        <option selected value="' . $row['maHK'] . '">' . $row['name'] . '</option>                    
                                    ';
                            }
                            else{
                                echo '
                                <option value="' . $row['maHK'] . '">' . $row['name'] . '</option>                    
                            ';
                            }
                        }
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    Danh sách
                    <select name="level_point" id="" class="form-control">
                        <option value="0" <?php echo ($level_point == '0') ? 'selected' : ''; ?>>Tất Cả SV</option>
                        <option value="1" <?php echo ($level_point == '1') ? 'selected' : ''; ?>>SV Xuất Sắc</option>
                        <option value="2" <?php echo ($level_point == '2') ? 'selected' : ''; ?>>SV Giỏi</option>
                        <option value="3" <?php echo ($level_point == '3') ? 'selected' : ''; ?>>SV Khá</option>
                        <option value="9" <?php echo ($level_point == '9') ? 'selected' : ''; ?>>SV Trung Bình Khá</option>
                        <option value="4" <?php echo ($level_point == '4') ? 'selected' : ''; ?>>SV Trung Bình</option>
                        <option value="7" <?php echo ($level_point == '7') ? 'selected' : ''; ?>>SV Yếu</option>
                        <option value="8" <?php echo ($level_point == '8') ? 'selected' : ''; ?>>SV Kém</option>
                        <option value="5" <?php echo ($level_point == '5') ? 'selected' : ''; ?>>SV Điểm rèn luyện >= 70</option>
                        <option value="6" <?php echo ($level_point == '6') ? 'selected' : ''; ?>>SV Điểm rèn luyện < 50</option>
                    </select>
                </div>
    
    
                <button class="btn btn-success ">Chọn</button>
                <a href="./index.php" class="btn btn-primary ml-3">Quay lại</a>

            </form>
        </div>
        <?php
        if(isset($_POST['maHK'])){
            $maHK = $_POST['maHK'];
            $level_point = $_POST['level_point'];
            $_SESSION['maHK'] = $maHK;
            $_SESSION['level_point'] = $level_point;
            $count_student = $sv_xuat_sac = $sv_gioi = $sv_kha = $sv_trung_binh_kha = $sv_trung_binh = $sv_yeu = $sv_kem = 0;

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
                $_SESSION['maKhoa'] = $maKhoa;
                $sql = "select * from department where maKhoa = '$maKhoa'";
                $sql_department = $connect->query($sql);
                if($sql_department->num_rows > 0){
                    $sql_department_item = $sql_department->fetch_assoc();
                }
            }
            
            require_once './select_point_student.php';

            $sql_count_point = "
                        select count(*) as count_student 
                        from students, semester, point, point_teacher 
                        where 
                        students.maSv = point.maSv 
                        and point.maHK = semester.maHK 
                        and point_teacher.maSv = point.maSv
                        and students.maLop = '$maLop' 
                        and semester.maHK = '$maHK'
                    ";
        
            $sql_student_point_run = $connect->query($sql_student_point);
            $sql_count_point_run = $connect->query($sql_count_point);
            $sql_count_point_item = $sql_count_point_run->fetch_assoc();
            // var_dump($sql_count_point_item);
            // exit;
            $count_student = $sql_count_point_item['count_student'];
            // var_dump((int)$count_student);
            // exit;
            ?>
        <div class="grid wide">

        
            <h5 class="text-center mt-2"><?= $msg ?></h5>
            <h6 class="text-center">Lớp <?= $sql_class_item['class_name'] ?></h6>
            <div style="display:flex">

            
            <table class="table table-striped table-bordered table_one">
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
                    $gvDiemTBHK = $gvCitizen = $gvMonitor = $gvNCKH1 = $gvNCKH2 = $gvNCKH3 
                    = $gvOlympic1 = $gvOlympic2 = $gvOlympic3 = $gvOlympic4 = $gvNoRegulation 
                    = $gvOnTime = $gvAbandon = $gvUnTrueTime = $gvNoFullStudy = $gvNoCard 
                    = $gvNoAtivities = $gvNoPayFee = $gvFullActive = $gvAchievementCity 
                    = $gvAchievementSchool = $gvAdvise = $gvIrresponsible = $gvNoCultural 
                    = $gvPositiveStudy = $gvPositiveLove = $gvWarn = $gvNoProtect = $gvBonus 
                    = $gvIrresponsibleMonitor = $gvRightRule = $sumGV = 0;
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
        
                                ($sumGV >= 90) ? ($sv_xuat_sac++) : 0;
                                ($sumGV >= 80 && $sumGV <= 89) ? ($sv_gioi++) : 0;
                                ($sumGV >= 70 && $sumGV <= 79) ? ($sv_kha++) : 0;
                                ($sumGV >= 60 && $sumGV <= 69) ? ($sv_trung_binh_kha++) : 0;
                                ($sumGV >= 50 && $sumGV <= 59) ? ($sv_trung_binh++) : 0;
                                ($sumGV >= 30 && $sumGV <= 49) ? ($sv_yeu++) : 0;
                                ($sumGV <= 29) ? ($sv_kem++) : 0;

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
            <span>

                <table class="table table-striped table-bordered table_two">
                    <thead>
                        <tr>
                            <th>Tổng số SV</th>
                            <th><?php echo $count_student ?></th>
                        </tr>
                        <tr>
                            <th>Loại</th>
                            <th>Số lượng</th>
                        </tr>
                        <tr>
                            <td>Xuất Sắc</td>
                            <td><?php echo $sv_xuat_sac ?></td>
                        </tr>
                        <tr>
                            <td>Giỏi</td>
                            <td><?php echo $sv_gioi ?></td>
                        </tr>
                        <tr>
                            <td>Khá</td>
                            <td><?php echo $sv_kha ?></td>
                        </tr>
                        <tr>
                            <td>Trung Bình Khá</td>
                            <td><?php echo $sv_trung_binh_kha ?></td>
                        </tr>
                        <tr>
                            <td>Trung Bình</td>
                            <td><?php echo $sv_trung_binh ?></td>
                        </tr>
                        <tr>
                            <td>Yếu</td>
                            <td><?php echo $sv_yeu ?></td>
                        </tr>
                        <tr>
                            <td>Kém</td>
                            <td><?php echo $sv_kem ?></td>
                        </tr>
                    </thead>
                    
                </table>
                <form action="export_file_mark.php" method="POST">
                    <input type="text" name="export_file" id="" value="xlsx" hidden>
                    <button type="submit" name="export_btn" class="btn btn-primary ml-1">Export</button>
                </form>
                <!-- <a href="./export_file_mark.php"><button>Xuất file excel</button></a> -->
            </span>
        </div>
            <?php
        }
        ?>
        </div>
        <?php
            require_once '../footer.php';
        ?>
    </div>
</body>
<style>
    .table_one{
        width: 70% !important; 
    }
    .table_two{
        width: 155% !important; 

    }
</style>
</html>