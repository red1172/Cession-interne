<?php
//20.0.56.0 WL/ERREUR/PageErreur.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 $GLOBALS['__magic_quotes_gpc'] = (ini_get('magic_quotes_gpc')==1); class CTemplate { var $m_tabTags = array(); var $m_tabTagsSpeciaux = array(); function CTemplate($tabTags=null) { $this->m_tabTags = $tabTags; $sZoneMemoireSession = utf8_strtoupper(basename(__FILE__,'.php')); if (isset($_GET['_WB_'])) { $tabTags = array(); session_start(); foreach ($this->m_tabTags as $tag => $value) { if (isset($_GET[$tag])) { $tabTags[$tag] = base64_decode(urldecode($_GET[$tag])); } elseif ((isset($_SESSION[$sZoneMemoireSession]))&&(isset($_SESSION[$sZoneMemoireSession][$tag]))) { $tabTags[$tag] = $_SESSION[$sZoneMemoireSession][$tag]; } elseif ($value) { die(XVER_DEBUG ? "tag $tag obligatoire" : ''); } } die($this->F1d08286f($tabTags)); } } function F1d08286f($tabTags) { foreach ($this->m_tabTags as $tag => $value) { if (($value===true) && !isset($tabTags[$tag])) die("tag $tag obligatoire"); $sNouvelleValeur = null; if (isset($tabTags[$tag])) { $sNouvelleValeur = is_string($tabTags[$tag]) ? F6dcb8979($tabTags[$tag]) : $tabTags[$tag]; } elseif (is_string($value) && !empty($value)) { $sNouvelleValeur=$value; } else { $sNouvelleValeur = ''; } $tabReplace[$this->F44db9ade($tag)] = $this->F433a04a0($tabTags,$tag,$sNouvelleValeur); } $s = str_replace(array_keys($tabReplace),array_values($tabReplace),$this->F345fa15b()); return !UNICODE_PAGE_UTF8 ? _cp1252_to_utf8($s) : $s; } function F44db9ade($tag) { return '{'.$tag.'}'; } function F433a04a0($tabTags,$sTag,$sCode) { return $sCode; } } function F6dcb8979( $s ) { return $GLOBALS['__magic_quotes_gpc'] ? utf8_stripslashes($s) : $s; } class CTemplatePageErreur extends CTemplate { function CTemplatePageErreur($tabTags=null) { parent::CTemplate(isset($tabTags) ? $tabTags : array( 'ENTETE' => false, 'PROC' => false, 'MESSAGE' => true, 'TITRE' => true, 'PILE' => false, 'TRACE' => false, 'EXTRA' => false, )); } function F433a04a0($tabTags,$sTag,$sCode) { switch ($sTag) { case 'PILE': { if (is_array($sCode)) { if (!defined('__INC__FMK/Exception/Assert.php')) { define('__INC__FMK/Exception/Assert.php',true); include_once(WB_INCLUDE_PATH.'WD9d074dc8bd8cf83e3bf6a64d42e8c768.php'); } return F5f052058($sCode); } } break; default: return parent::F433a04a0($tabTags,$sTag,$sCode); } } function F345fa15b() { $sPrefixePath = file_exists('ErrImg.gif') ? '.' : './res/WD' . XVER_WEBDEV; return <<<EOT
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>
		{TITRE}
	</title>
</head>
<body style="color: #333333; background-color: #EEEEEE; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9pt;">
	<div style="background-color: #83a7f2; border-radius: 2px; -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); display: table; margin-left: auto; margin-right: auto;">
		<h1 style="font-size: 12pt; color: #FFFFFF; padding-left: 46px; padding-top: 6px; background:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAfCAMAAADHso01AAAAdVBMVEX///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////+Dp/L7AeupAAAAJXRSTlMAAwYMDxIVHiQnKjM2PEJjZmlsdXilqKuut7q9ydXY2+fq8PP894OOIQAAALVJREFUeF6F0+sSgiAQQOH1mnfBrDTv5Pb+j1jqWESwnr/fMDDAgpQb54zlsQeanKKecW2uC0dBi08oNXFL1lOLSu3pq8mIf43JrpFATSLa1Bt2eK7tPngrX1DPeF00QxNj9ua7mRuAAM2MAZwpLqGiuIKe4h4ExQ9AivFgNb33cHTyEolKCCgOABrizo9fDG4mrmDJN/0W/+ivbaUaFyl8CjtVuxCkbHVKbHrGNLkx45z9TOgLXyRmhnFLq54AAAAASUVORK5CYII=') top left no-repeat; min-height: 25px; margin: 16px;">
			{MESSAGE}
		</h1>
		<div style="background-color: #FFFFFF; padding: 16px; border-bottom-right-radius: 2px; border-bottom-left-radius: 2px;">
			<p style="margin-top:0;">
				{ENTETE}
				{PROC}<br />
				{TRACE}
			</p>
		</div>
	</div>
