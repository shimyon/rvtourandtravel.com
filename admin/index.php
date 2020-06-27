<?php
	if (isset($_SESSION["login"])) {
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
		header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
		header('location: lookup.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
<?php include('../support/head.php'); ?>
<style type="text/css">
	/* Bordered form */
	
	/* Full-width inputs */
	input[type=text], input[type=password] {
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  box-sizing: border-box;
	}

	/* Set a style for all buttons */
	button {
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  cursor: pointer;
	  width: 100%;
	}

	/* Add a hover effect for buttons */
	button:hover {
	  opacity: 0.8;
	}

	/* Extra style for the cancel button (red) */
	.cancelbtn {
	  width: auto;
	  padding: 10px 18px;
	  background-color: #f44336;
	}

	/* Center the avatar image inside this container */
	.imgcontainer {
	  text-align: center;
	  margin: 24px 0 12px 0;
	}

	/* Avatar image */
	img.avatar {
	  width: 150px;
	  border-radius: 50%;
	}

	/* Add padding to containers */
	.container {
	  padding: 16px;
	}

	/* The "Forgot password" text */
	span.psw {
	  float: right;
	  padding-top: 16px;
	}

	/* Change styles for span and cancel button on extra small screens */
	@media screen and (max-width: 300px) {
	  span.psw {
	    display: block;
	    float: none;
	  }
	  .cancelbtn {
	    width: 100%;
	  }
	}

	#navbarsExample06 {
		display: none !important;
	}

	.navbar {
		display: none;
	}
</style>

<link rel="stylesheet" type="text/css" href="../css/util.css">
<link rel="stylesheet" type="text/css" href="../css/main_login.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<body>
<?php include('navigation.php'); ?>
<div id="app" class="container-login100">
	<div class="wrap-login100 p-b-160 p-t-50">
		<div class="login100-form validate-form">
			<span class="login100-form-title p-b-43">
			RV Tour and Travel
			</span>
			<div class="wrap-input100 rs1 validate-input" data-validate="Username is required">
				<input class="input100" type="text" name="username" v-on:keyup.enter="SignIn" v-model="username">
				<span class="label-input100">Username</span>
			</div>
			<div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
				<input class="input100" type="password" name="pass" v-on:keyup.enter="SignIn" v-model="password">
				<span class="label-input100">Password</span>
			</div>
			<div class="container-login100-form-btn">
				<button class="login100-form-btn" v-on:click="SignIn">
				Sign in
				</button>
			</div>
			<label v-show="novalid" style="display: none; color: #fff;font-size: large;margin: auto;">Invalid username or password</label>
		</div>
	</div>
</div>
</body>
<?php include('../support/scripts.php'); ?>
<script>
$(function() { 
	var app = new Vue({
	  	el: '#app',
	  	data: {
			username:'',
			password:'',
			novalid: true
	  	},
		beforeMount(){
			// this.Listing()
			this.novalid = false;
		},		
	  	methods: {
	  		SignIn: function() {
	  			if ((this.username == "ravi" || this.username == "admin")
	  				&&
	  				(this.password == "adminLive")) {
	  				window.location.assign("/admin/session.php");
	  			} 
	  			else
	  			{
	  				this.novalid = true;
	  				setTimeout(() => {
						this.novalid = false;
	  				}, 3000);
	  			}
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
		  	}
	  	}
	})
});
</script>
</html> 