<?php
include_once '../../config/config.php';

include_once $serverPath.'utils/database/db_get.php';

$table = "tool";

print json_encode ( getAllData ( $table ) );

?>