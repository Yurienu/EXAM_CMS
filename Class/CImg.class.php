<?php
/**
 * Fichier de class des opérations sur les images
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 */

/**
 * Class d’image
 */
class CImg
{
  /**
   * @var string nom du fichier
   * @access private
   */  
  var $filename;

  /**
   * @var int numéro de page
   * @access private
   */  
  var $numpage;

  /**
   * @var array extensions autorisées
   * @access private
   */  
  var $allowed;

  /**
   * Constructeur et initialisation des membres de la class
   * @access public
   * @param string nom du fichier
   * @param array tableau des extensions autorisées
   *
   * @return none
   */
  public function __construct($_filename = null, $_allowed = array('.png', '.gif', '.jpg', '.jpeg', '.bmp', '.svg'))
  {
    $this->filename = $_filename;
    $this->allowed  = $_allowed;

    return;
  } // __construct($_filename, $_allowed)

  /**
   * Destructeur
   * @access public
   *
   * @return none
   */
  public function __destruct() {return;}

  /**
   * Retourne l’extension du nouveau fichier après vérification du format
   * @access private
   *
   * @return string
   */
  private function check()
  {
    // Vérification du succès de l’upload
    if(!$_FILES[$this->filename]['tmp_name']) exit('Upload échoué');

    // Vérification de format
    $new_ext = strrchr($_FILES[$this->filename]['name'], '.');
    if(!in_array($new_ext, $this->allowed)) exit('Format invalide');

    return $new_ext;
  } //check()

  /**
   * Suppression et mise en ligne du nouveau fichier
   * @access private
   * @param string ancien chemin d'image
   * @param string nouvelle destination d'image
   *
   * @return none
   */
  private function upload($old_dest, $new_dest)
  {
    unlink($old_dest);
    move_uploaded_file($_FILES[$this->filename]['tmp_name'], $new_dest);
  } // update_image(old_dest, new_dest)

  /**
   * Met à jour une image de page
   * @access public
   * @param int numéro de page
   *
   * @return bool
   */
  public function update_page($_numpage = null)
  {
    $new_ext = $this->check();

    // Modèle MPage
    $mpage = new MPage($_numpage);

    // Récupération de l’ancienne extension pour suppression
    $page = $mpage->Select();
    $old_ext = $page['P_IMG'];
    $old_dest = '../Img/page'.$_numpage.''.$old_ext;
    $new_dest = '../Img/page'.$_numpage.''.$new_ext;

    $this->upload($old_dest, $new_dest);

    $mpage->Set_value(array('EXT' => $new_ext));
    $mpage->Update_img();

    return $new_ext;
  } // update_page($_numpage)

  /**
   * Met à jour le logo
   * @access public
   *
   * @return bool
   */
  public function update_logo()
  {
    $new_ext = $this->check();

    $old_ext = '.png';
    $old_dest = '../Img/logo'.$old_ext;
    $new_dest = '../Img/logo'.$new_ext;

    $this->upload($old_dest, $new_dest);

    return $new_ext;
  } // update_logo()
} // CImg
/** EOF /**/
