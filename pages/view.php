
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


	$name   = 'why_ffg?';
	if (isset($_POST['exit'])) {
		if (isset($_COOKIE[$name])) {
			// echo "string";
			unset($_COOKIE[$name]);
			setcookie($name, False, time()-$time, '/');
		}
	}
	if (!isset($_COOKIE[$name])) {
		// echo "first time";
		mysqli_query($db, "INSERT INTO users (number) VALUES (1)");
		$query = mysqli_query($db, "SELECT * FROM users ORDER BY id DESC LIMIT 1");
		if ($query) {
			$row = $query->fetch_assoc();
			$id  = $row['id'];
		}
		// echo $id;
		$number = encrypt(strval($id), $key);
		setcookie($name, $number, time()+$time, '/');
		$_COOKIE[$name] = $number;
		// echo intval($_COOKIE[$name]);
		// setcookie('user', $number, time()+(600), '/');
	} else {
		// echo "string";
		$id    = intval(decrypt($_COOKIE[$name], $key));
		// echo $id;
		$query = mysqli_query($db, "SELECT * FROM users WHERE id='$id'");
		if ($query) {
			$row    = $query->fetch_assoc();
			$number = $row['number'];
			$number += 1;
			// echo $number;
			mysqli_query($db, "UPDATE users SET number='$number' WHERE id='$id'");
		}
		// $counter += 1;
		// setcookie($name, $counter, time()+$time, '/');
		// $_COOKIE[$name] = $counter;
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
		// $g= $_COOKIE[$name];
		// echo count($_COOKIE);
		// echo "<h1>$g</h1>
		// <br>
		// <form action=","./view.php"," method=","post",">
		// 	<input type=","submit"," name=","exit"," value=","exit",">
		// 	<input type=","submit"," name=","refresh"," value=","refresh",">
		// </form>";
		$id    = intval(decrypt($_COOKIE[$name], $key));
		$query = mysqli_query($db, "SELECT * FROM users WHERE id='$id'");
		if ($query) {
			$row    = $query->fetch_assoc();
			$number = $row['number'];
			echo "<h1>$number</h1>
			<br>
			<form action=","./view.php"," method=","post",">
			<input type=","submit"," name=","exit"," value=","exit",">
			<input type=","submit"," name=","refresh"," value=","refresh",">
			</form>";
		}
	?>
</body>
</html>