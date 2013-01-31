<?php
/**
 * Class d'affichage de l'entête dans la page
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 *
 */

class VHeader
{
  /**
   * Constructeur
   * @access public
   *        
   * @return none
   */
  public function __construct(){}
  /**
   * Destructeur
   * @access public
   *        
   * @return none
   */
  public function __destruct(){}
  
  /**
   * Affiche l'entête dans la page
   * @access public
   *        
   * @return none
   */
  public function showHeader()
  {
    $mpage = new MPage();
    $page  = $mpage->Select_All();
    $logotime = filemtime("../Img/logo.png");
    echo <<<HERE
  <h1 id="logo" title="Logo">Logo</h1>
  <!-- Boîte modification d’image -->
  <div id="logobox">
    <p class="close_cross"><button id="logo_button">&nbsp;</button></p>

    <form id="logo_form" method="post" action="#" enctype="multipart/form-data">
      <p class="center"><img id="logo_current" src="../Img/logo.png?{$logotime}" /></p>

      <p>
        <input id="logo_edit" name="logo_edit" type="file" accept="image/*" />

        <input type="submit" value="OK" />
      </p>
    </form>
  </div>

  <ol id="entete">
HERE;

    foreach($page as $curp)
      echo '<li><button id="button_page'.$curp['P_ID'].'">'.$curp['P_NAME'].'</button></li>';
 
    echo '</ol>';
   
  } // showHeader()

} // VHeader
/** EOF /**/
