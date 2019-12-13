
<?php

echo"<div>";
$un='hyp010';
$pw='ATTENT1';


$date_hier = strftime("%d-%m-%Y", mktime(0, 0, 0, date('m'), date('d')-1, date('y'))); 
$date_hier_bis = strftime("%Y%m%d", mktime(0, 0, 0, date('m'), date('d')-1, date('y'))); 

$date_hier_tplinux = "bd_".$date_hier_bis."00.";



$conn = oci_connect($un, $pw, '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.20.3.41)(PORT=1521)) (CONNECT_DATA=(SERVER=DEDICATED) (SERVICE_NAME = ME01)))');
if ($conn ) {

//echo "ok";

//CA_BRUTE_METI_FINANCIER
$stid = oci_parse($conn, "Select fin_mtcabrut from hyp010.MGFIN  where FIN_DTREM='$date_hier' ");
oci_execute($stid);
if (ocifetch($stid)){
$CA_BRUTE_METI_FINANCIER=  ociresult($stid,1);
}


//CA ENCAI METI
$stid = oci_parse($conn, "Select Sum( ECS_MTTHEOEC)  from hyp010.MGECS where ECS_DTREM='$date_hier' ");
oci_execute($stid);
if (ocifetch($stid)){
$CA_ENCAI_METI=  ociresult($stid,1);
}
//CA ENCAI METI


// ESPECES METI
$stid = oci_parse($conn, "Select  ECS_CDTCHCAI as type_enc , ECS_MTTHEOEC as theorique, ECS_MTREELEC as real  from hyp010.MGECS where ECS_DTREM='$date_hier' 
 and  ECS_CDTCHCAI=1 ");
oci_execute($stid);
if (ocifetch($stid)){
$ESPECES_METI=  ociresult($stid,2);
}
//ESPECES METI

// Retour METI
$stid = oci_parse($conn, "Select sum(VUG_MTRETOUR) from MGVUG where VUG_DTREM='$date_hier' ");
oci_execute($stid);
if (ocifetch($stid)){
$RETOUR_METI=  ociresult($stid,1);
}
//Retour METI

//CARTE_BANCAIRE_METI
$stid = oci_parse($conn, "Select  ECS_CDTCHCAI as type_enc , ECS_MTTHEOEC as theorique, 
 ECS_MTREELEC as real  from hyp010.MGECS where ECS_DTREM='$date_hier' and 
 ECS_CDTCHCAI=5");
oci_execute($stid);
if (ocifetch($stid)){
$CARTE_BANCAIRE_METI=  ociresult($stid,2);
}
//BON DIVERS METI
$stid = oci_parse($conn, "Select  ECS_CDTCHCAI as type_enc , ECS_MTTHEOEC as theorique, 
 ECS_MTREELEC as real  from hyp010.MGECS where ECS_DTREM='$date_hier' and 
 ECS_CDTCHCAI=8");
oci_execute($stid);
if (ocifetch($stid)){
$BON_DIVERS_METI=  ociresult($stid,2);
}

//CHEQUE METI
$stid = oci_parse($conn, "Select  ECS_CDTCHCAI as type_enc , ECS_MTTHEOEC as theorique, 
 ECS_MTREELEC as real  from hyp010.MGECS where ECS_DTREM='$date_hier' and 
 ECS_CDTCHCAI=11");
oci_execute($stid);
if (ocifetch($stid)){
$CHEQUE_METI=  ociresult($stid,2);
}

//VENTE A TERME METI
$stid = oci_parse($conn, "Select  ECS_CDTCHCAI as type_enc , ECS_MTTHEOEC as theorique, 
 ECS_MTREELEC as real  from hyp010.MGECS where ECS_DTREM='$date_hier' and 
 ECS_CDTCHCAI=16");
oci_execute($stid);
if (ocifetch($stid)){
$VENTE_A_TERME_METI=  ociresult($stid,2);
}

 $ESPECES_METI_reel=$ESPECES_METI-$RETOUR_METI;

echo "************************************".$date_hier."***********************************************<br>";
echo "************************METI*************************************************<br>";
echo "CA_BRUTE METI : ".$CA_BRUTE_METI_FINANCIER." DZD<br>";
echo "CA ENCAI METI : ".$CA_ENCAI_METI." DZD<br>";
echo "ESPECES METI : ".$ESPECES_METI_reel." DZD<br>";
echo "RETOUR METI : ".$RETOUR_METI." DZD<br>";
	if ($CARTE_BANCAIRE_METI=="")
			{
				$CARTE_BANCAIRE_METI=0;	
			}
echo "CARTE BANCAIRE METI : ".$CARTE_BANCAIRE_METI." DZD<br>";
	if ($BON_DIVERS_METI=="")
				{
					$BON_DIVERS_METI=0;	
				}
echo "BON DIVERS METI : ".$BON_DIVERS_METI." DZD<br>";
	if ($CHEQUE_METI=="")
					{
						$CHEQUE_METI=0;	
					}

echo "CHEQUE METI : ".$CHEQUE_METI." DZD<br>";
	if ($VENTE_A_TERME_METI=="")
						{
							$VENTE_A_TERME_METI=0;	
						}

echo "VENTE A TERME METI : ".$VENTE_A_TERME_METI." DZD<br>";

echo "*************************************************************************<br><br>";


 



}else
{
echo "false";
}


oci_close($conn);




/// connexion tplinux
$dbconntplinux = pg_connect("host=10.20.3.20 port=5432 dbname=tplinux user=tplinux password=tplinux");

$tab = $date_hier_tplinux."plumove";
$tab1 = $date_hier_tplinux.'ejmedia';
$tab2 = $date_hier_tplinux.'ejitem_return';
$tab3 = $date_hier_tplinux.'ejitem';			
				
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

$sql="select termnmbr, cshrnmbr, amtsold from $tab3 where rectype=21";
$result = pg_query($dbconntplinux,$sql);
$rows = pg_num_rows($result);

if ($i<$rows)
{
$aff_ecart_tp = pg_fetch_array ($result, $i, PGSQL_NUM);
}



echo "************************TPLINUX*************************************************<br><br>";
echo "CHIFFRE D'AFFAIRE : ".$ca[0]." DZD<br>";
echo "ESPECE TPLINUX : ".$esp_tp[1]." DZD<br>";
echo "RETOUR TPLINUX : ".$retour_tp[0]." DZD<br>";

	if ($cheque_tp[1]=="")
	{
		$cheque_tp[1]=0;	
	}
echo "CHEQUE TPLINUX : ".$cheque_tp[1]." DZD<br>";
	if ($bd_tp[0]=="")
		{
			$bd_tp[0]=0;	
		}

echo "BON DIVERS TPLINUX : ".$bd_tp[0]." DZD<br>";
	if ($terme_tp[0]=="")
		{
			$terme_tp[0]=0;	
		}
echo "VENTE A TERME TPLINUX : ".$terme_tp[0]." DZD<br>";
	
	if ($cb_tp[0]=="")
		{
			$cb_tp[0]=0;	
		}

echo "CARTE BANCAIRE TPLINUX : ".$cb_tp[0]." DZD<br>";




pg_close($dbconntplinux);

//CALCUL DES ÉCARTS
echo "<br><br>************************ECART*************************************************<br>";
$ecart_ca=$ca[0]-$CA_BRUTE_METI_FINANCIER;
echo "ECART CHIFFRE D'AFFAIRE : ".$ecart_ca." DZD<br>";
$ecart_esp=$esp_tp[1]-$ESPECES_METI_reel;
echo "ECART ESPECES : ".$ecart_esp." DZD<br>";
$ecart_cb=$cb_tp[0]-$CARTE_BANCAIRE_METI;
echo"ECART Cartes BANQUE : ".$ecart_cb." DZD<br>";
$ecart_bd=$bd_tp[0]-$BON_DIVERS_METI;
echo"ECART BON DIVERS :".$ecart_bd." DZD<br>";
$ecart_terme=$terme_tp[0]-$VENTE_A_TERME_METI;
echo"ECART A TERME : ".$ecart_terme." DZD<br>";
$ecart_cheque=$cheque_tp[0]-$CHEQUE_METI;
echo"ECART CHEQUE : ".$ecart_cq." DZD<br>";
$ecart_total=$ecart_ca+$ecart_esp+$ecart_cb+$ecart_bd+$ecart_terme+$ecart_cheque;
echo"ECART TOTAL : ".$ecart_total." DZD<br>";

echo "************************ECART CAISSIER*************************************************<br>";
if ($ecart_total!=0){
echo "<p style='color:red;font-size:25px;font-weight:bold;'>ECART</p>";
echo "CAISSE N° : ".$aff_ecart_tp[0]."<br />";
echo "NUMÈRO CAISSIER : ".$aff_ecart_tp[1]."<br />";
echo "ECART CAISSIER : ".$aff_ecart_tp[2]." DZD";
$to = 'mehenaouireda@ardis.dz'; //writing mail to the user
                $subject = "Ecart caissier";
                $message = "<table>
                <tr><td> In y un ecart,</td></tr>
                <tr><td> Some Text </td></tr>
                <tr><td> Some Text </td></tr>
                <tr><td> Some Text </td></tr>
                <tr><td> Some Text </td></tr>
                </table>" ;
                $from = "example@domain.com";
                // To send HTML mail, the Content-type header must be set
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Additional headers
                $headers .= 'From: Team <example@domain.com>' . "\r\n";

                if(mail($to,$subject,$message,$headers))
                {
                    echo "0";// mail sent Successfully.
                }
                else
                {
                    echo "1";
                }
}
else{

echo "<p style='color:green;font-size:25px;font-weight:bold;'> PAS D'ECART</p>";
$to = 'mehenaouireda@ardis.dz'; //writing mail to the user
                $subject = "Ecart caissier";
                $message = "<table>
                <tr><td> In n'y pas d'ecart,</td></tr>
                <tr><td> Some Text </td></tr>
                <tr><td> Some Text </td></tr>
                <tr><td> Some Text </td></tr>
                <tr><td> Some Text </td></tr>
                </table>" ;
                $from = "example@domain.com";
                // To send HTML mail, the Content-type header must be set
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Additional headers
                $headers .= 'From: Team <example@domain.com>' . "\r\n";

                if(mail($to,$subject,$message,$headers))
                {
                    echo "0";// mail sent Successfully.
                }
                else
                {
                    echo "1";
                }
}
echo"</div>";


?>