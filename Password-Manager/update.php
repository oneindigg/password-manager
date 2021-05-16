<?php 
	include 'include/header.php';
	$ID = $_GET['ID'];

	if ($_SERVER['REQUEST_METHOD']=="POST") {
		$app = $_POST['app'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "UPDATE passwords SET App = ?, Username= ? ,Password = ? where Sn = ?";
	$result = $obj->updateData($ID,$query,$app,$username,$password);

		if ($result==true) {
			header("location:index.php?dashboard=true&updated=true");
		}
	
	}
	
	$obj->editData($ID);
		

 ?>

