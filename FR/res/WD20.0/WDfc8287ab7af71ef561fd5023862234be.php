<?php
//20.0.56.0 FMK/Dependance/Extension.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 define('FMK_Dependance_Extension',true); class FMK_Dependance_Extension { var $m_sNom; var $m_sVersion; var $m_sFichierModule; var $m_tabFonctions = array(); var $m_tabClasses = array(); function FMK_Dependance_Extension($sNom='', $sVersion='', $tabFonc=array(), $sFichier = '') { $this->m_sNom = $sNom; $this->m_sVersion = $sVersion; $this->m_tabFonctions = $tabFonc; $this->m_sFichierModule = $sFichier; } function setNom($sNom){$this->m_sNom = $sNom;} function getNom(){return $this->m_sNom;} function Fff4ae5aa($sVersion){$this->m_sVersion = $sVersion;} function F876820fd(){return $this->m_sVersion;} function Fffda00ea($sFichier){$this->m_sFichierModule = $sFichier;} function F485126e1(){return $this->m_sFichierModule;} function F9653c86e(){return $this->m_tabFonctions;} function F970c84bc($sFonc){$this->m_tabFonctions[] = $sFonc;} function F7ec8ac97(){return $this->m_tabClasses;} function F55f21141($sClasse){$this->m_tabClasses[] = $sClasse;} } $_FMK_Dependance_Extension = null; ?>