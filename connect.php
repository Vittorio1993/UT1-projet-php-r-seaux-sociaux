<html>

	<head>

		<meta content="text/html; charset=utf-8" http-equiv="content-type" />
		<title>Connection</title>

	</head>
	<body>
		<?php
			//Connection à la Base de données.
			$name=$_GET["nom"];
			$password=$_GET["password"];
			require("fonctionutile.php");
			$connect=connectBD($name,$password);
				
		?>
	</body>
</html>