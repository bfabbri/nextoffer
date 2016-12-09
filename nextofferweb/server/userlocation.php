<?php

include_once 'functions.php';

header("access-control-allow-origin: *");
header('Access-Control-Allow-Methods: GET, POST');

$latitude = sanitizeString ($_POST['latitude']);
$longitude = sanitizeString ($_POST['longitude']);

$sql = "SELECT * FROM offers";
$result = queryMysql($sql);
$array  = getarray($result);

$resp = array();
$radlata = $latitude*pi()/180; // transforming degrees to radians
$radlonga = $longitude*pi()/180; // transforming degrees to radians
$R = 6372.795477598; //Earth radius in km

foreach ($array as $value) {
	$radlatb = $value['latitude']*pi()/180;
	$radlongb = $value['longitude']*pi()/180;
	$distance = $R*acos(sin($radlata)*sin($radlatb)+cos($radlata)*cos($radlatb)*cos($radlonga-$radlongb));
	$value["distance"]=round($distance,2);
	array_push($resp,$value);
}

echo json_encode($resp);

// echo json_encode($latitude . ',' . $longitude);