<?php

include_once 'functions.php';

header("access-control-allow-origin: *");
header('Access-Control-Allow-Methods: GET, POST');

$offer = sanitizeString ($_POST['offer']);

$sql = "DELETE FROM offers WHERE codoffer='$offer'";
$result = queryMysql($sql);

if (mysql_affected_rows() > 0)
	echo json_encode('success');
else
	echo json_encode('error');