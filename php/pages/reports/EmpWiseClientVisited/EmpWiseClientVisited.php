<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <title>Hawki</title>
    
   
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
	
	<script type="text/javascript">
	var m_months = {Jan: '01', Feb: '02', Mar: '03', Apr: '04', May: '05', Jun: '06',
              Jul: '07', Aug: '08', Sep: '09', Oct: '10', Nov: '11', Dec: '12'};
function Validate(){
	   var valid = true;
	   var message = '';	   
		    var VisitDatefrom = $("#VisitDateFrom").val();		
       var arr=[];arr=VisitDatefrom.split('-')
		var day = arr[0];
		var month = arr[1];
		 var mon =(month, m_months[month]);	
		var year = arr[2];
		var VisitDateto = $("#VisitDateTo").val();
        var arr=[];arr=VisitDateto.split('-');
		var days = arr[0];
		var months = arr[1];
		var mons =(months, m_months[months]);
		var years = arr[2];
		if (year >= years)
			{
			if(mon >= mons)
			{
	    	if(day > days) {
		valid = false;
		message = message + 'Visit Date From must be earlier to Visit Date To';
		}
		}
		}
		if (valid == false){
		alert(message);
		return false;
		}
	}
	 $(function() {

		$(".datepic").datepicker({ dateFormat: 'dd-M-y' ,maxDate: 0 }).bind("change",function(){
			var minValue = $(this).val();
			minValue = $.datepicker.parseDate("dd-M-y", minValue);
			minValue.setDate(minValue.getDate()+1);
			$("#to").datepicker( "option", "minDate", minValue );
		})
	});
			window.checkVisitDateTo = function() {
	    var VisitDatefrom = $("#VisitDateFrom").val();		
       var arr=[];arr=VisitDatefrom.split('-')
		var day = arr[0];
		var month = arr[1];	
		 var mon =(month, m_months[month]);	
		var year = arr[2];
		var VisitDateto = $("#VisitDateTo").val();
        var arr=[];arr=VisitDateto.split('-');
		var days = arr[0];
		var months = arr[1];		
		var mons =(months, m_months[months]);
		var years = arr[2];
			if (year >= years)
			{
			if(mon >= mons)
			{
	    	if(day > days) {
			alert("Visit Date From must be earlier to Visit Date To");
			}
			}
			}
			};
			function addDate(){
					var m_names = new Array("Jan", "Feb", "Mar", 
		"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
		"Oct", "Nov", "Dec");
		date = new Date();
		var mydate= new Date()
		mydate.setDate(mydate.getDate()-1)
		var month = mydate.getMonth();
		var day = mydate.getDate();
		var year = mydate.getFullYear().toString().substr(2,2);

		if (document.getElementById('VisitDateFrom').value == ''){
		document.getElementById('VisitDateFrom').value = day + '-' + m_names[month] + '-' + year;
		}
		if (document.getElementById('VisitDateTo').value == ''){
		document.getElementById('VisitDateTo').value = day + '-' +  m_names[month] + '-' + year;
		}
}
</script>

</head>
<body onload="addDate();">

 <?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/header.php'); ?>

	<!-- /Navbar -->
	<form action="" method="POST" onSubmit="return Validate();">
	<!-- Main content -->
	<div id="main-content">
		<!-- Container -->
		<div class="container">
			<!-- Header boxes -->
			<div class="box-container">
				
			</div>
			<!-- /Header boxes -->
			
                <div class="row">
					<div class="span12">					
						<div class="widget">                    					
						<div class="widget-content"> 
									<div class="span7">
										<h3>Employee Wise - Customers Visited Report</h3>	
									</div>                       
								    <div class="span3">                                                                
									 
									  
										<div class="box-holder desktop">
											<a href="../../reports.php">
											<div class="box"><img src="../../../resources/images/e-close.png"/></br>Close</div></a>							
										</div>   
																													  
									</div>                       
						</div>                                    
						</div>	              
                    </div>
                </div>
				<div class="row">
                
				<div class="span12">	
						<div class="widget">
							<div class="widget-header">
								<h3>Report Parameters</h3>
							</div>
							
						<div class="widget-content">
    						<div class="span8"><label>Employee Name</label>
								<?php 
										
										 include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php');
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,EMP_NAME FROM EMP_DETAILS");
											$result->execute();
											
											echo '<select autofocus  class="span4" name="EMP_id" id="empselect">';
											echo  '<option>ALL</option>';												
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
												
								?>												
											<option value="<?php  echo $row['ID'];?>" ><?php  echo $row['EMP_NAME'];?></option >						    
											<?php } echo '</select>';  ?>
									
									</div>							
                                <div class="span4"><label>Visit Date From</label><input type="text" autofocus value="" name="VisitDateFrom"  id="VisitDateFrom" class="span4 datepic"></div>
								  <div class="span8"><label>Visit Date To</label><input type="text" value="" name="VisitDateTo" id="VisitDateTo" onchange="checkVisitDateTo()" class="span4 datepic"></div>
                                  <div class="span3"><label>&nbsp;</label> <button type="submit" class="btn btn-info " name="excelsubmit" value="excel"><img src="../../../resources/images/page_excel.png"/>&nbsp; Export Excel</button> <!--<button type="submit" class="btn btn-info " name="pdfsubmit" value="pdf"><img src="../../../resources/images/page_white_acrobat.png"/>&nbsp; Export PDF</button>--></div>  					
							</div>  	
						</div>
					</div>

                </div>
