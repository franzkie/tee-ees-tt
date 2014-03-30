(function () {
   "use strict";
   // this function is strict...
}());

angular.module('myApp.services',[]).
	service('authService', function($http) {
		return {
			login : function(cred) {
				//console.log(CSRF_TOKEN);
				var promise = $http.post('auth/login',cred).
					then(function(data){
						return data;
					});
				return promise;
			}
		};
	}).
	service('sessionService', function() {
		return {
			getFlashdata : function(cred) {
				//console.log(CSRF_TOKEN);
				return cred;
			}
		};
	}).
	service('filesService', ['$http', function($http) {
		return {
			getFiles : function(id) {
				//cred='my-computer|c|xampp';
				//cred = 'my-computer';
				var promise;
				if(angular.isDefined(id) && id !== '') {
					promise = $http.post('files/ifExists',{path:id});
				} else {
					promise = $http.get('files/get_files');	
				}
				return promise;
			},
			rename : function(id, name) {
				var promise = $http.post("files/rename",{id:id, name:name});
				return promise;
			},
			newFolder : function(id) {
				var promise = $http.post("files/newFolder",{id:id});
				return promise;
			},
			deleteFolder : function(arrId) {
				var promise = $http.post("files/deleteFolder",{id:JSON.stringify(arrId)});
				return promise;
			}
		};
	}]);