<?php
//#20.0.49.2 cession
ob_start();define('UNICODE_PAGE_UTF8',false);
$gszId='cession	PAGE_TABLE_CASSE	20190612164603';
//-----------------------------------------------------------------------
// Include standard (définition des types, fonctions utilitaires)
//-----------------------------------------------------------------------
$CheminRepRes='./res/';
require_once($CheminRepRes.'WD20.0/WDFramework.php');
WB_Include('Architecture.php');
WB_Include('Interface.php');
WB_Include('HF.php');
IHM_Include('CTableAjax');
IHM_Include('CSaisieMonetaire');
IHM_Include('CSaisie');
IHM_Include('CSaisieDate');
IHM_Include('CSaisieNumerique');
IHM_Include('CBouton');
IHM_Include('CChampMenu');
IHM_Include('CLibelle');
IHM_Include('CChampCelluleMiseEnPage');


WB_Include('HF.php');
WB_Include('WL/PAGE/Page.php');
WB_Include('IHM/Champ/Liste/Table/Table.php');
WB_Include('Engine.php');
// Equivalent de [%URL()%]
$gszURL='Table-casse.php';
$j=1;$i=1;
ChangeAlphabet(1,false);
ChangeNation(1);
$gtabCheminPage = array();
$gszCheminPageInverse='./';
$gtabCheminPage['PAGE_TABLE_CASSE']=array(5=>array('NOM'=>'Table-casse','URL'=>'./'));
$gtabCheminPage['PAGE_LISTE-CASSE']=array(5=>array('NOM'=>'PAGE-liste-casse','URL'=>'./'));

EnvSet('JOURSSEMAINE',array("lundi","mardi","mercredi","jeudi","vendredi","samedi","dimanche"));
EnvSet('MOIS',array("janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"));
EnvSet('HCreationAutoActive',true);
EnvSet('FORMATDATESYSTEME','JJ/MM/AAAA');
EnvSet('FORMATHEURESYSTEME','HH:MM');
EnvSet('UNITESTAILLESFICHIER',array("o","Ko","Mo","Go","To"));
$_gszSEPDEVISE = "€";
$_gszSEPDEC = ",";
$_gszSEPMIL = " ";
//-----------------------------------------------------------------------
// Déclaration de la page et de ses champs 
//-----------------------------------------------------------------------
$PAGE_TABLE_CASSE= new CPage(false);
$PAGE_TABLE_CASSE->Nom = 'PAGE_Table_casse';
$PAGE_TABLE_CASSE->NomPhysique = basename (  __FILE__ ,substr(__FILE__,-4));
$PAGE_TABLE_CASSE->Alias = 'PAGE_TABLE_CASSE';
$PAGE_TABLE_CASSE->m_sNomPHP = 'PAGE_TABLE_CASSE';
$PAGE_TABLE_CASSE->Libelle = 'Table casse (partagé)';
$PAGE_TABLE_CASSE->bUTF8 = true;
$PAGE_TABLE_CASSE->bAvecContexte = false;
$PAGE_TABLE_CASSE->sFichierPalette = './res/GrayVolution.wpc';
$MaPage = &$PAGE_TABLE_CASSE;
$A1_TABLE_casse=&CreerChamp('CTableAjax');$PAGE_TABLE_CASSE->WB_AjouteChamp('TABLE_casse','A1',$A1_TABLE_casse,'A1_TABLE_casse');
$A1_TABLE_casse->m_bHauteurLigneVariable=true;
$A1_TABLE_casse->m_nNbColonnesOuAttributs=7;
$A1_TABLE_casse->SetMaxLignePage(26);
$A1_TABLE_casse->SetFirstIndex(0);
$A1_TABLE_casse->Visible=1;
$A1_TABLE_casse->Etat=0;
$A1_TABLE_casse->nModeSelection=1;

$A2_COL_Qtite=&CreerChamp('CSaisieMonetaire');$PAGE_TABLE_CASSE->WB_AjouteChamp('COL_Qtite','A2',$A2_COL_Qtite,'A2_COL_Qtite');
$A1_TABLE_casse->AjouteColonne('A2_COL_Qtite','COL_Qtite','A2', 5604, 2,'casse','qtite');
$A1_TABLE_casse->TabColonnes[3]->ChampFormat->Masque='99 999';
$A1_TABLE_casse->TabColonnes[3]->Visible=1;
$A1_TABLE_casse->TabColonnes[3]->Etat=0;
$A1_TABLE_casse->TabColonnes[3]->bColonneLien=0;
$A1_TABLE_casse->TabColonnes[3]->SetTriable(true);
$A1_TABLE_casse->TabColonnes[3]->SetAvecLoupe(true);
$A1_TABLE_casse->TabColonnes[3]->m_bAvecFiltre=true;
$A1_TABLE_casse->TabColonnes[3]->m_eDeplaceInsere = 4;
$A1_TABLE_casse->TabColonnes[3]->m_sBulle='';
$A2_COL_Qtite->m_eAction=6;
$A2_COL_Qtite->m_sPageAction='';
$A2_COL_Qtite->m_sTitre="Qtité";

$A8_COL_User=&CreerChamp('CSaisie');$PAGE_TABLE_CASSE->WB_AjouteChamp('COL_User','A8',$A8_COL_User,'A8_COL_User');
$A1_TABLE_casse->AjouteColonne('A8_COL_User','COL_User','A8', 5600, 3,'casse','user');
$A1_TABLE_casse->TabColonnes[4]->Visible=1;
$A1_TABLE_casse->TabColonnes[4]->Etat=0;
$A1_TABLE_casse->TabColonnes[4]->bColonneLien=0;
$A1_TABLE_casse->TabColonnes[4]->SetTriable(true);
$A1_TABLE_casse->TabColonnes[4]->SetAvecLoupe(true);
$A1_TABLE_casse->TabColonnes[4]->m_bAvecFiltre=true;
$A1_TABLE_casse->TabColonnes[4]->m_eDeplaceInsere = 4;
$A1_TABLE_casse->TabColonnes[4]->m_sBulle='';
$A8_COL_User->m_eAction=6;
$A8_COL_User->m_sPageAction='';
$A8_COL_User->m_sTitre="user";

$A9_COL_Pxvt=&CreerChamp('CSaisieMonetaire');$PAGE_TABLE_CASSE->WB_AjouteChamp('COL_Pxvt','A9',$A9_COL_Pxvt,'A9_COL_Pxvt');
$A1_TABLE_casse->AjouteColonne('A9_COL_Pxvt','COL_Pxvt','A9', 5604, 4,'casse','pxvt');
$A1_TABLE_casse->TabColonnes[5]->ChampFormat->Masque='999 999 DA';
$A1_TABLE_casse->TabColonnes[5]->Visible=1;
$A1_TABLE_casse->TabColonnes[5]->Etat=0;
$A1_TABLE_casse->TabColonnes[5]->bColonneLien=0;
$A1_TABLE_casse->TabColonnes[5]->SetTriable(true);
$A1_TABLE_casse->TabColonnes[5]->SetAvecLoupe(true);
$A1_TABLE_casse->TabColonnes[5]->m_bAvecFiltre=true;
$A1_TABLE_casse->TabColonnes[5]->m_eDeplaceInsere = 4;
$A1_TABLE_casse->TabColonnes[5]->m_sBulle='';
$A9_COL_Pxvt->m_eAction=6;
$A9_COL_Pxvt->m_sPageAction='';
$A9_COL_Pxvt->m_sTitre="PRIX";

$A10_COL_Lib=&CreerChamp('CSaisie');$PAGE_TABLE_CASSE->WB_AjouteChamp('COL_Lib','A10',$A10_COL_Lib,'A10_COL_Lib');
$A1_TABLE_casse->AjouteColonne('A10_COL_Lib','COL_Lib','A10', 5600, 1,'casse','lib');
$A1_TABLE_casse->TabColonnes[2]->Visible=1;
$A1_TABLE_casse->TabColonnes[2]->Etat=0;
$A1_TABLE_casse->TabColonnes[2]->bColonneLien=0;
$A1_TABLE_casse->TabColonnes[2]->SetTriable(true);
$A1_TABLE_casse->TabColonnes[2]->SetAvecLoupe(true);
$A1_TABLE_casse->TabColonnes[2]->m_bAvecFiltre=true;
$A1_TABLE_casse->TabColonnes[2]->m_eDeplaceInsere = 4;
$A1_TABLE_casse->TabColonnes[2]->m_sBulle='';
$A10_COL_Lib->m_eAction=6;
$A10_COL_Lib->m_sPageAction='';
$A10_COL_Lib->m_sTitre="Libéllé";

$A11_COL_Date=&CreerChamp('CSaisieDate');$PAGE_TABLE_CASSE->WB_AjouteChamp('COL_Date','A11',$A11_COL_Date,'A11_COL_Date');
$A1_TABLE_casse->AjouteColonne('A11_COL_Date','COL_Date','A11', 5602, 5,'casse','date');
$A1_TABLE_casse->TabColonnes[6]->ChampFormat->Masque='JJ/MM/AAAA';
$A1_TABLE_casse->TabColonnes[6]->ChampFormat->FormatMemorise='AAAAMMJJ';
$A1_TABLE_casse->TabColonnes[6]->Visible=1;
$A1_TABLE_casse->TabColonnes[6]->Etat=0;
$A1_TABLE_casse->TabColonnes[6]->bColonneLien=0;
$A1_TABLE_casse->TabColonnes[6]->SetTriable(true);
$A1_TABLE_casse->TabColonnes[6]->SetAvecLoupe(true);
$A1_TABLE_casse->TabColonnes[6]->m_bAvecFiltre=true;
$A1_TABLE_casse->TabColonnes[6]->m_eDeplaceInsere = 4;
$A1_TABLE_casse->TabColonnes[6]->m_sBulle='';
$A11_COL_Date->m_eAction=6;
$A11_COL_Date->m_sPageAction='';
$A11_COL_Date->m_sTitre="date";

