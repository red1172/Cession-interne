<?php
//20.0.56.0 FMK/Langue.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 define('FMK_Langue',true); function F1ac3f040($sNom) { if (!defined('FMK_Langue_Constante')) { FMK_Charge('Ressources/Traduction.php',false); define('FMK_Langue_Constante',true); } if (is_string($sNom)&&defined($sNom)) { return Fd7624002( constant($sNom) ); } return $sNom; } ?>