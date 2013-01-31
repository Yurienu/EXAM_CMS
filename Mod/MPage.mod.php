<?php
/**
 * Class de type Modèle gérant la table PAGE
 * 
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 */

class MPage
{
  private $conn; // connexion à la Base de Données
  private $value; // tableau de récupération d'un tuple ou de gestion de données
                  // (insert ou update)
  private $num; // Numéro de page

  /**
   * Constructeur de la class MPage
   * @access public
   * @param int Numéro de page
   *      
   * @return none
   */
  public function __construct($_num = null)
  {
    // Connexion à la Base de Données
    $this->conn = new PDO(DATABASE, LOGIN, PASSWORD) or die($this->Error());
    $this->conn->query('SET NAMES utf8');

    $this->num = intval($_num);
  } // __construct ($_num)
  
  /**
   * Destructeur de la class MPage
   * @access public
   *        
   * @return none
   */
  public function __destruct()
  {
    return;
    
  } // __destruct()

  /**
   * Récupère toutes les informations pour un affichage
   * @access public
   *        
   * @return array
   */
  public function Select()
  {
    $query = $this->conn->prepare('SELECT P_ID, P_IMG, P_TEXT
                                   FROM   '.PREFIX.'PAGE
                                   WHERE  P_ID = :id');
    $query->bindValue(':id', $this->num);
    $query->execute() or die($this->Error());

    return $query->fetch();
  } // Select()

  /**
   * Récupère toutes les informations pour un affichage
   * @access public
   *        
   * @return array
   */
  public function Select_section()
  {
    $query = $this->conn->prepare('SELECT S_ID, S_TITLE, S_TEXT
                                   FROM   '.PREFIX.'SECTIONS
                                   WHERE  P_ID = :id');
    $query->bindValue(':id', $this->num);
    $query->execute() or die($this->Error());

    return $query->fetchAll();
  } // Select_section()

  /**
   * Récupère toutes les pages existantes
   * @access public
   *        
   * @return array
   */
  public function Select_All()
  {
    $query = $this->conn->prepare('SELECT P_ID, P_NAME
                                   FROM   '.PREFIX.'PAGE
                                   ORDER BY P_ID ASC');
    $query->execute() or die($this->Error());

    return $query->fetchAll();
  } // Select_All()

  /**
   * Modificateur du membre $value
   * @access public
   * @param array tableau des données à insérer ou à modifier
   *          
   * @return none
   */
  public function Set_value($_value)
  {
    $this->value = $_value;
    
  } // Set_value($_value)

  /**
   * Met à jour un titre
   * @access public
   *        
   * @return array
   */
  public function Update_title()
  {
    $NUMTITRE = $this->value['NUMTITRE'];
    $TITRE    = $this->value['TITRE'];

    $query = $this->conn->prepare('UPDATE '.PREFIX.'SECTIONS
                                   SET    S_TITLE = :titre
                                   WHERE  S_ID = :id');
    $query->bindValue(':titre', $TITRE);
    $query->bindValue(':id', $NUMTITRE);
    $query->execute() or die($this->Error());

    return;
  } // Update_title()

  /**
   * Met à jour une section
   * @access public
   *        
   * @return array
   */
  public function Update_section()
  {
    $NUMSECTION = $this->value['NUMSECTION'];
    $TEXT       = $this->value['TEXT'];

    $query = $this->conn->prepare('UPDATE '.PREFIX.'SECTIONS
                                   SET    S_TEXT = :text
                                   WHERE  S_ID = :id');
    $query->bindValue(':text', $TEXT);
    $query->bindValue(':id', $NUMSECTION);
    $query->execute() or die($this->Error());

    return;
  } // Update_section()

  /**
   * Met à jour un texte
   * @access public
   *        
   * @return array
   */
  public function Update_text()
  {
    $TEXT = $this->value['TEXT'];

    $query = $this->conn->prepare('UPDATE '.PREFIX.'PAGE
                                   SET    P_TEXT = :text
                                   WHERE  P_ID = :id');
    $query->bindValue(':text', $TEXT);
    $query->bindValue(':id', $this->num);
    $query->execute() or die($this->Error());

    return;
  } // Update_text()

  /**
   * Met à jour une image
   * @access public
   *        
   * @return array
   */
  public function Update_img()
  {
    $EXT = $this->value['EXT'];

    $query = $this->conn->prepare('UPDATE '.PREFIX.'PAGE
                                   SET    P_IMG = :ext
                                   WHERE  P_ID = :id');
    $query->bindValue(':ext', $EXT);
    $query->bindValue(':id', $this->num);
    $query->execute() or die($this->Error());

    return;
  } // Update_img()

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
} // class MPage
/** EOF /**/
