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
	
    <!-- Google font -->
    
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
					<div class="span12 ">					
						<div class="widget">                    					
						<div class="widget-content"> 
									<div class="span7">
										<h3>Employee Wise - Customer Visit Plan And Compliance</h3>	
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
				<!-- Content -->
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
				<!-- /Content -->
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
$Linespace=array("","","","","","","","","","","","","","","","");
$excel=new ExcelWriter("EmpwiseClientVistPlanAndCompliance".$date.".xls");
if($excel==false){	
echo $excel->error;
}
	 	$Co=array("","","","","","JINDAL POLYBUTTONS LTD");
		$excel->writeLines($Co);	 
		$Title=array("","","","","","EMPLOYEE WISE CUSTOMER VISIT PLAN AND COMPLIANCE");
		$excel->writeLines($Title); 
		$excel->writeLine($Linespace);
		$excel->writeLine($Linespace);
		$parameterlist=array("PARAMETERS:","","","","","","","","","","","","","","Report Date:",$dated);
		$excel->write($parameterlist);
        
     if ($_POST["EMP_id"]=="ALL")
	{
		$empName=array("Employee Name:","ALL","","","","","","","","","","","","","","","");
		$excel->write($empName);
		$visitdatFrom=array("Visit Date From:","$VisitDateFrom","","","","","","","","","","","","","","","");
		$excel->write($visitdatFrom);
		$visitdatTo=array("Visit Date To","$VisitDateTo ","","","","","","","","","","","","","","","");
		$excel->write($visitdatTo);		
		$excel->writeLine($Linespace);
	    $empId = 'NULL';
	}
	else
	{
	    $empId = $_POST["EMP_id"];
	}
		
		$pdo = Database::connect(); 
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$result = $pdo->prepare("SELECT ID,EMP_NAME,JOB_POSITION,JOB_CODE,MOBILE_NUM,EMAIL_ID FROM  EMP_DETAILS WHERE ID = IFNULL($empId, ID) ORDER BY ID desc");
        $result->execute();			
		for($i=0; $row = $result->fetch(); $i++)
		    {		 
               if ($_POST["EMP_id"] != "ALL")
	          {
			  		$empName=array("Employee Name:",$row['EMP_NAME'],"","","","","","","","","","","","","","","");
		            $excel->write($empName);
		            $visitdatFrom=array("Visit Date From:","$VisitDateFrom","","","","","","","","","","","","","","","");
		            $excel->write($visitdatFrom);
		            $visitdatTo=array("Visit Date To","$VisitDateTo ","","","","","","","","","","","","","","","");
		            $excel->write($visitdatTo);	
		            $excel->writeLine($Linespace);
			  }
			   
   			    $empTitle=array("Employee Id","Employee Name","Job Position","Job Code","Mobile Number","Email Id");
				$excel->writeLin($empTitle);		 
				Database::disconnect();
				$emp_id = $row['ID'];
				$empDetails=array($row['ID'], $row['EMP_NAME'],$row['JOB_POSITION'], $row['JOB_CODE'],$row['MOBILE_NUM'],$row['EMAIL_ID']);
				$excel->writeLine($empDetails);
				$excel->writeLine($Linespace);
				$getjobcode = $row['JOB_CODE'];
								
					$pdo = Database::connect(); 
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$resultri = $pdo->prepare("SELECT cd.id ClientId, clfn.description ClientClassficiation, cd.client_name ClientName, cd.client_loc ClientLocation, cd.client_loc_lng LocLng, cd.client_loc_lat LocLat, 
					vsp.sch_period SchPeriod,  if((cd.se_code = emp.job_code), cd.se_visit_count, cd.ri_visit_count) VisitCnt
					FROM `CLIENT_DETAILS` cd, `VISIT_SCH_PERIODS` vsp, `CLIENT_CLASSIFICATION` clfn, EMP_DETAILS emp
					WHERE (cd.se_code = '$getjobcode'  or cd.ri_code = '$getjobcode')
					AND cd.client_classification_id = clfn.id
					AND vsp.id= if((cd.se_code = emp.job_code), cd.se_visit_sch_period_id, cd.ri_visit_sch_period_id)
					AND emp.id = $emp_id");
					$resultri->execute();

                    $ClientCnt = 0;					
					for($r=1; $rowr = $resultri->fetch(); $r++)
					{																	
						Database::disconnect();
						$client_id = $rowr['ClientId'];
						$clientTitle=array("","Client Name","Client Classficiation","Client Location","Client Latitude","Client Longitude","Visit Schedule","Visit Count");
				        $excel->writeLin($clientTitle);	
						$clientDetails=array("",$rowr['ClientName'], $rowr['ClientClassficiation'], $rowr['ClientLocation'],$rowr['LocLat'],$rowr['LocLng'],$rowr['SchPeriod'],$rowr['VisitCnt']);
						$excel->writeLine($clientDetails);
						$excel->writeLine($Linespace);
						$visitTitle=array("","","Visit Date","Visit Time","Visit Prupose","Purpose Description","Visit Activity","Visit Expenses","Report Latitude","Report Longitude","Visit Location Map Link","Address","Visit Follow Up","Visit Comment");
						$excel->writeLin($visitTitle);
						 
						    $VisitCnt = 0;
							$pdo = Database::connect(); 
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$resultric = $pdo->prepare("SELECT cvp.visit_date, date_format(cvp.visit_date, '%d-%b-%y') VisitDate, cvp.visit_time VisitTime, vp.purpose_name VisitPrupose, vp.description PurposeDescription,  cvp.visit_activity VisittActivity, 
						    cvp.expense_amt VistExpenses, cvp.visit_rep_lat VisitReportLat, cvp.visit_rep_lng VisitReportLng,cvp.visit_lnglat_address VisitLnglatAddress, CONCAT('http://maps.google.com/?q=(',cvp.visit_rep_lat,',',cvp.visit_rep_lng,')') ReportedFromLocMapLink, cvp.follow_up VisitFollowUp, cvp.comment VisitComment
							FROM EMP_CLIENT_VISIT_REP cvp, VISIT_PURPOSES vp
							WHERE cvp.emp_id = $emp_id
							AND   cvp.client_id = $client_id
							AND   vp.id = cvp.purpose_id
							AND   cvp.visit_date >= IFNULL((str_to_date('$VisitDateFrom','%d-%b-%y')), cvp.visit_date )
		                    AND   cvp.visit_date <= IFNULL((str_to_date('$VisitDateTo','%d-%b-%y')), cvp.visit_date )");
							$resultric->execute();						
							for($m=1; $rowri = $resultric->fetch(); $m++)
							{	
                             						
								Database::disconnect();
								$visitDetails=array("","",$rowri['VisitDate'], $rowri['VisitTime'],$rowri['VisitPrupose'], $rowri['PurposeDescription'],$rowri['VisittActivity'],$rowri['VistExpenses'],$rowri['VisitReportLat'],$rowri['VisitReportLng'],$rowri['ReportedFromLocMapLink'],$rowri['VisitLnglatAddress'],$rowri['VisitFollowUp'],$rowri['VisitComment']);
								$excel->writeLine($visitDetails);
								$VisitCnt =  $VisitCnt +1;
							}
						
							if ($VisitCnt == 0) 
							{
							   $report=array("","","","","","**No Client Visit Reported for this period**");
							   $excel->writeLinee($report);
							} 
							$excel->writeLine($Linespace);
							$ClientCnt = $ClientCnt+1;
						}
						   if ($ClientCnt == 0) 
							{
							   $report=array("","","","","","**No Clients attached to this employee**");
							   $excel->writeLinee($report);
							} 
							$excel->writeLine($Linespace);
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
						window.location.href = "EmpwiseClientVistPlanAndCompliance'.$date.'.xls";
						</script>';				
}
ob_end_flush();
?>
			    <?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/footer.php'); ?>
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

			