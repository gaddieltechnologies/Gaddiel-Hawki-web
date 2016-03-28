
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

<?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/header.php'); ?>
	<!-- /Navbar -->
	<form action="" method="POST" name="forms">
	<!-- Main content -->
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
						<div class="span8"><h3>Employee Details</h3></div>                       
						<div class="span3">                                                                
							<div class="box-holder">
                                 <a href="addEmployee.php" onClick="newPage()">
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
							<div class="mobile"><h3>Employee Details</h3></div> 						
							<div class="span3"><input type="text" autofocus class="span3" placeholder="Search by Code"  id="searchEmployeeCode" name="searchEmployeeCode"/></div>               
							<div class="span3"><input type="text" class="span3" placeholder="Search by Employee Name" id="searchEmployeeName" name="searchEmployeeName"/></div>                          
							<div class="span3"><input type="text" class="span3" placeholder="Search by Email Id" id="searchmailid" name="searchmailid"/></div>                            							 
                            <div class="span2"><input type="submit" class="btn btn-info " onClick="searchvalue()" value="Search"> <a href="#" class="btn btn-info " onClick="clearvalue()">Clear</a></div>  							
									
							              
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
                                        <th data-toggle="true">Code</th>
										<th>Employee Name</th>
										<th data-hide="phone,tablet">Email Id</th>
                                        <th data-hide="phone,tablet">Job Position</th>
										<th data-hide="phone,tablet">Job Code</th>
										<th data-hide="phone,tablet">Mobile Num</th>
										<th data-hide="phone">Device Active Date</th>
										<th data-hide="phone">Active</th>
										
									</tr>		
								</thead>
                                							
								<tbody id="gridvaluediv" class="mytable1">	
                                
                                 <?php 
								  
								  	$pdo = Database::connect();
									$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$result = $pdo->prepare("SELECT ID,EMP_NAME,EMAIL_ID,JOB_POSITION,JOB_CODE,MOBILE_NUM,DEVICE_ACTIVE_DATE,ACTIVE FROM EMP_DETAILS ORDER BY ID DESC");
		                            $result->execute();
		                            Database::disconnect();	
								  
									if ( !empty($_POST)) {	
								    $ID = $_POST['searchEmployeeCode'];
			                        $EMP_NAME = $_POST['searchEmployeeName'];
									$EMAIL_ID = $_POST['searchmailid'];
									$pdo = Database::connect();
									$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									$sql="SELECT ID,EMP_NAME,EMAIL_ID,JOB_POSITION,JOB_CODE,MOBILE_NUM,DEVICE_ACTIVE_DATE,ACTIVE FROM EMP_DETAILS WHERE ID LIKE :searchEmployeeCode AND EMP_NAME LIKE :searchEmployeeName AND EMAIL_ID LIKE :searchmailid;";                   
									$result=$pdo->prepare($sql);
									$result->bindValue(':searchEmployeeCode',$ID.'%');
									$result->bindValue(':searchEmployeeName',$EMP_NAME.'%');
									$result->bindValue(':searchmailid',$EMAIL_ID.'%');
									$result->execute();
									}
		                            for($i=0; $row = $result->fetch(); $i++){																	
									Database::disconnect();
																	 
			 				      ?>										  
									<tr Style="cursor:pointer;">
                                       <td class="actions">										   
											<a href="editEmployee.php?id=<?php echo $row['ID']; ?>" class="btn btn-small  "><i class="icon-pencil"></i></a>
											<a href="deleteEmployee.php?id=<?php echo $row['ID']; ?>" class="btn btn-small " onclick="return confirm('Are you sure?')"><i class="icon-remove"></i></a>
										    <a href="editEmpTrackerScheduler.php?id=<?php echo $row['ID']; ?>" class="btn btn-small btn-warning "><i class=" icon-calendar"></i></a>
										</td>
										<td><?php  echo $row['ID'];?></td>
										<td><?php  echo $row['EMP_NAME'];?></td>
										<td><?php  echo $row['EMAIL_ID'];?></td>
                                        <td><?php  echo $row['JOB_POSITION'];?></td>
										<td><?php  echo $row['JOB_CODE'];?></td>
                                        <td><?php  echo $row['MOBILE_NUM'];?></td>
										<td><?php  echo $row['DEVICE_ACTIVE_DATE'];?></td>                      
                                        <td><?php  echo $row['ACTIVE'];?></td>
										
										                      
										
								</tr>
                                <?php }?>								  
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
                       <a href="addEmployee.php" class="newenable btn btn-default" onClick="newPage()" id="newenable">
                          	 <img src="../../../resources/images/e-add.png"/><br>New</a>                       													 
						                       
						<a href="../../master.php" class="btn btn-default">
                        	<img src="../../../resources/images/e-close.png"/><br>Cancel</a>
					     </div>
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
 
 document.getElementById("searchEmployeeCode").value="";
 document.getElementById("searchEmployeeName").value="";
 document.getElementById("searchmailid").value="";
}
</script>

</html>