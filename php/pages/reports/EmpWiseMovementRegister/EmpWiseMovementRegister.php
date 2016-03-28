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

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->	
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
				<!-- Sidebar -->				
				<!-- /Sidebar -->				
				<!-- Content -->
					<div class="span12 ">					
						<div class="widget">                    					
						<div class="widget-content"> 
									<div class="span7">
										<h3>Employee Wise - Movement</h3>	
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
	$Linesapce=array("","","","","","","","","","","","","","","","");
	$excel=new ExcelWriter("EmpwiseMovementRegister".$date.".xls");
	$EmpID = $_POST["EMP_id"];  
	if($excel==false){	
	echo $excel->error;
	}
				$Co=array("","","","","","JINDAL POLYBUTTONS LTD");
			$excel->writeLines($Co);	 
			$Title=array("","","","","","EMPLOYEE WISE - MOVEMENT");
			$excel->writeLines($Title); 
			$excel->writeLine($Linesapce);
			$excel->writeLine($Linesapce);
			$parameterlist=array("PARAMETERS:","","","","","","","","","","","Report Date:",$dated);
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
		$excel->writeLine($Linesapce);
		$excel->writeLine($Linesapce);     		
        $recCnt = 0;
		$pdo = Database::connect(); 
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$results = $pdo->prepare("SELECT emp.emp_name EmployeeName,  emp.email_id EmailId, emp.job_position JobPosition, emp.job_code JobCode, emp.mobile_num MobileNum,
		   loc.track_date TrackDate, loc.track_time TrackTime, loc.track_lat TrackedLat, loc.track_lng TrackedLng, loc.track_lnglat_address TracklngLatAddress, CONCAT('http://maps.google.com/?q=(', loc.track_lat,',',loc.track_lng,')') LocationMapLink
		   FROM `EMP_TRACKED_LOC` loc, `EMP_DETAILS` emp
		   WHERE  emp.id = IFNULL($EmpID, emp.id)
		   AND   emp.id = loc.emp_id
		   AND   loc.track_date >= IFNULL((str_to_date('$VisitDateFrom','%d-%b-%y')), loc.track_date )
		   AND   loc.track_date <= IFNULL((str_to_date('$VisitDateTo','%d-%b-%y')), loc.track_date )
		   ORDER BY  emp.emp_name asc, loc.id desc");
        $results->execute();
		$emptitles=array("Employee Name","Email Id","Job Position","Job Code","Mobile Number","Track Date","Track Time","Tracked Latitude Location","Tracked Longitude Location","Visit Location Map Link","Address");
			$excel->write($emptitles);
		for($i=0; $row = $results->fetch(); $i++)
		    {			 
		    $empdetails=array($row['EmployeeName'],$row['EmailId'],$row['JobPosition'],$row['JobCode'],$row['MobileNum'],$row['TrackDate'],$row['TrackTime'],$row['TrackedLat'],$row['TrackedLng'],$row['LocationMapLink'],$row['TracklngLatAddress']);
			$excel->writeLine($empdetails);	
			$recCnt =  $recCnt +1;
            }
			if ($recCnt == 0) 
			{

				$excel->writeLine($Linesapce);
				$excel->writeLine($Linesapce);
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
						window.location.href = "EmpwiseMovementRegister'.$date.'.xls";
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

			