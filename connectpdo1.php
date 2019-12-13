

<?php
//les fonctions mysql_ ne sont plus � utiliser (on dit qu'elles sont obsol�tes)
//PDO car c'est cette m�thode d'acc�s aux bases de donn�es qui va devenir la plus utilis�e dans les prochaines versions de PHP
//L'extension PDO : c'est un outil complet qui permet d'acc�der � n'importe quel type de base de donn�es MySQL que PostgreSQL ou Oracle.
//connectpdo
		
		
		include("config1.php");
		//PHP ex�cute les instructions � l'int�rieur du bloc try{ } . Si une erreur se produit, il s'arr�te et "saute" directement au niveau du catch{ }
		try
{
	$bdd=new PDO("mysql:host=$host;dbname=$dbname", $user_db, $pass_db);/*cr�e ce qu'on appelle un objet $bdd et PDO est le nom de la classe sur laquelle est bas� l'objet
																		c'est un objet qui repr�sente la connexion � la base de donn�es*/
	
}
	catch(Exception $error)
{
        die('Erreur : '.$error->getMessage());//die Affiche un message et termine le script courant
}
/*PDO est ce qu'on appelle une extension orient�e objet de PHP.
 la programmation orient�e objet en PHP
 utilisez ce mod�le de blocs try/catch pour r�cup�rer les erreurs relatives � la base de donn�es, renvoy�es par PDO */
?>
