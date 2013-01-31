/**
 * Initialisation des écouteurs
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 */

/**
 * Gestion du click sur un bouton de l'en-tête
 * avec appel de la fonction d'affichage correspondante
 */
var click_button = document.getElementById('entete').getElementsByTagName('button');
var nb_buttons = click_button.length;

for(var i = 0; i < nb_buttons; ++i)
{
  if(click_button[i].addEventListener)
  {
    click_button[i].addEventListener('click', viewPage, false);
  }
  else
  {
    click_button[i].attachEvent('onclick', viewPage);
  }
  
  click_button[i].style.cursor = 'pointer';
}

/**
 * Gestion des événements sur le formulaire de login id="form_login"
 */
var form_login = document.getElementById('form_login');
if(form_login)
{
  /**
   * Gestion de l'événement submit sur le formulaire de login id="form_login"
   */
  if(form_login.addEventListener)
  {
    form_login.addEventListener('submit', submitLogin, false);
  } 
  else
  {
    form_login.attachEvent('onsubmit', submitLogin);
  }
}

/**
 * Fonction d'arrêt de la propagation d'un événement dans la phase de bouillonnement
 * @param event événement
 */
function stopEvent(event)
{
  if(event.stopPropagation)
  {
    event.stopPropagation();
  }
  else
  {
    event.cancelBubble = true;
  }
  
  if(event.preventDefault)
  {
    event.preventDefault();
  }
  else
  {
    event.returnValue = false;
  }
} // stopEvent(event)
