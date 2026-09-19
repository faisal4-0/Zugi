<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="CSS/registration.css">
</head>
<body>

<h2>Sign Up</h2>

<form action="" method="post">

Name:
<br>
<input type="text" name="name" required>
<br>
<br>
Email:
<br>
<input type="email" name="email">
<br>
<br>
Password:
<br>
<input type="password" name="password">
<br>
<br>
Repeat Password:
<br>
<input type="password" name="re-password">
<br>
<br>
<input type="submit" name="submit" value="Register">


</form>

<?php

include('db.php');

if(isset($_POST['submit'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$query="insert into register(Name,Email,Password)values('$name','$email','$password')";
$run=mysqli_query($con,$query);

if($run){

  echo "your data is successfully inserted!"; 
}




}






?>

</body>
</html>