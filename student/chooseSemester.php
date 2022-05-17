<?php
session_start();

require_once('../db/dbhelper.php');
$path = '../';

if (isset($_SESSION['user'])) {
    $maSv = $_SESSION['user']['maSv'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Choose Semester</title>
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
 
        <div class="main__body grid wide" style="padding-bottom: 90px">

            <h4 class="main__body_heading mb-4"><?= $_SESSION['user']['name'] ?> - Chọn Kì Chấm Điểm Rèn Luyện</h4>


            <div class="main__body_container">

                <form action="" class="needs-validation" novalidate method="POST" style="border: 2px solid;width: 500px; margin: 0 auto 25px;padding: 12px 14px;border-radius: 6px;">
                    <div class="form-group">
                        <select name="maHK" id="" class="form-control">
                            <option value="">--Chọn Kì Chấm ĐRL--</option>
                            <?php
                            $sql = "select * from semester where status = '1'";
                            $result = $connect->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                        <option value="' . $row['maHK'] . '">' . $row['name'] . '</option>                    
                                    ';
                                }
                            }
                            ?>

                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Chọn</button>
                    <a href="index.php" class="btn btn-warning ml-3">Quay Lại</a>

                </form>

                <?php
                if (isset($_POST['maHK'])) {
                    $maHK = $_POST['maHK'];
                    $_SESSION['maHK'] = $maHK;
                    header('Location: directional.php');
                }
                ?>
                
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