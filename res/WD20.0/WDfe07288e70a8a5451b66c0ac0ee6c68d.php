<?php
//20.0.56.0 IHM/Champ/Image/ImageClicable.php GF 
//VersionVI: 30F200066p
//(c) 2005-2012 PC SOFT  - Release
 if (!defined('__INC__IHM/Champ/Image/Image.php')) { define('__INC__IHM/Champ/Image/Image.php',true); include_once(WB_INCLUDE_PATH.'WD6fa5e60faa5f33f433b54c2f53b7cef3.php'); } class CImageClicable extends CImage { var $EstBouton; function CImageClicable() { parent::CChamp(); $this->EstBouton = true; } function& GetType() { return getRef(22); } } ?>