<?php

///////////////////// DB Connect ///////////////////////////////
 include 'include/db_connect.php';
 $objConnect = new DB_CONNECT();
////////////////////////////////////////////////////////////////////////

$Emp_Id=$_REQUEST ['Emp_Id'];
// $Emp_Id="106";


$sql = "select 1 from  EMP_DETAILS WHERE ID =$Emp_Id AND ACTIVE='Y'"; 
$result = mysql_query($sql);

if(mysql_num_rows($result)){ // this if is TRUE when an employee is found

$sql = "update EMP_DETAILS set DEVICE_ACTIVE_DATE= now() WHERE ID =$Emp_Id"; 
$result = mysql_query($sql);

$sql = "SELECT 1 AS rec_count"; 
$result = mysql_query($sql);

}
else{
$sql = "SELECT 0 AS rec_count"; 
$result = mysql_query($sql);
}
$json = array();
  
if(mysql_num_rows($result)){
while($row=mysql_fetch_assoc($result)){
$json['ListOfArray'][]=$row;
}
}
// mysql_close($con);
echo json_encode($json); 
$objConnect.close();

?>