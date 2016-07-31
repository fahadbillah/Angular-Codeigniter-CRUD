NGCI.controller('LoginCtrl', ['$rootScope','$scope','$location', function ($rootScope,$scope,$location) {
	$rootScope.pageTitle = 'Login';
	$scope.title = 'This Is Login View!';
	$scope.$watch('user',function(newValue,oldValue) {
		if (!!newValue) {
			$location.path('/home');
		} else {}
	});
}]);