NGCI.controller('LoginCtrl', ['$rootScope','$scope','$location','googleService','$window', function ($rootScope,$scope,$location,googleService,$window) {
	$rootScope.pageTitle = 'Login';
	$scope.title = 'This Is Login View!';
	$scope.$watch('user',function(newValue,oldValue) {
		if (!!newValue) {
			$location.path('/');
		} else {}
	});
	$scope.socialLoginButton = 'views/social_login_buttons?'+parseInt(Math.random()*100);
	$scope.googleService = googleService;
	$window.startGoogle = function() {
		$scope.googleService.login();
	};
	// $scope.googleService.start();
}]);