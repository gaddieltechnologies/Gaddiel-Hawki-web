<?php
ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <title>Hawki</title>
    
   
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <!-- Google font -->
<script type="text/javascript">
function Validate(){
	var valid = true;
	var message = '';
	var CLIENT_CODE = document.getElementById("CLIENT_CODE");
	var CLIENT_NAME= document.getElementById("CLIENT_NAME");
	var CLIENT_LOC = document.getElementById("CLIENT_LOC");
	var CLIENT_CLASSIFICATION= document.getElementById("CCID");
	var SE_VISIT_COUNT = document.getElementById("SE_VISIT_COUNT");
	var SE_CODE= document.getElementById("SE_CODE");
	var RI_VISIT_COUNT = document.getElementById("RI_VISIT_COUNT");
	var SE_VISIT_SCH_PERIOD_ID= document.getElementById("SE_VISIT_SCH_PERIOD_ID");
	var RI_VISIT_SCH_PERIOD_ID= document.getElementById("RI_VISIT_SCH_PERIOD_ID");
	
	
	var Active = document.getElementById("ACTIVE");
	//var lname = document.getElementById("RI_CODE");
	
	if( CLIENT_CODE.value.trim() == ''){
		valid = false;
		message = message + '*Client Code is required' + '\n';
	}
	if(CLIENT_NAME.value.trim() == ''){
		valid = false;
		message = message + '*Client Name is required' + '\n';
	}
	
	if(CLIENT_LOC.value.trim() == ''){
		valid = false;
		message = message + '*Client Location is required' + '\n';
	}
	
	if(SE_VISIT_COUNT.value.trim() == ''){
		valid = false;
		message = message + '*SE Visit Count is required' + '\n';
	}
    if(CLIENT_CLASSIFICATION.value == '-- SELECT --'){
		valid = false;
		message = message + '*Client Classification is required' + '\n';
	}
	
	if(SE_CODE.value == '-- SELECT --'){
		valid = false;
		message = message + '*SE Code is required' + '\n';
	}
	 if(SE_VISIT_SCH_PERIOD_ID.value == '-- SELECT --'){
		valid = false;
		message = message + '*SE Visit Schedule is required' + '\n';
	}
	
	if(RI_VISIT_SCH_PERIOD_ID.value == '-- SELECT --'){
		valid = false;
		message = message + '*RI Visit Schedule is required' + '\n';
	}
	if(RI_VISIT_COUNT.value.trim() == ''){
		valid = false;
		message = message + '*RI Visit Count is required' + '\n';
	}
	
	if (valid == false){
		alert(message);
		return false;
	}
}

</script>	
<script type="text/JavaScript">

