<?php
/**
 * Fichier de définitions
 *
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 */
define('DEBUG', false);

if(DEBUG)
{
  define('CSS_PAGE', '../Css/cms.css');
  define('JS_PAGE', '../Js/cms.js');
}
else
{
  // Si on est en production, on a besoin de recharger le fichier que quand il a été recompressé
  define('CSS_PAGE', '../Css/cms-min.css?'.filemtime('../Css/cms-min.css'));
  define('JS_PAGE', '../Js/cms-min.js?'.filemtime('../Js/cms-min.js'));
}

define('ICONE_PAGE', '../Img/cms.png');
/** EOF /**/
