<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<body>
	<script type="text/javascript">
		var dt;
		dt=new Date();
		dt.setMinutes(dt.getMinutes()-25);
		document.cookie = "countname=0; expires="+dt+";";
	</script>

<?php
// remove all session variables
session_unset();
// destroy the session
session_destroy();
header('Location:login.html');
?>
</body>
</html>
