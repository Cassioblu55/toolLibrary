<?php
include_once '../../config/config.php';

include_once $serverPath.'utils/database/db_get.php';

$table = "tool_type";

print json_encode ( getAllData ( $table ) );

?>