<?php


///////////////////// DB Connect ///////////////////////////////
 include 'include/db_connect.php';
 $objConnect = new DB_CONNECT();
////////////////////////////////////////////////////////////////////////

 $strSQL = "SELECT Purpose_Id, Purpose_Name FROM Purpose";
 $objQuery = mysql_query($strSQL);
 $intNumField = mysql_num_fields($objQuery);
 $resultArray = array();
 while($obResult = mysql_fetch_array($objQuery))
 {
 $arrCol = array();
 for($i=0;$i<$intNumField;$i++)
 {
 $arrCol[mysql_field_name($objQuery,$i)] = $obResult[$i];
 }
 array_push($resultArray,$arrCol);
 }
 
//mysql_close($objConnect);
 
echo json_encode($resultArray);
$objConnect.close();
?>