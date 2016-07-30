/**
* NGCI Module
*
* Description
*/
var NGCI = angular.module('NGCI', ['ngRoute']);

NGCI.config(['$routeProvider', function ($routeProvider) {
	$routeProvider
	.when('/home', {
		templateUrl: 'views/home',
		controller: 'HomeCtrl',
		routeName: 'home'
	})
	.when('/about', {
		templateUrl: 'views/about',
		controller: 'AboutCtrl',
		routeName: 'about'
	})
	.when('/signup', {
		templateUrl: 'views/signup',
		controller: 'SignupCtrl',
		routeName: 'signup'
	})
	.when('/login', {
		templateUrl: 'views/login',
		controller: 'LoginCtrl',
		routeName: 'login'
	})
	.otherwise({ redirectTo: '/home' })
}]);

NGCI.run(['$rootScope','$window','facebookservice', function ($rootScope,$window,facebookservice) {
	$rootScope.pageTitle = 'Home';

	$window.fbAsyncInit = function() {
		FB.init({ 
			appId: '487972194744249',
			status: true, 
			cookie: true, 
			xfbml: true,
			version: 'v2.4'
		});
	};

	facebookservice.watchLoginChange();
}]);
