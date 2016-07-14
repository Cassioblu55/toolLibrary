<?php
function connect() {
	global $dbHost;
	global $dbUser;
	global $dbPassword;
	global $dbName;

	return connectSpecific ( $dbHost, $dbUser, $dbPassword, $dbName );
}
function connectSpecific($dbHost, $dbUser, $dbPassword, $dbName) {
	try {
		$db = new mysqli ( $dbHost, $dbUser, $dbPassword, $dbName );
	} catch ( Exception $e ) {
		die ( 'Connection failed: ' . $e->getMessage () );
	}
	return $db;
}
?>