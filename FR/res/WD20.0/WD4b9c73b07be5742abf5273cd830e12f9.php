<?php
//20.0.56.0 FMK/Sql.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 define('FMK_SQL',true); define("REQUETE_SELECT", 0); define("REQUETE_DELETE", 1); define("REQUETE_INSERT", 3); define("REQUETE_UPDATE", 4); define("REQUETE_CREATE", 5); define("REQUETE_DROP" , 6); define("REQUETE_ALTER" , 7); define("REQUETE_SHOW" , 8); define("REQUETE_DESCRIBE" , 9); define("REQUETE_GRANT" , 10); class FMK_SQL { var $m_clInstanceConnexion = null; function F674a85cf() { FMK_Charge('FMK/Sql/HF.php',false); } function Fa070fd9f() { FMK_Charge('FMK/Sql/MySql.php',false); } function Fb916f96b() { FMK_Charge('FMK/Sql/ODBC.php',false); } function& F0afbbf2f($sParam) { switch (strtoupper($sParam)) { case "WINDEVMYSQL" : case "MYSQL" : case "MARIADB" : case "WINDEVMARIADB" : $this->Fa070fd9f(); $this->m_clInstanceConnexion = new FMK_ConnexionMySql(); break; case "ODBC" : case "HYPER FILE" : case "WINDEVCLIENTSERVEURHF": $this->Fb916f96b(); $this->m_clInstanceConnexion = new FMK_ConnexionODBC(); break; default: Fe81a7f9e('ERR_CONNEXION_PROVIDER_INVALIDE', $sParam ); } return $this->m_clInstanceConnexion; } } $_FMK_SQL = null; function& FMK_SQL() { global $_FMK_SQL; if (!isset($_FMK_SQL)) $_FMK_SQL = new FMK_SQL(); return $_FMK_SQL; } class FMK_HFContext { var $m_pclConnexion; var $ConnectID; var $TabSQLTable; var $m_szLastTable; var $TabConnectSettings; var $nIndiceTabConnectSettings = 0; } function Ffe27c994($Code) { global $gclContextSQL; $SQL =& F144dce03(); $szNomReq = $gclContextSQL->m_szLastTable; if (!isset($gclContextSQL->TabSQLTable[$szNomReq])) { $pstInfoReq = &$SQL; } else { $pstInfoReq = &$gclContextSQL->TabSQLTable[$szNomReq]; } if (isset( $gclContextSQL->m_pclConnexion)) { $gclContextSQL->m_pclConnexion->F841ad845( $pstInfoReq, $Code ); } } function Ff46baf49($sCodeSQL) { $sExpression = Fd7624002("/.+?\{([A-Za-z_���������������][A-Za-z0-9_���������������]*#\d+)\}/" . UNICODE_REGEXP ); $lstParametres = array(); $resultat = null; if(preg_match_all($sExpression, $sCodeSQL,$resultat) > 0) { if(count($resultat) > 1) { $resultat = $resultat[1]; foreach ($resultat as $sParametre) { $nPosition = FMK_Position($sParametre,"#",utf8_strlen($sParametre),DepuisFin); if($nPosition > 0) { $sNomParametre = F3449a00a($sParametre, 1, $nPosition-1); $nOrdre = (int)F3449a00a($sParametre, $nPosition+1); $lstParametres[$nOrdre] = $sNomParametre; } } } } return $lstParametres; } function F9d60968a($sCodeSQL,$bFormatNumerique=true) { $tabSqlTags = array('SELECT'=>false,'UPDATE'=>false,'INSERT'=>false,'DELETE'=>false,'CREATE'=>false,'DROP'=>false,'ALTER'=>false,'SHOW'=>false,'DESCRIBE'=>false,'GRANT'=>false); $tabTags = array_keys($tabSqlTags); $nNbTags = count($tabTags); $sCodeSQL= utf8_strtoupper($sCodeSQL); $sTag = null; for($nIdTag = 0; $nIdTag<$nNbTags; $nIdTag++) { $sTagEnCours=&$tabTags[$nIdTag]; $tabSqlTags[$sTagEnCours] = utf8_strpos($sCodeSQL,utf8_strtoupper($sTagEnCours)); if (($tabSqlTags[$sTagEnCours]!==false) && (!isset($sTag) || ($tabSqlTags[$sTagEnCours] <= $tabSqlTags[$sTag]))) { $sTag = $sTagEnCours; } } if (!$bFormatNumerique) return $sTag; return defined('REQUETE_' . $sTag) ? constant('REQUETE_' . $sTag) : -1; } ?>