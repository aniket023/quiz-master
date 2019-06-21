<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=quiz", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully <br>";
		$uid = $_POST['unm'];
		$nm = $_POST['nm'];
		$pss = $_POST['pass'];
		$gen = $_POST['sx'];
		$em = $_POST['em'];
		$sql = "insert into users values('$nm','$gen','$em','$uid','$pss')";
		$conn->exec($sql);
		header('Location:login.html');
	 }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
