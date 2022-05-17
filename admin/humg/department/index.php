<?php
	require_once('../../../db/dbhelper.php');
    $path = '../../../';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-Quản Lý Khoa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../../assets/css/grid.css">
    <link rel="stylesheet" href="../../../assets/css/base.css">
    <link rel="stylesheet" href="../../../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../../../assets/css/footer.css">


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
            <h4 class="main__body_heading">HUMG-Quản lý khoa</h4>
            <nav class="nav nav-pills">
                <a href="../index.php" class="nav-item nav-link">
                    <i class="fas fa-backward"></i> Trang Chủ
                </a>
                <a href="add.php" class="nav-item nav-link">
                    <i class="fas fa-plus"></i> Thêm Khoa
                </a>
                <form class="d-flex" method="post">
                    <div class="input-group">                    
                        <input type="text" class="form-control" placeholder="VD: 105" name="maKhoa">
                        <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                
            </nav>
            <table class="table table-hover table-bordered table-hover mt-2 ">
                <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Mã Khoa</th>
                    <th>Tên Khoa</th>
                    <th>Tài Khoản</th>
                    <th>Mật Khẩu</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_POST['maKhoa'])){
                            $maKhoa = $_POST['maKhoa'];
                            $sql = "select * from department where maKhoa = '$maKhoa'";
                            $result = $connect->query($sql);
                            if($result->num_rows > 0){
                                $row = $result->fetch_assoc();
                                echo '
                                </tr>
                                    <td></td>
                                    <td>'.$row['maKhoa'].'</td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['account'].'</td>
                                    <td>'.$row['password'].'</td>
                                    <td>             
                                        <a href="./editor.php?maKhoa='.$row['maKhoa'].'"><button class="btn btn-secondary">Sửa</button></a>                        
                                    </td>
                                    <td>
                                        <a href="./delete.php?maKhoa='.$row['maKhoa'].'"><button class="btn btn-dark">Xóa</button></a>                        
                                    
                                    </td>
                                </tr>';
                                
                            }
                        }
                        else{
                            $sql = "select * from department";
                            $result = $connect->query($sql);
                            if($result->num_rows > 0){
                                $index = 0;
                                while($row = $result->fetch_assoc()){
                                    if($index % 2 == 0){
                                        echo '
                                            <tr class="table-success">
                                        '; 
                                    }
                                    else{
                                        echo '<tr>';
                                    }
                                    echo'
                                        <td>'.(++$index).'</td>
                                        <td>'.$row['maKhoa'].'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['account'].'</td>
                                        <td>'.$row['password'].'</td>
                                        <td>             
                                            <a href="./editor.php?maKhoa='.$row['maKhoa'].'"><button class="btn btn-secondary">Sửa</button></a>                        
                                        </td>
                                        <td>
                                            <button class="btn btn-dark btn-delete" data-id='.$row['maKhoa'].'>Xóa</button>
                                        
                                        </td>
                                    </tr>';
                                }
                            }
                        }
                    ?>
                </tbody>
                <!-- <a href="./delete.php?maKhoa='.$row['maKhoa'].'"><button class="btn btn-dark">Xóa</button></a>                         -->

            </table>
        </div>
        
        <?php
            require_once '../../../footer.php'
        ?>
       
    </div>

   
    
    <style>
        .main__body_form{
            border: 2px solid #79cff3;
            border-radius: 4px;
            padding-top: 5px; 
            padding-bottom: 5px; 
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function(){
                let maKhoa = $(this).data('id')

                var option = confirm('Bạn có chắc chắn muốn xóa danh mục này không? ');
                if(!option){
                    return;
                }
                
                $.ajax({
                    url: 'ajax_delete.php',
                    method: 'POST',
                    data: {
                        maKhoa: maKhoa
                    },
                    success: function(data) {
                        alert('Xóa thành công');
                        location.reload();
                    }
                })
            })
        })
    </script>
</body>

</html>