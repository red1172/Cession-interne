
<?php 

if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
		extract($_POST);
?>
<!doctype html>
<html lang="fr">
<head>
		
        <meta charset="UTF-8" />
</head>
<body>
<?php 
echo $date_j;

?>
<br />
<?php
$date_jTPL=strftime($date_j);
list($annee, $mois, $jour ) = explode('-', $date_jTPL);
$date_jTPLINUX_bis=$annee.$mois.$jour;
$date_jMeti=$jour.$mois.$annee;
$date_jTPLINUX= "bd_".$date_jTPLINUX_bis."00.";


 //----------------------------------------METI------------------------------
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

$tab = $date_jTPLINUX_bis."plumove";
$tab1 = $date_jTPLINUX_bis.'ejmedia';
$tab2 = $date_jTPLINUX_bis.'ejitem_return';
		
				
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

header('Location: ecart_jour.php');

}
?>
</body>
</html>