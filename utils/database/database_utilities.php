<?php
include_once $serverPath."utils/database/database_connection.php";

function runQuery($query) {
	$db = connect ();
	$results = [ ];
	$result = $db->query ( $query );
	if (! $result) {
		echo 'Could not run query: ' . $query;
		exit ();
	}
	while ( $row = $result->fetch_assoc () ) {
		array_push ( $results, $row );
	}
	$db->close ();
	return $results;
}

function getTableQuote($table) {
	return "`" . $table . "`";
}

function cutString($string, $n) {
	return substr ( $string, 0, strlen ( $string ) - $n );
}

function getCleanValue($value) {
	$cleanValue = getValueString ( str_replace ( "'", "\'", $value ) );
	return $cleanValue;
}

function getValueString($value) {
	return (gettype ( $value ) == "string") ? "'" . $value . "'" : $value;
}

function getColumnNames($table) {
	$result = getColumns ( $table );
	$columns = [ ];
	foreach ( $result as $row ) {
		if ($row ['Field'] != 'id') {
			array_push ( $columns, $row ['Field'] );
		}
	}
	return $columns;
}

function getColumns($table) {
	$query = "SHOW COLUMNS FROM " . getTableQuote ( $table );
	return runQuery ( $query );
}

?>