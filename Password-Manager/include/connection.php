<?php 

	session_start();
	
	$host		= 'localhost'; //server
	$dbUsername = 'root';	  // Database username
	$dbPassword = '';			// Database password
	$dbName     = 'passwordmanager';	// Database name


	try {
		$db = new PDO("mysql:host={$host}; dbname={$dbName}", $dbUsername, $dbPassword);

	} catch (Exception $e) {
		echo $e->getMessage();
	}

	$obj = new passwordManager($db);

 ?>