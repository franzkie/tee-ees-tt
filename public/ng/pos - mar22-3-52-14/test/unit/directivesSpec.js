(function () {
   "use strict";
   // this function is strict...
}());

/* jasmine specs for directives go here */
describe('directives', function() {
  var scope, compile, element;

  beforeEach(module('myApp','templates-html2js'));
  describe('tyroFilename', function() {
    beforeEach(inject(function($rootScope, $compile) {
        scope = $rootScope.$new();
        compile = $compile;
        element = angular.element('<div ng-switch on="files.rename">' +
        '<div ng-switch-when="1">' +
          '<input tyro-filename="{{files.rename}}" type="text" ng-model="files.name"/>' +
        '</div>' +
        '<div ng-switch-when="0">' +
          '<span tyro-filename="{{files.rename}}" class="filename">{{files.name}}</span>' +
        '</div>' +
      '</div>');
    }));

    it('should switch between rename and just display state', function() {
      scope.files = {};
      scope.tyro = {};
      scope.files.rename = 0;
      scope.files.name = 'My-Computer';
      scope.tyro.files = {};
      scope.tyro.files.tempName = 'My Computer';

  

      compile(element)(scope);
      scope.$digest();
      expect(scope.files.rename).toBe(0);
      expect(scope.files.name).toBe('My-Computer');
      expect($(element).find('span').html()).toBe('My-Computer');
      expect($(element).find('span')).toHaveClass('filename');

      scope.files.rename = 1;
      expect(scope.files.rename).toBe(1);
      scope.$digest();
      expect(scope.files.name).toBe('My-Computer');
      expect($(element).find('span').html()).not.toBe('My-Computer');
      expect($(element).find('span')).not.toHaveClass('filename');

    });
  });
});
