<?php
global $WB_TabFnAjax; TYPE_Include(TYPEWL_STRUCTURE); WB_Include('WL/STD/Std.php'); Res_Include('COLDATETIMEBASE.php',RES_PROC_GLOBALES); Res_Include('COLXASSERT.php',RES_PROC_GLOBALES); function& Fe883ce01() { $WB_NIVEAU_PILE=empileVM('COL_DATETIMEBASE'); CreerConstante('lBaseNumJour',657071);$GLOBALS['MaPage']->WB_DeclareCte('lBaseNumJour'); return _return ($_PHP_VAR_RETURN_); } lierVM('COL_DATETIMEBASE','bCalculeDiffJour','COL_DATETIMEBASE_bCalculeDiffJour',__FILE__); function& Fd048d279(&$Date1,&$Date2,&$nJour) { $WB_NIVEAU_PILE=empileVM('COL_DATETIMEBASE',''); Operateur(95,$nJour,getRef(DateDifference(VersPrimitif(GetProp($Date1,'PartieDate')),VersPrimitif(GetProp($Date2,'PartieDate'))))); $_PHP_VAR_RETURN_=getRef(Operateur(38960,WB_Variable('ErreurD�tect�e'))); return _return ($_PHP_VAR_RETURN_); } lierVM('COL_DATETIMEBASE','bValideEtSetPartieDate','COL_DATETIMEBASE_bValideEtSetPartieDate',__FILE__); function& F3d93d90e(&$dDate,&$pszDate) { $WB_NIVEAU_PILE=empileVM('COL_DATETIMEBASE',''); if (VersBooleen(DateValide(VersPrimitif($pszDate)))) { Operateur(95,GetProp($dDate,'PartieDate'),$pszDate); $_PHP_VAR_RETURN_=getRef(true); return _return ($_PHP_VAR_RETURN_); } $_PHP_VAR_RETURN_=getRef(false); return _return ($_PHP_VAR_RETURN_); } lierVM('COL_DATETIMEBASE','bValideEtSetPartieHeure','COL_DATETIMEBASE_bValideEtSetPartieHeure',__FILE__); function& F231ed935(&$dDate,&$pszHeure) { $WB_NIVEAU_PILE=empileVM('COL_DATETIMEBASE',''); if (VersBooleen(HeureEstValide(VersPrimitif($pszHeure)))) { Operateur(95,GetProp($dDate,'PartieHeure'),$pszHeure); $_PHP_VAR_RETURN_=getRef(true); return _return ($_PHP_VAR_RETURN_); } $_PHP_VAR_RETURN_=getRef(false); return _return ($_PHP_VAR_RETURN_); } lierVM('COL_DATETIMEBASE','InitDateCourante','COL_DATETIMEBASE_InitDateCourante',__FILE__); function& Faec6fd76(&$dDate) { $WB_NIVEAU_PILE=empileVM('COL_DATETIMEBASE',''); CreerType($d,'d',TYPEWL_DATEHEURE,null); Operateur(95,GetProp($d,'PartieDate'),getRef(DateSys())); Operateur(95,GetProp($d,'PartieHeure'),getRef(HeureSys())); Operateur(95,$dDate,$d); return _return ($_PHP_VAR_RETURN_); } lierVM('COL_DATETIMEBASE','nCalculeDur�e','COL_DATETIMEBASE_nCalculeDuree',__FILE__); function& F175b9c41(&$Date1,&$Date2,&$duDuree) { $WB_NIVEAU_PILE=empileVM('COL_DATETIMEBASE',''); Operateur(95,$duDuree,getRef(ChaineVersDuree(VersPrimitif(getRef(DateHeureDifference(VersPrimitif($Date1),VersPrimitif($Date2)))),1))); $_PHP_VAR_RETURN_=getRef(0); return _return ($_PHP_VAR_RETURN_); } lierVM('COL_DATETIMEBASE','nCompare','COL_DATETIMEBASE_nCompare',__FILE__); function& F5a60bf5d(&$Date1,&$Date2) { $WB_NIVEAU_PILE=empileVM('COL_DATETIMEBASE',''); if (VersBooleen(Operateur(24866,$Date1,$Date2))) { $_PHP_VAR_RETURN_=getRef(0); return _return ($_PHP_VAR_RETURN_); } CreerType($s,'s',TYPEWL_CHAINE,DateHeureDifference(VersPrimitif($Date1),VersPrimitif($Date2))); $_PHP_VAR_RETURN_=getRef(OperateurTernaire(Operateur(24866,Operateur(18432,$s,1),getRef('-')),getRef(1),getRef(-1))); return _return ($_PHP_VAR_RETURN_); } lierVM('COL_DATETIMEBASE','nGetAnnee','COL_DATETIMEBASE_nGetAnnee',__FILE__); function& Fcf8eb32e(&$dDate) { $WB_NIVEAU_PILE=empileVM('COL_DATETIMEBASE',''); $_PHP_VAR_RETURN_=getRef(VersPrimitif(GetProp($dDate,'Annee'))); return _return ($_PHP_VAR_RETURN_); } lierVM('COL_DATETIMEBASE','nGetJour','COL_DATETIMEBASE_nGetJour',__FILE__); function& F8f9a7d74(&$dDate) { $WB_NIVEAU_PILE=empileVM('COL_DATETIMEBASE',''); $_PHP_VAR_RETURN_=getRef(VersPrimitif(GetProp($dDate,'Jour'))); return _return ($_PHP_VAR_RETURN_); } lierVM('COL_DATETIMEBASE','nGetJourDeLaSemaine','COL_DATETIMEBASE_nGetJourDeLaSemaine',__FILE__); function& F4447ce1d(&$dDate) { $WB_NIVEAU_PILE=empileVM('COL_DATETIMEBASE',''); $_PHP_VAR_RETURN_=getRef(Operateur(14356,(Operateur(6166,F301dcf44($dDate),getRef(657071))),getRef(7))); return _return ($_PHP_VAR_RETURN_); } lierVM('COL_DATETIMEBASE','nGetMois','COL_DATETIMEBASE_nGetMois',__FILE__); function& F28b312e3(&$dDate) { $WB_NIVEAU_PILE=empileVM('COL_DATETIMEBASE',''); $_PHP_VAR_RETURN_=getRef(VersPrimitif(GetProp($dDate,'Mois'))); return _return ($_PHP_VAR_RETURN_); } lierVM('COL_DATETIMEBASE','nVersEntier','COL_DATETIMEBASE_nVersEntier',__FILE__); function& F301dcf44(&$dDate) { $WB_NIVEAU_PILE=empileVM('COL_DATETIMEBASE',''); $_PHP_VAR_RETURN_=getRef(DateVersEntier(VersPrimitif(GetProp($dDate,'PartieDate')))); return _return ($_PHP_VAR_RETURN_); } lierVM('COL_DATETIMEBASE','s_nGetNbJourMois','COL_DATETIMEBASE_s_nGetNbJourMois',__FILE__); function& F9214cbb9(&$nMois,&$nAnnee) { $WB_NIVEAU_PILE=empileVM('COL_DATETIMEBASE',''); CreerType($d,'d',TYPEWL_DATE,null); Operateur(95,GetProp($d,'Annee'),$nAnnee); Operateur(95,GetProp($d,'Mois'),$nMois); Operateur(95,GetProp($d,'Jour'),getRef(31)); F22c553ac(getRef(DateValide(VersPrimitif($d)))); $_PHP_VAR_RETURN_=getRef(VersPrimitif(GetProp($d,'Jour'))); return _return ($_PHP_VAR_RETURN_); } ?>