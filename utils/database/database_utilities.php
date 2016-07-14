<?php
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

?>