<?php 
include_once('class/notifcation.class.php'); 

$advert = new lib\advert\advert;

$advert->addcolor('admin','#2446F2');

$advert->push('Succes', 'auto', 'hello world');


//$advert->debug();	
?>
<html>
	<head>
		<title>Notification</title>

		<LINK rel="stylesheet" type="text/css" href="css/notification.css">
		<LINK rel="stylesheet" type="text/css" href="css/reset.css">
		<LINK rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<script rel="javascript" type="text/javascript" src="js/notification.js"></script>
		<script rel="javascript" type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	</head>
	<body>
		
	</body>
</html>