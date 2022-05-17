<?php
ob_start();
session_start();
require_once('../db/dbhelper.php');
if (isset($_SESSION['maHK'])) {
    $maHK = $_SESSION['maHK'];
    $maLop = $_SESSION['maLop'];
    $level_point = $_SESSION['level_point'];
    $msg = $maKhoa = $file_name = "";
    if($level_point == '0'){
        $file_name = 'student_mark';
    }
    if($level_point == '1'){
        $file_name = 'student_Xuat_sac';
    }
    if($level_point == '2'){
        $file_name = 'student_gioi';
    }
    if($level_point == '3'){
        $file_name = 'student_kha';
    }
    if($level_point == '4'){
        $file_name = 'student_trung_binh';
    }
    if($level_point == '5'){
        $file_name = 'student_DRL_Lon_Hon_70_Diem';
    }
    if($level_point == '6'){
        $file_name = 'student_DRL_Nho_Hon_50_Diem';
    }
    if($level_point == '7'){
        $file_name = 'student_yeu';
    }
    if($level_point == '8'){
        $file_name = 'student_kem';
    }
    if($level_point == '9'){
        $file_name = 'student_trung_binh_kha';
    }

}
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['export_btn'])) {
    $ext = $_POST['export_file'];

    $fileName = $file_name .'-'. time();

    // $sql = "select students.*, point.* 
    // from students, semester, point 
    // where students.maSv = point.maSv
    // and point.maHK = semester.maHK 
    // and students.maLop = '$maLop' 
    // and semester.maHK = '$maHK' 
    // and point.status_teacher = 1";

    $sql_class = "select * from class where maLop = '$maLop'";
    $sql_class_run = $connect->query($sql_class);
    if($sql_class_run->num_rows > 0){
        $sql_class_item = $sql_class_run->fetch_assoc();
        $class_name = $sql_class_item['class_name'];
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
    
        if (mysqli_num_rows($sql_student_point_run) > 0) {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Bộ giáo dục và đào tạo');
        $sheet->setCellValue('A2', 'Trường đại học mỏ địa chất');
        $sheet->setCellValue('G1', 'Cộng hòa xã hội chủ nghĩa Việt Nam');
        $sheet->setCellValue('H2', 'Độc lập - Tự do - Hạnh phúc');
        $sheet->setCellValue('D6', $msg);
        $sheet->setCellValue('F7', 'Lớp'.$class_name);
        $sheet->setCellValue('A9', 'STT');
        $sheet->setCellValue('B9', 'MSSV');
        $sheet->setCellValue('C9', 'Họ và tên');
        $sheet->setCellValue('D9', '(1)');
        $sheet->setCellValue('E9', '(2)');
        $sheet->setCellValue('F9', '(3)');
        $sheet->setCellValue('G9', '(4)');
        $sheet->setCellValue('H9', '(5)');
        $sheet->setCellValue('I9', 'Cộng điểm');
        $sheet->setCellValue('J9', 'Xử lý kỉ luật');
        $sheet->setCellValue('K9', 'Tổng điểm rèn luyện');
        $sheet->setCellValue('L9', 'SĐT');
        $sheet->setCellValue('M9', 'Ghi chú');
        $sheet->setCellValue('N9', 'Chức vụ');



        $row_count = 11;
        $stt = 1;
        // foreach ($sql_run as $data) {
        foreach ($sql_student_point_run as $sql_student_point_item) {
            
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


            $sheet->setCellValue('A' . $row_count, $stt);
            $sheet->setCellValue('B' . $row_count, $student_msv);
            $sheet->setCellValue('C' . $row_count, $student_name);
            $sheet->setCellValue('D' . $row_count, $sumOfOneGV);
            $sheet->setCellValue('E' . $row_count, $sumOfTwoGV);
            $sheet->setCellValue('F' . $row_count, $sumOfThreeGV);
            $sheet->setCellValue('G' . $row_count, $sumOfFourGV);
            $sheet->setCellValue('H' . $row_count, $sumOfFiveGV);
            $sheet->setCellValue('I' . $row_count, $sumGV);
            $sheet->setCellValue('J' . $row_count, '');
            $sheet->setCellValue('K' . $row_count, $sum_point);
            $sheet->setCellValue('L' . $row_count, $student_phone_number);
            $sheet->setCellValue('M' . $row_count, $gvNote);
            $sheet->setCellValue('N' . $row_count, $role_name);
            $row_count++;
            $stt++;
        }
        if($ext == 'xlsx'){
            $writer = new Xlsx($spreadsheet);
            $final_file_name = $fileName.'.xlsx';
        }

        // $writer->save($final_file_name);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$final_file_name.'"');
        $writer->save('php://output');
    } 
    else {
        // $_SESSION['status'] = 'NO Record found to export';
        // header('Location: exportFile.php');
        echo "Không có dữ liệu" . "<a href='exportFile.php'>Quay lại</a>";

        // echo "Lỗi";
    }
}
