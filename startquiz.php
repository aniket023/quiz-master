<?php
session_start();
	error_reporting(E_ERROR | E_PARSE);

   if( isset( $_SESSION['ses_usnm'] ) )
   {
      $unm = $_SESSION['ses_usnm'] ;
	  $_SESSION['ses_counter']+=1;
	  $counter=$_SESSION['ses_counter'];
	  $score=$_SESSION['ses_score'];
	  $wans=$_SESSION['ses_wans'];
	  $lid=$_SESSION['ses_lid'];
	  $row="";
	  $rs="";
		echo "<html><head><style rel='stylesheet' type='text/css'>
		table{
				position:fixed;
				top:30%;
				left:27%;
				background-color:#1e90ff;
				table-layout: fixed;
				font-size: 30px;
				color:white;
				text-shadow:2px 2px 5px #00688b;

		}
		input[type=button], input[type=submit]{

			border: none;
			color: white;
			padding: 12px 28px;
			text-decoration: none;
			margin: 4px 2px;
			cursor: pointer;
			font-size: 20px;
			font-family: Verdana;
		}
		h1{
			padding-top:30px;
			font-size: 60px;
			color:#4d4d4d;
			text-shadow:2px 2px 5px #adadad;
		}
		#i2{
			font-size: 15  px;
		}
		#i1{
			position:fixed;
			top:24.5%;
			left:23%;
			font-size: 35px;
			font-weight: bold;
			text-shadow:2px 2px 5px #adadad;
		}
		#i3{
			padding-left:30px;
      font-size: 15px;
		}
		#i4{
			padding-left:30px;
      font-size: 15px;
		}
		#i5{
			padding-left:30px;
      font-size: 15px;
		}
		#i6{
			padding-left:30px;
      font-size: 15px;
		}
		#i7{
			padding-left:230px;
      font-size: 15px;
		}
		.big{
			width: 1.5em;
			height: 1.5em;
		}
		img{
			position:fixed;
			left:21.5%;
			top:22%;
			height:11%;
			width:5.5%;
		}
		</style>";
		echo "<script type='text/javascript' src='timetest.js'></script></head>";
		$servername = "localhost";
		$username = "root";
		$password = "";
		$conn="";
		$ans="";
		if ($counter==1)
		{
			$ans="";

			echo "<body><script>fsfunction();</script>";
		}
		else
		{
			if (isset($_POST['opt'])==true)
				$ans=$_POST['opt'];
			echo "<body>";
		}
		if ((strcasecmp($ans,$wans) == 0) && ($counter > 1))
		{
			$score= $score + 1;
			$_SESSION['ses_score']=$score;
		}
		if ($counter >10)
		{
			header('Location:finish.php');
		}
		else
		{
		echo "<h1 align='center'>Welcome " . $unm . "</h1>";
		include 'timertest.html';
		try {
			$conn = new PDO("mysql:host=$servername;dbname=quiz", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$rn= mt_rand(1,2);
      	$rnd = mt_rand(26,50);
        if ($counter<=5) {
          $sql="select * from qbank where qid=".$rn;
          echo "<h2 align='center'>Category: Aptitude</h2>";
        }
        else{
        $sql="select * from qbank where qid=".$rnd;
          echo "<h2 align='center'>Category: Reasoning</h2>";
        }
			$rs = $conn->query($sql);
			$c=count($rs);
			$row = $rs->fetch(PDO::FETCH_BOTH);
			if ($c >= 1)
			{
			      $_SESSION['ses_wans']=$row['crrct'];
			         echo "<div id=i1>$counter.</div>";
			            echo "
			               <img src='ownerIQ-Q.png'>
			                  <table align='center' width='50%' height='50%'>
			                     <form name='qfrm' method='post' action='startquiz.php'>
			                        <tr><th><div id='i2'>$row[que]</div></th></tr>
			                        <tr><td><div id='i3'><b>Option A.</b> <input type='radio' value='$row[opta]' name='opt' class='big'>$row[opta]</div></td></tr>
			                        <tr><td><div id='i4'><b>Option B.</b> <input type='radio' value='$row[optb]' name='opt' class='big'>$row[optb]</div></td></tr>
			                        <tr><td><div id='i5'><b>Option C.</b> <input type='radio' value='$row[optc]' name='opt' class='big'>$row[optc]</div></td></tr>
			                        <tr><td><div id='i6'><b>Option D.</b> <input type='radio' value='$row[optd]' name='opt' class='big'>$row[optd]</div></td></tr>";
			                           if ($counter >= 10)
			                              {
			                                   echo "<tr><td><div id='i7'><input type='submit' name='nxt' value='Next' disabled style='background-color:#838b8b;'>";
			                                   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' value='Finish' style='background-color:	#551a8b'></div></td></tr>";
			                              }
			                           else
			                              {
			                                   echo "<tr><td><div id='i7'><input type='submit' name='nxt' value='Next' style='background-color:#551a8b'>";
			                                   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' value='Finish' disabled style='background-color:#838b8b;'></div></td></tr>";
			                               }
			                  echo "</table>";
			}
			else
			{
				header('Location:login.html');
			}
			}
			catch(PDOException $e)
				{
					echo "Connection failed: " . $e->getMessage();
				}
			finally
				{
				$conn=null;
				echo "</body></html>";
				}
		}
	}
	else
	{
		echo "<h1>Please Login First to View this Page</h1>";
	}
?>
