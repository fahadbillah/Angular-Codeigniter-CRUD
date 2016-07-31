NGCI.factory('loginService', ['$http','$q','$rootScope', function($http,$q,$rootScope){
	return {
		login: function(data) {
			// var deferred = $q.defer();

			$http({
				method: 'post',
				url: 'auth/login',
				data: data
			})
			.success(function(data) {
				console.log('return data from login method: ', data);
				// $rootScope.user = $rootScope.user || data;
				return false;
				$rootScope.user = data;
			})
			.error(function(data) {
				// deferred.reject('Error occured');
			});

			// return deferred.promise;
		},
		loginCheck: function(data) {
			var deferred = $q.defer();

			$http({
				method: 'post',
				url: 'auth/login',
				data: data
			})
			.success(function(data) {
				deferred.resolve(data);
			})
			.error(function(data) {
				deferred.reject('Error occured');
			});

			return deferred.promise;
		},
		logout: function() {
			var deferred = $q.defer();

			$http({
				method: 'get',
				url: 'auth/logout'
			})
			.success(function(data) {
				deferred.resolve(data);
			})
			.error(function(data) {
				deferred.reject('Error occured');
			});

			return deferred.promise;
		}
	};
}])