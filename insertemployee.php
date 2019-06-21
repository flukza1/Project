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
    
if (isset($_POST['insert'])) {
        $teacher_name = mysqli_real_escape_string($db, $_POST['teacher_name']);
        $role = mysqli_real_escape_string($db, $_POST['role']);
        $teacher_type = mysqli_real_escape_string($db, $_POST['teacher_type']);
    if (empty($teacher_name)) { echo "<script>alert('กรุณากรอกชื่อและนามสกุล');</script>"; }
    if($teacher_name!=NULL){
        $query = "INSERT INTO teacher(teacher_name, role, teacher_type) 
                VALUES('$teacher_name', '$role', '$teacher_type')";
        mysqli_query($db, $query);
        echo "<script>alert('เพิ่มบุคลากรสำเร็จ');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เพิ่มบุคลากร</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<div class="header">
  	<h2>เพิ่มบุคลากร</h2>
  </div>
	
  <form method="post" enctype="multipart/form-data" action="insertemployee.php">
  	<div class="input-group">
  	  <label style='margin-right:50%;'>ชื่อ - นามสกุล</label>
  	  <input type="text" name="teacher_name">
  	</div>
      <label>ตำแหน่ง</label>
        <select style='height:40px;' name="role">
        <option value="อาจารย์">อาจารย์</option>
        <option value="เจ้าหน้าที่">เจ้าหน้าที่</option>
        </select><br>
        <label style='margin-top:5%;'>สังกัด</label>
        <select style='height:40px;' name="teacher_type">
        <option value="ผู้บริหาร">ผู้บริหาร</option>
        <option value="ภาควิชาเคมี">ภาควิชาเคมี</option>
        <option value="ภาควิชาคณิตศาสตร์">ภาควิชาคณิตศาสตร์</option>
        <option value="ภาควิชาวิทยาการคอมพิวเตอร์">ภาควิชาวิทยาการคอมพิวเตอร์</option>
        <option value="ภาควิชาชีววิทยา">ภาควิชาชีววิทยา</option>
        <option value="ภาควิชาฟิสิกส์">ภาควิชาฟิสิกส์</option>
        <option value="ภาควิชาสถิติ">ภาควิชาสถิติ</option>
        <option value="สำนักงานคณบดี">สำนักงานคณบดี</option>
        </select><br><br>
        <input class="btn btn-success" type="submit" name="insert" value="ยืนยัน" />
      <a style='margin-left:5%;' href="tableteacher.php?data=" class="btn btn-danger">ย้อนกลับ</a>
  </form>
</body>
</html>