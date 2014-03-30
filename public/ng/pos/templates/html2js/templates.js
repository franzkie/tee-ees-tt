angular.module('templates-html2js', ['../templates/directives/mainTable.html']);

angular.module("../templates/directives/mainTable.html", []).run(["$templateCache", function($templateCache) {
  $templateCache.put("../templates/directives/mainTable.html",
    "\n" +
    "<div class=\"tableWrapper first\">\n" +
    "\n" +
    "    <div>\n" +
    "    <strong>Selected users:</strong> {{ item | filter:{\"$selected\": true} }}\n" +
    "    </div>\n" +
    "    <button class=\"btn btn-default\" ng-click=\"tableParams.data[1].$selected = true\">Select second row</button>\n" +
    "\n" +
    "<table ng-table=\"tableParams\" show-filter=\"true\" class=\"table ng-table-rowselected\">\n" +
    "    <tr ng-repeat=\"item in $data\" id=\"t1-{{item.id}}\"\n" +
    "        ng-click=\"item.$selected = !item.$selected; singleSelection(item)\"\n" +
    "        ng-class=\"{'active': item.$selected}\">\n" +
    "        <td data-title=\"'Code'\" sortable=\"'code'\" filter=\"{ 'name': 'text' }\">\n" +
    "            {{item.code}}\n" +
    "        </td>\n" +
    "        <td data-title=\"'Name'\" sortable=\"'name'\">\n" +
    "            {{item.name}}\n" +
    "        </td>\n" +
    "        <td data-title=\"'Description'\" sortable=\"'description'\">\n" +
    "            {{item.description}}\n" +
    "        </td>\n" +
    "        <td data-title=\"'Price'\" sortable=\"'price'\">\n" +
    "            {{item.price}}\n" +
    "        </td>\n" +
    "        <td data-title=\"'Quantity'\" sortable=\"'qty'\">\n" +
    "            {{item.qty}}\n" +
    "        </td>\n" +
    "        <td data-title=\"'Expiry'\" sortable=\"'expiry'\">\n" +
    "            {{item.expiry | formatDate}}\n" +
    "        </td>\n" +
    "        <td data-title=\"'Action'\">\n" +
    "            <button class=\"btn btn-default\">Add To Cart</button>\n" +
    "        </td>\n" +
    "    </tr>\n" +
    "</table>\n" +
    "\n" +
    "  <ul class=\"context-menu\">\n" +
    "    <!--<li ng-class=\"{'tyro-rename:\\'rename\\'': (menu.name=='Rename'||menu.name=='New Folder')}\" ng-repeat=\"menu in tyro.files.contextmenu | filter:{appliesTo:tyro.files.isContextFolder, role:tyro.files.user}\" ng-click=\"tyro.files.selectMenu(menu)\">{{menu.name}}</li>-->\n" +
    "        <li ng-repeat=\"menu in items.contextmenu\">\n" +
    "            <span>{{menu.name}}</span>\n" +
    "        </li>\n" +
    "  </ul>\n" +
    "</div>\n" +
    "\n" +
    "<div class=\"tableWrapper\">\n" +
    "\n" +
    "<table ng-table=\"tableParams2\" show-filter=\"true\" class=\"table ng-table-rowselected\">\n" +
    "    <tr ng-repeat=\"item in $data\"  id=\"t2-{{item.id}}\"\n" +
    "        ng-click=\"item.$selected = !item.$selected; singleSelection(item)\"\n" +
    "        ng-class=\"{'active': item.$selected}\">\n" +
    "        <td data-title=\"'Code'\" sortable=\"'code'\" filter=\"{ 'name': 'text' }\">\n" +
    "            {{item.code}}\n" +
    "        </td>\n" +
    "        <td data-title=\"'Name'\" sortable=\"'name'\">\n" +
    "            {{item.name}}\n" +
    "        </td>\n" +
    "        <td data-title=\"'Description'\" sortable=\"'description'\">\n" +
    "            {{item.description}}\n" +
    "        </td>\n" +
    "        <td data-title=\"'Price'\" sortable=\"'price'\">\n" +
    "            {{item.price}}\n" +
    "        </td>\n" +
    "        <td data-title=\"'Quantity'\" sortable=\"'qty'\">\n" +
    "            {{item.qty}}\n" +
    "        </td>\n" +
    "        <td data-title=\"'Expiry'\" sortable=\"'expiry'\">\n" +
    "            {{item.expiry | formatDate}}\n" +
    "        </td>\n" +
    "    </tr>\n" +
    "</table>\n" +
    "\n" +
    "</div>\n" +
    "");
}]);