<?php
if(isset($_POST["excelsubmit"]))
{	
	require_once("excelwriter.class.php");
	$dt = new DateTime();
	$date = $dt->format("Y-m-d-H-i-s");
	$dte = new DateTime();
	$dated = $dte->format("d-M-y");
	$VisitDateFrom = $_POST["VisitDateFrom"];
	$VisitDateTo = $_POST["VisitDateTo"];
	$excel=new ExcelWriter("EmpWiseClientVisited".$date.".xls");
	$EmpID = $_POST["EMP_id"];  
	$Linespace=array("","","","","","","","","","","","","","","","");
	if($excel==false){	
	echo $excel->error;
	}
			$Co=array("","","","","","JINDAL POLYBUTTONS LTD");
			$excel->writeLines($Co);	 
			$Title=array("","","","","","EMPLOYEE WISE - CUSTOMERS VISITED REPORT");
			$excel->writeLines($Title); 
			$excel->writeLine($Linespace);
			$excel->writeLine($Linespace);
			$parameterlist=array("PARAMETERS:","","","","","","","","","","","","","","Report Date:",$dated);
			$excel->write($parameterlist);
			
			if ($_POST["EMP_id"]=="ALL")
		{
			$empName=array("Employee Name:","ALL","","","","","","","","","","","","","","","");
			$excel->write($empName);
			$EmpID = 'NULL';
        }
		else
		{
            $pdo = Database::connect(); 
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$result = $pdo->prepare("SELECT ID,EMP_NAME FROM  EMP_DETAILS WHERE  ID = $EmpID");
			$result->execute();
			$rows =  $result->fetch();	      											
			Database::disconnect();	
            $empName=array("Employee Name:",$rows['EMP_NAME'],"","","","","","","","","","","","","","","");
			$excel->write($empName);
		}
		$visitdatFrom=array("Visit Date From:","$VisitDateFrom","","","","","","","","","","","","","","","");
		$excel->write($visitdatFrom);
		$visitdatTo=array("Visit Date To","$VisitDateTo ","","","","","","","","","","","","","","","");
		$excel->write($visitdatTo);	
		$excel->writeLine($Linespace);
		$excel->writeLine($Linespace);     		
        $recCnt = 0;
		$pdo = Database::connect(); 
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$results = $pdo->prepare("SELECT emp.Id ID,emp.emp_name EmpName, emp.job_position EmpPsn, emp.job_code EmpJob, emp.mobile_num EmpMobNum, emp.email_id EmpEmail,
		   clfn.description ClientClassficiation, cd.client_name ClientName, cd.client_loc ClientLocation, cd.client_loc_lng LocLng,
		   cd.client_loc_lat LocLat,
		   vsp.sch_period SchPeriod, if((cd.se_code = emp.job_code), cd.se_visit_count, cd.ri_visit_count) VisitCnt,
		   cvp.visit_date, date_format(cvp.visit_date, '%d-%b-%y') VisitDate,
		   cvp.visit_time VisitTime, vp.purpose_name VisitPrupose, vp.description PurposeDescription,  cvp.visit_activity VisittActivity,
		   cvp.expense_amt VistExpenses, cvp.follow_up VisitFollowUp, cvp.comment VisitComment,cvp.visit_lnglat_address VisitLnglatAddress,
		   CONCAT('http://maps.google.com/?q=(',cvp.visit_rep_lat,',',cvp.visit_rep_lng,')') ReportedFromLocMapLink, cd.id,  cvp.id
		   FROM   EMP_DETAILS emp, `CLIENT_DETAILS` cd, `VISIT_SCH_PERIODS` vsp, `CLIENT_CLASSIFICATION` clfn,
		  `EMP_CLIENT_VISIT_REP` cvp, `VISIT_PURPOSES` vp
		   WHERE  emp.id = IFNULL($EmpID, emp.id)
		   AND   (cd.se_code = emp.job_code  OR cd.ri_code = emp.job_code)
		   AND   cd.client_classification_id = clfn.id
		   AND   vsp.id= if((cd.se_code = emp.job_code), cd.se_visit_sch_period_id, cd.ri_visit_sch_period_id)
		   AND   cvp.client_id =  cd.id
		   AND   vp.id = cvp.purpose_id
		   AND   cvp.visit_date >= IFNULL((str_to_date('$VisitDateFrom','%d-%b-%y')), cvp.visit_date )
		   AND   cvp.visit_date <= IFNULL((str_to_date('$VisitDateTo','%d-%b-%y')), cvp.visit_date )
		   ORDER BY cvp.id");
        $results->execute();
		$emptitles=array("Employee Id","Employee Name","Job Position","Job Code","Mobile Number","Email Id","Client Classficiation","Client Name","Client Location","Client Latitude","Client Longitude","Visit Schedule","Schedule Visit Count","Visit Date","Visit Time","Visit Prupose","Purpose Description","Visit Activity","Visit Expenses","Visit Follow Up","Visit Comment","Visit Location Map Link","Address");
			$excel->write($emptitles);
		for($i=0; $row = $results->fetch(); $i++)
		    {
			 
		$empdetails=array($row['ID'],$row['EmpName'],$row['EmpPsn'],$row['EmpJob'],$row['EmpMobNum'],$row['EmpEmail'],$row['ClientClassficiation'],$row['ClientName'],$row['ClientLocation'],$row['LocLat'],$row['LocLng'],$row['SchPeriod'],$row['VisitCnt'],$row['VisitDate'],$row['VisitTime'],$row['VisitPrupose'],$row['PurposeDescription'],$row['VisittActivity'],$row['VistExpenses'],$row['VisitFollowUp'],$row['VisitComment'],$row['ReportedFromLocMapLink'],$row['VisitLnglatAddress']);
			$excel->writeLine($empdetails);	
			$recCnt =  $recCnt +1;
}
        if ($recCnt == 0) 
        {

			$excel->writeLine($Linespace);
			$excel->writeLine($Linespace);
		   $report=array("","","","","","*****No Data Found*****");
           $excel->writeLines($report);
        } 
	
	?>		
	<script type="text/javascript">		
		var m_names = new Array("Jan", "Feb", "Mar", 
		"Apr", "May", "Jun", "Jul", "Aug", "Sep", 
		"Oct", "Nov", "Dec");
		date = new Date();
		var mydate= new Date()
		mydate.setDate(mydate.getDate()-1)
		var month = mydate.getMonth();
		var day = mydate.getDate();
		var year = mydate.getFullYear().toString().substr(2,2);

		if (document.getElementById('VisitDateFrom').value == ''){
		document.getElementById('VisitDateFrom').value = day + '-' + m_names[month] + '-' + year;
		}
		if (document.getElementById('VisitDateTo').value == ''){
		document.getElementById('VisitDateTo').value = day + '-' +  m_names[month] + '-' + year;
		}
    </script>
	<?php
		    echo '<script type="text/javascript">						
						window.location.href = "EmpWiseClientVisited'.$date.'.xls";					
						</script>';	
}	 
?>			 
					<div class="dock-wrapper">    
							 <div class="navbar navbar-fixed-bottom">
								<div class="navbar-inner">
									<div class="container">                  
											<center>
												<div class="btn-group btn-group-justified">                      
													
													
													<a href="../../reports.php" class="btn btn-default">
													<img src="../../../resources/images/e-close.png"/><br>Close</a>		
												</div>   
											</center> 	
									</div>     
								</div>
							</div>
					</div>		
        </div>
	</div>	
</form>		
</body>
</html>

			