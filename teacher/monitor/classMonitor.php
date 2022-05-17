<?php
    session_start();
    require_once('../../db/dbhelper.php');
    $path = '../../';
    $maSv = $msg = "";
    if(isset($_SESSION['maLop'])){
        $maLop = $_SESSION['maLop'];
        // var_dump($maLop);
    }
    // var_dump($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/grid.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main__body grid wide">
            <h4 class="main__body_heading"><?=$_SESSION['user']['name']?> - Quản Lý Lớp Trưởng</h4>
            <div class="main__body_container">
                <ul class="body__container_list row">
                    
                    <li class="body__container_item col-lg-2">
                        <a href="../index.php" class="body__container_link"><button class="btn btn-warning"><i class="fas fa-arrow-circle-left"></i>Trang Chủ</button></a>
                    </li>
                    <li class="body__container_item col-lg-2">
                        <!-- <a href="./addStudent.php" class="body__container_link"><button class="btn btn-success">Thêm Sinh Viên</button></a> -->
                    </li>
                    <li class="body__container_item col l-2">
                        <!-- <a href="./classMonitor.php" class="body__container_link">Chọn Lớp Trưởng</a> -->
                    </li>
                    <li class="body__container_item col-lg-4">
                        <a href="./dateTime.php" class="body__container_link">Tìm Kiếm Sinh Viên</a>
                        <form action="" class="needs-validation" novalidate method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" id="uname" placeholder="Nhập mã sinh viên cần tìm..." name="maSv" required value="<?= $maSv ?>">
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tìm Kiếm<i class="fas fa-search"></i></button>
                        </form>
                    </li>
                    <li class="body__container_item col-lg-2">
                        <a href="../../login/logout.php" class="body__container_link"><button class="btn btn-danger">Đăng Xuất</button></a>
                    </li>
                </ul>
                <div class="show_students">
                    <table class="table table-striped table-bordered table-hover table-dark">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Sinh Viên</th>
                                <th>Họ Và Tên</th>
                                <th>Lớp</th>
                                <th>Email</th>
                                <th></th>
                                <!-- <th></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_POST['maSv'])){
                                    $maSv = $_POST['maSv'];

                                    $sql = "select students.*, class.class_name as class_name 
                                    from students, class 
                                    where students.maLop = class.maLop 
                                    and students.maSv = '$maSv' 
                                    and students.maLop = '$maLop'";

                                    $result = $connect->query($sql);
                                    if($result->num_rows > 0){
                                        $row = $result->fetch_assoc();
                                        if($row['role_id'] == 3){
                                            echo '
                                                <tr style="color: red; background-color: white">
                                                    <td>1</td>
                                                    <td>'.$row['maSv'].'</td>
                                                    <td>'.$row['name'].'</td>
                                                    <td>'.$row['class_name'].'</td>
                                                    <td>'.$row['email'].'</td>
                                                
                                                    <td>    
                                                        <a href="./deleteMonitor.php?maSv='.$row['maSv'].'">Hủy Lớp Trưởng</a>
                                                    </td>
                                                </tr>
                                                ';
                                        }
                                        else{
                                            echo '
                                                <tr>
                                                    <td>1</td>
                                                    <td>'.$row['maSv'].'</td>
                                                    <td>'.$row['name'].'</td>
                                                    <td>'.$row['class_name'].'</td>
                                                    <td>'.$row['email'].'</td>
                                             
                                                    <td>    
                                                        <a href="./monitor.php?maSv='.$row['maSv'].'">Đặt Lớp Trưởng</a>
                                                    </td>
                                                </tr>
                                                ';
                                        }
                                       
                                    }
                                    else{
                                        $msg = "Không tìm thấy sinh viên có mã là ".$maSv."";
                                    }
                                }
                                else{
                                    $sql = "SELECT role_id FROM `students` WHERE maLop = '$maLop' and role_id = '3'";

                                    $result = $connect->query($sql);

                                    if($result->num_rows > 0){

                                        $sql = "select students.*, class.class_name as class_name 
                                        from students, class 
                                        where 
                                        students.maLop = class.maLop 
                                        and students.maLop = '$maLop' 
                                        order by role_id ";

                                        $result = $connect->query($sql);
                                        if($result->num_rows > 0){
                                            $index = 0;
                                            while($row = $result->fetch_assoc()){
                                                if($row['role_id'] == 3){
                                                    echo '
                                                    <tr style="color: red; background-color: white">
                                                        <td>'.(++$index).'</td>
                                                        <td>'.$row['maSv'].'</td>
                                                        <td>'.$row['name'].'</td>
                                                        <td>'.$row['class_name'].'</td>
                                                        <td>'.$row['email'].'</td>
                                                 
                                                        <td>    
                                                            <a href="./deleteMonitor.php?maSv='.$row['maSv'].'">Hủy Lớp Trưởng</a>
                                                        </td>
                                                    </tr>
                                                    ';
                                                }
                                                else{
                                                    echo '
                                                    <tr>
                                                        <td>'.(++$index).'</td>
                                                        <td>'.$row['maSv'].'</td>
                                                        <td>'.$row['name'].'</td>
                                                        <td>'.$row['class_name'].'</td>
                                                        <td>'.$row['email'].'</td>
                                                 
                                                        <td>    
                                                            <a href="./delete.php?maSv='.$row['maSv'].'"></a>
                                                        </td>
                                                    </tr>
                                                    ';
                                                }
                                            }
                                        }
                                    }
                                    else{
                                        
                                        $sql = "select students.*, class.class_name as class_name 
                                        from students, class 
                                        where 
                                        students.maLop = class.maLop 
                                        and students.maLop = '$maLop'";

                                        $result = $connect->query($sql);
                                        if($result->num_rows > 0){
                                            $index = 0;
                                            while($row = $result->fetch_assoc()){
                                                echo '
                                                <tr>
                                                    <td>'.(++$index).'</td>
                                                    <td>'.$row['maSv'].'</td>
                                                    <td>'.$row['name'].'</td>
                                                    <td>'.$row['class_name'].'</td>
                                                    <td>'.$row['email'].'</td>
                                             
                                                    <td>    
                                                        <a href="./monitor.php?maSv='.$row['maSv'].'">Đặt Lớp Trưởng</a>
                                                    </td>
                                                </tr>
                                                ';
                                            }
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <h4><?php echo $msg ?></h4>
                </div>
            </div>
        </div>

        <?php
            require_once '../../footer.php';
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