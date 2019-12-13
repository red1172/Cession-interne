<?php
	//Connexion bd cession
	include("connectpdo1.php");
	//Connexion bd Meti	
		include("connectMeti.php");
		
	//Effacement de la table DRP PMP	
		$req =$bdd->prepare( "DELETE FROM dprpmp" ) ;  
	//exécution de la requête:
		$req->execute() ;

	//Nom extraire données DRP PMP
		$stid = oci_parse($conn, "select AST_NOART ,AST_PXMOYPDR ,AST_PXREVHPR  from MGAST ");
		oci_execute($stid);
		//$nb=1;
		while (ocifetch($stid))
		
		{
			$dpr=  ociresult($stid,3);
			$pmp=  ociresult($stid,2);
			$art= ociresult($stid,1);
			//echo $nb." : ".$art."  /  ".$pmp."  /  ".$dpr."<br />";
			//$nb++;
		//Insertion données dans la table DRP PMP
		$req=$bdd->prepare("INSERT INTO dprpmp (art, pmp, dpr) VALUES(:id_art, :pmp, :dpr)") or die(print_r($bdd->errorInfo()));
		$req->execute(array('id_art'=>$art,  'pmp'=>$pmp,'dpr'=>$dpr ));
		$req->closeCursor();		
		}

	?>
