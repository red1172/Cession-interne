<?php
//20.0.56.0 FMK/Wltype.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 define('FMK_WLTYPE',true); define('WLO_OK',0); define('WLO_OVERFLOW',1); define('WLO_MEMORY', 100); define('WLO_DIVZERO', 101); define('WLO_NOTYPE', 102); define('WLO_NULLVALUE', 103); define('WLO_NOCONVERSION', 104); define('WLO_WRONGOPERATION', 105); define('WLO_INCOMPATIBLE', 106); define('WLO_OUTOFSTRING', 107); define('WLO_STRINGTOOLONG', 108); define('WLO_WRONGTYPEOLE', 109); define('WLO_WRONGDATE', 110); define('WLO_WRONGTIME', 111); define('WLO_WRONGDURATION', 112); define('WLO_SYSTEM_OVERFLOW', 113); define('WLO_ERREUR_HF_MEMO', 114); define('LONGUEUR_DATE', 8); define('LONGUEUR_HEURE', 9); define('LONGUEUR_DATEHEURE', LONGUEUR_DATE + LONGUEUR_HEURE); define('LONGUEUR_DUREE', 24); define('DSTR_OK',WLO_OK); define('DSTR_MEMORY',WLO_MEMORY); define('DSDSTR_OUTR_OK',WLO_OUTOFSTRING); define('DSTDSTR_SIZER_OK',WLO_STRINGTOOLONG); define('BIN_OK',WLO_OK); define('BIN_MEMORY',WLO_MEMORY); define('BIN_OUT',WLO_OUTOFSTRING); define('BIN_SIZE',WLO_STRINGTOOLONG); function Fe2f2efa3($Exp) { return XASSERT(is_string($Exp)); } ?>