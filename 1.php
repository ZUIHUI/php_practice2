<?php
	setcookie("a","",time()-86400);
?>
<html>
<head>
</head>
<body>
<center>
	<form method="POST" action="2.php">
		<input type="text" name="text" maxlength="5"><br /><br />
		<input type="submit"><br /><br />
		<input type="reset"><br /><br />
	</form>
</body>
</html>