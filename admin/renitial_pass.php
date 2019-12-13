<?php
	include ("../connectpdo.php");
	$req=$bdd->query('SELECT login  from user ') or die(print_r($bdd->errorInfo()));
		
	
?>
<!doctype html>
<html lang="fr">
<head>
        <meta charset="UTF-8" />
        <title>Cession interne</title>
		<link rel="stylesheet" type="text/css" href="../css/main.css"/>
		<link rel="stylesheet" type="text/css" media="print" href="../css/print.css" />
		<link rel="shortcut icon" href="../images/animated_favicon.gif">
		<script type ="text/javascript" src="../js/jquery.js"></script> 
		<script type ="text/javascript" src="../js/search.js"></script> 
		<!--[if lt IE 8]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
</head>
<body>

	
<div id="header">
	  
</div>

	<div id="nav">
		<ul>
		<li><a href="index.php" >Accueil</a></li>	
		<li><a href="#" class="current">Employer</a>
			<ul>
				<li><a href="user.php">Visualiser</a></li>
				<li><a href="ajout_user.php">Ajouter</a></li>
				<li><a href="renitial_pass.php">Réinitialiser</a></li>
			</ul>
		</li>
		<li><a href="../cession.php">Cession</a></li>
		</ul>
	</div>	
	<div id="logo">	
		<a href="index.php"></a>	  
	</div>	
<div id="contner">	
		<div id="change_pass">
			<form method="POST" action="renitial.php" >
				<h2>Réinitalisation de mot de passe</h2>
			
				<ul>
					
					<li><label>Nom utilisateur  : </label><select  name="nom" style="width:130px;"><option>Séléctionner</option>
					<?php while ($data=$req->fetch()){ echo'<option value="'.$data['login'].'">'.$data['login'].'</option>';}?></select><br /></li>
					<li><label>Nouveau  : </label><input type="password" name="new_pass" /><br /></li>
					<li><label>Retapez le nouveau : </label><input type="password" name="renew_pass" /><br />	</li>	
					<li><input type="submit" value="Modifer" id="connectBtn" title="Modifer" style="margin-left:80px;"/> </li>
				
				</ul>
			</form>
		</div>
</div>
</body>
</html>	