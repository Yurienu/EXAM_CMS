<?php
/**
 * Class d'affichage d'une page
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 *
 */
class VPage
{
  /**
   * @var int num
   * @access private
   */  
  var $num;

  /**
   * @var array contenu
   * @access private
   */  
  var $content;

  /**
   * @var array sections
   * @access private
   */  
  var $section;

  /**
   * @var string chemin de l’image
   * @access private
   */  
  var $pageimg;

  /**
   * @var int Dernière modification de l’image
   * @access private
   */  
  var $imgtime;

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
   * Crée les boîtes de modification
   * @access private
   *        
   * @return none
   */
  private function showBox()
  {
    echo <<<HERE
  <!-- Boîte modification de titre -->
  <div id="titlebox">
    <p class="close_cross"><button id="title_button">&nbsp;</button></p>

    <form id="title_form" method="post" action="#">
      <p>
        <input id="title_numtitre" type="hidden" value="" />
        <input id="title_edit" type="text" />

        <input type="submit" value="OK" />
      </p>
    </form>
  </div>

  <!-- Boîte modification de texte -->
  <div id="textbox">
    <p class="close_cross"><button id="text_button">&nbsp;</button></p>

    <form id="text_form" method="post" action="#">
      <p>
        <input id="text_numpage" type="hidden" value="{$this->num}" />

        <textarea id="text_edit"></textarea>
      </p>

      <p class="center">
        <input type="submit" value="OK" />
      </p>
    </form>
  </div>

  <!-- Boîte modification de section (contenu) -->
  <div id="sectionbox">
    <p class="close_cross"><button id="section_button">&nbsp;</button></p>

    <form id="section_form" method="post" action="#">
      <p>
        <input id="section_numsection" type="hidden" value="" />

        <textarea id="section_edit"></textarea>
      </p>

      <p class="center">
        <input type="submit" value="OK" />
      </p>
    </form>
  </div>

  <!-- Boîte modification d’image -->
  <div id="imgbox">
    <p class="close_cross"><button id="img_button">&nbsp;</button></p>

    <form id="img_form" method="post" action="#" enctype="multipart/form-data">
      <p class="center"><img id="img_current" src="{$this->pageimg}?{$this->imgtime}" /></p>

      <p>
        <input id="img_numpage" type="hidden" value="{$this->num}" />
        <input id="img_edit" name="img_edit" type="file" accept="image/*" />

        <input type="submit" value="OK" />
      </p>
    </form>
  </div>

HERE;

  } // showBox()

  /**
   * Affiche la partie de gauche
   * @access private
   *        
   * @return none
   */
  private function showText()
  {
    $now = time();
    echo <<<HERE
  <!-- Partie gauche -->
  <div id="content1">
    <img id="presentation" src="{$this->pageimg}?{$this->imgtime}" alt="" />

    <div id="left_text">{$this->content['P_TEXT']}</div>
  </div>

HERE;

  } // showText()

  /**
   * Affiche les sections
   * @access private
   *        
   * @return none
   */
  private function showSections()
  {
    echo '<aside>';

    // Affichage des sections
    foreach($this->sections as $section)
    {
      echo '<section>
        <h2 id="title'.$section['S_ID'].'" class="artitle">'.$section['S_TITLE'].'</h2>

        <article id="section'.$section['S_ID'].'">'.$section['S_TEXT'].'</article>
      </section>';
    }

    echo '</aside>';
  } // showSections()

  /**
   * Affiche le fichier html
   * @access public
   * @string int Numéro de page
   *        
   * @return none
   */
  public function showPage($_num)
  {
    $this->num = intval($_num);

    $mpage = new MPage($this->num);
    $this->content  = $mpage->Select();
    $this->sections = $mpage->Select_section();
    $this->pageimg = '../Img/page'.$this->num.''.$this->content['P_IMG'];
    $this->imgtime = filemtime($this->pageimg);

    $this->showBox();
    $this->showText();
    $this->showSections();
  } // showPage($_num)

} // VPage
/** EOF /**/
