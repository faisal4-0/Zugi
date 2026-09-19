<?php
include('db.php');

if(isset($_GET['id'])){

$id=$_GET['id'];

$query="delete from register where ID='$id'";
$run=mysqli_query($con,$query);

if($run){

	echo "<script>window.open('fetch.php','_self')</script>";
}





}


?>