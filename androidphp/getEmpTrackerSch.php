<?php

///////////////////// DB Connect ///////////////////////////////
 include 'include/db_connect.php';
 $objConnect = new DB_CONNECT();
//////////////////////////////////////////////////////////////////////// 

$Emp_Id=$_REQUEST ['Emp_Id'];


$sql = "select ACTIVE from EMP_DETAILS WHERE ID = $Emp_Id";
$result = mysql_query($sql);
$json = array();
if (mysql_num_rows($result)) {
    // output data of each row    
    while($row = mysql_fetch_assoc($result)) {
       // echo $row["ACTIVE"];
       $active =$row["ACTIVE"];
       $json = array();
       if($active=="N"){
       	
       	$sql = "select * from EMP_SCH_INACTIVE WHERE EMP_ID= 1 "; 
	$result = mysql_query($sql);
	
	 
		if(mysql_num_rows($result)){
			while($row=mysql_fetch_assoc($result)){
				$json['ListOfArray'][]=$row;
			}
		}
       }
       else{
       
       	$sql = "select * from EMP_TRACKER_SCH WHERE EMP_ID= $Emp_Id "; 
	$result = mysql_query($sql);
	
	 
		if(mysql_num_rows($result)){
			while($row=mysql_fetch_assoc($result)){
				$json['ListOfArray'][]=$row;
			}
		}
       
       }
       echo json_encode($json);
        
    }
} else {
    echo "0 results";
}

/*
$sql = "select * from EMP_TRACKER_SCH WHERE EMP_ID= $Emp_Id "; 

$result = mysql_query($sql);
$json = array();
 
if(mysql_num_rows($result)){
while($row=mysql_fetch_assoc($result)){
if($row==null){
$json['ListOfArray'][]='{"SUN_STARTTIME":"0","SUN_ENDTIME":"0","SUN_TIMEINTERVAL":"0","MON_STARTTIME":"0","MON_ENDTIME":"0","MON_TIMEINTERVAL":"0",      "TUE_STARTTIME":"0","TUE_ENDTIME":"0","TUE_TIMEINTERVAL":"0","WED_STARTTIME":"0","WED_ENDTIME":"0","WED_TIMEINTERVAL":"0","THU_STARTTIME":"0","THU_ENDTIME":"0","THU_TIMEINTERVAL":"0","FRI_STARTTIME":"0","FRI_ENDTIME":"0","FRI_TIMEINTERVAL":"0","SAT_STARTTIME":"0","SAT_ENDTIME":"0","SAT_TIMEINTERVAL":"0"}'; 
}else{
$json['ListOfArray'][]=$row;
}
}
}

// mysql_close($con);
echo json_encode($json); 
*/

//$objConnect.close();
?> 