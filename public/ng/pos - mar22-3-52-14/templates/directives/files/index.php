<div class="each-file span2" ng-repeat="files in tyro.files.files">
  <div class="folder " tyro-folder-clicks="{{$index}}" ng-class="{folderSelected:files.isSelected}"></div>
  <center><div ng-switch on="files.rename">
  	<div ng-switch-when="1">
  		 <input tyro-filename="{{files.rename}}" type="text" ng-model="files.name"/>
  	</div>
  	<div ng-switch-when="0">
  		<span tyro-filename="{{files.rename}}" class="filename">{{files.name}}</span>
  	</div>
  </div></center>
</div>