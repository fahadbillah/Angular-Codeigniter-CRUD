NGCI.controller('SignupCtrl', ['$rootScope','$scope','facebookService', '$location', function ($rootScope,$scope,facebookService,$location) {
	$rootScope.pageTitle = 'Signup';
	$scope.title = 'This Is Signup View!';

	$scope.fb = facebookService;

	$scope.$watch('user',function(newValue,oldValue) {
		if (!!newValue) {
			$location.path('/home');
		} else {}
	});
	$scope.socialLoginButton = 'views/social_login_buttons?'+parseInt(Math.random()*100);
}]);