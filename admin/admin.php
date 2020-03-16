
<?php require_once '../configs/config.php' ?>

<html>
<head>
	<title>admin</title>
</head>
<body>
	<?php
		$query  = mysqli_query($db, "SELECT * FROM users");
		$number = mysqli_num_rows($query);
		echo "<span>number users : $number</span>";
	?>
</body>
</html>
