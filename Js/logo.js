/**
 * Fonctions liées à la modification du logo
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 * 
 */

/**
 * Fonction d’édition du logo
 *
 * @return none
 */
function showLogobox()
{
  document.getElementById('logobox').style.display = 'block';
} // showLogobox()

/**
 * Gestion de l'événement change sur le fichier de la logobox
 */
var page_logo_input = document.getElementById('logo_edit');
if(page_logo_input)
{
  if(page_logo_input.addEventListener)
  {
    page_logo_input.addEventListener('change', function() { previewImg('logo_edit', 'logo_current') }, false);
  } 
  else
  {
    page_logo_input.attachEvent('onchange', function() { previewImg('logo_edit', 'logo_current') });
  }
}

/**
 * Gestion de l'événement submit sur le formulaire de la logobox
 */
var page_logo_form = document.getElementById('logo_form');
if(page_logo_form)
{
  if(page_logo_form.addEventListener)
  {
    page_logo_form.addEventListener('submit', submitLogo, false);
  } 
  else
  {
    page_logo_form.attachEvent('onsubmit', submitLogo);
  }
}

/**
 * Gestion de l'événement click sur l’image de fermeture de la logobox
 */
var page_logo_close = document.getElementById('logo_button');
if(page_logo_close)
{
  if(page_logo_close.addEventListener)
  {
    page_logo_close.addEventListener('click', function() { closeBox(this); }, false);
  } 
  else
  {
    page_logo_close.attachEvent('onclick', function() { closeBox(this); });
  }

  page_logo_close.style.cursor = 'pointer';
}

/**
 * Ferme un formulaire de modification
 * @param elmt élément
 * 
 * @return none
 */
function closeBox(elmt)
{
  elmt.parentNode.parentNode.style.display = 'none';
} // closeBox(elmt)

/**
 * Prévisualise l’image qui s’apprête à être uploadée
 * @param string id Identifiant de l’image à changer
 * @param string preview_id Identifiant de l’endroit destiné à accueillir la prévisualisation
 * 
 * @return none
 */
function previewImg(id, preview_id)
{
  var file = document.getElementById(id).files[0];
  if(!file)
  {
    return false;
  }

  // Utilisation de FormData d’XMLHttpRequest2 pour l’upload en AJaX
  var fd = new FormData();
  fd.append('EX', 'preview_img');
  fd.append('PREVIEW', file);

  // Création d’un élément XHR par POST
  var xhr = new getXhr();
  xhr.open('POST', '../Php/cms.php', true);

  // Récupération au chargement
  xhr.onload = function() {
    if (this.status == 200) {
      // Réponse en JSON
      var resp = JSON.parse(this.response);

      document.getElementById(preview_id).src = resp.DATA;
    };
  };

  // Envoi final
  xhr.send(fd);

  return false;
} // previewImg(id, preview_id)

/**
 * Soumet le formulaire de logo
 * @param event événement de la souris
 * 
 * @return none
 */
function submitLogo(event)
{
  stopEvent(event);
  resultatLogo('../Php/cms.php');
} // submitLogo(event)

/**
 * Récupère les données du formulaire de logo
 * @param string php programme de modification
 * 
 * @return none
 */
function resultatLogo(php)
{
  var file = document.getElementById('logo_edit').files[0];
  if(!file)
  {
    closeBox(document.getElementById('logo_button'));
    return false;
  }

  // Utilisation de FormData d’XMLHttpRequest2 pour l’upload en AJaX
  var fd = new FormData();
  fd.append('EX', 'update_logo');
  fd.append('LOGO', file);

  // Création d’un élément XHR par POST
  var xhr = new getXhr();
  xhr.open('POST', php, true);

  // Récupération au chargement
  xhr.onload = function() {
    if (this.status == 200) {
      // Réponse en JSON
      var resp = JSON.parse(this.response);

      // Modification de l’image existante par forçage du rechargement du cache
      var now = new Date();
      document.getElementById('logo').style.background = 'transparent url(../Img/logo'+resp.EXT+'?'+now.getTime()+') no-repeat';
      document.getElementById('logo_current').src = '../Img/logo'+resp.EXT+'?'+now.getTime();
    };
  };

  // Envoi final
  xhr.send(fd);

  closeBox(document.getElementById('logo_button'));

  return false;
} // resultatLogo(php)
