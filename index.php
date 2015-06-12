<?php 
include_once('class/notifcation.class.php'); 

$notifcation = new notification;

$notifcation->puch('succes' , null, 'hello wolrd');
$notifcation->puch('info' , null, 'Hello wolrd');
$notifcation->puch('warning' , null, 'Hello wolrd');
$notifcation->puch('danger' , null, 'Hello wolrd');

	
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