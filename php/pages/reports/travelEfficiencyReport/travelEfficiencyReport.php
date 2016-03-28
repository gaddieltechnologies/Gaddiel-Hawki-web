<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <title>Hawki</title>
    
   
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
	<script src="../../../resources/js/footable.js?v=2-0-1"></script>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>	
	<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRU6uNoEGrxB3roWLfWEf4YHwAweG4Gu8">
	  </script>
	  <style>
.oddtr
{
background-color:#FFFFFF;
}
.eventr
{
	background-color:#F5F5F5;
}
.trover
{
background-color: #0099CC;
}
.trclick
{
	background-color: #7EC2EB;
}
	
</style>
	<script type="text/javascript">
function Validate(){
var m_months = {Jan: '01', Feb: '02', Mar: '03', Apr: '04', May: '05', Jun: '06',
              Jul: '07', Aug: '08', Sep: '09', Oct: '10', Nov: '11', Dec: '12'};
	var valid = true;
	var message = '';
	var EmployeeName = document.getElementById("empselect");
	 var VisitDate = $("#VisitDateFrom").val();	
	/*   var arr=[];arr=VisitDate.split('-')
		var day = arr[0];
		var month = arr[1];
		 var mon =(month, m_months[month]);	
		var year = arr[2];
		
		var mydate= new Date();
		var day1 = mydate.getDate();
		var month1 = mydate.getMonth();		
		var year1 = mydate.getFullYear().toString().substr(2,2);
       
	 if(day > day1)
	 {
    if(mon >= month1)
    {	
	if(year >= year1)
	{
	 valid = false;
	  message = message + 'Visit Date  must be earlier to current date' + '\n';
	  }
     }
	 }*/
	 if(EmployeeName.value == '-- SELECT --'){
		valid = false;
		message = message + 'Employee Name is required' + '\n';
	}

	if (valid == false){
		alert(message);
		return false;
	}
}	
	 $(function() {

		$(".datepic").datepicker({ dateFormat: 'dd-M-y',maxDate: 0 }).bind("change",function(){
			var minValue = $(this).val();
			minValue = $.datepicker.parseDate("dd-M-y", minValue);
			minValue.setDate(minValue.getDate()+1);
			$("#to").datepicker( "option", "minDate", 0 );
		})
	});

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
	
}
function restrict(e)
	{
		try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode >= 1 && charCode <= 300)) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
	}
</script>
	
</head>

