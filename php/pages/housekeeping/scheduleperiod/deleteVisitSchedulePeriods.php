<?php 
//include "connection2.php"; /** calling of connection.php that has the connection code **/ 
 include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection2.php');
$id = $_GET['id'];

mysql_query("DELETE FROM VISIT_SCH_PERIODS WHERE ID= $id");

			header('Location:visitSchedulePeriods.php');
	
?>
