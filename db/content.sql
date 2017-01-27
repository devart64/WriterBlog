insert into t_article values
(1, 'Préface:', "Pendant longtemps j'ai publié sur papier, mais je souhaite maintenant innover et j'ai donc choisit de publier mon nouveau roman en ligne. Je vous invite à suivre 'Billet simple pour l'Alaska' par épisodes sur mon super site!");
insert into t_article values
(2, "Premier chapitre: Petit point sur l'Alaska...", "Alaska ! En voilà une destination atypique qui en fait rêver plus d'un ! Moi la première, avant ce voyage, cela me paraissait inaccessible. J'imaginais une terre gigantesque, trois pauvres routes, des glaciers, des animaux sauvages et du grand rien tout autour. Le total trip Into the Wild.

Lorsqu'on s'y intéresse d'un peu plus près, l'Alaska est en fait très diversifié et change beaucoup d'une région à une autre. Cela dit, peu importe où l'on se trouve sur cette grande terre, je pense que tout est fabuleux et enchanteur. Vous pouvez vous rendre au sud (dans le queue de la poêle), dans l'intérieur des terres (cf. le film Into the Wild au Denali National Park), sur la péninsule Kenai ou encore dans le grand nord.
Le plus simple, si vous venez de France, est de prendre un avion jusqu'à Anchorage, puis de louer une voiture ou un van (ex de loueur pas cher : Alamo.com)
N'ayez pas trop peur, il ne fait pas toujours si froid. Même si l'on compte 5 000 glaciers, 3 millions de lacs, 800 îles et je ne sais combien de cours d'eau, tout n'est pas non plus qu'un grand champ de glace ;-) L'Alaska fait 3 fois la taille de la France et les montagnes sont gigantesques. Le point culminant est le Mont McKinley (6 194m). Et oui, tout ça nous remet à notre petite place...
Bref, si vous êtes amoureux des merveilles naturelles et des graaaaaands espaces, bienvenue à bord !

*
Nous sommes le 21 mars 2014, je suis avec trois amies au Yukon (à Whitehorse) et nous partons découvrir le sud de l'Alaska, avec une voiture que ma famille d'accueil m'a prêtée (merci les Yukonnais) et une motivation inébranlable. En seulement 2 ou 3 heures de route, nous serons à Skagway, en Alaska !");
insert into t_article values
(3, 'Chapitre 2: Et si on allait voir les glaciers?', "Voilà le ponpon du voyage. J'avais toujours rêvé de m'approcher d'un glacier. Sachez qu'en réalité c'est encore plus intense que ce qu'on pense !

L'avantage de Juneau, c'est que certains glaciers sont accessibles à pied. Le plus connu et le plus touristique est sans aucun doute le Mendenhall glacier, situé à 19 km du centre ville (ou à quelques minutes de l'aéroport). Mais il y en a beaucoup d'autres , dont le Eagle glacier ou le Herbert glacier, accessibles après quelques heures de randonnées.

Si le cœur (et le portefeuille) vous en dit, vous pouvez également survoler les alentours de Juneau dans un petit avion ou naviguer pour aller voir le Glacier Bay National Park and Preserve non loin de Juneau. Les 16 glaciers du parc sont malheureusement célèbre pour leur record mondial de fonte rapide... Alors certes, c'est beau à photographier des énormes icebergs de 60m de hauteur qui se décrochent et plongent dans la baie mais c'est surtout très alarmant. Lorsqu'on sait les conséquences que ça a derrière, on réfléchit deux fois à sa petite croisière...

Pour notre part, nous sommes parties explorer avec nos pieds deux glaciers : le Mendenhall Glacier et l'Herbert Glacier. Allons voir ça de plus près...");

/* raw password is 'john' */
insert into t_user values
(1, 'JohnDoe', '$2y$13$F9v8pl5u5WMrCorP9MLyJeyIsOLj.0/xqKd/hqa5440kyeB7FQ8te', 'YcM=A$nsYzkyeDVjEUa7W9K', 'ROLE_USER');
/* raw password is 'jane' */
insert into t_user values
(2, 'JaneDoe', '$2y$13$qOvvtnceX.TjmiFn4c4vFe.hYlIVXHSPHfInEG21D99QZ6/LM70xa', 'dhMTBkzwDKxnD;4KNs,4ENy', 'ROLE_USER');

/* raw password is '@dm1n' */
insert into t_user values
(3, 'JeanForteroche', '$2y$13$A8MQM2ZNOi99EW.ML7srhOJsCaybSbexAj/0yXrJs4gQ/2BqMMW2K', 'EDDsl&fBCJB|a5XUtAlnQN8', 'ROLE_ADMIN');

insert into t_comment values
(1, 'Great! Keep up the good work.', 1, 1);
insert into t_comment values
(2, "Thank you, I'll try my best.", 1, 2);
