<?php 
//include "connection2.php"; /** calling of connection.php that has the connection code **/ 
include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection2.php');
$id = $_GET['id'];

mysql_query("DELETE FROM EMP_DETAILS WHERE ID= $id");
mysql_query("DELETE FROM  EMP_TRACKER_SCH WHERE EMP_ID= $id");
			header('Location: employee.php');
	
?>
