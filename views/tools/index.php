<?php
include_once "config.php";
include_once $serverPath."resources/templates/head.php";

?>

<div ng-controller="ToolIndexController">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h4 class="panel-title pull-left" style="padding-top: 7.5px;">Tools</h4>
						<a href="edit.php" class="btn btn-primary pull-right">Add</a>
					</div>
					<div class="panel-body">
						<div ui-grid="gridModel" external-scopes="$scope"
						     style="height: 400px;"></div>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

	app.controller("ToolIndexController", ['$scope', "$controller", function($scope, $controller) {

		angular.extend(this, $controller('UtilsController', {$scope: $scope}));

		$scope.gridModel = {enableFiltering: true, enableColumnResizing: true, enableColumnMenus: false, showColumnFooter: true , enableSorting: false, showGridFooter: true, enableRowHeaderSelection: false, rowHeight: 42};
		$scope.gridModel.columnDefs = [
			{field: 'edit', enableFiltering: false, width: 53, cellTemplate: '<a class="btn btn-primary" role="button" ng-href="edit.php?id={{row.entity.id}}">Edit</a>'},
			{field: 'name'},
			{field: 'type_name', displayName: "Type"},
			{field: 'quantity'},
			{field: 'delete', enableFiltering: false, width: 67, cellTemplate: '<button class="btn btn-danger" ng-click="grid.appScope.deleteById(row.entity.id,row.entity.name, grid.appScope.reloadGrid);">Delete</button>'
			}
		];

		$scope.setGrid = function(data){$scope.gridModel.data = data;}

		$scope.reloadGrid = function(){
			var get = 'data.php';
			$scope.setFromGet(get, $scope.setGrid);
		}

		$scope.reloadGrid();

	}]);

</script>
