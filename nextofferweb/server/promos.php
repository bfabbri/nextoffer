<?php

define('CONSTANT_server', 'localhost');   // Unlikely to require changing
define('CONSTANT_database', 'nextoffer');      // Modify these...
define('CONSTANT_dbusername', 'root');  // ...variables according
define('CONSTANT_dbpassword', '');  // ...to your installation

//connect to the server
$con = mysql_connect(CONSTANT_server, CONSTANT_dbusername, CONSTANT_dbpassword) or die(mysql_error());
mysql_select_db(CONSTANT_database) or die(mysql_error());

/**
 * Perform a mySQL query
 *
 */
function queryMysql($query){
	$result = mysql_query($query) or die(mysql_error());
	return $result;
}

function getarray($result){
	$array = array();
 	while($row = mysql_fetch_assoc($result))
  {
      $array[] = $row;
  }
	return $array;
}

header("access-control-allow-origin: *");
header('Access-Control-Allow-Methods: GET, POST');

$sql = "SELECT * FROM offers WHERE codoffer > 0";
$result = queryMysql ( $sql );

echo json_encode(getarray($result));