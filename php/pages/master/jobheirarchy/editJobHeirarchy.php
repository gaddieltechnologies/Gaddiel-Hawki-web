<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <title>Hawki</title>
    
   
    <!-- Google font -->
  

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
                                    <h3> Job Heirarchy</h3>	
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
						<?php
			
			include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php'); 
			ob_start();
				
	 if ( !empty($_POST)) {
	
			$ID =$_GET['id'];
			//$LAST_UPDATE_DATE = $_GET['LAST_UPDATE_DATE'];
			$SE_CODE = $_POST['SE_CODE'];
			$SE_DESCRIPTION = $_POST['SE_DESCRIPTION'];
			$RI_CODE = $_POST['RI_CODE'];
			$RI_DESCRIPTION = $_POST['RI_DESCRIPTION'];	
			
			// query			
			  $pdo = Database::connect();
				$sql = "SELECT * FROM JOB_HIERARCHY WHERE SE_CODE = '$SE_CODE'  AND ID != '$ID'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    	
						  echo "<div class='alert alert-info'>  SE code <'$SE_CODE'> already exists. No update done... </div>";
                 }
			  
		    else{
		        $sql = "UPDATE JOB_HIERARCHY 
						SET CREATED_DATE= NOW(), LAST_UPDATE_DATE= NOW(), SE_CODE=?, SE_DESCRIPTION=?, RI_CODE=?, RI_DESCRIPTION=?
						WHERE ID=?";
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$q = $pdo->prepare($sql);
				$q->execute(array($SE_CODE,$SE_DESCRIPTION ,$RI_CODE,$RI_DESCRIPTION,$ID));
				 echo "<div class='alert alert-success'> Successfully Updated. </div>"; 
			    echo '<script type="text/javascript">
				window.location.href = "jobHeirarchy.php";
				</script>';
		}	
		}
			$ID = $_GET['id']; /** get the VISIT_SCH_PERIODS ID **/
			        $pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
					$result = $pdo->prepare("SELECT * FROM JOB_HIERARCHY WHERE id= :userid");
	                $result->bindParam(':userid', $ID);
	                $result->execute();
	                for($i=0; $row = $result->fetch(); $i++)
	{				Database::disconnect();	
	
	  
			
		?>
						<div class="widget">
							<div class="widget-header">
								<h3>Edit Job Heirarchy</h3>
							</div>
							<div class="widget-content">							   
                                <div class="span1"><label>Code</label><input type="text" value="<?php echo $row['ID'];?>" name="ID" disabled="disabled"  class="span1"></div>
                               <!-- <div class="span3"><label>Last Update Date</label><input type="text" value="<?php echo $row['LAST_UPDATE_DATE'];?>" name="LAST_UPDATE_DATE" disabled="disabled"  class="span3"></div> -->                             
							   <div class="span3"><label>SE Code<font color="#FF0000"> *</font></label><input type="text" value="<?php echo $row['SE_CODE'];?>" name="SE_CODE" id="SE_CODE" autofocus  class="span3"></div>
                                <div class="span5"><label>SE Description</label><input type="text" value="<?php echo $row['SE_DESCRIPTION'];?>"  name="SE_DESCRIPTION" id="SE_DESCRIPTION" class="span5"></div>
                                <div class="span4"><label>RI Code<font color="#FF0000"> *</font></label><input type="text" value="<?php echo $row['RI_CODE'];?>"  name="RI_CODE" id="RI_CODE"  class="span4"></div>
                                <div class="span5"><label>RI Description</label><input type="text" value="<?php echo $row['RI_DESCRIPTION'];?>"  name="RI_DESCRIPTION" id="RI_DESCRIPTION" class="span5"></div>    
                                   
                               	<div class="span2"><label>&nbsp;</label><input type="submit" name="update" value="Update" autofocus  class="btn btn-info span2" /></div>		
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
<?php
	}
	
?>		
</body>

</html>
