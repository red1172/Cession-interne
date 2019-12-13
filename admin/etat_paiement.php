	<?php
  
  
  
  include("../connectpdo.php");
  
  
  ?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>DataTables example - Bootstrap 3</title>
	



	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">

	
	<script type="text/javascript" language="javascript" src="js/jquery-1.12.4.js">

	</script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js">

	</script>
	<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.min.js">
	</script>


	
	<script type="text/javascript" class="init">
	
	$(document).ready(function() {
    $('#tableau').DataTable( {
        "language": {
            "url": "js/French.json"
        }
    } );
} );
	
	</script>
	</head>
	<body class="wide comments example dt-example-bootstrap">
	<h2><center>SUIVIS DE PAIEMENT VAT ACTU</center></h2>
	<table id="tableau" class="table table-striped table-bordered" cellspacing="0" style="width:100%">
	 <thead>
	  <tr>
	     <th class="text-center">Client</th>
	     <th class="text-center">N°Facture</th>
	     <th class="text-center">Montant</th>
	     <th class="text-center">Date facturation</th>
	     <th class="text-center">Reglement</th>
		 <th class="text-center">Date</th>
		 <th class="text-center">montant cheque</th>
	     
	</tr>
	 </thead> 
	 <tbody>
	<?php 
	//extract($_GET);
	
$reponse = $bdd->query("SELECT * FROM paiement ");
		
	while ($donnees = $reponse->fetch())
						{    
							
				?>			
				
	
	 <tr>
		<td><?php echo $donnees['client'] ?></td>
		<td class="text-center"><?php echo $donnees['num_fac'] ?></td>
		<td class="text-center"><?php echo $donnees['montant'] ?></td>
		<td class="text-center"><?php echo $donnees['date_fac'] ?></td>
		<td class="text-center"><?php echo $donnees['reglement'] ?></td>
		<td class="text-center"><?php echo $donnees['date'] ?></td>
		<td class="text-center"><?php echo $donnees['mt_cheque'] ?></td>
		
		<!--<td class="text-center"><i class="fa fa-eye show" aria-hidden="true" rel="<?php echo $donnees['id_cmd'] ?>" aria-hidden="true"></i> </td>-->
		
		
	 </tr>
		
								<?php
                        }
						?>
	</tbody>
	</table>
	
	
	
	
	
</body>
</html>



 

