<?php
    session_start();
    require_once './sql_select_class.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Danh Sách Điểm Tuần TBHK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../assets/css/grid.css">
  <link rel="stylesheet" href="../../assets/css/base.css">
  <link rel="stylesheet" href="../../assets/css/base_1.css">

  <link rel="stylesheet" href="../../assets/css/khoaCss.css">
  <link rel="stylesheet" href="../../assets/css/footer.css">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <div class="main">
        <?php
            require_once $path . 'header.php';
        ?> 
        <div class="main_body grid wide">
            <h4 class="text-center"><?= $_SESSION['user']['name'] ?>-<?= $class_name ?></h4>
            <h5 class="text-center">
            Chọn file danh sách điểm tuần TBHK của sinh viên lớp <?= $class_name ?>
            </h5>
            
            <h6><?php
                if(isset($_SESSION['status'])){
                    echo $_SESSION['status'];
                    unset($_SESSION['status']);
                }
            ?></h6>
            <form action="upload_point_student_excel.php" method="POST" enctype="multipart/form-data" style="border: 2px solid;width: 600px;margin: 10px auto 20px;border-radius: 8px;padding: 20px 20px;box-shadow: 0 5px 2px -3px;">
                <?php
                    require_once './select_semester.php';
                ?>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="customFile" name="import_file">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <!-- <input type="file" name="import_file" id=""> -->
                <button type="submit" name="import_file_btn" class="btn btn-success">upload/import</button>
                <a href="./index.php" class="btn btn-primary ml-3">Quay lại</a>

            </form>
            <table id="show_point_average" class="table table-striped table-bordered">

            </table>
        </div>
        <?php
            require_once $path .'footer.php';
        ?>
    
    <script>
        $(document).ready(function(){
            $('#maHK').change(function(){
                var maHK = $(this).val(); 
                $.ajax({
                    url: 'ajax_average_action.php',
                    method: 'POST',
                    data: {
                        maHK: maHK
                    },
                    success: function(data) {

                        $('#show_point_average').html(data);
                    }
                })
            })
        })
    </script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</body>
</html>