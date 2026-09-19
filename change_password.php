<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="CSS/registration.css">
</head>
<body>

<h2>Change Password</h2>

<?php

include('db.php');

if(isset($_GET['id'])){

$id=$_GET['id'];

?>

<form action="" method="post">

Current Password:
<br>
<input type="password" name="current_password">
<br>
<br>
New Password:
<br>
<input type="password" name="new_password">
<br>
<br>
Confirm Password:
<br>
<input type="password" name="confirm_password">
<br>
<br>
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="submit" name="submit" value="Change Password">

</form>

<?php

}

if(isset($_POST['submit'])){

$id=$_POST['id'];
$current_password=$_POST['current_password'];
$new_password=$_POST['new_password'];
$confirm_password=$_POST['confirm_password'];

$query="select * from register where ID='$id'";
$run=mysqli_query($con,$query);
$fetch=mysqli_fetch_array($run);

$password=$fetch['Password'];

if($current_password==$password){

	if($new_password==$confirm_password){

		$query1="update register set Password='$new_password' where ID='$id'";
		$run1=mysqli_query($con,$query1);

		if($run1){

			echo "<script>window.open('fetch.php','_self')</script>";
		}

	}else{

		echo "new password and confirm password not matched";
	}

}else{

	echo "current password is wrong";
}


}


?>




</body>
</html>