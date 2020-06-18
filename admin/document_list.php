<!DOCTYPE html>
<html>
<?php include('../support/head.php'); ?>
<body>
<?php include('navigation.php'); ?>
<div class="container">
	<div id="document_list">
		<div class="row">
		    <div class="col col-sm-3" v-for="todo in todos">
		      <div class="card">
			      <img v-bind:src="todo.FolderName + '/' + todo.FileName" style="height: 100%;width: 100%; max-height: 150px;max-width: 150px;"/> 
				  <div class="card-body">
				    <span class="card-title">
				    	{{ todo.OriginalName }}
					</span>
				    <!-- 
				    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				    
				 -->
				 	<button v-on:click="DeleteItem(todo);" class="btn btn-danger rounded btn-sm ">
						Delete
					</button>
				  </div>
				</div>
		 
		    </div>
	  	</div>
	</div>
</div>
</body>
<?php include('../support/scripts.php'); ?>
<script>
$(function(){ 
	var app = new Vue({
	  el: '#document_list',
	  data: {
		todos: []
	  },
	  methods: {
		GetData: function () {
		  // this.message = this.message.split('').reverse().join('')
			  	var self = this;
			  	$.ajax({
		            url: GlobalConfig.RemoteUrl + 'admin/document_action.php',
		            type: 'POST',
		            //dataType: "text",
		            data: { action: 'Viewer' },
	             	success: function (data) {
		                self.todos = JSON.parse(data);
		            },
		            error: function (error) {
		                console.log(error);
		            }
		        });
			},
		  	DeleteItem: function (item) {
			  	var self = this;			  	
			  	$.ajax({
		            url: GlobalConfig.RemoteUrl + 'admin/document_action.php',
		            type: 'POST',
		            //dataType: "text",
		            data: { action: 'Delete', DocumentId: item.DocumentId },
		         	success: function (data) {
		         		if (data == "Deleted successfully") {
		         			self.GetData();
		         		} else {
		         			alert(data);
		         		}
		            },
		            error: function (error) {
		                console.log(error);
		            }
		        });	  		
	  		}
	  	},
   		beforeMount(){
    		this.GetData()
 		}
	})
});
</script>
</html> 