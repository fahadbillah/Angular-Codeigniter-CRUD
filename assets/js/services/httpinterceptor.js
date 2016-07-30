NGCI.factory('httpInterceptor', [function(){
	return {
		request: function (config) {
			if (config.method.toLowerCase() === 'post') {
				// serialize post data
				config.data = $.param(config.data);
			}
			config.headers['Content-Type'] = "application/x-www-form-urlencoded; charset=UTF-8;";
			return config;
		},
		requestError: function(reason) {
			console.log(reason);
		},
		response: function(res) {
			return res;
		},
		responseError: function(reason) {
			console.log(reason);
		}
	}
}]);