-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 20 avr. 2026 à 08:51
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `miniCrabe`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date_` date NOT NULL,
  `itinerary` int(11) NOT NULL,
  `summary` varchar(250) DEFAULT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `title`, `date_`, `itinerary`, `summary`, `content`) VALUES
(5, 'Découverte du Golfe du Morbihan', '2026-04-15', 3, 'Randonnée côtière offrant des vues panoramiques sur le golfe et ses îles. Parcours accessible avec arrêts observation oiseaux.', 'Cette randonnée vous emmène à la découverte des sentiers côtiers du golfe du Morbihan, classé Grand Site de France. Vous profiterez de paysages variés alternant falaises douces, criques abritées et plages de sable fin. Le parcours longe la rive sud du golfe avec des points de vue exceptionnels sur les îles de Port-Navalo, d\'Arz et de Hoëdic. Des panneaux pédagogiques installés le long du sentier permettent d\'identifier les espèces d\'oiseaux migrateurs fréquentant la zone, notamment les sternes, les goélands argentés et les hérons cendrés qui nichent dans les roselières environnantes. Une activité de sensibilisation à l\'environnement marin est incluse avec un naturaliste accompagnateur qui expliquera l\'importance des zones humides littorales et les efforts de conservation en cours. Prévoyez des jumelles pour l\'observation ornithologique et un pique-nique pour profiter des nombreux spots aménagés. Le départ se fait depuis le port de Port-Navalo où vous pourrez stationner gratuitement. Accessible aux familles avec enfants dès 8 ans, ce parcours offre également des opportunités de photographie de paysage avec la lumière changeante du golfe.'),
(6, 'Forêt de Paimpont - Traversée Mystique', '2026-04-12', 4, 'Immersion dans la légendaire forêt de Brocéliande avec parcours forestier ombragé et sources enchantées.', 'Explorez la mythique forêt de Brocéliande, véritable écrin de légendes arthuriennes qui inspirent écrivains et artistes depuis des siècles. Ce parcours de 14 kilomètres traverse des sous-bois centenaires composés de chênes, de hêtres et de châtaigniers dont certains dépassent les 200 ans. Vous serez guidé jusqu\'à la célèbre Fontaine de Barenton, lieu supposé des enchantements de Merlin l\'Enchanteur selon les textes médiévaux. Des guides locaux passionnés accompagneront le groupe pour raconter les légendes des chevaliers de la Table Ronde, de la fée Viviane et du roi Arthur, enrichissant chaque étape de récits historiques et folkloriques. Le sentier passe également par le Val sans Retour, où Morgane aurait enfermé les chevaliers infidèles, et la tombe du géant Roland. Prévoyez des chaussures de marche adaptées car le terrain peut être boueux après la pluie. Des pauses sont prévues pour admirer la flore locale incluant des orchidées sauvages au printemps et des fougères géantes. Une aire de pique-nique aménagée permet de faire une pause gastronomique avec des produits régionaux. Cette randonnée convient aux amateurs de littérature fantastique et de nature préservée, avec un dénivelé modéré qui la rend accessible aux randonneurs occasionnels.'),
(7, 'Presqu\'île de Rhuys - Tour Complets', '2026-04-10', 5, 'Boucle complète autour de la presqu\'île avec plages sauvages et phares historiques à découvrir. ', 'Cette randonnée circum-péninsulaire offre une diversité exceptionnelle de paysages bretons sur plus de 22 kilomètres. Vous commencerez par longer les plages de sable fin de la côte sud avant d\'atteindre les criques rocheuses de la côte ouest battue par l\'océan Atlantique. Le parcours comprend trois phares emblématiques : le Phare de la Vieille avec sa tour blanche et noire offrant une vue panoramique à 360 degrés sur le golfe et l\'océan, le Phare de Port-Navalo qui marque l\'entrée du golfe, et le Phare d\'Eckmühl accessible via un sentier secondaire. Des villages de pêcheurs traditionnels comme Baden et Arzon jalonnent le trajet avec leurs maisons en pierre de granit et leurs ports pittoresques. Des arrêts sont prévus pour observer les bancs de moules et d\'huîtres cultivés dans les parcs ostréicoles visibles depuis le sentier. Prévoyez un équipement anti-vent et des couches superposées car les conditions météorologiques peuvent changer rapidement sur la presqu\'île. Des points de ravitaillement sont disponibles à Sarzeau et à Port-Navalo pour acheter de l\'eau et des snacks. Cette randonnée exigeante convient aux marcheurs expérimentés habitués aux longues distances avec un dénivelé cumulatif d\'environ 280 mètres. Un guide accompagnateur sera présent pour partager des anecdotes sur l\'histoire maritime de la région et les traditions ostréicoles locales.'),
(8, 'Carnac - Alignements et Sentiers', '2026-04-08', 6, 'Randonnée culturelle combinant mégalithes préhistoriques et sentiers côtiers bretons authentiques.', 'Découvrez les célèbres alignements de Carnac, l\'un des plus grands ensembles mégalithiques au monde avec plus de 3000 menhirs dressés il y a environ 6000 ans. Cette randonnée allie patrimoine archéologique exceptionnel et nature sauvage préservée le long du littoral morbihannais. Le parcours commence par une visite guidée des sites mégalithiques avec un archéologue spécialisé qui expliquera les théories actuelles sur l\'usage de ces pierres dressées : rites funéraires, calendriers astronomiques ou marques territoriales. Vous traverserez ensuite le sentier côtier du GR34 qui longe la plage de la Madeleine avec des vues sur les îles Houat et Hoëdic. Des panneaux interprétatifs permettent d\'identifier la faune et la flore littorales incluant les genêts à balais, les bruyères et les oies cendrées hivernantes. Une pause déjeuner est prévue dans un espace aménagé près du musée de Préhistoire où vous pourrez approfondir vos connaissances avec les expositions permanentes. Cette randonnée convient aux familles et aux curieux d\'histoire avec un parcours plat et bien balisé. Prévoyez un chapeau et de la crème solaire car l\'exposition au soleil est importante sur les portions ouvertes du sentier. Des toilettes publiques sont disponibles au parking des alignements et à la plage de Kermario.'),
(9, 'Île de Groix - Exploration Intérieure', '2026-04-05', 7, 'Randonnée à travers l\'intérieur de l\'île avec villages de pêcheurs et paysages granitiques typiques.', 'Traversez l\'île de Groix en suivant des sentiers intérieurs qui révèlent sa géologie unique et ses villages pittoresques préservés du tourisme de masse. Cette île bretonne est célèbre pour son granite bleu-gris extrait localement et utilisé dans de nombreux bâtiments de Lorient et Vannes. Le parcours vous mènera à travers des landes à bruyère, des champs de genêts et des petits hameaux comme Port-Maria et L\'Île aux Moines où vivent encore des artisans traditionnels. Des arrêts sont prévus aux ateliers de pêcheurs pour découvrir les techniques de réparation des filets et la préparation des bateaux de pêche côtière. Une dégustation de produits locaux est incluse avec du poisson frais, des coquillages et des spécialités bretonnes préparées par une restauratrice du village. L\'accès en ferry depuis le port de Lorient est organisé avec un départ à 8h30 et un retour à 18h00, permettant une journée complète sur l\'île. Le guide accompagnateur partagera des anecdotes sur l\'histoire de l\'île, son rôle pendant la Seconde Guerre mondiale avec la base sous-marine allemande à Lorient, et les traditions insulaires encore vivantes. Prévoyez un sac à jour avec eau et provisions car les commerces sont limités sur l\'île. Cette randonnée convient aux amateurs de culture insulaire et de paysages authentiques avec un dénivelé modéré de 150 mètres.'),
(10, 'Quiberon - Côte Sauvage', '2026-04-03', 8, 'Parcours spectaculaire le long de la côte sauvage avec falaises abruptes et vagues puissantes de l\'Atlantique.', 'Affrontez les éléments sur la célèbre côte sauvage de Quiberon, l\'un des plus beaux sentiers littoraux de Bretagne avec ses falaises battues par les vagues de l\'océan Atlantique. Ce parcours de 16 kilomètres expose la puissance des tempêtes hivernales et la beauté brute des paysages rocheux composés de granite rouge et de schiste. Vous longerez des criques isolées accessibles uniquement à pied, des plages de sable noir et des points de vue spectaculaires sur les rochers sculptés par l\'érosion marine. Des panneaux de sécurité sont installés aux endroits dangereux mais prévoyez un équipement anti-vent robuste car les rafales peuvent atteindre 60 km/h sur les portions exposées. Le sentier passe par la Pointe du Conquet avec son phare historique et la Plage des Sables Blancs où vous pourrez faire une pause si les conditions le permettent. Des points de vue photographiques exceptionnels sont garantis notamment au coucher du soleil lorsque la lumière dorée illumine les falaises. Cette randonnée exigeante convient aux marcheurs expérimentés habitués aux terrains accidentés avec un dénivelé cumulatif de 320 mètres. Prévoyez des chaussures de randonnée avec une bonne accroche car le sol peut être glissant après la pluie. Des toilettes sèches sont disponibles à la Pointe du Percho et au Port-Donnant. Un guide accompagnateur sera présent pour partager des informations sur la géologie locale et les espèces végétales résistantes au sel comme la statice et l\'oyat.'),
(11, 'Vannes - Murailles et Marais', '2026-03-28', 9, 'Randonnée urbaine et naturelle combinant histoire médiévale et marais salants de Guérande.', 'Partez des remparts de Vannes, ville fortifiée du XIIIe siècle classée parmi les Plus Beaux Détours de France, pour rejoindre les marais salants environnants dans une randonnée hybride unique. Le parcours commence par une visite des murailles médiévales avec ses 14 tours et ses trois portes historiques où un guide expliquera l\'architecture défensive et l\'histoire de la ville portuaire. Vous descendrez ensuite vers la baie de Quiberon en suivant des sentiers qui alternent entre chemins forestiers et pistes cyclables aménagées. La destination finale est les marais salants de Guérande où vous rencontrerez des paludiers qui pratiquent encore la récolte traditionnelle du sel à la louche. Une visite d\'un atelier de saliculture vous permettra de comprendre le processus de production du sel gris de Guérande et de déguster différentes variétés de sel avec des produits d\'accompagnement. Des panneaux pédagogiques expliquent l\'écologie des zones humides et l\'importance de ces milieux pour la biodiversité aviaire incluant les flamants roses et les bécasseaux. Cette randonnée convient à tous les niveaux avec un parcours majoritairement plat et bien balisé. Prévoyez des vêtements confortables et un appareil photo pour capturer les paysages changeants des marais. Des toilettes publiques sont disponibles à Vannes, à l\'entrée des marais et au parking de la Brière. Un pique-nique est recommandé avec des produits locaux achetés sur les marchés de Vannes le matin du départ.'),
(12, 'Belle-Île-en-Mer - Circuit des Phares', '2026-04-06', 10, 'Exploration des phares emblématiques de Belle-Île avec vues panoramiques sur l\'océan et la côte déchiquetée. ', 'Parcourez Belle-Île-en-Mer, la plus grande des îles bretonnes, en suivant la chaîne des phares historiques qui ont marqué l\'histoire maritime de l\'Atlantique pendant plus de deux siècles. Le parcours commence au Palais, chef-lieu de l\'île, où vous embarquerez pour une journée complète de randonnée avec des arrêts stratégiques aux phares les plus emblématiques. Le Phare de Goulphar, construit en 1835 avec ses 52 mètres de hauteur, offre une vue imprenable sur la côte sud déchiquetée et les îles de Houat et Hoëdic au loin. Son ascension de 220 marches permet d\'admirer le mécanisme optique d\'origine et les collections muséographiques sur la vie des gardiens de phare. Le Phare de la Baleine, plus ancien datant de 1692, présente une architecture unique avec sa tour carrée en granite et son musée dédié à la navigation. Chaque arrêt est accompagné d\'un guide qui partagera des anecdotes sur les tempêtes historiques, les naufrages évités grâce à ces feux de signalisation et les techniques de maintenance des phares avant l\'électricité. Le sentier longe également des plages sauvages comme la Plage de Port-Blanc où vous pourrez faire une pause baignade si la météo le permet. Prévoyez un équipement complet avec couches superposées car les conditions météorologiques varient rapidement sur l\'île. Des points de ravitaillement sont disponibles au Palais et à Locmariaquer-Belle-Île. Cette randonnée convient aux marcheurs de niveau intermédiaire avec un dénivelé modéré de 200 mètres répartis sur 13 kilomètres.'),
(13, 'Locmariaquer - Table des Marchands', '2026-04-24', 11, 'Randonnée archéologique vers les mégalithes les plus imposants de Bretagne avec guide spécialisé.', 'Explorez le site mégalithique exceptionnel de Locmariaquer, considéré comme l\'un des plus importants ensembles préhistoriques d\'Europe avec des monuments datant de 4500 avant J.-C. Le parcours vous mènera vers la Table des Marchands, un dolmen couvert avec une dalle de couverture de 10 mètres de long ornée de gravures représentant une hache et un sceptre qui témoignent du statut social des personnes enterrées. Vous découvrirez également le Grand Menhir brisé, le plus grand menhir connu au monde avec ses 20 mètres de hauteur et 280 tonnes de granite, cassé en quatre morceaux probablement lors d\'un tremblement de terre ou d\'un effondrement naturel. Un guide archéologue diplômé accompagnera le groupe pour expliquer les techniques de construction néolithiques incluant le transport des pierres sur de longues distances sans roue ni animal de trait, les rituels funéraires pratiqués dans ces monuments et les hypothèses actuelles sur leur fonction astronomique ou religieuse. Des fouilles en cours seront visibles depuis les zones délimitées avec explications sur les méthodes archéologiques modernes. Le site dispose d\'un centre d\'interprétation moderne avec des reconstitutions 3D et des maquettes interactives. Cette randonnée éducative convient aux curieux d\'histoire préhistorique avec un parcours plat de 5 kilomètres facilement accessible. Prévoyez un carnet pour noter les informations et un appareil photo pour documenter les gravures mégalithiques. Des toilettes et un point d\'eau sont disponibles au parking du site.'),
(14, 'Auray - Vallée du Loc\'h', '2026-04-23', 12, 'Promenade paisible le long de la rivière avec ponts médiévaux et villages pittoresques de l\'arrière-pays.', 'Cette randonnée douce suit la vallée du Loc\'h à travers des paysages bucoliques typiques de l\'arrière-pays breton loin du tumulte touristique côtier. Le parcours de 7,6 kilomètres longe la rivière du Loc\'h qui traverse plusieurs communes avant de se jeter dans la baie d\'Auray. Vous passerez sous des ponts médiévaux en pierre datant du XVIe siècle dont le Pont-Néuf d\'Auray qui offre un point de vue magnifique sur la rivière et ses canards sauvages. Des moulins restaurés comme le Moulin de Kerdroan témoignent de l\'activité économique passée de la vallée avec la transformation du grain et la production de farine locale. Les maisons en pierre de granite caractéristiques de la région bordent le sentier avec leurs toits d\'ardoise et leurs jardins fleuris au printemps. Cette promenade est idéale pour les familles avec enfants grâce à son terrain plat et sécurisé sans danger proche de l\'eau. Des aires de pique-nique aménagées avec tables et bancs permettent de faire une pause gastronomique avec des produits locaux achetés au marché d\'Auray le matin. Des panneaux pédagogiques expliquent l\'écosystème de la rivière avec ses poissons comme la truite fario et le brochet ainsi que les oiseaux nicheurs incluant les martinets pêcheurs et les hérons cendrés. Prévoyez un appareil photo pour capturer les reflets dans l\'eau et les architectures traditionnelles. Des toilettes publiques sont disponibles au départ à Auray et à mi-parcours au village de Pluneret. Cette randonnée convient aux débutants et aux personnes recherchant une activité relaxante en pleine nature.');

-- --------------------------------------------------------

--
-- Structure de la table `event_com`
--

CREATE TABLE `event_com` (
  `id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_` date NOT NULL,
  `event` int(11) NOT NULL,
  `autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favorite_route`
--

CREATE TABLE `favorite_route` (
  `user` int(11) NOT NULL,
  `itinerary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `illustrate_evt`
