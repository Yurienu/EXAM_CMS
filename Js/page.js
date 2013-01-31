/**
 * Fonctions liées à la gestion des box sur la page grâce aux écouteurs
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 * 
 */

/**
 * Charge dynamiquement dans le #content une page
 * @param event événement de la souris
 *
 * @return none
 */
function viewPage(event)
{
  if(event.currentTarget.id == 'logo')
  {
    numpage = 1;
  }
  else
  {
    // On récupère le numéro de la page grâce à l’id du bouton qui a été cliqué
    numpage = event.currentTarget.id.substr(11);
  }

  changeContent('content', '../Php/cms.php', 'EX=page&NUM='+numpage, 'verifConnect('+numpage+')');
} // viewPage(event)

/**
 * Ajoute des écouteurs sur les pages si connecté
 * @param int numéro de page
 *
 * @return none
 */
function verifConnect(numpage)
{
  var is_connected = actionForm('../Php/cms.php', 'EX=is_connected');

  if(is_connected)
  {
    /**
     * Gestion de l'événement click sur le titre dans les pages
     */
    var page_title = document.getElementsByTagName('aside')[0].getElementsByTagName('h2');
    var nb_title = page_title.length;

    for(var i = 0; i < nb_title; ++i)
    {
      if(page_title[i].addEventListener)
      {
        page_title[i].addEventListener('click', showTitlebox, false);
      }
      else
      {
        page_title[i].attachEvent('onclick', showTitlebox);
      }
      
      page_title[i].style.cursor = 'pointer';
    }

    /**
     * Gestion de l'événement click sur le texte des sections
     */
    var page_section = document.getElementsByTagName('aside')[0].getElementsByTagName('article');
    var nb_section = page_section.length;

    for(var i = 0; i < nb_section; ++i)
    {
      if(page_section[i].addEventListener)
      {
        page_section[i].addEventListener('click', showSectionbox, false);
      }
      else
      {
        page_section[i].attachEvent('onclick', showSectionbox);
      }
      
      page_section[i].style.cursor = 'pointer';
    }

    /**
     * Gestion de l'événement click sur le texte de gauche dans les pages
     */
    var page_text = document.getElementById('left_text');
    if(page_text)
    {
      if(page_text.addEventListener)
      {
        page_text.addEventListener('click', showTextbox, false);
      } 
      else
      {
        page_text.attachEvent('onclick', showTextbox);
      }

      page_text.style.cursor = 'pointer';
    }

    /**
     * Gestion de l'événement change sur le fichier de l’image de page
     */
    var page_img_input = document.getElementById('img_edit');
    if(page_img_input)
    {
      if(page_img_input.addEventListener)
      {
        page_img_input.addEventListener('change', function() { previewImg('img_edit', 'img_current') }, false);
      }
      else
      {
        page_img_input.attachEvent('onchange', function() { previewImg('img_edit', 'img_current') });
      }
    }

    /**
     * Gestion de l'événement click sur l’image dans les pages
     */
    var page_img = document.getElementById('presentation');
    if(page_img)
    {
      if(page_img.addEventListener)
      {
        page_img.addEventListener('click', showImgbox, false);
      } 
      else
      {
        page_img.attachEvent('onclick', showImgbox);
      }

      page_img.style.cursor = 'pointer';
    }

    /**
     * Gestion des événements sur les images de clôture des box
     */
    var page_close_button = document.getElementById('content').getElementsByTagName('button');
    var nb_close_button = page_close_button.length;
    var pattern = /(close_cross)/;

    for(var i = 0; i < nb_close_button; ++i)
    {
      if(pattern.test(page_close_button[i].parentNode.getAttribute('class')))
      {
        if(page_close_button[i].addEventListener)
        {
          page_close_button[i].addEventListener('click', function() { closeBox(this); }, false);
        }
        else
        {
          page_close_button[i].attachEvent('onclick', function() { closeBox(this); });
        }
        
        page_close_button[i].style.cursor = 'pointer';
      }
    }

    /**
     * Gestion des événements de soumission de formulaire
     */
    var page_submit = document.getElementById('content').getElementsByTagName('form');
    var nb_submit = page_submit.length;

    for(var i = 0; i < nb_submit; ++i)
    {
      if(page_submit[i].addEventListener)
      {
        page_submit[i].addEventListener('submit', submitForm, false);
      }
      else
      {
        page_submit[i].attachEvent('onsubmit', submitForm);
      }
    }
  }

  /**
    * Gestion des événements sur le logo
    */
  var page_logo = document.getElementById('logo');
  if(page_logo)
  {
    /**
      * Gestion de l'événement click sur le logo
      */
    if(page_logo.addEventListener)
    {
      if(is_connected)
      {
        page_logo.addEventListener('click', showLogobox, false);
      }
      else
      {
        page_logo.addEventListener('click', viewPage, false);
      }
    } 
    else
    {
      if(is_connected)
      {
        page_logo.attachEvent('onclick', showLogobox);
      }
      else
      {
        page_logo.attachEvent('onclick', viewPage);
      }
    }

    page_logo.style.cursor = 'pointer';
  }
} // verifConnect(numpage)

