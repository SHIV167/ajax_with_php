<?php error_reporting( E_ALL ); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>HTML5 Validation with Ajax Form Submission</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<style type="text/css">
			body{
				color: #fff;
				background: #63738a;
				font-family: 'Roboto', sans-serif;
			}
			.form-control{
				height: 40px;
				box-shadow: none;
				color: #969fa4;
			}
			.form-control:focus{
				border-color: #5cb85c;
			}
			.form-control, .btn{        
				border-radius: 3px;
			}
			.signup-form{
				width: 400px;
				margin: 0 auto;
				padding: 75px 0;
			}
			.signup-form h2{
				color: #636363;
				margin: 0 0 15px;
				position: relative;
				text-align: center;
			}
			.signup-form h2:before, .signup-form h2:after{
				content: "";
				height: 2px;
				width: 30%;
				background: #d4d4d4;
				position: absolute;
				top: 50%;
				z-index: 2;
			}	
			.signup-form h2:before{
				left: 0;
			}
			.signup-form h2:after{
				right: 0;
			}
			.signup-form .hint-text{
				color: #999;
				margin-bottom: 30px;
				text-align: center;
			}
			.signup-form form{
				color: #999;
				border-radius: 3px;
				margin-bottom: 15px;
				background: #f2f3f7;
				box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
				padding: 30px;
			}
			.signup-form .form-group{
				margin-bottom: 20px;
			}
			
			.signup-form .btn{        
				font-size: 16px;
				font-weight: bold;		
				min-width: 140px;
				outline: none !important;
			}
			.signup-form .row div:first-child{
				padding-right: 10px;
			}
			.signup-form .row div:last-child{
				padding-left: 10px;
			}    	
			.signup-form a{
				color: #fff;
				text-decoration: underline;
			}
			.signup-form a:hover{
				text-decoration: none;
			}
			.signup-form form a{
				color: #5cb85c;
				text-decoration: none;
			}	
			.signup-form form a:hover{
				text-decoration: underline;
			}  
			#thank_you_msg{color:red;}
		</style>
	</head>
	<body>
		<div class="signup-form">
			<form method="post" id="contactForm" name="contactForm">
				<h2>Form</h2>
				<p class="hint-text">Create your account. It's free and only takes a minute.</p>
				<div class="form-group">
					<input type="name" class="form-control" name="name" placeholder="Name*" required>
				</div>
				<div class="form-group">
					<input type="username" class="form-control" name="username" placeholder="Username*" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="mobile" placeholder="Mobile*" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password*" required>
				</div>
				     
				<div class="form-group">
					<input type="submit" id="btn" class="btn btn-success btn-lg btn-block" value="Submit Now">
				</div>
				<div id="thank_you_msg"></div>
			</form>
		</div>
		<script>	
		jQuery('#contactForm').on('submit',function(e){
			jQuery('#btn').val('Please wait...');
			jQuery('#btn').attr('disabled',true);
			jQuery.ajax({
				url:'submit.php',
				type:'post',
				data:jQuery('#contactForm').serialize(),
				success:function(result){
					jQuery('#thank_you_msg').html('Thank you');
					jQuery('#contactForm')['0'].reset();
					jQuery('#btn').val('Submit Now');
					jQuery('#btn').attr('disabled',false);
				}
			});
			e.preventDefault();
		});
		</script>
	</body>
</html>