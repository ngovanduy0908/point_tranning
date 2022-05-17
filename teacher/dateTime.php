<?php
    ob_start();
    session_start();
    require_once('../db/dbhelper.php');
    $start_time_student = $end_time_student = $end_time_monitor = "";
    $path = '../';
    if(isset($_SESSION['user'])){
        $maGv = $_SESSION['user']['maGv'];
        $sql = "select * from deadline where maGv = '$maGv'";
        $deadline = $connect->query($sql);
        if($deadline->num_rows > 0){
            $deadlineItem = $deadline->fetch_assoc();
            $start_time_student = $deadlineItem['start_time_student'];
            $end_time_student = $deadlineItem['end_time_student'];
            $end_time_monitor = $deadlineItem['end_time_monitor'];
        }
    }
    // var_dump($maGv);
    
    // var_dump($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Time</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/footer.css">

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
        <div class="main__body">
            <h4 class="main__body_heading mb-3"><?=$_SESSION['user']['name']?> - Thời Gian Chấm ĐRL</h4>
            <div class="main__body_container grid wide">
                <!-- <ul class="body__container_list row">
                    
                    <li class="body__container_item col-lg-2">
                    </li>
    
                </ul> -->
                <div class="" style="width: 400px;border: 1px solid;padding: 8px 12px;border-radius: 6px;margin: 10px auto 0;">
                    

                    <form action="" class="needs-validation" novalidate method="POST">
                        <div class="form-group">
                            <label for="start_time_student">Ngày Bắt Đầu SV Chấm:</label>
                            <input type="date" required class="form-control" id="start_time_student" name="start_time_student" value = '<?php echo $start_time_student ?>'>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="end_time_student">Ngày Kết Thúc SV Chấm:</label>
                            <input type="date" class="form-control" id="end_time_student" name="end_time_student" required value = '<?php echo $end_time_student ?>'>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                        <label for="end_time_monitor">Ngày Lớp Trưởng Xét:</label>
                            <input type="date" class="form-control" id="end_time_monitor" name="end_time_monitor" required value = '<?php echo $end_time_monitor ?>'>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <button class="btn btn-success">Lưu</button>
                        <a href="./chooseClass.php" class="btn btn-warning ml-3">Trang Chủ</a>

                    </form>
                </div>
            </div>
            <?php
                require_once '../footer.php';
            ?>
        </div>
        <?php
            if(isset($_POST['start_time_student'])){
                $start_time_student = $_POST['start_time_student'];
                $end_time_monitor = $_POST['end_time_monitor'];
                $end_time_student = $_POST['end_time_student'];
                $sql = "select * from deadline where maGv = '$maGv'";
                $result = $connect->query($sql);

                if($result->num_rows > 0){
                    $sql = "update deadline set start_time_student = '$start_time_student', end_time_student = '$end_time_student', end_time_monitor = '$end_time_monitor' where maGv = '$maGv'";
                    if($connect->query($sql)){
                        header("Location: chooseClass.php");
                    }
                    else{
                        echo $connect->error;
                    }
                }
                else{
                    $sql = "insert into deadline (maGv, start_time_student, end_time_student, end_time_monitor) values ('$maGv', '$start_time_student', '$end_time_student', '$end_time_monitor')";

                    if($connect->query($sql)){
                        header("Location: chooseClass.php");
                    }
                    else{
                        echo $connect->error;
                    }
                }
            }
            ob_end_flush();
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