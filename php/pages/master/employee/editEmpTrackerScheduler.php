<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <title>Hawki</title>
    
  
	<script src="../../../resources/js/jquery.1.9.1.min.js"></script>	
	<script src="../../../resources/js/jquery-clockpicker.min.js"></script>	
    <!-- Google font -->
	<link rel="stylesheet" type="text/css" href="../../../resources/css/jquery-clockpicker.min.css">
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
	//start time
	var sunstart_time = $("#SUN_STARTTIME").val();
	//end time
	var sunend_time = $("#SUN_ENDTIME").val();
	//by this you can see time stamp value in console via firebug
	console.log("Time1: " + sunstart_time + " Time2: " + sunend_time);
	
	if (sunstart_time > sunend_time) {
		console.log( $("#SUN_ENDTIME"));
		$("#SUN_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
		$("#SUN_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
		return false;
	} else {
		$('.alert, .alert-error').remove();
	}
	
	
		//start time
		var monstart_time = $("#MON_STARTTIME").val();
		//end time
		var monend_time = $("#MON_ENDTIME").val();
		//by this you can see time stamp value in console via firebug
		console.log("Time1: " + monstart_time + " Time2: " + monend_time);
		
		if (monstart_time > monend_time) {
			console.log( $("#MON_ENDTIME"));
			$("#MON_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
			$("#MON_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
			return false;
		} else {
			$('.alert, .alert-error').remove();
		}
	

		//start time
		var tuestart_time = $("#TUE_STARTTIME").val();
		//end time
		var tueend_time = $("#TUE_ENDTIME").val();
		//by this you can see time stamp value in console via firebug
		console.log("Time1: " + tuestart_time + " Time2: " + tueend_time);
		
		if (tuestart_time > tueend_time) {
			console.log( $("#TUE_ENDTIME"));
			$("#TUE_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
			$("#TUE_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
			return false;
		} else {
			$('.alert, .alert-error').remove();
		}

		//start time
		var wedstart_time = $("#WED_STARTTIME").val();
		//end time
		var wedend_time = $("#WED_ENDTIME").val();
		//by this you can see time stamp value in console via firebug
		console.log("Time1: " + wedstart_time + " Time2: " + wedend_time);
		
		if (wedstart_time > wedend_time) {
			console.log( $("#WED_ENDTIME"));
			$("#WED_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
			$("#WED_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
			return false;
		} else {
			$('.alert, .alert-error').remove();
		}
	
	
		//start time
		var thustart_time = $("#THU_STARTTIME").val();
		//end time
		var thuend_time = $("#THU_ENDTIME").val();
		//by this you can see time stamp value in console via firebug
		console.log("Time1: " + thustart_time + " Time2: " + thuend_time);
		
		if (thustart_time > thuend_time) {
			console.log( $("#THU_ENDTIME"));
			$("#THU_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
			$("#THU_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
			return false;
		} else {
			$('.alert, .alert-error').remove();
		}
	
	
		//start time
		var fristart_time = $("#FRI_STARTTIME").val();
		//end time
		var friend_time = $("#FRI_ENDTIME").val();
		//by this you can see time stamp value in console via firebug
		console.log("Time1: " + fristart_time + " Time2: " + friend_time);
		
		if (fristart_time > friend_time) {
			console.log( $("#FRI_ENDTIME"));
			$("#FRI_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
			$("#FRI_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
			return false;
		} else {
			$('.alert, .alert-error').remove();
		}
	
	
		//start time
		var satstart_time = $("#SAT_STARTTIME").val();
		//end time
		var satend_time = $("#SAT_ENDTIME").val();
		//by this you can see time stamp value in console via firebug
		console.log("Time1: " + satstart_time + " Time2: " + satend_time);
		
		if (satstart_time > satend_time) {
			console.log( $("#SAT_ENDTIME"));
			$("#SAT_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
			$("#SAT_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
			return false;
		} else {
			$('.alert, .alert-error').remove();
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
	
	<?php	
	include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php'); 
			ob_start();
			 if ( !empty($_POST)) {
	
						$EMP_ID =$_GET['id'];						
						//$LAST_UPDATE_DATE = $_GET['LAST_UPDATE_DATE'];
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
			// query
			$sql ="UPDATE EMP_TRACKER_SCH SET
			             CREATED_DATE= NOW(),
						 LAST_UPDATE_DATE = NOW(),
						 SUN_STARTTIME = ?,
						 SUN_ENDTIME =  ?,
						 SUN_TIMEINTERVAL =  ?,
						 MON_STARTTIME =  ?,
						 MON_ENDTIME =  ?,
						 MON_TIMEINTERVAL = ?,
						 TUE_STARTTIME = ?,
						 TUE_ENDTIME = ?,
						 TUE_TIMEINTERVAL = ?,
						 WED_STARTTIME = ?,
						 WED_ENDTIME =  ?,
						 WED_TIMEINTERVAL = ?,
						 THU_STARTTIME =  ?,
						 THU_ENDTIME = ?,
						 THU_TIMEINTERVAL = ?,
						 FRI_STARTTIME = ?,
						 FRI_ENDTIME = ?,
						 FRI_TIMEINTERVAL = ?,
						 SAT_STARTTIME =  ?,
						 SAT_ENDTIME = ?,
						 SAT_TIMEINTERVAL = ? 
						 WHERE EMP_ID=?";
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
						 $SAT_TIMEINTERVAL,
						 $EMP_ID ));
			
			
			
		}	
			$EMP_ID = $_GET['id']; /** get the EMP_TRACKER_SCH ID **/				
			
			        $pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
		$result = $pdo->prepare("SELECT sch.*,  emp.emp_name, emp.email_id, emp.job_code
								FROM  EMP_TRACKER_SCH sch,
								EMP_DETAILS  emp
								WHERE sch.emp_id = :userid
								AND emp.id = sch.emp_id;");
	                $result->bindParam(':userid', $EMP_ID);
	                $result->execute();
	                for($i=0; $row = $result->fetch(); $i++)
	{				Database::disconnect();	
			
		?>
	<!-- /Navbar -->
	<?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/header.php'); ?>
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
				<div class="span12 desktop">					
				    <div class="widget">                    					
					<div class="widget-content"> 
                                            <div class="span7">
                                            <h3>Employee Track Scheduler</h3>	
                                            </div>                       
                                               <div class="span3">                                                                
	                               <div class="box-holder">
	                                
	                               </div>  
	                               <div class="box-holder">
								        
										 
	                               </div>  
                                      <div class="box-holder">
                                           <a href="employee.php">
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
						<?php
							if ( !empty($_POST)) {	
								echo "<div class='alert alert-success'> Successfully Updated. </div>"; 
								
								echo '<script type="text/javascript">
								window.location.href = "employee.php";
								</script>';
							}
						?>
						<div class="widget">
							<div class="widget-header">
								<h3>Edit Employee Track Scheduler</h3>
							</div>
							<div class="widget-content">	
							
							<div class="row">
								
            <!-- <div class="span4"><label>Id</label><input type="text" value="<?php echo $row['ID'];?>" name="ID" disabled="disabled"  class="span4"></div>-->
            <div class="span1"><label>Code</label><input type="text"  value="<?php echo $row['EMP_ID'];?>" name="EMP_ID" disabled="disabled"  class="span1"></div>
			<div class="span3"><label>Name</label><input type="text" value="<?php echo $row['emp_name'];?>"  disabled="disabled"  class="span3"></div>
			<div class="span3"><label>Email</label><input type="text" value="<?php echo $row['email_id'];?>"  disabled="disabled"  class="span3"></div>
			<div class="span1"><label>Job Code</label><input type="text" value="<?php echo $row['job_code'];?>"  disabled="disabled"  class="span1"></div>
            <!--<div class="span4"><label>Last Update Date</label><input type="text" value="<?php echo $row['LAST_UPDATE_DATE'];?>" name="LAST_UPDATE_DATE" disabled="disabled"  class="span4"></div>-->
            <div class="span3"><label>&nbsp;</label><input type="submit" autofocus name="update" value="Update" class="btn btn-info span3" /></div>
          </div>
		  <div class="row">
		      <div class="span4"><label>Sun Start Time<font color="#FF0000"> *</font></label><input type="text" onchange="checksuntime()" value="<?php echo $row['SUN_STARTTIME'];?>" name="SUN_STARTTIME" id="SUN_STARTTIME" class="span4"></div>
              <div class="span4"><label>Sun End Time<font color="#FF0000"> *</font></label><input type="text" onchange="checksuntime()" value="<?php echo $row['SUN_ENDTIME'];?>" name="SUN_ENDTIME" id="SUN_ENDTIME" class="span4"></div>
              <div class="span3"><label>Sun Time Interval<font color="#FF0000"> *</font></label><input type="text" onkeypress="return numbersonly(event)" maxlength="3" value="<?php echo $row['SUN_TIMEINTERVAL'];?>" name="SUN_TIMEINTERVAL" id="SUN_TIMEINTERVAL" class="span3"></div>
          </div>
		  <div class="row">
			<div class="span4"><label>Mon Start Time<font color="#FF0000"> *</font></label><input type="text" onchange="checkmontime()" value="<?php echo $row['MON_STARTTIME'];?>" name="MON_STARTTIME" id="MON_STARTTIME" class="span4"></div>
            <div class="span4"><label>Mon End Time<font color="#FF0000"> *</font></label><input type="text" onchange="checkmontime()" value="<?php echo $row['MON_ENDTIME'];?>" name="MON_ENDTIME" id="MON_ENDTIME" class="span4"></div>
            <div class="span3"><label>Mon Time Interval<font color="#FF0000"> *</font></label><input type="text" onkeypress="return numbersonly(event)" maxlength="3" value="<?php echo $row['MON_TIMEINTERVAL'];?>" name="MON_TIMEINTERVAL" id="MON_TIMEINTERVAL" class="span3"></div>
		  </div>
		 <div class="row">
		   <div class="span4"><label>Tue Start Time<font color="#FF0000"> *</font></label><input type="text" onchange="checktuetime()" value="<?php echo $row['TUE_STARTTIME'];?>" name="TUE_STARTTIME" id="TUE_STARTTIME" class="span4"></div>
            <div class="span4"><label>Tue End Time<font color="#FF0000"> *</font></label><input type="text" onchange="checktuetime()" value="<?php echo $row['TUE_ENDTIME'];?>" name="TUE_ENDTIME" id="TUE_ENDTIME" class="span4"></div>
            <div class="span3"><label>Tue Time Interval<font color="#FF0000"> *</font></label><input type="text" onkeypress="return numbersonly(event)" maxlength="3" value="<?php echo $row['TUE_TIMEINTERVAL'];?>" name="TUE_TIMEINTERVAL" id="TUE_TIMEINTERVAL" class="span3"></div>
		 </div>
		 <div class="row"> 
			<div class="span4"><label>Wed Start Time<font color="#FF0000"> *</font></label><input type="text" onchange="checkwedtime()" value="<?php echo $row['WED_STARTTIME'];?>" name="WED_STARTTIME" id="WED_STARTTIME" class="span4"></div>
            <div class="span4"><label>Wed End Time<font color="#FF0000"> *</font></label><input type="text" onchange="checkwedtime()" value="<?php echo $row['WED_ENDTIME'];?>" name="WED_ENDTIME" id="WED_ENDTIME" class="span4"></div>
            <div class="span3"><label>Wed Time Interval<font color="#FF0000"> *</font></label><input type="text" onkeypress="return numbersonly(event)" maxlength="3" value="<?php echo $row['WED_TIMEINTERVAL'];?>" name="WED_TIMEINTERVAL" id="WED_TIMEINTERVAL" class="span3"></div>
		 </div>
		 <div class="row">  
		   <div class="span4"><label>Thu Start Time<font color="#FF0000"> *</font></label><input type="text" onchange="checkthutime()" value="<?php echo $row['THU_STARTTIME'];?>" name="THU_STARTTIME" id="THU_STARTTIME" class="span4"></div>
            <div class="span4"><label>Thu End Time<font color="#FF0000"> *</font></label><input type="text" onchange="checkthutime()" value="<?php echo $row['THU_ENDTIME'];?>" name="THU_ENDTIME" id="THU_ENDTIME" class="span4"></div>
            <div class="span3"><label>Thu Time Interval<font color="#FF0000"> *</font></label><input type="text" onkeypress="return numbersonly(event)" maxlength="3" value="<?php echo $row['THU_TIMEINTERVAL'];?>" name="THU_TIMEINTERVAL"  id="THU_TIMEINTERVAL" class="span3"></div>
		 </div>
		 <div class="row"> 
		   <div class="span4"><label>Fri Start Time<font color="#FF0000"> *</font></label><input type="text" onchange="checkfritime()" value="<?php echo $row['FRI_STARTTIME'];?>" name="FRI_STARTTIME" id="FRI_STARTTIME" class="span4"></div>
            <div class="span4"><label>Fri End Time<font color="#FF0000"> *</font></label><input type="text" onchange="checkfritime()" value="<?php echo $row['FRI_ENDTIME'];?>" name="FRI_ENDTIME" id="FRI_ENDTIME" class="span4"></div>
            <div class="span3"><label>Fri Time Interval<font color="#FF0000"> *</font></label><input type="text" onkeypress="return numbersonly(event)" maxlength="3" value="<?php echo $row['FRI_TIMEINTERVAL'];?>" name="FRI_TIMEINTERVAL" id="FRI_TIMEINTERVAL" class="span3"></div>
		 </div>
		 <div class="row">  
			<div class="span4"><label>Sat Start Time<font color="#FF0000"> *</font></label><input type="text" onchange="checksattime()" value="<?php echo $row['SAT_STARTTIME'];?>" name="SAT_STARTTIME" id="SAT_STARTTIME" class="span4"></div>
            <div class="span4"><label>Sat End Time<font color="#FF0000"> *</font></label><input type="text" onchange="checksattime()" value="<?php echo $row['SAT_ENDTIME'];?>" name="SAT_ENDTIME" id="SAT_ENDTIME" class="span4"></div>
            <div class="span3"><label>Sat Time Interval<font color="#FF0000"> *</font></label><input type="text" onkeypress="return numbersonly(event)" maxlength="3" value="<?php echo $row['SAT_TIMEINTERVAL'];?>" name="SAT_TIMEINTERVAL" id="SAT_TIMEINTERVAL" class="span3"></div>
         </div>  
							
								
								
							</div>                
						</div>
					</div>
				<!-- /Content -->
                </div>
				<?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/footer.php'); ?>
<div class="dock-wrapper">    
         <div class="navbar navbar-fixed-bottom">
            <div class="navbar-inner">
                <div class="container">                  
                        <center>
                            <div class="btn-group btn-group-justified">   
							   							
							    <a href="employee.php" class="btn btn-default">
									<img src="../../../resources/images/e-close.png"/><br>Close</a>		
						    </div>   
						</center> 	
				</div>     
           	</div>
		</div>
     </div>		
				
        </div>
</form>	
<?php
	}
	
?>	
		

</body>
	<script type="text/javascript">
		var input = $('#SUN_STARTTIME,#SUN_ENDTIME,#MON_STARTTIME,#MON_ENDTIME,#TUE_STARTTIME,#TUE_ENDTIME,#WED_STARTTIME,#WED_ENDTIME,#THU_STARTTIME,#THU_ENDTIME,#FRI_STARTTIME,#FRI_ENDTIME,#SAT_STARTTIME,#SAT_ENDTIME').clockpicker({
			placement: 'bottom',
			align: 'right',
			autoclose: true,
			'default': 'now'
		});									

	</script>
	
	<script>
		window.checksuntime = function() {
			//start time
			var sunstart_time = $("#SUN_STARTTIME").val();
			//end time
			var sunend_time = $("#SUN_ENDTIME").val();
			//by this you can see time stamp value in console via firebug
			console.log("Time1: " + sunstart_time + " Time2: " + sunend_time);
			
			if (sunstart_time > sunend_time) {
				console.log( $("#SUN_ENDTIME"));
				$("#SUN_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
				$("#SUN_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
				return false;
			} else {
				$('.alert, .alert-error').remove();
			}
		};
		window.checkmontime = function() {
			//start time
			var monstart_time = $("#MON_STARTTIME").val();
			//end time
			var monend_time = $("#MON_ENDTIME").val();
			//by this you can see time stamp value in console via firebug
			console.log("Time1: " + monstart_time + " Time2: " + monend_time);
			
			if (monstart_time > monend_time) {
				console.log( $("#MON_ENDTIME"));
				$("#MON_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
				$("#MON_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
				return false;
			} else {
				$('.alert, .alert-error').remove();
			}
		};
		window.checktuetime = function() {
			//start time
			var tuestart_time = $("#TUE_STARTTIME").val();
			//end time
			var tueend_time = $("#TUE_ENDTIME").val();
			//by this you can see time stamp value in console via firebug
			console.log("Time1: " + tuestart_time + " Time2: " + tueend_time);
			
			if (tuestart_time > tueend_time) {
				console.log( $("#TUE_ENDTIME"));
				$("#TUE_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
				$("#TUE_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
				return false;
			} else {
				$('.alert, .alert-error').remove();
			}
		};
		window.checkwedtime = function() {
			//start time
			var wedstart_time = $("#WED_STARTTIME").val();
			//end time
			var wedend_time = $("#WED_ENDTIME").val();
			//by this you can see time stamp value in console via firebug
			console.log("Time1: " + wedstart_time + " Time2: " + wedend_time);
			
			if (wedstart_time > wedend_time) {
				console.log( $("#WED_ENDTIME"));
				$("#WED_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
				$("#WED_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
				return false;
			} else {
				$('.alert, .alert-error').remove();
			}
		};
		window.checkthutime = function() {
			//start time
			var thustart_time = $("#THU_STARTTIME").val();
			//end time
			var thuend_time = $("#THU_ENDTIME").val();
			//by this you can see time stamp value in console via firebug
			console.log("Time1: " + thustart_time + " Time2: " + thuend_time);
			
			if (thustart_time > thuend_time) {
				console.log( $("#THU_ENDTIME"));
				$("#THU_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
				$("#THU_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
				return false;
			} else {
				$('.alert, .alert-error').remove();
			}
		};
		window.checkfritime = function() {
			//start time
			var fristart_time = $("#FRI_STARTTIME").val();
			//end time
			var friend_time = $("#FRI_ENDTIME").val();
			//by this you can see time stamp value in console via firebug
			console.log("Time1: " + fristart_time + " Time2: " + friend_time);
			
			if (fristart_time > friend_time) {
				console.log( $("#FRI_ENDTIME"));
				$("#FRI_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
				$("#FRI_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
				return false;
			} else {
				$('.alert, .alert-error').remove();
			}
		};
		window.checksattime = function() {
			//start time
			var satstart_time = $("#SAT_STARTTIME").val();
			//end time
			var satend_time = $("#SAT_ENDTIME").val();
			//by this you can see time stamp value in console via firebug
			console.log("Time1: " + satstart_time + " Time2: " + satend_time);
			
			if (satstart_time > satend_time) {
				console.log( $("#SAT_ENDTIME"));
				$("#SAT_STARTTIME").after('<span class="alert alert-error">Start Time Should be earlier to End Time</span>');
				$("#SAT_ENDTIME").after('<span class="alert alert-error">End Time Should be later to Start Time </span>');				
				return false;
			} else {
				$('.alert, .alert-error').remove();
			}
		};
		
		function numbersonly(e){
			var SUN_TIMEINTERVAL = document.getElementById("SUN_TIMEINTERVAL");
			var unicode=e.charCode? e.charCode : e.keyCode
			if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
				if (unicode<48||unicode>57) //if not a number
				return false //disable key press
			}
			
		}
		
	</script>
</html>
