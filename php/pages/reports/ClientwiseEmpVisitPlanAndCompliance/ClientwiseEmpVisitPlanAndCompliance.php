<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <title>Hawki</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
     
    <!-- CSS files -->
    <link rel="stylesheet" type="text/css" href="../../../resources/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="../../../resources/css/bootstrap-responsive.min.css" >
    <link rel="stylesheet" type="text/css" href="../../../resources/css/alveolae.css">
    <link rel="stylesheet" type="text/css" href="../../../resources/css/font-awesome.css">
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

                <div class="row">
				
					<div class="span12">					
						<div class="widget">                    					
						<div class="widget-content"> 
									<div class="span7">
										<h3>Client Wise - Employee Visit Plan And Compliance</h3>	
										
									</div>                       
								    <div class="span3 ">                                                                
									  									  
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
                                 <div class="span8"><label>Client Name</label>
									<?php 
										
										    include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php');
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,CLIENT_NAME,CLIENT_LOC FROM CLIENT_DETAILS");
											$result->execute();
											
											echo '<select autofocus  class="span4" name="CLIENT_id" id="ccatselect">';
											echo  '<option>ALL</option>';												
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
									?>														
											<option value="<?php  echo $row['ID'];?>" ><?php  echo $row['CLIENT_NAME'];?></option >						    
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
	$excel=new ExcelWriter("ClientwiseEmpVisitPlanAndCompliance".$date.".xls");
	if($excel==false){	
	echo $excel->error;
	}
			$Co=array("","","","","","JINDAL POLYBUTTONS LTD");
			$excel->writeLines($Co);	 
			$Title=array("","","","","","CLIENT WISE EMPLOYEE VISIT PLAN AND COMPLIANCE");
			$excel->writeLines($Title); 
			$excel->writeLine($Linespace);
			$excel->writeLine($Linespace);
			$parameterlist=array("PARAMETERS:","","","","","","","","","","","Report Date:",$dated);
			$excel->write($parameterlist);
			
		 if ($_POST["CLIENT_id"]=="ALL")
	{
		$empName=array("Client Name:","ALL","","","","","","","","","","","","","","","");
		$excel->write($empName);
		$visitdatFrom=array("Visit Date From:","$VisitDateFrom","","","","","","","","","","","","","","","");
		$excel->write($visitdatFrom);
		$visitdatTo=array("Visit Date To","$VisitDateTo ","","","","","","","","","","","","","","","");
		$excel->write($visitdatTo);		
		$excel->writeLine($Linespace);
	    $clientId = 'NULL';
	}
	else
	{
	    $clientId = $_POST["CLIENT_id"];
	}
		
		$pdo = Database::connect(); 
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$result = $pdo->prepare("SELECT cd.id ClientId,  cd.client_name ClientName, clfn.description ClientClassficiation, 
		cd.client_loc ClientLocation, cd.client_loc_lat LocLat, cd.client_loc_lng LocLng, 
		cd.se_code seCode, cd.se_visit_sch_period_id seVisitSchPrdId, vspse.sch_period SEVisitSchedule, cd.se_visit_count seVisitCount,
		cd.ri_code riCode, cd.ri_visit_sch_period_id riVisitSchPrdId, vspri.sch_period RIVisitSchedule, cd.ri_visit_count riVisitCount
		FROM  `CLIENT_DETAILS` cd, `CLIENT_CLASSIFICATION` clfn, `VISIT_SCH_PERIODS` vspse,  `VISIT_SCH_PERIODS` vspri
		WHERE  cd.client_classification_id = clfn.id
		AND    vspse.id = cd.se_visit_sch_period_id
		AND    vspri.id = cd.ri_visit_sch_period_id
		AND     cd.id = IFNULL($clientId, cd.id)");
        $result->execute();			
		for($i=0; $row = $result->fetch(); $i++)
		    {		 
               if ($_POST["CLIENT_id"] != "ALL")
	           { 
			  		$empName=array("Client Name:",$row['ClientName'],"","","","","","","","","","","","","","","");
		            $excel->write($empName);
		            $visitdatFrom=array("Visit Date From:","$VisitDateFrom","","","","","","","","","","","","","","","");
		            $excel->write($visitdatFrom);
		            $visitdatTo=array("Visit Date To","$VisitDateTo ","","","","","","","","","","","","","","","");
		            $excel->write($visitdatTo);	
		            $excel->writeLine($Linespace);
			    }
					$clientTitle=array("Client Name","Client Classficiation","Client Location","Client Latitude","Client Longitude","SE code","SE Visit Schedule","SE Visit Count","RI code","RI Visit Schedule","RI Visit Count");  			   
					$excel->writeLin($clientTitle);		 
					Database::disconnect();
					$clientId = $row['ClientId'];
					$clientDetails=array($row['ClientName'],$row['ClientClassficiation'], $row['ClientLocation'],$row['LocLat'],$row['LocLng'],$row['seCode'],$row['SEVisitSchedule'],$row['seVisitCount'],$row['riCode'],$row['RIVisitSchedule'],$row['riVisitCount']);
					$excel->writeLine($clientDetails);
					$excel->writeLine($Linespace);
					$getsecode= $row['seCode'];
					$getricode= $row['riCode'];	
					$seVisitSchPrdId= $row['seVisitSchPrdId'];
					$riVisitSchPrdId= $row['riVisitSchPrdId'];
					
					$pdo = Database::connect(); 
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$resultri = $pdo->prepare("SELECT emp.ID Id, emp.EMP_NAME empName, emp.JOB_POSITION JobPsn, emp.JOB_CODE JobCode, emp.MOBILE_NUM MobMum, emp.EMAIL_ID EmailId,
					vsp.sch_period SchPeriod
					FROM   EMP_DETAILS emp, `VISIT_SCH_PERIODS` vsp
					WHERE  (emp.job_code = 	'$getsecode' OR emp.job_code = '$getricode')
					AND    vsp.id = IF( (emp.job_code = '$getsecode'),  $seVisitSchPrdId, $riVisitSchPrdId)");
					$resultri->execute();

                    $ClientCnt = 0;					
					for($r=1; $rowr = $resultri->fetch(); $r++)
					{																	
						Database::disconnect();
						$emp_id = $rowr['Id'];
						$empTitle=array("","","Employee Id","Employee Name","Job Position","Job Code","Mobile Number","Email Id");
				        $excel->writeLin($empTitle);	
						$empDetails=array("","",$rowr['Id'], $rowr['empName'],$rowr['JobPsn'], $rowr['JobCode'],$rowr['MobMum'],$rowr['EmailId']);
						$excel->writeLine($empDetails);
						$excel->writeLine($Linespace);
						$visitTitle=array("","","","Visit Date","Visit Time","Visit Prupose","Purpose Description","Visit Activity","Visit Expenses","Report Latitude","Report Longitude","Visit Location Map Link","Address","Visit Follow Up","Visit Comment");
						$excel->writeLin($visitTitle);
						 
						    $VisitCnt = 0;
							$pdo = Database::connect(); 
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$resultric = $pdo->prepare("SELECT cvp.visit_date, date_format(cvp.visit_date, '%d-%b-%y') VisitDate, cvp.visit_time VisitTime, vp.purpose_name VisitPrupose, vp.description PurposeDescription,  cvp.visit_activity VisittActivity, 
						    cvp.expense_amt VistExpenses, cvp.visit_rep_lat VisitReportLat, cvp.visit_lnglat_address VisitLnglatAddress, cvp.visit_rep_lng VisitReportLng, CONCAT('http://maps.google.com/?q=(',cvp.visit_rep_lat,',',cvp.visit_rep_lng,')') ReportedFromLocMapLink, cvp.follow_up VisitFollowUp, cvp.comment VisitComment
							FROM EMP_CLIENT_VISIT_REP cvp, VISIT_PURPOSES vp
							WHERE cvp.emp_id = $emp_id
							AND   cvp.client_id = $clientId
							AND   vp.id = cvp.purpose_id
							AND   cvp.visit_date >= IFNULL((str_to_date('$VisitDateFrom','%d-%b-%y')), cvp.visit_date )
		                    AND   cvp.visit_date <= IFNULL((str_to_date('$VisitDateTo','%d-%b-%y')), cvp.visit_date )");
							$resultric->execute();
							for($m=1; $rowri = $resultric->fetch(); $m++)
							{				   
								Database::disconnect();
								$visitDetails=array("","","",$rowri['VisitDate'], $rowri['VisitTime'],$rowri['VisitPrupose'], $rowri['PurposeDescription'],$rowri['VisittActivity'],$rowri['VistExpenses'],$rowri['VisitReportLat'],$rowri['VisitReportLng'],$rowri['ReportedFromLocMapLink'],$rowri['VisitLnglatAddress'],$rowri['VisitFollowUp'],$rowri['VisitComment']);
								$excel->writeLine($visitDetails);
								$VisitCnt =  $VisitCnt +1;
							}
						
							if ($VisitCnt == 0) 
							{
							   $report=array("","","","","","**No employee Visit Reported for this period**");
							   $excel->writeLinee($report);
							} 
							$excel->writeLine($Linespace);
							$ClientCnt = $ClientCnt+1;
					}
						   if ($ClientCnt == 0) 
							{
							   $report=array("","","","","","**No employee attached to this Client**");
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
						window.location.href = "ClientwiseEmpVisitPlanAndCompliance'.$date.'.xls";
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

			