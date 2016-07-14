<?php

include_once "../../config/config.php";
include_once $serverPath."resources/templates/head.php";

$table = "tool";




?>
<div ng-controller="ToolEditController">
	<form ng-submit="getSumbitLink('edit.php')">
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
						<select class="form-control" id="type" name="tool_type_id" ng-model="tool.tool_type_id" ng-options="type as type.type_name for type in toolTypes">
							<option value=''>Select One</option>
						</select>
					</div>

					<div class="form-group">
						<label for="quantity">Quantity</label>
						<input class="form-control" name="quantity" ng-model="tool.quantity" type="number" id="quantity" placeholder="Quantity" min="0" ng-min="0">
					</div>
				</div>

			</div>

		</div>
	</form>

</div>


<script>
	app.controller("ToolEditController", ['$scope', "$controller" , function($scope, $controller) {
		angular.extend(this, $controller('UtilsController', {$scope: $scope}));

		$scope.setById(function(data){
			$scope.tool = data;
		});

		$scope.setFromGet(baseURL+"views/toolType/data.php", function(data){
			$scope.toolTypes = data;
		});


	}]);

</script>