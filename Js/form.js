/**
 * Fonctions liées aux différents formulaires
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 * 
 */

/**
 * Vérification du formulaire 
 * Vérifie que les attributs de type NOT NULL soient renseignés
 * @param element frm élément de type formulaire
 * 
 * return boolean
 */
function verifForm(frm)
{
  var tabLabel = frm.getElementsByTagName('label'); // contient le tableau des éléments de tag label
  var nbLabel = tabLabel.length; // nombre d'éléments de tag label

  for(var i = 0, errors = 0, message = ''; i < nbLabel; ++i)
  {
    // Récupération de l'élément i du tableau des éléments de tag label
    var elemLabel = tabLabel[i];

    // Recuperation dans l'élément i du contenu de l'attribut for 
    // correspondant au id de l'élément associe au label (input, select, ...)
    var atFor = elemLabel.getAttribute('for');

    if(atFor)
    {
      // Elément associe au label ayant pour id la valeur de contenu dans for
      var elemById = document.getElementById(atFor);

      // Récupération de la valeur de la classe associée à l'id récupéré
      var atClass = elemById.getAttribute('class');

      // Si la class est mandatory et l'élément input de tag label est null alors messsage
      var pattern = /(mandatory)/;
      if (pattern.test(atClass) && !elemById.value)
      {
        message += " - " + elemLabel.innerHTML + "\n";
        ++errors;
      }
    }
  }

  // Si error est true alors alerte
  if (errors)
  {
    var deb_mes = (errors > 1) ? 'Vous devez renseigner les champs suivants :' : 'Vous devez renseigner le champ suivant :';

    message = deb_mes + '\n' + message;

    window.alert(message);

    return false;
  }

  return true;
} // verifForm(frm)

/**
 * Récupère les données du formulaire de titre
 * @param string php programme de modification
 * @param string param paramètres de modification
 * 
 * @return none
 */
function resultatTitle(php, param)
{
  var numtitre = document.getElementById('title_numtitre').value;
  var titre    = document.getElementById('title_edit').value;

  param +='&NUMTITRE='+numtitre+'&TITRE='+encodeURIComponent(titre);

  var res = actionForm(php, param);

  if(res.TITRE)
  {
    document.getElementById('title'+res.NUMTITRE).innerHTML = res.TITRE;
  }

  closeBox(document.getElementById('title_button'));

  return false;
} // resultatTitle(php, param)

/**
 * Récupère les données du formulaire de section
 * @param string php programme de modification
 * @param string param paramètres de modification
 * 
 * @return none
 */
function resultatSection(php, param)
{
  var numsection = document.getElementById('section_numsection').value;
  var section    = document.getElementById('section_edit').value;

  param +='&NUMSECTION='+numsection+'&TEXT='+encodeURIComponent(section);

  var res = actionForm(php, param);

  if(res.TEXT)
  {
    document.getElementById('section'+res.NUMSECTION).innerHTML = res.TEXT;
  }

  closeBox(document.getElementById('section_button'));

  return false;
} // resultatSection(php, param)

/**
 * Récupère les données du formulaire de texte
 * @param string php programme de modification
 * @param string param paramètres de modification
 * 
 * @return none
 */
function resultatText(php, param)
{
  var numpage = document.getElementById('text_numpage').value;
  var text    = document.getElementById('text_edit').value;

  param +='&NUMPAGE='+numpage+'&TEXT='+encodeURIComponent(text);

  var res = actionForm(php, param);

  if(res.TEXT)
  {
    document.getElementById('left_text').innerHTML = res.TEXT;
  }

  closeBox(document.getElementById('text_button'));

  return false;
} // resultatText(php, param)

/**
 * Récupère les données du formulaire d’image
 * @param string php programme de modification
 * 
 * @return none
 */
function resultatImg(php)
{
  var file = document.getElementById('img_edit').files[0];
  if(!file)
  {
    closeBox(document.getElementById('img_button'));
    return false;
  }

  // Utilisation de FormData d’XMLHttpRequest2 pour l’upload en AJaX
  var fd = new FormData();
  fd.append('EX', 'update_img');
  fd.append('NUMPAGE', document.getElementById('img_numpage').value);
  fd.append('IMAGE', file);

  // Création d’un élément XHR par POST
  var xhr = getXhr();
  xhr.open('POST', php, true);

  // Récupération au chargement
  xhr.onload = function() {
    if (this.status == 200) {
      // Réponse en JSON
      var resp = JSON.parse(this.response);

      // Modification de l’image existante par forçage du rechargement du cache
      var now = new Date();
      document.getElementById('presentation').src = '../Img/page'+resp.NUMPAGE+resp.EXT+'?'+now.getTime();
      document.getElementById('img_current').src = '../Img/page'+resp.NUMPAGE+resp.EXT+'?'+now.getTime();
    };
  };

  // Envoi final
  xhr.send(fd);

  closeBox(document.getElementById('img_button'));

  return false;
} // resultatImg(php)
