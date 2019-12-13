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
		<li><a href="accueil.php" >Retour</a></li>		
		</ul>
	</div>	
	<div id="logo">	
		<a href="index.php"></a>	  
	</div>	
<div id="contner">	

<?php
								 

	
if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
	
include('connect.php'); 
if(isset($_POST['motclef'])AND !empty($_POST['motclef']))
{
	
	$motclef = $_POST['motclef'];
	

	$numm="";
		if(($motclef >= 2900000000000)and( $motclef <= 2999999999999)){
		$numm=substr($motclef,0,7);
		$motclef= $numm."000000";
		
		}
	
	
	
	$req=mysql_query("SELECT * FROM rayon ");
	$host = "10.20.3.179";
$user1 = "root";
$pass1 = "";
$bdd = "ardis_meti";
$cpt=0;

$link1 = mysql_connect($host,$user1,$pass1)
  or die("Connection impossible user ou mot de passe incorecte");
mysql_select_db("$bdd", $link1)
  or die("Connection impossible a la base de données");
	
	
	 $order = "select   article_ean.id_article , article_ean.ean  , articles.nom_article,rayons.id_rayon,rayons.nom_rayon
					from  article_ean
					inner join articles on article_ean.id_article=articles.id_article
					inner join famille on  articles.id_famille=famille.id_famille
					inner join rayons on  famille.id_rayon=rayons.id_rayon
					
					where ean = '$motclef'";

		  
		  
	
	
	$result = mysql_query($order);  
	
	
	
		//$sql="select  article_ean.id_article , article_ean.ean  , articles.id_article from  article_ean";
		//$sql.="inner join articles on article_ean.id_article=articles.id_article";
		//$sql.="where ean LIKE'$motclef%'";
		
		//$result = mysql_query($sql) or die('Erreur SQL !'.$sql.''.mysql_error());
		//if($row = mysql_fetch_array($result))
		if ($result){
					if($donnee = mysql_fetch_row($result))
				{
				?>
	<div id="recherche">
				<form method ="post" action="traitement2.php">
				<ul>
				<li><label>EAN : </label><input type="text" name="ean" size="13" style="width:95px"  value="<?php echo $donnee[1]?>" readonly="readonly"></li>
				<li><label>Article : </label><input type="text" name="article" size="10" style="width:60px"  value="<?php echo $donnee[0]?>" readonly="readonly"></li>
				<li><label>Designation :  </label><input type="text" name="desig" style="width:200px" size="30" value="<?php echo $donnee[2]?>"  readonly="readonly"></li>
				<li><label>Vendeur :  </label><input type="text" name="n_vd" style="width:80px" size="5" value="<?php echo $donnee[4]?>"  readonly="readonly"></li>
				<li><label>N°Vendeur :  </label><input type="text" name="r_vd" style="width:30px" size="5" value="<?php echo $donnee[3]?>"  readonly="readonly"></li>
				<li><label>Acheteur :  </label><select name="nom_r_acht"  style="width:100px" required><option value="">Selectionner</option><?php while($data=mysql_fetch_assoc($req))
				{?><option value="<?php echo $data['libelle_r']?>"><?php echo $data['libelle_r'];}?></option></select></li>
				<li><label>N°Acheteur : </label><input type="text" name="r_acht" size="5" style="width:30px"  ></li>
				<li><label>Type d'opération :  </label><select name="typ_op"  style="width:120px" required>
				<option value="">Selectionner</option><option value="Cession interne">Cession interne</option>
				<option value="Auto-consommation">Auto-consommation</option></select></li>
			
			<li><label>Quantité :  </label><input type="float" name="qtite" style="width:50px" size="7" required></li>					
			
			
			<li><label>Utilisateur :  </label><input type="text" name="user"  style="width:100px" size="50" value="<?php echo strtoupper($user) ?>"   readonly="readonly"></li><br />
			</ul>
			<tr><td style="border:0px;">
			<input type="submit" value="OK" id="OkBtn" title="enregistrer"/>
			<td style="border:0px;">
			
		
		</tr>
		</form>
		
			<?php
			
			
			}else{
		?>
		<ul>	<li>Aucun article pour le code-barres : <span style="font-weight:bold;color:red;text-decoration:blink" ><?php echo $motclef ?></span></li>
		<?php
		}
		}else{
		?>
			<li>Aucun article pour : <span style="font-weight:bold;color:red;text-decoration:blink" ><?php echo $motclef ?></span></li>
		<?php
		}
	}
	}

?>
	</ul>
	</div>		
			
	
	</div>
							
</div>
</body>
</html>