$A12_COL_EAN=&CreerChamp('CSaisie');$PAGE_TABLE_CASSE->WB_AjouteChamp('COL_EAN','A12',$A12_COL_EAN,'A12_COL_EAN');
$A1_TABLE_casse->AjouteColonne('A12_COL_EAN','COL_EAN','A12', 5600, 6,'casse','EAN');
$A1_TABLE_casse->TabColonnes[7]->Visible=1;
$A1_TABLE_casse->TabColonnes[7]->Etat=0;
$A1_TABLE_casse->TabColonnes[7]->bColonneLien=0;
$A1_TABLE_casse->TabColonnes[7]->SetTriable(true);
$A1_TABLE_casse->TabColonnes[7]->SetAvecLoupe(true);
$A1_TABLE_casse->TabColonnes[7]->m_bAvecFiltre=true;
$A1_TABLE_casse->TabColonnes[7]->m_eDeplaceInsere = 4;
$A1_TABLE_casse->TabColonnes[7]->m_sBulle='';
$A12_COL_EAN->m_eAction=6;
$A12_COL_EAN->m_sPageAction='';
$A12_COL_EAN->m_sTitre="EAN";

$A13_COL_Art=&CreerChamp('CSaisieNumerique');$PAGE_TABLE_CASSE->WB_AjouteChamp('COL_Art','A13',$A13_COL_Art,'A13_COL_Art');
$A1_TABLE_casse->AjouteColonne('A13_COL_Art','COL_Art','A13', 5601, 0,'casse','art');
$A1_TABLE_casse->TabColonnes[1]->ChampFormat->Masque='99999999';
$A1_TABLE_casse->TabColonnes[1]->Visible=1;
$A1_TABLE_casse->TabColonnes[1]->Etat=0;
$A1_TABLE_casse->TabColonnes[1]->bColonneLien=0;
$A1_TABLE_casse->TabColonnes[1]->SetTriable(true);
$A1_TABLE_casse->TabColonnes[1]->SetAvecLoupe(true);
$A1_TABLE_casse->TabColonnes[1]->m_bAvecFiltre=true;
$A1_TABLE_casse->TabColonnes[1]->m_eDeplaceInsere = 4;
$A1_TABLE_casse->TabColonnes[1]->m_sBulle='';
$A13_COL_Art->m_eAction=6;
$A13_COL_Art->m_sPageAction='';
$A13_COL_Art->m_sTitre="Code Article";

$A6_BTN_Supprimer=&CreerChamp('CBouton');$PAGE_TABLE_CASSE->WB_AjouteChamp('BTN_Supprimer','A6',$A6_BTN_Supprimer,'A6_BTN_Supprimer');
$A6_BTN_Supprimer->m_bLibelleRiche=true;

$M3_MENU_MODELE_PRINCIPAL=&CreerChamp('CChampMenu');$PAGE_TABLE_CASSE->WB_AjouteChamp('MENU_MODELE_PRINCIPAL','M3',$M3_MENU_MODELE_PRINCIPAL,'M3_MENU_MODELE_PRINCIPAL');
$M3_MENU_MODELE_PRINCIPAL->m_bVertical = false;

$M41_LIB_TITRE=&CreerChamp('CLibelle');$PAGE_TABLE_CASSE->WB_AjouteChamp('LIB_TITRE','M41',$M41_LIB_TITRE,'M41_LIB_TITRE');

$M2_ZONE_Layout_Area_CONTENT=&CreerChamp('CChampCelluleMiseEnPage');$PAGE_TABLE_CASSE->WB_AjouteChamp('ZONE_Layout_Area_CONTENT','M2',$M2_ZONE_Layout_Area_CONTENT,'M2_ZONE_Layout_Area_CONTENT');



//-----------------------------------------------------------------------
//  Initialisation de la valeur des champs
//-----------------------------------------------------------------------
$A1_TABLE_casse->Valeur = '';
$A1_TABLE_casse->m_nHauteur = 520;
$A1_TABLE_casse->m_nLargeur = 805;
$A1_TABLE_casse->m_nOpacite = 100;
$A1_TABLE_casse->m_nCadrageHorizontal = 1;
$A1_TABLE_casse->m_nCadrageVertical = -1;
$A1_TABLE_casse->m_Police->m_bGras = false;
$A1_TABLE_casse->m_Police->m_bItalique = false;
$A1_TABLE_casse->m_Police->m_bSouligne = false;
$A1_TABLE_casse->m_nX = 0;
$A1_TABLE_casse->m_nY = 1;


$A1_TABLE_casse->lierVM('PAGE_Table_casse','TABLE_casse','A1_TABLE_casse');
$A2_COL_Qtite->Libelle = 'Qtité';
$A2_COL_Qtite->Masque = '99 999';
$A2_COL_Qtite->m_nHauteur = 520;
$A2_COL_Qtite->m_nLargeur = 55;
$A2_COL_Qtite->m_nOpacite = 100;
$A2_COL_Qtite->m_nCadrageHorizontal = 1;
$A2_COL_Qtite->m_nCadrageVertical = -1;
$A2_COL_Qtite->m_Police->m_bGras = false;
$A2_COL_Qtite->m_Police->m_bItalique = false;
$A2_COL_Qtite->m_Police->m_bSouligne = false;
$A2_COL_Qtite->m_nX = 0;
$A2_COL_Qtite->m_nY = 0;


$A2_COL_Qtite->lierVM('PAGE_Table_casse','COL_Qtite','A2_COL_Qtite');
$A8_COL_User->Couleur = 0x333333;
$A8_COL_User->CouleurInitiale = 0x333333;
$A8_COL_User->Libelle = 'user';
$A8_COL_User->Masque = '0';
$A8_COL_User->m_nHauteur = 520;
$A8_COL_User->m_nLargeur = 68;
$A8_COL_User->m_nOpacite = 100;
$A8_COL_User->m_nCadrageHorizontal = 1;
$A8_COL_User->m_nCadrageVertical = -1;
$A8_COL_User->m_Police->m_bGras = false;
$A8_COL_User->m_Police->m_bItalique = false;
$A8_COL_User->m_Police->m_bSouligne = false;
$A8_COL_User->m_Police->m_sNom = 'Tahoma, Geneva, sans-serif';
$A8_COL_User->m_Police->m_nTaille = '9';
$A8_COL_User->m_nX = 0;
$A8_COL_User->m_nY = 0;


$A8_COL_User->lierVM('PAGE_Table_casse','COL_User','A8_COL_User');
$A9_COL_Pxvt->Couleur = 0x333333;
$A9_COL_Pxvt->CouleurInitiale = 0x333333;
$A9_COL_Pxvt->Libelle = 'PRIX';
$A9_COL_Pxvt->Masque = '999 999 DA';
$A9_COL_Pxvt->m_nHauteur = 520;
$A9_COL_Pxvt->m_nLargeur = 72;
$A9_COL_Pxvt->m_nOpacite = 100;
$A9_COL_Pxvt->m_nCadrageHorizontal = 1;
$A9_COL_Pxvt->m_nCadrageVertical = -1;
$A9_COL_Pxvt->m_Police->m_bGras = false;
$A9_COL_Pxvt->m_Police->m_bItalique = false;
$A9_COL_Pxvt->m_Police->m_bSouligne = false;
$A9_COL_Pxvt->m_Police->m_sNom = 'Tahoma, Geneva, sans-serif';
$A9_COL_Pxvt->m_Police->m_nTaille = '9';
$A9_COL_Pxvt->m_nX = 0;
$A9_COL_Pxvt->m_nY = 0;


$A9_COL_Pxvt->lierVM('PAGE_Table_casse','COL_Pxvt','A9_COL_Pxvt');
$A10_COL_Lib->Couleur = 0x333333;
$A10_COL_Lib->CouleurInitiale = 0x333333;
$A10_COL_Lib->Libelle = 'Libéllé';
$A10_COL_Lib->Masque = '0';
$A10_COL_Lib->m_nHauteur = 520;
$A10_COL_Lib->m_nLargeur = 222;
$A10_COL_Lib->m_nOpacite = 100;
$A10_COL_Lib->m_nCadrageVertical = -1;
$A10_COL_Lib->m_Police->m_bGras = false;
$A10_COL_Lib->m_Police->m_bItalique = false;
$A10_COL_Lib->m_Police->m_bSouligne = false;
$A10_COL_Lib->m_Police->m_sNom = 'Tahoma, Geneva, sans-serif';
$A10_COL_Lib->m_Police->m_nTaille = '9';
$A10_COL_Lib->m_nX = 0;
$A10_COL_Lib->m_nY = 0;


$A10_COL_Lib->lierVM('PAGE_Table_casse','COL_Lib','A10_COL_Lib');
$A11_COL_Date->Couleur = 0x333333;
$A11_COL_Date->CouleurInitiale = 0x333333;
$A11_COL_Date->Libelle = 'date';
$A11_COL_Date->Masque = 'JJ/MM/AAAA';
$A11_COL_Date->m_nHauteur = 520;
$A11_COL_Date->m_nLargeur = 95;
$A11_COL_Date->m_nOpacite = 100;
$A11_COL_Date->m_nCadrageHorizontal = 1;
$A11_COL_Date->m_nCadrageVertical = -1;
$A11_COL_Date->m_Police->m_bGras = false;
$A11_COL_Date->m_Police->m_bItalique = false;
$A11_COL_Date->m_Police->m_bSouligne = false;
$A11_COL_Date->m_Police->m_sNom = 'Tahoma, Geneva, sans-serif';
$A11_COL_Date->m_Police->m_nTaille = '9';
$A11_COL_Date->m_nX = 0;
$A11_COL_Date->m_nY = 0;


