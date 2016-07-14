<?php
	include_once $serverPath."utils/database/db_post.php";

	if(!isset($table)){
		echo "Table has not been set";
	}else{
		if (! empty ( $_POST )) {
			if($runOnSave){
				$runOnSave();
			}
			if (! empty ( $_GET ['id'] )) {
				$id = $_GET ['id'];
				updateFromPost ( $table );
			} else {
				$id = insertFromPostWithIdReturn ( $table );
			}

			if(isset($route)){
				header ( "Location: $route");
				die ( "Redirecting to $route" );

			}else{
				header ( "Location: show.php?id=" . $id );
				die ( "Redirecting to show.php" );

			}
		}
	}
?>