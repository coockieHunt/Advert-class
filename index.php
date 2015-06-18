<?php

/*=======================================
=            Quick guide use            =
=======================================*/

/** include lib **/
include_once('lib/advert.class.php'); 

/** Creation of proceedings **/
$advert = new lib\advert\advert;

/** Creates a new type of advert
	Usage:
	- name = type name
	- color = hex Color
	- addcolor('name','color')
**/
$advert->addcolor('admin','#2446F2');

/** Push advert
	Usage:
	- name = advert name
	- type = type of advert ('succes/info/warning/danger')
	- keyword = keyword of the advert if auto it will display the name of the type
	- text = text advert
	- $advert->push('name', 'type', 'keyword', 'text');
**/
$advert->push('push example', 'info', 'auto', 'puch');


/**
*
* Session advert
*
**/

/** init session **/
session_start();

/** Create session advert
	Usage:
	- name = advert name
	- type = type of advert ('succes/info/warning/danger')
	- keyword = keyword of the advert if auto it will display the name of the type
	- text = text advert
	- $advert->session('name', 'type', 'keyword', 'text');
**/
$advert->session('session', 'succes', 'admin', 'succes un');

/** Push session advert
	Usage:
	- name = advert name
	- $advert->push_session('name');
**/
$advert->push_session('session');

?>

<html>
	<head>
		<title>Advert - jonathan gleyze</title>
		<LINK rel="stylesheet" type="text/css" href="asset/css/advert.css">
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<script rel="javascript" type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script rel="javascript" type="text/javascript" src="asset/js/advert.js"></script>
	</head>
</html>