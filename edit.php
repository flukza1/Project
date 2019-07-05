<?php
	include_once('connect.php');
 
	if( isset($_GET['edit']) )
	{
		$id = $_GET['edit'];
        $sql = "SELECT * FROM teacher WHERE teacher_id='$id'";
        $res = mysqli_query ($db,$sql);
        $row = mysqli_fetch_array($res);
	}

	if( isset($_POST['newName']) )
	{
        $newName = $_POST['newName'];
        $newRole = $_POST['newRole'];
        $newTeacher_type = $_POST['newTeacher_type'];
		$id  	 = $_POST['id'];
		$sql2     = "UPDATE teacher SET teacher_name='$newName' role='$newRole' teacher_type='$newTeacher_type' WHERE teacher_id='$id'";
        $edit 	 = mysqli_query($db,$sql2);
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
        echo "<meta http-equiv='refresh' content='0;url=tableteacher.php?data=&teacher_type='>";
    }
 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/table.css">
</head>
<body>
<form  class="container" action="edit.php" method="POST"><br>
<table class="table table-bordered" style="width:40%">
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="width:30%">ชื่อ - นามสกุล</th>
      <th scope="col" style="width:10%">ตำแหน่ง</th>
      <th scope="col" style="width:10%">สังกัด</th>
    </tr>
  </thead>
  <tr>
  <input type="hidden" name="id" value="<?php echo $row[0]; ?>"/>
  <td><div><input  style="height:30px;margin-top: 1%;" type="text" name="newName" value="<?php echo $row[1]; ?>"/></div></td>
  <td><select style='height:40px;' name="newRole">
        <option value="อาจารย์">อาจารย์</option>
        <option value="เจ้าหน้าที่">เจ้าหน้าที่</option>
    </select></td>
   <td><select style='height:40px;' name="newTeacher_type">
        <option value="ผู้บริหาร">ผู้บริหาร</option>
        <option value="ภาควิชาเคมี">ภาควิชาเคมี</option>
        <option value="ภาควิชาคณิตศาสตร์">ภาควิชาคณิตศาสตร์</option>
        <option value="ภาควิชาวิทยาการคอมพิวเตอร์">ภาควิชาวิทยาการคอมพิวเตอร์</option>
        <option value="ภาควิชาชีววิทยา">ภาควิชาชีววิทยา</option>
        <option value="ภาควิชาฟิสิกส์">ภาควิชาฟิสิกส์</option>
        <option value="ภาควิชาสถิติ">ภาควิชาสถิติ</option>
        <option value="สำนักงานคณบดี">สำนักงานคณบดี</option>
    </select></td>
</tr>
</table>
<input class="btn btn-success" type="submit" value="บันทึก"/>
<a style='margin-left:5%;' href="tableteacher.php?data=&teacher_type=" class="btn btn-danger">ย้อนกลับ</a>
</form>
</body>
</html>