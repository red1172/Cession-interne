<?php
//20.0.56.0 TYPE/Email.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 if (!defined('__INC__TYPE/Modele.php')) { define('__INC__TYPE/Modele.php',true); include_once(WB_INCLUDE_PATH.'WD6ee9539c0ad66df976b95a68703645fb.php'); } class CEmail extends CTypeNonComparable { var $Message; var $Sujet; var $Expediteur; var $Destinataire; var $NbDestinataire; var $AdresseExpediteur; var $CC; var $NbCC; var $Cci; var $NbCci; var $HTML; var $AccuseReception; var $ConfirmationLecture; var $Categorie; var $Confidentialite; var $Priorite; var $Attache; var $NbAttache; var $IdentifiantAttache; var $AttacheContentType; var $AttacheContentDescription; function CEmail($Valeur=null) { $this->F39f2478a(); } function F39f2478a() { $this->Priorite = EmailPriorit�Normal; $this->Destinataire = array(); $this->CC = array(); $this->Cci = array(); $this->Attache = array(); $this->IdentifiantAttache = array(); $this->AttacheContentType = array(); $this->AttacheContentDescription = array(); $this->Message = ''; $this->Sujet = ''; $this->Expediteur = ''; $this->NbDestinataire = 0; $this->AdresseExpediteur = ''; $this->NbCC = 0; $this->NbCci = 0; $this->HTML = ''; $this->AccuseReception = ''; $this->ConfirmationLecture = ''; $this->Categorie = ''; $this->Confidentialite = ''; $this->NbAttache = 0; return true; } } ?>