--

CREATE TABLE `illustrate_evt` (
  `media` varchar(150) NOT NULL,
  `event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `illustrate_evt_com`
--

CREATE TABLE `illustrate_evt_com` (
  `media` varchar(150) NOT NULL,
  `event_com` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `illustrate_itin_com`
--

CREATE TABLE `illustrate_itin_com` (
  `media` varchar(150) NOT NULL,
  `itin_com` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `itinerary`
--

CREATE TABLE `itinerary` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `start` varchar(30) NOT NULL,
  `difficulty` varchar(10) NOT NULL,
  `length` int(11) NOT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `advice` varchar(100) DEFAULT NULL,
  `media` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `itinerary`
--

INSERT INTO `itinerary` (`id`, `title`, `description`, `start`, `difficulty`, `length`, `duration`, `advice`, `media`) VALUES
(3, 'Sentier', 'Parcours côtier longeant le golfe avec points de vue sur les îles', 'Port-Navalo', 'easy', 9, '2h15', '', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1d73a47f669.92849210_1776408378.json'),
(4, 'Circuit des Légendes', 'Traversée de la forêt avec arrêts aux sites légendaires', 'Paimpont', 'normal', 14, '4h30', '', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1d8081a9f13.31077455_1776408584.json'),
(5, 'Tour de la Presqu\'île de Rhuys', 'Boucle complète avec plages et phares', 'Sarzeau', 'hard', 23, '6h45', '', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1d8f7c502a4.30061325_1776408823.json'),
(6, 'Sentier des Mégalithes', 'Combinaison sites archéologiques et sentier côtier', 'Carnac', 'easy', 6, '1h45', '', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1d9aaaf5cb8.69560686_1776409002.json'),
(7, 'Traversée de l\'Île de Groix', 'Exploration intérieure avec villages et géologie', 'Port-Tudy (Groix)', 'normal', 11, '3h30', '', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1da38dbcb88.08443856_1776409144.json'),
(8, 'Côte Sauvage de Quiberon', 'Falaises et vagues de l\'Atlantique', 'Quiberon', 'hard', 17, '5h15', '', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1dab796c5b7.17631892_1776409271.json'),
(9, 'Vannes aux Marais Salants', 'Remparts historiques et marais environnants', 'Vannes', 'easy', 10, '2h45', '', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1db55312587.80799653_1776409429.json'),
(10, 'Circuit des Phares de Belle-Île', 'Exploration des phares historiques', 'Le Palais', 'normal', 14, '4h00', '', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1dbb4d3aeb9.30298152_1776409524.json'),
(11, 'Mégalithes de Locmariaquer', 'Sites mégalithiques avec guide archéologue', 'Locmariaquer', 'easy', 5, '1h30', '', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1dc06cab848.76741270_1776409606.json'),
(12, 'Vallée du Loc\'h', 'Rivière paisible avec ponts et villages', 'Auray', 'easy', 8, '2h00', '', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1dc831dece1.92657789_1776409731.json');

-- --------------------------------------------------------

--
-- Structure de la table `itinerary_com`
--

CREATE TABLE `itinerary_com` (
  `id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date_` date NOT NULL,
  `itinerary` int(11) NOT NULL,
  `autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `path` varchar(150) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `name`, `path`, `type`) VALUES
