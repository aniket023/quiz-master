<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn="";
	$lid=$_SESSION['ses_lid'];
	$unm = $_SESSION['ses_usnm'];
	$score=$_SESSION['ses_score'];
	try {
		$conn = new PDO("mysql:host=$servername;dbname=quiz", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//$dt = date("Y/m/d");
		$sql = "insert into result value ('$lid','$unm',$score)";
		$conn->exec($sql);
		}
		catch(PDOException $e)
			{
				echo "Connection failed: " . $e->getMessage();
			}
?>
<html>
<head>
	<style rel="stylesheet">
		h1{
			color:#4d4d4d;
			text-align: center;
			padding-top:30px;
			font-size: 60px;
			color:#4d4d4d;
			text-shadow:2px 2px #adadad;
		}
		div{
			position:fixed;
			left:30%;
			right:30%;
			top:40%;
			width:500px;
			height:50px;
			text-align:center;
			padding: 8px 8px 8px 8px;
			background-color:#4682b4;
			font-size: 40px;
			color: white;
			text-decoration: none;
			transition: width 1s, height 1s;
		}

		div:hover{

			text-align:center;padding: 8px 8px 8px 8px;
			width:600px;
			height:150px;
			font-size: 60px;
			background-color:#36648b;

		}

		div{transition-timing-function: ease;}

		#i2{
			position:fixed;
			right:10;
			top: 20;
			text-align:center;
			padding: 8px 8px 8px 8px;
			background-color:#4682b4;
			font-size: 30px;
			color: white;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<h1>You have Completed the Quiz</h1>
	<a href="score.php"><div>Click here to check your score</div></a><br>
	<a href="logout.php" id="i2">Log Out</a><br>
</body>

</html>
