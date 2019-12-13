<?php
//20.0.56.0 Interface.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 if (!defined('__INC__TYPE/Usine.php')) { define('__INC__TYPE/Usine.php',true); include_once(WB_INCLUDE_PATH.'WDa33fd4b06ba3e49d876e9996bca0c7e0.php'); } if (!defined('__INC__FMK/Environnement.php')) { define('__INC__FMK/Environnement.php',true); include_once(WB_INCLUDE_PATH.'WD62c1fcbeb97cd284448bd7a6ec627839.php'); } define('IND_ANY',0); define('IND_CHAMP',4); define('IND_VARIABLE',5); define('IND_FICHIER',3); define('IND_RUBRIQUE',6); define('IND_PAGE',7); define('IND_CONNEXION',8); define('IND_PARAMETRE_REQUETE',10); define('PHPVERSION_4_BUG27819',(version_compare(PHP_VERSION,'4.3.6')===-1)); $WDModele_Usine = null; function& F166ad91b() { return CTypeUsine(); } function& GetGlobal($sNom) { if (isset($GLOBALS[$sNom])) { return $GLOBALS[$sNom]; } else { $clVM =& obtenirVM(); $sNomPHP = $clVM->F5919ed9f($sNom); if (!isset($sNomPHP)) { global $MaPage; Fe81a7f9e(((!isset($MaPage) || !$MaPage->bAvecContexte) ? 'ERR_VARIABLE_GLOBALE_INCONNUE' : 'ERR_VARIABLE_GLOBALE_INCONNUE_AVEC_CONTEXTE'), $sNom); } return $GLOBALS[$sNom]; } return RetourErreur_Entier; } function& MaSource(&$pclChamp) { if (isset($pclChamp->FichierParcours)) { return $pclChamp->FichierParcours; } Fe81a7f9e('ERR_MASOURCE_NON_TROUVEE',$pclChamp->m_sNomWL,F3b9ec4ca($pclChamp)); return null; } function& MonParent($pclChampFils=null) { $pclVMMgr =& F08aafbb0(); if ($pclChampFils===null) { $pclVM =& obtenirVM(); $sNomPHP = $pclVM->F67af5b5c($pclVMMgr->F9faba883()); if ($sNomPHP!='') { $pclChampFils =& F9abbf335($sNomPHP,IND_CHAMP); } if ($pclChampFils===null) { global $MaPage; return $MaPage; } } $sNomVMFils = $pclChampFils->Fe26ffff2(); $pclVMFils =& $pclVMMgr->Fe26ffff2($sNomVMFils); if (!$pclVMFils->Fdb41866b()) { Fe81a7f9e('ERR_MONPARENT_NON_TROUVE', $pclChampFils->GetNom()); } $sNomParent = $pclVMFils->getNom(); while( ($nPos = utf8_strpos($sNomParent,'.'))!==false ) { $sNomParent = utf8_substr($sNomParent,$nPos+1); } $sNomVariableParent = $pclVMFils->F67af5b5c($sNomParent); if (!isset($sNomVariableParent)) { Fe81a7f9e('ERR_MONPARENT_NON_TROUVE', $pclChampFils->GetNom()); } $pclChampParent =& F9abbf335($sNomVariableParent,IND_CHAMP); return $pclChampParent; } function CreerConstante($sNom, $Valeur) { $pclVM =& obtenirVM(); $sNom = $pclVM->m_sNom .'_'.$sNom; if (defined($sNom)) { Erreur('ErreurGenerique',FMK_ChaineConstruit(F1ac3f040('CONSTANTE_EXISTANTE'),$sNom)); } define($sNom,$Valeur); } function& CreerChamp() { $tabArgs = func_get_args(); $clUsine =& F166ad91b(); $clChamp = call_user_func_array(array(&$clUsine,'creerChamp'),$tabArgs); return $clChamp; } function& CreerType(&$var, $sNomWL , $type = "", $valeur = null,$bEstTemporaire=false) { $WDModele_Usine =& F166ad91b(); if ( ($type==="") || ($type===$valeur)) { if (is_object($type)||is_object($valeur)) { $var = _clone(empty($type)?$valeur:$type); } else { $WDModele_Usine =& F166ad91b(); $var = $WDModele_Usine->creerType(F541bbf6d($valeur),$valeur); } } else { if ($bEstTemporaire) { $var = F97fe9528($type,$valeur); } else { $WDModele_Usine =& F166ad91b(); $var = $WDModele_Usine->creerType($type,$valeur); } } if (isset($sNomWL)) $var->m_sNomWL = $sNomWL; if (PHPVERSION_4_BUG27819) { return getRef($var); } return $var; } function ExecuteAncetre($sNom) { if (function_exists($sNom)) { call_user_func($sNom); } } function F541bbf6d($valeur) { $type = TYPEWL_VARIANT; if ( isset($valeur) ) { if (is_bool($valeur)) $type = TYPEWL_BOOLEEN; elseif (is_array($valeur)) { $k=key($valeur); if (!isset($k) || ($k===0) ) { $type = TYPEWL_TABLEAU; } else { $type = TYPEWL_TABLEAU_ASSOCIATIF; } } elseif (is_string($valeur)) $type = TYPEWL_VARIANT; elseif (is_resource($valeur)) $type = TYPEWL_ENTIER; else $type = TYPEWL_NOMBRE; } return $type; } function& CreerTypeSiBesoin(&$valeur,$bIsObject = null,$bEstTemporaire = false) { if (!isset($bIsObject)) $bIsObject = is_object($valeur); if (!$bIsObject) { return CreerType($var,null,F541bbf6d($valeur),$valeur,$bEstTemporaire); } else { if (defined('HF') && (F9ef91cd8($valeur))) { return CreerType($var,null,F541bbf6d( ($valeur->F7b5edca9() ? F075ca95b($valeur) : VersPrimitif($valeur)) ), VersPrimitif($valeur) ,$bEstTemporaire); } } return $valeur; } function Feb4b0a2d(&$valeur) { return ( (!is_object($valeur)) || (defined('HF') && (F9ef91cd8($valeur))) ); } function& GetProp(&$var, $prop) { $clPropriete = null; if (!is_array($var)) { if (!is_object($var)) { Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('PROPRIETE_INDISPONIBLE'),F8d3db64f($prop))); } $clPropriete = new CPropriete($var, $prop); } else { if (!is_object($var[0])) $var[0] =& F9abbf335($var[0],IND_CHAMP); $clPropriete = new CProprieteAttributAuto($var[0], $prop,$var[1], $var[2]); } return $clPropriete; } function& Expression($sTypeOperateur, &$clObjet, $sOptionOperateur = null) { if (!isset($sOptionOperateur)) { return Operateur($sTypeOperateur,$clObjet); } $clConteneur = new CExpression($clObjet,$sTypeOperateur,$sOptionOperateur); return $clConteneur; } function& SousType(&$Conteneur, $IndicationContenu, $ComplementIndicationContenu = null) { if ( (!is_object($Conteneur)) || ((!is_callable(array($Conteneur,'operateurSub')))&&($Conteneur->m_nIsXXX !== 8)&&($Conteneur->m_nIsXXX !== 32)&&($Conteneur->m_nIsXXX !== 16)) ) { reset($Conteneur); if (is_array($Conteneur)) return $Conteneur[VersPrimitif($IndicationContenu) - (intval(key($Conteneur))===1 ? 0 : 1) ]; Erreur('ErreurGenerique',FMK_ChaineConstruit(Fc34ec142('OPERATEUR_INDISPONIBLE'),F9dbbbee0(8252),F3b9ec4ca($Conteneur))); } $clSousType = null; if (!isset($ComplementIndicationContenu)) $clSousType = new CSousType($Conteneur,$IndicationContenu); else $clSousType = new CSousType($Conteneur,$IndicationContenu,$ComplementIndicationContenu); return $clSousType; } function& SetValeur(&$pclLV, $clValeur) { if (is_object($pclLV)) { if ($pclLV->m_nIsXXX === 0) { $pclLV->SetValeur($clValeur); return $pclLV->GetValeur(); } else { return Operateur(95,$pclLV,$clValeur); } } else { switch (F541bbf6d($pclLV)) { case TYPEWL_ENTIER: $pclLV = intval($pclLV); break; default: ; } $pclLV = VersPrimitif($clValeur); return $pclLV; } } function& F3df01b28(&$pclDino) { if (!is_object($pclDino)) { $null=null; return $null; } switch ($pclDino->m_nIsXXX) { case 32: case 16: case 8: return GetValeur($pclDino); default: return $pclDino; } } function& GetValeur(&$param1) { if (!is_object($param1)) return $param1; return $param1->GetValeur(); } function& VersChaine($param) { if (!is_object($param)) { $sParam = (is_bool($param) ? ($param?'1':'0') : (is_float($param) ? F617bf240($param) : (string)$param)); return $sParam; } return $param->Fc424b461(); } function VersConversion( $Valeur , $nTypeConversion = 0 ) { switch ($nTypeConversion) { case 3: return utf8_str_replace("\r",'\r',utf8_str_replace("\n",'\n',utf8_addslashes(VersChaine($Valeur)))); case 14: return VersPrimitif($Valeur); case 15: return VersPrimitif($Valeur); case 2: break; default: } return VersPrimitif($Valeur); } function& VersPrimitif($param) { if (is_object($param)) return VersPrimitif(GetValeur($param)); if (is_array($param)) return getRef( _array_map($param) ); return $param; } function& F075ca95b($param) { $primitif =& VersPrimitif($param); if ($primitif===null) { $primitif = 0; } elseif (is_bool($primitif)) { $primitif = ($primitif) ? 1 : 0; } elseif (is_string($primitif)) { $dValeurFloat = floatval($primitif); $nValeurEntier = intval($primitif); if ($nValeurEntier == $dValeurFloat) return $nValeurEntier; return $dValeurFloat; } return $primitif; } CreerType($__CAST__BOOL ,null,TYPEWL_BOOLEEN,false); function& VersBooleen($param) { if (is_bool($param)) return $param; return getRef($GLOBALS['__CAST__BOOL']->F1b8e122c($param)); } function GetNomPHPVariableGlobale($sNomWL) { $clVM =& obtenirVM(); return $clVM->F5919ed9f($sNomWL); } function& GetNomChamp(&$param) { if (is_object($param)) { if ($param->F70cea20e()){ return $param->F960e3ffe(); } return GetNomChamp(VersPrimitif($param)); } global $MaPage; if (isset($GLOBALS[$param]) && (($MaPage->m_sNomPHP == $GLOBALS[$param]->m_sNomPHP) || isset($MaPage->TabChamp[$GLOBALS[$param]->Alias]))) return $param; $clVM =& obtenirVM(); $sNomTrouve = $clVM->F67af5b5c($param); if (isset($sNomTrouve)) { return $sNomTrouve; } else { return $param; } } function& Fb4985004(&$param) { $sNomProcedure =& VersChaine($param); $clVM =& obtenirVM(); $sNomTrouve = $clVM->Ff06e3e53( $sNomProcedure ); if (isset($sNomTrouve)) { if (function_exists($sNomTrouve)) { return $sNomTrouve; } else { $sNomFic = $clVM->Ff06e3e53( $sNomProcedure , true); if (file_exists($sNomFicACP=F9486bf1a($sNomFic))) { require_once($sNomFicACP); if (function_exists($sNomTrouve)) { return $sNomTrouve; } } if (XVER_DEBUG){ die("MEMOIRE CORROMPUE : ON A TROUVE UNE PROCEDURE QUI N'EXISTE PAS!"); } } } else { return $param; } } function& Operateur($sTypeOperateur, &$PartieGauche, $PartieDroite = null, $Valeur = null) { if ((($bGaucheis_scalar_or_castable_as_scalar=F91f6c6c8($PartieGauche)) && F91f6c6c8($PartieDroite) )) { if ($sTypeOperateur & 2048) { $bOperationReussie = true; if (($sTypeOperateur & 3840) == 3072) { switch ($sTypeOperateur) { case 44036: $Retour = F6bbd4334($PartieGauche); break; case 44038: $Retour = ! F6bbd4334($PartieGauche); break; default: $bOperationReussie = false; } } else { $primPartieGauche = VersPrimitif($PartieGauche); $primPartieDroite = VersPrimitif($PartieDroite); switch ($sTypeOperateur) { case 18432: $Retour = Fe4bf894d($primPartieGauche,$primPartieDroite); break; case 18440: $Retour = Fbe774e59($primPartieGauche,$primPartieDroite); break; case 18442: $Retour = Fd2078f0c($primPartieGauche,$primPartieDroite); break; case 14608: $Retour = F856992a1($primPartieGauche,$primPartieDroite); break; case 14354: $Retour = Faac9bb4c($primPartieGauche,$primPartieDroite); break; case 14356: $Retour = Fc8bab616($primPartieGauche,$primPartieDroite); break; case 6166: $Retour = F791b7c6d($primPartieGauche,$primPartieDroite); break; case 6168: $Retour = F66d4f961($primPartieGauche,$primPartieDroite); break; case 43290: $Retour = F8e8c5b63($primPartieGauche,$primPartieDroite); break; case 43292: $Retour = F8a5c4a8f($primPartieGauche,$primPartieDroite); break; case 38960: $Retour = F73c8c735($primPartieGauche); break; case 22834: $Retour = Fc4e4d30e($primPartieGauche,$primPartieDroite); break; case 22836: $Retour = F6d1ea138($primPartieGauche,$primPartieDroite); break; case 22848: case 22838: $Retour = F8145229a($primPartieGauche,$primPartieDroite); break; case 39224: $Retour = F83651b3d($primPartieGauche,$primPartieDroite); break; case 39226: $Retour = Fbc1ef051($primPartieGauche,$primPartieDroite); break; case 22594: $Retour = F6ad9f563($primPartieGauche,$primPartieDroite); break; case 14404: $Retour = F2191518a($primPartieGauche,$primPartieDroite); break; case 22598: $Retour = Fe680d22d($primPartieGauche,$primPartieDroite, is_object($PartieGauche) ? (( ($PartieGauche->m_nNombreOctets<1) ? $PartieGauche->m_nNombreOctets*10 : $PartieGauche->m_nNombreOctets )) : PHP_INT_SIZE); break; case 22600: $Retour = F2a7f51d3($primPartieGauche,$primPartieDroite, is_object($PartieGauche) ? (( ($PartieGauche->m_nNombreOctets<1) ? $PartieGauche->m_nNombreOctets*10 : $PartieGauche->m_nNombreOctets )) : PHP_INT_SIZE); break; case 26716: $Retour = Fa4014e81($primPartieGauche,$primPartieDroite); break; default: $bOperationReussie = false; } } if ($bOperationReussie===true) { return $Retour; } } else { if (is_scalar($PartieGauche) && ($sTypeOperateur === 95)) { $PartieGauche = VersPrimitif($PartieDroite); $Retour = $PartieGauche; } elseif (is_object($PartieGauche) && ($PartieGauche->m_nIsXXX === 0) ) { switch ($sTypeOperateur) { case 95: $PartieGauche->SetValeur(VersPrimitif($PartieDroite)); $Retour = $PartieGauche->GetValeur(); break; } } if (isset($Retour)) { return $Retour; } } } $clPartieGauche = null; $bPartieGaucheEstObjet = is_object($PartieGauche); if (isset($PartieDroite)) { if (func_num_args() == 4) { $clValeur = null; $clValeur =& CreerTypeSiBesoin($Valeur); } else { $clValeur = null; } $clPartieDroite = null; $bPartieDroiteEstOK = ! Feb4b0a2d($PartieDroite); if ($bPartieDroiteEstOK) { if (!$bPartieGaucheEstObjet) { $clPartieGauche=&CreerTypeSiBesoin($PartieGauche,false,true); } else { $clPartieGauche=&CreerTypeSiBesoin($PartieGauche,true,true); } $clPartieDroite =& $PartieDroite; } else { $clPartieDroite =& CreerType($clPartieDroite,null,F541bbf6d(GetValeur($PartieDroite)),$PartieDroite,true); if (!$bPartieGaucheEstObjet) $clPartieDroite =& _clone($clPartieDroite); $clPartieGauche=&CreerTypeSiBesoin($PartieGauche,null,!$bPartieGaucheEstObjet); } $Retour =& $clPartieGauche->operateur($sTypeOperateur,$clPartieDroite, $clValeur); if (!$bPartieDroiteEstOK) { unset($clPartieDroite); } } else { $clPartieGauche=&CreerTypeSiBesoin($PartieGauche,$bPartieGaucheEstObjet,!$bPartieGaucheEstObjet); $Retour =& $clPartieGauche->operateur($sTypeOperateur); } if (Fb2f6fc62($sTypeOperateur)) { if (!$bPartieGaucheEstObjet) { if ($bGaucheis_scalar_or_castable_as_scalar) $PartieGauche = VersPrimitif($clPartieGauche); } elseif ((defined('HF') && (F9ef91cd8($PartieGauche))) ) { $PartieGauche->SetValeur(VersPrimitif($clPartieGauche)); } } return $Retour; } function& OperateurTernaire($bCondition, &$siOui, &$siNon) { if (VersBooleen($bCondition)) return $siOui; return $siNon; } function& _clone($obj) { if (!is_object($obj)) { if (is_array($obj)) { foreach ($obj as $i =>$v) { $obj[$i] = _clone($v); } } return $obj; } $copie = unserialize(serialize($obj)); return $copie; } function F10810b49($Debut,$Nombre,$Valeur) { if ($Nombre==0) return array(); else return array_fill($Debut,$Nombre,$Valeur); } function _array_map($t) { if (is_array($t)) { return array_map( '_array_map' , $t ); } elseif (is_object($t) && (F1e21db15($t)==TYPEWL_STRUCTURE)) { $tabMembreRetourner = array(); foreach (array_keys($t->m_tabVisibilite) as $sNomMembre) { $tabMembreRetourner[] = _array_map($t->$sNomMembre); } return $tabMembreRetourner; } elseif (is_object($t) && ($t->m_nIsXXX != 8) && ($t->m_nIsXXX != 16) && (is_array($t->m_Valeur))) { return array_map( '_array_map' , $t->m_Valeur ); } elseif (is_array(GetValeur($t))) { return array_map( '_array_map' , GetValeur($t) ); } else { return GetValeur($t); } } function WB_AppelExterne( $sNomFonction ) { $tabParams = func_get_args(); $tabParams = array_slice($tabParams,1); if (function_exists($sNomFonction)) { return call_user_func_array($sNomFonction,$tabParams); } $clVM =& obtenirVM(); $sNomIndirection = $clVM->Ff06e3e53($sNomFonction); if (!isset($sNomIndirection)) { Erreur('ErreurGenerique',Fc34ec142("ERR_WLL"),Fc34ec142("ERR_FATAL"),"Indirection impossible :'".$sNomFonction."'"); } return call_user_func_array($sNomFonction,$tabParams); } function& WB_Indirection($sNomVariable, $nMode = IND_ANY) { $bErreur = false; $var =& F9abbf335($sNomVariable, $nMode, array('ERR'=>&$bErreur) ); if ($bErreur && !isset($var)) { Fe81a7f9e('ERR_INDIRECTION_IMPOSSIBLE','IND_NOM_'.$nMode,$sNomVariable); } return $var; } function& GetExterne($sNom) { $clChamp =& F9abbf335($sNom,IND_ANY); if (!isset($clChamp)) { return $sNom; } return $clChamp; } function& F9abbf335($Variable, $nMode = IND_ANY, $tabInfoEtendues = null) { if (isset($tabInfoEtendues) && isset($tabInfoEtendues['ERR'])) { $tabInfoEtendues['ERR'] = false; } if (isset($GLOBALS[VersChaine($Variable)])) { return $GLOBALS[VersChaine($Variable)]; } $sVariable =& VersChaine($Variable); $clVM =& obtenirVM(); $bANY = false; $RetourParDefaut = null; $bErr = false; $sNomVariable = $sVariable; switch ($nMode) { case IND_ANY: $bANY = true; case IND_CHAMP : if ( (($nPosCrocherOuvrant=utf8_strpos($sVariable,'['))!==false) && (($nPosCrocherFermant=utf8_strpos($sVariable,']'))!==false) && $nPosCrocherFermant>$nPosCrocherOuvrant+1 ) { $pclVariable =& F9abbf335(utf8_substr($sVariable,0,$nPosCrocherOuvrant),IND_CHAMP); if (isset($pclVariable)) { $sSubIndice = utf8_substr($sVariable,$nPosCrocherOuvrant+1,$nPosCrocherFermant-$nPosCrocherOuvrant-1); $sResultat = Operateur(8252,$pclVariable,$sSubIndice); if (isset($sResultat)) return $sResultat; } } else $sNomVariable = $clVM->F67af5b5c($sVariable); if (isset($sNomVariable)||!$bANY) { $bErr = (!isset($sNomVariable) && !$bANY); break; } case IND_VARIABLE : $sNomVariable = $clVM->F5919ed9f($sVariable); if (isset($sNomVariable)||!$bANY) { $bErr = (!isset($sNomVariable) && !$bANY); break; } case IND_FICHIER : if (defined('HF')) { $Fichier =& F80229053($sVariable,false,false); if (isset($Fichier)) { return $Fichier; } if (!$bANY) { $bErr = true; break; } } case IND_RUBRIQUE : if (defined('HF')) { $tabNom = utf8_explode('.',$sVariable); if (count($tabNom)==2) { $Fichier =& F80229053($tabNom[0],false,false); if (isset($Fichier)) { $Rubrique =& F2b6640f3($Fichier,$tabNom[1],false); } } if (isset($Rubrique)) { return $Rubrique; } } if (!$bANY) { $bErr = true; break; } case IND_PAGE: global $MaPage; if (utf8_strcasecmp($MaPage->Nom,$sVariable)==0) return $MaPage; if (!$bANY) { $bErr = true; break; } case IND_PARAMETRE_REQUETE: if (defined('HF')) { $tabNom = utf8_explode('.',$sVariable); if (count($tabNom)==2) { $Requete =& Fb4ad3492($tabNom[0],false); if (isset($Requete)) { $sIndice=utf8_strtolower(F03771b65($tabNom[1])); if (array_key_exists($sIndice,$Requete->TabParamRequete)) { return $Requete->TabParamRequete[$sIndice]; } } } } if (!$bANY) { $bErr = true; break; } case IND_CONNEXION: if (defined('HF')) { $pclContexteHF =& FMK_ContextHF(); $pclConnexion =& $pclContexteHF->getConnexion($sVariable); if (isset($pclConnexion)) { return $pclConnexion; } } if (!$bANY) { $bErr = true; break; } default: $sNomVariable = $sVariable; } if ($bErr) { if (isset($tabInfoEtendues) && isset($tabInfoEtendues['ERR'])) { $tabInfoEtendues['ERR'] = true; } } if ($sNomVariable == '') { return $sNomVariable; } if (isset($GLOBALS[$sNomVariable])) { return $GLOBALS[$sNomVariable]; } $sNomVariableMin = utf8_strtolower($sNomVariable); foreach ($GLOBALS as $key => $val) { if (!empty($key)) if (strcmp(utf8_strtolower($key),$sNomVariableMin)===0) return $GLOBALS[$key]; } if (isset($tabInfoEtendues) && isset($tabInfoEtendues['ERR'])) { $tabInfoEtendues['ERR'] = true; } return $RetourParDefaut; } function& WB_Variable($sVariable, $sMethode = null) { switch ($sVariable) { case Fd7624002('ErreurD�tect�e'): $bErreur = EstErreurDetectee(); return $bErreur; break; case 'Email': $Email =& F2be474f9(); return $Email->{$sMethode}; break; case 'SQL': $SQL =& F144dce03(); return $SQL->{$sMethode}; break; default: Erreur('ErreurGenerique','Variable WL inconnue ' . $sVariable); } } function& F5c29b77c(&$Objet , $nIndice) { $nbIndices = count($nIndice); if ($nbIndices>0) { $nIndiceCourant = $nIndice[$nbIndices-1]; unset($nIndice[$nbIndices-1]); return SousType(F5c29b77c($Objet,$nIndice),$nIndiceCourant); } return $Objet; } function EnvSet($Nom,$Valeur=null) { Fc727f54d($Nom,$Valeur); } function EnvGet($Nom) { return F5ff9334d($Nom); } function WB_InstructionLiberer(&$pclObjet) { if (!is_object($pclObjet)) $pclObjet = null; else { $pclObjet->WB_InstructionLiberer(); } } function WB_ErrExceptionRAZ() { global $bEnErreur; $bEnErreur = false; F67cfd262(); } function F0e611786($rgb) { return ($rgb & 0xFF); } function F5761a83e($rgb) { return ((0xFF)&(((0xFFFF)&($rgb)) >> 8)); } function Fcf70f503($rgb) { return ((0xFF)&(($rgb)>>16)); } $CInterfEXE_ms_tabCadrageHorizontal = null; function& Fd2678048() { global $CInterfEXE_ms_tabCadrageHorizontal; if (!isset($CInterfEXE_ms_tabCadrageHorizontal)) { $CInterfEXE_ms_tabCadrageHorizontal = array( "left", "center", "right", "justify" ); } return $CInterfEXE_ms_tabCadrageHorizontal; } $CInterfEXE_ms_tabCadrageVertical = null; function& F6adadf40() { global $CInterfEXE_ms_tabCadrageVertical; if (!isset($CInterfEXE_ms_tabCadrageVertical)) { $CInterfEXE_ms_tabCadrageVertical = array( "top", "middle", "bottom", "auto" , "baseline" , "sub", "super", "text-top" ,"text-bottom" ); } return $CInterfEXE_ms_tabCadrageVertical; } function& Fda6ad30b() { global $CInterfEXE; if (!isset($CInterfEXE)) $CInterfEXE = new CInterfEXE(); return $CInterfEXE; } class CInterfEXE { var $ms_tabCadrageVertical; var $ms_tabCadrageHorizontal; function CInterfEXE() { $this->ms_tabCadrageHorizontal =& Fd2678048(); $this->ms_tabCadrageVertical =& F6adadf40(); } function F2902774f( $ePropriete, &$pclValeur, $ptr=null) { switch ($ePropriete) { case COULEUR_WEB: case COULEURFOND_WEB: { $pszTemp=''; $this->Fca41ca88($pclValeur, $pszTemp, true); $pszTemp = $pclValeur; return $pszTemp; } case CURSEURSOURIS_WEB: return $pclValeur; case CADRAGEH_WEB: return F814c922d($pclValeur, $this->ms_tabCadrageHorizontal, F0bb2840c($this->ms_tabCadrageHorizontal), false); case CADRAGEV_WEB: return F814c922d($pclValeur, $this->ms_tabCadrageVertical, F0bb2840c($this->ms_tabCadrageVertical), false); default: return ""; } } function Fca41ca88( &$pclValeur, $s=null, $bAvecDiese=false) { $clValeurLocale = $pclValeur; $nVal = intval($clValeurLocale); if ($nVal != -1) { FMK_Charge('FMK/Dessin/Couleur.php',false); $nValReverse = F4f6e8051(Fcf70f503($nVal), F5761a83e($nVal), F0e611786($nVal),0); $pclValeur = ($bAvecDiese ? '#' : '') . utf8_sprintf("%06X",$nValReverse); return true; } return false; } function Fbe839d14(&$piChamp,&$pcszCle1erIteration) { $nResult = 0; if (null !== $piChamp) { switch ($piChamp->GetType()) { case TYPE_CHAMP_TABLE: case TYPE_CHAMP_ZR: { $nResult = $piChamp->Fa404b0d1(); if (null != $pcszCle1erIteration) { Fa79fbf41('Devait �tre utile que pour les table ajax en awp, � porter en PHP?'); } } break; case TYPE_CHAMP_ZRLINEAIRE: return 0; default: break; } } return $nResult; } } function F814c922d( &$pclValeur, $tabValeursCSS, $nNbValeursCSS, $bInvalideNULL) { $pclValeur = intval($pclValeur); if (is_int($pclValeur)) { $nValeur = 0; $nValeur = $pclValeur; if (($nValeur >= 0) && ($nValeur < $nNbValeursCSS)) { return $tabValeursCSS[$nValeur]; } else { return $tabValeursCSS[0]; } } return ($bInvalideNULL != false) ? null : $tabValeursCSS[0]; } define('NUMLIGNE_INVALIDE' ,-1); define('NUMCOLONNE_INVALIDE', -1); define('FINLIGNE_INDETERMINE' ,0); define('FINLIGNE_NON' ,1); define('FINLIGNE_OUI' ,2); define('RUPTURE_BAS' ,0); define('RUPTURE_HAUT' ,1); class CIterateurChampLignes { var $m_pclChamp; var $m_nNbIteration; var $m_nIndiceLigneVisible; function CIterateurChampLignes(&$pclChamp) { $this->m_pclChamp =& $pclChamp; $this->m_nNbIteration = $this->m_pclChamp->F593512b9(); } function F9cd760a3() { return $this->m_nIndiceLigneVisible; } function bLigneRepliee() { return ($this->Fa0da8468() !== -1); } } class CIterateurChampLignes_Horizontal extends CIterateurChampLignes { var $m_nPosition; var $m_nIndiceWL; var $m_nIndiceRuptureVisibleSiRepliee; function CIterateurChampLignes_Horizontal (&$piChamp) { parent::CIterateurChampLignes($piChamp); $this->m_nPosition = 0; $this->m_nIndiceWL = 0; $this->m_nIndiceRuptureVisibleSiRepliee = -1; } function Fa22d2512($eRUPTURE_HAUTBAS) { return $this->vnGetIndiceWL(); } function vParcoursDebut () { $nDebutIteration = $this->m_pclChamp->Fa404b0d1(); $this->m_nIndiceWL = $nDebutIteration; $this->m_nPosition = -1; $this->vParcoursAvance(); } function vParcoursAvance () { ++$this->m_nPosition; if (false != $this->vbParcoursNonFini()) $this->m_nIndiceWL =$this->m_pclChamp->F0f3ddc5a($this->m_nIndiceWL - 1,$this->m_nIndiceRuptureVisibleSiRepliee) + 1; else $this->m_nIndiceRuptureVisibleSiRepliee = -1; if ($this->m_nIndiceWL == 0) $this->m_nPosition = $this->m_nNbIteration; } function vbParcoursNonFini () { return ($this->m_nPosition < $this->m_nNbIteration); } function vnGetIndiceWL () { return $this->m_nIndiceWL; } function Fa31ce44e() { return F62e792c3($this->m_pclChamp, $this->vnGetIndiceWL()); } function Fcc6f142d() { return F1a6a3b59($this->m_pclChamp, $this->vnGetIndiceWL()); } function Fa0da8468() { return $this->m_nIndiceRuptureVisibleSiRepliee; } } function F62e792c3(&$piZoneRepetee,$nIndiceWL) { if (null === $piZoneRepetee ||!Fba68c6f1($piZoneRepetee)) { Fa79fbf41('Normalement on a une ZR'); return 0; } $pclInterfEXE =& Fda6ad30b(); $nNbColonne = $piZoneRepetee->Fad3ced73(); if ($nNbColonne <= 0) return 0; if (1 === $nIndiceWL) return 2; $nPosPremiereRuptureWL = $piZoneRepetee->Fb6718f6a(); $null = null; $nPremierVisible = $pclInterfEXE->Fbe839d14($piZoneRepetee, $null); if (($nPosPremiereRuptureWL > $nIndiceWL) || ($nPosPremiereRuptureWL < ($nPremierVisible + 1))) $nPosPremiereRuptureWL = $nPremierVisible + 1; if ($nPosPremiereRuptureWL > $nIndiceWL) { $nPosPremiereRuptureWL = 1; } if (false !== $piZoneRepetee->F204fdac3($nIndiceWL - 1)) return 2; return ((($nIndiceWL - $nPosPremiereRuptureWL) % $nNbColonne) == 0) ? 2 : 1; } function F1a6a3b59(&$piZoneRepetee, $nIndiceWL) { if (null != $piZoneRepetee) { $nIndiceRuptureVisibleSiRepliee = 0; $pclInterfEXE =& Fda6ad30b(); $nIndiceSuivantC = $piZoneRepetee->F0f3ddc5a($nIndiceWL - 1, $nIndiceRuptureVisibleSiRepliee); if (NUMLIGNE_INVALIDE != $nIndiceSuivantC) { return F62e792c3($piZoneRepetee, $nIndiceSuivantC + 1); } else { return 2; } } else { return 0; } } class CIterateurChampLignes_Vertical extends CIterateurChampLignes { var $m_nNbLignes; var $m_nNbColonnes; var $m_tabIndiceWL; var $m_nIndiceWLCurseur; function CIterateurChampLignes_Vertical(&$piChamp) { parent::CIterateurChampLignes($piChamp); $this->m_nNbLignes = 1; $this->m_nNbColonnes = $this->m_pclChamp->Fad3ced73(); $this->m_tabIndiceWL = null; $this->m_nIndiceWLCurseur = 0; } function Fa22d2512($eRUPTURE_HAUTBAS) { return $this->vnGetIndiceWL(); } function vParcoursDebut() { $nLimiteAffichage = $this->m_pclChamp->F736efcde(); $nLimite = (0 == $nLimiteAffichage) ? $this->m_nNbIteration : $nLimiteAffichage; $this->m_nNbLignes = $this->F02735501($nLimite); $nTabTaille = $this->m_nNbLignes * $this->m_nNbColonnes; { $this->m_tabIndiceWL = array_fill(0,$nTabTaille,NUMLIGNE_INVALIDE); $nDebutIteration = $this->m_pclChamp->Fa404b0d1(); $null = null; $this->F232e2e25($this->m_nNbIteration, $this->m_nNbLignes, $this->m_tabIndiceWL, $null, $nDebutIteration, 0); $this->m_nIndiceWLCurseur = 0; } } function F02735501($nNbIteration) { $nNbLignes = $nNbIteration / $this->m_nNbColonnes; if (($nNbIteration % $this->m_nNbColonnes) != 0) ++$nNbLignes; return floor($nNbLignes); } function F232e2e25($nNbIteration,$nNbLignes, &$tabIndiceWL, &$tabIndiceRuptureVisibleSiRepliee, $nIndiceWL, $nOffsetTabIndiceWL) { $nPositionLigne = 0; $nPositionColonne = 0; for (; $nNbIteration > 0; --$nNbIteration) { $nIndice = $nPositionLigne * $this->m_nNbColonnes + $nPositionColonne; $nIndiceRuptureVisibleSiRepliee = 0; $nIndiceWL = $this->m_pclChamp->F0f3ddc5a($nIndiceWL - 1, $nIndiceRuptureVisibleSiRepliee) + 1; if ($nIndiceWL == 0) return 0; $tabIndiceWL[$nOffsetTabIndiceWL + $nIndice] = $nIndiceWL; if (null !== $tabIndiceRuptureVisibleSiRepliee) $tabIndiceRuptureVisibleSiRepliee[$nOffsetTabIndiceWL + $nIndice] = $nIndiceRuptureVisibleSiRepliee; ++$nPositionLigne; if ($nPositionLigne == $nNbLignes) { $nPositionLigne = 0; ++$nPositionColonne; } } return $nIndiceWL; } function vParcoursAvance () { if (isset($this->m_tabIndiceWL[$this->m_nIndiceWLCurseur])) { do { ++$this->m_nIndiceWLCurseur; if (isset($this->m_tabIndiceWL[$this->m_nIndiceWLCurseur]) && (NUMLIGNE_INVALIDE == $this->m_tabIndiceWL[$this->m_nIndiceWLCurseur])) { ++$this->m_nIndiceLigneVisible; } } while (isset($this->m_tabIndiceWL[$this->m_nIndiceWLCurseur]) && (NUMLIGNE_INVALIDE == $this->m_tabIndiceWL[$this->m_nIndiceWLCurseur]) && ($this->m_nIndiceWLCurseur < ($this->m_nNbLignes * $this->m_nNbColonnes))); } } function vbParcoursNonFini () { return ( (isset($this->m_tabIndiceWL[$this->m_nIndiceWLCurseur])) && ($this->m_nIndiceWLCurseur < ($this->m_nNbLignes * $this->m_nNbColonnes)) && (NUMLIGNE_INVALIDE != $this->m_tabIndiceWL[$this->m_nIndiceWLCurseur])); } function vnGetIndiceWL () { return $this->m_tabIndiceWL[$this->m_nIndiceWLCurseur]; } function Fa31ce44e() { if ( (($this->m_nIndiceWLCurseur % $this->m_nNbColonnes) == 0) || (($this->m_nIndiceWLCurseur > 0) && (NUMLIGNE_INVALIDE == $this->m_tabIndiceWL[$this->m_nIndiceWLCurseur-1]))) return 2; return 1; } function Fcc6f142d() { if ( (($this->m_nIndiceWLCurseur % $this->m_nNbColonnes) === ($this->m_nNbColonnes - 1)) || ($this->m_nIndiceWLCurseur == (($this->m_nNbLignes * $this->m_nNbColonnes) + 1)) || (($this->m_nIndiceWLCurseur > 0) && (NUMLIGNE_INVALIDE ==$this->m_tabIndiceWL[$this->m_nIndiceWLCurseur+1]))) return 2; return 1; } function Fa0da8468() { return -1; } } class stLIGNE_CORRESPONDANCE extends stSTRUCTURE { var $m_nLigneRecherche; var $m_nLigneRemplace; } class CIterateurChampLignes_Vertical_Rupture extends CIterateurChampLignes_Vertical { var $m_tabLignesCorrespondances; var $m_tabIndiceRuptureVisibleSiRepliee = null; function CIterateurChampLignes_Vertical_Rupture (&$piChamp) { parent::CIterateurChampLignes_Vertical($piChamp); $this->m_tabLignesCorrespondances = array(); } function vParcoursDebut () { $this->m_nNbLignes = 0; $nTabTaille = $this->m_nNbIteration * $this->m_nNbColonnes; { $this->m_tabIndiceWL = ($nTabTaille===0) ? array() : array_fill(0,$nTabTaille,NUMLIGNE_INVALIDE); $this->m_tabIndiceRuptureVisibleSiRepliee = ($nTabTaille===0) ? array() : array_fill(0,$nTabTaille,NUMLIGNE_INVALIDE); $nDebutIteration = $this->m_pclChamp->Fa404b0d1(); $this->m_nNbLignes = 0; $nIndiceWL = $nDebutIteration; $nOffsetTabIndiceWL = 0; $tabIndiceRuptureVisibleSiRepliee =& $this->m_tabIndiceRuptureVisibleSiRepliee; $nNbIterationRupture = 0; for ($nNbIteration = $this->m_nNbIteration; $nNbIteration > 0; $nNbIteration -= $nNbIterationRupture) { $nNbIterationRupture = $this->F519ac539($nIndiceWL, $nNbIteration); $nNbLignesRupture = $this->F02735501($nNbIterationRupture); $nIndiceWL = $this->F232e2e25($nNbIterationRupture, $nNbLignesRupture, $this->m_tabIndiceWL, $tabIndiceRuptureVisibleSiRepliee, $nIndiceWL, $nOffsetTabIndiceWL); $this->F0fe526a8($nNbLignesRupture, $this->m_tabIndiceWL, $nOffsetTabIndiceWL); $nOffsetTabIndiceWL += $nNbLignesRupture * $this->m_nNbColonnes; $this->m_nNbLignes += $nNbLignesRupture; if (0 == $nIndiceWL) break; } $nTabTaille = $this->m_nNbLignes * $this->m_nNbColonnes; $this->m_tabIndiceWLCurseur = 0; } } function F519ac539($nIndiceWL, $nNbIterationRestant) { $nNbIterationRupture = 0; for (; $nNbIterationRestant > 0; --$nNbIterationRestant) { $nIndiceRuptureVisibleSiRepliee = 0; $nIndiceWL = $this->m_pclChamp->F0f3ddc5a($nIndiceWL - 1, $nIndiceRuptureVisibleSiRepliee) + 1; if ($nIndiceWL == 0) return 0; ++$nNbIterationRupture; if (false != $this->m_pclChamp->F204fdac3($nIndiceWL)) break; } return $nNbIterationRupture; } function F0fe526a8($nNbLignesRupture, $tabIndiceWL, $nOffsetTabIndiceWL) { $stCorrespondance = new stLIGNE_CORRESPONDANCE( NUMLIGNE_INVALIDE, NUMLIGNE_INVALIDE ); for ($nColonne = $this->m_nNbColonnes - 1; $nColonne >= 0; --$nColonne) { for ($nLigne = $nNbLignesRupture - 1; $nLigne >= 0; --$nLigne) { $nIndiceWL = $tabIndiceWL[$nOffsetTabIndiceWL + ($nLigne * $this->m_nNbColonnes + $nColonne)]; if (NUMLIGNE_INVALIDE != $nIndiceWL) { $stCorrespondance->m_nLigneRecherche = $nIndiceWL; break; } } if (NUMLIGNE_INVALIDE != $stCorrespondance->m_nLigneRecherche) break; } for ($nColonne = $this->m_nNbColonnes - 1; $nColonne >= 0; --$nColonne) { $nIndiceWL = $tabIndiceWL[$nOffsetTabIndiceWL + ( ($nNbLignesRupture - 1) * $this->m_nNbColonnes + $nColonne)]; if (NUMLIGNE_INVALIDE != $nIndiceWL) { $stCorrespondance->m_nLigneRemplace = $nIndiceWL; break; } } if ( (NUMLIGNE_INVALIDE != $stCorrespondance->m_nLigneRecherche) && (NUMLIGNE_INVALIDE != $stCorrespondance->m_nLigneRemplace) && ($stCorrespondance->m_nLigneRecherche > $stCorrespondance->m_nLigneRemplace)) { $stCorrespondanceInverse = new stLIGNE_CORRESPONDANCE( $stCorrespondance->m_nLigneRemplace, $stCorrespondance->m_nLigneRecherche ); $this->m_tabLignesCorrespondances[$stCorrespondanceInverse->m_nLigneRecherche] = $stCorrespondanceInverse; $this->m_tabLignesCorrespondances[$stCorrespondance->m_nLigneRecherche] = $stCorrespondance; } } function Fa22d2512($eHautBas) { $nIndiceWL = $this->vnGetIndiceWL(); if (RUPTURE_HAUT == $eHautBas) return $nIndiceWL; $nRetour = !isset($this->m_tabLignesCorrespondances[$nIndiceWL]) ? $nIndiceWL : $this->m_tabLignesCorrespondances[$nIndiceWL]->m_nLigneRemplace; return $nRetour; } function Fa0da8468() { if (empty($this->m_tabIndiceRuptureVisibleSiRepliee)||!array_key_exists($this->m_nIndiceWLCurseur,$this->m_tabIndiceRuptureVisibleSiRepliee)) return -1; return $this->m_tabIndiceRuptureVisibleSiRepliee[$this->m_nIndiceWLCurseur]; } } class CIterateurChampLignes_Navigateur extends CIterateurChampLignes { var $m_bNonFini; function CIterateurChampLignes_Navigateur (&$piChamp) { parent::CIterateurChampLignes($piChamp); $this->m_bNonFini = false; } function vnGetIndiceWL () { return '[%'.$this->m_pclChamp->Alias.'%]'; } function Fa31ce44e() { return 2; } function Fcc6f142d() { return 2; } function Fa22d2512($eRUPTURE_HAUTBAS) { return $this->vnGetIndiceWL(); } function Fa0da8468() { return -1; } function vParcoursDebut () { $this->m_bNonFini = true; } function vParcoursAvance () { $this->m_bNonFini = false; } function vbParcoursNonFini () { return $this->m_bNonFini; } } function& CIterateurChampLignes_s_pclCreate(&$piChamp,&$nIndiceLigneVisible) { switch ($piChamp->GetType()) { case TYPE_CHAMP_ZR: if ($piChamp->m_bEstNavigateur) { $return = new CIterateurChampLignes_Navigateur($piChamp); break; } case TYPE_CHAMP_ZRLINEAIRE: case TYPE_CHAMP_TABLE: { $bRepetitionVertical = $piChamp->m_bRepetitionVertical; $bRupture = $piChamp->Fa2c5b186(); $bLimiteAffichage = (0 !== $piChamp->F736efcde()); if (false === $bRepetitionVertical) { if (false === $bRupture) { if (false === $bLimiteAffichage) { $return = new CIterateurChampLignes_Horizontal($piChamp); } else { $return = new CIterateurChampLignes_Horizontal($piChamp); } } else { if (false === $bLimiteAffichage) { $return = new CIterateurChampLignes_Horizontal($piChamp); } else { $return = new CIterateurChampLignes_Horizontal($piChamp); } } } else { if (false === $bRupture) { if (false === $bLimiteAffichage) { $return = new CIterateurChampLignes_Vertical($piChamp); } else { $return = new CIterateurChampLignes_Vertical($piChamp); } } else { if (false === $bLimiteAffichage) { $return = new CIterateurChampLignes_Vertical_Rupture($piChamp); } else { $return = new CIterateurChampLignes_Vertical_Rupture($piChamp); } } } } break; case 50014: return CIterateurChampLignes_s_pclCreate($GLOBALS[$piChamp->Table],$nIndiceLigneVisible); default: $return = new CIterateurChampLignes_Horizontal($piChamp); } $return->vParcoursDebut(); $piChamp->m_pclIterateur =& $return; $piChamp->m_pclIterateur->m_nIndiceLigneVisible =& $nIndiceLigneVisible; $nIndiceLigneVisible = 1; return $return; } ?>