(4, 'media69e1659e014b37.72696221_1776379294.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1659e014b37.72696221_1776379294.json', 'json'),
(5, 'media69e165bb28fad5.37083629_1776379323.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e165bb28fad5.37083629_1776379323.json', 'json'),
(6, 'media69e165edc82d91.89009751_1776379373.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e165edc82d91.89009751_1776379373.json', 'json'),
(7, 'media69e166017dcf97.33709525_1776379393.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e166017dcf97.33709525_1776379393.json', 'json'),
(8, 'media69e16624791053.45213983_1776379428.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e16624791053.45213983_1776379428.json', 'json'),
(9, 'media69e166ea5b47c9.46315423_1776379626.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e166ea5b47c9.46315423_1776379626.json', 'json'),
(10, 'media69e1674f2ab953.36882805_1776379727.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1674f2ab953.36882805_1776379727.json', 'json'),
(11, 'media69e167aebf8011.99561799_1776379822.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e167aebf8011.99561799_1776379822.json', 'json'),
(12, 'media69e167df49f3a2.96838095_1776379871.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e167df49f3a2.96838095_1776379871.json', 'json'),
(13, 'media69e16809384d24.85034419_1776379913.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e16809384d24.85034419_1776379913.json', 'json'),
(14, 'media69e1685b8f28e8.45025843_1776379995.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1685b8f28e8.45025843_1776379995.json', 'json'),
(15, 'media69e1688bca08f4.76155035_1776380043.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1688bca08f4.76155035_1776380043.json', 'json'),
(16, 'media69e168d4a09707.05575326_1776380116.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e168d4a09707.05575326_1776380116.json', 'json'),
(17, 'media69e169011c79b7.76622020_1776380161.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e169011c79b7.76622020_1776380161.json', 'json'),
(18, 'media69e16941dfd919.31126022_1776380225.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e16941dfd919.31126022_1776380225.json', 'json'),
(19, 'media69e16950ec8524.30966600_1776380240.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e16950ec8524.30966600_1776380240.json', 'json'),
(20, 'media69e1696a82a949.39544178_1776380266.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1696a82a949.39544178_1776380266.json', 'json'),
(21, 'media69e169f5921d12.25370888_1776380405.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e169f5921d12.25370888_1776380405.json', 'json'),
(22, 'media69e16a42768a52.92623527_1776380482.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e16a42768a52.92623527_1776380482.json', 'json'),
(23, 'media69e16acfa5f4b0.57326428_1776380623.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e16acfa5f4b0.57326428_1776380623.json', 'json'),
(24, 'media69e16b19f12843.35291850_1776380697.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e16b19f12843.35291850_1776380697.json', 'json'),
(25, 'media69e1d73a47f669.92849210_1776408378.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1d73a47f669.92849210_1776408378.json', 'json'),
(26, 'media69e1d8081a9f13.31077455_1776408584.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1d8081a9f13.31077455_1776408584.json', 'json'),
(27, 'media69e1d8f7c502a4.30061325_1776408823.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1d8f7c502a4.30061325_1776408823.json', 'json'),
(28, 'media69e1d9aaaf5cb8.69560686_1776409002.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1d9aaaf5cb8.69560686_1776409002.json', 'json'),
(29, 'media69e1da38dbcb88.08443856_1776409144.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1da38dbcb88.08443856_1776409144.json', 'json'),
(30, 'media69e1dab796c5b7.17631892_1776409271.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1dab796c5b7.17631892_1776409271.json', 'json'),
(31, 'media69e1db55312587.80799653_1776409429.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1db55312587.80799653_1776409429.json', 'json'),
(32, 'media69e1dbb4d3aeb9.30298152_1776409524.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1dbb4d3aeb9.30298152_1776409524.json', 'json'),
(33, 'media69e1dc06cab848.76741270_1776409606.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1dc06cab848.76741270_1776409606.json', 'json'),
(34, 'media69e1dc831dece1.92657789_1776409731.json', '/home/kerx10/Documents/Xampp/ServWeb/projet_crabe/Site/public/medias/json/media69e1dc831dece1.92657789_1776409731.json', 'json');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_` datetime NOT NULL,
  `subject` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `register`
--

CREATE TABLE `register` (
  `user` int(11) NOT NULL,
  `event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_`
--

CREATE TABLE `user_` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `psedonym` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_`
--

