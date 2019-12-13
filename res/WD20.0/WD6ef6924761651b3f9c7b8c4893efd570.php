<?php
//20.0.56.0 HF.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 define('HF',true); define('HF_MYSQL',0x00001); define('HF_AS400',0x00002); define('HF_PGSQL',0x00004); define('HF_ORACLE',0x00008); if (!defined('__INC__WL/HF/FichierHF.php')) { define('__INC__WL/HF/FichierHF.php',true); include_once(WB_INCLUDE_PATH.'WDabbd184f40b7c43204dbc386acb83648.php'); } if (!defined('__INC__WL/HF/RubriqueHF.php')) { define('__INC__WL/HF/RubriqueHF.php',true); include_once(WB_INCLUDE_PATH.'WD1079dc32c58202094b0623275cdc537e.php'); } $GLOBALS['HF_MODULES'] = 0; function F3f50a0c6($nAN) { switch ($nAN) { case HF_MYSQL: case HF_AS400: case HF_PGSQL: case HF_ORACLE: $GLOBALS['HF_MODULES'] |= $nAN; break; default: } } if (!defined('__INC__WL/HF/HF.php')) { define('__INC__WL/HF/HF.php',true); include_once(WB_INCLUDE_PATH.'WDc2c89ceec5fe2dfa652d4d9e492e53fd.php'); } if (!defined('__INC__WL/HF/AN/AN.php')) { define('__INC__WL/HF/AN/AN.php',true); include_once(WB_INCLUDE_PATH.'WDfaa11c5f8efe6480756645d9e02ac43d.php'); } if (!defined('__INC__WL/HF/AN/As400.php')) { define('__INC__WL/HF/AN/As400.php',true); include_once(WB_INCLUDE_PATH.'WDc9181102aa7577353c8c23f74d21db1a.php'); } if (!defined('__INC__WL/HF/AN/Mysql.php')) { define('__INC__WL/HF/AN/Mysql.php',true); include_once(WB_INCLUDE_PATH.'WD29f87c8903c4274196d64ce818d2c4fd.php'); } if (!defined('__INC__WL/HF/AN/Pgsql.php')) { define('__INC__WL/HF/AN/Pgsql.php',true); include_once(WB_INCLUDE_PATH.'WD25cec88e301356500c7069e4498a8c57.php'); } if (!defined('__INC__WL/HF/AN/Oracle.php')) { define('__INC__WL/HF/AN/Oracle.php',true); include_once(WB_INCLUDE_PATH.'WD521de9bd097a5b43851bcfdf1abf6474.php'); } define('HF_MODULES',$GLOBALS['HF_MODULES'] ); $GLOBALS['__HF__bAutoriseMAJ_FichierEnCours'] = true; function F1b770ed2($b) { $GLOBALS['__HF__bAutoriseMAJ_FichierEnCours'] = $b; } function Fc82014c2() { return $GLOBALS['__HF__bAutoriseMAJ_FichierEnCours']; } function& Fichier($sNom) { F1b770ed2(false); $Retour =& F9c2a1edc($sNom); F1b770ed2(true); return $Retour; } function& Requete($sNom) { F1b770ed2(false); $Retour =& F9c2a1edc($sNom); F1b770ed2(true); return $Retour; } function& Rubrique($sNomF,$sNomR) { F1b770ed2(false); $Retour =& GetRubrique($sNomF,$sNomR); F1b770ed2(true); return $Retour; } function F62ece511(&$pclBuffer,$nIdAN,&$Rubrique, $nIdModif, $sValeur = null, $bIdentique = false, $bLimiteParcours = false) { switch ($nIdAN) { case TYPE_BASE_AS400: $pclBuffer = new FMK_BufferParcours_AS400($Rubrique, $nIdModif, $sValeur , $bIdentique , $bLimiteParcours); break; case TYPE_BASE_ORACLE: $pclBuffer = new FMK_BufferParcours_ORACLE($Rubrique, $nIdModif, $sValeur , $bIdentique , $bLimiteParcours); break; case TYPE_BASE_PGSQL: $pclBuffer = new FMK_BufferParcours_PGSQL($Rubrique, $nIdModif, $sValeur , $bIdentique , $bLimiteParcours); break; case TYPE_BASE_MYSQL: case TYPE_BASE_MARIA: $pclBuffer = new FMK_BufferParcours($Rubrique, $nIdModif, $sValeur , $bIdentique , $bLimiteParcours); break; default: return false; } return true; } function Fe6ad5774($nModuleID) { Fe81a7f9e('ERR_ACCES_NATIF_NON_FOURNI',Ff8f404ed($nModuleID)); } function Ff8f404ed($nModuleID) { $sNomModule = ''; switch ($nModuleID) { case HF_MYSQL: case TYPE_BASE_MARIA: case TYPE_BASE_MYSQL: $sNomModule = 'MySQL'; break; case HF_AS400: case TYPE_BASE_AS400: $sNomModule = 'AS/400'; break; case HF_PGSQL: case TYPE_BASE_PGSQL: $sNomModule = 'PostgreSQL'; break; case HF_ORACLE: case TYPE_BASE_ORACLE: $sNomModule = 'Oracle'; break; default: $sNomModule = $nModuleID; } return $sNomModule; } function F31e24e05($nTypeBase) { switch ($nTypeBase) { case TYPE_BASE_MYSQL: case TYPE_BASE_MARIA: if (!(HF_MODULES & HF_MYSQL)) Fe6ad5774(HF_MYSQL); break; case TYPE_BASE_PGSQL: if (!(HF_MODULES & HF_PGSQL)) Fe6ad5774(HF_PGSQL); break; case TYPE_BASE_AS400: if (!(HF_MODULES & HF_AS400)) Fe6ad5774(HF_AS400); break; case TYPE_BASE_ORACLE: if (!(HF_MODULES & HF_ORACLE)) Fe6ad5774(HF_ORACLE); break; default: return false; } return true; } function Feee3b2d5($Obj) { return 0 !== ($Obj->m_nIsXXX & 4); } function F929705c7($Obj) { return 0 !== ($Obj->m_nIsXXX & 2); } function F9ef91cd8($Obj) { return 0 !== ($Obj->m_nIsXXX & 1); } ?>