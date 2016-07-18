<!doctype html>
<html ng-app="app">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<script>var baseURL="<?php echo $baseURL;?>"</script>

<head>
	<script src="<?php echo $baseURL;?>resources/jquery/dist/jquery.js"></script>
	<script src="<?php echo $baseURL;?>resources/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo $baseURL;?>resources/angular/angular.min.js"></script>
	<script src="<?php echo $baseURL;?>resources/angular-ui-grid/ui-grid.min.js"></script>
	<script src="<?php echo $baseURL;?>resources/utils.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $baseURL;?>resources/angular-ui-grid/ui-grid.min.css" />
	<link rel="stylesheet" type="text/css"  href="<?php echo $baseURL;?>resources/bootstrap/dist/css/bootstrap.min.css">
	<link rel="icon" href="<?php echo $baseURL;?>resources/icons/favicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo $baseURL; ?>resources/layout.css"/>

</head>

<?php
include_once $serverPath."utils/errorDisplay.php";

if(!empty($_GET['error'])){
	sendErrorMessage($_GET['error']);
};

?>

