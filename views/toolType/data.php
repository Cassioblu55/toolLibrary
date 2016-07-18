<?php
include_once 'config.php';

include_once $serverPath.'utils/database/db_get.php';

if(!isset($_GET['id'])) {
	print json_encode ( getAllData ( $table ) );
}else{
	print json_encode( findById($table, $_GET['id']));
}

?>