INSERT INTO `user_` (`id`, `email`, `psedonym`, `firstname`, `name`, `password`, `role`) VALUES
(1, 'truc.machin@bidule.fr', 'LaRigole', 'Toto', 'Le Rigolo', '$2y$10$o3Ojw3kTsuIEM17KznlorenDXJ/KnETZ5RSqvJOrEwM6nBREEcc4e', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary` (`itinerary`);

--
-- Index pour la table `event_com`
--
ALTER TABLE `event_com`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event` (`event`),
  ADD KEY `autor` (`autor`);

--
-- Index pour la table `favorite_route`
--
ALTER TABLE `favorite_route`
  ADD PRIMARY KEY (`user`,`itinerary`),
  ADD KEY `itinerary` (`itinerary`);

--
-- Index pour la table `illustrate_evt`
--
ALTER TABLE `illustrate_evt`
  ADD PRIMARY KEY (`media`,`event`),
  ADD KEY `event` (`event`);

--
-- Index pour la table `illustrate_evt_com`
--
ALTER TABLE `illustrate_evt_com`
  ADD PRIMARY KEY (`media`,`event_com`),
  ADD KEY `event_com` (`event_com`);

--
-- Index pour la table `illustrate_itin_com`
--
ALTER TABLE `illustrate_itin_com`
  ADD PRIMARY KEY (`media`,`itin_com`),
  ADD KEY `itin_com` (`itin_com`);

--
-- Index pour la table `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media` (`media`);

--
-- Index pour la table `itinerary_com`
--
ALTER TABLE `itinerary_com`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary` (`itinerary`),
  ADD KEY `autor` (`autor`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`path`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user`,`event`),
  ADD KEY `event` (`event`);

