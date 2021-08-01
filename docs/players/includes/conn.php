<?php
	$db_username = 'crud';
	$db_password = 'crud';
	$conn = new PDO( 'mysql:host=localhost;dbname=crud', $db_username, $db_password );
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>