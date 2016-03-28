<?php

///////////////////// DB Connect ///////////////////////////////
 include 'include/db_connect.php';
 $objConnect = new DB_CONNECT();
////////////////////////////////////////////////////////////////////////
/*
$station_name = $_REQUEST ['station_name'];
$state = $_REQUEST ['state'];
$lang= $_REQUEST ['lang'];
$lat = $_REQUEST ['lat'];
$comment1 = $_REQUEST ['comment1'];
*/

$station_name = 'New';
 $state = 'TN';
$lang = 12.1000;
$lat = 12.12003;
 $comment1 = 'Testing';

$sql = "INSERT INTO trainstation (station_name, state, lang, lat, comment1)
values ( $station_name, $state, $lang, $lat, $comment1)";
      
//echo $sql;
var_dump($sql);

$result = mysql_query($sql);
//$json = array();
 
//if(mysql_num_rows($result)){
//while($row=mysql_fetch_assoc($result)){
//$json['ListOfArray'][]=$row;
//}
//}
//mysql_close($con);
//echo json_encode($json); 
$objConnect.close();
?>