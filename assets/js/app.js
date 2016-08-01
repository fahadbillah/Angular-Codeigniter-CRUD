/**
* NGCI Module
*
* Description
*/
var NGCI = angular.module('NGCI', ['ngRoute','ngCookies']);

NGCI.config(['$routeProvider','$httpProvider','$locationProvider', function ($routeProvider,$httpProvider,$locationProvider) {
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
	.when('/logout', {
		templateUrl: 'views/logout',
		controller: 'LogoutCtrl',
		routeName: 'logout'
	})
	.when('/user/:userName', {
		templateUrl: 'views/user_profile',
		controller: 'UserProfileCtrl',
		routeName: 'user_profile'
	})
	.when('/user/:userName/:id', {
		templateUrl: 'views/user_profile',
		controller: 'UserProfileCtrl',
		routeName: 'user_profile'
	})
	.otherwise({ redirectTo: '/home' })
	$locationProvider.hashPrefix('!');
	$locationProvider.html5Mode(true);

}]);

NGCI.run(['$rootScope','$window','facebookService', function ($rootScope,$window,facebookService) {
	$rootScope.pageTitle = 'Home';
	$rootScope.user = null;
	$rootScope.appId = '487972194744249';
	$window.fbAsyncInit = function() {
		FB.init({ 
			appId: $rootScope.appId,
			status: true, 
			xfbml: true,
			cookie: true, // This is important, it's not enabled by default
			version: 'v2.7'
		});
		facebookService.watchLoginChange();
	};

}]);
