<?php
/**
 * Boîtes à outils
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 */

// Visualisatiion des erreurs
if(DEBUG)
{
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  
  /**
   * Fonction de debug pour les tableaux
   * @param array tableau à débugguer
   *
   * @return none;
   */
  function debug($Tab)
  {
    echo '<pre>Tab';
    print_r($Tab);
    echo '</pre>';
  } // debug($Tab)
}

/**
 * Chargement automatique des class
 * @param string class appelée
 *
 * @return none;
 */
function __autoload($class)
{
  // Aiguillage suivant la première lettre de la class
  switch ($class[0])
  {
    case 'M':
      require_once('../Mod/'.$class.'.mod.php');
      break;

    case 'V':
      require_once('../View/'.$class.'.view.php');
      break;

    case 'C':
      require_once('../Class/'.$class.'.class.php');
      break;
  }

  return;

} // __autoload($class)
/** EOF /**/