$A11_COL_Date->lierVM('PAGE_Table_casse','COL_Date','A11_COL_Date');
$A12_COL_EAN->Couleur = 0x333333;
$A12_COL_EAN->CouleurInitiale = 0x333333;
$A12_COL_EAN->Libelle = 'EAN';
$A12_COL_EAN->Masque = '0';
$A12_COL_EAN->m_nHauteur = 520;
$A12_COL_EAN->m_nLargeur = 141;
$A12_COL_EAN->m_nOpacite = 100;
$A12_COL_EAN->m_nCadrageHorizontal = 1;
$A12_COL_EAN->m_nCadrageVertical = -1;
$A12_COL_EAN->m_Police->m_bGras = false;
$A12_COL_EAN->m_Police->m_bItalique = false;
$A12_COL_EAN->m_Police->m_bSouligne = false;
$A12_COL_EAN->m_Police->m_sNom = 'Tahoma, Geneva, sans-serif';
$A12_COL_EAN->m_Police->m_nTaille = '9';
$A12_COL_EAN->m_nX = 0;
$A12_COL_EAN->m_nY = 0;


$A12_COL_EAN->lierVM('PAGE_Table_casse','COL_EAN','A12_COL_EAN');
$A13_COL_Art->Couleur = 0x333333;
$A13_COL_Art->CouleurInitiale = 0x333333;
$A13_COL_Art->Libelle = 'Code Article';
$A13_COL_Art->Masque = '99999999';
$A13_COL_Art->m_nHauteur = 520;
$A13_COL_Art->m_nLargeur = 139;
$A13_COL_Art->m_nOpacite = 100;
$A13_COL_Art->m_nCadrageHorizontal = 1;
$A13_COL_Art->m_nCadrageVertical = -1;
$A13_COL_Art->m_Police->m_bGras = false;
$A13_COL_Art->m_Police->m_bItalique = false;
$A13_COL_Art->m_Police->m_bSouligne = false;
$A13_COL_Art->m_Police->m_sNom = 'Tahoma, Geneva, sans-serif';
$A13_COL_Art->m_Police->m_nTaille = '9';
$A13_COL_Art->m_nX = 0;
$A13_COL_Art->m_nY = 0;


$A13_COL_Art->lierVM('PAGE_Table_casse','COL_Art','A13_COL_Art');
$A6_BTN_Supprimer->Libelle = function_exists("construireTexteRiche_A6_BTN_Supprimer") ? null : 'Supprimer';


$A6_BTN_Supprimer->lierVM('PAGE_Table_casse','BTN_Supprimer','A6_BTN_Supprimer');
$M3_MENU_MODELE_PRINCIPAL->Libelle = 'Bouton';


$M3_MENU_MODELE_PRINCIPAL->lierVM('PAGE_Table_casse','MENU_MODELE_PRINCIPAL','M3_MENU_MODELE_PRINCIPAL');
$M41_LIB_TITRE->Libelle = 'Liste des casse (partagé)(s)';
$M41_LIB_TITRE->Valeur = 'Liste des casse (partagé)(s)';
$M41_LIB_TITRE->ValeurInitiale = 'Liste des casse (partagé)(s)';
$M41_LIB_TITRE->Masque = 0;


$M41_LIB_TITRE->lierVM('PAGE_Table_casse','LIB_TITRE','M41_LIB_TITRE');


$M2_ZONE_Layout_Area_CONTENT->lierVM('PAGE_Table_casse','ZONE_Layout_Area_CONTENT','M2_ZONE_Layout_Area_CONTENT');


//  Ouverture de l'analyse 
	HOuvreAnalyse($CheminRepRes.'cession.xdd');
//-----------------------------------------------------------------------
// Implémentation des Traitements 
//-----------------------------------------------------------------------
//-----------------------------------------------------------------------
// Procédures locales de la page
//-----------------------------------------------------------------------
// Code d'initialisation de page
function& PAGE_Table_casse28_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Table_casse','PAGE_Table_casse');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
// Code de 1er affichage de page
//Clic de BTN_Supprimer (serveur PHP) :: (PCode de Clic)
function& A6_BTN_Supprimer16()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Table_casse','A6_BTN_Supprimer');
	global $A1_TABLE_casse;
	
	
	if (VersBooleen(Info('Voulez-vous vraiment supprimer l\'enregistrement ?')))
	{
		VerifieMethodeEtAppel("CTable",'TableSupprimeSelect','Clic de BTN_Supprimer (serveur PHP)',"Table",$A1_TABLE_casse);
		VerifieMethodeEtAppel("CTable",'TableAffiche','Clic de BTN_Supprimer (serveur PHP)',"Table",$A1_TABLE_casse,getRef('*'));
	}
	return _return ($_PHP_VAR_RETURN_);
}
//Initialisation de LIB_TITRE (serveur PHP) :: (PCode de Initialisation)
function& M41_LIB_TITRE12_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Table_casse','M41_LIB_TITRE');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
function& M41_LIB_TITRE12()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Table_casse','M41_LIB_TITRE');
	
	
	ExecuteAncetre('M41_LIB_TITRE12_0');
	return _return ($_PHP_VAR_RETURN_);
}
//Initialisation de ZONE_Layout_Area_CONTENT (serveur PHP) :: (PCode de Initialisation)
function& M2_ZONE_Layout_Area_CONTENT12_0()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Table_casse','M2_ZONE_Layout_Area_CONTENT');
	
	
	return _return ($_PHP_VAR_RETURN_);
}
function& M2_ZONE_Layout_Area_CONTENT12()
{
	$WB_NIVEAU_PILE=empileVM('PAGE_Table_casse','M2_ZONE_Layout_Area_CONTENT');
	
	
	ExecuteAncetre('M2_ZONE_Layout_Area_CONTENT12_0');
	return _return ($_PHP_VAR_RETURN_);
}

//-----------------------------------------------------------------------
// Codes d'initialisation des champ et de la page
//-----------------------------------------------------------------------
$A1_TABLE_casse->SetSourceRemplissage("casse", "id", "", "id", 1, "", 0);

// Code de déclaration des globales de page

// Code d'initalisation de M41_LIB_TITRE
	M41_LIB_TITRE12();
// Code d'initalisation de M2_ZONE_Layout_Area_CONTENT
	M2_ZONE_Layout_Area_CONTENT12();

$A1_TABLE_casse->InitRemplissage();

// Code d'initialisation de page
	PAGE_Table_casse28_0();

