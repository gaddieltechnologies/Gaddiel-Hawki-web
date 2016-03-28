  <html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <!-- CSS files -->
    
    <link rel="stylesheet" type="text/css" href="../../../resources/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="../../../resources/css/bootstrap-responsive.min.css" >
    <link rel="stylesheet" type="text/css" href="../../../resources/css/alveolae.css">
    <link rel="stylesheet" type="text/css" href="../../../resources/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../../../resources/css/footable.core.css?v=2-0-1">
    <link rel="stylesheet" type="text/css" href="../../../resources/css/footable-demos.css">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<script src="../../../resources/js/footable.js?v=2-0-1"></script>
<!-- Navbar -->
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/php/pages/jindal.png" width="60px"/><span Class="desktop pull-right">&nbsp;&nbsp;JINDAL POLYBUTTONS LTD</span></a>
				<a class="brand" style="font-size:12px;"/><span Class="mobile pull-right">&nbsp;&nbsp;JINDAL POLYBUTTONS LTD</span></a>
				<div class="mobile">           		
						<ul class="nav pull-right">					
					 <li class="divider-vertical"></li>
					 <li><a href="http://hawki.gaddieltech.com/php/index.php"><i class="icon-unlock"></i></a></li>
					 <li class="divider-vertical"></li>
					</ul>
				</div>
				<div class="nav-collapse">
					<ul class="nav pull-right">
					 <li class="divider-vertical"></li>
					 <li><a href="http://hawki.gaddieltech.com/php/logout.php"><i class="icon-unlock"></i>&nbsp;&nbsp;Logout</a></li>
					 <li class="divider-vertical"></li>
					</ul>
				</div>
				
			</div>
		</div>
<?php
	 session_start(); 
	
        if(empty($_SESSION['USER_NAME'])){
		header("Location: http://hawki.gaddieltech.com/php/index.php");	
			}	
			
	/*	$_SESSION['start'] = time(); // taking now logged in time
		 
			if(!isset($_SESSION['expire'])){
					$_SESSION['expire'] = $_SESSION['start'] + (30* 60) ; // ending a session in 5 mintues
				}
				$now = time(); // checking the time now when home page starts

				if($now > $_SESSION['expire'])
				{
					session_destroy();
					echo '<script type="text/javascript">
						window.location.href = "http://hawki-beta.gaddieltech.com/php/index.php";
						</script>';
				}*/
				

?>
	</div>
	<!-- /Navbar -->