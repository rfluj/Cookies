<?php
	$db = mysqli_connect('localhost', 'rfluj', '772009', 'cookie');

	if (!$db) {
		echo mysqli_connect_error();
	}

	ini_set('display_errors', 1);
	error_reporting(E_ALL);

?>