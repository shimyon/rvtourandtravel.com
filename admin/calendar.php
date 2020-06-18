 <!DOCTYPE html>
<html>
<?php include('../support/head.php'); ?>
<body>
<?php include('navigation.php'); ?>
<div class="container">
	<div id="app">
		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="inputEmail4">Date</label>
				<input type="date" class="form-control" placeholder="Date" v-model="Calendar.Date">
			</div>
			<div class="form-group col-md-3">
				<label for="inputEmail4">Subject</label>
				<input type="text" class="form-control" placeholder="Subject" v-model="Calendar.Subject">
			</div>
			<div class="form-group col-md-3">
				<label for="inputEmail4">Message</label>
				<input type="text" class="form-control" id="Message" placeholder="Message" v-model="Calendar.Message">
			</div>
	  	</div>
	  	<button v-on:click="AddUpdate" type='button' class="btn btn-primary">{{ Calendar.CalendarId ? 'Update' : 'Add New' }}</button>
	  	<button v-on:click="ClearData" type='button' class="btn btn-danger">Clear</button>
			<h4>{{ message }}</h4>
	  		<ul class="list-group" style="margin-top: 10px;">
			<li class="list-group-item list-group-item-action flex-column align-items-start"  v-for="todo in listing">
				<!-- <div class="d-flex w-100 justify-content-between">
					<span class="mb-3"><b>Group Name:</b> {{ todo.GroupName }} </span>
					<span class="mb-3"><b>Class:</b> {{ todo.class }}</span>
					<small  v-on:click="EditItem(todo);" class="btn btn-primary btn-sm "><span class="badge badge-primary badge-pill mdi mdi-border-color">&nbsp;</span></small>
				</div>
				<div class="mb-6"><b>Value:</b> {{ todo.value }}</div> -->
				<div class="row">
					<div class="col col-sm-5 col-5"><b>Date:</b> {{ todo.Date }}</div>
					<div class="col col-sm-5 col-5"><b>Subject:</b> {{ todo.Subject }}</div>
					<div class="col col-sm-5 col-5"><b>Message:</b> {{ todo.Message }}</div>
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
			Calendar:{Date:null, Subject:null, Message: null},
			listing:[]
	  	},
		beforeMount(){
			this.Listing()
		},
	  methods: {
	  	ClearData: function () {
	  		var self = this;
	  		if (self.Calendar) {	  			
		  		self.Calendar.CalendarId = null;
	        	self.Calendar.Subject = null;
	        	self.Calendar.Date = null;
	        	self.Calendar.Message = null;
	  		}
	  	},
	  	EditItem: function (objlist) {
	  		this.Calendar = $.extend({}, objlist);
	  	},
	  	Listing: function () {
			var self = this;
			$.ajax({
	            url: GlobalConfig.RemoteUrl + 'admin/calendar_action.php',
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
	            url: GlobalConfig.RemoteUrl + 'admin/calendar_action.php',
	            type: 'POST',
	            // dataType: "text",
	            data: { 
	            	action: 'Delete', 
	            	CalendarId: item.CalendarId 
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
		  	this.Calendar.action = 'insert';
		  	$.ajax({
	            url: GlobalConfig.RemoteUrl + 'admin/calendar_action.php',
	            type: 'POST',
	            // dataType: "text",
	            data: this.Calendar,
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