<?php
 
///////////////////// DB Connect ///////////////////////////////
 include 'include/db_connect.php';
 $objConnect = new DB_CONNECT();
////////////////////////////////////////////////////////////////////////


 $strSQL = "SELECT Id, REPLACE( CONCAT( client_name,CHAR(10) ,  '  -   ', client_loc ) ,  ',',  '' ) Client_Name FROM  CLIENT_DETAILS WHERE client_classification_id != 8";
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
 
// mysql_close($objConnect);
 
echo json_encode($resultArray);
//$objConnect.close();
?>