NGCI.directive('activemenu', ['$route', function($route){
	return {
		restrict: 'A',
		scope:{
			activemenu: '@'
		},
		link: function($scope, iElm, iAttrs, controller) {
			$scope.$on( "$routeChangeSuccess", function(event, current, prev) {
				if (current.$$route.routeName === $scope.activemenu) {
					$('.nav li').removeClass('active');
					$(".nav li[activemenu='"+current.$$route.routeName+"']").addClass('active');
				}
			});
		}
	};
}]);