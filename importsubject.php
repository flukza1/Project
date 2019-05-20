<?php  
set_time_limit(0);
ini_set('max_execution_time', 0);
$connect = mysqli_connect("localhost", "root", "", "project");
mysqli_set_charset($connect, "utf8");
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
        $value1 = trim($data[2]);
        $value2 = trim($data[3]);
        if($value1!="รหัสวิชา" || $value2 !="ชื่อวิชา")
        {
            if($value1 !="" || $value2 !="")
            {
            $query = "INSERT into subject(id_subject, name_subject) VALUES('$value1','$value2')";
            $clear = "ALTER TABLE subject AUTO_INCREMENT = 1";
            mysqli_query($connect, $clear);
            mysqli_query($connect, $query);
            }
        }
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
    <label>เปลี่ยนประเภทไฟล์ให้เป็น CSV ทุกครั้งก่อนทำการอัพโหลด</label><br/><br/>
    <div class="col-sm-4"><input type="file" name="file" /></div>
    <div class="col-sm-4"><input type="submit" name="submit" value="อัพโหลด" class="btn btn-info" /></div>
   </div>
   <a href="index.php" class="btn btn-danger">ย้อนกลับ</a>
  </form>
 </body>  
</html>
