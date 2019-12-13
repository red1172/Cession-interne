<?php
//20.0.56.0 IHM/Champ/Liste/Table/Colonne/ColonneNumerique.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 if (!defined('__INC__IHM/Champ/Liste/Table/Colonne/ColonneFormat.php')) { define('__INC__IHM/Champ/Liste/Table/Colonne/ColonneFormat.php',true); include_once(WB_INCLUDE_PATH.'WD83320623580f978b3720e2e0174b6318.php'); } if (!defined('__INC__IHM/Champ/Saisie/SaisieNumerique.php')) { define('__INC__IHM/Champ/Saisie/SaisieNumerique.php',true); include_once(WB_INCLUDE_PATH.'WD74ef5da06bd5197c27953ca0b8dc477a.php'); } class CColonneNumerique extends CColonneFormat { function CColonneNumerique($Nom, $T, $Indice) { $Champ = new CSaisieNumerique(); parent::CColonneFormat($Champ, $Nom, $T, $Indice); } function& GetType() { return getRef(20004); } } ?>