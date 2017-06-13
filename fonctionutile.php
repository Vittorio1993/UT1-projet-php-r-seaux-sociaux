<html>

	<head>

		<meta content="text/html; charset=utf-8" http-equiv="content-type" />
		<title>Connection</title>

	</head>
	<body>


		<?php
		
			//Connexion à la BD.
			
			function connectBD($login,$pwd)
			{
				$serveur='localhost';
				$nom_bd='projetsite';
				$con=mysqli_connect($serveur,$login,$pwd);

				if(!$con)
				{
					die('Could not connect: ' . mysql_error());
				}
				else
				{
					$db_selected=mysqli_select_db($con,$nom_bd);
					
					if ($db_selected)
					{
						return $con;
					}
					else
					{
						die ('Can\'t use : '.$nom_bd. mysql_error());
					}	
				}
			}

			//Vérification contrôle mail
					
			function controlelogin($session,$mail)
			{
		
				$sqllogin="select * from membres m where m.EMAIL='$mail'";
				$resultlogin = mysqli_query ($session, $sqllogin);
				$row=mysqli_num_rows($resultlogin);
				
					if($row!=0)
					{
						return true;
					}
					else
					{
						return false;	
					}	
			}
					
			//Vérification mot de passe
			
			function password($session,$mail,$motdepasse)
			{
				$sqlpsswrd="select * from membres m where m.EMAIL='$mail' and m.MOTDEPASSE='$motdepasse'";
				$resultpsswrd = mysqli_query ($session, $sqlpsswrd);
				$row=mysqli_num_rows($resultpsswrd);
				
				if($row!=0)
				{
					return true;
				}
				else
				{
					return false;	
				}	
			}


			//Email unique
			
			function emailunique($session,$email)
			{
				$sqlemail="select count(*) from membres
						where EMAIL=?";
				$ordreemail=mysqli_prepare($session,$sqlemail);
				mysqli_stmt_bind_param($ordreemail,"s",$email);
				mysqli_stmt_execute($ordreemail);
				mysqli_stmt_bind_result($ordreemail,$cpt);
				mysqli_stmt_fetch($ordreemail);
				
				if ($cpt==0)
				{
					return true;	
				}	
				else
				{
					return false;
				}
					
			}

			//Pseudo unique
			
			function pseudounique($session,$pseudo)
			{
				$sqlpseudo="select count(*) from membres
							where PSEUDO=?";
				$ordrepseudo=mysqli_prepare($session,$sqlpseudo);
				mysqli_stmt_bind_param($ordrepseudo,"s",$pseudo);
				mysqli_stmt_execute($ordrepseudo);
				mysqli_stmt_bind_result($ordrepseudo,$cpt);
				mysqli_stmt_fetch($ordrepseudo);
		
				if ($cpt==0)
				{
					return true;
				}
				else
				{
					return false;
				}
				
			}

			//Commentaire

			function a($codecommentaire)
			{
		
				$session=connectBD("root","root");
				$sqlaffichecommenter="select c2.CODECOM, m2.PSEUDO, c2.DATECOM, c2.CONTENUCOM, m1.PSEUDO as PSEUDOPERE 
									from commentaires c1, commentaires c2, membres m1, membres m2
									where c2.IDM=m2.IDM
									and c1.CODECOM=c2.CODECOMRE
									and c1.IDM=m1.IDM
									and c2.CODECOMRE='".$codecommentaire.
									"'order by DATECOM ASC";
									$resultaffichecommenter = mysqli_query ($session,$sqlaffichecommenter);
									
								while ($lingecommenter=mysqli_fetch_array($resultaffichecommenter))
								{
									echo "<h5><p>".$lingecommenter['PSEUDO']." a répondu à ".$lingecommenter['PSEUDOPERE'].
									" le ".$lingecommenter['DATECOM']." :</p></h6>";
									echo "<h6><p>".$lingecommenter['CONTENUCOM']."</p></h6>";
									
									//Apprecier 
									
									
									echo "<form method='GET' action='apprecierenregistre.php' >
									<input type='text' style='display:none' name='apprecier' value='".$lingecommenter['CODECOM']."'>
									<input type='image' src='assets/img/like.jpg'>
									</form>";
									$sqlnbapprecier="select m.PSEUDO
									from apprecier a, membres m
									where a.IDM=m.IDM
									and CODECOM='".$lingecommenter['CODECOM']."'";
						
									$resultatnbapprecier= mysqli_query ($session,$sqlnbapprecier);
								
									while ($lingenbapprecier=mysqli_fetch_array($resultatnbapprecier))
									{
										echo "<h6><p>".$lingenbapprecier["PSEUDO"]."</p></h6>";
									
									}
									
									echo "<form method='GET' action='commenter.php'>
									<input type='text' style='display:none' name='commenter' value='".$lingecommenter['CODECOM']."'>
									<input type='submit' value='commenter'>
									</form>";
									$table=select_sous_codecommentaire($codecommentaire);
								
									for($i=0;$i<count($table);$i++)
									{
									a($table[$i]);
									}

								}
			}

				//Sous commentaires.

				function select_sous_codecommentaire($codecommentaire)
				{
					$session=connectBD("root","root");
					$i=0;
					$sqlaffichecommenter="select CODECOM
										from commentaires
										where CODECOMRE='".$codecommentaire."'";
					$resultaffiche = mysqli_query ($session,$sqlaffichecommenter);
						
						while ($lingecommenter=mysqli_fetch_array($resultaffiche))
						{
							$list[$i]=$lingecommenter['CODECOM'];
							$i++;
						}
					return $list;
				}
		
		?>


	</body>
</html>