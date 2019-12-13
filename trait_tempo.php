<?php 
	try
	{
	
		$bdd = new PDO('mysql:host=localhost;dbname=cession', 'root', '');

  
  $req =$bdd->prepare( "DELETE 
            FROM vente" ) ;
  
  //exécution de la requête:
  $req->execute() ;
}	
catch(Exception $e)										
{
		die('Erreur : '.$e->getMessage());
	}	
 header("Location:accueil.php");	

?>