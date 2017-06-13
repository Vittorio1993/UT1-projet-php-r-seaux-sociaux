
<?php 
	session_start(); 
?>
<html>


	<head>
		<meta content="text/html; charset=utf-8" http-equiv="content-type" />
		<title>Enregistrement des modifications</title>
	</head>


	<body>

		<?php
			require("fonctionutile.php");
			$session=connectBD("root","root");
			
			//Modification des données personnelles.
			
			$nom=$_GET["nom"];
			$prenom=$_GET["prenom"];
			$pseudo=$_GET["pseudo"];
			$email=$_GET["email"];


			$sqlmembre="update membres set NOMM=?, PRENOMM=?, PSEUDO=?, EMAIL=?
					where IDM='".$_SESSION['idm']."'";
			$ordresqlmembre=mysqli_prepare($session,$sqlmembre);
			mysqli_stmt_bind_param($ordresqlmembre,"ssss",$nom,$prenom,$pseudo,$email);	
			mysqli_stmt_execute($ordresqlmembre);
					
			$_SESSION['nomm']= $nom;
			$_SESSION['prenomm']= $prenom;
			$_SESSION['pseudo']= $pseudo;
			$_SESSION['email']= $email;
			
			$sqlpossederdelete="delete from posseder where IDM ='".$_SESSION['idm']."'";
			mysqli_query ($session, $sqlpossederdelete);



			$nomc1=$_GET["competence1"];
			$niveau1=$_GET["niveau1"];


			$sqlidc1="select IDC 
					from competences
					where NOMC='".$nomc1."'";
			$resultatidc1=mysqli_query ($session,$sqlidc1);
			
			while($ligne1=mysqli_fetch_array($resultatidc1))
			{
				$idc1 =$ligne1['IDC'];
			}

			$sqlposseder1="insert into posseder(IDM,IDC,NIVEAU)
						values (?,?,?)";
			$ordresqlposseder1=mysqli_prepare($session,$sqlposseder1);
			mysqli_stmt_bind_param($ordresqlposseder1,"sss",$_SESSION['idm'],$idc1,$niveau1);	
			mysqli_stmt_execute($ordresqlposseder1);




			if (isset($_GET["competence2"]))
			{
				if(isset($_GET["niveau2"]))
				{
					$nomc2=$_GET["competence2"];
					$niveau2=$_GET["niveau2"];
				
					$sqlidc2="select IDC 
							from competences
							where NOMC='".$nomc2."'";
					$resultatidc2=mysqli_query ($session,$sqlidc2);
					
						while($ligne2=mysqli_fetch_array($resultatidc2))
						{
							$idc2 =$ligne2['IDC'];
						}
			
					$sqlposseder2="insert into posseder(IDM,IDC,NIVEAU)
					values (?,?,?)";
					$ordresqlposseder2=mysqli_prepare($session,$sqlposseder2);
					mysqli_stmt_bind_param($ordresqlposseder2,"sss",$_SESSION['idm'],$idc2,$niveau2);	
					mysqli_stmt_execute($ordresqlposseder2);
				}
			}

			if (isset($_GET["competence3"]))
			{
				if(isset($_GET["niveau3"]))
				{
					$nomc3=$_GET["competence3"];
					$niveau3=$_GET["niveau3"];
				
					$sqlidc3="select IDC 
							from competences
							where NOMC='".$nomc3."'";
					$resultatidc3=mysqli_query ($session,$sqlidc3);
					
						while($ligne3=mysqli_fetch_array($resultatidc3))
						{
							$idc3 =$ligne3['IDC'];
						}
			
					$sqlposseder3="insert into posseder(IDM,IDC,NIVEAU)
								values (?,?,?)";
					$ordresqlposseder3=mysqli_prepare($session,$sqlposseder3);
					mysqli_stmt_bind_param($ordresqlposseder3,"sss",$_SESSION['idm'],$idc3,$niveau3);	
					mysqli_stmt_execute($ordresqlposseder3);
				}
			}

				
				//retour sur la page profil.
					echo "<script language='javascript' type='text/javascript'>" ;
			
					echo "window.location.href='profil.php'";

					echo "</script>";

		?>

		<button id="Retour" onclick="location.href='profil.php'">Ok</button>
	</body>


</html>
	