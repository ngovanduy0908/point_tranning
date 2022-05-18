<?php
session_start();
require_once('../db/dbhelper.php');
$path = '../';
// var_dump($_SESSION)
if (isset($_SESSION)) {
    $maKhoa = $_SESSION['user']['maKhoa'];
}

$maHK = $level_point = $maLop = $maKhoaHoc ="";
// $maHK = $_POST['maHK'] ?? "";
$maHK = (isset($_POST['maHK'])) ? $_POST['maHK'] : "";

// $level_point = $_POST['level_point'] ?? "";
$level_point = (isset($_POST['level_point'])) ? $_POST['level_point'] : "";

$maKhoaHoc = (isset($_POST['maKhoaHoc'])) ? $_POST['maKhoaHoc'] : "";

$sql_semester = "select * from semester where maHK = '$maHK'";
    $sql_semester_run = $connect->query($sql_semester);
    if($sql_semester_run->num_rows > 0){
        $sql_semester_item = $sql_semester_run->fetch_assoc();
    }

$sql = "select * from department where maKhoa = '$maKhoa'";
    $sql_department = $connect->query($sql);
    if($sql_department->num_rows > 0){
        $sql_department_item = $sql_department->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/base_1.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main__body">
            <h4 class="main__body_heading"><?=$_SESSION['user']['name']?> - Thống Kê</h4>
            <div class="main__body_container mb-3">
                <ul class="body__container_list grid wide row">
                    <li class="body__container_item">
                        <a href="./index.php" class="body__container_link">Trang Chủ</a>
                    </li>
                    <li class="body__container_item">
                        <a href="../admin/teacher/index.php" class="body__container_link">Quản Lý Giáo Viên</a>
                    </li>
                    <li class="body__container_item">
                        <a href="../admin/class/index.php" class="body__container_link">Quản Lý Lớp Học</a>
                    </li>
                    <li class="body__container_item">
                        <a href="#" class="body__container_link">Thống kê Điểm Rèn Luyện</a>
                    </li>
                    <li class="body__container_item">
                        <a href="../login/logout.php" class="body__container_link">Đăng Xuất</a>
                    </li>
                </ul>
            </div>
            <!-- <a href="./index.php" class="btn btn-warning mt-2 mb-2"><i class="fas fa-backward"></i></a> -->
            <form action="" method="POST" class="main__body_form grid wide">
                <div class="form-group">
                    Chọn kì
                    <select name="maHK" id="" class="form-control">
            
                        <?php
                        $sql = "select * from semester order by rank";
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
                        <option value="0" <?php echo ($level_point == '0') ? 'selected' : ''; ?>>Tất Cả Sinh Viên</option>
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
        
                <div class="form-group">
                    Khóa
                    <select name="maKhoaHoc" id="" class="form-control">
                        <option value="0">Toàn Khóa</option>
                        <?php
                            $sql_course = "select * from course";
                            $sql_course_run = $connect->query($sql_course);
                            if($sql_course_run->num_rows > 0){
                                while($sql_course_item = $sql_course_run->fetch_assoc()){
                                    if($sql_course_item['maKhoaHoc'] == $maKhoaHoc){
                                        echo '
                                            <option selected value="'.$sql_course_item['maKhoaHoc'].'">'.$sql_course_item['name'].'</option>
                                        
                                        ';
                                    }
                                    else{
                                        echo '
                                            <option value="'.$sql_course_item['maKhoaHoc'].'">'.$sql_course_item['name'].'</option>
                                    
                                        ';
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
            
        
                <button type="submit" class="btn btn-primary mt-2">Chọn</button>
            </form>
        </div>

        
    </div>

    <?php 
        if(isset($_POST['maHK'])){
            $maHK = $_POST['maHK'];
            $level_point = $_POST['level_point'];
            $maKhoaHoc = $_POST['maKhoaHoc'];
            $count_student = $sv_xuat_sac = $sv_gioi = $sv_kha = $sv_trung_binh_kha = $sv_trung_binh = $sv_yeu = $sv_kem = 0;
            $_SESSION['maKhoaHoc'] = $maKhoaHoc;
            $_SESSION['level_point'] = $level_point;
            $_SESSION['maHK'] = $maHK;
            // var_dump($maKhoaHoc);
            // exit;

            require_once './select_point_student.php';

            $sql_student_point_run = $connect->query($sql_student_point);
            $sql_count_point_run = $connect->query($sql_count_point);
            $sql_count_point_item = $sql_count_point_run->fetch_assoc();
            // var_dump($sql_count_point_item);
            // exit;
            $count_student = $sql_count_point_item['count_student'];
            // var_dump((int)$count_student);
            // exit;
            
            ?>
            <div style="display: flex;" class="grid wide mt-3">
                <table width="" class="table table-striped table-bordered table_one">
                    <thead>
                        <tr>
                            <th>STT</td>
                            <th>MSSV</th>
                            <th>Họ và tên</th>
                            <th>Tên lớp</th>
                            <th>(1)</th>
                            <th>(2)</th>
                            <th>(3)</th>
                            <th>(4)</th>
                            <th>(5)</th>
                            <th>Hình thức kỷ luật</th>
                            <th>Tổng điểm</th>
                            <th>SĐT</th>
                            <th>Ghi chú</th>
                            <th>Chức vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($sql_student_point_run->num_rows > 0){
                                $index = 0;
                                while($sql_student_point_item = $sql_student_point_run->fetch_assoc()){
                                    // var_dump($sql_student_point_item);
                                    // exit;
                                    $index++;
                                    $student_name = $sql_student_point_item['name'];
                                    $class_name = $sql_student_point_item['class_name'];
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
                                        <td>'.$class_name.'</td>
                                        <td>'.$sumOfOneGV.'</td>
                                        <td>'.$sumOfTwoGV.'</td>
                                        <td>'.$sumOfThreeGV.'</td>
                                        <td>'.$sumOfFourGV.'</td>
                                        <td>'.$sumOfFiveGV.'</td>
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

                    <table  width="30%" class="table table-striped table-bordered table_two">
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
                        <button type="submit" name="export_btn" class="btn btn-primary">Export</button>
                    </form>
                    <!-- <a href="./export_file_mark.php"><button>Xuất file excel</button></a> -->
                </span>

            </div>
            

            
            <?php

}
?>
<?php
require_once '../footer.php';
?>
</body>
<style>
    
    .table_one{
        width: 70% !important; 
    }
    .table_two{
        width: 155% !important; 

    }
    .main__body_form{
        padding: 6px 12px;
        width: 500px;
        margin: 0 auto;
        border: 3px solid #338b9f;
        border-radius: 6px;
    }

</style>
</html>