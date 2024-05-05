<?php
	// Database connection parameters
	//Database hosting
	$host = "127.0.0.1";
	// ports
	$port = "3306";
	// Database User Name
	$username = "root";
	// Database Password
	$password = "123456"; //Replace this one with your database password
	// Database name
	$dbname = "kaoshi";
	// character encoding
	$charset = "utf8";
	// dsn connection parameters
	$dsn = "mysql:dbname=$dbname;host=$host;port=$port;charset=$charset";

	try{
		$pdo = new PDO($dsn, $username, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    // Setting up a sql query to throw an exception if something goes wrong
		// Setting the database code
		$pdo->exec('set names utf8');
	} catch(PDOException $e){
		die("Connection Failed: ".$e->getMessage());
	}
?>
