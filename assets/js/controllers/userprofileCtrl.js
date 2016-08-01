NGCI.controller('UserProfileCtrl', ['$rootScope','$scope','$routeParams', function ($rootScope,$scope,$routeParams) {
	$rootScope.pageTitle = $routeParams.userName;
	$scope.title = 'This Is '+$rootScope.pageTitle+' Profile!';
}]);