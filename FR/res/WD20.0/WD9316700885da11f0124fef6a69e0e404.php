<?php
//20.0.56.0 IHM/Champ/Saisie/SaisieHeure.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 if (!defined('__INC__IHM/Champ/Saisie/Saisie.php')) { define('__INC__IHM/Champ/Saisie/Saisie.php',true); include_once(WB_INCLUDE_PATH.'WD2d958d85e220e9ca486c6dac5b41bd02.php'); } if (!defined('__INC__WL/PAGE/Page.php')) { define('__INC__WL/PAGE/Page.php',true); include_once(WB_INCLUDE_PATH.'WD76227464d26f2611a8dc19c62cf44751.php'); } class CSaisieHeure extends CSaisieFormat { var $Masque; function CSaisieHeure() { parent::CSaisieFormat(); $this->Masque = "HH:MM"; $this->FormatDefaut = "HHMMSSCC"; } function Fb9088766($pszMemorise) { if ($pszMemorise==='') return ''; if ($pszMemorise===null) return null; return F0feb2aff( $pszMemorise, $this->FormatMemorise ); } function F3355e5f9($pszValeur) { if ($pszValeur==='') return ''; if ($pszValeur===null) return null; return F7819245b( utf8_str_pad($pszValeur,8,'0',STR_PAD_RIGHT),$this->FormatMemorise); } function F301cc296($pszValeur) { if ($pszValeur==='') return ''; if ($pszValeur===null) return null; return F7819245b( utf8_str_pad($pszValeur,8,'0',STR_PAD_RIGHT),$this->Masque); } function F6e84afe6($pszAffichee) { if ($pszAffichee==='') return ''; if ($pszAffichee===null) return null; return F0feb2aff( $pszAffichee, $this->Masque ); } function& GetType() { return getRef(20003); } function& F1e21db15() { $t = TYPEWL_HEURE; return $t; } } ?>