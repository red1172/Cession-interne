

<?php
	$erreur = "Un membre possède déjà ce login."; 
	extract($_POST);
	
		include ("../connectpdo.php");

	
	
			
		
		$nom=strtoupper($nom);	
		$pass=($pass);
		$prenom=strtoupper($prenom);
		$fonc=strtoupper($fonc);
	
			
			// on teste si une entrée de la base contient ce couple login / pass
			
			$req=$bdd->query('SELECT count(*) as nb from user WHERE login="'.$nom.'" ') or die(print_r($bdd->errorInfo()));
			$data=$req->fetch();	
			
			// on recherche si ce login est déjà utilisé par un autre membre
			
				if ($data['nb']==0)
				{
				
					$req=$bdd->prepare("INSERT INTO user (login, prenom, pass, fonction,flag) VALUES (:lognom,  :u_prenom, :password, :fonct, :flag)")or die(print_r($bdd->errorInfo()));
					$req->execute(array('lognom'=>$nom, 'u_prenom'=>$prenom,'password'=>sha1($pass), 'fonct'=>$fonc, 'flag'=>$mag)); 
					?>
					<center> <p style="padding-left:15px;color:#007d32;text-decoration:blink;"><strong>La modification a été correctement effectuée</strong></p></center>
						<meta http-equiv="refresh" content="5; url=adduser.php">
					<?php	
				}
						// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
				else{ 
					
					echo '<centre>'.$erreur.'</center>';
				}
  
			

										  
										  	
				
	
	

	
?>