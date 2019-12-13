<?php


if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
	extract($_POST);
	if ((isset ($pass) AND !empty($pass))){
		if($pass=="123456"){
			header("Location:accueil.php");
			
		}
		else{
		$erreur = 'Mot de passe incorrect'; 
		}
		
	}	
	else { 
	   $erreur = 'Veuillez taper un mot de passe.'; 
	}  
			
}	

?>
<!doctype html>
<html lang="fr">
<head>
        <meta charset="UTF-8" />
        <title>Application caisses: Le reboot caisse</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
			<!--[if lt IE 9]>
			<script src="dist/html5shiv.js"></script>
			<![endif]-->
<script type="text/javascript">
//<![CDATA[
function verifjs()
{
return window.confirm('Attention ! Etes-vous sûr de rebooter la caisse ?'); 
}
//]]>
</script>
		
</head>

<body>
	<div id="corps_page">
		<header>
		</header>

	


	<nav>
		<ul>
		<li><a href="" class="current">Connexion</a></li>					
		</ul>
	</nav>	
	
	<div id="logo">	
		
	</div>	
	
		<div id="connexion">
			<form method="POST" action="index.php">
				<h2>CONNEXION</h2>
				
					
					<label>Mot de passe :</label><input type="password" name="pass" size="50" maxlength="50" id="mp_u" required autofocus/>
					
					
					<p><?php if(isset($erreur)){echo '<center><b><font color="#ff0000">'.$erreur.'</font></b></center>';}?></p>
				
				
			</form>
		</div>
		
	
	
	
							
</div>
</body>
</html>



