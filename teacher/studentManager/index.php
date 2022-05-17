<?php
session_start();
require_once('../../db/dbhelper.php');
$path = '../../';
$maSv = $msg = "";
// var_dump($_SESSION['user']);
if (isset($_SESSION['maLop'])) {
    $maLop = $_SESSION['maLop'];
    $sql_class = "select * from class where maLop = '$maLop'";
    $sql_class_run = $connect->query($sql_class);
    if($sql_class_run->num_rows > 0){
        $class_name = $sql_class_run->fetch_assoc()['class_name'];
    }
}
if (isset($_POST['maSv'])) {
    $maSv = $_POST['maSv'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Manager Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/grid.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/base_1.css">

    <link rel="stylesheet" href="../../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

 

</head>

<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main__body">
            <h4 class="main__body_heading"><?= $_SESSION['user']['name'] ?> - Quản Lý Sinh Viên - <?=$class_name?></h4>
            <div class="main__body_container mb-4" style="margin-top: 30px;">
                <ul class="body__container_list row grid wide">

                    <li class="body__container_item">
                        <a href="../index.php" class="body__container_link">Trang Chủ</a>
                    </li>
                    <li class="body__container_item">
                        <a href="./addStudent.php" class="body__container_link">Thêm Sinh Viên</a>
                    </li>

                    <li class="upload_point">
                        <a href="#" class="body__container_link">Upload</a>  
                        <ul class="upload_point_list">
                            <li class="upload_point_item">
                                <a href="./upload_student.php" class="upload_point_link">Upload file SV</a>
                            </li>
                            <li class="upload_point_item">
                                <a href="./upload_citizen_student.php" class="upload_point_link">Upload file điểm tuần CDSV</a>
                            </li>
                            <li class="upload_point_item">
                                <a href="./upload_point_student.php" class="upload_point_link">Upload file điểm TBHK</a>
                            </li>
                        </ul>
                    </li>

                   
                    <li class="body__container_item">
                        
                        <form action="" class="needs-validation" novalidate method="POST" style="margin-top: 3px;">
                            
                            <input type="search" name="maSv" id="" value="<?php echo $maSv ?>" class="form-control" placeholder="Nhập MSV cần tim">
                            
                        </form>
                    </li>
                    <li class="body__container_item">
                        <a href="../../login/logout.php" class="body__container_link">Đăng Xuất</a>
                    </li>
                </ul>
            </div>
            
                <div class="show_students grid wide">
                    <h6><?php
                        if(isset($_SESSION['status'])){
                            echo $_SESSION['status'];
                            unset($_SESSION['status']);
                        }
                    ?></h6>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Sinh Viên</th>
                                <th>Họ Và Tên</th>
                                <!-- <th>Lớp</th> -->
                                <th>Chức vụ</th>
                                <th><i class="fas fa-edit"></i></th>
                                <th><i class="fas fa-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['maSv'])) {
                                $maSv = $_POST['maSv'];
                                $sql = "select students.*, role.name as role_name, class.class_name as class_name 
                                        from 
                                        students, class, role 
                                        where 
                                        role.id = students.role_id
                                        and students.maLop = class.maLop 
                                        and students.maLop = '$maLop' 
                                        and students.maSv = '$maSv' 
                                        order by maSv ";
                                $result = $connect->query($sql);
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    echo '
                                        <tr>
                                            <td><i class="far fa-user"></i></td>
                                            <td>' . $row['maSv'] . '</td>
                                            <td>' . $row['name'] . '</td>
                                            <td>' . $row['class_name'] . '</td>
                                            <td>' . $row['role_name'] . '</td>
                                            <td>    
                                                <a class="btn btn-warning" href="./editor.php?maSv=' . $row['maSv'] . '">Sửa</a>
                                            </td>
                                            <td>    
                                                <a class="btn btn-danger" href="./delete.php?maSv=' . $row['maSv'] . '">Xóa</a>
                                            </td>
                                        </tr>
                                        ';
                                } else {
                                    $msg = "Không tìm thấy sinh viên có mã là " . $maSv . "";
                                }
                            } else {
                                $sql = "select students.*, class.class_name as class_name, role.name as role_name
                                        from 
                                        students, class, role
                                        where 
                                        students.role_id = role.id
                                        and students.maLop = class.maLop 
                                        and students.maLop = '$maLop' 
                                        order by maSv ";
                                $result = $connect->query($sql);
                                if ($result->num_rows > 0) {
                                    $index = 0;
                                    while ($row = $result->fetch_assoc()) {
                                        echo '
                                            <tr>
                                                <td>' . (++$index) . '</td>
                                                <td>' . $row['maSv'] . '</td>
                                                <td>' . $row['name'] . '</td>
                                                

                                                ';
                                                if($row['role_name'] != 'Sinh Viên'){
                                                    echo '
                                                    <td style="color: red">' . $row['role_name'] . '</td>';
                                                }
                                                else{
                                                    echo '
                                                <td>' . $row['role_name'] . '</td>';
                                                }
                                                echo '
                                                
                                                <td>    
                                                    <a class="btn btn-warning" href="./editor.php?maSv=' . $row['maSv'] . '">Sửa</a>
                                                </td>
                                                <td>    
                                                    <button data-id='.$row['maSv'].' class="btn_delete btn btn-danger">Xóa</button>

                                                </td>
                                            </tr>
                                            ';
                                    }
                                    // <a href="./delete.php?maSv=' . $row['maSv'] . '">Xóa</a>

                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <h4><?php echo $msg ?></h4>
                </div>
        </div>

        <?php
            require_once '../../footer.php';
        ?>
    </div>
    <?php mysqli_close($connect) ?>

    <script>
        $(document).ready(function(){
            $('.btn_delete').click(function(){
                let maSv = $(this).data('id');
                
                var option = confirm('Bạn có chắc chắn muốn xóa danh mục này không? ');
                if(!option){
                    return;
                }
                
                $.ajax({
                    url: 'ajax_delete.php',
                    method: 'POST',
                    data: {
                        maSv: maSv
                    },
                    success: function(data) {
                        alert('Xóa thành công');
                        location.reload();
                    }
                })
            })
        })
    </script>

    <script>
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
    <style>
        .body__container_list {
            display: flex;
            justify-content: space-between;
        }

        .upload_point{
            position: relative;
        }

        .upload_point:hover .upload_point_list{
            display: block;
        }

        .upload_point_list{
            position: absolute;
            top: 46px;
            right:0;
            list-style: none;
            background-color: rgba(127,192,238,0.6);
            text-align: right;
            width: 250px;
            z-index: 2;
            border-radius: 6px;
            display: none;
        }

        .upload_point_list::before{
            content:"";
            position: absolute;
            top: -16px;
            right: 0;
            display: block;
            background-color: transparent;
            width: 120px;
            height: 24px;
            display: block;
        }

        

        .upload_point_link{
            padding: 5px 8px;
            display: block;
            color: #080808;
            
        }
    </style>
</body>

</html>