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
	var fname = document.getElementById("SE_CODE");
	var lname = document.getElementById("RI_CODE");
	
	if(fname.value.trim() == ''){
		valid = false;
		message = message + '*SE code is required' + '\n';
	}
	if(lname.value.trim() == ''){
		valid = false;
		message = message + '*RI Code is required';
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

	<?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/header.php'); ?>
	<form action="addJobHeirarchy.php" method="POST" onSubmit="return Validate();">
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
                                            <h3>Job Heirarchy</h3>	
                                            </div>                       
                                <div class="span3">                                                                
	                               <div class="box-holder">
	                                
	                               </div>  
	                               <div class="box-holder">
								        
										 
	                               </div>  
                                      <div class="box-holder">
                                           <a href="jobHeirarchy.php">
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
								<h3>Add Job Heirarchy</h3>
							</div>
							<div class="widget-content">							   
                                <!-- <div class="span3"><label>Job Heirarchy Code</label><input type="text"  name="ID" disabled="disabled"  class="span3"></div>
                                <div class="span3"><label>Last Update Date</label><input type="text"  name="LAST_UPDATE_DATE" disabled="disabled"  class="span3"></div>-->
                                <div class="span3"><label>SE Code<font color="#FF0000"> *</font></label><input type="text" autofocus value="<?php echo !empty($SE_CODE)?$SE_CODE:'';?>" name="SE_CODE" id="SE_CODE"  class="span3"></div>
                                <div class="span6"><label>SE Description</label><input type="text" value="<?php echo !empty($SE_DESCRIPTION)?$SE_DESCRIPTION:'';?>" name="SE_DESCRIPTION" id="SE_DESCRIPTION" class="span6"></div>
                                <div class="span3"><label>RI Code<font color="#FF0000"> *</font></label><input type="text" value="<?php echo !empty($RI_CODE)?$RI_CODE:'';?>" name="RI_CODE" id="RI_CODE"  class="span3"></div>
                                <div class="span6"><label>RI Description</label><input type="text" value="<?php echo !empty($RI_DESCRIPTION)?$RI_DESCRIPTION:'';?>" name="RI_DESCRIPTION" id="RI_DESCRIPTION" class="span6"></div>
                                        
                                   
                               	<div class="span2"><label>&nbsp;</label><input type="submit" name="Add" value="Add" class="btn btn-info span2" /></div>		
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
															
															
															<a href="jobHeirarchy.php" class="btn btn-default">
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
			
           include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php'); 
		 
			 if (! empty($_POST)){
			
		    	$SE_CODE = $_POST['SE_CODE'];
				$SE_DESCRIPTION = $_POST['SE_DESCRIPTION'];
                $RI_CODE = $_POST['RI_CODE'];
				$RI_DESCRIPTION = $_POST['RI_DESCRIPTION'];				
				
				     $valid = true;
                $pdo = Database::connect();
				$sql = "SELECT * FROM JOB_HIERARCHY WHERE SE_CODE = '$SE_CODE' ";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    	echo "<script language=javascript>alert('SE Code already exits.')</script>";
                 }
			  
		    else{
		            
		       $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO JOB_HIERARCHY (CREATED_DATE,LAST_UPDATE_DATE,SE_CODE,SE_DESCRIPTION,RI_CODE,RI_DESCRIPTION) values(now(), now(), ?, ?, ?, ?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($SE_CODE ,$SE_DESCRIPTION ,$RI_CODE, $RI_DESCRIPTION));
                Database::disconnect();	
					echo "<div class='alert alert-info'> Successfully Inserted. </div>";
               	header('Location:jobHeirarchy.php');
				ob_end_flush();
                exit;
		    }
			    
			  	
			}
			ob_end_flush();
?>