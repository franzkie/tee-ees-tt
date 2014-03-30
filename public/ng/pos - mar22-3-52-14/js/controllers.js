(function () {
   "use strict";
   // this function is strict...
}());

angular.module('myApp.controllers',[]).
  controller('mainTableController',['$scope', '$resource', '$timeout', '$filter', 'ngTableParams', function ($scope, $resource, $timeout, $filter, ngTableParams) {
    var Api = $resource('pos/posData', {}, {query:  {method: 'GET', isArray : true}});
    //$scope.data = data;

    $scope.tableParams = new ngTableParams({
        page: 1,            // show first page
        count: 10,          // count per page
        filter: {
            //name: 'M'       // initial filter
        },
        sorting: {
            //name: 'asc'     // initial sorting
        }
    }, {
        getData: function ($defer, params) {
            // use build-in angular filter
            
            Api.query(params.url(), function(data) {
        total = data.length; // length of data
            $timeout(function() {
                // update table params
                //params.total(data.total);
                // set new data
                var filteredData = params.filter() ?
                    $filter('filter')(data, params.filter()) :
                    data;
            var orderedData = params.sorting() ?
                    $filter('orderBy')(filteredData, params.orderBy()) :
                    data;

            params.total(orderedData.length);
                //$defer.resolve(data);
                $scope.d = data;
                 $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
                }, 2500);
            });

            /*var filteredData = params.filter() ?
                    $filter('filter')(data, params.filter()) :
                    data;
            var orderedData = params.sorting() ?
                    $filter('orderBy')(filteredData, params.orderBy()) :
                    data;

            params.total(orderedData.length); // set total for recalc pagination
            $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
            */
        }
    });

    $scope.changeSelection = function(user) {
        // console.info(user);
    };
}]);