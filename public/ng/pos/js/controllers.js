(function () {
   "use strict";
   // this function is strict...
}());

angular.module('myApp.controllers',[]).
  controller('mainTableController',['$scope', '$timeout', '$routeParams', '$location', '$filter', 'ngTableParams', 'DB', '$cookies','$cookieStore', 'ItemService', 'T', function ($scope, $timeout, $routeParams, $location, $filter, ngTableParams, DB, $cookies, $cookieStore, ItemService, T) {
    //var Api = $resource('pos/posData', {}, {query:  {method: 'GET', isArray : true}});
    //$scope.data = data;
    sorts = [];

    /*var iii = T.isKeyInArrayo('value',[{"name":"tyro", "value":"tan"},
                                      {"name":"tyro2", "value":"tan2"},
                                      {"name":"tyro3", "value":"tan3"},]);
    console.log('iii is ',iii);*/

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
            //console.log( DB.itemQuery);

            console.log('sorts 1',sorts);
              var pps = params.$params.sorting;
              if(!($.isEmptyObject(pps)) && (_.size(pps) !==1) ){//if not empty and not size of 1
                console.log(pps);
                
                for(var i in pps) {
                  kv = {"name":i, "value":pps[i]};
                  isIn = T.isObjInArrayo(kv, sorts);
                  isKeyIn = T.isKeyEqInArrayo(i, sorts);
                  //console.log('isKeyIn',isKeyIn);
                  if(isKeyIn !== -1) {//if key already in sorts// only change the val
                    if(pps[i] !== '') {
                      sorts[isKeyIn].value=pps[i];
                    } else {
                      sorts.splice(isKeyIn,1);//delete item if defaulted to no sort
                    }
                  } else if(isIn === -1) {//if k+v not yet in sorts
                    sorts.push(kv);
                  }
                }
              } else {//if object is empty or of 1 length only
                console.log('null this time or only 1, so go replace');
                for(p in pps) {
                  sorts = [{"name":p,"value":pps[p]}];  
                }
              }
            console.log('sorts 2',sorts);


            DB.getItem(params.url(), function(data) {
              $timeout(function() {
                  // update table params
                  //params.total(data.total);
                  // set new data

                  /*var filteredData = params.filter() ?
                      $filter('filter')(data, params.filter()) :
                      data;*/
                      //console.log('params.sorting',params.sorting());

              var total = data[(data.length - 1)].total;
              data.pop();
              var orderedData = data;/*params.sorting() ?
                      $filter('orderBy')(filteredData, params.orderBy()) :
                      data;*/

              

              params.total(total);
                  //$defer.resolve(data);
                  $scope.item = orderedData;
                   //$defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
                   $defer.resolve(orderedData);
                  }, 500);
            }, JSON.stringify(sorts));

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

$cookies.isBrowserCacheCleared = 'false';

$cookieStore.remove('cartList');

$scope.cart = $cookieStore.get('cartList') || [];
$cookieStore.put('cartList',$scope.cart);
console.log('cart =',$scope.cart);

$scope.$watch(function() { return $cookies.isBrowserCacheCleared;}, function(newValue) {//if browser cache is cleared by the user, refresh page
        //console.log('Cookie string: ' + $cookies.test)
        if(typeof $cookies.isBrowserCacheCleared === 'undefined') {
          alert('The system requires the browsers cache storage, refreshing now.');
          window.location.reload();
        }
});

console.log('$routeParams',$routeParams);

$scope.$on('$routeUpdate', function(){
  /*$scope.sort = $location.search().sort;
  $scope.order = $location.search().order;
  $scope.offset = $location.search().offset;*/
  if($routeParams.add === 'true') {
    $r = Object.create($routeParams);
    console.log('afterObject.create',$r);
    ItemService.add($scope.cart, $scope.item, $r.id, function() {
                  item = $filter('getById')($scope.item,$r.id);
                  $scope.cart.push(item);
                  var cached = $cookieStore.get('cartList');
                  console.log(cached);
                  cached.push(item);
                  $cookieStore.put('cartList',cached);
                  console.log('putting with key',item.id,' the item = ',item);
                  $scope.tableParams2.reload();  
                });
    //$scope.tableParams2.reload();
  }
});

$scope.tableParams2 = new ngTableParams({
                        page: 1,            // show first page
                        count: 100
                    }, {
                        total: $scope.cart.length, // length of data
                        getData: function($defer, params) {
                            console.log("is called?");
                            // use build-in angular filter
                            var filteredData = params.filter() ?
                                    $filter('filter')($scope.cart, params.filter()) :
                                    $scope.cart;
                            var orderedData = params.sorting() ?
                                    $filter('orderBy')(filteredData, params.orderBy()) :
                                    $scope.cart;

                            params.total(orderedData.length); // set total for recalc pagination
                            $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
                        }
                    });

    $scope.singleSelection = function(itemSelected) {
        for(var i in $scope.item) {
            if(itemSelected.id !== $scope.item[i].id)
            $scope.item[i].$selected = false;//make other false;
        } 
    };
}]);