<?php
	include_once('connect.php');
 
	if( isset($_GET['del']) )
	{
		$id = $_GET['del'];
		$sql= "DELETE FROM employee WHERE emp_id='$id'";
		$res= mysqli_query($db,$sql) or die("Failed".mysql_error());
		echo "<meta http-equiv='refresh' content='0;url=tableteacher.php?data='>";
	}
?>