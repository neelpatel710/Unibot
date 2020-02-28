<?php 
require 'index.php';
?>
<!DOCTYPE html>
<html>
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="css/combined.css">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,300,700' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie8-and-down.css" />
		<![endif]-->
		<!--[if lte IE 8]>
		<link rel="stylesheet" type="text/css" href="css/ie8-and-down.css" />
		<![endif]-->
		<!--[if IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie9.css">
		<![endif]-->
		<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="css/ie7.css">
		<![endif]-->
		<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="css/ie6.css">
		<![endif]-->
		<title>Copyscape - Log In</title>
		<style><!--
			.login_form {margin:110px auto 20px auto; border: 1px solid #ddd; padding: 10px 50px 10px 60px; width:280px;}
			.login_form h2 {color:#333; font-size:20px; font-weight:400; margin-top:25px; margin-bottom:10px;}
			.login_form form {margin:0; padding:0; margin-top:20px;}
			.login_form input {margin-bottom:10px;}
			.login_form input[type="text"], .login_form input[type="password"] {float:left; width: 160px;}
			.login_form input[type="checkbox"] {float:left;}
			.login_form .fieldlabel {float:left; text-align:left; width:90px; padding-top:2px; clear:both;}
			.login_form .checklabel {float:left; padding:3px 20px 2px 4px; line-height:20px;}
			.login_form p {clear:both; margin:0 0 8px 0;}
			.login_form .buttons {clear:both; padding-top:10px; text-align:center;}
			.login_form .button {width:70px; height:28px;}
			.forgot a {color:#999;}
			.signupfor {color:#064F9C; margin-top:10px;}
			.signupfor a {text-decoration:underline;}
		--></style>
	</head>
	
	<body onload="document.forms.login.login_username.focus()">
		<div class="container_12">
			

			<div id="logo_small">
				<a href="./"><img src="img/copyscape-logo-small.png" alt="Copyscape"></a>
			</div>


			<div id="nav">
				<ul>
					<li>
						<a class="home_icon" href="./">Home</a>
					</li>
					<li>
						<a href="about.php">About</a>
						<ul>
							<li>
								<a href="about.php">About Copyscape</a>
							</li>
							<li>
								<a href="press.php">Press</a>
							</li>
							<li>
								<a href="testimonials.php">Testimonials</a>
							</li>
							<li>
								<a href="terms.php">Terms of Use</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="products.php">Products</a>
						<ul>
							<li>
								<a href="premium.php">Copyscape Premium</a>
							</li>
							<li>
								<a href="api-guide.php">Premium API</a>
							</li>
							<li>
								<a href="copysentry.php">Copysentry</a>
							</li>
							<li>
								<a href="compare.php">Free Comparison Tool</a>
							</li>
							<li>
								<a href="banners.php">Free Plagiarism Banners</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="plagiarism.php">Plagiarism</a>
						<ul>
							<li>
								<a href="plagiarism.php">About Plagiarism</a>
							</li>
							<li>
								<a href="prevent.php">Preventing Plagiarism</a>
							</li>
							<li>
								<a href="respond.php">Responding to Plagiarism</a>
							</li>
							<li>
								<a href="resources.php">Online Resources</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="faqs.php">Help</a>
						<ul>
							<li>
								<a href="faqs.php">FAQs</a>
							</li>
							<li>
								<a href="forum.php">Forum</a>
							</li>
							<li>
								<a href="contact.php">Contact Us</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="signup.php?pro=1">Sign&nbsp;up</a>
						<ul>
							<li>
								<a href="signup.php?pro=1">Copyscape Premium</a>
							</li>
							<li>
								<a href="signup.php?pro=0">Copysentry</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="login.php" id="login">Log&nbsp;in</a>
					</li>

				</ul>
			</div>
			
			<div class="clear"></div>
			
			<div class="login_form">
			
				<h2>Log in</h2>
				
				<form method="POST" name="login" action="/login.php">
					
										
					<label class="fieldlabel">Username:</label>
					<input name="login_username" type="text" value="">
					

					<label class="fieldlabel">Password:</label>
					<input name="login_password" type="password">
					

					<div class="buttons">
						

						<input name="login_remember" id="remember" type="checkbox" value="1" >
						<label class="checklabel" for="remember">Log me in automatically</label>

						<input type="submit" name="log_in" class="button" value="Log in">

						
					</div>

				</form>
				
			</div>
			

			<p class="forgot"><a href="login.php?forgot=1">I forgot my username or password</a></p>

			<p class="signupfor">Sign up for <a href="signup.php?pro=1">Premium</a> or <a href="signup.php?pro=0">Copysentry</a></p>

			
			
			<div class="clear"></div>
			
			<div id="footer">
				<p>
					Copyscape &copy; 2019 Indigo Stream Technologies, providers of <a href="http://www.gigaalert.com/">Giga Alert</a>
					and <a href="http://www.siteliner.com/">Siteliner</a>.
					All rights reserved.
					<a href="terms.php">Terms of Use.</a>
				</p>
			</div>
			
		</div>
		
	</body>
</html>

