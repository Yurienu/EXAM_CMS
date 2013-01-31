/**
 * Fichier Javascript appelant tous les autres fichiers
 * @author Julien Papasian, Vincent Kocupyr
 * @version 11.1
 * @package CMS
 * 
 */
var src = new Array();
var i = 0;

src[i++] = '../Js/page.js';
src[i++] = '../Js/form.js';
src[i++] = '../Js/logo.js';
src[i++] = '../Js/login.js';
src[i++] = '../Js/ajax.js';
src[i++] = '../Js/init.js';

for(var j = 0; j < i; ++j)
{
  document.write('<script src="' + src[j] + '"></script>');
}
