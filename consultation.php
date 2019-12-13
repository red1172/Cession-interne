<?php
 date_default_timezone_set('Africa/Algiers'); 
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
		<link rel="shortcut icon" href="images/animated_favicon.gif">
		<script type ="text/javascript" src="js/jquery.js"></script> 
		<script type ="text/javascript" src="js/search.js"></script> 
		<!--[if lt IE 8]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
		<link rel="stylesheet" type="text/css" media="screen" href="css/calendar.css" />
		<script type="text/javascript" src="js/addEvent.js"></script>
		<script type="text/javascript" src="js/date.js"></script>
		<script src="js/calendar.js" type="text/javascript"></script>
		<script type="text/javascript">
    function loadCalendar() {
        
        var calHandler = {
            onSelect : function(date) {
                alert('Date sélectionnée');
                // Suite des traitements...
            }
        }
        
        // Surcharge les valeurs par défaut de l'objet. Toutes les valeurs sont optionnelles.
        var params = {
              //displayYearInitial : 1971,
              //displayMonthInitial : 9,
              // rangeYearLower : 2003,
              // rangeYearUpper : 2007,
              // startDay : 0,
              // showWeeks : false,
              // selCurMonthOnly : true,
              // displayFooter : false,
              // displayPanel : false,
              
              // Le positionnement en mode popup se fait automatiquement. Néanmoins, possibilité de forcer la position via les deux propriétés suivantes :
              // popupLeftPos : 0,
              // popupTopPos : 0,
              
              // les 2 propriétés ci-dessous vont de pair avec l'affichage du footer.
              // displayTodayLink : true,
              // displayCloseLink : false,
              // userHandler:calHandler
        }
        
      
    	dp_cal  = new calendar('epoch_popup', 'popup', document.getElementById('popup_container'), params);
		dp_cal2  = new calendar('epoch_popup', 'popup', document.getElementById('popup_container2'), params);
		
    }
    
    addEvent(window, 'load', loadCalendar, false);
    </script>	
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
		<li><a href="" class="current">Consultation</a></li>			
		</ul>
	</div>	
	<div id="logo">	
		<a href="index.php"></a>	  
	</div>	
<div id="contner">
	

<div id="basic_container"></div>


		<form action="consu_filtre.php" method="POST">
			<label>Du : </label><input type="date" name="date_d"  id="popup_container"/><label> au : </label><input type="date" name="date_f"  id="popup_container2"/>
			<input type="submit" value="rechercher">
		</form>
		
	</div>
	

	<table>
		<tr>
			<th  style="width:50px;">Code Article</th><th>EAN</th><th>Désignation</th><th>Qtité</th><th>Vendeur</th><th style="width:50px;">Rayon vendeur</th><th>Acheteur</th><th  style="width:50px;">Rayon Acheteur</th><th style="width:auto;">Type d'opération</th><th>Utilisateur</th><th>Date</th><th>Heure</th>
		</tr>
		<?php
			$datte_j=date("Y-m-d");
						try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=cession', 'root', '');
			

			$req = $bdd->query('SELECT Article, Design, Qtite, EAN, Vendeur,R_vendeur, Acheteur,R_acheteur, Type_Op, Utilisateur,DATE_FORMAT(Heure, \'%Hh%imin%ss\') AS Heure_fr, DATE_FORMAT(date, \'%d/%m/%Y \') AS date_fr FROM ces_int WHERE date= "'.$datte_j.'" AND Utilisateur="'.$user.'"ORDER BY date DESC ');

			while ($data = $req->fetch())

			{
			$decimalPart=(int)str_replace('.','',$data['Qtite']-(int)$data['Qtite']);
				

				 if($decimalPart==0)
				  
					$qtite=(int)$data['Qtite'];
					
				  else
			
					$qtite=(int)$data['Qtite'].".".$decimalPart;
		
		?>
		<tr>
			<td><?php echo $data['Article']?></td><td><?php echo $data['EAN']?></td><td><?php echo $data['Design']?></td><td><center><?php echo $qtite?></center></td><td><center><?php echo $data['Vendeur']?></center></td>
			<td><center><?php echo $data['R_vendeur']?></center></td></center><td><center><?php echo $data['Acheteur']?></center></td><td><center><?php echo $data['R_acheteur']?></center></td><td><?php echo $data['Type_Op']?></td><td><?php echo $data['Utilisateur']?></td><td><?php echo $data['date_fr']?></td>
			<td><?php echo $data['Heure_fr']?></td>
		</tr>
		<?php } ?>
	</table>
</div>
</body>
</html>
<?php
			}
			catch (Exception $e)
			{
					die('Erreur : ' . $e->getMessage());
			}
		$req->closeCursor();


?>	