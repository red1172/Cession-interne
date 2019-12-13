<?php


if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
	extract($_POST);
	
	if ((isset ($nom) && !empty($nom)) && (isset ($pass) &&!empty($pass)) && (isset ($prenom) && !empty($prenom)) && (isset ($fonc) && !empty($fonc)))
	{
		
		$nom=htmlspecialchars(strtoupper($nom));	
		$pass=htmlspecialchars($pass);
		$prenom=htmlspecialchars(strtoupper($prenom));
		$fonc=htmlspecialchars(strtoupper($fonc));
				
			try
			{
					$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
					$bdd = new PDO('mysql:host=localhost;dbname=cession', 'root', '', $pdo_options);
					// on teste si une entrée de la base contient ce couple login / pass
					
					$req=$bdd->prepare("INSERT INTO user (login, prenom, pass, fonction) VALUES (:lognom,  :u_prenom, :password, :fonct)")or die(print_r($bdd->errorInfo()));
					$req->execute(array('lognom'=>$nom, 'u_prenom'=>$prenom,'password'=>$pass, 'fonct'=>$fonc)); 
					
					
								
					header('Location:ajout_user.php');
					exit(); 
					
					
			}  
										catch(Exception $e)
										{
											die('Erreur : '.$e->getMessage());
										}	



										 
										  	
				
	}	
	else { 
			$erreur = 'Au moins un des champs est vide.'; 
			echo ?><center><?php$erreur;?></center><?php
	}  
		
	
}
	
?>