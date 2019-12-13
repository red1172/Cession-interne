<?php
	if(!isset($_COOKIE["login"]))
{
    session_start();  
	if (!isset($_SESSION['login'])) { 
   header ('Location:index.php'); 
   exit();  
}

} 



?> 
<!doctype html>
<html lang="fr">
<head>
        <meta charset="UTF-8" />
        <title>::ARDIS::CESSION INTERNE</title>
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
			<!--[if lt IE 8]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
		<link rel="shortcut icon" href="images/animated_favicon.gif">
		<script type ="text/javascript" src="js/jquery.js"></script> 
		<script type ="text/javascript" src="js/search.js"></script> 		
		<script type ="text/javascript" src="js/jquery.js"></script> 
	<script language="JavaScript">
<!--
function donner_focus(chp)
{
document.getElementById(chp).focus();
}
</script>
		
</head>
<body onload="donner_focus('recherche')">

	
<div id="header">
	  
</div>
	<div id="nav_profil">
				<?php
			if(isset($_COOKIE["login"])){
				$user = $_COOKIE["login"];
			}
			else{
				$user = $_SESSION['login']; 
			}	
			
			 ?>
			 <ul>
				<li><a class="current" href="#"><?php echo strtoupper($user) ?><img src="images/fleche_bas.png" alt="fleche_bas" border="0" class="image_ie" /></a>
					<ul>
						<li><a href="profil.php">Profil</a></li>
						<li><a href="modif_pass.php">Mot de passe</a></li>
						<li><a href="deconnexion.php">Déconnexion</a></li>
					</ul>
				</li>
			</ul>	
	</div>
	<div id="nav">
		<ul>
		<li><a href="" class="current">Accueil</a></li>
		<li id="menu_ie"><a href="consultation.php" >Consultation</a></li>
		<li id="menu_ie"><a href="#" >Intermagasins</a></li>
		<li><a href="index.php" >Quitter</a></li>		
		</ul>
	</div>	
	<div id="logo">	
		<a href="index.php"></a>	  
	</div>	
<div id="contner">	
	
</div>	
</body>
</html>
	