<?php

///////////////////// DB Connect ///////////////////////////////
 include 'include/db_connect.php';
 $objConnect = new DB_CONNECT();
////////////////////////////////////////////////////////////////////////

$Employee_Id=$_REQUEST ['Employee_Id'];
$LngLat=$_REQUEST ['LngLat'];
$Tracker_Timestamp=$_REQUEST ['Tracker_Timestamp'];

$sql = "INSERT INTO Emp_Loc_Tracker  (Employee_Id, LngLat,Tracker_Timestamp) VALUES ($Employee_Id , '$LngLat', str_to_date('$Tracker_Timestamp','%Y/%m/%d %H:%i:%s'))";   

$result = mysql_query($sql);

echo  $result;
$objConnect.close();
?>