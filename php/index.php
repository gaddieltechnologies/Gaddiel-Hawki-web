<!-- saved from url=(0057)http://wbpreview.com/previews/WB01BG165/user-account.html -->
<?php
session_start();
?>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
    <title>Hawki</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
   
	<!-- CSS files -->
    <link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="resources/css/bootstrap-responsive.min.css" >
    <link rel="stylesheet" type="text/css" href="resources/css/alveolae.css">
    <link rel="stylesheet" type="text/css" href="resources/css/font-awesome.css">
    <!-- Google font -->
    <link href="/css/css.css" rel="stylesheet" type="text/css">
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->	
</head>

<body>
	<?php include "pages/connection.php" /** calling of connection.php that has the connection code **/ ?>
	<!-- Navbar -->
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="jindal.png" width="60px"/>&nbsp;&nbsp;JINDAL POLYBUTTONS LTD</a>
				<div class="nav-collapse">
					
				</div>
			</div>
		</div>
	</div>
	
	<!-- /Navbar -->
	
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
			<div class="span4.5">				
				<div class="widget">	
					<div class="widget-header ">
						<h3>Gaddiel Hawki</h3>
					</div>
					<div class="widget-content">						
						<div class="box-container">							
							<img src="hawkilogo.png" Width="300px" />						
						</div> 	
					
					</div>
					
				</div>										
			</div>
			
		<div class="span8 pull-right">			
				<div class="widget">	
					<div class="widget-header">
						<h3 class="brand">&nbsp;&nbsp;Gaddiel Hawki Login</h3>
					</div>
					<div class="widget-content">
						<div class="span4 pull-right">			
							<div class="widget">									
								<div class="widget-content">
									<form method="post" action="">
									  <div class="span6"><label>User Name</label><input type="text" name="USER_NAME" value="" placeholder="User Name" class="span3" autofocus></div>
									   <div class="span6"><label>Password</label><input type="password" name="PASSWORD" value="" placeholder="Password"  class="span3"></div>
									<div class="span6">
									<p class="remember_me">
										<label class="checkbox " >
											<input type="checkbox" name="remember_me" id="remember_me">
											Remember me on this computer
										</label>
									</p>
									</div>
									<div class="span6">
									<p class="submit"><input type="submit" name="commit" value="Login" class="btn btn-info span3"></p>
									</div>
								</form>
								</div>
							</div>										
						</div>			 
					</div>
				</div>	
			<?php
			
				if ( !empty($_POST))
				{				
					$USER_NAME = $_POST['USER_NAME'];
					$PASSWORD = $_POST['PASSWORD'];					
					$pdo = Database::connect();
					$sql = "SELECT * FROM SYSTEM_USERS WHERE USER_NAME = '$USER_NAME' and PASSWORD= '$PASSWORD'";
					$query =  $pdo->prepare( $sql );
					$query->execute();
				   $row = $query->fetch();
				   $USER_NAME = $row[ 'USER_NAME' ];				 
					$_SESSION['USER_NAME']=$USER_NAME;
					
					
					if($row > 0) {
						
						echo '<script type="text/javascript">
						window.location.href = "pages/dashBoard.php";
						</script>';
					}
					
					else{
					   	echo "<div class='alert alert-danger'>  Authentication Failed.   Enter correct Authentication Details </div>";
					}
			
				
				}
			?> 				
		   </div>			
		</div>
		
		<div class="row">
			<div class="span4.5">	
				<div class="widget">				
					<div id="footer">
						<i>Powered by</i> 
						<div class="widget-content">
								
							<img src="gaddielsticker.jpg" Width="300px" />	
						</div>
					</div>
				</div>
			</div>				
		</div>
			
			<!-- Footer -->
			<div id="footer">
				<hr>
				<p class="pull-right"><a href="http://www.gaddieltech.com" >Gaddiel Technologies Pvt Ltd </a> &copy; 2014</p>
			</div>
			<!-- /Footer -->
	
		</div>
		<!-- /Container -->
	</div>
	<!-- /Main content -->

	<!-- Javascript files -->
	


</body></html>