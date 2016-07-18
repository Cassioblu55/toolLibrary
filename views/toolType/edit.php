<?php

include_once "config.php";
include_once $serverPath."resources/templates/head.php";

$route = "index.php";

$runOnSave = function(){
	global $table;
	$type = findByProperty($table, "type_name", $_POST['type_name']);

	if($type){
		$newRoute = "edit.php?error=Tool Type already exists.";
		header ( "Location: $newRoute");
		die ( "Redirecting to $newRoute" );
	}

};

function findByProperty($table, $columnName, $value){
	$query = "SELECT * FROM " . getQuote ( $table ) . " WHERE ".getQuote($columnName)."='" . $value."'";
	$result = runQuery ( $query );
	if (!empty($result [0])) {
		return $result [0];
	} else {
		return null;
	}
}


include_once $serverPath."resources/templates/utils/save.php";

?>
<div ng-controller="ToolTypeEditController">
	<form action="{{getSumbitLink('edit.php')}}" method="post">
		<div class="col-md-6 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title">{{editOrCreate()}} {{toolType.type_name ? toolType.type_name : "Type"}}</h1>
				</div>

				<div class="panel-body">
					<div class="form-group">
						<label for="type_name">Name</label>
						<input class="form-control" name="type_name" ng-model="toolType.type_name" type="text" id="type_name" placeholder="Name" required="required">
					</div>
				</div>

				<div class="panel-footer">
					<button class="btn btn-primary" type="submit">{{saveOrAdd()}}</button>
					<a class="btn btn-default" ng-href="index.php">Cancel</a>

				</div>

			</div>

		</div>
	</form>

</div>


<script>
	app.controller("ToolTypeEditController", ['$scope', "$controller" , function($scope, $controller) {
		angular.extend(this, $controller('UtilsController', {$scope: $scope}));

		$scope.setById(function(data){
			$scope.toolType = data;
		});

	}]);

</script>