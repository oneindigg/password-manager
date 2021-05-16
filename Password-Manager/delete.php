<?php 
	include 'include/header.php';

	
		$id = $_GET['ID'];
		$query = "DELETE FROM passwords where Sn = ?";
		$obj->deleteData($id,$query);
		
		header("location:index.php?dashboard=true&deleted=true");
	
 ?>