<!-- saved from url=(0057)http://wbpreview.com/previews/WB01BG165/user-account.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
    <title>Hawki</title>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
	
    <!-- Google font -->
    <script>
        if (!window.jQuery) { document.write('<script src="../../../resources/js/jquery-1.9.1.min.js"><\/script>'); }
    </script>
	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->	
	<script type="text/javascript">
function clearform()
{
    document.getElementById('view').value="";
}
</script>
</head>

<body>

 <?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/connection.php'); ?>
	<!-- Navbar -->
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

	<!-- /Navbar -->
	
	 <?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/header.php'); ?>
	<!-- Main content -->
	<form action="" method="POST" name="forms">
	<div id="main-content">
		<!-- Container -->
		<div class="container">
			<!-- Header boxes -->
			<div class="box-container">
				
			</div>
			<!-- /Header boxes -->
			<!-- row boxes -->
			<div class="row">
			   <div class="span12 desktop">
				 <div class="widget">                 					
					<div class="widget-content "> 
						<div class="span8"><h3>Client Details</h3></div>                       
						<div class="span3">                                                                
							<div class="box-holder">
                                 <a href="addClientDetails.php" onClick="newPage()">
                                 <div class="box"><img src="../../../resources/images/e-add.png"/></br>New</div></a>	
                            </div>                      						
							
							 <div class="box-holder">
							   <a href="../../master.php">
							   <div class="box"><img src="../../../resources/images/e-close.png"/></br>Close</div></a>							
                             </div>                          
						</div>
					</div>
				</div>								
			 </div>
				<!-- /Content -->
					<div class="span12">
					    <div class="widget">					
						<div class="widget-content">
							<div class="mobile"><h3>Client Details</h3></div> 						
							<div class="span5"><input type="text" class="span5" placeholder="Search by Client Code"  id="ClientCode" autofocus name="ClientCode"/></div>               
							<div class="span4"><input type="text" class="span4" placeholder="Search by Client Name" id="ClientName" name="ClientName"/></div>
                             <div class="span5"><input type="text" class="span5" placeholder="Search by Client Location"  id="ClientLocation" name="ClientLocation"/></div>               
							<div class="span4"><input type="text" class="span4" placeholder="Search by SE code" id="SEcode" name="SEcode"/></div>                                														
							<div class="span2"><input type="submit" class="btn btn-info " onClick="searchvalue()" value="Search"> <a href="#" class="btn btn-info " onClick="clearvalue()">Clear</a></div>     
						   <!--<div class="span2"><a href="#" class="btn btn-info " onClick="searchvalue()">Search</a> <a href="#" class="btn btn-info " onClick="clearvalue()">Clear</a></div> -->                 
						</div>
					   </div>  
			  </div>  
				 <!------>
                <!-- /Content -->
				<div class="span12">
					<div class="widget-content">
						<div class="tab-content">
							<div class="tab-pane active" id="demo">
                              
							<table class="table demo table-bordered " data-filter="#filter" data-page-size="5"
							       data-page-previous-text="prev" data-page-next-text="next">
							<!--<table class="table table-striped table-bordered">-->                            
								<thead>
									   <tr class="widget-header">
										<th></th>                                        
										<th data-toggle="true">Client Code</th>
										<th>Client Name</th>					
										<th data-hide="phone,tablet">Client Location</th>
										<th data-hide="phone">SI Code</th>
										
										
									</tr>
								</thead>								
								<tbody id="gridvaluediv" class="mytable1">	
								 <?php 
									$pdo = Database::connect();
									$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									 $result = $pdo->prepare("select  clt.ID ID,clt.CLIENT_CODE CLIENT_CODE, clt.CLIENT_NAME CLIENT_NAME, clfn.DESCRIPTION DESCRIPTION, clt.CLIENT_LOC CLIENT_LOC, clt.SE_CODE SE_CODE 
									 FROM   CLIENT_CLASSIFICATION clfn,
									 CLIENT_DETAILS clt									 
									 WHERE  clt.CLIENT_CLASSIFICATION_ID = clfn.ID ORDER BY clt.ID DESC");
		                            $result->execute();									
		                            Database::disconnect();
									
								if ( !empty($_POST)) {	
                                    $CLIENT_CODE = $_POST['ClientCode'];							
			                        $CLIENT_NAME = $_POST['ClientName'];			
			                        $CLIENT_LOC = $_POST['ClientLocation'];
									$SE_CODE = $_POST['SEcode'];			                       
									$pdo = Database::connect();
									$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$sql="select  clt.ID ID,clt.CLIENT_CODE CLIENT_CODE, clt.CLIENT_NAME CLIENT_NAME, clfn.DESCRIPTION DESCRIPTION, clt.CLIENT_LOC CLIENT_LOC, clt.SE_CODE SE_CODE 
									 FROM   CLIENT_CLASSIFICATION clfn,
									 CLIENT_DETAILS clt									 
									 WHERE  clt.CLIENT_CLASSIFICATION_ID = clfn.ID AND clt.CLIENT_CODE LIKE :ClientCode AND clt.CLIENT_NAME LIKE :ClientName AND clt.CLIENT_LOC LIKE :ClientLocation AND clt.SE_CODE LIKE :SEcode;";
									$result=$pdo->prepare($sql);
									$result->bindValue(':ClientCode',$CLIENT_CODE.'%');
									$result->bindValue(':ClientName',$CLIENT_NAME.'%');
									$result->bindValue(':ClientLocation',$CLIENT_LOC.'%');
									$result->bindValue(':SEcode',$SE_CODE.'%');									
									$result->execute();									
									}
		                            for($i=0; $row = $result->fetch(); $i++){																	
									Database::disconnect();	                                 									
			 				      ?>
                              		 <script type="text/javascript">$('#view').hide()</script>				
									<tr Style="cursor:pointer;" id="views">
                                    <td class="actions">
											<a href="editClientDetails.php?id=<?php echo $row['ID']; ?>" class="btn btn-small "><i class="icon-pencil"></i></a>
											<a href="deleteClientDetails.php?id=<?php echo $row['ID']; ?>" class="btn btn-small" onclick="return confirm('Are you sure?')" ><i class="icon-remove"></i></a>
										</td>
										
										<td><?php echo  $row['CLIENT_CODE'];?></td>
										<td><?php echo  $row['CLIENT_NAME'];?></td>										
										<td><?php echo  $row['CLIENT_LOC'];?></td>
										 <td><?php echo  $row['SE_CODE'];?></td>                     
										<!--<td class="actions">
											<a href="#" class="btn btn-small btn-info"><i class="icon-ok"></i></a>
											<a href="#" class="btn btn-small btn-success"><i class="icon-remove"></i></a>
										</td>-->
									</tr>
									 <?php  }?>	
								</tbody>
							</table>
							</div>			
						</div>
					</div>
				</div>            
                <!------>
			</div><!-- /row boxes -->
			
			<!-- Footer -->
				
				 <?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/footer.php'); ?>
			<!-- /Footer -->
	 <!-- Navbar -->
			<div class="dock-wrapper row">    
				<div class="navbar navbar-fixed-bottom">
					<div class="navbar-inner">
						<div class="container">                         
							   <center>
								 <div class="btn-group btn-group-justified">                     
							   <a href="addClientDetails.php" class="newenable btn btn-default" onClick="newPage()" id="newenable">
									 <img src="../../../resources/images/e-add.png"/><br>New</a>                       													 
													   
								<a href="../../houseKeeping.php" class="btn btn-default">
									<img src="../../../resources/images/e-close.png"/><br>Cancel</a></div>
						  </center>                        		
						</div>
					</div>
				</div>
			</div>
	<!-- /Navbar -->
		</div>
		<!-- /Container -->
	</div>
	<!-- /Main content -->

	</form>
</body>
<!-- Javascript files -->
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
            }).footable();
        });
		
		
    </script>

<script type="text/javascript">
function clearvalue()
{
  document.getElementById("ClientCode").value="";
 document.getElementById("ClientName").value="";
 document.getElementById("ClientLocation").value="";
 document.getElementById("SEcode").value="";


 }
</script>


</html>