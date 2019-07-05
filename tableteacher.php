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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>รายชื่อบุคลากร</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/table.css">
</head>
<body><br>
<form class="container" action="tableteacher.php" method="GET" enctype="multipart/form-data">
        <input class="col-sm-4" style="height:30px;margin-top: 1%;" type="text" name="data" placeholder="ค้นหารายชื่อบุคลากร" />
        <select style='height:35px;' name="teacher_type">
        <option value="">ภาควิชา</option>
        <option value="ผู้บริหาร">ผู้บริหาร</option>
        <option value="ภาควิชาเคมี">ภาควิชาเคมี</option>
        <option value="ภาควิชาคณิตศาสตร์">ภาควิชาคณิตศาสตร์</option>
        <option value="ภาควิชาวิทยาการคอมพิวเตอร์">ภาควิชาวิทยาการคอมพิวเตอร์</option>
        <option value="ภาควิชาชีววิทยา">ภาควิชาชีววิทยา</option>
        <option value="ภาควิชาฟิสิกส์">ภาควิชาฟิสิกส์</option>
        <option value="ภาควิชาสถิติ">ภาควิชาสถิติ</option>
        <option value="สำนักงานคณบดี">สำนักงานคณบดี</option>
        </select>
        <input class="btn btn-info" type="submit" value="ค้นหา" />
        <a class="btn btn-success"  href="insertemployee.php">
        <i class="icon-user"></i> เพิ่มบุคลากร</a>
        <a  href="index.php" class="btn btn-danger">ย้อนกลับ</a>
        <a  href="tableteacher.php?logout='1'" style='margin-left: 8%;' class="btn btn-danger"><i class="icon-signout"></i>ออกจากระบบ</a>
</form>
<form class="container">
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="width:11%">รหัสบุคลากร</th>
      <th scope="col">ชื่อ - นามสกุล</th>
      <th scope="col">ตำแหน่ง</th>
      <th scope="col" style="width:11%">การจัดการ</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
    $data = $_GET['data'];
    $teacher_type = $_GET['teacher_type'];
    if($data == ""){
        $sql = "SELECT * FROM teacher WHERE (`teacher_type` LIKE '%".$teacher_type."%')";
        $result = mysqli_query($db,$sql);
      while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" .$row["teacher_id"] .  "</td>";
        echo "<td>" .$row["teacher_name"] .  "</td>";
        echo "<td>" .$row["role"] . "</td>";
        echo "<td>" . "<a href='edit.php?edit=$row[teacher_id]' class='btn btn-warning'><i class='icon-edit'></i></a>" . "<a href='delete.php?del=$row[teacher_id]' class='btn btn-danger' style='margin-left: 10px;'><i class='icon-trash'></i></a>" . "</td>";
        echo "</tr>";
      }
    }
    else{
      $sql2 = "SELECT * FROM teacher WHERE (`teacher_name` LIKE '%".$data."%') AND (`teacher_type` LIKE '%".$teacher_type."%')";
      $result2 = mysqli_query($db,$sql2);
      while($row = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>" .$row["teacher_id"] .  "</td>";
        echo "<td>" .$row["teacher_name"] .  "</td>";
        echo "<td>" .$row["role"] . "</td>";
        echo "<td>" . "<a href='edit.php?edit=$row[teacher_id]' class='btn btn-warning'><i class='icon-edit'></i></a>" . "<a href='delete.php?del=$row[teacher_id]' class='btn btn-danger' style='margin-left: 10px;'><i class='icon-trash'></i></a>" . "</td>";
        echo "</tr>";
      }
    }
    ?>
    </tr><br>
  </tbody>
</table>
</form>
</body>
</html>