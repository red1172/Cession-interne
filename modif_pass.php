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
        <title>Cession interne</title>
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
		<link rel="stylesheet" type="text/css" media="print" href="css/print.css" />
		<link rel="shortcut icon" href="images/animated_favicon.gif">
		<script type ="text/javascript" src="js/jquery.js"></script> 
		<script type ="text/javascript" src="js/search.js"></script> 
		<!--[if lt IE 8]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
</head>
<body>

	
<div id="header">
	  
</div>

	<div id="nav">
		<ul>
		<li><a href="" class="current">Accueil</a></li>
		<li id="menu_ie"><a href="consultation.php" >Consultation</a></li>
		<li><a href="index.php" >Quitter</a></li>		
		</ul>
	</div>
	<div id="logo">	
		<a href="index.php"></a>	  
	</div>	
<div id="contner">	
		<div id="change_pass">
			<form method="POST" action="traitement_pass.php" >
				<h2>Changement de mot de passe</h2>
			
				<ul>
					<li><label>Mot de passe actuel: </label><input type="password" name="old_pass"  /><br /></li>
					<li><label>Nouveau  : </label><input type="password" name="new_pass" /><br /></li>
					<li><label>Retapez le nouveau : </label><input type="password" name="renew_pass" ><br />	</li>	
					<li><input type="submit" value="Modifer" id="connectBtn" title="Modifer" style="margin-left:80px;"/> </li>
				
				</ul>
			</form>
		</div>
</div>
</body>
</html>	