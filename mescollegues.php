<!DOCTYPE html>
<?php
	session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Mes collègues</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

	<body>

	  <section id="container" >
		  <!-- **********************************************************************************************************************************************************
		  TOP BAR CONTENT & NOTIFICATIONS
		  *********************************************************************************************************************************************************** -->
		  <!--header start-->
		  <header class="header black-bg">
				  <div class="sidebar-toggle-box">
					  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
				  </div>
				<!--logo start-->
				<a href="accueil.php" class="logo"><b>Association SIGE</b></a>
				<!--logo end-->
			   
				<div class="top-menu">
					<ul class="nav pull-right top-menu">
						<li><a class="logout" href="index.php">Déconnexion</a></li>
					</ul>
				</div>
			</header>
		  <!--header end-->
		  
		  <!-- **********************************************************************************************************************************************************
		  MAIN SIDEBAR MENU
		  *********************************************************************************************************************************************************** -->
			   <!--sidebar start-->
		  <aside>
			  <div id="sidebar"  class="nav-collapse ">
				  <!-- sidebar menu start-->
				  <ul class="sidebar-menu" id="nav-accordion">
				  
					  <p class="centered"><a href="profil.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
					  <?php
						echo "<h5 class='centered'>".$_SESSION['pseudo']."</h5>";
					  ?>
						
					  <li class="mt">
						  <a class="active" href="accueil.php">
							  <i class="fa fa-th"></i>
							  <span>Accueil</span>
						  </a>
					  </li>
					  

					  <li class="sub-menu">
						  <a href="javascript:;" >
							  <i class="fa fa-cogs"></i>
							  <span>Mon compte</span>
						  </a>
						  <ul class="sub">
							  <li><a  href="mescommantaires.php">Mes commentaires</a></li>
							  <li><a  href="profil.php">Mon profil</a></li>
						  </ul>
					  </li>
					  
					  <li class="mt">
						  <a class="active" href="mescollegues.php">
							  <i class="fa fa-tasks"></i>
							  <span>Rechercher un collègue</span>
						  </a>
					  </li>
				  </ul>
				  <!-- sidebar menu end-->
			  </div>
		  </aside>
		  <!--sidebar end-->
		  
		  <!-- **********************************************************************************************************************************************************
		  MAIN CONTENT
		  *********************************************************************************************************************************************************** -->
		  <!--main content start-->
		  <section id="main-content">
			  <section class="wrapper">

				  <div class="row">
					  <div class="col-lg-9 main-chart">
							
						<form method ="GET" action="mescollegues.php" name="formcherche">
							<p><input size="50" type="txtbox" name="cherche" placeholder="chercher par pseudo, email ou compétence">
							<input type="submit" value="GO"></p>
						</form>
						<?php
							require("fonctionutile.php");
							$session=connectBD("root","root");

							//rechercher un membre, un pseudo ou un mail
							if(isset($_GET["cherche"]))
							{
								$motcherche=$_GET["cherche"];
								$sqlcherche="select distinct m.PSEUDO, m.IDM, m.EMAIL
											from membres m, posseder p, competences com
											where p.IDC=com.IDC
											and m.IDM=p.IDM
											and (m.PSEUDO='".$motcherche."'or m.EMAIL='".$motcherche."'or com.NOMC='".$motcherche."')	
											union
											select distinct m.PSEUDO, m.IDM, m.EMAIL
											from membres m, posseder p, competences com, recommander r
											where r.IDC=com.IDC 
											and r.IDMRE=m.IDM
											and (m.PSEUDO='".$motcherche."'or m.EMAIL='".$motcherche."'or com.NOMC='".$motcherche."')";	
							
								$resultatcherche=mysqli_query ($session, $sqlcherche);	
								$i=1;
								
								if ($resultatcherche!==0)
								{
									while ($linge=mysqli_fetch_array($resultatcherche))
									{
										
										echo "<P><form method='GET' action='profilconsulter.php' name='".$i."'><br>".$linge["PSEUDO"].
										"<input type='txtbox' style='display:none' value='".$linge["EMAIL"]."' name='consulter' >   
										<input type='submit' value='consulter'></p></form>";
										$i=$i+1;
										$sqlidc="select IDC
												from competences 	
												where NOMC='".$motcherche."'";
										$resultatidc=mysqli_query ($session, $sqlidc);
										
											while ($lingeidc=mysqli_fetch_array($resultatidc))	
											{									
												$sqlafficherecommande="select m.PSEUDO
																		from recommander r, membres m
																		where r.IDM=m.IDM
																		and r.IDC='".$lingeidc["IDC"]."'
																		and r.IDMRE='".$linge["IDM"]."'";
															 
												$resultatafficherecommande=mysqli_query ($session,$sqlafficherecommande);
											
												while ($lingeaffiche=mysqli_fetch_array($resultatafficherecommande))
												{	
													echo $lingeaffiche["PSEUDO"]." ";
												}
												
												if (mysqli_num_rows($resultatafficherecommande)!==0)
												{
													if (mysqli_num_rows($resultatafficherecommande)==1)
													{
														echo " a recommandé cette personne pour cette compétence.";
													}
													else
													{
														echo " ont recommandé cette personne pour cette compétence.";
													}
												}
											}
									}
								}
							}
						?>	
					  </div><!-- /col-lg-9 END SECTION MIDDLE -->
					  
					  
		  <!-- **********************************************************************************************************************************************************
		  RIGHT SIDEBAR CONTENT
		  *********************************************************************************************************************************************************** -->                  
					 <div class="col-lg-3 ds">
						
							<h3>Liste des collègues suivis</h3>
							<?php
								
								//Afficher tous les collègues suivis
								
								$sqlaffichecollegue="select m.PSEUDO, m.EMAIL
												from ajout_membre a, membres m
												where a.IDMDE=m.IDM
												and a.IDM='".$_SESSION['idm']."'";			
								$resultataffichecollegue=mysqli_query ($session, $sqlaffichecollegue);
								
								while ($lingeaffichecollegue=mysqli_fetch_array($resultataffichecollegue))
								{
									echo 
									"<div class='desc'>
										<div class='thumb'>
										<img class='img-circle' src='assets/img/ui-danro.jpg' width='35px' height='35px' align=''>
										</div>
										<div class='details'>
											<p>".$lingeaffichecollegue["PSEUDO"]."<br/>
											   <muted><a href=mailto:".$lingeaffichecollegue["EMAIL"].">".$lingeaffichecollegue["EMAIL"]."</a></muted>
											</p>
										</div>
									</div>";
								}
							?>
						  

							<!-- CALENDAR-->
							<div id="calendar" class="mb">
								<div class="panel green-panel no-margin">
									<div class="panel-body">
										<div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
											<div class="arrow"></div>
											<h3 class="popover-title" style="disadding: none;"></h3>
											<div id="date-popover-content" class="popover-content"></div>
										</div>
										<div id="my-calendar"></div>
									</div>
								</div>
							</div><!-- / calendar -->
						  
					  </div><!-- /col-lg-3 -->
				  </div><! --/row -->
			  </section>
		  </section>

		  <!--main content end-->
		  <!--footer start-->
		  <footer class="site-footer">
			  <div class="text-center">
				  Powered by Huakai Zhang and Jean-Baptiste Candelle
				  <a href="accueil.php" class="go-top">
					  <i class="fa fa-angle-up"></i>
				  </a>
			  </div>
		  </footer>
		  <!--footer end-->
	  </section>

		<!-- js placed at the end of the document so the pages load faster -->
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/jquery-1.8.3.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="assets/js/jquery.scrollTo.min.js"></script>
		<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
		<script src="assets/js/jquery.sparkline.js"></script>


		<!--common script for all pages-->
		<script src="assets/js/common-scripts.js"></script>
		
		<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
		<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

		<!--script for this page-->
		<script src="assets/js/sparkline-chart.js"></script>    
		<script src="assets/js/zabuto_calendar.js"></script>	
		
		<script type="application/javascript">
			$(document).ready(function () {
				$("#date-popover").popover({html: true, trigger: "manual"});
				$("#date-popover").hide();
				$("#date-popover").click(function (e) {
					$(this).hide();
				});
			
				$("#my-calendar").zabuto_calendar({
					action: function () {
						return myDateFunction(this.id, false);
					},
					action_nav: function () {
						return myNavFunction(this.id);
					},
					ajax: {
						url: "show_data.php?action=1",
						modal: true
					},
					
				});
			});
			
			
			function myNavFunction(id) {
				$("#date-popover").hide();
				var nav = $("#" + id).data("navigation");
				var to = $("#" + id).data("to");
				console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
			}
		</script>
	  

	</body>
</html>