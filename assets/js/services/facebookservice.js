NGCI.factory('facebookservice', ['$q','$window', function($q,$window) {
	return {
		getMyLastName: function() {
			var deferred = $q.defer();
			FB.api('/me', {
				fields: 'last_name'
			}, function(response) {
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

				if (res.status === 'connected') {

		      	/*
		       	The user is already logged,
		       	is possible retrieve his personal info
		       	*/
		       	_self.getUserInfo();

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
			}
		});
		},
		getUserInfo: function() {

			var _self = this;

			FB.api('/me', function(res) {
				$rootScope.$apply(function() {
					$rootScope.user = _self.user = res;
				});
			});

		},
		logout: function() {

			var _self = this;

			FB.logout(function(response) {
				$rootScope.$apply(function() {
					$rootScope.user = _self.user = {};
				});
			});

		}
	}
}]);