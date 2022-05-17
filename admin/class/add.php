<?php
    ob_start();
    session_start();
	require_once('../../db/dbhelper.php');
    $path = '../../';
    $maKhoa = $_SESSION['user']['maKhoa'];
    $maLop = $class_name = $msg = $maGv  = $maKhoaHoc = $id = "";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from class where maLop = '$id'";
        $result = $connect->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $maLop = $row['maLop'];
            $class_name = $row['class_name'];
            $maGv = $row['maGv'];
            $maKhoaHoc = $row['maKhoaHoc'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Lớp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/grid.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <link rel="stylesheet" href="../../assets/css/form.css">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">


</head>
<body>
    <div class="main">
        <?php
            require_once '../../header.php';
        ?>
        <h4 class="main__body_heading"><?=$_SESSION['user']['name']?> - Thêm Lớp</h4>   

        <div class="main__body grid wide">
            <form action="" method="POST" class="form_css mb-5 mt-4">
                <div class="row">
                    <div class="form-group col-lg-5">
                        <label for="">Mã Lớp</label>
                        <input type="text" class="form-control" name="maLop" value="<?php echo $maLop ?>">
                    </div>
                    <div class="form-group col-lg-7">
                        <label for="">Tên Lớp</label>
                        <input type="text" class="form-control" name="class_name" value="<?php echo $class_name ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-5">
                        
                        <select name="maGv" id="" class="form-control">
                            <option value="">--Giáo Viên Chủ Nhiệm--</option>
                            <?php
                                $sql = "select * from teacher where maKhoa = '$maKhoa'";
                                $result = $connect->query($sql);
                                if($result-> num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        if($row['maGv'] === $maGv){
                                            echo '
                                                <option selected value="'.$row['maGv'].'">'.$row['name'].'</option>                                                                                   
                                            ';
                                        }
                                        
                                            echo '
                                                <option value="'.$row['maGv'].'">'.$row['name'].'</option>                                                                                   
                                            ';

                                    }
                                    
                                    
                                    
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        
                    </div>
                    <div class="form-group col-lg-5">
                        <select name="maKhoaHoc" id="" class="form-control">
                            <option value="">--Khóa Học--</option>
                            <?php
                                $sql = "select * from course";
                                $result = $connect->query($sql);
                                if($result-> num_rows > 0){

                                    while($row = $result->fetch_assoc()){
                                        if($row['maKhoaHoc'] == $maKhoaHoc){
                                            echo '
                                                <option selected value="'.$row['maKhoaHoc'].'">'.$row['name'].'</option>                                                                                   
                                            ';
                                        }
                                        else{
                                            echo '
                                                <option value="'.$row['maKhoaHoc'].'">'.$row['name'].'</option>                                                                                   
                                            ';
                                        }
                                    }
                                }
                            ?>
                        </select>
                    </div>
                   
                </div>
                <button class="btn btn-success">Lưu</button>
                <a href="index.php" class="btn btn-primary ml-3">Trở lại</a>
            </form>
            <?php
                if(!empty($_POST['maLop'])){
                    $maLop = $_POST['maLop'];
                    if(isset($_POST['class_name'])){
                        $class_name = $_POST['class_name'];

                    }
                    if(isset($_POST['maGv'])){
                        $maGv = $_POST['maGv'];
                    }
                    if(isset($_POST['maKhoaHoc'])){
                        $maKhoaHoc = $_POST['maKhoaHoc'];
                    }
                    $sql = "insert into class (maLop, maGv, class_name, maKhoaHoc, maKhoa) values ('$maLop', '$maGv', '$class_name', '$maKhoaHoc', '$maKhoa')";
                    if($connect->query($sql)){
                        header('Location: index.php');
                        die();
                    }
                    else{
                        echo $connect->error;

                    }
                }
                ob_end_flush();
            ?>
        </div>

        <?php
            require_once '../../footer.php';
        ?>
    </div>

    
    <style>
       .main__body-form{
           width: 60%;
           margin: 40px auto;
       }

       .form_css{
        width: 60%;
           
       }
    </style>
</body>

</html>