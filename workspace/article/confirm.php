<?php 
	require_once("../authenticate.php");
	$message = "";
	$status = $_GET['status'];
	if($status == 1) {
		$message = "Article renamed successfully";
	}
	if($status == 2) {
		$message = "File uploaded successfully";
	}
	if($status == 3) {
		$message = "Recategorization successful";
	}
	if($status == 4) {
		$message = "Uncategorization successful";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<base href="/"/>
	<meta charset="utf-8">
  	<title>Krishipurra</title>
  	<meta name="description" content="">
  	<meta name="author" content="">

  	<!-- Mobile Specific Metas -->
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<!-- FONT -->
  	<link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  	<!-- CSS -->
  	<link rel="stylesheet" href="css/normalize.css">
  	<link rel="stylesheet" href="css/skeleton.css">
  	<link rel="stylesheet" href="css/custom.css">

  	<!-- Favicon -->
  	<link rel="icon" type="image/png" href="">

</head>
<body>
<div class="container">
	<div class="row">
		<h4><?php echo $message; ?></h4>
	</div>
</div>

<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
      	function closepanel() {     
		    window.close();
		}

	// use setTimeout() to execute
	setTimeout(closepanel, 6000);
	});
</script>
</body>
</html>