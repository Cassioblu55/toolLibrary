<?php
include_once 'config.php';

include_once $serverPath.'utils/database/db_get.php';

$parent_table = "tool_type";

if(!isset($_GET['id'])){
	$childData = getAllData ( $table );
	$parentData = getAllData($parent_table);

	$mergedData = joinParent($childData, $parentData, "tool_type_id");

	print json_encode ($mergedData);

}else{
	print json_encode( findById($table, $_GET['id']));

}


?>