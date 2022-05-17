<?php
ob_start();
	require_once('../../../db/dbhelper.php');
    $name = $maKhoaHoc = $start_year = $final_year = "";
    $path = '../../../';
    if(isset($_GET['maKhoaHoc'])){
        $maKhoaHoc = $_GET['maKhoaHoc'];
        $sql = "select * from course where maKhoaHoc = '$maKhoaHoc'";
        $result = $connect->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $start_year = $row['start_year'];
            $final_year = $row['final_year'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-Thay Đổi Thông Tin Khóa Học</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../../assets/css/grid.css">
    <link rel="stylesheet" href="../../../assets/css/base.css">
    <link rel="stylesheet" href="../../../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../../../assets/css/footer.css">
    <link rel="stylesheet" href="../../../assets/css/form.css">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
 

</head>
<body>
    <div class="main ">
        <?php
            require_once '../../../header.php';
        ?>
        <div class="main__body grid wide">
            <h4 class="main__body_heading">ADMIN-Thay Đổi Thông Tin Khóa Học</h4>
            <!-- <nav class="nav nav-pills">
                <a href="./index.php" class="nav-item nav-link">
                   <button class="btn btn-primary"> <i class="fas fa-backward"></i> Trở Lại</button>
                </a>   
            </nav> -->
            
            <form action="" class="needs-validation form_css" novalidate method="post" >
                <div class="form-group">
                    <label for="maKhoaHocNew">Mã Khóa Học:</label>
                    <input type="text" class="form-control" id="maKhoaHocNew" placeholder="Enter username" name="maKhoaHocNew" required value="<?= $maKhoaHoc ?>">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="name">Tên Khóa Học:</label>
                    <input type="text" class="form-control" id="name" placeholder="" name="name" required value="<?= $name ?>">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="start_year">Năm Bắt Đầu:</label>
                    <input type="text" class="form-control" id="start_year" placeholder="" name="start_year" required value="<?= $start_year ?>">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="final_year">Năm Kết Thúc:</label>
                    <input type="text" class="form-control" id="final_year" placeholder="" name="final_year" required value="<?= $final_year ?>">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="./index.php" class="btn btn-warning ml-3">Quay lại</a>

            </form>
        </div>
        <?php
            if(isset($_POST['maKhoaHocNew'])){
                $maKhoaHocNew = $_POST['maKhoaHocNew'];
                $name = $_POST['name'];
                $start_year = $_POST['start_year'];
                $final_year = $_POST['final_year'];
                $sql = "update course set maKhoaHoc = '$maKhoaHocNew', name = '$name', start_year = '$start_year', final_year = '$final_year' where maKhoaHoc = '$maKhoaHoc'";
                if($connect->query($sql)){
                    header("Location: editor_success.php");
                }
                else{
                    echo $connect->error;
                }
            }
        ?>
       <?php
            require_once '../../../footer.php';
        ?>
    </div>

   
    
    <style>
        .main__body_form{
            border: 2px solid #79cff3;
            border-radius: 4px;
            padding-top: 5px; 
            padding-bottom: 5px; 
            width: 500px;
        }
    </style>
</body>
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
<?php
ob_end_flush();
?>
</html>