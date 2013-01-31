/**
 * Fonctions javascript utilisant les appels aux serveur http
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 */

var global = this;

global.eval(); // pour l'évaluation des fonctions javascripts

/**
 *  Connexion au serveur http
 *
 *  @return string Connexion
 */
function getXhr()
{
  if (window.XMLHttpRequest)         // Firefox et autres
  {
    xhr = new XMLHttpRequest();
  }
  else if (window.ActiveXObject)     // Internet Explorer
  {
    try
    {
      xhr = new ActiveXObject("Msxml2.XMLHTTP"); // IE version > 5
    }
    catch (e)
    {
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
  else // XMLHttpRequest non supporté par le navigateur
  {
    alert("Votre navigateur ne supporte pas les objets XMLHttpRequest !");
    xhr = false;
  }

  return xhr;

} // getXhr ()

/**
 * Modification du contenu d'un élément en mode asynchrone
 * @param string id identifiant de l'élément à modifier
 * @param string php programme de modification
 * @param string param paramètres de modification
 * @param string callback : programme d'appel après la modification
 *  
 * @return none
 */
function changeContent(id, php, param, callback)
{
  var c = document.getElementById(id);

  var xhr = getXhr();  // Récupère la connexion au serveur http

  xhr.open('POST', php, true);  //  Ouvre la connexion avec le serveur http avec comme url php

  xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

  if (param)
  {
    xhr.send(param);  //  Envoie l'url php pour exécution au serveur http avec les paramètres param
  }

  // Exécution en mode asynchrone de la fonction dès que l'on obtient une réponse du serveur http
  xhr.onreadystatechange = function() 
  {
    // Si on a tout reçu (4) et que le serveur est ok (200)
    // Modifie l'élément ayant pour identificateur id suivant le programme php
    if (xhr.readyState == 4 && xhr.status == 200)
    {
      c.innerHTML = xhr.responseText;

      if (callback != null)
      {
        eval(callback);
      }

      // Si on a du javascript on identifie les scripts et on force la valuation avec eval()
      var allscript = c.getElementsByTagName('script');
      for (var i = 0; i < allscript.length; ++i)
      {
        window.eval(allscript[i].text);
      }
    }
  };
  
  return;

} // changeContent(id, php, param, callback)

/**
 * Récupération d'une action (d'un formulaire) en mode synchrone au format json
 * @param string php programme de modification
 * @param string param paramètres de modification
 *  
 * @return string json
 */
function actionForm(php, param)
{
  var xhr = getXhr(); // Récupère la connexion au serveur http

  xhr.open('POST', php, false);  // Ouvre la connexion avec le serveur http avec comme url php

  xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

  if (param)
  {
    xhr.send(param); // Envoie l'url php pour exécution au serveur http avec les paramètres param
  }

  if (xhr.responseText)
  {
    return eval('(' +  xhr.responseText + ')'); // Retour avec l'évalution de la réponse  au format json devient un objet json
  }
  else
  {
    return;
  }

} // actionForm(php, param)
