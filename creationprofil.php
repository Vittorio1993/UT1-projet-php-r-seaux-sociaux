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

    <title>Création de profil</title>

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

	<body onload="test()">

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
				  
					  <p class="centered"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></p>
					  <h5 class="centered">Inscription</h5>
						
					  
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
					 <!--Remplir des données personnels-->
					  
						<FORM method ="GET" action="enregistreinscription.php" name="formcreation">

							<table>

								<tr>
									<td> Nom : </td>
										
									<td> <p><input type="text" name="nom"></p> </td>
										
								</tr>
								
								<tr>
									<td> Prénom : </td>
										
									<td> <p><input type="text" name="prenom"> </p></td>
										
								</tr>
								
								<tr>
									<td> Pseudo  : </td>
										
									<td> <p><input type="text" name="pseudo"></p> </td>
										
								</tr>
								
								<tr>
									<td> Email : </td>
										
									<td> <p><input type="email" name="email"> </p></td>
										
								</tr>
									<td> Mot de passe : </td>
										
									<td> <p><input type="password" name="motdepasse"> </p></td>
										
								</tr>
								
								</tr>
									<td> Mot de passe confirmé : &nbsp&nbsp </td>
										
									<td> <p><input type="password" name="motdepasse1"> </p></td>
										
								</tr>

								<tr>
								
									<!--Au moins d'une compétence-->
								
									<td> Compétence 1 : (*) </td>
									<td>
										<p><SELECT name="competence1" size="1" id="xxx" required> 
											<OPTION value="100">JAVA</OPTION>
											<OPTION value="101">Pilotage-Projet</OPTION>
											<OPTION value="102">Oracle</OPTION>
											<OPTION value="103">Banque-Assurance</OPTION>
											<OPTION value="104">ETL</OPTION>
										</SELECT></p>
									</td>	
								</tr>
								
								<tr>
									<td> Niveau 1: (*) </td>
									<td>
										<p><SELECT name="niveau1" size="1" id="xxxx" required> *
											<OPTION value="DEBUTANT">DEBUTANT</OPTION>
											<OPTION value="JUNIOR">JUNIOR</OPTION>
											<OPTION value="CONFIRME">CONFIRME</OPTION>
											<OPTION value="EXPERT">EXPERT</OPTION>
										</SELECT></p>
									</td>	
								</tr>	

								<tr>
									<td> Compétence 2 : </td>
									<td>
										<p><SELECT name="competence2" size="1" id="xxxxx">
											<OPTION value="100">JAVA</OPTION>
											<OPTION value="101">Pilotage-Projet</OPTION>
											<OPTION value="102">Oracle</OPTION>
											<OPTION value="103">Banque-Assurance</OPTION>
											<OPTION value="104">ETL</OPTION>
										</SELECT></p>
									</td>	
								</tr>
								
								<tr>
									<td> Niveau 2: </td>
									<td>
										<p><SELECT name="niveau2" size="1" id="xxxxxx">
											<OPTION value="DEBUTANT">DEBUTANT</OPTION>
											<OPTION value="JUNIOR">JUNIOR</OPTION>
											<OPTION value="CONFIRME">CONFIRME</OPTION>
											<OPTION value="EXPERT">EXPERT</OPTION>
										</SELECT></p>
									</td>
										
								</tr>	
								<td> Compétence 3 : </td>
									<td>
										<p><SELECT name="competence3" size="1" id="xxxxxxx">
											<OPTION value="100">JAVA</OPTION>
											<OPTION value="101">Pilotage-Projet</OPTION>
											<OPTION value="102">Oracle</OPTION>
											<OPTION value="103">Banque-Assurance</OPTION>
											<OPTION value="104">ETL</OPTION>
										</SELECT></p>
									</td>	
								</tr>
								
								<tr>
									<td> Niveau 3: </td>
									<td>
										<p><SELECT name="niveau3" size="1" id="xxxxxxxx">
											<OPTION value="DEBUTANT">DEBUTANT</OPTION>
											<OPTION value="JUNIOR">JUNIOR</OPTION>
											<OPTION value="CONFIRME">CONFIRME</OPTION>
											<OPTION value="EXPERT">EXPERT</OPTION>
										</SELECT></p>
									</td>	
								</tr>					
							</table>
							<p> <input type="submit" value="Ok">  </p>


						</FORM>
				<script>  
				function test()  
				{  
					var x = document.getElementById("xxx");  
					x.selectedIndex = -1;
					var x = document.getElementById("xxxx");  
					x.selectedIndex = -1;
					var x = document.getElementById("xxxxx");  
					x.selectedIndex = -1;
					var x = document.getElementById("xxxxxx");  
					x.selectedIndex = -1;
					var x = document.getElementById("xxxxxxx");  
					x.selectedIndex = -1;
					var x = document.getElementById("xxxxxxxx");  
					x.selectedIndex = -1;
				}  
				</script>
		
					  </div><!-- /col-lg-9 END SECTION MIDDLE -->
					  
					  
		  <!-- **********************************************************************************************************************************************************
		  RIGHT SIDEBAR CONTENT
		  *********************************************************************************************************************************************************** -->                  
				
	  
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