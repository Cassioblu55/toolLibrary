<?php
include_once 'config/config.php';
include_once $serverPath.'resources/templates/head.php';
?>
<div class="col-md-12" ng-controller="ToolIndexController">
	<h3>TOOL LIBRARY INVENTORY</h3>

	<div style="margin-bottom: 10px">A catalog with more details about our tools is located at the Salvage Barn.</div>
	
	<div ng-repeat="toolType in getKeys(tools)" class="toolGroup">
		<div class="toolTypeName">{{toolType}}</div>
		<div ng-repeat="tool in tools[toolType]">{{tool.name}}</div>
	</div>

</div>

<style>
	.toolGroup{
		margin-bottom: 5px;
	}

	.toolTypeName{
		font-weight: bold;
	}

</style>

<script>
app.controller("ToolIndexController", ['$scope', "$controller" , function($scope, $controller){
	angular.extend(this, $controller('UtilsController', {$scope: $scope}));

	$scope.setFromGet(baseURL+'views/tools/data.php?get=menu', function(data){
		var toolsByToolType = {};
		angular.forEach(data, function(row){
			row.type_name = row.type_name ? row.type_name : 'Uncategorized';
			if(!toolsByToolType[row.type_name]){
				toolsByToolType[row.type_name] = [];
			}
			toolsByToolType[row.type_name].push(row);
		});

		$scope.tools = toolsByToolType;

	});

}]);

</script>

<?php 
include_once $serverPath.'resources/templates/footer.php';

?>