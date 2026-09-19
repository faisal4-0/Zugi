<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="CSS/registration.css">
</head>
<body>

<h2>Registered Users</h2>

<table>
	
	<tr>

		<th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Edit</th>
		<th>Delete</th>
		<th>Change Password</th>


	</tr>
<?php
include('db.php');
$query="select * from register";
$run=mysqli_query($con,$query);
while($fetch=mysqli_fetch_array($run)){

$id=$fetch['ID'];
$name=$fetch['Name'];
$email=$fetch['Email'];
$password=$fetch['Password'];


echo "

<tr>
<td>$id</td>
<td>$name</td>
<td>$email</td>
<td>$password</td>
<td><a href='edit.php?id=$id'>Edit</a></td>
<td><a href='delete.php?id=$id'>Delete</a></td>
<td><a href='change_password.php?id=$id'>Change Password</a></td>




</tr>




";




}


?>




</table>



</body>
</html>