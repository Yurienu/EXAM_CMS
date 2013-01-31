<?php
/**
 * Class de type Modèle gérant la table USERS
 * 
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 */

class MUsers
{
  private $conn; // connexion à la Base de Données

  private $login;
  private $pwd;

  /**
   * Constructeur de la class MUsers
   * @access public
   * @param string identifiant      
   * @param string mot de passe
   *
   * @return none
   */
  public function __construct($_login = null, $_pwd = null)
  {
    // Connexion à la Base de Données
    $this->conn = new PDO(DATABASE, LOGIN, PASSWORD) or die($this->Error());

    $this->login = $_login;
    $this->pwd   = $_pwd;
  } // __construct ($_login, $_pwd)
  
  /**
   * Destructeur de la class MUsers
   * @access public
   *        
   * @return none
   */
  public function __destruct()
  {
    return;
    
  } // __destruct()
  
  /**
   * Récupère un utilisateur en fonction d’un couple login/password
   * dans la table USERS
   * @access public
   *        
   * @return array
   */
  public function Select()
  {
    $query = $this->conn->prepare('SELECT U_ID, U_LOGIN, U_PWD
                                   FROM   '.PREFIX.'USERS
                                   WHERE  U_LOGIN = :login
                                   AND    U_PWD   = :pwd');
    $query->bindValue(':login', $this->login);
    $query->bindValue(':pwd',   $this->pwd);
    $query->execute() or die($this->Error());
    
    return $query->fetch();
  } // Select()

  /**
   * Affiche les erreurs d'exécution d'une query.
   * @access private
   *
   * @return none
   */
  private function Error()
  {
    if(DEBUG)
    {
      if(!$this->conn)
        exit('Connexion impossible !');

      $error = $this->conn->errorInfo();
      if($error)
        debug($error);
    }
  } // Error()
} // class MUsers
/** EOF /**/
