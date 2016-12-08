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

function sanitizeString($var)
{
	// Retira tags HTML e PHP de uma string
	$var = strip_tags($var);
	// Converte todos os caracteres aplicaveis em entidades html
	$var = htmlentities($var); //dont work with UTF8 caracters
	// Desfaz o efeito de addslashs()
	$var = stripslashes($var);

	//return mysql_real_escape_string($var);
	return $var;
}

header("access-control-allow-origin: *");
header('Access-Control-Allow-Methods: GET, POST');

$offer = sanitizeString ($_POST['offer']);

$sql = "DELETE FROM offers WHERE codoffer='$offer'";
$result = queryMysql($sql);

if (mysql_affected_rows() > 0)
	echo json_encode('success');
else
	echo json_encode('error');