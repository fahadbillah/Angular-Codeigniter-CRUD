NGCI.factory('googleService', ['$q','$window','$rootScope','$http','loginService','$cookies', function($q,$window,$rootScope,$http,loginService,$cookies) {
	return {
		start: function() {
			// var _self = this;
			// _self.login()
			// _self.getUserData();
		},
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
		},
		login: function() {
			var _self = this;
			_self.auth2 = gapi.auth2.getAuthInstance();

			var userData = {
				id_token: _self.auth2.currentUser.get().getAuthResponse().id_token,
				login_type: 'google'
			};
			// _self.setCookies($rootScope.appId,response.authResponse.signedRequest);
			loginService.login(userData);
		},
		setCookies: function(appId, signedRequest) {
			$cookies.put('fbsr_'+appId, signedRequest);
		},
		deleteCookies: function(appId) {
			$cookies.remove('fbsr_'+appId);
		},
		getUserData: function() {
			var _self = this;

			var userData = {
				'social_id' : _self.auth2.currentUser.get().getBasicProfile().getId(),
				'login_type' : 'google',
				'gender' : res.gender,
				'name' : res.name,
				'language' : res.locale,
				'profile_picture' : res.picture.data.url,
				'timezone' : res.timezone,
			};

			// var profile = _self.auth2.BasicProfile.get();
			// console.log('ID: ' + profile.getId()); 
			// console.log('Name: ' + profile.getName());
			// console.log('Image URL: ' + profile.getImageUrl());
			// console.log('Email: ' + profile.getEmail());
			// console.log(profile);
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