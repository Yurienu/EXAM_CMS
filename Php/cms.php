<?php
/**
 * Fichier du contrôleur
 * 
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 */

/**
 * Initialisation de la session
 */
session_start();

/**
 * Encodage de l'application en UTF-8
 */
header('Content-Type: text/html; charset=utf-8');

/**
 * Récupération des fichiers de l'application
 */
require('../Inc/cms.inc.php');

// Récupération de la variable de contrôle
$EX = isset($_REQUEST ['EX']) ? $_REQUEST['EX'] : 'home';

// Contrôleur
switch($EX)
{
  case 'home':
    home();
    break;

  case 'CONNECT':
    isset($_SESSION['ID']) ? home() : connect();
    break;

  case 'page':
    page();
    exit();

  case 'login':
    login();
    exit();

  case 'is_connected':
    is_connected();
    exit();

  case 'update_title':
    update_title();
    exit();

  case 'update_section':
    update_section();
    exit();

  case 'update_text':
    update_text();
    exit();

  case 'preview_img':
    preview_img();
    exit();

  case 'update_img':
    update_img();
    exit();

  case 'update_logo':
    update_logo();
    exit();

  default;
    home();
}

// Récupération de la mise en page
require ('../View/layout.view.php');

/**
 * ******* Fonctions de contrôle ********
 */

/**
 * Affiche la page d’accueil
 *
 * @return none
 */
function home()
{
  global $page;
  
  $page['title'] = 'Système de Gestion de Contenu';
  $page['class'] = 'VPage';
  $page['method'] = 'showPage';
  $page['arg'] = 1;
} // home()

/**
 * Affiche la page de connexion
 *
 * @return none
 */
function connect()
{
  global $page;
  
  $page['title'] = 'Système de Gestion de Contenu — Connexion';
  $page['class'] = 'VHtml';
  $page['method'] = 'showHtml';
  $page['arg'] = 'login.html';
} // connect()

/**
 * Affiche la page demandée
 *
 * @return none
 */
function page()
{
  $vhtml = new VPage();
  $vhtml->showPage(isset($_REQUEST['NUM']) ? $_REQUEST['NUM'] : 1);
} // page()

/**
 * Informe du résultat de la connexion
 *
 * @return none
 */
function login()
{
  $login = $_POST;
  $clogin = new CLogin($login);
  $login['REPONSE'] = $clogin->perform();

  // Renvoie les données de la connexion au format JSON
  echo json_encode($login);
} // login()

/**
 * Informe de l’état de la connexion
 *
 * @return none
 */
function is_connected()
{
  $clogin = new CLogin();
  $is_connected = $clogin->is_connected();

  // Renvoie la réponse au format JSON
  echo json_encode($is_connected);
} // is_connected()

/**
 * Met à jour un titre
 *
 * @return none
 */
function update_title()
{
  $title = $_POST;
  $mpage = new MPage();
  $mpage->Set_value($title);
  $mpage->Update_title();

  // Renvoie les données au format JSON
  echo json_encode($title);
} // update_title()

/**
 * Met à jour une section
 *
 * @return none
 */
function update_section()
{
  $section = $_POST;
  $mpage = new MPage();
  $mpage->Set_value($section);
  $mpage->Update_section();

  // Renvoie les données au format JSON
  echo json_encode($section);
} // update_section()

/**
 * Met à jour un texte
 *
 * @return none
 */
function update_text()
{
  $text = $_POST;
  $mpage = new MPage($text['NUMPAGE']);
  $mpage->Set_value($text);
  $mpage->Update_text();

  // Renvoie les données au format JSON
  echo json_encode($text);
} // update_text()

/**
 * Prévisualise une image
 *
 * @return array
 */
function preview_img()
{
  $preview['TYPE'] = $_FILES['PREVIEW']['type'];
  $preview['DATA'] = 'data:'.$preview['TYPE'].';base64,'.base64_encode(file_get_contents($_FILES['PREVIEW']['tmp_name']));

  echo json_encode($preview);
} // preview_img()

/**
 * Met à jour une image
 *
 * @return array
 */
function update_img()
{
  $numpage = $_REQUEST['NUMPAGE'];

  $cimg = new CImg('IMAGE');
  $ext  = $cimg->update_page($numpage);
  $json = array('NUMPAGE' => $numpage,
                'EXT'     => $ext);

  echo json_encode($json);
} // update_img()

/**
 * Met à jour le logo
 *
 * @return array
 */
function update_logo()
{
  $cimg = new CImg('LOGO', array('.png'));
  $ext  = $cimg->update_logo();
  $json = array('EXT' => $ext);

  echo json_encode($json);
} // update_logo()
/** EOF /**/
