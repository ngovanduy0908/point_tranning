<?php
ob_start();
	require_once('../../../db/dbhelper.php');
    $name = $semester = $year = "";
    $path = '../../../';
    if(isset($_GET['maHK'])){
        $maHK = $_GET['maHK'];
        $sql = "select * from semester where maHK = '$maHK'";
        $result = $connect->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $year = $row['year'];
            $semester = $row['semester'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-Thay Đổi Thông Tin Học Kì</title>
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
            <h4 class="main__body_heading">ADMIN-Thay Đổi Thông Tin Học Kì</h4>
            <!-- <nav class="nav nav-pills">
                <a href="./index.php" class="nav-item nav-link">
                   <button class="btn btn-primary"> <i class="fas fa-backward"></i> Trở Lại</button>
                </a>   
            </nav> -->
            
            <form action="" class="needs-validation form_css" novalidate method="post" >
                <div class="form-group">
                    <label for="maHKNew">Mã HK:</label>
                    <input type="text" class="form-control" id="maHKNew" placeholder="Enter username" name="maHKNew" required value="<?= $maHK ?>">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="name">Tên HK:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter text" name="name" required value="<?= $name ?>">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="semester">Học Kì:</label>
                    <!-- <input type="text" class="form-control" id="semester" placeholder="Enter text" name="semester" required value="<?= $semester ?>"> -->
                    <select name="semester" id="">
                        
                        <option value="1" <?php  if($semester == 1) {
                            echo 'selected';
                        } else{
                            echo '';
                        }?>>1</option>
                        <option value="2" <?php  if($semester == 2) {
                            echo 'selected';
                        } else{
                            echo '';
                        }?>>2</option>
                    </select>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="year">Năm:</label>
                    <input type="text" class="form-control" id="year" placeholder="Enter text" name="year" required value="<?= $year ?>">
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="./index.php" class="btn btn-warning ml-3">Quay lại</a>
            </form>
        </div>
        <?php
            require_once '../../../footer.php';
        ?>
        <?php
            if(isset($_POST['maHKNew'])){
                $maHKNew = $_POST['maHKNew'];
                $name = $_POST['name'];
                $semester = $_POST['semester'];
                $year = $_POST['year'];
                $sql = "update semester set maHK = '$maHKNew', name = '$name', year = '$year', semester = '$semester' where maHK = '$maHK'";
                if($connect->query($sql)){
                    header("Location: index.php");
                }
                else{
                    echo $connect->error;
                }
            }
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
mysqli_close($connect);
?>
</html>