//-----------------------------------------------------------------------
//  Affectation des champ, recherche du Traitement à exécuter 
//-----------------------------------------------------------------------
if(!GereActions( $PAGE_TABLE_CASSE)){
$_BTNACTION = TrouveBouton( $PAGE_TABLE_CASSE );
if ($_BTNACTION=='A6') { 
//-------------------------------------------------------------------
//  PCodes de A6_BTN_Supprimer
//-------------------------------------------------------------------
	A6_BTN_Supprimer16();

}

}
if ( !bRenvoitCodeHTML($PAGE_TABLE_CASSE,false)) exit();
?>
<!DOCTYPE html>
<html lang="fr" class="no-js htmlstd html5">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $MaPage->GetLibelle(); ?></title><meta name="generator" content="WEBDEV">
<meta name="Description" lang="fr" content="<?php echo $MaPage->GetDescription(); ?>">
<meta name="keywords" lang="fr" content="<?php echo $MaPage->GetMotsCles(); ?>">
<?php echo $MaPage->GetHTMLEnteteHTML(); ?><style type="text/css">.wblien,.wblienHorsZTR {border:0;background:transparent;padding:0;text-align:center;box-shadow:none; color:#6E7D87;}.wblienHorsZTR {border:0 !important;background:transparent !important;outline-width:0 !important;} :not(.wblienHorsZTR[class^=l-]) {box-shadow: none !important;}a:active{}a:visited{}*::-moz-selection{color:#FFFFFF;background-color:#000080;}::selection{color:#FFFFFF;background-color:#000080;}</style><link rel="stylesheet" type="text/css" href="res/standard.css?d3829d64">
<link rel="stylesheet" type="text/css" href="res/static.css?e8f9f2f8">
<link rel="stylesheet" type="text/css" href="PAGE_Table_casse_style.css?c09d5f20">
<link rel="stylesheet" type="text/css" href="Evolution190EvolutionGrayVolution.css?aadc2ec">
<link rel="stylesheet" type="text/css" href="cession190EvolutionGrayVolution.css?8e066e05">
<link rel="stylesheet" type="text/css" href="palette-GrayVolution.css?f3a01fc9">
<link rel="stylesheet" type="text/css" href="res/WDMenu.css?aec70a64">
<style type="text/css">
body{line-height:normal;height:100%;width:100%;margin:0 auto;width:100%;height:100%;position:relative; color:#333333;}html,body { background-color:#E5E5E5;}#page{position:relative; background-color:#F3F3F3;min-width:1149px;width:auto !important;width:1149px;}html, form {height:100%;}.l-0{text-align:center;}.l-1,.l-3{font-family:Tahoma, Geneva, sans-serif;font-size:9pt;color:#333333;line-height:1.400000;text-align:center;}.l-2{font-family:Tahoma, Geneva, sans-serif;font-size:9pt;color:#333333;line-height:1.400000;text-align:left;}.htmlstd .l-1.wbgrise,.htmlstd .l-2.wbgrise,.htmlstd .l-3.wbgrise{color:#808080;}.M31{ }#M16,#bzM16{border-top:none;border-right:none;border-bottom:solid 1px #D9D9D9;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.dzM31{width:80px;height:80px;;overflow-x:hidden;overflow-y:hidden;position:relative}#M3 div.WDSousOnglet tr.WDMenuOptionHover ,#M3 div.WDSousOnglet tr.WDMenuOptionSelectHover {color:#737373;text-decoration:none ;background-color:#FFFFFF;}#M3 td,#M3 td a{font-family:Tahoma, Geneva, sans-serif;font-size:9pt;color:#737373;text-align:center;vertical-align:middle;}#M3 div.WDSousOnglet table tr { border:0;background:none; } 
#M3 div.WDSousOnglet table, #M3 div.WDSousOnglet table tr{background-color:#E5E5E5;border-style:solid;border-width:1px;border-color:#D9D9D9;border-collapse:collapse;empty-cells:show;border-spacing:0;background-image:none;}#M3 div.WDSousOnglet td,#M3 div.WDSousOnglet td a{font-family:Tahoma, Geneva, sans-serif;font-size:9pt;color:#8D8D8D;text-decoration:none ;vertical-align:middle;}#M3 td.WDOngletOptionHover .WDOngletOptionH .WDOngletOptionM a{color:#737373;box-shadow:0 -1px 0 0 #D9D9D9 inset,0 -2px 0 0 #FFFFFF inset,0 -6px 0 0 #6E7D87 inset;;box-shadow:none;}#M3 td.WDOngletOptionG div{width:16px;}#M3 td.WDOngletOptionD div{width:16px;}#M3 td.WDOngletOptionHover td.WDOngletOptionM,#M3 td.WDOngletOptionHover td.WDOngletOptionM a,#M3 td.WDOngletOptionSelectHover td.WDOngletOptionM,#M3 td.WDOngletOptionSelectHover td.WDOngletOptionM a{color:#737373;}#M3 td.WDOngletOptionSelect{color:#333333;box-shadow:0 -1px 0 0 #D9D9D9 inset,0 -2px 0 0 #FFFFFF inset,0 -6px 0 0 #6E7D87 inset;;box-shadow:none;}#M3 td.WDOngletOptionSelect td.WDOngletOptionM,#M3 td.WDOngletOptionSelect td.WDOngletOptionM a{color:#333333;box-shadow:0 -1px 0 0 #D9D9D9 inset,0 -2px 0 0 #FFFFFF inset,0 -6px 0 0 #6E7D87 inset;;box-shadow:none;}#M3 tr.WDMenuOptionHover ,#M3 tr.WDMenuOptionSelectHover ,#M3 td.WDOngletOptionHover ,#M3 td.WDOngletOptionSelectHover  .WDOngletOptionH a{color:#737373;cursor:pointer;box-shadow:0 -1px 0 0 #D9D9D9 inset,0 -2px 0 0 #FFFFFF inset,0 -6px 0 0 #6E7D87 inset;;box-shadow:none;}#M3 td.WDMenuTDImage div{width:16px;}#M3 td.WDMenuTDPopup div{width:16px;}#M3 td.WDMenuTDLien{padding-left:4px;}#M3 td.WDMenuTDLien,#M3 td.WDMenuTDLien a,#M3 tr.WDMenuOptionHover tr.WDMenuOption td.WDMenuTDLien,#M3 tr.WDMenuOptionHover tr.WDMenuOption td.WDMenuTDLien a,#M3 tr.WDMenuOptionSelectHover tr.WDMenuOption td.WDMenuTDLien,#M3 tr.WDMenuOptionSelectHover tr.WDMenuOption td.WDMenuTDLien a{color:#737373;}#M3 div.WDSousOnglet td.WDMenuTDLien,#M3 div.WDSousOnglet td.WDMenuTDLien a,#M3 td.WDOngletOptionHover div.WDSousOnglet tr.WDMenuOption td.WDMenuTDLien,#M3 td.WDOngletOptionHover div.WDSousOnglet tr.WDMenuOption td.WDMenuTDLien a,#M3 td.WDOngletOptionSelectHover div.WDSousOnglet tr.WDMenuOption td.WDMenuTDLien,#M3 td.WDOngletOptionSelectHover div.WDSousOnglet tr.WDMenuOption td.WDMenuTDLien a{color:#8D8D8D;}#M3 tr.WDMenuOptionHover td.WDMenuTDLien,#M3 tr.WDMenuOptionHover td.WDMenuTDLien a,#M3 tr.WDMenuOptionSelectHover td.WDMenuTDLien,#M3 tr.WDMenuOptionSelectHover td.WDMenuTDLien a{color:#737373;}#M3 td.WDOngletOptionHover div.WDSousOnglet td.WDMenuTDLien,#M3 td.WDOngletOptionHover div.WDSousOnglet td.WDMenuTDLien a,#M3 td.WDOngletOptionSelectHover div.WDSousOnglet td.WDMenuTDLien,#M3 td.WDOngletOptionSelectHover div.WDSousOnglet td.WDMenuTDLien a{color:#737373;}#M3 tr.WDMenuSepHaut td{border-top:none;border-right:none;border-bottom:solid 1px #D9D9D9;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}#M3 td.WDOngletOption{font-family:Tahoma, Geneva, sans-serif;font-size:9pt;color:#737373;text-align:center;vertical-align:middle;}#M3 td.WDOngletOptionHover{color:#737373;box-shadow:0 -1px 0 0 #D9D9D9 inset,0 -2px 0 0 #FFFFFF inset,0 -6px 0 0 #6E7D87 inset;}#M3 td.WDOngletOptionSelectHover{color:#737373;box-shadow:0 -1px 0 0 #D9D9D9 inset,0 -2px 0 0 #FFFFFF inset,0 -6px 0 0 #6E7D87 inset;}#M3 td.WDOngletOptionSelect{color:#333333;box-shadow:0 -1px 0 0 #D9D9D9 inset,0 -2px 0 0 #FFFFFF inset,0 -6px 0 0 #6E7D87 inset;}#M3 .tr.WDMenuOption tr.WDMenuOption{font-family:Tahoma, Geneva, sans-serif;font-size:9pt;color:#8D8D8D;text-decoration:none ;vertical-align:middle;background-color:#E5E5E5;}#M3 .tr.WDMenuOption tr.WDMenuOptionHover{color:#737373;text-decoration:none ;background-color:#FFFFFF;}
#b-A1{border-style:solid;border-width:1px;border-color:#D3D3D3;border-collapse:collapse;empty-cells:show;border-spacing:0;}#ttA13,.ttA13,#ttA10,.ttA10,#ttA2,.ttA2,#ttA8,.ttA8,#ttA9,.ttA9,#ttA11,.ttA11,#ttA12,.ttA12{border-top:none;border-right:solid 1px #D3D3D3;border-bottom:solid 1px #D3D3D3;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}#tzcA1{border-top:solid 1px #D3D3D3;border-right:solid 1px #D3D3D3;border-bottom:none;border-left:solid 1px #D3D3D3;border-collapse:collapse;empty-cells:show;border-spacing:0;}#tzdA1{border-top:none;border-right:solid 1px #D3D3D3;border-bottom:solid 1px #D3D3D3;border-left:solid 1px #D3D3D3;border-collapse:collapse;empty-cells:show;border-spacing:0;}.communbc-A13{border-top:none;border-right:solid 1px #D3D3D3;border-bottom:none;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA13{width:133px;}.communbc-A10{border-top:none;border-right:solid 1px #D3D3D3;border-bottom:none;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA10{width:220px;}.communbc-A2{border-top:none;border-right:solid 1px #D3D3D3;border-bottom:none;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA2{width:53px;}.communbc-A8{border-top:none;border-right:solid 1px #D3D3D3;border-bottom:none;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA8{width:66px;}.communbc-A9{border-top:none;border-right:solid 1px #D3D3D3;border-bottom:none;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA9{width:70px;}.communbc-A11{border-top:none;border-right:solid 1px #D3D3D3;border-bottom:none;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA11{width:93px;}.communbc-A12{border-top:none;border-right:solid 1px #D3D3D3;border-bottom:none;border-left:none;border-collapse:collapse;empty-cells:show;border-spacing:0;}.wbcolA12{width:139px;}#M18,#bzM18{border-top:solid 1px #FFFFFF;border-right:solid 1px #D3D3D3;border-bottom:solid 2px #D3D3D3;border-left:solid 1px #D3D3D3;border-collapse:collapse;empty-cells:show;border-spacing:0;}.M7{ }.dzM7{width:80px;height:28px;;overflow-x:hidden;overflow-y:hidden;position:relative}.wbplanche{background-repeat:repeat;background-position:0% 0%;background-attachment:scroll;background-size:auto auto;background-origin:padding-box;}.wbplancheLibInc{_font-size:1px;}</style><style id="wbStyleAncrageIE11" type="text/css">/*<!--*/ @media all and (-ms-high-contrast:none) { *::-ms-backdrop, #page, tr[style*='height: 100%']>td>*[style*='height: 100%'] { height:auto !important; } }  /* IE11 -->*/</style><script src="res/modernizr-2.5.3.js"></script></head><body onload="FinInitJS();<?php echo WB_AfficheInfo(); ?>;_PAGE_TABLE_CASSE_LOD(event) " onunload="_UNL_COM(event); "><form name="PAGE_TABLE_CASSE" action="<?php echo basename(__FILE__); ?>" target="_self" method="post" class="ancragecenter"><div class="h-0"><input type="hidden" name="WD_BUTTON_CLICK_" value="A6"><input type="hidden" name="WD_ACTION_" value=""></div><table style="height:100%;width:1149px"><tr style="height:100%"><td><table style="width:1149px;height:100.00%"><tr style="height:100.00%"><td style="width:1149px"><div style="height:100%;min-width:1149px;width:auto !important;width:1149px;" class="lh0"><div  id="page" class="clearfix pos1"><table style="width:1149px;height:100.00%"><tr style="height:132px"><td style="width:1149px"><div style="height:100%;min-width:1149px;width:auto !important;width:1149px;" class="lh0"><header  class="pos2"><div  class="pos3"><table style=" background-color:#F3F3F3;" id="M1">
<tr><td style=" height:132px; width:1016px;"><div  class="pos4"><div  class="pos5"><div  class="pos6"><table id="M6">
<tr><td style=" height:96px; width:1016px;"><div  class="pos7"><div  class="pos8"><div  class="pos9"><div class="lh0 dzSpan dzM31" id="dzM31" style="min-height:80px\9;"><img src="res/Logo190_EvolutionGrayVolution.png" alt="" id="M31" class="Image padding" style="display:block;border:0;"></div></div></div><div  class="pos10"><div  class="pos11"><table style=" width:845px;height:74px;"><tr><td id="tzM19" class="Titre-Site"><a id="M19" class="Titre-Site wblienHorsZTR padding">&lt;Indiquez ici le nom du site&gt;</a></td></tr></table></div></div></div></td></tr></table></div></div><nav  class="pos12"><div  class="pos13"><table style=" background-color:#FFFFFF;border-collapse:separate;position:relative;border-spacing:0;" id="M16">
<tr><td style=" height:35px; width:1016px;"><div class="ff3fix63895rel" style=""><table style="position:relative;width:100%;height:100%;margin-bottom:-3px"><tr style="height:100%"><td><div  class="pos14"><div  class="pos15"><table style=" width:746px;height:22px;"><tr><td id="tzM41" class="Titre-Normal-Gras padding">Liste des casse (partagé)(s)</td></tr></table></div></div></td></tr><tr style="height:1px"><td><div id="dwwM3" style="position:absolute;left:0px;top:97px;width:0px;height:36px;z-index:24;display:none;"><table id="M3" class="WDOngletMain effet" onclick="clM3.OnClick(event)"><tr><div><!-- --></div></tr></table></div></td></tr></table></div></td></tr></table></div></nav></div></td></tr></table></div></header></div></td></tr><tr style="height:6px"><td style="width:1149px"></td></tr><tr style="height:100.00%"><td style="width:1149px"><div style="height:100%;min-width:1149px;width:auto !important;width:1149px;" class="lh0"><table style="width:1149px;height:100.00%"><tr style="height:100%"><td style="width:6px"></td><td style="width:1017px"><div style="height:100%;min-width:1017px;width:auto !important;width:1017px;" class="lh0"><table style="height:100%;" id="M2">
<tr><td style=" width:1017px;"><table style="width:1017px;height:100.00%"><tr style="height:100.00%"><td style="width:1017px"><div style="height:100%;min-width:1017px;width:auto !important;width:1017px;" class="lh0"><table style="width:1017px;height:100.00%"><tr style="height:100%"><td style="width:33px"><div style="height:100%;min-width:33px;width:auto !important;width:33px;" class="lh0"><table style="width:33px;height:100.00%"><tr style="height:6px"><td style="width:33px"></td></tr><tr style="height:100.00%"><td style="width:33px"><aside  class="pos16"><table style=" background-color:#F8F8F8;border-collapse:separate;height:100%;border-spacing:0;" id="M18">
<tr><td style=" width:31px;"></td></tr></table></aside></td></tr></table></div></td><td style="width:19px"></td><td style="width:956px"><div style="height:100%;min-width:956px;width:auto !important;width:956px;" class="lh0"><table style="width:956px;height:100.00%"><tr style="height:42px"><td style="width:956px"><div style="height:100%;min-width:956px;width:auto !important;width:956px;" class="lh0"><section  class="pos17"><div  class="pos18"><table id="M17">
<tr><td style=" height:42px; width:955px;"><div  class="pos19"></div></td></tr></table></div></section></div></td></tr><tr style="height:100.00%"><td style="width:956px"><div style="height:100%;min-width:956px;width:auto !important;width:956px;" class="lh0"><table style="width:956px;height:100.00%"><tr style="height:100%"><td style="width:6px"></td><td style="width:943px"><div style="height:100%;min-width:943px;width:auto !important;width:943px;" class="lh0"><table style="height:100%;" id="M9">
<tr><td style=" width:943px;"><div  class="pos20"><div  class="pos21"><div  class="pos22"><input type=hidden name="A1" value="<?php echo $A1_TABLE_casse->Valeur ?>"><input type=hidden name="A1_DEB" value="<?php echo $A1_TABLE_casse->GetFirstIndex()+1 ?>"><input type=hidden name="_A1_OCC" value="<?php echo $A1_TABLE_casse->GetNbEnregAffiche() ?>"><INPUT TYPE="hidden" SIZE="0" NAME="A1_FORMAT_0" VALUE="" onkeypress="return VerifSaisieNombre(event,'99999999'); " onblur="reinitNombre(event,'99999999');return VerifRegExp(this,'^(\\d|'+_WW_SEPMILLIER_+'){1,8}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'99999999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A1_FORMAT_0" class="A1_FORMAT_0 padding" autocomplete="off"><INPUT TYPE="hidden" SIZE="0" NAME="A1_FORMAT_2" VALUE="" onkeypress="return VerifSaisieNombre(event,'99 999'); " onblur="reinitNombre(event,'99 999');return VerifRegExp(this,'^(\\d|'+_WW_SEPMILLIER_+'){1,6}$'); " onfocus="var b=(this.value.length==0);initNombre(event,'99 999');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A1_FORMAT_2" class="A1_FORMAT_2 padding" autocomplete="off" multiple="multiple"><INPUT TYPE="hidden" SIZE="0" NAME="A1_FORMAT_4" VALUE="" id="A1_FORMAT_4" class="A1_FORMAT_4 padding" autocomplete="off" multiple="multiple"><INPUT TYPE="hidden" SIZE="0" NAME="A1_FORMAT_5" VALUE="" onkeypress="return JJMMAA(event,'JJ/MM/AAAA'); " onblur="reinit(event,'JJ/MM/AAAA');return VerifRegExp(this,'^([1-9]|[0-2]\\d|3[0-1])\\/((0){0,1}[1-9]|1[0-2])\\/\\d{1,4}$'); " onfocus="var b=(this.value.length==0);init(event,'JJ/MM/AAAA');var s=this.value;if(b=(b&&(s.length>0)))this.value='';;if(b&&(this.value.length==0)){this.value=s;SetPositionCaret(this,0);} " id="A1_FORMAT_5" class="A1_FORMAT_5 padding" autocomplete="off"><table id="ctzA1" style="border-spacing:0; width:805px;" class="cellpadding0">
 <tr><td colspan=1  style="height:0;" id="A1" class="aligncenter Normal-Centre padding"><?php echo $A1_TABLE_casse->Libelle; ?></td><td></td></tr><tr style="border:0" id="ttA1"><td id="tzcA1" style="width:100%;border-bottom-width:0"><div style="overflow:hidden;width:788px;position:relative;"><table id="A1_TITRES_POS" style=" width:100%;"><tr id="A1_TITRES"><td id="ttA13" style="border-left-width:0;border-top-width:0;" class="Titre-Colonne padding"><div style="overflow:hidden;height:15px;position:relative" class="wbcolA13"><div id="A1_TITRES_0" style=""><table style="width:100%"><tr><td style="border:0;height:15px" class="Titre-Colonne ttA13">Code Article</td></tr></table></div><img src="res/TableTri.gif" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none" id="A1_TITRES_TRI_0" onclick="clA1.OnTriColonne(0,event)" alt="none"><img src="res/TableCherche.gif" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none" id="A1_TITRES_RECH_0" alt=""></div></td><td style="" class="wbtablesep Titre-Colonne"><div onmousedown="clA1.OnRedimCol(event,0,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:15px">&nbsp;<!-- --></div></td>
<td id="ttA10" style="border-left-width:0;border-top-width:0;" class="Titre-Colonne padding"><div style="overflow:hidden;height:15px;position:relative" class="wbcolA10"><div id="A1_TITRES_1" style=""><table style="width:100%"><tr><td style="border:0;height:15px" class="Titre-Colonne ttA10">Libéllé</td></tr></table></div><img src="res/TableTri.gif" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none" id="A1_TITRES_TRI_1" onclick="clA1.OnTriColonne(1,event)" alt="none"><img src="res/TableCherche.gif" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none" id="A1_TITRES_RECH_1" alt=""></div></td><td style="" class="wbtablesep Titre-Colonne"><div onmousedown="clA1.OnRedimCol(event,1,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:15px">&nbsp;<!-- --></div></td>
<td id="ttA2" style="border-left-width:0;border-top-width:0;" class="Titre-Colonne padding"><div style="overflow:hidden;height:15px;position:relative" class="wbcolA2"><div id="A1_TITRES_2" style=""><table style="width:100%"><tr><td style="border:0;height:15px" class="Titre-Colonne ttA2">Qtité</td></tr></table></div><img src="res/TableTri.gif" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none" id="A1_TITRES_TRI_2" onclick="clA1.OnTriColonne(2,event)" alt="none"><img src="res/TableCherche.gif" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none" id="A1_TITRES_RECH_2" alt=""></div></td><td style="" class="wbtablesep Titre-Colonne"><div onmousedown="clA1.OnRedimCol(event,2,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:15px">&nbsp;<!-- --></div></td>
<td id="ttA8" style="border-left-width:0;border-top-width:0;" class="Titre-Colonne padding"><div style="overflow:hidden;height:15px;position:relative" class="wbcolA8"><div id="A1_TITRES_3" style=""><table style="width:100%"><tr><td style="border:0;height:15px" class="Titre-Colonne ttA8">user</td></tr></table></div><img src="res/TableTri.gif" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none" id="A1_TITRES_TRI_3" onclick="clA1.OnTriColonne(3,event)" alt="none"><img src="res/TableCherche.gif" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none" id="A1_TITRES_RECH_3" alt=""></div></td><td style="" class="wbtablesep Titre-Colonne"><div onmousedown="clA1.OnRedimCol(event,3,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:15px">&nbsp;<!-- --></div></td>
<td id="ttA9" style="border-left-width:0;border-top-width:0;" class="Titre-Colonne padding"><div style="overflow:hidden;height:15px;position:relative" class="wbcolA9"><div id="A1_TITRES_4" style=""><table style="width:100%"><tr><td style="border:0;height:15px" class="Titre-Colonne ttA9">PRIX</td></tr></table></div><img src="res/TableTri.gif" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none" id="A1_TITRES_TRI_4" onclick="clA1.OnTriColonne(4,event)" alt="none"><img src="res/TableCherche.gif" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none" id="A1_TITRES_RECH_4" alt=""></div></td><td style="" class="wbtablesep Titre-Colonne"><div onmousedown="clA1.OnRedimCol(event,4,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:15px">&nbsp;<!-- --></div></td>
<td id="ttA11" style="border-left-width:0;border-top-width:0;" class="Titre-Colonne padding"><div style="overflow:hidden;height:15px;position:relative" class="wbcolA11"><div id="A1_TITRES_5" style=""><table style="width:100%"><tr><td style="border:0;height:15px" class="Titre-Colonne ttA11">date</td></tr></table></div><img src="res/TableTri.gif" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none" id="A1_TITRES_TRI_5" onclick="clA1.OnTriColonne(5,event)" alt="none"><img src="res/TableCherche.gif" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none" id="A1_TITRES_RECH_5" alt=""></div></td><td style="" class="wbtablesep Titre-Colonne"><div onmousedown="clA1.OnRedimCol(event,5,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:15px">&nbsp;<!-- --></div></td>
<td id="ttA12" style="border-left-width:0;border-top-width:0;" class="Titre-Colonne padding"><div style="overflow:hidden;height:15px;position:relative" class="wbcolA12"><div id="A1_TITRES_6" style=""><table style="width:100%"><tr><td style="border:0;height:15px" class="Titre-Colonne ttA12">EAN</td></tr></table></div><div style="width:14px;height:0"><!-- --></div><img src="res/TableTri.gif" style="cursor:pointer;position:absolute;top:1px;left:1px;display:none" id="A1_TITRES_TRI_6" onclick="clA1.OnTriColonne(6,event)" alt="none"><img src="res/TableCherche.gif" style="cursor:pointer;position:absolute;bottom:1px;right:1px;display:none" id="A1_TITRES_RECH_6" alt=""></div></td><td style="" class="wbtablesep Titre-Colonne"><div onmousedown="clA1.OnRedimCol(event,6,14)" style="width:1px;cursor:col-resize;;overflow:hidden;height:15px">&nbsp;<!-- --></div></td>
</tr>
<tr style="border:0"><td style="border-left-width:0;border-top-width:0;" class="wbcolA13"></td><td style="" class="wbtablesep Titre-Colonne"></td>
<td style="border-left-width:0;border-top-width:0;" class="wbcolA10"></td><td style="" class="wbtablesep Titre-Colonne"></td>
<td style="border-left-width:0;border-top-width:0;" class="wbcolA2"></td><td style="" class="wbtablesep Titre-Colonne"></td>
<td style="border-left-width:0;border-top-width:0;" class="wbcolA8"></td><td style="" class="wbtablesep Titre-Colonne"></td>
<td style="border-left-width:0;border-top-width:0;" class="wbcolA9"></td><td style="" class="wbtablesep Titre-Colonne"></td>
<td style="border-left-width:0;border-top-width:0;" class="wbcolA11"></td><td style="" class="wbtablesep Titre-Colonne"></td>
<td style="border-left-width:0;border-top-width:0;" class="wbcolA12"></td><td style="" class="wbtablesep Titre-Colonne"></td>
</tr></table></div></td><td><img style="position:absolute;" align="top" alt="none" src="res/Table_ColPict190_EvolutionGrayVolution.png" onclick="WDMenuContextuel.prototype.s_OuvreExport(event,'A1')"></td></tr>
<tr><td id="tzdA1" style="width:100%;border-top-width:0;"><div style="overflow-x:auto;overflow-y:hidden;width:788px;height:501px;position:relative;z-index:1"><div style="position:relative;width:100%" id="A1_POS"><table id="A1_TB" style=" width:100%;height:501px;"><!-- { thead :  { contenu :  [  { debut : "<tr style=\"border:0\" id=\"ttA1\">",contenu :  [ "<td id=\"ttA13\" style=\"border-left-width:0;border-top-width:0;\" class=\"Titre-Colonne padding\"><div style=\"overflow:hidden;height:15px;position:relative\" class=\"wbcolA13\"><div id=\"A1_TITRES_0\" style=\"\"><table style=\"width:100%\"><tr><td style=\"border:0;height:15px\" class=\"Titre-Colonne ttA13\">Code Article</td></tr></table></div><img src=\"res/TableTri.gif\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none\" id=\"A1_TITRES_TRI_0\" onclick=\"clA1.OnTriColonne(0,event)\" alt=\"none\"><img src=\"res/TableCherche.gif\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none\" id=\"A1_TITRES_RECH_0\" alt=\"\"></div></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"clA1.OnRedimCol(event,0,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:15px\">&nbsp;[%COMMENT%]</div></td>" , "<td id=\"ttA10\" style=\"border-left-width:0;border-top-width:0;\" class=\"Titre-Colonne padding\"><div style=\"overflow:hidden;height:15px;position:relative\" class=\"wbcolA10\"><div id=\"A1_TITRES_1\" style=\"\"><table style=\"width:100%\"><tr><td style=\"border:0;height:15px\" class=\"Titre-Colonne ttA10\">Libéllé</td></tr></table></div><img src=\"res/TableTri.gif\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none\" id=\"A1_TITRES_TRI_1\" onclick=\"clA1.OnTriColonne(1,event)\" alt=\"none\"><img src=\"res/TableCherche.gif\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none\" id=\"A1_TITRES_RECH_1\" alt=\"\"></div></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"clA1.OnRedimCol(event,1,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:15px\">&nbsp;[%COMMENT%]</div></td>" , "<td id=\"ttA2\" style=\"border-left-width:0;border-top-width:0;\" class=\"Titre-Colonne padding\"><div style=\"overflow:hidden;height:15px;position:relative\" class=\"wbcolA2\"><div id=\"A1_TITRES_2\" style=\"\"><table style=\"width:100%\"><tr><td style=\"border:0;height:15px\" class=\"Titre-Colonne ttA2\">Qtité</td></tr></table></div><img src=\"res/TableTri.gif\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none\" id=\"A1_TITRES_TRI_2\" onclick=\"clA1.OnTriColonne(2,event)\" alt=\"none\"><img src=\"res/TableCherche.gif\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none\" id=\"A1_TITRES_RECH_2\" alt=\"\"></div></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"clA1.OnRedimCol(event,2,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:15px\">&nbsp;[%COMMENT%]</div></td>" , "<td id=\"ttA8\" style=\"border-left-width:0;border-top-width:0;\" class=\"Titre-Colonne padding\"><div style=\"overflow:hidden;height:15px;position:relative\" class=\"wbcolA8\"><div id=\"A1_TITRES_3\" style=\"\"><table style=\"width:100%\"><tr><td style=\"border:0;height:15px\" class=\"Titre-Colonne ttA8\">user</td></tr></table></div><img src=\"res/TableTri.gif\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none\" id=\"A1_TITRES_TRI_3\" onclick=\"clA1.OnTriColonne(3,event)\" alt=\"none\"><img src=\"res/TableCherche.gif\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none\" id=\"A1_TITRES_RECH_3\" alt=\"\"></div></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"clA1.OnRedimCol(event,3,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:15px\">&nbsp;[%COMMENT%]</div></td>" , "<td id=\"ttA9\" style=\"border-left-width:0;border-top-width:0;\" class=\"Titre-Colonne padding\"><div style=\"overflow:hidden;height:15px;position:relative\" class=\"wbcolA9\"><div id=\"A1_TITRES_4\" style=\"\"><table style=\"width:100%\"><tr><td style=\"border:0;height:15px\" class=\"Titre-Colonne ttA9\">PRIX</td></tr></table></div><img src=\"res/TableTri.gif\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none\" id=\"A1_TITRES_TRI_4\" onclick=\"clA1.OnTriColonne(4,event)\" alt=\"none\"><img src=\"res/TableCherche.gif\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none\" id=\"A1_TITRES_RECH_4\" alt=\"\"></div></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"clA1.OnRedimCol(event,4,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:15px\">&nbsp;[%COMMENT%]</div></td>" , "<td id=\"ttA11\" style=\"border-left-width:0;border-top-width:0;\" class=\"Titre-Colonne padding\"><div style=\"overflow:hidden;height:15px;position:relative\" class=\"wbcolA11\"><div id=\"A1_TITRES_5\" style=\"\"><table style=\"width:100%\"><tr><td style=\"border:0;height:15px\" class=\"Titre-Colonne ttA11\">date</td></tr></table></div><img src=\"res/TableTri.gif\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none\" id=\"A1_TITRES_TRI_5\" onclick=\"clA1.OnTriColonne(5,event)\" alt=\"none\"><img src=\"res/TableCherche.gif\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none\" id=\"A1_TITRES_RECH_5\" alt=\"\"></div></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"clA1.OnRedimCol(event,5,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:15px\">&nbsp;[%COMMENT%]</div></td>" , "<td id=\"ttA12\" style=\"border-left-width:0;border-top-width:0;\" class=\"Titre-Colonne padding\"><div style=\"overflow:hidden;height:15px;position:relative\" class=\"wbcolA12\"><div id=\"A1_TITRES_6\" style=\"\"><table style=\"width:100%\"><tr><td style=\"border:0;height:15px\" class=\"Titre-Colonne ttA12\">EAN</td></tr></table></div><div style=\"width:14px;height:0\">[%COMMENT%]</div><img src=\"res/TableTri.gif\" style=\"cursor:pointer;position:absolute;top:1px;left:1px;display:none\" id=\"A1_TITRES_TRI_6\" onclick=\"clA1.OnTriColonne(6,event)\" alt=\"none\"><img src=\"res/TableCherche.gif\" style=\"cursor:pointer;position:absolute;bottom:1px;right:1px;display:none\" id=\"A1_TITRES_RECH_6\" alt=\"\"></div></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"><div onmousedown=\"clA1.OnRedimCol(event,6,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:15px\">&nbsp;[%COMMENT%]</div></td>" ] ,fin : "</tr>" } , { debut : "<tr style=\"border:0\">",contenu :  [ "<td style=\"border-left-width:0;border-top-width:0;\" class=\"wbcolA13\"></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;\" class=\"wbcolA10\"></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;\" class=\"wbcolA2\"></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;\" class=\"wbcolA8\"></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;\" class=\"wbcolA9\"></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;\" class=\"wbcolA11\"></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"></td>" , "<td style=\"border-left-width:0;border-top-width:0;\" class=\"wbcolA12\"></td><td style=\"\" class=\"wbtablesep Titre-Colonne\"></td>" ] ,fin : "</tr>" }  ]  } ,tbody :  { contenu :  [  { debut : " <tr class=\"Lignes-Impaires padding\" id=\"A1_[%_INDICE_%]\" style=\"visibility:hidden;height:18px\">",contenu :  [ "<td onclick=\"clA1.OnSelectLigne([%_INDICE_%],0,event)\" style=\" height:17px;border-left-width:0;border-top-width:0;\" id=\"c[%A1%]-A13\" class=\"aligncenter l-3 wbcolA13 communbc-A13 padding\"><div style=\"overflow-x:hidden\" class=\"wbcolA13\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A1_[%_INDICE_%]_0\"></div></td></tr></table></div></td><td style=\"\" class=\"wbtablesep \"><div onmousedown=\"clA1.OnRedimCol(event,0,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:17px\">&nbsp;[%COMMENT%]</div></td>" , "<td onclick=\"clA1.OnSelectLigne([%_INDICE_%],1,event)\" style=\" height:17px;border-left-width:0;border-top-width:0;\" id=\"c[%A1%]-A10\" class=\"l-2 wbcolA10 communbc-A10 padding\"><div style=\"overflow-x:hidden\" class=\"wbcolA10\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A1_[%_INDICE_%]_1\" style=\"padding-left:2px;\"></div></td></tr></table></div></td><td style=\"\" class=\"wbtablesep \"><div onmousedown=\"clA1.OnRedimCol(event,1,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:17px\">&nbsp;[%COMMENT%]</div></td>" , "<td onclick=\"clA1.OnSelectLigne([%_INDICE_%],2,event)\" style=\" height:17px;border-left-width:0;border-top-width:0;\" id=\"c[%A1%]-A2\" class=\"aligncenter l-0 wbcolA2 communbc-A2 padding\"><div style=\"overflow-x:hidden\" class=\"wbcolA2\"><div id=\"A1_[%_INDICE_%]_2\"></div></div></td><td style=\"\" class=\"wbtablesep \"><div onmousedown=\"clA1.OnRedimCol(event,2,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:17px\">&nbsp;[%COMMENT%]</div></td>" , "<td onclick=\"clA1.OnSelectLigne([%_INDICE_%],3,event)\" style=\" height:17px;border-left-width:0;border-top-width:0;\" id=\"c[%A1%]-A8\" class=\"aligncenter l-1 wbcolA8 communbc-A8 padding\"><div style=\"overflow-x:hidden\" class=\"wbcolA8\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A1_[%_INDICE_%]_3\"></div></td></tr></table></div></td><td style=\"\" class=\"wbtablesep \"><div onmousedown=\"clA1.OnRedimCol(event,3,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:17px\">&nbsp;[%COMMENT%]</div></td>" , "<td onclick=\"clA1.OnSelectLigne([%_INDICE_%],4,event)\" style=\" height:17px;border-left-width:0;border-top-width:0;\" id=\"c[%A1%]-A9\" class=\"aligncenter l-1 wbcolA9 communbc-A9 padding\"><div style=\"overflow-x:hidden\" class=\"wbcolA9\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A1_[%_INDICE_%]_4\"></div></td></tr></table></div></td><td style=\"\" class=\"wbtablesep \"><div onmousedown=\"clA1.OnRedimCol(event,4,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:17px\">&nbsp;[%COMMENT%]</div></td>" , "<td onclick=\"clA1.OnSelectLigne([%_INDICE_%],5,event)\" style=\" height:17px;border-left-width:0;border-top-width:0;\" id=\"c[%A1%]-A11\" class=\"aligncenter l-1 wbcolA11 communbc-A11 padding\"><div style=\"overflow-x:hidden\" class=\"wbcolA11\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A1_[%_INDICE_%]_5\"></div></td></tr></table></div></td><td style=\"\" class=\"wbtablesep \"><div onmousedown=\"clA1.OnRedimCol(event,5,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:17px\">&nbsp;[%COMMENT%]</div></td>" , "<td onclick=\"clA1.OnSelectLigne([%_INDICE_%],6,event)\" style=\" height:17px;border-left-width:0;border-top-width:0;\" id=\"c[%A1%]-A12\" class=\"aligncenter l-1 wbcolA12 communbc-A12 padding\"><div style=\"overflow-x:hidden\" class=\"wbcolA12\"><table style=\"width:100%;height:100%\"><tr><td style=\"vertical-align:middle;\"><div id=\"A1_[%_INDICE_%]_6\"></div></td></tr></table></div><div style=\"width:14px;height:0\">[%COMMENT%]</div></td><td style=\"\" class=\"wbtablesep \"><div onmousedown=\"clA1.OnRedimCol(event,6,14)\" style=\"width:1px;cursor:col-resize;;overflow:hidden;height:17px\">&nbsp;[%COMMENT%]</div></td>" ] ,fin : "</tr>" }  ]  }  } --><tr><td></td></tr></table></div><table style="position:absolute;top:0;left:0;width:100%;border:solid 2px #D3D3D3;height:100%;visibility:hidden;z-index:100" id="A1_MASQUE"><tr><td class="aligncenter valignmiddle"><img src="res/Timer190%20Evolution.gif" alt="none"></td></tr></table><table style="position:absolute;top:0;left:0;width:100%;height:100%;visibility:hidden;z-index:101" id="A1_MASQUETR"><tr><td class="aligncenter valignmiddle"><!-- --></td></tr></table></div></td><td style="width:17px;height:501px;vertical-align:top"><div style="width:15px;"><div style="position:absolute;overflow-x:hidden;width:17px;height:501px;"><div style="position:absolute;left:-4px;width:20px;height:501px;overflow-x:hidden;overflow-y:auto"><div style="width:1px;height:1px;overflow:hidden" id="A1_SB"></div></div></div></div></td></tr>
</table></div></div><div  class="pos23"><div  class="pos24"><a href="javascript:{_JSL(_PAGE_,'A6','_self','','')}" id="A6" class="BTN-Image wbp2etatsNS wbplanche wblien padding webdevclass-riche" style="_height:24px;text-decoration:none;display:block;width:80px;height:24px;background-image:url(res/btn_b6d82c881b344a7a1a916c1058117582268462de.png);-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"><span id="z_A6_IMG" style="display:table;_display:block;width:100%;width:80px;height:24px;overflow:hidden;cursor:pointer;"><span style="display:block;padding-top:5px;line-height:14px;">Supprimer</span></span></a></div></div></div></td></tr></table></div></td><td style="width:7px"></td></tr></table></div></td></tr></table></div></td><td style="width:9px"></td></tr></table></div></td></tr></table></td></tr></table></div></td><td style="width:6px"></td><td style="width:120px"></td></tr></table></div></td></tr><tr style="height:6px"><td style="width:1149px"></td></tr><tr style="height:36px"><td style="width:1149px"><div style="height:100%;min-width:1149px;width:auto !important;width:1149px;" class="lh0"><footer  class="pos25"><div  class="pos26"><table style=" background-color:#D3D3D3;" id="M12">
<tr><td style=" height:36px; width:1016px;"><div  class="pos27"><div  class="pos28"><div  class="pos29"><table style=" width:662px;height:25px;"><tr><td id="tzM10" class="Pied-de-Page padding">Site réalisé avec WebDev de PC SOFT.</td></tr></table></div></div><div  class="pos30"><div  class="pos31"><div class="lh0 dzSpan dzM7" id="dzM7" style="min-height:28px\9;"><a href="http://www.pcsoft.fr" target="_blank"><img src="res/MDL_Power_WebDev190_EvolutionGrayVolution.png" alt="" id="M7" class="Image padding" style="display:block;border:0;"></a></div></div></div></div></td></tr></table></div></footer></div></td></tr></table></div></div></td></tr></table></td></tr></table><?php function ConstruireOptionMenu_M3_MENU_MODELE_PRINCIPAL($WD_MOIMEME_){$s="";if (($WD_MOIMEME_->Visible)==0) {
$s.="<input type=\"hidden\" name=\"WD_MOIMEME_\" value=\"";$s.=$WD_MOIMEME_->GetValeurHTML();$s.="\">";
 }if (($WD_MOIMEME_->Visible)==1) {
$s.=$WD_MOIMEME_->GetHTMLAvantHTML();if($WD_MOIMEME_->m_bEstunSeparateur){$s.="<tr class=\"WDMenuSepHaut\"><td colspan=3><div><!-- --></div></td></tr><tr class=\"WDMenuSepBas\"><td colspan=3><div><!-- --></div></td></tr>";return $s;}$s.="<tr id=\"tz$WD_MOIMEME_->Alias\" class=\"WDMenuOption";if (($WD_MOIMEME_->m_bSelectionee)==1) {
$s.="Select";
 }$s.="\" style=\" height:";$s.=$WD_MOIMEME_->GetHauteurHTML();$s.="px;\"><td class=\"WDMenuTDImage\"><div><!-- --></div></td><td class=\"valignmiddle WDMenuTDLien padding\"><a";if (($WD_MOIMEME_->pszGetMeniSiAvecHrefHTML())==1) {
$s.=" href=\"";if (($WD_MOIMEME_->URL)!="") {
$s.=$WD_MOIMEME_->URL;
 }if (($WD_MOIMEME_->URL)=="") {
$s.="javascript:_JEM('";$s.=$WD_MOIMEME_->Alias;$s.="','_self','')";
 }$s.="\"";
 }$s.=" onmouseout=\"window.status=''; \" onmouseover=\"window.status='";$s.=$WD_MOIMEME_->Libelle;$s.="';;return true; \" onblur=\"window.status=''; \" onfocus=\"window.status='";$s.=$WD_MOIMEME_->Libelle;$s.="'; \" id=\"$WD_MOIMEME_->Alias\" title=\"";$s.=$WD_MOIMEME_->GetBulleHTML();$s.="\">";$_s = $s; $s = '';$s.=" href=\"";if (($WD_MOIMEME_->URL)!="") {
$s.=$WD_MOIMEME_->URL;
 }if (($WD_MOIMEME_->URL)=="") {
$s.="javascript:_JEM('";$s.=$WD_MOIMEME_->Alias;$s.="','_self','')";
 }$s.="\"";$WD_MOIMEME_->m_sDynHref=$s;$s = $_s; unset($_s);$s.=$WD_MOIMEME_->Libelle;$s.="</a></td><td class=\"WDMenuTDPopup\"><div><!-- --></div>";if (($WD_MOIMEME_->Occurrence)!=0) {
$s.="<div class=\"WDSousMenu lh0\"><div><!-- --></div><table>";for($i=0;$i<$WD_MOIMEME_->Occurrence;$i++)$s.=ConstruireOptionMenu_M3_MENU_MODELE_PRINCIPAL($WD_MOIMEME_->pclGetOption($i));$s.="</table></div>";
 }$s.="</td></tr>";$s.=$WD_MOIMEME_->GetHTMLApresHTML();
 }return $s;} ?>
</form>
<script type="text/javascript">var _bTable16_=false;
</script>
<script type="text/javascript" src="./res/WWConstante5.js?db130bff"></script>
<script type="text/javascript" src="./res/StdAction.js?766ef091" charset="windows-1252"></script>
<script type="text/javascript" src="./res/WDUtil.js?aed3f69f" charset="windows-1252"></script>
<script type="text/javascript" src="./res/WDChamp.js?cd6317d2" charset="windows-1252"></script>
<script type="text/javascript" src="./res/WDMenu.js?0a6dfb1a" charset="windows-1252"></script>
<script type="text/javascript" src="./res/WDXML.js?f67534ac" charset="windows-1252"></script>
<script type="text/javascript" src="./res/WDDrag.js?327a9316" charset="windows-1252"></script>
<script type="text/javascript" src="./res/WDAJAX.js?47d8b247" charset="windows-1252"></script>
<script type="text/javascript" src="./res/WDTableZRCommun.js?dd0d30fb" charset="windows-1252"></script>
<script type="text/javascript" src="./res/WDTable.js?cb6569c5" charset="windows-1252"></script>
<script type="text/javascript">
//WW_PARAMETRES_INSTALLATION_DEBUT
var _WD_="/CESSION_WEB/";
//WW_PARAMETRES_INSTALLATION_FIN
var _WDR_="../";
var _NA_=5;
var _WW_SEPMILLIER_="<?php echo ($_gszSEPMIL) ?>";
var _WW_SEPDECIMAL_="<?php echo ($_gszSEPDEC) ?>";
var _PU_="Table-casse.php";
var _GFI_A_=<?php echo VersChaine($_gszGFI_ACTIVE) ?>;
var _GFI_T_=<?php echo VersChaine($_gszGFI_TAUX) ?>;
var _PAGE_=document["PAGE_TABLE_CASSE"];
<!--
var _COL={0:"#f3f3f3",5:"#9eafba",9:"#fff0a5",10:"#333333",15:"#ffffff",16:"#d3d3d3",21:"#ffffff",66:"#745f1d"};
function _JWN(v,s){if(v.length==0){return 0;}var r="";for(var i=0;i<v.length;i++){var c=v.charAt(i);if(c==s){r+=".";}else if((c>='0'&&c<='9')||c=='+'||c=='-'){r+=c;}}return parseFloat(r);}
function _RMP(c,o,r){var p=0;var t;var s=[];while (-1!=(t=c.indexOf(o,p))){s.push(c.substring(p,t));s.push(r);p=t+o.length;}s.push(c.substring(p));return s.join("");}
function _JNW(v,s){if((escape(v)=="")||(isNaN(v))){return"";}return _RMP(""+eval(v),".",s);}
function _GET_A2_1_I_C(){return _JWN(arguments[0],_WW_SEPDECIMAL_);}
function _SET_A2_1_I_C(){return __reinitNombre(_JNW(arguments[0],_WW_SEPDECIMAL_),"99 999",true,__initNombre(arguments[0]+" €","99 999",true)[1]);}
function _GET_A9_1_I_C(){return _JWN(arguments[0],_WW_SEPDECIMAL_);}
function _SET_A9_1_I_C(){return __reinitNombre(_JNW(arguments[0],_WW_SEPDECIMAL_),"999 999 DA",true,__initNombre(arguments[0]+" €","999 999 DA",true)[1]);}
function _GET_A11_1_I_C(){return clWDUtil.sChaineVersDate(arguments[0],"JJ/MM/AAAA");}
function _SET_A11_1_I_C(){return clWDUtil.sDateVersChaine(arguments[0],"JJ/MM/AAAA");}
function _GET_A13_1_I_C(){return _JWN(arguments[0],_WW_SEPDECIMAL_);}
function _SET_A13_1_I_C(){return __reinitNombre(_JNW(arguments[0],_WW_SEPDECIMAL_),"99999999",false);}
function _PAGE_TABLE_CASSE_LOD_0(event){{}}
function _PAGE_TABLE_CASSE_LOD(event){_LOD_COM(event);if(false===_PAGE_TABLE_CASSE_LOD_0(event)){return;};{}return true;}
function _LOD_COM(event){}
function _UNL_COM(event){}
//-->
</script>

<script type="text/javascript">var clM3=new WDMenu("M3",true,{ <?php echo $M3_MENU_MODELE_PRINCIPAL->pszGetMenuPopupDeclarationHTML(0); ?> });var clA1=new WDTable("A1",0,19,2,4,1,["Lignes-Impaires","Lignes-Paires","Selection"],[["res/TableTri.gif","res/TableTriP.gif","res/TableTriM.gif"],["res/TableCherche.gif","res/TableChercheO.gif","res/TableChercheC.gif"],["res/TableFiltre.gif","res/TableFiltreO.gif","res/TableFiltreC.gif"],["res/TableDeplaceDroite.png","res/TableDeplaceGauche.png"]]);</script><script type="text/javascript">function FinInitJS(){clM3.Init();clA1.Init(-1,"<?php echo $A1_TABLE_casse->pszGetAjaxInitInline(); ?>");}</script><script type="text/javascript">var bPCSFR=true;</script><script type="text/javascript" charset="windows-1252" src="res/WDLIB.JS?4261ab78"></script><script data-wb-modal type="text/javascript">window.jQuery || document.write('\x3Cscript src="res/jquery.js"\x3E\x3C\/script\x3E')</script><script type="text/javascript" data-wb-modal src="res/jquery-ancrage-ie.js?d8678ee2"></script><script type="text/javascript">if (bOpr) document.getElementsByTagName("head")[0].innerHTML+='\x3cstyle type="text/css"\x3e.wbtablesep{position:static !important;}\x3c/style\x3e';</script><?php echo $MaPage->GetHTMLFinPageHTML(); ?></body></html><?php $_PHP_VAR_TMP_7=ob_get_contents();ob_end_clean();echo _cp1252_to_utf8($_PHP_VAR_TMP_7); ?>