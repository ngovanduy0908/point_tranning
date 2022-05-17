<?php
    ob_start();
    session_start();
    
    $path = '../';
    require_once $path.'db/dbhelper.php';
    // var_dump($_SESSION);
    $maHK = $maSv = '';
    if(isset($_SESSION)){
        $maHK = $_SESSION['maHK'];
        
    }
    if(isset($_GET['maSv'])){
        $maSv = $_GET['maSv'];
    }

    $sql_name_student = "select name from students where maSv = '$maSv'";
    $sql_name_student_run = $connect->query($sql_name_student);
    if($sql_name_student_run->num_rows > 0){
        $name_student = $sql_name_student_run->fetch_assoc()['name'];
    }

   
    // var_dump($sql_get_proof_img_run);
    // exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/base_1.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="main">
        <?php
            require_once $path.'header.php';
        ?>
        <div class="main_body grid wide">
            <a href="./index.php" class="btn btn-primary mt-3">Quay lại</a>
            
            <h3 class="text-center">Minh chứng của <?= $name_student ?></h3>
            <form action="" method="post" enctype="multipart/form-data" style="border: 2px solid;width: 600px;margin: 10px auto 20px;border-radius: 8px;padding: 20px 20px;box-shadow: 0 5px 2px -3px;">
                <p class="text-left">Sinh viên xóa ảnh cũ trước khi muốn upload lại ảnh</p>
                <p class="text-left">Tên file : msv_ten_minh_chung</p>    
                <div class="custom-file mb-3">
                    <input type="file" name="images[]" id="" multiple="multiple" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>

                </div> 
                <button type="submit" class="btn btn-success">Chọn</button>
            </form>
        
    

    
    <?php
        if(isset($_FILES['images'])){
            $uploadOk = 0;
           $files = $_FILES['images'];
           $file_names = $files['name'];

           foreach($files['type'] as $key => $value){
               // Allow certain file formats
                if($value != "image/jpeg" && $value != "image/jpg" && $value != "image/png") {
                    $uploadOk = 1;
                }
           }

           if($uploadOk == 0){
                foreach($file_names as $key => $value){
                    move_uploaded_file($files['tmp_name'][$key], $path.'assets/img/'.$value);
                }
           }
           else{
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                exit;
           }
            
           
            // Insert
            foreach($file_names as $key => $value){
                $sql_image_proof_insert = "insert into student_proof_mark (maSv, maHK, name_img)
                                            values ('$maSv', '$maHK', '$value')
                                            ";
                $connect->query($sql_image_proof_insert);
            }
           
        }
        
    ?>

    <?php
     $sql_get_proof_img = "select * from student_proof_mark where maSv = '$maSv' and maHK = '$maHK'";
     $sql_get_proof_img_run = $connect->query($sql_get_proof_img);
        if($sql_get_proof_img_run-> num_rows >0 ){
            while($sql_get_proof_img_item = $sql_get_proof_img_run->fetch_assoc()){
                $name_img = explode(".", $sql_get_proof_img_item['name_img'])[0];
                
                ?>
                <h5 class="text-center mt-3"><?=$name_img?></h5>
                <div style="justify-content: center;display: flex">
                    
                    <img class="mb-3" src ="<?=$path?>assets/img/<?=$sql_get_proof_img_item['name_img']?>" style="width: 70%;"> <br>
                    <a href="./delete_proof.php?id=<?=$sql_get_proof_img_item['id']?>&maSv=<?=$sql_get_proof_img_item['maSv']?>" class="btn btn-danger ml-2" style="height: 40px;">Xóa</a>
                </div>
            <?php
            }
        }
    ?>
        </div>
        <?php
            require_once $path.'footer.php';

        ?>
    </div>
    
</body>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</html>