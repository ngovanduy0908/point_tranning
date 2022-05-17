<?php
session_start();
require_once('../../db/dbhelper.php');
require 'vendor/autoload.php';
$maLop = $_SESSION['maLop'];

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['import_file_btn'])){
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
                $name = $value[2];
            }
            $checkStudent = "select maSv from students where maSv = '$maSv'";
            $checkStudent_result = mysqli_query($connect, $checkStudent);

            if($checkStudent_result->num_rows > 0){
                // Already Exists means please Update
                $up_query_student = "update table students set name = '$name', maLop = '$maLop' where maSv = '$maSv'";
                $up_result_student = mysqli_query($connect, $up_query_student);
                $msg  = 1;

            }
            else{
                // New record Insert
                $in_query_student = "insert into students (maSv, name, maLop) values ('$maSv', '$name', '$maLop')";
                $in_result_student = mysqli_query($connect, $in_query_student);
                $msg = 1;
            }

        }

        if(isset($msg)){
            $_SESSION['status'] = 'Nhập dữ liệu thành công';
            header('Location: index.php');
            exit;
        }
        else{
            $_SESSION['status'] = 'Nhập dữ liệu thất bại';
            header('Location: index.php');
            exit;
        }
    }
    else{
        $_SESSION['status'] = 'File không hợp lệ';
        header('Location: index.php');
        exit;
    }
}