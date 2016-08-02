NGCI.controller('ErrorCtrl', ['$rootScope','$scope','$routeParams','$location', function ($rootScope,$scope,$routeParams,$location) {
	$rootScope.pageTitle = 'Error';
	$scope.title = 'This Is Error View! Error: '+$routeParams.errorId;
}]);