<?php  
set_time_limit(0);
ini_set('max_execution_time', 0);
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

if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $rowcount = 0;
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
        $value1 = trim($data[6]);
        $value2 = trim($data[7]);
        $value3 = trim($data[8]);
        $value4 = trim($data[2]);
        $value5 = trim($data[4]);
        if($value1!="อาคาร" || $value2 !="ห้องสอบ" || $value3 !="จำนวน นศ." || $value4 !="รหัสวิชา" || $value5 !="กลุ่ม")
        {
            if($value1 !="" || $value2 !="" || $value3 !="" || $value4 !="" || $value5 !="")
            {
            $query = "INSERT into room(building, room, student, subject_id, sec_id) VALUES('$value1','$value2','$value3','$value4','$value5')";
            mysqli_query($db, $query);
            $rowcount++;
            }
        }
   }
   fclose($handle);
   echo "<script>alert('อัพโหลดสำเร็จ คุณได้อัพโหลดข้อมูลไป $rowcount Records');</script>";
  }
  else{
    echo "<script>alert('กรุณาเลือกไฟล์ CSV เท่านั้น');</script>";
  }
 }
}
?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Import Room</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 </head>  
 <body>  
  <h3 class="header" align="center">Import Room</h3>
  <form method="post" enctype="multipart/form-data">
   <div class="row" align="center">  
    <label>เปลี่ยนประเภทไฟล์ให้เป็น CSV UTF-8 ทุกครั้งก่อนทำการอัพโหลด</label><br/><br/>
    <div class="col-sm-4"><input type="file" name="file" /></div>
    <div class="col-sm-4"><input type="submit" name="submit" value="อัพโหลด" class="btn btn-info" /></div>
   </div>
   <a href="index.php" class="btn btn-danger">ย้อนกลับ</a>
  </form>
 </body>  
</html>
