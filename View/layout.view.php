<?php
/**
 * Fichier de mise en page
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 */

global $page;

// Instanciation des class
$vhtml   = new VHtml();
$vheader = new VHeader();
$vpage   = new $page['class']();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
  <meta charset="utf-8" />
  <title><?= $page['title'] ?></title>

  <link rel="icon" type="image/png" href="<?= ICONE_PAGE ?>" />
  <link rel="stylesheet" type="text/css" href="<?= CSS_PAGE ?>" />
</head>

<body id="cms"<?= ($page['class'] == 'VPage') ? ' onload="verifConnect('.$page['arg'].')"' : '' ?>>
<header>
 <?php $vheader->showHeader() ?>
</header>

<div id="content">
 <?php $vpage->$page['method']($page['arg']) ?>
</div><!-- id="content" -->

<script src="<?= JS_PAGE ?>"></script>
</body>
</html>
