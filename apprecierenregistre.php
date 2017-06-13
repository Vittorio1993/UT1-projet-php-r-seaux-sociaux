
<html>
	<head>
		<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">
		<title> Apprécier</title>
	</head>
	<body>   

	
		<?php

			require("fonctionutile.php");
			$session=connectBD("root","root");

			session_start();
			
			//Apprécier un commentaire.

			$sqlapprecier="insert into apprecier (CODECOM, IDM)
							values (?,?)";
			$ordresqlapprecier=mysqli_prepare($session,$sqlapprecier);
			mysqli_stmt_bind_param($ordresqlapprecier,"ss",$_GET["apprecier"],$_SESSION['idm']);	
			mysqli_stmt_execute($ordresqlapprecier);
		
			echo "<script language='javascript' type='text/javascript'>" ;
				
			echo "window.location.href='accueil.php'";
			
			echo "</script>"
		?>

				
	</body>

</html>
	
		
		
		