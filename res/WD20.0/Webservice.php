<?php
//20.0.56.0 Webservice.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 if (!isset($_GET['_WB_'])) die(); if (!isset($_GET['_WS_'])) die(); switch ($_GET['_WS_']) { case 'VERSION': die('20.0.56.0' ); case 'STREAMBUFFER': $CheminRepRes = realpath('../') .'/'; $gszId = $_GET['_WB_'] .'	WebService	AAAAMMJJHHmmss'; define('UNICODE_PAGE_UTF8',false); require_once 'WDFramework.php'; WB_Include('Architecture.php'); FMK_Charge( 'WL/IMG/Img.php' ); session_start(); F002675ab($_GET['streamBUFFER'],$_GET); break; case 'STREAMIMAGE': $CheminRepRes = realpath('../') .'/'; $gszId = $_GET['_WB_'] .'	WebService	AAAAMMJJHHmmss'; define('UNICODE_PAGE_UTF8',false); require_once 'WDFramework.php'; if (!defined('__INC__FMK/Contexte.php')) { define('__INC__FMK/Contexte.php',true); include_once(WB_INCLUDE_PATH.'WDb8ed6cc9e4e026a5ab69ef35262a90ab.php'); } session_start(); $clContexte =& FMK_Contexte(); $StreamEnCours = $clContexte->F239ddeda('STREAMIMAGE_'.$_GET['STREAMIMAGE']); if (isset($StreamEnCours)) { header('Content-type: image/jpeg'); echo $StreamEnCours; } break; case 'PAGEERREUR': $CheminRepRes = '../'; $gszId = $_GET['_WB_'] .'	WebService	AAAAMMJJHHmmss'; define('UNICODE_PAGE_UTF8',false); require_once 'WDFramework.php'; session_start(); if (!defined('__INC__WL/ERREUR/PageErreur.php')) { define('__INC__WL/ERREUR/PageErreur.php',true); include_once(WB_INCLUDE_PATH.'WDa38ab3722e401a952bf6c663ecb42001.php'); } break; case 'REBOND': { $CheminRepRes='./' . basename(dirname(dirname(dirname(realpath(__FILE__))))) . '/res/'; $gszId = $_GET['_WB_'] .'	WebService	AAAAMMJJHHmmss'; define('UNICODE_PAGE_UTF8',false); require_once 'WDFramework.php'; WB_Include('Architecture.php'); session_start(); $sURL = ''; $tabLanguesProjet = $_GET['REBOND_LANGUES']; if (!defined('__INC__WL/PAGE/Page.php')) { define('__INC__WL/PAGE/Page.php',true); include_once(WB_INCLUDE_PATH.'WD76227464d26f2611a8dc19c62cf44751.php'); } if (!defined('__INC__FMK/Langue/Alphabet.php')) { define('__INC__FMK/Langue/Alphabet.php',true); include_once(WB_INCLUDE_PATH.'WDcd0b26b72175a8bae40e1d32deffe704.php'); } $clLangue = new CAcceptLanguage(); foreach($clLangue->m_tabLangues as $nNation=> $bExact) { foreach($tabLanguesProjet as $eLangue => $sDossier) { if (Fd1163413($eLangue) === $nNation) { $sURL = './' . $sDossier . '/'; if ($bExact) break; } } if (!empty($sURL)) break; } if (empty($sURL)) { $sURL = $_GET['REBOND_URL']; } F6e3689dc($sURL,'',true); die(); } break; default: } ?>