<?php
include_once 'config/config.php';
include_once $serverPath.'resources/templates/head.php';
?>
<div ng-controller="ToolIndexController">
	<h1>Tools</h1>
	
	<div ng-repeat="tool in tools">{{tool.name}}</div>

</div>

<a href="<?php echo $baseURL;?>views/tools/edit.php">Add tools</a>


<script>
app.controller("ToolIndexController", ['$scope', "$controller" , function($scope, $controller){
	angular.extend(this, $controller('UtilsController', {$scope: $scope}));

	$scope.setFromGet(baseURL+'views/tools/data.php?get=menu', function(data){
		$scope.tools = data;

	});
	


}]);


</script>

<?php 
include_once $serverPath.'resources/templates/footer.php';

?>