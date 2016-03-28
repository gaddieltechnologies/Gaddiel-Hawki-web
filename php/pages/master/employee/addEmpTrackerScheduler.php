<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <title>Hawki</title>
    
  
    <!-- Google font -->
   
    <script type="text/javascript">
function Validate(){
	var valid = true;
	var message = '';
	var SUN_STARTTIME = document.getElementById("SUN_STARTTIME");
	var SUN_ENDTIME = document.getElementById("SUN_ENDTIME");
	var SUN_TIMEINTERVAL = document.getElementById("SUN_TIMEINTERVAL");
	var MON_STARTTIME = document.getElementById("MON_STARTTIME");
	var MON_ENDTIME = document.getElementById("MON_ENDTIME");
	var MON_TIMEINTERVAL = document.getElementById("MON_TIMEINTERVAL");
	var TUE_STARTTIME = document.getElementById("TUE_STARTTIME");
    var TUE_ENDTIME = document.getElementById("TUE_ENDTIME");
	var TUE_TIMEINTERVAL = document.getElementById("TUE_TIMEINTERVAL");
	var WED_STARTTIME = document.getElementById("WED_STARTTIME");
	var WED_ENDTIME = document.getElementById("WED_ENDTIME");
	var WED_TIMEINTERVAL = document.getElementById("WED_TIMEINTERVAL");
	var THU_STARTTIME = document.getElementById("THU_STARTTIME");
	var THU_ENDTIME = document.getElementById("THU_ENDTIME");
	var THU_TIMEINTERVAL = document.getElementById("THU_TIMEINTERVAL");
	var FRI_STARTTIME = document.getElementById("FRI_STARTTIME");
	var FRI_ENDTIME = document.getElementById("FRI_ENDTIME");
	var FRI_TIMEINTERVAL = document.getElementById("FRI_TIMEINTERVAL");
	var SAT_STARTTIME = document.getElementById("SAT_STARTTIME");
	var SAT_ENDTIME = document.getElementById("SAT_ENDTIME");
	var SAT_TIMEINTERVAL = document.getElementById("SAT_TIMEINTERVAL");
	
	if(SUN_STARTTIME.value.trim() == ''){
		valid = false;
		message = message + '*Sun Start Time is required' + '\n';
	}
	if(SUN_ENDTIME.value.trim() == ''){
		valid = false;
		message = message + '*Sun End Time is required';
	}
		if(SUN_TIMEINTERVAL.value.trim() == ''){
		valid = false;
		message = message + '*Sun Time Interval is required' + '\n';
	}
	if(MON_STARTTIME.value.trim() == ''){
		valid = false;
		message = message + '*Mon Start Time is required';
	}
		if(MON_ENDTIME.value.trim() == ''){
		valid = false;
		message = message + '*Mon End Time is required' + '\n';
	}
	if(MON_TIMEINTERVAL.value.trim() == ''){
		valid = false;
		message = message + '*Mon Time Interval is required';
	}
		if(TUE_STARTTIME.value.trim() == ''){
		valid = false;
		message = message + '*Tue Start Time is required' + '\n';
	}
    if(TUE_ENDTIME.value.trim() == ''){
		valid = false;
		message = message + '*Tue End Time is required' + '\n';
	}
		if(TUE_TIMEINTERVAL.value.trim() == ''){
		valid = false;
		message = message + '*Tue Time Interval is required' + '\n';
	}
	if(WED_STARTTIME.value.trim() == ''){
		valid = false;
		message = message + '*Wed Start Time is required';
	}
		if(WED_ENDTIME.value.trim() == ''){
		valid = false;
		message = message + '*Wed End Time is required' + '\n';
	}
	if(WED_TIMEINTERVAL.value.trim() == ''){
		valid = false;
		message = message + '*Wed Time Interval is required';
	}
		if(THU_STARTTIME.value.trim() == ''){
		valid = false;
		message = message + '*Thu Start Time is required' + '\n';
	}
	if(THU_ENDTIME.value.trim() == ''){
		valid = false;
		message = message + '*Thu End Time is required';
	}
		if(THU_TIMEINTERVAL.value.trim() == ''){
		valid = false;
		message = message + '*Thu Time Interval is required' + '\n';
	}
	if(FRI_STARTTIME.value.trim() == ''){
		valid = false;
		message = message + '*Fri Start Time is required';
		}
	if(FRI_ENDTIME.value.trim() == ''){
		valid = false;
		message = message + '*Fri End Time is required';
	}
		if(FRI_TIMEINTERVAL.value.trim() == ''){
		valid = false;
		message = message + '*Fri Time Interval is required' + '\n';
	}
	if(SAT_STARTTIME.value.trim() == ''){
		valid = false;
		message = message + '*Sat Start Time is required';
	}
		if(SAT_ENDTIME.value.trim() == ''){
		valid = false;
		message = message + '*Sat End Time is required' + '\n';
	}
	if(SAT_TIMEINTERVAL.value.trim() == ''){
		valid = false;
		message = message + '*Sat Time Interval is required' + '\n';
	}

	if (valid == false){
		alert(message);
		return false;
	}
}

  
</script>	
	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->	
