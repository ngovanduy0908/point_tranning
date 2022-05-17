<?php
    ob_start();
    session_start();
    require_once('../../db/dbhelper.php');
    $path = '../../';
    $maSv = $msg = $name = $class_name = $maLop = "";
    if(isset($_GET['maSv'])){
        $maSv = $_GET['maSv'];
        $sql = "select students.*, class.class_name as class_name, class.maLop as maLop
                from students, class 
                where 
                students.maLop = class.maLop 
                and students.maSv = '$maSv'";
        $result = $connect->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $class_name = $row['class_name'];
            $role_id = $row['role_id'];
        }
    }
    // var_dump($_SESSION['user']);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Manager Edit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/grid.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../../assets/css/base_1.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <link rel="stylesheet" href="../../assets/css/form.css">



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">


    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="main ">
        <header class="main__header grid wide">
            <div class="header">
                <img src="../../assets/img/LOGO_DTDH.png" alt="" class="header__img">
            </div>
        </header>
        <div class="main__body grid wide">
            <h4 class="main__body_heading"><?=$_SESSION['user']['name']?> - Sửa Thông Tin Sinh Viên</h4>
            <div class="main__body_container">
                <!-- <ul class="body__container_list row">
                    
                    <li class="body__container_item col-lg-2">
                        <a href="./index.php" class="body__container_link"><button class="btn btn-warning"><i class="fas fa-arrow-circle-left"></i>Trang Chủ</button></a>
                    </li>
                    
                </ul> -->
                <div class="show_students">
                    <form action="" class="needs-validation form_css mb-2 mt-2" novalidate method="post">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="maSvUpdate">Mã Sinh Viên:</label>
                                <input type="text" class="form-control" id="maSvUpdate" placeholder="Enter username" name="maSvUpdate" required value="<?= $row['maSv'] ?>">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="name">Tên Sinh Viên:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter username" name="name" required value="<?= $name ?>">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="maLop">Lớp:</label>
                                <select name="maLop" id="maLop" class="form-control">
                                    <?php
                                        $sql = "select * from class";
                                        $result = $connect->query($sql);
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                if($row['class_name'] == $class_name){
                                                    echo '
                                                    <option selected value="'.$row['maLop'].'">'.$row['class_name'].'</option>                         
                                                ';
                                                }
                                                else{
                                                    echo '
                                                        <option value="'.$row['maLop'].'">'.$row['class_name'].'</option>                         
                                                    ';
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>


                            <div class="form-group col-lg-6">
                                <label for="role_id">Chức vụ:</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <?php
                                       $sql_role = "select * from role where id not in (1,2)";
                                       $sql_role_run = $connect->query($sql_role);
                                       if($sql_role_run->num_rows > 0){
                                           while($sql_role_run_item = $sql_role_run->fetch_assoc()){
                                               $id_role = $sql_role_run_item['id'];
                                               $role_name = $sql_role_run_item['name'];
                                               if($id_role == $role_id){
                                                    echo '
                                                    <option selected value="'.$id_role.'">'.$role_name.'</option>                         
                                                    ';
                                                }
                                                else{
                                                    echo '
                                                        <option value="'.$id_role.'">'.$role_name.'</option>                         
                                                    ';
                                                }
                                           }
                                       }
                                    ?>
                                </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                        </div>
                       
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="./index.php" class="btn btn-warning ml-3">Trang Chủ</a>

                    </form>
                    <?php
                        if(isset($_POST['maSvUpdate'])){
                            $maSvUpdate = $_POST['maSvUpdate'];
                            $maLop = $_POST['maLop'];
                            $name = $_POST['name'];
                            $role_id = $_POST['role_id'];
                            $sql = "update students 
                                    set 
                                    name = '$name', 
                                    maSv = '$maSvUpdate', 
                                    maLop = '$maLop',
                                    role_id = '$role_id'
                                    where maSv = '$maSv'";
                            if($connect->query($sql)){
                                header('Location: index.php');
                            }
                            else{
                                echo $connect->error;
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        
        <?php
            require_once $path.'footer.php';
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
    <?php
ob_end_flush();
    ?>
</body>
<style>
    .main__body_container{
        background-color: #fff;
    }
    .form_css{
        width: 600px;
    }
</style>
</html>