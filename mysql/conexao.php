<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	$username = "root";
	$password = "";
	$conn = new PDO('mysql:host=localhost;port=3306;dbname=', $username, $password);
	?>

	<?php
	$nome = $_POST['nome'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$sql = "INSERT INTO Users(name, user, password)
		VALUES('$nome', '$user', '$pass')";
	$query = $conn->prepare($sql);
	var_dump($query);
	$query->bindParam(':nome', $nome);
	$query->bindParam(':user', $user);
	$query->bindParam(':pass', $pass);
	$stmt = $query->execute();

	header('index.php');
	?>
</body>
</html>