</body>
	{PILE}
	<br />
	{EXTRA}
</html>
EOT
; } function Ff2d4ce3c() { $sPrefixePath = file_exists('ErrImg.gif') ? '.' : './res/WD' . XVER_WEBDEV; return <<<EOT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>{TITRE}</title>
		<style type="text/css">
table{border-collapse:collapse;}
.CDR-Centre{background-image:url($sPrefixePath/ErrFondCentre.png);}
.CDR-Coin{width:18px;background-image:url($sPrefixePath/ErrFondCoin.png);}
.CDR-Horizontal{background-image:url($sPrefixePath/ErrFondHorizontal.png);}
.CDR-Vertical{background-image:url($sPrefixePath/ErrFondVertical.png);}
		</style>
	</head>
	<body style="background-color:#E0E0E0;font-family:Verdana, Arial, Helvetica, sans-serif;">
		<table style="margin-left:auto;margin-right:auto;">
			<tr style="height:18px;">
				<td class="CDR-Coin" />
				<td class="CDR-Horizontal" />
				<td class="CDR-Coin" style="background-position:100% 0px;" />
			</tr>
			<tr>
				<td class="CDR-Vertical" />
				<td class="CDR-Centre" valign="top">
					<img src="$sPrefixePath/ErrImg.gif" alt="{TITRE}" style="float:left;" />
					<table style="height:48px;">
						<tr>
							<td style="padding-left:6px;vertical-align:middle;font-size:12pt;color:#003399;">{MESSAGE}</td>
						</tr>
					</table>
					<div style="padding-top:6px;border-top:1px solid #E0E0E0;font-size:9pt;color:#000000;">
						<p>{ENTETE}
							{PROC}<br />
							{TRACE}</p>
						<p style="font-style:italic;"/>
					</div>
				</td>
				<td class="CDR-Vertical" style="background-position:100% 0px;" />
			</tr>
			<tr style="height:18px;">
				<td class="CDR-Coin" style="background-position:0px -18px;" />
				<td class="CDR-Horizontal" style="background-position:0px 100%;" />
				<td class="CDR-Coin" style="background-position:100% -18px;" />
			</tr>
		</table>
	</body>
	{PILE}
	<br />
	{EXTRA}
</html>
EOT
; } } class CTemplatePageErreurPerso extends CTemplatePageErreur { var $m_sNomPageErreurPerso; function CTemplatePageErreurPerso($sNomPageErreurPerso=null) { $this->m_sNomPageErreurPerso = $sNomPageErreurPerso; parent::CTemplate(array( 'HTMLTITLE' => false, 'TITLE' => false, 'MSG' => false, 'SYS' => false, )); } function F44db9ade($tag) { return '[%'.$tag.'%]'; } function F433a04a0($tabTags,$sTag,$sCode) { switch ($sTag) { case 'HTMLTITLE' : return isset($tabTags['TITRE']) ? $tabTags['TITRE'] : ''; case 'TITLE' : return isset($tabTags['MESSAGE']) ? $tabTags['MESSAGE'] : ''; case 'MSG' : return (isset($tabTags['ENTETE']) ? $tabTags['ENTETE'] : '') . (isset($tabTags['PROC']) ? $tabTags['PROC'] : '') . '<br />' . (isset($tabTags['TRACE']) ? $tabTags['TRACE'] : ''); case 'SYS' : return ''; case 'PROJET_WEB': { return $this->F44db9ade($sTag); } break; default: return parent::F433a04a0($sTag,$sCode); } } function F345fa15b() { return file_get_contents($this->m_sNomPageErreurPerso ); } } if(array_key_exists('PAGEERREUR',$_GET)) { $sNomPageErrPerso = $_GET['PAGEERREUR']; if (!empty($sNomPageErrPerso)) { $clTemplate = new CTemplatePageErreurPerso($sNomPageErrPerso); } else { $clTemplate = new CTemplatePageErreur(); } } ?>