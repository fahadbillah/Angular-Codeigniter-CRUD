NGCI.factory('facebookService', ['$q','$window','$rootScope','$http','loginService','$cookies', function($q,$window,$rootScope,$http,loginService,$cookies) {
	return {
		getMyLastName: function() {
			var deferred = $q.defer();
			FB.api('/me', function(response) {
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

			FB.Event.subscribe('auth.authResponseChange', function(res) {
				console.log('auto check status: ',res);
				if (res.status === 'connected') {

			      	/*
			       	The user is already logged,
			       	is possible retrieve his personal info
			       	*/
			       	_self.getUserData(res.authResponse);

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
					// _self.login();
				}
			});
		},
		login: function() {
			var _self = this;

			FB.login(function(response) {
				if (response.authResponse) {
					response.authResponse.login_type = 'facebook';
					_self.setCookies($rootScope.appId,response.authResponse.signedRequest);
					loginService.login(response.authResponse)
				} else {
					console.log('User cancelled login or did not fully authorize.');
				}
			});
		},
		setCookies: function(appId, signedRequest) {
			$cookies.put('fbsr_'+appId, signedRequest);
		},
		deleteCookies: function(appId) {
			$cookies.remove('fbsr_'+appId);
		},
		getUserData: function(authResponse) {
			var _self = this;

			FB.api('/me', {
				fields: 'id,name,gender,locale,picture,timezone,updated_time,verified'
			}, function(res) {
				var userData = {
					'social_id' : res.id,
					'login_type' : 'facebook',
					'gender' : res.gender,
					'name' : res.name,
					'language' : res.locale,
					'profile_picture' : res.picture.data.url,
					'timezone' : res.timezone,
				};
				_self.setCookies($rootScope.appId,authResponse.signedRequest);

				authResponse.login_type = 'facebook';
				loginService.login(authResponse);
				
			});
		},
		logout: function() {

			var _self = this;

			FB.logout(function(response) {
				// console.log(response);
				// return false;
				// var deferred = $q.defer();
				loginService.logout()
				.then(function(data) {
					$rootScope.user = _self.user = null;
					_self.deleteCookies($rootScope.appId);
					// deferred.resolve(data);

				}, function(data) {
					// deferred.reject('Error occured');
				});
				// return deferred.promise;
			});

		}
	}
}]);