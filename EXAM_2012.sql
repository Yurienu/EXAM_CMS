-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 18 Janvier 2013 à 02:58
-- Version du serveur: 5.1.66-log
-- Version de PHP: 5.4.8--pl0-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `EXAM_2012`
--

-- --------------------------------------------------------

--
-- Structure de la table `EXAM_PAGE`
--

CREATE TABLE IF NOT EXISTS `EXAM_PAGE` (
  `P_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant et numéro de page',
  `P_NAME` varchar(50) NOT NULL COMMENT 'Nom de la page sur le bouton',
  `P_IMG` varchar(5) NOT NULL COMMENT 'Extension de l’image',
  `P_TEXT` text NOT NULL COMMENT 'Texte principal de la page (à gauche)',
  PRIMARY KEY (`P_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `EXAM_PAGE`
--

INSERT INTO `EXAM_PAGE` (`P_ID`, `P_NAME`, `P_IMG`, `P_TEXT`) VALUES
(1, 'Lorem', '.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc magna metus, blandit ut semper molestie, aliquet pretium velit. Proin a nisi sit amet lorem tristique elementum. Vivamus eget neque quis eros mollis consequat elementum eu est. Ut ullamcorper, magna non ultricies varius, nulla risus adipiscing ante, nec laoreet augue elit viverra tellus. Fusce vel libero et orci facilisis tempor. Ut ullamcorper semper rutrum. Mauris in augue felis. Etiam sit amet rhoncus arcu. Quisque fermentum vestibulum erat, non ornare diam tristique a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec nibh mi, interdum eu ornare ac, sodales ac arcu.</p>\n<p>Sed tortor lorem, laoreet blandit adipiscing id, commodo rhoncus velit. Quisque convallis arcu a velit tempor fringilla. Cras pharetra purus id nisl eleifend congue. Integer sagittis ipsum quis ligula pharetra eu convallis mauris adipiscing. Sed sapien quam, viverra pellentesque venenatis sed, pulvinar et velit. Nunc molestie varius quam ut luctus. Aenean et nisl sapien, nec convallis libero. In tortor purus, cursus at pharetra in, condimentum et nunc. Suspendisse potenti. Proin et eleifend purus. Nam leo nisi, placerat et vestibulum non, aliquet ut mauris. Sed ipsum velit, porttitor quis rhoncus nec, dapibus suscipit tortor. Etiam id enim velit, quis euismod massa. Etiam auctor pellentesque sapien cursus porta. Praesent ante magna, bibendum non placerat quis, faucibus sit amet ante.</p>\n<p>Nullam id orci nec quam gravida tincidunt. Nullam quis elit lacus. Aliquam consectetur quam eget leo ullamcorper ultricies. Sed rutrum, turpis non feugiat lobortis, neque nulla scelerisque mi, ac placerat turpis nunc sed justo. Morbi vel nisi augue, sit amet tincidunt nisl. Suspendisse ante neque, venenatis quis porta quis, sodales vel sem. Aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pretium suscipit sodales. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ornare, lorem sit amet eleifend dignissim, metus dui rutrum massa, eu cursus quam risus vel justo. In hac habitasse platea dictumst.</p>\n<p>Vivamus sit amet nisi augue. Donec sit amet felis ut massa dignissim malesuada. Ut nisl dolor, bibendum et ullamcorper vitae, adipiscing in mauris. Vestibulum eu ipsum in justo pretium cursus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur commodo consectetur elit, eu posuere nisl commodo ullamcorper. Phasellus ipsum sapien, vulputate tempus venenatis nec, laoreet vitae eros. Nam augue enim, egestas vel vestibulum vitae, porta consequat nisi. Donec luctus est consectetur purus auctor accumsan. In mi leo, cursus a molestie vel, varius in quam. Maecenas auctor nunc sed metus pulvinar malesuada. Sed non massa felis. Aliquam quis enim nulla.</p>\n<p>Nunc id nisl a ante vehicula placerat. Curabitur tristique tempor orci, ullamcorper tempus urna malesuada quis. Praesent eget lacus dolor. Donec eu lectus nulla, sed accumsan ipsum. Maecenas sed orci ligula, eu sagittis justo. Etiam sed scelerisque nibh. Vivamus eget libero lacus. Quisque ultricies justo id velit feugiat porttitor. Curabitur sollicitudin dignissim congue.</p>'),
(2, 'Trololo', '.png', '<p>Trololo is a video of the nationally-honored Russian singer Eduard Khil (AKA Edward Khill, Edward Hill) performing the Soviet-era pop song “I am Glad, ‘cause I’m Finally Returning Back Home” (Russian: Я очень рад, ведь я, наконец, возвращаюсь домой). The video is often used as a bait-and-switch prank, in similar vein to the practice of Rickrolling. YouTuber RealPapaPit uploaded a video clip titled “I am very glad, because I’m finally back home” on November 26th, 2009. The performer singing in the video was identified as Eduard Anatolyevich Khil, a Soviet-era vocalist once celebrated as the “Honored Artist of the USSR” in 1968 and “People’s Artist of the USSR” in 1974. As of May 29th, 2012, the video was renamed “Mr. Trololo original upload” and has received over 12 million views.</p>\n\n<p>Since the song is entirely composed of mouth music without any lyrics, and was obviously lip-synched, the video was perceived by many westerners as highly eccentric. The song is an example of the Vokaliz tradition, a style of singing similar to the pantomime and American scat singing of the 1920s. On December 20th, 2009, an isolated clip of the laughing section from the original video was uploaded by YouTuber KamoKatt. Within three years, the video accumulated over 6.6 million views.</p>\n\n<p>On January 27th, 2010, Redditor gn3xu5 submitted the video to the /r/WTF subreddit in a post titled “Trololololololololo”, which received over 580 up votes and 95 comments prior to being archived. On February 19th, the viral content site BuzzFeed published the video in a post titled “Lyrical Genius.” Two days later, The Huffington Post included the video in an article titled “Is This Weird Russian Guy the Best Lyricist of All Time? No.” On February 26th, the single serving site Trololololololololololo was launched, which featured an embed of the original video on autoplay.</p>\n\n<p>On March 4th, YouTuber RayWilliamJohnson featured the video in an episode of his web show Equals Three (shown above, left), in which he suggested the video should be “the next Rickroll.” On August 25th, YouTuber 24KaratGoldFish uploaded a time stretched version of the video titled “Trololo – 800% Hyper Extrended Mix” (shown above, right). On March 11th, 2010, YouTuber DileSoft uploaded a video of Khil watching several YouTube parody videos of the performance. On March 26th, Khil was interviewed by Radio Free Europe Radio Liberty, mentioning that he discovered his video’s Internet fame after hearing his grandson humming the song. Khil’s relatives have made him an official YouTube channel called saitEdHil</p>\n\n<p>On April 13th, 2010, YouTuber Murinskiy uploaded a video titled “Trololo man now”, featuring Khil performing the song on a snow-covered street (shown below, left). On December 22nd, 2011, the video was submitted to the /r/videos subreddit, accumulating over 10,800 up votes and 620 comments prior to being archived. On January 7th, 2012, YouTuber DavidSM123 submitted a video of Khil performing the song at a Russian variety show (shown below, right).</p>');

-- --------------------------------------------------------

--
-- Structure de la table `EXAM_SECTIONS`
--

CREATE TABLE IF NOT EXISTS `EXAM_SECTIONS` (
  `S_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique de la section',
  `P_ID` int(11) NOT NULL COMMENT 'Page sur laquelle la section s’affiche',
  `S_TITLE` varchar(50) NOT NULL COMMENT 'Titre de la section',
  `S_TEXT` text NOT NULL COMMENT 'Contenu de la section',
  PRIMARY KEY (`S_ID`),
  UNIQUE KEY `S_ID` (`S_ID`),
  KEY `P_ID` (`P_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `EXAM_SECTIONS`
--

INSERT INTO `EXAM_SECTIONS` (`S_ID`, `P_ID`, `S_TITLE`, `S_TEXT`) VALUES
(1, 1, 'Page1 Titre2', '<p>Vestibulum a leo sed justo elementum tristique nec sit amet massa. Morbi interdum, diam id egestas semper, eros turpis pretium quam, non iaculis sem ipsum non leo. Cras tincidunt risus non elit tempor cursus. Nulla facilisi. Aliquam et leo quis lorem tristique auctor. Sed nec sapien ac dui semper pulvinar. Aliquam ultricies eleifend est, quis congue justo rhoncus et. Nullam in nulla felis, eu fringilla felis. Vestibulum eu augue eros, non congue neque. Phasellus sed nisi sit amet purus eleifend congue.</p>'),
(2, 1, 'Page1 Titre 3', '<p>Ut in sollicitudin velit. Nullam eget felis turpis, ac elementum odio. Aliquam porttitor metus a enim tincidunt in vulputate metus gravida. Ut condimentum, nunc nec consectetur euismod, mi tellus commodo nisi, eu sodales nulla risus non nulla. Nullam id augue diam. Suspendisse mattis eros a mi interdum et vehicula tortor tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin convallis tincidunt metus, tincidunt egestas augue tempor vitae. Maecenas laoreet porttitor risus eget pretium. Vestibulum eu massa nunc, eu aliquet massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus pharetra bibendum rutrum. Donec massa ligula, laoreet eu tristique et, suscipit sed libero.</p>'),
(3, 2, 'Page2 Titre2', '<p>On May 28th, 2012, the world news site Radio Free Europe Radio Liberty reported that Eduard Khil had been hospitalized after suffering a stroke. The following day, the Russian entertainment news site RT published an article titled “Trololo man in critical health condition”, stating that Khil had suffered irreversible brain damage and was in a coma. The article went on to report that Khil may survive if he underwent immediate surgery, but doctors could not guarantee recovery. On June 4th, Khil died at a hospital in St. Petersburg, Russia, one week after suffering from the stroke.</p>'),
(4, 2, 'Page2 Titre3', '<p>The death was subsequently covered by various news sites including The Washington Post, Ria Novosti and The Huffington Post. The same day, a Reddit post titled “Eduard Khil (‘Trololo Guy’) dies in St. Petersburg, aged 77” reached the front page, accumulating over 18,000 up votes in 11 hours. Earlier versions of the song have been uploaded to YouTube as well, including performances Valery Obodzinsky (shown top, left), Koós János (shown top, right), Sovie-Azerbaijani singer Muslim Magomaev (shown bottom, left) and another by Eduard Khil (shown bottom, right).</p>');

-- --------------------------------------------------------

--
-- Structure de la table `EXAM_USERS`
--

CREATE TABLE IF NOT EXISTS `EXAM_USERS` (
  `U_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique de l’utilisateur',
  `U_LOGIN` varchar(6) NOT NULL COMMENT 'Identifiant utilisé par l’utilisateur pour se connecter',
  `U_PWD` varchar(50) NOT NULL COMMENT 'Mot de passe crypté de l’utilisateur',
  PRIMARY KEY (`U_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `EXAM_USERS`
--

INSERT INTO `EXAM_USERS` (`U_ID`, `U_LOGIN`, `U_PWD`) VALUES
(1, 'papjul', 'b00e2fae817fa707140873bd32f3f012199b5c4c'),
(2, 'kocvin', '356cafa7894bc3dba26ae5b08ac0d0b8d4b24b33'),
(3, 'cbon', 'a9a92f06ccd6b81542f50a2e2f73c12b7e538a8d');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
