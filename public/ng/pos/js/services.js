(function () {
   "use strict";
   // this function is strict...
}());

angular.module('myApp.services',[]).
	service('sessionService', function() {
		return {
			getFlashdata : function(cred) {
				//console.log(CSRF_TOKEN);
				return cred;
			}
		};
	}).
	service('T', function() {
		var x;
		return {
			isObjInArrayo : function(obj, arro) {
				for(x = 0;x<arro.length;x++) {
					if(angular.equals(obj, arro[x])) 
						return x;
				}
				return (-1);
			},
			isKeyEqInArrayo : function(key, arro) {
				for(x = 0;x<arro.length;x++) {
					if(key === arro[x].name) 
						return x;
				}
				return (-1);
			}
		}
	}).
	factory('DB', function($resource) {
		var resource = {};

		resource.getItem = function(paramUrl, successCb, stringSorts) {
			//console.log(paramUrl, successCb);
			resource  = $resource('posApi', {'mySortOrder':stringSorts}, {query:  {method: 'GET', isArray : true}});
		    return resource.query(
		         paramUrl, 
		          successCb
		    );
		};

		resource.getCart = function(paramUrl, successCb) {
			//console.log(paramUrl, successCb);
			resource  = $resource('pos/posData2', {}, {query:  {method: 'GET', isArray : true}});
		    return resource.query(
		         paramUrl, 
		          successCb
		    );
		};

		return resource;
	}).
	factory('ItemService', function($filter) {
		var Item = {};

		Item.add = function(scopeCart, scopeItem, id, cb) {
			itemToAdd = $filter('getById')(scopeItem, id);
			isDup = $filter('getById')(scopeCart, id);
	      	if(itemToAdd && isDup === null);
	      		cb();
		};

		Item.remove = function(paramUrl, successCb) {

		};

		return Item;
	});