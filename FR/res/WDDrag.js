/*! VersionVI: 30F200057k x */
function WDDragBase(){arguments.length}function WDDrag(n,t){if(arguments.length){WDDragBase.prototype.constructor.apply(this,[!0]);var i=this;this.m_fMouseDown=function(n){return i.bOnMouseDown(n||event)?i._bStopPropagation(n):!0};this.m_fMouseMove=function(n){return i.OnMouseMove(n||event),i._bStopPropagation(n)};this.m_fMouseUp=function(n){return i.bOnMouseUp(n||event)?i._bStopPropagation(n):!0};this.m_fStopPropagation=function(n){return i._bStopPropagation(n||event)};this.m_nDelaiAvantDeplacement=n;this.m_nDelaiEntreDeplacement=t;this.m_bPremierMouseMoveFiltre=!1}}function WDDnDNatif(n,t,i,r){if(arguments.length){WDDragBase.prototype.constructor.apply(this,[!0]);var u=this;0<n&&(this.m_nSource=n,this.m_fDragStart=function(n){u._OnDnDEvenement(n||event,u._OnDragStart)},this.m_fDragEnd=function(n){return u._OnDnDEvenement(n||event,u._OnDragEnd),u._bStopPropagation(n)});0<t&&(this.m_nCible=t,this.m_fDragEnter=function(n){return u._OnDnDEvenement(n||event,u._OnDragEnter),u._bStopPropagation(n)},this.m_fDragOver=function(n){return u._OnDnDEvenement(n||event,u._OnDragOver),u._bStopPropagation(n)},this.m_fDragExit=function(n){return u._OnDnDEvenement(n||event,u._OnDragExit),u._bStopPropagation(n)},this.m_fDrop=function(n){return u._OnDnDEvenement(n||event,u._OnDrop),u._bStopPropagation(n)});this.m_nOperationDefaut=r!==undefined?r:this.ms_nOperationCopie;this._vbEmuleIE9()&&(this.m_fSelectStart=function(n){return u.__SelectStartIE(n||event)});i&&(this._InitElement(i),2==t&&(this.m_oElement=i))}}function WDDnDNatifChamp(n,t,i,r,u,f){arguments.length&&(WDDnDNatif.prototype.constructor.apply(this,[t,i,r]),this.m_sAliasChamp=n,this.m_tabFonctionsGet=u,this.m_tabFonctionsSet=f,this.m_tabDnDEvenement=[])}function WDDnDFichiers(n,t,i){arguments.length&&(WDDnDNatif.prototype.constructor.apply(this,[!1,!0,i,this.ms_nOperationLien+this.ms_nOperationCopie]),this.m_bMultiFichiers=n,this.m_fCallbackFichiers=t)}WDDragBase.prototype._bStopPropagation=function(n){return clWDUtil.bStopPropagationCond(n,this._vbStopPropagation())};WDDragBase.prototype._vbStopPropagation=clWDUtil.m_pfVide;WDDragBase.prototype._nGetPosXEvent=function(n){if(bTouch&&n.touches){switch(n.type){case"touchend":case"touchcancel":break;default:this.m_nLastPosX=n.touches.item(0).clientX}return this.m_nLastPosX}return n.clientX};WDDragBase.prototype._nGetPosYEvent=function(n){if(bTouch&&n.touches){switch(n.type){case"touchend":case"touchcancel":break;default:this.m_nLastPosY=n.touches.item(0).clientY}return this.m_nLastPosY}return n.clientY};WDDragBase.prototype._oGetOriginalTarget=function(n){return bTouch?document.elementFromPoint(this._nGetPosXEvent(n),this._nGetPosYEvent(n)):clWDUtil.oGetOriginalTarget(n)};WDDragBase.prototype.oGetOffsetElementAutre=function(n,t,i){return i?this.oGetOffsetElementAutreY(n,t):this.oGetOffsetElementAutreX(n,t)};WDDragBase.prototype.oGetOffsetElementAutreX=function(n,t){return clWDUtil.nGetBodyScrollLeft()+this._nGetPosXEvent(n)-t.getBoundingClientRect().left};WDDragBase.prototype.oGetOffsetElementAutreY=function(n,t){return clWDUtil.nGetBodyScrollTop()+this._nGetPosYEvent(n)-t.getBoundingClientRect().top};WDDragBase.prototype.oGetOffsetElement=function(n,t){return this.oGetOffsetElementAutre(n,this._oGetOriginalTarget(n),t)};WDDragBase.prototype.oGetOffsetElementSiAutre=function(n,t,i){return t?this.oGetOffsetElementAutre(n,t,i):bIE?i?n.offsetY:n.offsetX:this.oGetOffsetElement(n,i)};WDDrag.prototype=new WDDragBase;WDDrag.prototype.constructor=WDDrag;WDDrag.prototype.ms_eDragDrop=0;WDDrag.prototype.ms_eDragRedimDebut=1;WDDrag.prototype.ms_eDragRedimFin=2;WDDrag.prototype.ms_sMouseDown=bTouch?"touchstart":"mousedown";WDDrag.prototype.ms_sMouseMove=bTouch?"touchmove":"mousemove";WDDrag.prototype.ms_sMouseUp=bTouch?"touchend":"mouseup";WDDrag.prototype.Libere=function(){delete this.m_fMouseDown;delete this.m_fMouseMove;delete this.m_fMouseUp;delete this.m_fStopPropagation};WDDrag.prototype._AttacheDetacheMouseDown=function(n,t,i){clWDUtil.AttacheDetacheEvent(n,t,this.ms_sMouseDown,i,bTouch)};WDDrag.prototype.bEnDrag=function(){return undefined!==this.nGetPosX()};WDDrag.prototype.nGetPosX=function(){return this.m_nPosX};WDDrag.prototype.nGetPosY=function(){return this.m_nPosY};WDDrag.prototype.nGetOffsetPosX=function(n){var t=this._nGetPosXEvent(n)-this.nGetPosX();return clWDUtil.bRTL?-t:t};WDDrag.prototype.nGetOffsetPosY=function(n){return this._nGetPosYEvent(n)-this.nGetPosY()};WDDrag.prototype.bOnMouseDown=function(n){return clWDUtil.bValideBouton(n)?this._vbOnMouseDown.apply(this,arguments)?(document.body.unselectable="on",document.body.style.webkitUserSelect="none",document.body.style.MozUserSelect="none",document.body.style.userSelect="none",!bTouch):!1:!1};WDDrag.prototype._vbOnMouseDown=function(n){return this.m_nPosX=this._nGetPosXEvent(n),this.m_nPosY=this._nGetPosYEvent(n),this.m_bHookPoses||(this.m_bHookPoses=!0,clWDUtil.AttacheDetacheEvent(!0,document,this.ms_sMouseMove,this.m_fMouseMove,bTouch),clWDUtil.AttacheDetacheEvent(!0,document,this.ms_sMouseUp,this.m_fMouseUp,bTouch),bFF&&clWDUtil.AttacheDetacheEvent(!0,document,"dragstart",this.m_fStopPropagation,bTouch),bIE&&clWDUtil.AttacheDetacheEvent(!0,document,"selectstart",this.m_fStopPropagation,bTouch),bTouch&&clWDUtil.AttacheDetacheEvent(!0,document,"touchcancel",this.m_fMouseUp,bTouch)),this.m_nDateMouseDown=(new Date).getTime(),!0};WDDrag.prototype.OnMouseMove=function(n){if(!clWDUtil.bValideBouton(n)){this._vbFiltrePremierMouseMove()&&!this.m_bPremierMouseMoveFiltre?this.m_bPremierMouseMoveFiltre=!0:this.bOnMouseUp(n);return}this.m_bPremierMouseMoveFiltre=!1;var t=(new Date).getTime();if(this.m_nDelaiAvantDeplacement>0&&this.m_nDateMouseDown){if(t-this.m_nDateMouseDown<this.m_nDelaiAvantDeplacement)return;delete this.m_nDateMouseDown}if(this.m_nDelaiEntreDeplacement>0){if(this.m_nDateMouseMove&&t-this.m_nDateMouseMove<this.m_nDelaiEntreDeplacement)return;this.m_nDateMouseMove=t}this._vOnMouseMove.apply(this,arguments)};WDDrag.prototype._vbFiltrePremierMouseMove=clWDUtil.m_pfVideFalse;WDDrag.prototype._vOnMouseMove=clWDUtil.m_pfVide;WDDrag.prototype.bOnMouseUp=function(n){var t=!bTouch||0!=this.nGetOffsetPosX(n)||0!=this.nGetOffsetPosY(n);return this._vOnMouseUp.apply(this,arguments),document.body.unselectable="off",document.body.style.userSelect="text",document.body.style.MozUserSelect="text",document.body.style.webkitUserSelect="text",t};WDDrag.prototype._vOnMouseUp=function(){this.m_bHookPoses&&(bTouch&&clWDUtil.AttacheDetacheEvent(!1,document,"touchcancel",this.m_fMouseUp,bTouch),bIE&&clWDUtil.AttacheDetacheEvent(!1,document,"selectstart",this.m_fStopPropagation,bTouch),bFF&&clWDUtil.AttacheDetacheEvent(!1,document,"dragstart",this.m_fStopPropagation,bTouch),clWDUtil.AttacheDetacheEvent(!1,document,this.ms_sMouseUp,this.m_fMouseUp,bTouch),clWDUtil.AttacheDetacheEvent(!1,document,this.ms_sMouseMove,this.m_fMouseMove,bTouch),delete this.m_bHookPoses);this.m_nDateMouseMove!==undefined&&delete this.m_nDateMouseMove;this.m_nDateMouseDown!==undefined&&delete this.m_nDateMouseDown;delete this.m_nPosY;delete this.m_nPosX};WDDnDNatif.prototype=new WDDragBase;WDDnDNatif.prototype.constructor=WDDnDNatif;WDDnDNatif.prototype.ms_nOperationDejaFait=-1;WDDnDNatif.prototype.ms_nOperationSans=0;WDDnDNatif.prototype.ms_nOperationCopie=1;WDDnDNatif.prototype.ms_nOperationDeplacement=2;WDDnDNatif.prototype.ms_nOperationLien=4;WDDnDNatif.prototype.ms_tabEffectAllowed=["none","copy","move","copyMove","link","copyLink","linkMove","all"];WDDnDNatif.prototype.ms_tabDropEffect=["none","copy","move","copy","link","copy","Move","copy"];WDDnDNatif.prototype.ms_nDnDDebutGlisser=5;WDDnDNatif.prototype.ms_nDnDEntreeChamp=2;WDDnDNatif.prototype.ms_nDnDFinGlisser=6;WDDnDNatif.prototype.ms_nDnDLacher=4;WDDnDNatif.prototype.ms_nDnDSortieChamp=3;WDDnDNatif.prototype.ms_nDnDSurvol=1;WDDnDNatif.prototype.ms_tabTypes=["text/plain","text/uri-list"];WDDnDNatif.prototype.__SelectStartIE=function(n){for(var t=n.srcElement,i=document.body;t&&t!=i;){if(t.dragDrop&&(t.hasAttribute&&t.hasAttribute("draggable")||t.draggable))return t.dragDrop(),this._bStopPropagation(n);t=t.parentNode}};WDDnDNatif.prototype._InitElement=function(n){if(0<this.m_nSource){switch(clWDUtil.sGetTagName(n)){case"input":break;case"select":this._InitElementTab(n.getElementsByTagName("option"));break;default:n.setAttribute("draggable","true",0)}HookOnXXX(n,"ondragstart","dragstart",this.m_fDragStart);HookOnXXX(n,"ondragend","dragend",this.m_fDragEnd)}0<this.m_nCible&&(HookOnXXX(n,"ondragenter","dragenter",this.m_fDragEnter),HookOnXXX(n,"ondragover","dragover",this.m_fDragOver),HookOnXXX(n,"ondragleave","dragleave",this.m_fDragExit),HookOnXXX(n,"ondrop","drop",this.m_fDrop));this.m_fSelectStart&&clWDUtil.AttacheDetacheEvent(!0,document,"selectstart",this.m_fSelectStart)};WDDnDNatif.prototype._InitElementTab=function(n){for(var i=n.length,t=0;t<i;t++)this._InitElement(n[t])};WDDnDNatif.prototype._LibereElement=function(n){if(this.m_fSelectStart&&clWDUtil.AttacheDetacheEvent(!1,document,"selectstart",this.m_fSelectStart),0<this.m_nCible&&(UnhookOnXXX(n,"ondrop","drop",this.m_fDrop),UnhookOnXXX(n,"ondragleave","dragleave",this.m_fDragExit),UnhookOnXXX(n,"ondragover","dragover",this.m_fDragOver),UnhookOnXXX(n,"ondragenter","dragenter",this.m_fDragEnter)),0<this.m_nSource){UnhookOnXXX(n,"ondragend","dragend",this.m_fDragEnd);UnhookOnXXX(n,"ondragstart","dragstart",this.m_fDragStart);switch(clWDUtil.sGetTagName(n)){case"input":break;case"select":this._LibereElementTab(n.getElementsByTagName("option"));break;default:n.removeAttribute("draggable",0)}}};WDDnDNatif.prototype._LibereElementTab=function(n){for(var i=n.length,t=0;t<i;t++)this._LibereElement(n[t])};WDDnDNatif.prototype._OnDnDEvenement=function(n,t){try{this.m_oEvent=n;this._vSetDnDActif();t.apply(this,[])}finally{this._vClearDnDActif();this.m_oEvent=null;delete this.m_oEvent}};WDDnDNatif.prototype._oGetEvent=function(){return this.m_oEvent};WDDnDNatif.prototype._oGetEventData=function(){return this.m_oEvent.dataTransfer};WDDnDNatif.prototype._bVerifieEventDataType=function(n){var i=this._oGetEventData(),r=i.types,t;return r?clWDUtil.bDansTableau(r,n):bIE?(t=i.getData(n),t&&0<t.length):void 0};WDDnDNatif.prototype._oGetEventDataSelonType=function(n){return this._bVerifieEventDataType(n)?this._oGetEventData().getData(n):""};WDDnDNatif.prototype._SetEventDataSelonType=function(n,t){this._oGetEventData().setData(n,t)};WDDnDNatif.prototype._sDataTypeAvecCorrectionNombre=function(n){return n==1?this.ms_tabTypes[0]:n};bIEAvec11?(WDDnDNatif.prototype.ms_tabTypesIE=["Text","URL"],WDDnDNatif.prototype._sDataTypeAvecCorrection=function(n){n=this._sDataTypeAvecCorrectionNombre(n);var t=clWDUtil.nDansTableau(this.ms_tabTypes,n);return clWDUtil.nElementInconnu!=t?this.ms_tabTypesIE[t]:n}):WDDnDNatif.prototype._sDataTypeAvecCorrection=WDDnDNatif.prototype._sDataTypeAvecCorrectionNombre;WDDnDNatif.prototype._bVerifieEventDataTypeAvecCorrection=function(n){return this._bVerifieEventDataType(this._sDataTypeAvecCorrection(n))};WDDnDNatif.prototype._oGetEventDataSelonTypeAvecCorrection=function(n){return this._oGetEventDataSelonType(this._sDataTypeAvecCorrection(n))};WDDnDNatif.prototype._SetEventDataSelonTypeAvecCorrection=function(n,t){this._SetEventDataSelonType(this._sDataTypeAvecCorrection(n),t)};WDDnDNatif.prototype._vSetDnDActif=clWDUtil.m_pfVide;WDDnDNatif.prototype._vClearDnDActif=clWDUtil.m_pfVide;WDDnDNatif.prototype._OnDrag=function(){this._oGetEventData().effectAllowed="all"};WDDnDNatif.prototype._OnDragStart=function(){WDDnDNatif.prototype.ms_oDnDSource=this;this._OnDrag();this._vSetDonneesDnD()};WDDnDNatif.prototype._OnDragEnd=function(){try{this._vOnDragEnd()}finally{this.ms_oDnDSource==this&&(WDDnDNatif.prototype.ms_oDnDSource=null,delete WDDnDNatif.prototype.ms_oDnDSource)}};WDDnDNatif.prototype._OnDragEnter=function(){this._OnDragSurvol(this.ms_nDnDEntreeChamp)};WDDnDNatif.prototype._OnDragOver=function(){this._OnDragSurvol(this.ms_nDnDSurvol)};WDDnDNatif.prototype._OnDragSurvol=function(n){WDDnDNatif.prototype.ms_oDnDCible=this;var t=this._vnGetOperationSurDrop(n);if(t!=this.ms_nOperationSans){if(t=this._vnOnDragSurvol(n,t),t!=this.ms_nOperationDejaFait){try{this._oGetEventData().effectAllowed=this.ms_tabEffectAllowed[t]}catch(i){}t!=this.ms_nOperationSans&&(!bIEQuirks9Max||this._vbEmuleIE9())&&(this._oGetEventData().dropEffect=this.ms_tabDropEffect[t])}}else{try{this._oGetEventData().dropEffect=this.ms_tabDropEffect[t]}catch(i){}try{this._oGetEventData().effectAllowed=this.ms_tabEffectAllowed[t]}catch(i){}}};WDDnDNatif.prototype._OnDragExit=function(){try{this._vnGetOperationSurDrop(this.ms_nDnDSortieChamp)!=this.ms_nOperationSans&&this._vOnDragExit()}finally{WDDnDNatif.prototype.ms_oDnDCible==this&&(WDDnDNatif.prototype.ms_oDnDCible=null,delete WDDnDNatif.prototype.ms_oDnDCible)}};WDDnDNatif.prototype._OnDrop=function(){try{this._vnGetOperationSurDrop(this.ms_nDnDLacher)!=this.ms_nOperationSans&&this._vOnDrop()}finally{this.ms_oDnDCible==this&&(WDDnDNatif.prototype.ms_oDnDCible=null,delete WDDnDNatif.prototype.ms_oDnDCible)}};WDDnDNatif.prototype._vSetDonneesDnD=clWDUtil.m_pfVide;WDDnDNatif.prototype._vOnDragEnd=clWDUtil.m_pfVide;WDDnDNatif.prototype._vnGetOperationSurDrop=function(){return this.m_nOperationDefaut};WDDnDNatif.prototype._vnOnDragSurvol=function(n,t){return t};WDDnDNatif.prototype._vOnDragExit=clWDUtil.m_pfVide;WDDnDNatif.prototype._vOnDrop=clWDUtil.m_pfVide;WDDnDNatif.prototype._vbEmuleIE9=function(){return!1};WDDnDNatifChamp.prototype=new WDDnDNatif;WDDnDNatifChamp.prototype.constructor=WDDnDNatifChamp;WDDnDNatifChamp.prototype.ms_nDnDInterdit=0;WDDnDNatifChamp.prototype.ms_nDnDCopier=1;WDDnDNatifChamp.prototype.ms_nDnDDeplacer=2;WDDnDNatifChamp.prototype.ms_nDnDDefaut=3;WDDnDNatifChamp.prototype.ms_tabEffectAllowedToWL={none:WDDnDNatifChamp.prototype.ms_nDnDInterdit,copy:WDDnDNatifChamp.prototype.ms_nDnDCopier,move:WDDnDNatifChamp.prototype.ms_nDnDDeplacer,copyMove:WDDnDNatifChamp.prototype.ms_nDnDCopier,link:WDDnDNatifChamp.prototype.ms_nDnDInterdit,copyLink:WDDnDNatifChamp.prototype.ms_nDnDCopier,linkMove:WDDnDNatifChamp.prototype.ms_nDnDDeplacer,all:WDDnDNatifChamp.prototype.ms_nDnDCopier};WDDnDNatifChamp.prototype.ms_tabDnDNatifChamp=[];WDDnDNatifChamp.prototype.s_DeclareChamp=function(n,t,i,r,u,f,e){(0<i||0<r)&&(WDDnDNatifChamp.prototype.ms_tabDnDNatifChamp[n]=new WDDnDNatifChamp(n,i,r,u,f,e))};WDDnDNatifChamp.prototype.pfGetDnDProgramme=function(n){var t=n<this.ms_nDnDDebutGlisser?this.m_nCible:this.m_nSource;return 2==t?this.m_tabDnDEvenement[n]:null};WDDnDNatifChamp.prototype.__oGetVariable=function(n){var t=this._oGetEvent();switch(n){case 0:return this.ms_tabEffectAllowedToWL[this._oGetEventData().effectAllowed];case 1:return this.__sGetAliasChamp(this.ms_oDnDCible);case 2:return this.__sGetAliasChamp(this.ms_oDnDSource);case 3:return t.ctrlKey;case 4:return this.ms_oDnDSource?document.forms[0].name:"";case 5:return this.oGetOffsetElementSiAutre(t,this.ms_oDnDCible.m_oElement,!1);case 6:return this.oGetOffsetElementSiAutre(t,this.ms_oDnDCible.m_oElement,!0)}};WDDnDNatifChamp.prototype.__SetEffectDepuisActionWL=function(n,t){var i;switch(n){default:case this.ms_nDnDInterdit:i=this.ms_nOperationSans;break;case this.ms_nDnDCopier:i=this.ms_nOperationCopie;break;case this.ms_nDnDDeplacer:i=this.ms_nOperationDeplacement;break;case this.ms_nDnDDefaut:i=this.m_nOperationDefaut}t?bIEQuirks9Max||(this._oGetEventData().dropEffect=this.ms_tabDropEffect[i]):this._oGetEventData().effectAllowed=this.ms_tabEffectAllowed[i]};WDDnDNatifChamp.prototype.__sGetAliasChamp=function(n){return n?n.m_sAliasChamp:""};WDDnDNatifChamp.prototype._vSetDnDActif=function(){WDDnDNatifChamp.prototype.ms_oDnDActif=this};WDDnDNatifChamp.prototype._vClearDnDActif=function(){WDDnDNatifChamp.prototype.ms_oDnDActif=null;delete WDDnDNatifChamp.prototype.ms_oDnDActif};WDDnDNatifChamp.prototype._vSetDonneesDnD=function(){var t;if(WDDnDNatif.prototype._vSetDonneesDnD.apply(this,arguments),t=this.pfGetDnDProgramme(this.ms_nDnDDebutGlisser),t)t();else{for(var i=this.m_tabFonctionsGet,u=i.length,r=!1,n=0;n<u;n++)i[n]&&(this._SetEventDataSelonTypeAvecCorrection(this.ms_tabTypes[n],i[n]()),r=!0);!1==r&&this._SetEventDataSelonTypeAvecCorrection(this.ms_tabTypes[0],this.m_sAliasChamp)}};WDDnDNatifChamp.prototype._vOnDragEnd=function(){var i,t,n,r;if(WDDnDNatif.prototype._vOnDragEnd.apply(this,arguments),i=this.pfGetDnDProgramme(this.ms_nDnDFinGlisser),i)i();else if(this._oGetEventData().dropEffect==this.ms_tabEffectAllowed[this.ms_nOperationDeplacement]&&!clWDUtil.bBaliseEstTag(this._oGetOriginalTarget(this._oGetEvent()),"option"))for(t=this.m_tabFonctionsSet,r=t.length,n=0;n<r;n++)t[n]&&t[n]("")};WDDnDNatifChamp.prototype._vnGetOperationSurDrop=function(n){var u=this.pfGetDnDProgramme(n),i,t,r;if(u)return this.ms_nOperationCopie+this.ms_nOperationDeplacement+this.ms_nOperationLien;for(i=this.m_tabFonctionsSet,r=i.length,t=0;t<r;t++)if(i[t]&&this._bVerifieEventDataTypeAvecCorrection(this.ms_tabTypes[t]))return WDDnDNatif.prototype._vnGetOperationSurDrop.apply(this,arguments);return this.ms_nOperationSans};WDDnDNatifChamp.prototype._vnOnDragSurvol=function(n){var t=this.pfGetDnDProgramme(n);return t?(t(),this.ms_nOperationDejaFait):WDDnDNatif.prototype._vnOnDragSurvol.apply(this,arguments)};WDDnDNatifChamp.prototype._vOnDragExit=function(){var n=this.pfGetDnDProgramme(this.ms_nDnDSortieChamp);n&&n();WDDnDNatif.prototype._vOnDragExit.apply(this,arguments)};WDDnDNatifChamp.prototype._vOnDrop=function(){var i,t,n,u,r;if(WDDnDNatif.prototype._vOnDrop.apply(this,arguments),i=this.pfGetDnDProgramme(this.ms_nDnDLacher),i)i();else for(t=this.m_tabFonctionsSet,u=t.length,n=0;n<u;n++)t[n]&&(r=this._oGetEventDataSelonTypeAvecCorrection(this.ms_tabTypes[n]),0<r.length&&t[n](r))};WDDnDNatifChamp.prototype.s_DnDEvenement=function(n,t,i){WDDnDNatifChamp.prototype.ms_tabDnDNatifChamp[t].m_tabDnDEvenement[i]=n};WDDnDNatifChamp.prototype.s_DnDAccepte=function(n){WDDnDNatifChamp.prototype.ms_oDnDActif.__SetEffectDepuisActionWL(n,!1);WDDnDNatifChamp.prototype.s_DnDCurseur(n)};WDDnDNatifChamp.prototype.s_DnDCurseur=function(n){WDDnDNatifChamp.prototype.ms_oDnDActif.__SetEffectDepuisActionWL(n,!0)};WDDnDNatifChamp.prototype.s_DnDDonne=function(n,t){WDDnDNatifChamp.prototype.ms_oDnDActif._SetEventDataSelonTypeAvecCorrection(n,t)};WDDnDNatifChamp.prototype.s_DnDDonneeDisponible=function(n){return WDDnDNatifChamp.prototype.ms_oDnDActif._bVerifieEventDataTypeAvecCorrection(n)};WDDnDNatifChamp.prototype.s_DnDRecupere=function(n){return WDDnDNatifChamp.prototype.ms_oDnDActif._oGetEventDataSelonTypeAvecCorrection(n)};WDDnDNatifChamp.prototype.s_oGetVariable=function(n){return WDDnDNatifChamp.prototype.ms_oDnDActif.__oGetVariable(n)};WDDnDFichiers.prototype=new WDDnDNatif;WDDnDFichiers.prototype.constructor=WDDnDFichiers;WDDnDFichiers.prototype._oGetEventDataFiles=function(){return this._oGetEventData().files};WDDnDFichiers.prototype._vnGetOperationSurDrop=function(n){var t,i;if(bSfr&&(t=new RegExp("Version/\\s*(\\d+)\\.*(\\d+)").exec(navigator.userAgent),t&&t[1]&&parseInt(t[1],10)<6)||bIEQuirks||document.documentMode<10)return this.ms_nOperationSans;if(n==this.ms_nDnDLacher){if(i=this._oGetEventDataFiles(),i&&(1==i.length||1<i.length&&this.m_bMultiFichiers))return WDDnDNatif.prototype._vnGetOperationSurDrop.apply(this,arguments)}else if(this._bVerifieEventDataType("Files"))return WDDnDNatif.prototype._vnGetOperationSurDrop.apply(this,arguments);return this.ms_nOperationSans};WDDnDFichiers.prototype._vOnDrop=function(){WDDnDNatif.prototype._vOnDrop.apply(this,arguments);this.m_fCallbackFichiers(this._oGetEventDataFiles())}