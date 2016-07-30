/**
* NGCI Module
*
* Description
*/
var NGCI = angular.module('NGCI', ['ngRoute','ngCookies']);

NGCI.config(['$routeProvider','$httpProvider', function ($routeProvider,$httpProvider) {
	$httpProvider.interceptors.push('httpInterceptor');

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

NGCI.run(['$rootScope','$window','facebookService', function ($rootScope,$window,facebookService) {
	$rootScope.pageTitle = 'Home';
	$rootScope.user = null;

	$window.fbAsyncInit = function() {
		FB.init({ 
			appId: '487972194744249',
			cookie: true, // This is important, it's not enabled by default
			version: 'v2.7'
		});
		// facebookService.watchLoginChange();
		facebookService.login();
	};

}]);
