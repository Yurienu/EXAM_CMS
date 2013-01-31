/**
 * Fonctions liées au formulaire de connexion
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 * 
 */

/**
 * Soumet le formulaire de connexion
 * @param event événement de la souris
 *  
 * @return boolean
 */
function submitLogin(event)
{
  if(!verifForm(document.getElementById('form_login')))
  {
    stopEvent(event);

    return false;
  }

  resultatLogin('../Php/cms.php', 'EX=login');
  stopEvent(event);

  return false;
} // submitLogin(event)

/**
 * Récupère les données du formulaire 
 * et vérifie si le login/password est bon
 * @param string php programme de modification
 * @param string param paramètres de modification
 * 
 * @return none
 */
function resultatLogin(php, param)
{

  var login    = document.getElementById('login').value;
  var password = document.getElementById('password').value;

  param +='&LOGIN='+encodeURIComponent(login)+'&PASSWORD='+encodeURIComponent(password);

  var res = actionForm(php, param);

  if(!res.REPONSE)
  {
    window.alert('Le login ou le password est incorrect');
  }
  else
  {
    changeContent('content', '../Php/cms.php', 'EX=page&NUM=1', 'verifConnect(1)');
  }

  return;
} // resultatLogin(php, param)
