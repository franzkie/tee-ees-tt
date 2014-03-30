(function () {
   "use strict";
   // this function is strict...
}());

angular.module('myApp.directives',[]).
	directive('mainTable',['$templateCache', function($templateCache){
		// Runs during compile
		return {
			// name: '',
			// priority: 1,
			// terminal: true,
			// scope: {}, // {} = isolate, true = child, false/undefined = no change
			// controller: function($scope, $element, $attrs, $transclue) {},
			// require: 'ngModel', // Array = multiple requires, ? = optional, ^ = check parent elements
			restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
			template: $templateCache.get('../templates/directives/mainTable.html'),
			//templateUrl: '../templates/directives/mainTable.html',
			// replace: true,
			// transclude: true,
			// compile: function(tElement, tAttrs, function transclude(function(scope, cloneLinkingFn){ return function linking(scope, elm, attrs){}})),
			link: function(scope, elm, iAttrs, controller) {
				console.log('rendered!');
			}
		};
	}]);