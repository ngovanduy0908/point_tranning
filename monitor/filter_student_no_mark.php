
<?php
session_start();
// var_dump($_SESSION);
require_once('../db/dbhelper.php');

$maLop = $_SESSION['user']['maLop'];
$maHK = $_SESSION['maHK'];
$path = '../';
$sql_student_no_exists = "
        SELECT * 
        from 
        students 
        where 
        maLop = '$maLop' 
        AND 
        maSv 
        not in 
            (SELECT (students.maSv) 
            from students 
            LEFT JOIN 
            point 
            on students.maSv = point.maSv 
            LEFT JOIN 
            semester 
            on point.maHK = semester.maHK 
            WHERE 
            students.maLop = '$maLop' 
            and point.maHK = '$maHK');
    ";

$sql_student_exists_run = $connect->query($sql_student_no_exists);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <!-- <link rel="stylesheet" href="../assets/css/base_1.css"> -->
    <link rel="stylesheet" href="../assets/css/footer.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>

        <div class="main_body grid wide mt-3">
        <?php

            if ($sql_student_exists_run->num_rows > 0) {
            ?>
                <a href="./index.php" class="btn btn-primary mr-3">Quay lại</a>
                <a href="mark_zero_students.php"  class="btn btn-warning mr-3">Xét DRL = 0</a>

                <table class="table table-bordered table-striped table-hover mt-3">
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Msv</th>

                    </tr>


                    <?php
                    $index = 0;
                    while ($sql_student_no_exists_item = $sql_student_exists_run->fetch_assoc()) {

                    ?>
                        <tr>
                            <td><?= ++$index ?></td>
                            <td><?= $sql_student_no_exists_item['name'] ?></td>
                            <td><?= $sql_student_no_exists_item['maSv'] ?></td>

                        </tr>
                    <?php
                    } ?>
                </table>
            <?php
            }
            else{
                echo 'Sinh viên cả lớp đã hoàn thành chấm điểm rèn luyện';
            }

        ?>
        </div>
        <?php
            require_once $path.'footer.php';
        ?>
    </div>
</body>
</html>

