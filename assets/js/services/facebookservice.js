NGCI.factory('facebookService', ['$q','$window','$rootScope','$http','loginService','$cookies', function($q,$window,$rootScope,$http,loginService,$cookies) {
	return {
		getMyLastName: function() {
			var deferred = $q.defer();
			window.FB.api('/me', function(response) {
				if (!response || response.error) {
					deferred.reject('Error occured');
				} else {
					deferred.resolve(response);
				}
			});
			return deferred.promise;
		},
		watchLoginChange: function() {

			var _self = this;

			window.FB.Event.subscribe('auth.authResponseChange', function(res) {

				if (res.status === 'connected') {

			      	/*
			       	The user is already logged,
			       	is possible retrieve his personal info
			       	*/
			       	_self.login();

					/*
					This is also the point where you should create a
					session for the current user.
					For this purpose you can use the data inside the
					res.authResponse object.
					*/
				}
				else {
					/*
					The user is not logged to the app, or into Facebook:
					destroy the session on the server.
					*/
					_self.login();
				}
			});
		},
		login: function() {

			FB.login(function(response) {
				if (response.authResponse) {
					// alert('You are logged in &amp; cookie set!');
       				// Now you can redirect the user or do an AJAX request to
    				// a PHP script that grabs the signed request from the cookie.
    				console.log(response);
    				// return false;

    				response.authResponse.login_type = 'facebook';
    				$cookies.put('fbsr_487972194744249', response.authResponse.signedRequest);

    				loginService.login(response.authResponse)
    				.then(function(data) {
    					console.log(data);
    					// $rootScope.$apply(function() {
    					// 	$rootScope.user = _self.user = res;
    					// });
    				}, function(data) {
    					console.log(data);
    				});
    			} else {
    				console.log('User cancelled login or did not fully authorize.');
    			}
    		});
			return false;

			var _self = this;

			window.FB.api('/me', function(res) {
				res.login_type = 'facebook';

				loginService.login(res)
				.then(function(data) {
					console.log(data);
					$rootScope.$apply(function() {
						$rootScope.user = _self.user = res;
					});
				}, function(data) {
					console.log(data);
				});
			});
		},
		getUserData: function() {
			var _self = this;

			window.FB.api('/me', {
				fields: 'id,name,first_name,last_name,age_range,link,gender,locale,picture,timezone,updated_time,verified,birthday'
			}, function(res) {
				res.login_type = 'facebook';
				// $http({
				// 	url: 'auth/login',
				// 	method: 'post',
				// 	data: res
				// })
				// .success(function(data) {
				// 	console.log(data);
				// })
				// .error(function(data) {
				// 	console.log(data);
				// });
				$rootScope.$apply(function() {
					$rootScope.user = _self.user = res;
				});
			});
		},
		logout: function() {

			var _self = this;

			window.FB.logout(function(response) {
				$rootScope.$apply(function() {
					$rootScope.user = _self.user = {};
				});
			});

		}
	}
}]);