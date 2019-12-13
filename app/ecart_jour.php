
<?php 

if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
		extract($_POST);



$date_jTPL=strftime($date_j);
list($annee, $mois, $jour ) = explode('-', $date_jTPL);
$date_jTPLINUX_bis=$annee.$mois.$jour;
$date_jMeti=$jour."-".$mois."-".$annee;
$date_jTPLINUX= "bd_".$date_jTPLINUX_bis."00.";



$un='hyp010';
$pw='ATTENT1';





$conn = oci_connect($un, $pw, '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.20.3.41)(PORT=1521)) (CONNECT_DATA=(SERVER=DEDICATED) (SERVICE_NAME = ME01)))');
if ($conn ) {

//echo "ok";

//CA_BRUTE_METI_FINANCIER
$stid = oci_parse($conn, "Select fin_mtcabrut from hyp010.MGFIN  where FIN_DTREM='$date_jMeti' ");
oci_execute($stid);
if (ocifetch($stid)){
$CA_BRUTE_METI_FINANCIER=  ociresult($stid,1);
}


//CA ENCAI METI
$stid = oci_parse($conn, "Select Sum( ECS_MTTHEOEC)  from hyp010.MGECS where ECS_DTREM='$date_jMeti' ");
oci_execute($stid);
if (ocifetch($stid)){
$CA_ENCAI_METI=  ociresult($stid,1);
}
//CA ENCAI METI


// ESPECES METI
$stid = oci_parse($conn, "Select  ECS_CDTCHCAI as type_enc , ECS_MTTHEOEC as theorique, ECS_MTREELEC as real  from hyp010.MGECS where ECS_DTREM='$date_jMeti' 
 and  ECS_CDTCHCAI=1 ");
oci_execute($stid);
if (ocifetch($stid)){
$ESPECES_METI=  ociresult($stid,2);
}
//ESPECES METI

// Retour METI
$stid = oci_parse($conn, "Select sum(VUG_MTRETOUR) from MGVUG where VUG_DTREM='$date_jMeti' ");
oci_execute($stid);
if (ocifetch($stid)){

$RETOUR_METI=  ociresult($stid,1);
}
//Retour METI

//CARTE_BANCAIRE_METI
$stid = oci_parse($conn, "Select  ECS_CDTCHCAI as type_enc , ECS_MTTHEOEC as theorique, 
 ECS_MTREELEC as real  from hyp010.MGECS where ECS_DTREM='$date_jMeti' and 
 ECS_CDTCHCAI=5");
oci_execute($stid);
if (ocifetch($stid)){
$CARTE_BANCAIRE_METI=  ociresult($stid,2);
}
//BON DIVERS METI
$stid = oci_parse($conn, "Select  ECS_CDTCHCAI as type_enc , ECS_MTTHEOEC as theorique, 
 ECS_MTREELEC as real  from hyp010.MGECS where ECS_DTREM='$date_jMeti' and 
 ECS_CDTCHCAI=8");
oci_execute($stid);
if (ocifetch($stid)){
$BON_DIVERS_METI=  ociresult($stid,2);
}

//CHEQUE METI
$stid = oci_parse($conn, "Select  ECS_CDTCHCAI as type_enc , ECS_MTTHEOEC as theorique, 
 ECS_MTREELEC as real  from hyp010.MGECS where ECS_DTREM='$date_jMeti' and 
 ECS_CDTCHCAI=11");
oci_execute($stid);
if (ocifetch($stid)){
$CHEQUE_METI=  ociresult($stid,2);
}

//VENTE A TERME METI
$stid = oci_parse($conn, "Select  ECS_CDTCHCAI as type_enc , ECS_MTTHEOEC as theorique, 
 ECS_MTREELEC as real  from hyp010.MGECS where ECS_DTREM='$date_jMeti' and 
 ECS_CDTCHCAI=16");
oci_execute($stid);
if (ocifetch($stid)){
$VENTE_A_TERME_METI=  ociresult($stid,2);
}

 $ESPECES_METI_reel=$ESPECES_METI-$RETOUR_METI;
 
 }else
{
echo "false";
}


oci_close($conn);

 //----------------------------------------TPLINUX------------------------------
 
 /// connexion tplinux
$dbconntplinux = pg_connect("host=10.20.3.20 port=5432 dbname=tplinux user=tplinux password=tplinux");

$tab = $date_jTPLINUX."plumove";
$tab1 = $date_jTPLINUX.'ejmedia';
$tab2 = $date_jTPLINUX.'ejitem_return';
		
				
//CA TPLINUX
$sql ="  Select sum(amtsold) from $tab where period=1 ";
$result = pg_query($dbconntplinux,$sql);
$rows = pg_num_rows($result);

if ($i<$rows)
{
$ca = pg_fetch_array ($result, $i, PGSQL_NUM);

}
//ESPECE TPLINUX
$sql ="select medcurrdesc,  sum(CASE WHEN substring(flag from 3 for 1)='1' THEN   mediaamnt*-1 ELSE mediaamnt END) as amount,  mediatype from $tab1 left join media on (mediatype=medcurrnmbr)
  and saletype in (0,5,9) group by medcurrdesc, mediatype order by mediatype";
$result = pg_query($dbconntplinux,$sql);
$rows = pg_num_rows($result);

if ($i<$rows)
{
$esp_tp = pg_fetch_array ($result, $i, PGSQL_NUM);

}

//RETOUR TPLINUX
 $sql="Select sum(amtsold) from $tab2";
$result = pg_query($dbconntplinux,$sql);
$rows = pg_num_rows($result);

if ($i<$rows)
{
$retour_tp = pg_fetch_array ($result, $i, PGSQL_NUM);

}
//CHEQUE TPLINUX
$sql="select sum(mediaamnt) from $tab1 where mediatype='28'";
$result = pg_query($dbconntplinux,$sql);
$rows = pg_num_rows($result);

if ($i<$rows)
{
$cheque_tp = pg_fetch_array ($result, $i, PGSQL_NUM);
	
}

//BON DIVERS TPLINUX
$sql="select sum(mediaamnt) from $tab1 where mediatype='12'";
$result = pg_query($dbconntplinux,$sql);
$rows= pg_num_rows($result);

if ($i<$rows)
{
$bd_tp = pg_fetch_array ($result, $i, PGSQL_NUM);
}

//A TERME TPLINUX

$sql="select sum(mediaamnt) from $tab1 where mediatype='14'";


$result = pg_query($dbconntplinux,$sql);
$rows = pg_num_rows($result);

if ($i<$rows)
{
$terme_tp = pg_fetch_array ($result, $i, PGSQL_NUM);
}

//CARTE BANCAIRE TPLINUX
$sql="select sum(mediaamnt) from $tab1 where mediatype='7'";
$result = pg_query($dbconntplinux,$sql);
$rows = pg_num_rows($result);

if ($i<$rows)
{
$cb_tp = pg_fetch_array ($result, $i, PGSQL_NUM);
}
 
//select termnmbr, cshrnmbr, amtsold from bd_2013112500.ejitem where rectype=21

$sql="select termnmbr, cshrnmbr, amtsold from $tab1 where rectype=21";
$result = pg_query($dbconntplinux,$sql);
$rows = pg_num_rows($result);

if ($i<$rows)
{
$aff_ecart_tp = pg_fetch_array ($result, $i, PGSQL_NUM);
}

pg_close($dbconntplinux);





?>

<!doctype html>
<html lang="fr">
<head>
        <meta charset="UTF-8" />
        <title>ECART</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
			<!--[if lte IE 9]>
			<link rel="stylesheet" type="text/css" href="style_ie.css"/>
			<script src="dist/html5shiv.js"></script>
			<![endif]-->
<STYLE type="text/css">

section form label{	
	color : #007d32;
	font-weight : bold;
	width : 150px;
	display : bolck;
	float : left;
	padding-left:5px;
	padding-top:20px;
}

section form input{
	
	width:100px;
	margin-top:20px;
}

</style>						
</head>

<body>
	<div id="corps_page">
		<header>
		</header>
		<nav>
			<ul>
				<li><a  href="accueil.php" >Accueil</a></li>
				<li><a  href="ecart.php" >Ecart</a></li>
				<li><a  href="resart.php" >Restartpos</a></li>
				<li><a  href="reboot.php" >Reboot</a></li>
				<li><a  href="index.php" >Exit</a></li>
						
			</ul>
		</nav>
		<div id="logo">	
		
		</div>	
		<secti
				<center><h1>Date du <?php  echo $date_jMeti; ?><br /><br /></h1></center>
				<article id="tplinux">
					<table>
						<?php
								/// connexion tplinux

								echo "<center><h2>TPLINUX</h2></center>";
								echo"<tr><th>CHIFFRE D'AFFAIRE </th><td> ".$ca[0]." DZD</td></tr>";
								echo"<tr><th> ESPECE TPLINUX </th><td> ".$esp_tp[1]." DZD</td></tr>";
								echo"<tr><th>RETOUR TPLINUX </th><td> ".$retour_tp[0]." DZD</td></tr>";

									if ($cheque_tp[1]=="")
									{
										$cheque_tp[1]=0;	
									}
								echo"<tr><th>CHEQUE TPLINUX </th><td> ".$cheque_tp[1]." DZD</td></tr>";
									if ($bd_tp[0]=="")
										{
											$bd_tp[0]=0;	
										}
								echo"<tr><th>BON DIVERS TPLINUX </th><td> ".$bd_tp[0]." DZD</td></tr>";
									if ($terme_tp[0]=="")
										{
											$terme_tp[0]=0;	
										}
								echo"<tr><th>VENTE A TERME TPLINUX </th><td> ".$terme_tp[0]." DZD</td></tr>";
									
									if ($cb_tp[0]=="")
										{
											$cb_tp[0]=0;	
										}
								echo"<tr><th>CARTE BANCAIRE TPLINUX </th><td> ".$cb_tp[0]." DZD</td></tr>";

						?>
						
					</table>
				</article>
				<article id="meti">
					<table>
								<?php
									

									
									echo "<center><h2>METI</h2></center>";
									echo"<tr><th>CA_BRUTE METI </th><td> ".$CA_BRUTE_METI_FINANCIER." DZD</td></tr>";
									echo"<tr><th>CA ENCAI METI</th><td> ".$CA_ENCAI_METI." DZD</td></tr>";
									echo"<tr><th>ESPECES METI </th><td> ".$ESPECES_METI_reel." DZD</td></tr>";
									echo"<tr><th>RETOUR METI </th><td> ".$RETOUR_METI." DZD</td></tr>";
										if ($CARTE_BANCAIRE_METI=="")
												{
													$CARTE_BANCAIRE_METI=0;	
												}
									echo"<tr><th>CARTE BANCAIRE METI </th><td> ".$CARTE_BANCAIRE_METI." DZD</td></tr>";
										if ($BON_DIVERS_METI=="")
													{
														$BON_DIVERS_METI=0;	
													}
									echo"<tr><th>BON DIVERS METI </th><td> ".$BON_DIVERS_METI." DZD</td></tr>";
										if ($CHEQUE_METI=="")
														{
															$CHEQUE_METI=0;	
														}

									echo"<tr><th>CHEQUE METI </th><td> ".$CHEQUE_METI." DZD</td></tr>";
										if ($VENTE_A_TERME_METI=="")
															{
																$VENTE_A_TERME_METI=0;	
															}

									echo"<tr><th>VENTE A TERME METI </th><td> ".$VENTE_A_TERME_METI." DZD</td></tr>";

								
									
						?>
					</table>	
				</article>		
				<article id="cal_ecart">
					<table>
						
						<?php 
										//CALCUL DES ÉCARTS
										echo "<center><h2>ECART</h2></center>";
										$ecart_ca=$ca[0]-$CA_BRUTE_METI_FINANCIER;
										echo "<tr><th>ECART CHIFFRE D'AFFAIRE </th><td> ".$ecart_ca." DZD </td></tr>";
										$ecart_esp=$esp_tp[1]-$ESPECES_METI_reel;
										echo "<tr><th>ECART ESPECES </th><td> ".$ecart_esp." DZD</td></tr>";
										$ecart_cb=$cb_tp[0]-$CARTE_BANCAIRE_METI;
										echo"<tr><th>ECART CARTES BANCAIRE </th><td> ".$ecart_cb." DZD</td></tr>";
										$ecart_bd=$bd_tp[0]-$BON_DIVERS_METI;
										echo"<tr><th>ECART BON DIVERS </th><td>".$ecart_bd." DZD</td></tr>";
										$ecart_terme=$terme_tp[0]-$VENTE_A_TERME_METI;
										echo"<tr><th>ECART A TERME </th><td> ".$ecart_terme." DZD</td></tr>";
										$ecart_cheque=$cheque_tp[0]-$CHEQUE_METI;
										echo"<tr><th>ECART CHEQUE </th><td> ".$ecart_cheque." DZD</td></tr>";
										$ecart_total=$ecart_ca+$ecart_esp+$ecart_cb+$ecart_bd+$ecart_terme+$ecart_cheque;
										echo"<tr><th>ECART TOTAL </th><td> ".$ecart_total." DZD</td></tr>";

					?>
					</table>
				</article>
				
				<article id="ecart_caissier">
					
						
						<?php 	
						
										
										if ($ecart_total!=0){
										echo "<center><p style='color:red;font-size:25px;font-weight:bold;'>ECART</p>";
										echo "<h2>ECART CAISSIER</h2>";
										echo "CAISSE N° : ".$aff_ecart_tp[0]."<br />";
										echo "NUMÉRO CAISSIER : ".$aff_ecart_tp[1]."<br />";
										echo "ECART CAISSIER : ".$aff_ecart_tp[2]." DZD</center>";

													

										}
										else{

										echo "<center><p style='color:green;font-size:25px;font-weight:bold;'> PAS D'ECART</p></center>";
														
										}

						?>
						
						
				</article>			
				
				
		</section>
	</div>	
</body>
</html>
<?php 
}

?>
