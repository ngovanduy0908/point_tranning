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
    <title>Choose See Mark</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main__body grid wide">
            <a href="./index.php"><button class="btn btn-primary mt-3">Trang Chủ</button></a>
            <h4 class="main__body_heading" style="margin: 5px 0 30px;"><?= $_SESSION['user']['name'] ?> - Các kì đã chấm điểm rèn luyện</h4>

            <div class="main__body_container">

                <?php
                $sql = "SELECT * from point, students, semester WHERE point.maSv = students.maSv and semester.maHK = point.maHK and students.maSv = '$maSv'";
                // $sql =""
                // $sql = "select hk.* from hk, diemsv where diemsv.maSv = '$maSv'";
                $result = $connect->query($sql);
                if ($result->num_rows > 0) {
                    $index = 0;

                    while ($row = $result->fetch_assoc()) {
                        echo '
                            <table class="table table-bordered table-dark table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Xem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>' . (++$index) . '</td>
                                        <td>' . $row['name'] . '</td>
                                        <td>
                                            <a href="seePoint.php?maHK=' . $row['maHK'] . '">
                                                <i class="bi bi-eye-fill"></i></td>
                                            
                                            </a>
                                    </tr>
                                </tbody>
                            </table>
                                    ';
                    }
                } else {
                ?>
                    <h1>Bạn chưa chấm điểm kì nào</h1>
                <?php
                }

                ?>

            </div>
        </div>
        <?php
            require_once '../footer.php';
        ?>
    </div>
    <style>
        .main__body_container{
            margin-bottom: 66px;
        }
    </style>
</body>

</html>