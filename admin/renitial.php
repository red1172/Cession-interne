<?php


		if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
extract($_POST);


	if($new_pass==$renew_pass)
	{

	
		try
			{
		
				$bdd = new PDO('mysql:host=localhost;dbname=cession', 'root', '');
				
					
					
						$req =$bdd->prepare( 'UPDATE user SET pass = :n_pass 	WHERE login = "'.$nom.'"');
						$req->execute(array( 'n_pass'=>sha1($new_pass)));
		 
					  //affichage des résultats, pour savoir si l'insertion a marchée:
					  if($req)
					  {
					  
					  ?>
					  <center> <p style="padding-left:15px;color:#007d32;text-decoration:blink;"><strong>La modification a été correctement effectuée</strong></p></center>
						<meta http-equiv="refresh" content="5; url=index.php">
						<?php
						
						
					  }
					  else{
					  ?>
						<center><p style="padding-left:15px;color:#fc2100;text-decoration:blink;"><strong>La modification à échouée</strong></p></center>
						 <meta http-equiv="refresh" content="5; url=renitial_pass.php">
			
	<?php
						
					
					
					
					}
					
			
			}
			
			catch (Exception $e)
			{
					die('Erreur : ' . $e->getMessage());
					
			}									 	
	

	}
	else{
		?>
		<center><p style="padding-left:15px;color:#fc2100;text-decoration:blink;"><strong>MOT de passe différent, veuillez recommencer s'il vous plait, redirection automatiquement dans 5 secondes</p></center>
		<meta http-equiv="refresh" content="5; url=modif_pass.php"/> 
		<?php 
		}
				
			


}
?> 

<!--<meta http-equiv="refresh" content="10; url=accueil.php"/> --->
<!--header("Location:accueil.php");-->
