<?php

include_once 'functions.php';

header("access-control-allow-origin: *");
header('Access-Control-Allow-Methods: GET, POST');

$sql = "SELECT * FROM offers WHERE codoffer > 0";
$result = queryMysql ( $sql );

echo json_encode(getarray($result));