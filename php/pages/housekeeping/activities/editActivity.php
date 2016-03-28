<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <title>Hawki</title>
    
 
    <!-- Google font -->
   
	<script type="text/javascript">
function Validate(){
	var valid = true;
	var message = '';
	var fname = document.getElementById("ACTIVITY_NAME");
	//var lname = document.getElementById("RI_CODE");
	
	if(fname.value.trim() == ''){
		valid = false;
		message = message + '*Activity is required' + '\n';
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
                                            <h3>Visit Activity Details </h3>	
                                            </div>                       
                                               <div class="span3">                                                                
	                               <div class="box-holder">
	                                
	                               </div>  
	                               <div class="box-holder">
								        
										 
	                               </div>  
                                      <div class="box-holder">
                                           <a href="activity.php">
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
			$ACTIVITY_NAME = $_POST['ACTIVITY_NAME'];
			$DESCRIPTION = $_POST['DESCRIPTION'];
			// query
			 $pdo = Database::connect();
			$sql = "SELECT * FROM VISIT_ACTIVITIES WHERE ACTIVITY_NAME = '$ACTIVITY_NAME' AND ID != '$ID'";
			$query =  $pdo->prepare( $sql );
			$query->execute();
            $rows = $query->fetch(PDO::FETCH_NUM);
            if($rows > 0) {
                    	echo "<div class='alert alert-info'> Activity<'$ACTIVITY_NAME'> already exists. No update done....</div>";
						
						
                 }
			  
		    else{
			$sql = "UPDATE VISIT_ACTIVITIES 
					SET ACTIVITY_NAME=?, CREATED_DATE= NOW(), LAST_UPDATE_DATE= NOW(), DESCRIPTION=?
					WHERE ID=?";
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$q = $pdo->prepare($sql);
			$q->execute(array($ACTIVITY_NAME,$DESCRIPTION,$ID));
			echo "<div class='alert alert-success'> Successfully Updated. </div>"; 
			
				echo '<script type="text/javascript">
			window.location.href = "activity.php";
			</script>';
			}
			}
			$ID = $_GET['id']; /** get the VISIT_ACTIVITIES ID **/
			        $pdo = Database::connect();
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
					$result = $pdo->prepare("SELECT * FROM VISIT_ACTIVITIES WHERE id= :userid");
	                $result->bindParam(':userid', $ID);
	                $result->execute();
            for($i=0; $row = $result->fetch(); $i++)
	{				Database::disconnect();	
			
		?>
					
						<div class="widget">
							<div class="widget-header">
								<h3>Edit Visit Activity</h3>
							</div>
							<div class="widget-content">							   
                                <div class="span1"><label>Code</label><input type="text" value="<?php echo $row['ID'];?>" name="ID" disabled="disabled"  class="span1"></div>
                               <!-- <div class="span3"><label>Last Update Date</label><input type="text" value="<?php echo $row['LAST_UPDATE_DATE']; ?>" name="LAST_UPDATE_DATE" disabled="disabled"  class="span3"></div>-->
                                <div class="span3"><label>Activity<font color="#FF0000"> *</font></label><input type="text" autofocus value="<?php echo $row['ACTIVITY_NAME']; ?>" name="ACTIVITY_NAME" id="ACTIVITY_NAME" class="span3"></div>
                                <div class="span4"><label>Description</label><input type="text" value="<?php echo $row['DESCRIPTION'];?>" name="DESCRIPTION"  class="span4"></div>
                                    
                                   
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
							     								
							    <a href="activity.php" class="btn btn-default">
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
						}
						?>