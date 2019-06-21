<?php
	session_start();
	 if( isset( $_SESSION['ses_usnm'] ) )
   {
      $unm = $_SESSION['ses_usnm'] ;
	  $score=$_SESSION['ses_score'];
   }

		echo "<html><body><h1 align='center' style='padding-top:30px;
			font-size: 60px;
			color:#4d4d4d;
			text-shadow:2px 2px #adadad;
			margin-top:50px;'>$unm your score is $score</h1>
			<a href='logout.php' style='position:fixed;
			right:10;
			top: 20;
			text-align:center;
			padding: 8px 8px 8px 8px;
			background-color:#4682b4;
			font-size: 30px;
			color: white;
			text-decoration: none;' >Log Out</a><br>
			</body></html>";

?>
