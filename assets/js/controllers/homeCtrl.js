NGCI.controller('HomeCtrl', ['$rootScope','$scope','$http', function ($rootScope,$scope,$http) {
	$rootScope.pageTitle = 'Home';
	$scope.title = 'This Is Home View!';


	$http({
		url: 'views/test',
		method: 'get'
	})
	.success(function(data) {
		console.log(data);
	})
	.error(function() {
		console.log(data);
	});

}]);