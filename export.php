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
    $query = "SELECT subject.time, subject.subject_id, subject.subject_name, subject.sec, room.building, room.room, room.student, subject.teacher FROM subject
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
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
        $sql = "SELECT subject.time, subject.subject_id, subject.subject_name, subject.sec, room.building, room.room, room.student, subject.teacher FROM subject
        INNER JOIN room ON subject.subject_id = room.subject_id  and subject.sec = room.sec";
        $result = mysqli_query($db,$sql);
      while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" .$row["time"] .  "</td>";
        echo "<td>" .$row["subject_id"] .  "</td>";
        echo "<td>" .$row["subject_name"] .  "</td>";
        echo "<td>" .$row["sec"] . "</td>";
        echo "<td>" .$row["building"] . "</td>";
        echo "<td>" .$row["room"] . "</td>";
        echo "<td>" .$row["student"] . "</td>";
        echo "<td>" .$row["teacher"] . "</td>";
        echo "</tr>";
      }
    ?>
    </tr><br>
  </tbody>
  </table>
</form>
 </body>  
</html>
