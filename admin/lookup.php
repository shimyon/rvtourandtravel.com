<!DOCTYPE html>
<html>
<?php include('../support/head.php'); ?>
<body>
<?php include('navigation.php'); ?>
<div class="container">
	<div id="app">
		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="inputEmail4">Lookup Id</label>
				<input type="text" class="form-control" placeholder="Lookup Id" disabled="disabled" v-model="lookup.LookUpId">
			</div>
			<div class="form-group col-md-3">
				<label for="inputEmail4">Group</label>
				<input type="text" class="form-control" placeholder="Group Name" v-model="lookup.GroupName">
			</div>
			<div class="form-group col-md-3">
				<label for="inputEmail4">Class</label>
				<input type="text" class="form-control" id="inputEmail4" placeholder="Class" v-model="lookup.class">
			</div>
			<div class="form-group col-md-3">
				<label for="inputPassword4">Value</label>
				<input type="text" class="form-control" id="inputPassword4" placeholder="Value" v-model="lookup.value">
			</div>
	  	</div>
	  	<button v-on:click="reverseMessage" type='button' class="btn btn-primary">{{ lookup.LookUpId ? 'Update' : 'Add New' }}</button>
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
					<div class="col col-sm-5 col-5"><b>Group Name:</b> {{ todo.GroupName }}</div>
					<div class="col col-sm-5 col-5"><b>Class:</b> {{ todo.class }}</div>
					<div class="col col-sm-2 col-2">
						<button v-on:click="EditItem(todo);" class="btn btn-primary rounded btn-sm ">
							Edit
						</button>
					</div>
				</div>
				<div class="row">
					<div class="col col-md-12 col-lg-12">
						<b>Value:</b> {{ todo.value }}
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
			lookup:{class:null, value:null, GroupName: null, LookUpId: null},
			listing:[]
	  	},
		beforeMount(){
			this.Listing()
		},
	  methods: {
	  	ClearData: function () {
	  		var self = this;
	  		if (self.lookup) {	  			
		  		self.lookup.LookUpId = null;
	        	self.lookup.value = null;
	  		}
	  	},
	  	EditItem: function (objlist) {
	  		this.lookup = objlist;
	  	},
	  	Listing: function () {
			var self = this;
			$.ajax({
	            url: GlobalConfig.RemoteUrl + 'admin/lookup_action.php',
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
		reverseMessage: function () {
		  // this.message = this.message.split('').reverse().join('')
		  	var self = this;
		  	this.lookup.action = 'insert';
		  	$.ajax({
	            url: GlobalConfig.RemoteUrl + 'admin/lookup_action.php',
	            type: 'POST',
	            dataType: "text",
	            data: this.lookup,
	            success: function (data) {
	                self.message = data;
	                self.lookup.LookUpId = null;
	                self.lookup.value = null;
	                self.Listing();
	                setTimeout(function() {
						self.message = '';
	                }, 3000);
	            },
	            error: function (error) {
	                console.log(error);
	            }
	        });	
			 //this.$http.post('./admin/lookup_action.php', this.lookup).then((response) => {  
			 //this.$http.get('../about.php', this.lookup).then((response) => {
			 	//this.message = response.data;
			 //});
		}
	  }
	})
});
</script>
</html> 