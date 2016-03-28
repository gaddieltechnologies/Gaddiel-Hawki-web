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
	var EmployeeName = document.getElementById("EMP_NAME");
	var EmailId= document.getElementById("EMAIL_ID");	
	var JobPosition = document.getElementById("JOB_POSITION");
	var MobileNum = document.getElementById("MOBILE_NUM");
	var Active = document.getElementById("active");
	var jbcode= document.getElementById("jbcode");
	if( EmployeeName.value.trim() == ''){
		valid = false;
		message = message + '*Employee Name is required' + '\n';
	}
	if(EmailId.value.trim() == ''){
		valid = false;
		message = message + '*Email Id is required' + '\n';
	}
	if (EmailId.value.indexOf("@", 0) < 0){
		valid = false;
		window.alert("Please enter a valid e-mail address");
	}
	if (EmailId.value.indexOf(".", 0) < 0){
		valid = false;
		window.alert("Please enter a valid e-mail address");		
	}
	
	if(JobPosition.value.trim() == ''){
		valid = false;
		message = message + '*Job Position is required' + '\n';
	}
	
	if(MobileNum.value.trim() == ''){
		valid = false;
		message = message + '*Mobile Number is required' + '\n';
	}
	if(!MobileNum.value.match(/^[1-9]{1}[0-9]{9}$/)){
		valid = false;
		window.alert("Enter valid mobile number");
	}
	if(!Active.value.match( /^[a-zA-Z]+$/)){
		valid = false;
		window.alert("Enter only Y or N");
	}
       if(jbcode.value == '-- select --'){
		valid = false;
		message = message + '*Job Code is required' + '\n';
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
    
	<?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/header.php'); ?>
	<!-- /Navbar -->
	<form action="addEmployee.php" method="POST"  onSubmit="return Validate();">
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
									<h3>Employee Details </h3>	
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
						<div class="widget">
							<div class="widget-header">
								<h3>Add Employee</h3>
							</div>
							<div class="widget-content">							                              
                                 <div class="span3 hidefields"><label>Code</label><input type="text" name="ID" disabled="disabled"  class="span3"></div>
								<div class="span3"><label>Employee Name<font color="#FF0000"> *</font></label><input type="text" autofocus value="<?php echo !empty($EMP_NAME)?$EMP_NAME:'';?>" name="EMP_NAME"  id="EMP_NAME" class="span3"></div>
								<div class="span3"><label>Email Id<font color="#FF0000"> *</font></label><input type="text" value="<?php echo !empty($EMAIL_ID)?$EMAIL_ID:'';?>" name="EMAIL_ID"  id="EMAIL_ID" onblur="validateEmail()" class="span3"></div>
								
								<div class="span5"><label>Job Code<font color="#FF0000"> *</font></label>
									<?php 
										
										include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php');
										$pdo = Database::connect();
										$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$result = $pdo->prepare("SELECT SE_CODE JOB_CODE, SE_DESCRIPTION DESCRIPTION FROM JOB_HIERARCHY
																union
																SELECT RI_CODE JOB_CODE, RI_DESCRIPTION DESCRIPTION FROM JOB_HIERARCHY ORDER BY 1 DESC");
										$result->execute();
										
										echo '<select class="span5" id="jbcode" name="JOB_CODE">'; echo  '<option>-- select --</option>';	
										
										for($i=0; $row = $result->fetch(); $i++){																	
											Database::disconnect();	
										?>												
										<option value="<?php  echo $row['JOB_CODE'];?>" ><?php  echo $row['JOB_CODE'];?>(<?php  echo $row['DESCRIPTION'];?>) </option>						    
									<?php } echo '</select>';  ?>
																
								</div>						
								<div class="span3"><label>Job Position<font color="#FF0000"> *</font></label><input type="text" value="<?php echo !empty($JOB_POSITION)?$JOB_POSITION:'';?>" name="JOB_POSITION" id="JOB_POSITION" class="span3"></div>
								<div class="span3"><label>Mobile Num<font color="#FF0000"> *</font></label><input type="text" maxlength="10" value="<?php echo !empty($MOBILE_NUM)?$MOBILE_NUM:'';?>" name="MOBILE_NUM" id="MOBILE_NUM" onblur="validateForm()"  class="span3"></div>
                                <div class="span3 hidefields"><label>Device Active Date</label><input type="text" value="<?php echo !empty($DEVICE_ACTIVE_DATE)?$DEVICE_ACTIVE_DATE:'';?>" name="DEVICE_ACTIVE_DATE" id="DEVICE_ACTIVE_DATE" disabled="disabled"  class="span2"></div>
                                <div class="span2"><label>Active<font color="#FF0000"> *</font></label>
								<select name="ACTIVE" class="span2" id="active">
								<option>Y</option>
								<option>N</option></select>
								
								</div>   
                                   
                               	<div class="span3"><label>&nbsp;</label><input type="submit" name="Add" value="Add" class="btn btn-info span3" /></div>		
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
	</div>	
    </form>		
</body>


</html>
<?php
			 //include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php'); 
           
		    if ( !empty($_POST))
			{
		    	
				$EMP_NAME = $_POST['EMP_NAME'];
			    $EMAIL_ID = $_POST['EMAIL_ID'];
			    $JOB_POSITION = $_POST['JOB_POSITION'];
			    $JOB_CODE = $_POST['JOB_CODE'];
			    $MOBILE_NUM = $_POST['MOBILE_NUM'];
			    //$DEVICE_ACTIVE_DATE = $_POST['DEVICE_ACTIVE_DATE'];
			    $ACTIVE =$_POST['ACTIVE'];
			
			     $valid = true;
                $pdo = Database::connect();
				$sql = "SELECT * FROM EMP_DETAILS WHERE EMAIL_ID = '$EMAIL_ID'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    	echo "<script language=javascript>alert('Email ID already exits.')</script>";
                 }
			  
		    else{
				$pVEmailId  = $EMAIL_ID;
				
				$pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              	$sql = "INSERT INTO EMP_DETAILS (CREATED_DATE,EMP_NAME,EMAIL_ID,JOB_POSITION,JOB_CODE,MOBILE_NUM,ACTIVE) 
values(now(),?,?,?,?,?,?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($EMP_NAME,$pVEmailId,$JOB_POSITION ,$JOB_CODE,$MOBILE_NUM,$ACTIVE));
				Database::disconnect();	
				
				$pdo = Database::connect();				
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$query = "SELECT ID FROM EMP_DETAILS WHERE EMAIL_ID = '$pVEmailId'";
				$statement = $pdo->prepare($query);
				$statement->execute();
				$user_data = $statement->fetch();
				$pVEmpId = $user_data['ID'];
				Database::disconnect();	
				//echo $pVEmpId;
				
				$pdo = Database::connect();				
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sqll = "INSERT INTO EMP_TRACKER_SCH (
				CREATED_DATE,
				LAST_UPDATE_DATE,
				EMP_ID,				
				SUN_STARTTIME,
				SUN_ENDTIME,
				SUN_TIMEINTERVAL,
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
				values(now(),now(),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 				
				$queryy =  $pdo->prepare($sqll);
				$queryy->execute(array($pVEmpId,'08:00','22:00','10','08:00','22:00','10','08:00','22:00','10','08:00','22:00','10','08:00','22:00','10','08:00','22:00','10','08:00','22:00','10'));
			    Database::disconnect();	
				
				echo "<div class='alert alert-info'> Successfully Inserted. </div>";
				
               	header('Location:employee.php');
				ob_end_flush();
                 exit;
		    }
			    
			  	
			}
			ob_end_flush();
		?>