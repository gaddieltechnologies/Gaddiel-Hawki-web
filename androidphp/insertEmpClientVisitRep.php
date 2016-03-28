<?php

///////////////////// DB Connect ///////////////////////////////
 include 'include/db_connect.php';
 $objConnect = new DB_CONNECT();
////////////////////////////////////////////////////////////////////////

$Visit_Date = $_REQUEST ['Visit_Date']; 
$Visit_Time = $_REQUEST ['Visit_Time']; 
$Emp_Id = $_REQUEST ['Emp_Id'];

$Client_Id = $_REQUEST ['Client_Id'];
$Purpose_Id = $_REQUEST ['Purpose_Id'];
$Visit_Activity= $_REQUEST ['Visit_Activity'];
$Expense_Amt= $_REQUEST ['Expense_Amt'];
$Comment = $_REQUEST ['Comment'];
$Visit_Rep_LngLat= $_REQUEST ['Visit_Rep_LngLat'];
$followupActive= $_REQUEST ['followupActive'];
$Expense_Ref= $_REQUEST ['Expense_Ref'];
/*
$Visit_Date = '2014/08/14' ;
$Visit_Time = '17:36:46'; 
$Emp_Id = 3;
$Client_Id = 3;
$Purpose_Id = 5;
$Visit_Activity = 'testing';
$Expense_Amt=500;
$Comment = 'Comment';
$Visit_Rep_Lat= '';
$Visit_Rep_Lng= '';
$followupActive='N';
*/
$latlng= explode(",", $Visit_Rep_LngLat);
//echo $latlng[0]; // lat
//echo $latlng[1]; // lng

$sql = "INSERT INTO EMP_CLIENT_VISIT_REP(Visit_Date,Visit_Time,Emp_Id,Client_Id,Purpose_Id,Visit_Activity,Expense_Amt,Comment,VISIT_REP_LAT,VISIT_REP_LNG,FOLLOW_UP,EXPENSE_REF) VALUES (str_to_date('$Visit_Date','%Y/%m/%d'), str_to_date('$Visit_Time','%H:%i:%s'), $Emp_Id, $Client_Id, $Purpose_Id, '$Visit_Activity','$Expense_Amt', '$Comment',$latlng[0],$latlng[1],'$followupActive','$Expense_Ref')";    
      
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
//$objConnect.close();
?>