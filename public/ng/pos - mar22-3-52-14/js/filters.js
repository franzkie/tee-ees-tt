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
    filter('uploadFileName', function() {
        return function(name) {
            var dottedExt = strrpos(name,'.');
            dottedExt = name.substring(dottedExt);
            if(name.length<21) {
                return name;
            }
            return name.substring(0,20)+'...'+dottedExt;
            //return name.substring(0,5);
        };
    }).
    filter('uploadFileSize', function() {
        return function(size) {
            var arrBytes = ['Bytes','KB','MB','GB'];
            var count = 0;
            while(size>1024) {
                size = size/1024;
                count++;
            }

            return (Math.round(size * 100) / 100).toFixed(2)+' '+arrBytes[count];
            //return name.substring(0,5);
        };
    });
    