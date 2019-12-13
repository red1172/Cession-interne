<?php
//20.0.56.0 FMK/Reseau.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 define('FMK_Reseau_Ip',true); function F68d0c9b9() { global $_FMK_Reseau_Ip; if (!isset($_FMK_Reseau_Ip)) $_FMK_Reseau_Ip = new F68d0c9b9(); return $_FMK_Reseau_Ip; } function F924d8bc0($Poste=null,$Indice=null) { Fa19d34ae(); if (!isset($Indice) && is_numeric($Poste)) { $Indice=intval($Poste); $Poste=''; } F6b1e3687(); if ($Poste == '') { $Poste = gethostbyaddr('127.0.0.1'); } $Indice=max(0,$Indice-1); $tabIP = gethostbynamel($Poste); F1e7b0563(); if (($tabIP === false) || (!array_key_exists($Indice,$tabIP))) { F853b7085(F1abae4f0(),errMessage); return ''; } return $tabIP[$Indice]; } ?>