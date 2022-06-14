<?php


// $conn = new mysqli('localhost', 'root', '', 'db_print');

	$conn = new mysqli('localhost', 'root', '', 'payroll');
	
	if(!$conn){
		die("Error: Can't connect to database");
	}
?>