--
-- Index pour la table `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `event_com`
--
ALTER TABLE `event_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `itinerary_com`
--
ALTER TABLE `itinerary_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user_`
--
ALTER TABLE `user_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`itinerary`) REFERENCES `itinerary` (`id`);

--
-- Contraintes pour la table `event_com`
--
ALTER TABLE `event_com`
  ADD CONSTRAINT `event_com_ibfk_1` FOREIGN KEY (`event`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `event_com_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `user_` (`id`);

--
-- Contraintes pour la table `favorite_route`
--
ALTER TABLE `favorite_route`
  ADD CONSTRAINT `favorite_route_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_` (`id`),
  ADD CONSTRAINT `favorite_route_ibfk_2` FOREIGN KEY (`itinerary`) REFERENCES `itinerary` (`id`);

--
-- Contraintes pour la table `illustrate_evt`
--
ALTER TABLE `illustrate_evt`
  ADD CONSTRAINT `illustrate_evt_ibfk_1` FOREIGN KEY (`media`) REFERENCES `media` (`path`),
  ADD CONSTRAINT `illustrate_evt_ibfk_2` FOREIGN KEY (`event`) REFERENCES `event` (`id`);

--
-- Contraintes pour la table `illustrate_evt_com`
--
ALTER TABLE `illustrate_evt_com`
  ADD CONSTRAINT `illustrate_evt_com_ibfk_1` FOREIGN KEY (`media`) REFERENCES `media` (`path`),
  ADD CONSTRAINT `illustrate_evt_com_ibfk_2` FOREIGN KEY (`event_com`) REFERENCES `event_com` (`id`);

--
-- Contraintes pour la table `illustrate_itin_com`
--
ALTER TABLE `illustrate_itin_com`
  ADD CONSTRAINT `illustrate_itin_com_ibfk_1` FOREIGN KEY (`media`) REFERENCES `media` (`path`),
  ADD CONSTRAINT `illustrate_itin_com_ibfk_2` FOREIGN KEY (`itin_com`) REFERENCES `itinerary_com` (`id`);

--
-- Contraintes pour la table `itinerary`
--
ALTER TABLE `itinerary`
  ADD CONSTRAINT `itinerary_ibfk_1` FOREIGN KEY (`media`) REFERENCES `media` (`path`);

--
-- Contraintes pour la table `itinerary_com`
--
ALTER TABLE `itinerary_com`
  ADD CONSTRAINT `itinerary_com_ibfk_1` FOREIGN KEY (`itinerary`) REFERENCES `itinerary` (`id`),
  ADD CONSTRAINT `itinerary_com_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `user_` (`id`);

--
-- Contraintes pour la table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user_` (`id`),
  ADD CONSTRAINT `register_ibfk_2` FOREIGN KEY (`event`) REFERENCES `event` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
