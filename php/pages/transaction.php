<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
   <title>Hawki</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <!-- CSS files -->
    <link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="../resources/css/bootstrap-responsive.min.css" >
    <link rel="stylesheet" type="text/css" href="../resources/css/alveolae.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/font-awesome.css">
    <!-- Google font -->
    <link href="/css/css.css" rel="stylesheet" type="text/css">
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

<body >
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
	
			<div class="span12" >	
<h1 class="page-title">Transaction<label class="pull-right"><a href="dashBoard.php"><h5><font color="#FFFFFF">Back to Dash Board</font></h5></a> </label></h1>
				<div class="row" >	
				<center>
                    <img src="../resources/images/under_construction.jpg" width="500px"/>	
				</center>
						<?php include($_SERVER['DOCUMENT_ROOT'].'/php/pages/footer.php'); ?>
				</div> 
			</div> 
        </div>
	 </div>	
</form>	

</body>

</html>
