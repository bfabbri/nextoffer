<?php

include_once 'functions.php';

header("access-control-allow-origin: *");
header('Access-Control-Allow-Methods: GET, POST');

$place = sanitizeString ($_POST['name']);
$offer = sanitizeString ($_POST['offer']);
$typeofplace = sanitizeString ($_POST['type']);
$latitude = sanitizeString ($_POST['latitude']);
$longitude = sanitizeString ($_POST['longitude']);

$sql = "INSERT INTO offers (place, offer, typeofplace, latitude, longitude) VALUES ('$place', '$offer', '$typeofplace', '$latitude', '$longitude')";
$result = queryMysql ( $sql );

if (mysql_affected_rows() > 0)
	echo json_encode('success');
else
	echo json_encode('error');