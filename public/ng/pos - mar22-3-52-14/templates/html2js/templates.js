angular.module('templates-html2js', ['../templates/directives/mainTable.html']);

angular.module("../templates/directives/mainTable.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("../templates/directives/mainTable.html",
    "<h1>Table with row selection</h1>\n" +
    "\n" +
    "<div>\n" +
    "\n" +
    "    <div>\n" +
    "    <strong>Selected users:</strong> {{ d | filter:{\"$selected\": true} }}\n" +
    "    </div>\n" +
    "    <button class=\"btn btn-default\" ng-click=\"tableParams.data[1].$selected = true\">Select second row</button>\n" +
    "\n" +
    "<table ng-table=\"tableParams\" show-filter=\"true\" class=\"table ng-table-rowselected\">\n" +
    "    <tr ng-repeat=\"user in $data\"\n" +
    "        ng-click=\"user.$selected = !user.$selected; changeSelection(user)\"\n" +
    "        ng-class=\"{'active': user.$selected}\">\n" +
    "        <td data-title=\"'Name'\" sortable=\"'name'\" filter=\"{ 'name': 'text' }\">\n" +
    "            {{user.name}}\n" +
    "        </td>\n" +
    "        <td data-title=\"'Age'\" sortable=\"'age'\">\n" +
    "            {{user.age}}\n" +
    "        </td>\n" +
    "    </tr>\n" +
    "</table>\n" +
    "\n" +
    "</div>\n" +
    "");
}]);
