<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="CSS/registration.css">
</head>
<body>

<h2>Edit User</h2>

<?php

include('db.php');
if(isset($_GET['id'])){

$id=$_GET['id'];


$query="select * from register where ID='$id'";
$run=mysqli_query($con,$query);
while($fetch=mysqli_fetch_array($run)){

$name=$fetch['Name'];
$email=$fetch['Email'];
$password=$fetch['Password'];


?>	

<form action="" method="post">
	
<input type="text" name="name" value="<?php echo $name ?>">
<br>
<br>
<input type="text" name="email" value="<?php echo $email ?>">
<br>
<br>	
<input type="text" name="password" value="<?php echo $password ?>">	
<br>
<br>
<input type="submit" name="submit">



</form>


<?php

}
}


?>

<?php

if(isset($_POST['submit'])){


$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];


$query1 ="update register set Name='$name',Email='$email',Password='$password' where ID='$id'";

$run1=mysqli_query($con,$query1);
if($run1){

echo "<script>window.open('fetch.php','_self')</script>";

}


}





?>




</body>
</html>