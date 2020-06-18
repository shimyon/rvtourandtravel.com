<!DOCTYPE html>
<html>
<?php include('../support/head.php'); ?>
<body>
<?php include('navigation.php'); ?>
<div class="container">
	<div id="app">
		<div class="form-row">
			<div class="form-group col-md-1">
				<label for="inputEmail4">Folder Id</label>
				<input type="text" class="form-control" placeholder="Folder Id" disabled="disabled" v-model="lookup.FolderID">
			</div>
			<div class="form-group col-md-3">
				<label for="inputEmail4">Folder Name</label>
				<input type="text" class="form-control" placeholder="Folder Name" v-model="lookup.FolderName">
			</div>
			<div class="form-group col-md-2">
				<label for="inputEmail4">Tour Date</label>
				<input type="date" class="form-control" placeholder="Folder Name" v-model="lookup.TourDate">
			</div>
			<div class="form-group col-md-3" style="display: none;">
				<label for="inputEmail4">FolderPath</label>
				<input type="text" class="form-control" id="inputEmail4" placeholder="FolderPath" v-model="lookup.FolderPath">
			</div>
			<div class="form-group col-md-3">
				<label for="inputEmail4">Gallery</label>
				<input type="checkbox" id="checkbox" v-model="lookup.IsGallery">
			</div>
	  	</div>
	  	<button v-on:click="AddEdit" type='button' class="btn btn-primary">{{ lookup.FolderID ? 'Update' : 'Add New' }}</button>
	  	<button v-on:click="ClearData" type='button' class="btn btn-danger">Clear</button>
	  	<h4>{{ message }}</h4>
	  
	  	<ul class="list-group" style="margin-top: 10px;">
			<li class="list-group-item list-group-item-action flex-column align-items-start"  v-for="todo in listing">
				<div class="row">
					<div class="col col-sm-5 col-5">
						{{ todo.FolderName }} 
						<strong class="badge badge-primary" title="Total files" style="cursor: pointer;">{{ todo.TotalFolder }}</strong>
					</div>
					<div class="col col-sm-2 col-2">
						Gallery: <strong class="badge badge-primary">{{ todo.IsGallery == '1' ? 'Yes' : 'No' }}</strong>
					</div>
					<div class="col col-sm-2 col-2">Path:<strong>{{ todo.FolderPath }}</strong></div>
					<div class="col col-sm-3 col-3 text-right">
						<button v-on:click="EditItem(todo);" class="btn btn-primary rounded btn-sm ">
							Edit
						</button>
						<button v-on:click="UploadPhoto(todo);" class="btn btn-success rounded btn-sm ">
							Upload
						</button>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>
</body>
<?php include('../support/scripts.php'); ?>
<script>
$(function(){ 
	var app = new Vue({
	  el: '#app',
	  data: {
			message: '',
			lookup:{
				FolderPath:null, 
				TourDate: (new Date()), 
				FolderName: null, 
				FolderID: null, 
				IsGallery: 0, 
				TotalFolder: 0
			},
			listing:[]
	  	},
		beforeMount(){
			this.Listing()
		},
	  methods: {
	  	ClearData: function () {
	  		var self = this;
	  		if (self.lookup) {
		  		self.lookup.FolderID = null;
	        	self.lookup.FolderName = null;
	        	self.lookup.FolderPath = null;
	        	self.lookup.IsGallery = 0; 
	        	self.lookup.TotalFolder = 0; 
	        	self.lookup.TourDate = (new Date()); 
	  		}
	  	},
	  	UploadPhoto: function(objlist) {
	  		var IsGallery = (objlist.IsGallery == '1' ? 'Y' : 'N');
			location.assign(GlobalConfig.RemoteUrl + "admin/document.php?isgallery=" + IsGallery  + "&folderpath=" + objlist.FolderPath);
	  	},
	  	EditItem: function (objlist) {
	  		this.lookup = $.extend({}, objlist);
	  		this.lookup.IsGallery = (this.lookup.IsGallery == '1');
	  	},
	  	Listing: function () {
			var self = this;
			$.ajax({
	            url: GlobalConfig.RemoteUrl + 'admin/folder_action.php',
	            type: 'POST',
	            dataType: "text",
	            data: {action: 'listing'},
	            success: function (data) {
	                self.listing = JSON.parse(data);
	            },
	            error: function (error) {
	                console.log(error);
	            }
	        });	
	  	},
		AddEdit: function () {
		  	var self = this;
		  	this.lookup.action = 'insert';
		  	$.ajax({
	            url: GlobalConfig.RemoteUrl + 'admin/folder_action.php',
	            type: 'POST',
	            // dataType: "text/json",
	            data: this.lookup,
	            success: function (data) {
	            	if (data.IsOk) {
	            		self.message = 'Saved successfully';	            			
		                self.lookup.FolderID = null;
		                self.lookup.FolderName = null;
		                self.lookup.FolderPath = null;
		                self.lookup.IsGallery = 0;
		                self.lookup.TotalFolder = 0;
		                self.lookup.TourDate = (new Date());
		                self.Listing();
		                setTimeout(function() {
							self.message = '';
		                }, 5 * 1000);
	            	} else {	            		
	                	self.message = data.Error;
	            	}
	            },
	            error: function (error) {
	                console.log(error);
	            }
	        });
		}
	  }
	})
});
</script>
</html> 