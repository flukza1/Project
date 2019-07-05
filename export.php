<?php  
require_once ("server.php");
if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}

if(isset($_POST["export"]))
{
  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w"); 
    fputs($output, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
    fputcsv($output, array('เวลาสอบ','รหัสวิชา','ชื่อวิชา','กลุ่ม','อาคาร','ห้องสอบ','จำนวน นศ.','กรรมการคุมสอบ'));
    $query = "SELECT subject.time, subject.subject_id, subject.subject_name, subject.sec_id, room.building, room.room, room.student, subject.teacher_name FROM subject
    INNER JOIN room ON subject.subject_id = room.subject_id";
    $result = mysqli_query($db, $query);  
  while($row = mysqli_fetch_assoc($result))
    {
      fputcsv($output, $row);
    }
    fclose($output);
} 
?> 
<!DOCTYPE html>  
<html>  
 <head>  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ดูรายงาน</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
  
  <link rel="stylesheet" type="text/css" href="assets/css/table.css">
 </head>  
 <body><br>  
  <form class="container" method="post">
   <div class="row" align="center">  
   <div class="col-sm-4">
   <input type="submit" name="export" value="ดาวน์โหลด" class="btn btn-success" /></div>
   <div class="col-sm-4"><a href="index.php" class="btn btn-danger">ย้อนกลับ</a></div>
   </div>
  </form>
  <form class="container">
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col" style="width:9%">วัน เดือน ปี</th>
      <th scope="col" style="width:10%">เวลาสอบ</th>
      <th scope="col">รหัสวิชา</th>
      <th scope="col">ชื่อวิชา</th>
      <th scope="col">กลุ่ม</th>
      <th scope="col">อาคาร</th>
      <th scope="col">ห้อง</th>
      <th scope="col" style="width:10%">จำนวน นศ.</th>
      <th scope="col">กรรมการคุมสอบ</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
    $count=0;
     $perpage = 50;
     if (isset($_GET['page'])) {
     $page = $_GET['page'];
     } else {
     $page = 1;
     }
     $start = ($page - 1) * $perpage;

    //  $sql = "SELECT building, room FROM room";
    //  $result = mysqli_query($db,$sql);
    //  $data = array();
    //  while($row = mysqli_fetch_array($result)) {
    //   $data[0] = $row['room'];
    //   $data[1] = $row['building'];
    //   }
    //   if($data[0]==$data[0] && $data[1]==$data[1]){
    //     $sql = "SELECT teacher_name FROM subject WHERE subject_id=";
    //     $result = mysqli_query($db,$sql);
    //     while($row = mysqli_fetch_array($result)) {
    //       echo "<tr>";
    //         echo "<td>" .$row["time"] .  "</td>";
    //         echo "<td>" .$row["subject_id"] .  "</td>";
    //         echo "<td>" .$row["subject_name"] .  "</td>";
    //         echo "<td>" .$row["sec_id"] . "</td>";
    //         echo "<td>" .$row["building"] . "</td>";
    //         echo "<td>" .$row["room"] . "</td>";
    //         echo "<td>" .$row["student"] . "</td>";
    //         echo "<td>" .$row["teacher_name"] . "</td>";
    //         echo "</tr>";
    //       }
    //   }
        $sql = "SELECT subject.date,subject.time, subject.subject_id, subject.subject_name, subject.sec_id, room.building, room.room, room.student, subject.teacher_name FROM subject
        INNER JOIN room ON subject.subject_id = room.subject_id AND subject.sec_id = room.sec_id limit {$start} , {$perpage}";
        // INNER JOIN section ON subject.sec_id = section.sec_id limit {$start} , {$perpage}";
        // $sql3 = "SELECT * FROM teacher WHERE teacher_type!='ผู้บริหาร' ORDER BY RAND() LIMIT 1";
        $result = mysqli_query($db,$sql);
      while($row = mysqli_fetch_array($result)) {
        if($row["subject_name"]==""){
          echo "<tr>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td>" .$row["teacher_name"] . "</td>";
          echo "</tr>";
        } 
      else{
        $count++;
        echo "<tr>";
        echo "<td align='center'>" .$count .  "</td>";
        echo "<td>" .$row["date"] .  "</td>";
        echo "<td>" .$row["time"] .  "</td>";
        echo "<td>" .$row["subject_id"] .  "</td>";
        echo "<td>" .$row["subject_name"] .  "</td>";
        echo "<td>" .$row["sec_id"] . "</td>";
        echo "<td>" .$row["building"] . "</td>";
        echo "<td>" .$row["room"] . "</td>";
        echo "<td>" .$row["student"] . "</td>";
        echo "<td>" .$row["teacher_name"] . "</td>";
        echo "</tr>";
      }

    }
    ?>
    </tr><br>
  </tbody>
  </table>
  <?php
 $sql2 = "SELECT subject.time, subject.subject_id, subject.subject_name, subject.sec_id, room.building, room.room, room.student, subject.teacher_name FROM subject
 INNER JOIN room ON subject.subject_id = room.subject_id AND subject.sec_id = room.sec_id";
 $query2 = mysqli_query($db, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
  <nav>
 <ul class="pagination">
 <li>
 <a href="export.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="export.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="export.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
</form>
 </body>  
</html>
