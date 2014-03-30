(function () {
   "use strict";
   // this function is strict...
}());

angular.module('myApp',['ngTable','ngResource','ngRoute','myApp.controllers','myApp.directives','myApp.filters','templates-html2js']).
	config(['$routeProvider',function($routeProvider) {
		$routeProvider
		.when('/', {
				templateUrl: 'ng/pos/templates/index.php', 
				controller: 'mainTableController'
			})
		.otherwise({
			redirectTo: '/'
		});
}]);

