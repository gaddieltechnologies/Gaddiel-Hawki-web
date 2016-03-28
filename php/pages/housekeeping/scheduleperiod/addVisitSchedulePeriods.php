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
	var fname = document.getElementById("SCH_PERIOD");
	//var lname = document.getElementById("RI_CODE");
	
	if(fname.value.trim() == ''){
		valid = false;
		message = message + '*Schedule Period is required' + '\n';
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
	<form action="addVisitSchedulePeriods.php" method="POST" onSubmit="return Validate();">
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
                                            <h3>Visit Schedule Periods </h3>	
                                            </div>                       
                                               <div class="span3">                                                                
	                               <div class="box-holder">
	                                
	                               </div>  
	                               <div class="box-holder">
								        
										 
	                               </div>  
                                      <div class="box-holder">
                                           <a href="visitSchedulePeriods.php">
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
								<h3>Add Visit Schedule Periods</h3>
							</div>
							<div class="widget-content">							   
                                <!--<div class="span3"><label>Schedule Periods Code</label><input type="text"  name="ID" disabled="disabled"  class="span3"></div>
                                <div class="span3"><label>Last Update Date</label><input type="text"  name="LAST_UPDATE_DATE" disabled="disabled"  class="span3"></div>-->
                                <div class="span4"><label>Schedule Periods<font color="#FF0000"> *</font></label><input type="text" autofocus value="<?php echo !empty($SCH_PERIOD)?$SCH_PERIOD:'';?>" name="SCH_PERIOD" id="SCH_PERIOD" class="span4"></div>
                                <div class="span4"><label>Description</label><input type="text" value="<?php echo !empty($DESCRIPTION)?$DESCRIPTION:'';?>" name="DESCRIPTION"  class="span4"></div>
                                    
                                   
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
							 
							    <a href="visitSchedulePeriods.php" class="btn btn-default">
								<img src="../../../resources/images/e-close.png"/><br>Close</a>		
						    </div>   
						</center> 	
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
           
		    if ( !empty($_POST))
			{
		    	$SCH_PERIOD = $_POST['SCH_PERIOD'];
				$DESCRIPTION = $_POST['DESCRIPTION'];				
				
				     $valid = true;
                    $pdo = Database::connect();
				$sql = "SELECT * FROM VISIT_SCH_PERIODS WHERE SCH_PERIOD = '$SCH_PERIOD'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    	echo "<script language=javascript>alert('Schedule Period already exits.')</script>";
                 }
			  
		    else{
				$pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO VISIT_SCH_PERIODS (CREATED_DATE,LAST_UPDATE_DATE,SCH_PERIOD,DESCRIPTION) values(now(), now(), ?, ?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($SCH_PERIOD ,$DESCRIPTION));
                Database::disconnect();
                echo "<div class='alert alert-info'> Successfully Inserted. </div>";				
                header('Location:visitSchedulePeriods.php');
				ob_end_flush();
                exit;
		    }
			    
			  	
			}
			ob_end_flush();
		?>