</head>

<body>
<style>

</style>
<!-- Navbar -->
	
	<!-- /Navbar -->
	<?php include 'header.php' ?>
	<form action="addEmpTrackerScheduler.php" method="POST" onSubmit="return Validate();">
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
					<div class="span12 desktop">					
						<div class="widget">                    					
						<div class="widget-content"> 
							<div class="span7">
	   					        <h3>Employee Track Scheduler Manger </h3>	
							</div>                       
							<div class="span3">                                                                
								<div class="box-holder">
										
								</div>  
								<div class="box-holder">
											
											 
								</div>  
								<div class="box-holder">
									<a href="empTrackerScheduler.php">
									<div class="box"><img src="resources/images/e-close.png"/></br>Close</div></a>							
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
								<h3>Add Employee Tracker Scheduler</h3>
							</div>
							<div class="widget-content">							   
								<!-- <div class="span4"><label>Id</label><input type="text" value="<?php echo $row['ID'];?>" name="ID" disabled="disabled"  class="span4"></div>-->
								<div class="span4"><label>Employee Code<font color="#FF0000"> *</font></label><input type="text"  name="EMP_ID" disabled="disabled"  class="span4"></div>
								<!--<div class="span4"><label>Last Update Date</label><input type="text" name="LAST_UPDATE_DATE" disabled="disabled"  class="span4"></div>-->
								<div class="span3"><label>&nbsp;</label><input type="submit" name="add" value="Add" class="btn btn-info span3" /></div>
								<div class="span4"><label>Sun Start Time</label><input type="text" value="<?php echo !empty($SUN_STARTTIME)?$SUN_STARTTIME:'';?>" name="SUN_STARTTIME" id="SUN_STARTTIME"  class="span4"></div>
								<div class="span4"><label>Sun End Time</label><input type="text" value="<?php echo !empty($SUN_ENDTIME)?$SUN_ENDTIME:'';?>" name="SUN_ENDTIME" id="SUN_ENDTIME" class="span4"></div>
								<div class="span3"><label>Sun Time Interval</label><input type="text" value="<?php echo !empty($SUN_TIMEINTERVAL)?$SUN_TIMEINTERVAL:'';?>" name="SUN_TIMEINTERVAL" id="SUN_TIMEINTERVAL"  class="span3"></div>
								<div class="span4"><label>Mon Start Time</label><input type="text" value="<?php echo !empty($MON_STARTTIME)?$MON_STARTTIME:'';?>" name="MON_STARTTIME" id="MON_STARTTIME" class="span4"></div>
								<div class="span4"><label>Mon End Time</label><input type="text" value="<?php echo !empty($MON_ENDTIME)?$MON_ENDTIME:'';?>" name="MON_ENDTIME" id="MON_ENDTIME" class="span4"></div>
								<div class="span3"><label>Mon Time Interval</label><input type="text" value="<?php echo !empty($MON_TIMEINTERVAL)?$MON_TIMEINTERVAL:'';?>" name="MON_TIMEINTERVAL" id="MON_TIMEINTERVAL" class="span3"></div>
								<div class="span4"><label>Tue Start Time</label><input type="text" value="<?php echo !empty($TUE_STARTTIME)?$TUE_STARTTIME:'';?>" name="TUE_STARTTIME" id="TUE_STARTTIME" class="span4"></div>
								<div class="span4"><label>Tue End Time</label><input type="text" value="<?php echo !empty($TUE_ENDTIME)?$TUE_ENDTIME:'';?>" name="TUE_ENDTIME" id="TUE_ENDTIME" class="span4"></div>
								<div class="span3"><label>Tue Time Interval</label><input type="text" value="<?php echo !empty($TUE_TIMEINTERVAL)?$TUE_TIMEINTERVAL:'';?>" name="TUE_TIMEINTERVAL" id="TUE_TIMEINTERVAL" class="span3"></div>
								<div class="span4"><label>Wed Start Time</label><input type="text" value="<?php echo !empty($WED_STARTTIME)?$WED_STARTTIME:'';?>" name="WED_STARTTIME" id="WED_STARTTIME" class="span4"></div>
								<div class="span4"><label>Wed End Time</label><input type="text" value="<?php echo !empty($WED_ENDTIME)?$WED_ENDTIME:'';?>" name="WED_ENDTIME" id="WED_ENDTIME" class="span4"></div>
								<div class="span3"><label>Wed Time Interval</label><input type="text" value="<?php echo !empty($WED_TIMEINTERVAL)?$WED_TIMEINTERVAL:'';?>" name="WED_TIMEINTERVAL" id="WED_TIMEINTERVAL" class="span3"></div>
								<div class="span4"><label>Thu Start Time</label><input type="text" value="<?php echo !empty($THU_STARTTIME)?$THU_STARTTIME:'';?>" name="THU_STARTTIME" id="THU_STARTTIME" class="span4"></div>
								<div class="span4"><label>Thu End Time</label><input type="text" value="<?php echo !empty($THU_ENDTIME)?$THU_ENDTIME:'';?>" name="THU_ENDTIME" id="THU_ENDTIME" class="span4"></div>
								<div class="span3"><label>Thu Time Interval</label><input type="text" value="<?php echo !empty($THU_TIMEINTERVAL)?$THU_TIMEINTERVAL:'';?>" name="THU_TIMEINTERVAL" id="THU_TIMEINTERVAL" class="span3"></div>
								<div class="span4"><label>Fri Start Time</label><input type="text" value="<?php echo !empty($FRI_STARTTIME)?$FRI_STARTTIME:'';?>" name="FRI_STARTTIME" id="FRI_STARTTIME" class="span4"></div>
								<div class="span4"><label>Fri End Time</label><input type="text" value="<?php echo !empty($FRI_ENDTIME)?$FRI_ENDTIME:'';?>" name="FRI_ENDTIME" id="FRI_ENDTIME" class="span4"></div>
								<div class="span3"><label>Fri Time Interval</label><input type="text" value="<?php echo !empty($FRI_TIMEINTERVAL)?$FRI_TIMEINTERVAL:'';?>" name="FRI_TIMEINTERVAL" id="FRI_TIMEINTERVAL" class="span3"></div>
								<div class="span4"><label>Sat Start Time</label><input type="text" value="<?php echo !empty($SAT_STARTTIME)?$SAT_STARTTIME:'';?>" name="SAT_STARTTIME" id="SAT_STARTTIME" class="span4"></div>
								<div class="span4"><label>Sat End Time</label><input type="text" value="<?php echo !empty($SAT_ENDTIME)?$SAT_ENDTIME:'';?>" name="SAT_ENDTIME" id="SAT_ENDTIME" class="span4"></div>
								<div class="span3"><label>Sat Time Interval</label><input type="text" value="<?php echo !empty($SAT_TIMEINTERVAL)?$SAT_TIMEINTERVAL:'';?>" name="SAT_TIMEINTERVAL" id="SAT_TIMEINTERVAL" class="span3"></div>
           
            		
							</div>                
						</div>
					</div>
				<!-- /Content -->
                </div>
				<?php include 'footer.php' ?>
					<div class="dock-wrapper">    
							 <div class="navbar navbar-fixed-bottom">
								<div class="navbar-inner">
									<div class="container">                  
											<center>
												<div class="btn-group btn-group-justified">                      
													<a href="#" class="btn btn-default" onClick="newPage()">
													<img src="resources/images/d-add.png"/><br>New</a> 
													<a id="viewd" class="viewd btn btn-default">
													<img src="resources/images/d-view.png"/><br>View</a>								   
													<a id="edit-d" href="#" class="edit-d btn btn-default">
													<img src="resources/images/d-edit.png"/><br>Edit</a>
													<a href="controlPanel" class="btn btn-default">
													<img src="resources/images/d-trash.png"/><br>Delete</a>
													<a href="controlPanel" class="btn btn-default">
														<img src="resources/images/e-close.png"/><br>Close</a>		
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
<?php
// configuration
	// new data
	 require 'connection.php'; 
	 if ( !empty($_POST)) 
	   {
	 
	 
	
						$SUN_STARTTIME = $_POST['SUN_STARTTIME'];
						$SUN_ENDTIME = $_POST['SUN_ENDTIME'];
						$SUN_TIMEINTERVAL = $_POST['SUN_TIMEINTERVAL'];
						$MON_STARTTIME = $_POST['MON_STARTTIME'];
						$MON_ENDTIME = $_POST['MON_ENDTIME'];
						$MON_TIMEINTERVAL = $_POST['MON_TIMEINTERVAL'];
						$TUE_STARTTIME = $_POST['TUE_STARTTIME'];
						$TUE_ENDTIME = $_POST['TUE_ENDTIME'];
						$TUE_TIMEINTERVAL = $_POST['TUE_TIMEINTERVAL'];
						$WED_STARTTIME = $_POST['WED_STARTTIME'];
						$WED_ENDTIME = $_POST['WED_ENDTIME'];
						$WED_TIMEINTERVAL = $_POST['WED_TIMEINTERVAL'];
						$THU_STARTTIME = $_POST['THU_STARTTIME'];
						$THU_ENDTIME = $_POST['THU_ENDTIME'];
						$THU_TIMEINTERVAL = $_POST['THU_TIMEINTERVAL'];
						$FRI_STARTTIME = $_POST['FRI_STARTTIME'];
						$FRI_ENDTIME = $_POST['FRI_ENDTIME'];
						$FRI_TIMEINTERVAL = $_POST['FRI_TIMEINTERVAL'];
						$SAT_STARTTIME = $_POST['SAT_STARTTIME'];
						$SAT_ENDTIME = $_POST['SAT_ENDTIME'];
						$SAT_TIMEINTERVAL = $_POST['SAT_TIMEINTERVAL'];
						 $valid = true;
    
        // insert data
           if ($valid) 
		   { 
			// query
			    $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO EMP_TRACKER_SCH (
				         CREATED_DATE,
						 LAST_UPDATE_DATE,
						 SUN_STARTTIME,
						 SUN_ENDTIME,
						 SUN_TIMEINTERVAL ,
						 MON_STARTTIME,
						 MON_ENDTIME ,
						 MON_TIMEINTERVAL,
						 TUE_STARTTIME, 
						 TUE_ENDTIME, 
						 TUE_TIMEINTERVAL, 
						 WED_STARTTIME,
						 WED_ENDTIME ,
						 WED_TIMEINTERVAL ,
						 THU_STARTTIME,
						 THU_ENDTIME,
						 THU_TIMEINTERVAL,
						 FRI_STARTTIME ,
						 FRI_ENDTIME,
						 FRI_TIMEINTERVAL,
						 SAT_STARTTIME,
						 SAT_ENDTIME,
						 SAT_TIMEINTERVAL) 
				values(now(), now(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$q = $pdo->prepare($sql);
                $q->execute(array(
				         $SUN_STARTTIME,
						 $SUN_ENDTIME,
						 $SUN_TIMEINTERVAL ,
						 $MON_STARTTIME,
						 $MON_ENDTIME ,
						 $MON_TIMEINTERVAL,
						 $TUE_STARTTIME, 
						 $TUE_ENDTIME, 
						 $TUE_TIMEINTERVAL, 
						 $WED_STARTTIME,
						 $WED_ENDTIME ,
						 $WED_TIMEINTERVAL ,
						 $THU_STARTTIME,
						 $THU_ENDTIME,
						 $THU_TIMEINTERVAL,
						 $FRI_STARTTIME ,
						 $FRI_ENDTIME,
						 $FRI_TIMEINTERVAL,
						 $SAT_STARTTIME,
						 $SAT_ENDTIME,
						 $SAT_TIMEINTERVAL));
               				
			    Database::disconnect();	
				echo "<div class='alert alert-info'> Successfully Inserted. </div>";
                	header('Location:empTrackerScheduler.php');
				    ob_end_flush();
                    exit;
		    }
			    
			  	
		}
			ob_end_flush();
?>