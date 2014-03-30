(function () {
   "use strict";
   // this function is strict...
}());

angular.module('myApp.directives',['ui.bootstrap.position']).
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
  }]).
  directive('tr',['$position', '$timeout', function($position, $timeout){
    // Runs during compile
    return {
      // name: '',
      // priority: 1,
      // terminal: true,
      /* scope: {}, // {} = isolate, true = child, false/undefined = no change
       controller: function($scope, $element, $attrs, $transclude) {
        $scope.item = {"contextmenu" : [
          {"name":"Open", "value":0},
          {"name":"Purchase", "value":1},
        ]};
       },*/
      // require: 'ngModel', // Array = multiple requires, ? = optional, ^ = check parent elements
      restrict: 'E', // E = Element, A = Attribute, C = Class, M = Comment
      //template: $templateCache.get('../templates/directives/mainTable.html'),
      //templateUrl: '../templates/directives/mainTable.html',
      // replace: true,
      // transclude: true,
      // compile: function(tElement, tAttrs, function transclude(function(scope, cloneLinkingFn){ return function linking(scope, elm, attrs){}})),
      link: function(scope, elm, iAttrs, controller) {
        $timeout(function() {
          var isTbodiesChild = $(elm).parent('tbody').length;
          if(isTbodiesChild) {
            
              var menu = $('.context-menu');
              var menuP = $position.position(menu);
              //var contextmenu = $('#contextmenu');
              elm.bind('contextmenu', function(e) {
                e.preventDefault(); 
                menu.hide();
                menu.fadeIn(350);
                menuP.left = e.pageX;
                menuP.top = e.pageY;
                menu.css({left: menuP.left-23 + 'px', top: menuP.top + 'px', "z-index":9999});
                elm.click();
              });
            }
        }, 2000);
      }
    }
  }]).
directive('inputFilter', ['$templateCache', '$filter', '$cookieStore', 'ItemService', '$location', function($templateCache, $filter, $cookieStore, ItemService, $location){
  // Runs during compile
  return {
    // name: '',
    // priority: 1,
    // terminal: true,
    // scope: {}, // {} = isolate, true = child, false/undefined = no change
    // cont­rol­ler: function($scope, $element, $attrs, $transclue) {},
    // require: 'ngModel', // Array = multiple requires, ? = optional, ^ = check parent elements
     restrict: 'C', // E = Element, A = Attribute, C = Class, M = Comment
    // template: '',
    // templateUrl: '',
    // replace: true,
    // transclude: true,
    // compile: function(tElement, tAttrs, function transclude(function(scope, cloneLinkingFn){ return function linking(scope, elm, attrs){}})),
    link: function($scope, iElm, iAttrs, controller) {
      isItemTable = $(iElm).closest('.tableWrapper.first').length;
      if(isItemTable) {
        var counter = 0;

        //f3 search implementation
        $('html').bind('keypress',function(e) {
          if(e.keyCode === 114) {//f3
            counter = 0;
            e.preventDefault();
            iElm.focus();
          }
          console.log(e.keyCode);
        })



        counter = 0;
        iElm.bind('click', function () {
          counter = 0;
          $scope.$apply(function() {
            for(var i in $scope.item) {
              $scope.item[i].$selected = false;//make other false;
            } 
          });
          console.log(counter);
        })
        iElm.bind('keypress', function(e){
          console.log(e.keyCode, e.shiftKey);
          if(e.keyCode == 13) { //if enter, add item to cart
            var item = angular.copy($scope.item[counter-1]);


            var found = $filter('getById')($scope.cart, item.id);
            if(found === null) {//if not yet there
              var qty = prompt("Adding item "+item.name+" with quantity:");
              if(qty > 0) {
                item.qty = qty;
                $location.search({"add":"true","id":item.id});
                /*ItemService.add($scope.item, item.id, function() {
                  $scope.cart.push(item);
                  var cached = $cookieStore.get('cartList');
                  console.log(cached);
                  cached.push(item);
                  $cookieStore.put('cartList',cached);
                  console.log('putting with key',item.id,' the item = ',item);
                  $scope.tableParams2.reload();  
                });*/
                $scope.tableParams2.reload();
              }
            } else { // if already there
              alert("edit qty since already added");
            }
          } else if(e.keyCode == 9) {//if tab
            e.preventDefault();
              console.log('counter is',counter);
            if(e.shiftKey) {//if shift key pressed (like unshift)
              if(counter != 0 && counter != 1) {
                $scope.$apply(function() {
                  d1 = counter-1;
                  $scope.item[d1].$selected = false;
                  $scope.item[d1-1].$selected = true;
                  counter -= 1;
                });
              }
            } else {// if no shift, just tab
              if(counter < $scope.item.length) {
                if(counter == 0) {
                  $scope.$apply(function() {
                    $scope.item[counter].$selected = true;
                    counter++;
                  });
                } else {
                  $scope.$apply(function() {
                    $scope.item[(counter-1)].$selected = false;
                    $scope.item[counter].$selected = true;
                    counter++;
                  });
                }
              }
            }
              console.log('counter2 is',counter);
          }
        })
      }
    }
  };
}]);
