(function () {
   "use strict";
   // this function is strict...
}());

angular.module('myApp',['ngTable','ngResource','ngRoute','ngCookies','myApp.controllers','myApp.directives','myApp.services','myApp.filters','templates-html2js']).
	config(['$routeProvider',function($routeProvider) {
		$routeProvider
		.when('/list', {
				templateUrl: 'ng/pos/templates/index.php', 
				controller: 'mainTableController',
				reloadOnSearch: false
			})
		.otherwise({
			redirectTo: '/list'
		});
}]);

