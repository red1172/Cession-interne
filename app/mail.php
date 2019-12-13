﻿<?php 
	include('meti_tplinux.php');
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
		<link rel="stylesheet" type="text/css" media="screen" href="calendar.css" />
		<script type="text/javascript" src="js/addEvent.js"></script>
		<script type="text/javascript" src="js/date.js"></script>
		<script src="js/calendar.js" type="text/javascript"></script>
		<script type="text/javascript">
    function loadCalendar() {
        
        var calHandler = {
            onSelect : function(date) {
                alert('Date sélectionnée');
                // Suite des traitements...
            }
        }
        
        // Surcharge les valeurs par défaut de l'objet. Toutes les valeurs sont optionnelles.
        var params = {
              //displayYearInitial : 1971,
              //displayMonthInitial : 9,
              // rangeYearLower : 2003,
              // rangeYearUpper : 2007,
              // startDay : 0,
              // showWeeks : false,
              // selCurMonthOnly : true,
              // displayFooter : false,
              // displayPanel : false,
              
              // Le positionnement en mode popup se fait automatiquement. Néanmoins, possibilité de forcer la position via les deux propriétés suivantes :
              // popupLeftPos : 0,
              // popupTopPos : 0,
              
              // les 2 propriétés ci-dessous vont de pair avec l'affichage du footer.
              // displayTodayLink : true,
              // displayCloseLink : false,
              // userHandler:calHandler
        }
        
      
    	dp_cal  = new calendar('epoch_popup', 'popup', document.getElementById('popup_container'), params);
		
		
    }
    
    addEvent(window, 'load', loadCalendar, false);
    </script>	
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
				<li><a  class="current" href="#" >Ecart</a></li>
				<li><a  href="restart.php" >Restartpos</a></li>
				<li><a  href="reboot.php" >Reboot</a></li>
				<li><a  href="index.php" >Exit</a></li>
						
			</ul>
		</nav>
		<div id="logo">	
		
		</div>	
		<section>
				<form  method="POST" action="ecart_jour.php">
				<label for="date_j">Entrez une date : </label><input type="date" name="date_j" id="popup_container" />
				<input type="submit" value="rechercher" />
				</form>
				<h2>Date du <?php  echo $date_hier; ?></h2>
				<article id="tplinux">
					<table>
						<?php
								/// connexion tplinux

								echo "<center><h2>TPLINUX</h2></center>";
								
									if ($ca[0]=="")
									{
										$ca[0]=0;
									}
								echo"<tr><th>CHIFFRE D'AFFAIRE </th><td> ".$ca[0]." DZD</td></tr>";
								
									if($esp_tp[1]=="")
									{
										$esp_tp[1]=0;
									}
								echo"<tr><th> ESPECE TPLINUX </th><td> ".$esp_tp[1]." DZD</td></tr>";
								
									if($retour_tp[0]=="")
									{
										$retour_tp[0]=0;
									}
								echo"<tr><th>RETOUR TPLINUX </th><td> ".$retour_tp[0]." DZD</td></tr>";
								

									if ($cheque_tp[0]=="")
									{
										$cheque_tp[0]=0;	
									}
								echo"<tr><th>CHEQUE TPLINUX </th><td> ".$cheque_tp[0]." DZD</td></tr>";
								
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
echo "<p style='color:red;font-size:25px;font-weight:bold;'>ECART</p>";
echo "CAISSE N° : ".$aff_ecart_tp[0]."<br />";
echo "NUMÈRO CAISSIER : ".$aff_ecart_tp[1]."<br />";
echo "ECART CAISSIER : ".$aff_ecart_tp[2]." DZD";
$to = 'mehenaouireda@ardis.dz,elokbimohamedadel@webcom.dz,lebbirabah@ardis.dz,h.bouaziz@webcom.dz,helpdesk@ardis.dz'; //writing mail to the user
                $subject = "Ecart";
                $message = "<table>
                <tr><td> Il y un ecart,</td></tr>
                
                </table>" ;
                $from = "ECART";
                // To send HTML mail, the Content-type header must be set
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Additional headers
                $headers .= 'ecart-tplinux-meti@webcom.dz' . "\r\n";

                if(mail($to,$subject,$message,$headers))
                {
                    echo "Message envoyé";// mail sent Successfully.
                }
                else
                {
                    echo "1";
                }
}
else{

echo "<p style='color:green;font-size:25px;font-weight:bold;'> PAS D'ECART</p>";
$to = 'mehenaouireda@ardis.dz,elokbimohamedadel@webcom.dz,lebbirabah@ardis.dz,h.bouaziz@webcom.dz,helpdesk@ardis.dz'; //writing mail to the user
                $subject = "Ecart";
                $message = "<table>
                <tr><td> Il n'y pas d'ecart,</td></tr>
                
                </table>" ;
                $from = "ECART";
                // To send HTML mail, the Content-type header must be set
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Additional headers
                $headers .= 'ecart-tplinux-meti@webcom.dz' . "\r\n";

                if(mail($to,$subject,$message,$headers))
                {
                    echo "Message envoyé";// mail sent Successfully.
                }
                else
                {
                    echo "1";
                }
}
						?>
						
				</article>			
				
				
		</section>
	</div>	
</body>
</html>
