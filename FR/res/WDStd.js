/*! VersionVI: 30F200041k x */
function EstChiffre(n){return n>="0"&&n<="9"}function ChaineConstruit(n){for(var i=0,r,f;(i=n.indexOf("%",i))>=0;){var u=i+1,t=u,e=n.charAt(t)=="%";if(e)t++;else while(t<n.length&&EstChiffre(n.charAt(t)))t++;t>u?(r=parseInt(n.substring(u,t)),f=r>0&&r<arguments.length?arguments[r]:e?"%":"",n=n.substring(0,i)+f+n.substring(t,n.length),i+=f.length):i++}return n}function EstEspace(n){return n>"\b"&&n<"\x0e"||n==" "}function SansEspace(n){for(var t=0,i;t<n.length&&EstEspace(n.charAt(t));)t++;for(i=n.length-1;i>t&&EstEspace(n.charAt(i));)i--;return n.substring(t,i+1)}function CarSansAccent(n){return n=="\u009f"||n=="\u00dd"?"Y":n>"\u00bf"&&n<"\u00c6"?"A":n=="\u00c7"?"C":n>"\u00c7"&&n<"\u00cc"?"E":n>"\u00cb"&&n<"\u00d0"?"I":n=="\u00d0"?"D":n=="\u00d1"?"N":n>"\u00d1"&&n<"\u00d7"||n=="\u00d8"?"O":n>"\u00d8"&&n<"\u00dd"?"U":n>"\u00df"&&n<"\u00e6"?"a":n=="\u00e7"?"c":n>"\u00e7"&&n<"\u00ec"?"e":n>"\u00eb"&&n<"\u00f0"?"i":n=="\u00f1"?"n":n>"\u00f1"&&n<"\u00f7"||n=="\u00f8"?"o":n>"\u00f8"&&n<"\u00fd"?"u":n=="\u00fd"||n=="\u00ff"?"y":n}function EstPonctuation(n){return n<"\t"||n>"\r"&&n<" "||n>" "&&n<"0"||n>"9"&&n<"A"||n>"Z"&&n<"a"||n>"z"&&n<"\u0083"||n>"\u0083"&&n<"\u008c"||n=="\u008d"||n>"\u008e"&&n<"\u0099"||n=="\u009b"||n=="\u009d"||n>"\u009f"&&n<"\u00aa"||n>"\u00aa"&&n<"\u00b2"||n>"\u00b3"&&n<"\u00b9"||n=="\u00bb"||n=="\u00bf"||n=="\u00d7"||n=="\u00f7"}function EstPonctuationOuEspace(n){return EstPonctuation(n)||EstEspace(n)}function ChaineFormate(n,t){var f=2,u,r,i;if(typeof n=="number"&&(n+=""),t&1&&(n=SansEspace(n)),t&16+clWDStd.CC_MAJ&&(n=n.toUpperCase()),t&64&&(n=n.toLowerCase()),!(t&f+clWDStd.CC_ACC))return n;for(u="",r=0;r<n.length;r++)i=n.charAt(r),t&clWDStd.CC_ACC&&(i=CarSansAccent(i)),t&f&&EstPonctuationOuEspace(i)||(u+=i);return u}function SansAccent(n){return ChaineFormate(n,clWDStd.CC_ACC)}function MajusculeSansAccent(n){return ChaineFormate(n,clWDStd.CC_ACC+clWDStd.CC_MAJ)}function ExtraitNombre(n,t){while(t<n.length&&n.charAt(t)=="0")t++;for(var i=t;i<n.length&&EstChiffre(n.charAt(i));)i++;return n.substring(t,i)}function ResCompare(n,t){return n==t?0:n<t?-1:1}function ChaineCompare(n,t,i){var a=8,v=128,r,e,o,s,h,u,f,c,l;if(n=ChaineFormate(n,i),t=ChaineFormate(t,i),!(i&a+v))return ResCompare(n,t);for(r=0;r<n.length&&r<t.length;){if(i&v&&(e=ExtraitNombre(n,r),o=ExtraitNombre(t,r),e!=""&&o!=""&&(s=parseInt(e),h=parseInt(o),s!=h)))return ResCompare(s,h);if(u=n.charAt(r),f=t.charAt(r),i&a&&(c=CarSansAccent(u),l=CarSansAccent(f),c!=l))return ResCompare(c,l);if(u!=f)return ResCompare(u,f);r++}return ResCompare(n.length,t.length)}function Position(n,t,i,r){var s,f,e,o,l,h,u,c;if((i==null||i<0)&&(i=1),s=r&clWDStd.CO_FIN,i==0&&(i=s?n.length:1),i>n.length)return 0;if(f=[],typeof t!=typeof f?f[0]=t:f=t,r&clWDStd.CO_CAS)for(n=MajusculeSansAccent(n),e=0;e<f.length;e++)f[e]=MajusculeSansAccent(f[e]);for(o=-1,l=!1,e=0;e<f.length;e++)if(t=f[e],t!="")for(h=i-1,u=h;(u=s?n.lastIndexOf(t,h):n.indexOf(t,h))>-1;)if(c=u+t.length,h=s?u-1:c,!(r&clWDStd.CO_MOT)||(u==0||EstPonctuationOuEspace(n.charAt(u-1)))&&(c==n.length||EstPonctuationOuEspace(n.charAt(c)))){l=!0;(s?u>o:u>-1&&(o<0||u<o))&&(o=u);break}return l?o+1:0}function PositionOccurrence(n,t,i,r){var o=-2147483645,s=-2147483646,u,f,e;if((i==null&&(i=1),i<1&&i>o)||(u=r&clWDStd.CO_FIN,(i==o||i==s)&&(u=!u),u&&(r|=clWDStd.CO_FIN),i!=clWDStd.RG_SUI&&i!=s&&(gp=u?n.length:1),u&&gp==0))return 0;for(i<=o&&(i=1),f=0,e=gp;f<i&&(e=Position(n,t,gp,r))>0;)gp=e+(u?-1:typeof t=="string"?t.length:1),f++;return f<i?0:e}function ChaineOccurrence(n,t,i){for(var r=0,u=PositionOccurrence(n,t,clWDStd.RG_PRM,i);u>0;)r++,u=PositionOccurrence(n,t,clWDStd.RG_SUI,i);return r}function VerifieExpressionReguliere(n,t){var f=new RegExp(t),r=f.exec(n),u=[],i;if((u[0]=r!=null&&r.index==0&&r[0].length==n.length)==!0)for(i=1;i<arguments.length-1;i++)u[i]=i<r.length?r[i]:"";return u}function EstNumerique(n){return!isNaN(n)||!isNaN(parseFloat(n))}function NavigateurEstConnecte(){return navigator.onLine}function nDegreVersRadian(n){return n*Math.PI/360}var clWDStd={CC_ACC:4,CO_FIN:1,CO_MOT:2,CO_CAS:4,CC_MAJ:32,RG_PRM:-2147483648,RG_SUI:-2147483647,wifiErreur:-1,wifiActif:1,wifiDesactive:4,m_fWifiCallback:null},gp,clWDCapteur;clWDStd.m_nWifiEtat=clWDStd.wifiErreur;clWDStd.Contient=function(n,t,i){return Position(n,t,0,i)>0};clWDStd.CTouche=function(n,t,i,r,u){this.m_sToucheMinuscule=n;this.m_sToucheMajuscule=t;this.m_bIgnoreMajusculeEnfoncee=i;this.m_bIgnoreMinuscule=r;this.m_bIgnoreMajuscule=u};clWDStd.gclTabTouche=[new clWDStd.CTouche("&","1"),new clWDStd.CTouche("\u0082","2"),new clWDStd.CTouche('"',"3"),new clWDStd.CTouche("'","4"),new clWDStd.CTouche("(","5"),new clWDStd.CTouche("-","6",!1,!1,!0),new clWDStd.CTouche("\u008a","7"),new clWDStd.CTouche("_","8"),new clWDStd.CTouche("\u0087","9"),new clWDStd.CTouche("\u00e0","0"),new clWDStd.CTouche(")","\u00b0",!0),new clWDStd.CTouche("=","+",!0,!0),new clWDStd.CTouche("^","\u00a8",!0),new clWDStd.CTouche("$","\u00a3",!0),new clWDStd.CTouche("\u00f9","%",!0),new clWDStd.CTouche("*","\u00b5",!0,!1,!0),new clWDStd.CTouche("\u00b5","\u00b5"),new clWDStd.CTouche(",","?",!0),new clWDStd.CTouche(";","."),new clWDStd.CTouche(":","/",!0,!0),new clWDStd.CTouche("!","\u00a7",!0)];clWDStd.__bEstToucheMinuscule=function(n,t){return t==n.m_sToucheMinuscule};clWDStd.__sToucheAvecMajuscule=function(n){var t=clWDUtil.oDansTableauFct(this.gclTabTouche,this.__bEstToucheMinuscule,n,{m_bIgnoreMajuscule:!0});return t.m_bIgnoreMajuscule?n.toUpperCase():t.m_sToucheMajuscule};clWDStd.__bEstToucheMajuscule=function(n,t){return t==n.m_sToucheMajuscule};clWDStd.__sToucheSansMajuscule=function(n,t){var i=clWDUtil.oDansTableauFct(this.gclTabTouche,this.__bEstToucheMajuscule,n,{m_bIgnoreMinuscule:!0});return!i.m_bIgnoreMinuscule&&(t||i.m_bIgnoreMajusculeEnfoncee)?i.m_sToucheMinuscule:n.toLowerCase()};clWDStd.CapsLockVerifie=function(n){var i=n.which?n.which:n.keyCode,t=String.fromCharCode(i),r=this.__sToucheAvecMajuscule(t),u=n.shiftKey?n.shiftKey:i==16;return t==r!=u&&r!=this.__sToucheSansMajuscule(t,u)};clWDStd.NotificationAffiche=function(n,t,i){var r=window.Notification,f,e,u;if(r==null&&(r=window.webkitNotifications),r!=null){if(f=!1,e=!1,r.permission!=null?(f=r.permission=="granted",e=r.permission=="denied"):(f=window.webkitNotifications.checkPermission()==0,e=window.webkitNotifications.checkPermission()==2),f){if(u=null,window.Notification!=null&&(u=new window.Notification(n,{body:t,icon:i}),u!=null))return;if(u=r.createNotification(n,i,t),u==null)return;u.show();return}e||r.requestPermission(function(){clWDStd.NotificationAffiche(t,n,i)})}};clWDStd.PageVisible=function(){return document.hidden!=null?!document.hidden:document.msHidden!=null?!document.msHidden:document.mozHidden!=null?!document.mozHidden:document.webkitHidden!=null?!document.webkitHidden:document.oHidden!=null?!document.oHidden:!0};clWDStd.oGetConnexion=function(){var n=navigator.connection;return n==null&&(n=navigator.mozConnection),n==null&&(n=navigator.webkitConnection),n};clWDStd.nEtatConnexion=function(){var n=this.oGetConnexion(),t;if(n==null||(t=n.type,t===undefined))return this.wifiErreur;switch(t){case n.WIFI:return this.wifiActif;default:return this.wifiDesactive}};clWDStd.s_WifiCallback=function(n){clWDStd.WifiCallback(n)};clWDStd.WifiCallback=function(){if(this.m_fWifiCallback!=null){var n=this.nEtatConnexion();this.m_fWifiCallback(this.m_nWifiEtat,n);this.m_nWifiEtat=n}};clWDStd.fParamCallback=function(n){return typeof n=="string"?n==""?null:eval(n):n};clWDStd.wifiEtat=function(n){if(n==null)return this.m_nWifiEtat=this.nEtatConnexion(),this.m_nWifiEtat;this.m_fWifiCallback=this.fParamCallback(n);var t=this.oGetConnexion();t!=null&&clWDUtil.AttacheDetacheEvent(n!="",this.oGetConnexion(),"change",this.s_WifiCallback,!0)};clWDStd.PleinEcranActive=function(){var n=document.documentElement;n!=null&&(n.requestFullscreen!=null?n.requestFullscreen():n.mozRequestFullScreen!=null?n.mozRequestFullScreen():n.webkitRequestFullScreen!=null&&n.webkitRequestFullScreen())};clWDStd.PleinEcranDesactive=function(){document.exitFullscreen!=null?document.exitFullscreen():document.mozCancelFullScreen!=null?document.mozCancelFullScreen():document.webkitCancelFullScreen!=null&&document.webkitCancelFullScreen()};clWDCapteur={cptVertical:1,cptLongitudinal:2,cptLateral:4,cptAzimut:1,cptPitch:2,cptRoll:4,cptFrequenceNormal:1,cptFrequenceRapide:2,cptFrequenceJeu:3,nFrequenceDefaut:200,nDureeDebutSecousseDefaut:100,nDureeFinSecousseDefaut:200,nSensibiliteDefaut:500,m_fCallbackAcceleration:null,m_fCallbackOrientation:null,m_fCallbackDebutSecousse:null,m_fCallbackFinSecousse:null,m_dAccelerationAxeVertical:0,m_dAccelerationAxeLongitudinal:0,m_dAccelerationAxeLateral:0,m_nHeureAcceleration:-1,m_nOrientationAxeVertical:0,m_nOrientationAxeHorizontal:0,m_nOrientationAxeLongitudinal:0,m_nOrientationAxeVerticalTransmise:0,m_nOrientationAxeHorizontalTransmise:0,m_nOrientationAxeLongitudinalTransmise:0,m_nHeureDernierEnvoiAcceleration:-1,m_nHeureDernierEnvoiOrientation:-1,m_nHeureDebutSecousse:-1,m_nIdTimeoutDebutSecousse:-1,m_bDebutSecousse:!1,m_nHeureFinSecousse:-1,m_nIdTimeoutFinSecousse:-1,m_dSeuilAcceleration:0,m_nSeuilOrientation:0,m_bCallbackAccelerationBranche:!1};clWDCapteur.nAxeAccelerationDefaut=clWDCapteur.cptVertical+clWDCapteur.cptLongitudinal+clWDCapteur.cptLateral;clWDCapteur.nAxeOrientationDefaut=clWDCapteur.cptAzimut+clWDCapteur.cptPitch+clWDCapteur.cptRoll;clWDCapteur.m_nAxeAcceleration=clWDCapteur.nAxeAccelerationDefaut;clWDCapteur.m_nAxeOrientation=clWDCapteur.nAxeOrientationDefaut;clWDCapteur.m_nFrequenceAcceleration=clWDCapteur.nFrequenceDefaut;clWDCapteur.m_nFrequenceOrientation=clWDCapteur.nFrequenceDefaut;clWDCapteur.m_nDureeDebutSecousse=clWDCapteur.nDureeDebutSecousseDefaut;clWDCapteur.m_nTimeoutDebutSecousse=clWDCapteur.nDureeDebutSecousseDefaut;clWDCapteur.m_nDureeFinSecousse=clWDCapteur.nDureeFinSecousseDefaut;clWDCapteur.m_nTimeoutFinSecousse=clWDCapteur.nDureeFinSecousseDefaut;clWDCapteur.m_nSensibiliteDebutSecousse=clWDCapteur.nSensibiliteDefaut;clWDCapteur.m_nSensibiliteFinSecousse=clWDCapteur.nSensibiliteDefaut;clWDCapteur.nValeurSelonAxe=function(n,t,i){return i&t?n:0};clWDCapteur.dAccelerationSelonAxe=function(n,t){var i=this.nValeurSelonAxe(n,t,this.m_nAxeAcceleration);return i>this.m_dSeuilAcceleration?i:0};clWDCapteur.nOrientationSelonAxe=function(n,t){return this.nValeurSelonAxe(n,t,this.m_nAxeOrientation)};clWDCapteur.bOrientationSelonAxe=function(n,t,i){return Math.abs(n-t)>this.m_nSeuilOrientation&&this.m_nAxeOrientation&i};clWDCapteur.nDebrancheTimeout=function(n){return n>=0&&(clWDUtil.ClearTimeout(n),n=-1),n};clWDCapteur.InitDebutSecousse=function(){this.m_nHeureDebutSecousse=-1;this.m_bDebutSecousse=!1};clWDCapteur.DebrancheTimeoutDebutSecousse=function(){this.InitDebutSecousse();this.m_nIdTimeoutDebutSecousse=this.nDebrancheTimeout(this.m_nIdTimeoutDebutSecousse)};clWDCapteur.DebrancheTimeoutFinSecousse=function(){this.m_nHeureFinSecousse=-1;this.m_nIdTimeoutFinSecousse=this.nDebrancheTimeout(this.m_nIdTimeoutFinSecousse)};clWDCapteur.nReinitTimeout=function(n,t,i){return this.nDebrancheTimeout(n),clWDUtil.nSetTimeout(i,t)};clWDCapteur.bHeureEnvoiOK=function(n,t,i){return t<0||n-t>i};clWDCapteur.s_CallbackDebutSecousse=function(){clWDCapteur.InitDebutSecousse()};clWDCapteur.s_CallbackFinSecousse=function(){clWDCapteur.m_nHeureFinSecousse=-1};clWDCapteur.nHeure=function(){return(new Date).getTime()};clWDCapteur.s_CallbackCapteurOrientation=function(n){clWDCapteur.CallbackCapteurOrientation(n)};clWDCapteur.CallbackCapteurOrientation=function(n){if(this.m_nOrientationAxeVertical=n.alpha,this.m_nOrientationAxeHorizontal=n.beta,this.m_nOrientationAxeLongitudinal=n.gamma,this.m_fCallbackOrientation!=null){var t=this.bOrientationSelonAxe(this.m_nOrientationAxeVertical,this.m_nOrientationAxeVerticalTransmise,this.cptAzimut),i=this.bOrientationSelonAxe(this.m_nOrientationAxeHorizontal,this.m_nOrientationAxeHorizontalTransmise,this.cptPitch),r=this.bOrientationSelonAxe(this.m_nOrientationAxeLongitudinal,this.m_nOrientationAxeLongitudinalTransmise,this.cptRoll),u=this.nHeure();(t||i||r)&&this.bHeureEnvoiOK(u,this.m_nHeureDernierEnvoiOrientation,this.m_nFrequenceOrientation)&&(t&&(this.m_nOrientationAxeVerticalTransmise=this.m_nOrientationAxeVertical),i&&(this.m_nOrientationAxeHorizontalTransmise=this.m_nOrientationAxeHorizontal),r&&(this.m_nOrientationAxeLongitudinalTransmise=this.m_nOrientationAxeLongitudinal),this.m_fCallbackOrientation(this.nOrientationSelonAxe(this.m_nOrientationAxeVerticalTransmise,this.cptAzimut),this.nOrientationSelonAxe(this.m_nOrientationAxeHorizontalTransmise,this.cptPitch),this.nOrientationSelonAxe(this.m_nOrientationAxeLongitudinalTransmise,this.cptRoll)),this.m_nHeureDernierEnvoiOrientation=u)}};clWDCapteur.BrancheEvenement=function(n,t,i){clWDUtil.AttacheDetacheEvent(i,window,n,t,!0)};clWDCapteur.BrancheEvenement("deviceorientation",clWDCapteur.s_CallbackCapteurOrientation,!0);clWDCapteur.s_CallbackCapteurAcceleration=function(n){clWDCapteur.CallbackCapteurAcceleration(n)};clWDCapteur.CallbackCapteurAcceleration=function(n){var s=0,h=0,c=0,f=n.acceleration,o;if(f==null){f=n.accelerationIncludingGravity;var e=9.81,l=nDegreVersRadian(this.m_nOrientationAxeLongitudinal),a=nDegreVersRadian(this.m_nOrientationAxeHorizontal);s=-e*Math.sin(l);h=e*Math.sin(a);c=e*Math.cos(l)*Math.cos(a)}var i=f.z-c,r=f.y-h,u=f.x-s,t=this.nHeure(),v=this.m_nHeureAcceleration<0?0:Math.abs(i+r+u-this.m_dAccelerationAxeVertical-this.m_dAccelerationAxeLongitudinal-this.m_dAccelerationAxeLateral)/(t-this.m_nHeureAcceleration)*1e4;this.m_nHeureAcceleration=t;this.m_dAccelerationAxeVertical=i;this.m_dAccelerationAxeLongitudinal=r;this.m_dAccelerationAxeLateral=u;this.m_fCallbackAcceleration!=null&&(i=this.dAccelerationSelonAxe(i,this.cptVertical),r=this.dAccelerationSelonAxe(r,this.cptLongitudinal),u=this.dAccelerationSelonAxe(u,this.cptLateral),(i!=0||r!=0||u!=0)&&this.bHeureEnvoiOK(t,this.m_nHeureDernierEnvoiAcceleration,this.m_nFrequenceAcceleration)&&(this.m_fCallbackAcceleration(i,r,u),this.m_nHeureDernierEnvoiAcceleration=t));this.m_fCallbackDebutSecousse!=null&&v>this.m_nSensibiliteDebutSecousse&&(this.m_nHeureDebutSecousse<0&&(this.m_nHeureDebutSecousse=t),!this.m_bDebutSecousse&&t-this.m_nHeureDebutSecousse>=this.m_nDureeDebutSecousse&&(this.m_bDebutSecousse=!0,this.m_fCallbackDebutSecousse()),this.m_nIdTimeoutDebutSecousse=this.nReinitTimeout(this.m_nIdTimeoutDebutSecousse,this.m_nTimeoutDebutSecousse,this.s_CallbackDebutSecousse));this.m_fCallbackFinSecousse!=null&&v>this.m_nSensibiliteFinSecousse&&(this.m_nHeureFinSecousse<0&&(this.m_nHeureFinSecousse=t),o=t-this.m_nHeureFinSecousse,this.m_nIdTimeoutFinSecousse=o>=this.m_nDureeFinSecousse?this.nReinitTimeout(this.m_nIdTimeoutFinSecousse,this.m_nTimeoutFinSecousse,function(){clWDCapteur.m_nHeureFinSecousse=-1;clWDCapteur.m_fCallbackFinSecousse(o)}):this.nReinitTimeout(this.m_nIdTimeoutFinSecousse,this.m_nTimeoutFinSecousse,this.s_CallbackFinSecousse))};clWDCapteur.nFrequenceMode=function(n){switch(n){case this.cptFrequenceRapide:return 0;case this.cptFrequenceJeu:return 20;default:return this.nFrequenceDefaut}};clWDCapteur.ValeurOuParDefaut=function(n,t){return n!=undefined?n:t};clWDCapteur.bCapteurAccelerationDisponible=function(){return window.DeviceMotionEvent!=null};clWDCapteur.BrancheCallbackAcceleration=function(){this.m_bCallbackAccelerationBranche!=(this.m_fCallbackAcceleration!=null||this.m_fCallbackDebutSecousse!=null||this.m_fCallbackFinSecousse!=null)&&(this.m_bCallbackAccelerationBranche=!this.m_bCallbackAccelerationBranche,this.BrancheEvenement("devicemotion",this.s_CallbackCapteurAcceleration,this.m_bCallbackAccelerationBranche))};clWDCapteur.CapteurDetecteChangementAcceleration=function(n,t,i,r){return this.m_fCallbackAcceleration=clWDStd.fParamCallback(n),this.m_nAxeAcceleration=this.ValeurOuParDefaut(t,this.nAxeAccelerationDefaut),this.m_nFrequenceAcceleration=this.nFrequenceMode(i),this.m_dSeuilAcceleration=this.ValeurOuParDefaut(r,0),this.m_nHeureDernierEnvoiAcceleration=-1,this.BrancheCallbackAcceleration(),this.bCapteurAccelerationDisponible()};clWDCapteur.CapteurDetecteChangementOrientation=function(n,t,i,r){return this.m_fCallbackOrientation=clWDStd.fParamCallback(n),this.m_nAxeOrientation=this.ValeurOuParDefaut(t,this.nAxeOrientationDefaut),this.m_nFrequenceOrientation=this.nFrequenceMode(i),this.m_nSeuilOrientation=this.ValeurOuParDefaut(r,0),this.m_nHeureDernierEnvoiOrientation=-1,window.DeviceOrientationEvent!=null};clWDCapteur.CapteurDetecteDebutSecousses=function(n,t,i,r){return this.m_fCallbackDebutSecousse=clWDStd.fParamCallback(n),this.m_nSensibiliteDebutSecousse=this.ValeurOuParDefaut(t,this.nSensibiliteDefaut),this.m_nDureeDebutSecousse=this.ValeurOuParDefaut(i,this.nDureeDebutSecousseDefaut),this.m_nTimeoutDebutSecousse=this.ValeurOuParDefaut(r,this.nDureeDebutSecousseDefaut),this.DebrancheTimeoutDebutSecousse(),this.BrancheCallbackAcceleration(),this.bCapteurAccelerationDisponible()};clWDCapteur.CapteurDetecteFinSecousses=function(n,t,i,r){return this.m_fCallbackFinSecousse=clWDStd.fParamCallback(n),this.m_nSensibiliteFinSecousse=this.ValeurOuParDefaut(t,this.nSensibiliteDefaut),this.m_nDureeFinSecousse=this.ValeurOuParDefaut(i,this.nDureeFinSecousseDefaut),this.m_nTimeoutFinSecousse=this.ValeurOuParDefaut(r,this.nDureeFinSecousseDefaut),this.DebrancheTimeoutFinSecousse(),this.BrancheCallbackAcceleration(),this.bCapteurAccelerationDisponible()};clWDCapteur.CapteurTermine=function(){this.m_fCallbackAcceleration=this.m_fCallbackOrientation=this.m_fCallbackDebutSecousse=this.m_fCallbackFinSecousse=null;this.DebrancheTimeoutDebutSecousse();this.DebrancheTimeoutFinSecousse();this.BrancheCallbackAcceleration()};clWDCapteur.CapteurRecupereOrientation=function(n){switch(n){case this.cptAzimut:return this.m_nOrientationAxeVertical;case this.cptPitch:return this.m_nOrientationAxeHorizontal;case this.cptRoll:return this.m_nOrientationAxeLongitudinal;default:return 0}}