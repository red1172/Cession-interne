<?php
//20.0.56.0 IHM/Champ/Saisie/SaisieMonetaire.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 if (!defined('__INC__IHM/Champ/Saisie/SaisieNumerique.php')) { define('__INC__IHM/Champ/Saisie/SaisieNumerique.php',true); include_once(WB_INCLUDE_PATH.'WD74ef5da06bd5197c27953ca0b8dc477a.php'); } class CSaisieMonetaire extends CSaisieNumerique { var $m_cDevise = null; function CSaisieMonetaire($cDevise = DEVISE_EURO) { parent::CSaisieNumerique(); $this->F65b10405($cDevise); } function F301cc296($pszValeur) { $sDevise = $this->Fba4ad01d(); if (empty($pszValeur) && ($this->m_bATTMISEABLANC)) return ''; $sTmpMasque = $this->Masque; if (utf8_strpos($this->Masque,"$$")!==false) { $this->Masque = utf8_str_replace("$$","$",$this->Masque); } else { $this->Masque = utf8_str_replace("$",$sDevise,$this->Masque); } $sRetour = parent::F301cc296($pszValeur); $this->Masque = $sTmpMasque; return $sRetour; } function F6e84afe6($pszAffichee) { return F3f15405d( utf8_str_replace($this->Fba4ad01d(),'',$pszAffichee), $this->Masque, $this->m_sForceSeparateurDecimal ); } function F65b10405($cDevise) { $this->m_cDevise = $cDevise; } function& Fba4ad01d() { global $_gszSEPDEVISE; $sDevise = $this->m_cDevise; if (isset($_gszSEPDEVISE)) $sDevise = $_gszSEPDEVISE; return $sDevise; } function& GetType() { return getRef(20005); } } ?>