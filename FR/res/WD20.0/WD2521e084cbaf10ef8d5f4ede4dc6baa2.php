<?php
//20.0.56.0 FMK/Dessin/Couleur.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 define('FMK_Dessin_Couleur',true); define("CouleurFormatGD" , 1, false); define("CouleurFormatWL" , 2, false); define("CouleurFormatHX" , 3, false); define('iCouleurDefaut' , -3,true); $HALIGN = -1; define('haNonDefini',$HALIGN++); define('aGauche',$HALIGN++); define('auCentre',$HALIGN++); define('aDroite',$HALIGN++); define('Justifie',$HALIGN++); unset($HALIGN); $VALIGN = -1; define('vaNonDefini',$VALIGN++); define('enHaut',$VALIGN++); define('auMilieu',$VALIGN++); define('enBas',$VALIGN++); define('vaAuto',$VALIGN++); define('vaBaseline',$VALIGN++); define('vaSub',$VALIGN++); define('vaSuper',$VALIGN++); define('vaTextTop',$VALIGN++); define('vaTextBottom',$VALIGN++); unset($VALIGN); define('nSURCHARGESTYLE_HALIGN', 0x00000200); define('nSURCHARGESTYLE_VALIGN', 0x00000100); define('nSURCHARGESTYLE_AUCUNE', 0); define('nSURCHARGESTYLE_COULEURFOND', 0x00010000); define('nSURCHARGESTYLE_COULEURTEXTE', 0x00020000); define('nSURCHARGESTYLE_POLICENOM', 0x00000001); define('nSURCHARGESTYLE_POLICEGRAS', 0x00000002); define('nSURCHARGESTYLE_POLICEITALIQUE', 0x00000004); define('nSURCHARGESTYLE_POLICESOULIGNE', 0x00000008); define('nSURCHARGESTYLE_POLICEBARRE', 0x00000010); define('nSURCHARGESTYLE_POLICETAILLE', 0x00000020); define('nSURCHARGESTYLE_TYPECADRE', 0x00000080); $EPOSLIBELLE = 0; define('ExterneLigneLibre' ,$EPOSLIBELLE++); define('ExterneColonneLibre' ,$EPOSLIBELLE++); define('ACheval' ,$EPOSLIBELLE++); define('InterneLigneLibre' ,$EPOSLIBELLE++); define('InterneColonneLibre' ,$EPOSLIBELLE++); unset($EPOSLIBELLE); $STYLE_CADRE = 0; define('StyleCadreFirst',$STYLE_CADRE++); define('AucunCadre',$STYLE_CADRE++); define('Simple',$STYLE_CADRE++); define('StyleCadreLast',$STYLE_CADRE++); unset($STYLE_CADRE); class FMK_Dessin_Couleur { var $m_nRouge = null; var $m_nVert = null; var $m_nBleu = null; var $m_nAlpha = null; var $m_nMinCouleur = 0; var $m_nMaxCouleur = 255; var $m_nMinAlpha = 0; var $m_nMaxAlpha = 255; var $m_bSensAlpha = true; var $m_nFormat = CouleurFormatWL; var $m_tabClasses = null; function FMK_Dessin_Couleur($nMinCouleur=0, $nMaxCouleur=255, $nMinAlpha=0, $nMaxAlpha=255, $nRouge=null, $nVert=null, $nBleu=null, $nAlpha=null) { if (func_num_args() === 1) { $nRouge = $nMinCouleur; $nMinCouleur = 0; } if (is_numeric($nMinCouleur)) $this->m_nMinCouleur = $nMinCouleur; if (is_numeric($nMaxCouleur)) $this->m_nMaxCouleur = $nMaxCouleur; if (is_numeric($nMinAlpha)) $this->m_nMinAlpha = $nMinAlpha; if (is_numeric($nMaxAlpha)) $this->m_nMaxAlpha = $nMaxAlpha; if ( (isset($nRouge)) && (!isset($nVert)) && (!isset($nBleu)) ) { $this->setCouleur($nRouge); } else { $this->Fe78b4064($nRouge,$nVert,$nBleu,$nAlpha); } } function setCouleur($nCouleur) { $this->Fe78b4064(Fadb05a7c($nCouleur,$this->m_nFormat),F88bb47e1($nCouleur,$this->m_nFormat),F72d1dde6($nCouleur,$this->m_nFormat), F8ef357dc($nCouleur,$this->m_nFormat) ); } function Fe78b4064($nRouge=null, $nVert=null, $nBleu=null, $nAlpha=null) { $this->m_nRouge = ($this->F233cccfb($nRouge)) ? $nRouge : $this->m_nMinCouleur; $this->m_nVert = ($this->F233cccfb($nVert)) ? $nVert : $this->m_nMinCouleur; $this->m_nBleu = ($this->F233cccfb($nBleu)) ? $nBleu : $this->m_nMinCouleur; $this->Fe28c2b57($nAlpha); } function Fe28c2b57($nAlpha) { $this->m_nAlpha = ($this->Fa1c76a18($nAlpha)) ? $nAlpha : $this->m_nMinAlpha; } function F233cccfb($nComposante) { return (isset($nComposante)) && ($nComposante<=$this->m_nMaxCouleur) && ($nComposante>=$this->m_nMinCouleur); } function Fa1c76a18($nAlpha) { return (isset($nAlpha)) && ($nAlpha<=$this->m_nMaxAlpha) && ($nAlpha>=$this->m_nMinAlpha); } function getCouleur() { die("ERREUR INTERNE DU FMK"); return false; } function Ff34e8c61() { $nDiff = ($this->m_nMaxCouleur-$this->m_nMinCouleur); $this->m_nRouge = $nDiff - $this->m_nRouge; $this->m_nVert = $nDiff - $this->m_nVert; $this->m_nBleu = $nDiff - $this->m_nBleu; } function F57dd4c6c($nFormatDestination) { $objCouleur = null; switch($nFormatDestination) { case CouleurFormatGD : $objCouleur = new Fe38a1599(); break; case CouleurFormatWL : $objCouleur = new FMK_Dessin_Couleur_WLangage(); break; case CouleurFormatHX : $objCouleur = new FMK_Dessin_Couleur_Hexadecimal(); break; default : if (!isset($this->m_tabClasses)) $this->m_tabClasses = get_declared_classes(); foreach ($this->m_tabClasses as $sNomClasse) { if (utf8_strtolower(utf8_substr($sNomClasse,0,18)) == "fmk_dessin_couleur") { $objCouleur = new ${$sNomClasse}; if ($objCouleur->m_nFormat == $nFormatDestination) break; else $objCouleur = null; } } } if ($objCouleur == null) return false; $objCouleur->Fe78b4064( ($objCouleur->m_nMaxCouleur-$objCouleur->m_nMinCouleur) * ( ($this->m_nRouge-$this->m_nMinCouleur)/($this->m_nMaxCouleur-$this->m_nMinCouleur) ) + $objCouleur->m_nMinCouleur, ($objCouleur->m_nMaxCouleur-$objCouleur->m_nMinCouleur) * ( ($this->m_nVert-$this->m_nMinCouleur)/($this->m_nMaxCouleur-$this->m_nMinCouleur) ) + $objCouleur->m_nMinCouleur, ($objCouleur->m_nMaxCouleur-$objCouleur->m_nMinCouleur) * ( ($this->m_nBleu-$this->m_nMinCouleur)/($this->m_nMaxCouleur-$this->m_nMinCouleur) ) + $objCouleur->m_nMinCouleur, ($objCouleur->m_nMaxAlpha-$objCouleur->m_nMinAlpha) * ( ($this->m_nAlpha-$this->m_nMinAlpha)/($this->m_nMaxAlpha-$this->m_nMinAlpha) ) + $objCouleur->m_nMinAlpha ); if ($objCouleur->m_bSensAlpha ^ $this->m_bSensAlpha) $objCouleur->m_nAlpha = $objCouleur->m_nMinAlpha + ($objCouleur->m_nMaxAlpha - $objCouleur->m_nAlpha); return $objCouleur->getCouleur(); } function F3a5449a5($nIncTeinte = 0, $nIncSaturation = 0, $nIncLuminosite = 0) { $nTeinte = 0; $nSaturation = 0; $nLuminosite = 0; F043b1c5e($this->F57dd4c6c(CouleurFormatWL),$nTeinte,$nLuminosite,$nSaturation); $nTeinte += $nIncTeinte; $nSaturation += $nIncSaturation; $nLuminosite += $nIncLuminosite; $nCouleurWL = F5e769b88($nTeinte,$nLuminosite,$nSaturation); $fmkCouleurWl = new FMK_Dessin_Couleur_WLangage($nCouleurWL); $this->setCouleur( $fmkCouleurWl->F57dd4c6c($this->m_nFormat) ); } function Fc4e52cf2() {return $this->m_nBleu; } function Fa52ff691() {return $this->m_nVert; } function F531d5529() {return $this->m_nRouge;} function F43e12208() {return $this->m_nAlpha;} } $_FMK_Dessin_Couleur = null; if (!defined('__INC__FMK/Dessin/Couleur/Gd.php')) { define('__INC__FMK/Dessin/Couleur/Gd.php',true); include_once(WB_INCLUDE_PATH.'WDe77f168b688aec7c30ad8c5abe87073a.php'); } if (!defined('__INC__FMK/Dessin/Couleur/Hexadecimal.php')) { define('__INC__FMK/Dessin/Couleur/Hexadecimal.php',true); include_once(WB_INCLUDE_PATH.'WD28e62a2684033b9a22a05b6b7823abc7.php'); } if (!defined('__INC__FMK/Dessin/Couleur/WLangage.php')) { define('__INC__FMK/Dessin/Couleur/WLangage.php',true); include_once(WB_INCLUDE_PATH.'WD0a927ac91243cbedb815caafeb550d5a.php'); } function F5bfcd185($dwCouleur) { if ($dwCouleur == -1) return -1; $dwCouleur = ($dwCouleur & 0xFF0000)/0X10000 + ($dwCouleur & 0xFF00) + ($dwCouleur & 0xFF)*0x10000; $szCoul = dechex($dwCouleur); return utf8_str_pad($szCoul,6,'0',STR_PAD_LEFT); } function F81ed08ab( $nRouge, $nVert, $nBleu, $nAlpha = gdAlphaDefaut) { return 65536*$nRouge + 256*$nVert + $nBleu + 16777216 * $nAlpha; } function F4f6e8051( $nRouge, $nVert, $nBleu, $nAlpha = wlOpaciteDefaut) { return 65536*$nBleu + 256*$nVert + $nRouge + 16777216 * $nAlpha; } function F04415608( $nRouge, $nVert, $nBleu, $nAlpha = wlOpaciteDefaut) { $nRouge = ($nRouge< 16 ) ? '0'.dechex($nRouge) : dechex($nRouge); $nVert = ($nVert < 16 ) ? '0'.dechex($nVert ) : dechex($nVert ); $nBleu = ($nBleu < 16 ) ? '0'.dechex($nBleu ) : dechex($nBleu ); return $nRouge . $nVert . $nBleu . dechex($nAlpha); } function F6676bda4($nCouleur, $nFormat = CouleurFormatGD) { return F5208c3bc($nCouleur,$nFormat); } function Fc62f7063($nCouleur, $nFormat = CouleurFormatGD, $bInverserCouleur = false) { switch ( $nFormat ) { case CouleurFormatGD : break; case CouleurFormatWL : $nCouleur = Fb121f882($nCouleur); break; case CouleurFormatHX : $nCouleur = F63d91c07($nCouleur); break; default : return null; } if ($bInverserCouleur) { $fmkCouleur = new Fe38a1599($nCouleur); $fmkCouleur->Ff34e8c61(); $nCouleur = $fmkCouleur->getCouleur(); $fmkCouleur = null; } return $nCouleur; } function F9b65f3c4($nAlpha, $nFormatAlpha = CouleurFormatWL) { switch ($nFormatAlpha) { case CouleurFormatGD : return $nAlpha; case CouleurFormatWL : return (gdAlphaMax-((($nAlpha-wlOpaciteMin)/(wlOpaciteMax-wlOpaciteMin)) * gdAlphaMax)); case CouleurFormatHX : return (gdAlphaMax-((($nAlpha-0x00)/(0xFF-0x00)) * gdAlphaMax)); default : return $nAlpha; } } function F4db7eeed($nAlpha, $nFormatAlpha = CouleurFormatGD) { switch ($nFormatAlpha) { case CouleurFormatWL : return $nAlpha; case CouleurFormatGD : return (wlOpaciteMax-((($nAlpha-0)/(gdAlphaMax-0)) * wlOpaciteMax)); case CouleurFormatHX : return (wlOpaciteMax-((($nAlpha-0x00)/(0xFF-0x00)) * wlOpaciteMax)); default : return $nAlpha; } } function F967399ea($nCouleurGD, $nAlpha = gdAlphaDefaut, $nFormatAlpha = CouleurFormatGD) { if ($nCouleurGD<0) return $nCouleurGD; $nAlphaCourant = $nCouleurGD >> 24; if ($nAlphaCourant >0) $nCouleurGD -= $nAlphaCourant * 16777216; return $nCouleurGD + (F9b65f3c4($nAlpha,$nFormatAlpha) << 24); } function F5208c3bc($nCouleur, $nFormat = CouleurFormatGD) { return Fc62f7063($nCouleur,$nFormat,true); } function F72d1dde6($nCouleur, $nFormat = CouleurFormatGD) { return Fc62f7063($nCouleur,$nFormat) & 0xFF; } function Fadb05a7c($nCouleur, $nFormat = CouleurFormatGD) { return Fc62f7063($nCouleur,$nFormat) >> 16 & 0xFF; } function F88bb47e1($nCouleur, $nFormat = CouleurFormatGD) { return Fc62f7063($nCouleur,$nFormat) >> 8 & 0xFF; } function F8ef357dc($nCouleur, $nFormat = CouleurFormatGD) { return Fc62f7063($nCouleur,$nFormat) >> 24 & 0xFF; } function Fb121f882($nCouleurWL) { if ($nCouleurWL == Transparent) $nCouleurWL = IMG_COLOR_TRANSPARENT; if ($nCouleurWL < 0) return $nCouleurWL; $a = gdAlphaDefaut; $b = ($nCouleurWL >> 16) & 0xFF; $g = ($nCouleurWL >> 8) & 0xFF; $r = $nCouleurWL & 0xFF; return F81ed08ab($r,$g,$b,$a); } function F91b14b72($nCouleurGD) { if ($nCouleurGD == IMG_COLOR_TRANSPARENT) $nCouleurGD = Transparent; if ($nCouleurGD < 0) return $nCouleurGD; $a = ($nCouleurGD >> 24) & 0xFF; $a=F4db7eeed($a); $r = ($nCouleurGD >> 16) & 0xFF; $g = ($nCouleurGD >> 8) & 0xFF; $b = $nCouleurGD & 0xFF; return F4f6e8051($r,$g,$b,$a); } function F63d91c07($sCouleurHX) { $sCouleurHX = (string)$sCouleurHX; if ($sCouleurHX[0] == '#') $sCouleurHX = utf8_substr($sCouleurHX,1); if (utf8_strlen($sCouleurHX) < 6) return gdCouleurD�faut; $r = hexdec(utf8_substr($sCouleurHX,0,2)) & 0xFF; $g = hexdec(utf8_substr($sCouleurHX,2,2)) & 0xFF; $b = hexdec(utf8_substr($sCouleurHX,4,2)) & 0xFF; $a = gdAlphaDefaut; if (utf8_strlen($sCouleurHX)>6) $a = F9b65f3c4((utf8_substr($sCouleurHX,6)),CouleurFormatHX); return F81ed08ab($r,$g,$b,$a); } function Fbbecabcb($nCouleurOrigine, $bInverse = false) { if ($bInverse) { $a = 255 - ($nCouleurOrigine >> 24) & 0xFF; $r = 255 - ($nCouleurOrigine >> 16) & 0xFF; $g = 255 - ($nCouleurOrigine >> 8) & 0xFF; $b = 255 - $nCouleurOrigine & 0xFF; } else { $a = ($nCouleurOrigine >> 24) & 0xFF; $r = ($nCouleurOrigine >> 16) & 0xFF; $g = ($nCouleurOrigine >> 8) & 0xFF; $b = $nCouleurOrigine & 0xFF; } return F04415608($r,$g,$b,$a); } function F043b1c5e($Couleur,&$Teinte,&$Luminosite,&$Saturation) { $Rouge = (double)($Couleur & 0xFF) / 255.0; $Vert = (double)(($Couleur & 0xFF00) >> 8) / 255.0; $Bleu = (double)(($Couleur & 0xFF0000) >> 16) / 255.0; $Teint = 0; $Lumin = 0; $Satur = 0; $MinVal = min($Rouge, min($Vert, $Bleu)); $MaxVal = max($Rouge, max($Vert, $Bleu)); $Diff = $MaxVal - $MinVal; $Somme = $MaxVal + $MinVal; $Lumin = $Somme / 2.0; if ($MaxVal == $MinVal) { $Satur = 0.0; $Teint = 0.0; } else { $Satur = ($Lumin <= 0.5) ? ($Diff / $Somme) : ($Diff / (2.0 - $Somme)); $RougeNorm = ($MaxVal - $Rouge) / $Diff; $VertNorm = ($MaxVal - $Vert) / $Diff; $BleuNorm = ($MaxVal - $Bleu) / $Diff; if ($Rouge == $MaxVal) $Teint = 60.0 * (6.0 + $BleuNorm - $VertNorm); else if ($Vert == $MaxVal) $Teint = 60.0 * (2.0 + $RougeNorm - $BleuNorm); else $Teint = 60.0 * (4.0 + $VertNorm - $RougeNorm); } if ($Teint < 0.0) $Teint += 360.0; $Teinte = round($Teint) % 360; $Lum = round($Lumin * 100.0); $Luminosite = max(0, min($Lum, 100)); $Sat = round($Satur * 100.0); $Saturation = max(0, min($Sat, 100)); } function F5e769b88($nTeinte,$nLuminosite,$nSaturation) { $nRouge = 0; $nVert = 0; $nBleu = 0; if ($nSaturation == 0) { $nBleu = floor(max(0,min(255,($nLuminosite * 255) / 100))); $nRouge = $nBleu; $nVert = $nBleu; } else { $fTeinte = $nTeinte; $fLuminosite = $nLuminosite / 100.0; $fSaturation = $nSaturation / 100.0; if ($fLuminosite <= 0.5) { $fRm2 = $fLuminosite + $fLuminosite * $fSaturation; } else { $fRm2 = $fLuminosite + $fSaturation - $fLuminosite * $fSaturation; } $fRm1 = 2.0 * $fLuminosite - $fRm2; $nRouge = floor(Ffc9a837a($fRm1, $fRm2, $fTeinte + 120.0)); $nVert = floor(Ffc9a837a($fRm1, $fRm2, $fTeinte)); $nBleu = floor(Ffc9a837a($fRm1, $fRm2, $fTeinte - 120.0)); } return F4f6e8051($nRouge,$nVert,$nBleu,0); } function Ffc9a837a($rm1,$rm2,$Teinte) { if ($Teinte > 360) $Teinte = $Teinte - 360; elseif ($Teinte < 0) $Teinte = $Teinte + 360; if ($Teinte < 60) { $rm1 = $rm1 + ($rm2-$rm1) * $Teinte / 60; } elseif ($Teinte<180) { $rm1 = $rm2; } elseif ($Teinte<240) { $rm1 = $rm1 + ($rm2-$rm1) * (240-$Teinte) / 60; } $nRGB = floor($rm1 * 255); if($nRGB < 0) { $nRGB = 0; } else if($nRGB > 255) { $nRGB = 255; } return $nRGB; } function F688097ae($Couleur) { F043b1c5e($Couleur,$Teinte,$Luminosite,$Saturation); unset($Teinte); unset($Saturation); return $Luminosite; } function F8663c22b($Couleur) { F043b1c5e($Couleur,$Teinte,$Luminosite,$Saturation); unset($Teinte); unset($Luminosite); return $Saturation; } function F338d69bf($Couleur) { F043b1c5e($Couleur,$Teinte,$Luminosite,$Saturation); unset($Saturation); unset($Luminosite); return $Teinte; } ?>