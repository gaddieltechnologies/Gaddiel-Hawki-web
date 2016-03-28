<?php

///////////////////// DB Connect ///////////////////////////////
 include 'include/db_connect.php';
 $objConnect = new DB_CONNECT();
////////////////////////////////////////////////////////////////////////

$Emp_Id=$_REQUEST ['Emp_Id'];

$Track_LngLat=$_REQUEST ['Track_LngLat'];
$Track_Date =$_REQUEST ['Track_Date'];
$Track_Time =$_REQUEST ['Track_Time'];
$Track_Status =$_REQUEST ['Status'];
$latlng= explode(";", $Track_LngLat);
$state= explode(";", $Track_Status);

$sql = "INSERT INTO EMP_TRACKED_LOC (Emp_Id, Track_Lat, Track_Lng, Track_Date, Track_Time, Track_LngLat_Address,GPS_ON,NET_ON) VALUES ($Emp_Id , $latlng[0], $latlng[1], str_to_date('$Track_Date','%Y/%m/%d'), str_to_date('$Track_Time','%H:%i:%s'), '$latlng[2]','$state[0]','$state[1]')"; 
/*$sql = "INSERT INTO EMP_TRACKED_LOC(EMP_ID, TRACK_DATE, TRACK_TIME, TRACK_LNGLAT, TRACK_LAT, TRACK_LNG, TRACK_LNGLAT_ADDRESS) VALUES ($Emp_Id,str_to_date('$Track_Date','%Y/%m/%d'),str_to_date('$Track_Time','%H:%i:%s'),'$Track_Status',$latlng[0],$latlng[1],'$latlng[2]')";*/
//var_dump ($sql);
$result = mysql_query($sql);

echo  $result;
//$objConnect.close();

?>



















