-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 27, 2023 at 12:11 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `star_citizen`
--

-- --------------------------------------------------------

--
-- Table structure for table `constructeur`
--

CREATE TABLE `constructeur` (
  `idConstructeur` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `paragraphe1` varchar(1000) NOT NULL,
  `paragraphe2` varchar(1000) NOT NULL,
  `paragraphe3` varchar(1000) NOT NULL,
  `paragraphe4` varchar(1000) NOT NULL,
  `paragraphe5` varchar(1000) NOT NULL,
  `paragraphe6` varchar(1000) NOT NULL,
  `paragraphe7` varchar(1000) NOT NULL,
  `constructeur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `constructeur`
--

INSERT INTO `constructeur` (`idConstructeur`, `nom`, `image`, `logo`, `paragraphe1`, `paragraphe2`, `paragraphe3`, `paragraphe4`, `paragraphe5`, `paragraphe6`, `paragraphe7`, `constructeur`) VALUES
(1, 'Aegis Dynamics', 'AEGS_Vulcan_Promo_Refuel_PJ01-1.jpg', 'constructeur.png', 'Aegis Dynamics (AEGIS) est un fabricant de vaisseaux sur Star Citizen. Spécialisé dans les vaisseaux de combat de grande taille, basée à Jata sur la planète Cestulus dans le système Davien. <br><br>Aegis a longtemps fabriqué des vaisseaux pour le compte du pouvoir en place et lorsque le pouvoir a changé, Aegis a continué de produire pour ceux qui étaient à la tête de l\'Humanité.', 'Aegis Dynamics résulte d\'une fusion entre Aegis Macrocomputing (une entreprise basée sur Terre) et Davien Dynamic Production Systems (basée à Jata sur la planète Cestulus dans le système Davien).\r\nOriginellement cette fusion avait pour but de créer un vaisseau spatial.', 'La firme devint le principal producteur de vaisseaux de guerre de l\'armée de l\'UEE lors de la Première Guerre Tevarin et après la prise du pouvoir par Ivar Messer en 2546 Aegis obtint le monopole de fabrication des vaisseaux des armées du Régime Messer.', 'Lors de la chute du dernier Empereur \"Linton Messer XI\", la frime perdit la quasi totalité des ses contrats et frôla la banqueroute. Pour pallier à cela Aegis changea son fusil d\'épaule et transforma ses modèles de vaisseaux de combats en vaisseaux civils.', '', '', '', 'Aegis Dynamics'),
(2, 'Anvil Aerospace', 'anvil.jpg', 'constructeur2.png', 'Anvil Aerospace (ANVL) est un fabricant de vaisseaux sur Star Citizen. Très réputé dans les domaines que sont les petits vaisseaux de type chasseur et les grands vaisseaux d\'exploration, la firme est basée sur Terra et a une sphère d\'influence aussi grande que celle de l\'UEE.', 'En 2772, Anvil Skunkworks est fondée par J. Harris Arnold dans un quartier de la Nouvelle-Kiev sur Terra. Très vite, l\'entreprise obtient des contrats avec la Navy de l\'UEE et devient rapidement réputée pour la robustesse de son matériel.', 'C\'est pendant près de deux siècles qu\'Anvil Skunkworks, renommé Anvil Aerospace par la suite, va approvisionner sans discontinuer les soldats de la Navy. Que ce soit en composants, en munitions ou en petits vaisseaux, Anvil fournit de grandes quantités de fournitures toujours plus variées à l\'UEE.', 'Implantant ses usines et centres de redistribution aux quatre coins des systèmes de l\'UEE, la firme atteint vite un niveau de renom élevé et ce, dans un grand nombre de systèmes même au-delà des frontières de l\'UEE. Anvil commence alors à fabriquer des vaisseaux conçus dans un but civil, soit en modifiant un concept déjà fabriqué pour la Navy, soit en créant de nouveaux à partir de rien.', '', '', '', 'Anvil Aerospace'),
(3, 'Aopoa', 'aopoa.jpg', 'constructeur3.png', 'Le fabricant Xi\'an AopoA propose des vaisseaux bien différents des modèles produits par les humains dans Star Citizen. Découvrez comment ce constructeur a réussi à s\'implanter, non sans difficultés.', 'Il n\'y a pas si longtemps le constructeur Xi\'an AopoA (prononcé /uh-POE-uh/) et ses vaisseaux n’étaient pas autant les bienvenus dans l’espace humain. Guerre froide, partenariat avec MISC et volonté de l\'Empereur Kray sont des points de l\'histoire de ce constructeur qui en font ce qu\'il est aujourd\'hui dans l\'univers de Star Citizen.', 'Au plus fort de la guerre froide, les Xi’An et l’UEE maintenaient un délicat statu quo le long de la ligne Perry, les deux espèces envoyaient des petits vaisseaux éclaireurs en missions de reconnaissance le long de la ligne pour récolter des informations de manière clandestine.', 'Ce fut lors de ces incursions secrètes que les pilotes de l’UEE rencontrèrent pour la première fois le vaisseau qu’ils finiront par baptiser \"Quark\" (Qhire Khartu chez les Xi\'an). Malgré de nombreuses rencontres, le Quark resta insaisissable jusqu’en 2896, quand un escadron de reconnaissance de la Navy eut la chance d’en découvrir une épave sans pilote.', 'Emmené dans une base militaire secrète de recherche, les scientifiques étaient impressionnés par ses ailes aux articulations complexes et ses propulseurs de manœuvre à double-vecteurs, ils s\'évertuèrent à la rétro-conception des technologies avancées trouvées à bord. Une marque sur la coque du vaisseau ne leur était pas inconnue, elle était identique à celle trouvée sur un bombardier Xi\'an Volper, fabriqué par AopoA', '', '', 'Aopoa'),
(4, 'Argo Astronautics', 'argo.jpg', 'constructeur4.png', 'Souvent mal connu, Argo Astronautics est pourtant un des constructeurs qui a eu le plus d\'impact dans l\'industrie de Star Citizen. En sept siècles d’existence, Argo est devenu une institution.', 'Tout a commencé avec un train. Argo Astronautics est une très vieille entreprise dont l\'ascension impose le respect : elle s\'est lancée avec des réparations sur des lignes de trains pour finir par construire les navettes que nous connaissons dans Star Citizen.', 'En 2243, après près d\'un siècle de transport de personnes et de marchandises à travers les étendues de l\'Amérique du Nord et de l\'Amérique du Sud, la ligne ferroviaire complexe et vieillissante Trans-America Maglev a désespérément besoin d\'une révision.', 'Alors que les transports suborbitaux gagnent des parts de marché, tous les yeux sont tournés vers la nouvelle communauté grandissante de Mars. Les nouveaux moteurs quantiques de RSI suscitent de plus en plus d’intérêt et tout les budgets sont consacrés a notre installation dans le système solaire, laissant peu d\'espoir pour la ligne de chemin de fer.', 'Alana Redmond a grandi avec sa mère, chef de quart, sur la ligne Trans-Am. C\'est sans surprise qu’après avoir fini ses études Alana commence à travailler dans la même entreprise, comme assistante ingénieur. Les pannes sont régulières et obligent le train à des arrêts répétés. C\'est lors de la réparation d\'une bobine de lévitation qu\'Alana remarqua un morceau de ferraille qui avait été tordu par les forces magnétiques. Elle émet alors l\'hypothèse qu\'elle peux utiliser les forces générées par le train pour compléter le processus de réparation.', '', '', 'Argo Astronautics'),
(5, 'Consolidated Outland', 'conso.jpg', 'constructeur5.png', 'Consolidated Outland, le fabricant du célèbre Mustang et de ses variantes, est sûrement la marque de vaisseaux la plus récemment créée dans l\'Univers de Star Citizen. L\'intégralité de la firme est possédée par un jeune multi-milliardaire issu de la planète Bremen.', 'Consolidated Outland (CNOU), souvent abrégé C.O, est un fabricant de vaisseaux sur Star Citizen basé à Stalford sur Bremen. Bien qu\'il soit moins important que des firmes comme RSI ou Aegis, cela ne l\'empêche pas de faire des bénéfices très conséquents.', 'Consolidated Outland est intégralement détenue par Silas Koerner, un jeune multi-milliardaire. Ce fan d’aérospatiale a créé C.O non pas pour se rendre riche, mais bien car il a estimé pouvoir fabriquer des vaisseaux de meilleure facture que ceux actuellement dans le commerce.', 'Silas a créé C.O en s\'appuyant sur la fortune familiale notamment acquise par son ancêtre chargé d\'organiser la colonisation de la planète Bremen. Dès l\'âge de 16 ans, il investit dans tout un tas de petites entreprises en apparence insignifiantes et sans avenir. Pourtant chacune de ces entreprises prit de l\'importance, rapportant des sommes colossales au jeune Koerner.', 'Consolidated Outland voit le jour aux abords du 20ème anniversaire de Silas Koerner. Il est depuis longtemps passionné par les courses spatiales, mais ne trouve pas son bonheur parmi les vaisseaux existants. Il conçoit donc le premier prototype du Mustang et utilise ses fonds personnels pour en fabriquer un exemplaire. Satisfait de sa création, il fonde Consolidated Outland pour mettre sur le marché ce qu\'il considère comme le vaisseau de course parfait.', '', '', 'Consolidated Outland'),
(6, 'Crusader Industries', 'crusader.jpg', 'constructeur6.png', 'Crusader Industries est un fabricant de vaisseaux de transport. Cette firme est également connue pour posséder sa propre planète dans le système Stanton. Réputés pour leur fiabilité à toute épreuve, les vaisseaux de transport de Crusader Industries servent aussi bien l\'armée que les particuliers.', 'Crusader Industries (CRSD) est un fabricant de vaisseaux dans Star Citizen basé à Orison sur la planète Crusader du système Stanton. La firme est spécialisée dans les vaisseaux de transport de toutes tailles et pour toutes les bourses. Cette large gamme lui a permis d\'acquérir un certain renom dans beaucoup de domaines.', 'L\'histoire de Crusader Industries n\'est pas très claire et il est très difficile d\'avoir des informations sur le parcours de cette marque. On peut estimer que sa fondation a eu lieu lors du XXVème ou XXVIème siècle car il semblerait que Crusader Industries existât avant la dynastie des Messer.', 'Il est certain que lors de la mise en vente des planètes du système Stanton, Crusader Industries avait déjà en sa possession une fortune suffisante pour pouvoir acheter Stanton II.', 'Après cet achat, la firme délocalisa presque toutes ses usines de production sur la planète nouvellement acquise ainsi que ses quartiers généraux. Elle fit fabriquer la ville d\'Orison afin d\'accueillir ses ouvriers et ingénieurs en charge de la production de vaisseaux ainsi que leurs familles.', '', '', 'Crusader Industries'),
(7, 'Drake Interplanetary', 'drake.jpg', 'constructeur7.png', 'Le fabricant de vaisseaux de Star Citizen, Drake Interplanetary, a pour réputation de vendre ses produits à tous ceux qui veulent les acheter qu\'ils soient des honnêtes citoyens de l\'UEE ou des pirates sans foi ni loi. Cette politique lui vaut souvent d\'être mal vu par certaines personnes.', 'Drake Interplanetary (DRAK) est un fabricant de vaisseaux et de véhicules antigrav sur Star Citizen. Ces vaisseaux peuvent être utilisés de façon très diverse, mais sont tous conçus avec un but précis : être peu coûteux. C\'est à Odyssa sur Borea dans le système Magnus que la firme a établi son siège social il y a de ça environ un siècle.', 'En 2845, l\'UEE lance le projet \"Volksfighter\" afin de trouver un vaisseau constructible à la chaîne pour un faible coût. Ce vaisseau devait être capable de défendre les frontières de l\'UEE désormais trop éloignées pour que la sécurité puisse être garantie par l\'armée. En réponse à ce projet, Jan Dredge propose le prototype du premier Cutlass, un vaisseau révolutionnaire alliant résistance, force de frappe et capacité de transport pour un coût ridiculement faible.', 'Malheureusement, le Cutlass perd face au Wildcat qui tombera dans l\'oubli peu de temps après la mise en place du projet. Mais pour Jan Dredge, cet échec ne doit pas se solder par une perte de temps. Il décide donc, avec une demi-douzaine de ses associés, de fonder Drake Interplanetary afin de commercialiser une version civile du Cutlass originel.', 'Profitant de l\'instabilité économique régnant dans le système Magnus, Drake installe ses premières usines dans la ville d\'Odyssa et commence la production du Cutlass. Le succès est immédiat. En moins de 5 ans la firme rentre au panthéon des plus grand fabricants de vaisseaux de l\'Histoire. Dans le même temps, Drake s\'établit sur de nouvelles planètes créant des usines et des sites de reventes dans presque tous les systèmes de l\'UEE.', '', '', 'Drake Interplanetary'),
(8, 'Esperia Incorporation', 'esperia.jpg', 'constructeur8.png', 'Esperia Incorporation est un fabricant de vaisseaux issus des technologies aliens. Leurs vaisseaux sont réputés pour être très proches de modèles de vaisseaux utilisés par certaines espèces aliens comme les Tevarins ou les Vanduuls.', 'Esperia Incorporation (ESPR) est un fabricant de vaisseaux dans Star Citizen basé à Kutaram sur Terra. Cette entreprise est spécialisée dans la fabrication de vaisseaux utilisant de la technologie alien. Certaines de leurs créations sont d\'ailleurs directement inspirées par des vaisseaux utilisés par d\'autres espèces intelligentes.', 'Esperia Incorporation est une entreprise relativement récente puisque sa fondation ne date que de 2873. On doit sa création à deux frères passionnés par les vols spatiaux, Jovi et Theo lngstrom. Cette fratrie a grandi exclusivement sur Terra et ils ont vu passer un grand nombre de projets de vaisseaux en tous genres. Mais parmi tous les projets qui voyaient le jour, seul un petit nombre d\'entre eux était produit par les grandes firmes de l\'aérospatiale.', 'De là, se développa chez les deux frères une frustration de ne pas voir voler ces vaisseaux si prometteurs sur le papier. Ils créèrent donc Esperia dans le but de racheter les projets classés sans suite par les grosses entreprises afin de les conserver. Ils proposaient à des collectionneurs privés de lancer des productions à petite échelle de ces vaisseaux.', 'Petit à petit, Esperia gagna en importance et les frères Ingstorm décidèrent de lancer leur propre production pour vendre leurs vaisseaux conceptuels au grand public. Pour augmenter l\'originalité de leurs créations, ils ajoutèrent certaines technologies aliens sur les vaisseaux. Les ingénieurs d\'Esperia devinrent vite les plus qualifiés dans l\'adaptation technologies aliens aux vaisseaux humains.', '', '', 'Esperia Incorporation'),
(9, 'Kruger Intergalactic', 'kruger.jpg', 'constructeur9.png', 'Il existe dans Star Citizen une entreprise connue et respectée dans tout l\'Empire pour la qualité de son travail : Kruger Intergalactic. Une devise \"La perfection dans chaque pièce\".', 'Kruger Intergalactic est une entreprise de l\'univers Star Citizen qui est partie de presque rien pour finalement devenir l\'un des principaux fournisseur de pièces détachées de l\'empire et même un fabricant d\'armes et de vaisseaux à part entière.', 'En 2558, Ozell Kruger ouvrit un atelier sur sa planète natale, à Borea, dans le système Magnus et appela la société Kruger Intergalactic. La capacité de son entreprise à livrer des produits de première qualité dans les délais et les budgets impartis a rapidement impressionné les clients. Malgré tout, c\'est la chance d\'Ozell d\'avoir ouvert son entreprise pendant le boom de Borea qui l\'a vraiment aidée à prospérer.', 'Avec l\'expansion des infrastructures de la Marine dans le système, l\'UPE a investi\r\nmassivement sur la planète, pendant un certain temps, elle a été un centre militaire majeur\r\navec de nombreux chantiers navales.', 'C\'est au cours de cette période que Kruger a commencé sa relation de longue date\r\navec Behring et RSI.', '', '', 'Kruger Intergalactic'),
(10, 'MISC', 'misc.jpg', 'constructeur10.png', 'Musashi Industrial and Starflight Concern est le concepteur des plus gros vaisseaux de transport de l\'UEE avec la célèbre gamme des Hull. Il est également le seul armateur humain à avoir un partenariat avec les Xi\'An ce qui permet à MISC de bénéficier de la technologie extra-terrestre.', 'Musashi Industrial and Starflight Concern, plus couramment appelé MISC, est un fabricant de vaisseaux sur Star Citizen. Spécialisé dans les vaisseaux de transport de toutes les tailles, la firme est loin de n\'avoir que cette corde à son arc. Les bureaux de MISC siègent sur Saisei dans le système Centauri situé à proximité du territoire Vanduul.', 'MISC provient de la fusion entre deux sociétés : Hato Electronics Corporation et Musashi Lifestyle Design Unit en 2805. Cette fusion est mutuellement bénéfique, car elle permet l\'utilisation optimale des industries de Hato et la mise en avant des concepts de Musashi.', 'Le succès initial de MISC vient de son premier produit : le MISC-HI (HI pour Heavy Industrial). Ce vaisseau, aujourd\'hui disparu, est l\'ancêtre des Hull que nous connaissons actuellement. À sa sortie, le HI fait un carton autant chez les militaires que chez les civils, mais également à la surprise générale, chez les Xi\'An.', 'C\'est la première fois dans l\'Histoire de l\'Humanité, que des échanges commerciaux ont lieu avec les Xi\'An. Jusqu\'à présent, cette civilisation avait toujours été réticente à commercer avec les Humains, préférant rester entre eux.', '', '', 'MISC'),
(11, 'Origin Jumpworks GmbH', 'origin.png', 'constructeur11.png', 'La société de construction spatiale Origin Jumpworks GmbH est célèbre pour ses vaisseaux raffinés et puissants, mais aussi pour leurs prix exorbitants. Aussi luxueux que redoutables les vaisseaux Origin sont de très haute qualité et d\'aucun dirait qu\'ils méritent leur prix.', 'Origin Jumpworks GmbH est un important armateur spatial sur Star Citizen. Spécialisé dans le luxueux et le haut de gamme, leurs vaisseaux peuvent tout aussi bien servir de chasseurs pour les plus petits, ou de vaisseaux de croisières pour les plus gros, le tout sans jamais négliger l\'aspect esthétique.', 'C\'est lors de l\'âge d\'or économique du \"Glowing Age\" qui a fait suite à la course à l\'anti-matière, que l\'entreprise Allemande Origin Jumpworks GmbH est sortie du lot. Fondée quelques années auparavant à Cologne, l\'entreprise s\'est démarquée en fabricant des réacteurs à fusion de très bonne facture devenant même fournisseurs des fameuses RSI et Aegis Dynamics.', 'Peu de temps après avoir décroché ces contrats, Origin se lança dans la production de petits vaisseaux afin d\'élargir ses horizons de ventes.Il résulte de ce projet les gammes 200 et 300 en qui sortent en 2899. Le succès de ces vaisseaux propulsa Origin sur la deuxième marche du marché spatial.', 'Pendant longtemps, Origin est restée sur Terre, soucieuse de proposer à ses clients fortunés des composant conçus et fabriqués dans le système Solaire. Mais en 2913 la Présidente Jennifer Friskers décida de délocaliser le siège social sur Terra, la nouvelle capitale culturelle de l\'UEE. Cette décision fût accueillie avec véhémence par beaucoup d’officiels de la firme car cette relocalisation entraîna une grande migration de beaucoup d\'usines et de bureaux.', '', '', 'Origin Jumpworks GmbH'),
(12, 'Roberts Space Industries', 'robert.jpg', 'constructeur12.png', 'Le constructeur et la société d\'aérospatiale Roberts Space Industries notamment célèbre pour produire la gamme des Constellations et des Aurora ne se limite pas qu\'à ces deux vaisseaux iconiques de Star Citizen. En effet RSI dispose d\'une importante diversité de vaisseaux civils.', 'Roberts Space Industries (RSI) est un des principaux constructeurs sur Star Citizen. Vaisseaux, véhicules terrestres, combinaisons ; RSI est présent dans de nombreux domaines. Dans l\'histoire du jeu, RSI est aussi présent depuis la genèse de l\'exploration spatiale. Focus historique et présentations de vaisseaux.', 'Créée en 2038 par Chris Roberts, Roberts Space Industries est une multinationale humaine qui a d\'abord commencé en fabriquant et en concevant des équipements énergétiques. Au fur et à mesure, l\'entreprise se met à s’atteler à des programmes spatiaux et cherche à trouver un moyen de rendre le voyage spatial plus simple et abordable. C\'est en 2075 après 14 années de recherche que RSI sort le premier prototype de Moteur Quantique et c\'est alors une réelle révolution de l\'industrie aérospatiale.', 'Grâce à ce nouveau système de déplacement spatial, les explorations extra-terrestre se font monnaie courante rapportant sans cesse de nouvelles découvertes faites dans le système solaire et bientôt même hors de celui-ci.', '', '', '', 'Roberts Space Industries');

-- --------------------------------------------------------

--
-- Table structure for table `lieux`
--

CREATE TABLE `lieux` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `imageprincipale` varchar(255) NOT NULL,
  `paragraphe1` varchar(1000) NOT NULL,
  `paragraphe2` varchar(1000) NOT NULL,
  `paragraphe3` varchar(1000) NOT NULL,
  `paragraphe4` varchar(1000) NOT NULL,
  `paragraphe5` varchar(1000) NOT NULL,
  `paragraphe6` varchar(1000) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `image5` varchar(255) NOT NULL,
  `image6` varchar(255) NOT NULL,
  `nomSatellite1` varchar(255) NOT NULL,
  `nomSatellite2` varchar(255) NOT NULL,
  `nomSatellite3` varchar(255) NOT NULL,
  `nomSatellite4` varchar(255) NOT NULL,
  `nomSatellite5` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `imagesatellite1` varchar(255) NOT NULL,
  `imagesatellite2` varchar(255) NOT NULL,
  `imagesatellite3` varchar(255) NOT NULL,
  `imagesatellite4` varchar(255) NOT NULL,
  `imagesatellite5` varchar(255) NOT NULL,
  `astre` varchar(255) NOT NULL,
  `juridiction` varchar(255) NOT NULL,
  `rayon` varchar(255) NOT NULL,
  `atmosphere` varchar(255) NOT NULL,
  `satellites_naturels` varchar(255) NOT NULL,
  `satellites_artificiels` varchar(255) NOT NULL,
  `biomes` varchar(255) NOT NULL,
  `avant_postes` varchar(255) NOT NULL,
  `usines` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `lieux`
--

INSERT INTO `lieux` (`id`, `nom`, `image`, `imageprincipale`, `paragraphe1`, `paragraphe2`, `paragraphe3`, `paragraphe4`, `paragraphe5`, `paragraphe6`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `nomSatellite1`, `nomSatellite2`, `nomSatellite3`, `nomSatellite4`, `nomSatellite5`, `imagesatellite1`, `imagesatellite2`, `imagesatellite3`, `imagesatellite4`, `imagesatellite5`, `astre`, `juridiction`, `rayon`, `atmosphere`, `satellites_naturels`, `satellites_artificiels`, `biomes`, `avant_postes`, `usines`) VALUES
(1, 'Hurston', 'hurston2.jpg', 'hurston.jpg', 'La première planète du système stellaire Stanton est Hurston. Elle fut la première à voir apparaître des biomes multiples dans Star Citizen, ainsi que le berceau de la première ville jouable, Lorville. Nous vous proposons un tour d\'horizon de cet astre aux infinies ressources.', 'Stanton I, rapidement renommée Hurston après son achat en 2904, soit une petite année après la revendication du système par L\'UEE, fut par conséquent la première des quatre planètes de Stanton à être vendue à une super-corporation. Elle tire son nom de la firme Hurston Dynamics et de sa PDG Magda Hurston qui en firent l\'acquisition.', 'Cette \"super terre\" présente de nombreux intérêts dans l\'industrie primaire. En effet si son diamètre est similaire à celui de la Terre, sa masse bien supérieure s\'explique par la présence de nombreux métaux au sein de son enveloppe. L\'état actuel d\'Hurston et la destruction ultra rapide de sa biosphère initiale (environ 50 ans) s\'expliquent d\'ailleurs par le nombre ahurissant de mines et usines qui ont pullulé à sa surface durant cette période; en attestent également les conditions de vie dans la ville principale Lorville, présentant une pollution parfois mortelle dans les quartiers les plus bas.', 'A l\'image d\'ArcCorp, l\'expansion industrielle de la planète figure parmi les plus rapides jamais exécutées. La tour de Lorville par exemple, fut achevée en seulement 4 ans.', '', '', 'lieu1.jpg', 'lieu2.jpg', 'lieu3.jpg', 'lieu4.jpg', 'lieu5.jpg', 'lieu6.jpg', 'Arial', 'Magda', 'Aberdeen', 'Ita', '', 'satellite1.jpg', 'satellite2.jpg', 'satellite3.jpg', 'satellite4.png', '', 'Stanton', 'Hurston Dynamics\r\n\r\nUEE', '6378', 'Air à 0.82 atm\r\n100 000 ft', '4', '4', '5', '7', '16'),
(2, 'Crusader', 'crusaderplanete2.jpg', 'crusaderplanete.png', 'Crusader est l\'une des planètes du système Stanton dans Star Citizen. Considérée comme une géante gazeuse, il appartient à l\'entreprise Crusader Industries qui profite de sa haute atmosphère pour bâtir ses vaisseaux comme le Starliner.', 'Crusader (autrement appelée Stanton II) est l\'une des planète du système Stanton de Star Citizen.', 'A l\'origine la géante gazeuse se prêtait mal à l\'activité humaine. Voyant qu\'elle présentait un coeur rocheux, l\'UEE a tout mis en oeuvre afin d\'essayer de terraformer la planète. Ces tentatives échouèrent et seule la haute atmosphère était devenue respirable.\r\nCette situation représentait une aubaine inespérée pour Crusader Industries. De grands réseaux de villes flottantes, à destination militaire au départ, sont créées.', 'La faible densité de l\'atmosphère permet notamment à la firme de pouvoir créer, à haute-altitude, de nombreux vaisseaux dont la conception aurait dû être faite hors atmosphère sur d\'autres planètes. Cette situation inédite permet de réduire drastiquement les coûts de certains vaisseaux comme le Starliner par exemple. La compagnie parle d\'une économie de 40% des coûts de fabrication. Elle est ensuite répercutée sur le prix de vente au consommateur.', 'La société offre aussi un cadre de vie idyllique à ses salariés sur Crusader. Avec des logements en dômes à haute altitude, les collaborateurs profitent d\'une vue unique sur la planète.\r\nCrusader Industries a également développé le tourisme. Si de somptueuses villes ont été érigées pour les visiteurs, les chantiers navals offrent aussi un spectacle ahurissant avec ses imposants vaisseaux suspendus dans les airs.', '', 'lieu7.jpg', 'lieu8.jpg', 'lieu15.jpg', 'lieu16.jpg', 'lieu17.jpg', 'lieu18.jpg', 'Daymar', 'Yela', 'Cellin', '', '', 'satellite5.jpg', 'satellite6.jpg', 'satellite7.png', '', '', 'Stanton', 'UEE', 'N/A', '', '3', '', '', '', ''),
(3, 'ArcCorp', 'ArcCorp2.jpg', 'ArcCorp.png', 'L\'arrivée du patch 3.5 de Star Citizen apporte plusieurs nouveautés majeures et la présence d\'ArcCorp dans le patch est certainement la plus importante.', 'ArcCorp (autrement appelée Stanton III) est l\'une des planètes du système Stanton de Star Citizen. Contrôlée par la ArcCorp Corporation, c\'est l\'une des planètes abritant le moins de végétation de tout son système.', 'La planète fut découverte en 2903 par l\'UEE, en même temps que l\'ensemble des autres astres du système. La colonisation impliqua un retrait des terres possédées par les populations autochtones. Elle furent ensuite vendues à ArcCorp Corporation en 2920 qui lui donna son nom.', 'La planète est entièrement terraformée et ne laisse quasiment aucune place à la végétation. Il faut dire que lors de son acquisition, ArcCorp corporation a décidé d\'en tirer pleinement profit. La compagnie à divisé ses terres en multiples parcelles qu\'elle a ensuite mis à disposition d\'autres sociétés.', 'Beaucoup d\'anthropologistes estiment que la planète en l\'état actuel est le plus proche équivalent des mondes usines Xi\'An. Elle représente un vrai espoir pour tous ceux qui souhaitent un jour que la race humaine évolue vers ce stade d\'avancement technologique.', '', 'lieu9.png', 'lieu10.png', 'lieu19.jpg', 'lieu20.jpg', 'lieu21.jfif', 'lieu22.jfif', 'Lyria', 'Wala', '', '', '', 'satellite8.png', 'satellite9.png', '', '', '', '', 'UEE/ArcCorp', '800 km', 'Azote (78,1%)\r\nOxygène (20,9%)\r\nArgon (0.93%)\r\nDioxyde de carbone (0.04%)', '2', '', '', '', ''),
(4, 'Microtech', 'micro2.png', 'micro.png', 'Microtech est la quatrième planète du système Stanton dans Star Citizen. Elle est détenue par la firme du même nom. C\'est une planète gelée présentant une majorité de glaciers et de magnifiques toundras polaires. Elle possède trois lunes et une zone d\'atterrissage principale : New Babbage.', 'Dans Star Citizen, la planète Microtech est le fief de la méga-corporation éponyme, spécialisée dans la production de composants électroniques. Si la société est connue pour de multiples accomplissements tels que la fabrication et la distribution de l\'incontournable MobiGlas, la planète a été moins chanceuse. Victime d\'une erreur de calibrage lors de sa terraformation, elle est aujourd\'hui gelée sur la majorité de sa surface. Cependant, l\'endroit n\'a pas été délaissé pour autant, et nombreuses sont les entreprises en quête de développement qui s\'y implantent, tant cet espace est devenu le fleuron de la recherche et du développement en électronique de pointe.', 'La firme Microtech ne s\'est pas seulement enrichie grâce au succès du MobiGlas, elle peut aussi se targuer d\'équiper la majorité des vaisseaux les plus communs de l\'UEE en composants avioniques .', 'La planète possède une zone d\'atterrissage, faisant office de siège social pour l\'entreprise : New-Babbage', 'Elle possède également trois lunes : Calliope, Clio et Euterpe.', '', 'lieu11.png', 'lieu12.jpg', 'lieu13.png', 'lieu14.jpg', 'lieu23.jpg', 'lieu24.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lunes`
--

CREATE TABLE `lunes` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `paragraphe1` varchar(500) NOT NULL,
  `paragraphe2` varchar(500) NOT NULL,
  `paragraphe3` varchar(500) NOT NULL,
  `orbite` varchar(500) NOT NULL,
  `affiliation` varchar(255) NOT NULL,
  `rayon` varchar(255) NOT NULL,
  `gravite` varchar(255) NOT NULL,
  `air` varchar(255) NOT NULL,
  `altitude` varchar(255) NOT NULL,
  `atmosphere` varchar(255) NOT NULL,
  `rotation` varchar(255) NOT NULL,
  `revolution` varchar(255) NOT NULL,
  `satellite` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `lunes`
--

INSERT INTO `lunes` (`id`, `nom`, `image`, `paragraphe1`, `paragraphe2`, `paragraphe3`, `orbite`, `affiliation`, `rayon`, `gravite`, `air`, `altitude`, `atmosphere`, `rotation`, `revolution`, `satellite`, `image1`, `image2`) VALUES
(1, 'Arial, première lune d\'Hurston', 'lune1.jpg', 'Dans Star Citizen, Arial est le satellite le plus proche de sa planète, Hurston. Son atmosphère est inhospitalière.', 'Première lune de la planète Hurston, Arial porte le nom d\'Arial Hurston, troisième PDG de la Firme Hurston Dynamics. Il fut connu pour avoir mis en place un système d\'emploi controversé, permettant à des entreprises de posséder ses employés.', ' L\'atmosphère d\'Arial est nocive car composée à 98% d\'azote.', 'Hurston', 'UEE', '345.5 km', 'NA', 'Non', '20 500 m', 'Azote 97.7%\r\n\r\nMéthane 1.8%\r\n\r\nHydrogène 0.5%', 'NA', 'NA', '0', 'lune2.jpg', 'lune3.jpg'),
(2, 'Aberdeen, seconde lune d\'Hurston', 'lune4.jpg', 'Dans Star Citizen, Aberdeen est le deuxième satellite le plus proche de sa planète, Hurston. Son Atmosphère est inhospitalière.', 'Le scientifique Aberdeen Hurston, créateur du premier missile à antimatière, a donné son nom au second satellite naturel de Stanton I. L\'oxyde et le dioxyde de souffre qui composent 99% de son atmosphère, lui valent sa teinte dorée si particulière. On pourra trouver de petits amas d\'astéroïdes et des débris sur son orbite.', 'Aberdeen abrite deux avant-postes miniers: HDMS Noorgard et HDMS Anderson.', 'Hurston', 'UEE', '275km', 'NA', 'Non', '16 000 m', 'Dioxyde de Soufre 89.8% -\r\n\r\nOxyde de soufre 9.3% -\r\n\r\nChlorure de sodium 0.9%', 'NA', 'NA', '0', 'lune5.jpg', 'lune6.jpg'),
(3, 'Magda, troisième lune d\'Hurston', 'lune7.jpg', 'Dans Star Citizen, Magda est le deuxième satellite le plus éloigné de sa planète, Hurston. Son Atmosphère est inhospitalière.', 'Magda Hurston, Ancienne PDG d\'Hurston Dynamics, est à l\'origine de la décision de la firme d\'acquérir la planète Stanton I. C\'est logiquement que son nom fut donné au troisième satellite de la planète. Son orbite est l\'un des lieux ou l\'on trouvera l\'une des station spatiales détruites.', 'L\'atmosphère est nocive sur Magda puisque composée à 98% d\'azote.', 'Hurston', 'UEE', '341 km\r\n\r\n', 'NA', 'Non', '20.000 m\r\n\r\n', 'Azote 98.1% -\r\n\r\nMéthane 1.5% -\r\n\r\nHydrogène 0.21% -\r\n\r\nDioxyde de carbone 0.21%', 'NA', 'NA', '0', 'lune8.jpg', 'lune9.png'),
(4, 'Ita, quatrième lune d\'Hurston', 'lune10.jpg', 'Dans Star Citizen, Ita est le satellite le plus éloigné de sa planète: Hurston. Son Atmosphère est inhospitalière.', 'Ita possède une symbolique particulière pour la firme d\'armement Hurston Dynamics. En effet le satellite porte le nom d\'Ita Hurston, militaire ayant péri lors de la première guerre Tevarin. Elle s\'en sert comme \"Souvenir marquant l\'importance des produits HurstonDynamics \". Son orbite est l\'un des lieux ou l\'on trouvera l\'une des station spatiales détruites.', 'Son atmosphère est nocive car constituée à 98% d\'azote.\r\n\r\nA sa surface, on pourra trouver deux avant-postes miniers: HDMS Woodruff et HDMS Ryder.', 'Hurston', 'UEE', '325 km\r\n\r\n', 'NA', 'Non', '19 500 m\r\n\r\n', 'Azote 98.5% -\r\n\r\nMéthane 1.5% -\r\n\r\nMonoxyde de Carbone 0.05%', 'NA', 'NA', '0', 'lune11.jpg', 'lune12.jpg'),
(5, 'Cellin, lune de Crusader', 'lune13.jpg', 'Cellin est l\'une des lune de Crusader dans Star Citizen. Réputée pour ses volcans endormis et ses geysers surpuissants, il est difficile de la parcourir. Avec le Security Post Kareah orbitant autour d\'elle, c\'est un point stratégique pour tous les contrebandiers aux alentours.', 'Cellin (autrement appelée Stanton 2a) est l\'une des lunes orbitant autour de Crusader sur Star Citizen.', 'Son nom est tiré d\'un conte pour enfant du 24ème siècle, \"Un cadeau pour Baba\". Dans cette histoire, Cellin est la benjamine d\'une fratrie de trois enfants (avec Yela et Daymar) qui part seule de Mars en direction d\'Europe, une des lunes de Jupiter afin de rendre visite à leur grand mère.\r\nLa lune a été baptisée du nom de la petite dernière en raison de son caractère tumultueux et agressif, représenté par les nombreux cratères et volcans de la lune.', 'Crusader', 'UEE', '260 km\r\n\r\n', '0.357G', 'Non', 'N/A\r\n\r\n', 'Dioxyde de soufre (90%) -\r\nMonoxide de soufre (7%) -\r\nDioxigène (3%)', '26.68H (en heure standard\r\nterrestre)', '7.86 jours (en jour standard\r\nterrestre)', '1', 'lune14.jpg', 'lune15.png'),
(6, 'Daymar, lune de Crusader', 'lune16.jpg', 'Daymar est la plus grande lune de Crusader dans l\'univers de Star Citizen. Réputée pour ses nombreux et sinueux canyons, elle fait le bonheur des commerçants s\'approvisionnant en minerai. Ses températures clémentes lui permettent aussi d\'attirer bon nombre de touristes en quête de dépaysement.', 'Daymar (autrement appelée Stanton 2b) est l\'une des lunes orbitant autour de Crusader sur Star Citizen.\r\n\r\nSon nom est tiré d\'un conte pour enfants du 24ème siècle, \"Un cadeau pour Baba\". Dans cette histoire, Daymar est la cadette d\'une fratrie de trois enfants (avec Cellin et Yela) qui part seule de Mars en direction d\'Europe, une des lunes de Jupiter afin de rendre visite à leur grand-mère.\r\nLa lune a été baptisée du nom du deuxième enfant par rapport à son don.', 'Le nom a été choisi par Kelly Kaplan au moment du rachat de la planète Crusader par l\'entreprise qui porte le même nom. Voulant développer le tourisme et générer plus de revenus avec les lunes, il décida de les aménager et leur donner un nom que tous les citoyens pourraient retenir facilement.\r\n\r\n', 'Crusader', 'UEE', '295 km\r\n\r\n', '0.357G', 'Non', '30.000 ft\r\n\r\n', 'Azote (94,4%) -\r\nMéthane (1,4%) -\r\nHydrogène (0.2%)', '14,9H (en heure standard\r\nterrestre)', '10,94 jours (en jour standard\r\nterrestre)', '1', 'lune17.png', 'lune18.png'),
(7, 'Yela, lune de Crusader', 'lune19.jpg', 'Yela est l\'une des lunes de la planète Crusader sur Star Citizen. Abritant tout un tas de ressources naturelles, elle est également un lieu privilégié pour les revendeurs de widow grâce au laboratoire Jumptown. Petit tour d\'horizon de la lune glacée dans cet article dédié.Yela (autrement appelée Stanton 2c) est l\'une des lunes orbitant autour de Crusader sur Star Citizen.', 'Son nom est tiré d\'un conte pour enfant du 24ème siècle, \"Un cadeau pour Baba\". Dans cette histoire, Yela est la soeur aînée d\'une fratrie de trois enfants (avec Cellin et Daymar) qui part seule de Mars en direction d\'Europe, une des lunes de Jupiter afin de rendre visite à leur grand mère.\r\nLa lune a été baptisée du nom de la soeur aînée pour son tempérament froid et calculateur, correspondant assez bien aux sols de la lune.', 'C\'est Kelly Kaplan, PDG de Crusader industries qui aurait décidé du nom de cette lune. Lors du rachat par sa compagnie de la planète Crusader à l\'UEE, il avait comme objectif de développer l\'activité touristique de sa planète gazeuse et utilisant ses lunes. Leur nom (dont Yela) a donc été donné en hommage à ce conte bien connu de tous pour que ces dernières soient attrayantes et faciles à retenir.', 'Crusader', 'UEE\r\n\r\n', '313 km\r\n\r\n', '0.357G', 'Non', '32.000 ft\r\n\r\n', 'Dioxygène (100%)\r\n\r\n', '10,94H (en heure standard\r\nterrestre)', '15,38 jours (en jour standard\r\nterrestre)', '1', 'lune20.png', 'lune21.jpg'),
(8, 'Lyria, lune d\'ArcCorp', 'lune22.jpg', 'Lyria est l\'une des lunes de ArcCorp et implantée au patch 3.5 de Star Citizen. Réputée pour ses cryovolcans et cryogeysers elle abrite aussi à sa surface de l\'eau à l\'état liquide. Découvrez tout les détails de Lyria dans cet article dédié.\r\n\r\n', 'Lyria (autrement appelée Stanton 3a) est l\'une des lunes orbitant autour de ArcCorp sur Star Citizen.', 'Cette lune est notamment réputée pour ses cryogeysers et cyrosvolcans. Elle est entièrement recouverte de glace lui donnant un atmosphère froid mais humide', 'ArcCorp', 'UEE/ArcCorp Corporation\r\n\r\n', '224 km\r\n\r\n', '0.09 atm\r\n\r\n', 'Oui', 'Environ 21.000 ft\r\n\r\n', 'Oxygène (97,7%), Eau (1,5%), Ammoniac (0.77%)\r\n\r\n', 'N/A\r\n\r\n', 'N/A\r\n\r\n', '0', 'lune23.png', 'lune24.png'),
(9, 'Wala, lune d\'ArcCorp', 'lune25.jpg', 'Wala est une des deux lunes d\'ArcCorp, la nouvelle planète du système Stanton. La lune est d\'ailleurs réputée pour ses cristaux qui lui donnent, vu du ciel, une couleur turquoise toute particulière.', 'Wala (autrement appelée ArcCorp 3b) est l\'une des lunes orbitant autour de ArcCorp sur Star Citizen.', 'La surface de la lune est stérile mais présente des affleurements de minéraux ressemblant à des géodes.\r\nElle dispose d\'une faible densité ce qui facilite la tâche des pilotes pour manœuvrer à sa surface.', 'ArcCorp', 'UEE/ArcCorp\r\n\r\n', '283 km\r\n\r\n', '0.98G', 'Non', 'Environ 28.000 ft\r\n\r\n', 'Azote (79,5%), dioxygène (19.5), Argon (0.95%),\r\nDioxyde de carbone (0.04%)', 'N/A\r\n\r\n', 'N/A\r\n\r\n', '0', 'lune26.png', 'lune27.png'),
(10, 'Calliope, Lune de Microtech', 'lune28.jpg', 'Microtech possède trois satellites naturels, tous au moins aussi inhospitaliers que leur planète parente. Cependant, aucune n\'est dénuée d\'intérêt ! Nous vous présentons donc aujourd\'hui, Calliope, lune de Microtech.', 'Calliope (autrement appelée Stanton 4a) est l\'une des lunes orbitant autour de Microtech dans Star Citizen.\r\nC\'est un satellite gelé ou la température extérieure avoisine les -120 degrés. Il est donc fortement recommandé de vous équiper d\'une armure contre le froid en cas d\'expédition prolongée à sa surface.', 'Sa surface est très riche en minéraux, ce qui en fait un lieu de minage parfait, aussi bien à pied qu\'en vaisseau. En effet, si l\'on trouve aisément des filons en surface, on pourra également se rendre dans l\'une des grottes logées sous sa surface, pour en extraire le minerai, ou réaliser une mission de recherche. Attention, aucune grotte n\'est répertoriée, il vous faudra au préalable accepter une mission pour en situer l\'entrée.', 'Microtech', 'UEE', '240km', 'NA', 'Non\r\n\r\n', '25000 m\r\n\r\n', 'Oxygène -\r\nArgon -\r\nEau', '-', '-', '0', 'lune29.jpg', 'lune30.png'),
(11, 'Clio, Lune de Microtech', 'lune31.jpg', 'Microtech est une planète de Star Citizen qui possède trois satellites naturels, chacun d\'entre eux possède se particularités, c\'est pourquoi nous vous présentons aujourd\'hui : Clio, la seconde lune de Microtech.', 'Avec son océan d\'émeraude, et ses montagnes offrant des panoramas spectaculaires, Clio paraît au premier abord être une destination touristique rêvée. Son atmosphère est inhospitalière et froide, et même si celle-ci est composée d\'azote et d\'oxygène, elle n\'est en aucun cas respirable. Tout mineur qui se respecte aura l\'occasion d\'y passer quelques heures fructueuses, et les marchands pourront y trouver leur compte, lors de leur passage dans l\'orbite de Microtech.', 'L\'atmosphère de la planète se situe à une température moyenne de -55 degrés. Ces conditions ne vous forcent pas à vous équiper d\'une armure environnementale, car de nombreuses autres armures présentent un seuil de sécurité allant jusqu\'à -75°.\r\n\r\nEnfin, quelques grottes non-répertoriées trouent la surface de Clio, et les expéditions en profondeur pourront porter des fruits financiers en mettant à profit le minage à pied.', 'Microtech', 'UEE', '335km', 'NA', 'Non', '34.000 ft\r\n\r\n', 'Azote -\r\nDioxygène -\r\n\r\nArgon -\r\nCO²', '-', '-', '0', 'lune32.jpg', 'lune33.jpg'),
(12, 'Euterpe, lune de Microtech', 'lune34.jpg', 'Euterpe est la lune la plus éloignée de sa planète Microtech dans Star Citizen. Elle possède plusieurs particularité comme la fait de ne posséder aucun avant-poste ou encore le fait de posséder une atmosphère suffisamment riche en oxygène pour recharger vos bombonnes.', 'Euterpe est très froide (entre -80 et -125 degrés) assurez vous donc de vous équiper de votre armure environnementale avant d\'en explorer la surface. Cette lune particulière alterne entre étendues gelées et plaines rocheuses, sans relief prononcé, et est la seule lune de Star Citizen à ne présenter aucun marqueur à sa surface. ', 'Seuls le minage et les missions de recherche sont susceptibles de vous emmener sur Euterpe, et elle restera longtemps hors des radars tant le reste de l\'espace de Microtech est riche.\r\nNous avons relevé les coordonnées d\'une grotte sur Euterpe : OM-1 : 340km ; OM-4 : 305.9km ; OM-6 : 152.9km', 'Microtech', 'UEE\r\n\r\n', '230km', 'NA', 'Potentiellement\r\nmais la température empêche\r\nd’enlever sa combinaison', '22.000 m\r\n\r\n', 'Azote -\r\nDioxygène -\r\n\r\nArgon -\r\nCO²', 'NA', 'NA', '0', 'lune35.jpg', 'lune36.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messagerie`
--

CREATE TABLE `messagerie` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_recover`
--

CREATE TABLE `password_recover` (
  `id` int NOT NULL,
  `token_user` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_recover` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_acl_groups`
--

CREATE TABLE `phpbb_acl_groups` (
  `group_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `auth_option_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `auth_role_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `auth_setting` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_acl_groups`
--

INSERT INTO `phpbb_acl_groups` (`group_id`, `forum_id`, `auth_option_id`, `auth_role_id`, `auth_setting`) VALUES
(1, 0, 91, 0, 1),
(1, 0, 100, 0, 1),
(1, 0, 119, 0, 1),
(5, 0, 0, 5, 0),
(5, 0, 0, 1, 0),
(2, 0, 0, 6, 0),
(3, 0, 0, 6, 0),
(4, 0, 0, 5, 0),
(4, 0, 0, 10, 0),
(1, 1, 0, 17, 0),
(2, 1, 0, 17, 0),
(3, 1, 0, 17, 0),
(6, 1, 0, 17, 0),
(1, 2, 0, 17, 0),
(2, 2, 0, 15, 0),
(3, 2, 0, 15, 0),
(4, 2, 0, 21, 0),
(5, 2, 0, 14, 0),
(5, 2, 0, 10, 0),
(6, 2, 0, 19, 0),
(7, 0, 0, 23, 0),
(7, 2, 0, 24, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_acl_options`
--

CREATE TABLE `phpbb_acl_options` (
  `auth_option_id` mediumint UNSIGNED NOT NULL,
  `auth_option` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `is_global` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `is_local` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `founder_only` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_acl_options`
--

INSERT INTO `phpbb_acl_options` (`auth_option_id`, `auth_option`, `is_global`, `is_local`, `founder_only`) VALUES
(1, 'f_', 0, 1, 0),
(2, 'f_announce', 0, 1, 0),
(3, 'f_announce_global', 0, 1, 0),
(4, 'f_attach', 0, 1, 0),
(5, 'f_bbcode', 0, 1, 0),
(6, 'f_bump', 0, 1, 0),
(7, 'f_delete', 0, 1, 0),
(8, 'f_download', 0, 1, 0),
(9, 'f_edit', 0, 1, 0),
(10, 'f_email', 0, 1, 0),
(11, 'f_flash', 0, 1, 0),
(12, 'f_icons', 0, 1, 0),
(13, 'f_ignoreflood', 0, 1, 0),
(14, 'f_img', 0, 1, 0),
(15, 'f_list', 0, 1, 0),
(16, 'f_list_topics', 0, 1, 0),
(17, 'f_noapprove', 0, 1, 0),
(18, 'f_poll', 0, 1, 0),
(19, 'f_post', 0, 1, 0),
(20, 'f_postcount', 0, 1, 0),
(21, 'f_print', 0, 1, 0),
(22, 'f_read', 0, 1, 0),
(23, 'f_reply', 0, 1, 0),
(24, 'f_report', 0, 1, 0),
(25, 'f_search', 0, 1, 0),
(26, 'f_sigs', 0, 1, 0),
(27, 'f_smilies', 0, 1, 0),
(28, 'f_sticky', 0, 1, 0),
(29, 'f_subscribe', 0, 1, 0),
(30, 'f_user_lock', 0, 1, 0),
(31, 'f_vote', 0, 1, 0),
(32, 'f_votechg', 0, 1, 0),
(33, 'f_softdelete', 0, 1, 0),
(34, 'm_', 1, 1, 0),
(35, 'm_approve', 1, 1, 0),
(36, 'm_chgposter', 1, 1, 0),
(37, 'm_delete', 1, 1, 0),
(38, 'm_edit', 1, 1, 0),
(39, 'm_info', 1, 1, 0),
(40, 'm_lock', 1, 1, 0),
(41, 'm_merge', 1, 1, 0),
(42, 'm_move', 1, 1, 0),
(43, 'm_report', 1, 1, 0),
(44, 'm_split', 1, 1, 0),
(45, 'm_softdelete', 1, 1, 0),
(46, 'm_ban', 1, 0, 0),
(47, 'm_pm_report', 1, 0, 0),
(48, 'm_warn', 1, 0, 0),
(49, 'a_', 1, 0, 0),
(50, 'a_aauth', 1, 0, 0),
(51, 'a_attach', 1, 0, 0),
(52, 'a_authgroups', 1, 0, 0),
(53, 'a_authusers', 1, 0, 0),
(54, 'a_backup', 1, 0, 0),
(55, 'a_ban', 1, 0, 0),
(56, 'a_bbcode', 1, 0, 0),
(57, 'a_board', 1, 0, 0),
(58, 'a_bots', 1, 0, 0),
(59, 'a_clearlogs', 1, 0, 0),
(60, 'a_email', 1, 0, 0),
(61, 'a_extensions', 1, 0, 0),
(62, 'a_fauth', 1, 0, 0),
(63, 'a_forum', 1, 0, 0),
(64, 'a_forumadd', 1, 0, 0),
(65, 'a_forumdel', 1, 0, 0),
(66, 'a_group', 1, 0, 0),
(67, 'a_groupadd', 1, 0, 0),
(68, 'a_groupdel', 1, 0, 0),
(69, 'a_icons', 1, 0, 0),
(70, 'a_jabber', 1, 0, 0),
(71, 'a_language', 1, 0, 0),
(72, 'a_mauth', 1, 0, 0),
(73, 'a_modules', 1, 0, 0),
(74, 'a_names', 1, 0, 0),
(75, 'a_phpinfo', 1, 0, 0),
(76, 'a_profile', 1, 0, 0),
(77, 'a_prune', 1, 0, 0),
(78, 'a_ranks', 1, 0, 0),
(79, 'a_reasons', 1, 0, 0),
(80, 'a_roles', 1, 0, 0),
(81, 'a_search', 1, 0, 0),
(82, 'a_server', 1, 0, 0),
(83, 'a_styles', 1, 0, 0),
(84, 'a_switchperm', 1, 0, 0),
(85, 'a_uauth', 1, 0, 0),
(86, 'a_user', 1, 0, 0),
(87, 'a_userdel', 1, 0, 0),
(88, 'a_viewauth', 1, 0, 0),
(89, 'a_viewlogs', 1, 0, 0),
(90, 'a_words', 1, 0, 0),
(91, 'u_', 1, 0, 0),
(92, 'u_attach', 1, 0, 0),
(93, 'u_chgavatar', 1, 0, 0),
(94, 'u_chgcensors', 1, 0, 0),
(95, 'u_chgemail', 1, 0, 0),
(96, 'u_chggrp', 1, 0, 0),
(97, 'u_chgname', 1, 0, 0),
(98, 'u_chgpasswd', 1, 0, 0),
(99, 'u_chgprofileinfo', 1, 0, 0),
(100, 'u_download', 1, 0, 0),
(101, 'u_emoji', 1, 0, 0),
(102, 'u_hideonline', 1, 0, 0),
(103, 'u_ignoreflood', 1, 0, 0),
(104, 'u_masspm', 1, 0, 0),
(105, 'u_masspm_group', 1, 0, 0),
(106, 'u_pm_attach', 1, 0, 0),
(107, 'u_pm_bbcode', 1, 0, 0),
(108, 'u_pm_delete', 1, 0, 0),
(109, 'u_pm_download', 1, 0, 0),
(110, 'u_pm_edit', 1, 0, 0),
(111, 'u_pm_emailpm', 1, 0, 0),
(112, 'u_pm_flash', 1, 0, 0),
(113, 'u_pm_forward', 1, 0, 0),
(114, 'u_pm_img', 1, 0, 0),
(115, 'u_pm_printpm', 1, 0, 0),
(116, 'u_pm_smilies', 1, 0, 0),
(117, 'u_readpm', 1, 0, 0),
(118, 'u_savedrafts', 1, 0, 0),
(119, 'u_search', 1, 0, 0),
(120, 'u_sendemail', 1, 0, 0),
(121, 'u_sendim', 1, 0, 0),
(122, 'u_sendpm', 1, 0, 0),
(123, 'u_sig', 1, 0, 0),
(124, 'u_viewonline', 1, 0, 0),
(125, 'u_viewprofile', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_acl_roles`
--

CREATE TABLE `phpbb_acl_roles` (
  `role_id` mediumint UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `role_description` text COLLATE utf8mb3_bin NOT NULL,
  `role_type` varchar(10) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `role_order` smallint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_acl_roles`
--

INSERT INTO `phpbb_acl_roles` (`role_id`, `role_name`, `role_description`, `role_type`, `role_order`) VALUES
(1, 'ROLE_ADMIN_STANDARD', 'ROLE_DESCRIPTION_ADMIN_STANDARD', 'a_', 1),
(2, 'ROLE_ADMIN_FORUM', 'ROLE_DESCRIPTION_ADMIN_FORUM', 'a_', 3),
(3, 'ROLE_ADMIN_USERGROUP', 'ROLE_DESCRIPTION_ADMIN_USERGROUP', 'a_', 4),
(4, 'ROLE_ADMIN_FULL', 'ROLE_DESCRIPTION_ADMIN_FULL', 'a_', 2),
(5, 'ROLE_USER_FULL', 'ROLE_DESCRIPTION_USER_FULL', 'u_', 3),
(6, 'ROLE_USER_STANDARD', 'ROLE_DESCRIPTION_USER_STANDARD', 'u_', 1),
(7, 'ROLE_USER_LIMITED', 'ROLE_DESCRIPTION_USER_LIMITED', 'u_', 2),
(8, 'ROLE_USER_NOPM', 'ROLE_DESCRIPTION_USER_NOPM', 'u_', 4),
(9, 'ROLE_USER_NOAVATAR', 'ROLE_DESCRIPTION_USER_NOAVATAR', 'u_', 5),
(10, 'ROLE_MOD_FULL', 'ROLE_DESCRIPTION_MOD_FULL', 'm_', 3),
(11, 'ROLE_MOD_STANDARD', 'ROLE_DESCRIPTION_MOD_STANDARD', 'm_', 1),
(12, 'ROLE_MOD_SIMPLE', 'ROLE_DESCRIPTION_MOD_SIMPLE', 'm_', 2),
(13, 'ROLE_MOD_QUEUE', 'ROLE_DESCRIPTION_MOD_QUEUE', 'm_', 4),
(14, 'ROLE_FORUM_FULL', 'ROLE_DESCRIPTION_FORUM_FULL', 'f_', 7),
(15, 'ROLE_FORUM_STANDARD', 'ROLE_DESCRIPTION_FORUM_STANDARD', 'f_', 5),
(16, 'ROLE_FORUM_NOACCESS', 'ROLE_DESCRIPTION_FORUM_NOACCESS', 'f_', 1),
(17, 'ROLE_FORUM_READONLY', 'ROLE_DESCRIPTION_FORUM_READONLY', 'f_', 2),
(18, 'ROLE_FORUM_LIMITED', 'ROLE_DESCRIPTION_FORUM_LIMITED', 'f_', 3),
(19, 'ROLE_FORUM_BOT', 'ROLE_DESCRIPTION_FORUM_BOT', 'f_', 9),
(20, 'ROLE_FORUM_ONQUEUE', 'ROLE_DESCRIPTION_FORUM_ONQUEUE', 'f_', 8),
(21, 'ROLE_FORUM_POLLS', 'ROLE_DESCRIPTION_FORUM_POLLS', 'f_', 6),
(22, 'ROLE_FORUM_LIMITED_POLLS', 'ROLE_DESCRIPTION_FORUM_LIMITED_POLLS', 'f_', 4),
(23, 'ROLE_USER_NEW_MEMBER', 'ROLE_DESCRIPTION_USER_NEW_MEMBER', 'u_', 6),
(24, 'ROLE_FORUM_NEW_MEMBER', 'ROLE_DESCRIPTION_FORUM_NEW_MEMBER', 'f_', 10);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_acl_roles_data`
--

CREATE TABLE `phpbb_acl_roles_data` (
  `role_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `auth_option_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `auth_setting` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_acl_roles_data`
--

INSERT INTO `phpbb_acl_roles_data` (`role_id`, `auth_option_id`, `auth_setting`) VALUES
(1, 49, 1),
(1, 51, 1),
(1, 52, 1),
(1, 53, 1),
(1, 55, 1),
(1, 56, 1),
(1, 57, 1),
(1, 61, 1),
(1, 62, 1),
(1, 63, 1),
(1, 64, 1),
(1, 65, 1),
(1, 66, 1),
(1, 67, 1),
(1, 68, 1),
(1, 69, 1),
(1, 72, 1),
(1, 74, 1),
(1, 76, 1),
(1, 77, 1),
(1, 78, 1),
(1, 79, 1),
(1, 85, 1),
(1, 86, 1),
(1, 87, 1),
(1, 88, 1),
(1, 89, 1),
(1, 90, 1),
(2, 49, 1),
(2, 52, 1),
(2, 53, 1),
(2, 62, 1),
(2, 63, 1),
(2, 64, 1),
(2, 65, 1),
(2, 72, 1),
(2, 77, 1),
(2, 85, 1),
(2, 88, 1),
(2, 89, 1),
(3, 49, 1),
(3, 52, 1),
(3, 53, 1),
(3, 55, 1),
(3, 66, 1),
(3, 67, 1),
(3, 68, 1),
(3, 78, 1),
(3, 85, 1),
(3, 86, 1),
(3, 88, 1),
(3, 89, 1),
(4, 49, 1),
(4, 50, 1),
(4, 51, 1),
(4, 52, 1),
(4, 53, 1),
(4, 54, 1),
(4, 55, 1),
(4, 56, 1),
(4, 57, 1),
(4, 58, 1),
(4, 59, 1),
(4, 60, 1),
(4, 61, 1),
(4, 62, 1),
(4, 63, 1),
(4, 64, 1),
(4, 65, 1),
(4, 66, 1),
(4, 67, 1),
(4, 68, 1),
(4, 69, 1),
(4, 70, 1),
(4, 71, 1),
(4, 72, 1),
(4, 73, 1),
(4, 74, 1),
(4, 75, 1),
(4, 76, 1),
(4, 77, 1),
(4, 78, 1),
(4, 79, 1),
(4, 80, 1),
(4, 81, 1),
(4, 82, 1),
(4, 83, 1),
(4, 84, 1),
(4, 85, 1),
(4, 86, 1),
(4, 87, 1),
(4, 88, 1),
(4, 89, 1),
(4, 90, 1),
(5, 91, 1),
(5, 92, 1),
(5, 93, 1),
(5, 94, 1),
(5, 95, 1),
(5, 96, 1),
(5, 97, 1),
(5, 98, 1),
(5, 99, 1),
(5, 100, 1),
(5, 101, 1),
(5, 102, 1),
(5, 103, 1),
(5, 104, 1),
(5, 105, 1),
(5, 106, 1),
(5, 107, 1),
(5, 108, 1),
(5, 109, 1),
(5, 110, 1),
(5, 111, 1),
(5, 112, 1),
(5, 113, 1),
(5, 114, 1),
(5, 115, 1),
(5, 116, 1),
(5, 117, 1),
(5, 118, 1),
(5, 119, 1),
(5, 120, 1),
(5, 121, 1),
(5, 122, 1),
(5, 123, 1),
(5, 124, 1),
(5, 125, 1),
(6, 91, 1),
(6, 92, 1),
(6, 93, 1),
(6, 94, 1),
(6, 95, 1),
(6, 98, 1),
(6, 99, 1),
(6, 100, 1),
(6, 101, 1),
(6, 102, 1),
(6, 104, 1),
(6, 105, 1),
(6, 106, 1),
(6, 107, 1),
(6, 108, 1),
(6, 109, 1),
(6, 110, 1),
(6, 111, 1),
(6, 114, 1),
(6, 115, 1),
(6, 116, 1),
(6, 117, 1),
(6, 118, 1),
(6, 119, 1),
(6, 120, 1),
(6, 121, 1),
(6, 122, 1),
(6, 123, 1),
(6, 125, 1),
(7, 91, 1),
(7, 93, 1),
(7, 94, 1),
(7, 95, 1),
(7, 98, 1),
(7, 99, 1),
(7, 100, 1),
(7, 101, 1),
(7, 102, 1),
(7, 107, 1),
(7, 108, 1),
(7, 109, 1),
(7, 110, 1),
(7, 113, 1),
(7, 114, 1),
(7, 115, 1),
(7, 116, 1),
(7, 117, 1),
(7, 122, 1),
(7, 123, 1),
(7, 125, 1),
(8, 91, 1),
(8, 93, 1),
(8, 94, 1),
(8, 95, 1),
(8, 98, 1),
(8, 100, 1),
(8, 102, 1),
(8, 104, 0),
(8, 105, 0),
(8, 117, 0),
(8, 122, 0),
(8, 123, 1),
(8, 125, 1),
(9, 91, 1),
(9, 93, 0),
(9, 94, 1),
(9, 95, 1),
(9, 98, 1),
(9, 99, 1),
(9, 100, 1),
(9, 101, 1),
(9, 102, 1),
(9, 107, 1),
(9, 108, 1),
(9, 109, 1),
(9, 110, 1),
(9, 113, 1),
(9, 114, 1),
(9, 115, 1),
(9, 116, 1),
(9, 117, 1),
(9, 122, 1),
(9, 123, 1),
(9, 125, 1),
(10, 34, 1),
(10, 35, 1),
(10, 36, 1),
(10, 37, 1),
(10, 38, 1),
(10, 39, 1),
(10, 40, 1),
(10, 41, 1),
(10, 42, 1),
(10, 43, 1),
(10, 44, 1),
(10, 45, 1),
(10, 46, 1),
(10, 47, 1),
(10, 48, 1),
(11, 34, 1),
(11, 35, 1),
(11, 37, 1),
(11, 38, 1),
(11, 39, 1),
(11, 40, 1),
(11, 41, 1),
(11, 42, 1),
(11, 43, 1),
(11, 44, 1),
(11, 45, 1),
(11, 47, 1),
(11, 48, 1),
(12, 34, 1),
(12, 37, 1),
(12, 38, 1),
(12, 39, 1),
(12, 43, 1),
(12, 45, 1),
(12, 47, 1),
(13, 34, 1),
(13, 35, 1),
(13, 38, 1),
(14, 1, 1),
(14, 2, 1),
(14, 3, 1),
(14, 4, 1),
(14, 5, 1),
(14, 6, 1),
(14, 7, 1),
(14, 8, 1),
(14, 9, 1),
(14, 10, 1),
(14, 11, 1),
(14, 12, 1),
(14, 13, 1),
(14, 14, 1),
(14, 15, 1),
(14, 16, 1),
(14, 17, 1),
(14, 18, 1),
(14, 19, 1),
(14, 20, 1),
(14, 21, 1),
(14, 22, 1),
(14, 23, 1),
(14, 24, 1),
(14, 25, 1),
(14, 26, 1),
(14, 27, 1),
(14, 28, 1),
(14, 29, 1),
(14, 30, 1),
(14, 31, 1),
(14, 32, 1),
(14, 33, 1),
(15, 1, 1),
(15, 4, 1),
(15, 5, 1),
(15, 6, 1),
(15, 7, 1),
(15, 8, 1),
(15, 9, 1),
(15, 10, 1),
(15, 12, 1),
(15, 14, 1),
(15, 15, 1),
(15, 16, 1),
(15, 17, 1),
(15, 19, 1),
(15, 20, 1),
(15, 21, 1),
(15, 22, 1),
(15, 23, 1),
(15, 24, 1),
(15, 25, 1),
(15, 26, 1),
(15, 27, 1),
(15, 29, 1),
(15, 31, 1),
(15, 32, 1),
(15, 33, 1),
(16, 1, 0),
(17, 1, 1),
(17, 8, 1),
(17, 15, 1),
(17, 16, 1),
(17, 21, 1),
(17, 22, 1),
(17, 25, 1),
(17, 29, 1),
(18, 1, 1),
(18, 5, 1),
(18, 8, 1),
(18, 9, 1),
(18, 10, 1),
(18, 14, 1),
(18, 15, 1),
(18, 16, 1),
(18, 17, 1),
(18, 19, 1),
(18, 20, 1),
(18, 21, 1),
(18, 22, 1),
(18, 23, 1),
(18, 24, 1),
(18, 25, 1),
(18, 26, 1),
(18, 27, 1),
(18, 29, 1),
(18, 31, 1),
(18, 33, 1),
(19, 1, 1),
(19, 8, 1),
(19, 15, 1),
(19, 16, 1),
(19, 21, 1),
(19, 22, 1),
(20, 1, 1),
(20, 4, 1),
(20, 5, 1),
(20, 8, 1),
(20, 9, 1),
(20, 10, 1),
(20, 14, 1),
(20, 15, 1),
(20, 16, 1),
(20, 17, 0),
(20, 19, 1),
(20, 20, 1),
(20, 21, 1),
(20, 22, 1),
(20, 23, 1),
(20, 24, 1),
(20, 25, 1),
(20, 26, 1),
(20, 27, 1),
(20, 29, 1),
(20, 31, 1),
(20, 33, 1),
(21, 1, 1),
(21, 4, 1),
(21, 5, 1),
(21, 6, 1),
(21, 7, 1),
(21, 8, 1),
(21, 9, 1),
(21, 10, 1),
(21, 12, 1),
(21, 14, 1),
(21, 15, 1),
(21, 16, 1),
(21, 17, 1),
(21, 18, 1),
(21, 19, 1),
(21, 20, 1),
(21, 21, 1),
(21, 22, 1),
(21, 23, 1),
(21, 24, 1),
(21, 25, 1),
(21, 26, 1),
(21, 27, 1),
(21, 29, 1),
(21, 31, 1),
(21, 32, 1),
(21, 33, 1),
(22, 1, 1),
(22, 5, 1),
(22, 8, 1),
(22, 9, 1),
(22, 10, 1),
(22, 14, 1),
(22, 15, 1),
(22, 16, 1),
(22, 17, 1),
(22, 18, 1),
(22, 19, 1),
(22, 20, 1),
(22, 21, 1),
(22, 22, 1),
(22, 23, 1),
(22, 24, 1),
(22, 25, 1),
(22, 26, 1),
(22, 27, 1),
(22, 29, 1),
(22, 31, 1),
(22, 33, 1),
(23, 99, 0),
(23, 104, 0),
(23, 105, 0),
(23, 122, 0),
(24, 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_acl_users`
--

CREATE TABLE `phpbb_acl_users` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `auth_option_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `auth_role_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `auth_setting` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_acl_users`
--

INSERT INTO `phpbb_acl_users` (`user_id`, `forum_id`, `auth_option_id`, `auth_role_id`, `auth_setting`) VALUES
(2, 0, 0, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_attachments`
--

CREATE TABLE `phpbb_attachments` (
  `attach_id` int UNSIGNED NOT NULL,
  `post_msg_id` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_id` int UNSIGNED NOT NULL DEFAULT '0',
  `in_message` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `poster_id` int UNSIGNED NOT NULL DEFAULT '0',
  `is_orphan` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `physical_filename` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `real_filename` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `download_count` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `attach_comment` text COLLATE utf8mb3_bin NOT NULL,
  `extension` varchar(100) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `mimetype` varchar(100) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `filesize` int UNSIGNED NOT NULL DEFAULT '0',
  `filetime` int UNSIGNED NOT NULL DEFAULT '0',
  `thumbnail` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_banlist`
--

CREATE TABLE `phpbb_banlist` (
  `ban_id` int UNSIGNED NOT NULL,
  `ban_userid` int UNSIGNED NOT NULL DEFAULT '0',
  `ban_ip` varchar(40) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `ban_email` varchar(100) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `ban_start` int UNSIGNED NOT NULL DEFAULT '0',
  `ban_end` int UNSIGNED NOT NULL DEFAULT '0',
  `ban_exclude` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `ban_give_reason` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_bbcodes`
--

CREATE TABLE `phpbb_bbcodes` (
  `bbcode_id` smallint UNSIGNED NOT NULL DEFAULT '0',
  `bbcode_tag` varchar(16) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `bbcode_helpline` text COLLATE utf8mb3_bin NOT NULL,
  `display_on_posting` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `bbcode_match` text COLLATE utf8mb3_bin NOT NULL,
  `bbcode_tpl` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `first_pass_match` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `first_pass_replace` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `second_pass_match` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `second_pass_replace` mediumtext COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_bookmarks`
--

CREATE TABLE `phpbb_bookmarks` (
  `topic_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_bots`
--

CREATE TABLE `phpbb_bots` (
  `bot_id` int UNSIGNED NOT NULL,
  `bot_active` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `bot_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `bot_agent` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `bot_ip` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_bots`
--

INSERT INTO `phpbb_bots` (`bot_id`, `bot_active`, `bot_name`, `user_id`, `bot_agent`, `bot_ip`) VALUES
(1, 1, 'AdsBot [Google]', 3, 'AdsBot-Google', ''),
(2, 1, 'Ahrefs [Bot]', 4, 'AhrefsBot/', ''),
(3, 1, 'Alexa [Bot]', 5, 'ia_archiver', ''),
(4, 1, 'Alta Vista [Bot]', 6, 'Scooter/', ''),
(5, 1, 'Amazon [Bot]', 7, 'Amazonbot/', ''),
(6, 1, 'Ask Jeeves [Bot]', 8, 'Ask Jeeves', ''),
(7, 1, 'Baidu [Spider]', 9, 'Baiduspider', ''),
(8, 1, 'Bing [Bot]', 10, 'bingbot/', ''),
(9, 1, 'DuckDuckGo [Bot]', 11, 'DuckDuckBot/', ''),
(10, 1, 'Exabot [Bot]', 12, 'Exabot/', ''),
(11, 1, 'FAST Enterprise [Crawler]', 13, 'FAST Enterprise Crawler', ''),
(12, 1, 'FAST WebCrawler [Crawler]', 14, 'FAST-WebCrawler/', ''),
(13, 1, 'Francis [Bot]', 15, 'http://www.neomo.de/', ''),
(14, 1, 'Gigabot [Bot]', 16, 'Gigabot/', ''),
(15, 1, 'Google Adsense [Bot]', 17, 'Mediapartners-Google', ''),
(16, 1, 'Google Desktop', 18, 'Google Desktop', ''),
(17, 1, 'Google Feedfetcher', 19, 'Feedfetcher-Google', ''),
(18, 1, 'Google [Bot]', 20, 'Googlebot', ''),
(19, 1, 'Heise IT-Markt [Crawler]', 21, 'heise-IT-Markt-Crawler', ''),
(20, 1, 'Heritrix [Crawler]', 22, 'heritrix/1.', ''),
(21, 1, 'IBM Research [Bot]', 23, 'ibm.com/cs/crawler', ''),
(22, 1, 'ICCrawler - ICjobs', 24, 'ICCrawler - ICjobs', ''),
(23, 1, 'ichiro [Crawler]', 25, 'ichiro/', ''),
(24, 1, 'Majestic-12 [Bot]', 26, 'MJ12bot/', ''),
(25, 1, 'Metager [Bot]', 27, 'MetagerBot/', ''),
(26, 1, 'MSN NewsBlogs', 28, 'msnbot-NewsBlogs/', ''),
(27, 1, 'MSN [Bot]', 29, 'msnbot/', ''),
(28, 1, 'MSNbot Media', 30, 'msnbot-media/', ''),
(29, 1, 'NG-Search [Bot]', 31, 'NG-Search/', ''),
(30, 1, 'Nutch [Bot]', 32, 'http://lucene.apache.org/nutch/', ''),
(31, 1, 'Nutch/CVS [Bot]', 33, 'NutchCVS/', ''),
(32, 1, 'OmniExplorer [Bot]', 34, 'OmniExplorer_Bot/', ''),
(33, 1, 'Online link [Validator]', 35, 'online link validator', ''),
(34, 1, 'psbot [Picsearch]', 36, 'psbot/0', ''),
(35, 1, 'Seekport [Bot]', 37, 'Seekbot/', ''),
(36, 1, 'Semrush [Bot]', 38, 'SemrushBot/', ''),
(37, 1, 'Sensis [Crawler]', 39, 'Sensis Web Crawler', ''),
(38, 1, 'SEO Crawler', 40, 'SEO search Crawler/', ''),
(39, 1, 'Seoma [Crawler]', 41, 'Seoma [SEO Crawler]', ''),
(40, 1, 'SEOSearch [Crawler]', 42, 'SEOsearch/', ''),
(41, 1, 'Snappy [Bot]', 43, 'Snappy/1.1 ( http://www.urltrends.com/ )', ''),
(42, 1, 'Steeler [Crawler]', 44, 'http://www.tkl.iis.u-tokyo.ac.jp/~crawler/', ''),
(43, 1, 'Synoo [Bot]', 45, 'SynooBot/', ''),
(44, 1, 'Telekom [Bot]', 46, 'crawleradmin.t-info@telekom.de', ''),
(45, 1, 'TurnitinBot [Bot]', 47, 'TurnitinBot/', ''),
(46, 1, 'Voyager [Bot]', 48, 'voyager/', ''),
(47, 1, 'W3 [Sitesearch]', 49, 'W3 SiteSearch Crawler', ''),
(48, 1, 'W3C [Linkcheck]', 50, 'W3C-checklink/', ''),
(49, 1, 'W3C [Validator]', 51, 'W3C_*Validator', ''),
(50, 1, 'WiseNut [Bot]', 52, 'http://www.WISEnutbot.com', ''),
(51, 1, 'YaCy [Bot]', 53, 'yacybot', ''),
(52, 1, 'Yahoo MMCrawler [Bot]', 54, 'Yahoo-MMCrawler/', ''),
(53, 1, 'Yahoo Slurp [Bot]', 55, 'Yahoo! DE Slurp', ''),
(54, 1, 'Yahoo [Bot]', 56, 'Yahoo! Slurp', ''),
(55, 1, 'YahooSeeker [Bot]', 57, 'YahooSeeker/', '');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_config`
--

CREATE TABLE `phpbb_config` (
  `config_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `config_value` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `is_dynamic` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_config`
--

INSERT INTO `phpbb_config` (`config_name`, `config_value`, `is_dynamic`) VALUES
('active_sessions', '0', 0),
('allow_attachments', '1', 0),
('allow_autologin', '1', 0),
('allow_avatar', '1', 0),
('allow_avatar_gravatar', '0', 0),
('allow_avatar_local', '0', 0),
('allow_avatar_remote', '0', 0),
('allow_avatar_remote_upload', '0', 0),
('allow_avatar_upload', '1', 0),
('allow_bbcode', '1', 0),
('allow_birthdays', '1', 0),
('allow_board_notifications', '1', 0),
('allow_bookmarks', '1', 0),
('allow_cdn', '0', 0),
('allow_emailreuse', '0', 0),
('allow_forum_notify', '1', 0),
('allow_live_searches', '1', 0),
('allow_mass_pm', '1', 0),
('allow_name_chars', 'USERNAME_CHARS_ANY', 0),
('allow_namechange', '0', 0),
('allow_nocensors', '0', 0),
('allow_password_reset', '1', 0),
('allow_pm_attach', '0', 0),
('allow_pm_report', '1', 0),
('allow_post_flash', '1', 0),
('allow_post_links', '1', 0),
('allow_privmsg', '1', 0),
('allow_quick_reply', '1', 0),
('allow_sig', '1', 0),
('allow_sig_bbcode', '1', 0),
('allow_sig_flash', '0', 0),
('allow_sig_img', '1', 0),
('allow_sig_links', '1', 0),
('allow_sig_pm', '1', 0),
('allow_sig_smilies', '1', 0),
('allow_smilies', '1', 0),
('allow_topic_notify', '1', 0),
('allow_viglink_phpbb', '1', 0),
('allowed_schemes_links', 'http,https,ftp', 0),
('assets_version', '2', 0),
('attachment_quota', '52428800', 0),
('auth_bbcode_pm', '1', 0),
('auth_flash_pm', '0', 0),
('auth_img_pm', '1', 0),
('auth_method', 'db', 0),
('auth_oauth_bitly_key', '', 0),
('auth_oauth_bitly_secret', '', 0),
('auth_oauth_facebook_key', '', 0),
('auth_oauth_facebook_secret', '', 0),
('auth_oauth_google_key', '', 0),
('auth_oauth_google_secret', '', 0),
('auth_oauth_twitter_key', '', 0),
('auth_oauth_twitter_secret', '', 0),
('auth_smilies_pm', '1', 0),
('avatar_filesize', '6144', 0),
('avatar_gallery_path', 'images/avatars/gallery', 0),
('avatar_max_height', '90', 0),
('avatar_max_width', '90', 0),
('avatar_min_height', '20', 0),
('avatar_min_width', '20', 0),
('avatar_path', 'images/avatars/upload', 0),
('avatar_salt', '73de80e98b7812651407af70715a7cc0', 0),
('board_contact', 'vanessa.geoffroid@gmail.com', 0),
('board_contact_name', '', 0),
('board_disable', '0', 0),
('board_disable_msg', '', 0),
('board_email', 'vanessa.geoffroid@gmail.com', 0),
('board_email_form', '0', 0),
('board_email_sig', 'Thanks, The Management', 0),
('board_hide_emails', '1', 0),
('board_index_text', '', 0),
('board_startdate', '1671407293', 0),
('board_timezone', 'UTC', 0),
('browser_check', '1', 0),
('bump_interval', '10', 0),
('bump_type', 'd', 0),
('cache_gc', '7200', 0),
('cache_last_gc', '1674821363', 1),
('captcha_gd', '1', 0),
('captcha_gd_3d_noise', '1', 0),
('captcha_gd_fonts', '1', 0),
('captcha_gd_foreground_noise', '0', 0),
('captcha_gd_wave', '0', 0),
('captcha_gd_x_grid', '25', 0),
('captcha_gd_y_grid', '25', 0),
('captcha_plugin', 'core.captcha.plugins.gd', 0),
('check_attachment_content', '1', 0),
('check_dnsbl', '0', 0),
('chg_passforce', '0', 0),
('confirm_refresh', '1', 0),
('contact_admin_form_enable', '1', 0),
('cookie_domain', 'konrad_starcitizen.test', 0),
('cookie_name', 'phpbb3_1p6p9', 0),
('cookie_notice', '0', 0),
('cookie_path', '/', 0),
('cookie_secure', '', 0),
('coppa_enable', '0', 0),
('coppa_fax', '', 0),
('coppa_mail', '', 0),
('cron_lock', '0', 1),
('database_gc', '604800', 0),
('database_last_gc', '1674215982', 1),
('dbms_version', '8.0.30', 0),
('default_dateformat', 'D M d, Y g:i a', 0),
('default_lang', 'en', 0),
('default_search_return_chars', '300', 0),
('default_style', '1', 0),
('delete_time', '0', 0),
('display_last_edited', '1', 0),
('display_last_subject', '1', 0),
('display_order', '0', 0),
('display_unapproved_posts', '1', 0),
('edit_time', '0', 0),
('email_check_mx', '1', 0),
('email_enable', '1', 0),
('email_force_sender', '0', 0),
('email_max_chunk_size', '50', 0),
('email_package_size', '20', 0),
('enable_accurate_pm_button', '1', 0),
('enable_confirm', '1', 0),
('enable_mod_rewrite', '0', 0),
('enable_pm_icons', '1', 0),
('enable_post_confirm', '1', 0),
('enable_queue_trigger', '0', 0),
('enable_update_hashes', '0', 0),
('extension_force_unstable', '0', 0),
('feed_enable', '1', 0),
('feed_forum', '1', 0),
('feed_http_auth', '0', 0),
('feed_item_statistics', '1', 0),
('feed_limit', '10', 0),
('feed_limit_post', '15', 0),
('feed_limit_topic', '10', 0),
('feed_overall', '1', 0),
('feed_overall_forums', '0', 0),
('feed_overall_forums_limit', '15', 0),
('feed_overall_topics', '0', 0),
('feed_overall_topics_limit', '15', 0),
('feed_topic', '1', 0),
('feed_topics_active', '0', 0),
('feed_topics_new', '1', 0),
('flood_interval', '15', 0),
('force_server_vars', '1', 0),
('form_token_lifetime', '7200', 0),
('form_token_mintime', '0', 0),
('form_token_sid_guests', '1', 0),
('forward_pm', '1', 0),
('forwarded_for_check', '0', 0),
('full_folder_action', '2', 0),
('fulltext_mysql_max_word_len', '254', 0),
('fulltext_mysql_min_word_len', '4', 0),
('fulltext_native_common_thres', '5', 0),
('fulltext_native_load_upd', '1', 0),
('fulltext_native_max_chars', '14', 0),
('fulltext_native_min_chars', '3', 0),
('fulltext_postgres_max_word_len', '254', 0),
('fulltext_postgres_min_word_len', '4', 0),
('fulltext_postgres_ts_name', 'simple', 0),
('fulltext_sphinx_indexer_mem_limit', '512', 0),
('fulltext_sphinx_stopwords', '0', 0),
('gzip_compress', '0', 0),
('help_send_statistics', '1', 0),
('help_send_statistics_time', '0', 0),
('hot_threshold', '25', 0),
('icons_path', 'images/icons', 0),
('img_create_thumbnail', '0', 0),
('img_display_inlined', '1', 0),
('img_link_height', '0', 0),
('img_link_width', '0', 0),
('img_max_height', '0', 0),
('img_max_thumb_width', '400', 0),
('img_max_width', '0', 0),
('img_min_thumb_filesize', '12000', 0),
('img_quality', '85', 0),
('img_strip_metadata', '0', 0),
('ip_check', '3', 0),
('ip_login_limit_max', '50', 0),
('ip_login_limit_time', '21600', 0),
('ip_login_limit_use_forwarded', '0', 0),
('jab_allow_self_signed', '0', 0),
('jab_enable', '0', 0),
('jab_host', '', 0),
('jab_package_size', '20', 0),
('jab_password', '', 0),
('jab_port', '5222', 0),
('jab_use_ssl', '0', 0),
('jab_username', '', 0),
('jab_verify_peer', '1', 0),
('jab_verify_peer_name', '1', 0),
('last_queue_run', '0', 1),
('ldap_base_dn', '', 0),
('ldap_email', '', 0),
('ldap_password', '', 0),
('ldap_port', '', 0),
('ldap_server', '', 0),
('ldap_uid', '', 0),
('ldap_user', '', 0),
('ldap_user_filter', '', 0),
('legend_sort_groupname', '0', 0),
('limit_load', '0', 0),
('limit_search_load', '0', 0),
('load_anon_lastread', '0', 0),
('load_birthdays', '1', 0),
('load_cpf_memberlist', '1', 0),
('load_cpf_pm', '1', 0),
('load_cpf_viewprofile', '1', 0),
('load_cpf_viewtopic', '1', 0),
('load_db_lastread', '1', 0),
('load_db_track', '1', 0),
('load_font_awesome_url', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', 0),
('load_jquery_url', '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', 0),
('load_jumpbox', '1', 0),
('load_moderators', '1', 0),
('load_notifications', '1', 0),
('load_online', '1', 0),
('load_online_guests', '1', 0),
('load_online_time', '5', 0),
('load_onlinetrack', '1', 0),
('load_search', '1', 0),
('load_tplcompile', '0', 0),
('load_unreads_search', '1', 0),
('load_user_activity', '1', 0),
('load_user_activity_limit', '5000', 0),
('max_attachments', '3', 0),
('max_attachments_pm', '1', 0),
('max_autologin_time', '0', 0),
('max_filesize', '262144', 0),
('max_filesize_pm', '262144', 0),
('max_login_attempts', '3', 0),
('max_name_chars', '20', 0),
('max_num_search_keywords', '10', 0),
('max_poll_options', '10', 0),
('max_post_chars', '60000', 0),
('max_post_font_size', '200', 0),
('max_post_img_height', '0', 0),
('max_post_img_width', '0', 0),
('max_post_smilies', '0', 0),
('max_post_urls', '0', 0),
('max_quote_depth', '3', 0),
('max_reg_attempts', '5', 0),
('max_sig_chars', '255', 0),
('max_sig_font_size', '200', 0),
('max_sig_img_height', '0', 0),
('max_sig_img_width', '0', 0),
('max_sig_smilies', '0', 0),
('max_sig_urls', '5', 0),
('mime_triggers', 'body|head|html|img|plaintext|a href|pre|script|table|title', 0),
('min_name_chars', '3', 0),
('min_pass_chars', '6', 0),
('min_post_chars', '1', 0),
('min_search_author_chars', '3', 0),
('new_member_group_default', '0', 0),
('new_member_post_limit', '3', 0),
('newest_user_colour', 'AA0000', 1),
('newest_user_id', '2', 1),
('newest_username', 'konrad', 1),
('num_files', '0', 1),
('num_posts', '3', 1),
('num_topics', '2', 1),
('num_users', '1', 1),
('override_user_style', '0', 0),
('pass_complex', 'PASS_TYPE_ANY', 0),
('phpbb_viglink_api_key', 'e4fd14f5d7f2bb6d80b8f8da1354718c', 0),
('plupload_last_gc', '0', 1),
('plupload_salt', '0bbe7f2e5f5d3bf06798ba5e72157675', 0),
('pm_edit_time', '0', 0),
('pm_max_boxes', '4', 0),
('pm_max_msgs', '50', 0),
('pm_max_recipients', '0', 0),
('posts_per_page', '10', 0),
('print_pm', '1', 0),
('questionnaire_unique_id', 'yac6mjfep9jqxukp', 0),
('queue_interval', '60', 0),
('queue_trigger_posts', '3', 0),
('rand_seed', '0', 1),
('rand_seed_last_update', '0', 1),
('ranks_path', 'images/ranks', 0),
('read_notification_expire_days', '30', 0),
('read_notification_gc', '86400', 0),
('read_notification_last_gc', '1673048105', 1),
('recaptcha_v3_domain', 'google.com', 0),
('recaptcha_v3_key', '', 0),
('recaptcha_v3_method', 'post', 0),
('recaptcha_v3_secret', '', 0),
('recaptcha_v3_threshold_default', '0.5', 0),
('recaptcha_v3_threshold_login', '0.5', 0),
('recaptcha_v3_threshold_post', '0.5', 0),
('recaptcha_v3_threshold_register', '0.5', 0),
('recaptcha_v3_threshold_report', '0.5', 0),
('record_online_date', '1671407357', 1),
('record_online_users', '2', 1),
('referer_validation', '0', 0),
('remote_upload_verify', '0', 0),
('reparse_lock', '0', 1),
('require_activation', '0', 0),
('script_path', '/forum', 0),
('search_anonymous_interval', '0', 0),
('search_block_size', '250', 0),
('search_gc', '7200', 0),
('search_indexing_state', '', 1),
('search_interval', '0', 0),
('search_last_gc', '1673301546', 1),
('search_store_results', '1800', 0),
('search_type', '\\phpbb\\search\\fulltext_native', 0),
('secure_allow_deny', '1', 0),
('secure_allow_empty_referer', '1', 0),
('secure_downloads', '0', 0),
('server_name', 'konrad_starcitizen.test', 0),
('server_port', '80', 0),
('server_protocol', 'http://', 0),
('session_gc', '3600', 0),
('session_last_gc', '1673218793', 1),
('session_length', '3600', 0),
('site_desc', 'Bienvenue sur le forum de discussion Star Citizen', 0),
('site_home_text', '', 0),
('site_home_url', '', 0),
('sitename', 'Konrad', 0),
('smilies_path', 'images/smilies', 0),
('smilies_per_page', '50', 0),
('smtp_allow_self_signed', '0', 0),
('smtp_auth_method', 'PLAIN', 0),
('smtp_delivery', '1', 0),
('smtp_host', '', 0),
('smtp_password', '', 1),
('smtp_port', '', 0),
('smtp_username', '', 1),
('smtp_verify_peer', '1', 0),
('smtp_verify_peer_name', '1', 0),
('teampage_forums', '1', 0),
('teampage_memberships', '1', 0),
('text_reparser.pm_text_cron_interval', '10', 0),
('text_reparser.pm_text_last_cron', '1673127063', 0),
('text_reparser.poll_option_cron_interval', '10', 0),
('text_reparser.poll_option_last_cron', '1673127010', 0),
('text_reparser.poll_title_cron_interval', '10', 0),
('text_reparser.poll_title_last_cron', '1671407660', 0),
('text_reparser.post_text_cron_interval', '10', 0),
('text_reparser.post_text_last_cron', '1671407877', 0),
('text_reparser.user_signature_cron_interval', '10', 0),
('text_reparser.user_signature_last_cron', '1671407656', 0),
('topics_per_page', '25', 0),
('tpl_allow_php', '0', 0),
('update_hashes_last_cron', '1671407662', 0),
('update_hashes_lock', '0', 0),
('upload_dir_size', '0', 1),
('upload_icons_path', 'images/upload_icons', 0),
('upload_path', 'files', 0),
('use_system_cron', '0', 0),
('version', '3.3.9', 0),
('viglink_api_siteid', 'd41d8cd98f00b204e9800998ecf8427e', 0),
('viglink_ask_admin', '', 0),
('viglink_ask_admin_last', '1671407402', 0),
('viglink_convert_account_url', '', 0),
('viglink_enabled', '0', 0),
('viglink_last_gc', '1671407402', 1),
('warnings_expire_days', '90', 0),
('warnings_gc', '14400', 0),
('warnings_last_gc', '1674162400', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_config_text`
--

CREATE TABLE `phpbb_config_text` (
  `config_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `config_value` mediumtext COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_config_text`
--

INSERT INTO `phpbb_config_text` (`config_name`, `config_value`) VALUES
('contact_admin_info', ''),
('contact_admin_info_bitfield', ''),
('contact_admin_info_flags', '7'),
('contact_admin_info_uid', ''),
('reparser_resume', 'a:3:{s:28:\"text_reparser.user_signature\";a:3:{s:9:\"range-min\";i:1;s:9:\"range-max\";i:0;s:10:\"range-size\";i:100;}s:24:\"text_reparser.poll_title\";a:3:{s:9:\"range-min\";i:1;s:9:\"range-max\";i:0;s:10:\"range-size\";i:100;}s:23:\"text_reparser.post_text\";a:3:{s:9:\"range-min\";i:1;s:9:\"range-max\";i:0;s:10:\"range-size\";i:100;}}');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_confirm`
--

CREATE TABLE `phpbb_confirm` (
  `confirm_id` char(32) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `session_id` char(32) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `confirm_type` tinyint NOT NULL DEFAULT '0',
  `code` varchar(8) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `seed` int UNSIGNED NOT NULL DEFAULT '0',
  `attempts` mediumint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_disallow`
--

CREATE TABLE `phpbb_disallow` (
  `disallow_id` mediumint UNSIGNED NOT NULL,
  `disallow_username` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_drafts`
--

CREATE TABLE `phpbb_drafts` (
  `draft_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_id` int UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `save_time` int UNSIGNED NOT NULL DEFAULT '0',
  `draft_subject` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `draft_message` mediumtext COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_ext`
--

CREATE TABLE `phpbb_ext` (
  `ext_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `ext_active` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `ext_state` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_ext`
--

INSERT INTO `phpbb_ext` (`ext_name`, `ext_active`, `ext_state`) VALUES
('phpbb/viglink', 1, 'b:0;');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_extensions`
--

CREATE TABLE `phpbb_extensions` (
  `extension_id` mediumint UNSIGNED NOT NULL,
  `group_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `extension` varchar(100) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_extensions`
--

INSERT INTO `phpbb_extensions` (`extension_id`, `group_id`, `extension`) VALUES
(1, 1, 'gif'),
(2, 1, 'png'),
(3, 1, 'jpeg'),
(4, 1, 'jpg'),
(5, 1, 'tif'),
(6, 1, 'tiff'),
(7, 1, 'tga'),
(8, 2, 'gtar'),
(9, 2, 'gz'),
(10, 2, 'tar'),
(11, 2, 'zip'),
(12, 2, 'rar'),
(13, 2, 'ace'),
(14, 2, 'torrent'),
(15, 2, 'tgz'),
(16, 2, 'bz2'),
(17, 2, '7z'),
(18, 3, 'txt'),
(19, 3, 'c'),
(20, 3, 'h'),
(21, 3, 'cpp'),
(22, 3, 'hpp'),
(23, 3, 'diz'),
(24, 3, 'csv'),
(25, 3, 'ini'),
(26, 3, 'log'),
(27, 3, 'js'),
(28, 3, 'xml'),
(29, 4, 'xls'),
(30, 4, 'xlsx'),
(31, 4, 'xlsm'),
(32, 4, 'xlsb'),
(33, 4, 'doc'),
(34, 4, 'docx'),
(35, 4, 'docm'),
(36, 4, 'dot'),
(37, 4, 'dotx'),
(38, 4, 'dotm'),
(39, 4, 'pdf'),
(40, 4, 'ai'),
(41, 4, 'ps'),
(42, 4, 'ppt'),
(43, 4, 'pptx'),
(44, 4, 'pptm'),
(45, 4, 'odg'),
(46, 4, 'odp'),
(47, 4, 'ods'),
(48, 4, 'odt'),
(49, 4, 'rtf'),
(50, 5, 'mp3'),
(51, 5, 'mpeg'),
(52, 5, 'mpg'),
(53, 5, 'ogg'),
(54, 5, 'ogm');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_extension_groups`
--

CREATE TABLE `phpbb_extension_groups` (
  `group_id` mediumint UNSIGNED NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `cat_id` tinyint NOT NULL DEFAULT '0',
  `allow_group` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `download_mode` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `upload_icon` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `max_filesize` int UNSIGNED NOT NULL DEFAULT '0',
  `allowed_forums` text COLLATE utf8mb3_bin NOT NULL,
  `allow_in_pm` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_extension_groups`
--

INSERT INTO `phpbb_extension_groups` (`group_id`, `group_name`, `cat_id`, `allow_group`, `download_mode`, `upload_icon`, `max_filesize`, `allowed_forums`, `allow_in_pm`) VALUES
(1, 'IMAGES', 1, 1, 1, '', 0, '', 0),
(2, 'ARCHIVES', 0, 1, 1, '', 0, '', 0),
(3, 'PLAIN_TEXT', 0, 0, 1, '', 0, '', 0),
(4, 'DOCUMENTS', 0, 0, 1, '', 0, '', 0),
(5, 'DOWNLOADABLE_FILES', 0, 0, 1, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_forums`
--

CREATE TABLE `phpbb_forums` (
  `forum_id` mediumint UNSIGNED NOT NULL,
  `parent_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `left_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `right_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `forum_parents` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `forum_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `forum_desc` text COLLATE utf8mb3_bin NOT NULL,
  `forum_desc_bitfield` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `forum_desc_options` int UNSIGNED NOT NULL DEFAULT '7',
  `forum_desc_uid` varchar(8) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `forum_link` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `forum_password` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `forum_style` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `forum_image` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `forum_rules` text COLLATE utf8mb3_bin NOT NULL,
  `forum_rules_link` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `forum_rules_bitfield` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `forum_rules_options` int UNSIGNED NOT NULL DEFAULT '7',
  `forum_rules_uid` varchar(8) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `forum_topics_per_page` smallint UNSIGNED NOT NULL DEFAULT '0',
  `forum_type` tinyint NOT NULL DEFAULT '0',
  `forum_status` tinyint NOT NULL DEFAULT '0',
  `forum_last_post_id` int UNSIGNED NOT NULL DEFAULT '0',
  `forum_last_poster_id` int UNSIGNED NOT NULL DEFAULT '0',
  `forum_last_post_subject` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `forum_last_post_time` int UNSIGNED NOT NULL DEFAULT '0',
  `forum_last_poster_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `forum_last_poster_colour` varchar(6) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `forum_flags` tinyint NOT NULL DEFAULT '32',
  `display_on_index` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `enable_indexing` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `enable_icons` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `enable_prune` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `prune_next` int UNSIGNED NOT NULL DEFAULT '0',
  `prune_days` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `prune_viewed` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `prune_freq` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `display_subforum_list` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `display_subforum_limit` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `forum_options` int UNSIGNED NOT NULL DEFAULT '0',
  `enable_shadow_prune` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `prune_shadow_days` mediumint UNSIGNED NOT NULL DEFAULT '7',
  `prune_shadow_freq` mediumint UNSIGNED NOT NULL DEFAULT '1',
  `prune_shadow_next` int NOT NULL DEFAULT '0',
  `forum_posts_approved` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `forum_posts_unapproved` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `forum_posts_softdeleted` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `forum_topics_approved` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `forum_topics_unapproved` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `forum_topics_softdeleted` mediumint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_forums`
--

INSERT INTO `phpbb_forums` (`forum_id`, `parent_id`, `left_id`, `right_id`, `forum_parents`, `forum_name`, `forum_desc`, `forum_desc_bitfield`, `forum_desc_options`, `forum_desc_uid`, `forum_link`, `forum_password`, `forum_style`, `forum_image`, `forum_rules`, `forum_rules_link`, `forum_rules_bitfield`, `forum_rules_options`, `forum_rules_uid`, `forum_topics_per_page`, `forum_type`, `forum_status`, `forum_last_post_id`, `forum_last_poster_id`, `forum_last_post_subject`, `forum_last_post_time`, `forum_last_poster_name`, `forum_last_poster_colour`, `forum_flags`, `display_on_index`, `enable_indexing`, `enable_icons`, `enable_prune`, `prune_next`, `prune_days`, `prune_viewed`, `prune_freq`, `display_subforum_list`, `display_subforum_limit`, `forum_options`, `enable_shadow_prune`, `prune_shadow_days`, `prune_shadow_freq`, `prune_shadow_next`, `forum_posts_approved`, `forum_posts_unapproved`, `forum_posts_softdeleted`, `forum_topics_approved`, `forum_topics_unapproved`, `forum_topics_softdeleted`) VALUES
(1, 0, 1, 4, '', 'Your first category', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 0, 0, 1, 2, '', 1671407293, 'konrad', 'AA0000', 32, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 2, 3, 'a:1:{i:1;a:2:{i:0;s:19:\"Your first category\";i:1;i:0;}}', 'Your first forum', 'Description of your first forum.', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 3, 2, 'Re: Demande d\'aide', 1671407933, 'konrad', 'AA0000', 48, 1, 1, 1, 0, 0, 7, 7, 1, 1, 0, 0, 0, 7, 1, 0, 3, 0, 0, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_forums_access`
--

CREATE TABLE `phpbb_forums_access` (
  `forum_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `session_id` char(32) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_forums_track`
--

CREATE TABLE `phpbb_forums_track` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `mark_time` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_forums_watch`
--

CREATE TABLE `phpbb_forums_watch` (
  `forum_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `notify_status` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_groups`
--

CREATE TABLE `phpbb_groups` (
  `group_id` mediumint UNSIGNED NOT NULL,
  `group_type` tinyint NOT NULL DEFAULT '1',
  `group_founder_manage` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `group_skip_auth` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `group_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `group_desc` text COLLATE utf8mb3_bin NOT NULL,
  `group_desc_bitfield` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `group_desc_options` int UNSIGNED NOT NULL DEFAULT '7',
  `group_desc_uid` varchar(8) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `group_display` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `group_avatar` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `group_avatar_type` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `group_avatar_width` smallint UNSIGNED NOT NULL DEFAULT '0',
  `group_avatar_height` smallint UNSIGNED NOT NULL DEFAULT '0',
  `group_rank` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `group_colour` varchar(6) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `group_sig_chars` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `group_receive_pm` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `group_message_limit` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `group_legend` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `group_max_recipients` mediumint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_groups`
--

INSERT INTO `phpbb_groups` (`group_id`, `group_type`, `group_founder_manage`, `group_skip_auth`, `group_name`, `group_desc`, `group_desc_bitfield`, `group_desc_options`, `group_desc_uid`, `group_display`, `group_avatar`, `group_avatar_type`, `group_avatar_width`, `group_avatar_height`, `group_rank`, `group_colour`, `group_sig_chars`, `group_receive_pm`, `group_message_limit`, `group_legend`, `group_max_recipients`) VALUES
(1, 3, 0, 0, 'GUESTS', '', '', 7, '', 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 5),
(2, 3, 0, 0, 'REGISTERED', '', '', 7, '', 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 5),
(3, 3, 0, 0, 'REGISTERED_COPPA', '', '', 7, '', 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 5),
(4, 3, 0, 0, 'GLOBAL_MODERATORS', '', '', 7, '', 0, '', '', 0, 0, 0, '00AA00', 0, 0, 0, 2, 0),
(5, 3, 1, 0, 'ADMINISTRATORS', '', '', 7, '', 0, '', '', 0, 0, 0, 'AA0000', 0, 0, 0, 1, 0),
(6, 3, 0, 0, 'BOTS', '', '', 7, '', 0, '', '', 0, 0, 0, '9E8DA7', 0, 0, 0, 0, 5),
(7, 3, 0, 0, 'NEWLY_REGISTERED', '', '', 7, '', 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_icons`
--

CREATE TABLE `phpbb_icons` (
  `icons_id` mediumint UNSIGNED NOT NULL,
  `icons_url` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `icons_width` tinyint NOT NULL DEFAULT '0',
  `icons_height` tinyint NOT NULL DEFAULT '0',
  `icons_alt` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `icons_order` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `display_on_posting` tinyint UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_icons`
--

INSERT INTO `phpbb_icons` (`icons_id`, `icons_url`, `icons_width`, `icons_height`, `icons_alt`, `icons_order`, `display_on_posting`) VALUES
(1, 'misc/fire.gif', 16, 16, '', 1, 1),
(2, 'smile/redface.gif', 16, 16, '', 9, 1),
(3, 'smile/mrgreen.gif', 16, 16, '', 10, 1),
(4, 'misc/heart.gif', 16, 16, '', 4, 1),
(5, 'misc/star.gif', 16, 16, '', 2, 1),
(6, 'misc/radioactive.gif', 16, 16, '', 3, 1),
(7, 'misc/thinking.gif', 16, 16, '', 5, 1),
(8, 'smile/info.gif', 16, 16, '', 8, 1),
(9, 'smile/question.gif', 16, 16, '', 6, 1),
(10, 'smile/alert.gif', 16, 16, '', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_lang`
--

CREATE TABLE `phpbb_lang` (
  `lang_id` tinyint NOT NULL,
  `lang_iso` varchar(30) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `lang_dir` varchar(30) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `lang_english_name` varchar(100) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `lang_local_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `lang_author` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_lang`
--

INSERT INTO `phpbb_lang` (`lang_id`, `lang_iso`, `lang_dir`, `lang_english_name`, `lang_local_name`, `lang_author`) VALUES
(1, 'en', 'en', 'British English', 'British English', 'phpBB Limited'),
(2, 'fr', 'fr', '﻿French (formal)', 'Français (vouvoiement)', 'phpBB-fr.com');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_log`
--

CREATE TABLE `phpbb_log` (
  `log_id` int UNSIGNED NOT NULL,
  `log_type` tinyint NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `topic_id` int UNSIGNED NOT NULL DEFAULT '0',
  `post_id` int UNSIGNED NOT NULL DEFAULT '0',
  `reportee_id` int UNSIGNED NOT NULL DEFAULT '0',
  `log_ip` varchar(40) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `log_time` int UNSIGNED NOT NULL DEFAULT '0',
  `log_operation` text COLLATE utf8mb3_bin NOT NULL,
  `log_data` mediumtext COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_log`
--

INSERT INTO `phpbb_log` (`log_id`, `log_type`, `user_id`, `forum_id`, `topic_id`, `post_id`, `reportee_id`, `log_ip`, `log_time`, `log_operation`, `log_data`) VALUES
(1, 0, 1, 0, 0, 0, 0, '127.0.0.1', 1671407296, 'LOG_MODULE_ADD', 'a:1:{i:0;s:20:\"ACP_VIGLINK_SETTINGS\";}'),
(2, 0, 1, 0, 0, 0, 0, '', 1671407296, 'LOG_EXT_ENABLE', 'a:1:{i:0;s:13:\"phpbb/viglink\";}'),
(3, 2, 1, 0, 0, 0, 0, '127.0.0.1', 1671407296, 'LOG_ERROR_EMAIL', 'a:1:{i:0;s:332:\"<strong>EMAIL/SMTP</strong><br /><em>/forum/install/app.php/install</em><br /><br />Could not connect to smtp host : 0 : Failed to parse address &quot;:&quot;<br /><br />Errno 2: stream_socket_client(): Unable to connect to : (Failed to parse address &amp;quot;:&amp;quot;) at [ROOT]/includes/functions_messenger.php line 1188<br />\";}'),
(4, 0, 2, 0, 0, 0, 0, '127.0.0.1', 1671407296, 'LOG_INSTALL_INSTALLED', 'a:1:{i:0;s:5:\"3.3.9\";}'),
(5, 0, 2, 0, 0, 0, 0, '127.0.0.1', 1671450599, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(6, 0, 2, 0, 0, 0, 0, '127.0.0.1', 1671456046, 'LOG_ADMIN_AUTH_SUCCESS', '');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_login_attempts`
--

CREATE TABLE `phpbb_login_attempts` (
  `attempt_ip` varchar(40) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `attempt_browser` varchar(150) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `attempt_forwarded_for` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `attempt_time` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '0',
  `username_clean` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_migrations`
--

CREATE TABLE `phpbb_migrations` (
  `migration_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `migration_depends_on` text COLLATE utf8mb3_bin NOT NULL,
  `migration_schema_done` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `migration_data_done` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `migration_data_state` text COLLATE utf8mb3_bin NOT NULL,
  `migration_start_time` int UNSIGNED NOT NULL DEFAULT '0',
  `migration_end_time` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_migrations`
--

INSERT INTO `phpbb_migrations` (`migration_name`, `migration_depends_on`, `migration_schema_done`, `migration_data_done`, `migration_data_state`, `migration_start_time`, `migration_end_time`) VALUES
('\\phpbb\\db\\migration\\data\\v30x\\local_url_bbcode', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_0', 'a:0:{}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_1', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_1_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc3\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc1', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc2', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc3', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11_rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11_rc1', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11_rc2', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc3\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc1', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc2', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc3', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_pl1', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_rc1', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14_rc1', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_1_rc1', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_0\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2_rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2_rc1', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2_rc2', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_3', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_3_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_3_rc1', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_4', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_4_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_4_rc1', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_3\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5', 'a:1:{i:0;s:52:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5_rc1part2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5_rc1', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_4\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5_rc1part2', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc4\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc1', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc2', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc3', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc4', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc3\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_pl1', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_rc1', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_rc2', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_8', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_8_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_8_rc1', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_pl1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc4\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc1', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_8\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc2', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc3', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc4', 'a:1:{i:0;s:47:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc3\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\acp_prune_users_module', 'a:1:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v310\\beta1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\acp_style_components_module', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\allow_cdn', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v310\\jquery_update\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\alpha1', 'a:18:{i:0;s:46:\"\\phpbb\\db\\migration\\data\\v30x\\local_url_bbcode\";i:1;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12\";i:2;s:57:\"\\phpbb\\db\\migration\\data\\v310\\acp_style_components_module\";i:3;s:39:\"\\phpbb\\db\\migration\\data\\v310\\allow_cdn\";i:4;s:49:\"\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth\";i:5;s:37:\"\\phpbb\\db\\migration\\data\\v310\\avatars\";i:6;s:40:\"\\phpbb\\db\\migration\\data\\v310\\boardindex\";i:7;s:44:\"\\phpbb\\db\\migration\\data\\v310\\config_db_text\";i:8;s:45:\"\\phpbb\\db\\migration\\data\\v310\\forgot_password\";i:9;s:41:\"\\phpbb\\db\\migration\\data\\v310\\mod_rewrite\";i:10;s:49:\"\\phpbb\\db\\migration\\data\\v310\\mysql_fulltext_drop\";i:11;s:40:\"\\phpbb\\db\\migration\\data\\v310\\namespaces\";i:12;s:48:\"\\phpbb\\db\\migration\\data\\v310\\notifications_cron\";i:13;s:60:\"\\phpbb\\db\\migration\\data\\v310\\notification_options_reconvert\";i:14;s:38:\"\\phpbb\\db\\migration\\data\\v310\\plupload\";i:15;s:51:\"\\phpbb\\db\\migration\\data\\v310\\signature_module_auth\";i:16;s:52:\"\\phpbb\\db\\migration\\data\\v310\\softdelete_mcp_modules\";i:17;s:38:\"\\phpbb\\db\\migration\\data\\v310\\teampage\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\alpha2', 'a:2:{i:0;s:36:\"\\phpbb\\db\\migration\\data\\v310\\alpha1\";i:1;s:51:\"\\phpbb\\db\\migration\\data\\v310\\notifications_cron_p2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\alpha3', 'a:4:{i:0;s:36:\"\\phpbb\\db\\migration\\data\\v310\\alpha2\";i:1;s:42:\"\\phpbb\\db\\migration\\data\\v310\\avatar_types\";i:2;s:39:\"\\phpbb\\db\\migration\\data\\v310\\passwords\";i:3;s:48:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_types\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_0\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth2', 'a:1:{i:0;s:49:\"\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\avatar_types', 'a:2:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";i:1;s:37:\"\\phpbb\\db\\migration\\data\\v310\\avatars\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\avatars', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\beta1', 'a:7:{i:0;s:36:\"\\phpbb\\db\\migration\\data\\v310\\alpha3\";i:1;s:42:\"\\phpbb\\db\\migration\\data\\v310\\passwords_p2\";i:2;s:52:\"\\phpbb\\db\\migration\\data\\v310\\postgres_fulltext_drop\";i:3;s:63:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_change_load_settings\";i:4;s:51:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_location\";i:5;s:54:\"\\phpbb\\db\\migration\\data\\v310\\soft_delete_mod_convert2\";i:6;s:48:\"\\phpbb\\db\\migration\\data\\v310\\ucp_popuppm_module\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\beta2', 'a:3:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v310\\beta1\";i:1;s:52:\"\\phpbb\\db\\migration\\data\\v310\\acp_prune_users_module\";i:2;s:59:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_location_cleanup\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\beta3', 'a:6:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v310\\beta2\";i:1;s:50:\"\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth2\";i:2;s:48:\"\\phpbb\\db\\migration\\data\\v310\\board_contact_name\";i:3;s:44:\"\\phpbb\\db\\migration\\data\\v310\\jquery_update2\";i:4;s:50:\"\\phpbb\\db\\migration\\data\\v310\\live_searches_config\";i:5;s:49:\"\\phpbb\\db\\migration\\data\\v310\\prune_shadow_topics\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\beta4', 'a:3:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v310\\beta3\";i:1;s:69:\"\\phpbb\\db\\migration\\data\\v310\\extensions_version_check_force_unstable\";i:2;s:58:\"\\phpbb\\db\\migration\\data\\v310\\reset_missing_captcha_plugin\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\board_contact_name', 'a:1:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v310\\beta2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\boardindex', 'a:0:{}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\bot_update', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\rc6\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\captcha_plugins', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\config_db_text', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\contact_admin_acp_module', 'a:0:{}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\contact_admin_form', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v310\\config_db_text\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\dev', 'a:5:{i:0;s:40:\"\\phpbb\\db\\migration\\data\\v310\\extensions\";i:1;s:45:\"\\phpbb\\db\\migration\\data\\v310\\style_update_p2\";i:2;s:41:\"\\phpbb\\db\\migration\\data\\v310\\timezone_p2\";i:3;s:52:\"\\phpbb\\db\\migration\\data\\v310\\reported_posts_display\";i:4;s:46:\"\\phpbb\\db\\migration\\data\\v310\\migrations_table\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\extensions', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\extensions_version_check_force_unstable', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\forgot_password', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\gold', 'a:2:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\rc6\";i:1;s:40:\"\\phpbb\\db\\migration\\data\\v310\\bot_update\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\jquery_update', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\jquery_update2', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v310\\jquery_update\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\live_searches_config', 'a:0:{}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\migrations_table', 'a:0:{}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\mod_rewrite', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\mysql_fulltext_drop', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\namespaces', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\notification_options_reconvert', 'a:1:{i:0;s:54:\"\\phpbb\\db\\migration\\data\\v310\\notifications_schema_fix\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\notifications', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\notifications_cron', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v310\\notifications\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\notifications_cron_p2', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v310\\notifications_cron\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\notifications_schema_fix', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v310\\notifications\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\notifications_use_full_name', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\rc3\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\passwords', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\passwords_convert_p1', 'a:1:{i:0;s:42:\"\\phpbb\\db\\migration\\data\\v310\\passwords_p2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\passwords_convert_p2', 'a:1:{i:0;s:50:\"\\phpbb\\db\\migration\\data\\v310\\passwords_convert_p1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\passwords_p2', 'a:1:{i:0;s:39:\"\\phpbb\\db\\migration\\data\\v310\\passwords\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\plupload', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\postgres_fulltext_drop', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_aol', 'a:1:{i:0;s:56:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_yahoo_cleanup\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_aol_cleanup', 'a:1:{i:0;s:46:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_aol\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_change_load_settings', 'a:1:{i:0;s:54:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_aol_cleanup\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_cleanup', 'a:2:{i:0;s:52:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_interests\";i:1;s:53:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_occupation\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field', 'a:1:{i:0;s:56:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_on_memberlist\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_facebook', 'a:3:{i:0;s:56:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field\";i:1;s:55:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue\";i:2;s:48:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_types\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_field_validation_length', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\rc3\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_googleplus', 'a:3:{i:0;s:56:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field\";i:1;s:55:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue\";i:2;s:48:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_types\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_icq', 'a:1:{i:0;s:56:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_icq_cleanup', 'a:1:{i:0;s:46:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_icq\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_interests', 'a:2:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_types\";i:1;s:55:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_location', 'a:2:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_types\";i:1;s:56:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_on_memberlist\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_location_cleanup', 'a:1:{i:0;s:51:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_location\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_occupation', 'a:1:{i:0;s:52:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_interests\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_on_memberlist', 'a:1:{i:0;s:50:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_cleanup\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_types\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_skype', 'a:3:{i:0;s:56:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field\";i:1;s:55:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue\";i:2;s:48:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_types\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_twitter', 'a:3:{i:0;s:56:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field\";i:1;s:55:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue\";i:2;s:48:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_types\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_types', 'a:1:{i:0;s:36:\"\\phpbb\\db\\migration\\data\\v310\\alpha2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_website', 'a:2:{i:0;s:56:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_on_memberlist\";i:1;s:54:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_icq_cleanup\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_website_cleanup', 'a:1:{i:0;s:50:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_website\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_wlm', 'a:1:{i:0;s:58:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_website_cleanup\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_wlm_cleanup', 'a:1:{i:0;s:46:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_wlm\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_yahoo', 'a:1:{i:0;s:54:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_wlm_cleanup\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_yahoo_cleanup', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_yahoo\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_youtube', 'a:3:{i:0;s:56:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field\";i:1;s:55:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue\";i:2;s:48:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_types\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\prune_shadow_topics', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\rc1', 'a:9:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v310\\beta4\";i:1;s:54:\"\\phpbb\\db\\migration\\data\\v310\\contact_admin_acp_module\";i:2;s:48:\"\\phpbb\\db\\migration\\data\\v310\\contact_admin_form\";i:3;s:50:\"\\phpbb\\db\\migration\\data\\v310\\passwords_convert_p2\";i:4;s:51:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_facebook\";i:5;s:53:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_googleplus\";i:6;s:48:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_skype\";i:7;s:50:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_twitter\";i:8;s:50:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_youtube\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\rc2', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\rc3', 'a:5:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\rc2\";i:1;s:45:\"\\phpbb\\db\\migration\\data\\v310\\captcha_plugins\";i:2;s:53:\"\\phpbb\\db\\migration\\data\\v310\\rename_too_long_indexes\";i:3;s:41:\"\\phpbb\\db\\migration\\data\\v310\\search_type\";i:4;s:49:\"\\phpbb\\db\\migration\\data\\v310\\topic_sort_username\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\rc4', 'a:2:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\rc3\";i:1;s:57:\"\\phpbb\\db\\migration\\data\\v310\\notifications_use_full_name\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\rc5', 'a:3:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\rc4\";i:1;s:66:\"\\phpbb\\db\\migration\\data\\v310\\profilefield_field_validation_length\";i:2;s:53:\"\\phpbb\\db\\migration\\data\\v310\\remove_acp_styles_cache\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\rc6', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\rc5\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\remove_acp_styles_cache', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\rc4\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\rename_too_long_indexes', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_0\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\reported_posts_display', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\reset_missing_captcha_plugin', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\search_type', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\signature_module_auth', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\soft_delete_mod_convert', 'a:1:{i:0;s:36:\"\\phpbb\\db\\migration\\data\\v310\\alpha3\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\soft_delete_mod_convert2', 'a:1:{i:0;s:53:\"\\phpbb\\db\\migration\\data\\v310\\soft_delete_mod_convert\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\softdelete_mcp_modules', 'a:2:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";i:1;s:43:\"\\phpbb\\db\\migration\\data\\v310\\softdelete_p2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\softdelete_p1', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\softdelete_p2', 'a:2:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";i:1;s:43:\"\\phpbb\\db\\migration\\data\\v310\\softdelete_p1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\style_update_p1', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\style_update_p2', 'a:1:{i:0;s:45:\"\\phpbb\\db\\migration\\data\\v310\\style_update_p1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\teampage', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\timezone', 'a:1:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\timezone_p2', 'a:1:{i:0;s:38:\"\\phpbb\\db\\migration\\data\\v310\\timezone\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\topic_sort_username', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v310\\ucp_popuppm_module', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v310\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\add_jabber_ssl_context_config_options', 'a:1:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v31x\\v3110\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\add_latest_topics_index', 'a:1:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v31x\\v3110\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\add_log_time_index', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v319\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\add_smtp_ssl_context_config_options', 'a:1:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v31x\\v3110\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\increase_size_of_dateformat', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v317\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\increase_size_of_emotion', 'a:1:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v31x\\v3110\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\m_pm_report', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v316rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\m_softdelete_global', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v311\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\plupload_last_gc_dynamic', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v312\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\profilefield_remove_underscore_from_alpha', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v311\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\profilefield_yahoo_update_url', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v312\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\remove_duplicate_migrations', 'a:1:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v31x\\v3110\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\style_update', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v310\\gold\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\update_custom_bbcodes_with_idn', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v312\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\update_hashes', 'a:1:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v31x\\v3110\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v311', 'a:2:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v310\\gold\";i:1;s:42:\"\\phpbb\\db\\migration\\data\\v31x\\style_update\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v3110', 'a:1:{i:0;s:38:\"\\phpbb\\db\\migration\\data\\v31x\\v3110rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v3110rc1', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v319\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v3111', 'a:1:{i:0;s:38:\"\\phpbb\\db\\migration\\data\\v31x\\v3111rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v3111rc1', 'a:8:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v31x\\v3110\";i:1;s:48:\"\\phpbb\\db\\migration\\data\\v31x\\add_log_time_index\";i:2;s:54:\"\\phpbb\\db\\migration\\data\\v31x\\increase_size_of_emotion\";i:3;s:67:\"\\phpbb\\db\\migration\\data\\v31x\\add_jabber_ssl_context_config_options\";i:4;s:65:\"\\phpbb\\db\\migration\\data\\v31x\\add_smtp_ssl_context_config_options\";i:5;s:43:\"\\phpbb\\db\\migration\\data\\v31x\\update_hashes\";i:6;s:57:\"\\phpbb\\db\\migration\\data\\v31x\\remove_duplicate_migrations\";i:7;s:53:\"\\phpbb\\db\\migration\\data\\v31x\\add_latest_topics_index\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v3112', 'a:1:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v31x\\v3111\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v312', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v312rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v312rc1', 'a:2:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v311\";i:1;s:49:\"\\phpbb\\db\\migration\\data\\v31x\\m_softdelete_global\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v313', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v313rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v313rc1', 'a:5:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_rc1\";i:1;s:54:\"\\phpbb\\db\\migration\\data\\v31x\\plupload_last_gc_dynamic\";i:2;s:71:\"\\phpbb\\db\\migration\\data\\v31x\\profilefield_remove_underscore_from_alpha\";i:3;s:59:\"\\phpbb\\db\\migration\\data\\v31x\\profilefield_yahoo_update_url\";i:4;s:60:\"\\phpbb\\db\\migration\\data\\v31x\\update_custom_bbcodes_with_idn\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v313rc2', 'a:2:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_pl1\";i:1;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v313rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v314', 'a:2:{i:0;s:44:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14\";i:1;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v314rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v314rc1', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v313\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v314rc2', 'a:2:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14_rc1\";i:1;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v314rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v315', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v315rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v315rc1', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v314\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v316', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v316rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v316rc1', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v315\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v317', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v317rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v317pl1', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v317\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v317rc1', 'a:2:{i:0;s:41:\"\\phpbb\\db\\migration\\data\\v31x\\m_pm_report\";i:1;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v316\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v318', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v318rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v318rc1', 'a:2:{i:0;s:57:\"\\phpbb\\db\\migration\\data\\v31x\\increase_size_of_dateformat\";i:1;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v317pl1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v319', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v319rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v31x\\v319rc1', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v318\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\add_help_phpbb', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v320\\v320rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\allowed_schemes_links', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v320\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\announce_global_permission', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v320\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\cookie_notice', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v320\\v320rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\default_data_type_ids', 'a:2:{i:0;s:36:\"\\phpbb\\db\\migration\\data\\v320\\v320a2\";i:1;s:42:\"\\phpbb\\db\\migration\\data\\v320\\oauth_states\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\dev', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v316\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\font_awesome_update', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v320\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\icons_alt', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v320\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\log_post_id', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v320\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\notifications_board', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v320\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\oauth_states', 'a:1:{i:0;s:49:\"\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\remote_upload_validation', 'a:1:{i:0;s:36:\"\\phpbb\\db\\migration\\data\\v320\\v320a2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\remove_outdated_media', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v320\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\remove_profilefield_wlm', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v320\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\report_id_auto_increment', 'a:1:{i:0;s:51:\"\\phpbb\\db\\migration\\data\\v320\\default_data_type_ids\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\text_reparser', 'a:2:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v310\\contact_admin_form\";i:1;s:51:\"\\phpbb\\db\\migration\\data\\v320\\allowed_schemes_links\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\v320', 'a:2:{i:0;s:54:\"\\phpbb\\db\\migration\\data\\v31x\\increase_size_of_emotion\";i:1;s:43:\"\\phpbb\\db\\migration\\data\\v320\\cookie_notice\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\v320a1', 'a:9:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v320\\dev\";i:1;s:51:\"\\phpbb\\db\\migration\\data\\v320\\allowed_schemes_links\";i:2;s:56:\"\\phpbb\\db\\migration\\data\\v320\\announce_global_permission\";i:3;s:53:\"\\phpbb\\db\\migration\\data\\v320\\remove_profilefield_wlm\";i:4;s:49:\"\\phpbb\\db\\migration\\data\\v320\\font_awesome_update\";i:5;s:39:\"\\phpbb\\db\\migration\\data\\v320\\icons_alt\";i:6;s:41:\"\\phpbb\\db\\migration\\data\\v320\\log_post_id\";i:7;s:51:\"\\phpbb\\db\\migration\\data\\v320\\remove_outdated_media\";i:8;s:49:\"\\phpbb\\db\\migration\\data\\v320\\notifications_board\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\v320a2', 'a:3:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v317rc1\";i:1;s:43:\"\\phpbb\\db\\migration\\data\\v320\\text_reparser\";i:2;s:36:\"\\phpbb\\db\\migration\\data\\v320\\v320a1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\v320b1', 'a:4:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v31x\\v317pl1\";i:1;s:36:\"\\phpbb\\db\\migration\\data\\v320\\v320a2\";i:2;s:57:\"\\phpbb\\db\\migration\\data\\v31x\\increase_size_of_dateformat\";i:3;s:51:\"\\phpbb\\db\\migration\\data\\v320\\default_data_type_ids\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\v320b2', 'a:3:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v318\";i:1;s:36:\"\\phpbb\\db\\migration\\data\\v320\\v320b1\";i:2;s:54:\"\\phpbb\\db\\migration\\data\\v320\\remote_upload_validation\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\v320rc1', 'a:3:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v319\";i:1;s:54:\"\\phpbb\\db\\migration\\data\\v320\\report_id_auto_increment\";i:2;s:36:\"\\phpbb\\db\\migration\\data\\v320\\v320b2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v320\\v320rc2', 'a:3:{i:0;s:57:\"\\phpbb\\db\\migration\\data\\v31x\\remove_duplicate_migrations\";i:1;s:48:\"\\phpbb\\db\\migration\\data\\v31x\\add_log_time_index\";i:2;s:44:\"\\phpbb\\db\\migration\\data\\v320\\add_help_phpbb\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\add_missing_config', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v329\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\add_plupload_config', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v329\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\cookie_notice_p2', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v320\\v320\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\disable_remote_avatar', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v325\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\email_force_sender', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v321\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\enable_accurate_pm_button', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v322\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\f_list_topics_permission_add', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v321\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\fix_user_styles', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v320\\v320\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\font_awesome_update_cdn', 'a:1:{i:0;s:48:\"\\phpbb\\db\\migration\\data\\v32x\\add_missing_config\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\font_awesome_update_cdn_fix_depends_on', 'a:2:{i:0;s:53:\"\\phpbb\\db\\migration\\data\\v32x\\font_awesome_update_cdn\";i:1;s:48:\"\\phpbb\\db\\migration\\data\\v32x\\add_missing_config\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\forum_topics_per_page_type', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v323\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\jquery_update', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v325rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\load_user_activity_limit', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v320\\v320\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\merge_duplicate_bbcodes', 'a:0:{}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\remove_imagick', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v324rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\smtp_dynamic_data', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v326rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\timezone_p3', 'a:1:{i:0;s:38:\"\\phpbb\\db\\migration\\data\\v310\\timezone\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\update_prosilver_bitfield', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v321\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\user_emoji_permission', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v329rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_index_p1', 'a:1:{i:0;s:46:\"\\phpbb\\db\\migration\\data\\v32x\\cookie_notice_p2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_index_p2', 'a:1:{i:0;s:63:\"\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_index_p1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_index_p3', 'a:1:{i:0;s:63:\"\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_index_p2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_reduce_column_sizes', 'a:1:{i:0;s:63:\"\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_index_p3\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_remove_duplicates', 'a:1:{i:0;s:65:\"\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_temp_index\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_temp_index', 'a:1:{i:0;s:74:\"\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_reduce_column_sizes\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_unique_index', 'a:1:{i:0;s:72:\"\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_remove_duplicates\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v321', 'a:2:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v31x\\v3111\";i:1;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v321rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v3210', 'a:1:{i:0;s:38:\"\\phpbb\\db\\migration\\data\\v32x\\v3210rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v3210rc1', 'a:3:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v329\";i:1;s:49:\"\\phpbb\\db\\migration\\data\\v32x\\add_plupload_config\";i:2;s:53:\"\\phpbb\\db\\migration\\data\\v32x\\font_awesome_update_cdn\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v3210rc2', 'a:2:{i:0;s:68:\"\\phpbb\\db\\migration\\data\\v32x\\font_awesome_update_cdn_fix_depends_on\";i:1;s:38:\"\\phpbb\\db\\migration\\data\\v32x\\v3210rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v3211', 'a:1:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v32x\\v3210\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v321rc1', 'a:4:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v320\\v320\";i:1;s:38:\"\\phpbb\\db\\migration\\data\\v31x\\v3111rc1\";i:2;s:54:\"\\phpbb\\db\\migration\\data\\v32x\\load_user_activity_limit\";i:3;s:67:\"\\phpbb\\db\\migration\\data\\v32x\\user_notifications_table_unique_index\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v322', 'a:2:{i:0;s:35:\"\\phpbb\\db\\migration\\data\\v31x\\v3112\";i:1;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v322rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v322rc1', 'a:6:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v321\";i:1;s:45:\"\\phpbb\\db\\migration\\data\\v32x\\fix_user_styles\";i:2;s:55:\"\\phpbb\\db\\migration\\data\\v32x\\update_prosilver_bitfield\";i:3;s:48:\"\\phpbb\\db\\migration\\data\\v32x\\email_force_sender\";i:4;s:58:\"\\phpbb\\db\\migration\\data\\v32x\\f_list_topics_permission_add\";i:5;s:53:\"\\phpbb\\db\\migration\\data\\v32x\\merge_duplicate_bbcodes\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v323', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v323rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v323rc1', 'a:2:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v322\";i:1;s:55:\"\\phpbb\\db\\migration\\data\\v32x\\enable_accurate_pm_button\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v323rc2', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v323rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v324', 'a:2:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v324rc1\";i:1;s:44:\"\\phpbb\\db\\migration\\data\\v32x\\remove_imagick\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v324rc1', 'a:2:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v323\";i:1;s:56:\"\\phpbb\\db\\migration\\data\\v32x\\forum_topics_per_page_type\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v325', 'a:2:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v325rc1\";i:1;s:43:\"\\phpbb\\db\\migration\\data\\v32x\\jquery_update\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v325rc1', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v324\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v326', 'a:3:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v326rc1\";i:1;s:51:\"\\phpbb\\db\\migration\\data\\v32x\\disable_remote_avatar\";i:2;s:47:\"\\phpbb\\db\\migration\\data\\v32x\\smtp_dynamic_data\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v326rc1', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v325\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v327', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v327rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v327rc1', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v326\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v328', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v328rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v328rc1', 'a:2:{i:0;s:41:\"\\phpbb\\db\\migration\\data\\v32x\\timezone_p3\";i:1;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v327\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v329', 'a:2:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v32x\\v329rc1\";i:1;s:51:\"\\phpbb\\db\\migration\\data\\v32x\\user_emoji_permission\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v32x\\v329rc1', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v328\";}', 1, 1, '', 1671407295, 1671407295);
INSERT INTO `phpbb_migrations` (`migration_name`, `migration_depends_on`, `migration_schema_done`, `migration_data_done`, `migration_data_state`, `migration_start_time`, `migration_end_time`) VALUES
('\\phpbb\\db\\migration\\data\\v330\\add_display_unapproved_posts_config', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v330\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v330\\dev', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v327\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v330\\forums_legend_limit', 'a:1:{i:0;s:36:\"\\phpbb\\db\\migration\\data\\v330\\v330b1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v330\\jquery_update', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v330\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v330\\remove_attachment_flash', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v330\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v330\\remove_email_hash', 'a:1:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_0\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v330\\remove_max_pass_chars', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v330\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v330\\reset_password', 'a:1:{i:0;s:33:\"\\phpbb\\db\\migration\\data\\v330\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v330\\v330', 'a:2:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v329\";i:1;s:37:\"\\phpbb\\db\\migration\\data\\v330\\v330rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v330\\v330b1', 'a:6:{i:0;s:43:\"\\phpbb\\db\\migration\\data\\v330\\jquery_update\";i:1;s:44:\"\\phpbb\\db\\migration\\data\\v330\\reset_password\";i:2;s:53:\"\\phpbb\\db\\migration\\data\\v330\\remove_attachment_flash\";i:3;s:51:\"\\phpbb\\db\\migration\\data\\v330\\remove_max_pass_chars\";i:4;s:34:\"\\phpbb\\db\\migration\\data\\v32x\\v328\";i:5;s:33:\"\\phpbb\\db\\migration\\data\\v330\\dev\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v330\\v330b2', 'a:4:{i:0;s:65:\"\\phpbb\\db\\migration\\data\\v330\\add_display_unapproved_posts_config\";i:1;s:49:\"\\phpbb\\db\\migration\\data\\v330\\forums_legend_limit\";i:2;s:47:\"\\phpbb\\db\\migration\\data\\v330\\remove_email_hash\";i:3;s:36:\"\\phpbb\\db\\migration\\data\\v330\\v330b1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v330\\v330rc1', 'a:1:{i:0;s:36:\"\\phpbb\\db\\migration\\data\\v330\\v330b2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\add_notification_emails_table', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v330\\v330\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\bot_update', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v330\\v330\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\bot_update_v2', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v33x\\v334\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\default_search_return_chars', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v330\\v330\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\extend_bbcode_tooltip', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v33x\\v334\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\fix_display_unapproved_posts_config', 'a:1:{i:0;s:65:\"\\phpbb\\db\\migration\\data\\v330\\add_display_unapproved_posts_config\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\font_awesome_5_rollback', 'a:1:{i:0;s:51:\"\\phpbb\\db\\migration\\data\\v33x\\font_awesome_5_update\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\font_awesome_5_update', 'a:2:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v330\\v330\";i:1;s:53:\"\\phpbb\\db\\migration\\data\\v32x\\font_awesome_update_cdn\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\google_recaptcha_v3', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v330\\v330\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\jquery_update', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v33x\\v331rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\jquery_update_v2', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v33x\\v334\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\profilefield_cleanup', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v330\\v330\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\profilefield_youtube_update', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v33x\\v337\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\remove_orphaned_roles', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v33x\\v335\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\remove_profilefield_aol', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v33x\\v331\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v331', 'a:4:{i:0;s:53:\"\\phpbb\\db\\migration\\data\\v33x\\font_awesome_5_rollback\";i:1;s:43:\"\\phpbb\\db\\migration\\data\\v33x\\jquery_update\";i:2;s:35:\"\\phpbb\\db\\migration\\data\\v32x\\v3210\";i:3;s:37:\"\\phpbb\\db\\migration\\data\\v33x\\v331rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v331rc1', 'a:8:{i:0;s:59:\"\\phpbb\\db\\migration\\data\\v33x\\add_notification_emails_table\";i:1;s:65:\"\\phpbb\\db\\migration\\data\\v33x\\fix_display_unapproved_posts_config\";i:2;s:40:\"\\phpbb\\db\\migration\\data\\v33x\\bot_update\";i:3;s:51:\"\\phpbb\\db\\migration\\data\\v33x\\font_awesome_5_update\";i:4;s:50:\"\\phpbb\\db\\migration\\data\\v33x\\profilefield_cleanup\";i:5;s:49:\"\\phpbb\\db\\migration\\data\\v33x\\google_recaptcha_v3\";i:6;s:57:\"\\phpbb\\db\\migration\\data\\v33x\\default_search_return_chars\";i:7;s:38:\"\\phpbb\\db\\migration\\data\\v32x\\v3210rc2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v332', 'a:2:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v33x\\v332rc1\";i:1;s:35:\"\\phpbb\\db\\migration\\data\\v32x\\v3211\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v332rc1', 'a:1:{i:0;s:53:\"\\phpbb\\db\\migration\\data\\v33x\\remove_profilefield_aol\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v333', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v33x\\v333rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v333rc1', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v33x\\v332\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v334', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v33x\\v334rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v334rc1', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v33x\\v333\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v335', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v33x\\v335rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v335rc1', 'a:3:{i:0;s:51:\"\\phpbb\\db\\migration\\data\\v33x\\extend_bbcode_tooltip\";i:1;s:43:\"\\phpbb\\db\\migration\\data\\v33x\\bot_update_v2\";i:2;s:46:\"\\phpbb\\db\\migration\\data\\v33x\\jquery_update_v2\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v336', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v33x\\v336rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v336rc1', 'a:1:{i:0;s:51:\"\\phpbb\\db\\migration\\data\\v33x\\remove_orphaned_roles\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v337', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v33x\\v336\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v338', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v33x\\v338rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v338rc1', 'a:1:{i:0;s:57:\"\\phpbb\\db\\migration\\data\\v33x\\profilefield_youtube_update\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v339', 'a:1:{i:0;s:37:\"\\phpbb\\db\\migration\\data\\v33x\\v339rc1\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\db\\migration\\data\\v33x\\v339rc1', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v33x\\v338\";}', 1, 1, '', 1671407295, 1671407295),
('\\phpbb\\viglink\\migrations\\viglink_ask_admin', 'a:1:{i:0;s:41:\"\\phpbb\\viglink\\migrations\\viglink_data_v2\";}', 1, 1, '', 1671407296, 1671407296),
('\\phpbb\\viglink\\migrations\\viglink_ask_admin_wait', 'a:1:{i:0;s:43:\"\\phpbb\\viglink\\migrations\\viglink_ask_admin\";}', 1, 1, '', 1671407296, 1671407296),
('\\phpbb\\viglink\\migrations\\viglink_cron', 'a:1:{i:0;s:38:\"\\phpbb\\viglink\\migrations\\viglink_data\";}', 1, 1, '', 0, 0),
('\\phpbb\\viglink\\migrations\\viglink_data', 'a:1:{i:0;s:34:\"\\phpbb\\db\\migration\\data\\v31x\\v312\";}', 1, 1, '', 1671407296, 1671407296),
('\\phpbb\\viglink\\migrations\\viglink_data_v2', 'a:1:{i:0;s:38:\"\\phpbb\\viglink\\migrations\\viglink_data\";}', 1, 1, '', 1671407296, 1671407296);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_moderator_cache`
--

CREATE TABLE `phpbb_moderator_cache` (
  `forum_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `group_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `group_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `display_on_index` tinyint UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_modules`
--

CREATE TABLE `phpbb_modules` (
  `module_id` mediumint UNSIGNED NOT NULL,
  `module_enabled` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `module_display` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `module_basename` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `module_class` varchar(10) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `parent_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `left_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `right_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `module_langname` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `module_mode` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `module_auth` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_modules`
--

INSERT INTO `phpbb_modules` (`module_id`, `module_enabled`, `module_display`, `module_basename`, `module_class`, `parent_id`, `left_id`, `right_id`, `module_langname`, `module_mode`, `module_auth`) VALUES
(1, 1, 1, '', 'acp', 0, 1, 68, 'ACP_CAT_GENERAL', '', ''),
(2, 1, 1, '', 'acp', 1, 4, 17, 'ACP_QUICK_ACCESS', '', ''),
(3, 1, 1, '', 'acp', 1, 18, 45, 'ACP_BOARD_CONFIGURATION', '', ''),
(4, 1, 1, '', 'acp', 1, 46, 53, 'ACP_CLIENT_COMMUNICATION', '', ''),
(5, 1, 1, '', 'acp', 1, 54, 67, 'ACP_SERVER_CONFIGURATION', '', ''),
(6, 1, 1, '', 'acp', 0, 69, 88, 'ACP_CAT_FORUMS', '', ''),
(7, 1, 1, '', 'acp', 6, 70, 75, 'ACP_MANAGE_FORUMS', '', ''),
(8, 1, 1, '', 'acp', 6, 76, 87, 'ACP_FORUM_BASED_PERMISSIONS', '', ''),
(9, 1, 1, '', 'acp', 0, 89, 116, 'ACP_CAT_POSTING', '', ''),
(10, 1, 1, '', 'acp', 9, 90, 103, 'ACP_MESSAGES', '', ''),
(11, 1, 1, '', 'acp', 9, 104, 115, 'ACP_ATTACHMENTS', '', ''),
(12, 1, 1, '', 'acp', 0, 117, 174, 'ACP_CAT_USERGROUP', '', ''),
(13, 1, 1, '', 'acp', 12, 118, 153, 'ACP_CAT_USERS', '', ''),
(14, 1, 1, '', 'acp', 12, 154, 163, 'ACP_GROUPS', '', ''),
(15, 1, 1, '', 'acp', 12, 164, 173, 'ACP_USER_SECURITY', '', ''),
(16, 1, 1, '', 'acp', 0, 175, 224, 'ACP_CAT_PERMISSIONS', '', ''),
(17, 1, 1, '', 'acp', 16, 178, 187, 'ACP_GLOBAL_PERMISSIONS', '', ''),
(18, 1, 1, '', 'acp', 16, 188, 199, 'ACP_FORUM_BASED_PERMISSIONS', '', ''),
(19, 1, 1, '', 'acp', 16, 200, 209, 'ACP_PERMISSION_ROLES', '', ''),
(20, 1, 1, '', 'acp', 16, 210, 223, 'ACP_PERMISSION_MASKS', '', ''),
(21, 1, 1, '', 'acp', 0, 225, 240, 'ACP_CAT_CUSTOMISE', '', ''),
(22, 1, 1, '', 'acp', 21, 230, 235, 'ACP_STYLE_MANAGEMENT', '', ''),
(23, 1, 1, '', 'acp', 21, 226, 229, 'ACP_EXTENSION_MANAGEMENT', '', ''),
(24, 1, 1, '', 'acp', 21, 236, 239, 'ACP_LANGUAGE', '', ''),
(25, 1, 1, '', 'acp', 0, 241, 260, 'ACP_CAT_MAINTENANCE', '', ''),
(26, 1, 1, '', 'acp', 25, 242, 251, 'ACP_FORUM_LOGS', '', ''),
(27, 1, 1, '', 'acp', 25, 252, 259, 'ACP_CAT_DATABASE', '', ''),
(28, 1, 1, '', 'acp', 0, 261, 284, 'ACP_CAT_SYSTEM', '', ''),
(29, 1, 1, '', 'acp', 28, 262, 265, 'ACP_AUTOMATION', '', ''),
(30, 1, 1, '', 'acp', 28, 266, 275, 'ACP_GENERAL_TASKS', '', ''),
(31, 1, 1, '', 'acp', 28, 276, 283, 'ACP_MODULE_MANAGEMENT', '', ''),
(32, 1, 1, '', 'acp', 0, 285, 286, 'ACP_CAT_DOT_MODS', '', ''),
(33, 1, 1, 'acp_attachments', 'acp', 3, 19, 20, 'ACP_ATTACHMENT_SETTINGS', 'attach', 'acl_a_attach'),
(34, 1, 1, 'acp_attachments', 'acp', 11, 105, 106, 'ACP_ATTACHMENT_SETTINGS', 'attach', 'acl_a_attach'),
(35, 1, 1, 'acp_attachments', 'acp', 11, 107, 108, 'ACP_MANAGE_EXTENSIONS', 'extensions', 'acl_a_attach'),
(36, 1, 1, 'acp_attachments', 'acp', 11, 109, 110, 'ACP_EXTENSION_GROUPS', 'ext_groups', 'acl_a_attach'),
(37, 1, 1, 'acp_attachments', 'acp', 11, 111, 112, 'ACP_ORPHAN_ATTACHMENTS', 'orphan', 'acl_a_attach'),
(38, 1, 1, 'acp_attachments', 'acp', 11, 113, 114, 'ACP_MANAGE_ATTACHMENTS', 'manage', 'acl_a_attach'),
(39, 1, 1, 'acp_ban', 'acp', 15, 165, 166, 'ACP_BAN_EMAILS', 'email', 'acl_a_ban'),
(40, 1, 1, 'acp_ban', 'acp', 15, 167, 168, 'ACP_BAN_IPS', 'ip', 'acl_a_ban'),
(41, 1, 1, 'acp_ban', 'acp', 15, 169, 170, 'ACP_BAN_USERNAMES', 'user', 'acl_a_ban'),
(42, 1, 1, 'acp_bbcodes', 'acp', 10, 91, 92, 'ACP_BBCODES', 'bbcodes', 'acl_a_bbcode'),
(43, 1, 1, 'acp_board', 'acp', 3, 21, 22, 'ACP_BOARD_SETTINGS', 'settings', 'acl_a_board'),
(44, 1, 1, 'acp_board', 'acp', 3, 23, 24, 'ACP_BOARD_FEATURES', 'features', 'acl_a_board'),
(45, 1, 1, 'acp_board', 'acp', 3, 25, 26, 'ACP_AVATAR_SETTINGS', 'avatar', 'acl_a_board'),
(46, 1, 1, 'acp_board', 'acp', 3, 27, 28, 'ACP_MESSAGE_SETTINGS', 'message', 'acl_a_board'),
(47, 1, 1, 'acp_board', 'acp', 10, 93, 94, 'ACP_MESSAGE_SETTINGS', 'message', 'acl_a_board'),
(48, 1, 1, 'acp_board', 'acp', 3, 29, 30, 'ACP_POST_SETTINGS', 'post', 'acl_a_board'),
(49, 1, 1, 'acp_board', 'acp', 10, 95, 96, 'ACP_POST_SETTINGS', 'post', 'acl_a_board'),
(50, 1, 1, 'acp_board', 'acp', 3, 31, 32, 'ACP_SIGNATURE_SETTINGS', 'signature', 'acl_a_board'),
(51, 1, 1, 'acp_board', 'acp', 3, 33, 34, 'ACP_FEED_SETTINGS', 'feed', 'acl_a_board'),
(52, 1, 1, 'acp_board', 'acp', 3, 35, 36, 'ACP_REGISTER_SETTINGS', 'registration', 'acl_a_board'),
(53, 1, 1, 'acp_board', 'acp', 4, 47, 48, 'ACP_AUTH_SETTINGS', 'auth', 'acl_a_server'),
(54, 1, 1, 'acp_board', 'acp', 4, 49, 50, 'ACP_EMAIL_SETTINGS', 'email', 'acl_a_server'),
(55, 1, 1, 'acp_board', 'acp', 5, 55, 56, 'ACP_COOKIE_SETTINGS', 'cookie', 'acl_a_server'),
(56, 1, 1, 'acp_board', 'acp', 5, 57, 58, 'ACP_SERVER_SETTINGS', 'server', 'acl_a_server'),
(57, 1, 1, 'acp_board', 'acp', 5, 59, 60, 'ACP_SECURITY_SETTINGS', 'security', 'acl_a_server'),
(58, 1, 1, 'acp_board', 'acp', 5, 61, 62, 'ACP_LOAD_SETTINGS', 'load', 'acl_a_server'),
(59, 1, 1, 'acp_bots', 'acp', 30, 267, 268, 'ACP_BOTS', 'bots', 'acl_a_bots'),
(60, 1, 1, 'acp_captcha', 'acp', 3, 37, 38, 'ACP_VC_SETTINGS', 'visual', 'acl_a_board'),
(61, 1, 0, 'acp_captcha', 'acp', 3, 39, 40, 'ACP_VC_CAPTCHA_DISPLAY', 'img', 'acl_a_board'),
(62, 1, 1, 'acp_contact', 'acp', 3, 41, 42, 'ACP_CONTACT_SETTINGS', 'contact', 'acl_a_board'),
(63, 1, 1, 'acp_database', 'acp', 27, 253, 254, 'ACP_BACKUP', 'backup', 'acl_a_backup'),
(64, 1, 1, 'acp_database', 'acp', 27, 255, 256, 'ACP_RESTORE', 'restore', 'acl_a_backup'),
(65, 1, 1, 'acp_disallow', 'acp', 15, 171, 172, 'ACP_DISALLOW_USERNAMES', 'usernames', 'acl_a_names'),
(66, 1, 1, 'acp_email', 'acp', 30, 269, 270, 'ACP_MASS_EMAIL', 'email', 'acl_a_email && cfg_email_enable'),
(67, 1, 1, 'acp_extensions', 'acp', 23, 227, 228, 'ACP_EXTENSIONS', 'main', 'acl_a_extensions'),
(68, 1, 1, 'acp_forums', 'acp', 7, 71, 72, 'ACP_MANAGE_FORUMS', 'manage', 'acl_a_forum'),
(69, 1, 1, 'acp_groups', 'acp', 14, 155, 156, 'ACP_GROUPS_MANAGE', 'manage', 'acl_a_group'),
(70, 1, 1, 'acp_groups', 'acp', 14, 157, 158, 'ACP_GROUPS_POSITION', 'position', 'acl_a_group'),
(71, 1, 1, 'acp_help_phpbb', 'acp', 5, 63, 64, 'ACP_HELP_PHPBB', 'help_phpbb', 'acl_a_server'),
(72, 1, 1, 'acp_icons', 'acp', 10, 97, 98, 'ACP_ICONS', 'icons', 'acl_a_icons'),
(73, 1, 1, 'acp_icons', 'acp', 10, 99, 100, 'ACP_SMILIES', 'smilies', 'acl_a_icons'),
(74, 1, 1, 'acp_inactive', 'acp', 13, 119, 120, 'ACP_INACTIVE_USERS', 'list', 'acl_a_user'),
(75, 1, 1, 'acp_jabber', 'acp', 4, 51, 52, 'ACP_JABBER_SETTINGS', 'settings', 'acl_a_jabber'),
(76, 1, 1, 'acp_language', 'acp', 24, 237, 238, 'ACP_LANGUAGE_PACKS', 'lang_packs', 'acl_a_language'),
(77, 1, 1, 'acp_logs', 'acp', 26, 243, 244, 'ACP_ADMIN_LOGS', 'admin', 'acl_a_viewlogs'),
(78, 1, 1, 'acp_logs', 'acp', 26, 245, 246, 'ACP_MOD_LOGS', 'mod', 'acl_a_viewlogs'),
(79, 1, 1, 'acp_logs', 'acp', 26, 247, 248, 'ACP_USERS_LOGS', 'users', 'acl_a_viewlogs'),
(80, 1, 1, 'acp_logs', 'acp', 26, 249, 250, 'ACP_CRITICAL_LOGS', 'critical', 'acl_a_viewlogs'),
(81, 1, 1, 'acp_main', 'acp', 1, 2, 3, 'ACP_INDEX', 'main', ''),
(82, 1, 1, 'acp_modules', 'acp', 31, 277, 278, 'ACP', 'acp', 'acl_a_modules'),
(83, 1, 1, 'acp_modules', 'acp', 31, 279, 280, 'UCP', 'ucp', 'acl_a_modules'),
(84, 1, 1, 'acp_modules', 'acp', 31, 281, 282, 'MCP', 'mcp', 'acl_a_modules'),
(85, 1, 1, 'acp_permission_roles', 'acp', 19, 201, 202, 'ACP_ADMIN_ROLES', 'admin_roles', 'acl_a_roles && acl_a_aauth'),
(86, 1, 1, 'acp_permission_roles', 'acp', 19, 203, 204, 'ACP_USER_ROLES', 'user_roles', 'acl_a_roles && acl_a_uauth'),
(87, 1, 1, 'acp_permission_roles', 'acp', 19, 205, 206, 'ACP_MOD_ROLES', 'mod_roles', 'acl_a_roles && acl_a_mauth'),
(88, 1, 1, 'acp_permission_roles', 'acp', 19, 207, 208, 'ACP_FORUM_ROLES', 'forum_roles', 'acl_a_roles && acl_a_fauth'),
(89, 1, 1, 'acp_permissions', 'acp', 16, 176, 177, 'ACP_PERMISSIONS', 'intro', 'acl_a_authusers || acl_a_authgroups || acl_a_viewauth'),
(90, 1, 0, 'acp_permissions', 'acp', 20, 211, 212, 'ACP_PERMISSION_TRACE', 'trace', 'acl_a_viewauth'),
(91, 1, 1, 'acp_permissions', 'acp', 18, 189, 190, 'ACP_FORUM_PERMISSIONS', 'setting_forum_local', 'acl_a_fauth && (acl_a_authusers || acl_a_authgroups)'),
(92, 1, 1, 'acp_permissions', 'acp', 18, 191, 192, 'ACP_FORUM_PERMISSIONS_COPY', 'setting_forum_copy', 'acl_a_fauth && acl_a_authusers && acl_a_authgroups && acl_a_mauth'),
(93, 1, 1, 'acp_permissions', 'acp', 18, 193, 194, 'ACP_FORUM_MODERATORS', 'setting_mod_local', 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),
(94, 1, 1, 'acp_permissions', 'acp', 17, 179, 180, 'ACP_USERS_PERMISSIONS', 'setting_user_global', 'acl_a_authusers && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
(95, 1, 1, 'acp_permissions', 'acp', 13, 123, 124, 'ACP_USERS_PERMISSIONS', 'setting_user_global', 'acl_a_authusers && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
(96, 1, 1, 'acp_permissions', 'acp', 18, 195, 196, 'ACP_USERS_FORUM_PERMISSIONS', 'setting_user_local', 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),
(97, 1, 1, 'acp_permissions', 'acp', 13, 125, 126, 'ACP_USERS_FORUM_PERMISSIONS', 'setting_user_local', 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),
(98, 1, 1, 'acp_permissions', 'acp', 17, 181, 182, 'ACP_GROUPS_PERMISSIONS', 'setting_group_global', 'acl_a_authgroups && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
(99, 1, 1, 'acp_permissions', 'acp', 14, 159, 160, 'ACP_GROUPS_PERMISSIONS', 'setting_group_global', 'acl_a_authgroups && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
(100, 1, 1, 'acp_permissions', 'acp', 18, 197, 198, 'ACP_GROUPS_FORUM_PERMISSIONS', 'setting_group_local', 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),
(101, 1, 1, 'acp_permissions', 'acp', 14, 161, 162, 'ACP_GROUPS_FORUM_PERMISSIONS', 'setting_group_local', 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),
(102, 1, 1, 'acp_permissions', 'acp', 17, 183, 184, 'ACP_ADMINISTRATORS', 'setting_admin_global', 'acl_a_aauth && (acl_a_authusers || acl_a_authgroups)'),
(103, 1, 1, 'acp_permissions', 'acp', 17, 185, 186, 'ACP_GLOBAL_MODERATORS', 'setting_mod_global', 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),
(104, 1, 1, 'acp_permissions', 'acp', 20, 213, 214, 'ACP_VIEW_ADMIN_PERMISSIONS', 'view_admin_global', 'acl_a_viewauth'),
(105, 1, 1, 'acp_permissions', 'acp', 20, 215, 216, 'ACP_VIEW_USER_PERMISSIONS', 'view_user_global', 'acl_a_viewauth'),
(106, 1, 1, 'acp_permissions', 'acp', 20, 217, 218, 'ACP_VIEW_GLOBAL_MOD_PERMISSIONS', 'view_mod_global', 'acl_a_viewauth'),
(107, 1, 1, 'acp_permissions', 'acp', 20, 219, 220, 'ACP_VIEW_FORUM_MOD_PERMISSIONS', 'view_mod_local', 'acl_a_viewauth'),
(108, 1, 1, 'acp_permissions', 'acp', 20, 221, 222, 'ACP_VIEW_FORUM_PERMISSIONS', 'view_forum_local', 'acl_a_viewauth'),
(109, 1, 1, 'acp_php_info', 'acp', 30, 271, 272, 'ACP_PHP_INFO', 'info', 'acl_a_phpinfo'),
(110, 1, 1, 'acp_profile', 'acp', 13, 127, 128, 'ACP_CUSTOM_PROFILE_FIELDS', 'profile', 'acl_a_profile'),
(111, 1, 1, 'acp_prune', 'acp', 7, 73, 74, 'ACP_PRUNE_FORUMS', 'forums', 'acl_a_prune'),
(112, 1, 1, 'acp_prune', 'acp', 13, 129, 130, 'ACP_PRUNE_USERS', 'users', 'acl_a_userdel'),
(113, 1, 1, 'acp_ranks', 'acp', 13, 131, 132, 'ACP_MANAGE_RANKS', 'ranks', 'acl_a_ranks'),
(114, 1, 1, 'acp_reasons', 'acp', 30, 273, 274, 'ACP_MANAGE_REASONS', 'main', 'acl_a_reasons'),
(115, 1, 1, 'acp_search', 'acp', 5, 65, 66, 'ACP_SEARCH_SETTINGS', 'settings', 'acl_a_search'),
(116, 1, 1, 'acp_search', 'acp', 27, 257, 258, 'ACP_SEARCH_INDEX', 'index', 'acl_a_search'),
(117, 1, 1, 'acp_styles', 'acp', 22, 231, 232, 'ACP_STYLES', 'style', 'acl_a_styles'),
(118, 1, 1, 'acp_styles', 'acp', 22, 233, 234, 'ACP_STYLES_INSTALL', 'install', 'acl_a_styles'),
(119, 1, 1, 'acp_update', 'acp', 29, 263, 264, 'ACP_VERSION_CHECK', 'version_check', 'acl_a_board'),
(120, 1, 1, 'acp_users', 'acp', 13, 121, 122, 'ACP_MANAGE_USERS', 'overview', 'acl_a_user'),
(121, 1, 0, 'acp_users', 'acp', 13, 133, 134, 'ACP_USER_FEEDBACK', 'feedback', 'acl_a_user'),
(122, 1, 0, 'acp_users', 'acp', 13, 135, 136, 'ACP_USER_WARNINGS', 'warnings', 'acl_a_user'),
(123, 1, 0, 'acp_users', 'acp', 13, 137, 138, 'ACP_USER_PROFILE', 'profile', 'acl_a_user'),
(124, 1, 0, 'acp_users', 'acp', 13, 139, 140, 'ACP_USER_PREFS', 'prefs', 'acl_a_user'),
(125, 1, 0, 'acp_users', 'acp', 13, 141, 142, 'ACP_USER_AVATAR', 'avatar', 'acl_a_user'),
(126, 1, 0, 'acp_users', 'acp', 13, 143, 144, 'ACP_USER_RANK', 'rank', 'acl_a_user'),
(127, 1, 0, 'acp_users', 'acp', 13, 145, 146, 'ACP_USER_SIG', 'sig', 'acl_a_user'),
(128, 1, 0, 'acp_users', 'acp', 13, 147, 148, 'ACP_USER_GROUPS', 'groups', 'acl_a_user && acl_a_group'),
(129, 1, 0, 'acp_users', 'acp', 13, 149, 150, 'ACP_USER_PERM', 'perm', 'acl_a_user && acl_a_viewauth'),
(130, 1, 0, 'acp_users', 'acp', 13, 151, 152, 'ACP_USER_ATTACH', 'attach', 'acl_a_user'),
(131, 1, 1, 'acp_words', 'acp', 10, 101, 102, 'ACP_WORDS', 'words', 'acl_a_words'),
(132, 1, 1, 'acp_users', 'acp', 2, 5, 6, 'ACP_MANAGE_USERS', 'overview', 'acl_a_user'),
(133, 1, 1, 'acp_groups', 'acp', 2, 7, 8, 'ACP_GROUPS_MANAGE', 'manage', 'acl_a_group'),
(134, 1, 1, 'acp_forums', 'acp', 2, 9, 10, 'ACP_MANAGE_FORUMS', 'manage', 'acl_a_forum'),
(135, 1, 1, 'acp_logs', 'acp', 2, 11, 12, 'ACP_MOD_LOGS', 'mod', 'acl_a_viewlogs'),
(136, 1, 1, 'acp_bots', 'acp', 2, 13, 14, 'ACP_BOTS', 'bots', 'acl_a_bots'),
(137, 1, 1, 'acp_php_info', 'acp', 2, 15, 16, 'ACP_PHP_INFO', 'info', 'acl_a_phpinfo'),
(138, 1, 1, 'acp_permissions', 'acp', 8, 77, 78, 'ACP_FORUM_PERMISSIONS', 'setting_forum_local', 'acl_a_fauth && (acl_a_authusers || acl_a_authgroups)'),
(139, 1, 1, 'acp_permissions', 'acp', 8, 79, 80, 'ACP_FORUM_PERMISSIONS_COPY', 'setting_forum_copy', 'acl_a_fauth && acl_a_authusers && acl_a_authgroups && acl_a_mauth'),
(140, 1, 1, 'acp_permissions', 'acp', 8, 81, 82, 'ACP_FORUM_MODERATORS', 'setting_mod_local', 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),
(141, 1, 1, 'acp_permissions', 'acp', 8, 83, 84, 'ACP_USERS_FORUM_PERMISSIONS', 'setting_user_local', 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),
(142, 1, 1, 'acp_permissions', 'acp', 8, 85, 86, 'ACP_GROUPS_FORUM_PERMISSIONS', 'setting_group_local', 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),
(143, 1, 1, '', 'mcp', 0, 1, 10, 'MCP_MAIN', '', ''),
(144, 1, 1, '', 'mcp', 0, 11, 22, 'MCP_QUEUE', '', ''),
(145, 1, 1, '', 'mcp', 0, 23, 36, 'MCP_REPORTS', '', ''),
(146, 1, 1, '', 'mcp', 0, 37, 42, 'MCP_NOTES', '', ''),
(147, 1, 1, '', 'mcp', 0, 43, 52, 'MCP_WARN', '', ''),
(148, 1, 1, '', 'mcp', 0, 53, 60, 'MCP_LOGS', '', ''),
(149, 1, 1, '', 'mcp', 0, 61, 68, 'MCP_BAN', '', ''),
(150, 1, 1, 'mcp_ban', 'mcp', 149, 62, 63, 'MCP_BAN_USERNAMES', 'user', 'acl_m_ban'),
(151, 1, 1, 'mcp_ban', 'mcp', 149, 64, 65, 'MCP_BAN_IPS', 'ip', 'acl_m_ban'),
(152, 1, 1, 'mcp_ban', 'mcp', 149, 66, 67, 'MCP_BAN_EMAILS', 'email', 'acl_m_ban'),
(153, 1, 1, 'mcp_logs', 'mcp', 148, 54, 55, 'MCP_LOGS_FRONT', 'front', 'acl_m_ || aclf_m_'),
(154, 1, 1, 'mcp_logs', 'mcp', 148, 56, 57, 'MCP_LOGS_FORUM_VIEW', 'forum_logs', 'acl_m_,$id'),
(155, 1, 1, 'mcp_logs', 'mcp', 148, 58, 59, 'MCP_LOGS_TOPIC_VIEW', 'topic_logs', 'acl_m_,$id'),
(156, 1, 1, 'mcp_main', 'mcp', 143, 2, 3, 'MCP_MAIN_FRONT', 'front', ''),
(157, 1, 1, 'mcp_main', 'mcp', 143, 4, 5, 'MCP_MAIN_FORUM_VIEW', 'forum_view', 'acl_m_,$id'),
(158, 1, 1, 'mcp_main', 'mcp', 143, 6, 7, 'MCP_MAIN_TOPIC_VIEW', 'topic_view', 'acl_m_,$id'),
(159, 1, 1, 'mcp_main', 'mcp', 143, 8, 9, 'MCP_MAIN_POST_DETAILS', 'post_details', 'acl_m_,$id || (!$id && aclf_m_)'),
(160, 1, 1, 'mcp_notes', 'mcp', 146, 38, 39, 'MCP_NOTES_FRONT', 'front', ''),
(161, 1, 1, 'mcp_notes', 'mcp', 146, 40, 41, 'MCP_NOTES_USER', 'user_notes', ''),
(162, 1, 1, 'mcp_pm_reports', 'mcp', 145, 30, 31, 'MCP_PM_REPORTS_OPEN', 'pm_reports', 'acl_m_pm_report'),
(163, 1, 1, 'mcp_pm_reports', 'mcp', 145, 32, 33, 'MCP_PM_REPORTS_CLOSED', 'pm_reports_closed', 'acl_m_pm_report'),
(164, 1, 1, 'mcp_pm_reports', 'mcp', 145, 34, 35, 'MCP_PM_REPORT_DETAILS', 'pm_report_details', 'acl_m_pm_report'),
(165, 1, 1, 'mcp_queue', 'mcp', 144, 12, 13, 'MCP_QUEUE_UNAPPROVED_TOPICS', 'unapproved_topics', 'aclf_m_approve'),
(166, 1, 1, 'mcp_queue', 'mcp', 144, 14, 15, 'MCP_QUEUE_UNAPPROVED_POSTS', 'unapproved_posts', 'aclf_m_approve'),
(167, 1, 1, 'mcp_queue', 'mcp', 144, 16, 17, 'MCP_QUEUE_DELETED_TOPICS', 'deleted_topics', 'aclf_m_approve'),
(168, 1, 1, 'mcp_queue', 'mcp', 144, 18, 19, 'MCP_QUEUE_DELETED_POSTS', 'deleted_posts', 'aclf_m_approve'),
(169, 1, 1, 'mcp_queue', 'mcp', 144, 20, 21, 'MCP_QUEUE_APPROVE_DETAILS', 'approve_details', 'acl_m_approve,$id || (!$id && aclf_m_approve)'),
(170, 1, 1, 'mcp_reports', 'mcp', 145, 24, 25, 'MCP_REPORTS_OPEN', 'reports', 'aclf_m_report'),
(171, 1, 1, 'mcp_reports', 'mcp', 145, 26, 27, 'MCP_REPORTS_CLOSED', 'reports_closed', 'aclf_m_report'),
(172, 1, 1, 'mcp_reports', 'mcp', 145, 28, 29, 'MCP_REPORT_DETAILS', 'report_details', 'acl_m_report,$id || (!$id && aclf_m_report)'),
(173, 1, 1, 'mcp_warn', 'mcp', 147, 44, 45, 'MCP_WARN_FRONT', 'front', 'aclf_m_warn'),
(174, 1, 1, 'mcp_warn', 'mcp', 147, 46, 47, 'MCP_WARN_LIST', 'list', 'aclf_m_warn'),
(175, 1, 1, 'mcp_warn', 'mcp', 147, 48, 49, 'MCP_WARN_USER', 'warn_user', 'aclf_m_warn'),
(176, 1, 1, 'mcp_warn', 'mcp', 147, 50, 51, 'MCP_WARN_POST', 'warn_post', 'acl_m_warn && acl_f_read,$id'),
(177, 1, 1, '', 'ucp', 0, 1, 14, 'UCP_MAIN', '', ''),
(178, 1, 1, '', 'ucp', 0, 15, 28, 'UCP_PROFILE', '', ''),
(179, 1, 1, '', 'ucp', 0, 29, 38, 'UCP_PREFS', '', ''),
(180, 1, 1, 'ucp_pm', 'ucp', 0, 39, 48, 'UCP_PM', '', ''),
(181, 1, 1, '', 'ucp', 0, 49, 54, 'UCP_USERGROUPS', '', ''),
(182, 1, 1, '', 'ucp', 0, 55, 60, 'UCP_ZEBRA', '', ''),
(183, 1, 1, 'ucp_attachments', 'ucp', 177, 10, 11, 'UCP_MAIN_ATTACHMENTS', 'attachments', 'acl_u_attach'),
(184, 1, 1, 'ucp_auth_link', 'ucp', 178, 26, 27, 'UCP_AUTH_LINK_MANAGE', 'auth_link', 'authmethod_oauth'),
(185, 1, 1, 'ucp_groups', 'ucp', 181, 50, 51, 'UCP_USERGROUPS_MEMBER', 'membership', ''),
(186, 1, 1, 'ucp_groups', 'ucp', 181, 52, 53, 'UCP_USERGROUPS_MANAGE', 'manage', ''),
(187, 1, 1, 'ucp_main', 'ucp', 177, 2, 3, 'UCP_MAIN_FRONT', 'front', ''),
(188, 1, 1, 'ucp_main', 'ucp', 177, 4, 5, 'UCP_MAIN_SUBSCRIBED', 'subscribed', ''),
(189, 1, 1, 'ucp_main', 'ucp', 177, 6, 7, 'UCP_MAIN_BOOKMARKS', 'bookmarks', 'cfg_allow_bookmarks'),
(190, 1, 1, 'ucp_main', 'ucp', 177, 8, 9, 'UCP_MAIN_DRAFTS', 'drafts', ''),
(191, 1, 1, 'ucp_notifications', 'ucp', 179, 36, 37, 'UCP_NOTIFICATION_OPTIONS', 'notification_options', ''),
(192, 1, 1, 'ucp_notifications', 'ucp', 177, 12, 13, 'UCP_NOTIFICATION_LIST', 'notification_list', 'cfg_allow_board_notifications'),
(193, 1, 0, 'ucp_pm', 'ucp', 180, 40, 41, 'UCP_PM_VIEW', 'view', 'cfg_allow_privmsg'),
(194, 1, 1, 'ucp_pm', 'ucp', 180, 42, 43, 'UCP_PM_COMPOSE', 'compose', 'cfg_allow_privmsg'),
(195, 1, 1, 'ucp_pm', 'ucp', 180, 44, 45, 'UCP_PM_DRAFTS', 'drafts', 'cfg_allow_privmsg'),
(196, 1, 1, 'ucp_pm', 'ucp', 180, 46, 47, 'UCP_PM_OPTIONS', 'options', 'cfg_allow_privmsg'),
(197, 1, 1, 'ucp_prefs', 'ucp', 179, 30, 31, 'UCP_PREFS_PERSONAL', 'personal', ''),
(198, 1, 1, 'ucp_prefs', 'ucp', 179, 32, 33, 'UCP_PREFS_POST', 'post', ''),
(199, 1, 1, 'ucp_prefs', 'ucp', 179, 34, 35, 'UCP_PREFS_VIEW', 'view', ''),
(200, 1, 1, 'ucp_profile', 'ucp', 178, 16, 17, 'UCP_PROFILE_PROFILE_INFO', 'profile_info', 'acl_u_chgprofileinfo'),
(201, 1, 1, 'ucp_profile', 'ucp', 178, 18, 19, 'UCP_PROFILE_SIGNATURE', 'signature', 'acl_u_sig'),
(202, 1, 1, 'ucp_profile', 'ucp', 178, 20, 21, 'UCP_PROFILE_AVATAR', 'avatar', 'cfg_allow_avatar'),
(203, 1, 1, 'ucp_profile', 'ucp', 178, 22, 23, 'UCP_PROFILE_REG_DETAILS', 'reg_details', ''),
(204, 1, 1, 'ucp_profile', 'ucp', 178, 24, 25, 'UCP_PROFILE_AUTOLOGIN_KEYS', 'autologin_keys', ''),
(205, 1, 1, 'ucp_zebra', 'ucp', 182, 56, 57, 'UCP_ZEBRA_FRIENDS', 'friends', ''),
(206, 1, 1, 'ucp_zebra', 'ucp', 182, 58, 59, 'UCP_ZEBRA_FOES', 'foes', ''),
(207, 1, 1, '\\phpbb\\viglink\\acp\\viglink_module', 'acp', 3, 43, 44, 'ACP_VIGLINK_SETTINGS', 'settings', 'ext_phpbb/viglink && acl_a_board');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_notifications`
--

CREATE TABLE `phpbb_notifications` (
  `notification_id` int UNSIGNED NOT NULL,
  `notification_type_id` smallint UNSIGNED NOT NULL DEFAULT '0',
  `item_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `item_parent_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `notification_read` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `notification_time` int UNSIGNED NOT NULL DEFAULT '1',
  `notification_data` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_notification_emails`
--

CREATE TABLE `phpbb_notification_emails` (
  `notification_type_id` smallint UNSIGNED NOT NULL DEFAULT '0',
  `item_id` int UNSIGNED NOT NULL DEFAULT '0',
  `item_parent_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_notification_types`
--

CREATE TABLE `phpbb_notification_types` (
  `notification_type_id` smallint UNSIGNED NOT NULL,
  `notification_type_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `notification_type_enabled` tinyint UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_notification_types`
--

INSERT INTO `phpbb_notification_types` (`notification_type_id`, `notification_type_name`, `notification_type_enabled`) VALUES
(1, 'notification.type.topic', 1),
(2, 'notification.type.approve_topic', 1),
(3, 'notification.type.quote', 1),
(4, 'notification.type.bookmark', 1),
(5, 'notification.type.post', 1),
(6, 'notification.type.approve_post', 1),
(7, 'notification.type.forum', 1),
(8, 'notification.type.group_request', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_oauth_accounts`
--

CREATE TABLE `phpbb_oauth_accounts` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `provider` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `oauth_provider_id` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_oauth_states`
--

CREATE TABLE `phpbb_oauth_states` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `session_id` char(32) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `provider` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `oauth_state` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_oauth_tokens`
--

CREATE TABLE `phpbb_oauth_tokens` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `session_id` char(32) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `provider` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `oauth_token` mediumtext COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_poll_options`
--

CREATE TABLE `phpbb_poll_options` (
  `poll_option_id` tinyint NOT NULL DEFAULT '0',
  `topic_id` int UNSIGNED NOT NULL DEFAULT '0',
  `poll_option_text` text COLLATE utf8mb3_bin NOT NULL,
  `poll_option_total` mediumint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_poll_votes`
--

CREATE TABLE `phpbb_poll_votes` (
  `topic_id` int UNSIGNED NOT NULL DEFAULT '0',
  `poll_option_id` tinyint NOT NULL DEFAULT '0',
  `vote_user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `vote_user_ip` varchar(40) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_posts`
--

CREATE TABLE `phpbb_posts` (
  `post_id` int UNSIGNED NOT NULL,
  `topic_id` int UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `poster_id` int UNSIGNED NOT NULL DEFAULT '0',
  `icon_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `poster_ip` varchar(40) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `post_time` int UNSIGNED NOT NULL DEFAULT '0',
  `post_reported` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `enable_bbcode` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `enable_smilies` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `enable_magic_url` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `enable_sig` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `post_username` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `post_subject` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `post_text` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `post_checksum` varchar(32) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `post_attachment` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `bbcode_bitfield` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `bbcode_uid` varchar(8) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `post_postcount` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `post_edit_time` int UNSIGNED NOT NULL DEFAULT '0',
  `post_edit_reason` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `post_edit_user` int UNSIGNED NOT NULL DEFAULT '0',
  `post_edit_count` smallint UNSIGNED NOT NULL DEFAULT '0',
  `post_edit_locked` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `post_visibility` tinyint NOT NULL DEFAULT '0',
  `post_delete_time` int UNSIGNED NOT NULL DEFAULT '0',
  `post_delete_reason` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `post_delete_user` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_posts`
--

INSERT INTO `phpbb_posts` (`post_id`, `topic_id`, `forum_id`, `poster_id`, `icon_id`, `poster_ip`, `post_time`, `post_reported`, `enable_bbcode`, `enable_smilies`, `enable_magic_url`, `enable_sig`, `post_username`, `post_subject`, `post_text`, `post_checksum`, `post_attachment`, `bbcode_bitfield`, `bbcode_uid`, `post_postcount`, `post_edit_time`, `post_edit_reason`, `post_edit_user`, `post_edit_count`, `post_edit_locked`, `post_visibility`, `post_delete_time`, `post_delete_reason`, `post_delete_user`) VALUES
(1, 1, 2, 2, 0, '127.0.0.1', 1671407293, 0, 1, 1, 1, 1, '', 'Welcome to phpBB3', '<t>This is an example post in your phpBB3 installation. Everything seems to be working. You may delete this post if you like and continue to set up your board. During the installation process your first category and your first forum are assigned an appropriate set of permissions for the predefined usergroups administrators, bots, global moderators, guests, registered users and registered COPPA users. If you also choose to delete your first category and your first forum, do not forget to assign permissions for all these usergroups for all new categories and forums you create. It is recommended to rename your first category and your first forum and copy permissions from these while creating new categories and forums. Have fun!</t>', '5dd683b17f641daf84c040bfefc58ce9', 0, '', '', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(2, 2, 2, 2, 0, '127.0.0.1', 1671407924, 0, 1, 1, 1, 1, '', 'Demande d\'aide', '<r>bla bla blz  <E>;)</E>  <E>;)</E>  <E>;)</E>  <E>;)</E></r>', '0646ea8a0765e12deb8412a2d0cc232c', 0, '', '1h1xv5m', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(3, 2, 2, 2, 0, '127.0.0.1', 1671407933, 0, 1, 1, 1, 1, '', 'Re: Demande d\'aide', '<r>ccccc <E>;)</E>  <E>;)</E>  <E>;)</E>  <E>;)</E>  <E>;)</E></r>', 'f75bea9fbd2ee3065e26b219239437e9', 0, '', 'ky15', 1, 0, '', 0, 0, 0, 1, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_privmsgs`
--

CREATE TABLE `phpbb_privmsgs` (
  `msg_id` int UNSIGNED NOT NULL,
  `root_level` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `author_id` int UNSIGNED NOT NULL DEFAULT '0',
  `icon_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `author_ip` varchar(40) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `message_time` int UNSIGNED NOT NULL DEFAULT '0',
  `enable_bbcode` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `enable_smilies` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `enable_magic_url` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `enable_sig` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `message_subject` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `message_text` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `message_edit_reason` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `message_edit_user` int UNSIGNED NOT NULL DEFAULT '0',
  `message_attachment` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `bbcode_bitfield` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `bbcode_uid` varchar(8) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `message_edit_time` int UNSIGNED NOT NULL DEFAULT '0',
  `message_edit_count` smallint UNSIGNED NOT NULL DEFAULT '0',
  `to_address` text COLLATE utf8mb3_bin NOT NULL,
  `bcc_address` text COLLATE utf8mb3_bin NOT NULL,
  `message_reported` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_privmsgs_folder`
--

CREATE TABLE `phpbb_privmsgs_folder` (
  `folder_id` mediumint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `folder_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `pm_count` mediumint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_privmsgs_rules`
--

CREATE TABLE `phpbb_privmsgs_rules` (
  `rule_id` mediumint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `rule_check` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `rule_connection` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `rule_string` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `rule_user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `rule_group_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `rule_action` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `rule_folder_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_privmsgs_to`
--

CREATE TABLE `phpbb_privmsgs_to` (
  `msg_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `author_id` int UNSIGNED NOT NULL DEFAULT '0',
  `pm_deleted` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `pm_new` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `pm_unread` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `pm_replied` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `pm_marked` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `pm_forwarded` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `folder_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_profile_fields`
--

CREATE TABLE `phpbb_profile_fields` (
  `field_id` mediumint UNSIGNED NOT NULL,
  `field_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `field_type` varchar(100) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `field_ident` varchar(20) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `field_length` varchar(20) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `field_minlen` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `field_maxlen` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `field_novalue` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `field_default_value` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `field_validation` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `field_required` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `field_show_on_reg` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `field_hide` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `field_no_view` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `field_active` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `field_order` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `field_show_profile` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `field_show_on_vt` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `field_show_novalue` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `field_show_on_pm` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `field_show_on_ml` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `field_is_contact` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `field_contact_desc` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `field_contact_url` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_profile_fields`
--

INSERT INTO `phpbb_profile_fields` (`field_id`, `field_name`, `field_type`, `field_ident`, `field_length`, `field_minlen`, `field_maxlen`, `field_novalue`, `field_default_value`, `field_validation`, `field_required`, `field_show_on_reg`, `field_hide`, `field_no_view`, `field_active`, `field_order`, `field_show_profile`, `field_show_on_vt`, `field_show_novalue`, `field_show_on_pm`, `field_show_on_ml`, `field_is_contact`, `field_contact_desc`, `field_contact_url`) VALUES
(1, 'phpbb_location', 'profilefields.type.string', 'phpbb_location', '20', '2', '100', '', '', '.*', 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, 1, 0, '', ''),
(2, 'phpbb_website', 'profilefields.type.url', 'phpbb_website', '40', '12', '255', '', '', '', 0, 0, 0, 0, 1, 2, 1, 1, 0, 1, 1, 1, 'VISIT_WEBSITE', '%s'),
(3, 'phpbb_interests', 'profilefields.type.text', 'phpbb_interests', '3|30', '2', '500', '', '', '.*', 0, 0, 0, 0, 0, 3, 1, 0, 0, 0, 0, 0, '', ''),
(4, 'phpbb_occupation', 'profilefields.type.text', 'phpbb_occupation', '3|30', '2', '500', '', '', '.*', 0, 0, 0, 0, 0, 4, 1, 0, 0, 0, 0, 0, '', ''),
(5, 'phpbb_icq', 'profilefields.type.string', 'phpbb_icq', '20', '3', '15', '', '', '[0-9]+', 0, 0, 0, 0, 0, 6, 1, 1, 0, 1, 1, 1, 'SEND_ICQ_MESSAGE', 'https://www.icq.com/people/%s/'),
(6, 'phpbb_yahoo', 'profilefields.type.string', 'phpbb_yahoo', '40', '5', '255', '', '', '.*', 0, 0, 0, 0, 0, 8, 1, 1, 0, 1, 1, 1, 'SEND_YIM_MESSAGE', 'ymsgr:sendim?%s'),
(7, 'phpbb_facebook', 'profilefields.type.string', 'phpbb_facebook', '20', '5', '50', '', '', '[\\w.]+', 0, 0, 0, 0, 1, 9, 1, 1, 0, 1, 1, 1, 'VIEW_FACEBOOK_PROFILE', 'http://facebook.com/%s/'),
(8, 'phpbb_twitter', 'profilefields.type.string', 'phpbb_twitter', '20', '1', '15', '', '', '[\\w_]+', 0, 0, 0, 0, 1, 10, 1, 1, 0, 1, 1, 1, 'VIEW_TWITTER_PROFILE', 'http://twitter.com/%s'),
(9, 'phpbb_skype', 'profilefields.type.string', 'phpbb_skype', '20', '6', '32', '', '', '[a-zA-Z][\\w\\.,\\-_]+', 0, 0, 0, 0, 1, 11, 1, 1, 0, 1, 1, 1, 'VIEW_SKYPE_PROFILE', 'skype:%s?userinfo'),
(10, 'phpbb_youtube', 'profilefields.type.string', 'phpbb_youtube', '20', '3', '60', '', '', '[a-zA-Z][\\w\\.,\\-_]+', 0, 0, 0, 0, 1, 12, 1, 1, 0, 1, 1, 1, 'VIEW_YOUTUBE_CHANNEL', 'http://youtube.com/user/%s');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_profile_fields_data`
--

CREATE TABLE `phpbb_profile_fields_data` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `pf_phpbb_interests` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `pf_phpbb_occupation` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `pf_phpbb_location` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `pf_phpbb_skype` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `pf_phpbb_facebook` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `pf_phpbb_icq` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `pf_phpbb_twitter` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `pf_phpbb_website` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `pf_phpbb_youtube` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `pf_phpbb_yahoo` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_profile_fields_lang`
--

CREATE TABLE `phpbb_profile_fields_lang` (
  `field_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `lang_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `option_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `field_type` varchar(100) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `lang_value` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_profile_lang`
--

CREATE TABLE `phpbb_profile_lang` (
  `field_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `lang_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `lang_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `lang_explain` text COLLATE utf8mb3_bin NOT NULL,
  `lang_default_value` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_profile_lang`
--

INSERT INTO `phpbb_profile_lang` (`field_id`, `lang_id`, `lang_name`, `lang_explain`, `lang_default_value`) VALUES
(1, 1, 'LOCATION', '', ''),
(1, 2, 'LOCATION', '', ''),
(2, 1, 'WEBSITE', '', ''),
(2, 2, 'WEBSITE', '', ''),
(3, 1, 'INTERESTS', '', ''),
(3, 2, 'INTERESTS', '', ''),
(4, 1, 'OCCUPATION', '', ''),
(4, 2, 'OCCUPATION', '', ''),
(5, 1, 'ICQ', '', ''),
(5, 2, 'ICQ', '', ''),
(6, 1, 'YAHOO', '', ''),
(6, 2, 'YAHOO', '', ''),
(7, 1, 'FACEBOOK', '', ''),
(7, 2, 'FACEBOOK', '', ''),
(8, 1, 'TWITTER', '', ''),
(8, 2, 'TWITTER', '', ''),
(9, 1, 'SKYPE', '', ''),
(9, 2, 'SKYPE', '', ''),
(10, 1, 'YOUTUBE', '', ''),
(10, 2, 'YOUTUBE', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_ranks`
--

CREATE TABLE `phpbb_ranks` (
  `rank_id` mediumint UNSIGNED NOT NULL,
  `rank_title` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `rank_min` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `rank_special` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `rank_image` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_ranks`
--

INSERT INTO `phpbb_ranks` (`rank_id`, `rank_title`, `rank_min`, `rank_special`, `rank_image`) VALUES
(1, 'Site Admin', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_reports`
--

CREATE TABLE `phpbb_reports` (
  `report_id` int UNSIGNED NOT NULL,
  `reason_id` smallint UNSIGNED NOT NULL DEFAULT '0',
  `post_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_notify` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `report_closed` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `report_time` int UNSIGNED NOT NULL DEFAULT '0',
  `report_text` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `pm_id` int UNSIGNED NOT NULL DEFAULT '0',
  `reported_post_enable_bbcode` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `reported_post_enable_smilies` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `reported_post_enable_magic_url` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `reported_post_text` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `reported_post_uid` varchar(8) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `reported_post_bitfield` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_reports_reasons`
--

CREATE TABLE `phpbb_reports_reasons` (
  `reason_id` smallint UNSIGNED NOT NULL,
  `reason_title` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `reason_description` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `reason_order` smallint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_reports_reasons`
--

INSERT INTO `phpbb_reports_reasons` (`reason_id`, `reason_title`, `reason_description`, `reason_order`) VALUES
(1, 'warez', 'The post contains links to illegal or pirated software.', 1),
(2, 'spam', 'The reported post has the only purpose to advertise for a website or another product.', 2),
(3, 'off_topic', 'The reported post is off topic.', 3),
(4, 'other', 'The reported post does not fit into any other category, please use the further information field.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_search_results`
--

CREATE TABLE `phpbb_search_results` (
  `search_key` varchar(32) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `search_time` int UNSIGNED NOT NULL DEFAULT '0',
  `search_keywords` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `search_authors` mediumtext COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_search_results`
--

INSERT INTO `phpbb_search_results` (`search_key`, `search_time`, `search_keywords`, `search_authors`) VALUES
('1b15e97f87ffb3178ab2bd3a56cdfa49', 1672616027, 'aide', '  ');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_search_wordlist`
--

CREATE TABLE `phpbb_search_wordlist` (
  `word_id` int UNSIGNED NOT NULL,
  `word_text` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `word_common` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `word_count` mediumint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_search_wordlist`
--

INSERT INTO `phpbb_search_wordlist` (`word_id`, `word_text`, `word_common`, `word_count`) VALUES
(1, 'this', 0, 1),
(2, 'is', 0, 1),
(3, 'an', 0, 1),
(4, 'example', 0, 1),
(5, 'post', 0, 1),
(6, 'in', 0, 1),
(7, 'your', 0, 1),
(8, 'phpbb3', 0, 2),
(9, 'installation', 0, 1),
(10, 'everything', 0, 1),
(11, 'seems', 0, 1),
(12, 'to', 0, 2),
(13, 'be', 0, 1),
(14, 'working', 0, 1),
(15, 'you', 0, 1),
(16, 'may', 0, 1),
(17, 'delete', 0, 1),
(18, 'if', 0, 1),
(19, 'like', 0, 1),
(20, 'and', 0, 1),
(21, 'continue', 0, 1),
(22, 'set', 0, 1),
(23, 'up', 0, 1),
(24, 'board', 0, 1),
(25, 'during', 0, 1),
(26, 'the', 0, 1),
(27, 'process', 0, 1),
(28, 'first', 0, 1),
(29, 'category', 0, 1),
(30, 'forum', 0, 1),
(31, 'are', 0, 1),
(32, 'assigned', 0, 1),
(33, 'appropriate', 0, 1),
(34, 'of', 0, 1),
(35, 'permissions', 0, 1),
(36, 'for', 0, 1),
(37, 'predefined', 0, 1),
(38, 'usergroups', 0, 1),
(39, 'administrators', 0, 1),
(40, 'bots', 0, 1),
(41, 'global', 0, 1),
(42, 'moderators', 0, 1),
(43, 'guests', 0, 1),
(44, 'registered', 0, 1),
(45, 'users', 0, 1),
(46, 'coppa', 0, 1),
(47, 'also', 0, 1),
(48, 'choose', 0, 1),
(49, 'do', 0, 1),
(50, 'not', 0, 1),
(51, 'forget', 0, 1),
(52, 'assign', 0, 1),
(53, 'all', 0, 1),
(54, 'these', 0, 1),
(55, 'new', 0, 1),
(56, 'categories', 0, 1),
(57, 'forums', 0, 1),
(58, 'create', 0, 1),
(59, 'it', 0, 1),
(60, 'recommended', 0, 1),
(61, 'rename', 0, 1),
(62, 'copy', 0, 1),
(63, 'from', 0, 1),
(64, 'while', 0, 1),
(65, 'creating', 0, 1),
(66, 'have', 0, 1),
(67, 'fun', 0, 1),
(68, 'welcome', 0, 1),
(69, 'bla', 0, 1),
(70, 'blz', 0, 1),
(71, 'demande', 0, 2),
(72, 'aide', 0, 2),
(73, 'ccccc', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_search_wordmatch`
--

CREATE TABLE `phpbb_search_wordmatch` (
  `post_id` int UNSIGNED NOT NULL DEFAULT '0',
  `word_id` int UNSIGNED NOT NULL DEFAULT '0',
  `title_match` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_search_wordmatch`
--

INSERT INTO `phpbb_search_wordmatch` (`post_id`, `word_id`, `title_match`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(1, 4, 0),
(1, 5, 0),
(1, 6, 0),
(1, 7, 0),
(1, 8, 0),
(1, 8, 1),
(1, 9, 0),
(1, 10, 0),
(1, 11, 0),
(1, 12, 0),
(1, 12, 1),
(1, 13, 0),
(1, 14, 0),
(1, 15, 0),
(1, 16, 0),
(1, 17, 0),
(1, 18, 0),
(1, 19, 0),
(1, 20, 0),
(1, 21, 0),
(1, 22, 0),
(1, 23, 0),
(1, 24, 0),
(1, 25, 0),
(1, 26, 0),
(1, 27, 0),
(1, 28, 0),
(1, 29, 0),
(1, 30, 0),
(1, 31, 0),
(1, 32, 0),
(1, 33, 0),
(1, 34, 0),
(1, 35, 0),
(1, 36, 0),
(1, 37, 0),
(1, 38, 0),
(1, 39, 0),
(1, 40, 0),
(1, 41, 0),
(1, 42, 0),
(1, 43, 0),
(1, 44, 0),
(1, 45, 0),
(1, 46, 0),
(1, 47, 0),
(1, 48, 0),
(1, 49, 0),
(1, 50, 0),
(1, 51, 0),
(1, 52, 0),
(1, 53, 0),
(1, 54, 0),
(1, 55, 0),
(1, 56, 0),
(1, 57, 0),
(1, 58, 0),
(1, 59, 0),
(1, 60, 0),
(1, 61, 0),
(1, 62, 0),
(1, 63, 0),
(1, 64, 0),
(1, 65, 0),
(1, 66, 0),
(1, 67, 0),
(1, 68, 1),
(2, 69, 0),
(2, 70, 0),
(2, 71, 1),
(3, 71, 1),
(2, 72, 1),
(3, 72, 1),
(3, 73, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_sessions`
--

CREATE TABLE `phpbb_sessions` (
  `session_id` char(32) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `session_user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `session_last_visit` int UNSIGNED NOT NULL DEFAULT '0',
  `session_start` int UNSIGNED NOT NULL DEFAULT '0',
  `session_time` int UNSIGNED NOT NULL DEFAULT '0',
  `session_ip` varchar(40) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `session_browser` varchar(150) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `session_forwarded_for` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `session_page` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `session_viewonline` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `session_autologin` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `session_admin` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `session_forum_id` mediumint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_sessions`
--

INSERT INTO `phpbb_sessions` (`session_id`, `session_user_id`, `session_last_visit`, `session_start`, `session_time`, `session_ip`, `session_browser`, `session_forwarded_for`, `session_page`, `session_viewonline`, `session_autologin`, `session_admin`, `session_forum_id`) VALUES
('1352f95a0d648ccf3e8496ec25ae911e', 1, 1674215982, 1674215982, 1674215982, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/109.0.1518.55', '', 'index.php', 1, 0, 0, 0),
('37d2dc10e11af2a6d68b70bab1786656', 1, 1673301546, 1673301546, 1673301546, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.76', '', 'index.php', 1, 0, 0, 0),
('39550cee54153537eb1fc79253928a30', 1, 1673218793, 1673218793, 1673219058, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', '', 'index.php', 1, 0, 0, 0),
('51b5a8b1c8885984ba8f23a86603d817', 1, 1674821363, 1674821363, 1674821363, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/109.0.1518.61', '', 'index.php', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_sessions_keys`
--

CREATE TABLE `phpbb_sessions_keys` (
  `key_id` char(32) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `last_ip` varchar(40) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `last_login` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_sitelist`
--

CREATE TABLE `phpbb_sitelist` (
  `site_id` mediumint UNSIGNED NOT NULL,
  `site_ip` varchar(40) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `site_hostname` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `ip_exclude` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_smilies`
--

CREATE TABLE `phpbb_smilies` (
  `smiley_id` mediumint UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `emotion` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `smiley_url` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `smiley_width` smallint UNSIGNED NOT NULL DEFAULT '0',
  `smiley_height` smallint UNSIGNED NOT NULL DEFAULT '0',
  `smiley_order` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `display_on_posting` tinyint UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_smilies`
--

INSERT INTO `phpbb_smilies` (`smiley_id`, `code`, `emotion`, `smiley_url`, `smiley_width`, `smiley_height`, `smiley_order`, `display_on_posting`) VALUES
(1, ':D', 'Very Happy', 'icon_e_biggrin.gif', 15, 17, 1, 1),
(2, ':-D', 'Very Happy', 'icon_e_biggrin.gif', 15, 17, 2, 1),
(3, ':grin:', 'Very Happy', 'icon_e_biggrin.gif', 15, 17, 3, 1),
(4, ':)', 'Smile', 'icon_e_smile.gif', 15, 17, 4, 1),
(5, ':-)', 'Smile', 'icon_e_smile.gif', 15, 17, 5, 1),
(6, ':smile:', 'Smile', 'icon_e_smile.gif', 15, 17, 6, 1),
(7, ';)', 'Wink', 'icon_e_wink.gif', 15, 17, 7, 1),
(8, ';-)', 'Wink', 'icon_e_wink.gif', 15, 17, 8, 1),
(9, ':wink:', 'Wink', 'icon_e_wink.gif', 15, 17, 9, 1),
(10, ':(', 'Sad', 'icon_e_sad.gif', 15, 17, 10, 1),
(11, ':-(', 'Sad', 'icon_e_sad.gif', 15, 17, 11, 1),
(12, ':sad:', 'Sad', 'icon_e_sad.gif', 15, 17, 12, 1),
(13, ':o', 'Surprised', 'icon_e_surprised.gif', 15, 17, 13, 1),
(14, ':-o', 'Surprised', 'icon_e_surprised.gif', 15, 17, 14, 1),
(15, ':eek:', 'Surprised', 'icon_e_surprised.gif', 15, 17, 15, 1),
(16, ':shock:', 'Shocked', 'icon_eek.gif', 15, 17, 16, 1),
(17, ':?', 'Confused', 'icon_e_confused.gif', 15, 17, 17, 1),
(18, ':-?', 'Confused', 'icon_e_confused.gif', 15, 17, 18, 1),
(19, ':???:', 'Confused', 'icon_e_confused.gif', 15, 17, 19, 1),
(20, '8-)', 'Cool', 'icon_cool.gif', 15, 17, 20, 1),
(21, ':cool:', 'Cool', 'icon_cool.gif', 15, 17, 21, 1),
(22, ':lol:', 'Laughing', 'icon_lol.gif', 15, 17, 22, 1),
(23, ':x', 'Mad', 'icon_mad.gif', 15, 17, 23, 1),
(24, ':-x', 'Mad', 'icon_mad.gif', 15, 17, 24, 1),
(25, ':mad:', 'Mad', 'icon_mad.gif', 15, 17, 25, 1),
(26, ':P', 'Razz', 'icon_razz.gif', 15, 17, 26, 1),
(27, ':-P', 'Razz', 'icon_razz.gif', 15, 17, 27, 1),
(28, ':razz:', 'Razz', 'icon_razz.gif', 15, 17, 28, 1),
(29, ':oops:', 'Embarrassed', 'icon_redface.gif', 15, 17, 29, 1),
(30, ':cry:', 'Crying or Very Sad', 'icon_cry.gif', 15, 17, 30, 1),
(31, ':evil:', 'Evil or Very Mad', 'icon_evil.gif', 15, 17, 31, 1),
(32, ':twisted:', 'Twisted Evil', 'icon_twisted.gif', 15, 17, 32, 1),
(33, ':roll:', 'Rolling Eyes', 'icon_rolleyes.gif', 15, 17, 33, 1),
(34, ':!:', 'Exclamation', 'icon_exclaim.gif', 15, 17, 34, 1),
(35, ':?:', 'Question', 'icon_question.gif', 15, 17, 35, 1),
(36, ':idea:', 'Idea', 'icon_idea.gif', 15, 17, 36, 1),
(37, ':arrow:', 'Arrow', 'icon_arrow.gif', 15, 17, 37, 1),
(38, ':|', 'Neutral', 'icon_neutral.gif', 15, 17, 38, 1),
(39, ':-|', 'Neutral', 'icon_neutral.gif', 15, 17, 39, 1),
(40, ':mrgreen:', 'Mr. Green', 'icon_mrgreen.gif', 15, 17, 40, 1),
(41, ':geek:', 'Geek', 'icon_e_geek.gif', 17, 17, 41, 1),
(42, ':ugeek:', 'Uber Geek', 'icon_e_ugeek.gif', 17, 18, 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_styles`
--

CREATE TABLE `phpbb_styles` (
  `style_id` mediumint UNSIGNED NOT NULL,
  `style_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `style_copyright` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `style_active` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `style_path` varchar(100) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `bbcode_bitfield` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT 'kNg=',
  `style_parent_id` int UNSIGNED NOT NULL DEFAULT '0',
  `style_parent_tree` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_styles`
--

INSERT INTO `phpbb_styles` (`style_id`, `style_name`, `style_copyright`, `style_active`, `style_path`, `bbcode_bitfield`, `style_parent_id`, `style_parent_tree`) VALUES
(1, 'prosilver', '&copy; phpBB Limited', 1, 'prosilver', '//g=', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_teampage`
--

CREATE TABLE `phpbb_teampage` (
  `teampage_id` mediumint UNSIGNED NOT NULL,
  `group_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `teampage_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `teampage_position` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `teampage_parent` mediumint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_teampage`
--

INSERT INTO `phpbb_teampage` (`teampage_id`, `group_id`, `teampage_name`, `teampage_position`, `teampage_parent`) VALUES
(1, 5, '', 1, 0),
(2, 4, '', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_topics`
--

CREATE TABLE `phpbb_topics` (
  `topic_id` int UNSIGNED NOT NULL,
  `forum_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `icon_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `topic_attachment` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `topic_reported` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `topic_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `topic_poster` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_time` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_time_limit` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_views` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `topic_status` tinyint NOT NULL DEFAULT '0',
  `topic_type` tinyint NOT NULL DEFAULT '0',
  `topic_first_post_id` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_first_poster_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `topic_first_poster_colour` varchar(6) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `topic_last_post_id` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_last_poster_id` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_last_poster_name` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `topic_last_poster_colour` varchar(6) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `topic_last_post_subject` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `topic_last_post_time` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_last_view_time` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_moved_id` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_bumped` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `topic_bumper` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `poll_title` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `poll_start` int UNSIGNED NOT NULL DEFAULT '0',
  `poll_length` int UNSIGNED NOT NULL DEFAULT '0',
  `poll_max_options` tinyint NOT NULL DEFAULT '1',
  `poll_last_vote` int UNSIGNED NOT NULL DEFAULT '0',
  `poll_vote_change` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `topic_visibility` tinyint NOT NULL DEFAULT '0',
  `topic_delete_time` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_delete_reason` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `topic_delete_user` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_posts_approved` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `topic_posts_unapproved` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `topic_posts_softdeleted` mediumint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_topics`
--

INSERT INTO `phpbb_topics` (`topic_id`, `forum_id`, `icon_id`, `topic_attachment`, `topic_reported`, `topic_title`, `topic_poster`, `topic_time`, `topic_time_limit`, `topic_views`, `topic_status`, `topic_type`, `topic_first_post_id`, `topic_first_poster_name`, `topic_first_poster_colour`, `topic_last_post_id`, `topic_last_poster_id`, `topic_last_poster_name`, `topic_last_poster_colour`, `topic_last_post_subject`, `topic_last_post_time`, `topic_last_view_time`, `topic_moved_id`, `topic_bumped`, `topic_bumper`, `poll_title`, `poll_start`, `poll_length`, `poll_max_options`, `poll_last_vote`, `poll_vote_change`, `topic_visibility`, `topic_delete_time`, `topic_delete_reason`, `topic_delete_user`, `topic_posts_approved`, `topic_posts_unapproved`, `topic_posts_softdeleted`) VALUES
(1, 2, 0, 0, 0, 'Welcome to phpBB3', 2, 1671407293, 0, 1, 0, 0, 1, 'konrad', 'AA0000', 1, 2, 'konrad', 'AA0000', 'Welcome to phpBB3', 1671407293, 1671547507, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 1, 0, 0),
(2, 2, 0, 0, 0, 'Demande d\'aide', 2, 1671407924, 0, 5, 0, 0, 2, 'konrad', 'AA0000', 3, 2, 'konrad', 'AA0000', 'Re: Demande d\'aide', 1671407933, 1672616006, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_topics_posted`
--

CREATE TABLE `phpbb_topics_posted` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_id` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_posted` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_topics_posted`
--

INSERT INTO `phpbb_topics_posted` (`user_id`, `topic_id`, `topic_posted`) VALUES
(2, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_topics_track`
--

CREATE TABLE `phpbb_topics_track` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `topic_id` int UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `mark_time` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_topics_track`
--

INSERT INTO `phpbb_topics_track` (`user_id`, `topic_id`, `forum_id`, `mark_time`) VALUES
(2, 2, 2, 1671407933);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_topics_watch`
--

CREATE TABLE `phpbb_topics_watch` (
  `topic_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `notify_status` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_users`
--

CREATE TABLE `phpbb_users` (
  `user_id` int UNSIGNED NOT NULL,
  `user_type` tinyint NOT NULL DEFAULT '0',
  `group_id` mediumint UNSIGNED NOT NULL DEFAULT '3',
  `user_permissions` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `user_perm_from` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `user_ip` varchar(40) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_regdate` int UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `username_clean` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_password` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_passchg` int UNSIGNED NOT NULL DEFAULT '0',
  `user_email` varchar(100) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_birthday` varchar(10) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_lastvisit` int UNSIGNED NOT NULL DEFAULT '0',
  `user_lastmark` int UNSIGNED NOT NULL DEFAULT '0',
  `user_lastpost_time` int UNSIGNED NOT NULL DEFAULT '0',
  `user_lastpage` varchar(200) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_last_confirm_key` varchar(10) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_last_search` int UNSIGNED NOT NULL DEFAULT '0',
  `user_warnings` tinyint NOT NULL DEFAULT '0',
  `user_last_warning` int UNSIGNED NOT NULL DEFAULT '0',
  `user_login_attempts` tinyint NOT NULL DEFAULT '0',
  `user_inactive_reason` tinyint NOT NULL DEFAULT '0',
  `user_inactive_time` int UNSIGNED NOT NULL DEFAULT '0',
  `user_posts` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `user_lang` varchar(30) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_timezone` varchar(100) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_dateformat` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT 'd M Y H:i',
  `user_style` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `user_rank` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `user_colour` varchar(6) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_new_privmsg` int NOT NULL DEFAULT '0',
  `user_unread_privmsg` int NOT NULL DEFAULT '0',
  `user_last_privmsg` int UNSIGNED NOT NULL DEFAULT '0',
  `user_message_rules` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `user_full_folder` int NOT NULL DEFAULT '-3',
  `user_emailtime` int UNSIGNED NOT NULL DEFAULT '0',
  `user_topic_show_days` smallint UNSIGNED NOT NULL DEFAULT '0',
  `user_topic_sortby_type` varchar(1) COLLATE utf8mb3_bin NOT NULL DEFAULT 't',
  `user_topic_sortby_dir` varchar(1) COLLATE utf8mb3_bin NOT NULL DEFAULT 'd',
  `user_post_show_days` smallint UNSIGNED NOT NULL DEFAULT '0',
  `user_post_sortby_type` varchar(1) COLLATE utf8mb3_bin NOT NULL DEFAULT 't',
  `user_post_sortby_dir` varchar(1) COLLATE utf8mb3_bin NOT NULL DEFAULT 'a',
  `user_notify` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `user_notify_pm` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `user_notify_type` tinyint NOT NULL DEFAULT '0',
  `user_allow_pm` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `user_allow_viewonline` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `user_allow_viewemail` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `user_allow_massemail` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `user_options` int UNSIGNED NOT NULL DEFAULT '230271',
  `user_avatar` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_avatar_type` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_avatar_width` smallint UNSIGNED NOT NULL DEFAULT '0',
  `user_avatar_height` smallint UNSIGNED NOT NULL DEFAULT '0',
  `user_sig` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `user_sig_bbcode_uid` varchar(8) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_sig_bbcode_bitfield` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_jabber` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_actkey` varchar(32) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `reset_token` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `reset_token_expiration` int UNSIGNED NOT NULL DEFAULT '0',
  `user_newpasswd` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_form_salt` varchar(32) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user_new` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `user_reminded` tinyint NOT NULL DEFAULT '0',
  `user_reminded_time` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_users`
--

INSERT INTO `phpbb_users` (`user_id`, `user_type`, `group_id`, `user_permissions`, `user_perm_from`, `user_ip`, `user_regdate`, `username`, `username_clean`, `user_password`, `user_passchg`, `user_email`, `user_birthday`, `user_lastvisit`, `user_lastmark`, `user_lastpost_time`, `user_lastpage`, `user_last_confirm_key`, `user_last_search`, `user_warnings`, `user_last_warning`, `user_login_attempts`, `user_inactive_reason`, `user_inactive_time`, `user_posts`, `user_lang`, `user_timezone`, `user_dateformat`, `user_style`, `user_rank`, `user_colour`, `user_new_privmsg`, `user_unread_privmsg`, `user_last_privmsg`, `user_message_rules`, `user_full_folder`, `user_emailtime`, `user_topic_show_days`, `user_topic_sortby_type`, `user_topic_sortby_dir`, `user_post_show_days`, `user_post_sortby_type`, `user_post_sortby_dir`, `user_notify`, `user_notify_pm`, `user_notify_type`, `user_allow_pm`, `user_allow_viewonline`, `user_allow_viewemail`, `user_allow_massemail`, `user_options`, `user_avatar`, `user_avatar_type`, `user_avatar_width`, `user_avatar_height`, `user_sig`, `user_sig_bbcode_uid`, `user_sig_bbcode_bitfield`, `user_jabber`, `user_actkey`, `reset_token`, `reset_token_expiration`, `user_newpasswd`, `user_form_salt`, `user_new`, `user_reminded`, `user_reminded_time`) VALUES
(1, 2, 1, '00000000000g13ydmo\nhwby9w000000\nhwby9w000000', 0, '', 1671407293, 'Anonymous', 'anonymous', '', 0, '', '', 0, 0, 0, '', '', 1672616027, 0, 0, 0, 0, 0, 0, 'en', '', 'd M Y H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'h5imngfwls4siitf', 1, 0, 0),
(2, 3, 5, 'zik0zjzik0zjzik0zi\nhwby9w000000\nzik0zjzih7uo', 0, '127.0.0.1', 1671407293, 'konrad', 'konrad', '$argon2id$v=19$m=65536,t=4,p=2$UjRVZUJ6cEM5dGZzMlhuaw$lQunGxt3SAWPKWftj8abjdArg9uYpGjbTC8efBWKY5o', 0, 'vanessa.geoffroid@gmail.com', '', 1671456394, 0, 1671407933, 'adm/index.php?i=1', '', 0, 0, 0, 0, 0, 0, 3, 'en', '', 'D M d, Y g:i a', 1, 1, 'AA0000', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'iijn30vuy2dm5idw', 0, 0, 0),
(3, 2, 6, '', 0, '', 1671407293, 'AdsBot [Google]', 'adsbot [google]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '7n3l9ckaxhrgfzkm', 0, 0, 0),
(4, 2, 6, '', 0, '', 1671407293, 'Ahrefs [Bot]', 'ahrefs [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '7xs90ltsounqiipr', 0, 0, 0),
(5, 2, 6, '', 0, '', 1671407293, 'Alexa [Bot]', 'alexa [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'wnv3fmm4jbl0tpgw', 0, 0, 0),
(6, 2, 6, '', 0, '', 1671407293, 'Alta Vista [Bot]', 'alta vista [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '824uqjag8oe4a9cu', 0, 0, 0),
(7, 2, 6, '', 0, '', 1671407293, 'Amazon [Bot]', 'amazon [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '67qujqdy1z67ppgz', 0, 0, 0),
(8, 2, 6, '', 0, '', 1671407293, 'Ask Jeeves [Bot]', 'ask jeeves [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'mn5s3b9a4qov3irc', 0, 0, 0),
(9, 2, 6, '', 0, '', 1671407293, 'Baidu [Spider]', 'baidu [spider]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '6uisfr9hpi0jq1de', 0, 0, 0),
(10, 2, 6, '', 0, '', 1671407293, 'Bing [Bot]', 'bing [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'gnyb5kh56z3gsjw0', 0, 0, 0),
(11, 2, 6, '', 0, '', 1671407293, 'DuckDuckGo [Bot]', 'duckduckgo [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '4jen1p3atd22gjps', 0, 0, 0),
(12, 2, 6, '', 0, '', 1671407293, 'Exabot [Bot]', 'exabot [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'e2k4mnsewqvoxnwb', 0, 0, 0),
(13, 2, 6, '', 0, '', 1671407293, 'FAST Enterprise [Crawler]', 'fast enterprise [crawler]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'brkv1ju68gphx1jq', 0, 0, 0),
(14, 2, 6, '', 0, '', 1671407293, 'FAST WebCrawler [Crawler]', 'fast webcrawler [crawler]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'av6lo6796brncahd', 0, 0, 0),
(15, 2, 6, '', 0, '', 1671407293, 'Francis [Bot]', 'francis [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'trbadu80jl9jme74', 0, 0, 0),
(16, 2, 6, '', 0, '', 1671407293, 'Gigabot [Bot]', 'gigabot [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'q6uiqondf8n5jbup', 0, 0, 0),
(17, 2, 6, '', 0, '', 1671407293, 'Google Adsense [Bot]', 'google adsense [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'h25kem6lgsnti7jo', 0, 0, 0),
(18, 2, 6, '', 0, '', 1671407293, 'Google Desktop', 'google desktop', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'iiur2vx8h7q9mjmc', 0, 0, 0),
(19, 2, 6, '', 0, '', 1671407293, 'Google Feedfetcher', 'google feedfetcher', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'ugurr0oii3bf81s2', 0, 0, 0),
(20, 2, 6, '', 0, '', 1671407293, 'Google [Bot]', 'google [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'fx6pprpoyakicka8', 0, 0, 0),
(21, 2, 6, '', 0, '', 1671407293, 'Heise IT-Markt [Crawler]', 'heise it-markt [crawler]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'unq1nwyy6typh98w', 0, 0, 0),
(22, 2, 6, '', 0, '', 1671407293, 'Heritrix [Crawler]', 'heritrix [crawler]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'ghkmruz7ltigmyz6', 0, 0, 0),
(23, 2, 6, '', 0, '', 1671407293, 'IBM Research [Bot]', 'ibm research [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'he0psk35qwhdsles', 0, 0, 0),
(24, 2, 6, '', 0, '', 1671407293, 'ICCrawler - ICjobs', 'iccrawler - icjobs', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '1p3nudjbeh9nsorn', 0, 0, 0),
(25, 2, 6, '', 0, '', 1671407293, 'ichiro [Crawler]', 'ichiro [crawler]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'a1r8koum9wxafgeu', 0, 0, 0),
(26, 2, 6, '', 0, '', 1671407293, 'Majestic-12 [Bot]', 'majestic-12 [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '8g0lyt4gpbkb0s68', 0, 0, 0),
(27, 2, 6, '', 0, '', 1671407293, 'Metager [Bot]', 'metager [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'xtg2j9k7w3nit9vi', 0, 0, 0),
(28, 2, 6, '', 0, '', 1671407293, 'MSN NewsBlogs', 'msn newsblogs', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'tc4rkd4ma14k3e6q', 0, 0, 0),
(29, 2, 6, '', 0, '', 1671407293, 'MSN [Bot]', 'msn [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'eex1gu7w7k5dnk2o', 0, 0, 0),
(30, 2, 6, '', 0, '', 1671407293, 'MSNbot Media', 'msnbot media', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '20jg5ntvjcbcomf4', 0, 0, 0),
(31, 2, 6, '', 0, '', 1671407293, 'NG-Search [Bot]', 'ng-search [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'hfpt28ifu4r1a1gv', 0, 0, 0),
(32, 2, 6, '', 0, '', 1671407293, 'Nutch [Bot]', 'nutch [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'g58ibc0mtq2nfwhh', 0, 0, 0),
(33, 2, 6, '', 0, '', 1671407293, 'Nutch/CVS [Bot]', 'nutch/cvs [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'l0kthcap6zr3lgv9', 0, 0, 0),
(34, 2, 6, '', 0, '', 1671407293, 'OmniExplorer [Bot]', 'omniexplorer [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'm1gxyl509j9ifr0q', 0, 0, 0),
(35, 2, 6, '', 0, '', 1671407293, 'Online link [Validator]', 'online link [validator]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'an74tgovdgqlfrgn', 0, 0, 0),
(36, 2, 6, '', 0, '', 1671407293, 'psbot [Picsearch]', 'psbot [picsearch]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'mbn0ftual4akvkxr', 0, 0, 0),
(37, 2, 6, '', 0, '', 1671407293, 'Seekport [Bot]', 'seekport [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'gnhloo5koic200qn', 0, 0, 0),
(38, 2, 6, '', 0, '', 1671407293, 'Semrush [Bot]', 'semrush [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '716rvb54ea1p6l9z', 0, 0, 0),
(39, 2, 6, '', 0, '', 1671407293, 'Sensis [Crawler]', 'sensis [crawler]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '9br0uh7upgslpspm', 0, 0, 0),
(40, 2, 6, '', 0, '', 1671407293, 'SEO Crawler', 'seo crawler', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'gdwb1ucop0jj6ak9', 0, 0, 0),
(41, 2, 6, '', 0, '', 1671407293, 'Seoma [Crawler]', 'seoma [crawler]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'uge9b087b4s7ryzt', 0, 0, 0),
(42, 2, 6, '', 0, '', 1671407293, 'SEOSearch [Crawler]', 'seosearch [crawler]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'xt2z1616v9ywx9r5', 0, 0, 0),
(43, 2, 6, '', 0, '', 1671407293, 'Snappy [Bot]', 'snappy [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'r8bme4al53z43qy4', 0, 0, 0),
(44, 2, 6, '', 0, '', 1671407293, 'Steeler [Crawler]', 'steeler [crawler]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'mty99e39v85dx8d6', 0, 0, 0),
(45, 2, 6, '', 0, '', 1671407293, 'Synoo [Bot]', 'synoo [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'vjsuw3f940di1bsv', 0, 0, 0),
(46, 2, 6, '', 0, '', 1671407293, 'Telekom [Bot]', 'telekom [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'wgr7b17f3wdaqj2s', 0, 0, 0),
(47, 2, 6, '', 0, '', 1671407293, 'TurnitinBot [Bot]', 'turnitinbot [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'omeitw2t77oiq29c', 0, 0, 0),
(48, 2, 6, '', 0, '', 1671407293, 'Voyager [Bot]', 'voyager [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'zyu0ptulvjev4k09', 0, 0, 0),
(49, 2, 6, '', 0, '', 1671407293, 'W3 [Sitesearch]', 'w3 [sitesearch]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'mvbwjjmgci44sbp5', 0, 0, 0),
(50, 2, 6, '', 0, '', 1671407293, 'W3C [Linkcheck]', 'w3c [linkcheck]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'p0bi8334pnggybhe', 0, 0, 0),
(51, 2, 6, '', 0, '', 1671407293, 'W3C [Validator]', 'w3c [validator]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'ubp6ufk2svs63yvo', 0, 0, 0),
(52, 2, 6, '', 0, '', 1671407293, 'WiseNut [Bot]', 'wisenut [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '51rmycabv0z5pwu6', 0, 0, 0),
(53, 2, 6, '', 0, '', 1671407293, 'YaCy [Bot]', 'yacy [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'mmv3vbb9y3hy7i2l', 0, 0, 0),
(54, 2, 6, '', 0, '', 1671407293, 'Yahoo MMCrawler [Bot]', 'yahoo mmcrawler [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '7va1acdz66lxtf8q', 0, 0, 0),
(55, 2, 6, '', 0, '', 1671407293, 'Yahoo Slurp [Bot]', 'yahoo slurp [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'wtx4ngfitardl8hp', 0, 0, 0),
(56, 2, 6, '', 0, '', 1671407293, 'Yahoo [Bot]', 'yahoo [bot]', '', 1671407293, '', '', 0, 1671407293, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', 'gnm50xh7jnzbqtmy', 0, 0, 0),
(57, 2, 6, '', 0, '', 1671407294, 'YahooSeeker [Bot]', 'yahooseeker [bot]', '', 1671407294, '', '', 0, 1671407294, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'en', 'UTC', 'D M d, Y g:i a', 1, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '<t></t>', '', '', '', '', '', 0, '', '1dlsexx0437m2onr', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_user_group`
--

CREATE TABLE `phpbb_user_group` (
  `group_id` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `group_leader` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `user_pending` tinyint UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_user_group`
--

INSERT INTO `phpbb_user_group` (`group_id`, `user_id`, `group_leader`, `user_pending`) VALUES
(1, 1, 0, 0),
(2, 2, 0, 0),
(4, 2, 0, 0),
(5, 2, 1, 0),
(6, 3, 0, 0),
(6, 4, 0, 0),
(6, 5, 0, 0),
(6, 6, 0, 0),
(6, 7, 0, 0),
(6, 8, 0, 0),
(6, 9, 0, 0),
(6, 10, 0, 0),
(6, 11, 0, 0),
(6, 12, 0, 0),
(6, 13, 0, 0),
(6, 14, 0, 0),
(6, 15, 0, 0),
(6, 16, 0, 0),
(6, 17, 0, 0),
(6, 18, 0, 0),
(6, 19, 0, 0),
(6, 20, 0, 0),
(6, 21, 0, 0),
(6, 22, 0, 0),
(6, 23, 0, 0),
(6, 24, 0, 0),
(6, 25, 0, 0),
(6, 26, 0, 0),
(6, 27, 0, 0),
(6, 28, 0, 0),
(6, 29, 0, 0),
(6, 30, 0, 0),
(6, 31, 0, 0),
(6, 32, 0, 0),
(6, 33, 0, 0),
(6, 34, 0, 0),
(6, 35, 0, 0),
(6, 36, 0, 0),
(6, 37, 0, 0),
(6, 38, 0, 0),
(6, 39, 0, 0),
(6, 40, 0, 0),
(6, 41, 0, 0),
(6, 42, 0, 0),
(6, 43, 0, 0),
(6, 44, 0, 0),
(6, 45, 0, 0),
(6, 46, 0, 0),
(6, 47, 0, 0),
(6, 48, 0, 0),
(6, 49, 0, 0),
(6, 50, 0, 0),
(6, 51, 0, 0),
(6, 52, 0, 0),
(6, 53, 0, 0),
(6, 54, 0, 0),
(6, 55, 0, 0),
(6, 56, 0, 0),
(6, 57, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_user_notifications`
--

CREATE TABLE `phpbb_user_notifications` (
  `item_type` varchar(165) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `item_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `method` varchar(165) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `notify` tinyint UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `phpbb_user_notifications`
--

INSERT INTO `phpbb_user_notifications` (`item_type`, `item_id`, `user_id`, `method`, `notify`) VALUES
('notification.type.forum', 0, 2, 'notification.method.board', 1),
('notification.type.forum', 0, 2, 'notification.method.email', 1),
('notification.type.post', 0, 2, 'notification.method.board', 1),
('notification.type.post', 0, 2, 'notification.method.email', 1),
('notification.type.post', 0, 3, 'notification.method.email', 1),
('notification.type.post', 0, 4, 'notification.method.email', 1),
('notification.type.post', 0, 5, 'notification.method.email', 1),
('notification.type.post', 0, 6, 'notification.method.email', 1),
('notification.type.post', 0, 7, 'notification.method.email', 1),
('notification.type.post', 0, 8, 'notification.method.email', 1),
('notification.type.post', 0, 9, 'notification.method.email', 1),
('notification.type.post', 0, 10, 'notification.method.email', 1),
('notification.type.post', 0, 11, 'notification.method.email', 1),
('notification.type.post', 0, 12, 'notification.method.email', 1),
('notification.type.post', 0, 13, 'notification.method.email', 1),
('notification.type.post', 0, 14, 'notification.method.email', 1),
('notification.type.post', 0, 15, 'notification.method.email', 1),
('notification.type.post', 0, 16, 'notification.method.email', 1),
('notification.type.post', 0, 17, 'notification.method.email', 1),
('notification.type.post', 0, 18, 'notification.method.email', 1),
('notification.type.post', 0, 19, 'notification.method.email', 1),
('notification.type.post', 0, 20, 'notification.method.email', 1),
('notification.type.post', 0, 21, 'notification.method.email', 1),
('notification.type.post', 0, 22, 'notification.method.email', 1),
('notification.type.post', 0, 23, 'notification.method.email', 1),
('notification.type.post', 0, 24, 'notification.method.email', 1),
('notification.type.post', 0, 25, 'notification.method.email', 1),
('notification.type.post', 0, 26, 'notification.method.email', 1),
('notification.type.post', 0, 27, 'notification.method.email', 1),
('notification.type.post', 0, 28, 'notification.method.email', 1),
('notification.type.post', 0, 29, 'notification.method.email', 1),
('notification.type.post', 0, 30, 'notification.method.email', 1),
('notification.type.post', 0, 31, 'notification.method.email', 1),
('notification.type.post', 0, 32, 'notification.method.email', 1),
('notification.type.post', 0, 33, 'notification.method.email', 1),
('notification.type.post', 0, 34, 'notification.method.email', 1),
('notification.type.post', 0, 35, 'notification.method.email', 1),
('notification.type.post', 0, 36, 'notification.method.email', 1),
('notification.type.post', 0, 37, 'notification.method.email', 1),
('notification.type.post', 0, 38, 'notification.method.email', 1),
('notification.type.post', 0, 39, 'notification.method.email', 1),
('notification.type.post', 0, 40, 'notification.method.email', 1),
('notification.type.post', 0, 41, 'notification.method.email', 1),
('notification.type.post', 0, 42, 'notification.method.email', 1),
('notification.type.post', 0, 43, 'notification.method.email', 1),
('notification.type.post', 0, 44, 'notification.method.email', 1),
('notification.type.post', 0, 45, 'notification.method.email', 1),
('notification.type.post', 0, 46, 'notification.method.email', 1),
('notification.type.post', 0, 47, 'notification.method.email', 1),
('notification.type.post', 0, 48, 'notification.method.email', 1),
('notification.type.post', 0, 49, 'notification.method.email', 1),
('notification.type.post', 0, 50, 'notification.method.email', 1),
('notification.type.post', 0, 51, 'notification.method.email', 1),
('notification.type.post', 0, 52, 'notification.method.email', 1),
('notification.type.post', 0, 53, 'notification.method.email', 1),
('notification.type.post', 0, 54, 'notification.method.email', 1),
('notification.type.post', 0, 55, 'notification.method.email', 1),
('notification.type.post', 0, 56, 'notification.method.email', 1),
('notification.type.post', 0, 57, 'notification.method.email', 1),
('notification.type.topic', 0, 2, 'notification.method.board', 1),
('notification.type.topic', 0, 2, 'notification.method.email', 1),
('notification.type.topic', 0, 3, 'notification.method.email', 1),
('notification.type.topic', 0, 4, 'notification.method.email', 1),
('notification.type.topic', 0, 5, 'notification.method.email', 1),
('notification.type.topic', 0, 6, 'notification.method.email', 1),
('notification.type.topic', 0, 7, 'notification.method.email', 1),
('notification.type.topic', 0, 8, 'notification.method.email', 1),
('notification.type.topic', 0, 9, 'notification.method.email', 1),
('notification.type.topic', 0, 10, 'notification.method.email', 1),
('notification.type.topic', 0, 11, 'notification.method.email', 1),
('notification.type.topic', 0, 12, 'notification.method.email', 1),
('notification.type.topic', 0, 13, 'notification.method.email', 1),
('notification.type.topic', 0, 14, 'notification.method.email', 1),
('notification.type.topic', 0, 15, 'notification.method.email', 1),
('notification.type.topic', 0, 16, 'notification.method.email', 1),
('notification.type.topic', 0, 17, 'notification.method.email', 1),
('notification.type.topic', 0, 18, 'notification.method.email', 1),
('notification.type.topic', 0, 19, 'notification.method.email', 1),
('notification.type.topic', 0, 20, 'notification.method.email', 1),
('notification.type.topic', 0, 21, 'notification.method.email', 1),
('notification.type.topic', 0, 22, 'notification.method.email', 1),
('notification.type.topic', 0, 23, 'notification.method.email', 1),
('notification.type.topic', 0, 24, 'notification.method.email', 1),
('notification.type.topic', 0, 25, 'notification.method.email', 1),
('notification.type.topic', 0, 26, 'notification.method.email', 1),
('notification.type.topic', 0, 27, 'notification.method.email', 1),
('notification.type.topic', 0, 28, 'notification.method.email', 1),
('notification.type.topic', 0, 29, 'notification.method.email', 1),
('notification.type.topic', 0, 30, 'notification.method.email', 1),
('notification.type.topic', 0, 31, 'notification.method.email', 1),
('notification.type.topic', 0, 32, 'notification.method.email', 1),
('notification.type.topic', 0, 33, 'notification.method.email', 1),
('notification.type.topic', 0, 34, 'notification.method.email', 1),
('notification.type.topic', 0, 35, 'notification.method.email', 1),
('notification.type.topic', 0, 36, 'notification.method.email', 1),
('notification.type.topic', 0, 37, 'notification.method.email', 1),
('notification.type.topic', 0, 38, 'notification.method.email', 1),
('notification.type.topic', 0, 39, 'notification.method.email', 1),
('notification.type.topic', 0, 40, 'notification.method.email', 1),
('notification.type.topic', 0, 41, 'notification.method.email', 1),
('notification.type.topic', 0, 42, 'notification.method.email', 1),
('notification.type.topic', 0, 43, 'notification.method.email', 1),
('notification.type.topic', 0, 44, 'notification.method.email', 1),
('notification.type.topic', 0, 45, 'notification.method.email', 1),
('notification.type.topic', 0, 46, 'notification.method.email', 1),
('notification.type.topic', 0, 47, 'notification.method.email', 1),
('notification.type.topic', 0, 48, 'notification.method.email', 1),
('notification.type.topic', 0, 49, 'notification.method.email', 1),
('notification.type.topic', 0, 50, 'notification.method.email', 1),
('notification.type.topic', 0, 51, 'notification.method.email', 1),
('notification.type.topic', 0, 52, 'notification.method.email', 1),
('notification.type.topic', 0, 53, 'notification.method.email', 1),
('notification.type.topic', 0, 54, 'notification.method.email', 1),
('notification.type.topic', 0, 55, 'notification.method.email', 1),
('notification.type.topic', 0, 56, 'notification.method.email', 1),
('notification.type.topic', 0, 57, 'notification.method.email', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_warnings`
--

CREATE TABLE `phpbb_warnings` (
  `warning_id` mediumint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `post_id` int UNSIGNED NOT NULL DEFAULT '0',
  `log_id` int UNSIGNED NOT NULL DEFAULT '0',
  `warning_time` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_words`
--

CREATE TABLE `phpbb_words` (
  `word_id` int UNSIGNED NOT NULL,
  `word` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `replacement` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_zebra`
--

CREATE TABLE `phpbb_zebra` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `zebra_id` int UNSIGNED NOT NULL DEFAULT '0',
  `friend` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `foe` tinyint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_client` int NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `token` text NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_client`, `pseudo`, `email`, `password`, `ip`, `token`, `date_inscription`) VALUES
(1, 'vanessa', 'vanessa.geoffroid@gmail.com', '$2y$12$T2Tjgzylp2pjyAdqzh3keuTyE53488HYwg3rtmmyP46k2Zy8mKmXy', '127.0.0.1', '1d62c413a75f7f64bfc4821aaba5ad3530e3e54a62ce5670f4e1daff795e4de5e461676928ec26d3d7e6cfef60eaceb76879162d1f441eb06153ea57f362a1ac', '2023-01-07 23:59:01'),
(2, 'konrad', 'vaness.geo@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$bHZoMGdiWFA5SHBzeXVxOQ$buf+Emm3i/3DYNflwRFB9hKlXbPHIAyi1YHycF2Nt40', '127.0.0.1', 'd8c0f95e977d05cdcca3042388f6b1e1395c2710f442fedc438acc6b96c09ba722469b3cdd265b75f8430b823026140542de1635e4241f8448aac53ff9296dbf', '2023-01-08 00:05:33'),
(3, 'geoffroid', 'va@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$dE5wbWM0Nlk0YkRNR211OQ$01GMuVnrSxBHnukoe23Om/KQHpTwWfrgtlSZCP3aM3g', '127.0.0.1', 'e058c8fe609740c2cd8d55e1fffb529950d2efb9bd10a708cc8ba166e150ceaccb92d085ba2c506338370661d6971f3baa3177fb1d58bca438899d22d9773528', '2023-01-08 00:21:15'),
(4, 'gdgdg', 'gegeg@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$QkdKLzNZaldBQm5MalZpMQ$v8PG2flft/47zKlpVfGfyIcL5PlSHOORGHkUDfZ4VfA', '127.0.0.1', '5abb1b6b612e7f580fad5b47dbc630c618b2aa736c21a40d6dd1e95f866f7d0439a79fe8bbaa85d598e6c8ff4edb66224e3ef4f921bed79f1a27d620463b69c7', '2023-01-08 00:22:32'),
(5, 'Konrad', 'hfejhefheuj@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$b0h5dEFSbVU2cmdwdGFISQ$2iorFUQOd6iaivOyGtlRFKpDc5hBNZuo7HYrsCGrN+s', '127.0.0.1', '7f79a869abbccd80ba8ae416d42ca0ba3ee4c2a145c4a4827bc2e46d02cfca1643fbb5b6a55eb4d69552cc5bfb5e76f74c95c41fd2d4ee3199feb1b5baf6c311', '2023-01-08 00:24:06'),
(6, 'VAN', 'vane@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$V1ZJWEE4WEhxNzlHMzRINQ$nfEhewPRWvNxcSGhEM33E7Zm6zN/7gmMxtUR7DFInnI', '127.0.0.1', 'fe158f4aab8b2cd709e1ac7a856a05b5bb9db4731b193f3ad4917c753672d40162d5b2cc442cb45a3cb4195c544513e58841c341ffc31222a4e289c04fb899b4', '2023-01-08 00:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `vaisseau`
--

CREATE TABLE `vaisseau` (
  `id` int NOT NULL,
  `image_vaisseau` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nom_vaisseau` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `constructeur` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `prix_reel` varchar(255) NOT NULL,
  `forces` varchar(1000) NOT NULL,
  `faiblesses` varchar(1000) NOT NULL,
  `equipage` varchar(500) NOT NULL,
  `taille` varchar(255) NOT NULL,
  `poids` varchar(255) NOT NULL,
  `vitesse_max` varchar(255) NOT NULL,
  `capacite` varchar(255) NOT NULL,
  `disponibilite` varchar(255) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `idConstructeur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `vaisseau`
--

INSERT INTO `vaisseau` (`id`, `image_vaisseau`, `nom_vaisseau`, `constructeur`, `prix`, `prix_reel`, `forces`, `faiblesses`, `equipage`, `taille`, `poids`, `vitesse_max`, `capacite`, `disponibilite`, `description`, `categorie`, `idConstructeur`) VALUES
(1, 'vaisseau.jpg', '100i', 'Origin Jumpworks Gmb', '54,60€ seul (taxes comprises, prix constaté en Alpha)', '0', 'Très long rayon d\'action.\r\nUne couchette', 'Seulement 2 SCU de cargo', 'monoplace', 'Petit (15m x 10m x 4m)', '48 tonnes', '1000 m/s', '2 SCU', 'Quelques fois par an seulement.\r\n\r\nDans des packs \"Concierge\"', 'Il s\'agit de la version \"voyage\" de la gamme 100, une série de vaisseaux de démarrage haut de gamme, ayant la particularité d\'avoir de base un système de raffinage de gaz intégré leur conférant un grand rayon d\'action.', 'vaisseau', 11),
(2, 'vaisseau2.jpg', '125a', 'Origin Jumpworks GmbH', '65,52 € / 60.06 € warbond', '', 'Très long rayon d\'action.\r\nUne couchette.', 'Seulement 2 SCU de cargo.\r\nPas assez armé pour un chasseur.', 'Monospace', 'Petit (15m x 10m x 4m)', '48 tonnes', '1150 m/s', '2 SCU', 'Quelques fois par an.', 'Il s\'agit de la version \"combat\" de la gamme 100, une série de vaisseaux de démarrage haut de gamme, ayant la particularité d\'avoir de base un système de raffinage de gaz intégré leur conférant un grand rayon d\'action.\r\n\r\nPar rapport à la version de base, le 125a est doté de deux missiles.', 'vaisseau', 11),
(3, 'vaisseau3.jpg', '135c', 'Origin Jumpworks GmbH', '72 dollars', '', 'Très long rayon d\'action.\r\nUne couchette.\r\n6 SCU de cargo.', 'Peu armé.', 'Monoplace', 'Petit (15m x 10m x 4m)', '48 tonnes', '1095 m/s', '6 SCU', 'Quelques fois par an.\r\n\r\nDans des packs \"Concierge\".', 'Il s\'agit de la version \"transport\" de la gamme 100, une série de vaisseaux de démarrage haut de gamme, ayant la particularité d\'avoir de base un système de raffinage de gaz intégré leur conférant un grand rayon d\'action.\r\n\r\nPar rapport à la version de base, le 135c peut porter 4 SCU supplémentaires.', 'vaisseau', 11),
(4, 'vaisseau4.jpg', '300i', 'Origin Jumpworks GmbH', '60 euros', '', 'Rapide.\r\nElégant.\r\nIntérieur aménagé.\r\n8 SCU de cargo.\r\nArmement correct.', 'Pas de propulseurs VTOL.\r\nPas de possibilité de rentrer avec un caisson.', 'Monospace', 'Petit (27m x 17m x 8m)', '66 tonnes', '1188 m/s', '8 SCU', 'Toujours disponible', 'Il s\'agit de la variante \"voyage\" de la gamme 300, une série de vaisseaux de luxe monoplaces, rapides, et disposant d\'un intérieur aménagé. Comme tous les vaisseaux du constructeur Origin, les 300 se veulent élégants et spacieux.\r\n\r\nLa version 300i est dotée en série de 2 canons taille 3, et d\'un canon taille 2 sur pivot. Il possède également deux missiles taille 2.', 'vaisseau', 11),
(5, 'vaisseau5.jpg', '315p', 'Origin Jumpworks GmbH', '71 euros', '', 'Scanner amélioré.\r\nRapide.\r\nElégant.\r\nIntérieur aménagé.\r\n12 SCU de cargo.\r\nRayon tracteur.', 'Pas de propulseurs VTOL.', 'Monospace', 'Petit (27m x 17m x 8m)', '69 tonnes', '1223 m/s', '12 SCU', 'Toujours disponible', 'Il s\'agit de la variante \"exploration\" de la gamme 300, une série de vaisseaux de luxe monoplaces, rapides, et disposant d\'un intérieur aménagé. Comme tous les vaisseaux du constructeur Origin, les 300 se veulent élégants et spacieux.\r\n\r\nLa version 315p est caractérisée par un scanner amélioré et un rayon tracteur. Il est aussi dotée en série de 2 canons taille 3. Il possède également deux missiles taille 2.', 'vaisseau', 11),
(6, 'vaisseau6.jpg', '325a ', 'Origin Jumpworks GmbH', '76 euros', '', 'Bien armé.\r\nTrès rapide.\r\nElégant.\r\nIntérieur aménagé.\r\n4 SCU de cargo.', 'Pas de propulseurs VTOL.', 'Monospace', 'Petit (27m x 17m x 8m)', '72.5 tonnes', '1235 m/s', '4 SCU', 'Toujours disponible', 'Il s\'agit de la variante \"combat\" de la gamme 300, une série de vaisseaux de luxe monoplaces, rapides, et disposant d\'un intérieur aménagé. Comme tous les vaisseaux du constructeur Origin, les 300 se veulent élégants et spacieux.\r\n\r\nLa version 325a est dotée en série d\'un canon taille 4 et 2 canons taille 3, tous sur pivot. Il possède également quatre missiles taille 3 et quatre missiles taille 2.', 'vaisseau', 11),
(7, 'vaisseau7.jpg', '350r', 'Origin Jumpworks GmbH', '112 euros', '', 'L\'un des vaisseaux les plus rapides.\r\nElégant.\r\nIntérieur aménagé.\r\nArmement correct pour un vaisseau de course.', 'Peu de cargo.\r\nPas de propulseurs VTOL.', 'Monospace', 'Petit (27m x 17m x 8m)', '58 tonnes', '1.347 m/s', '4 SCU', 'Quelques fois par an.\r\n\r\nDans des packs \"Concierge\"', 'Il s\'agit de la variante \"course\" de la gamme 300, une série de vaisseaux de luxe monoplaces, rapides, et disposant d\'un intérieur aménagé. Comme tous les vaisseaux du constructeur Origin, les 300 se veulent élégants et spacieux.\r\n\r\nLa version 350r possède un moteur supplémentaire lui donnant l\'une des plus grandes vitesses du jeu et faisant de lui l\'un des meilleurs vaisseaux de course. En contrepartie, le 350r ne peut emporter que 4 SCU de cargo et son intérieur est moins spacieux.', 'vaisseau', 11),
(8, 'vaisseau8.jpg', '400i', 'Origin Jumpworks GmbH', '273 euros', '', 'Le style Origin.\r\nAménagement intérieur.\r\nBien protégé.\r\nAgile pour sa taille.', 'Peu armé, surtout vers l\'avant.\r\nFaible capacité d\'emport.', 'Le vaisseau est conçu pour 3 personnes.', 'Moyen (60m x 32m x 12.5m)', '430 tonnes', '? m/s', '42 SCU', 'Lancement', 'Il s\'agit d\'un vaisseau d\'exploration de taille moyenne, permettant à un équipage de trois personnes de voyager avec confort sur de longues distances. Le vaisseau est considéré comme un compétiteur du Constellation et du Corsair. Il est moins armé mais plus maniable que ses concurrents.\r\n\r\nLe 400i dispose d\'un garage pour une moto X1, ainsi qu\'une soute pouvant transporter 42 SCU ou un petit véhicule.', 'vaisseau', 11),
(9, 'vaisseau9.png', '600i Explorer', 'Origin Jumpworks GmbH', '427 euros', '', 'Puissance de feu à l\'avant.\r\nDes équipements d\'exploration.\r\nUn véhicule embarqué.\r\nGrand confort pour 5 personnes.\r\nModulaire.\r\nCapacité de vol VTOL.', 'Grosse cible.\r\nDe la place \"perdue\".', 'Le vaisseau est conçu pour 5 membres d\'équipage', 'Grand (91m x 52m x 17m)', '1577 tonnes', '955 m/s', '40 SCU', 'Quelques fois par an.\r\n\r\nDans des packs \"Concierge\".', 'Il s\'agit de la variante d\'exploration de la gamme 600i, une série de vaisseaux luxueux, spacieux et confortables. Pour remplir sa fonction, le 600i est doté de scanners, d\'une sphère holographique et d\'un véhicule d\'exploration.\r\n\r\nCôté armement, le 600i dispose de 3 puissants canons vers l\'avant et de deux tourelles pour couvrir toutes les directions.\r\n\r\nLe 600i Explorer peut être transformé en 600i Touring grâce à sa modularité.', 'vaisseau', 11),
(10, 'vaisseau10.jpg', '600i Touring', 'Origin Jumpworks GmbH', '470 euros', '', 'Puissance de feu à l\'avant.\r\nGrand confort pour 8 personnes.\r\nModulaire.\r\nCapacité de vol VTOL.', 'Grosse cible.', '5 membres d\'équipage + 4 passagers', 'Grand (91m x 52m x 17m)', '1576 tonnes', '955 m/s', '16 SCU', 'Quelques fois par an.\r\n\r\nDans des packs \"Concierge\".', 'Il s\'agit de la variante voyage de la gamme 600i, une série de vaisseaux luxueux, spacieux et confortables. Pour remplir sa fonction, le 600i Touring est doté d\'une salle de jeu et de 4 chambres privatives de luxe.\r\n\r\nCôté armement, le 600i dispose de 3 puissants canons vers l\'avant et de deux tourelles pour couvrir toutes les directions.\r\n\r\nLe 600i Touring peut être transformé en 600i Explorer grâce à sa modularité.', 'vaisseau', 11),
(11, 'vaisseau11.jpg', '85X', 'Origin Jumpworks GmbH', '55 euros', '', 'Biplace.\r\nRapide et maniable.\r\nElégant.\r\nL\'un des plus petits vaisseaux avec un moteur quantique.', 'Fragile.\r\nPas de cargo.\r\nPas d\'utilitaire.\r\nPas de couchettes.', 'Le vaisseau a deux postes de travail', 'Petit (13m x 10m x 2m)', '19 tonnes', '1183 m/s', '0 SCU', 'Quelques fois par an.\r\n\r\nDans des packs \"Concierge\".', 'C\'est un vaisseau initialement conçu pour la course, mais finalement utilisé comme vaisseau parasite du 890 Jump. Très rapide et maniable, il dispose de quelques armes également, ce qui peut en faire un intercepteur léger. C\'est le seul vaisseau parasite doté d\'un moteur quantique.\r\n\r\nIl ne dispose d\'aucun emplacement de stockage ni d\'aucun port utilitaire', 'vaisseau', 11),
(12, 'vaisseau12.jpg', '890 Jump', 'Origin Jumpworks GmbH', '967 euros', '', 'Le plus grand et luxueux des vaisseaux de luxe.\r\nTrès résistant.\r\n480 SCU de cargo.\r\nVaisseau parasite 85X.\r\nSystème de télécommunication.\r\nAménagement intérieur', 'Attire la convoitise des autres joueurs.\r\nPeu armé pour sa taille.\r\nPas de propulseurs VTOL.', '', 'Capital (207m x 74m x 40m)', '4.590 tonnes', '900 m/s', '480 SCU', 'Quelques fois par an, en nombre limité.\r\n\r\nDans des packs \"Concierge\" haut de gamme.', 'Il s\'agit d\'un yacht de luxe destiné à emmener de riches personnes dans des croisières interstellaires. Il est également prisé par les riches personnalités : stars, politiciens, artistes et présidents de méga-corporations, qui voyagent dans ce vaisseau pour le confort et pour leur image.\r\n\r\nLe 890 Jump accueille de série un vaisseau parasite 85X, et peut en accueillir un second. Le vaisseau est très résistant grâce à ses boucliers capitaux et sa coque en graphène, mais est peu armé pour sa taille, avec seulement quatre tourelles canons et quatre tourelles lance-missiles. Il dispose également d\'un système de télécommunication longue portée sécurisé.\r\n\r\nA l\'intérieur, le vaisseau dispose d\'une suite du maître et de quatre chambres pour invités, très confortables, d\'un restaurant, d\'un bar, d\'un spa avec jacuzzi, piscine et sauna, et d\'une cuisine professionnelle. L\'équipage du vaisseau, lui, dispose de sept couchettes plus spartiates, d\'une pièce de vie et d\'une salle de divertissement.', 'vaisseau', 11),
(13, 'appolo.jpg', 'Apollo Medivac', 'Robert Space Industries', '300 euros', '', 'Couvre l\'ensemble du gameplay médical.\r\nModulaire dans son rôle.\r\nDrones de récupération.\r\nRadar performant pour localiser des corps.\r\nCapacité de vol VTOL.', 'Un vaisseau hyper spécialisé.\r\nNe peut pas traiter un grand flux de patients.\r\nPeu armé.', 'Le vaisseau est conçu pour un équipage à deux', 'Moyen (43m x 30m x 10m)', '376 tonnes', '? m/s', '28 SCU', 'Quelques fois par an.\r\n\r\nDans des packs \"Concierge\".', 'Ce vaisseau est spécialisé pour les opérations de secours aux personnes. Il dispose de deux pièces médicales modulaires, pouvant être configurées pour le traitement soit pour le traitement de plusieurs blessés légers soit pour l\'opération d\'un blessé en urgence vitale.\r\n\r\nIl dispose également de drones pouvant récupérer un blessé ou un corps flottant dans l\'espace pour le ramener dans le vaisseau.\r\n\r\nPar rapport à la variante Triage, l\'Apollo Medivac sacrifie de la vitesse pour plus de blindage et de missiles.', 'vaisseau', 12),
(14, 'vaisseau14.jpg', 'Apollo Triage', 'Robert Space Industries', '300 dollars', '', 'Couvre l\'ensemble du gameplay médical\r\nModulaire dans son rôle.\r\nDrones de récupération.\r\nRadar performant pour localiser des corps.\r\nCapacité de vol VTOL.', 'Un vaisseau hyper spécialisé.\r\nNe peut pas traiter un grand flux de patients.\r\nArmement quasi inexistant.', 'Le vaisseau est conçu pour un équipage à deux', 'Moyen (43m x 30m x 10m)', '376 tonnes', '? m/s', '28 SCU', 'Quelques fois par an.\r\n\r\nDans des packs \"Concierge\".', 'Ce vaisseau est spécialisé pour les opérations de secours aux personnes. Il dispose de deux pièces médicales modulaires, pouvant être configurées soit pour le traitement de plusieurs blessés légers soit pour l\'opération d\'un blessé en urgence vitale.\r\n\r\nIl dispose également de drones pouvant récupérer un blessé ou un corps flottant dans l\'espace pour le ramener dans le vaisseau.\r\n\r\nPar rapport à la variante Medivac, l\'Apollo Triage est moins armé et blindé, mais plus rapide.', 'vaisseau', 12),
(15, 'vaisseau15.jpg', 'Ares Inferno', 'Crusader Industries', '240 euros', '', 'Une arme taille 7 sur un chasseur.\r\nDe nombreux missiles.\r\nBien protégé pour sa taille.', 'Arme fixe uniquement.\r\nPas de couchette.\r\nPas de propulseur VTOL.\r\nPas de cargo.', 'Monospace', 'Moyen (27.2m x 30.2m x 5.5m)', '? tonnes', '? m/s', '0 SCU', 'Vente initiale', 'Il s\'agit de la variante canon balistique du Ares, un vaisseau de combat monoplace de taille moyenne produit par Crusader Industrie\r\n\r\nPar rapport à la version Ion, l\'Inferno bénéficie d\'un meilleur blindage contre les armes balistiques pour résister aux défenses anti-aériennes.\r\n\r\nCe chasseur lourd a la particularité de ne posséder qu\'une seule arme fixe, un canon de taille 7 de type Gatling qui délivre un déluge de feu pour stopper une flotte de petits vaisseaux ou perforer la coque de vaisseaux bien plus grands. Le vaisseau n\'a pas d\'intérieur ni de couchette. Les composants sont accessibles depuis l\'extérieur.', 'vaisseau', 6),
(16, 'vaisseau16.jpg', 'Ares Ion', 'Crusader Industries', '240 euros', '', 'Une arme taille 7 sur un chasseur.\r\nDe nombreux missiles.\r\nBien protégé pour sa taille.', 'Arme fixe uniquement.\r\nPas de couchette.\r\nPas de propulseur VTOL.\r\nPas de cargo.', 'Monospace', 'Moyen (27.2m x 30.2m x 5.5m)', '? tonnes', '? m/s', '0 SCU', 'Vente initiale', 'Il s\'agit de la variante canon à énergie du Ares, un vaisseau de combat monoplace de taille moyenne produit par Crusader Industries. Par rapport à la version Inferno, la version Ion est basée sur une arme énergétique plutôt que balistique. Le Ares Ion présente une armure plus légère, mais dispose d\'une centrale énergétique et d\'un refroidisseur supplémentaires.\r\n\r\nCe chasseur lourd a la particularité de ne posséder qu\'une seule arme fixe, mais celle-ci est un impressionnant canon à énergie de taille 7, d\'une grande précision, pouvant faire tomber les boucliers de vaisseaux de grande taille. Le vaisseau n\'a pas d\'intérieur ni de couchette. Les composants sont accessibles depuis l\'extérieur.', 'vaisseau', 6),
(17, 'vaisseau17.jpg', 'Arrow', 'Anvil Aerospace', '98 euros avec un pack de départ ou\r\n82 euros seul (il faut un pack pour pouvoir jouer)\r\n', '', 'Un chasseur agile et maniable.\r\nDifficile à toucher.\r\nBien armé.', 'Faible rayon d\'action.\r\nPas de couchette.\r\nPas de cargo.', 'Monospace', 'Petit (16m x 12m x 4m)', '30 tonnes', '1235 m/s', '0 SCU', 'Toujours disponible, seul ou en pack', 'C\'est un chasseur léger, misant sur sa maniabilité et sa puissance de feu plutôt que sur la résistance. Il dispose de trois points d\'emport d\'armes et de quatre points d\'emport de missiles. Comme les autres chasseurs (gamme Hornet et Hurricane) du constructeur Anvil, l\'Arrow reprend un point d\'emport central avec une tourelle téléopérée.\r\n\r\nC\'est un vaisseau à court rayon d\'action, conçu pour opérer depuis un porte vaisseau.', 'vaisseau', 2),
(18, 'vaisseau18.jpg', 'Aurora CL', 'Roberts Space Industries', '49 euros (il faut un pack pour pouvoir jouer)', '', 'Une couchette pour les longs voyages.\r\nPeut aller dans des endroits très étroits.\r\nN\'attire pas l\'attention des autres joueurs.\r\nUn point d\'emport utilitaire.\r\nRapide en ligne droite.', 'Pas tant de cargo que ça.\r\nPeu armé.', 'Monospace', 'Petit (18m x 8m x 4m)', '25 tonnes', '1093 m/s', '6 SCU', 'Toujours disponible', 'Cet Aurora dispose d\'un point d\'accroche utilitaire de taille double par rapport à tous les autres Auroras. Cela lui permet d\'être équipé d\'une caisse de transport contenant 6 SCU. Il est donc naturellement dédié au transport de marchandises.\r\n\r\nComme tous les Auroras, il dispose d\'une couchette.', 'vaisseau', 12),
(19, 'vaisseau19.jpg', 'Aurora ES', 'Roberts Space Industries', '22 euros seul (il faut un pack pour pouvoir jouer)', '', 'Une couchette pour les longs voyages.\r\nPeut aller dans des endroits très étroits.\r\nN\'attire pas l\'attention des autres joueurs.\r\nUn point d\'emport utilitaire.\r\nRapide en ligne droite.', 'Très peu de cargo.\r\nPeu armé.\r\nPas dans un pack de démarrage.', 'Monospace', 'Petit (18m x 8m x 4m)', '25 tonnes', '1141 m/s', '3 SCU', 'Toujours disponible', 'C\'est le moins cher de la gamme des Aurora. On ne peut que l\'acheter en plus d\'un autre vaisseau car il n\'y a pas de pack de démarrage associé.\r\n\r\nIl a le même potentiel d\'évolution que l\'Aurora MR, mais commence avec des composants de moins bonne qualité.\r\n\r\nOn y retrouve la couchette pour les longs voyages, les quatre points d\'accroche pour des armes de petit calibre et le point d\'emport utilitaire pour transporter du matériel ou des produit à échanger. C\'est un vaisseau qui permet de se déplacer à moindre frais.', 'vaisseau', 12),
(20, 'vaisseau20.jpg', 'Aurora LN\r\n\r\n', 'Roberts Space Industries', '38 euros seul (il faut un pack pour pouvoir jouer)', '', 'Une couchette pour les longs voyages.\r\nPeut aller dans des endroits très étroits.\r\nUn point d\'emport utilitaire.\r\nRapide en ligne droite.', 'Très peu de cargo.\r\nOrienté combat, mais pas trop.', 'Monospace', 'Petit (18m x 8m x 4m)', '25 tonnes', '1209 m/s', '3 SCU', 'Toujours disponible', 'Sans rien sacrifier par rapport à l\'Aurora MR, l\'Aurora LN apporte des canons de taille supérieure et un meilleur emport de missiles. Il est également livré avec de meilleurs composants orientés combat.', 'vaisseau', 12),
(21, 'vaisseau21.jpg', 'Aurora LX', 'Roberts Space Industries', 'Environ 36 euros seul (il faut un pack pour pouvoir jouer)', '', 'Une couchette en cuir pour les longs voyages.\r\nPeut aller dans des endroits très étroits.\r\nN\'attire pas l\'attention des autres joueurs.\r\nUn point d\'emport utilitaire.\r\nRapide en ligne droite.', 'Très peu de cargo.\r\nPeu armé.', 'Monospace', 'Petit (18m x 8m x 4m)', '25 tonnes', '1199 m/s', '3 SCU', 'Quelques fois par an.\r\n\r\nDans des packs \"Concierge\".', 'C\'est la version luxe de la gamme Aurora, doté d\'un intérieur en cuir, et d\'une couchette pour les longs voyages, l\'Aurora permettra de se déplacer à moindre frais dans l\'univers pour réaliser des missions à terre ou en intérieur.\r\n\r\nL\'Aurora LX est équipé par défaut d\'un caisson de transport qui lui permet de faire un peu de commerce. Cette caisse pourra plus tard être remplacé par d\'autres équipements utilitaires. Par rapport aux Auroras de base, il dispose également d\'un point d\'emport missile amélioré.', 'vaisseau', 12),
(22, 'vaisseau22.jpg', 'Aurora MR', 'Roberts Space Industries', '49 euros avec un pack de départ\r\n\r\n27 euros seul (il faut un pack pour pouvoir jouer)', '', 'Une couchette pour les longs voyages.\r\nPeut aller dans des endroits très étroits.\r\nN\'attire pas l\'attention des autres joueurs.\r\nUn point d\'emport utilitaire.\r\nRapide en ligne droite.', 'Très peu de cargo.\r\nPeu armé.', 'Monospace', 'Petit (18m x 8m x 4m)', '25 tonnes', '1212 m/s', '3 SCU', 'Toujours disponible, seul ou en pack', 'C\'est un des deux vaisseaux de départ les moins chers, l\'autre étant le Mustang Alpha. C\'est l\'un des vaisseaux les plus courants dans l\'univers. Moins armé que le Mustang, mais bénéficiant d\'une couchette pour les longs voyages, l\'Aurora permettra de se déplacer à moindre frais dans l\'univers pour réaliser des missions à terre ou en intérieur.\r\n\r\nL\'Aurora MR est équipé par défaut d\'un caisson de transport qui lui permet de faire un peu de commerce. Cette caisse pourra plus tard être remplacé par d\'autres équipements utilitaires.', 'vaisseau', 12),
(23, 'vaisseau23.jpg', 'Avenger Stalker', 'Aegis Dynamics', '82 euros avec un pack de départ\r\n\r\n65 euros seul (il faut un pack pour pouvoir jouer)', '', 'Très manœuvrable\r\nBonne vitesse.\r\nBonne visibilité.\r\nUne couchette pour les longs trajets.\r\nDe bons points d\'équipement.\r\n6 Cellules pour prisonniers.', 'Pas de propulseurs VTOL.\r\nFaible rayon d\'action.\r\nPas de cargo.', 'C\'est un vaisseau monoplace, avec une seule couchette', 'Petit (22.5m x 16.5m x 23.5m)', '50 tonnes', '1310 m/s', '0-8 SCU', 'Toujours disponible, seul ou en pack', 'Il s\'agit de la version \"chasseur de primes\" de la gamme Avenger, une série de chasseurs légers dotés d\'un espace intérieur modulaire et interchangeable. L\'Avenger Stalker est équipé par défaut de six cellules de détention. Le module peut être remplacé par un générateur à impulsions électromagnétiques (Par défaut sur le Warlock) ou retiré pour contenir du cargo (par défaut sur le Titan).\r\n\r\nPour sa fonction chasseur de primes, il est équipé de canons à distorsion qui neutralisent les vaisseaux sans les faire exploser. Sa vitesse et sa manœuvrabilité combinées à ses puissants canons et à ses missiles pourraient le désigner comme un chasseur léger à part entière.', 'vaisseau', 1),
(24, 'vaisseau24.jpg', 'Avenger Titan', 'Aegis Dynamics', '60 dollars', '', 'Très manœuvrable.\r\nBonne vitesse.\r\nBonne visibilité.\r\nUne couchette pour les longs trajets.\r\nCapacité d\'emport d\'un petit véhicule.\r\nDe bons points d\'équipement.', 'Pas de propulseurs VTOL.\r\nFaible rayon d\'action.', 'Monospace avec une seule couchette', 'Petit (22.5m x 16.5m x 5.5m)\r\n\r\n', '50 tonnes', '1115 m/s', '8 SCU', 'Toujours disponible', 'Il s\'agit de la version \"courrier\" de la gamme Avenger, une série de chasseurs légers dotés d\'un espace intérieur modulaire et interchangeable. L\'Avenger Titan est équipé par défaut de plaques de cargo permettant de transporter 8 SCU. Le module peut être remplacé par des cellules de détention (par défaut sur le Stalker) ou par un générateur à impulsions électromagnétiques (Par défaut sur le Warlock).\r\n\r\nC\'est surtout un appareil qui est considéré par beaucoup comme le parfait vaisseau de départ. C\'est un vaisseau taillé comme un avion pour le vol en atmosphère. Sa vitesse et sa manœuvrabilité combinées à ses puissants canons et à ses missiles pourraient le désigner comme véritable chasseur léger.\r\n\r\nDe plus, grâce à sa rampe arrière, il peut embarquer un petit buggy ou une moto volante.', 'vaisseau', 1),
(25, 'vaisseau25.jpg', 'Avenger Titan Renegade', 'Aegis Dynamics', '90 dollars seul', '', 'Très manœuvrable.\r\nBonne vitesse.\r\nBonne visibilité.\r\nUne couchette pour les longs trajets.', 'Pas de propulseurs VTOL.\r\nFaible rayon d\'action.', 'Monoplace', 'Petit (22.5m x 16.5m x 5.5m)', '50 tonnes', '1310 m/s', '8 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Il s\'agit d\'une édition spéciale de l\'Avenger Titan, la version \"courrier\" de la gamme Avenger. Par rapport au Titan de base, le Renegade propose une configuration de série avec des canons balistiques sous les ailes, des missiles plus variés et une livrée bleue et jaune\r\n\r\nLa gamme Avenger est une série de chasseurs légers dotés d\'un espace intérieur modulaire et interchangeable. L\'Avenger Titan est équipé par défaut de plaques de cargo permettant de transporter 8 SCU. Le module peut être remplacé par des cellules de détention (par défaut sur le Stalker) ou par un générateur à impulsions électromagnétiques (Par défaut sur le Warlock).\r\n\r\nC\'est un vaisseau taillé comme un avion pour le vol en atmosphère. Sa vitesse et sa manœuvrabilité combinées à ses puissants canons et à ses missiles pourraient le désigner comme véritable chasseur léger.', 'vaisseau', 1),
(26, 'vaisseau26.jpg', 'Avenger Warlock', 'Aegis Dynamics', '102 dollars seul ', '', 'Très manœuvrable.\r\nBonne vitesse.\r\nBonne visibilité.\r\nUne couchette pour les longs trajets.\r\nDe bons points d\'équipement.\r\nUn générateur à impulsions électromagnétiques.', 'Pas de propulseurs VTOL.\r\nFaible rayon d\'action.\r\nPas de cargo.', 'Monoplace', 'Petit (22.5m x 16.5m x 23.5m)', '50 tonnes', '1305 m/s', '0-8 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Il s\'agit de la version \"Interdiction\" de la gamme Avenger, une série de chasseurs légers dotés d\'un espace intérieur modulaire et interchangeable. Le Warlock est équipé par défaut d\'un générateur à impulsion électromagnétique (Warlock). Ce générateur est long à charger, mais permet de désactiver tous les appareils électroniques à sa portée, rendant ainsi la plupart des vaisseaux inoffensifs pour quelques secondes.\r\n\r\nLe module peut être remplacé par des cellules de détention (par défaut sur le Stalker) ou retiré pour contenir du cargo (par défaut sur le Titan).\r\n\r\nL\'Avenger Warlock, rapide et maniable, est doté de 3 canons et de missiles, ce qui fait de lui un chasseur léger complet.', 'vaisseau', 1),
(27, 'vaisseau27.jpg', 'Ballista', 'Anvil Aerospace', '131 euros seul', '', 'Puissance de feu.\r\nDifficile à détecter.\r\nEfficace avec une seule personne.', 'Doit être immobile pour tirer.\r\nLent.', '2, un pilote et un tireur', 'Véhicule (17m x 7m x 5.5m)', '? tonnes', '? m/s', '0 SCU', 'Disponible pour sa sortie', 'Il s\'agit d\'un véhicule terrestre à huit roues motrices (8x8) anti-aérien, armé de deux puissants missiles taille 7 et huit missiles taille 5; ainsi que d\'une tourelle avec deux canons taille 2.\r\n\r\nServi par un pilote et un tireur, c\'est un engin servant à interdire l\'espace aérien et à défendre des objectifs au sol.\r\n\r\nC\'est un véhicule particulièrement lent et peu maniable, qui devra donc être transporté au plus près de sa zone d\'opération.', 'vehicule', 2),
(28, 'vaisseau28.jpg', 'Blade (Esperia)', 'Esperia Incorporation', '342 dollars seul', '', 'Bonne puissance de feu.\r\nTrès manœuvrable.\r\nTrès rapide.', 'Faible rayon d\'action.\r\nFaible bouclier.\r\nPas de cargo.\r\nPas de couchette.\r\nPas de propulseurs VTOL.', 'Monoplace', 'Petit (15.5m x 20m x 4.5m)', '26 tonnes', '1240 m/s', '0 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Il s\'agit de la copie par le constructeur Esperia d\'un chasseur léger Vanduul. C\'est un vaisseau conçu pour opérer depuis un porte-vaisseaux du fait de son court rayon d\'action. Chez les Vanduul, c\'est l\'un des vaisseaux les plus courants et il sert d\'éclaireur, d\'avant-garde, et pour mener des raids.\r\n\r\nMieux armé que les chasseur légers humains, il est cependant limité à des canons fixes et ne dispose que d\'un seul bouclier.', 'vaisseau', 8),
(29, 'vaisseau29.jpg', 'Buccaneer', 'Drake Interplanetary', '132 dollars seul ', '', 'Bien armé pour sa taille.\r\nTrès rapide.\r\nManiable.', 'Fragile.\r\nPas de siège éjectable.\r\nCourt rayon d\'action.\r\nPas de couchette.\r\nPas de cargo.', 'Monoplace', 'Petit (15m x 16m x 4.6m)', '40 tonnes', '1315 m/s', '0 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Il s\'agit d\'un intercepteur tout en rapidité et puissance de feu. Comme tous les vaisseaux de Drake, le Buccaneer est focalisé sur sa tâche. Il n\'y a pas grand chose de plus qu\'un cockpit, 5 canons dont un gros calibre sur le dessus et deux moteurs.C\'est donc l\'un des vaisseaux de combat les plus fragiles, qui en plus ne dispose pas de siège éjectable. Seuls les plus téméraires ou talentueux pilotent les Buccaneers.', 'vaisseau', 7),
(30, 'vaisseau30.jpg', 'C8 Pisces', 'Anvil Aerospace', 'Livré avec le Carrack', '', 'Trois passagers.\r\nUn peu de cargo.\r\nMoteur quantique.', 'Faiblement protégé.\r\nPeu armé.\r\nPas de module de saut.\r\nPas de couchette.', 'Le vaisseau dispose de 3 places.', 'Petit (12m x 10.3m x 3.3m)', '? tonnes', '1150 m/s', '4 SCU', 'Livré avec le Carrack', 'Il s\'agit du vaisseau parasite du Carrack, capable de transporter trois personnes et 4 unités (SCU) de cargo. Il est faiblement armé et protégé, mais dispose d\'un moteur quantique.', 'vaisseau', 2),
(31, 'vaisseau31.jpg', 'C8X Pisces Expedition\r\n\r\n', 'Anvil Aerospace', '49 euros seul ', '', 'Trois passagers.\r\nUn peu de cargo.\r\nMoteur quantique.', 'Faiblement protégé.\r\nPeu armé.\r\nPas de module de saut.\r\nPas de couchette.', 'Le vaisseau dispose de 3 places.', 'Petit (12m x 10.3m x 3.3m)', '? tonnes', '1150 m/s', '4 SCU', 'Vente initiale', 'Il s\'agit d\'une variante du C8 Pisces, le vaisseau parasite du Carrack, qui fait du C8X Pisces un vaisseau de départ à part entière. Par rapport au C8, le C8X dispose d\'une livrée différente et de deux canons supplémentaires. Il conserve le moteur quantique, les trois places et les 4 unités SCU de cargo du C8.', 'vaisseau', 2),
(32, 'vaisseau32.jpg', 'Carrack', 'Anvil Aerospace', '546 €', '', 'Très long rayon d\'action.\r\nBons radar et scanner.\r\nConfort pour 6 personnes.\r\nVéhicule, vaisseau et drones d\'exploration.\r\nConteneurs modulaires.\r\n456 SCU de cargo.\r\nCapacité de vol VTOL.', 'Peu armé.\r\nPlutôt lent.', 'Le vaisseau est conçu pour 6 membres d\'équipage', 'Grand (126.5m x 76.5m x 30m)', '4.397 tonnes', '1236 m/s', '456 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Il s\'agit du plus grand vaisseau dédié à l\'exploration connu à ce jour, conçu pour aller dans l\'inconnu et cartographier les points de saut. Il est doté d\'une infirmerie, de drones et d\'un vaisseau parasite d\'exploration, il peut accueillir un véhicule terrestre et dispose de tout le confort nécessaire pour que son équipage de 6 personnes puisse vivre lors de longues expéditions.\r\n\r\nPlutôt résistant pour pouvoir affronter des conditions difficiles, il dispose de quelques tourelles pour assurer sa protection.', 'vaisseau', 2),
(33, 'vaisseau33.png', 'Caterpillar', 'Drake Interplanetary', '354 dollars seul ', '', 'Hautement modulaire.\r\n576 unités de cargo.\r\nCouchettes pour 4 personnes.', 'Peu manoeuvrable.\r\nPeu armé.\r\nVue du pilote obstruée sur la droite.', 'Le vaisseau dispose de 4 lits', 'Grand (111.5m x 39m x 13.5m)', '1.608 tonnes', '890 m/s', '576 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Il s\'agit d\'un vaisseau de transport hautement modulaire, conçu pour être adapté à plusieurs types de missions. Pour ce faire, il est conçu sous la forme de tronçons qui pourront à terme être configurés indépendamment pour remplir certaines fonctions : transport, médical, habitation...\r\n\r\nLe Caterpillar est protégé par deux tourelles qui lui offrent une couverture dans toutes les directions. Il dispose également d\'une cabine détachable pouvant servir de vaisseau de secours.', 'vaisseau', 7),
(34, 'vaisseau34.jpg', 'Constellation Andromeda', 'Robert Space Industries', '300 euros avec un pack de départ\r\n\r\n245 euros seul ', '', 'Forte puissance de feu vers l\'avant.\r\nDeux tourelles pour ne laisser aucun angle mort.\r\nBeaucoup de missiles.\r\nCapacité à transporter la plupart des véhicules.\r\nUne capacité d\'emport de 96 unités de cargo.\r\nUn vaisseau parasite P-52 Merlin.\r\n4 couchettes pour les longs trajets.', 'Peu manœuvrable.\r\nFaible visibilité pour le pilote.\r\nFragile pour sa taille.\r\nVaisseau parasite pas encore implémenté.', 'Quatre lits.\r\n\r\nUn tireur dans chaque tourelle.\r\n\r\nUn pilote dans le vaisseau parasite.', 'Grand (61m x 26m x 14m)', '419 tonnes', '910 m/s', '96 SCU', 'Toujours disponible, seul ou en pack', 'Avec ses quatre canons de gros calibres pointés vers l\'avant, ses dizaines de missiles et ses deux tourelles armées chacune de deux canons anti-chasseurs, le Constellation Andromeda est une véritable canonnière. Mais ce n\'est pas tout, ce vaisseau de 60 mètres de long abrite un vaisseau parasite qui pourra harceler l\'adversaire ou le poursuivre.\r\n\r\nCe vaisseau peut également transporter un véhicule terrestre comme un Ursa Rover, un Tumbril Cyclone ou un Greycat Buggy.', 'vaisseau', 12),
(35, 'vaisseau35.jpg', 'Constellation Aquila\r\n\r\n', 'Robert Space Industries', '338 euros seul (il faut un pack pour pouvoir jouer)\r\n(taxes comprises, prix constaté en Alpha)', '', 'Forte puissance de feu vers l\'avant.\r\nDes équipements (scanner et radar) pour l\'exploration.\r\nBeaucoup de missiles.\r\nVéhicule terrestre Ursa Rover.\r\nVaisseau parasite P52 Merlin.\r\nUne capacité d\'emport de 96 unités de cargo.\r\n4 couchettes pour les longs trajets.', 'Peu manœuvrable.\r\nFaible visibilité pour le pilote.\r\nFragile pour sa taille.\r\nVaisseau parasite pas encore implémenté.\r\nFaible visibilité pour la tourelle inférieure.\r\nAbsence de tourelle pour couvrir l\'arrière et le dessus.', 'Quatre lits.\r\n\r\nUn tireur dans chaque tourelle.\r\n\r\nUn pilote dans le vaisseau parasite.', 'Grand (61m x 26m x 14m)', '439 tonnes', '987 m/s', '96 SCU', 'Toujours disponible seul', 'Cette variante de la série Constellation est optimisée pour l\'exploration. La tourelle supérieure est équipée de senseurs longue portée, et le vaisseau est livré avec un véhicule terrestre de type Ursa Rover pour mener des expéditions terrestres.\r\n\r\nMême avec une tourelle de combat en moins que le Constellation Andromeda, l\'Aquila reste un puissant vaisseau de combat avec ses quatre canons de gros calibre à l\'avant, ses nombreux missiles, et son vaisseau parasite P-52 Merlin.', 'vaisseau', 12),
(36, 'vaisseau36.jpg', 'Constellation Phoenix\r\n\r\n', 'Robert Space Industries', '420 dollars seul (il faut un pack pour pouvoir jouer)', '', 'Du confort pour 4 passagers.\r\nBien armé.\r\nUn véhicule terrestre de luxe.\r\nUn vaisseau parasite P-72 Archimedes.\r\nCapacité de vol VTOL.', 'Peu manœuvrable.\r\nFaible visibilité pour le pilote.\r\nFragile pour sa taille.', '	\r\nHuit lits.\r\n\r\nUn tireur dans chaque tourelle.\r\n\r\nUn pilote dans le vaisseau parasite.', 'Grand (61m x 26m x 14m)', '274 tonnes', '910 m/s', '80 SCU', 'Quelques fois par an seul, en nombre limité.\r\n\r\nDans des packs \"Concierge\" haut de gamme.', 'C\'est la version luxe de la gamme Constellation. Avec sa livrée blanche, ses fenêtres pour apprécier les paysages et l\'espace, ses chambres individuelles confortables et sa pièce de vie spacieuse, le Constellation Phoenix est un vaisseau conçu pour le tourisme ou le transport de VIP. Il dispose d\'un véhicule terrestre de luxe Lynx (pas encore disponible) et d\'un vaisseau parasite taillé pour la course, le P-72 Archimedes.\r\n\r\nAvec ses quatre canons de gros calibres pointés vers l\'avant, ses dizaines de missiles et ses deux tourelles armées chacune de deux canons anti-chasseurs, le Constellation Phoenix transporte ses passagers en toute sécurité.', 'vaisseau', 12),
(37, 'vaisseau37.jpg', 'Constellation Taurus\r\n\r\n', 'Robert Space Industries', '164 euros seul (taxes comprises, prix constaté en Alpha)', '', 'Forte puissance de feu vers l\'avant.\r\nCapacité à transporter la plupart des véhicules.\r\nUne bonne capacité d\'emport.', 'Peu manœuvrable.\r\nFaible visibilité pour le pilote.\r\nFragile pour sa taille.', 'Le vaisseau dispose de 4 lits.', '164 euros seul (taxes comprises, prix constaté en Alpha)', '416 tonnes', '? m/s', '? SCU', 'Toujours disponible, seul', 'C\'est la version transport de la gamme Constellation. Il sacrifie le vaisseau parasite et une tourelle pour plus de cargo.\r\n\r\nIl conserve les quatre canons de gros calibres pointés vers l\'avant. Ce vaisseau peut également transporter un véhicule terrestre comme un Ursa Rover, un Tumbril Cyclone ou un Greycat Buggy.', 'vaisseau', 12),
(38, 'vaisseau38.jpg', 'Corsair', 'Drake Interplanetary', '212 euros seul (taxes comprises, prix constaté en Alpha)', '', 'Grande puissance de feu vers l\'avant.\r\nIntérieur sur un seul niveau.\r\nCompact et fonctionnel.\r\nSoute à cargo de 72 SCU et/ou un véhicule.\r\nRampe d\'accès arrière.\r\nDesign asymétrique original.', 'Peu armé dans les autres directions que l\'avant.\r\nPlutôt fragile pour sa taille.\r\nDes grandes ailes peu utiles.\r\nPas de propulseurs VTOL.', 'Le vaisseau est conçu pour 4 personnes', 'Moyen (55m x 27m x 31m)', '? tonnes', '? m/s', '72 SCU', 'Pendant sa vente concept', 'Même s\'il se présente comme un vaisseau d\'exploration, le Corsair est tout autant une canonnière du fait de son impressionnante puissance de feu vers l\'avant : il dispose de quatre canons taille 4 et deux canons taille 3, tous sur pivots, de quatre points d\'emport missile et de deux tourelles habitées armées de deux canons taille 2. L\'arrière est très peu défendu, avec une seule tourelle téléopérée de petit calibre.\r\n\r\nL\'intérieur est fonctionnel et pratique, sans fioritures, comme pour tous les vaisseaux de Drake. On notera un cockpit avec un siège copilote sous le siège pilote pour les manœuvres d\'atterrissage, quatre cabines individuelles pour un peu d\'intimité dans les longs voyages, une salle des composants bien organisée pour faciliter la maintenance, et une soute à cargo pouvant contenir 72 SCU, ou un peu moins en mettant un véhicule (jusqu\'à un Ursa ou équivalent, non livré avec)', 'vaisseau', 7),
(39, 'vaisseau39.png', 'Crucible', 'Anvil Aerospace', '420 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Meilleur vaisseau de réparation.\r\nConteneur détachable.\r\nCabine de pilotage rotative.\r\nCapacité de vol VTOL.', 'Peu armé.\r\nHyperspécialisé.', 'Le vaisseau est prévu pour 8 membres d\'équipage', 'Grand (90m x 50m x 20m)', '3.650 tonnes', '? m/s', '230 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Il s\'agit du plus gros vaisseau de réparation connu à ce jour, capable de réparer ou de modifier la configuration d\'un autre vaisseau. Il peut travailler sur un chasseur garé à l\'intérieur d\'un conteneur détachable pressurisé, ou travailler directement sur un gros vaisseau à l\'aide de ses bras articulés.\r\n\r\nLe Crucible est reconnaissable à sa cabine de pilotage rotative de forme circulaire, qui permet d\'un côté de contrôler la course du vaisseau et de l\'autre les activités de réparation.', 'vaisseau', 2),
(40, 'vaisseau40.jpg', 'Cutlass Black\r\n\r\n', 'Drake Interplanetary', '120 dollars (taxes comprises, prix constaté en Alpha)', '', 'Le plus économique des vaisseaux multijoueurs.\r\nBien armé.\r\nUne soute très pratique.\r\n46 SCU de cargo.\r\nManiable pour sa taille.\r\nUn rayon tracteur.', 'Fragil.\r\nNécessite un tireur en tourelle pour frapper fort.\r\nPas de toilettes.', 'Un pilote et un tireur dans la tourelle.', 'Moyen (29m x 26.5m x 10m)', '227 tonnes', '1115 m/s', '46 SCU', 'Toujours disponible, seul ou en pack', 'Le Cutlass Black est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nAvec Drake Interplanetary, on ne s’embarrasse pas de fioritures et de décorations. Dans le Cutlass Black, tout à été pensé pour donner le maximum d\'utilité à cet hybride de chasseur et de transporteur de taille moyenne.\r\n\r\nLe Cutlass Black est un cogneur en papier mâché. En effet, il possède 4 canons de taille moyenne pointés vers l\'avant, et une tourelle fortement armée pour compléter cette force de frappe. Mais son blindage et léger et il ne possède qu\'un seul générateur de bouclier.', 'vaisseau', 7),
(41, 'vaisseau41.jpg', 'Cutlass Blue\r\n\r\n', 'Drake Interplanetary', '180 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Bien armé.\r\nCellules de détention.\r\nManiable pour sa taille.\r\nUn rayon tracteur.\r\n25 SCU de cargo.', 'Nécessite un tireur en tourelle pour frapper fort.\r\nPas de toilettes.\r\nPas de propulseurs VTOL.', 'Un pilote et un opérateur tourelle', 'Moyen (29m x 26.5m x 10m)', '227 tonnes', '? m/s', '25 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Cutlass Blue est l\'un des vaisseaux qui pourra être joué Star Citizen.\r\n\r\nIl s\'agit de la variante \"milicienne\" de la gamme Cutlass, une série de vaisseaux qui ne s’embarrasse pas de fioritures et de décorations, où tout est utile et fonctionnel.\r\n\r\nLe Cutlass Blue possède 4 canons et de nombreux missiles pour le pilote, une puissante tourelle, et des cellules de détention dans la soute pour pouvoir transporter des prisonniers.', 'vaisseau', 7),
(42, 'vaisseau42.jpg', 'Cutlass Red', 'Drake Interplanetary', '131 euros seul (taxes comprises, prix constaté en Alpha)', '', 'Le plus économique des vaisseaux médicaux.\r\n2 lits médicaux.\r\nRadar longue portée.\r\nCouchettes pour 4 personnes.\r\nBien armé pour son rôle.', 'Fragile.\r\nNe peut pas traiter les blessures graves.', 'Le vaisseau est conçu pour deux personnes', 'Moyen (36m x 26m x 10m)', '227 tonnes', '? m/s', '12 SCU', 'Toujours disponible, seul', 'Le Cutlass Red est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit de la variante \"ambulance\" de la gamme Cutlass, une série de vaisseaux qui ne s’embarrasse pas de fioritures et de décorations, où tout est utile et fonctionnel.\r\n\r\nLe Cutlass Red dispose de 2 lits médicaux pour pouvoir prendre en charge des blessés légers ou stabiliser des blessés graves le temps de leur transfert dans un hôpital. Il est également équipé d\'un radar pour détecter les personnes flottantes dans l\'espace.', 'vaisseau', 7),
(43, 'vaisseau43.jpg', 'Cyclone', 'Tumbril Land Systems', '60 euros seul (taxes comprises, prix constaté en Alpha)', '', 'Rapide.\r\nDeux personnes.\r\n1 SCU de cargo.', 'Non armé.', 'Le véhicules possède deux places', 'Véhicule (6m x 4m x 3m)', '3 tonnes', '? m/s', '1 SCU', 'Toujours disponible', 'Le Cyclone est l\'un des véhicules disponibles de Star Citizen.\r\n\r\nIl s’agit de la variante « transport » de la gamme Cyclone, une série de véhicules roulants à l’allure de buggy, rapides et tout-terrains. Cette version dispose à l’arrière d’un coffre à cargo accessible via une rampe rétractable. Cette soute permet de stocker et transporter 1 SCU de cargo.\r\n\r\nLe Cyclone dispose de deux sièges à l’avant, dont celui du pilote.', 'vehicule', 0),
(44, 'vaisseau44.jpg', 'Cyclone AA', 'Tumbril Land Systems', '96 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Rapide.\r\nMissiles.\r\nGénérateur d\'impulsions électromagnétiques.\r\nSystème de contre-meures.\r\nDeux personnes.', 'Hyper spécialisé.\r\nPas de cargo.', 'Le véhicules possède deux places', 'Véhicule (6m x 4m x 3m)', '3 tonnes', '? m/s', '0 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Cyclone AA est l\'un des véhicules disponibles de Star Citizen.\r\n\r\nIl s’agit de la variante « anti aérienne » de la gamme Cyclone, une série de véhicules roulants à l’allure de buggy, rapides et tout-terrains.\r\n\r\nCette version dispose à l’arrière d’un système lance-missiles chargé de quatre missiles taille 1, d’un lanceur de contre-mesures pour se protéger contre des missiles hostiles, et d’un dispositif générateur d’impulsions électromagnétiques.', 'vehicule', 0),
(45, 'vaisseau45.jpg', 'Cyclone MT', 'Tumbril Land Systems', '81.90 € / 70.98 € warbond', '', 'Un armement polyvalent.\r\nRapide.', 'Peu protégé.\r\nCentre de gravité élevé.', '1 - 3 Membres', 'Vehicule (6.0m x 4.0m x 2.5m)', '3 Tonnes', '? m/s', '0 SCU', '?', 'Le Cyclone MT est l\'un des véhicules disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante \"combat anti-véhicules\" de la gamme Cyclone, un ensemble de véhicules tout terrains à quatre roues motrices, offrant une grande mobilité au prix d\'une protection minimale de l\'équipage.\r\n\r\nLe Cyclone MT dispose d\'une tourelle dotée d\'un canon et de missiles.', 'vehicule', 0),
(46, 'vaisseau46.jpg', 'Cyclone RC\r\n\r\n', 'Tumbril Land Systems', '71 euros seul (taxes comprises, prix constaté en Alpha)', '', 'Conçu pour la course.\r\nDeux personnes.', 'Uniquement pour la course', 'C\'est un véhicule biplace', 'Petit (6m x 4m x 3m)', '3 tonnes', '? m/s', '0 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Cyclone RC est l\'un des véhicules terrestres disponibles de Star Citizen.\r\n\r\nIl s\'agit de la version course de la gamme Cyclone. Par rapport aux autres versions, il dispose d\'entrée d\'air modifiée et d\'un système de direction amélioré.', 'vehicule', 0),
(47, 'vaisseau47.jpg', 'Cyclone RN', 'Tumbril Land Systems', '78 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Rapide.\r\nDeux personnes.\r\nScanner et stockage de données.\r\nBalises.', 'Hyperspécialisé.\r\nNon armé.\r\nPas de cargo.', 'Le véhicules possède deux places', 'Véhicule (6m x 4m x 3m)', '3 tonnes', '? m/s', '0 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Cyclone RN est l\'un des véhicules disponibles de Star Citizen.\r\n\r\nIl s’agit de la variante « exploration » de la gamme Cyclone, une série de véhicules roulants à l’allure de buggy, rapides et tout-terrains.\r\nCette version dispose à l’arrière d\'un scanner amélioré lui permettant de détecter des objets à longue distance, ainsi qu\'une capacité de stockage de données pour conserver les informations recueillies. Le Cyclone RN est également équipé de balises permettant de marquer des points d\'intérêt au sol, comme des zones de posé, des ressources ou des dangers.\r\n\r\nLe Cyclone RN dispose de deux sièges à l’avant, dont celui du pilote.', 'vehicule', 0),
(48, 'vaisseau48.jpg', 'Cyclone TR', 'Tumbril Land Systems', '78 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Rapide.\r\nCanon taille 1 sur circulaire à 360°.\r\n3 personnes.', 'Pas de cargo.', 'Le véhicule comporte trois places', 'Véhicule (6m x 4m x 3m)', '3 tonnes', '0 m/s', '0 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Cyclone TR est l\'un des véhicules disponibles de Star Citizen.\r\n\r\nIl s’agit de la variante « combat » de la gamme cyclone, une série de véhicules roulants à l’allure de buggy, rapides et tout-terrains.\r\nCette version dispose à l’arrière d’un canon taille 1 monté sur une circulaire permettant de tirer à 360°.\r\n\r\nLe Cyclone TR dispose de deux sièges à l’avant, dont celui du pilote, et d’un poste opérateur tourelle à l’arrière.', 'vehicule', 0),
(49, 'vaisseau49.jpg', 'Defender\r\n\r\n', 'Banu Souli', '222 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Bon rayon d\'action pour un chasseur léger.\r\nGros bouclier pour sa taille.\r\nBien armé.\r\nConfort pour deux personnes.', 'Grosse cible sous certains angles.\r\nPas de cargo.\r\nPas de propulseurs VTOL.', 'C\'est un biplace', 'Petit (33.5m x 13.2m x 4m)', '78 tonnes', '? m/s', '0 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Defender est l\'un des vaisseaux jouable de Star Citizen.\r\n\r\nIl s\'agit d\'un chasseur léger construit, utilisé et exporté par le peuple extraterrestre Banu. Dans leur culture, c\'est le vaisseau d\'escorte des Merchantmans.\r\n\r\nLe Defender a la particularité d\'être un chasseur léger avec deux membres d\'équipage qui ont chacun leur cockpit. Les Banus ont en effet des rôles très séparés et le pilote ne tire pas. Dans la version exportée aux humains, le pilote peut piloter et tirer. Le vaisseau est doté de deux longs bras portant chacun deux canons, et pouvant se replier pour former le train d\'atterrissage. Le vaisseau dispose également d\'un bouclier d\'une taille supérieure par rapport aux autres chasseurs de sa taille, alimenté par une centrale énergétique supplémentaire.', 'vehicule', 0),
(50, 'vaisseau50.jpg', 'Dragonfly Black', 'Drake Interplanetary', '48 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Moto biplace.\r\nDifficile à toucher.\r\nBien armé (pour une moto).\r\nDu cargo (pour une moto).', 'Fragile.\r\nNe peut pas sortir de l\'attraction d\'une planète seul.\r\nPas de couchette.\r\nPas de moteur quantique.', 'Un pilote et un passager', 'Parasite (6m x 3.5m x 1.5m)', '2 tonnes', '1.100 m/s', '0 - 1 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Dragonfly Black est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nLes deux versions de cette moto volante (Yellowjacket et Black) sont identiques par leurs caractéristiques et ne diffèrent que par leur peinture.\r\n\r\nC\'est un engin conçu pour aller dans l\'espace comme à la surface des planètes. Il est armé de deux canons et dispose d\'un siège passager tourné vers l\'arrière. Deux sacoches permettent de transporter quelques objets.', 'vehicule', 7),
(51, 'vaisseau51.jpg', 'Dragonfly Yellowjacket', 'Drake Interplanetary', '48 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Moto biplace.\r\nDifficile à toucher.\r\nBien armé (pour une moto).\r\nDu cargo (pour une moto).', 'Fragile.\r\nNe peut pas sortir de l\'attraction d\'une planète seul.\r\nPas de couchette.\r\nPas de moteur quantique.', 'Un pilote et un passager', 'Parasite (6m x 3.5m x 1.5m)', '2 tonnes', '1.100 m/s', '0 - 1 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs, notamment celui de démarrage \"DRAKE LOOT AND SCOOT PACKAGE\".', 'Les deux versions de cette moto volante (Yellowjacket et Black) sont identiques par leurs caractéristiques et ne diffèrent que par leur peinture.\r\n\r\nC\'est un engin conçu pour aller dans l\'espace comme à la surface des planètes. Il est armé de deux canons et dispose d\'un siège passager tourné vers l\'arrière. Deux sacoches permettent de transporter quelques objets.', 'vehicule', 7),
(52, 'vaisseau52.jpg', 'Eclipse', 'Aegis Dynamics', '360 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Torpilles de taille 9.\r\nFurtivité.', 'Plutôt lent.\r\nRayon d\'action limité.\r\nHyperspécialisé.\r\nPas de cargo.\r\nPas de couchette.', 'C\'est un vaisseau monoplace', 'Moyen (20.5m x 36.6m x 4.4m)', '52 tonnes', '980 m/s', '0 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'L\'Eclipse est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nL\'Eclipse a une forme caractéristique d\'aile volante, fine et large. Il s\'agit d\'un torpilleur furtif transportant 3 torpilles de gros calibre.\r\n\r\nEn dehors de ses torpilles, l\'Eclipse ne dispose que de deux canons qui ne lui permettront pas de faire face à un chasseur bien piloté.', 'vaisseau', 1);
INSERT INTO `vaisseau` (`id`, `image_vaisseau`, `nom_vaisseau`, `constructeur`, `prix`, `prix_reel`, `forces`, `faiblesses`, `equipage`, `taille`, `poids`, `vitesse_max`, `capacite`, `disponibilite`, `description`, `categorie`, `idConstructeur`) VALUES
(53, 'vaisseau53.jpg', 'Endeavor', 'Musashi Industrial and Starflight Concern (MISC)', '420 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Ultra modulaire.\r\nCabine détachable.\r\nA la pointe des carrières scientifiques et médicales.\r\n500 SCU de cargo.', 'Ne peut pas tout faire en même temps.\r\nLe \"Workshop\" ne peut pas se poser.\r\nFragile.', 'Le vaisseau est prévu pour 5 personnes', '?', '4.000 tonnes', '? m/s', '500 SCU', 'Quelques fois par an seul.\r\nDans des packs \"Concierge\".', 'Le Endeavor est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s’agit du plus gros vaisseau scientifique et médical connu. L’Endeavor est composé de trois éléments : une cabine détachable appelée \"Explorer\" qui peut se poser au sol, une partie principale nommé \"Workshop\" (atelier) dotée de moteurs quantiques et pouvant accueillir des modules fonctionnels, et les modules eux-mêmes.', 'vaisseau', 10),
(54, 'vaisseau54.jpg', 'F7C Hornet', 'Anvil Aerospace', '136 euros avec un pack de départ.\r\n\r\n120 euros seul (il faut un pack pour pouvoir jouer).', '', 'Un chasseur équilibré.\r\nLe point d\'emport utilitaire.\r\nForte modularité pour un chasseur.', 'Faible en énergie.\r\nFaible rayon d\'action.', 'C\'est un mono place', 'Petit (22.5m x 21.5m x 6.5m)', '73 tonnes', '1225 m/s', '2 SCU', 'Toujours disponible, seul ou en pack', 'Le F7C Hornet est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nVersion civile d\'un chasseur moyen utilisé par l\'UEE Navy, le F7C Hornet se distingue par son point d\'emport utilitaire cylindrique au centre de l\'appareil, son gros propulseur principal unique, et ses entrées d\'air de chaque côté du cockpit.\r\n\r\nC\'est un appareil courte distance, conçu pour être employé depuis un vaisseau porteur.', 'vaisseau', 2),
(55, 'vaisseau55.jpg', 'F7C Wildfire', 'Anvil Aerospace', '210 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Un chasseur équilibré.\r\nLe point d\'emport utilitaire.\r\nForte modularité pour un chasseur.', 'Faible en énergie.\r\nFaible rayon d\'action.\r\nPas de couchette.\r\nPas de propulseurs VTOL.', 'C\'est un mono place', 'Petit (22.5m x 21.5m x 6.5m)', '73 tonnes', '1225 m/s', '0-2 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le F7C Hornet Wildfire est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit d\'une version spéciale du F7C Hornet, un chasseur médian qui se distingue par son point d\'emport utilitaire cylindrique au centre de l\'appareil, son gros propulseur principal unique, et ses entrées d\'air de chaque côté du cockpit.\r\n\r\nLa version Wildfire est habillée d\'une livrée rouge et sa configuration de série comporte des mitrailleuses balistiques sous les ailes et sur le point d\'emport utilitaire.', 'vaisseau', 2),
(56, 'vaisseau56.jpg', 'F7C-M Heartseeker', 'Anvil Aerospace', '191 euros seul (il faut un pack pour pouvoir jouer)\r\n', '', 'Un chasseur plutôt résistant.\r\nLe point d\'emport utilitaire.\r\nForte modularité pour un chasseur.\r\nBiplace.\r\nDes composants série de bonne qualité.', 'Faible en énergie.\r\nFaible rayon d\'action.', 'C\'est un biplace', 'Petit (25.5m x 24m x 6.5m)', '78 tonnes', '1222 m/s', '0 SCU', 'Promotion saint Valentin', 'Le F7C-M Heartseeker est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nC\'est une version spéciale du chasseur biplace F7C Superhornet, avec une peinture spéciale Saint Valentin et des composants de base haut de gamme, et des armements fixes.\r\n\r\nC\'est un appareil courte distance, conçu pour être employé depuis un vaisseau porteur.', 'vaisseau', 2),
(57, 'vaisseau57.jpg', 'F7C-M Superhornet', 'Anvil Aerospace', 'Environ 216 dollars seul (il faut un pack pour pouvoir jouer)', '', 'Un chasseur plutôt résistant.\r\nLe point d\'emport utilitaire.\r\nForte modularité pour un chasseur.\r\nBiplace.', 'Centrale à énergie sous dimensionnée.\r\nFaible rayon d\'action.', 'C\'est un biplace', 'Petit (25.5m x 24m x 6.5m)', '78 tonnes', '1222 m/s', '0 à 2 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le F7C-M Superhornet est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nVersion biplace de la gamme Hornet, le F7C-M Superhornet est un chasseur moyen qui se distingue par son point d\'emport utilitaire cylindrique au centre de l\'appareil, son gros propulseur principal unique, et ses entrées d\'air de chaque côté du cockpit.\r\n\r\nC\'est un appareil courte distance, conçu pour être employé depuis un vaisseau porteur.', 'vaisseau', 2),
(58, 'vaisseau58.jpg', 'F7C-R Hornet Tracker\r\n\r\n', 'Anvil Aerospace', '153 euros seul (taxes comprises, prix constaté en Alpha)', '', 'Un chasseur équilibré.\r\nLe point d\'emport utilitaire.\r\nForte modularité pour un chasseur.\r\nLe radar amélioré.\r\n', 'Faible en énergie.\r\nFaible rayon d\'action.\r\nPas de couchette.\r\nPas de propulseurs VTOL.', 'C\'est un mono place', 'Petit (22.5m x 21.5m x 6.5m)', '73 tonnes', '1.215 m/s', '0-2 SCU', 'Toujours disponible, seul', 'Le F7C-R Tracker est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante \"radar\" de la gamme F7C Hornet, une série de chasseurs bien armés et solides caractérisés par leur point d\'emport utilitaire cylindrique au centre de l\'appareil, leur gros propulseur principal unique, et les entrées d\'air de chaque côté du cockpit.\r\n\r\nLa version Tracker est équipée d\'un radar longue portée.', 'vaisseau', 2),
(59, 'vaisseau59.jpg', 'F7C-S Ghost', 'Anvil Aerospace', '136 euros seul (taxes comprises, prix constaté en Alpha)', '', 'Un chasseur équilibré.\r\nLe point d\'emport utilitaire.\r\nForte modularité pour un chasseur.\r\nTrès furtif.', 'Faible en énergie.\r\nFaible rayon d\'action.\r\nPas de couchette.\r\nPas de propulseurs VTOL.', 'C\'est un mono place', 'Petit (22.5m x 21.5m x 6.5m)', '73 tonnes', '1.225 m/s', '0-2 SCU', 'Toujours disponible, seul', 'Le F7C-S Ghost est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante \"furtive\" de la gamme F7C Hornet, une série de chasseurs bien armés et solides caractérisés par leur point d\'emport utilitaire cylindrique au centre de l\'appareil, leur gros propulseur principal unique, et les entrées d\'air de chaque côté du cockpit.\r\n\r\nLa version Ghost est équipée de composants de type discrétion et d\'un revêtement de coque anti-scan.', 'vaisseau', 2),
(60, 'vaisseau60.png', 'Freelancer', 'Musashi Industrial and Starflight Concern (MISC)', '136 euros avec un pack de départ.\r\n\r\n120 euros seul\r\n(taxes comprises, prix constaté en Alpha).', '', 'Puissance de feu à l\'avant.\r\nBonne résistance.\r\n66 unités de cargo.\r\nLongue endurance.', 'Mauvaise visibilité pour le pilote.\r\nVéhicules difficile à faire rentrer.\r\nPas très agile.', 'Le vaisseau dispose de 4 lits - \r\nUn pilote et un tireur en tourelle', 'Moyen (38m x 23.5m x 9.5m)', '209 tonnes', '1005 m/s', '1005 m/s', 'Toujours disponible, seul ou en pack', 'Le Freelancer est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nCe transport de taille moyenne possède deux puissantes tourelles placées de part et d\'autre de la cabine, et une tourelle légère pour couvrir ses arrières.\r\n\r\nSa longue soute permet de transporter 66 unités (SCU) de cargo et c\'est un vaisseau réputé pour sa faible consommation, ce qui en fait un transporteur longue distance intéressant.', 'vaisseau', 10),
(61, 'vaisseau61.jpg', 'Freelancer DUR\r\n\r\n', 'Musashi Industrial and Starflight Concern (MISC)', '162 dollars seul (il faut un pack pour pouvoir jouer)\r\n(taxes comprises, prix constaté en Alpha)', '', 'Bonne résistance.\r\nTrès Longue endurance.\r\nUne raffinerie.\r\nSystèmes de détection améliorés.', 'Mauvaise visibilité pour le pilote.\r\nPeu de véhicules peuvent entrer dans la soute.', 'Le vaisseau dispose de 4 lits', 'Moyen (38m x 23.5m x 9.5m)', '213 tonnes', '1100 m/s', '36 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Freelancer DUR est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante exploration de la gamme Freelancer. Il sacrifie près de la moitié du cargo disponible pour intégrer une raffinerie interne et un moteur de saut avancé. Il dispose également de 4 réservoirs de carburants supplémentaires externes, ainsi que de systèmes de détection (radars, scanners) améliorés. Il conserve les deux puissantes tourelles placées de part et d\'autre de la cabine, et une tourelle légère pour couvrir ses arrières.', 'vaisseau', 10),
(62, 'vaisseau62.jpg', 'Freelancer MAX', 'Musashi Industrial and Starflight Concern (MISC)', '180 dollars seul (il faut un pack pour pouvoir jouer)\r\n(taxes comprises, prix constaté en Alpha)', '', 'Puissance de feu à l\'avant.\r\nBonne résistance.\r\n120 unités de cargo.\r\nPeut accueillir plusieurs Cyclones.', 'Mauvaise visibilité pour le pilote.\r\nPas très agile.\r\nGrosse cible.', 'Le vaisseau dispose de 4 lits', 'Moyen (38m x 36m x 9.5m)', '336 tonnes', '1005 m/s', '120 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Freelancer MAX est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante transport de la gamme Freelancer. La soute à cargo est deux fois plus large que pour la version de base, ce qui lui permet d\'emporter 120 unités de cargo au lieu de 66. Et il dispose de deux fois plus de propulseurs à l\'arrière pour pouvoir déplacer le cargo supplémentaire.\r\n\r\nIl conserve les quatre puissants canons à l\'avant et la tourelle arrière. En revanche, il dispose de moins de missiles que les autres Freelancer.', 'vaisseau', 10),
(63, 'vaisseau63.jpg', 'Freelancer MIS', 'Musashi Industrial and Starflight Concern (MISC)', '210 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Puissance de feu à l\'avant.\r\nBeaucoup de missiles.\r\nBonne résistance.', 'Mauvaise visibilité pour le pilote.\r\nPas très agile.', 'Le vaisseau dispose de 4 lits', 'Moyen (38m x 23.5m x 9.5m)', '213 tonnes', '1.035 m/s', '36 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Freelancer MIS est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante \"combat\" de la gamme Freelancer, une série de vaisseaux de taille moyenne, disposant d\'une forte puissante de feu vers l\'avant grâce à leurs quatre canons taille 3 installés sur des tourelles téléopérées placées de part et d\'autre de la cabine. Les Freelancers disposent également d\'une tourelle armée de deux canons taille 2 pour protéger l\'arrière du vaisseau.\r\n\r\nPar rapport à la version de base, la version MIS sacrifie près de la moitié de son cargo pour emporter un système lance-missile pouvant tirer jusqu\'à 32 missiles de taille 2.', 'vaisseau', 10),
(64, 'vaisseau64.png', 'Genesis Starliner', 'Crusader Industries', '480 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Le meilleur transport de passagers.\r\nModulaire.\r\nCapacité de vol VTOL.\r\nLong rayon d\'action.\r\n300 SCU de cargo.', 'Peu protégé.\r\nPeu armé.', '8 membres d\'équipage pour accueillir les 40 passagers', 'Grand (85m x 90m x 16m)', '? tonnes', '? m/s', '300 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Genesis Starliner est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nCe vaisseau à l\'allure d\'avion de ligne futuriste est un transport de passagers. Il peut emmener 40 personnes en plus de l\'équipage de 8 personnes et de leurs bagages. Modulaire, l\'intérieur peut être réaménagé pour transporter moins de passagers mais avec plus de confort, ou même pour transporter uniquement du cargo.', 'vaisseau', 6),
(65, 'vaisseau65.jpg', 'Gladiator', 'Anvil Aerospace', '198 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Le plus petit torpilleur du jeu.\r\nArmé comme un chasseur.\r\nRésistant.\r\nTorpilles et missiles.', 'Court rayon d\'action.\r\nPas de couchettes.\r\nPas de cargo.\r\nPeu agile.\r\nLent.\r\nVue du pilote un peu obstruée.', 'Un pilote et un opérateur tourelle', 'Petit (22.5m x 22.5m x 6m)', '87 tonnes', '980 m/s', '980 m/s', 'Quelques fois par an seul.\r\nDans des packs \"Concierge\".', 'Le Gladiator est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit d\'un torpilleur léger biplace à court rayon d\'action. Armé de quatre canons, deux à l\'avant et deux en tourelle, pour se défendre contre les chasseurs, sa principale force provient de ses quatre torpilles légères et ses huit missiles. Plutôt résistant pour sa taille, le Gladiator est très peu agile et devra être accompagné d\'une escorte.', 'vaisseau', 2),
(66, 'vaisseau66.png', 'Gladius', 'Aegis Dynamics', '98 euros seul (taxes comprises, prix constaté en Alpha)', '', 'Rapide et maniable.\r\nBonne visibilité.\r\nDifficile à toucher.', 'Pas de couchette.\r\nCourt rayon d\'action.\r\nPas de cargo.', 'C\'est un vaisseau monoplace', 'Petit (20m x 17m x 5.5m)', '49 tonnes', '1235 m/s', '0 SCU', 'Toujours disponible, seul', 'Le Gladius est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nCe vaisseau est un chasseur léger, idéal pour les escortes et les interceptions. Il dispose de 3 points d\'emport d\'armes et de 4 points d\'emport de missiles, et est très maniable et rapide. Ses ailes sont parfaitement adaptées pour le vol atmosphérique, et ses deux propulseurs arrière lui donnent une plus grande chance de survie que son concurrent, l\'Arrow.', 'vaisseau', 1),
(67, 'vaisseau67.jpg', 'Glaive (Esperia)', 'Esperia Incorporation', '382 euros seul (taxes comprises, prix constaté en Alpha)', '', 'Deux canons de gros calibre.\r\nManiable.', 'Fragile', 'C\'est un monoplace', 'Moyen (31m x 31.5m x 8.5m)', '66 tonnes', '1.229 m/s', '0 SCU', 'Quelques fois par an seul\r\n\r\nDans des packs \"Concierge\"', 'Le Glaive est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la copie par le constructeur Esperia d\'un chasseur médian Vanduul. Le Glaive est la version symétrique du vaisseau Vanduul Scythe. Chez les Vanduul, le Glaive est réservé aux pilotes d\'élite qui ont fait leur preuves.\r\n\r\nLe Glaive est caractérisé par ses deux lames pour éperonner les vaisseaux adverses et ses deux canons taille 5, exceptionnels chez un chasseur médian. Les canons du Glaive sont fixes et ne peuvent être modifiés.', 'vaisseau', 8),
(68, 'vaisseau68.jpg', 'Hammerhead', 'Aegis Dynamics', '870 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Immense puissance de feu.\r\nBlindage renforcé à l\'avant.\r\nPas d\'angle mort.\r\nUn peu de cargo.\r\nCouchettes et confort minimal.', 'Nécessite un équipage quasi complet.\r\nVisibilité réduite pour le pilote.\r\nPas adapté au vol en atmosphère.\r\nRéservoirs quantiques limités.\r\nPetit radar pour sa taille.', 'Le vaisseau dispose de 9 lits. Pilote + les 6 tourelles actives', 'Grand (115m x 75m x 16m)', '4.260 tonnes', '915 m/s', '40 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Hammerhead est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nC\'est une corvette d\'escorte caractérisée par ses multiples tourelles à quatre canons de gros calibre, qui lui assure une couverture dans toutes les directions. Ce vaisseau possède également de nombreux missiles et un blindage renforcé à l\'avant. L\'équipage de 9 personnes dispose d\'un confort spartiate mais efficace pour les missions longue durée.\r\n\r\nPoint particulier : le cockpit est situé en dessous du vaisseau.', 'vaisseau', 1),
(69, 'vaisseau69.jpg', 'Hawk', 'Anvil Aerospace', '120 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Rapide.\r\nManiable.\r\nCellule de détention.\r\nGénérateur d\'impulsion électromagnétique.', 'Pas de couchette.\r\nPas de cargo.\r\nCourt rayon d\'action.', 'C\'est un monoplace', 'Petit (16m x 13m x 4m)', '40 tonnes', '1.235 m/s', '0 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Hawk est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nInspiré par l\'oiseaux de proie dont il porte le nom (Hawk signifie Faucon en anglais), ce vaisseau est spécialement conçu pour les chasseurs de primes. En effet, il est doté d\'un générateur d\'impulsion électromagnétique et de canons à distorsion pour neutraliser une cible sans la détruire, et d\'une cellule de détention pour une personne.\r\n\r\nRapide et maniable, le Hawk dispose de 6 canons pour se défaire de ses adversaires.', 'vaisseau', 2),
(70, 'vaisseau70.png', 'Herald', 'Drake Interplanetary', '102 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Un vaisseau compact.\r\nLe plus petit transporteur de donnée.\r\nUn couchette.\r\nTrès rapide en ligne droite.', 'Pas de cargo.\r\nPas de propulseurs VTOL.\r\nPeu manœuvrable.', 'C\'est un monoplace', 'Petit (23.5m x 12.5m x 9m)', '66 tonnes', '1.360 m/s', '0 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Herald est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit d\'un vaisseau transporteur de données. Sa silhouette est particulière, avec ses deux gros moteurs qui semblent prendre 2/3 de la place et ses angles droits. Ces caractéristiques se traduisent par une vitesse linéaire très élevée, l\'une des meilleures de tous les vaisseaux, mais également par une vitesse de rotation très faible. A l\'intérieur, conformément au style Drake, tout est fonctionnel et pratique, sans fioritures. Une zone vie pour une personne, une zone serveurs et une zone travail, le tout tenant dans un volume réduit.', 'vaisseau', 7),
(71, 'vaisseau71.png', 'Hercules A2', 'Crusader Industries', '840 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Capacité à larguer des bombes.\r\nTourelles d\'attaque air-sol.\r\nBlindé.\r\nCapacité à déployer un char Nova.\r\nCapacité VTOL.', 'Peu adapté au combat spatial', '\r\nLe vaisseau est conçu pour un équipage à 8', 'Grand (94m x 70m x 23m)', '? tonnes', '? m/s', '234 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Hercules A2 est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit de la variante canonnière \"attaque au sol\" de la gamme Hercules, une série de vaisseaux conçus pour les opérations de débarquement.\r\n\r\nLe Hercules A2 sacrifie la moitié de sa capacité de transport pour intégrer un système de largage de bombes permettant de délivrer soit deux énormes bombes, soit de multiples bombes à fragmentation. Il est également doté de nombreuses tourelles sous le vaisseau pour pouvoir mener des attaques au sol.', 'vaisseau', 6),
(72, 'vaisseau72.png', 'Hercules C2', 'Crusader Industries', '432 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Entrée et sortie de véhicules faciles.\r\nGrande soute à cargo.\r\nCapacité de vol VTOL.\r\nGrand rayon d\'action.\r\nCapacité à transporter des chars Nova.', 'Peu armé.\r\nPeu blindé.', 'Un pilote et deux opérateurs tourelles', 'Grand (94m x 70m x 23m)', '? tonnes', '? m/s', '624 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Hercules C2 est l\'un des vaisseaux qui pourra être joué de Star Citizen.\r\n\r\nIl s\'agit de la variante civile de la gamme Hercules, une série de vaisseaux conçus pour les opérations de débarquement.\r\n\r\nC\'est un transporteur lourd, optimisé pour déplacer des véhicules terrestres, y compris deux chars de combat Nova. Il dispose en effet de deux rampes d\'accès placées face à face, permettant de faire rentrer et sortir les véhicules en marche avant. Son immense soute à cargo permettra également de déployer des conteneurs utilitaires.', 'vaisseau', 6),
(73, 'vaisseau73.png', 'Hercules M2', 'Crusader Industries', '576 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Entrée et sortie de véhicules faciles, y compris un char Nova.\r\nGrande soute à cargo.\r\nCapacité de vol VTOL.\r\nCapable de se défendre seul contre des chasseurs.', 'Moins adapté au commerce que le C2', 'Le pilote et les 3 opérateurs des tourelles', 'Grand (94m x 70m x 23m)', '? tonnes', '? m/s', '468 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Hercules M2 est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit de la variante militaire de la gamme Hercules, une série de vaisseaux conçus pour les opérations de débarquement.\r\n\r\nC\'est un transporteur lourd, optimisé pour déplacer des véhicules terrestres, y compris deux chars de combat Nova. Il dispose en effet de deux rampes d\'accès placées face à face, permettant de faire rentrer et sortir les véhicules en marche avant. Son immense soute à cargo permettra également de déployer des conteneurs utilitaires.', 'vaisseau', 6),
(74, 'vaisseau74.jpg', 'Hull A', 'Musashi Industrial and Starflight Concern (MISC)', '72 dollars seul (taxes comprises, prix constaté en Alpha)', '', '48 SCU pour un vaisseau de petite taille.\r\nPeut atterrir.', 'Peu armé.\r\nFragile.', 'C\'est un vaisseau monoplace', 'Petit (22m x 8m x 4m)', '122 tonnes', '? m/s', '48 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Hull A est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit du plus petit vaisseau de la gamme Hull, un ensemble de vaisseaux spécialisés dans le transport et ayant la particularité de transporter leur cargaison à l\'extérieur de la coque, accrochée à des poutres rétractables. Ainsi, lorsqu\'ils ne transportent pas de cargo, les Hulls sont dans un mode compact qui facilite leurs déplacements et les rendent moins vulnérables.\r\n\r\nLe Hull A est peu armé, mais peut emmener ses 48 unités de cargo jusqu\'au sol, contrairement aux plus gros vaisseaux de la gamme.', 'vaisseau', 10),
(75, 'vaisseau75.png', 'Hull B', 'Musashi Industrial and Starflight Concern (MISC)', '108 dollars seul (taxes comprises, prix constaté en Alpha)', '', '384 SCU pour un vaisseau de taille moyenne.\r\nPeut atterrir.', 'Peu armé\r\nLent', 'C\'est un monoplace', 'Moyen (48m x 15.5m x 17m)', '387 tonnes', '? m/s', '384 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le HULL B est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit du deuxième vaisseau de la gamme Hull, un ensemble de vaisseaux spécialisés dans le transport et ayant la particularité de transporter leur cargaison à l\'extérieur de la coque, accrochée à des poutres rétractables. Ainsi, lorsqu\'ils ne transportent pas de cargo, les Hulls sont dans un mode compact qui facilite leurs déplacements et les rendent moins vulnérables.\r\n\r\nLe Hull B est peu armé, mais peut emmener ses 384 unités de cargo jusqu\'au sol, contrairement aux plus gros vaisseaux de la gamme.', 'vaisseau', 10),
(76, 'vaisseau76.png', 'Hull C', 'Musashi Industrial and Starflight Concern (MISC)', '300 dollars seul (taxes comprises, prix constaté en Alpha)', '', '4608 unités de cargo.\r\nPeut tenir à distance quelques chasseurs.', 'Lent.\r\nNe peut pas atterrir quand il est plein.', 'Le vaisseau dispose de 4 places', 'Grand (125m x 55m x 55m)Grand (125m x 55m x 55m)', '887 tonnes\r\n\r\n', '? m/s\r\n\r\n', '4608 SCU\r\n\r\n\r\n', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Hull C est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit du vaisseau du milieu de la gamme Hull, un ensemble de vaisseaux spécialisés dans le transport et ayant la particularité de transporter leur cargaison à l\'extérieur de la coque, accrochée à des poutres rétractables. Ainsi, lorsqu\'ils ne transportent pas de cargo, les Hulls sont dans un mode compact qui facilite leurs déplacements et les rendent moins vulnérables.\r\n\r\nLe Hull C est peu armé, mais peut transporter 4608 unités de cargo sur de longues distances.', 'vaisseau', 10),
(77, 'vaisseau77.png', 'Hull D', 'Musashi Industrial and Starflight Concern (MISC)', '385 dollars seul (taxes comprises, prix constaté en Alpha)', '', '>20.000 SCU de cargo.\r\nTrès résistant.\r\nPeut tenir à distance la plupart des assaillants.', 'Lent.\r\nNe peut pas atterrir quand il est plein.', 'Le vaisseau peut accueillir 5 personnes', 'Capital (209m x 70m x 70m)', '1.216 tonnes', '? m/s', '20736 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Hull D est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit du deuxième plus gros vaisseau de la gamme Hull, un ensemble de vaisseaux spécialisés dans le transport et ayant la particularité de transporter leur cargaison à l\'extérieur de la coque, accrochée à des poutres rétractables. Ainsi, lorsqu\'ils ne transportent pas de cargo, les Hulls sont dans un mode compact qui facilite leurs déplacements et les rendent moins vulnérables.\r\n\r\nLe Hull D peut emmener plus de 20.000 unités (SCU) de cargo sur de très longues distances. Protégé par de puissants boucliers capitaux, il est très résistant.', 'vaisseau', 10),
(78, 'vaisseau78.png', 'Hull E', 'Musashi Industrial and Starflight Concern (MISC)', '780 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Le plus gros transporteur du jeu.\r\nTracteur résistant.\r\nPeut faire face à plusieurs assaillants.', 'Très peu manœuvrable.\r\nAttire les convoitises.\r\nCargaison exposée et vulnérable.', 'Le vaisseau peut accueillir 5 personnes', 'Capital (372m x 104m x 104m)', '1.652 tonnes', '? m/s', '98304 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Hull E est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit du plus gros vaisseau de la gamme Hull, un ensemble de vaisseaux spécialisés dans le transport et ayant la particularité de transporter leur cargaison à l\'extérieur de la coque, accrochée à des poutres rétractables. Ainsi, lorsqu\'ils ne transportent pas de cargo, les Hulls sont dans un mode compact qui facilite leurs déplacements et les rendent moins vulnérables.\r\n\r\nLe Hull E peut emmener près de 100.000 unités (SCU) de cargo sur de très longues distances. Protégé par de puissants boucliers capitaux, il est très résistant.', 'vaisseau', 10),
(79, 'vaisseau79.png', 'Hurricane', 'Anvil Aerospace', '234 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Plus forte puissance de feu parmi les chasseurs.\r\nPlutôt manœuvrable.\r\nRapide.', 'Nécessite deux personnes pour être efficace.\r\nPas de couchettes.\r\nPas de propulseur VTOL.\r\nPas de cargo.', 'Un pilote et un opérateur tourelle', 'Petit (22m x 14.5m x 10m)\r\n\r\n', '148 tonnes\r\n\r\n', '1230 m/s\r\n\r\n', '0 SCU\r\n\r\n', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Hurricane est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nC\'est un chasseur lourd armé de 6 canons. C\'est d\'ailleurs le chasseur ayant la plus grande puissance de feu. Sa manœuvrabilité et sa vitesse sont plutôt bonnes. Par contre il est plutôt fragile. Biplace, quatre des canons sont installés sur un tourelle opérée par un deuxième membre d\'équipage. Ceci lui permet de maintenir un feu soutenu sur la cible même en cas de manœuvres ou d\'esquives.', 'vaisseau', 2),
(80, 'vaisseau80.png', 'Idris-M', 'Aegis Dynamics', '1.200 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Puissamment armé.\r\nBien protégé.\r\nUn hangar pour 3 chasseurs.\r\nUn vaisseau parasite MPUV.\r\nInfirmerie, prison, salle de briefing, champ de tir, armurerie, salle de repos, mess, quartiers du capitaine.\r\nLits pour 28 membres d\'équipage.\r\nCapacité de vol VTOL.', 'Nécessite un équipage complet pour être efficace.\r\nPeu manœuvrable.\r\nPuissance de feu concentrée à l\'avant.\r\nPeu modulaire.', 'Le vaisseau est conçu pour 28 membres d\'équipage', 'Capital (242m x 126m x 46m)', '37.459 tonnes', '? m/s', '831 SCU\r\n\r\n\r\n', 'Dans des packs \"Concierge\" haut de gamme, quantité limitée', 'L\'Idris-M est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit d\'une frégate conçue pour les patrouilles longue durée et l\'exploration. Elle peut embarquer 3 vaisseaux de la taille d\'un chasseur, qu\'elle peut maintenir et ravitailler. Armée d\'un puissant canon de type \"railgun\" à l\'avant, d\'un lance missiles et de près d\'une dizaine de tourelles, c\'est un formidable vaisseau de combat.\r\n\r\nL\'Idris est le plus gros vaisseau pouvant se poser au sol d\'une planète.', 'vaisseau', 1),
(81, 'vaisseau81.jpg', 'Idris-P', 'Aegis Dynamics', '1800 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Bien armé.\r\nBien protégé.\r\nUn hangar pour 3 chasseurs.\r\nUn vaisseau parasite MPUV.\r\nInfirmerie, prison, salle de briefing, champ de tir, armurerie, salle de repos, mess, quartiers du capitaine.\r\nLits pour 28 membres d\'équipage.\r\nCapacité de vol VTOL.', 'Peu manœuvrable.\r\nPeu modulaire.', 'Le vaisseau est conçu pour 28 membres d\'équipage', 'Capital (242m x 126m x 46m)', '37.310 tonnes', '? m/s', '995 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\", en quantité limitée.', 'L\'Idris-P est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit de la version \"maintien de la paix\" de la gamme Idris, une série de frégates conçues pour les patrouilles longue durée et l\'exploration. Les Idris peuvent embarquer 3 vaisseaux de la taille d\'un chasseur, qu\'elles peuvent maintenir et ravitailler, ainsi qu\'un vaisseau parasite MPUV pour transporter des personnes ou du cargo vers ou depuis la frégate.\r\n\r\nPar rapport à la version militaire Idris-M, l\'Idris-P n\'est pas équipé du railgun spinal, ni de la tourelle anti-capitaux. Elle est également livrée avec un blindage allégé. En revanche, elle peut emporter plus de cargo et ses coûts de fonctionnement sont moins élevés.', 'vaisseau', 1),
(82, 'vaisseau82.png', 'Javelin', 'Aegis Dynamics', '3600 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Le plus puissant des torpilleurs.\r\nBeaucoup de grosses tourelles.\r\nExtrêmement résistant.\r\nHangar à vaisseau.\r\nInfirmerie.', 'Nécessite un équipage important.\r\nTrès lent.\r\nNe peut pas aller dans des champs de gravité trop forts.\r\nCoûteux à l\'usage.', '80 membres d\'équipage sont prévus', 'Capital (480m x 198m x 72m)', '109.900 tonnes', '? m/s', '5.400 SCU', 'Quelques fois par an seul, en nombre limité.\r\nDans des packs \"Concierge\" haut de gamme.', 'Le Javelin est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nCe destroyer est le plus grand pouvant être possédé par un joueur.\r\n\r\nC\'est un vaisseau construit autour de deux systèmes lance torpilles de très gros calibre, et armé de nombreuses tourelles de grande taille. Sa puissance de feu est colossale. A l\'intérieur, cinq ponts différents et de nombreuses salles permettent à un équipage allant jusqu\'à 80 personnes de vivre, de s’entraîner, de se soigner...\r\nLe Javelin dispose également d\'un hangar pour un vaisseau de taille moyenne et pour un vaisseau parasite de type MPUV.', 'vaisseau', 1),
(83, 'vaisseau83.jpg', 'Khartu-Al', 'Aopoa', '204 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Très manœuvrable.\r\nFortes accélérations dans toutes les directions.\r\nCapacité de vol VTOL.', 'Moins armé que les autres chasseurs légers.\r\nFaible rayon d\'action.\r\nPas de cargo.\r\nPas de couchette.\r\nPas d\'équipement utilitaire.', 'C\'est un vaisseau monoplace', 'Petit (31.5m x 12.5m x 8.5m)\r\n\r\n', '67 tonnes\r\n\r\n', '1.325 m/s\r\n\r\n', '0 SCU\r\n\r\n\r\n', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Khartu-Al est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la version \"export\" d\'un chasseur léger Xi\'an, modifiée pour être pilotable par les humains (et être un peu moins bon que la version Xi\'an). Comme tous les chasseurs Xi\'an, le Khartu-Al diffère des vaisseaux humains par son architecture de propulsion. Au lieu d\'avoir un propulseur principal dans l\'axe du vaisseau, il dispose de 4 propulseurs rotatifs qui lui permettent d\'accélérer avec la même force dans toutes les directions. Cela rend le Khartu-Al très manœuvrable et difficile à toucher.\r\n\r\nCependant, le Khartu-Al est moins armé que les chasseurs légers humains.', 'vaisseau', 3),
(84, 'vaisseau84.jpg', 'Kraken', 'Drake Interplanetary', '1980 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Le plus gros porte-vaisseaux pouvant être obtenu par un joueur.\r\nBien armé pour son rôle.\r\n3800 SCU de cargo.\r\nCapacité de vol VTOL.\r\nCapacité à atterrir.', 'Les vaisseaux transportés ne sont pas protégés par la coque.\r\nPeu d\'équipement utilitaires à l\'intérieur (pas d\'infirmerie, pas de prison...).\r\nBlindage léger.', 'Le vaisseau est prévu pour 10 membres d\'équipage', 'Capital (270m x 104m x 64m)', '? tonnes', '? m/s\r\n\r\n', '3792 SCU\r\n\r\n\r\n', 'Quelques fois par an seul, en nombre limité.\r\n\r\nDans des packs \"Concierge\" haut de gamme.', 'Le Kraken est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nAvec sa silhouette qui rappelle les porte-avions de notre temps, ce vaisseau capital est un porte-vaisseaux de combat, capable de transporter deux vaisseaux moyens, quatre vaisseaux légers et une dizaine de motos volantes.\r\n\r\nA l\'intérieur, une immense soute à cargo permet d\'emporter près de 3800 SCU, et un hangar permet de réparer, de ravitailler et de réarmer des vaisseaux.', 'vaisseau', 7),
(85, 'vaisseau85.png', 'Kraken Privateer', 'Drake Interplanetary', '2400 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Le plus gros porte-vaisseaux pouvant être obtenu par un joueur.\r\nBien armé pour son rôle.\r\n10 boutiques configurables.\r\nCapacité de vol VTOL.\r\nCapacité à atterrir.', 'Les vaisseaux transportés ne sont pas protégés par la coque.\r\nPeu d\'équipement utilitaires à l\'intérieur (pas d\'infirmerie, pas de prison...).\r\nBlindage léger.', 'Le vaisseau est prévu pour 10 membres\r\nd\'équipage et 10 commerçants', 'Capital (270m x 104m x 64m)', '? tonnes', '? m/s', '768 + 10 x 189 SCU', 'Vente concept initiale', 'Le Kraken Privateer est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit d\'une variante du Kraken, sacrifiant une partie de la capacité de transport ainsi que le hangar à Dragonfly pour offrir un vrai centre commercial mobile, avec 10 commerces configurables dont 2 dans une zone privée.\r\n\r\nAvec sa silhouette qui rappelle les porte-avions de notre temps, ce vaisseau capital est un porte-vaisseaux de combat, capable de transporter deux vaisseaux moyens et quatre vaisseaux légers.', 'vaisseau', 7),
(86, 'vaisseau86.jpg', 'Liberator', 'Anvil Aerospace', '628 euros seul (taxes comprises, prix constaté en Alpha)', '', 'Frugalité en équipage.\r\nAptitude à transporter tous les véhicules terrestres.\r\nTransporte trois petits vaisseaux.\r\nLongue endurance.\r\nCapacité de 400 SCU.', 'Peu armé.\r\nVaisseaux transportés sans protection.', 'Un pilote et un opérateur tourelle', 'Grand (128m x 68m x 24m)', '? tonnes', '122 m/s', '400 SCU', 'Offre de lancement', 'Le Liberator est l\'un des vaisseaux qui pourra être joué dans Star Citizen.\r\n\r\nIl s\'agit d\'un vaisseau de transport, capable de déplacer du fret, des véhicules ou trois petits vaisseaux. Opéré par deux membres d\'équipage et peu armé, il est surtout destiné au convoyage en zone sécurisée.', 'vaisseau', 2),
(87, 'vaisseau87.jpg', 'M50', 'Origin Jumpworks GmbH', 'Origin Jumpworks GmbH', '', 'Un des meilleurs vaisseaux de course', 'Pas de cargo.\r\nPas de couchette.\r\nPeu armé.', 'C\'est un vaisseau monoplace.', 'Petit (11m x 10m x 3m)', '10 tonnes', '1.345 m/s', '0 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le M50 est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit d\'un vaisseau de course, aussi rapide et maniable que son allure le suggère. Plus rapide que les chasseurs légers, il est capable de s\'en prendre à eux grâce à ses deux canons niveau 2, mais il aura du mal à percer de plus grosses cibles.', 'vaisseau', 11),
(88, 'vaisseau88.jpg', 'Mantis', 'Roberts Space Industry', '164 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Seul vaisseau d\'interdiction.\r\nCouchette.\r\nRapide en ligne droite.', 'Peu armé.\r\nPas de cargo.\r\nHyperspécialisé.\r\nMal vu des autres joueurs.', 'C\'est un monoplace', 'Petit (30m x 17m x 8m)', '? tonnes', '1307 m/s', '0 SCU', 'Pendant sa mise en vente', 'Le Mantis est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit du premier vaisseau dédié à l\'interdiction quantique, capable de sortir d\'autres vaisseaux de leurs voyages quantique, de les localiser, et de les empêcher de repartir.\r\n\r\nAu delà de sa capacité spéciale, le vaisseau est très peu armé.', 'vaisseau', 12),
(89, 'vaisseau89.jpg', 'Merchantman', 'Banu Souli', '420 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Le plus gros vaisseau de transport qui peut atterrir.\r\nPlutôt bien armé pour un transporteur.\r\nUn magasin ambulant.\r\nTechnologies de pointe.\r\nVaisseau prestigieux pour les Banus.\r\nCapacité de vol VTOL.', 'Hyper-spécialisé dans le commerce.\r\nPeu manœuvrable.', 'Le vaisseau est conçu pour 8 membres d\'équipage', 'Grand (160m x 160m x 65m)', '9.600 tonnes', '? m/s', '3584 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Merchantman est l\'un des vaisseaux qui sera jouable dans Star Citizen.\r\n\r\nIl s\'agit d\'un vaisseau marchand extraterrestre, emblématique de l\'espèce Banu. En effet, ce peuple de marchands utilise quasi exclusivement les Merchantmans comme vaisseaux de transport, allant de point de commerce en point de commerce pour faire des profits.\r\n\r\nComme tous les vaisseaux Banu, le Merchantman concentre les meilleures technologies de toutes les autres espèces et est optimisé pour son rôle. C\'est le plus gros vaisseau de transport pouvant atterrir et il est plutôt rapide pour sa taille en ligne droite. Il est protégé par de puissants canons qui se rangent dans la coque.\r\nLe Merchantman est un vaisseau échoppe : à l\'intérieur, il dispose d\'une salle de négociation et de vitrines pour présenter les biens à vendre aux clients qui viennent dans le vaisseau.', 'vaisseau', 0),
(90, 'vaisseau90.jpg', 'Mercury Star Runner', 'Crusader Industries', '270 dollars seul (taxes comprises, prix constaté en Alpha)', '', '96 SCU de cargo.\r\n5 ordinateurs de bord.\r\nCouchettes pour 3 personnes.\r\nSoute \"secrète\".\r\nTransport de données.', 'Peu armé.\r\nVision du pilote limitée sur la droite.', 'Le vaisseau est conçu pour trois membres d\'équipage', 'Moyen (40m x 38m x 11.6m)', '? tonnes', '1050 m/s', '114 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le Mercury Star Runner est l\'un des vaisseaux jouables dans Star Citizen.\r\n\r\nC\'est un vaisseau de transport permettant de transporter à la fois des marchandises et des données. Peu armé, il compte plutôt sur sa vitesse pour s\'en sortir en cas de danger.\r\n\r\nGrâce à son scanner et à ses nombreux ordinateurs de bord, il peut également servir à faire de l\'écoute électronique pour acquérir des informations. Il dispose également d\'une pièce \"secrète\", protégée contre les scans, pour cacher une personne ou des marchandises que l\'on souhaite transporter en toute discrétion.', 'vaisseau', 6),
(91, 'vaisseau91.jpg', 'MOLE', 'Argo Astronautics', '344 euros seul (taxes comprises, prix constaté en Alpha)', '', 'Source de revenus solide.\r\nConteneurs détachables.\r\nÉquipement de vie pour 4 personnes.\r\nCarrière qui ne nécessite pas de combat.\r\nVTOL.', 'Peu maniable.\r\nDéfense faible.\r\nMinage impossible depuis le poste de pilotage.\r\n4 personnes nécessaires pour une utilisation optimale.', 'Pilote et poste de minage principal', 'Moyen (38.5m x 17m x 8m)', '?', '1090 m/s', '288 SCU', 'Mise en vente initiale', 'Le MOLE est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit du second vaisseau de minage accessible pour les joueurs. Il permet à un équipage de 4 joueurs de localiser des ressources, de fracturer des rochers à l\'aide de trois rayons lasers, et d\'en extraire les minerais avec un rayon tracteur. Ne nécessitant aucun investissement initial, l\'exploitation minière est une source solide de revenus.\r\n\r\nLe vaisseau est faiblement armé, mais dispose de tout le confort intérieur pour son équipage.', 'vaisseau', 4),
(92, 'vaisseau92.jpg', 'MPUV Cargo', 'Argo Astronautics', '42 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Un vaisseau parasite avec du cargo.\r\nModulaire.\r\nCapacité de vol VTOL.', 'Pas de couchette.\r\nPeu de cargo.\r\nPas armé.\r\nFragile.\r\nLent.', 'C\'est un monoplace', 'Parasite (9.5m x 8.5m x 4.3m)', '12 tonnes', '900 m/s', '2 SCU', 'Quelques fois par an seul.\r\nDans des packs \"Concierge\".', 'Le MPUV Cargo est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante Cargo de la gamme MPUV, une série de vaisseaux parasites modulaires, non armés, qui sont conçus pour être utilisés depuis les vaisseaux militaires capitaux comme l\'Idris-M et le Javelin.\r\n\r\nLe MPUV est un vaisseau monoplace qui peut transporter 2 SCU de cargo. Son module cargo peut être remplacé par un module de transport de personnes.', 'vaisseau', 4),
(93, 'vaisseau93.jpg', 'MPUV Personnel', 'Argo Astronautics', '48 dollars seul (taxes comprises, prix constaté en Alpha)', '', 'Un vaisseau parasite qui transporte 8 personnes.\r\nModulaire.\r\nCapacité de vol VTOL.', 'Pas de couchettes.\r\nPas armé.\r\nFragile.\r\nLent.\r\nPas de cargo.\r\nPas de moteur quantique.', 'Un pilote et 8 passagers', 'Parasite (9.5m x 8.5m x 4.3m)', '12 tonnes', '900 m/s', '0-2 SCU', 'Quelques fois par an seul.\r\n\r\nDans des packs \"Concierge\".', 'Le MPUV Personnel est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nIl s\'agit de la variante transport de personnes de la gamme MPUV, une série de vaisseaux parasites modulaires, non armés, qui sont conçus pour être utilisés depuis les vaisseaux militaires capitaux comme l\'Idris-M et le Javelin.\r\n\r\nLe MPUV est un vaisseau qui peut transporter 8 personnes. Son module de transport de personnes peut être remplacé par un module de transport de cargo de 2 SCU.', 'vaisseau', 4),
(94, 'vaisseau94.jpg', 'Mustang Alpha', 'Consolidated Outland', '49 euros avec un pack de départ.\r\n\r\n33 euros seul (il faut un pack pour pouvoir jouer).\r\n', '', 'Une maniabilité comparable à celle d\'un chasseur.\r\nDeux canons taille 2 sur tourelle.\r\nDifficile à toucher.\r\nTrès bonne visibilité pour le pilote.', 'Fragile.\r\nPeu de cargo.\r\nPas d\'emplacement pour une caisse transportée à la main.\r\nPas de couchette.', 'C\'est un mono place', 'Petit (17.5m x 15.5m x 5.5m)', '17 tonnes', '1160 m/s', '6 SCU', 'Toujours disponible, seul ou en pack', 'Le Mustang Alpha est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nLe Mustang Alpha est l\'un des deux vaisseaux les moins chers dit \"de départ\", avec l\'Aurora MR. C\'est avec l\'un de ces deux appareils que la plupart des joueurs vont débuter leur aventure spatiale. Il est donc naturel de le comparer à ce dernier. Le Mustang a la particularité d\'avoir une tourelle téléopérée sous le menton, qui le rend particulièrement redoutable en combat. Il peut également transporter quelques unités de cargo.\r\n\r\nLe Mustang Alpha est plus maniable et mieux armé que l\'Aurora. En revanche, il est un peu plus fragile, moins rapide en ligne droite, et ne dispose pas de couchette.', 'vaisseau', 5),
(95, 'vaisseau95.jpg', 'Mustang Beta', 'Consolidated Outland', '44 euros seul (il faut un pack pour pouvoir jouer)', '', 'Une maniabilité comparable à celle d\'un chasseur.\r\nDeux canons taille 2 sur tourelle.\r\nDifficile à toucher.\r\nTrès bonne visibilité pour le pilote.\r\nUn aménagement intérieur complet.', 'Fragile.\r\nPas de Cargo.\r\nPas d\'emplacement pour une caisse transportée à la main.', 'C\'est un mono place\r\n', 'Petit (17.5m x 15.5m x 5.5m)', '39 tonnes', '1215 m/s', '0 SCU', 'Toujours disponible, seul', 'Le Mustang Beta est l\'un des vaisseaux disponibles de Star Citizen.\r\n\r\nAvec sa cabine dotée d\'une douche, de toilettes, d\'une cuisine et d\'un lit, le Mustang Beta est un vaisseau conçu pour le voyage de longe durée, bien plus que les Auroras. Pour ce faire, il sacrifie complètement le transport de marchandises.\r\n\r\nIl conserve tous les atouts au combat du Mustang Alpha : la tourelle téléopérée sous le menton, la silhouette de petite taille et la grande agilité.', 'vaisseau', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE `ville` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `image5` varchar(255) NOT NULL,
  `image6` varchar(255) NOT NULL,
  `image7` varchar(255) NOT NULL,
  `image8` varchar(255) NOT NULL,
  `image9` varchar(255) NOT NULL,
  `paragraphe1` varchar(1000) NOT NULL,
  `paragraphe2` varchar(1000) NOT NULL,
  `paragraphe3` varchar(1000) NOT NULL,
  `paragraphe4` varchar(1000) NOT NULL,
  `paragraphe5` varchar(1000) NOT NULL,
  `paragraphe6` varchar(1000) NOT NULL,
  `paragraphe7` varchar(1000) NOT NULL,
  `paragraphe8` varchar(1000) NOT NULL,
  `paragraphe9` varchar(1000) NOT NULL,
  `paragraphe10` varchar(1000) NOT NULL,
  `paragraphe13` varchar(1000) NOT NULL,
  `paragraphe14` varchar(1000) NOT NULL,
  `paragraphe15` varchar(1000) NOT NULL,
  `titre1` varchar(1000) NOT NULL,
  `titre2` varchar(1000) NOT NULL,
  `titre3` varchar(1000) NOT NULL,
  `titre4` varchar(1000) NOT NULL,
  `titre5` varchar(1000) NOT NULL,
  `titre6` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`id`, `nom`, `image`, `image2`, `image3`, `image4`, `image5`, `image6`, `image7`, `image8`, `image9`, `paragraphe1`, `paragraphe2`, `paragraphe3`, `paragraphe4`, `paragraphe5`, `paragraphe6`, `paragraphe7`, `paragraphe8`, `paragraphe9`, `paragraphe10`, `paragraphe13`, `paragraphe14`, `paragraphe15`, `titre1`, `titre2`, `titre3`, `titre4`, `titre5`, `titre6`) VALUES
(1, 'Area18', 'ville.jpg', 'ville2.png', 'ville3.png', 'ville4.png', 'ville5.png', 'ville6.png', 'ville7.png', 'ville8.png', 'ville9.png', 'Area18 est la première ville d\'ArcCorp dans Star Citizen. Implantée au patch 3.5, elle est largement inspirée de New York avec ses hauts buildings et ses gigantesques panneaux publicitaires. ', '', 'Principal port commercial de la planète, il abrite également le quartier général de l\'ArcCorp Corporation. Pour assurer la sécurité des lieux, la célèbre entreprise BlackJac Security a été engagée. Néanmoins, il est fortement conseillé en cas de problème de se rendre aux bureaux de l\'UEE Advocacy.', 'Elle est divisée en deux quartiers à l\'heure actuelle : le Ryker Memorial Spaceport et l\'ArcCorp Plaza. Ils sont reliés entre eux par un réseau de bus volants : l\'ArcCorp Cityflight.', 'Point d\'entrée de la cité, il sera également votre premier contact avec le nouveau lieu de la 3.5. Il dispose de hangars semblables à ceux qui peuvent être trouvés sur Lorville.', 'A l\'intérieur vous retrouverez tout le confort des grands spaceports. De plus, une zone spécifique aux vols commerciaux est aussi indiquée. Elle n\'est pour l\'instant pas accessible en jeu.', 'Plusieurs consoles de vaisseaux sont disponibles dans le hall principal. Vous trouverez également un espace VIP avec des prestations à la hauteur du standing. Plusieurs grandes baies vitrées sont aussi éparpillées aux quatre coins du terminal, donnant une magnifique vue de la ville et de ses imposants buildings.\nIl dispose d\'un accès direct à l\'ArcCorp Plaza en empruntant l\'ArcCorp Cityflight, la ligne de bus volants.', 'L\'ArcCorp Cityflight est la ligne de bus volante reliant les différents quartiers d\'Area18. Il ne dispose que d\'une seule ligne actuellement. Elle relie le Ryker Memorial Spaceport à l\'ArcCorp Plaza.', 'Sur chaque station vous retrouverez deux quais, permettant d\'accélérer le trafic. Les temps d\'attentes entre rames est à peu près identique à celui du métro de Lorville.\r\nA chaque extrémité des rames vous pourrez retrouver de grandes baies vitrés vous permettant de profiter de la vue.', 'ArcCorp Plaza est à l\'heure actuelle le coeur économique de la ville. Il abrite les bureaux d\'ArcCorp Corporation. Le bâtiment domine une place occupée par le célèbre dôme de couleur bleutée visible sur les nouveaux écrans d\'accueil.\r\nC\'est ici également que vous retrouverez l\'ensemble des boutiques de la ville. On retrouve des enseignes connues telles que Casaba ou un Dumper Depot. Mais une zone réservée au déchargement de marchandises et un nouveau vendeur d\'armes ont aussi pignon sur rue.\r\nIl est même dit que c\'est par là que se trouverait le nouveau donneur de mission, Tecia Pacheco', 'Comme Lorville, Area18 est un important espace d\'échange du système Stanton. Elle dispose de pas moins de 22 consoles d\'achat et vente au Jobwell situé dans le quartier du Plaza.\r\nVous pouvez aussi décharger vos Prospector en vous rendant dans les bureaux d\'ArcCorp Corporation', 'Vous êtes maintenant prêts à vous élancer dans la cité. Attention cependant à ne pas vous perdre dans les recoins sinueux de certaines zones autour du Plaza. Et prenez sur vous une paire de lunettes, vous risquez d\'en prendre plein les yeux !', '', 'Le Ryker Memorial Spaceport', 'L\'ArcCorp Cityflight', 'ArcCorp Plaza', 'Les consoles', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `constructeur`
--
ALTER TABLE `constructeur`
  ADD PRIMARY KEY (`idConstructeur`);

--
-- Indexes for table `lieux`
--
ALTER TABLE `lieux`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lunes`
--
ALTER TABLE `lunes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_recover`
--
ALTER TABLE `password_recover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phpbb_acl_groups`
--
ALTER TABLE `phpbb_acl_groups`
  ADD KEY `group_id` (`group_id`),
  ADD KEY `auth_opt_id` (`auth_option_id`),
  ADD KEY `auth_role_id` (`auth_role_id`);

--
-- Indexes for table `phpbb_acl_options`
--
ALTER TABLE `phpbb_acl_options`
  ADD PRIMARY KEY (`auth_option_id`),
  ADD UNIQUE KEY `auth_option` (`auth_option`);

--
-- Indexes for table `phpbb_acl_roles`
--
ALTER TABLE `phpbb_acl_roles`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `role_type` (`role_type`),
  ADD KEY `role_order` (`role_order`);

--
-- Indexes for table `phpbb_acl_roles_data`
--
ALTER TABLE `phpbb_acl_roles_data`
  ADD PRIMARY KEY (`role_id`,`auth_option_id`),
  ADD KEY `ath_op_id` (`auth_option_id`);

--
-- Indexes for table `phpbb_acl_users`
--
ALTER TABLE `phpbb_acl_users`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `auth_option_id` (`auth_option_id`),
  ADD KEY `auth_role_id` (`auth_role_id`);

--
-- Indexes for table `phpbb_attachments`
--
ALTER TABLE `phpbb_attachments`
  ADD PRIMARY KEY (`attach_id`),
  ADD KEY `filetime` (`filetime`),
  ADD KEY `post_msg_id` (`post_msg_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `poster_id` (`poster_id`),
  ADD KEY `is_orphan` (`is_orphan`);

--
-- Indexes for table `phpbb_banlist`
--
ALTER TABLE `phpbb_banlist`
  ADD PRIMARY KEY (`ban_id`),
  ADD KEY `ban_end` (`ban_end`),
  ADD KEY `ban_user` (`ban_userid`,`ban_exclude`),
  ADD KEY `ban_email` (`ban_email`,`ban_exclude`),
  ADD KEY `ban_ip` (`ban_ip`,`ban_exclude`);

--
-- Indexes for table `phpbb_bbcodes`
--
ALTER TABLE `phpbb_bbcodes`
  ADD PRIMARY KEY (`bbcode_id`),
  ADD KEY `display_on_post` (`display_on_posting`);

--
-- Indexes for table `phpbb_bookmarks`
--
ALTER TABLE `phpbb_bookmarks`
  ADD PRIMARY KEY (`topic_id`,`user_id`);

--
-- Indexes for table `phpbb_bots`
--
ALTER TABLE `phpbb_bots`
  ADD PRIMARY KEY (`bot_id`),
  ADD KEY `bot_active` (`bot_active`);

--
-- Indexes for table `phpbb_config`
--
ALTER TABLE `phpbb_config`
  ADD PRIMARY KEY (`config_name`),
  ADD KEY `is_dynamic` (`is_dynamic`);

--
-- Indexes for table `phpbb_config_text`
--
ALTER TABLE `phpbb_config_text`
  ADD PRIMARY KEY (`config_name`);

--
-- Indexes for table `phpbb_confirm`
--
ALTER TABLE `phpbb_confirm`
  ADD PRIMARY KEY (`session_id`,`confirm_id`),
  ADD KEY `confirm_type` (`confirm_type`);

--
-- Indexes for table `phpbb_disallow`
--
ALTER TABLE `phpbb_disallow`
  ADD PRIMARY KEY (`disallow_id`);

--
-- Indexes for table `phpbb_drafts`
--
ALTER TABLE `phpbb_drafts`
  ADD PRIMARY KEY (`draft_id`),
  ADD KEY `save_time` (`save_time`);

--
-- Indexes for table `phpbb_ext`
--
ALTER TABLE `phpbb_ext`
  ADD UNIQUE KEY `ext_name` (`ext_name`);

--
-- Indexes for table `phpbb_extensions`
--
ALTER TABLE `phpbb_extensions`
  ADD PRIMARY KEY (`extension_id`);

--
-- Indexes for table `phpbb_extension_groups`
--
ALTER TABLE `phpbb_extension_groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `phpbb_forums`
--
ALTER TABLE `phpbb_forums`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `left_right_id` (`left_id`,`right_id`),
  ADD KEY `forum_lastpost_id` (`forum_last_post_id`);

--
-- Indexes for table `phpbb_forums_access`
--
ALTER TABLE `phpbb_forums_access`
  ADD PRIMARY KEY (`forum_id`,`user_id`,`session_id`);

--
-- Indexes for table `phpbb_forums_track`
--
ALTER TABLE `phpbb_forums_track`
  ADD PRIMARY KEY (`user_id`,`forum_id`);

--
-- Indexes for table `phpbb_forums_watch`
--
ALTER TABLE `phpbb_forums_watch`
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `notify_stat` (`notify_status`);

--
-- Indexes for table `phpbb_groups`
--
ALTER TABLE `phpbb_groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `group_legend_name` (`group_legend`,`group_name`);

--
-- Indexes for table `phpbb_icons`
--
ALTER TABLE `phpbb_icons`
  ADD PRIMARY KEY (`icons_id`),
  ADD KEY `display_on_posting` (`display_on_posting`);

--
-- Indexes for table `phpbb_lang`
--
ALTER TABLE `phpbb_lang`
  ADD PRIMARY KEY (`lang_id`),
  ADD KEY `lang_iso` (`lang_iso`);

--
-- Indexes for table `phpbb_log`
--
ALTER TABLE `phpbb_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `log_type` (`log_type`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `reportee_id` (`reportee_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `log_time` (`log_time`);

--
-- Indexes for table `phpbb_login_attempts`
--
ALTER TABLE `phpbb_login_attempts`
  ADD KEY `att_ip` (`attempt_ip`,`attempt_time`),
  ADD KEY `att_for` (`attempt_forwarded_for`,`attempt_time`),
  ADD KEY `att_time` (`attempt_time`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phpbb_migrations`
--
ALTER TABLE `phpbb_migrations`
  ADD PRIMARY KEY (`migration_name`);

--
-- Indexes for table `phpbb_moderator_cache`
--
ALTER TABLE `phpbb_moderator_cache`
  ADD KEY `disp_idx` (`display_on_index`),
  ADD KEY `forum_id` (`forum_id`);

--
-- Indexes for table `phpbb_modules`
--
ALTER TABLE `phpbb_modules`
  ADD PRIMARY KEY (`module_id`),
  ADD KEY `left_right_id` (`left_id`,`right_id`),
  ADD KEY `module_enabled` (`module_enabled`),
  ADD KEY `class_left_id` (`module_class`,`left_id`);

--
-- Indexes for table `phpbb_notifications`
--
ALTER TABLE `phpbb_notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `item_ident` (`notification_type_id`,`item_id`),
  ADD KEY `user` (`user_id`,`notification_read`);

--
-- Indexes for table `phpbb_notification_emails`
--
ALTER TABLE `phpbb_notification_emails`
  ADD PRIMARY KEY (`notification_type_id`,`item_id`,`item_parent_id`,`user_id`);

--
-- Indexes for table `phpbb_notification_types`
--
ALTER TABLE `phpbb_notification_types`
  ADD PRIMARY KEY (`notification_type_id`),
  ADD UNIQUE KEY `type` (`notification_type_name`);

--
-- Indexes for table `phpbb_oauth_accounts`
--
ALTER TABLE `phpbb_oauth_accounts`
  ADD PRIMARY KEY (`user_id`,`provider`);

--
-- Indexes for table `phpbb_oauth_states`
--
ALTER TABLE `phpbb_oauth_states`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `provider` (`provider`);

--
-- Indexes for table `phpbb_oauth_tokens`
--
ALTER TABLE `phpbb_oauth_tokens`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `provider` (`provider`);

--
-- Indexes for table `phpbb_poll_options`
--
ALTER TABLE `phpbb_poll_options`
  ADD KEY `poll_opt_id` (`poll_option_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `phpbb_poll_votes`
--
ALTER TABLE `phpbb_poll_votes`
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `vote_user_id` (`vote_user_id`),
  ADD KEY `vote_user_ip` (`vote_user_ip`);

--
-- Indexes for table `phpbb_posts`
--
ALTER TABLE `phpbb_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `poster_ip` (`poster_ip`),
  ADD KEY `poster_id` (`poster_id`),
  ADD KEY `tid_post_time` (`topic_id`,`post_time`),
  ADD KEY `post_username` (`post_username`),
  ADD KEY `post_visibility` (`post_visibility`);

--
-- Indexes for table `phpbb_privmsgs`
--
ALTER TABLE `phpbb_privmsgs`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `author_ip` (`author_ip`),
  ADD KEY `message_time` (`message_time`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `root_level` (`root_level`);

--
-- Indexes for table `phpbb_privmsgs_folder`
--
ALTER TABLE `phpbb_privmsgs_folder`
  ADD PRIMARY KEY (`folder_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phpbb_privmsgs_rules`
--
ALTER TABLE `phpbb_privmsgs_rules`
  ADD PRIMARY KEY (`rule_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phpbb_privmsgs_to`
--
ALTER TABLE `phpbb_privmsgs_to`
  ADD KEY `msg_id` (`msg_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `usr_flder_id` (`user_id`,`folder_id`);

--
-- Indexes for table `phpbb_profile_fields`
--
ALTER TABLE `phpbb_profile_fields`
  ADD PRIMARY KEY (`field_id`),
  ADD KEY `fld_type` (`field_type`),
  ADD KEY `fld_ordr` (`field_order`);

--
-- Indexes for table `phpbb_profile_fields_data`
--
ALTER TABLE `phpbb_profile_fields_data`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `phpbb_profile_fields_lang`
--
ALTER TABLE `phpbb_profile_fields_lang`
  ADD PRIMARY KEY (`field_id`,`lang_id`,`option_id`);

--
-- Indexes for table `phpbb_profile_lang`
--
ALTER TABLE `phpbb_profile_lang`
  ADD PRIMARY KEY (`field_id`,`lang_id`);

--
-- Indexes for table `phpbb_ranks`
--
ALTER TABLE `phpbb_ranks`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `phpbb_reports`
--
ALTER TABLE `phpbb_reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `pm_id` (`pm_id`);

--
-- Indexes for table `phpbb_reports_reasons`
--
ALTER TABLE `phpbb_reports_reasons`
  ADD PRIMARY KEY (`reason_id`);

--
-- Indexes for table `phpbb_search_results`
--
ALTER TABLE `phpbb_search_results`
  ADD PRIMARY KEY (`search_key`);

--
-- Indexes for table `phpbb_search_wordlist`
--
ALTER TABLE `phpbb_search_wordlist`
  ADD PRIMARY KEY (`word_id`),
  ADD UNIQUE KEY `wrd_txt` (`word_text`),
  ADD KEY `wrd_cnt` (`word_count`);

--
-- Indexes for table `phpbb_search_wordmatch`
--
ALTER TABLE `phpbb_search_wordmatch`
  ADD UNIQUE KEY `un_mtch` (`word_id`,`post_id`,`title_match`),
  ADD KEY `word_id` (`word_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `phpbb_sessions`
--
ALTER TABLE `phpbb_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `session_time` (`session_time`),
  ADD KEY `session_user_id` (`session_user_id`),
  ADD KEY `session_fid` (`session_forum_id`);

--
-- Indexes for table `phpbb_sessions_keys`
--
ALTER TABLE `phpbb_sessions_keys`
  ADD PRIMARY KEY (`key_id`,`user_id`),
  ADD KEY `last_login` (`last_login`);

--
-- Indexes for table `phpbb_sitelist`
--
ALTER TABLE `phpbb_sitelist`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `phpbb_smilies`
--
ALTER TABLE `phpbb_smilies`
  ADD PRIMARY KEY (`smiley_id`),
  ADD KEY `display_on_post` (`display_on_posting`);

--
-- Indexes for table `phpbb_styles`
--
ALTER TABLE `phpbb_styles`
  ADD PRIMARY KEY (`style_id`),
  ADD UNIQUE KEY `style_name` (`style_name`);

--
-- Indexes for table `phpbb_teampage`
--
ALTER TABLE `phpbb_teampage`
  ADD PRIMARY KEY (`teampage_id`);

--
-- Indexes for table `phpbb_topics`
--
ALTER TABLE `phpbb_topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `forum_id_type` (`forum_id`,`topic_type`),
  ADD KEY `last_post_time` (`topic_last_post_time`),
  ADD KEY `fid_time_moved` (`forum_id`,`topic_last_post_time`,`topic_moved_id`),
  ADD KEY `topic_visibility` (`topic_visibility`),
  ADD KEY `forum_vis_last` (`forum_id`,`topic_visibility`,`topic_last_post_id`),
  ADD KEY `latest_topics` (`forum_id`,`topic_last_post_time`,`topic_last_post_id`,`topic_moved_id`);

--
-- Indexes for table `phpbb_topics_posted`
--
ALTER TABLE `phpbb_topics_posted`
  ADD PRIMARY KEY (`user_id`,`topic_id`);

--
-- Indexes for table `phpbb_topics_track`
--
ALTER TABLE `phpbb_topics_track`
  ADD PRIMARY KEY (`user_id`,`topic_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `phpbb_topics_watch`
--
ALTER TABLE `phpbb_topics_watch`
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `notify_stat` (`notify_status`);

--
-- Indexes for table `phpbb_users`
--
ALTER TABLE `phpbb_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username_clean` (`username_clean`),
  ADD KEY `user_birthday` (`user_birthday`),
  ADD KEY `user_type` (`user_type`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `phpbb_user_group`
--
ALTER TABLE `phpbb_user_group`
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_leader` (`group_leader`);

--
-- Indexes for table `phpbb_user_notifications`
--
ALTER TABLE `phpbb_user_notifications`
  ADD UNIQUE KEY `itm_usr_mthd` (`item_type`,`item_id`,`user_id`,`method`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `uid_itm_id` (`user_id`,`item_id`),
  ADD KEY `usr_itm_tpe` (`user_id`,`item_type`,`item_id`);

--
-- Indexes for table `phpbb_warnings`
--
ALTER TABLE `phpbb_warnings`
  ADD PRIMARY KEY (`warning_id`);

--
-- Indexes for table `phpbb_words`
--
ALTER TABLE `phpbb_words`
  ADD PRIMARY KEY (`word_id`);

--
-- Indexes for table `phpbb_zebra`
--
ALTER TABLE `phpbb_zebra`
  ADD PRIMARY KEY (`user_id`,`zebra_id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `vaisseau`
--
ALTER TABLE `vaisseau`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `constructeur`
--
ALTER TABLE `constructeur`
  MODIFY `idConstructeur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lieux`
--
ALTER TABLE `lieux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lunes`
--
ALTER TABLE `lunes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `password_recover`
--
ALTER TABLE `password_recover`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phpbb_acl_options`
--
ALTER TABLE `phpbb_acl_options`
  MODIFY `auth_option_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `phpbb_acl_roles`
--
ALTER TABLE `phpbb_acl_roles`
  MODIFY `role_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `phpbb_attachments`
--
ALTER TABLE `phpbb_attachments`
  MODIFY `attach_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phpbb_banlist`
--
ALTER TABLE `phpbb_banlist`
  MODIFY `ban_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phpbb_bots`
--
ALTER TABLE `phpbb_bots`
  MODIFY `bot_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `phpbb_disallow`
--
ALTER TABLE `phpbb_disallow`
  MODIFY `disallow_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phpbb_drafts`
--
ALTER TABLE `phpbb_drafts`
  MODIFY `draft_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phpbb_extensions`
--
ALTER TABLE `phpbb_extensions`
  MODIFY `extension_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `phpbb_extension_groups`
--
ALTER TABLE `phpbb_extension_groups`
  MODIFY `group_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phpbb_forums`
--
ALTER TABLE `phpbb_forums`
  MODIFY `forum_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phpbb_groups`
--
ALTER TABLE `phpbb_groups`
  MODIFY `group_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `phpbb_icons`
--
ALTER TABLE `phpbb_icons`
  MODIFY `icons_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phpbb_lang`
--
ALTER TABLE `phpbb_lang`
  MODIFY `lang_id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phpbb_log`
--
ALTER TABLE `phpbb_log`
  MODIFY `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `phpbb_modules`
--
ALTER TABLE `phpbb_modules`
  MODIFY `module_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `phpbb_notifications`
--
ALTER TABLE `phpbb_notifications`
  MODIFY `notification_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phpbb_notification_types`
--
ALTER TABLE `phpbb_notification_types`
  MODIFY `notification_type_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `phpbb_posts`
--
ALTER TABLE `phpbb_posts`
  MODIFY `post_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `phpbb_privmsgs`
--
ALTER TABLE `phpbb_privmsgs`
  MODIFY `msg_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phpbb_privmsgs_folder`
--
ALTER TABLE `phpbb_privmsgs_folder`
  MODIFY `folder_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phpbb_privmsgs_rules`
--
ALTER TABLE `phpbb_privmsgs_rules`
  MODIFY `rule_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phpbb_profile_fields`
--
ALTER TABLE `phpbb_profile_fields`
  MODIFY `field_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phpbb_ranks`
--
ALTER TABLE `phpbb_ranks`
  MODIFY `rank_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phpbb_reports`
--
ALTER TABLE `phpbb_reports`
  MODIFY `report_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phpbb_reports_reasons`
--
ALTER TABLE `phpbb_reports_reasons`
  MODIFY `reason_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phpbb_search_wordlist`
--
ALTER TABLE `phpbb_search_wordlist`
  MODIFY `word_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `phpbb_sitelist`
--
ALTER TABLE `phpbb_sitelist`
  MODIFY `site_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phpbb_smilies`
--
ALTER TABLE `phpbb_smilies`
  MODIFY `smiley_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `phpbb_styles`
--
ALTER TABLE `phpbb_styles`
  MODIFY `style_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phpbb_teampage`
--
ALTER TABLE `phpbb_teampage`
  MODIFY `teampage_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phpbb_topics`
--
ALTER TABLE `phpbb_topics`
  MODIFY `topic_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phpbb_users`
--
ALTER TABLE `phpbb_users`
  MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `phpbb_warnings`
--
ALTER TABLE `phpbb_warnings`
  MODIFY `warning_id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phpbb_words`
--
ALTER TABLE `phpbb_words`
  MODIFY `word_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vaisseau`
--
ALTER TABLE `vaisseau`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
