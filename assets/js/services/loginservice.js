NGCI.factory('loginService', ['$http','$q', function($http,$q){
	return {
		login: function(data) {
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
		}
	};
}])