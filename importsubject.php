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
  $yearst = strip_tags($_POST['year']);
  $term = strip_tags($_POST['term']);
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
        $value1 = trim($data[2]);
        $value2 = trim($data[3]);
        $value3 = trim($data[1]);
        $value4 = trim($data[4]);
        $value5 = trim($data[6]);
        $value6 = trim($data[0]);
      if($yearst != "" && $term != ""){
        if($value1!="รหัสวิชา" || $value2 !="ชื่อวิชา" || $value3 !="เวลาสอบ" || $value4 !="sec" || $value5 !="ชื่ออาจารย์ผู้ออกข้อสอบ")
        {
            if($value1 !="" || $value2 !="" || $value3 !="" || $value4 !="" || $value5 !="")
            {
            $query = "INSERT into subject(subject_id, subject_name, time, term, year, sec_id, teacher_name) VALUES('$value1','$value2','$value3','$term','$yearst','$value4','$value5')";
            // $query2 = "INSERT into section(sec_id, date, time) VALUES('$value4','$value6','$value3')";
            // $clear = "ALTER TABLE subject AUTO_INCREMENT = 1";
            // mysqli_query($connect, $clear);
            mysqli_query($db, $query);
            // mysqli_query($db, $query2);
            }
        }
      }
        // if($value4!="sec" || $value6 !="วัน เดือน ปี" || $value3 !="เวลาสอบ")
        // {
        //     if($value4 !="" || $value6 !="" || $value3 !="")
        //     {
        //     $query2 = "INSERT into section(sec_id, date, time) VALUES('$value4','$value6','$value3')";
        //     mysqli_query($db, $query2);
        //     }
        // }

     
   }
   fclose($handle);
   echo "<script>alert('อัพโหลดสำเร็จ');</script>";
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
  <title>Import Subject</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 </head>  
 <body>  
  <h3 class="header" align="center">Import Subject</h3>
  <form method="post" enctype="multipart/form-data">
   <div class="row" align="center">  
    <label>เปลี่ยนประเภทไฟล์ให้เป็น CSV UTF-8 ทุกครั้งก่อนทำการอัพโหลด</label><br/><br/>
    <label>ปีการศึกษา</label>
<select name="year">
<option value="">ปีการศึกษา</option>
<?php
foreach(range(1987, (int)date("Y")) as $year) { $year = ($year+543);
    echo "<option value='".$year."'>".$year."</option>";
}
?>
</select>
<label style="margin-left: 5%;">เทอม</label>
    <select name="term" id="term">
  <option value="">เทอม</option>
  <option value="1">1</option>
  <option value="2">2</option>
</select>
<br><br>
    <div class="col-sm-4"><input type="file" name="file" /></div>
    <div class="col-sm-4"><input type="submit" name="submit" value="อัพโหลด" class="btn btn-info" /></div>
   </div>
   <a href="index.php" class="btn btn-danger">ย้อนกลับ</a>
  </form>
 </body>  
</html>
