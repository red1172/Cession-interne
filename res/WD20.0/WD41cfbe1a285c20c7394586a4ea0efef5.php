<?php
//20.0.56.0 IHM/Champ/Calendrier/StyleCalendrier.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 if (!defined('__INC__TYPE/Police.php')) { define('__INC__TYPE/Police.php',true); include_once(WB_INCLUDE_PATH.'WDa064f46531a6c3f4de806f9c4c22dd4b.php'); } if (!defined('__INC__IHM/Champ/CadreLibelle.php')) { define('__INC__IHM/Champ/CadreLibelle.php',true); include_once(WB_INCLUDE_PATH.'WDca2e54604ad98e6dc625c0642acf03cf.php'); } if (!defined('__INC__IHM/Champ/Libelle.php')) { define('__INC__IHM/Champ/Libelle.php',true); include_once(WB_INCLUDE_PATH.'WD53946cceee21451e565f1532420678f6.php'); } if (!defined('__INC__FMK/Compat/xsystem.php')) { define('__INC__FMK/Compat/xsystem.php',true); include_once(WB_INCLUDE_PATH.'WD14183cc5dbbd843da831afdd3bf106e4.php'); } if (!defined('__INC__FMK/Dessin/Couleur.php')) { define('__INC__FMK/Dessin/Couleur.php',true); include_once(WB_INCLUDE_PATH.'WD2521e084cbaf10ef8d5f4ede4dc6baa2.php'); } class CStyleImage { var $m_eMode; var $m_eModeTransparence; var $m_nNbX; var $m_nNbY; var $m_nEpaisseurCadre; var $m_nRotation; var $m_stCentreRotation; var $m_bFlipHorizontal; var $m_bFlipVertical; var $m_clCouleurTrans; var $m_dEchelleX; var $m_dEchelleY; var $m_nRepetitionX; var $m_nRepetitionY; var $m_dwTime; var $m_bBoucle; var $m_bSensInverse; var $m_bAllerRetour; var $m_nCurrentImage; var $m_bEchellePerso; var $m_dwOptionExec; var $m_dwOption2; function CStyleImage() { $this->m_eMode = 1; $this->m_eModeTransparence = 2; $this->m_nNbX = 1; $this->m_nNbY=1; $this->m_nEpaisseurCadre=0; $this->m_nCurrentImage=0; $this->m_nRotation=0; $this->m_bFlipHorizontal=false; $this->m_bFlipVertical=false; $this->m_clCouleurTrans=F0e0a758c(); $this->m_dEchelleX=1; $this->m_dEchelleY=1; $this->m_nRepetitionX=0; $this->m_nRepetitionY=0; $this->m_bEchellePerso=false; $this->m_dwTime=10; $this->m_bBoucle=true; $this->m_bSensInverse=false; $this->m_bAllerRetour=false; $this->m_stCentreRotation = new POINT(); $this->m_stCentreRotation->x=0; $this->m_stCentreRotation->y=0; $this->m_dwOptionExec=0; $this->m_dwOption2=0; } function Fd6726dd1( $eMode) { $this->m_eMode=$eMode; } } function Fa3618cda() { return new CCouleur(212, 208, 200); } function Fc55f3bc8() { return new CCouleur(10, 36, 106); } function F0026c387() { return Ffc5d2da8(); } function F4492029a() { return Fa7c04636(); } define('nCOULSEPARATEUR', 0xffe7d7); define('nCOULTEXTESTD', 0x000000); define('nSTYLEJOUR', AucunCadre); define('nSTYLEBOUTON', AucunCadre); class CStyleCalendrier extends CStyle { var $m_clJourBase; var $m_clJourLignePair; var $m_clJourLigneImpair; var $m_clJourSamedi; var $m_clJourDimanche; var $m_clJourFerie; var $m_clJourHorsBornes; var $m_clJourHorsMois; var $m_clJourAujourdhui; var $m_clJourSelection; var $m_clLibMois; var $m_clLibJoursDeLaSemaine; var $m_clBtnSuivanPrecedent; var $m_clBtnAujoudhui; var $m_czImageBtnSuivant; var $m_czImageBtnPrecedent; var $m_bQuadrillage; var $m_clQuadrillageCouleur; var $m_clStyleImageBtnSuivant; var $m_clStyleImageFond; function CStyleCalendrier( $piContextePolice=null) { parent::CStyle($piContextePolice); $this->m_clJourBase = new CStyleJourCalendrier($piContextePolice); $this->m_clJourLignePair= new CStyleJourCalendrier($piContextePolice); $this->m_clJourLigneImpair= new CStyleJourCalendrier($piContextePolice); $this->m_clJourSamedi = new CStyleJourCalendrier($piContextePolice); $this->m_clJourDimanche = new CStyleJourCalendrier($piContextePolice); $this->m_clJourFerie = new CStyleJourCalendrier($piContextePolice); $this->m_clJourSelection= new CStyleJourCalendrier($piContextePolice); $this->m_clJourAujourdhui= new CStyleJourCalendrier($piContextePolice); $this->m_clJourHorsBornes= new CStyleJourCalendrier($piContextePolice); $this->m_clJourHorsMois = new CStyleJourCalendrier($piContextePolice); $this->m_clLibMois = new CStyleJourCalendrier($piContextePolice); $this->m_clLibJoursDeLaSemaine= new CStyleJourCalendrier($piContextePolice); $this->m_clBtnSuivanPrecedent= new CCadreLibelle($piContextePolice); $this->m_clBtnAujoudhui = new CStyleJourCalendrier($piContextePolice); $this->m_czImageBtnSuivant = ''; $this->m_czImageBtnPrecedent = ''; $this->m_bQuadrillage = true; $this->m_clQuadrillageCouleur = Fa3618cda(); $this->m_clStyleImageBtnSuivant = new CStyleImage(); $this->m_clStyleImageFond = new CStyleImage(); $this->m_clCadre->m_clFond = new CCouleur(0xf0f0f0); $this->m_clCadre->m_bAvecLibelle = false; $this->m_clJourBase->Fddc74374(InterneLigneLibre); $this->m_clJourSelection->Fddc74374( InterneLigneLibre ); $this->m_clJourAujourdhui->Fddc74374( InterneLigneLibre ); $this->m_clJourSamedi->Fddc74374( InterneLigneLibre ); $this->m_clJourDimanche->Fddc74374( InterneLigneLibre ); $this->m_clJourFerie->Fddc74374( InterneLigneLibre ); $this->m_clJourHorsBornes->Fddc74374( InterneLigneLibre ); $this->m_clJourHorsMois->Fddc74374( InterneLigneLibre ); $this->m_clJourLignePair->Fddc74374( InterneLigneLibre ); $this->m_clJourLigneImpair->Fddc74374( InterneLigneLibre ); $this->m_clLibJoursDeLaSemaine->Fddc74374( InterneLigneLibre ); $this->m_clBtnAujoudhui->Fddc74374( InterneLigneLibre ); $this->m_clBtnSuivanPrecedent->Fddc74374( InterneLigneLibre ); $this->m_clBtnAujoudhui->Fddc74374( InterneLigneLibre ); $this->m_clJourAujourdhui->F140ec365(F89c1612f()); $this->m_clJourLignePair->F140ec365(F89c1612f()); $this->m_clJourLigneImpair->F140ec365(F89c1612f()); $this->m_clJourHorsBornes->F140ec365(F89c1612f()); $this->m_clJourHorsMois->F140ec365(F89c1612f()); $this->m_clJourDimanche->F140ec365(F89c1612f()); $this->m_clJourSamedi->F140ec365(F89c1612f()); $this->m_clJourFerie->F140ec365(F89c1612f()); $this->m_clJourBase->F140ec365(nCOULTEXTESTD); $this->m_clJourBase->SetStyle(nSTYLEJOUR); $this->m_clJourBase->SetCouleur( nCOULSEPARATEUR ); $this->m_clJourLignePair->SetCouleurFond( Fa3618cda() ); $tmp = Fa3618cda(); $this->m_clJourLigneImpair->SetCouleurFond( $tmp->Fa293f715() ); $this->m_clJourDimanche->SetCouleurFond( new CCouleur(0xacffd9) ); $this->m_clJourFerie->SetCouleurFond( new CCouleur(0xacffd9) ); $this->m_clJourHorsMois->SetCouleurFond( new CCouleur(0xffe7d7) ); $this->m_clJourHorsMois->F140ec365( Fa0589f67() ); $this->m_clJourAujourdhui->SetCouleur( Fb7e98836() , Fb7e98836() ); $this->m_clJourAujourdhui->F51ce639f( nSURCHARGESTYLE_TYPECADRE ); $this->m_clJourSelection->SetCouleur( nCOULSEPARATEUR ); $this->m_clJourSelection->SetCouleurFond( Fc55f3bc8() ); $this->m_clJourSelection->SetStyle( nSTYLEJOUR ); $this->m_clJourSelection->F51ce639f( nSURCHARGESTYLE_TYPECADRE ); $this->m_clJourSelection->F140ec365( F4492029a() ); $this->m_clLibJoursDeLaSemaine->SetCouleur( nCOULSEPARATEUR, nCOULSEPARATEUR); $this->m_clLibJoursDeLaSemaine->F140ec365( nCOULTEXTESTD ); $this->m_clLibJoursDeLaSemaine->F704d6a80(auMilieu, auCentre); $this->m_clJourHorsBornes->m_clLibelle->SetCouleur( Fa0589f67() ); $this->m_clJourHorsBornes->SetCouleurFond( Fa7c04636() ); $this->m_clJourHorsBornes->m_clLibelle->m_Police->SetItalique( true ); $this->m_clJourHorsBornes->F51ce639f( nSURCHARGESTYLE_POLICEITALIQUE ); $this->m_clBtnSuivanPrecedent->SetStyle( nSTYLEBOUTON ); $this->m_clBtnSuivanPrecedent->F704d6a80( auMilieu, auCentre ); $this->m_clBtnAujoudhui->SetStyle( nSTYLEBOUTON ); $this->m_clBtnAujoudhui->F704d6a80( auMilieu, auCentre ); $this->m_clBtnAujoudhui->F51ce639f( nSURCHARGESTYLE_TYPECADRE|nSURCHARGESTYLE_VALIGN|nSURCHARGESTYLE_HALIGN ); $this->m_clStyleImageBtnSuivant->Fd6726dd1( 2 ); $this->m_clStyleImageFond->Fd6726dd1( 6 ); } } define('eSTYLENORMAL', Simple); define('eSTYLESIMPLE', Simple); class CStyleChampAgenda extends CStyleCalendrier { var $m_clLibHeure; var $m_clCadreEvement; var $m_clCadreEvementSelect; var $m_clLibContenu; var $m_clLibContenuSelect; var $m_clLibNumeroSemaine; var $m_clLibNomMois; var $m_clCadreJourneeComplete; function CStyleChampAgenda( $piContextePolice=null) { parent::CStyleCalendrier($piContextePolice); $this->m_clLibHeure = new CStyleJourCalendrier($piContextePolice); $this->m_clCadreEvement = new CStyleJourCalendrier($piContextePolice); $this->m_clCadreEvementSelect = new CStyleJourCalendrier($piContextePolice); $this->m_clLibContenu = new CStyleJourCalendrier($piContextePolice); $this->m_clLibContenuSelect = new CStyleJourCalendrier($piContextePolice); $this->m_clLibNumeroSemaine = new CStyleJourCalendrier($piContextePolice); $this->m_clLibNomMois = new CStyleJourCalendrier($piContextePolice); $this->m_clCadreJourneeComplete = new CStyleJourCalendrier($piContextePolice); $this->m_clJourBase->Fddc74374(InterneColonneLibre); $this->m_clLibJoursDeLaSemaine->Fddc74374(InterneColonneLibre); $this->m_clJourLignePair->Fddc74374(InterneColonneLibre); $this->m_clJourLigneImpair->Fddc74374(InterneColonneLibre); $this->m_clJourHorsBornes->Fddc74374(InterneColonneLibre); $this->m_clLibHeure->Fddc74374(InterneColonneLibre); $this->m_clCadreEvement->Fddc74374(InterneColonneLibre); $this->m_clLibContenu->Fddc74374(InterneColonneLibre); $this->m_clLibContenuSelect->Fddc74374(InterneColonneLibre); $this->m_clLibNumeroSemaine->Fddc74374(InterneColonneLibre); $this->m_clLibNomMois->Fddc74374(InterneColonneLibre); $this->m_clCadreJourneeComplete->Fddc74374(InterneColonneLibre); $this->F2950fa00(); } function F2950fa00() { $this->m_clJourBase->SetCouleur( F4f6e8051( 165, 191,224 ) ); $this->m_clJourBase->SetCouleurFond( Fa7c04636() ); $this->m_clJourBase->SetStyle( eSTYLENORMAL ); $this->m_clLibHeure->SetStyle( eSTYLENORMAL ); $this->m_clLibHeure->F704d6a80(enHaut, aDroite); $this->m_clLibHeure->m_clLibelle->m_Police->SetTaille( 18 ); $this->m_clLibHeure->F51ce639f( nSURCHARGESTYLE_VALIGN | nSURCHARGESTYLE_HALIGN | nSURCHARGESTYLE_TYPECADRE | nSURCHARGESTYLE_POLICETAILLE); $this->m_clLibHeure->SetCouleurFond( F4f6e8051( 227, 239,255 ) ); $this->m_clLibHeure->SetCouleur( F4f6e8051( 101, 147,207 ) ); $this->m_clLibHeure->m_clLibelle->SetCouleur( F4f6e8051( 101, 147,207 ) ); $this->m_clLibJoursDeLaSemaine->SetStyle( eSTYLENORMAL ); $this->m_clLibJoursDeLaSemaine->F704d6a80(auMilieu, auCentre); $this->m_clLibJoursDeLaSemaine->F51ce639f( nSURCHARGESTYLE_VALIGN | nSURCHARGESTYLE_HALIGN | nSURCHARGESTYLE_TYPECADRE ); $this->m_clLibJoursDeLaSemaine->SetCouleurFond( F4f6e8051( 227, 239,255 ) ); $this->m_clLibJoursDeLaSemaine->SetCouleur( F4f6e8051( 101, 147,207 ) ); $this->m_clLibJoursDeLaSemaine->m_clLibelle->SetCouleur( Ffc5d2da8() ); $this->m_clJourAujourdhui->F140ec365( F89c1612f() ); $this->m_clJourLignePair->F140ec365( F89c1612f() ); $this->m_clJourLigneImpair->F140ec365( F89c1612f() ); $this->m_clJourHorsBornes->SetCouleurFond( F4f6e8051( 231, 238,248 ) ); F13f7f45b( $this->m_clLibNumeroSemaine , $this->m_clLibJoursDeLaSemaine); F13f7f45b( $this->m_clLibNomMois , $this->m_clLibJoursDeLaSemaine); $this->m_clCadreEvement->SetStyle( eSTYLENORMAL ); $this->m_clCadreEvement->F704d6a80(enHaut, aGauche); $this->m_clCadreEvement->SetCouleur( F4f6e8051( 30,30,30) ); $this->m_clCadreEvement->F140ec365(F4492029a()); $this->m_clCadreEvement->m_clLibelle->m_Police->SetGras(false); $this->m_clCadreEvement->F140ec365( Fa7c04636() ); $this->m_clCadreEvementSelect->F51ce639f( nSURCHARGESTYLE_TYPECADRE); F13f7f45b($this->m_clCadreEvementSelect, $this->m_clCadreEvement ); $this->m_clCadreEvementSelect->m_nEpaisseur = 2; $this->m_clCadreEvementSelect->SetCouleur( Fc55f3bc8() ); $this->m_clCadreEvementSelect->F51ce639f( nSURCHARGESTYLE_TYPECADRE ); $this->m_clJourAujourdhui->SetStyle(eSTYLESIMPLE); $this->m_clJourAujourdhui->m_nEpaisseur = 2; $this->m_clJourAujourdhui->SetCouleur( F4f6e8051( 238,146,17 ) ); F13f7f45b( $this->m_clJourSamedi , $this->m_clJourHorsBornes ); F13f7f45b( $this->m_clJourDimanche ,$this->m_clJourHorsBornes ); $this->m_clJourBase->m_clLibelle->Fb7b80c0c( enHaut, aDroite ); $this->m_clJourLignePair->SetCouleurFond( F89c1612f() ); $this->m_clJourLignePair->SetCouleur( F89c1612f() ); $this->m_clJourLignePair->m_clLibelle->SetCouleur( F89c1612f() ); $this->m_clJourLigneImpair->SetCouleurFond( F89c1612f() ); $this->m_clJourLigneImpair->SetCouleur( F89c1612f() ); $this->m_clJourLigneImpair->m_clLibelle->SetCouleur( F89c1612f() ); } } class CStyleChampPlanning extends CStyleChampAgenda { function CStyleChampPlanning ($piContextePolice=null) { parent::CStyleChampAgenda($piContextePolice); $this->F574653fe(); } function F574653fe() { $this->m_clLibMois->F704d6a80(auMilieu, auCentre); $this->m_clLibMois->F51ce639f( nSURCHARGESTYLE_VALIGN | nSURCHARGESTYLE_HALIGN ); $this->m_clLibJoursDeLaSemaine->m_clLibelle->m_Police->SetTaille(14); $this->m_clLibJoursDeLaSemaine->F704d6a80(auMilieu,aGauche); $this->m_clLibJoursDeLaSemaine->F51ce639f( nSURCHARGESTYLE_VALIGN | nSURCHARGESTYLE_HALIGN | nSURCHARGESTYLE_TYPECADRE | nSURCHARGESTYLE_POLICETAILLE); $this->m_clCadre->SetCouleurFond( $this->m_clLibJoursDeLaSemaine->m_clFond ); } } ?>