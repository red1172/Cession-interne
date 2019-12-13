<?php
//20.0.56.0 FMK/Reseau.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 define('FMK_Reseau',true); class FMK_Reseau { function F99a5fef5() { FMK_Charge('FMK/Reseau/FTP.php',false); } } $_FMK_Reseau = null; function FMK_Reseau() { global $_FMK_Reseau; if (!isset($_FMK_Reseau)) $_FMK_Reseau = new FMK_Reseau(); return $_FMK_Reseau; } ?>