NGCI.controller('LogoutCtrl', ['$rootScope','$scope','facebookService','$location', function ($rootScope,$scope,facebookService,$location) {
	$rootScope.pageTitle = 'Logout';
	$scope.title = 'This Is Logout View!';
	facebookService.logout();

	$scope.$watch('user',function(newValue,oldValue) {
		if (newValue === null) {
			$location.path('/home');
		} else {}
	});
}]);