<body onload="addDate();">
 <?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/header.php'); ?>
	<!-- /Navbar -->
	
	<form action="" method="POST" onSubmit="return Validate();"/>
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
										<h3>Travel Efficiency Report</h3>	
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
  						    <div class="span4"><label>Employee Name</label>
								<?php 
										
										include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php');
										$pdo = Database::connect();
										$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$result = $pdo->prepare("SELECT ID,EMP_NAME FROM EMP_DETAILS");
										$result->execute();
										
										echo '<select autofocus  class="span4" name="EMP_id" id="empselect">';
										echo  '<option>-- SELECT --</option>';												
										for($i=0; $row = $result->fetch(); $i++){																	
										Database::disconnect();	
												
								?>												
											<option value="<?php  echo $row['ID'];?>" ><?php  echo $row['EMP_NAME'];?></option >						    
											<?php } echo '</select>';  ?>
									
							</div>				
                                <div class="span4"><label>Visit Date </label><input type="text" autofocus value="" name="VisitDate"  id="VisitDateFrom" onkeypress="return restrict(event);" class="span3 datepic"></div>								
                               				
							 <div class="span3"><label>&nbsp;</label> <button type="submit" class="btn btn-info" name="excelsubmit" value="excel"><img src="../../../resources/images/page_excel.png"/>&nbsp; Export Excel</button>&nbsp;&nbsp;<button type="submit" class="btn btn-info " name="submit" id="map" value="pdf"><img src="../../../resources/images/mapview.jpg"/>&nbsp;  Map View</button></div> 	
						</div>
                           					
						</div>
					</div>

				<!-- /Content -->
				<div class="span12">
							<?php
		if(isset($_POST["submit"]))
		{	
		
			 $VisitDate= $_POST["VisitDate"];
			 $empId = $_POST["EMP_id"];
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql="SELECT EMP_NAME FROM  EMP_DETAILS WHERE ID = $empId";
			$results=$pdo->prepare($sql);	
			$results->execute();	
			$rows = $results->fetch();
			$empname = $rows['EMP_NAME'];
			echo "<div class='alert alert-info'> Employee Name: $empname Visit Date: $VisitDate </div>";
			$sql="SELECT * FROM  EMP_TRACKED_LOC WHERE EMP_ID = $empId AND TRACK_DATE = IFNULL((str_to_date('$VisitDate','%d-%b-%y')),
				TRACK_DATE )ORDER BY ID ASC";
			$result=$pdo->prepare($sql);	
			$result->execute();	
			$a=array();
			$j=0;
			for($i=0; $row = $result->fetch(); $i++){
			$b=array();
		 // $name = $row['user_name'];
		  $b[] = $row['TRACK_LAT'];
		  $b[] = $row['TRACK_LNG']; 
		  $b[] = $row['TRACK_LNGLAT_ADDRESS'];
		  $b[] = $row['TRACK_TIME'];
		  $a[$j]=$b;
				 $j++;
        
			  //echo("addMarker($lat, $lon <br />');\n");
			}
			}
	ob_end_flush();				
	?>			
					<div class="widget-content">
					
						<div class="tab-content pull-left span3">
							<div class="tab-pane active" id="demo" style="height:50%;">
						    <table  class="table demo table-bordered"  data-filter="#filter" data-page-size="5"
							       data-page-previous-text="prev" data-page-next-text="next">
							<!--<table class="table table-striped table-bordered">-->                            
								<thead>
								<tr class="widget-header">
										                              
                                        <th data-toggle="true">Time</th>
										<th data-hide="phone">Address</th>
										
									</tr>		
								</thead>
                                							
								<tbody id="gridvaluediv" class="mytable1" >	
                                    <?php 
									if((!empty($_POST))&&(isset($_POST["submit"])))
									{
									 $VisitDate= $_POST["VisitDate"];
					                 $empId = $_POST["EMP_id"];
								    $pdo = Database::connect();
									$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$result = $pdo->prepare("SELECT TRACK_TIME,TRACK_LNGLAT_ADDRESS FROM EMP_TRACKED_LOC WHERE EMP_ID = $empId AND TRACK_DATE = IFNULL((str_to_date('$VisitDate','%d-%b-%y')),
						            TRACK_DATE )ORDER BY ID ASC");
		                            $result->execute();														
									Database::disconnect();	
									for($i=0; $row = $result->fetch(); $i++){								
																	 
			 				      ?>				
									<tr Style="cursor:pointer;">
                                      										
										<td class="actions"><?php  echo $row['TRACK_TIME'];?></td>
										<td><?php  echo $row['TRACK_LNGLAT_ADDRESS'];?></td>
										<?php
										
										}
										}
										?>
										                      
								    </tr>
                                  
                                    						  
								</tbody>
							</table>
							</div>			
						</div>
						<div id="map-canvas" class="span8 pull-left" style="height:50%;  border-style:solid;  border-color: #c1c1c1; border-width:thin;"></div>
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
    $VisitDate= $_POST["VisitDate"];
	$Linesapce=array("","","","","","","","","","","","","","","","");
	$excel=new ExcelWriter("travelEfficiencyReport".$date.".xls");
    $clientName=null;
	$clientLocation=null;
	$empId = $_POST["EMP_id"];
	
		$Co=array("","JINDAL POLYBUTTONS LTD");
		$excel->writeLines($Co);	 
		$Title=array("","TRAVEL EFFICIENCY REPORT");
		$excel->writeLines($Title); 
		$excel->writeLine($Linesapce);
		$excel->writeLine($Linesapce);
		$parameterlist=array("PARAMETERS:","","","","","Report Date:");
		$excel->write($parameterlist);
		$pdo = Database::connect(); 
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$empname = $pdo->prepare("SELECT EMP_NAME FROM  EMP_DETAILS WHERE ID = $empId");
        $empname->execute();
		$emprow = $empname->fetch();
		
		 
	    $empName=array("Employee Name:",$emprow['EMP_NAME'],"","","","$dated","","","","","","","","","","","");
		$excel->write($empName);
		$visitdate=array("Visit Date:","$VisitDate","","","","","","","","","","","","","","","");
		$excel->write($visitdate);
		//---------------------------------------------------//
    	$pdo = Database::connect(); 
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$trackLocRecords = $pdo->prepare("SELECT * FROM  EMP_TRACKED_LOC WHERE EMP_ID = $empId AND TRACK_DATE = IFNULL((str_to_date('$VisitDate','%d-%b-%y')),
		TRACK_DATE )ORDER BY ID ASC");
        $trackLocRecords->execute();	

		$pdo = Database::connect(); 
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$clientRecords = $pdo->prepare("SELECT * FROM  CLIENT_DETAILS where :tracked_lng between MINLON and MAXLON and :tracked_lat between MINLAT and MAXLAT ");
	    
		//print excel report 
        $tracklocTitle=array("Client Name","Location","Entry Time","Exit Time","Total Visit Time","Travel Time");
		$excel->write($tracklocTitle);
		//------------------//
		$employeefound =0;     // used to check whether there are records for the employee
		$prevclientid =0;
		$entryTime =0;
		for($i=0; $row = $trackLocRecords->fetch(); $i++)
		{
		    $RecordId      = $row['ID'];
            $loclatcurrent = $row['TRACK_LAT'];
			$loclngcurrent = $row['TRACK_LNG'];	
			$timecurrent   = $row['TRACK_TIME']; 
		    if ($i == 0)
			{
			    //$RecordId    = $row['ID'];
				$loclatstart = $row['TRACK_LAT'];
				$loclngstart = $row['TRACK_LNG'];
				$startTime   = $row['TRACK_TIME'];
				$clientFound = 0;
				
				$clientRecords->bindParam(':tracked_lng', $loclngcurrent);  //check employee longitude in the client min longitude and max longitude 
				$clientRecords->bindParam(':tracked_lat', $loclatcurrent); //check employee latitude in the client min latitude and max latitude 
				$clientRecords->execute();						
				$firstrow = $clientRecords->fetch(); 
				if($firstrow>0)    
				{		   
				  $entryTime = $row["TRACK_TIME"];                        //get track time from the employee table to store entry time
				  $clientName = $firstrow["CLIENT_NAME"];                 //get client name from the client details table to store client time
				  $clientLocation = $firstrow["CLIENT_LOC"];			  //get client location from the client details table to store client location	   
				  $clientFound = 1;				
				  $prevclientid = $firstrow['ID'];	                       //get client id from the client details table to store previous client id
							  
				}
			   else
			    {
				   $prevclientid =0;
				   $clientFound = 0;
				  //echo  "Location not identified <br>";
			    }
			   $employeefound =1;
			}
			else
			{	  

			    $clientRecords->bindParam(':tracked_lng', $loclngcurrent);
				$clientRecords->bindParam(':tracked_lat', $loclatcurrent);
				$clientRecords->execute();						
				$currentrow = $clientRecords->fetch();
                $currentid = $currentrow["ID"];	
				if ($currentrow["ID"]==$prevclientid)                   //check current client id and previous client id is same
				{
                   null;
				}
				else 
				{
								
  				    if ($clientFound == 1)
				    {

			           $exitTime = $timeprev;			  				 
					   $StayTime = number_format(((strtotime($exitTime) - strtotime($entryTime)) / 60), 2, '.', ''); //calculate stay time
					   $TravelTime =number_format(((strtotime($entryTime) - strtotime($startTime)) / 60), 2, '.', ''); // calculate travel time					   
					   $tracklocDetails=array("$clientName","$clientLocation","$entryTime ","$exitTime ","$StayTime","$TravelTime");
			           $excel->writeLine($tracklocDetails);
					   $excel->writeLine($Linesapce);			        
					   $entryTime = null;                               
					   $startTime = $exitTime;
					}
					
				
					$clientFound = 0;					  
					if($currentrow>0)
					{
							$entryTime = $row["TRACK_TIME"];	 
							$clientFound = 1;
							$clientName = $currentrow["CLIENT_NAME"];
							$clientLocation = $currentrow["CLIENT_LOC"];							  
							$prevclientid = $currentrow['ID'];
					}
				   
			    }
            }
            $timeprev   = $row['TRACK_TIME'];
		}
        if($employeefound==0)		
		{
		 $report=array("","","**No Data found**");
		 $excel->writeLine($report);
		}
		
	if($employeefound==1)
	{	
		if ($clientFound == 1)
			{		      
			   $exitTime = $timeprev;					  					 
			   $StayTime = number_format(((strtotime($exitTime) - strtotime($entryTime)) / 60), 2, '.', '');
			   $TravelTime = number_format(((strtotime($entryTime) - strtotime($startTime)) / 60), 2, '.', '') ;
			   //print excel report
			   $tracklocDetails=array("$clientName","$clientLocation","$entryTime ","$exitTime ","$StayTime","$TravelTime");
			   $excel->writeLine($tracklocDetails);
			   $excel->writeLine($Linesapce);
			   //------------//
			   $entryTime = null;
			   $startTime = $exitTime;
			}
			
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
		
    </script>
	<?php
	echo '<script type="text/javascript">
						window.location.href = "travelEfficiencyReport'.$date.'.xls";
						</script>';
}
/*if(isset($_POST["pdfsubmit"]))
{
	$empId = $_POST["EMP_id"];
	$VisitDate= $_POST["VisitDate"];
	//in your php code $foo = elephants; $bar = brickbats; $baz = 24;
   
    header("Location: travelEfficiencyReportRequirementpdf.php?empId={$_POST["EMP_id"]}&VisitDate={$_POST["VisitDate"]}");
}*/
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
<script>

	// Set location to centre on
	

	// Set other locations in array first title for marker, second coords
	 var locations = <?php echo json_encode($a);?>;
       function initialize() {
	   var j=0;
	   j< locations.length;
	   var lats=locations[j][0];
	  	   var myLatlng1 = new google.maps.LatLng(locations[j][0], locations[j][1]);
		  
	   if(lats==null)
	   {
        var mapOptions = {
          center: { lat: 21.5383, lng: 77.3300},
          zoom: 4,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
        };
	   }
	   else{
        var mapOptions = {
          center: myLatlng1,
          zoom: 8,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
        };
		}
       
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
		var time;	
        var infowindow = new google.maps.InfoWindow();
		// apply other location markers
		for (var i in locations) {
		var p = locations[i];
		marker = new google.maps.Marker({
		position: new google.maps.LatLng(p[0], p[1]),
		map: map,
		title: p[3]		
		});	
		var content = p[3];
	 google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
        return function() {
           infowindow.setContent(content);
           infowindow.open(map,marker);
        };
    })(marker,content,infowindow)); 

  }
      }
      google.maps.event.addDomListener(window, 'load', initialize);
	
    </script>
</body>

 <script type="text/javascript">
$(function(){
		//these two line adds the color to each different row
  
    $(".mytable1 tr:even").addClass("eventr");
    $(".mytable1 tr:odd").addClass("oddtr");

 	//handle the mouseover , mouseout and click event
  $(".mytable1 tr")  
  .mouseover(function() {$(this).addClass("trover");})
  .mouseout(function() {$(this).removeClass("trover");})
  //.click(function(){$(this).toggleClass("trclick");})
 // .click(function(){$(this).siblings().removeClass('trclick');});
 
 }); 
</script>
 <script type="text/javascript">
        $(function () {
            $('table').bind('footable_breakpoint', function() {
                $('table').trigger('footable_expand_first_row');
            })
        });
		
		
    </script>
</html>

			