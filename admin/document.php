<!DOCTYPE html>
<html>
<?php include('../support/head.php'); ?>
<body>
<?php include('navigation.php'); ?>
<div class="container">
	<!-- 
	<form action="http://rvtourandtravel.com/admin/upload.php" method="post" enctype="multipart/form-data">
	  <div class="form-group">
		<label for="exampleFormControlInput1">Select image to upload:</label>
		<input type="file" name="fileToUpload" id="fileToUpload" class='form-control'>
	  </div>
	  <input type="submit" value="Upload Image" name="submit" class='btn btn-primary'>
	</form>
 	-->
	<div id='app'>
		<div>
	   		<input type="file" id="file" ref="file" />
	   		<button class='btn btn-primary' type="button" @click='uploadFile()' >Upload file</button>
	   		<h4>{{message}}</h4>
		</div>
		<div class="row">
			<div v-for="img in listing" class="col col-3">				
				<img v-bind:src="img.src" class="img-fluid img-thumbnail" >				
			</div>
		</div>
	</div>	
</div>
</body>
<?php include('../support/scripts.php'); ?>
<script>
$(function() { 
	var router = new VueRouter({
	    mode: 'history',
	    routes: []
	});
	var app = new Vue({
		router,
	  el: '#app',
	  data: {
			message: '',
			lookup:{class:null, value:null, GroupName: null, LookUpId: null},
			listing:[]
	  	},
		beforeMount(){
			this.Listing()
			// this.listing.push({
			// 	src:'uploads/gallery/5decfd3152d7f/5dee86174aa5d.png'
			// })
			// alert(this.$route.query.folderpath)
		},
	  	methods: {
			uploadFile: function() {
				this.file = this.$refs.file.files[0];
				var that = this;
				let formData = new FormData();
				formData.append('fileToUpload', this.file);
				formData.append('folderpath', this.$route.query.folderpath);
				formData.append('isgallery', this.$route.query.isgallery);

				axios.post(GlobalConfig.RemoteUrl + '/admin/document_upload.php', formData,
				{
					headers: {
						'Content-Type': 'multipart/form-data'
					}
				})
				.then(function (response) {
					that.message = response.data;
					that.Listing();
					// if(!response.data){
				 // 		alert('File not uploaded.');
					// } else {
				 // 		alert('File uploaded successfully.');
					// }
				})
				.catch(function (error) {
					console.log(error);
				});
			},
			Listing: function () {
				if (!this.$route.query.folderpath) return false;
				var self = this;
				$.ajax({
		            url: GlobalConfig.RemoteUrl + 'admin/document_action.php',
		            type: 'POST',
		            dataType: "text",
		            data: {action: 'ImageView', FolderPath: this.$route.query.folderpath},
		            success: function (data) {
		                self.listing = JSON.parse(data);
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