<?php
	include_once('connect.php');
 
	if( isset($_GET['del']) )
	{
		$id = $_GET['del'];
		$sql= "DELETE FROM teacher WHERE teacher_id='$id'";
		$res= mysqli_query($db,$sql) or die("Failed".mysql_error());
		echo "<meta http-equiv='refresh' content='0;url=tableteacher.php?data=&teacher_type='>";
	}
?>