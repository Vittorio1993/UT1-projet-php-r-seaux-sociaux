
<html>
	<head>
		<meta http-equiv="Content-Type"
		content="text/html; charset=UTF-8">
		<title> Commenter</title>
	</head>
	<body>   


		<?php
			require("fonctionutile.php");
			$session=connectBD("root","root");
			date_default_timezone_set('Europe/Paris');
			session_start();
		
			$localtime=date('y-m-d H:i:s',time());

			//Insertion du commentaire


			$sqlcommenter="insert into commentaires (DATECOM, CONTENUCOM, IDM, CODECOMRE)
							values (?,?,?,?)";
			$ordresqlcommenter=mysqli_prepare($session,$sqlcommenter);
			mysqli_stmt_bind_param($ordresqlcommenter,"ssss",$localtime,$_GET["commentaire"],$_SESSION['idm'],$_GET["comm"]);	
			mysqli_stmt_execute($ordresqlcommenter);
			
			// retour à l'accueil
			
			echo "<script language='javascript' type='text/javascript'>" ;
				
			echo "window.location.href='accueil.php'";
			
			echo "</script>";
		?>

				
	</body>

</html>