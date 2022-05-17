<?php
session_start();
require_once('../../db/dbhelper.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


if(isset($_POST['maHK'])){
    $maHK = $_POST['maHK'];
    $allowed_ext = ['xls', 'csv', 'xlsx'];
    
    $fileName = $_FILES['import_file']['name'];

    $checking = explode(".", $fileName);
    $file_ext = end($checking);
    if(in_array($file_ext, $allowed_ext)){
        $targetPath = $_FILES['import_file']['tmp_name'];
/** Load $inputFileName to a Spreadsheet object **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach($data as $key => $value){
            if($key > 0){
                $maSv = $value[1];
                $point = $value[3];
            }
            $checkStudent = "select maSv from point_citizen where maSv = '$maSv' and maHK = '$maHK'";
            $checkStudent_result = mysqli_query($connect, $checkStudent);

            if($checkStudent_result->num_rows > 0){
                // Already Exists means please Update
                $up_query_student = "update table point_citizen set point = '$point' where maSv = '$maSv' and maHK = '$maHK'";
                $up_result_student = mysqli_query($connect, $up_query_student);
                $msg  = 1;

            }
            else{
                // New record Insert
                $in_query_student = "insert into point_citizen (maSv, maHK, point) values ('$maSv', '$maHK', '$point')";
                $in_result_student = mysqli_query($connect, $in_query_student);
                $msg = 1;
            }

        }

        if(isset($msg)){
            $_SESSION['status'] = 'Nhập dữ liệu thành công';
            header('Location: ./upload_citizen_student.php');
            exit;
        }
        else{
            $_SESSION['status'] = 'Nhập dữ liệu thất bại';
            header('Location: ./upload_citizen_student.php');
            exit;
        }
    }
    else{
        $_SESSION['status'] = 'File không hợp lệ';
        header('Location: ./upload_citizen_student.php');
        exit;
    }
}