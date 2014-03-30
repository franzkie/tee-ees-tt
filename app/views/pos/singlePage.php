<!doctype html>
<html lang="en" ng-app="myApp">
<head>
    <meta charset="utf-8">
    <title>{{tyro.pageTitle}}</title>
    <link rel="stylesheet" href="/ng/pos/css/bootstrap.min.css">
    <link rel="stylesheet" href="/ng/pos/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/ng/pos/css/ng-table.css">
    <link rel="stylesheet" href="/ng/pos/css/style.css">
    <!--<script type="text/javascript" src="../assets/js/jquery.v1.8.3.min.js"></script>-->
    <!--<script type="text/javascript" src="http://code.angularjs.org/1.0.7/angular-resource.min.js"></script>-->
    <!--<script type="text/javascript" src="../assets/js/lib/angular/angular.min.js"></script>-->
    <script type="text/javascript" src="/ng/pos/js/lib/jquery/jquery.v1.8.3.min.js"></script>
    <script type="text/javascript" src="/ng/pos/js/lib/angular/angular.js"></script>
    <script type="text/javascript" src="/ng/pos/js/lib/angular/angular-route.min.js"></script>
    <script type="text/javascript" src="/ng/pos/js/lib/angular/angular-resource.min.js"></script>
    <script type="text/javascript" src="/ng/pos/js/lib/angular/angular-cookies.js"></script>
    <script type="text/javascript" src="/ng/pos/js/lib/angular/bootstrap/position.js"></script>
    <script type="text/javascript" src="/ng/pos/js/lib/angular/bootstrap/ui-bootstrap-0.6.0.js"></script>
    <script type="text/javascript" src="/ng/pos/js/lib/angular/bootstrap/ui.bootstrap.modal.js"></script>
    <script type="text/javascript" src="/ng/pos/js/lib/underscore.js"></script>
    <script type="text/javascript" src="/ng/pos/js/lib/custom-functions.js"></script>

  
    <script type="text/javascript" src="/ng/pos/templates/html2js/templates.js"></script>
    <script type="text/javascript" src="/ng/pos/js/app.js"></script>
    <script type="text/javascript" src="/ng/pos/js/services.js"></script>
    <script type="text/javascript" src="/ng/pos/js/filters.js"></script>
    <script type="text/javascript" src="/ng/pos/js/controllers.js"></script>
    <script type="text/javascript" src="/ng/pos/js/directives.js"></script>
    <!--<script type="text/javascript" src="../assets/js/bootstrap/bootstrap.js"></script>-->
    <script type="text/javascript" src="/ng/pos/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="/ng/pos/js/lib/angular/ng-table.src.js"></script>
    <script type="text/javascript" charset="utf8" src="/ng/pos/js/lib/angular/ng-table-export.src.js"></script>
  <script>
    angular.module("myApp").constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>').
    run(['$http', 'CSRF_TOKEN','$rootScope', '$location', function($http, CSRF_TOKEN, $rootScope, $location) {
          $http.defaults.headers.common['csrf_token'] = CSRF_TOKEN;
          $rootScope.tyro = {pageTitle : 'Bupharco - POS'};
      $rootScope.$on("$routeChangeStart", function(event, next, current) {
        /*if(next.templateUrl=='templates/login.php') {//to login page
          
        }else if(next.templateUrl=='templates/files.php') {//to login page
          /*var param = $location.path();
          console.log('param is '+param);
          var d = {data:param};
          $http.post('files/ifExists',d).
            success(function(data){
              
            });* /
            
        }*/
      });
    }]);
    
  </script>
  <style type="text/css">

.ng-invalid { border: 1px solid red; } 
body { font-family: Arial,Helvetica,sans-serif; }
body, td, th { font-size: 14px; margin: 0; }
table { border-collapse: separate; border-spacing: 2px; display: table; margin-bottom: 0; margin-top: 0; -moz-box-sizing: border-box; text-indent: 0; }
a:link, a:visited, a:hover { color: #5D6DB6; text-decoration: none; }
.error { color: red; }
.ui-helper-hidden { display: none;}

.main .tableWrapper {
  float:left;
  width:40%;
}

.main .tableWrapper.first {
  width:60%;
}



  </style>
<body>
   
    <div ng-view></div>
</body>


</html>