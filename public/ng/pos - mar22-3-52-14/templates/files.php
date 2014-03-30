<div tyro-nav></div>    
<div class="container row-fluid files-m">
	<div class="files-m header">
		header
	</div>
	<div class="main span12">	
		<div class="left-side-bar span2">
			left-side-bar
		</div>
		<div class="content span8">
			<div class="header">
				Files
			</div>
			<div class="tyro-files" tyro-contextmenu-area>
			</div>
		</div>
		<div class="right-side-bar span2">
			right-side-bar
		</div>
	</div>
  <ul class="context-menu">
    <!--<li ng-class="{'tyro-rename:\'rename\'': (menu.name=='Rename'||menu.name=='New Folder')}" ng-repeat="menu in tyro.files.contextmenu | filter:{appliesTo:tyro.files.isContextFolder, role:tyro.files.user}" ng-click="tyro.files.selectMenu(menu)">{{menu.name}}</li>-->
    	<li ng-repeat="menu in tyro.files.contextmenu | filter:{appliesTo:tyro.files.isContextFolder, role:tyro.files.user}">
    		<div ng-switch on="menu.name">
    			<div ng-switch-when="Rename">
    				<span tyro-rename="Rename" tyro-menu-click="tyro.files.selectMenu(menu)">{{menu.name}}</span>
    			</div>
    			<div ng-switch-when="New Folder">
    				<span tyro-rename="New Folder" tyro-menu-click="tyro.files.selectMenu(menu)">{{menu.name}}</span>
    			</div>
    			<div ng-switch-default>
    				<span ng-click="tyro.files.selectMenu(menu)">{{menu.name}}</span>
    			</div>
    		</div>
    	</li>
  </ul>
	<div class="file-m footer">
		footer
	</div>
</div>
<!-- start modal template-->
<script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3>Upload files here</h3>
        </div>
        <div class="modal-body">
            	<div class="mainContent">
              		<form enctype="multipart/form-data">
              		<input type="hidden" name="<?php echo ini_get("session.upload_progress.name"); ?>" value="123" />
              			<input class="fileUpload" type="file" name="files[]" multiple onchange="angular.element(this).scope().sendFile(this)"
              				style="display:none"/>
              		</form>
              		<div class="drop-zone" style="height:40px; width:100%; border:1px solid black">Click here or drop files to upload</div>
                  
                  <ul ng-repeat="file in filesList">
                    <li><img height="64" class="thumbnail" width="64" id="fileImage-{{$index}}" />name:{{file.name | uploadFileName}}, size: {{file.size | uploadFileSize}}</li>  
                  </ul>
                  
              		<div>progress: {{progress}}</div>
              		<button ng-click="vyx()">update</button>
              </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" ng-click="upload()">Upload</button>
            <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
        </div>
</script>
<!-- end modal template-->