<?php
	if(!isset($_COOKIE["login"]))
{
    session_start();  
	if (!isset($_SESSION['login'])) { 
   header ('Location:index.php'); 
   exit();  
}

} 
header("Content-Type: application/vnd.ms-excel"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=fichierextract.xls"); 


?>
<!doctype html>
<html lang="fr">
<head>
        <meta charset="UTF-8" />
        <title>::ARDIS::CESSION INTERNE</title>
	
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
			 
	</div>	
<div id="contner">	
	
		</form>
	<?php	
	$date_d=$_GET['date1'];
	$date_f=$_GET['date2'];
	$user=$_GET['user'];
	
	if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
		
		if ($date_f < $date_d)
		{
			?>
			<center><h1 style="color:red;">Votre date de fin et inférieure à votre date de début, veuillez entrer des dates valides</h1></center>;
			<meta http-equiv="refresh" content="5; url=consultation.php"/> 
			<?php 
		}
		include ("personne.php");
			try
			{		
							$bdd = new PDO('mysql:host=localhost;dbname=cession', 'root', '');
					if (in_array($user, $personne))//vérifier si les utilisateur existe dans l'array 
					{
				
			
			?>
	
				
					<?php
					
							$bdd = new PDO('mysql:host=localhost;dbname=cession', 'root', '');
						

						$req = $bdd->query('SELECT Article, Design, Qtite, Vendeur,R_vendeur, Acheteur,R_acheteur, Type_Op, Utilisateur, DATE_FORMAT(Heure, \'%Hh%imn%ss\') AS Heure_fr, DATE_FORMAT(Date, \'%d/%m/%Y \') AS date_fr FROM ces_int WHERE Date >= "'.$date_d.'"  AND Date <= "'.$date_f.'"  ORDER BY Date DESC ')or die(print_r($bdd->errorInfo()));
					}else{
						
						$req = $bdd->query('SELECT Article, Design, Qtite, Vendeur,R_vendeur, Acheteur,R_acheteur, Type_Op, Utilisateur, DATE_FORMAT(Heure, \' %Hh%imn%ss\') AS Heure_fr, DATE_FORMAT(Date, \'%d/%m/%Y \') AS date_fr FROM ces_int WHERE Date >= "'.$date_d.'"  AND Date <= "'.$date_f.'"  AND Utilisateur="'.$user.'" ORDER BY Date DESC ')or die(print_r($bdd->errorInfo()));
						
						}
			if ($_SESSION['flag']=="ORN"){
			
			}else{
			
			?>
		
		
			<!--<form action="consu_filtre_ray.php?date_d=<?php //echo $date_d;?>&date_f=<?php //echo $date_f;?>" method="POST">
				<label>Code Article: </label>
				<select name="ray">
						<option value="10">R10</option>
						<option value="11">R11</option>
						<option value="12">R12</option>
						<option value="14">R14</option>
						<option value="15">R15</option>
						<option value="16">R16</option>
						<option value="20">R20</option>
						<option value="21">R21</option>
						<option value="22">R22</option>
						<option value="23">R23</option>
						<option value="24">R24</option>
						<option value="30">R30</option>
						<option value="31">R31</option>
						<option value="32">R32</option>
						<option value="33">R33</option>
						<option value="34">R34</option>
						<option value="35">R35</option>
						<option value="36">R36</option>
						<option value="40">R40</option>
						<option value="41">R41</option>
						<option value="42">R42</option>
						<option value="43">R43</option>
						<option value="44">R44</option>
						<option value="45">R45</option>
						<option value="60">R60</option>
						<option value="61">R61</option>
						<option value="62">R62</option>
						<option value="63">R63</option>
						<option value="64">R64</option>
						<option value="65">R65</option>
						<option value="66">R66</option>
						<option value="67">R67</option>
						<option value="99">R99</option>

				</select>		
			<input type="submit" value="rechercher">
			</form>--><?php }?>
			<table border=1>
					<tr>
						<th style="width:45px;">Code Article</th><th>Désignation</th><th>Qtité</th><th style="width:35px;"><center>Vendeur</center></th><th style="width:30px;">R_vd</th><th>Acheteur</th><th style="width:30px;">R_Acht</th><th>Type d'opération</th><th>Utilisateur</th><th>Date</th><th>Heure</th>
						<th>DPR</th><th>PMP</th>
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
			<td><?php echo $data['Heure_fr']?></td><td><?php echo $data['dpr']?></td><td><?php echo $data['pmp']?></td>
		</tr>
		<?php } ?>
	</table>
	<!--<form action="convert_general.php?date1=<?php //echo $date_d;?>&date2=<?php //echo $date_f;?>&user=<?php //echo $user;?>" method="POST">
		<form action="convert_excel.php?date1=<?php //echo $date_d;?>&date2=<?php //echo $date_f;?>&user=<?php //echo $user;?>" method="POST">
		<input type ="submit" name="submit" value="Extraction" /><input name="B1" onclick="imprimer()" type="button" value="Imprimer">
		 
	</form>-->
	<?php
			}
			catch (Exception $e)
			{
					die('Erreur : ' . $e->getMessage());
			}
		$req->closeCursor();



}
	
	?>
				
				
		