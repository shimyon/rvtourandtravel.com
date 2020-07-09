 <!DOCTYPE html>
<html>
<?php include('../support/head.php'); ?>
<body>
<?php include('navigation.php'); ?>
<div class="container">
	<div id="app">
		<div class="form-row">
			
			<div class="form-group col-md-3">
				<label for="inputEmail4">Duration</label>
				<input type="text" class="form-control" placeholder="Duration" v-model="Packages.Duration">
			</div>
			<div class="form-group col-md-3">
				<label for="inputEmail4">Date</label>
				<input type="date" class="form-control" placeholder="Date" v-model="Packages.Date">
			</div>
			<div class="form-group col-md-3">
				<label for="inputEmail4">AirPort</label>
				<input type="text" class="form-control" id="AirPort" placeholder="AirPort" v-model="Packages.AirPort">
			</div>
			<div class="form-group col-md-3">
				<label for="inputEmail4">Extras</label>
				<input type="text" class="form-control" id="Extras" placeholder="Extras" v-model="Packages.Extras">
			</div>
			<div class="form-group col-md-3">
				<label for="inputEmail4">PricePerPerson</label>
				<input type="text" class="form-control" id="PricePerPerson" placeholder="PricePerPerson" v-model="Packages.PricePerPerson">
			</div>
	  	</div>
	  	<button v-on:click="AddUpdate" type='button' class="btn btn-primary">{{ Packages.PackagesId ? 'Update' : 'Add New' }}</button>
	  	<button v-on:click="ClearData" type='button' class="btn btn-danger">Clear</button>
			<h4>{{ message }}</h4>
	  		<ul class="list-group" style="margin-top: 10px;">
			<li class="list-group-item list-group-item-action flex-column align-items-start"  v-for="todo in listing">
				<div class="row">
					<div class="col col-sm-5 col-5"><b>Duration:</b> {{ todo.Duration }}</div>
					<div class="col col-sm-5 col-5"><b>Date:</b> {{ todo.Date }}</div>
					<div class="col col-sm-5 col-5"><b>AirPort:</b> {{ todo.AirPort }}</div>
					<div class="col col-sm-5 col-5"><b>Extras:</b> {{ todo.Extras }}</div>
					<div class="col col-sm-5 col-5"><b>Price Per Person:</b> {{ todo.PricePerPerson }}</div>
					<div class="col col-sm-2 col-2">
						<button v-on:click="EditItem(todo);" class="btn btn-primary rounded btn-sm ">
							Edit
						</button>
						<button v-on:click="DeleteItem(todo);" class="btn btn-danger rounded btn-sm ">
							Delete
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
			Packages:{Duration:null,Date:null, AirPort:null, Extras: null, PricePerPerson: null},
			listing:[]
	  	},
		beforeMount(){
			this.Listing()
		},
	  methods: {
	  	ClearData: function () {
	  		var self = this;
	  		if (self.Packages) {	  			
		  		self.Packages.PackagesId = null;
	        	self.Packages.Duration = null;
	        	self.Packages.Date = null;
	        	self.Packages.AirPort = null;
	        	self.Packages.Extras = null;
	        	self.Packages.PricePerPerson = null;
	  		}
	  	},
	  	EditItem: function (objlist) {
	  		this.Packages = $.extend({}, objlist);
	  	},
	  	Listing: function () {
			var self = this;
			$.ajax({
	            url: GlobalConfig.RemoteUrl + 'admin/packages_action.php',
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
	  	DeleteItem: function (item) {
		  	var self = this;			  	
		  	$.ajax({
	            url: GlobalConfig.RemoteUrl + 'admin/packages_action.php',
	            type: 'POST',
	            // dataType: "text",
	            data: { 
	            	action: 'Delete', 
	            	PackagesId: item.PackagesId 
	            },
	         	success: function (data) {
	         		if (data.IsOk) 
	            	{
	         			self.Listing();
	         		} 
	         		else 
	         		{
	         			self.message = data.Error;
	         		}
	            },
	            error: function (error) {
	                console.log(error);
	            }
	        });	  		
  		},
		AddUpdate: function () {
		  // this.message = this.message.split('').reverse().join('')
		  	var self = this;
		  	this.Packages.action = 'insert';
		  	$.ajax({
	            url: GlobalConfig.RemoteUrl + 'admin/packages_action.php',
	            type: 'POST',
	            // dataType: "text",
	            data: this.Packages,
	            success: function (data)
	            {
	            	if (data.IsOk) 
	            	{
	                	self.message = 'Saved successfully';
	                	self.ClearData();
	                	self.Listing();
	                	setTimeout(function() 
	                	{
							self.message = '';
	                	}, 3000);
	            	} 
	            	else 
	            	{	            		
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