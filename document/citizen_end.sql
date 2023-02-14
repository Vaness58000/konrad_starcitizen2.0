-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : starcitizen_mariadb:3306
-- Généré le : mar. 14 fév. 2023 à 12:18
-- Version du serveur : 10.4.18-MariaDB-1:10.4.18+maria~focal-log
-- Version de PHP : 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `citizen`
--

-- --------------------------------------------------------

--
-- Structure de la table `arm_fps`
--

CREATE TABLE `arm_fps` (
  `id` int(10) NOT NULL,
  `poids` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `perte` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_arm` int(10) NOT NULL,
  `id_cat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `arm_fps`
--

INSERT INTO `arm_fps` (`id`, `poids`, `perte`, `id_arm`, `id_cat`) VALUES
(1, '', '', 1, 1),
(2, '', '', 2, 1),
(3, '', '', 3, 1),
(4, '', '', 4, 1),
(5, '', '', 5, 2),
(6, '', '', 6, 2),
(7, '', '', 7, 2),
(8, '', '', 8, 3),
(9, '', '', 9, 3),
(10, '', '', 10, 3),
(11, '', '', 11, 3),
(12, '', '', 12, 4);

-- --------------------------------------------------------

--
-- Structure de la table `arm_lieu`
--

CREATE TABLE `arm_lieu` (
  `id` int(10) NOT NULL,
  `id_lieu` int(10) NOT NULL,
  `id_arm` int(10) NOT NULL,
  `prix` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `arm_vaiss`
--

CREATE TABLE `arm_vaiss` (
  `id` int(10) NOT NULL,
  `id_arm` int(10) NOT NULL,
  `id_taille` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `titre` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `contenu` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_categorie_article` int(10) NOT NULL,
  `validation` tinyint(1) NOT NULL DEFAULT 0,
  `resume` text COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `id_user`, `titre`, `date`, `contenu`, `video`, `id_categorie_article`, `validation`, `resume`) VALUES
(1, 2, 'Alpha 3.18 : vers plus de persistance dans Star Citizen', '2023-02-04 13:55:18', 'On le sait, Star Citizen est toujours officiellement en alpha après des années de développement, mais le jeu fait néanmoins régulièrement l’objet de mises à jour de sorte que la version actuellement jouable tende à s’approcher petit à petit de la promesse initiale du projet. Après avoir déployé sa mise à jour 3.17.5 la semaine dernière, les équipes du studio CIG s\'attellent à la prochaine mise à jour majeure 3.18 de Star Citizen. Et elle se classe sans doute parmi les étapes significatives du titre dans la mesure où elle devrait ajouter un peu plus de persistance dans l’univers de jeu – parmi plusieurs autres fonctionnalités et divers ajouts de contenu dans l’univers de jeu.\n\nAlpha 3.18 : des objets persistants dans l\'univers de jeu\n\nConcrètement, le patch 3.18 doit notamment être marqué par l’intégration de la technologie dite de Persistent Entity Streaming dont l’objectif est de rendre réellement persistant chaque objet dynamique de l’univers de jeu, sur l’ensemble des serveurs. Jusqu’à présent, les joueurs de Star Citizen accédaient à l’univers de jeu en se connectant à des shards (des serveurs) tous plus ou moins identiques, sollicités en fonction de la charge de chacun des serveurs. Avec le déploiement de la version 3.18 du jeu, ces shards seront associés à des bases de données d’objets spécifiques, qui auront vocation à enregistrer la liste, la localisation et l’état de chaque objet du serveur. En d’autres termes, si un objet est abandonné dans l’univers de jeu, il y conservera (théoriquement) sa place indéfiniment et quand un joueur se reconnectera dans le jeu, il retrouvera l’univers de jeu tel qu’il l’avait laissé – à moins que d’autres joueurs l’aient modifié entre temps.\n\nCe système ne remet pas en cause le système de shards (ils permettent toujours de répartir la charge notamment en fonction du nombre de joueurs connectés), mais l’ajout de bases de données d’objets externalisées doit permettre de conserver durablement lesdits objets dans l’univers de jeu indépendamment des shards afin d’y ajouter une dose de persistance.\n\nEvidemment, pour éviter que les serveurs ne croulent sous les objets ou que des joueurs mal intentionnés ne les utilisent à des fins malveillantes, le système fera progressivement disparaitre les objets surnuméraires dans les zones surchargées. Pour autant, un objet unique placé dans une zone peu fréquentée a vocation à rester à sa place indéfiniment ou presque, tant qu’un joueur n’en aura pas décidé autrement. \n\nComme souvent avec Star Citizen, les mises à jour progressent lentement et le déploiement de la version 3.18 n’est pas prévu pour tout de suite, mais le développeur s’est fixé jusqu’à fin avril prochain pour déployer le patch sur les serveurs live de Star Citizen.\n\n', '', 1, 1, 'La mise à jour 3.18 de Star Citizen devrait être significative dans la mesure où elle doit déployer une technologie permettant une vraie persistance des objets dynamiques dans l\'univers de jeu. '),
(2, 2, 'Inside Star Citizen : In the Arena', '2023-02-04 13:05:36', 'Arena Commander est un mode de jeu séparé de l\'univers persistant de Star Citizen. Il permet d\'essayer des vaisseaux, de combattre en PvP, de faire la course, etc, sans les inconvénients du jeu principal. Cependant, il a été laissé de côté au profit de Star Citizen et Squadron42 ces dernières années, et le code ainsi que le gameplay et les visuels sont datés. Récemment, CIG a créé une équipe dédiée à Arena Commander, afin d\'utiliser tout le potentiel qu\'un mode spéparé peut offrir.\n\nLes buts recherchés sont les suivants : Refondre tout le lobby ainsi que l\'UI pour que le joueur puisse facilement accéder à style de jeu qu\'il vise.\r\nAjouter de nouveaux modes de jeu et de nouvelles fonctionnalités\r\nGénéralement redonner un attrait à ce module\r\nPermettre de s\'entraîner au combat, à la course, au combat FPS sans risquer la mort permanente (Death of the Spaceman).\n\nLe code général d\'Arena Commander est daté, et l\'interface est toujours sous Flash. Le premier travail consiste à mettre à jour ce code, et passer l\'UI en Building Block. Un tel travail est nécessaire si les développeurs veulent pouvoir rapidement implémenter les modes de jeu et gameplays les plus récents.\n\nCe travail permettra le retour des matchs privés.\r\n\r\nDe nouveaux outils sont créés pour permettre aux designers de travailler plus facilement pour AC.\r\n\r\nA l\'avenir, Arena Commander bénéficiera de notes de patch dédiées pour permettre au joueurs de s\'en référer plus facilement aux avancées sur ce point.\n\nComme mentionné ci-dessus, la priorité est de rendre l\'interface plus lisible et cohérente par rapport aux standards actuels.\r\n\r\nDe nombreuses corrections de bug et mises à jour des visuels sont en cours. La luminosité de la carte \"Dying Star\" a été revue par exemple.\r\n\r\nEnsuite viendra une refonte de tout le gameplay de course dans Arena Commander.\n\nDe nombreux lieux de l\'univers persistant seront accessibles depuis Arena commander. Cela comprend les circuits arrivant avec la 3.18, mais aussi la station Jericho de l\'évènement Xenothreat pour le combat de vaisseaux. Les développeurs assurent que cette tâche n\'est pas particulièrement difficile, et espèrent normaliser ce processus à l\'avenir.\n\nLe mode de course sera mis à jour et plus cohérent. Les 3 circuits actuels seront désormais en conditions réelles, c\'est à dire en atmosphère avec une réelle planète en dessous, et donc sa gravité.', '', 1, 1, 'Le module de jeu de l\'Arena Commander est ce qui a permis de piloter les vaisseaux de Star Citizen pour la première fois de l\'histoire du jeu. Cependant, il n\'a jamais vraiment été mis à jour depuis cette époque. Une équipe dédiée à récemment été créée pour remédier à ce problème.'),
(3, 2, 'Star Citizen Monthly Report : rapport mensuel de janvier 2023', '2023-02-04 13:14:33', 'Les rapports mensuels de Star Citizen permettent aux développeurs de Cloud Imperium Games d’expliquer le travail réalisé sur le mois écoulé. Cela permet aux backers et aux autres personnes qui suivent le projet de se tenir informé, de voir les priorités et d’avoir une vue d’ensemble du développement.\n\nLes personnages non joueurs sont désormais capables de lancer des grenades. Cette fonctionnalité nécessite de trouver le bon équilibre pour ne pas saturer le joueur, de prendre en compte la trajectoire, et de mettre en place des animations crédibles.\r\n\r\nLes développeurs ont implémenté les concepts de zones à attaquer et de zones à défendre par des personnages non joueurs. Ces derniers se prépareront au combat en s’équipant, en se positionnant, et en étant dans une posture d’alerte. Les défenseurs auront tendance à utiliser le couvert dans la zone, tandis que les attaquants chercheront à ratisser les lieux pour débusquer les premiers.\n\nL’équipe progresse sur la première itération de conduite de véhicules terrestres et sur l’utilisation des transports en commun par des personnages non joueurs.\r\n\r\nDes animations d’arrêt en souplesse (soft stop) sont en préparation. Contrairement aux arrêts nets (harsh stop), les arrêts en souplesse permettent au personnage non joueur de dépasser la cible.\r\n\r\nL’outil Apollo de Subsumption a été enrichi suite aux retours des développeurs.\n\nL’outil « Usable Coordinator » est réalisé. Il permet d’associer des objets interactifs préférentiels pour les personnages non joueurs.\r\n\r\nLa technologie de perception sonore et visuelle, permettant aux personnages non joueurs de détecter des menaces et de réagir aux véhicules hostiles a été améliorée.\r\n\r\nUne technologie est en train d’être développée pour permettre aux personnages non joueurs de se déplacer dans des lieux exigus, par exemple sous le plancher ou dans des gaines de ventilations.\r\nLes développeurs implémentent la possibilité de rendre les personnages non joueurs plus réticents à passer à travers certains lieux, comme un massif de fleurs ou une pièce en feu.\n\nL’équipe s’est concentrée sur l’amélioration du combat spatial contre des vaisseaux non joueurs, avec comme objectif de le rendre plus dynamique. Il s’agit notamment d’allouer les manœuvres possibles aux différents types d’adversaires.\r\n\r\nLes développeurs cherchent également à améliorer le combat en atmosphère, en utilisant le potentiel des surfaces aérodynamiques, et en cherchant des comportements plus proches des avions lorsque c’est approprié.\n\n\n\n', '', 1, 1, 'Les équipes de développement de Star Citizen sont de retour après les vacances de fin d’année. En janvier, leur effort s’est principalement porté sur le patch 3.18, mais de nouvelles missions sont également en préparation.');

-- --------------------------------------------------------

--
-- Structure de la table `articles_image`
--

CREATE TABLE `articles_image` (
  `id` int(10) NOT NULL,
  `name` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_article` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `articles_image`
--

INSERT INTO `articles_image` (`id`, `name`, `src`, `alt`, `id_article`) VALUES
(1, 'gallerie.jpg', 'gallerie.jpg', 'gallerie.jpg', 1),
(2, 'actus2.jpg', 'actus2.jpg', 'actus2.jpg', 1),
(3, 'actus3.jpg', 'actus3.jpg', 'actus3.jpg', 2),
(4, 'actus4.jpg', 'actus4.jpg', 'actus4.jpg', 2),
(5, 'Gallerie6.jpg', 'Gallerie6.jpg', 'Gallerie6.jpg', 3),
(6, 'actus6.jpg', 'actus6.jpg', 'actus6.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `avatar`
--

CREATE TABLE `avatar` (
  `id_avatar` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories_articles`
--

CREATE TABLE `categories_articles` (
  `id_categorie_article` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categories_articles`
--

INSERT INTO `categories_articles` (`id_categorie_article`, `nom`) VALUES
(1, 'article');

-- --------------------------------------------------------

--
-- Structure de la table `categories_especes`
--

CREATE TABLE `categories_especes` (
  `id_categ_espece` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `validation` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories_lieux`
--

CREATE TABLE `categories_lieux` (
  `id_categ_lieu` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categories_lieux`
--

INSERT INTO `categories_lieux` (`id_categ_lieu`, `nom`) VALUES
(3, 'Bestiaire'),
(7, 'Lieux insolites'),
(4, 'Lunes'),
(1, 'Planètes'),
(6, 'Stations spatiales'),
(2, 'Systèmes'),
(5, 'Villes');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_arm_fps`
--

CREATE TABLE `categorie_arm_fps` (
  `id_categ_arme` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `validation` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categorie_arm_fps`
--

INSERT INTO `categorie_arm_fps` (`id_categ_arme`, `nom`, `validation`) VALUES
(1, 'pistolet', 1),
(2, 'mitrailleur', 1),
(3, 'fusil', 1),
(4, 'sniper', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_matiere_premier`
--

CREATE TABLE `categorie_matiere_premier` (
  `id` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `validation` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_transport`
--

CREATE TABLE `categorie_transport` (
  `id_transport` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `validation` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categorie_transport`
--

INSERT INTO `categorie_transport` (`id_transport`, `nom`, `validation`) VALUES
(1, 'vaisseau', 1),
(2, 'vehicule', 1);

-- --------------------------------------------------------

--
-- Structure de la table `constructeur`
--

CREATE TABLE `constructeur` (
  `id_constructeur` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contenu` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `constructeur`
--

INSERT INTO `constructeur` (`id_constructeur`, `nom`, `logo`, `image`, `contenu`, `id_user`) VALUES
(1, 'Aegis Dynamics', 'constructeur.png', 'AEGS_Vulcan_Promo_Refuel_PJ01-1.jpg', 'Aegis Dynamics (AEGIS) est un fabricant de vaisseaux sur Star Citizen. Spécialisé dans les vaisseaux de combat de grande taille, basée à Jata sur la planète Cestulus dans le système Davien. <br><br>Aegis a longtemps fabriqué des vaisseaux pour le compte du pouvoir en place et lorsque le pouvoir a changé, Aegis a continué de produire pour ceux qui étaient à la tête de l\'Humanité.\n\nAegis Dynamics résulte d\'une fusion entre Aegis Macrocomputing (une entreprise basée sur Terre) et Davien Dynamic Production Systems (basée à Jata sur la planète Cestulus dans le système Davien).\r\nOriginellement cette fusion avait pour but de créer un vaisseau spatial.\n\nLa firme devint le principal producteur de vaisseaux de guerre de l\'armée de l\'UEE lors de la Première Guerre Tevarin et après la prise du pouvoir par Ivar Messer en 2546 Aegis obtint le monopole de fabrication des vaisseaux des armées du Régime Messer.\n\nLors de la chute du dernier Empereur \"Linton Messer XI\", la frime perdit la quasi totalité des ses contrats et frôla la banqueroute. Pour pallier à cela Aegis changea son fusil d\'épaule et transforma ses modèles de vaisseaux de combats en vaisseaux civils.\n\n\n\n\n\n', 2),
(2, 'Anvil Aerospace', 'constructeur2.png', 'anvil.jpg', 'Anvil Aerospace (ANVL) est un fabricant de vaisseaux sur Star Citizen. Très réputé dans les domaines que sont les petits vaisseaux de type chasseur et les grands vaisseaux d\'exploration, la firme est basée sur Terra et a une sphère d\'influence aussi grande que celle de l\'UEE.\n\nEn 2772, Anvil Skunkworks est fondée par J. Harris Arnold dans un quartier de la Nouvelle-Kiev sur Terra. Très vite, l\'entreprise obtient des contrats avec la Navy de l\'UEE et devient rapidement réputée pour la robustesse de son matériel.\n\nC\'est pendant près de deux siècles qu\'Anvil Skunkworks, renommé Anvil Aerospace par la suite, va approvisionner sans discontinuer les soldats de la Navy. Que ce soit en composants, en munitions ou en petits vaisseaux, Anvil fournit de grandes quantités de fournitures toujours plus variées à l\'UEE.\n\nImplantant ses usines et centres de redistribution aux quatre coins des systèmes de l\'UEE, la firme atteint vite un niveau de renom élevé et ce, dans un grand nombre de systèmes même au-delà des frontières de l\'UEE. Anvil commence alors à fabriquer des vaisseaux conçus dans un but civil, soit en modifiant un concept déjà fabriqué pour la Navy, soit en créant de nouveaux à partir de rien.\n\n\n\n\n\n', 2),
(3, 'Aopoa', 'constructeur3.png', 'aopoa.jpg', 'Le fabricant Xi\'an AopoA propose des vaisseaux bien différents des modèles produits par les humains dans Star Citizen. Découvrez comment ce constructeur a réussi à s\'implanter, non sans difficultés.\n\nIl n\'y a pas si longtemps le constructeur Xi\'an AopoA (prononcé /uh-POE-uh/) et ses vaisseaux n’étaient pas autant les bienvenus dans l’espace humain. Guerre froide, partenariat avec MISC et volonté de l\'Empereur Kray sont des points de l\'histoire de ce constructeur qui en font ce qu\'il est aujourd\'hui dans l\'univers de Star Citizen.\n\nAu plus fort de la guerre froide, les Xi’An et l’UEE maintenaient un délicat statu quo le long de la ligne Perry, les deux espèces envoyaient des petits vaisseaux éclaireurs en missions de reconnaissance le long de la ligne pour récolter des informations de manière clandestine.\n\nCe fut lors de ces incursions secrètes que les pilotes de l’UEE rencontrèrent pour la première fois le vaisseau qu’ils finiront par baptiser \"Quark\" (Qhire Khartu chez les Xi\'an). Malgré de nombreuses rencontres, le Quark resta insaisissable jusqu’en 2896, quand un escadron de reconnaissance de la Navy eut la chance d’en découvrir une épave sans pilote.\n\nEmmené dans une base militaire secrète de recherche, les scientifiques étaient impressionnés par ses ailes aux articulations complexes et ses propulseurs de manœuvre à double-vecteurs, ils s\'évertuèrent à la rétro-conception des technologies avancées trouvées à bord. Une marque sur la coque du vaisseau ne leur était pas inconnue, elle était identique à celle trouvée sur un bombardier Xi\'an Volper, fabriqué par AopoA\n\n\n\n', 2),
(4, 'Argo Astronautics', 'constructeur4.png', 'argo.jpg', 'Souvent mal connu, Argo Astronautics est pourtant un des constructeurs qui a eu le plus d\'impact dans l\'industrie de Star Citizen. En sept siècles d’existence, Argo est devenu une institution.\n\nTout a commencé avec un train. Argo Astronautics est une très vieille entreprise dont l\'ascension impose le respect : elle s\'est lancée avec des réparations sur des lignes de trains pour finir par construire les navettes que nous connaissons dans Star Citizen.\n\nEn 2243, après près d\'un siècle de transport de personnes et de marchandises à travers les étendues de l\'Amérique du Nord et de l\'Amérique du Sud, la ligne ferroviaire complexe et vieillissante Trans-America Maglev a désespérément besoin d\'une révision.\n\nAlors que les transports suborbitaux gagnent des parts de marché, tous les yeux sont tournés vers la nouvelle communauté grandissante de Mars. Les nouveaux moteurs quantiques de RSI suscitent de plus en plus d’intérêt et tout les budgets sont consacrés a notre installation dans le système solaire, laissant peu d\'espoir pour la ligne de chemin de fer.\n\nAlana Redmond a grandi avec sa mère, chef de quart, sur la ligne Trans-Am. C\'est sans surprise qu’après avoir fini ses études Alana commence à travailler dans la même entreprise, comme assistante ingénieur. Les pannes sont régulières et obligent le train à des arrêts répétés. C\'est lors de la réparation d\'une bobine de lévitation qu\'Alana remarqua un morceau de ferraille qui avait été tordu par les forces magnétiques. Elle émet alors l\'hypothèse qu\'elle peux utiliser les forces générées par le train pour compléter le processus de réparation.\n\n\n\n', 2),
(5, 'Consolidated Outland', 'constructeur5.png', 'conso.jpg', 'Consolidated Outland, le fabricant du célèbre Mustang et de ses variantes, est sûrement la marque de vaisseaux la plus récemment créée dans l\'Univers de Star Citizen. L\'intégralité de la firme est possédée par un jeune multi-milliardaire issu de la planète Bremen.\n\nConsolidated Outland (CNOU), souvent abrégé C.O, est un fabricant de vaisseaux sur Star Citizen basé à Stalford sur Bremen. Bien qu\'il soit moins important que des firmes comme RSI ou Aegis, cela ne l\'empêche pas de faire des bénéfices très conséquents.\n\nConsolidated Outland est intégralement détenue par Silas Koerner, un jeune multi-milliardaire. Ce fan d’aérospatiale a créé C.O non pas pour se rendre riche, mais bien car il a estimé pouvoir fabriquer des vaisseaux de meilleure facture que ceux actuellement dans le commerce.\n\nSilas a créé C.O en s\'appuyant sur la fortune familiale notamment acquise par son ancêtre chargé d\'organiser la colonisation de la planète Bremen. Dès l\'âge de 16 ans, il investit dans tout un tas de petites entreprises en apparence insignifiantes et sans avenir. Pourtant chacune de ces entreprises prit de l\'importance, rapportant des sommes colossales au jeune Koerner.\n\nConsolidated Outland voit le jour aux abords du 20ème anniversaire de Silas Koerner. Il est depuis longtemps passionné par les courses spatiales, mais ne trouve pas son bonheur parmi les vaisseaux existants. Il conçoit donc le premier prototype du Mustang et utilise ses fonds personnels pour en fabriquer un exemplaire. Satisfait de sa création, il fonde Consolidated Outland pour mettre sur le marché ce qu\'il considère comme le vaisseau de course parfait.\n\n\n\n', 2),
(6, 'Crusader Industries', 'constructeur6.png', 'crusader.jpg', 'Crusader Industries est un fabricant de vaisseaux de transport. Cette firme est également connue pour posséder sa propre planète dans le système Stanton. Réputés pour leur fiabilité à toute épreuve, les vaisseaux de transport de Crusader Industries servent aussi bien l\'armée que les particuliers.\n\nCrusader Industries (CRSD) est un fabricant de vaisseaux dans Star Citizen basé à Orison sur la planète Crusader du système Stanton. La firme est spécialisée dans les vaisseaux de transport de toutes tailles et pour toutes les bourses. Cette large gamme lui a permis d\'acquérir un certain renom dans beaucoup de domaines.\n\nL\'histoire de Crusader Industries n\'est pas très claire et il est très difficile d\'avoir des informations sur le parcours de cette marque. On peut estimer que sa fondation a eu lieu lors du XXVème ou XXVIème siècle car il semblerait que Crusader Industries existât avant la dynastie des Messer.\n\nIl est certain que lors de la mise en vente des planètes du système Stanton, Crusader Industries avait déjà en sa possession une fortune suffisante pour pouvoir acheter Stanton II.\n\nAprès cet achat, la firme délocalisa presque toutes ses usines de production sur la planète nouvellement acquise ainsi que ses quartiers généraux. Elle fit fabriquer la ville d\'Orison afin d\'accueillir ses ouvriers et ingénieurs en charge de la production de vaisseaux ainsi que leurs familles.\n\n\n\n', 2),
(7, 'Drake Interplanetary', 'constructeur7.png', 'drake.jpg', 'Le fabricant de vaisseaux de Star Citizen, Drake Interplanetary, a pour réputation de vendre ses produits à tous ceux qui veulent les acheter qu\'ils soient des honnêtes citoyens de l\'UEE ou des pirates sans foi ni loi. Cette politique lui vaut souvent d\'être mal vu par certaines personnes.\n\nDrake Interplanetary (DRAK) est un fabricant de vaisseaux et de véhicules antigrav sur Star Citizen. Ces vaisseaux peuvent être utilisés de façon très diverse, mais sont tous conçus avec un but précis : être peu coûteux. C\'est à Odyssa sur Borea dans le système Magnus que la firme a établi son siège social il y a de ça environ un siècle.\n\nEn 2845, l\'UEE lance le projet \"Volksfighter\" afin de trouver un vaisseau constructible à la chaîne pour un faible coût. Ce vaisseau devait être capable de défendre les frontières de l\'UEE désormais trop éloignées pour que la sécurité puisse être garantie par l\'armée. En réponse à ce projet, Jan Dredge propose le prototype du premier Cutlass, un vaisseau révolutionnaire alliant résistance, force de frappe et capacité de transport pour un coût ridiculement faible.\n\nMalheureusement, le Cutlass perd face au Wildcat qui tombera dans l\'oubli peu de temps après la mise en place du projet. Mais pour Jan Dredge, cet échec ne doit pas se solder par une perte de temps. Il décide donc, avec une demi-douzaine de ses associés, de fonder Drake Interplanetary afin de commercialiser une version civile du Cutlass originel.\n\nProfitant de l\'instabilité économique régnant dans le système Magnus, Drake installe ses premières usines dans la ville d\'Odyssa et commence la production du Cutlass. Le succès est immédiat. En moins de 5 ans la firme rentre au panthéon des plus grand fabricants de vaisseaux de l\'Histoire. Dans le même temps, Drake s\'établit sur de nouvelles planètes créant des usines et des sites de reventes dans presque tous les systèmes de l\'UEE.\n\n\n\n', 2),
(8, 'Esperia Incorporation', 'constructeur8.png', 'esperia.jpg', 'Esperia Incorporation est un fabricant de vaisseaux issus des technologies aliens. Leurs vaisseaux sont réputés pour être très proches de modèles de vaisseaux utilisés par certaines espèces aliens comme les Tevarins ou les Vanduuls.\n\nEsperia Incorporation (ESPR) est un fabricant de vaisseaux dans Star Citizen basé à Kutaram sur Terra. Cette entreprise est spécialisée dans la fabrication de vaisseaux utilisant de la technologie alien. Certaines de leurs créations sont d\'ailleurs directement inspirées par des vaisseaux utilisés par d\'autres espèces intelligentes.\n\nEsperia Incorporation est une entreprise relativement récente puisque sa fondation ne date que de 2873. On doit sa création à deux frères passionnés par les vols spatiaux, Jovi et Theo lngstrom. Cette fratrie a grandi exclusivement sur Terra et ils ont vu passer un grand nombre de projets de vaisseaux en tous genres. Mais parmi tous les projets qui voyaient le jour, seul un petit nombre d\'entre eux était produit par les grandes firmes de l\'aérospatiale.\n\nDe là, se développa chez les deux frères une frustration de ne pas voir voler ces vaisseaux si prometteurs sur le papier. Ils créèrent donc Esperia dans le but de racheter les projets classés sans suite par les grosses entreprises afin de les conserver. Ils proposaient à des collectionneurs privés de lancer des productions à petite échelle de ces vaisseaux.\n\nPetit à petit, Esperia gagna en importance et les frères Ingstorm décidèrent de lancer leur propre production pour vendre leurs vaisseaux conceptuels au grand public. Pour augmenter l\'originalité de leurs créations, ils ajoutèrent certaines technologies aliens sur les vaisseaux. Les ingénieurs d\'Esperia devinrent vite les plus qualifiés dans l\'adaptation technologies aliens aux vaisseaux humains.\n\n\n\n', 2),
(9, 'Kruger Intergalactic', 'constructeur9.png', 'kruger.jpg', 'Il existe dans Star Citizen une entreprise connue et respectée dans tout l\'Empire pour la qualité de son travail : Kruger Intergalactic. Une devise \"La perfection dans chaque pièce\".\n\nKruger Intergalactic est une entreprise de l\'univers Star Citizen qui est partie de presque rien pour finalement devenir l\'un des principaux fournisseur de pièces détachées de l\'empire et même un fabricant d\'armes et de vaisseaux à part entière.\n\nEn 2558, Ozell Kruger ouvrit un atelier sur sa planète natale, à Borea, dans le système Magnus et appela la société Kruger Intergalactic. La capacité de son entreprise à livrer des produits de première qualité dans les délais et les budgets impartis a rapidement impressionné les clients. Malgré tout, c\'est la chance d\'Ozell d\'avoir ouvert son entreprise pendant le boom de Borea qui l\'a vraiment aidée à prospérer.\n\nAvec l\'expansion des infrastructures de la Marine dans le système, l\'UPE a investi\r\nmassivement sur la planète, pendant un certain temps, elle a été un centre militaire majeur\r\navec de nombreux chantiers navales.\n\nC\'est au cours de cette période que Kruger a commencé sa relation de longue date\r\navec Behring et RSI.\n\n\n\n', 2),
(10, 'MISC', 'constructeur10.png', 'misc.jpg', 'Musashi Industrial and Starflight Concern est le concepteur des plus gros vaisseaux de transport de l\'UEE avec la célèbre gamme des Hull. Il est également le seul armateur humain à avoir un partenariat avec les Xi\'An ce qui permet à MISC de bénéficier de la technologie extra-terrestre.\n\nMusashi Industrial and Starflight Concern, plus couramment appelé MISC, est un fabricant de vaisseaux sur Star Citizen. Spécialisé dans les vaisseaux de transport de toutes les tailles, la firme est loin de n\'avoir que cette corde à son arc. Les bureaux de MISC siègent sur Saisei dans le système Centauri situé à proximité du territoire Vanduul.\n\nMISC provient de la fusion entre deux sociétés : Hato Electronics Corporation et Musashi Lifestyle Design Unit en 2805. Cette fusion est mutuellement bénéfique, car elle permet l\'utilisation optimale des industries de Hato et la mise en avant des concepts de Musashi.\n\nLe succès initial de MISC vient de son premier produit : le MISC-HI (HI pour Heavy Industrial). Ce vaisseau, aujourd\'hui disparu, est l\'ancêtre des Hull que nous connaissons actuellement. À sa sortie, le HI fait un carton autant chez les militaires que chez les civils, mais également à la surprise générale, chez les Xi\'An.\n\nC\'est la première fois dans l\'Histoire de l\'Humanité, que des échanges commerciaux ont lieu avec les Xi\'An. Jusqu\'à présent, cette civilisation avait toujours été réticente à commercer avec les Humains, préférant rester entre eux.\n\n\n\n', 2),
(11, 'Origin Jumpworks GmbH', 'constructeur11.png', 'origin.png', 'La société de construction spatiale Origin Jumpworks GmbH est célèbre pour ses vaisseaux raffinés et puissants, mais aussi pour leurs prix exorbitants. Aussi luxueux que redoutables les vaisseaux Origin sont de très haute qualité et d\'aucun dirait qu\'ils méritent leur prix.\n\nOrigin Jumpworks GmbH est un important armateur spatial sur Star Citizen. Spécialisé dans le luxueux et le haut de gamme, leurs vaisseaux peuvent tout aussi bien servir de chasseurs pour les plus petits, ou de vaisseaux de croisières pour les plus gros, le tout sans jamais négliger l\'aspect esthétique.\n\nC\'est lors de l\'âge d\'or économique du \"Glowing Age\" qui a fait suite à la course à l\'anti-matière, que l\'entreprise Allemande Origin Jumpworks GmbH est sortie du lot. Fondée quelques années auparavant à Cologne, l\'entreprise s\'est démarquée en fabricant des réacteurs à fusion de très bonne facture devenant même fournisseurs des fameuses RSI et Aegis Dynamics.\n\nPeu de temps après avoir décroché ces contrats, Origin se lança dans la production de petits vaisseaux afin d\'élargir ses horizons de ventes.Il résulte de ce projet les gammes 200 et 300 en qui sortent en 2899. Le succès de ces vaisseaux propulsa Origin sur la deuxième marche du marché spatial.\n\nPendant longtemps, Origin est restée sur Terre, soucieuse de proposer à ses clients fortunés des composant conçus et fabriqués dans le système Solaire. Mais en 2913 la Présidente Jennifer Friskers décida de délocaliser le siège social sur Terra, la nouvelle capitale culturelle de l\'UEE. Cette décision fût accueillie avec véhémence par beaucoup d’officiels de la firme car cette relocalisation entraîna une grande migration de beaucoup d\'usines et de bureaux.\n\n\n\n', 2),
(12, 'Roberts Space Industries', 'constructeur12.png', 'robert.jpg', 'Le constructeur et la société d\'aérospatiale Roberts Space Industries notamment célèbre pour produire la gamme des Constellations et des Aurora ne se limite pas qu\'à ces deux vaisseaux iconiques de Star Citizen. En effet RSI dispose d\'une importante diversité de vaisseaux civils.\n\nRoberts Space Industries (RSI) est un des principaux constructeurs sur Star Citizen. Vaisseaux, véhicules terrestres, combinaisons ; RSI est présent dans de nombreux domaines. Dans l\'histoire du jeu, RSI est aussi présent depuis la genèse de l\'exploration spatiale. Focus historique et présentations de vaisseaux.\n\nCréée en 2038 par Chris Roberts, Roberts Space Industries est une multinationale humaine qui a d\'abord commencé en fabriquant et en concevant des équipements énergétiques. Au fur et à mesure, l\'entreprise se met à s’atteler à des programmes spatiaux et cherche à trouver un moyen de rendre le voyage spatial plus simple et abordable. C\'est en 2075 après 14 années de recherche que RSI sort le premier prototype de Moteur Quantique et c\'est alors une réelle révolution de l\'industrie aérospatiale.\n\nGrâce à ce nouveau système de déplacement spatial, les explorations extra-terrestre se font monnaie courante rapportant sans cesse de nouvelles découvertes faites dans le système solaire et bientôt même hors de celui-ci.\n\n\n\n\n\n', 2);

-- --------------------------------------------------------

--
-- Structure de la table `constructeur_lieu`
--

CREATE TABLE `constructeur_lieu` (
  `id` int(10) NOT NULL,
  `id_constructeur` int(10) NOT NULL,
  `id_lieu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `construct_arm`
--

CREATE TABLE `construct_arm` (
  `id` int(10) NOT NULL,
  `id_construct` int(10) NOT NULL,
  `id_arm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `construct_transp`
--

CREATE TABLE `construct_transp` (
  `id` int(10) NOT NULL,
  `id_construct` int(10) NOT NULL,
  `id_transp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `construct_transp`
--

INSERT INTO `construct_transp` (`id`, `id_construct`, `id_transp`) VALUES
(1, 11, 1),
(2, 11, 2),
(3, 11, 3),
(4, 11, 4),
(5, 11, 5),
(6, 11, 6),
(7, 11, 7),
(8, 11, 8),
(9, 11, 9),
(10, 11, 10),
(11, 11, 11),
(12, 11, 12),
(13, 12, 13),
(14, 12, 14),
(15, 6, 15),
(16, 6, 16),
(17, 2, 17),
(18, 12, 18),
(19, 12, 19),
(20, 12, 20),
(21, 12, 21),
(22, 12, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(26, 1, 26),
(27, 2, 27),
(28, 8, 28),
(29, 7, 29),
(30, 2, 30),
(31, 2, 31),
(32, 2, 32),
(33, 7, 33),
(34, 12, 34),
(35, 12, 35),
(36, 12, 36),
(37, 12, 37),
(38, 7, 38),
(39, 2, 39),
(40, 7, 40),
(41, 7, 41),
(42, 7, 42),
(43, 7, 43),
(44, 7, 44),
(45, 7, 45),
(46, 7, 46),
(47, 7, 47),
(48, 7, 48),
(49, 7, 49),
(50, 7, 50),
(51, 7, 51),
(52, 1, 52),
(53, 10, 53),
(54, 2, 54),
(55, 2, 55),
(56, 2, 56),
(57, 2, 57),
(58, 2, 58),
(59, 2, 59),
(60, 10, 60),
(61, 10, 61),
(62, 10, 62),
(63, 10, 63),
(64, 6, 64),
(65, 2, 65),
(66, 1, 66),
(67, 8, 67),
(68, 1, 68),
(69, 2, 69),
(70, 7, 70),
(71, 6, 71),
(72, 6, 72),
(73, 6, 73),
(74, 10, 74),
(75, 10, 75),
(76, 10, 76),
(77, 10, 77),
(78, 10, 78),
(79, 2, 79),
(80, 1, 80),
(81, 1, 81),
(82, 1, 82),
(83, 3, 83),
(84, 7, 84),
(85, 7, 85),
(86, 2, 86),
(87, 11, 87),
(88, 12, 88),
(89, 12, 89),
(90, 6, 90),
(91, 4, 91),
(92, 4, 92),
(93, 4, 93),
(94, 5, 94),
(95, 5, 95),
(96, 5, 96),
(97, 5, 97),
(98, 1, 98),
(99, 5, 99);

-- --------------------------------------------------------

--
-- Structure de la table `controle_lieu`
--

CREATE TABLE `controle_lieu` (
  `id` int(10) NOT NULL,
  `id_espece` int(10) NOT NULL,
  `id_lieu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE `couleur` (
  `id` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `couleur_lieu_arm`
--

CREATE TABLE `couleur_lieu_arm` (
  `id` int(10) NOT NULL,
  `id_arm_lieu` int(10) NOT NULL,
  `id_couleur` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `diplomatie`
--

CREATE TABLE `diplomatie` (
  `id` int(10) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `traite` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `diplomatie_espece`
--

CREATE TABLE `diplomatie_espece` (
  `id` int(10) NOT NULL,
  `id_diplomatie` int(10) NOT NULL,
  `id_espece` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `disponibilite`
--

CREATE TABLE `disponibilite` (
  `id_disponibilite` int(10) NOT NULL,
  `nom_disponible` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `disponibilite`
--

INSERT INTO `disponibilite` (`id_disponibilite`, `nom_disponible`) VALUES
(1, 'disponibilite');

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `prix` double NOT NULL DEFAULT -1,
  `id_constructeur` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `equipements_armement`
--

CREATE TABLE `equipements_armement` (
  `id_arme` int(10) NOT NULL,
  `id_objet` int(10) NOT NULL,
  `id_type` int(10) NOT NULL,
  `lien` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `equipements_armement`
--

INSERT INTO `equipements_armement` (`id_arme`, `id_objet`, `id_type`, `lien`) VALUES
(1, 1, 1, ''),
(2, 2, 1, ''),
(3, 3, 1, ''),
(4, 4, 1, ''),
(5, 5, 1, ''),
(6, 6, 1, ''),
(7, 7, 1, ''),
(8, 8, 1, ''),
(9, 9, 1, ''),
(10, 10, 1, ''),
(11, 11, 1, ''),
(12, 12, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `equipements_transports`
--

CREATE TABLE `equipements_transports` (
  `id` int(10) NOT NULL,
  `id_objet` int(10) NOT NULL,
  `prix` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-1',
  `equipage` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `taille` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `poids` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `vitesse_max` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `capacite` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `categorie` int(10) NOT NULL,
  `type` int(10) NOT NULL,
  `lien` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_disponible` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `equipements_transports`
--

INSERT INTO `equipements_transports` (`id`, `id_objet`, `prix`, `equipage`, `taille`, `poids`, `vitesse_max`, `capacite`, `description`, `categorie`, `type`, `lien`, `id_disponible`) VALUES
(1, 30, '54,60€ seul (taxes comprises, prix constaté en Alpha)', 'monoplace', 'Petit (15m x 10m x 4m)', '48 tonnes', '1000 m/s', '2 SCU', '', 1, 1, '', 1),
(2, 31, '65,52 € / 60.06 € warbond', 'Monospace', 'Petit (15m x 10m x 4m)', '48 tonnes', '1150 m/s', '2 SCU', '', 1, 1, '', 1),
(3, 32, '72 dollars', 'Monoplace', 'Petit (15m x 10m x 4m)', '48 tonnes', '1095 m/s', '6 SCU', '', 1, 1, '', 1),
(4, 33, '60 euros', 'Monospace', 'Petit (27m x 17m x 8m)', '66 tonnes', '1188 m/s', '8 SCU', '', 1, 1, '', 1),
(5, 34, '71 euros', 'Monospace', 'Petit (27m x 17m x 8m)', '69 tonnes', '1223 m/s', '12 SCU', '', 1, 1, '', 1),
(6, 35, '76 euros', 'Monospace', 'Petit (27m x 17m x 8m)', '72.5 tonnes', '1235 m/s', '4 SCU', '', 1, 1, '', 1),
(7, 36, '112 euros', 'Monospace', 'Petit (27m x 17m x 8m)', '58 tonnes', '1.347 m/s', '4 SCU', '', 1, 1, '', 1),
(8, 37, '273 euros', 'Le vaisseau est conçu pour 3 personnes.', 'Moyen (60m x 32m x 12.5m)', '430 tonnes', '? m/s', '42 SCU', '', 1, 1, '', 1),
(9, 38, '427 euros', 'Le vaisseau est conçu pour 5 membres d\'équipage', 'Grand (91m x 52m x 17m)', '1577 tonnes', '955 m/s', '40 SCU', '', 1, 1, '', 1),
(10, 39, '470 euros', '5 membres d\'équipage + 4 passagers', 'Grand (91m x 52m x 17m)', '1576 tonnes', '955 m/s', '16 SCU', '', 1, 1, '', 1),
(11, 40, '55 euros', 'Le vaisseau a deux postes de travail', 'Petit (13m x 10m x 2m)', '19 tonnes', '1183 m/s', '0 SCU', '', 1, 1, '', 1),
(12, 41, '967 euros', '', 'Capital (207m x 74m x 40m)', '4.590 tonnes', '900 m/s', '480 SCU', '', 1, 1, '', 1),
(13, 42, '300 euros', 'Le vaisseau est conçu pour un équipage à deux', 'Moyen (43m x 30m x 10m)', '376 tonnes', '? m/s', '28 SCU', '', 1, 1, '', 1),
(14, 43, '300 dollars', 'Le vaisseau est conçu pour un équipage à deux', 'Moyen (43m x 30m x 10m)', '376 tonnes', '? m/s', '28 SCU', '', 1, 1, '', 1),
(15, 44, '240 euros', 'Monospace', 'Moyen (27.2m x 30.2m x 5.5m)', '? tonnes', '? m/s', '0 SCU', '', 1, 1, '', 1),
(16, 45, '240 euros', 'Monospace', 'Moyen (27.2m x 30.2m x 5.5m)', '? tonnes', '? m/s', '0 SCU', '', 1, 1, '', 1),
(17, 46, '98 euros avec un pack de départ ou\r\n82 euros seul (il faut un pack pour pouvoir jouer)\r\n', 'Monospace', 'Petit (16m x 12m x 4m)', '30 tonnes', '1235 m/s', '0 SCU', '', 1, 1, '', 1),
(18, 47, '49 euros (il faut un pack pour pouvoir jouer)', 'Monospace', 'Petit (18m x 8m x 4m)', '25 tonnes', '1093 m/s', '6 SCU', '', 1, 1, '', 1),
(19, 48, '22 euros seul (il faut un pack pour pouvoir jouer)', 'Monospace', 'Petit (18m x 8m x 4m)', '25 tonnes', '1141 m/s', '3 SCU', '', 1, 1, '', 1),
(20, 49, '38 euros seul (il faut un pack pour pouvoir jouer)', 'Monospace', 'Petit (18m x 8m x 4m)', '25 tonnes', '1209 m/s', '3 SCU', '', 1, 1, '', 1),
(21, 50, 'Environ 36 euros seul (il faut un pack pour pouvoir jouer)', 'Monospace', 'Petit (18m x 8m x 4m)', '25 tonnes', '1199 m/s', '3 SCU', '', 1, 1, '', 1),
(22, 51, '49 euros avec un pack de départ\r\n\r\n27 euros seul (il faut un pack pour pouvoir jouer)', 'Monospace', 'Petit (18m x 8m x 4m)', '25 tonnes', '1212 m/s', '3 SCU', '', 1, 1, '', 1),
(23, 52, '82 euros avec un pack de départ\r\n\r\n65 euros seul (il faut un pack pour pouvoir jouer)', 'C\'est un vaisseau monoplace, avec une seule couchette', 'Petit (22.5m x 16.5m x 23.5m)', '50 tonnes', '1310 m/s', '0-8 SCU', '', 1, 1, '', 1),
(24, 53, '60 dollars', 'Monospace avec une seule couchette', 'Petit (22.5m x 16.5m x 5.5m)\r\n\r\n', '50 tonnes', '1115 m/s', '8 SCU', '', 1, 1, '', 1),
(25, 54, '90 dollars seul', 'Monoplace', 'Petit (22.5m x 16.5m x 5.5m)', '50 tonnes', '1310 m/s', '8 SCU', '', 1, 1, '', 1),
(26, 55, '102 dollars seul ', 'Monoplace', 'Petit (22.5m x 16.5m x 23.5m)', '50 tonnes', '1305 m/s', '0-8 SCU', '', 1, 1, '', 1),
(27, 56, '131 euros seul', '2, un pilote et un tireur', 'Véhicule (17m x 7m x 5.5m)', '? tonnes', '? m/s', '0 SCU', '', 2, 2, '', 1),
(28, 57, '342 dollars seul', 'Monoplace', 'Petit (15.5m x 20m x 4.5m)', '26 tonnes', '1240 m/s', '0 SCU', '', 1, 1, '', 1),
(29, 58, '132 dollars seul ', 'Monoplace', 'Petit (15m x 16m x 4.6m)', '40 tonnes', '1315 m/s', '0 SCU', '', 1, 1, '', 1),
(30, 59, 'Livré avec le Carrack', 'Le vaisseau dispose de 3 places.', 'Petit (12m x 10.3m x 3.3m)', '? tonnes', '1150 m/s', '4 SCU', '', 1, 1, '', 1),
(31, 60, '49 euros seul ', 'Le vaisseau dispose de 3 places.', 'Petit (12m x 10.3m x 3.3m)', '? tonnes', '1150 m/s', '4 SCU', '', 1, 1, '', 1),
(32, 61, '546 €', 'Le vaisseau est conçu pour 6 membres d\'équipage', 'Grand (126.5m x 76.5m x 30m)', '4.397 tonnes', '1236 m/s', '456 SCU', '', 1, 1, '', 1),
(33, 62, '354 dollars seul ', 'Le vaisseau dispose de 4 lits', 'Grand (111.5m x 39m x 13.5m)', '1.608 tonnes', '890 m/s', '576 SCU', '', 1, 1, '', 1),
(34, 63, '300 euros avec un pack de départ\r\n\r\n245 euros seul ', 'Quatre lits.\r\n\r\nUn tireur dans chaque tourelle.\r\n\r\nUn pilote dans le vaisseau parasite.', 'Grand (61m x 26m x 14m)', '419 tonnes', '910 m/s', '96 SCU', '', 1, 1, '', 1),
(35, 64, '338 euros seul (il faut un pack pour pouvoir jouer)\r\n(taxes comprises, prix constaté en Alpha)', 'Quatre lits.\r\n\r\nUn tireur dans chaque tourelle.\r\n\r\nUn pilote dans le vaisseau parasite.', 'Grand (61m x 26m x 14m)', '439 tonnes', '987 m/s', '96 SCU', '', 1, 1, '', 1),
(36, 65, '420 dollars seul (il faut un pack pour pouvoir jouer)', '	\r\nHuit lits.\r\n\r\nUn tireur dans chaque tourelle.\r\n\r\nUn pilote dans le vaisseau parasite.', 'Grand (61m x 26m x 14m)', '274 tonnes', '910 m/s', '80 SCU', '', 1, 1, '', 1),
(37, 66, '164 euros seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau dispose de 4 lits.', '164 euros seul (taxes comprises, prix constaté en Alpha)', '416 tonnes', '? m/s', '? SCU', '', 1, 1, '', 1),
(38, 67, '212 euros seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau est conçu pour 4 personnes', 'Moyen (55m x 27m x 31m)', '? tonnes', '? m/s', '72 SCU', '', 1, 1, '', 1),
(39, 68, '420 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau est prévu pour 8 membres d\'équipage', 'Grand (90m x 50m x 20m)', '3.650 tonnes', '? m/s', '230 SCU', '', 1, 1, '', 1),
(40, 69, '120 dollars (taxes comprises, prix constaté en Alpha)', 'Un pilote et un tireur dans la tourelle.', 'Moyen (29m x 26.5m x 10m)', '227 tonnes', '1115 m/s', '46 SCU', '', 1, 1, '', 1),
(41, 70, '180 dollars seul (taxes comprises, prix constaté en Alpha)', 'Un pilote et un opérateur tourelle', 'Moyen (29m x 26.5m x 10m)', '227 tonnes', '? m/s', '25 SCU', '', 1, 1, '', 1),
(42, 71, '131 euros seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau est conçu pour deux personnes', 'Moyen (36m x 26m x 10m)', '227 tonnes', '? m/s', '12 SCU', '', 1, 1, '', 1),
(43, 72, '60 euros seul (taxes comprises, prix constaté en Alpha)', 'Le véhicules possède deux places', 'Véhicule (6m x 4m x 3m)', '3 tonnes', '? m/s', '1 SCU', '', 2, 2, '', 1),
(44, 73, '96 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le véhicules possède deux places', 'Véhicule (6m x 4m x 3m)', '3 tonnes', '? m/s', '0 SCU', '', 2, 2, '', 1),
(45, 74, '81.90 € / 70.98 € warbond', '1 - 3 Membres', 'Vehicule (6.0m x 4.0m x 2.5m)', '3 Tonnes', '? m/s', '0 SCU', '', 2, 2, '', 1),
(46, 75, '71 euros seul (taxes comprises, prix constaté en Alpha)', 'C\'est un véhicule biplace', 'Petit (6m x 4m x 3m)', '3 tonnes', '? m/s', '0 SCU', '', 2, 2, '', 1),
(47, 76, '78 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le véhicules possède deux places', 'Véhicule (6m x 4m x 3m)', '3 tonnes', '? m/s', '0 SCU', '', 2, 2, '', 1),
(48, 77, '78 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le véhicule comporte trois places', 'Véhicule (6m x 4m x 3m)', '3 tonnes', '0 m/s', '0 SCU', '', 2, 2, '', 1),
(49, 78, '222 dollars seul (taxes comprises, prix constaté en Alpha)', 'C\'est un biplace', 'Petit (33.5m x 13.2m x 4m)', '78 tonnes', '? m/s', '0 SCU', '', 2, 2, '', 1),
(50, 79, '48 dollars seul (taxes comprises, prix constaté en Alpha)', 'Un pilote et un passager', 'Parasite (6m x 3.5m x 1.5m)', '2 tonnes', '1.100 m/s', '0 - 1 SCU', '', 2, 2, '', 1),
(51, 80, '48 dollars seul (taxes comprises, prix constaté en Alpha)', 'Un pilote et un passager', 'Parasite (6m x 3.5m x 1.5m)', '2 tonnes', '1.100 m/s', '0 - 1 SCU', '', 2, 2, '', 1),
(52, 81, '360 dollars seul (taxes comprises, prix constaté en Alpha)', 'C\'est un vaisseau monoplace', 'Moyen (20.5m x 36.6m x 4.4m)', '52 tonnes', '980 m/s', '0 SCU', '', 1, 1, '', 1),
(53, 82, '420 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau est prévu pour 5 personnes', '?', '4.000 tonnes', '? m/s', '500 SCU', '', 1, 1, '', 1),
(54, 83, '136 euros avec un pack de départ.\r\n\r\n120 euros seul (il faut un pack pour pouvoir jouer).', 'C\'est un mono place', 'Petit (22.5m x 21.5m x 6.5m)', '73 tonnes', '1225 m/s', '2 SCU', '', 1, 1, '', 1),
(55, 84, '210 dollars seul (taxes comprises, prix constaté en Alpha)', 'C\'est un mono place', 'Petit (22.5m x 21.5m x 6.5m)', '73 tonnes', '1225 m/s', '0-2 SCU', '', 1, 1, '', 1),
(56, 85, '191 euros seul (il faut un pack pour pouvoir jouer)\r\n', 'C\'est un biplace', 'Petit (25.5m x 24m x 6.5m)', '78 tonnes', '1222 m/s', '0 SCU', '', 1, 1, '', 1),
(57, 86, 'Environ 216 dollars seul (il faut un pack pour pouvoir jouer)', 'C\'est un biplace', 'Petit (25.5m x 24m x 6.5m)', '78 tonnes', '1222 m/s', '0 à 2 SCU', '', 1, 1, '', 1),
(58, 87, '153 euros seul (taxes comprises, prix constaté en Alpha)', 'C\'est un mono place', 'Petit (22.5m x 21.5m x 6.5m)', '73 tonnes', '1.215 m/s', '0-2 SCU', '', 1, 1, '', 1),
(59, 88, '136 euros seul (taxes comprises, prix constaté en Alpha)', 'C\'est un mono place', 'Petit (22.5m x 21.5m x 6.5m)', '73 tonnes', '1.225 m/s', '0-2 SCU', '', 1, 1, '', 1),
(60, 89, '136 euros avec un pack de départ.\r\n\r\n120 euros seul\r\n(taxes comprises, prix constaté en Alpha).', 'Le vaisseau dispose de 4 lits - \r\nUn pilote et un tireur en tourelle', 'Moyen (38m x 23.5m x 9.5m)', '209 tonnes', '1005 m/s', '1005 m/s', '', 1, 1, '', 1),
(61, 90, '162 dollars seul (il faut un pack pour pouvoir jouer)\r\n(taxes comprises, prix constaté en Alpha)', 'Le vaisseau dispose de 4 lits', 'Moyen (38m x 23.5m x 9.5m)', '213 tonnes', '1100 m/s', '36 SCU', '', 1, 1, '', 1),
(62, 91, '180 dollars seul (il faut un pack pour pouvoir jouer)\r\n(taxes comprises, prix constaté en Alpha)', 'Le vaisseau dispose de 4 lits', 'Moyen (38m x 36m x 9.5m)', '336 tonnes', '1005 m/s', '120 SCU', '', 1, 1, '', 1),
(63, 92, '210 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau dispose de 4 lits', 'Moyen (38m x 23.5m x 9.5m)', '213 tonnes', '1.035 m/s', '36 SCU', '', 1, 1, '', 1),
(64, 93, '480 dollars seul (taxes comprises, prix constaté en Alpha)', '8 membres d\'équipage pour accueillir les 40 passagers', 'Grand (85m x 90m x 16m)', '? tonnes', '? m/s', '300 SCU', '', 1, 1, '', 1),
(65, 94, '198 dollars seul (taxes comprises, prix constaté en Alpha)', 'Un pilote et un opérateur tourelle', 'Petit (22.5m x 22.5m x 6m)', '87 tonnes', '980 m/s', '980 m/s', '', 1, 1, '', 1),
(66, 95, '98 euros seul (taxes comprises, prix constaté en Alpha)', 'C\'est un vaisseau monoplace', 'Petit (20m x 17m x 5.5m)', '49 tonnes', '1235 m/s', '0 SCU', '', 1, 1, '', 1),
(67, 96, '382 euros seul (taxes comprises, prix constaté en Alpha)', 'C\'est un monoplace', 'Moyen (31m x 31.5m x 8.5m)', '66 tonnes', '1.229 m/s', '0 SCU', '', 1, 1, '', 1),
(68, 97, '870 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau dispose de 9 lits. Pilote + les 6 tourelles actives', 'Grand (115m x 75m x 16m)', '4.260 tonnes', '915 m/s', '40 SCU', '', 1, 1, '', 1),
(69, 98, '120 dollars seul (taxes comprises, prix constaté en Alpha)', 'C\'est un monoplace', 'Petit (16m x 13m x 4m)', '40 tonnes', '1.235 m/s', '0 SCU', '', 1, 1, '', 1),
(70, 99, '102 dollars seul (taxes comprises, prix constaté en Alpha)', 'C\'est un monoplace', 'Petit (23.5m x 12.5m x 9m)', '66 tonnes', '1.360 m/s', '0 SCU', '', 1, 1, '', 1),
(71, 100, '840 dollars seul (taxes comprises, prix constaté en Alpha)', '\r\nLe vaisseau est conçu pour un équipage à 8', 'Grand (94m x 70m x 23m)', '? tonnes', '? m/s', '234 SCU', '', 1, 1, '', 1),
(72, 101, '432 dollars seul (taxes comprises, prix constaté en Alpha)', 'Un pilote et deux opérateurs tourelles', 'Grand (94m x 70m x 23m)', '? tonnes', '? m/s', '624 SCU', '', 1, 1, '', 1),
(73, 102, '576 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le pilote et les 3 opérateurs des tourelles', 'Grand (94m x 70m x 23m)', '? tonnes', '? m/s', '468 SCU', '', 1, 1, '', 1),
(74, 103, '72 dollars seul (taxes comprises, prix constaté en Alpha)', 'C\'est un vaisseau monoplace', 'Petit (22m x 8m x 4m)', '122 tonnes', '? m/s', '48 SCU', '', 1, 1, '', 1),
(75, 104, '108 dollars seul (taxes comprises, prix constaté en Alpha)', 'C\'est un monoplace', 'Moyen (48m x 15.5m x 17m)', '387 tonnes', '? m/s', '384 SCU', '', 1, 1, '', 1),
(76, 105, '300 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau dispose de 4 places', 'Grand (125m x 55m x 55m)Grand (125m x 55m x 55m)', '887 tonnes\r\n\r\n', '? m/s\r\n\r\n', '4608 SCU\r\n\r\n\r\n', '', 1, 1, '', 1),
(77, 106, '385 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau peut accueillir 5 personnes', 'Capital (209m x 70m x 70m)', '1.216 tonnes', '? m/s', '20736 SCU', '', 1, 1, '', 1),
(78, 107, '780 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau peut accueillir 5 personnes', 'Capital (372m x 104m x 104m)', '1.652 tonnes', '? m/s', '98304 SCU', '', 1, 1, '', 1),
(79, 108, '234 dollars seul (taxes comprises, prix constaté en Alpha)', 'Un pilote et un opérateur tourelle', 'Petit (22m x 14.5m x 10m)\r\n\r\n', '148 tonnes\r\n\r\n', '1230 m/s\r\n\r\n', '0 SCU\r\n\r\n', '', 1, 1, '', 1),
(80, 109, '1.200 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau est conçu pour 28 membres d\'équipage', 'Capital (242m x 126m x 46m)', '37.459 tonnes', '? m/s', '831 SCU\r\n\r\n\r\n', '', 1, 1, '', 1),
(81, 110, '1800 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau est conçu pour 28 membres d\'équipage', 'Capital (242m x 126m x 46m)', '37.310 tonnes', '? m/s', '995 SCU', '', 1, 1, '', 1),
(82, 111, '3600 dollars seul (taxes comprises, prix constaté en Alpha)', '80 membres d\'équipage sont prévus', 'Capital (480m x 198m x 72m)', '109.900 tonnes', '? m/s', '5.400 SCU', '', 1, 1, '', 1),
(83, 112, '204 dollars seul (taxes comprises, prix constaté en Alpha)', 'C\'est un vaisseau monoplace', 'Petit (31.5m x 12.5m x 8.5m)\r\n\r\n', '67 tonnes\r\n\r\n', '1.325 m/s\r\n\r\n', '0 SCU\r\n\r\n\r\n', '', 1, 1, '', 1),
(84, 113, '1980 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau est prévu pour 10 membres d\'équipage', 'Capital (270m x 104m x 64m)', '? tonnes', '? m/s\r\n\r\n', '3792 SCU\r\n\r\n\r\n', '', 1, 1, '', 1),
(85, 114, '2400 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau est prévu pour 10 membres\r\nd\'équipage et 10 commerçants', 'Capital (270m x 104m x 64m)', '? tonnes', '? m/s', '768 + 10 x 189 SCU', '', 1, 1, '', 1),
(86, 115, '628 euros seul (taxes comprises, prix constaté en Alpha)', 'Un pilote et un opérateur tourelle', 'Grand (128m x 68m x 24m)', '? tonnes', '122 m/s', '400 SCU', '', 1, 1, '', 1),
(87, 116, 'Origin Jumpworks GmbH', 'C\'est un vaisseau monoplace.', 'Petit (11m x 10m x 3m)', '10 tonnes', '1.345 m/s', '0 SCU', '', 1, 1, '', 1),
(88, 117, '164 dollars seul (taxes comprises, prix constaté en Alpha)', 'C\'est un monoplace', 'Petit (30m x 17m x 8m)', '? tonnes', '1307 m/s', '0 SCU', '', 1, 1, '', 1),
(89, 118, '420 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau est conçu pour 8 membres d\'équipage', 'Grand (160m x 160m x 65m)', '9.600 tonnes', '? m/s', '3584 SCU', '', 1, 1, '', 1),
(90, 119, '270 dollars seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau est conçu pour trois membres d\'équipage', 'Moyen (40m x 38m x 11.6m)', '? tonnes', '1050 m/s', '114 SCU', '', 1, 1, '', 1),
(91, 120, '344 euros seul (taxes comprises, prix constaté en Alpha)', 'Pilote et poste de minage principal', 'Moyen (38.5m x 17m x 8m)', '?', '1090 m/s', '288 SCU', '', 1, 1, '', 1),
(92, 121, '42 dollars seul (taxes comprises, prix constaté en Alpha)', 'C\'est un monoplace', 'Parasite (9.5m x 8.5m x 4.3m)', '12 tonnes', '900 m/s', '2 SCU', '', 1, 1, '', 1),
(93, 122, '48 dollars seul (taxes comprises, prix constaté en Alpha)', 'Un pilote et 8 passagers', 'Parasite (9.5m x 8.5m x 4.3m)', '12 tonnes', '900 m/s', '0-2 SCU', '', 1, 1, '', 1),
(94, 123, '49 euros avec un pack de départ.\r\n\r\n33 euros seul (il faut un pack pour pouvoir jouer).\r\n', 'C\'est un mono place', 'Petit (17.5m x 15.5m x 5.5m)', '17 tonnes', '1160 m/s', '6 SCU', '', 1, 1, '', 1),
(95, 124, '44 euros seul (il faut un pack pour pouvoir jouer)', 'C\'est un mono place\r\n', 'Petit (17.5m x 15.5m x 5.5m)', '39 tonnes', '1215 m/s', '0 SCU', '', 1, 1, '', 1),
(96, 125, '', 'C\'est un mono place', 'Petit (17.5m x 15.5m x 5.5m)', '37 tonnes', '1225 m/s', '0 SCU', '', 1, 1, '', 1),
(97, 126, '60 euros seul (il faut un pack pour pouvoir jouer)\r\n(taxes comprises, prix constaté en Alpha)', 'C\'est un mono place', 'Petit (17.5m x 15.5m x 5.5m)', '30 tonnes', '1342 m/s', '0 SCU', '', 1, 1, '', 1),
(98, 127, '791 euros seul (taxes comprises, prix constaté en Alpha)', 'Le vaisseau dispose de 8 lits', 'Grand (125m x 72m x 21m)', '13.500 tonnes', '? m/s', '? m/s', '', 1, 1, '', 1),
(99, 128, '87 euros seul (taxes comprises, prix constaté en Alpha)', 'Vaisseau monoplace', 'Consolidated Outlands', '228 tonnes', '1171 m/s', '1171 m/s', '', 1, 1, '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `especes`
--

CREATE TABLE `especes` (
  `id_espece` int(10) NOT NULL,
  `id_objet` int(10) NOT NULL,
  `id_categ_espece` int(10) NOT NULL,
  `gouvernence` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `souverainete` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `philosophie` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `religion` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pre_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `origine` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `faiblesses`
--

CREATE TABLE `faiblesses` (
  `id_faiblesse` int(10) NOT NULL,
  `nom_faiblesse` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forces`
--

CREATE TABLE `forces` (
  `id_force` int(10) NOT NULL,
  `nom_force` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images_info_objet`
--

CREATE TABLE `images_info_objet` (
  `id` int(10) NOT NULL,
  `name` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `src` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `id_info_objet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `images_info_objet`
--

INSERT INTO `images_info_objet` (`id`, `name`, `src`, `alt`, `id_info_objet`) VALUES
(1, 'satellite1.jpg', 'satellite1.jpg', 'satellite1.jpg', 1),
(2, 'satellite2.jpg', 'satellite2.jpg', 'satellite2.jpg', 2),
(3, 'satellite3.jpg', 'satellite3.jpg', 'satellite3.jpg', 3),
(4, 'satellite4.png', 'satellite4.png', 'satellite4.png', 4),
(5, 'satellite5.jpg', 'satellite5.jpg', 'satellite5.jpg', 14),
(6, 'satellite6.jpg', 'satellite6.jpg', 'satellite6.jpg', 15),
(7, 'satellite7.png', 'satellite7.png', 'satellite7.png', 16),
(8, '', '', '', 17),
(9, 'satellite8.png', 'satellite8.png', 'satellite8.png', 27),
(10, 'satellite9.png', 'satellite9.png', 'satellite9.png', 28),
(11, '', '', '', 29),
(12, '', '', '', 30),
(13, '', '', '', 40),
(14, '', '', '', 41),
(15, '', '', '', 42),
(16, '', '', '', 43);

-- --------------------------------------------------------

--
-- Structure de la table `images_objet`
--

CREATE TABLE `images_objet` (
  `id_image_obj` int(10) NOT NULL,
  `name` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_objet` int(10) NOT NULL,
  `img_principal` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `images_objet`
--

INSERT INTO `images_objet` (`id_image_obj`, `name`, `src`, `alt`, `id_objet`, `img_principal`) VALUES
(1, 'arme.png', 'arme.png', 'arme.png', 1, 0),
(2, 'arme2.jpg', 'arme2.jpg', 'arme2.jpg', 2, 0),
(3, 'arme3.png', 'arme3.png', 'arme3.png', 3, 0),
(4, 'arme4.jpg', 'arme4.jpg', 'arme4.jpg', 4, 0),
(5, 'arme5.jpg', 'arme5.jpg', 'arme5.jpg', 5, 0),
(6, 'arme6.jpg', 'arme6.jpg', 'arme6.jpg', 6, 0),
(7, 'arme7.jpg', 'arme7.jpg', 'arme7.jpg', 7, 0),
(8, 'arme8.jpg', 'arme8.jpg', 'arme8.jpg', 8, 0),
(9, 'arme9.png', 'arme9.png', 'arme9.png', 9, 0),
(10, 'arme10.jpg', 'arme10.jpg', 'arme10.jpg', 10, 0),
(11, 'arme11.png', 'arme11.png', 'arme11.png', 11, 0),
(12, 'arme12.png', 'arme12.png', 'arme12.png', 12, 0),
(13, 'hurston2.jpg', 'hurston2.jpg', 'hurston2.jpg', 13, 0),
(14, 'hurston.jpg', 'hurston.jpg', 'hurston.jpg', 13, 1),
(15, 'lieu1.jpg', 'lieu1.jpg', 'lieu1.jpg', 13, 0),
(16, 'lieu2.jpg', 'lieu2.jpg', 'lieu2.jpg', 13, 0),
(17, 'lieu3.jpg', 'lieu3.jpg', 'lieu3.jpg', 13, 0),
(18, 'lieu4.jpg', 'lieu4.jpg', 'lieu4.jpg', 13, 0),
(19, 'lieu5.jpg', 'lieu5.jpg', 'lieu5.jpg', 13, 0),
(20, 'crusaderplanete2.jpg', 'crusaderplanete2.jpg', 'crusaderplanete2.jpg', 14, 0),
(21, 'crusaderplanete.png', 'crusaderplanete.png', 'crusaderplanete.png', 14, 1),
(22, 'lieu7.jpg', 'lieu7.jpg', 'lieu7.jpg', 14, 0),
(23, 'lieu8.jpg', 'lieu8.jpg', 'lieu8.jpg', 14, 0),
(24, 'lieu15.jpg', 'lieu15.jpg', 'lieu15.jpg', 14, 0),
(25, 'lieu16.jpg', 'lieu16.jpg', 'lieu16.jpg', 14, 0),
(26, 'lieu17.jpg', 'lieu17.jpg', 'lieu17.jpg', 14, 0),
(27, 'ArcCorp2.jpg', 'ArcCorp2.jpg', 'ArcCorp2.jpg', 15, 0),
(28, 'ArcCorp.png', 'ArcCorp.png', 'ArcCorp.png', 15, 1),
(29, 'lieu9.png', 'lieu9.png', 'lieu9.png', 15, 0),
(30, 'lieu10.png', 'lieu10.png', 'lieu10.png', 15, 0),
(31, 'lieu19.jpg', 'lieu19.jpg', 'lieu19.jpg', 15, 0),
(32, 'lieu20.jpg', 'lieu20.jpg', 'lieu20.jpg', 15, 0),
(33, 'lieu21.jfif', 'lieu21.jfif', 'lieu21.jfif', 15, 0),
(34, 'micro2.png', 'micro2.png', 'micro2.png', 16, 0),
(35, 'micro.png', 'micro.png', 'micro.png', 16, 1),
(36, 'lieu11.png', 'lieu11.png', 'lieu11.png', 16, 0),
(37, 'lieu12.jpg', 'lieu12.jpg', 'lieu12.jpg', 16, 0),
(38, 'lieu13.png', 'lieu13.png', 'lieu13.png', 16, 0),
(39, 'lieu14.jpg', 'lieu14.jpg', 'lieu14.jpg', 16, 0),
(40, 'lieu23.jpg', 'lieu23.jpg', 'lieu23.jpg', 16, 0),
(41, 'lune1.jpg', 'lune1.jpg', 'lune1.jpg', 17, 0),
(42, 'lune2.jpg', 'lune2.jpg', 'lune2.jpg', 17, 0),
(43, 'lune4.jpg', 'lune4.jpg', 'lune4.jpg', 18, 0),
(44, 'lune5.jpg', 'lune5.jpg', 'lune5.jpg', 18, 0),
(45, 'lune7.jpg', 'lune7.jpg', 'lune7.jpg', 19, 0),
(46, 'lune8.jpg', 'lune8.jpg', 'lune8.jpg', 19, 0),
(47, 'lune10.jpg', 'lune10.jpg', 'lune10.jpg', 20, 0),
(48, 'lune11.jpg', 'lune11.jpg', 'lune11.jpg', 20, 0),
(49, 'lune13.jpg', 'lune13.jpg', 'lune13.jpg', 21, 0),
(50, 'lune14.jpg', 'lune14.jpg', 'lune14.jpg', 21, 0),
(51, 'lune16.jpg', 'lune16.jpg', 'lune16.jpg', 22, 0),
(52, 'lune17.png', 'lune17.png', 'lune17.png', 22, 0),
(53, 'lune19.jpg', 'lune19.jpg', 'lune19.jpg', 23, 0),
(54, 'lune20.png', 'lune20.png', 'lune20.png', 23, 0),
(55, 'lune22.jpg', 'lune22.jpg', 'lune22.jpg', 24, 0),
(56, 'lune23.png', 'lune23.png', 'lune23.png', 24, 0),
(57, 'lune25.jpg', 'lune25.jpg', 'lune25.jpg', 25, 0),
(58, 'lune26.png', 'lune26.png', 'lune26.png', 25, 0),
(59, 'lune28.jpg', 'lune28.jpg', 'lune28.jpg', 26, 0),
(60, 'lune29.jpg', 'lune29.jpg', 'lune29.jpg', 26, 0),
(61, 'lune31.jpg', 'lune31.jpg', 'lune31.jpg', 27, 0),
(62, 'lune32.jpg', 'lune32.jpg', 'lune32.jpg', 27, 0),
(63, 'lune34.jpg', 'lune34.jpg', 'lune34.jpg', 28, 0),
(64, 'lune35.jpg', 'lune35.jpg', 'lune35.jpg', 28, 0),
(65, 'ville.jpg', 'ville.jpg', 'ville.jpg', 29, 0),
(66, 'ville2.png', 'ville2.png', 'ville2.png', 29, 0),
(67, 'ville3.png', 'ville3.png', 'ville3.png', 29, 0),
(68, 'ville4.png', 'ville4.png', 'ville4.png', 29, 0),
(69, 'ville5.png', 'ville5.png', 'ville5.png', 29, 0),
(70, 'ville6.png', 'ville6.png', 'ville6.png', 29, 0),
(71, 'ville7.png', 'ville7.png', 'ville7.png', 29, 0),
(72, 'ville8.png', 'ville8.png', 'ville8.png', 29, 0),
(73, 'vaisseau.jpg', 'vaisseau.jpg', 'vaisseau.jpg', 30, 1),
(74, 'vaisseau2.jpg', 'vaisseau2.jpg', 'vaisseau2.jpg', 31, 1),
(75, 'vaisseau3.jpg', 'vaisseau3.jpg', 'vaisseau3.jpg', 32, 1),
(76, 'vaisseau4.jpg', 'vaisseau4.jpg', 'vaisseau4.jpg', 33, 1),
(77, 'vaisseau5.jpg', 'vaisseau5.jpg', 'vaisseau5.jpg', 34, 1),
(78, 'vaisseau6.jpg', 'vaisseau6.jpg', 'vaisseau6.jpg', 35, 1),
(79, 'vaisseau7.jpg', 'vaisseau7.jpg', 'vaisseau7.jpg', 36, 1),
(80, 'vaisseau8.jpg', 'vaisseau8.jpg', 'vaisseau8.jpg', 37, 1),
(81, 'vaisseau9.png', 'vaisseau9.png', 'vaisseau9.png', 38, 1),
(82, 'vaisseau10.jpg', 'vaisseau10.jpg', 'vaisseau10.jpg', 39, 1),
(83, 'vaisseau11.jpg', 'vaisseau11.jpg', 'vaisseau11.jpg', 40, 1),
(84, 'vaisseau12.jpg', 'vaisseau12.jpg', 'vaisseau12.jpg', 41, 1),
(85, 'appolo.jpg', 'appolo.jpg', 'appolo.jpg', 42, 1),
(86, 'vaisseau14.jpg', 'vaisseau14.jpg', 'vaisseau14.jpg', 43, 1),
(87, 'vaisseau15.jpg', 'vaisseau15.jpg', 'vaisseau15.jpg', 44, 1),
(88, 'vaisseau16.jpg', 'vaisseau16.jpg', 'vaisseau16.jpg', 45, 1),
(89, 'vaisseau17.jpg', 'vaisseau17.jpg', 'vaisseau17.jpg', 46, 1),
(90, 'vaisseau18.jpg', 'vaisseau18.jpg', 'vaisseau18.jpg', 47, 1),
(91, 'vaisseau19.jpg', 'vaisseau19.jpg', 'vaisseau19.jpg', 48, 1),
(92, 'vaisseau20.jpg', 'vaisseau20.jpg', 'vaisseau20.jpg', 49, 1),
(93, 'vaisseau21.jpg', 'vaisseau21.jpg', 'vaisseau21.jpg', 50, 1),
(94, 'vaisseau22.jpg', 'vaisseau22.jpg', 'vaisseau22.jpg', 51, 1),
(95, 'vaisseau23.jpg', 'vaisseau23.jpg', 'vaisseau23.jpg', 52, 1),
(96, 'vaisseau24.jpg', 'vaisseau24.jpg', 'vaisseau24.jpg', 53, 1),
(97, 'vaisseau25.jpg', 'vaisseau25.jpg', 'vaisseau25.jpg', 54, 1),
(98, 'vaisseau26.jpg', 'vaisseau26.jpg', 'vaisseau26.jpg', 55, 1),
(99, 'vaisseau27.jpg', 'vaisseau27.jpg', 'vaisseau27.jpg', 56, 1),
(100, 'vaisseau28.jpg', 'vaisseau28.jpg', 'vaisseau28.jpg', 57, 1),
(101, 'vaisseau29.jpg', 'vaisseau29.jpg', 'vaisseau29.jpg', 58, 1),
(102, 'vaisseau30.jpg', 'vaisseau30.jpg', 'vaisseau30.jpg', 59, 1),
(103, 'vaisseau31.jpg', 'vaisseau31.jpg', 'vaisseau31.jpg', 60, 1),
(104, 'vaisseau32.jpg', 'vaisseau32.jpg', 'vaisseau32.jpg', 61, 1),
(105, 'vaisseau33.png', 'vaisseau33.png', 'vaisseau33.png', 62, 1),
(106, 'vaisseau34.jpg', 'vaisseau34.jpg', 'vaisseau34.jpg', 63, 1),
(107, 'vaisseau35.jpg', 'vaisseau35.jpg', 'vaisseau35.jpg', 64, 1),
(108, 'vaisseau36.jpg', 'vaisseau36.jpg', 'vaisseau36.jpg', 65, 1),
(109, 'vaisseau37.jpg', 'vaisseau37.jpg', 'vaisseau37.jpg', 66, 1),
(110, 'vaisseau38.jpg', 'vaisseau38.jpg', 'vaisseau38.jpg', 67, 1),
(111, 'vaisseau39.png', 'vaisseau39.png', 'vaisseau39.png', 68, 1),
(112, 'vaisseau40.jpg', 'vaisseau40.jpg', 'vaisseau40.jpg', 69, 1),
(113, 'vaisseau41.jpg', 'vaisseau41.jpg', 'vaisseau41.jpg', 70, 1),
(114, 'vaisseau42.jpg', 'vaisseau42.jpg', 'vaisseau42.jpg', 71, 1),
(115, 'vaisseau43.jpg', 'vaisseau43.jpg', 'vaisseau43.jpg', 72, 1),
(116, 'vaisseau44.jpg', 'vaisseau44.jpg', 'vaisseau44.jpg', 73, 1),
(117, 'vaisseau45.jpg', 'vaisseau45.jpg', 'vaisseau45.jpg', 74, 1),
(118, 'vaisseau46.jpg', 'vaisseau46.jpg', 'vaisseau46.jpg', 75, 1),
(119, 'vaisseau47.jpg', 'vaisseau47.jpg', 'vaisseau47.jpg', 76, 1),
(120, 'vaisseau48.jpg', 'vaisseau48.jpg', 'vaisseau48.jpg', 77, 1),
(121, 'vaisseau49.jpg', 'vaisseau49.jpg', 'vaisseau49.jpg', 78, 1),
(122, 'vaisseau50.jpg', 'vaisseau50.jpg', 'vaisseau50.jpg', 79, 1),
(123, 'vaisseau51.jpg', 'vaisseau51.jpg', 'vaisseau51.jpg', 80, 1),
(124, 'vaisseau52.jpg', 'vaisseau52.jpg', 'vaisseau52.jpg', 81, 1),
(125, 'vaisseau53.jpg', 'vaisseau53.jpg', 'vaisseau53.jpg', 82, 1),
(126, 'vaisseau54.jpg', 'vaisseau54.jpg', 'vaisseau54.jpg', 83, 1),
(127, 'vaisseau55.jpg', 'vaisseau55.jpg', 'vaisseau55.jpg', 84, 1),
(128, 'vaisseau56.jpg', 'vaisseau56.jpg', 'vaisseau56.jpg', 85, 1),
(129, 'vaisseau57.jpg', 'vaisseau57.jpg', 'vaisseau57.jpg', 86, 1),
(130, 'vaisseau58.jpg', 'vaisseau58.jpg', 'vaisseau58.jpg', 87, 1),
(131, 'vaisseau59.jpg', 'vaisseau59.jpg', 'vaisseau59.jpg', 88, 1),
(132, 'vaisseau60.png', 'vaisseau60.png', 'vaisseau60.png', 89, 1),
(133, 'vaisseau61.jpg', 'vaisseau61.jpg', 'vaisseau61.jpg', 90, 1),
(134, 'vaisseau62.jpg', 'vaisseau62.jpg', 'vaisseau62.jpg', 91, 1),
(135, 'vaisseau63.jpg', 'vaisseau63.jpg', 'vaisseau63.jpg', 92, 1),
(136, 'vaisseau64.png', 'vaisseau64.png', 'vaisseau64.png', 93, 1),
(137, 'vaisseau65.jpg', 'vaisseau65.jpg', 'vaisseau65.jpg', 94, 1),
(138, 'vaisseau66.png', 'vaisseau66.png', 'vaisseau66.png', 95, 1),
(139, 'vaisseau67.jpg', 'vaisseau67.jpg', 'vaisseau67.jpg', 96, 1),
(140, 'vaisseau68.jpg', 'vaisseau68.jpg', 'vaisseau68.jpg', 97, 1),
(141, 'vaisseau69.jpg', 'vaisseau69.jpg', 'vaisseau69.jpg', 98, 1),
(142, 'vaisseau70.png', 'vaisseau70.png', 'vaisseau70.png', 99, 1),
(143, 'vaisseau71.png', 'vaisseau71.png', 'vaisseau71.png', 100, 1),
(144, 'vaisseau72.png', 'vaisseau72.png', 'vaisseau72.png', 101, 1),
(145, 'vaisseau73.png', 'vaisseau73.png', 'vaisseau73.png', 102, 1),
(146, 'vaisseau74.jpg', 'vaisseau74.jpg', 'vaisseau74.jpg', 103, 1),
(147, 'vaisseau75.png', 'vaisseau75.png', 'vaisseau75.png', 104, 1),
(148, 'vaisseau76.png', 'vaisseau76.png', 'vaisseau76.png', 105, 1),
(149, 'vaisseau77.png', 'vaisseau77.png', 'vaisseau77.png', 106, 1),
(150, 'vaisseau78.png', 'vaisseau78.png', 'vaisseau78.png', 107, 1),
(151, 'vaisseau79.png', 'vaisseau79.png', 'vaisseau79.png', 108, 1),
(152, 'vaisseau80.png', 'vaisseau80.png', 'vaisseau80.png', 109, 1),
(153, 'vaisseau81.jpg', 'vaisseau81.jpg', 'vaisseau81.jpg', 110, 1),
(154, 'vaisseau82.png', 'vaisseau82.png', 'vaisseau82.png', 111, 1),
(155, 'vaisseau83.jpg', 'vaisseau83.jpg', 'vaisseau83.jpg', 112, 1),
(156, 'vaisseau84.jpg', 'vaisseau84.jpg', 'vaisseau84.jpg', 113, 1),
(157, 'vaisseau85.png', 'vaisseau85.png', 'vaisseau85.png', 114, 1),
(158, 'vaisseau86.jpg', 'vaisseau86.jpg', 'vaisseau86.jpg', 115, 1),
(159, 'vaisseau87.jpg', 'vaisseau87.jpg', 'vaisseau87.jpg', 116, 1),
(160, 'vaisseau88.jpg', 'vaisseau88.jpg', 'vaisseau88.jpg', 117, 1),
(161, 'vaisseau89.jpg', 'vaisseau89.jpg', 'vaisseau89.jpg', 118, 1),
(162, 'vaisseau90.jpg', 'vaisseau90.jpg', 'vaisseau90.jpg', 119, 1),
(163, 'vaisseau91.jpg', 'vaisseau91.jpg', 'vaisseau91.jpg', 120, 1),
(164, 'vaisseau92.jpg', 'vaisseau92.jpg', 'vaisseau92.jpg', 121, 1),
(165, 'vaisseau93.jpg', 'vaisseau93.jpg', 'vaisseau93.jpg', 122, 1),
(166, 'vaisseau94.jpg', 'vaisseau94.jpg', 'vaisseau94.jpg', 123, 1),
(167, 'vaisseau95.jpg', 'vaisseau95.jpg', 'vaisseau95.jpg', 124, 1),
(168, 'vaisseau96.jpg', 'vaisseau96.jpg', 'vaisseau96.jpg', 125, 1),
(169, 'vaisseau97.jpg', 'vaisseau97.jpg', 'vaisseau97.jpg', 126, 1),
(170, 'vaisseau98.png', 'vaisseau98.png', 'vaisseau98.png', 127, 1),
(171, 'vaisseau99.jpg', 'vaisseau99.jpg', 'vaisseau99.jpg', 128, 1);

-- --------------------------------------------------------

--
-- Structure de la table `info_objet`
--

CREATE TABLE `info_objet` (
  `id` int(10) NOT NULL,
  `id_objet` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `info` text COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `info_objet`
--

INSERT INTO `info_objet` (`id`, `id_objet`, `nom`, `info`) VALUES
(1, 13, 'nomSatellite1', 'Arial'),
(2, 13, 'nomSatellite2', 'Magda'),
(3, 13, 'nomSatellite3', 'Aberdeen'),
(4, 13, 'nomSatellite4', 'Ita'),
(5, 13, 'astre', 'Stanton'),
(6, 13, 'juridiction', 'Hurston Dynamics\r\n\r\nUEE'),
(7, 13, 'rayon', '6378'),
(8, 13, 'atmosphere', 'Air à 0.82 atm\r\n100 000 ft'),
(9, 13, 'satellites_naturels', '4'),
(10, 13, 'satellites_artificiels', '4'),
(11, 13, 'biomes', '5'),
(12, 13, 'avant_postes', '7'),
(13, 13, 'usines', '16'),
(14, 14, 'nomSatellite1', 'Daymar'),
(15, 14, 'nomSatellite2', 'Yela'),
(16, 14, 'nomSatellite3', 'Cellin'),
(17, 14, 'nomSatellite4', ''),
(18, 14, 'astre', 'Stanton'),
(19, 14, 'juridiction', 'UEE'),
(20, 14, 'rayon', 'N/A'),
(21, 14, 'atmosphere', ''),
(22, 14, 'satellites_naturels', '3'),
(23, 14, 'satellites_artificiels', ''),
(24, 14, 'biomes', ''),
(25, 14, 'avant_postes', ''),
(26, 14, 'usines', ''),
(27, 15, 'nomSatellite1', 'Lyria'),
(28, 15, 'nomSatellite2', 'Wala'),
(29, 15, 'nomSatellite3', ''),
(30, 15, 'nomSatellite4', ''),
(31, 15, 'astre', ''),
(32, 15, 'juridiction', 'UEE/ArcCorp'),
(33, 15, 'rayon', '800 km'),
(34, 15, 'atmosphere', 'Azote (78,1%)\r\nOxygène (20,9%)\r\nArgon (0.93%)\r\nDioxyde de carbone (0.04%)'),
(35, 15, 'satellites_naturels', '2'),
(36, 15, 'satellites_artificiels', ''),
(37, 15, 'biomes', ''),
(38, 15, 'avant_postes', ''),
(39, 15, 'usines', ''),
(40, 16, 'nomSatellite1', ''),
(41, 16, 'nomSatellite2', ''),
(42, 16, 'nomSatellite3', ''),
(43, 16, 'nomSatellite4', ''),
(44, 16, 'astre', ''),
(45, 16, 'juridiction', ''),
(46, 16, 'rayon', ''),
(47, 16, 'atmosphere', ''),
(48, 16, 'satellites_naturels', ''),
(49, 16, 'satellites_artificiels', ''),
(50, 16, 'biomes', ''),
(51, 16, 'avant_postes', ''),
(52, 16, 'usines', ''),
(53, 17, 'orbite', 'Hurston'),
(54, 17, 'affiliation', 'UEE'),
(55, 17, 'rayon', '345.5 km'),
(56, 17, 'gravite', 'NA'),
(57, 17, 'air', 'Non'),
(58, 17, 'altitude', '20 500 m'),
(59, 17, 'atmosphere', 'Azote 97.7%\r\n\r\nMéthane 1.8%\r\n\r\nHydrogène 0.5%'),
(60, 17, 'rotation', 'NA'),
(61, 17, 'revolution', 'NA'),
(62, 17, 'satellite', '0'),
(63, 18, 'orbite', 'Hurston'),
(64, 18, 'affiliation', 'UEE'),
(65, 18, 'rayon', '275km'),
(66, 18, 'gravite', 'NA'),
(67, 18, 'air', 'Non'),
(68, 18, 'altitude', '16 000 m'),
(69, 18, 'atmosphere', 'Dioxyde de Soufre 89.8% -\r\n\r\nOxyde de soufre 9.3% -\r\n\r\nChlorure de sodium 0.9%'),
(70, 18, 'rotation', 'NA'),
(71, 18, 'revolution', 'NA'),
(72, 18, 'satellite', '0'),
(73, 19, 'orbite', 'Hurston'),
(74, 19, 'affiliation', 'UEE'),
(75, 19, 'rayon', '341 km\r\n\r\n'),
(76, 19, 'gravite', 'NA'),
(77, 19, 'air', 'Non'),
(78, 19, 'altitude', '20.000 m\r\n\r\n'),
(79, 19, 'atmosphere', 'Azote 98.1% -\r\n\r\nMéthane 1.5% -\r\n\r\nHydrogène 0.21% -\r\n\r\nDioxyde de carbone 0.21%'),
(80, 19, 'rotation', 'NA'),
(81, 19, 'revolution', 'NA'),
(82, 19, 'satellite', '0'),
(83, 20, 'orbite', 'Hurston'),
(84, 20, 'affiliation', 'UEE'),
(85, 20, 'rayon', '325 km\r\n\r\n'),
(86, 20, 'gravite', 'NA'),
(87, 20, 'air', 'Non'),
(88, 20, 'altitude', '19 500 m\r\n\r\n'),
(89, 20, 'atmosphere', 'Azote 98.5% -\r\n\r\nMéthane 1.5% -\r\n\r\nMonoxyde de Carbone 0.05%'),
(90, 20, 'rotation', 'NA'),
(91, 20, 'revolution', 'NA'),
(92, 20, 'satellite', '0'),
(93, 21, 'orbite', 'Crusader'),
(94, 21, 'affiliation', 'UEE'),
(95, 21, 'rayon', '260 km\r\n\r\n'),
(96, 21, 'gravite', '0.357G'),
(97, 21, 'air', 'Non'),
(98, 21, 'altitude', 'N/A\r\n\r\n'),
(99, 21, 'atmosphere', 'Dioxyde de soufre (90%) -\r\nMonoxide de soufre (7%) -\r\nDioxigène (3%)'),
(100, 21, 'rotation', '26.68H (en heure standard\r\nterrestre)'),
(101, 21, 'revolution', '7.86 jours (en jour standard\r\nterrestre)'),
(102, 21, 'satellite', '1'),
(103, 22, 'orbite', 'Crusader'),
(104, 22, 'affiliation', 'UEE'),
(105, 22, 'rayon', '295 km\r\n\r\n'),
(106, 22, 'gravite', '0.357G'),
(107, 22, 'air', 'Non'),
(108, 22, 'altitude', '30.000 ft\r\n\r\n'),
(109, 22, 'atmosphere', 'Azote (94,4%) -\r\nMéthane (1,4%) -\r\nHydrogène (0.2%)'),
(110, 22, 'rotation', '14,9H (en heure standard\r\nterrestre)'),
(111, 22, 'revolution', '10,94 jours (en jour standard\r\nterrestre)'),
(112, 22, 'satellite', '1'),
(113, 23, 'orbite', 'Crusader'),
(114, 23, 'affiliation', 'UEE\r\n\r\n'),
(115, 23, 'rayon', '313 km\r\n\r\n'),
(116, 23, 'gravite', '0.357G'),
(117, 23, 'air', 'Non'),
(118, 23, 'altitude', '32.000 ft\r\n\r\n'),
(119, 23, 'atmosphere', 'Dioxygène (100%)\r\n\r\n'),
(120, 23, 'rotation', '10,94H (en heure standard\r\nterrestre)'),
(121, 23, 'revolution', '15,38 jours (en jour standard\r\nterrestre)'),
(122, 23, 'satellite', '1'),
(123, 24, 'orbite', 'ArcCorp'),
(124, 24, 'affiliation', 'UEE/ArcCorp Corporation\r\n\r\n'),
(125, 24, 'rayon', '224 km\r\n\r\n'),
(126, 24, 'gravite', '0.09 atm\r\n\r\n'),
(127, 24, 'air', 'Oui'),
(128, 24, 'altitude', 'Environ 21.000 ft\r\n\r\n'),
(129, 24, 'atmosphere', 'Oxygène (97,7%), Eau (1,5%), Ammoniac (0.77%)\r\n\r\n'),
(130, 24, 'rotation', 'N/A\r\n\r\n'),
(131, 24, 'revolution', 'N/A\r\n\r\n'),
(132, 24, 'satellite', '0'),
(133, 25, 'orbite', 'ArcCorp'),
(134, 25, 'affiliation', 'UEE/ArcCorp\r\n\r\n'),
(135, 25, 'rayon', '283 km\r\n\r\n'),
(136, 25, 'gravite', '0.98G'),
(137, 25, 'air', 'Non'),
(138, 25, 'altitude', 'Environ 28.000 ft\r\n\r\n'),
(139, 25, 'atmosphere', 'Azote (79,5%), dioxygène (19.5), Argon (0.95%),\r\nDioxyde de carbone (0.04%)'),
(140, 25, 'rotation', 'N/A\r\n\r\n'),
(141, 25, 'revolution', 'N/A\r\n\r\n'),
(142, 25, 'satellite', '0'),
(143, 26, 'orbite', 'Microtech'),
(144, 26, 'affiliation', 'UEE'),
(145, 26, 'rayon', '240km'),
(146, 26, 'gravite', 'NA'),
(147, 26, 'air', 'Non\r\n\r\n'),
(148, 26, 'altitude', '25000 m\r\n\r\n'),
(149, 26, 'atmosphere', 'Oxygène -\r\nArgon -\r\nEau'),
(150, 26, 'rotation', '-'),
(151, 26, 'revolution', '-'),
(152, 26, 'satellite', '0'),
(153, 27, 'orbite', 'Microtech'),
(154, 27, 'affiliation', 'UEE'),
(155, 27, 'rayon', '335km'),
(156, 27, 'gravite', 'NA'),
(157, 27, 'air', 'Non'),
(158, 27, 'altitude', '34.000 ft\r\n\r\n'),
(159, 27, 'atmosphere', 'Azote -\r\nDioxygène -\r\n\r\nArgon -\r\nCO²'),
(160, 27, 'rotation', '-'),
(161, 27, 'revolution', '-'),
(162, 27, 'satellite', '0'),
(163, 28, 'orbite', 'Microtech'),
(164, 28, 'affiliation', 'UEE\r\n\r\n'),
(165, 28, 'rayon', '230km'),
(166, 28, 'gravite', 'NA'),
(167, 28, 'air', 'Potentiellement\r\nmais la température empêche\r\nd’enlever sa combinaison'),
(168, 28, 'altitude', '22.000 m\r\n\r\n'),
(169, 28, 'atmosphere', 'Azote -\r\nDioxygène -\r\n\r\nArgon -\r\nCO²'),
(170, 28, 'rotation', 'NA'),
(171, 28, 'revolution', 'NA'),
(172, 28, 'satellite', '0'),
(173, 30, 'forces', 'Très long rayon d\'action.\r\nUne couchette'),
(174, 30, 'faiblesses', 'Seulement 2 SCU de cargo'),
(175, 31, 'forces', 'Très long rayon d\'action.\r\nUne couchette.'),
(176, 31, 'faiblesses', 'Seulement 2 SCU de cargo.\r\nPas assez armé pour un chasseur.'),
(177, 32, 'forces', 'Très long rayon d\'action.\r\nUne couchette.\r\n6 SCU de cargo.'),
(178, 32, 'faiblesses', 'Peu armé.'),
(179, 33, 'forces', 'Rapide.\r\nElégant.\r\nIntérieur aménagé.\r\n8 SCU de cargo.\r\nArmement correct.'),
(180, 33, 'faiblesses', 'Pas de propulseurs VTOL.\r\nPas de possibilité de rentrer avec un caisson.'),
(181, 34, 'forces', 'Scanner amélioré.\r\nRapide.\r\nElégant.\r\nIntérieur aménagé.\r\n12 SCU de cargo.\r\nRayon tracteur.'),
(182, 34, 'faiblesses', 'Pas de propulseurs VTOL.'),
(183, 35, 'forces', 'Bien armé.\r\nTrès rapide.\r\nElégant.\r\nIntérieur aménagé.\r\n4 SCU de cargo.'),
(184, 35, 'faiblesses', 'Pas de propulseurs VTOL.'),
(185, 36, 'forces', 'L\'un des vaisseaux les plus rapides.\r\nElégant.\r\nIntérieur aménagé.\r\nArmement correct pour un vaisseau de course.'),
(186, 36, 'faiblesses', 'Peu de cargo.\r\nPas de propulseurs VTOL.'),
(187, 37, 'forces', 'Le style Origin.\r\nAménagement intérieur.\r\nBien protégé.\r\nAgile pour sa taille.'),
(188, 37, 'faiblesses', 'Peu armé, surtout vers l\'avant.\r\nFaible capacité d\'emport.'),
(189, 38, 'forces', 'Puissance de feu à l\'avant.\r\nDes équipements d\'exploration.\r\nUn véhicule embarqué.\r\nGrand confort pour 5 personnes.\r\nModulaire.\r\nCapacité de vol VTOL.'),
(190, 38, 'faiblesses', 'Grosse cible.\r\nDe la place \"perdue\".'),
(191, 39, 'forces', 'Puissance de feu à l\'avant.\r\nGrand confort pour 8 personnes.\r\nModulaire.\r\nCapacité de vol VTOL.'),
(192, 39, 'faiblesses', 'Grosse cible.'),
(193, 40, 'forces', 'Biplace.\r\nRapide et maniable.\r\nElégant.\r\nL\'un des plus petits vaisseaux avec un moteur quantique.'),
(194, 40, 'faiblesses', 'Fragile.\r\nPas de cargo.\r\nPas d\'utilitaire.\r\nPas de couchettes.'),
(195, 41, 'forces', 'Le plus grand et luxueux des vaisseaux de luxe.\r\nTrès résistant.\r\n480 SCU de cargo.\r\nVaisseau parasite 85X.\r\nSystème de télécommunication.\r\nAménagement intérieur'),
(196, 41, 'faiblesses', 'Attire la convoitise des autres joueurs.\r\nPeu armé pour sa taille.\r\nPas de propulseurs VTOL.'),
(197, 42, 'forces', 'Couvre l\'ensemble du gameplay médical.\r\nModulaire dans son rôle.\r\nDrones de récupération.\r\nRadar performant pour localiser des corps.\r\nCapacité de vol VTOL.'),
(198, 42, 'faiblesses', 'Un vaisseau hyper spécialisé.\r\nNe peut pas traiter un grand flux de patients.\r\nPeu armé.'),
(199, 43, 'forces', 'Couvre l\'ensemble du gameplay médical\r\nModulaire dans son rôle.\r\nDrones de récupération.\r\nRadar performant pour localiser des corps.\r\nCapacité de vol VTOL.'),
(200, 43, 'faiblesses', 'Un vaisseau hyper spécialisé.\r\nNe peut pas traiter un grand flux de patients.\r\nArmement quasi inexistant.'),
(201, 44, 'forces', 'Une arme taille 7 sur un chasseur.\nDe nombreux missiles.\nBien protégé pour sa taille.'),
(202, 44, 'faiblesses', 'Arme fixe uniquement.\r\nPas de couchette.\r\nPas de propulseur VTOL.\r\nPas de cargo.'),
(203, 45, 'forces', 'Une arme taille 7 sur un chasseur.\r\nDe nombreux missiles.\r\nBien protégé pour sa taille.'),
(204, 45, 'faiblesses', 'Arme fixe uniquement.\r\nPas de couchette.\r\nPas de propulseur VTOL.\r\nPas de cargo.'),
(205, 46, 'forces', 'Un chasseur agile et maniable.\r\nDifficile à toucher.\r\nBien armé.'),
(206, 46, 'faiblesses', 'Faible rayon d\'action.\r\nPas de couchette.\r\nPas de cargo.'),
(207, 47, 'forces', 'Une couchette pour les longs voyages.\r\nPeut aller dans des endroits très étroits.\r\nN\'attire pas l\'attention des autres joueurs.\r\nUn point d\'emport utilitaire.\r\nRapide en ligne droite.'),
(208, 47, 'faiblesses', 'Pas tant de cargo que ça.\r\nPeu armé.'),
(209, 48, 'forces', 'Une couchette pour les longs voyages.\r\nPeut aller dans des endroits très étroits.\r\nN\'attire pas l\'attention des autres joueurs.\r\nUn point d\'emport utilitaire.\r\nRapide en ligne droite.'),
(210, 48, 'faiblesses', 'Très peu de cargo.\r\nPeu armé.\r\nPas dans un pack de démarrage.'),
(211, 49, 'forces', 'Une couchette pour les longs voyages.\r\nPeut aller dans des endroits très étroits.\r\nUn point d\'emport utilitaire.\r\nRapide en ligne droite.'),
(212, 49, 'faiblesses', 'Très peu de cargo.\r\nOrienté combat, mais pas trop.'),
(213, 50, 'forces', 'Une couchette en cuir pour les longs voyages.\r\nPeut aller dans des endroits très étroits.\r\nN\'attire pas l\'attention des autres joueurs.\r\nUn point d\'emport utilitaire.\r\nRapide en ligne droite.'),
(214, 50, 'faiblesses', 'Très peu de cargo.\r\nPeu armé.'),
(215, 51, 'forces', 'Une couchette pour les longs voyages.\r\nPeut aller dans des endroits très étroits.\r\nN\'attire pas l\'attention des autres joueurs.\r\nUn point d\'emport utilitaire.\r\nRapide en ligne droite.'),
(216, 51, 'faiblesses', 'Très peu de cargo.\r\nPeu armé.'),
(217, 52, 'forces', 'Très manœuvrable\r\nBonne vitesse.\r\nBonne visibilité.\r\nUne couchette pour les longs trajets.\r\nDe bons points d\'équipement.\r\n6 Cellules pour prisonniers.'),
(218, 52, 'faiblesses', 'Pas de propulseurs VTOL.\r\nFaible rayon d\'action.\r\nPas de cargo.'),
(219, 53, 'forces', 'Très manœuvrable.\r\nBonne vitesse.\r\nBonne visibilité.\r\nUne couchette pour les longs trajets.\r\nCapacité d\'emport d\'un petit véhicule.\r\nDe bons points d\'équipement.'),
(220, 53, 'faiblesses', 'Pas de propulseurs VTOL.\r\nFaible rayon d\'action.'),
(221, 54, 'forces', 'Très manœuvrable.\r\nBonne vitesse.\r\nBonne visibilité.\r\nUne couchette pour les longs trajets.'),
(222, 54, 'faiblesses', 'Pas de propulseurs VTOL.\r\nFaible rayon d\'action.'),
(223, 55, 'forces', 'Très manœuvrable.\r\nBonne vitesse.\r\nBonne visibilité.\r\nUne couchette pour les longs trajets.\r\nDe bons points d\'équipement.\r\nUn générateur à impulsions électromagnétiques.'),
(224, 55, 'faiblesses', 'Pas de propulseurs VTOL.\r\nFaible rayon d\'action.\r\nPas de cargo.'),
(225, 56, 'forces', 'Puissance de feu.\r\nDifficile à détecter.\r\nEfficace avec une seule personne.'),
(226, 56, 'faiblesses', 'Doit être immobile pour tirer.\r\nLent.'),
(227, 57, 'forces', 'Bonne puissance de feu.\r\nTrès manœuvrable.\r\nTrès rapide.'),
(228, 57, 'faiblesses', 'Faible rayon d\'action.\r\nFaible bouclier.\r\nPas de cargo.\r\nPas de couchette.\r\nPas de propulseurs VTOL.'),
(229, 58, 'forces', 'Bien armé pour sa taille.\r\nTrès rapide.\r\nManiable.'),
(230, 58, 'faiblesses', 'Fragile.\r\nPas de siège éjectable.\r\nCourt rayon d\'action.\r\nPas de couchette.\r\nPas de cargo.'),
(231, 59, 'forces', 'Trois passagers.\r\nUn peu de cargo.\r\nMoteur quantique.'),
(232, 59, 'faiblesses', 'Faiblement protégé.\r\nPeu armé.\r\nPas de module de saut.\r\nPas de couchette.'),
(233, 60, 'forces', 'Trois passagers.\r\nUn peu de cargo.\r\nMoteur quantique.'),
(234, 60, 'faiblesses', 'Faiblement protégé.\r\nPeu armé.\r\nPas de module de saut.\r\nPas de couchette.'),
(235, 61, 'forces', 'Très long rayon d\'action.\r\nBons radar et scanner.\r\nConfort pour 6 personnes.\r\nVéhicule, vaisseau et drones d\'exploration.\r\nConteneurs modulaires.\r\n456 SCU de cargo.\r\nCapacité de vol VTOL.'),
(236, 61, 'faiblesses', 'Peu armé.\r\nPlutôt lent.'),
(237, 62, 'forces', 'Hautement modulaire.\r\n576 unités de cargo.\r\nCouchettes pour 4 personnes.'),
(238, 62, 'faiblesses', 'Peu manoeuvrable.\r\nPeu armé.\r\nVue du pilote obstruée sur la droite.'),
(239, 63, 'forces', 'Forte puissance de feu vers l\'avant.\r\nDeux tourelles pour ne laisser aucun angle mort.\r\nBeaucoup de missiles.\r\nCapacité à transporter la plupart des véhicules.\r\nUne capacité d\'emport de 96 unités de cargo.\r\nUn vaisseau parasite P-52 Merlin.\r\n4 couchettes pour les longs trajets.'),
(240, 63, 'faiblesses', 'Peu manœuvrable.\r\nFaible visibilité pour le pilote.\r\nFragile pour sa taille.\r\nVaisseau parasite pas encore implémenté.'),
(241, 64, 'forces', 'Forte puissance de feu vers l\'avant.\r\nDes équipements (scanner et radar) pour l\'exploration.\r\nBeaucoup de missiles.\r\nVéhicule terrestre Ursa Rover.\r\nVaisseau parasite P52 Merlin.\r\nUne capacité d\'emport de 96 unités de cargo.\r\n4 couchettes pour les longs trajets.'),
(242, 64, 'faiblesses', 'Peu manœuvrable.\r\nFaible visibilité pour le pilote.\r\nFragile pour sa taille.\r\nVaisseau parasite pas encore implémenté.\r\nFaible visibilité pour la tourelle inférieure.\r\nAbsence de tourelle pour couvrir l\'arrière et le dessus.'),
(243, 65, 'forces', 'Du confort pour 4 passagers.\r\nBien armé.\r\nUn véhicule terrestre de luxe.\r\nUn vaisseau parasite P-72 Archimedes.\r\nCapacité de vol VTOL.'),
(244, 65, 'faiblesses', 'Peu manœuvrable.\r\nFaible visibilité pour le pilote.\r\nFragile pour sa taille.'),
(245, 66, 'forces', 'Forte puissance de feu vers l\'avant.\r\nCapacité à transporter la plupart des véhicules.\r\nUne bonne capacité d\'emport.'),
(246, 66, 'faiblesses', 'Peu manœuvrable.\r\nFaible visibilité pour le pilote.\r\nFragile pour sa taille.'),
(247, 67, 'forces', 'Grande puissance de feu vers l\'avant.\r\nIntérieur sur un seul niveau.\r\nCompact et fonctionnel.\r\nSoute à cargo de 72 SCU et/ou un véhicule.\r\nRampe d\'accès arrière.\r\nDesign asymétrique original.'),
(248, 67, 'faiblesses', 'Peu armé dans les autres directions que l\'avant.\r\nPlutôt fragile pour sa taille.\r\nDes grandes ailes peu utiles.\r\nPas de propulseurs VTOL.'),
(249, 68, 'forces', 'Meilleur vaisseau de réparation.\r\nConteneur détachable.\r\nCabine de pilotage rotative.\r\nCapacité de vol VTOL.'),
(250, 68, 'faiblesses', 'Peu armé.\r\nHyperspécialisé.'),
(251, 69, 'forces', 'Le plus économique des vaisseaux multijoueurs.\r\nBien armé.\r\nUne soute très pratique.\r\n46 SCU de cargo.\r\nManiable pour sa taille.\r\nUn rayon tracteur.'),
(252, 69, 'faiblesses', 'Fragil.\r\nNécessite un tireur en tourelle pour frapper fort.\r\nPas de toilettes.'),
(253, 70, 'forces', 'Bien armé.\r\nCellules de détention.\r\nManiable pour sa taille.\r\nUn rayon tracteur.\r\n25 SCU de cargo.'),
(254, 70, 'faiblesses', 'Nécessite un tireur en tourelle pour frapper fort.\r\nPas de toilettes.\r\nPas de propulseurs VTOL.'),
(255, 71, 'forces', 'Le plus économique des vaisseaux médicaux.\r\n2 lits médicaux.\r\nRadar longue portée.\r\nCouchettes pour 4 personnes.\r\nBien armé pour son rôle.'),
(256, 71, 'faiblesses', 'Fragile.\r\nNe peut pas traiter les blessures graves.'),
(257, 72, 'forces', 'Rapide.\r\nDeux personnes.\r\n1 SCU de cargo.'),
(258, 72, 'faiblesses', 'Non armé.'),
(259, 73, 'forces', 'Rapide.\r\nMissiles.\r\nGénérateur d\'impulsions électromagnétiques.\r\nSystème de contre-meures.\r\nDeux personnes.'),
(260, 73, 'faiblesses', 'Hyper spécialisé.\r\nPas de cargo.'),
(261, 74, 'forces', 'Un armement polyvalent.\r\nRapide.'),
(262, 74, 'faiblesses', 'Peu protégé.\r\nCentre de gravité élevé.'),
(263, 75, 'forces', 'Conçu pour la course.\r\nDeux personnes.'),
(264, 75, 'faiblesses', 'Uniquement pour la course'),
(265, 76, 'forces', 'Rapide.\r\nDeux personnes.\r\nScanner et stockage de données.\r\nBalises.'),
(266, 76, 'faiblesses', 'Hyperspécialisé.\r\nNon armé.\r\nPas de cargo.'),
(267, 77, 'forces', 'Rapide.\r\nCanon taille 1 sur circulaire à 360°.\r\n3 personnes.'),
(268, 77, 'faiblesses', 'Pas de cargo.'),
(269, 78, 'forces', 'Bon rayon d\'action pour un chasseur léger.\r\nGros bouclier pour sa taille.\r\nBien armé.\r\nConfort pour deux personnes.'),
(270, 78, 'faiblesses', 'Grosse cible sous certains angles.\r\nPas de cargo.\r\nPas de propulseurs VTOL.'),
(271, 79, 'forces', 'Moto biplace.\r\nDifficile à toucher.\r\nBien armé (pour une moto).\r\nDu cargo (pour une moto).'),
(272, 79, 'faiblesses', 'Fragile.\r\nNe peut pas sortir de l\'attraction d\'une planète seul.\r\nPas de couchette.\r\nPas de moteur quantique.'),
(273, 80, 'forces', 'Moto biplace.\r\nDifficile à toucher.\r\nBien armé (pour une moto).\r\nDu cargo (pour une moto).'),
(274, 80, 'faiblesses', 'Fragile.\r\nNe peut pas sortir de l\'attraction d\'une planète seul.\r\nPas de couchette.\r\nPas de moteur quantique.'),
(275, 81, 'forces', 'Torpilles de taille 9.\r\nFurtivité.'),
(276, 81, 'faiblesses', 'Plutôt lent.\r\nRayon d\'action limité.\r\nHyperspécialisé.\r\nPas de cargo.\r\nPas de couchette.'),
(277, 82, 'forces', 'Ultra modulaire.\r\nCabine détachable.\r\nA la pointe des carrières scientifiques et médicales.\r\n500 SCU de cargo.'),
(278, 82, 'faiblesses', 'Ne peut pas tout faire en même temps.\r\nLe \"Workshop\" ne peut pas se poser.\r\nFragile.'),
(279, 83, 'forces', 'Un chasseur équilibré.\r\nLe point d\'emport utilitaire.\r\nForte modularité pour un chasseur.'),
(280, 83, 'faiblesses', 'Faible en énergie.\r\nFaible rayon d\'action.'),
(281, 84, 'forces', 'Un chasseur équilibré.\r\nLe point d\'emport utilitaire.\r\nForte modularité pour un chasseur.'),
(282, 84, 'faiblesses', 'Faible en énergie.\r\nFaible rayon d\'action.\r\nPas de couchette.\r\nPas de propulseurs VTOL.'),
(283, 85, 'forces', 'Un chasseur plutôt résistant.\r\nLe point d\'emport utilitaire.\r\nForte modularité pour un chasseur.\r\nBiplace.\r\nDes composants série de bonne qualité.'),
(284, 85, 'faiblesses', 'Faible en énergie.\r\nFaible rayon d\'action.'),
(285, 86, 'forces', 'Un chasseur plutôt résistant.\r\nLe point d\'emport utilitaire.\r\nForte modularité pour un chasseur.\r\nBiplace.'),
(286, 86, 'faiblesses', 'Centrale à énergie sous dimensionnée.\r\nFaible rayon d\'action.'),
(287, 87, 'forces', 'Un chasseur équilibré.\r\nLe point d\'emport utilitaire.\r\nForte modularité pour un chasseur.\r\nLe radar amélioré.\r\n'),
(288, 87, 'faiblesses', 'Faible en énergie.\r\nFaible rayon d\'action.\r\nPas de couchette.\r\nPas de propulseurs VTOL.'),
(289, 88, 'forces', 'Un chasseur équilibré.\r\nLe point d\'emport utilitaire.\r\nForte modularité pour un chasseur.\r\nTrès furtif.'),
(290, 88, 'faiblesses', 'Faible en énergie.\r\nFaible rayon d\'action.\r\nPas de couchette.\r\nPas de propulseurs VTOL.'),
(291, 89, 'forces', 'Puissance de feu à l\'avant.\r\nBonne résistance.\r\n66 unités de cargo.\r\nLongue endurance.'),
(292, 89, 'faiblesses', 'Mauvaise visibilité pour le pilote.\r\nVéhicules difficile à faire rentrer.\r\nPas très agile.'),
(293, 90, 'forces', 'Bonne résistance.\r\nTrès Longue endurance.\r\nUne raffinerie.\r\nSystèmes de détection améliorés.'),
(294, 90, 'faiblesses', 'Mauvaise visibilité pour le pilote.\r\nPeu de véhicules peuvent entrer dans la soute.'),
(295, 91, 'forces', 'Puissance de feu à l\'avant.\r\nBonne résistance.\r\n120 unités de cargo.\r\nPeut accueillir plusieurs Cyclones.'),
(296, 91, 'faiblesses', 'Mauvaise visibilité pour le pilote.\r\nPas très agile.\r\nGrosse cible.'),
(297, 92, 'forces', 'Puissance de feu à l\'avant.\r\nBeaucoup de missiles.\r\nBonne résistance.'),
(298, 92, 'faiblesses', 'Mauvaise visibilité pour le pilote.\r\nPas très agile.'),
(299, 93, 'forces', 'Le meilleur transport de passagers.\r\nModulaire.\r\nCapacité de vol VTOL.\r\nLong rayon d\'action.\r\n300 SCU de cargo.'),
(300, 93, 'faiblesses', 'Peu protégé.\r\nPeu armé.'),
(301, 94, 'forces', 'Le plus petit torpilleur du jeu.\r\nArmé comme un chasseur.\r\nRésistant.\r\nTorpilles et missiles.'),
(302, 94, 'faiblesses', 'Court rayon d\'action.\r\nPas de couchettes.\r\nPas de cargo.\r\nPeu agile.\r\nLent.\r\nVue du pilote un peu obstruée.'),
(303, 95, 'forces', 'Rapide et maniable.\r\nBonne visibilité.\r\nDifficile à toucher.'),
(304, 95, 'faiblesses', 'Pas de couchette.\r\nCourt rayon d\'action.\r\nPas de cargo.'),
(305, 96, 'forces', 'Deux canons de gros calibre.\r\nManiable.'),
(306, 96, 'faiblesses', 'Fragile'),
(307, 97, 'forces', 'Immense puissance de feu.\r\nBlindage renforcé à l\'avant.\r\nPas d\'angle mort.\r\nUn peu de cargo.\r\nCouchettes et confort minimal.'),
(308, 97, 'faiblesses', 'Nécessite un équipage quasi complet.\r\nVisibilité réduite pour le pilote.\r\nPas adapté au vol en atmosphère.\r\nRéservoirs quantiques limités.\r\nPetit radar pour sa taille.'),
(309, 98, 'forces', 'Rapide.\r\nManiable.\r\nCellule de détention.\r\nGénérateur d\'impulsion électromagnétique.'),
(310, 98, 'faiblesses', 'Pas de couchette.\r\nPas de cargo.\r\nCourt rayon d\'action.'),
(311, 99, 'forces', 'Un vaisseau compact.\r\nLe plus petit transporteur de donnée.\r\nUn couchette.\r\nTrès rapide en ligne droite.'),
(312, 99, 'faiblesses', 'Pas de cargo.\r\nPas de propulseurs VTOL.\r\nPeu manœuvrable.'),
(313, 100, 'forces', 'Capacité à larguer des bombes.\r\nTourelles d\'attaque air-sol.\r\nBlindé.\r\nCapacité à déployer un char Nova.\r\nCapacité VTOL.'),
(314, 100, 'faiblesses', 'Peu adapté au combat spatial'),
(315, 101, 'forces', 'Entrée et sortie de véhicules faciles.\r\nGrande soute à cargo.\r\nCapacité de vol VTOL.\r\nGrand rayon d\'action.\r\nCapacité à transporter des chars Nova.'),
(316, 101, 'faiblesses', 'Peu armé.\r\nPeu blindé.'),
(317, 102, 'forces', 'Entrée et sortie de véhicules faciles, y compris un char Nova.\r\nGrande soute à cargo.\r\nCapacité de vol VTOL.\r\nCapable de se défendre seul contre des chasseurs.'),
(318, 102, 'faiblesses', 'Moins adapté au commerce que le C2'),
(319, 103, 'forces', '48 SCU pour un vaisseau de petite taille.\r\nPeut atterrir.'),
(320, 103, 'faiblesses', 'Peu armé.\r\nFragile.'),
(321, 104, 'forces', '384 SCU pour un vaisseau de taille moyenne.\r\nPeut atterrir.'),
(322, 104, 'faiblesses', 'Peu armé\r\nLent'),
(323, 105, 'forces', '4608 unités de cargo.\r\nPeut tenir à distance quelques chasseurs.'),
(324, 105, 'faiblesses', 'Lent.\r\nNe peut pas atterrir quand il est plein.'),
(325, 106, 'forces', '>20.000 SCU de cargo.\r\nTrès résistant.\r\nPeut tenir à distance la plupart des assaillants.'),
(326, 106, 'faiblesses', 'Lent.\r\nNe peut pas atterrir quand il est plein.'),
(327, 107, 'forces', 'Le plus gros transporteur du jeu.\r\nTracteur résistant.\r\nPeut faire face à plusieurs assaillants.'),
(328, 107, 'faiblesses', 'Très peu manœuvrable.\r\nAttire les convoitises.\r\nCargaison exposée et vulnérable.'),
(329, 108, 'forces', 'Plus forte puissance de feu parmi les chasseurs.\r\nPlutôt manœuvrable.\r\nRapide.'),
(330, 108, 'faiblesses', 'Nécessite deux personnes pour être efficace.\r\nPas de couchettes.\r\nPas de propulseur VTOL.\r\nPas de cargo.'),
(331, 109, 'forces', 'Puissamment armé.\r\nBien protégé.\r\nUn hangar pour 3 chasseurs.\r\nUn vaisseau parasite MPUV.\r\nInfirmerie, prison, salle de briefing, champ de tir, armurerie, salle de repos, mess, quartiers du capitaine.\r\nLits pour 28 membres d\'équipage.\r\nCapacité de vol VTOL.'),
(332, 109, 'faiblesses', 'Nécessite un équipage complet pour être efficace.\r\nPeu manœuvrable.\r\nPuissance de feu concentrée à l\'avant.\r\nPeu modulaire.'),
(333, 110, 'forces', 'Bien armé.\r\nBien protégé.\r\nUn hangar pour 3 chasseurs.\r\nUn vaisseau parasite MPUV.\r\nInfirmerie, prison, salle de briefing, champ de tir, armurerie, salle de repos, mess, quartiers du capitaine.\r\nLits pour 28 membres d\'équipage.\r\nCapacité de vol VTOL.'),
(334, 110, 'faiblesses', 'Peu manœuvrable.\r\nPeu modulaire.'),
(335, 111, 'forces', 'Le plus puissant des torpilleurs.\r\nBeaucoup de grosses tourelles.\r\nExtrêmement résistant.\r\nHangar à vaisseau.\r\nInfirmerie.'),
(336, 111, 'faiblesses', 'Nécessite un équipage important.\r\nTrès lent.\r\nNe peut pas aller dans des champs de gravité trop forts.\r\nCoûteux à l\'usage.'),
(337, 112, 'forces', 'Très manœuvrable.\r\nFortes accélérations dans toutes les directions.\r\nCapacité de vol VTOL.'),
(338, 112, 'faiblesses', 'Moins armé que les autres chasseurs légers.\r\nFaible rayon d\'action.\r\nPas de cargo.\r\nPas de couchette.\r\nPas d\'équipement utilitaire.'),
(339, 113, 'forces', 'Le plus gros porte-vaisseaux pouvant être obtenu par un joueur.\r\nBien armé pour son rôle.\r\n3800 SCU de cargo.\r\nCapacité de vol VTOL.\r\nCapacité à atterrir.'),
(340, 113, 'faiblesses', 'Les vaisseaux transportés ne sont pas protégés par la coque.\r\nPeu d\'équipement utilitaires à l\'intérieur (pas d\'infirmerie, pas de prison...).\r\nBlindage léger.'),
(341, 114, 'forces', 'Le plus gros porte-vaisseaux pouvant être obtenu par un joueur.\r\nBien armé pour son rôle.\r\n10 boutiques configurables.\r\nCapacité de vol VTOL.\r\nCapacité à atterrir.'),
(342, 114, 'faiblesses', 'Les vaisseaux transportés ne sont pas protégés par la coque.\r\nPeu d\'équipement utilitaires à l\'intérieur (pas d\'infirmerie, pas de prison...).\r\nBlindage léger.'),
(343, 115, 'forces', 'Frugalité en équipage.\r\nAptitude à transporter tous les véhicules terrestres.\r\nTransporte trois petits vaisseaux.\r\nLongue endurance.\r\nCapacité de 400 SCU.'),
(344, 115, 'faiblesses', 'Peu armé.\r\nVaisseaux transportés sans protection.'),
(345, 116, 'forces', 'Un des meilleurs vaisseaux de course'),
(346, 116, 'faiblesses', 'Pas de cargo.\r\nPas de couchette.\r\nPeu armé.'),
(347, 117, 'forces', 'Seul vaisseau d\'interdiction.\r\nCouchette.\r\nRapide en ligne droite.'),
(348, 117, 'faiblesses', 'Peu armé.\r\nPas de cargo.\r\nHyperspécialisé.\r\nMal vu des autres joueurs.'),
(349, 118, 'forces', 'Le plus gros vaisseau de transport qui peut atterrir.\r\nPlutôt bien armé pour un transporteur.\r\nUn magasin ambulant.\r\nTechnologies de pointe.\r\nVaisseau prestigieux pour les Banus.\r\nCapacité de vol VTOL.'),
(350, 118, 'faiblesses', 'Hyper-spécialisé dans le commerce.\r\nPeu manœuvrable.'),
(351, 119, 'forces', '96 SCU de cargo.\r\n5 ordinateurs de bord.\r\nCouchettes pour 3 personnes.\r\nSoute \"secrète\".\r\nTransport de données.'),
(352, 119, 'faiblesses', 'Peu armé.\r\nVision du pilote limitée sur la droite.'),
(353, 120, 'forces', 'Source de revenus solide.\r\nConteneurs détachables.\r\nÉquipement de vie pour 4 personnes.\r\nCarrière qui ne nécessite pas de combat.\r\nVTOL.'),
(354, 120, 'faiblesses', 'Peu maniable.\r\nDéfense faible.\r\nMinage impossible depuis le poste de pilotage.\r\n4 personnes nécessaires pour une utilisation optimale.'),
(355, 121, 'forces', 'Un vaisseau parasite avec du cargo.\r\nModulaire.\r\nCapacité de vol VTOL.'),
(356, 121, 'faiblesses', 'Pas de couchette.\r\nPeu de cargo.\r\nPas armé.\r\nFragile.\r\nLent.'),
(357, 122, 'forces', 'Un vaisseau parasite qui transporte 8 personnes.\r\nModulaire.\r\nCapacité de vol VTOL.'),
(358, 122, 'faiblesses', 'Pas de couchettes.\r\nPas armé.\r\nFragile.\r\nLent.\r\nPas de cargo.\r\nPas de moteur quantique.'),
(359, 123, 'forces', 'Une maniabilité comparable à celle d\'un chasseur.\r\nDeux canons taille 2 sur tourelle.\r\nDifficile à toucher.\r\nTrès bonne visibilité pour le pilote.'),
(360, 123, 'faiblesses', 'Fragile.\r\nPeu de cargo.\r\nPas d\'emplacement pour une caisse transportée à la main.\r\nPas de couchette.'),
(361, 124, 'forces', 'Une maniabilité comparable à celle d\'un chasseur.\r\nDeux canons taille 2 sur tourelle.\r\nDifficile à toucher.\r\nTrès bonne visibilité pour le pilote.\r\nUn aménagement intérieur complet.'),
(362, 124, 'faiblesses', 'Fragile.\r\nPas de Cargo.\r\nPas d\'emplacement pour une caisse transportée à la main.'),
(363, 125, 'forces', 'Une maniabilité comparable à celle d\'un chasseur.\r\nUn pod lance roquettes en série.\r\nDeux canons taille 2 sur tourelle.\r\nDifficile à toucher.\r\nTrès bonne visibilité pour le pilote.'),
(364, 125, 'faiblesses', 'Pas de Cargo.\r\nPas d\'emplacement pour une caisse transportée à la main.\r\nPas de couchette.'),
(365, 126, 'forces', 'Des performances pour la compétition.\r\nDifficile à toucher.\r\nTrès bonne visibilité pour le pilote.'),
(366, 126, 'faiblesses', 'Fragile.\r\nPas de Cargo.\r\nPas d\'emplacement pour une caisse transportée à la main.\r\nPeu armé.\r\nPas de couchette.'),
(367, 127, 'forces', 'Une capacité unique de poseur de mine.\r\nDrones récupérateurs de mines.\r\nTourelle taille 7 inédite pour une corvette.\r\nTrois boucliers larges.\r\nMissions longue durée.\r\n24 mines parmi 2 types différents.'),
(368, 127, 'faiblesses', 'Peu manœuvrable.\r\nRepose sur des mines.\r\nPeu polyvalent.'),
(369, 128, 'forces', '24 SCU pour un starter.\r\nBien armé.\r\nIntérieur confortable et utilitaire.\r\nNe touche pas le sol.\r\nTransport d\'un ROC possible.\r\nTrois boucliers.\r\nRayon tracteur.'),
(370, 128, 'faiblesses', 'Cargaison non protégée');

-- --------------------------------------------------------

--
-- Structure de la table `lier_lieu`
--

CREATE TABLE `lier_lieu` (
  `id` int(10) NOT NULL,
  `id_lieu` int(10) NOT NULL,
  `id_lieu_lier` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lieux`
--

CREATE TABLE `lieux` (
  `id_lieu` int(10) NOT NULL,
  `id_objet` int(10) NOT NULL,
  `id_categ_lieu` int(10) NOT NULL,
  `validation` tinyint(1) NOT NULL DEFAULT 0,
  `Habitable` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `lieux`
--

INSERT INTO `lieux` (`id_lieu`, `id_objet`, `id_categ_lieu`, `validation`, `Habitable`) VALUES
(1, 13, 6, 1, 1),
(2, 14, 6, 1, 1),
(3, 15, 6, 1, 1),
(4, 16, 6, 1, 1),
(5, 17, 4, 1, 1),
(6, 18, 4, 1, 1),
(7, 19, 4, 1, 1),
(8, 20, 4, 1, 1),
(9, 21, 4, 1, 1),
(10, 22, 4, 1, 1),
(11, 23, 4, 1, 1),
(12, 24, 4, 1, 1),
(13, 25, 4, 1, 1),
(14, 26, 4, 1, 1),
(15, 27, 4, 1, 1),
(16, 28, 4, 1, 1),
(17, 29, 5, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lieux_risque`
--

CREATE TABLE `lieux_risque` (
  `id` int(10) NOT NULL,
  `id_lieux` int(10) NOT NULL,
  `id_risque` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lieu_espece`
--

CREATE TABLE `lieu_espece` (
  `id` int(10) NOT NULL,
  `id_lieu` int(10) NOT NULL,
  `id_espece` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id_likes` int(10) NOT NULL,
  `id_screen` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matiere_premiere`
--

CREATE TABLE `matiere_premiere` (
  `id` int(10) NOT NULL,
  `id_categorie` int(10) NOT NULL,
  `id_objet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `id` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `prenom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `telephone` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `message` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message_lu`
--

CREATE TABLE `message_lu` (
  `id` int(10) NOT NULL,
  `id_mess` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE `objet` (
  `id` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contenu` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_user` int(10) NOT NULL,
  `id_objet_type` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `validation` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `objet`
--

INSERT INTO `objet` (`id`, `nom`, `contenu`, `id_user`, `id_objet_type`, `date`, `validation`) VALUES
(1, 'S38 ', 'Le S38 est un pistolet balistique de Star Citizen conçu par Behring. C\'est une arme légère et fiable, capable de causer des dommages moyens pour un prix bas. C\'est l\'arme de secours par excellence.\n\n\"La fiabilité de Behring dans une arme de poing\" : c\'est probablement là la meilleure manière de décrire ce pistolet sans prétentions ni extravagance. Une arme fiable, aux dégâts moyens, mais que l\'on est toujours content de trouver à sa taille dans les situations délicates. Ultraléger, il s\'intègre avec discrétion dans tous les sets d’équipements et trouve sa place même dans les plus hautes sphères militaires de Star Citizen.', 2, 1, '2023-02-10 17:13:44', 1),
(2, 'LH86', 'Pistolet design et compact, le LH86 de Gemini est un indispensable pour qui souhaite s\'armer sans passer pour une brute ou un mercenaire. Il occasionnera des dégâts suffisants pour neutraliser une cible ou dissuader un aggresseur.\n\nLe pistolet balistique LH86 est un modèle d\'équilibre et de résistance, dans un compact de calibre 10mm. Produit par la firme Gemini, c\'est une arme accessible qui passe facilement inaperçue aux yeux du grand public, et permet donc de s\'offrir un atout défensif sans attirer tous les regards sur soi. Enfin, son design ergonomique aux contours lissés et sa maniabilité en font une arme de choix dans Star Citizen.\r\n\r\nIl existe deux variantes exclusives du LH86 : Pathfinder et Voyager. Ces deux versions sont réservées aux subscribers et apportent de nouveaux skins.', 2, 1, '2023-02-10 17:13:44', 1),
(3, 'Coda', 'Le pistolet balistique Coda créé par Kastak Arms et surnommé à juste titre \"Canon à main\", est une arme personnel de gros calibre dans Star Citizen.\n\nPistolet balistique à la grosse puissance de feu, le Coda (ou \"canon à main\") peut être considéré comme le Magnum de Star Citizen. Produit par la monstrueuse firme Kastak Arms, Il est majoritairement connu pour son calibre .50mm et son recul puissant, difficile à contrôler. C\'est une arme supposée tirer un seul coup à la fois, tant la capacité de son chargeur est limitée, et le feu continu nécessitant une grande force physique.', 2, 1, '2023-02-10 17:13:44', 1),
(4, 'Arclight II', 'Le pistolet à Énergie Arclight II de Klaus&Werner est l\'arme la plus répandue de star Citizen, puisqu\'il est offert à tous les citoyens lors de leur premier réveil. C\'est une arme à la puissance limitée, mais à la fréquence et à la capacité dépassant tous ses concurrents.\n\nLe pistolet à Energie Arclight II est connu et répandu. C\'est l\'arme de base dans Star Citizen. Elle est conçue par Klaus &Werner ce qui en fait une arme plus que fiable.\r\n\r\nUne version exclusive \"Executive edition\" à la finition en or est offerte à tous les backers ayant atteint le rang de Concierge.', 2, 1, '2023-02-10 17:13:44', 1),
(5, 'P8-SC', 'Avec sa Crosse ajustable, son compensateur, et ses multiples points d\'emport, le P8-SC de Behring ressemble à un couteau suisse tirant des munitions de 10mm. C\'est une arme compacte et légère, qui est devenue le SMG des marines de l\'UEE dès sa mise en production.\n\nBehring a encore frappé ! Avec le P8-SC, le constructeur Terranien de Star Citizen, impose encore un standard dans une nouvelle catégorie : les SMG. Le P8 est sobre, compact, léger et radical à courte portée. Il fut adopté comme SMG par défaut par le corps des Marines de l\'UEE dès sa première sortie d\'usine. Il dispose de nombreuses fonctionnalités telles que sa crosse rétractable ou encore sa poignée typique, qui permet en plus de protéger la main du tireur, de stabiliser l\'arme en cas de feu nourri. Enfin, le P8 embarque des balles de 10mm, calibre répandu sur ce type d\'arme.', 2, 1, '2023-02-10 17:13:44', 1),
(6, 'Custodian', 'Le Custodian est un SMG créé par Kastak Arms. C\'est une arme privilégiée par beaucoup de joueurs, de part son prix faible et sa facilité de prise en main.\n\nLe SMG à énergie de Kastak Arms \"Custodian\" est une arme que l\'on trouve dans beaucoup de builds multi rôles de Star Citizen. Cela s\'explique surtout par son prix bas, mais aussi sa maniabilité et sa facilité d\'utilisation.', 2, 1, '2023-02-10 17:13:44', 1),
(7, 'Lumin V', 'Les experts de Klaus&Werner se surpassent avec l\'arrivée du SMG Lumin V. C\'est une arme imposante pour sa catégorie, mais qui justifie son design taraudé et son poids, par une robustesse et une puissance de feu hors du commun.\n\nKlaus&Werner arrive sur le marché des armes légères de Star Citizen avec le Lumin V. En bref, c\'est un SMG à énergie avec la puissance de feu d\'un fusil d\'assaut. Si elle s\'avère peu efficace à longue et moyenne portée, cette arme fait partie des maîtres du combat rapproché.', 2, 1, '2023-02-10 17:13:44', 1),
(8, 'P4-AR', 'Star Citizen a son lot d\'armes personnelles, et l\'une des plus répandues dans l\'univers est sans aucun doute le P4-AR de l\'équipementier Behring, qui équipe notamment les forces de l\'UEE. C\'est un fusil d\'assaut standard, de qualité, taille et prix moyens.\n\nLe P4-AR est l\'un, si ce n\'est le fusil d\'assaut le plus répandu de Star Citizen. Il équipe les forces armées des Marines et autres corps militaires de l\'UEE et d\'une partie de l\'Advocacy. C\'est une arme balistique abordable, au coût de fabrication moindre, connaissant une production de masse par sa firme créatrice : Behring Applied Technology. Le P4-AR est une arme hautement modulable qui pourra accueillir jusqu\'à quatre modules à la fois.', 2, 1, '2023-02-10 17:13:44', 1),
(9, 'S71', 'Le fusil d\'assaut S71 est une arme maniable et efficace, qui se démarque par un design unique et futuriste. Développée et produite par la firme Gemini, c\'est l\'une des armes les plus en vogue de l\'univers de Star Citizen.\n\nLe port d\'arme est recommandé pour tous les citoyens de Star Citizen, l\'espace étant vaste, il est aussi dangereux. Le S71 de Gemini est une arme tout à fait indiquée pour tout civil souhaitant s\'offrir du matériel de défense fiable et polyvalent à un prix abordable. Le S71 s\'est créé une place particulière dans le cœur des militaires, se démarquant par un calibre de munition unique inférieur à la moyenne, son esthétique et sa précision. Il a la particularité de n\'offrir aucun mode de tir automatique.', 2, 1, '2023-02-10 17:13:44', 1),
(10, 'Karna', 'Les armes à plasma de Star Citizen se veulent rares et puissantes. C\'est donc sans surprise que l\'on en retrouve une parmi la gamme des fusils d\'assaut de Kastak Arms, en l\'occurrence : Le Karna.\n\nLe Karna de Kastak Arms est un puissant fusil d\'assaut à plasma aussi rare que dévastateur. Il a permis à la firme de Selene de se positionner sur le marché du haut de gamme en proposant une arme aux finitions luxueuses, et d\'en faire une des armes les plus populaires de Star Citizen. Il est équipé d\'un mode de tir unique (en plus des 3 principaux : coup par coup, rafale, et automatique) permettant de charger un coup sur la durée pour infliger d\'énormes dégâts.', 2, 1, '2023-02-10 17:13:44', 1),
(11, 'Gallant', 'Le fusil à énergie \"Gallant\" est l\'un des fusils d\'assaut manufacturés par la compagnie Klaus&Werner dans Star Citizen. C\'est une arme fiable et peu chère, qui convient aussi bien à une utilisation défensive que militaire.\n\nLe Gallant est un fusil bien connu des mercenaires et chasseurs de primes de Star Citizen, puisqu\'il équipe la plupart des sociétés de sécurité privées. C\'est une arme à énergie très fiable, fabriquée dans un esprit de tradition par Klaus&Werner. Le Gallant est une arme modulable, qui se démarque par ses batteries haute capacité, et sa faculté à pouvoir tirer en continu et avec précision, même sur des cibles distantes.', 2, 1, '2023-02-10 17:13:44', 1),
(12, 'P6-LR', 'Avec le P6-LR tout nouvellement sorti avec le patch 3.8 de Star Citizen, Behring nous offre enfin une solution d\'armement longue distance. Et pour ne pas changer, le fusil de sniper de Behring écrase la concurrence.\r\n\r\n\n\nBehring fabrique un sniper. Voilà une phrase qui devrait en faire frémir plus d\'un. En effet, si Behring nous a habitué à proposer des armes discrètes et mortelles, ce n\'est absolument pas une surprise de les voir s\'essayer au marché de la longue distance. Avec le P6-LR, ils nous démontrent une fois de plus qu\'ils sont de loin les plus grands experts de Star Citizen en matière d\'armes personnelles balistiques.', 2, 1, '2023-02-10 17:13:44', 1),
(13, 'Hurston', 'La première planète du système stellaire Stanton est Hurston. Elle fut la première à voir apparaître des biomes multiples dans Star Citizen, ainsi que le berceau de la première ville jouable, Lorville. Nous vous proposons un tour d\'horizon de cet astre aux infinies ressources.\n\nStanton I, rapidement renommée Hurston après son achat en 2904, soit une petite année après la revendication du système par L\'UEE, fut par conséquent la première des quatre planètes de Stanton à être vendue à une super-corporation. Elle tire son nom de la firme Hurston Dynamics et de sa PDG Magda Hurston qui en firent l\'acquisition.\n\nCette \"super terre\" présente de nombreux intérêts dans l\'industrie primaire. En effet si son diamètre est similaire à celui de la Terre, sa masse bien supérieure s\'explique par la présence de nombreux métaux au sein de son enveloppe. L\'état actuel d\'Hurston et la destruction ultra rapide de sa biosphère initiale (environ 50 ans) s\'expliquent d\'ailleurs par le nombre ahurissant de mines et usines qui ont pullulé à sa surface durant cette période; en attestent également les conditions de vie dans la ville principale Lorville, présentant une pollution parfois mortelle dans les quartiers les plus bas.\n\nA l\'image d\'ArcCorp, l\'expansion industrielle de la planète figure parmi les plus rapides jamais exécutées. La tour de Lorville par exemple, fut achevée en seulement 4 ans.\n\n\n\n', 2, 3, '2023-02-10 17:13:44', 1),
(14, 'Crusader', 'Crusader est l\'une des planètes du système Stanton dans Star Citizen. Considérée comme une géante gazeuse, il appartient à l\'entreprise Crusader Industries qui profite de sa haute atmosphère pour bâtir ses vaisseaux comme le Starliner.\n\nCrusader (autrement appelée Stanton II) est l\'une des planète du système Stanton de Star Citizen.\n\nA l\'origine la géante gazeuse se prêtait mal à l\'activité humaine. Voyant qu\'elle présentait un coeur rocheux, l\'UEE a tout mis en oeuvre afin d\'essayer de terraformer la planète. Ces tentatives échouèrent et seule la haute atmosphère était devenue respirable.\r\nCette situation représentait une aubaine inespérée pour Crusader Industries. De grands réseaux de villes flottantes, à destination militaire au départ, sont créées.\n\nLa faible densité de l\'atmosphère permet notamment à la firme de pouvoir créer, à haute-altitude, de nombreux vaisseaux dont la conception aurait dû être faite hors atmosphère sur d\'autres planètes. Cette situation inédite permet de réduire drastiquement les coûts de certains vaisseaux comme le Starliner par exemple. La compagnie parle d\'une économie de 40% des coûts de fabrication. Elle est ensuite répercutée sur le prix de vente au consommateur.\n\nLa société offre aussi un cadre de vie idyllique à ses salariés sur Crusader. Avec des logements en dômes à haute altitude, les collaborateurs profitent d\'une vue unique sur la planète.\r\nCrusader Industries a également développé le tourisme. Si de somptueuses villes ont été érigées pour les visiteurs, les chantiers navals offrent aussi un spectacle ahurissant avec ses imposants vaisseaux suspendus dans les airs.\n\n', 2, 3, '2023-02-10 17:13:44', 1),
(15, 'ArcCorp', 'L\'arrivée du patch 3.5 de Star Citizen apporte plusieurs nouveautés majeures et la présence d\'ArcCorp dans le patch est certainement la plus importante.\n\nArcCorp (autrement appelée Stanton III) est l\'une des planètes du système Stanton de Star Citizen. Contrôlée par la ArcCorp Corporation, c\'est l\'une des planètes abritant le moins de végétation de tout son système.\n\nLa planète fut découverte en 2903 par l\'UEE, en même temps que l\'ensemble des autres astres du système. La colonisation impliqua un retrait des terres possédées par les populations autochtones. Elle furent ensuite vendues à ArcCorp Corporation en 2920 qui lui donna son nom.\n\nLa planète est entièrement terraformée et ne laisse quasiment aucune place à la végétation. Il faut dire que lors de son acquisition, ArcCorp corporation a décidé d\'en tirer pleinement profit. La compagnie à divisé ses terres en multiples parcelles qu\'elle a ensuite mis à disposition d\'autres sociétés.\n\nBeaucoup d\'anthropologistes estiment que la planète en l\'état actuel est le plus proche équivalent des mondes usines Xi\'An. Elle représente un vrai espoir pour tous ceux qui souhaitent un jour que la race humaine évolue vers ce stade d\'avancement technologique.\n\n', 2, 3, '2023-02-10 17:13:44', 1),
(16, 'Microtech', 'Microtech est la quatrième planète du système Stanton dans Star Citizen. Elle est détenue par la firme du même nom. C\'est une planète gelée présentant une majorité de glaciers et de magnifiques toundras polaires. Elle possède trois lunes et une zone d\'atterrissage principale : New Babbage.\n\nDans Star Citizen, la planète Microtech est le fief de la méga-corporation éponyme, spécialisée dans la production de composants électroniques. Si la société est connue pour de multiples accomplissements tels que la fabrication et la distribution de l\'incontournable MobiGlas, la planète a été moins chanceuse. Victime d\'une erreur de calibrage lors de sa terraformation, elle est aujourd\'hui gelée sur la majorité de sa surface. Cependant, l\'endroit n\'a pas été délaissé pour autant, et nombreuses sont les entreprises en quête de développement qui s\'y implantent, tant cet espace est devenu le fleuron de la recherche et du développement en électronique de pointe.\n\nLa firme Microtech ne s\'est pas seulement enrichie grâce au succès du MobiGlas, elle peut aussi se targuer d\'équiper la majorité des vaisseaux les plus communs de l\'UEE en composants avioniques .\n\nLa planète possède une zone d\'atterrissage, faisant office de siège social pour l\'entreprise : New-Babbage\n\nElle possède également trois lunes : Calliope, Clio et Euterpe.\n\n', 2, 3, '2023-02-10 17:13:44', 1),
(17, 'Arial, première lune d\'Hurston', 'Dans Star Citizen, Arial est le satellite le plus proche de sa planète, Hurston. Son atmosphère est inhospitalière.\n\nPremière lune de la planète Hurston, Arial porte le nom d\'Arial Hurston, troisième PDG de la Firme Hurston Dynamics. Il fut connu pour avoir mis en place un système d\'emploi controversé, permettant à des entreprises de posséder ses employés.\n\n L\'atmosphère d\'Arial est nocive car composée à 98% d\'azote.', 2, 3, '2023-02-10 17:13:44', 1),
(18, 'Aberdeen, seconde lune d\'Hurston', 'Dans Star Citizen, Aberdeen est le deuxième satellite le plus proche de sa planète, Hurston. Son Atmosphère est inhospitalière.\n\nLe scientifique Aberdeen Hurston, créateur du premier missile à antimatière, a donné son nom au second satellite naturel de Stanton I. L\'oxyde et le dioxyde de souffre qui composent 99% de son atmosphère, lui valent sa teinte dorée si particulière. On pourra trouver de petits amas d\'astéroïdes et des débris sur son orbite.\n\nAberdeen abrite deux avant-postes miniers: HDMS Noorgard et HDMS Anderson.', 2, 3, '2023-02-10 17:13:44', 1),
(19, 'Magda, troisième lune d\'Hurston', 'Dans Star Citizen, Magda est le deuxième satellite le plus éloigné de sa planète, Hurston. Son Atmosphère est inhospitalière.\n\nMagda Hurston, Ancienne PDG d\'Hurston Dynamics, est à l\'origine de la décision de la firme d\'acquérir la planète Stanton I. C\'est logiquement que son nom fut donné au troisième satellite de la planète. Son orbite est l\'un des lieux ou l\'on trouvera l\'une des station spatiales détruites.\n\nL\'atmosphère est nocive sur Magda puisque composée à 98% d\'azote.', 2, 3, '2023-02-10 17:13:44', 1),
(20, 'Ita, quatrième lune d\'Hurston', 'Dans Star Citizen, Ita est le satellite le plus éloigné de sa planète: Hurston. Son Atmosphère est inhospitalière.\n\nIta possède une symbolique particulière pour la firme d\'armement Hurston Dynamics. En effet le satellite porte le nom d\'Ita Hurston, militaire ayant péri lors de la première guerre Tevarin. Elle s\'en sert comme \"Souvenir marquant l\'importance des produits HurstonDynamics \". Son orbite est l\'un des lieux ou l\'on trouvera l\'une des station spatiales détruites.\n\nSon atmosphère est nocive car constituée à 98% d\'azote.\r\n\r\nA sa surface, on pourra trouver deux avant-postes miniers: HDMS Woodruff et HDMS Ryder.', 2, 3, '2023-02-10 17:13:44', 1),
(21, 'Cellin, lune de Crusader', 'Cellin est l\'une des lune de Crusader dans Star Citizen. Réputée pour ses volcans endormis et ses geysers surpuissants, il est difficile de la parcourir. Avec le Security Post Kareah orbitant autour d\'elle, c\'est un point stratégique pour tous les contrebandiers aux alentours.\n\nCellin (autrement appelée Stanton 2a) est l\'une des lunes orbitant autour de Crusader sur Star Citizen.\n\nSon nom est tiré d\'un conte pour enfant du 24ème siècle, \"Un cadeau pour Baba\". Dans cette histoire, Cellin est la benjamine d\'une fratrie de trois enfants (avec Yela et Daymar) qui part seule de Mars en direction d\'Europe, une des lunes de Jupiter afin de rendre visite à leur grand mère.\r\nLa lune a été baptisée du nom de la petite dernière en raison de son caractère tumultueux et agressif, représenté par les nombreux cratères et volcans de la lune.', 2, 3, '2023-02-10 17:13:44', 1),
(22, 'Daymar, lune de Crusader', 'Daymar est la plus grande lune de Crusader dans l\'univers de Star Citizen. Réputée pour ses nombreux et sinueux canyons, elle fait le bonheur des commerçants s\'approvisionnant en minerai. Ses températures clémentes lui permettent aussi d\'attirer bon nombre de touristes en quête de dépaysement.\n\nDaymar (autrement appelée Stanton 2b) est l\'une des lunes orbitant autour de Crusader sur Star Citizen.\r\n\r\nSon nom est tiré d\'un conte pour enfants du 24ème siècle, \"Un cadeau pour Baba\". Dans cette histoire, Daymar est la cadette d\'une fratrie de trois enfants (avec Cellin et Yela) qui part seule de Mars en direction d\'Europe, une des lunes de Jupiter afin de rendre visite à leur grand-mère.\r\nLa lune a été baptisée du nom du deuxième enfant par rapport à son don.\n\nLe nom a été choisi par Kelly Kaplan au moment du rachat de la planète Crusader par l\'entreprise qui porte le même nom. Voulant développer le tourisme et générer plus de revenus avec les lunes, il décida de les aménager et leur donner un nom que tous les citoyens pourraient retenir facilement.\r\n\r\n', 2, 3, '2023-02-10 17:13:44', 1),
(23, 'Yela, lune de Crusader', 'Yela est l\'une des lunes de la planète Crusader sur Star Citizen. Abritant tout un tas de ressources naturelles, elle est également un lieu privilégié pour les revendeurs de widow grâce au laboratoire Jumptown. Petit tour d\'horizon de la lune glacée dans cet article dédié.Yela (autrement appelée Stanton 2c) est l\'une des lunes orbitant autour de Crusader sur Star Citizen.\n\nSon nom est tiré d\'un conte pour enfant du 24ème siècle, \"Un cadeau pour Baba\". Dans cette histoire, Yela est la soeur aînée d\'une fratrie de trois enfants (avec Cellin et Daymar) qui part seule de Mars en direction d\'Europe, une des lunes de Jupiter afin de rendre visite à leur grand mère.\r\nLa lune a été baptisée du nom de la soeur aînée pour son tempérament froid et calculateur, correspondant assez bien aux sols de la lune.\n\nC\'est Kelly Kaplan, PDG de Crusader industries qui aurait décidé du nom de cette lune. Lors du rachat par sa compagnie de la planète Crusader à l\'UEE, il avait comme objectif de développer l\'activité touristique de sa planète gazeuse et utilisant ses lunes. Leur nom (dont Yela) a donc été donné en hommage à ce conte bien connu de tous pour que ces dernières soient attrayantes et faciles à retenir.', 2, 3, '2023-02-10 17:13:44', 1),
(24, 'Lyria, lune d\'ArcCorp', 'Lyria est l\'une des lunes de ArcCorp et implantée au patch 3.5 de Star Citizen. Réputée pour ses cryovolcans et cryogeysers elle abrite aussi à sa surface de l\'eau à l\'état liquide. Découvrez tout les détails de Lyria dans cet article dédié.\r\n\r\n\n\nLyria (autrement appelée Stanton 3a) est l\'une des lunes orbitant autour de ArcCorp sur Star Citizen.\n\nCette lune est notamment réputée pour ses cryogeysers et cyrosvolcans. Elle est entièrement recouverte de glace lui donnant un atmosphère froid mais humide', 2, 3, '2023-02-10 17:13:44', 1),
(25, 'Wala, lune d\'ArcCorp', 'Wala est une des deux lunes d\'ArcCorp, la nouvelle planète du système Stanton. La lune est d\'ailleurs réputée pour ses cristaux qui lui donnent, vu du ciel, une couleur turquoise toute particulière.\n\nWala (autrement appelée ArcCorp 3b) est l\'une des lunes orbitant autour de ArcCorp sur Star Citizen.\n\nLa surface de la lune est stérile mais présente des affleurements de minéraux ressemblant à des géodes.\r\nElle dispose d\'une faible densité ce qui facilite la tâche des pilotes pour manœuvrer à sa surface.', 2, 3, '2023-02-10 17:13:44', 1),
(26, 'Calliope, Lune de Microtech', 'Microtech possède trois satellites naturels, tous au moins aussi inhospitaliers que leur planète parente. Cependant, aucune n\'est dénuée d\'intérêt ! Nous vous présentons donc aujourd\'hui, Calliope, lune de Microtech.\n\nCalliope (autrement appelée Stanton 4a) est l\'une des lunes orbitant autour de Microtech dans Star Citizen.\r\nC\'est un satellite gelé ou la température extérieure avoisine les -120 degrés. Il est donc fortement recommandé de vous équiper d\'une armure contre le froid en cas d\'expédition prolongée à sa surface.\n\nSa surface est très riche en minéraux, ce qui en fait un lieu de minage parfait, aussi bien à pied qu\'en vaisseau. En effet, si l\'on trouve aisément des filons en surface, on pourra également se rendre dans l\'une des grottes logées sous sa surface, pour en extraire le minerai, ou réaliser une mission de recherche. Attention, aucune grotte n\'est répertoriée, il vous faudra au préalable accepter une mission pour en situer l\'entrée.', 2, 3, '2023-02-10 17:13:44', 1),
(27, 'Clio, Lune de Microtech', 'Microtech est une planète de Star Citizen qui possède trois satellites naturels, chacun d\'entre eux possède se particularités, c\'est pourquoi nous vous présentons aujourd\'hui : Clio, la seconde lune de Microtech.\n\nAvec son océan d\'émeraude, et ses montagnes offrant des panoramas spectaculaires, Clio paraît au premier abord être une destination touristique rêvée. Son atmosphère est inhospitalière et froide, et même si celle-ci est composée d\'azote et d\'oxygène, elle n\'est en aucun cas respirable. Tout mineur qui se respecte aura l\'occasion d\'y passer quelques heures fructueuses, et les marchands pourront y trouver leur compte, lors de leur passage dans l\'orbite de Microtech.\n\nL\'atmosphère de la planète se situe à une température moyenne de -55 degrés. Ces conditions ne vous forcent pas à vous équiper d\'une armure environnementale, car de nombreuses autres armures présentent un seuil de sécurité allant jusqu\'à -75°.\r\n\r\nEnfin, quelques grottes non-répertoriées trouent la surface de Clio, et les expéditions en profondeur pourront porter des fruits financiers en mettant à profit le minage à pied.', 2, 3, '2023-02-10 17:13:45', 1),
(28, 'Euterpe, lune de Microtech', 'Euterpe est la lune la plus éloignée de sa planète Microtech dans Star Citizen. Elle possède plusieurs particularité comme la fait de ne posséder aucun avant-poste ou encore le fait de posséder une atmosphère suffisamment riche en oxygène pour recharger vos bombonnes.\n\nEuterpe est très froide (entre -80 et -125 degrés) assurez vous donc de vous équiper de votre armure environnementale avant d\'en explorer la surface. Cette lune particulière alterne entre étendues gelées et plaines rocheuses, sans relief prononcé, et est la seule lune de Star Citizen à ne présenter aucun marqueur à sa surface. \n\nSeuls le minage et les missions de recherche sont susceptibles de vous emmener sur Euterpe, et elle restera longtemps hors des radars tant le reste de l\'espace de Microtech est riche.\r\nNous avons relevé les coordonnées d\'une grotte sur Euterpe : OM-1 : 340km ; OM-4 : 305.9km ; OM-6 : 152.9km', 2, 3, '2023-02-10 17:13:45', 1),
(29, 'Area18', '[h1]Le Ryker Memorial Spaceport[\\h1]\n\n[h1]L\'ArcCorp Cityflight[\\h1]\n\n[h1]ArcCorp Plaza[\\h1]\n\n[h1]Les consoles[\\h1]\n\n[h1][\\h1]\n\nArea18 est la première ville d\'ArcCorp dans Star Citizen. Implantée au patch 3.5, elle est largement inspirée de New York avec ses hauts buildings et ses gigantesques panneaux publicitaires. \n\n\n\nPrincipal port commercial de la planète, il abrite également le quartier général de l\'ArcCorp Corporation. Pour assurer la sécurité des lieux, la célèbre entreprise BlackJac Security a été engagée. Néanmoins, il est fortement conseillé en cas de problème de se rendre aux bureaux de l\'UEE Advocacy.\n\nElle est divisée en deux quartiers à l\'heure actuelle : le Ryker Memorial Spaceport et l\'ArcCorp Plaza. Ils sont reliés entre eux par un réseau de bus volants : l\'ArcCorp Cityflight.\n\nPoint d\'entrée de la cité, il sera également votre premier contact avec le nouveau lieu de la 3.5. Il dispose de hangars semblables à ceux qui peuvent être trouvés sur Lorville.\n\nA l\'intérieur vous retrouverez tout le confort des grands spaceports. De plus, une zone spécifique aux vols commerciaux est aussi indiquée. Elle n\'est pour l\'instant pas accessible en jeu.\n\nPlusieurs consoles de vaisseaux sont disponibles dans le hall principal. Vous trouverez également un espace VIP avec des prestations à la hauteur du standing. Plusieurs grandes baies vitrées sont aussi éparpillées aux quatre coins du terminal, donnant une magnifique vue de la ville et de ses imposants buildings.\nIl dispose d\'un accès direct à l\'ArcCorp Plaza en empruntant l\'ArcCorp Cityflight, la ligne de bus volants.\n\nL\'ArcCorp Cityflight est la ligne de bus volante reliant les différents quartiers d\'Area18. Il ne dispose que d\'une seule ligne actuellement. Elle relie le Ryker Memorial Spaceport à l\'ArcCorp Plaza.\n\nSur chaque station vous retrouverez deux quais, permettant d\'accélérer le trafic. Les temps d\'attentes entre rames est à peu près identique à celui du métro de Lorville.\r\nA chaque extrémité des rames vous pourrez retrouver de grandes baies vitrés vous permettant de profiter de la vue.\n\nComme Lorville, Area18 est un important espace d\'échange du système Stanton. Elle dispose de pas moins de 22 consoles d\'achat et vente au Jobwell situé dans le quartier du Plaza.\r\nVous pouvez aussi décharger vos Prospector en vous rendant dans les bureaux d\'ArcCorp Corporation\n\nVous êtes maintenant prêts à vous élancer dans la cité. Attention cependant à ne pas vous perdre dans les recoins sinueux de certaines zones autour du Plaza. Et prenez sur vous une paire de lunettes, vous risquez d\'en prendre plein les yeux !', 2, 3, '2023-02-10 17:13:45', 1),
(30, '100i', 'Il s\'agit de la version \"voyage\" de la gamme 100, une série de vaisseaux de démarrage haut de gamme, ayant la particularité d\'avoir de base un système de raffinage de gaz intégré leur conférant un grand rayon d\'action.', 2, 2, '2023-02-10 17:13:45', 1),
(31, '125a', 'Il s\'agit de la version \"combat\" de la gamme 100, une série de vaisseaux de démarrage haut de gamme, ayant la particularité d\'avoir de base un système de raffinage de gaz intégré leur conférant un grand rayon d\'action.\r\n\r\nPar rapport à la version de base, le 125a est doté de deux missiles.', 2, 2, '2023-02-10 17:13:45', 1),
(32, '135c', 'Il s\'agit de la version \"transport\" de la gamme 100, une série de vaisseaux de démarrage haut de gamme, ayant la particularité d\'avoir de base un système de raffinage de gaz intégré leur conférant un grand rayon d\'action.\r\n\r\nPar rapport à la version de base, le 135c peut porter 4 SCU supplémentaires.', 2, 2, '2023-02-10 17:13:45', 1),
(33, '300i', 'Il s\'agit de la variante \"voyage\" de la gamme 300, une série de vaisseaux de luxe monoplaces, rapides, et disposant d\'un intérieur aménagé. Comme tous les vaisseaux du constructeur Origin, les 300 se veulent élégants et spacieux.\r\n\r\nLa version 300i est dotée en série de 2 canons taille 3, et d\'un canon taille 2 sur pivot. Il possède également deux missiles taille 2.', 2, 2, '2023-02-10 17:13:45', 1),
(34, '315p', 'Il s\'agit de la variante \"exploration\" de la gamme 300, une série de vaisseaux de luxe monoplaces, rapides, et disposant d\'un intérieur aménagé. Comme tous les vaisseaux du constructeur Origin, les 300 se veulent élégants et spacieux.\n\nLa version 315p est caractérisée par un scanner amélioré et un rayon tracteur. Il est aussi dotée en série de 2 canons taille 3. Il possède également deux missiles taille 2.', 2, 2, '2023-02-10 17:13:45', 1),
(35, '325a ', 'Il s\'agit de la variante \"combat\" de la gamme 300, une série de vaisseaux de luxe monoplaces, rapides, et disposant d\'un intérieur aménagé. Comme tous les vaisseaux du constructeur Origin, les 300 se veulent élégants et spacieux.\r\n\r\nLa version 325a est dotée en série d\'un canon taille 4 et 2 canons taille 3, tous sur pivot. Il possède également quatre missiles taille 3 et quatre missiles taille 2.', 2, 2, '2023-02-10 17:13:45', 1),
(36, '350r', 'Il s\'agit de la variante \"course\" de la gamme 300, une série de vaisseaux de luxe monoplaces, rapides, et disposant d\'un intérieur aménagé. Comme tous les vaisseaux du constructeur Origin, les 300 se veulent élégants et spacieux.\r\n\r\nLa version 350r possède un moteur supplémentaire lui donnant l\'une des plus grandes vitesses du jeu et faisant de lui l\'un des meilleurs vaisseaux de course. En contrepartie, le 350r ne peut emporter que 4 SCU de cargo et son intérieur est moins spacieux.', 2, 2, '2023-02-10 17:13:45', 1),
(37, '400i', 'Il s\'agit d\'un vaisseau d\'exploration de taille moyenne, permettant à un équipage de trois personnes de voyager avec confort sur de longues distances. Le vaisseau est considéré comme un compétiteur du Constellation et du Corsair. Il est moins armé mais plus maniable que ses concurrents.\r\n\r\nLe 400i dispose d\'un garage pour une moto X1, ainsi qu\'une soute pouvant transporter 42 SCU ou un petit véhicule.', 2, 2, '2023-02-10 17:13:45', 1),
(38, '600i Explorer', 'Il s\'agit de la variante d\'exploration de la gamme 600i, une série de vaisseaux luxueux, spacieux et confortables. Pour remplir sa fonction, le 600i est doté de scanners, d\'une sphère holographique et d\'un véhicule d\'exploration.\r\n\r\nCôté armement, le 600i dispose de 3 puissants canons vers l\'avant et de deux tourelles pour couvrir toutes les directions.\r\n\r\nLe 600i Explorer peut être transformé en 600i Touring grâce à sa modularité.', 2, 2, '2023-02-10 17:13:45', 1),
(39, '600i Touring', 'Il s\'agit de la variante voyage de la gamme 600i, une série de vaisseaux luxueux, spacieux et confortables. Pour remplir sa fonction, le 600i Touring est doté d\'une salle de jeu et de 4 chambres privatives de luxe.\r\n\r\nCôté armement, le 600i dispose de 3 puissants canons vers l\'avant et de deux tourelles pour couvrir toutes les directions.\r\n\r\nLe 600i Touring peut être transformé en 600i Explorer grâce à sa modularité.', 2, 2, '2023-02-10 17:13:45', 1),
(40, '85X', 'C\'est un vaisseau initialement conçu pour la course, mais finalement utilisé comme vaisseau parasite du 890 Jump. Très rapide et maniable, il dispose de quelques armes également, ce qui peut en faire un intercepteur léger. C\'est le seul vaisseau parasite doté d\'un moteur quantique.\r\n\r\nIl ne dispose d\'aucun emplacement de stockage ni d\'aucun port utilitaire', 2, 2, '2023-02-10 17:13:45', 1),
(41, '890 Jump', 'Il s\'agit d\'un yacht de luxe destiné à emmener de riches personnes dans des croisières interstellaires. Il est également prisé par les riches personnalités : stars, politiciens, artistes et présidents de méga-corporations, qui voyagent dans ce vaisseau pour le confort et pour leur image.\r\n\r\nLe 890 Jump accueille de série un vaisseau parasite 85X, et peut en accueillir un second. Le vaisseau est très résistant grâce à ses boucliers capitaux et sa coque en graphène, mais est peu armé pour sa taille, avec seulement quatre tourelles canons et quatre tourelles lance-missiles. Il dispose également d\'un système de télécommunication longue portée sécurisé.\r\n\r\nA l\'intérieur, le vaisseau dispose d\'une suite du maître et de quatre chambres pour invités, très confortables, d\'un restaurant, d\'un bar, d\'un spa avec jacuzzi, piscine et sauna, et d\'une cuisine professionnelle. L\'équipage du vaisseau, lui, dispose de sept couchettes plus spartiates, d\'une pièce de vie et d\'une salle de divertissement.', 2, 2, '2023-02-10 17:13:45', 1),
(42, 'Apollo Medivac', 'Ce vaisseau est spécialisé pour les opérations de secours aux personnes. Il dispose de deux pièces médicales modulaires, pouvant être configurées pour le traitement soit pour le traitement de plusieurs blessés légers soit pour l\'opération d\'un blessé en urgence vitale.\r\n\r\nIl dispose également de drones pouvant récupérer un blessé ou un corps flottant dans l\'espace pour le ramener dans le vaisseau.\r\n\r\nPar rapport à la variante Triage, l\'Apollo Medivac sacrifie de la vitesse pour plus de blindage et de missiles.', 2, 2, '2023-02-10 17:13:45', 1),
(43, 'Apollo Triage', 'Ce vaisseau est spécialisé pour les opérations de secours aux personnes. Il dispose de deux pièces médicales modulaires, pouvant être configurées soit pour le traitement de plusieurs blessés légers soit pour l\'opération d\'un blessé en urgence vitale.\r\n\r\nIl dispose également de drones pouvant récupérer un blessé ou un corps flottant dans l\'espace pour le ramener dans le vaisseau.\r\n\r\nPar rapport à la variante Medivac, l\'Apollo Triage est moins armé et blindé, mais plus rapide.', 2, 2, '2023-02-10 17:13:45', 1),
(44, 'Ares Inferno', 'Il s\'agit de la variante canon balistique du Ares, un vaisseau de combat monoplace de taille moyenne produit par Crusader Industrie\r\n\r\nPar rapport à la version Ion, l\'Inferno bénéficie d\'un meilleur blindage contre les armes balistiques pour résister aux défenses anti-aériennes.\r\n\r\nCe chasseur lourd a la particularité de ne posséder qu\'une seule arme fixe, un canon de taille 7 de type Gatling qui délivre un déluge de feu pour stopper une flotte de petits vaisseaux ou perforer la coque de vaisseaux bien plus grands. Le vaisseau n\'a pas d\'intérieur ni de couchette. Les composants sont accessibles depuis l\'extérieur.', 2, 2, '2023-02-10 17:13:45', 1),
(45, 'Ares Ion', 'Il s\'agit de la variante canon à énergie du Ares, un vaisseau de combat monoplace de taille moyenne produit par Crusader Industries. Par rapport à la version Inferno, la version Ion est basée sur une arme énergétique plutôt que balistique. Le Ares Ion présente une armure plus légère, mais dispose d\'une centrale énergétique et d\'un refroidisseur supplémentaires.\r\n\r\nCe chasseur lourd a la particularité de ne posséder qu\'une seule arme fixe, mais celle-ci est un impressionnant canon à énergie de taille 7, d\'une grande précision, pouvant faire tomber les boucliers de vaisseaux de grande taille. Le vaisseau n\'a pas d\'intérieur ni de couchette. Les composants sont accessibles depuis l\'extérieur.', 2, 2, '2023-02-10 17:13:45', 1),
(46, 'Arrow', 'C\'est un chasseur léger, misant sur sa maniabilité et sa puissance de feu plutôt que sur la résistance. Il dispose de trois points d\'emport d\'armes et de quatre points d\'emport de missiles. Comme les autres chasseurs (gamme Hornet et Hurricane) du constructeur Anvil, l\'Arrow reprend un point d\'emport central avec une tourelle téléopérée.\r\n\r\nC\'est un vaisseau à court rayon d\'action, conçu pour opérer depuis un porte vaisseau.', 2, 2, '2023-02-10 17:13:45', 1),
(47, 'Aurora CL', 'Cet Aurora dispose d\'un point d\'accroche utilitaire de taille double par rapport à tous les autres Auroras. Cela lui permet d\'être équipé d\'une caisse de transport contenant 6 SCU. Il est donc naturellement dédié au transport de marchandises.\r\n\r\nComme tous les Auroras, il dispose d\'une couchette.', 2, 2, '2023-02-10 17:13:45', 1),
(48, 'Aurora ES', 'C\'est le moins cher de la gamme des Aurora. On ne peut que l\'acheter en plus d\'un autre vaisseau car il n\'y a pas de pack de démarrage associé.\r\n\r\nIl a le même potentiel d\'évolution que l\'Aurora MR, mais commence avec des composants de moins bonne qualité.\r\n\r\nOn y retrouve la couchette pour les longs voyages, les quatre points d\'accroche pour des armes de petit calibre et le point d\'emport utilitaire pour transporter du matériel ou des produit à échanger. C\'est un vaisseau qui permet de se déplacer à moindre frais.', 2, 2, '2023-02-10 17:13:45', 1),
(49, 'Aurora LN\r\n\r\n', 'Sans rien sacrifier par rapport à l\'Aurora MR, l\'Aurora LN apporte des canons de taille supérieure et un meilleur emport de missiles. Il est également livré avec de meilleurs composants orientés combat.', 2, 2, '2023-02-10 17:13:45', 1),
(50, 'Aurora LX', 'C\'est la version luxe de la gamme Aurora, doté d\'un intérieur en cuir, et d\'une couchette pour les longs voyages, l\'Aurora permettra de se déplacer à moindre frais dans l\'univers pour réaliser des missions à terre ou en intérieur.\r\n\r\nL\'Aurora LX est équipé par défaut d\'un caisson de transport qui lui permet de faire un peu de commerce. Cette caisse pourra plus tard être remplacé par d\'autres équipements utilitaires. Par rapport aux Auroras de base, il dispose également d\'un point d\'emport missile amélioré.', 2, 2, '2023-02-10 17:13:45', 1),
(51, 'Aurora MR', 'C\'est un des deux vaisseaux de départ les moins chers, l\'autre étant le Mustang Alpha. C\'est l\'un des vaisseaux les plus courants dans l\'univers. Moins armé que le Mustang, mais bénéficiant d\'une couchette pour les longs voyages, l\'Aurora permettra de se déplacer à moindre frais dans l\'univers pour réaliser des missions à terre ou en intérieur.\r\n\r\nL\'Aurora MR est équipé par défaut d\'un caisson de transport qui lui permet de faire un peu de commerce. Cette caisse pourra plus tard être remplacé par d\'autres équipements utilitaires.', 2, 2, '2023-02-10 17:13:45', 1),
(52, 'Avenger Stalker', 'Il s\'agit de la version \"chasseur de primes\" de la gamme Avenger, une série de chasseurs légers dotés d\'un espace intérieur modulaire et interchangeable. L\'Avenger Stalker est équipé par défaut de six cellules de détention. Le module peut être remplacé par un générateur à impulsions électromagnétiques (Par défaut sur le Warlock) ou retiré pour contenir du cargo (par défaut sur le Titan).\r\n\r\nPour sa fonction chasseur de primes, il est équipé de canons à distorsion qui neutralisent les vaisseaux sans les faire exploser. Sa vitesse et sa manœuvrabilité combinées à ses puissants canons et à ses missiles pourraient le désigner comme un chasseur léger à part entière.', 2, 2, '2023-02-10 17:13:45', 1),
(53, 'Avenger Titan', 'Il s\'agit de la version \"courrier\" de la gamme Avenger, une série de chasseurs légers dotés d\'un espace intérieur modulaire et interchangeable. L\'Avenger Titan est équipé par défaut de plaques de cargo permettant de transporter 8 SCU. Le module peut être remplacé par des cellules de détention (par défaut sur le Stalker) ou par un générateur à impulsions électromagnétiques (Par défaut sur le Warlock).\r\n\r\nC\'est surtout un appareil qui est considéré par beaucoup comme le parfait vaisseau de départ. C\'est un vaisseau taillé comme un avion pour le vol en atmosphère. Sa vitesse et sa manœuvrabilité combinées à ses puissants canons et à ses missiles pourraient le désigner comme véritable chasseur léger.\r\n\r\nDe plus, grâce à sa rampe arrière, il peut embarquer un petit buggy ou une moto volante.', 2, 2, '2023-02-10 17:13:45', 1),
(54, 'Avenger Titan Renegade', 'Il s\'agit d\'une édition spéciale de l\'Avenger Titan, la version \"courrier\" de la gamme Avenger. Par rapport au Titan de base, le Renegade propose une configuration de série avec des canons balistiques sous les ailes, des missiles plus variés et une livrée bleue et jaune\r\n\r\nLa gamme Avenger est une série de chasseurs légers dotés d\'un espace intérieur modulaire et interchangeable. L\'Avenger Titan est équipé par défaut de plaques de cargo permettant de transporter 8 SCU. Le module peut être remplacé par des cellules de détention (par défaut sur le Stalker) ou par un générateur à impulsions électromagnétiques (Par défaut sur le Warlock).\r\n\r\nC\'est un vaisseau taillé comme un avion pour le vol en atmosphère. Sa vitesse et sa manœuvrabilité combinées à ses puissants canons et à ses missiles pourraient le désigner comme véritable chasseur léger.', 2, 2, '2023-02-10 17:13:45', 1),
(55, 'Avenger Warlock', 'Il s\'agit de la version \"Interdiction\" de la gamme Avenger, une série de chasseurs légers dotés d\'un espace intérieur modulaire et interchangeable. Le Warlock est équipé par défaut d\'un générateur à impulsion électromagnétique (Warlock). Ce générateur est long à charger, mais permet de désactiver tous les appareils électroniques à sa portée, rendant ainsi la plupart des vaisseaux inoffensifs pour quelques secondes.\r\n\r\nLe module peut être remplacé par des cellules de détention (par défaut sur le Stalker) ou retiré pour contenir du cargo (par défaut sur le Titan).\r\n\r\nL\'Avenger Warlock, rapide et maniable, est doté de 3 canons et de missiles, ce qui fait de lui un chasseur léger complet.', 2, 2, '2023-02-10 17:13:45', 1),
(56, 'Ballista', 'Il s\'agit d\'un véhicule terrestre à huit roues motrices (8x8) anti-aérien, armé de deux puissants missiles taille 7 et huit missiles taille 5; ainsi que d\'une tourelle avec deux canons taille 2.\r\n\r\nServi par un pilote et un tireur, c\'est un engin servant à interdire l\'espace aérien et à défendre des objectifs au sol.\r\n\r\nC\'est un véhicule particulièrement lent et peu maniable, qui devra donc être transporté au plus près de sa zone d\'opération.', 2, 2, '2023-02-10 17:13:45', 1),
(57, 'Blade (Esperia)', 'Il s\'agit de la copie par le constructeur Esperia d\'un chasseur léger Vanduul. C\'est un vaisseau conçu pour opérer depuis un porte-vaisseaux du fait de son court rayon d\'action. Chez les Vanduul, c\'est l\'un des vaisseaux les plus courants et il sert d\'éclaireur, d\'avant-garde, et pour mener des raids.\r\n\r\nMieux armé que les chasseur légers humains, il est cependant limité à des canons fixes et ne dispose que d\'un seul bouclier.', 2, 2, '2023-02-10 17:13:45', 1),
(58, 'Buccaneer', 'Il s\'agit d\'un intercepteur tout en rapidité et puissance de feu. Comme tous les vaisseaux de Drake, le Buccaneer est focalisé sur sa tâche. Il n\'y a pas grand chose de plus qu\'un cockpit, 5 canons dont un gros calibre sur le dessus et deux moteurs.C\'est donc l\'un des vaisseaux de combat les plus fragiles, qui en plus ne dispose pas de siège éjectable. Seuls les plus téméraires ou talentueux pilotent les Buccaneers.', 2, 2, '2023-02-10 17:13:45', 1),
(59, 'C8 Pisces', 'Il s\'agit du vaisseau parasite du Carrack, capable de transporter trois personnes et 4 unités (SCU) de cargo. Il est faiblement armé et protégé, mais dispose d\'un moteur quantique.', 2, 2, '2023-02-10 17:13:45', 1),
(60, 'C8X Pisces Expedition\r\n\r\n', 'Il s\'agit d\'une variante du C8 Pisces, le vaisseau parasite du Carrack, qui fait du C8X Pisces un vaisseau de départ à part entière. Par rapport au C8, le C8X dispose d\'une livrée différente et de deux canons supplémentaires. Il conserve le moteur quantique, les trois places et les 4 unités SCU de cargo du C8.', 2, 2, '2023-02-10 17:13:45', 1),
(61, 'Carrack', 'Il s\'agit du plus grand vaisseau dédié à l\'exploration connu à ce jour, conçu pour aller dans l\'inconnu et cartographier les points de saut. Il est doté d\'une infirmerie, de drones et d\'un vaisseau parasite d\'exploration, il peut accueillir un véhicule terrestre et dispose de tout le confort nécessaire pour que son équipage de 6 personnes puisse vivre lors de longues expéditions.\r\n\r\nPlutôt résistant pour pouvoir affronter des conditions difficiles, il dispose de quelques tourelles pour assurer sa protection.', 2, 2, '2023-02-10 17:13:45', 1),
(62, 'Caterpillar', 'Il s\'agit d\'un vaisseau de transport hautement modulaire, conçu pour être adapté à plusieurs types de missions. Pour ce faire, il est conçu sous la forme de tronçons qui pourront à terme être configurés indépendamment pour remplir certaines fonctions : transport, médical, habitation...\r\n\r\nLe Caterpillar est protégé par deux tourelles qui lui offrent une couverture dans toutes les directions. Il dispose également d\'une cabine détachable pouvant servir de vaisseau de secours.', 2, 2, '2023-02-10 17:13:45', 1),
(63, 'Constellation Andromeda', 'Avec ses quatre canons de gros calibres pointés vers l\'avant, ses dizaines de missiles et ses deux tourelles armées chacune de deux canons anti-chasseurs, le Constellation Andromeda est une véritable canonnière. Mais ce n\'est pas tout, ce vaisseau de 60 mètres de long abrite un vaisseau parasite qui pourra harceler l\'adversaire ou le poursuivre.\r\n\r\nCe vaisseau peut également transporter un véhicule terrestre comme un Ursa Rover, un Tumbril Cyclone ou un Greycat Buggy.', 2, 2, '2023-02-10 17:13:45', 1),
(64, 'Constellation Aquila\r\n\r\n', 'Cette variante de la série Constellation est optimisée pour l\'exploration. La tourelle supérieure est équipée de senseurs longue portée, et le vaisseau est livré avec un véhicule terrestre de type Ursa Rover pour mener des expéditions terrestres.\r\n\r\nMême avec une tourelle de combat en moins que le Constellation Andromeda, l\'Aquila reste un puissant vaisseau de combat avec ses quatre canons de gros calibre à l\'avant, ses nombreux missiles, et son vaisseau parasite P-52 Merlin.', 2, 2, '2023-02-10 17:13:45', 1),
(65, 'Constellation Phoenix\r\n\r\n', 'C\'est la version luxe de la gamme Constellation. Avec sa livrée blanche, ses fenêtres pour apprécier les paysages et l\'espace, ses chambres individuelles confortables et sa pièce de vie spacieuse, le Constellation Phoenix est un vaisseau conçu pour le tourisme ou le transport de VIP. Il dispose d\'un véhicule terrestre de luxe Lynx (pas encore disponible) et d\'un vaisseau parasite taillé pour la course, le P-72 Archimedes.\r\n\r\nAvec ses quatre canons de gros calibres pointés vers l\'avant, ses dizaines de missiles et ses deux tourelles armées chacune de deux canons anti-chasseurs, le Constellation Phoenix transporte ses passagers en toute sécurité.', 2, 2, '2023-02-10 17:13:45', 1),
(66, 'Constellation Taurus\r\n\r\n', 'C\'est la version transport de la gamme Constellation. Il sacrifie le vaisseau parasite et une tourelle pour plus de cargo.\r\n\r\nIl conserve les quatre canons de gros calibres pointés vers l\'avant. Ce vaisseau peut également transporter un véhicule terrestre comme un Ursa Rover, un Tumbril Cyclone ou un Greycat Buggy.', 2, 2, '2023-02-10 17:13:45', 1),
(67, 'Corsair', 'Même s\'il se présente comme un vaisseau d\'exploration, le Corsair est tout autant une canonnière du fait de son impressionnante puissance de feu vers l\'avant : il dispose de quatre canons taille 4 et deux canons taille 3, tous sur pivots, de quatre points d\'emport missile et de deux tourelles habitées armées de deux canons taille 2. L\'arrière est très peu défendu, avec une seule tourelle téléopérée de petit calibre.\r\n\r\nL\'intérieur est fonctionnel et pratique, sans fioritures, comme pour tous les vaisseaux de Drake. On notera un cockpit avec un siège copilote sous le siège pilote pour les manœuvres d\'atterrissage, quatre cabines individuelles pour un peu d\'intimité dans les longs voyages, une salle des composants bien organisée pour faciliter la maintenance, et une soute à cargo pouvant contenir 72 SCU, ou un peu moins en mettant un véhicule (jusqu\'à un Ursa ou équivalent, non livré avec)', 2, 2, '2023-02-10 17:13:45', 1),
(68, 'Crucible', 'Il s\'agit du plus gros vaisseau de réparation connu à ce jour, capable de réparer ou de modifier la configuration d\'un autre vaisseau. Il peut travailler sur un chasseur garé à l\'intérieur d\'un conteneur détachable pressurisé, ou travailler directement sur un gros vaisseau à l\'aide de ses bras articulés.\r\n\r\nLe Crucible est reconnaissable à sa cabine de pilotage rotative de forme circulaire, qui permet d\'un côté de contrôler la course du vaisseau et de l\'autre les activités de réparation.', 2, 2, '2023-02-10 17:13:45', 1),
(69, 'Cutlass Black\r\n\r\n', 'Le Cutlass Black est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nAvec Drake Interplanetary, on ne s’embarrasse pas de fioritures et de décorations. Dans le Cutlass Black, tout à été pensé pour donner le maximum d\'utilité à cet hybride de chasseur et de transporteur de taille moyenne.\r\n\r\nLe Cutlass Black est un cogneur en papier mâché. En effet, il possède 4 canons de taille moyenne pointés vers l\'avant, et une tourelle fortement armée pour compléter cette force de frappe. Mais son blindage et léger et il ne possède qu\'un seul générateur de bouclier.', 2, 2, '2023-02-10 17:13:45', 1),
(70, 'Cutlass Blue\r\n\r\n', 'Le Cutlass Blue est l\'un des vaisseaux qui pourra être joué Star Citizen.\r\n\r\nIl s\'agit de la variante \"milicienne\" de la gamme Cutlass, une série de vaisseaux qui ne s’embarrasse pas de fioritures et de décorations, où tout est utile et fonctionnel.\r\n\r\nLe Cutlass Blue possède 4 canons et de nombreux missiles pour le pilote, une puissante tourelle, et des cellules de détention dans la soute pour pouvoir transporter des prisonniers.', 2, 2, '2023-02-10 17:13:45', 1);
INSERT INTO `objet` (`id`, `nom`, `contenu`, `id_user`, `id_objet_type`, `date`, `validation`) VALUES
(71, 'Cutlass Red', 'Le Cutlass Red est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit de la variante \"ambulance\" de la gamme Cutlass, une série de vaisseaux qui ne s’embarrasse pas de fioritures et de décorations, où tout est utile et fonctionnel.\r\n\r\nLe Cutlass Red dispose de 2 lits médicaux pour pouvoir prendre en charge des blessés légers ou stabiliser des blessés graves le temps de leur transfert dans un hôpital. Il est également équipé d\'un radar pour détecter les personnes flottantes dans l\'espace.', 2, 2, '2023-02-10 17:13:45', 1),
(72, 'Cyclone', 'Le Cyclone est l\'un des véhicules disponibles de Star Citizen.\r\n\r\nIl s’agit de la variante « transport » de la gamme Cyclone, une série de véhicules roulants à l’allure de buggy, rapides et tout-terrains. Cette version dispose à l’arrière d’un coffre à cargo accessible via une rampe rétractable. Cette soute permet de stocker et transporter 1 SCU de cargo.\r\n\r\nLe Cyclone dispose de deux sièges à l’avant, dont celui du pilote.', 2, 2, '2023-02-10 17:13:45', 1),
(73, 'Cyclone AA', 'Le Cyclone AA est l\'un des véhicules disponibles de Star Citizen.\r\n\r\nIl s’agit de la variante « anti aérienne » de la gamme Cyclone, une série de véhicules roulants à l’allure de buggy, rapides et tout-terrains.\r\n\r\nCette version dispose à l’arrière d’un système lance-missiles chargé de quatre missiles taille 1, d’un lanceur de contre-mesures pour se protéger contre des missiles hostiles, et d’un dispositif générateur d’impulsions électromagnétiques.', 2, 2, '2023-02-10 17:13:45', 1),
(74, 'Cyclone MT', 'Le Cyclone MT est l\'un des véhicules disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante \"combat anti-véhicules\" de la gamme Cyclone, un ensemble de véhicules tout terrains à quatre roues motrices, offrant une grande mobilité au prix d\'une protection minimale de l\'équipage.\r\n\r\nLe Cyclone MT dispose d\'une tourelle dotée d\'un canon et de missiles.', 2, 2, '2023-02-10 17:13:45', 1),
(75, 'Cyclone RC\r\n\r\n', 'Le Cyclone RC est l\'un des véhicules terrestres disponibles de Star Citizen.\r\n\r\nIl s\'agit de la version course de la gamme Cyclone. Par rapport aux autres versions, il dispose d\'entrée d\'air modifiée et d\'un système de direction amélioré.', 2, 2, '2023-02-10 17:13:45', 1),
(76, 'Cyclone RN', 'Le Cyclone RN est l\'un des véhicules disponibles de Star Citizen.\r\n\r\nIl s’agit de la variante « exploration » de la gamme Cyclone, une série de véhicules roulants à l’allure de buggy, rapides et tout-terrains.\r\nCette version dispose à l’arrière d\'un scanner amélioré lui permettant de détecter des objets à longue distance, ainsi qu\'une capacité de stockage de données pour conserver les informations recueillies. Le Cyclone RN est également équipé de balises permettant de marquer des points d\'intérêt au sol, comme des zones de posé, des ressources ou des dangers.\r\n\r\nLe Cyclone RN dispose de deux sièges à l’avant, dont celui du pilote.', 2, 2, '2023-02-10 17:13:45', 1),
(77, 'Cyclone TR', 'Le Cyclone TR est l\'un des véhicules disponibles de Star Citizen.\r\n\r\nIl s’agit de la variante « combat » de la gamme cyclone, une série de véhicules roulants à l’allure de buggy, rapides et tout-terrains.\r\nCette version dispose à l’arrière d’un canon taille 1 monté sur une circulaire permettant de tirer à 360°.\r\n\r\nLe Cyclone TR dispose de deux sièges à l’avant, dont celui du pilote, et d’un poste opérateur tourelle à l’arrière.', 2, 2, '2023-02-10 17:13:45', 1),
(78, 'Defender\r\n\r\n', 'Le Defender est l\'un des vaisseaux jouable de Star Citizen.\r\n\r\nIl s\'agit d\'un chasseur léger construit, utilisé et exporté par le peuple extraterrestre Banu. Dans leur culture, c\'est le vaisseau d\'escorte des Merchantmans.\r\n\r\nLe Defender a la particularité d\'être un chasseur léger avec deux membres d\'équipage qui ont chacun leur cockpit. Les Banus ont en effet des rôles très séparés et le pilote ne tire pas. Dans la version exportée aux humains, le pilote peut piloter et tirer. Le vaisseau est doté de deux longs bras portant chacun deux canons, et pouvant se replier pour former le train d\'atterrissage. Le vaisseau dispose également d\'un bouclier d\'une taille supérieure par rapport aux autres chasseurs de sa taille, alimenté par une centrale énergétique supplémentaire.', 2, 2, '2023-02-10 17:13:45', 1),
(79, 'Dragonfly Black', 'Le Dragonfly Black est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nLes deux versions de cette moto volante (Yellowjacket et Black) sont identiques par leurs caractéristiques et ne diffèrent que par leur peinture.\r\n\r\nC\'est un engin conçu pour aller dans l\'espace comme à la surface des planètes. Il est armé de deux canons et dispose d\'un siège passager tourné vers l\'arrière. Deux sacoches permettent de transporter quelques objets.', 2, 2, '2023-02-10 17:13:45', 1),
(80, 'Dragonfly Yellowjacket', 'Les deux versions de cette moto volante (Yellowjacket et Black) sont identiques par leurs caractéristiques et ne diffèrent que par leur peinture.\r\n\r\nC\'est un engin conçu pour aller dans l\'espace comme à la surface des planètes. Il est armé de deux canons et dispose d\'un siège passager tourné vers l\'arrière. Deux sacoches permettent de transporter quelques objets.', 2, 2, '2023-02-10 17:13:45', 1),
(81, 'Eclipse', 'L\'Eclipse est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nL\'Eclipse a une forme caractéristique d\'aile volante, fine et large. Il s\'agit d\'un torpilleur furtif transportant 3 torpilles de gros calibre.\r\n\r\nEn dehors de ses torpilles, l\'Eclipse ne dispose que de deux canons qui ne lui permettront pas de faire face à un chasseur bien piloté.', 2, 2, '2023-02-10 17:13:45', 1),
(82, 'Endeavor', 'Le Endeavor est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s’agit du plus gros vaisseau scientifique et médical connu. L’Endeavor est composé de trois éléments : une cabine détachable appelée \"Explorer\" qui peut se poser au sol, une partie principale nommé \"Workshop\" (atelier) dotée de moteurs quantiques et pouvant accueillir des modules fonctionnels, et les modules eux-mêmes.', 2, 2, '2023-02-10 17:13:45', 1),
(83, 'F7C Hornet', 'Le F7C Hornet est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nVersion civile d\'un chasseur moyen utilisé par l\'UEE Navy, le F7C Hornet se distingue par son point d\'emport utilitaire cylindrique au centre de l\'appareil, son gros propulseur principal unique, et ses entrées d\'air de chaque côté du cockpit.\r\n\r\nC\'est un appareil courte distance, conçu pour être employé depuis un vaisseau porteur.', 2, 2, '2023-02-10 17:13:45', 1),
(84, 'F7C Wildfire', 'Le F7C Hornet Wildfire est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit d\'une version spéciale du F7C Hornet, un chasseur médian qui se distingue par son point d\'emport utilitaire cylindrique au centre de l\'appareil, son gros propulseur principal unique, et ses entrées d\'air de chaque côté du cockpit.\r\n\r\nLa version Wildfire est habillée d\'une livrée rouge et sa configuration de série comporte des mitrailleuses balistiques sous les ailes et sur le point d\'emport utilitaire.', 2, 2, '2023-02-10 17:13:45', 1),
(85, 'F7C-M Heartseeker', 'Le F7C-M Heartseeker est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nC\'est une version spéciale du chasseur biplace F7C Superhornet, avec une peinture spéciale Saint Valentin et des composants de base haut de gamme, et des armements fixes.\r\n\r\nC\'est un appareil courte distance, conçu pour être employé depuis un vaisseau porteur.', 2, 2, '2023-02-10 17:13:45', 1),
(86, 'F7C-M Superhornet', 'Le F7C-M Superhornet est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nVersion biplace de la gamme Hornet, le F7C-M Superhornet est un chasseur moyen qui se distingue par son point d\'emport utilitaire cylindrique au centre de l\'appareil, son gros propulseur principal unique, et ses entrées d\'air de chaque côté du cockpit.\r\n\r\nC\'est un appareil courte distance, conçu pour être employé depuis un vaisseau porteur.', 2, 2, '2023-02-10 17:13:45', 1),
(87, 'F7C-R Hornet Tracker\r\n\r\n', 'Le F7C-R Tracker est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante \"radar\" de la gamme F7C Hornet, une série de chasseurs bien armés et solides caractérisés par leur point d\'emport utilitaire cylindrique au centre de l\'appareil, leur gros propulseur principal unique, et les entrées d\'air de chaque côté du cockpit.\r\n\r\nLa version Tracker est équipée d\'un radar longue portée.', 2, 2, '2023-02-10 17:13:45', 1),
(88, 'F7C-S Ghost', 'Le F7C-S Ghost est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante \"furtive\" de la gamme F7C Hornet, une série de chasseurs bien armés et solides caractérisés par leur point d\'emport utilitaire cylindrique au centre de l\'appareil, leur gros propulseur principal unique, et les entrées d\'air de chaque côté du cockpit.\r\n\r\nLa version Ghost est équipée de composants de type discrétion et d\'un revêtement de coque anti-scan.', 2, 2, '2023-02-10 17:13:45', 1),
(89, 'Freelancer', 'Le Freelancer est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nCe transport de taille moyenne possède deux puissantes tourelles placées de part et d\'autre de la cabine, et une tourelle légère pour couvrir ses arrières.\r\n\r\nSa longue soute permet de transporter 66 unités (SCU) de cargo et c\'est un vaisseau réputé pour sa faible consommation, ce qui en fait un transporteur longue distance intéressant.', 2, 2, '2023-02-10 17:13:45', 1),
(90, 'Freelancer DUR\r\n\r\n', 'Le Freelancer DUR est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante exploration de la gamme Freelancer. Il sacrifie près de la moitié du cargo disponible pour intégrer une raffinerie interne et un moteur de saut avancé. Il dispose également de 4 réservoirs de carburants supplémentaires externes, ainsi que de systèmes de détection (radars, scanners) améliorés. Il conserve les deux puissantes tourelles placées de part et d\'autre de la cabine, et une tourelle légère pour couvrir ses arrières.', 2, 2, '2023-02-10 17:13:45', 1),
(91, 'Freelancer MAX', 'Le Freelancer MAX est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante transport de la gamme Freelancer. La soute à cargo est deux fois plus large que pour la version de base, ce qui lui permet d\'emporter 120 unités de cargo au lieu de 66. Et il dispose de deux fois plus de propulseurs à l\'arrière pour pouvoir déplacer le cargo supplémentaire.\r\n\r\nIl conserve les quatre puissants canons à l\'avant et la tourelle arrière. En revanche, il dispose de moins de missiles que les autres Freelancer.', 2, 2, '2023-02-10 17:13:45', 1),
(92, 'Freelancer MIS', 'Le Freelancer MIS est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante \"combat\" de la gamme Freelancer, une série de vaisseaux de taille moyenne, disposant d\'une forte puissante de feu vers l\'avant grâce à leurs quatre canons taille 3 installés sur des tourelles téléopérées placées de part et d\'autre de la cabine. Les Freelancers disposent également d\'une tourelle armée de deux canons taille 2 pour protéger l\'arrière du vaisseau.\r\n\r\nPar rapport à la version de base, la version MIS sacrifie près de la moitié de son cargo pour emporter un système lance-missile pouvant tirer jusqu\'à 32 missiles de taille 2.', 2, 2, '2023-02-10 17:13:45', 1),
(93, 'Genesis Starliner', 'Le Genesis Starliner est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nCe vaisseau à l\'allure d\'avion de ligne futuriste est un transport de passagers. Il peut emmener 40 personnes en plus de l\'équipage de 8 personnes et de leurs bagages. Modulaire, l\'intérieur peut être réaménagé pour transporter moins de passagers mais avec plus de confort, ou même pour transporter uniquement du cargo.', 2, 2, '2023-02-10 17:13:45', 1),
(94, 'Gladiator', 'Le Gladiator est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit d\'un torpilleur léger biplace à court rayon d\'action. Armé de quatre canons, deux à l\'avant et deux en tourelle, pour se défendre contre les chasseurs, sa principale force provient de ses quatre torpilles légères et ses huit missiles. Plutôt résistant pour sa taille, le Gladiator est très peu agile et devra être accompagné d\'une escorte.', 2, 2, '2023-02-10 17:13:45', 1),
(95, 'Gladius', 'Le Gladius est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nCe vaisseau est un chasseur léger, idéal pour les escortes et les interceptions. Il dispose de 3 points d\'emport d\'armes et de 4 points d\'emport de missiles, et est très maniable et rapide. Ses ailes sont parfaitement adaptées pour le vol atmosphérique, et ses deux propulseurs arrière lui donnent une plus grande chance de survie que son concurrent, l\'Arrow.', 2, 2, '2023-02-10 17:13:45', 1),
(96, 'Glaive (Esperia)', 'Le Glaive est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la copie par le constructeur Esperia d\'un chasseur médian Vanduul. Le Glaive est la version symétrique du vaisseau Vanduul Scythe. Chez les Vanduul, le Glaive est réservé aux pilotes d\'élite qui ont fait leur preuves.\r\n\r\nLe Glaive est caractérisé par ses deux lames pour éperonner les vaisseaux adverses et ses deux canons taille 5, exceptionnels chez un chasseur médian. Les canons du Glaive sont fixes et ne peuvent être modifiés.', 2, 2, '2023-02-10 17:13:45', 1),
(97, 'Hammerhead', 'Le Hammerhead est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nC\'est une corvette d\'escorte caractérisée par ses multiples tourelles à quatre canons de gros calibre, qui lui assure une couverture dans toutes les directions. Ce vaisseau possède également de nombreux missiles et un blindage renforcé à l\'avant. L\'équipage de 9 personnes dispose d\'un confort spartiate mais efficace pour les missions longue durée.\r\n\r\nPoint particulier : le cockpit est situé en dessous du vaisseau.', 2, 2, '2023-02-10 17:13:45', 1),
(98, 'Hawk', 'Le Hawk est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nInspiré par l\'oiseaux de proie dont il porte le nom (Hawk signifie Faucon en anglais), ce vaisseau est spécialement conçu pour les chasseurs de primes. En effet, il est doté d\'un générateur d\'impulsion électromagnétique et de canons à distorsion pour neutraliser une cible sans la détruire, et d\'une cellule de détention pour une personne.\r\n\r\nRapide et maniable, le Hawk dispose de 6 canons pour se défaire de ses adversaires.', 2, 2, '2023-02-10 17:13:45', 1),
(99, 'Herald', 'Le Herald est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit d\'un vaisseau transporteur de données. Sa silhouette est particulière, avec ses deux gros moteurs qui semblent prendre 2/3 de la place et ses angles droits. Ces caractéristiques se traduisent par une vitesse linéaire très élevée, l\'une des meilleures de tous les vaisseaux, mais également par une vitesse de rotation très faible. A l\'intérieur, conformément au style Drake, tout est fonctionnel et pratique, sans fioritures. Une zone vie pour une personne, une zone serveurs et une zone travail, le tout tenant dans un volume réduit.', 2, 2, '2023-02-10 17:13:45', 1),
(100, 'Hercules A2', 'Le Hercules A2 est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit de la variante canonnière \"attaque au sol\" de la gamme Hercules, une série de vaisseaux conçus pour les opérations de débarquement.\r\n\r\nLe Hercules A2 sacrifie la moitié de sa capacité de transport pour intégrer un système de largage de bombes permettant de délivrer soit deux énormes bombes, soit de multiples bombes à fragmentation. Il est également doté de nombreuses tourelles sous le vaisseau pour pouvoir mener des attaques au sol.', 2, 2, '2023-02-10 17:13:45', 1),
(101, 'Hercules C2', 'Le Hercules C2 est l\'un des vaisseaux qui pourra être joué de Star Citizen.\r\n\r\nIl s\'agit de la variante civile de la gamme Hercules, une série de vaisseaux conçus pour les opérations de débarquement.\r\n\r\nC\'est un transporteur lourd, optimisé pour déplacer des véhicules terrestres, y compris deux chars de combat Nova. Il dispose en effet de deux rampes d\'accès placées face à face, permettant de faire rentrer et sortir les véhicules en marche avant. Son immense soute à cargo permettra également de déployer des conteneurs utilitaires.', 2, 2, '2023-02-10 17:13:45', 1),
(102, 'Hercules M2', 'Le Hercules M2 est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit de la variante militaire de la gamme Hercules, une série de vaisseaux conçus pour les opérations de débarquement.\r\n\r\nC\'est un transporteur lourd, optimisé pour déplacer des véhicules terrestres, y compris deux chars de combat Nova. Il dispose en effet de deux rampes d\'accès placées face à face, permettant de faire rentrer et sortir les véhicules en marche avant. Son immense soute à cargo permettra également de déployer des conteneurs utilitaires.', 2, 2, '2023-02-10 17:13:45', 1),
(103, 'Hull A', 'Le Hull A est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit du plus petit vaisseau de la gamme Hull, un ensemble de vaisseaux spécialisés dans le transport et ayant la particularité de transporter leur cargaison à l\'extérieur de la coque, accrochée à des poutres rétractables. Ainsi, lorsqu\'ils ne transportent pas de cargo, les Hulls sont dans un mode compact qui facilite leurs déplacements et les rendent moins vulnérables.\r\n\r\nLe Hull A est peu armé, mais peut emmener ses 48 unités de cargo jusqu\'au sol, contrairement aux plus gros vaisseaux de la gamme.', 2, 2, '2023-02-10 17:13:46', 1),
(104, 'Hull B', 'Le HULL B est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit du deuxième vaisseau de la gamme Hull, un ensemble de vaisseaux spécialisés dans le transport et ayant la particularité de transporter leur cargaison à l\'extérieur de la coque, accrochée à des poutres rétractables. Ainsi, lorsqu\'ils ne transportent pas de cargo, les Hulls sont dans un mode compact qui facilite leurs déplacements et les rendent moins vulnérables.\r\n\r\nLe Hull B est peu armé, mais peut emmener ses 384 unités de cargo jusqu\'au sol, contrairement aux plus gros vaisseaux de la gamme.', 2, 2, '2023-02-10 17:13:46', 1),
(105, 'Hull C', 'Le Hull C est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit du vaisseau du milieu de la gamme Hull, un ensemble de vaisseaux spécialisés dans le transport et ayant la particularité de transporter leur cargaison à l\'extérieur de la coque, accrochée à des poutres rétractables. Ainsi, lorsqu\'ils ne transportent pas de cargo, les Hulls sont dans un mode compact qui facilite leurs déplacements et les rendent moins vulnérables.\r\n\r\nLe Hull C est peu armé, mais peut transporter 4608 unités de cargo sur de longues distances.', 2, 2, '2023-02-10 17:13:46', 1),
(106, 'Hull D', 'Le Hull D est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit du deuxième plus gros vaisseau de la gamme Hull, un ensemble de vaisseaux spécialisés dans le transport et ayant la particularité de transporter leur cargaison à l\'extérieur de la coque, accrochée à des poutres rétractables. Ainsi, lorsqu\'ils ne transportent pas de cargo, les Hulls sont dans un mode compact qui facilite leurs déplacements et les rendent moins vulnérables.\r\n\r\nLe Hull D peut emmener plus de 20.000 unités (SCU) de cargo sur de très longues distances. Protégé par de puissants boucliers capitaux, il est très résistant.', 2, 2, '2023-02-10 17:13:46', 1),
(107, 'Hull E', 'Le Hull E est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit du plus gros vaisseau de la gamme Hull, un ensemble de vaisseaux spécialisés dans le transport et ayant la particularité de transporter leur cargaison à l\'extérieur de la coque, accrochée à des poutres rétractables. Ainsi, lorsqu\'ils ne transportent pas de cargo, les Hulls sont dans un mode compact qui facilite leurs déplacements et les rendent moins vulnérables.\r\n\r\nLe Hull E peut emmener près de 100.000 unités (SCU) de cargo sur de très longues distances. Protégé par de puissants boucliers capitaux, il est très résistant.', 2, 2, '2023-02-10 17:13:46', 1),
(108, 'Hurricane', 'Le Hurricane est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nC\'est un chasseur lourd armé de 6 canons. C\'est d\'ailleurs le chasseur ayant la plus grande puissance de feu. Sa manœuvrabilité et sa vitesse sont plutôt bonnes. Par contre il est plutôt fragile. Biplace, quatre des canons sont installés sur un tourelle opérée par un deuxième membre d\'équipage. Ceci lui permet de maintenir un feu soutenu sur la cible même en cas de manœuvres ou d\'esquives.', 2, 2, '2023-02-10 17:13:46', 1),
(109, 'Idris-M', 'L\'Idris-M est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit d\'une frégate conçue pour les patrouilles longue durée et l\'exploration. Elle peut embarquer 3 vaisseaux de la taille d\'un chasseur, qu\'elle peut maintenir et ravitailler. Armée d\'un puissant canon de type \"railgun\" à l\'avant, d\'un lance missiles et de près d\'une dizaine de tourelles, c\'est un formidable vaisseau de combat.\r\n\r\nL\'Idris est le plus gros vaisseau pouvant se poser au sol d\'une planète.', 2, 2, '2023-02-10 17:13:46', 1),
(110, 'Idris-P', 'L\'Idris-P est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit de la version \"maintien de la paix\" de la gamme Idris, une série de frégates conçues pour les patrouilles longue durée et l\'exploration. Les Idris peuvent embarquer 3 vaisseaux de la taille d\'un chasseur, qu\'elles peuvent maintenir et ravitailler, ainsi qu\'un vaisseau parasite MPUV pour transporter des personnes ou du cargo vers ou depuis la frégate.\r\n\r\nPar rapport à la version militaire Idris-M, l\'Idris-P n\'est pas équipé du railgun spinal, ni de la tourelle anti-capitaux. Elle est également livrée avec un blindage allégé. En revanche, elle peut emporter plus de cargo et ses coûts de fonctionnement sont moins élevés.', 2, 2, '2023-02-10 17:13:46', 1),
(111, 'Javelin', 'Le Javelin est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nCe destroyer est le plus grand pouvant être possédé par un joueur.\r\n\r\nC\'est un vaisseau construit autour de deux systèmes lance torpilles de très gros calibre, et armé de nombreuses tourelles de grande taille. Sa puissance de feu est colossale. A l\'intérieur, cinq ponts différents et de nombreuses salles permettent à un équipage allant jusqu\'à 80 personnes de vivre, de s’entraîner, de se soigner...\r\nLe Javelin dispose également d\'un hangar pour un vaisseau de taille moyenne et pour un vaisseau parasite de type MPUV.', 2, 2, '2023-02-10 17:13:46', 1),
(112, 'Khartu-Al', 'Le Khartu-Al est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la version \"export\" d\'un chasseur léger Xi\'an, modifiée pour être pilotable par les humains (et être un peu moins bon que la version Xi\'an). Comme tous les chasseurs Xi\'an, le Khartu-Al diffère des vaisseaux humains par son architecture de propulsion. Au lieu d\'avoir un propulseur principal dans l\'axe du vaisseau, il dispose de 4 propulseurs rotatifs qui lui permettent d\'accélérer avec la même force dans toutes les directions. Cela rend le Khartu-Al très manœuvrable et difficile à toucher.\r\n\r\nCependant, le Khartu-Al est moins armé que les chasseurs légers humains.', 2, 2, '2023-02-10 17:13:46', 1),
(113, 'Kraken', 'Le Kraken est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nAvec sa silhouette qui rappelle les porte-avions de notre temps, ce vaisseau capital est un porte-vaisseaux de combat, capable de transporter deux vaisseaux moyens, quatre vaisseaux légers et une dizaine de motos volantes.\r\n\r\nA l\'intérieur, une immense soute à cargo permet d\'emporter près de 3800 SCU, et un hangar permet de réparer, de ravitailler et de réarmer des vaisseaux.', 2, 2, '2023-02-10 17:13:46', 1),
(114, 'Kraken Privateer', 'Le Kraken Privateer est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit d\'une variante du Kraken, sacrifiant une partie de la capacité de transport ainsi que le hangar à Dragonfly pour offrir un vrai centre commercial mobile, avec 10 commerces configurables dont 2 dans une zone privée.\r\n\r\nAvec sa silhouette qui rappelle les porte-avions de notre temps, ce vaisseau capital est un porte-vaisseaux de combat, capable de transporter deux vaisseaux moyens et quatre vaisseaux légers.', 2, 2, '2023-02-10 17:13:46', 1),
(115, 'Liberator', 'Le Liberator est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit d\'un vaisseau de transport, capable de déplacer du fret, des véhicules ou trois petits vaisseaux. Opéré par deux membres d\'équipage et peu armé, il est surtout destiné au convoyage en zone sécurisée.', 2, 2, '2023-02-10 17:13:46', 1),
(116, 'M50', 'Le M50 est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit d\'un vaisseau de course, aussi rapide et maniable que son allure le suggère. Plus rapide que les chasseurs légers, il est capable de s\'en prendre à eux grâce à ses deux canons niveau 2, mais il aura du mal à percer de plus grosses cibles.', 2, 2, '2023-02-10 17:13:46', 1),
(117, 'Mantis', 'Le Mantis est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit du premier vaisseau dédié à l\'interdiction quantique, capable de sortir d\'autres vaisseaux de leurs voyages quantique, de les localiser, et de les empêcher de repartir.\r\n\r\nAu delà de sa capacité spéciale, le vaisseau est très peu armé.', 2, 2, '2023-02-10 17:13:46', 1),
(118, 'Merchantman', 'Le Merchantman est l\'un des vaisseaux qui sera jouable dans Star Citizen.\r\n\r\nIl s\'agit d\'un vaisseau marchand extraterrestre, emblématique de l\'espèce Banu. En effet, ce peuple de marchands utilise quasi exclusivement les Merchantmans comme vaisseaux de transport, allant de point de commerce en point de commerce pour faire des profits.\r\n\r\nComme tous les vaisseaux Banu, le Merchantman concentre les meilleures technologies de toutes les autres espèces et est optimisé pour son rôle. C\'est le plus gros vaisseau de transport pouvant atterrir et il est plutôt rapide pour sa taille en ligne droite. Il est protégé par de puissants canons qui se rangent dans la coque.\r\nLe Merchantman est un vaisseau échoppe : à l\'intérieur, il dispose d\'une salle de négociation et de vitrines pour présenter les biens à vendre aux clients qui viennent dans le vaisseau.', 2, 2, '2023-02-10 17:13:46', 1),
(119, 'Mercury Star Runner', 'Le Mercury Star Runner est l\'un des vaisseaux jouables dans Star Citizen.\r\n\r\nC\'est un vaisseau de transport permettant de transporter à la fois des marchandises et des données. Peu armé, il compte plutôt sur sa vitesse pour s\'en sortir en cas de danger.\r\n\r\nGrâce à son scanner et à ses nombreux ordinateurs de bord, il peut également servir à faire de l\'écoute électronique pour acquérir des informations. Il dispose également d\'une pièce \"secrète\", protégée contre les scans, pour cacher une personne ou des marchandises que l\'on souhaite transporter en toute discrétion.', 2, 2, '2023-02-10 17:13:46', 1),
(120, 'MOLE', 'Le MOLE est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit du second vaisseau de minage accessible pour les joueurs. Il permet à un équipage de 4 joueurs de localiser des ressources, de fracturer des rochers à l\'aide de trois rayons lasers, et d\'en extraire les minerais avec un rayon tracteur. Ne nécessitant aucun investissement initial, l\'exploitation minière est une source solide de revenus.\r\n\r\nLe vaisseau est faiblement armé, mais dispose de tout le confort intérieur pour son équipage.', 2, 2, '2023-02-10 17:13:46', 1),
(121, 'MPUV Cargo', 'Le MPUV Cargo est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante Cargo de la gamme MPUV, une série de vaisseaux parasites modulaires, non armés, qui sont conçus pour être utilisés depuis les vaisseaux militaires capitaux comme l\'Idris-M et le Javelin.\r\n\r\nLe MPUV est un vaisseau monoplace qui peut transporter 2 SCU de cargo. Son module cargo peut être remplacé par un module de transport de personnes.', 2, 2, '2023-02-10 17:13:46', 1),
(122, 'MPUV Personnel', 'Le MPUV Personnel est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante transport de personnes de la gamme MPUV, une série de vaisseaux parasites modulaires, non armés, qui sont conçus pour être utilisés depuis les vaisseaux militaires capitaux comme l\'Idris-M et le Javelin.\r\n\r\nLe MPUV est un vaisseau qui peut transporter 8 personnes. Son module de transport de personnes peut être remplacé par un module de transport de cargo de 2 SCU.', 2, 2, '2023-02-10 17:13:46', 1),
(123, 'Mustang Alpha', 'Le Mustang Alpha est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nLe Mustang Alpha est l\'un des deux vaisseaux les moins chers dit \"de départ\", avec l\'Aurora MR. C\'est avec l\'un de ces deux appareils que la plupart des joueurs vont débuter leur aventure spatiale. Il est donc naturel de le comparer à ce dernier. Le Mustang a la particularité d\'avoir une tourelle téléopérée sous le menton, qui le rend particulièrement redoutable en combat. Il peut également transporter quelques unités de cargo.\r\n\r\nLe Mustang Alpha est plus maniable et mieux armé que l\'Aurora. En revanche, il est un peu plus fragile, moins rapide en ligne droite, et ne dispose pas de couchette.', 2, 2, '2023-02-10 17:13:46', 1),
(124, 'Mustang Beta', 'Le Mustang Beta est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nAvec sa cabine dotée d\'une douche, de toilettes, d\'une cuisine et d\'un lit, le Mustang Beta est un vaisseau conçu pour le voyage de longe durée, bien plus que les Auroras. Pour ce faire, il sacrifie complètement le transport de marchandises.\r\n\r\nIl conserve tous les atouts au combat du Mustang Alpha : la tourelle téléopérée sous le menton, la silhouette de petite taille et la grande agilité.', 2, 2, '2023-02-10 17:13:46', 1),
(125, 'Mustang Delta', 'Le Mustang Delta est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nC\'est la variante combat de la gamme Mustang. Il est plus petit que les autres pour offrir une cible plus difficile à toucher, est doté d\'une armure renforcée et de points d\'emport d\'armes de taille supérieure. Ses systèmes lance roquette complètent ses canons contre les cibles fixes ou lentes.', 2, 2, '2023-02-10 17:13:46', 1),
(126, 'Mustang Gamma', 'Le Mustang Gamma est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la version \"course\" de la gamme Mustang, optimisé pour la compétition. Il sacrifie la tourelle téléopérée sous le menton des autres Mustang pour une entrée d\'air supplémentaire lui permettant de récupérer plus vite du carburant. Au lieu d\'un point d\'emport utilitaire, il est équipé d\'un troisième moteur pour plus d\'accélération et plus de vitesse.', 2, 2, '2023-02-10 17:13:46', 1),
(127, 'Nautilus', 'Le Nautilus est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit d\'une corvette conçue pour le combat défensive, qui combine une puissante tourelle avec deux canons taille 7, trois grands boucliers et la capacité à déposer et récupérer des mines. Son armement et complété par deux tourelles à canons taille 3 et une tourelle lance-missiles.\r\n\r\nDeux types de mines sont disponibles : des mines explosives équivalentes à des torpilles taille 5, et des mines dotées de deux canons taille 2. Grâce à ses deux drones, le Nautilus peut déposer et récupérer ses mines.', 2, 2, '2023-02-10 17:13:46', 1),
(128, 'Nomad', 'Le Nomad est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit du deuxième vaisseau de départ du constructeur Consolidated Outlands, après la gamme Mustang.\r\n\r\nLe Nomad est un vaisseau polyvalent, capable de transporter 24 SCU tout en pouvant se défendre grâce à ses trois points d\'emport d\'armes de taille 3. Son cockpit permet au pilote de bien voir autour de lui, y compris en haut et en bas.', 2, 2, '2023-02-10 17:13:46', 1);

-- --------------------------------------------------------

--
-- Structure de la table `objet_type`
--

CREATE TABLE `objet_type` (
  `id` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_user` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `objet_type`
--

INSERT INTO `objet_type` (`id`, `nom`, `id_user`, `date`) VALUES
(1, 'armement', 2, '2023-02-10 09:22:50'),
(2, 'transport', 2, '2023-02-10 09:22:50'),
(3, 'Lieux', 2, '2023-02-10 09:22:50'),
(4, 'espèces', 2, '2023-02-10 09:22:50');

-- --------------------------------------------------------

--
-- Structure de la table `password_recover`
--

CREATE TABLE `password_recover` (
  `id` int(10) NOT NULL,
  `token_user` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `token` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date_recover` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_validite` timestamp NOT NULL DEFAULT current_timestamp(),
  `validite` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `password_recover`
--

INSERT INTO `password_recover` (`id`, `token_user`, `token`, `date_recover`, `date_validite`, `validite`) VALUES
(1, '1ac42a4e92bce593bd9e4e553185de30bda0d0f0e9baa9a9564bc59071736192815756276499ad92a5ee8f1a7a2952b2c92c9c82e15af9c8d18e71f4b39a0d70', 'c27a7ca5cf53f295bc92795c14a643bab461117a5d3239a4', '2023-02-01 13:40:44', '2023-02-01 13:40:44', 1),
(2, '1ac42a4e92bce593bd9e4e553185de30bda0d0f0e9baa9a9564bc59071736192815756276499ad92a5ee8f1a7a2952b2c92c9c82e15af9c8d18e71f4b39a0d70', '47ce86310d4e6a47912d55d71ad032fd293a5914a59f6129', '2023-02-01 14:00:51', '2023-02-01 14:00:51', 1),
(3, '1ac42a4e92bce593bd9e4e553185de30bda0d0f0e9baa9a9564bc59071736192815756276499ad92a5ee8f1a7a2952b2c92c9c82e15af9c8d18e71f4b39a0d70', '885bd67c196908ffbd62d7c9ba080551c65834462f128b12', '2023-02-01 14:04:58', '2023-02-01 14:04:58', 1),
(4, '1ac42a4e92bce593bd9e4e553185de30bda0d0f0e9baa9a9564bc59071736192815756276499ad92a5ee8f1a7a2952b2c92c9c82e15af9c8d18e71f4b39a0d70', 'b97ab99aba6e008b1429f585985fd0734c207a2dc655bca8', '2023-02-01 14:07:27', '2023-02-01 14:07:27', 1),
(5, '1ac42a4e92bce593bd9e4e553185de30bda0d0f0e9baa9a9564bc59071736192815756276499ad92a5ee8f1a7a2952b2c92c9c82e15af9c8d18e71f4b39a0d70', '52f87ecdd2288c7bca40dd986a07252f36380643d0c49f5a', '2023-02-01 22:58:03', '2023-02-01 22:58:03', 1),
(6, '1ac42a4e92bce593bd9e4e553185de30bda0d0f0e9baa9a9564bc59071736192815756276499ad92a5ee8f1a7a2952b2c92c9c82e15af9c8d18e71f4b39a0d70', 'e4bd38481d17db342e92c3f27a15d6039309796c3949a155', '2023-02-01 22:59:55', '2023-02-01 22:59:55', 1);

-- --------------------------------------------------------

--
-- Structure de la table `prod_pre_lieu`
--

CREATE TABLE `prod_pre_lieu` (
  `id` int(10) NOT NULL,
  `id_prod_pre` int(10) NOT NULL,
  `id_lieu` int(10) NOT NULL,
  `prix_vente` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `prix_achat` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `actu_min` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `inv_max` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `id` int(10) NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `id_objet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire_lieu`
--

CREATE TABLE `proprietaire_lieu` (
  `id` int(10) NOT NULL,
  `id_proprietaire` int(10) NOT NULL,
  `id_lieu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `risque`
--

CREATE TABLE `risque` (
  `id` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `screens`
--

CREATE TABLE `screens` (
  `id_screen` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `name` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `screens`
--

INSERT INTO `screens` (`id_screen`, `id_user`, `name`, `image`, `alt`, `src`, `date`) VALUES
(1, 8, '262f7041f0f5f688_1920xH.jpg', '262f7041f0f5f688_1920xH.jpg', '262f7041f0f5f688_1920xH.jpg', '262f7041f0f5f688_1920xH.jpg', '2023-02-10 17:13:44'),
(2, 8, '804504.jpg', '804504.jpg', '804504.jpg', '804504.jpg', '2023-02-10 17:13:44'),
(3, 8, 'ArcCorp.png', 'ArcCorp.png', 'ArcCorp.png', 'ArcCorp.png', '2023-02-10 17:13:44'),
(4, 8, 'gallerie.jpg', 'gallerie.jpg', 'gallerie.jpg', 'gallerie.jpg', '2023-02-10 17:13:44'),
(5, 8, 'gallerie3.jpg', 'gallerie3.jpg', 'gallerie3.jpg', 'gallerie3.jpg', '2023-02-10 17:13:44'),
(6, 8, 'gallerie4.jpg', 'gallerie4.jpg', 'gallerie4.jpg', 'gallerie4.jpg', '2023-02-10 17:13:44'),
(7, 8, 'gallerie5.jpg', 'gallerie5.jpg', 'gallerie5.jpg', 'gallerie5.jpg', '2023-02-10 17:13:44'),
(8, 8, 'gallerie6.jpg', 'gallerie6.jpg', 'gallerie6.jpg', 'gallerie6.jpg', '2023-02-10 17:13:44'),
(9, 8, 'gallerie7.jpg', 'gallerie7.jpg', 'gallerie7.jpg', 'gallerie7.jpg', '2023-02-10 17:13:44'),
(10, 8, 'gallerie8.jpg', 'gallerie8.jpg', 'gallerie8.jpg', 'gallerie8.jpg', '2023-02-10 17:13:44'),
(11, 8, 'gallerie9.jpg', 'gallerie9.jpg', 'gallerie9.jpg', 'gallerie9.jpg', '2023-02-10 17:13:44'),
(12, 8, 'gallerie10.jpg', 'gallerie10.jpg', 'gallerie10.jpg', 'gallerie10.jpg', '2023-02-10 17:13:44'),
(13, 8, 'gallerie11.jpg', 'gallerie11.jpg', 'gallerie11.jpg', 'gallerie11.jpg', '2023-02-10 17:13:44'),
(14, 8, 'gallerie12.jpg', 'gallerie12.jpg', 'gallerie12.jpg', 'gallerie12.jpg', '2023-02-10 17:13:44'),
(15, 8, 'station4.jpg', 'station4.jpg', 'station4.jpg', 'station4.jpg', '2023-02-10 17:13:44'),
(16, 8, 'ville7.png', 'ville7.png', 'ville7.png', 'ville7.png', '2023-02-10 17:13:44'),
(17, 7, 'lune25.jpg', 'lune25.jpg', 'lune25.jpg', 'lune25.jpg', '2023-02-10 17:13:44'),
(18, 7, 'vaisseau26.jpg', 'vaisseau26.jpg', 'vaisseau26.jpg', 'vaisseau26.jpg', '2023-02-10 17:13:44'),
(19, 7, 'vaisseau67.jpg', 'vaisseau67.jpg', 'vaisseau67.jpg', 'vaisseau67.jpg', '2023-02-10 17:13:44'),
(20, 7, 'wallpaperflare.com_wallpaper (26).jpg', 'wallpaperflare.com_wallpaper (26).jpg', 'wallpaperflare.com_wallpaper (26).jpg', 'wallpaperflare.com_wallpaper (26).jpg', '2023-02-10 17:13:44'),
(21, 7, 'vanduul10.jpg', 'vanduul10.jpg', 'vanduul10.jpg', 'vanduul10.jpg', '2023-02-10 17:13:44'),
(22, 7, 'actus2.jpg', 'actus2.jpg', 'actus2.jpg', 'actus2.jpg', '2023-02-10 17:13:44');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(10) NOT NULL,
  `id_objet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `service_lieu`
--

CREATE TABLE `service_lieu` (
  `id` int(10) NOT NULL,
  `id_service` int(10) NOT NULL,
  `id_lieu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `taille_arm_vaisseau`
--

CREATE TABLE `taille_arm_vaisseau` (
  `id` int(10) NOT NULL,
  `taille` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `transport_arm`
--

CREATE TABLE `transport_arm` (
  `id` int(10) NOT NULL,
  `id_transport` int(10) NOT NULL,
  `id_arm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `transport_lieu`
--

CREATE TABLE `transport_lieu` (
  `id` int(10) NOT NULL,
  `id_transport` int(10) NOT NULL,
  `id_lieu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `transp_equip`
--

CREATE TABLE `transp_equip` (
  `id` int(10) NOT NULL,
  `id_equip` int(10) NOT NULL,
  `id_transp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `transp_faiblesses`
--

CREATE TABLE `transp_faiblesses` (
  `id` int(10) NOT NULL,
  `id_faiblesse` int(10) NOT NULL,
  `id_transp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `transp_forces`
--

CREATE TABLE `transp_forces` (
  `id` int(10) NOT NULL,
  `id_transp` int(10) NOT NULL,
  `id_forces` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_arm`
--

CREATE TABLE `type_arm` (
  `id` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `type_arm`
--

INSERT INTO `type_arm` (`id`, `nom`) VALUES
(2, 'armement des vaisseaux'),
(1, 'armes FPS');

-- --------------------------------------------------------

--
-- Structure de la table `type_role`
--

CREATE TABLE `type_role` (
  `id_role` int(10) NOT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `type_role`
--

INSERT INTO `type_role` (`id_role`, `role`) VALUES
(2, 'admin'),
(1, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `type_transport`
--

CREATE TABLE `type_transport` (
  `id_type` int(10) NOT NULL,
  `nom` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `type_transport`
--

INSERT INTO `type_transport` (`id_type`, `nom`) VALUES
(1, 'Vaisseaux Spatiaux'),
(2, 'Véhicules Terrestres');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_user` int(10) NOT NULL,
  `pseudo` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `pseudo`, `email`, `password`, `ip`, `token`, `date_inscription`, `id_role`) VALUES
(1, 'vanessa', 'vanessa.geoffroid@gmail.com', '$2y$12$T2Tjgzylp2pjyAdqzh3keuTyE53488HYwg3rtmmyP46k2Zy8mKmXy', '127.0.0.1', '1d62c413a75f7f64bfc4821aaba5ad3530e3e54a62ce5670f4e1daff795e4de5e461676928ec26d3d7e6cfef60eaceb76879162d1f441eb06153ea57f362a1ac', '2023-01-07 23:59:01', 2),
(2, 'konrad', 'vaness.geo@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$bHZoMGdiWFA5SHBzeXVxOQ$buf+Emm3i/3DYNflwRFB9hKlXbPHIAyi1YHycF2Nt40', '127.0.0.1', 'd8c0f95e977d05cdcca3042388f6b1e1395c2710f442fedc438acc6b96c09ba722469b3cdd265b75f8430b823026140542de1635e4241f8448aac53ff9296dbf', '2023-01-08 00:05:33', 2),
(3, 'geoffroid', 'va@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$dE5wbWM0Nlk0YkRNR211OQ$01GMuVnrSxBHnukoe23Om/KQHpTwWfrgtlSZCP3aM3g', '127.0.0.1', 'e058c8fe609740c2cd8d55e1fffb529950d2efb9bd10a708cc8ba166e150ceaccb92d085ba2c506338370661d6971f3baa3177fb1d58bca438899d22d9773528', '2023-01-08 00:21:15', 2),
(4, 'gdgdg', 'gegeg@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$QkdKLzNZaldBQm5MalZpMQ$v8PG2flft/47zKlpVfGfyIcL5PlSHOORGHkUDfZ4VfA', '127.0.0.1', '5abb1b6b612e7f580fad5b47dbc630c618b2aa736c21a40d6dd1e95f866f7d0439a79fe8bbaa85d598e6c8ff4edb66224e3ef4f921bed79f1a27d620463b69c7', '2023-01-08 00:22:32', 2),
(5, 'Konrad1', 'hfejhefheuj@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$b0h5dEFSbVU2cmdwdGFISQ$2iorFUQOd6iaivOyGtlRFKpDc5hBNZuo7HYrsCGrN+s', '127.0.0.1', '7f79a869abbccd80ba8ae416d42ca0ba3ee4c2a145c4a4827bc2e46d02cfca1643fbb5b6a55eb4d69552cc5bfb5e76f74c95c41fd2d4ee3199feb1b5baf6c311', '2023-01-08 00:24:06', 2),
(6, 'VAN', 'vane@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$V1ZJWEE4WEhxNzlHMzRINQ$nfEhewPRWvNxcSGhEM33E7Zm6zN/7gmMxtUR7DFInnI', '127.0.0.1', 'fe158f4aab8b2cd709e1ac7a856a05b5bb9db4731b193f3ad4917c753672d40162d5b2cc442cb45a3cb4195c544513e58841c341ffc31222a4e289c04fb899b4', '2023-01-08 00:26:21', 2),
(7, 'Poukette', 'vanessa@gmail.com', '$2y$12$tZtFIsTXovFAcxiAuu1n4eyyKHYISN4vJLZxqXURkiqR.HHSOslcm', '::1', '1ac42a4e92bce593bd9e4e553185de30bda0d0f0e9baa9a9564bc59071736192815756276499ad92a5ee8f1a7a2952b2c92c9c82e15af9c8d18e71f4b39a0d70', '2023-01-28 15:38:55', 2),
(8, 'pouk', 'poukette@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$aml0ajJaNWZRb3dkeHB1YQ$WuR3UZcCtIA/BZZ8euTTfziwZt64ONhriYBWC6UIrZg', '127.0.0.1', '0ec3800c5664a9cb72f1da62419b3fb846f21203d5f0435dfbfbea51c84056759fec3c986174df05c82f2bf36340aede351864a99a7e02c2a2c80f21cbc1f1bc', '2023-01-30 11:22:22', 2),
(9, 'root', 'root@free.fr', '$argon2i$v=19$m=65536,t=4,p=1$U2laOGNRNWJoTlZBYU9kZw$EykOpVSxtuWQ5Qs2Fs/bVD6+3auyCogZXHI7H5X+aQA', '172.29.0.1', 'fbb3eace544498ab8a2a55fa12a9300505119d3d54040971e20c60ca7d567e4becd1096f6c0d7a78fd90db73a6ff103d28f406bb8900982c6e2ddf5057ee221d', '2023-02-10 17:57:46', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `arm_fps`
--
ALTER TABLE `arm_fps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_arm_fps_arm` (`id_arm`),
  ADD KEY `id_arm_fps_cat` (`id_cat`);

--
-- Index pour la table `arm_lieu`
--
ALTER TABLE `arm_lieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_arm_lieu_lieu` (`id_lieu`),
  ADD KEY `id_arm_lieu_arm` (`id_arm`);

--
-- Index pour la table `arm_vaiss`
--
ALTER TABLE `arm_vaiss`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_arm_vaiss_arm` (`id_arm`),
  ADD KEY `id_arm_vaiss_taille` (`id_taille`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_cat_art` (`id_user`),
  ADD KEY `id_cat_art` (`id_categorie_article`);

--
-- Index pour la table `articles_image`
--
ALTER TABLE `articles_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_art_img` (`id_article`);

--
-- Index pour la table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id_avatar`),
  ADD KEY `id_user_avatar` (`id_user`);

--
-- Index pour la table `categories_articles`
--
ALTER TABLE `categories_articles`
  ADD PRIMARY KEY (`id_categorie_article`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `categories_especes`
--
ALTER TABLE `categories_especes`
  ADD PRIMARY KEY (`id_categ_espece`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `categories_lieux`
--
ALTER TABLE `categories_lieux`
  ADD PRIMARY KEY (`id_categ_lieu`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `categorie_arm_fps`
--
ALTER TABLE `categorie_arm_fps`
  ADD PRIMARY KEY (`id_categ_arme`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `categorie_matiere_premier`
--
ALTER TABLE `categorie_matiere_premier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `categorie_transport`
--
ALTER TABLE `categorie_transport`
  ADD PRIMARY KEY (`id_transport`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `constructeur`
--
ALTER TABLE `constructeur`
  ADD PRIMARY KEY (`id_constructeur`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `id_const_user` (`id_user`);

--
-- Index pour la table `constructeur_lieu`
--
ALTER TABLE `constructeur_lieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_const_lieu_const` (`id_constructeur`),
  ADD KEY `id_const_lieu_lieu` (`id_lieu`);

--
-- Index pour la table `construct_arm`
--
ALTER TABLE `construct_arm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_construc_arm_arm` (`id_arm`),
  ADD KEY `id_construct_arm_construct` (`id_construct`);

--
-- Index pour la table `construct_transp`
--
ALTER TABLE `construct_transp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_construct_transp_transp` (`id_transp`),
  ADD KEY `id_construct_transp_construct` (`id_construct`);

--
-- Index pour la table `controle_lieu`
--
ALTER TABLE `controle_lieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cont_esp` (`id_espece`),
  ADD KEY `id_cont_lieu` (`id_lieu`);

--
-- Index pour la table `couleur`
--
ALTER TABLE `couleur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `couleur_lieu_arm`
--
ALTER TABLE `couleur_lieu_arm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_coul_lieu_arm_lieu_arm` (`id_arm_lieu`),
  ADD KEY `id_coul_lieu_arm_coul` (`id_couleur`);

--
-- Index pour la table `diplomatie`
--
ALTER TABLE `diplomatie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `diplomatie_espece`
--
ALTER TABLE `diplomatie_espece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dipl_esp_esp` (`id_espece`),
  ADD KEY `id_dipl_esp_diplo` (`id_diplomatie`);

--
-- Index pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD PRIMARY KEY (`id_disponibilite`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `id_equip_transp_const` (`id_constructeur`);

--
-- Index pour la table `equipements_armement`
--
ALTER TABLE `equipements_armement`
  ADD PRIMARY KEY (`id_arme`),
  ADD KEY `id_arm_objet` (`id_objet`),
  ADD KEY `id_arm_type` (`id_type`);

--
-- Index pour la table `equipements_transports`
--
ALTER TABLE `equipements_transports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transp_objet` (`id_objet`),
  ADD KEY `id_transp_categorie` (`categorie`),
  ADD KEY `id_transp_type` (`type`),
  ADD KEY `id_transp_dispo` (`id_disponible`);

--
-- Index pour la table `especes`
--
ALTER TABLE `especes`
  ADD PRIMARY KEY (`id_espece`),
  ADD KEY `id_cat_esp` (`id_categ_espece`),
  ADD KEY `id_esp_obj` (`id_objet`);

--
-- Index pour la table `faiblesses`
--
ALTER TABLE `faiblesses`
  ADD PRIMARY KEY (`id_faiblesse`),
  ADD UNIQUE KEY `nom_faiblesse` (`nom_faiblesse`);

--
-- Index pour la table `forces`
--
ALTER TABLE `forces`
  ADD PRIMARY KEY (`id_force`),
  ADD UNIQUE KEY `nom_force` (`nom_force`);

--
-- Index pour la table `images_info_objet`
--
ALTER TABLE `images_info_objet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_img_info_info_obj` (`id_info_objet`);

--
-- Index pour la table `images_objet`
--
ALTER TABLE `images_objet`
  ADD PRIMARY KEY (`id_image_obj`),
  ADD KEY `id_obj_img` (`id_objet`);

--
-- Index pour la table `info_objet`
--
ALTER TABLE `info_objet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_info_objet` (`id_objet`);

--
-- Index pour la table `lier_lieu`
--
ALTER TABLE `lier_lieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lier_lieu` (`id_lieu`),
  ADD KEY `id_lier_lieu_lier` (`id_lieu_lier`);

--
-- Index pour la table `lieux`
--
ALTER TABLE `lieux`
  ADD PRIMARY KEY (`id_lieu`),
  ADD KEY `id_obj_lieu` (`id_objet`),
  ADD KEY `id_cat_lieu` (`id_categ_lieu`);

--
-- Index pour la table `lieux_risque`
--
ALTER TABLE `lieux_risque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lieu_risque_lieu` (`id_lieux`),
  ADD KEY `id_lieu_risque_risque` (`id_risque`);

--
-- Index pour la table `lieu_espece`
--
ALTER TABLE `lieu_espece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lieu_esp_esp` (`id_espece`),
  ADD KEY `id_lieu_esp_lieu` (`id_lieu`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_likes`),
  ADD KEY `id_screen_like` (`id_screen`),
  ADD KEY `id_user_like` (`id_user`);

--
-- Index pour la table `matiere_premiere`
--
ALTER TABLE `matiere_premiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mat_cat` (`id_categorie`),
  ADD KEY `id_obj_cat` (`id_objet`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message_lu`
--
ALTER TABLE `message_lu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_message` (`id_mess`),
  ADD KEY `id_message_user` (`id_user`);

--
-- Index pour la table `objet`
--
ALTER TABLE `objet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obj_type` (`id_objet_type`),
  ADD KEY `id_obj_user` (`id_user`);

--
-- Index pour la table `objet_type`
--
ALTER TABLE `objet_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `id_obj_type_user` (`id_user`);

--
-- Index pour la table `password_recover`
--
ALTER TABLE `password_recover`
  ADD PRIMARY KEY (`id`),
  ADD KEY `token_user_pass` (`token_user`);

--
-- Index pour la table `prod_pre_lieu`
--
ALTER TABLE `prod_pre_lieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prod_lieu_lieu` (`id_lieu`),
  ADD KEY `id_pro_lieu_mat` (`id_prod_pre`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obj_propriet` (`id_objet`);

--
-- Index pour la table `proprietaire_lieu`
--
ALTER TABLE `proprietaire_lieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pro_lieu_lieu` (`id_lieu`),
  ADD KEY `id_pro_lieu_pro` (`id_proprietaire`);

--
-- Index pour la table `risque`
--
ALTER TABLE `risque`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`id_screen`),
  ADD KEY `id_screen_user` (`id_user`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obj_service` (`id_objet`);

--
-- Index pour la table `service_lieu`
--
ALTER TABLE `service_lieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_serv_lieu_serv` (`id_service`),
  ADD KEY `id_serv_lieu_lieu` (`id_lieu`);

--
-- Index pour la table `taille_arm_vaisseau`
--
ALTER TABLE `taille_arm_vaisseau`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taille` (`taille`);

--
-- Index pour la table `transport_arm`
--
ALTER TABLE `transport_arm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transp_arm_arm` (`id_arm`),
  ADD KEY `id_transp_arm_transp` (`id_transport`);

--
-- Index pour la table `transport_lieu`
--
ALTER TABLE `transport_lieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lieu_transp_transp` (`id_transport`),
  ADD KEY `id_lieu_transp_lieu` (`id_lieu`);

--
-- Index pour la table `transp_equip`
--
ALTER TABLE `transp_equip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transp_equi_equip` (`id_equip`),
  ADD KEY `id_transp_equi_transp` (`id_transp`);

--
-- Index pour la table `transp_faiblesses`
--
ALTER TABLE `transp_faiblesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transp_faibl_transp` (`id_transp`),
  ADD KEY `id_transp_faibl_faibl` (`id_faiblesse`);

--
-- Index pour la table `transp_forces`
--
ALTER TABLE `transp_forces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transp_force_transp` (`id_transp`),
  ADD KEY `id_transp_force_force` (`id_forces`);

--
-- Index pour la table `type_arm`
--
ALTER TABLE `type_arm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `type_role`
--
ALTER TABLE `type_role`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Index pour la table `type_transport`
--
ALTER TABLE `type_transport`
  ADD PRIMARY KEY (`id_type`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `id_role_user` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `arm_fps`
--
ALTER TABLE `arm_fps`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `arm_lieu`
--
ALTER TABLE `arm_lieu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `arm_vaiss`
--
ALTER TABLE `arm_vaiss`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `articles_image`
--
ALTER TABLE `articles_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id_avatar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories_articles`
--
ALTER TABLE `categories_articles`
  MODIFY `id_categorie_article` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories_especes`
--
ALTER TABLE `categories_especes`
  MODIFY `id_categ_espece` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories_lieux`
--
ALTER TABLE `categories_lieux`
  MODIFY `id_categ_lieu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `categorie_arm_fps`
--
ALTER TABLE `categorie_arm_fps`
  MODIFY `id_categ_arme` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categorie_matiere_premier`
--
ALTER TABLE `categorie_matiere_premier`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie_transport`
--
ALTER TABLE `categorie_transport`
  MODIFY `id_transport` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `constructeur`
--
ALTER TABLE `constructeur`
  MODIFY `id_constructeur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `constructeur_lieu`
--
ALTER TABLE `constructeur_lieu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `construct_arm`
--
ALTER TABLE `construct_arm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `construct_transp`
--
ALTER TABLE `construct_transp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT pour la table `controle_lieu`
--
ALTER TABLE `controle_lieu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `couleur_lieu_arm`
--
ALTER TABLE `couleur_lieu_arm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `diplomatie`
--
ALTER TABLE `diplomatie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `diplomatie_espece`
--
ALTER TABLE `diplomatie_espece`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  MODIFY `id_disponibilite` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `equipements_armement`
--
ALTER TABLE `equipements_armement`
  MODIFY `id_arme` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `equipements_transports`
--
ALTER TABLE `equipements_transports`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT pour la table `especes`
--
ALTER TABLE `especes`
  MODIFY `id_espece` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `faiblesses`
--
ALTER TABLE `faiblesses`
  MODIFY `id_faiblesse` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `forces`
--
ALTER TABLE `forces`
  MODIFY `id_force` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `images_info_objet`
--
ALTER TABLE `images_info_objet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `images_objet`
--
ALTER TABLE `images_objet`
  MODIFY `id_image_obj` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT pour la table `info_objet`
--
ALTER TABLE `info_objet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT pour la table `lier_lieu`
--
ALTER TABLE `lier_lieu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lieux`
--
ALTER TABLE `lieux`
  MODIFY `id_lieu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `lieux_risque`
--
ALTER TABLE `lieux_risque`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lieu_espece`
--
ALTER TABLE `lieu_espece`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_likes` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matiere_premiere`
--
ALTER TABLE `matiere_premiere`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message_lu`
--
ALTER TABLE `message_lu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `objet`
--
ALTER TABLE `objet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT pour la table `objet_type`
--
ALTER TABLE `objet_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `password_recover`
--
ALTER TABLE `password_recover`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `prod_pre_lieu`
--
ALTER TABLE `prod_pre_lieu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `proprietaire_lieu`
--
ALTER TABLE `proprietaire_lieu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `risque`
--
ALTER TABLE `risque`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `screens`
--
ALTER TABLE `screens`
  MODIFY `id_screen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `service_lieu`
--
ALTER TABLE `service_lieu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `taille_arm_vaisseau`
--
ALTER TABLE `taille_arm_vaisseau`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `transport_arm`
--
ALTER TABLE `transport_arm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `transport_lieu`
--
ALTER TABLE `transport_lieu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `transp_equip`
--
ALTER TABLE `transp_equip`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `transp_faiblesses`
--
ALTER TABLE `transp_faiblesses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `transp_forces`
--
ALTER TABLE `transp_forces`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_arm`
--
ALTER TABLE `type_arm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_role`
--
ALTER TABLE `type_role`
  MODIFY `id_role` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_transport`
--
ALTER TABLE `type_transport`
  MODIFY `id_type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `arm_fps`
--
ALTER TABLE `arm_fps`
  ADD CONSTRAINT `id_arm_fps_arm` FOREIGN KEY (`id_arm`) REFERENCES `equipements_armement` (`id_arme`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_arm_fps_cat` FOREIGN KEY (`id_cat`) REFERENCES `categorie_arm_fps` (`id_categ_arme`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `arm_lieu`
--
ALTER TABLE `arm_lieu`
  ADD CONSTRAINT `id_arm_lieu_arm` FOREIGN KEY (`id_arm`) REFERENCES `equipements_armement` (`id_arme`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_arm_lieu_lieu` FOREIGN KEY (`id_lieu`) REFERENCES `lieux` (`id_lieu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `arm_vaiss`
--
ALTER TABLE `arm_vaiss`
  ADD CONSTRAINT `id_arm_vaiss_arm` FOREIGN KEY (`id_arm`) REFERENCES `equipements_armement` (`id_arme`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_arm_vaiss_taille` FOREIGN KEY (`id_taille`) REFERENCES `taille_arm_vaisseau` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `id_cat_art` FOREIGN KEY (`id_categorie_article`) REFERENCES `categories_articles` (`id_categorie_article`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user_cat_art` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `articles_image`
--
ALTER TABLE `articles_image`
  ADD CONSTRAINT `id_art_img` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `avatar`
--
ALTER TABLE `avatar`
  ADD CONSTRAINT `id_user_avatar` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `constructeur`
--
ALTER TABLE `constructeur`
  ADD CONSTRAINT `id_const_user` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `constructeur_lieu`
--
ALTER TABLE `constructeur_lieu`
  ADD CONSTRAINT `id_const_lieu_const` FOREIGN KEY (`id_constructeur`) REFERENCES `constructeur` (`id_constructeur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_const_lieu_lieu` FOREIGN KEY (`id_lieu`) REFERENCES `lieux` (`id_lieu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `construct_arm`
--
ALTER TABLE `construct_arm`
  ADD CONSTRAINT `id_construc_arm_arm` FOREIGN KEY (`id_arm`) REFERENCES `equipements_armement` (`id_arme`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_construct_arm_construct` FOREIGN KEY (`id_construct`) REFERENCES `constructeur` (`id_constructeur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `construct_transp`
--
ALTER TABLE `construct_transp`
  ADD CONSTRAINT `id_construct_transp_construct` FOREIGN KEY (`id_construct`) REFERENCES `constructeur` (`id_constructeur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_construct_transp_transp` FOREIGN KEY (`id_transp`) REFERENCES `equipements_transports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `controle_lieu`
--
ALTER TABLE `controle_lieu`
  ADD CONSTRAINT `id_cont_esp` FOREIGN KEY (`id_espece`) REFERENCES `especes` (`id_espece`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_cont_lieu` FOREIGN KEY (`id_lieu`) REFERENCES `lieux` (`id_lieu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `couleur_lieu_arm`
--
ALTER TABLE `couleur_lieu_arm`
  ADD CONSTRAINT `id_coul_lieu_arm_coul` FOREIGN KEY (`id_couleur`) REFERENCES `couleur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_coul_lieu_arm_lieu_arm` FOREIGN KEY (`id_arm_lieu`) REFERENCES `arm_lieu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `diplomatie_espece`
--
ALTER TABLE `diplomatie_espece`
  ADD CONSTRAINT `id_dipl_esp_diplo` FOREIGN KEY (`id_diplomatie`) REFERENCES `diplomatie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_dipl_esp_esp` FOREIGN KEY (`id_espece`) REFERENCES `especes` (`id_espece`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD CONSTRAINT `id_equip_transp_const` FOREIGN KEY (`id_constructeur`) REFERENCES `constructeur` (`id_constructeur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `equipements_armement`
--
ALTER TABLE `equipements_armement`
  ADD CONSTRAINT `id_arm_objet` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_arm_type` FOREIGN KEY (`id_type`) REFERENCES `type_arm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `equipements_transports`
--
ALTER TABLE `equipements_transports`
  ADD CONSTRAINT `id_transp_categorie` FOREIGN KEY (`categorie`) REFERENCES `categorie_transport` (`id_transport`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_transp_dispo` FOREIGN KEY (`id_disponible`) REFERENCES `disponibilite` (`id_disponibilite`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_transp_objet` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_transp_type` FOREIGN KEY (`type`) REFERENCES `type_transport` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `especes`
--
ALTER TABLE `especes`
  ADD CONSTRAINT `id_cat_esp` FOREIGN KEY (`id_categ_espece`) REFERENCES `categories_especes` (`id_categ_espece`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_esp_obj` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `images_info_objet`
--
ALTER TABLE `images_info_objet`
  ADD CONSTRAINT `id_img_info_info_obj` FOREIGN KEY (`id_info_objet`) REFERENCES `info_objet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `images_objet`
--
ALTER TABLE `images_objet`
  ADD CONSTRAINT `id_obj_img` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `info_objet`
--
ALTER TABLE `info_objet`
  ADD CONSTRAINT `id_info_objet` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lier_lieu`
--
ALTER TABLE `lier_lieu`
  ADD CONSTRAINT `id_lier_lieu` FOREIGN KEY (`id_lieu`) REFERENCES `lieux` (`id_lieu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_lier_lieu_lier` FOREIGN KEY (`id_lieu_lier`) REFERENCES `lieux` (`id_lieu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lieux`
--
ALTER TABLE `lieux`
  ADD CONSTRAINT `id_cat_lieu` FOREIGN KEY (`id_categ_lieu`) REFERENCES `categories_lieux` (`id_categ_lieu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_obj_lieu` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lieux_risque`
--
ALTER TABLE `lieux_risque`
  ADD CONSTRAINT `id_lieu_risque_lieu` FOREIGN KEY (`id_lieux`) REFERENCES `lieux` (`id_lieu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_lieu_risque_risque` FOREIGN KEY (`id_risque`) REFERENCES `risque` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lieu_espece`
--
ALTER TABLE `lieu_espece`
  ADD CONSTRAINT `id_lieu_esp_esp` FOREIGN KEY (`id_espece`) REFERENCES `especes` (`id_espece`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_lieu_esp_lieu` FOREIGN KEY (`id_lieu`) REFERENCES `lieux` (`id_lieu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `id_screen_like` FOREIGN KEY (`id_screen`) REFERENCES `screens` (`id_screen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user_like` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `matiere_premiere`
--
ALTER TABLE `matiere_premiere`
  ADD CONSTRAINT `id_mat_cat` FOREIGN KEY (`id_categorie`) REFERENCES `categorie_matiere_premier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_obj_cat` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message_lu`
--
ALTER TABLE `message_lu`
  ADD CONSTRAINT `id_message` FOREIGN KEY (`id_mess`) REFERENCES `messagerie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_message_user` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `id_obj_type` FOREIGN KEY (`id_objet_type`) REFERENCES `objet_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_obj_user` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `objet_type`
--
ALTER TABLE `objet_type`
  ADD CONSTRAINT `id_obj_type_user` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `password_recover`
--
ALTER TABLE `password_recover`
  ADD CONSTRAINT `token_user_pass` FOREIGN KEY (`token_user`) REFERENCES `utilisateurs` (`token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prod_pre_lieu`
--
ALTER TABLE `prod_pre_lieu`
  ADD CONSTRAINT `id_pro_lieu_mat` FOREIGN KEY (`id_prod_pre`) REFERENCES `matiere_premiere` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_prod_lieu_lieu` FOREIGN KEY (`id_lieu`) REFERENCES `lieux` (`id_lieu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD CONSTRAINT `id_obj_propriet` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proprietaire_lieu`
--
ALTER TABLE `proprietaire_lieu`
  ADD CONSTRAINT `id_pro_lieu_lieu` FOREIGN KEY (`id_lieu`) REFERENCES `lieux` (`id_lieu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_pro_lieu_pro` FOREIGN KEY (`id_proprietaire`) REFERENCES `proprietaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `screens`
--
ALTER TABLE `screens`
  ADD CONSTRAINT `id_screen_user` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `id_obj_service` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `service_lieu`
--
ALTER TABLE `service_lieu`
  ADD CONSTRAINT `id_serv_lieu_lieu` FOREIGN KEY (`id_lieu`) REFERENCES `lieux` (`id_lieu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_serv_lieu_serv` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `transport_arm`
--
ALTER TABLE `transport_arm`
  ADD CONSTRAINT `id_transp_arm_arm` FOREIGN KEY (`id_arm`) REFERENCES `equipements_armement` (`id_arme`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_transp_arm_transp` FOREIGN KEY (`id_transport`) REFERENCES `equipements_transports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `transport_lieu`
--
ALTER TABLE `transport_lieu`
  ADD CONSTRAINT `id_lieu_transp_lieu` FOREIGN KEY (`id_lieu`) REFERENCES `lieux` (`id_lieu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_lieu_transp_transp` FOREIGN KEY (`id_transport`) REFERENCES `equipements_transports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `transp_equip`
--
ALTER TABLE `transp_equip`
  ADD CONSTRAINT `id_transp_equi_equip` FOREIGN KEY (`id_equip`) REFERENCES `equipement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_transp_equi_transp` FOREIGN KEY (`id_transp`) REFERENCES `equipements_transports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `transp_faiblesses`
--
ALTER TABLE `transp_faiblesses`
  ADD CONSTRAINT `id_transp_faibl_faibl` FOREIGN KEY (`id_faiblesse`) REFERENCES `faiblesses` (`id_faiblesse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_transp_faibl_transp` FOREIGN KEY (`id_transp`) REFERENCES `equipements_transports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `transp_forces`
--
ALTER TABLE `transp_forces`
  ADD CONSTRAINT `id_transp_force_force` FOREIGN KEY (`id_forces`) REFERENCES `forces` (`id_force`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_transp_force_transp` FOREIGN KEY (`id_transp`) REFERENCES `equipements_transports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `id_role_user` FOREIGN KEY (`id_role`) REFERENCES `type_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
