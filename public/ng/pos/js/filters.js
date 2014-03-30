(function () {
   "use strict";
   // this function is strict...
}());

function strrpos (haystack, needle, offset) {
    var i = (haystack+'').lastIndexOf(needle, offset); // returns -1
    return i >= 0 ? i : false;
}

angular.module('myApp.filters', []).
    /*filter('contextmenu', function () {
        return function (context, menu) {
            //context='file'
            var arr = [];
            var i,j;
            for ( i = 0; i < menu.length; i++ ) {
              for ( j =0; j < menu[i].appliesTo.length; j++ ) {
                if ( menu[i].appliesTo[j] == context ) {
                    arr.push( menu[i] );
                    break;
                }
              }
            }
            return arr;
        }
    })*/
    filter('formatDate', function() {


  return function(input) {
    //unixTime = 1395748873;
    var timeStamp = new Date(input*1000);
    //return gmdate("M-d-Y H:i:s A", input);
    var now = timeStamp.toFormattedString();

    return now;
  };
}).filter('getById', function() {
  return function(input, id) {
    var i=0, len=input.length;
    for (; i<len; i++) {
      if (+input[i].id == +id) {
        return input[i];
      }
    }
    return null;
  }
});;