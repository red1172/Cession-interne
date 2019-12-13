<?php
//20.0.56.0 IHM/Champ/Interrupteur.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 if (!defined('__INC__IHM/Champ/Champ.php')) { define('__INC__IHM/Champ/Champ.php',true); include_once(WB_INCLUDE_PATH.'WD7c939e6867492a5e5416bd4b4327fac0.php'); } class CInterrupteurSelecteurCommun extends CChamp { function CInterrupteurSelecteurCommun() { parent::CChamp(); } function lierVM($sNomVM, $sNomWL, $sNomPHP) { parent::lierVM($sNomVM, $sNomWL, $sNomPHP); for($i=0; $i<$this->Occurrence; ++$i) { new COptionInterrupteur($i+1,$this); } } } class COptionInterrupteur extends CChampZoneTexte { var $Interrupteur; var $Indice; function COptionInterrupteur($Indice,&$Interrupteur) { parent::CChampZoneTexte(); $this->Indice = $Indice; $this->m_sNomPHP = $Interrupteur->m_sNomPHP . $this->Indice; $GLOBALS[$this->m_sNomPHP] =& $this; $this->m_sNomWL = uniqid($Interrupteur->m_sNomWL,true); $this->Alias = uniqid($Interrupteur->Alias,true); $this->m_bLibelleRiche=true; global $MaPage; $MaPage->WB_AjouteChamp($this->m_sNomWL,$this->Alias,$this,$this->m_sNomPHP); $this->lierVM($MaPage->Nom,$this->m_sNomWL,$this->m_sNomPHP); } } class CInterrupteur extends CInterrupteurSelecteurCommun { var $Occurrence; var $TabValeur; var $m_nNbColonnes; function CInterrupteur() { parent::CChamp(); $this->Valeur = false; $this->Occurrence = 1; $this->m_nNbColonnes = 1; $this->ValeurInitiale = false; } function SetNbColonnes( $nNbColonnes = null ) { if (isset($nNbColonnes)) $this->m_nNbColonnes = $nNbColonnes; } function IsChecked( $Indice ) { return $this->GetValI($Indice); } function& GetOccurrence() { $nOccurrence = $this->Occurrence; return $nOccurrence; } function SetValeur($NewVal) { $this->Valeur = (bool)$NewVal; if($this->Occurrence > 0) { $this->SetValI(1, $this->Valeur); } } function Ff11ff472($xValeurAffichee) { if (is_array($xValeurAffichee))$xValeurAffichee = isset($xValeurAffichee[1]) ? $xValeurAffichee[1] : ''; return !empty($xValeurAffichee); } function F16d5955d() { return $this->Valeur - 1; } function SetValI( $Indice, $Val ) { if(!isset($this->TabValeur)) { $this->TabValeur = array(); } if ($Indice < 1) return; if ($Indice > $this->Occurrence) return; if ($Indice == 1) { $this->Valeur = (bool)$Val; } else { $this->TabValeur[ $Indice ] = $Val; } if(Feef890d7()) { F694db118($this->m_sNomPHP); } } function& GetValI( $Indice ) { $bRetourParDefaut = false; if ($Indice < 1) return $bRetourParDefaut; if ($Indice > $this->Occurrence) return $bRetourParDefaut; if ($Indice > 1) { if ( !isset( $this->TabValeur[$Indice] ) ) return $bRetourParDefaut; return $this->TabValeur[$Indice]; } return $this->Valeur; } function Fdc05d49f( $ValeurHTTP ) { $this->TabValeur = array(); $this->Valeur = false; if ( is_array($ValeurHTTP)) { foreach ( $ValeurHTTP as $Valeur ) { if ($Valeur!=='') { $this->SetValI( $Valeur, true ); } } } else { $this->SetValI( $ValeurHTTP, true ); } } function& GetType() { return getRef(5); } function F4a917fa4() { return 5; } var $m_tabIndiceJS = null; function Fab76a847($nIndiceServeur) { if ($this->m_nNbColonnes == 1) return $nIndiceServeur; if (!isset($this->m_tabIndiceJS)) $this->m_tabIndiceJS = $this->Fb00843a0(); if (!isset($this->m_tabIndiceJS[$nIndiceServeur])) return $nIndiceServeur; return $this->m_tabIndiceJS[$nIndiceServeur]; } function Fb00843a0() { $m_nNbLignes = floor($this->Occurrence / $this->m_nNbColonnes); if (($this->Occurrence % $this->m_nNbColonnes) == 0) { $tabRetour = array(0=>null); for($iLigne=1; $iLigne<=$m_nNbLignes; ++$iLigne) { for($iColonne=1; $iColonne<=$this->m_nNbColonnes; ++$iColonne) { $tabRetour[] = intval( $iLigne + ($iColonne-1)*$m_nNbLignes ); } } unset($tabRetour[0]); return $tabRetour; } ++$m_nNbLignes; $tabSrv = array(); $Indice = 1; for ($i = 1; $i <= $this->m_nNbColonnes; $i++) { for ($j = 1; $j <= $m_nNbLignes; $j++) { $tabSrv[$i][$j] = $Indice; ++$Indice; } } $tabRetour = array(0=>-1); $Indice = 1; for ($i = 1; $i <= $m_nNbLignes; $i++) { for ($j = 1; $j <= $this->m_nNbColonnes; $j++) { if ($tabSrv[$j][$i]<=$this->Occurrence) $tabRetour[ $tabSrv[$j][$i] ] = $Indice; ++$Indice; } } return $tabRetour; } function F048cc3de() { return $this->GetAlias() . '[]'; } function F7b5c0e7a() { $sResultat = ""; $nMoins1 = $this->Occurrence==1 ? 0 : 1; for($i=1;$i<=$this->Occurrence;$i++) { $sResultat .= "<JS>[". ($i-$nMoins1) ."].readOnly=false</JS>"; $sResultat .= "<JS>[". ($i-$nMoins1) ."].disabled=false</JS>"; } for($i=1;$i<=$this->Occurrence;$i++) { $nIndiceJS=$this->Fab76a847($i) - $nMoins1; $sResultat .= "<JS>[". $nIndiceJS ."].checked="; if(isset($this->TabValeur) && isset($this->TabValeur[$i]) && $this->TabValeur[$i]) { $sResultat .= "true"; } else if($i == 1) { if($this->Valeur) { $sResultat .= "true"; } else { $sResultat .= "false"; } } else { $sResultat .= "false"; } $sResultat .= "</JS>"; } return $sResultat; } } ?>