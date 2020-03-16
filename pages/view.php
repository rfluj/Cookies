
<?php require_once '../configs/config.php' ?>

<?php
	// if (isset($_COOKIE['aref'])) {
	// 	echo "string";
	// 	echo $_COOKIE['aref'];
	// }
	$time = 86400 * 30 * 12;
	// setcookie("aref", "yes", time()+ $time, '/');
	// setcookie("user_name", "Guru99", time()+ 60,'/');
	// $_COOKIE['aref'] = 'yes';
	// setcookie('aref', 'yes', time()+(2147483647), '/');
	// echo $_COOKIE['aref'];

	

	$name   = 'user1';
	if (isset($_POST['exit'])) {
		if (isset($_COOKIE[$name])) {
			// echo "string";
			unset($_COOKIE[$name]);
			setcookie($name, False, time()-$time, '/');
		}
	}
	if (!isset($_COOKIE[$name])) {
		// echo "first time";
		$number = 1;
		setcookie($name, $number, time()+$time, '/');
		mysqli_query($db, "INSERT INTO users (number) VALUES ($number)");
		$_COOKIE[$name] = $number;
		// echo intval($_COOKIE[$name]);
		// setcookie('user', $number, time()+(600), '/');
	} else {
		// echo "string";
		$counter = $_COOKIE[$name];
		$counter += 1;
		setcookie($name, $counter, time()+$time, '/');
		$_COOKIE[$name] = $counter;
		// $n = $counter + 1;
		// echo $counter;
		// echo $_COOKIE['user'];
	}
?>

<html>
<head>
	<title>view</title>
</head>
<body>
	<?php
		$g= $_COOKIE[$name];
		// echo count($_COOKIE);
		echo "<h1>$g</h1>
		<br>
		<form action=","./view.php"," method=","post",">
			<input type=","submit"," name=","exit"," value=","exit",">
			<input type=","submit"," name=","refresh"," value=","refresh",">
		</form>";
	?>
</body>
</html>