function showState(sel) {
    var id = sel.options[sel.selectedIndex].value;  
    $("#CategoryID").html( "" );
   // $("#output2").html( "" );
    if (id.length > 0 ) {
 
     $.ajax({
            type: "POST",
            url: "subClientCat.php",
            data: "id="+id,
            cache: false,
            
            success: function(html) {    
                $("#CategoryID").html( html );
				 
            }
        });
    }
}
function showStates(RI) {
    var SECode = RI.options[RI.selectedIndex].value;  
    $("#RIcode").html( "" );
   // $("#output2").html( "" );
    if (SECode.length > 0 ) {
 
     $.ajax({
            type: "POST",
            url: "subjobcat.php",
            data: "SECode="+SECode,
            cache: false,           
            success: function(html) {    
                $("#RIcode").html( html );
		 
		
            }
        });
    }
	
}
  function onlyNos(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
        }
		  function onlyNoss(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
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
	<form action="addClientDetails.php" method="POST" enctype="multipart/form-data" onSubmit="return Validate();">
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
									<h3>Client Details</h3>	
								</div>                       
								<div class="span3">                                                                
									<div class="box-holder">
											
									</div>  
									<div class="box-holder">
												
												 
									</div>  
									<div class="box-holder">
										<a href="clientDetails.php">
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
								<h3>Add Client</h3>
							</div>
							<div class="widget-content">
													
                                 <div class="span3"><label>Code<font color="#FF0000"> *</font></label><input type="text" autofocus name="CLIENT_CODE"  id="CLIENT_CODE" class="span3"></div>
								<div class="span3"><label>Name<font color="#FF0000"> *</font></label><input type="text" value="<?php echo !empty($EMP_NAME)?$EMP_NAME:'';?>" name="CLIENT_NAME"  id="CLIENT_NAME" class="span3"></div>								
							
								
								<div class="span5"><label>Classification<font color="#FF0000"> *</font></label>
								
								<?php 
										
										 include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php');
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,DESCRIPTION FROM CLIENT_CLASSIFICATION");
											$result->execute();
											
											echo '<select class="span5" name="CCID" id="CCID" onChange="showState(this);">';
											echo  '<option>-- SELECT --</option>';										              
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											<option value="<?php  echo $row['ID'];?>"><?php  echo $row['ID'];?> ( <?php  echo $row['DESCRIPTION'];?> ) </option>						    
											<?php } echo '</select>';  ?>		
								</div>	
								
							
							    <div id="CategoryID">
								<div class="span3"><label>Category</label><input type="text" value="<?php echo $row['CLIENT_CATEGORY'];?>" disabled="disabled" class="span3"></div>
								<div class="span3"><label>Category Description</label><input type="text" value="<?php  echo $row['DESCRIPTIONN'];?> "disabled="disabled" class="span3"></div>
								<div class="span1"><label>Class</label><input type="text" value="<?php echo $row['CLIENT_CLASS'];?>" disabled="disabled" class="span1"></div>
								<div class="span4"><label>Class Description</label><input type="text" value=" <?php  echo $row['DESCRIPTION'];?> " disabled="disabled" class="span4"></div>
                                </div>
									
								  <div class="span3"><label>Location Name<font color="#FF0000"> *</font></label><input type="text" value="" name="CLIENT_LOC" id="CLIENT_LOC"  class="span3"></div>							
                                <div class="span3"><label>Location Latitude</label><input type="text" maxlength="20" value="" name="CLIENT_LOC_LAT" id="CLIENT_LOC_LAT"  class="span3"></div>
                                <div class="span3"><label>Location Longitude</label><input type="text" maxlength="20" value="" name="CLIENT_LOC_LNG" id="CLIENT_LOC_LNG" class="span3"></div>
								 <div class="span2"><label>Range in Meters</label><input type="text" maxlength="20" value="" name="RANGE" id="RANGE" class="span2"></div>
                              	 
								 <div class="span6"><label>SE Code<font color="#FF0000"> *</font></label>
								 	
								 <?php 
										
										 
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT SE_CODE,SE_DESCRIPTION FROM JOB_HIERARCHY");
											$result->execute();
											
											echo '<select class="span6" name="SE_CODE" id="SE_CODE" onChange="showStates(this);">';
											echo  '<option>-- SELECT --</option>';											
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
											
                                            											
								?>												
											<option value="<?php  echo $row['SE_CODE'];?>"  ><?php  echo $row['SE_CODE'];?> ( <?php  echo $row['SE_DESCRIPTION'];?> ) </option>						    
											<?php } echo '</select>';  ?>
									<?php
									  if ( !empty($_POST))
			                        {
									    $Secode= $_POST['SE_CODE'];
										$pdo = Database::connect();
										$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$query ="SELECT RI_CODE,RI_DESCRIPTION FROM JOB_HIERARCHY WHERE SE_CODE = '$Secode'";
													//echo $country_id;
										$result = $pdo->prepare($query);
										$result->execute();
										$row = $result->fetch();
										$Ricode = $row['RI_CODE'];
									
										$RIdescription = $row['RI_DESCRIPTION'];
										Database::disconnect();	
									}	
                                    ?>									
								 </div>
							    
								<div  id="RIcode">
								
								<div class="span5"><label>RI Code</label><input type="text" disabled="disabled" class="span5"></div>	
								</div>
								<div class="span6"><label>SE Visit Schedule<font color="#FF0000"> *</font></label>
								 <?php 
										
										 
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,SCH_PERIOD,DESCRIPTION FROM VISIT_SCH_PERIODS");
											$result->execute();
											
											echo '<select class="span6" id="SE_VISIT_SCH_PERIOD_ID" name="SE_VISIT_SCH_PERIOD_ID">';
											echo  '<option>-- SELECT --</option>';												
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											<option value="<?php  echo $row['ID'];?>" ><?php  echo $row['SCH_PERIOD'];?> ( <?php  echo $row['DESCRIPTION'];?> ) </option>						    
											<?php } echo '</select>';  ?>
										
								 </div>
								
														
								<div class="span5"><label>RI Visit Schedule<font color="#FF0000"> *</font></label>
								 <?php 
										
										 
											$pdo = Database::connect();
											$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											$result = $pdo->prepare("SELECT ID,SCH_PERIOD,DESCRIPTION FROM VISIT_SCH_PERIODS");
											$result->execute();
											
											echo '<select class="span5" id="RI_VISIT_SCH_PERIOD_ID" name="RI_VISIT_SCH_PERIOD_ID">';
											echo  '<option>-- SELECT --</option>';												
											for($i=0; $row = $result->fetch(); $i++){																	
												Database::disconnect();	
								?>												
											<option value="<?php  echo $row['ID'];?>" ><?php  echo $row['SCH_PERIOD'];?> ( <?php  echo $row['DESCRIPTION'];?> ) </option>						    
											<?php } echo '</select>';  ?>
										
								 </div>	
								<div class="span3"><label>SE Visit Count <font color="#FF0000"> *</font></label><input type="text" value="" maxlength="4" name="SE_VISIT_COUNT"  id="SE_VISIT_COUNT" class="span3" onkeypress="return onlyNos(event,this);"></div>									 
								<div class="span3"><label>RI Visit Count<font color="#FF0000"> *</font></label><input type="text" maxlength="4" value="" name="RI_VISIT_COUNT" id="RI_VISIT_COUNT" onkeypress="return onlyNoss(event,this);" class="span3"></div>
                               
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
												
													<a href="clientDetails.php" class="btn btn-default">
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

		  if ( !empty($_POST))
			{
		    	 
				$CLIENT_CODE = $_POST['CLIENT_CODE'];
			    $CLIENT_NAME = $_POST['CLIENT_NAME'];
			    $CLIENT_CLASSIFICATION_ID = $_POST['CCID'];
			    $CLIENT_LOC = $_POST['CLIENT_LOC'];
			    $CLIENT_LOC_LNG = $_POST['CLIENT_LOC_LNG'];
			    $CLIENT_LOC_LAT = $_POST['CLIENT_LOC_LAT'];
				 $SE_CODE = $_POST['SE_CODE'];
			    $SE_VISIT_SCH_PERIOD_ID = $_POST['SE_VISIT_SCH_PERIOD_ID'];
			    $SE_VISIT_COUNT = $_POST['SE_VISIT_COUNT'];
			    $RANGE = $_POST['RANGE'];
			   // $RI_CODE =$_SESSION['RIcode'];
           
			    $RI_VISIT_SCH_PERIOD_ID = $_POST['RI_VISIT_SCH_PERIOD_ID'];
				$RI_VISIT_COUNT = $_POST['RI_VISIT_COUNT'];
			
			     $valid = true;
                $pdo = Database::connect();
				$sql = "SELECT * FROM CLIENT_DETAILS WHERE CLIENT_CODE = '$CLIENT_CODE'";
				$query =  $pdo->prepare( $sql );
				$query->execute();
                $rows = $query->fetch(PDO::FETCH_NUM);
               if($rows > 0) {
                    	echo "<script language=javascript>alert('Client Code already exits.')</script>";
                 }
			  
		    else{
			       $rad =$RANGE *0.0010;			        
                    $R=6371;
				
				    $lat=$CLIENT_LOC_LAT;
					$lon=$CLIENT_LOC_LNG;
				    $MAXLAT = $lat + rad2deg($rad/$R);					
					$MINLAT = $lat - rad2deg($rad/$R);
					$MAXLON = $lon + rad2deg($rad/$R/cos(deg2rad($lat)));
					$MINLON = $lon - rad2deg($rad/$R/cos(deg2rad($lat)));

					$SWLAT=($CLIENT_LOC_LAT-0.0002); 
					$SWLNG=($CLIENT_LOC_LNG-0.0002);
					$NELAT=($CLIENT_LOC_LAT+0.0002);
					$NELNG=($CLIENT_LOC_LNG+0.0002);
					echo "$CLIENT_CODE,$CLIENT_NAME,$CLIENT_CLASSIFICATION_ID,$CLIENT_LOC,$CLIENT_LOC_LNG,$CLIENT_LOC_LAT,$SWLAT,$SWLNG,$NELAT,$NELNG,$MAXLAT,$MINLAT,$MAXLON,$MINLON,$RANGE,$SE_CODE,$SE_VISIT_SCH_PERIOD_ID,$SE_VISIT_COUNT,$Ricode,$RI_VISIT_SCH_PERIOD_ID,$RI_VISIT_COUNT";
				$pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
                $sqlq = "INSERT INTO CLIENT_DETAILS (CREATED_DATE,CLIENT_CODE,CLIENT_NAME,CLIENT_CLASSIFICATION_ID,CLIENT_LOC,CLIENT_LOC_LNG,CLIENT_LOC_LAT,SWLAT,SWLNG,NELAT,NELNG,MAXLAT,MINLAT,MAXLON,MINLON,RANGE_IN_MTS,SE_CODE,SE_VISIT_SCH_PERIOD_ID,SE_VISIT_COUNT,RI_CODE,RI_VISIT_SCH_PERIOD_ID,RI_VISIT_COUNT) values(now(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $q = $pdo->prepare($sqlq);
                $q->execute(array($CLIENT_CODE,$CLIENT_NAME,$CLIENT_CLASSIFICATION_ID,$CLIENT_LOC,$CLIENT_LOC_LNG,$CLIENT_LOC_LAT,$SWLAT,$SWLNG,$NELAT,$NELNG,$MAXLAT,$MINLAT,$MAXLON,$MINLON,$RANGE,$SE_CODE,$SE_VISIT_SCH_PERIOD_ID,$SE_VISIT_COUNT,$Ricode,$RI_VISIT_SCH_PERIOD_ID,$RI_VISIT_COUNT));
                Database::disconnect();	
				
				echo "<div class='alert alert-info'> Successfully Inserted. </div>";
              	header('Location:clientDetails.php');
				ob_end_flush();
                 exit;
		    }
			    
			  	
			}
			ob_end_flush();
		?>