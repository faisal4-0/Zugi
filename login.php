<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>LOGIN PAGE</h1>

<form action="" method="get">
	<label>EMAIL:</label>
	<input type="email" name="email" placeholder="Enter Your Email">
	<br>
	<br>
	<label>PASSWORD:</label>
	<input type="password" name="password" placeholder="Enter Your Password">
	<input type="submit" name="submit">
</form>

<?php

if(isset($_GET(['submit']))){

$email = $_GET['email'];
$password = $_GET['password'];

$query = "select * from user where email = '$email' and password = '$password'";
$run=mysqli_query($con,$query);
$rows=mysqli_num_rows($run);
if ($rows > 0) {
	

echo "<script>window.open('profile.php','_self');</script>";
}
else{
	echo "please check your email/password"
}

}

?>


</body>
</html>