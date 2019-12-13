<?php
//20.0.56.0 WL/ERREUR/Throw5.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 interface IException { public function getMessage(); public function getCode(); public function getFile(); public function getLine(); public function getTrace(); public function getTraceAsString(); public function __toString(); } interface IDelegation { function F0771f22e(); } function Fe1031a23(&$pclInstance, Exception $pclException) { if (!isset($pclInstance)) $pclInstance = new WDExceptionCommun($pclException->getMessage(),$pclException->getCode()); } abstract class ExceptionAbstract extends Exception implements IDelegation { protected $pclDelegate; public function F0771f22e() { Fe1031a23($this->pclDelegate,$this); } protected $message = 'Unknown exception'; private $string; protected $code = 0; protected $file; protected $line; private $trace; } interface IErrorException extends IException { public function getSeverity ( ); } abstract class ErrorAbstract extends ErrorException implements IDelegation { protected $pclDelegate; public function F0771f22e() { Fe1031a23($this->pclDelegate,$this); } protected $severity ; } interface IWDExceptionDelegation extends IException { public function WB_GetTrace(); public function WB_GetTraceAsString(); public function WB_GetInfo($nIdInfo); public function WB_bDejaMarque($f,$l); public function WB_SetMarqueur($f,$l); } class WDExceptionCommun extends Exception implements IException,IWDExceptionDelegation { static public $gclContexteErreurExceptionEnCours = array(); private $marqueur; private $ligne; private $fichier; private $bFatale; static public function & pclGetDerniereErreurException($bFatale=null) { $nNb = count(WDExceptionCommun::$gclContexteErreurExceptionEnCours); for($i=$nNb-1; $i>=0; $i--) { if (!isset($bFatale) || (WDExceptionCommun::$gclContexteErreurExceptionEnCours[$i]->bFatale === $bFatale)) { return WDExceptionCommun::$gclContexteErreurExceptionEnCours[$i]; } } return getRef(null); } public function SetDerniereErreurFatale($bFatale) { $e =& WDExceptionCommun::pclGetDerniereErreurException(); if (!isset($e)) return; $e->bFatale = $bFatale; if (!$e->bFatale) { F67cfd262(); F853b7085($e->getMessage(),errMessage); } } public function __toString() { return __CLASS__ . ": [{$this->code}]: {$this->message}\n"; } function WB_bDejaMarque($f,$l) { foreach (WDExceptionCommun::$gclContexteErreurExceptionEnCours as $e) { if ( $e->marqueur == $this->F3048a763($f,$l) ) { return true; } } return false; } function F3048a763($f,$l) { return $f.$l; } function WB_SetMarqueur($f,$l) { $this->marqueur = $this->F3048a763($f,$l); $this->fichier = $f; $this->ligne = $l; WDExceptionCommun::$gclContexteErreurExceptionEnCours[] =& $this; } public function WB_GetTrace() { ; } public function WB_GetTraceAsString() { ; } public function WB_GetInfo($nIdInfo) { $sInformation = ''; switch($nIdInfo) { case errComplet: case errCode: $sInformation.=$this->getCode(); if ($nIdInfo!=errComplet) break; else $sInformation .=' '; case errMessage: $sInformation.= utf8_strip_tags($this->getMessage()); if ($nIdInfo!=errComplet) break; else $sInformation .=' '; default: if ($nIdInfo!=errComplet) { $sInformation = null; } } return $sInformation; } } function Fcec078b5() { throw new WDErreur(ErreurInfo(),E_USER_WARNING,0); } function F4df97bb5($sMessage,$tabInfos) { $pclException = new WDException($sMessage,E_USER_ERROR); $pclException->m_tabInfosPageErreur = $tabInfos; $tabPile = $pclException->getTrace(); if ($tabPile[count($tabPile)-1]['function'] == 'Callback_FinExecution') { FMK_Exception_Callback($pclException); } else { throw $pclException; } } set_exception_handler('FMK_Exception_Callback'); function FMK_Exception_Callback(Exception $e) { if ($e->bFatale) { $clVM =& obtenirVM(); $sNomProcPHP = $clVM->Fbd28557d(); if (isset($sNomProcPHP)) { return call_user_func($sNomProcPHP,$e); } FMK_Charge( 'WL/ERREUR/Erreur.php'); F1d654010(isset($e->m_tabInfosPageErreur['MESSAGE']) ? $e->m_tabInfosPageErreur : array('MESSAGE'=>$e->getMessage())); } else { } return null; } function ExceptionDeclenche($NiveauErreur, $Message = "") { throw new WDException($Message,$NiveauErreur); } function ErreurDeclenche($NiveauErreur, $Message = "") { throw new WDErreur($Message,$NiveauErreur); } function ErreurPropage(WDErreur $e, $sMsg = null) { if (!isset($e)) { $e =& WDExceptionCommun::pclGetDerniereErreurException(false); if (!isset($e)) return; } if (isset($sMsg)) $e->message .= $sMsg; throw $e; } function ExceptionPropage(WDException $e, $sMsg = null) { if (!isset($e)) { $e =& WDExceptionCommun::pclGetDerniereErreurException(true); if (!isset($e)) return; } if (isset($sMsg)) $e->message .= $sMsg; throw $e; } function ExceptionInfo($e, $nIdInfo = errMessage, $nIndiceSousErreur = null) { if (!isset($e)) { $e =& WDExceptionCommun::pclGetDerniereErreurException(true); if (!isset($e)) return null; } switch ($nIdInfo) { case errMessage: case errCode: case errComplet: return $e->WB_GetInfo($nIdInfo); default: Fe81a7f9e('ERR_PARAMETRE_VALEUR_INCORRECT','FCT_EXCEPTIONINFO'); } return null; } class WDException extends ExceptionAbstract implements IException,IWDExceptionDelegation { public $bFatale = true; public $m_tabInfosPageErreur = null; public function __construct($message, $code = 0) { parent::__construct($message, $code); } public function WB_GetTrace() { $this->F0771f22e(); return $this->pclDelegate->WB_GetTrace(); } public function WB_GetTraceAsString() { $this->F0771f22e(); return $this->pclDelegate->WB_GetTraceAsString(); } public function WB_GetInfo($nIdInfo) { switch($nIdInfo) { default: $this->F0771f22e(); return $this->pclDelegate->WB_GetInfo($nIdInfo); } return null; } public function WB_bDejaMarque($f,$l) { $this->F0771f22e(); return $this->pclDelegate->WB_bDejaMarque($f,$l); } public function WB_SetMarqueur($f,$l) { $this->F0771f22e(); $this->pclDelegate->WB_SetMarqueur($f,$l); $this->pclDelegate->SetDerniereErreurFatale($this->bFatale); } } class WDErreur extends ErrorAbstract implements IErrorException,IWDExceptionDelegation { public $bFatale = false; function __construct($message, $code, $severity=null, $filename = null, $lineno = null) { parent::__construct($message, $code, $severity, $filename, $lineno); } public function WB_GetTrace() { $this->F0771f22e(); return $this->pclDelegate->WB_GetTrace(); } public function WB_GetTraceAsString() { $this->F0771f22e(); return $this->pclDelegate->WB_GetTraceAsString(); } public function WB_GetInfo($nIdInfo) { switch($nIdInfo) { default: $this->F0771f22e(); return $this->pclDelegate->WB_GetInfo($nIdInfo); } return null; } public function WB_bDejaMarque($f,$l) { $this->F0771f22e(); return $this->pclDelegate->WB_bDejaMarque($f,$l); } public function WB_SetMarqueur($f,$l) { $this->F0771f22e(); $this->pclDelegate->WB_SetMarqueur($f,$l); $this->pclDelegate->SetDerniereErreurFatale($this->bFatale); } } ?>