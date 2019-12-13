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
		<link rel="stylesheet" type="text/css" media="print" href="css/print.css" />
		<link rel="shortcut icon" href="images/animated_favicon.gif">
		<script type ="text/javascript" src="js/jquery.js"></script> 
		<script type ="text/javascript" src="js/search.js"></script> 
		<!--[if lt IE 8]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
		
		<script language="Javascript">
function imprimer(){window.print();}
</script>
<style>
@page { size:landscape; marks:none;size: 21.0cm;margin: 0.5cm ;}
</style>
</head>
<body>

	
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
				<li><a class="current" href="#"><?php echo $user ?><img src="images/fleche_bas.png" alt="fleche_bas" border="0"/></a>
					<ul>
						<li><a href="profil.php?user=<?php echo $user ?>">Profil</a></li>
						<li><a href="modif_pass.php">Mot de passe</a></li>
						<li><a href="deconnexion.php">Déconnexion</a></li>
					</ul>
				</li>
			</ul>	
	</div>
	<div id="nav">
		<ul>
		<li><a href="accueil.php">Accueil</a></li>	
		<li><a href="consultation.php" >Consultation</a></li>			
		</ul>
	</div>	
	<div id="logo">	
		<a href="index.php"></a>	  
	</div>	
<div id="contner">	
	
		</form>
	<?php	
	if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
		extract($_POST);
		
		include ("personne.php");
			try
			{		
							$bdd = new PDO('mysql:host=localhost;dbname=cession', 'root', '');
					if (in_array($user, $personne))//vérifier si les utilisateur existe dans l'array 
					{
				
			
			?>
	
				
					<?php
					
							$bdd = new PDO('mysql:host=localhost;dbname=cession', 'root', '');
						

						$req = $bdd->query('SELECT Article, Design, Qtite, Vendeur,R_vendeur, Acheteur,R_acheteur, Type_Op, Utilisateur, DATE_FORMAT(Heure, \'%Hh%imn%ss\') AS Heure_fr, DATE_FORMAT(Date, \'%d/%m/%Y \') AS date_fr FROM ces_int WHERE R_acheteur = "'.$ray.'"  AND Date >= "'.$_GET['date_d'].'"  AND Date <= "'.$_GET['date_f'].'" ORDER BY Date DESC ')or die(print_r($bdd->errorInfo()));
					}else{
						
						$req = $bdd->query('SELECT Article, Design, Qtite, Vendeur,R_vendeur, Acheteur,R_acheteur, Type_Op, Utilisateur, DATE_FORMAT(Heure, \'%Hh%imn%ss\') AS Heure_fr, DATE_FORMAT(Date, \'%d/%m/%Y\') AS date_fr FROM ces_int WHERE R_acheteur = "'.$ray.'"  AND Utilisateur="'.$user.'" AND Date >= "'.$_GET['date_d'].'"  AND Date <= "'.$_GET['date_f'].'" ORDER BY Date DESC ')or die(print_r($bdd->errorInfo()));
						
						}
			?>
		
		
		
			<table>
					<tr>
						<th style="width:45px;">Code Article</th><th>Désignation</th><th>Qtité</th><th style="width:35px;"><center>Vendeur</center></th><th style="width:30px;">R_vd</th><th>Acheteur</th><th style="width:30px;">R_Acht</th><th>Type d'opération</th><th>Utilisateur</th><th>Date</th><th>Heure</th>
					</tr>
			<?PHP 	
			while ($data = $req->fetch())

			{
			$decimalPart=(int)str_replace('.','',$data['Qtite']-(int)$data['Qtite']);
			 if($decimalPart==0)
				  
					$qtite=(int)$data['Qtite'];
					
				  else
			
					$qtite=(int)$data['Qtite'].".".$decimalPart;
			
		?>
		<tr>
			<td><?php echo $data['Article']?></td><td><?php echo $data['Design']?></td><td><center><?php echo $qtite ?></center></td><td><center><?php echo $data['Vendeur']?></center></td>
			<td><center><?php echo $data['R_vendeur']?></center></td></center><td><center><?php echo $data['Acheteur']?></center></td><td><center><?php echo $data['R_acheteur']?></center></td><td><?php echo $data['Type_Op']?></td><td><?php echo $data['Utilisateur']?></td><td><?php echo $data['date_fr']?></td>
			<td><?php echo $data['Heure_fr']?></td>
		</tr>
		<?php } ?>
	</table>
	<form action="convert.php?date1=<?php echo $_GET['date_d'];?>&date2=<?php echo $_GET['date_f'];?>&user=<?php echo $user;?>&rayon=<?php echo $ray;?>" method="POST">
		
		<input type ="submit" name="submit" value="Extraction" /><input name="B1" onclick="imprimer()" type="button" value="Imprimer">
		 
	</form>
	<?php
			}
			catch (Exception $e)
			{
					die('Erreur : ' . $e->getMessage());
			}
		$req->closeCursor();



}
	
	?>
				
				
		