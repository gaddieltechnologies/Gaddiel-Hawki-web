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
			if (valid == false){
				alert(message);
				return false;
			}
		}
/*	  
	  function validateForm()
	{
	var MobileNum = document.getElementById("MOBILE_NUM");
	if(!MobileNum.value.match(/^[1-9]{1}[0-9]{9}$/))
	{
	window.alert("Enter valid mobile number");
	}
	} 
	function validateEmail()
	{
	
	var EmailId= document.getElementById("EMAIL_ID");
	if (EmailId.value.indexOf("@", 0) < 0)
	{

	window.alert("Please enter a valid e-mail address");
}
	if (EmailId.value.indexOf(".", 0) < 0)
	{
	
	window.alert("Please enter a valid e-mail address");

	}
	
	}
    function validateActive()
	{
	var Active = document.getElementById("active");
	if(!Active.value.match( /^[a-zA-Z]+$/))
	{
	window.alert("Enter only Y or N");
	}
	} 
  */
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
                                            <h3>Employee Details</h3>	
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
			
			 include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php'); 
			ob_start();
				 if ( !empty($_POST)) {
	
			$ID =$_GET['id'];	
      		
			$EMP_NAME = $_POST['EMP_NAME'];
			$EMAIL_ID = $_POST['EMAIL_ID'];
			$JOB_POSITION = $_POST['JOB_POSITION'];
			$JOB_CODE = $_POST['JOB_CODE'];
			$MOBILE_NUM = $_POST['MOBILE_NUM'];
			//$DEVICE_ACTIVE_DATE = $_POST['DEVICE_ACTIVE_DATE'];
			$ACTIVE = $_POST['ACTIVE'];
			// query
			   $pdo = Database::connect();
				$sql = "SELECT * FROM EMP_DETAILS WHERE EMAIL_ID = '$EMAIL_ID' AND ID != '$ID'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    	    echo "<div class='alert alert-info'> Email Id<'$EMAIL_ID '> already exists. No update done.... </div>";
						
				
                 }
			  
		    else{
			$sql = "UPDATE EMP_DETAILS 
					SET CREATED_DATE= NOW(), EMP_NAME=?,  EMAIL_ID=?, JOB_POSITION=?,JOB_CODE=?, MOBILE_NUM=?, ACTIVE=?
					WHERE ID=?";
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$q = $pdo->prepare($sql);
			$q->execute(array($EMP_NAME,$EMAIL_ID,$JOB_POSITION,$JOB_CODE,$MOBILE_NUM,$ACTIVE,$ID));
			echo "<div class='alert alert-success'> Successfully Updated. </div>"; 
			
			echo '<script type="text/javascript">
				window.location.href = "employee.php";
				</script>';
		}	
			
		}	
			$ID = $_GET['id']; /** get the EMP_DETAILS ID **/
			        $pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
					$result = $pdo->prepare("SELECT * FROM EMP_DETAILS WHERE id= :userid");
	                $result->bindParam(':userid', $ID);
	                $result->execute();
	                for($i=0; $row = $result->fetch(); $i++)
	{				Database::disconnect();	
							
						
					?>						
						<div class="widget">
							<div class="widget-header">
								<h3>Edit Employee</h3>
							</div>
							<div class="widget-content">							   
								<div class="span3"><label>Code</label><input type="text"  value="<?php echo $row['ID'];?>" name="ID" disabled="disabled"  class="span3"></div>
								<div class="span3"><label>Employee Name<font color="#FF0000"> *</font></label><input type="text" value="<?php echo $row['EMP_NAME'];?>" name="EMP_NAME" autofocus  id="EMP_NAME" class="span3"></div>
								<div class="span3"><label>Email Id<font color="#FF0000"> *</font></label><input type="text" value="<?php echo $row['EMAIL_ID'];?>" name="EMAIL_ID" id="EMAIL_ID" onblur="validateEmail()" class="span3"></div>
								<div class="span3"><label>Job Position<font color="#FF0000"> *</font></label><input type="text" value="<?php echo $row['JOB_POSITION'];?>" name="JOB_POSITION" id="JOB_POSITION" class="span3"></div>
								<div class="span3"><label>Job Code<font color="#FF0000"> *</font></label>
									<?php 
										
										$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$result = $pdo->prepare("SELECT SE_CODE JOB_CODE, SE_DESCRIPTION DESCRIPTION FROM JOB_HIERARCHY
										union
										SELECT RI_CODE JOB_CODE, RI_DESCRIPTION DESCRIPTION FROM JOB_HIERARCHY ORDER BY 1 DESC");
										$result->execute();
										
										echo '<select class="span3" name="JOB_CODE">';
										
										for($i=0; $rowjob = $result->fetch(); $i++){																	
											Database::disconnect();	
										?>										
										
										<option value="<?php  echo $rowjob['JOB_CODE']; echo '" ';if($rowjob['JOB_CODE'] == $row['JOB_CODE']) { echo 'selected'; } ?>  ><?php  echo $rowjob['JOB_CODE'];?>(<?php  echo $rowjob['DESCRIPTION'];?>) </option>						    
									<?php } echo '</select>';  ?>
								
								</div>
								
								<div class="span3"><label>Mobile Num<font color="#FF0000"> *</font></label><input type="text" maxlength="10" value="<?php echo $row['MOBILE_NUM'];?>" name="MOBILE_NUM" id="MOBILE_NUM" onblur="validateForm()" class="span3"></div>
                                <div class="span3"><label>Device Active Date</label><input type="text" value="<?php echo $row['DEVICE_ACTIVE_DATE'];?>" name="DEVICE_ACTIVE_DATE" disabled="disabled" id="DEVICE_ACTIVE_DATE" class="span3"></div>
                                <div class="span3"><label>Active<font color="#FF0000"> *</font></label>
								
                                <select name="ACTIVE" id="active">
								<?php if($row['ACTIVE']=='Y'):?>
								<option value="Y" selected>Y</option>
								<option value="N">N</option>
								<?php else: ?>
								<option value="Y">Y</option>
								<option value="N" selected>N</option>
								<?php endif; ?>
								</select>
								</div>
                               	<div class="span3"><label>&nbsp;</label><input type="submit" name="update" value="Update" class="btn btn-info span3" /></div>		
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

</html>
