<?php

include_once "config.php";
include_once $serverPath."resources/templates/head.php";

$route = "index.php";

include_once $serverPath."resources/templates/utils/save.php";

?>
<div ng-controller="ToolEditController">
	<form action="{{getSumbitLink('edit.php')}}" method="post">
		<div class="col-md-6 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title">{{editOrCreate()}} {{$scope.tool.name ? $scope.tool.name : "Tool"}}</h1>
				</div>

				<div class="panel-body">
					<div class="form-group">
						<label for="name">Name</label>
						<input class="form-control" name="name" ng-model="tool.name" type="text" id="name" placeholder="Name" required="required">
					</div>

					<div class="form-group">
						<label for="type">Tool Type</label>
						<select class="form-control" id="type" name="tool_type_id" ng-model="tool.tool_type_id">
							<option value=''>Select One</option>
							<option ng-repeat="type in toolTypes" value={{type.id}}>{{type.type_name}}</option>
						</select>
					</div>

					<a ng-href="{{baseURL+'views/toolType/edit.php'}}" target="_blank">Add Tool Type</a>
					<div style="color: grey">Refresh page to see new additions.</div>

					<div class="form-group">
						<label for="quantity">Quantity</label>
						<input class="form-control" name="quantity" ng-model="tool.quantity" type="number" id="quantity" placeholder="Quantity" min="0" ng-min="0">
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
	app.controller("ToolEditController", ['$scope', "$controller" , function($scope, $controller) {
		angular.extend(this, $controller('UtilsController', {$scope: $scope}));

		$scope.setById(function(data){
			var tool = data;
			tool.quantity = Number(tool.quantity);
			$scope.tool = tool;
		});

		$scope.setFromGet(baseURL+"views/toolType/data.php", function(data){
			$scope.toolTypes = data;
			angular.forEach($scope.toolTypes,  function (row) {
				row.id = Number(row.id);
			})

		});


	}]);

</script>