<?php
    session_start();
    require_once('../../db/dbhelper.php');
    $path = '../../';
    $maGv = $_SESSION['user']['maGv']; 
    
    $maLop = $maHK = $msg = $statistical = '';

    if(isset($_POST['maLop'])){
      $maLop = $_POST['maLop'];
    }

    if(isset($_POST['maHK'])){
      $maHK = $_POST['maHK'];
      $sql = "select * from semester where maHK = '$maHK'";
      $result = $connect->query($sql);
      if($result->num_rows > 0){
        $hkItem = $result->fetch_assoc();
        $semester_name = $hkItem['name'];
      }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ</title>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/charts.css">
    <link rel="stylesheet" href="../../assets/css/grid.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/khoaCss.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
   
</head>
<body>

<div class="main">
  <?php
      require_once $path.'header.php';
  ?>

  <div class="main__body grid wide">
    <h4 class="main__body_heading mb-3"><?=$_SESSION['user']['name']?></h4>

    <form action="" method="POST" class="mb-3" style="border: 2px solid;width: 500px; margin: 0 auto;padding: 10px 12px;border-radius: 6px;">
      <div class="form-group">
        Chọn lớp
        
        <select name="maLop" id="" class="form-control">
          
          <?php 
              $sql = "select class.* from class where maGv = '$maGv'";
              $class_list = mysqli_query($connect,$sql);
              foreach($class_list as $class_item){
                if($maLop == $class_item['maLop']){
                  echo '
                    <option value="'.$class_item['maLop'].'" selected>'.$class_item['class_name'].'</option>             
                  ';
                }
                else{
                  echo '
                    <option value="'.$class_item['maLop'].'">'.$class_item['class_name'].'</option>             
                ';
                }
              }
          ?>
        </select>
      </div>
      <div class="form-group">
        Chọn học kì
        
        <select name="maHK" id="" class="form-control">
          
          <?php 
              $sql = "select * from semester order by rank asc";
              $semester_list = mysqli_query($connect,$sql);
              foreach($semester_list as $semester_item){
                if($maHK == $semester_item['maHK']){
                  echo '
                    <option value="'.$semester_item['maHK'].'" selected>'.$semester_item['name'].'</option>             
                  ';
                }
                else{
                  echo '
                    <option value="'.$semester_item['maHK'].'">'.$semester_item['name'].'</option>             
                ';
                }
              }
          ?>
        </select>
      </div>
      <button class="btn btn-primary" style="width: 100px">Xem</button>
      <a href="../index.php" class="btn btn-warning ml-3">Quay lại</a>

    </form>

  </div>
  <?php
    if(isset($_POST['maLop'])){
      $maLop = $_POST['maLop'];
      $maHK = $_POST['maHK'];

      $sql = "SELECT count(point.maSv) as tong from point, semester, students, class, teacher 
      where students.maSv = point.maSv 
      and semester.maHK = point.maHK 
      and students.maLop = class.maLop 
      and class.maGv = teacher.maGv
      and class.maLop = '$maLop'
      and semester.maHK = '$maHK'
      and point.status_teacher = 1";

      $tong = $connect->query($sql);
      
      $tongSv = (int)$tong->fetch_assoc()['tong'];
      // var_dump($tongSv);
      if($tongSv > 0){

        $sql = "SELECT point.* from point, semester, students, class, teacher 
        where students.maSv = point.maSv 
        and semester.maHK = point.maHK 
        and students.maLop = class.maLop 
        and class.maGv = teacher.maGv
        and class.maLop = '$maLop'
        and semester.maHK = '$maHK'
        and point.status_teacher = 1";

        $result = $connect->query($sql);

        $index = 0;
        $kem = $yeu = $trung_binh = $trung_binh_kha = $kha = $tot = $xuat_sac  = 0;
        foreach($result as $row){
            $diem_xet = (int)$row['point_teacher'];
            if(0 <= $diem_xet && $diem_xet <= 29){
                    $kem+=1;
            }
            else if($diem_xet <= 49){
              $yeu+=1;
            }
            else if($diem_xet <= 59){
              $trung_binh+=1;
            }
            else if($diem_xet <= 69){
              $trung_binh_kha+=1;
            }
            
            else if($diem_xet <= 79){
                $kha+=1;
            }
            else if($diem_xet <= 89){
              $tot+=1;
          }
            else{
                $xuat_sac+=1;
            }
    
    
        // $ep = (int)$row['diem_GV'];
        // var_dump($ep);
        }
        $phan_tram_kem = round(($kem / $tongSv) * 100, 1);
        $phan_tram_yeu = round(($yeu / $tongSv) * 100, 1);

        
        $phan_tram_trung_binh = round(($trung_binh / $tongSv) * 100, 1);
        $phan_tram_trung_binh_kha = round(($trung_binh_kha / $tongSv) * 100, 1);

        $phan_tram_kha = round(($kha / $tongSv) * 100, 1);
        $phan_tram_tot = round(($tot / $tongSv) * 100, 1);

        $phan_tram_xuat_sac = round(100 - ($phan_tram_kem + $phan_tram_yeu + $phan_tram_trung_binh + $phan_tram_kha + $phan_tram_tot + $phan_tram_trung_binh_kha), 1);
        // echo $phan_tram_kem .'<br>';
        
        // echo $phan_tram_yeu .'<br>';
        // echo $phan_tram_trung_binh .'<br>';
        // echo $phan_tram_trung_binh_kha .'<br>';
        // echo $phan_tram_kha .'<br>';
        // echo $phan_tram_tot .'<br>';
        // echo $phan_tram_xuat_sac .'<br>';
        // echo ($phan_tram_kem + $phan_tram_yeu + $phan_tram_trung_binh + $phan_tram_kha + $phan_tram_tot + $phan_tram_trung_binh_kha);
        $statistical = '
        <div class="col-lg-2">
          <h6>Có '.$tongSv.' sinh viên, trong đó: </h6>
          <table class="table table-bordered">
            <tr>
              <th>Loại</th>
              <th>Số lượng</th>
            </tr>
            <tr>
              <td>Xuất sắc</td>
              <td>'.$xuat_sac.'</td>
            </tr>
            <tr>
              <td>Tốt</td>
              <td>'.$tot.'</td>
            </tr>
            <tr>
              <td>Khá</td>
              <td>'.$kha.'</td>
            </tr>
            <tr>
              <td>Trung bình khá</td>
              <td>'.$trung_binh_kha.'</td>
            </tr>
            <tr>
              <td>Trung bình</td>
              <td>'.$trung_binh.'</td>
            </tr>
            <tr>
              <td>Yếu</td>
              <td>'.$yeu.'</td>
            </tr>
            <tr>
              <td>Kém</td>
              <td>'.$kem.'</td>
            </tr>
          </table>
        </div>
        ';
      }
      else{
        $msg = "Chưa có sinh viên nào chấm điểm";
      }
    
    }
  ?>

  <div class="main__body_statistical grid wide row">
      <?php
      echo $statistical;  
      ?>
      <figure class="highcharts-figure grid wide col-lg-10">
        <div id="container"></div>
        <p class="highcharts-description">
          <?php echo $msg ?>
        </p>
      </figure>
  </div>


  <?php
    require_once '../../footer.php';
  ?>
</div>
<style>
    .highcharts-figure,
    .highcharts-data-table table {
    min-width: 320px;
    max-width: 660px;
    margin: 1em auto;
    }

    .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
    }

    .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
    }

    .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
    padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
    background: #f1f7ff;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    // Radialize the colors
Highcharts.setOptions({
  colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
      radialGradient: {
        cx: 0.5,
        cy: 0.3,
        r: 0.7
      },
      stops: [
        [0, color],
        [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
      ]
    };
  })
});

// Build the chart
Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Phân loại trung bình rèn luyện (<?php echo $semester_name ?>)'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}% / 100%</b> '
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        connectorColor: 'silver'
      }
    }
  },
  series: [{
    name: 'Chiếm',
    data: [
      { name: 'kém', y: <?php echo $phan_tram_kem ?> },
      { name: 'yeu', y: <?php echo $phan_tram_yeu ?> },

      { name: 'trung bình', y: <?php echo $phan_tram_trung_binh ?> },
      { name: 'trung bình khá', y: <?php echo $phan_tram_trung_binh_kha ?> },

      { name: 'khá', y: <?php echo $phan_tram_kha ?> },
      { name: 'tốt', y: <?php echo $phan_tram_tot ?> },
      { name: 'Xuất sắc', y: <?php echo $phan_tram_xuat_sac ?> },

    //   { name: 'Safari', y: 4.18 },
    //   { name: 'Other', y: 7.05 }
    ]
  }]
});
</script>
</body>
</html>