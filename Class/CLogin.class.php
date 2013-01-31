<?php
/**
 * Fichier de class des opérations pour la connexion
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 */

/**
 * Class de connexion
 */
class CLogin
{
  /**
   * @var string login
   * @access private
   */  
  var $login;
  
  /**
   * @var string mot de passe
   * @access private
   */ 
  var $password;
  
  /**
   * Constructeur et initialisation des membres de la class
   * @access public
   * @param array tableau associatif aux identifiants
   *
   * @return none
   */
  public function __construct($_login = array('LOGIN' => null, 'PASSWORD' => null))
  {
    $this->login    = $_login['LOGIN'];
    $this->password = sha1($_login['PASSWORD']);

    return;
  } // __construct($_login)

  /**
   * Destructeur
   * @access public
   *
   * @return none
   */
  public function __destruct() {return;}

  /**
   * Vérifie les paramètres, initialise la session, puis
   * renvoie true ou false en fonction de la réussite de la connexion
   * @access public
   *
   * @return bool
   */
  public function perform()
  {
    $musers = new MUsers($this->login, $this->password);
    $user   = $musers->Select();

    if($user)
    {
      $_SESSION['ID']    = $user['U_ID'];
      $_SESSION['LOGIN'] = $user['U_LOGIN'];

      return true;
    }
    else
    {
      return false;
    }
  } // perform()

  /**
   * Renvoie l’état de la connexion
   * @access public
   *
   * @return bool
   */
  public function is_connected()
  {
    return isset($_SESSION['ID']);
  } // is_connected()
} // CLogin
/** EOF /**/