/**
 * Fonction d’édition du titre de droite
 * @param event événement de la souris
 *
 * @return none
 */
function showTitlebox(event)
{
  // Déplacement de la box au niveau du titre
  var numtitle = event.currentTarget.id.substr(5);
  var titre = document.getElementById('title'+numtitle);
  var titlebox = document.getElementById('titlebox');

  document.getElementById('title_numtitre').value = numtitle;
  document.getElementById('title_edit').value = titre.innerHTML;

  titlebox.style.top = parseInt(titre.offsetTop + titre.offsetHeight) + 'px';
  titlebox.style.right = 5 + 'px';
  titlebox.style.display = 'block';
} // showTitlebox(event)

/**
 * Fonction d’édition du texte de section
 * @param event événement de la souris
 *
 * @return none
 */
function showSectionbox(event)
{
  // Déplacement de la box au niveau du texte
  var numsection = event.currentTarget.id.substr(7);
  var section = document.getElementById('section'+numsection);
  var sectionbox = document.getElementById('sectionbox');
  var sectionedit = document.getElementById('section_edit');

  document.getElementById('section_numsection').value = numsection;
  sectionedit.value = section.innerHTML;
  sectionedit.style.height = parseInt(section.offsetHeight - 60) + 'px';

  sectionbox.style.top = parseInt(section.offsetTop) + 'px';
  sectionbox.style.right = 5 + 'px';
  sectionbox.style.height = parseInt(section.offsetHeight) + 'px';
  sectionbox.style.display = 'block';
} // showSectionbox(event)

/**
 * Fonction d’édition du texte
 *
 * @return none
 */
function showTextbox()
{
  document.getElementById('text_edit').value = document.getElementById('left_text').innerHTML;
  document.getElementById('textbox').style.display = 'block';
} // showTextbox()

/**
 * Fonction d’édition de l’image
 *
 * @return none
 */
function showImgbox()
{
  // Déplacement de la box au niveau de l’image
  var presentation = document.getElementById('presentation');
  var imgbox = document.getElementById('imgbox');

  imgbox.style.top = parseInt(presentation.offsetTop + presentation.offsetHeight) + 'px';
  imgbox.style.left = 5 + 'px';
  imgbox.style.display = 'block';
} // showImgbox()

/**
 * Redirige vers le bon formulaire de soumission
 * @param event événement de la souris
 * 
 * @return none
 */
function submitForm(event)
{
  stopEvent(event);

  var php = '../Php/cms.php';
  switch(event.target.id)
  {
    case "title_form":   resultatTitle(php, 'EX=update_title');     break;
    case "section_form": resultatSection(php, 'EX=update_section'); break;
    case "text_form":    resultatText(php, 'EX=update_text');       break;
    case "img_form":     resultatImg(php);                          break;
  }
} // submitForm(event)
