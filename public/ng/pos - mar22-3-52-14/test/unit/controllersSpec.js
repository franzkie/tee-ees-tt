(function () {
   "use strict";
   // this function is strict...
}());

/* jasmine specs for controllers go here */
//.constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>')
	var scope, ctrl;
describe('controllers', function(){
	beforeEach(module('myApp.controllers'));
	beforeEach(inject(function($rootScope, $controller) {

      scope = $rootScope.$new();
      ctrl = $controller('FileController', {$scope: scope});
      scope.tyro.files.files =[
                              {"id":4,"parent_id":2,"name":"f1","filename":"f1","type":"f","description":"description",
                                    "created_at":"2013-09-08 05:49:21","updated_at":"2013-09-08 05:49:21"},
                              {"id":5,"parent_id":2,"name":"f2","filename":"f2","type":"f","description":"description",
                                    "created_at":"2013-09-08 05:49:21","updated_at":"2013-09-08 05:49:21"},
                              {"id":13,"parent_id":2,"name":"New Folder","filename":"new_folder","type":"D","description":"description",
                                    "created_at":"2013-10-06 03:07:11","updated_at":"2013-10-06 03:07:11"}
                              ];
	}));

	it('should get data from the server', function() {
		expect(scope.tyro.files.files[0].created_at).toEqual("2013-09-08 05:49:21");
	});
});
