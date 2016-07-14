<?php

include_once "../../config/config.php";
include_once $serverPath."resources/templates/head.php";

?>
<div ng-controller="ToolTypeEditController">
	<form ng-submit="getSumbitLink('edit.php')">
		<div class="col-md-6 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title">{{editOrCreate()}} {{$scope.tool.name ? $scope.tool.name : "Tool"}}</h1>
				</div>

				<div class="panel-body">
					<div class="form-group">
						<label for="name">Name</label>
						<input class="form-control" name="name" ng-model="toolType.name" type="text" id="name" placeholder="Name" required="required">
					</div>
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