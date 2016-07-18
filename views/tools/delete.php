<?php
include_once 'config.php';
include_once $serverPath . 'utils/database/db_post.php';

if (! empty ( $_GET ['id'] )) {
	deleteFrom ( $table, $_GET ['id'] );
}
?>