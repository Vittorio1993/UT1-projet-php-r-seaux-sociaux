<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Bienvenue</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

	<body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
	
	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" method ="GET" action="<?php print $_SERVER['PHP_SELF']?>" name="formconnexion"   onsubmit="return index();">
		        <h2 class="form-login-heading">Bienvenue</h2>
		        <div class="login-wrap">
		            <input type="email" name="txtmail" class="form-control" placeholder="Email" required autofocus>
		            <br>
		            <input type="password" name="motdepasse" class="form-control" placeholder=" Mot de passe">
		            <label class="checkbox">
		           
		            </label>
		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> Connexion</button>
				</form>
		            <hr>
		            
		            <div class="registration">
		                
		                <a class="" href="creationprofil.php">
		                    Première inscription
		                </a>
		            </div>
		
		        </div>
		
		          
	  	
	  	</div>
	  </div>

		<!-- js placed at the end of the document so the pages load faster -->
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!--BACKSTRETCH-->
		<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
		<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
		<script>
			$.backstretch("assets/img/login-bg.jpg", {speed: 500});
		</script>


			
			<?php 
				session_start();
				 
				if ( isset($_GET["txtmail"] ) )
				{
					if ( isset($_GET["txtmail"] ) )
					{
						$email=$_GET["txtmail"]; 
						$motdepasse=$_GET["motdepasse"];
						require("fonctionutile.php");
						$session=connectBD("root","root");
						
						//Vérification l'adresse mail et le mot de passe
								
						$veriflogin= controlelogin($session,$email);
						$verifpassword= password($session,$email,$motdepasse);
						if ($veriflogin==true)
						{
							if ($verifpassword==true)
							{
							
								$sql = "select m.IDM, m.NOMM, m.PRENOMM, m.PSEUDO, m.EMAIL, m.MOTDEPASSE, com.IDC, com.NOMC, p.NIVEAU 
										from membres m, posseder p, competences com 
										where m.IDM=p.IDM
										and p.IDC=com.IDC
										and m.EMAIL='".$email."'";
								$result=mysqli_query($session, $sql);
							
							
							
								if($result!==0)
								{
								
									$membre = mysqli_fetch_array($result);
									
									$_SESSION['idm']= $membre['IDM'];				
									$_SESSION['nomm']= $membre['NOMM'];
									$_SESSION['prenomm']= $membre['PRENOMM'];
									$_SESSION['pseudo']= $membre['PSEUDO'];
									$_SESSION['email']= $membre['EMAIL'];
									$_SESSION['motdepasse']= $membre['MOTDEPASSE'];	
									
								}
						
								//Retour à l’accueil
								echo "<script language='javascript' type='text/javascript'>" ;
							
								echo "window.location.href='accueil.php'";
						
								echo "</script>";
							}			
							else
							{
								echo '<p align=center><font color="white">Dommage le password n\'est pas le bon <br/></font></p>';
							}
						}
						else
						{
							echo '<p align=center><font color="white">Dommage l\'email n\'est pas le bon <br/>';
								
						}
					}
				}
			?>
				

	</body>
</html>			
			


