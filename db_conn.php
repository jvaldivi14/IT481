<?php

$servername= "PurdueGlobal-jv\SQLEXPRESS";
$db_name = "Northwind";
$uname= "";
$pass = "";


$connection = array("Database" => $db_name, "Uid" => $uname, "PWD" => $pass);
$conn = sqlsrv_connect($serverName, $connection);

if (!$conn) {
	echo "Connection failed!";
}

?>