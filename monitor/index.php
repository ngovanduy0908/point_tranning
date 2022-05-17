<?php
    session_start();
    require_once('../db/dbhelper.php');
    if(isset($_SESSION['user'])){

        $maSv = $_SESSION['user']['maSv'];

        $maHK = $_SESSION['maHK'];

        $sql = "select class.* 
                from 
                class, students 
                where 
                class.maLop = students.maLop 
                and students.maSv = '$maSv'";

        $result = $connect->query($sql);
        if($result->num_rows > 0){
            $class = $result->fetch_assoc();

            $class_name = $class['class_name'];

            $maLop = $class['maLop']; 

            $sqlTime = "SELECT deadline.* 
                        from deadline, teacher, class 
                        where 
                        deadline.maGv = teacher.maGv 
                        and teacher.maGv = class.maGv 
                        and class.maLop = '$maLop'";

            $deadline = $connect->query($sqlTime);

            if($deadline->num_rows > 0){
                $deadlineItem = $deadline->fetch_assoc();
                $start_time_student = $deadlineItem['start_time_student'];
                $end_time_student = $deadlineItem['end_time_student'];
                $end_time_monitor = $deadlineItem['end_time_monitor'];
                $curDate = date('Y-m-d');
            }       
        }
        $hk = "select * from semester where maHK = '$maHK'";
        $resultHK = $connect->query($hk);
    
        if($resultHK-> num_rows > 0){
            $hkItem = $resultHK->fetch_assoc();
            $name = $hkItem['name'];
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Point Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <!-- <link rel="stylesheet" href="../assets/css/base_1.css"> -->
    <link rel="stylesheet" href="../assets/css/footer.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="main">
        <header class="main__header grid wide">
            <div class="header">
                <img src="../assets/img/LOGO_DTDH.png" alt="" class="header__img">
            </div>
        </header>
        <div class="main__body grid wide">
            <h4 class="main__body_heading">Danh Sách ĐRL Của Lớp - <?= $class_name ?> - <?php echo $name ?></h4>
            <div class="main__body_container">

                <ul class="body__container_list row nav">
                    
                    <li class="body__container_item col-lg-2">
                        <a href="./back.php" class="body__container_link"><button class="btn btn-warning"><i class="fas fa-arrow-circle-left"></i>Quay Lại</button></a>
                    </li>
                    <li class="body__container_item col-lg-6">
                        <a href="./filter_student_no_mark.php" class="btn btn-primary">Lọc sinh viên chưa chấm</a>
                        <!-- <a href="./back.php" class="body__container_link"><button class="btn btn-warning"><i class="fas fa-arrow-circle-left"></i>Quay Lại</button></a> -->
                    </li>
                    <li class="body__container_item col-lg-4">
                        <form action="" class="needs-validation" novalidate method="POST"> 
                            <div class="form-group">
                                <label for="searchMSV">Nhập mã sinh viên cần tìm:</label>
                                <input type="text" class="form-control" id="searchMSV" placeholder="VD: <?php echo $maSv ?>" name="searchMSV" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            
                            <button class="btn btn-primary mb-2">Tìm</button>
                        </form>
                    </li>
                </ul>
                
                <?php
                    if(isset($_SESSION['success'])){
                        echo '<b>'.$_SESSION['success'].'</b>';
                        unset($_SESSION['success']);
                    }
                ?>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="20px">STT</th>
                            <th>Mã Sinh Viên</th>
                            <th>Họ Tên</th>
                            <th style="width: 10%;">ĐRL SV Tự Đánh Giá</th>
                            <th style="width: 10%;">ĐRL LT Đánh Giá</th>
                            <th>Ghi chú</th>
                            <th>Trạng Thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($_POST['searchMSV'])){
                                $searchMSV = $_POST['searchMSV'];
                                $sql = "select students.*, point.*
                                        from 
                                        students, point
                                        where 
                                        students.maSv = point.maSv
                                        and point.maHK = '$maHK' 
                                        and students.maLop = '$maLop'
                                        and students.maSv = '$searchMSV'";

                                $result = $connect->query($sql);
                                if($result->num_rows > 0){
                                    $row = $result->fetch_assoc();
                                    // echo $row['point.status'];
                                    // echo $row['status'];
                                    echo '
                                    <tr>
                                        <td><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512H413.3C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM632.3 134.4c-9.703-9-24.91-8.453-33.92 1.266l-87.05 93.75l-38.39-38.39c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94l56 56C499.5 285.5 505.6 288 512 288h.4375c6.531-.125 12.72-2.891 17.16-7.672l104-112C642.6 158.6 642 143.4 632.3 134.4z"/></svg></td>
                                        <td>'.$row['maSv'].'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['point_student'].'</td>
                                        <td>'.$row['point_monitor'].'</td>
                                        <td>'.$row['ltNote'].'</td>
                                        ';
                                        if($row['status'] == '0'){
                                            echo '  
                                            <td>                                          
                                                Chưa Duyệt
                                                <a href="browserPoint.php?maSv='.$row['maSv'].'"><button class="btn btn-primary">Duyệt</button></a>
                                            </td>    
                                            ';
                                        }
                                        if($row['status'] == '1'){

                                            echo '
                                            <td>
                                                Đã duyệt 
                                                <a href="browserPoint.php?maSv='.$row['maSv'].'"><button class="btn btn-warning">Sửa</button></a>                           
                                            </td>    
                                            ';
                                        }

                                        echo '
                                    </tr>
                                    
                                    ';
                                }
                            }
                        else{
                            $sql = "select students.*, point.*
                                    from students, point
                                    where 
                                    students.maSv = point.maSv
                                    and point.maHK = '$maHK'
                                    and students.maLop = '$maLop'
                                    order by point.status asc, students.maSv asc
                                    ";

                            $result = $connect->query($sql);
                            if($result-> num_rows > 0){
                                $index = 0;
                                while($row = $result->fetch_assoc()){
                                    $student_proof_status = 0;
                                    $maSv = $row['maSv'];
                                    $sql_proof_student = "select * from student_proof_mark where maSv = '$maSv' and maHK = '$maHK'";
                                    $sql_proof_student_run = $connect->query($sql_proof_student);
                                    if($sql_proof_student_run->num_rows > 0){
                                        $student_proof_status = 1;
                                    }
                                    echo '
                                    <tr>
                                        <td>'.(++$index).'</td>
                                        <td>'.$row['maSv'].'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['point_student'].'</td>
                                        <td>'.$row['point_monitor'].'</td>
                                        <td>'.$row['ltNote'].'</td>
                                        ';
                                        if($row['status'] == '0'){
                                            echo '

                                            <td style="display: flex;align-items: center;justify-content: space-around;">
                                                Chưa Duyệt
                                                
                                                    <a href="browserPoint.php?maSv='.$row['maSv'].'"><button class="btn btn-success">Duyệt</button></a>
                                                    ';
                                            if($student_proof_status === 0){
                                                echo '
                                                <a href="browser_proof_student.php?maSv='.$row['maSv'].'" class="btn btn-success">Thêm minh chứng</a>
                                                ';
                                            }
                                            if($student_proof_status === 1){
                                                echo '
                                                <a href="browser_proof_student.php?maSv='.$row['maSv'].'" class="btn btn-info">Xét Minh chứng</a>
                                                ';
                                            }
                                            echo '
                                            </td>
                                            ';
                                        }
                                        if($row['status'] == '1'){
                                            
                                            echo '
                                            
                                            <td style="display: flex;align-items: center;justify-content: space-around;">
                                                Đã duyệt
                                                    
                                                    <a href="browserPoint.php?maSv='.$row['maSv'].'"><button class="btn btn-warning">Sửa</button></a>';
                                            if($student_proof_status === 0){
                                                echo '
                                                <a href="browser_proof_student.php?maSv='.$row['maSv'].'" class="btn btn-success">Thêm minh chứng</a>
                                                ';
                                            }

                                            if($student_proof_status === 1){
                                                echo '
                                                <a href="browser_proof_student.php?maSv='.$row['maSv'].'" class="btn btn-info">Xét minh chứng</a>
                                                ';
                                            }
                                            echo'
                                            </td>

                                            ';
                                        }

                                        echo '
                                    </tr>
                                    
                                    ';
                                }
                            }
                            else{
                                // echo $sql;
                                echo 'Chưa có sinh viên nào chấm điểm';
                            }
                        }
                        ?>
                    </tbody>
                </table>
                
            </div>
        </div>

        <?php
            require_once '../footer.php';
        ?>
        
    </div>
    
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
</body>
</html>