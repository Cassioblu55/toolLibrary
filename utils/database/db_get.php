<?php
include_once $serverPath.'utils/database/database_utilities.php';

function getAllData($table) {
	$query = "SELECT * FROM " . getTableQuote ( $table ) . ";";
	return runQuery ( $query );
}
function findById($table, $id) {
	$query = "SELECT * FROM " . getTableQuote ( $table ) . " WHERE id=" . $id;
	$result = runQuery ( $query );
	if (!empty($result [0])) {
		return $result [0];
	} else {
		return null;
	}
}
