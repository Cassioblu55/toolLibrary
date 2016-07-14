<?php

include_once $serverPath."utils/database/database_utilities.php";

function update($table, $data) {
	$update = makeBaseUpdate ( $table, $data ) . " WHERE id=" . $_GET ['id'] . ";";
	runInsert ( $update );
}

function makeBaseUpdate($table, $data) {
	$update = "UPDATE " . getTableQuote ( $table ) . " SET ";
	foreach ( $data as $columnName => $value ) {
		$update .="`" .$columnName . "`=" . getCleanValue ( $value ) . ", ";
	}
	return cutString ( $update, 2 );

}

function insert($table, $data) {
	runInsert ( getInsertStatement ( $table, $data ) );
}

function getInsertStatement($table, $data) {
	$columns = " (";
	$values = " (";
	foreach ( $data as $columnName => $value ) {
		$columns .= "`".$columnName . "`, ";
		$values .= "" . getCleanValue ( $value ) . ", ";
	}
	$columns = cutString ( $columns, 2 ) . ")";
	$values = cutString ( $values, 2 ) . ")";

	return "INSERT INTO " . getTableQuote ( $table ) . $columns . " VALUES " . $values . ";";
}

function runInsert($insert) {
	$db = connect ();
	try {
		$db->query ( $insert );
	} catch ( Execption $e ) {
		echo "Could not complete request: " . $insert;
		echo $e;
		die ( "Could not complete request: " . $insert );
	}
	$db->close ();
}

function updateFromPost($table) {
	update ( $table, createDataFromPost ( $table ) );
}

function createDataFromPost($table) {
	$columns = getColumnNames ( $table );
	$data = [ ];
	foreach ( $columns as $column ) {
			$data [$column] = $_POST [$column];
	}
	return $data;
}

function insertFromPostWithIdReturn($table) {
	return runInsertWithIdReturn ( createInsertFromPost ( $table ) );
}

function createInsertFromPost($table) {
	return getInsertStatement ( $table, createDataFromPost ( $table ) );
}

function runInsertWithDBReturn($insert) {
	$db = connect ();
	try {
		$db->query ( $insert );
		return $db;
	} catch ( Execption $e ) {
		echo "Could not complete request: " . $insert;
		echo $e;
		$db->close ();
		die ( "Could not complete request: " . $insert );
	}
}

function runInsertWithIdReturn($insert) {
	$db = runInsertWithDBReturn ( $insert );
	$inserted = $db->insert_id;
	$db->close ();
	return $inserted;
}


?>


