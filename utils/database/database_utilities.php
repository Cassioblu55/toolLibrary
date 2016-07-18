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

function getQuote($table) {
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
	$query = "SHOW COLUMNS FROM " . getQuote ( $table );
	return runQuery ( $query );
}

function joinParent($childTableData, $parentTableData, $childTableForeignKeyName){
	$mergedData = [];
	foreach($childTableData as $childRow){
		foreach ($parentTableData as $parentRow){
			if($childRow[$childTableForeignKeyName] == $parentRow['id']){
				$childRow = mergeWithDominace($childRow, $parentRow);
			}
		}
		array_push($mergedData, $childRow);
	}
	return $mergedData;
}

function mergeWithDominace($dominateObject, $submissiveObject){
	$submissiveObjectKeys = array_keys($submissiveObject);
	foreach ($submissiveObjectKeys as $key){
		if(!isset($dominateObject[$key])){
			$dominateObject[$key] = $submissiveObject[$key];
		}
	}
	return $dominateObject;
}

?>