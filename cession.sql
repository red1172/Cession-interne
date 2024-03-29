-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Sam 26 Octobre 2013 à 14:44
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cession`
--

-- --------------------------------------------------------

--
-- Structure de la table `ardis`
--

CREATE TABLE IF NOT EXISTS `ardis` (
  `ean` bigint(13) DEFAULT NULL,
  `rayon` int(11) DEFAULT NULL,
  `article` int(11) DEFAULT NULL,
  `libelle` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ardis`
--

INSERT INTO `ardis` (`ean`, `rayon`, `article`, `libelle`) VALUES
(3384129002914, 31, 63000476, 'SONATE CAMESOLE               '),
(3245421944145, 31, 31003262, 'serpillierre extra absorbante '),
(2060630004791, 63, 31003264, 'GANT SENSITIVE MEA moyen      '),
(8690506404536, 12, 63000479, 'C.DE.LUXE CAMESOLE            '),
(3245421944169, 31, 12006952, 'LINGETTES BABY NATUREL 72*12UN'),
(7321011535613, 31, 31003268, 'GANT SENSITIVE MEA large      '),
(3384122102383, 31, 31003274, 'Serviette 33*33cm    153561   '),
(3384129021007, 31, 31003280, 'GANT FRESH LEMON large        '),
(3245421402577, 31, 31003286, 'Seau 14 litres                '),
(6131059000018, 11, 31003287, 'GANT WASH-UP moyen            '),
(3245421402584, 31, 11001606, 'JAVEL BEST 12  900ML LUXE     '),
(3384129021014, 31, 31003290, 'GANT WASH-UP large            '),
(3141389942592, 12, 31003292, 'essoreur                      '),
(7321031473100, 31, 12006957, 'Gel douche gommage cottage    '),
(3384129002853, 31, 31003293, 'Serviette 33*33cm      147310 '),
(8696722649065, 63, 31003256, 'Mop + manche 120 cm           '),
(3384129002860, 31, 63000467, 'KIMONO TK                     '),
(3999120069509, 12, 31003258, 'Recharge Mop microfibre       '),
(8690506425642, 12, 12006950, 'GEL DOUCHE DURU GOURMET       '),
(2060630004777, 63, 12006950, 'GEL DOUCHE DURU GOURMET       '),
(8690506438500, 12, 63000477, 'SONATE CAMESOLE               '),
(7321011609277, 31, 12006951, 'DENT SANINO SUPERIOR          '),
(7321031609288, 31, 31003285, 'Serviette 33*33cm    160927   '),
(2060630004845, 63, 31003288, 'Serviette 33*33cm   160928    '),
(7321031589238, 31, 63000484, 'SAMBA CAMESOLE                '),
(6131059000568, 11, 31003310, 'Serviette 33*33cm   158923    '),
(2060630004906, 63, 11001615, 'G REZYL MOUZYL 900ML          '),
(8690506348427, 12, 63000490, 'ADRIANA CAMESOLE GT           '),
(6131059000117, 11, 12006965, 'SHAMPOOING DURU               '),
(8690506395926, 12, 11001616, 'LIQUIDE VAISSELLE BRI 750ML   '),
(7321011589067, 31, 12006966, 'MOUSSE A RASER ARKO ACTION    '),
(7321031609592, 31, 31003339, 'Assiette 16*10 158906         '),
(7321031594980, 31, 31003346, 'surnappe 84*84cm   160959     '),
(3245429443176, 31, 31003360, 'Bougie ball white 4*4  159498 '),
(7321031609523, 31, 31003361, 'SPONTEX GANT SHERBAGE 7       '),
(2060630005026, 63, 31003375, 'Serviette 40*40cm   160952    '),
(7321031477535, 31, 63000502, 'pyjamas court                 '),
(3245426200079, 31, 31003377, 'SETS DE TABLE   147753        '),
(3245426200086, 31, 31003385, 'HOUSSE REPASSAGE  SPE         '),
(3245426297222, 31, 31003386, 'HOUSSE REPASSAGE  SPE         '),
(3245426327226, 31, 31003388, 'HOUSSE REPASSAGE  COLLE       '),
(3245426237228, 31, 31003391, 'HOUSSE REPASSAGE  COLLE       '),
(3245426237242, 31, 31003393, 'HOUSSE REPASSAGE  COLLEC      '),
(2060630005101, 63, 31003394, 'HOUSSE REPASSAGE  COLLEC      '),
(2060630003480, 63, 63000510, 'LARA BRA                      '),
(3999150013923, 15, 63000348, 'PAULA(SLIP)                   '),
(613123500030, 15, 15001392, 'PAIN AU SON L ARTISAN SACHET 4'),
(2060630003534, 63, 15001392, 'PAIN AU SON L ARTISAN SACHET 4'),
(3999150013961, 15, 63000353, 'CELIA (SLIP)                  '),
(613123500034, 15, 15001396, 'PAIN ALGERIEN  L ARTISAN SACHE'),
(2060630003541, 63, 15001396, 'PAIN ALGERIEN  L ARTISAN SACHE'),
(6131235000399, 14, 63000354, 'CELIA (SLIP)                  '),
(8432426343690, 43, 14003282, 'FLAN CITRON 68 GRS            '),
(2060630003671, 63, 43000502, 'ECOUTEUR REF E214 BLEU        '),
(6131235000566, 14, 63000367, 'TOSCA (SLIP)                  '),
(2060630003732, 63, 14003305, 'CREME GLACEE MANGUE 90 GRS    '),
(2060630003749, 63, 63000373, 'VICTORIA (SLIP)               '),
(2060630003763, 63, 63000374, 'VICTORIA (SLIP)               '),
(6131235000597, 14, 63000376, 'VALERIE (SLIP)                '),
(6131235000641, 14, 14003312, 'CREME GLACEE LIGHT CARAML 60GR'),
(6131235000702, 14, 14003317, 'CREME GLACEE LIGHT CASSIS 60GR'),
(2060630003800, 63, 14003319, 'CREME DESSERT CHOCOLAT 84 GRS '),
(6131235000733, 14, 63000380, 'CAPRICE (SLIP)                '),
(6131235000672, 14, 14003322, 'CREME DESSERT CARAMEL 84 RS   '),
(6131235000696, 14, 14003325, 'CREME PATISSIERE VANILLE 30GRS'),
(6131235000740, 14, 14003326, 'CREME PATISSIERE CARAMEL 30GRS'),
(6131235000184, 14, 14003327, 'MOUSSE CHOCOLAT 124 GRS       '),
(4457626656706, 63, 14003332, 'MIX CREPE SUCRE 269 GRS       '),
(4451804918025, 14, 63000384, 'TANIA (SLIP)                  '),
(4445983179344, 14, 14003333, 'MIX MUFFIN SUCRE 300 GRS      '),
(4440161440663, 42, 14003334, 'MIX CAKE CHOCO&GLACAGE 300GRS '),
(4434339701982, 63, 42000221, 'CARTE MEMOIRE FUJIFILM 8GO    '),
(4428517963301, 62, 63000398, 'LOREDANA SLIP GT              '),
(4422696224620, 62, 62000634, 'Legging gris 8 ans            '),
(4416874485939, 12, 62000635, 'pyjama gris fillette          '),
(4411052747258, 12, 12006918, 'SAVON DURU LIQUIDE MOODS      '),
(2060630004197, 63, 12006926, 'SAVON FAX 125 GRS 48 UN PECHE '),
(2060630004203, 63, 63000419, 'CELIA STRING                  '),
(7321031253597, 31, 63000420, 'AVA STRING                    '),
(7891117011897, 34, 31003246, 'BOUGIE Block champagne 6*10   '),
(7891117012283, 34, 34000255, 'FOURCHE A FUMIER 77144/554    '),
(7891117026259, 34, 34000256, 'FOURCHE A FUMIER 77134/344    '),
(7891117032113, 34, 34000264, 'TRANSPLANTOIR 78001/001       '),
(7891117004479, 34, 34000274, 'CISAILLE A HAIE 78332/925     '),
(3525550099214, 12, 34000278, 'SCIE PLIABLE 78372/401        '),
(3141389907126, 12, 12007132, 'GEL MOUSSANT VISAG BEAUTE PURE'),
(3600521994467, 12, 12007133, 'LAIT DEMAQUILLANT BEAUTE PURE '),
(3141389911116, 12, 12007134, 'ELSEVE COLOR VIVE 200 ML      '),
(85854223140, 44, 12007135, 'TONIQUE ECLAT DOUCEUR BEAUTE P'),
(3141389910454, 12, 44002507, 'CARTABL17 MLA116K NOIR MLA116K'),
(3141389910355, 12, 12007137, 'MASQUE PEEL OFF ECLAT JEUNESSE'),
(3141389911550, 12, 12007138, 'MASQUE DESALTERANT HYDRATANT  '),
(85854222761, 44, 12007139, 'MASQUE NETTOYANT BEAUTE PURE  '),
(3141380005548, 12, 44002508, 'ETUI EN POLYCARBONATE IPC201  '),
(3141389908635, 12, 12007140, 'DOUX GOMMAGE VISAG BEAUTE PURE'),
(3141389910218, 12, 12007141, 'ELEXIR CONTOUR YX PERLE&CAVIAR'),
(3141389910416, 12, 12007142, 'CREME JOUR SPF8 NUTRI-REGENER '),
(85854223164, 44, 12007143, 'CREME JOUR SPF5 ECLAT JEUNESSE'),
(85854223171, 44, 44002509, 'CARTABLE 17 MLA116P TANIN     '),
(85854213530, 44, 44002510, 'CARTABLE 15,6  MLC116 NOIR    '),
(85854220224, 44, 44002512, 'MALLETTE NETBOOK 12 GRISE PCB '),
(85854193221, 44, 44002514, 'ETUI HDD 2.5 NOIR QHDC101K    '),
(3140100251500, 12, 44002517, 'ETUI DDE VHS101 NOIR          '),
(3140100251395, 12, 12007149, 'AMPOU CHUT CHE PREVEN DENSIT  '),
(3140100251333, 12, 12007152, 'AP-SH CHE COLO ECLAT PROTECTI '),
(3140100251357, 12, 12007157, 'SHAM COLO-ECLAT/PROTECT 250ML '),
(3140100076035, 12, 12007159, 'SHAM CHEV PREVENT DENSIT 250ML'),
(3140100218398, 12, 12007160, 'EUGNE DECOLORANT              '),
(3600540823335, 12, 12007163, 'KIT MECHES CHATAIN            '),
(3245422522977, 31, 12007164, 'COLOR NAT 5 LIGHT BROWN       '),
(6131059000032, 11, 31003295, 'GANT SILK petit               '),
(3245422607223, 31, 11001607, 'SANIBON SPRING 900ML JASMIN   '),
(7321031589511, 31, 31003301, 'GANT SPONTEX COMFORT petit    '),
(6131059000049, 11, 31003302, 'Serviette 33*33cm      158951 '),
(3245422607247, 31, 11001608, 'SANIBON SPRING 900ML LAVANDE  '),
(7321031609226, 31, 31003303, 'GANT SPONTEX COMFORT moyen    '),
(6131059000056, 11, 31003305, 'Serviette 33*33cm    160922   '),
(7321031608625, 31, 11001609, 'SANIBON SPRING 900ML CITRON   '),
(9001378680468, 31, 31003308, 'Serviette 33*33cm   160862    '),
(6131059000070, 11, 31003309, 'brosse universelle            '),
(6131059000094, 11, 11001611, 'SANIBON SPRING 1L LUXE LAVANDE'),
(8690506442057, 12, 11001613, 'SANIBON SPRING 1L LUXE ROSE   '),
(3245421372573, 31, 12006962, 'DENT SANNO STRONG 75ML 36 UN  '),
(6131059000100, 11, 31003315, 'GANT SUPER CONTACT moyen      '),
(2060630004890, 63, 11001614, 'SANIBON SPRING 1L LUXE PIN    '),
(7321011589074, 31, 63000489, 'ADRIANA CAMESOLE GT           '),
(7321031608632, 31, 31003333, 'Gobelet 21cl  16*10 158907    '),
(3245429912474, 31, 31003337, 'Assiette  16*10 160863        '),
(3245429912481, 31, 31003338, 'SPONTEX GANT JARDINAGE M  N 7 '),
(7321031608755, 31, 31003340, 'SPONTEX GANT JARDINAGE L N 8  '),
(3245423457322, 31, 31003341, 'Assiette  24*10 160875        '),
(7321031589962, 31, 31003342, 'SPONTEX GANT TAILLE ROSIER N 6'),
(3245423657128, 31, 31003343, 'surnappe 84*84cm     158996   '),
(3245423657142, 31, 31003350, 'SPONTEX GANT  PLANTATION N  6 '),
(2060630004968, 63, 31003354, 'SPONTEX GANT PLANTATION M N  7'),
(7321031573169, 31, 63000496, 'KIM BRA                       '),
(7321031573152, 31, 31003357, 'BOUGIE PILLAR AZUR 2*6  157316'),
(7321031518955, 31, 31003358, 'BOUGIE PILLAR AVOCAD2*6 157315'),
(7321031482157, 31, 31003359, 'Plateau octogonal 31cm  151895'),
(7321031491470, 31, 31003366, 'Serviette 40*40cm  148215     '),
(3245426200116, 31, 31003382, 'Gobelet diamond 25cl  149147  '),
(2060630005118, 63, 31003395, 'HOUSSE REPASSAGE PERFORMANCE  '),
(3245426350224, 31, 63000511, 'LARA BRA                      '),
(2060630005149, 63, 31003397, 'HOUSSE REPASSAGE SPECIAL      '),
(3245426237044, 31, 63000514, 'LARA BRA                      '),
(2060630005187, 63, 31003400, 'HOUSSSE DE REPASSAGE          '),
(3245426143949, 31, 63000518, 'SLIP                          '),
(2060630005194, 63, 31003406, 'TABLE A REPASSER COLOR        '),
(6132502271030, 35, 63000519, 'LARA BRA                      '),
(3245426307020, 31, 35001134, 'DESODORISANT AUTO ANTI TABAC  '),
(2060620006408, 22, 31003408, 'Bannane        '),
(6132502270255, 11, 62000640, 'pull M/L 08ans                '),
(8411250012019, 11, 11001618, 'SEMELLE CUIR PERFOREE         '),
(6132502270255, 11, 11001618, 'SEMELLE CUIR PERFOREE         '),
(8411250012019, 11, 11001618, 'SEMELLE CUIR PERFOREE         '),
(6132501810131, 31, 11001618, 'SEMELLE CUIR PERFOREE         '),
(6132502271078, 11, 31003415, 'Serviette papier 2 plis imprim'),
(6132502271078, 11, 11001625, 'SEMELLE JUNIOR                '),
(6130513000076, 31, 11001625, 'SEMELLE JUNIOR                '),
(6130513000243, 31, 31003423, 'PASSOIRE ( GM et PM) CR019    '),
(3999600012414, 60, 31003428, 'SUCRIER CR082                 '),
(613000002, 60, 60001241, 'ID101 BAL/ENF                 '),
(3999600012445, 60, 60001241, 'ID101 BAL/ENF                 '),
(613000005, 60, 60001244, 'ID116 BAL/ENF                 '),
(7321031609660, 31, 60001244, 'ID116 BAL/ENF                 '),
(7321031609684, 31, 31003435, 'NAPPE 2.20*1.38    160966     '),
(7321011610013, 31, 31003438, 'NAPPE 2.20*1.38    160968     '),
(7321011590285, 31, 31003441, 'Chemin de table 4M.80  161001 '),
(7321031609745, 31, 31003443, 'Chemin de table 4M.80  159028 '),
(7321031566284, 31, 31003448, 'Chemin de table 4M.80  160974 '),
(7321031813159, 31, 31003450, 'Chemin de table 4M.80  156628 ');

-- --------------------------------------------------------

--
-- Structure de la table `ces_int`
--

CREATE TABLE IF NOT EXISTS `ces_int` (
  `article` int(8) NOT NULL,
  `design` varchar(30) NOT NULL,
  `vendeur` int(2) NOT NULL,
  `achteur` varchar(50) NOT NULL,
  `qtite` float NOT NULL,
  `TypOp` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ces_int`
--

INSERT INTO `ces_int` (`article`, `design`, `vendeur`, `achteur`, `qtite`, `TypOp`, `date`, `user`) VALUES
(31003408, 'Bannane        ', 22, '22', 1, 'Impossible', '2013-10-25', 'REDA'),
(31003408, 'Bannane        ', 22, '20', 1, 'Cession interne', '2013-10-25', 'REDA'),
(31003408, 'Bannane        ', 22, '90', 1, 'Auto-consommation', '2013-10-25', 'REDA'),
(11001616, 'LIQUIDE VAISSELLE BRI 750ML   ', 12, '20', 1, 'Auto-consommation', '2013-10-25', 'REDA'),
(63000376, 'VALERIE (SLIP)                ', 14, '', 0, 'Cession interne', '2013-10-25', 'REDA'),
(12006965, 'SHAMPOOING DURU               ', 11, '', 0, 'Auto-consommation', '2013-10-26', 'REDA'),
(12006965, '', 11, '', 0, 'Auto-consommation', '2013-10-26', 'REDA'),
(12006965, 'SHAMPOOING DURU               ', 11, '22', 1, 'Auto-consommation', '2013-10-26', 'REDA'),
(12006965, 'SHAMPOOING DURU               ', 11, '90', 1, 'Auto-consommation', '2013-10-26', 'REDA'),
(12006965, 'SHAMPOOING DURU               ', 11, '24', 2, 'Auto-consommation', '2013-10-26', 'REDA'),
(12006965, 'SHAMPOOING DURU               ', 11, '90', 1, 'Auto-consommation', '2013-10-26', 'REDA'),
(11001616, 'LIQUIDE VAISSELLE BRI 750ML   ', 12, '90', 1, 'Auto-consommation', '2013-10-26', 'REDA'),
(11001616, 'LIQUIDE VAISSELLE BRI 750ML   ', 12, '23', 1, 'Auto-consommation', '2013-10-26', 'REDA'),
(12006965, 'SHAMPOOING DURU               ', 11, '20', 25, 'Auto-consommation', '2013-10-26', 'REDA'),
(63000490, 'ADRIANA CAMESOLE GT           ', 12, '24', 1, 'Auto-consommation', '2013-10-26', 'REDA');

-- --------------------------------------------------------

--
-- Structure de la table `rayon`
--

CREATE TABLE IF NOT EXISTS `rayon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_r` int(2) DEFAULT NULL,
  `libelle_r` varchar(31) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Contenu de la table `rayon`
--

INSERT INTO `rayon` (`id`, `num_r`, `libelle_r`) VALUES
(1, 21, 'POISSONNERIE'),
(2, 22, 'FRUITS ET LEGUMES'),
(3, 24, 'BOUCHERIE - VOLAILLE'),
(4, 90, 'SALLE DE FORMATION'),
(5, 23, 'BOULANGERIE - PATISSERIE'),
(6, 20, 'CHARCUTERIE-TRAITEUR'),
(7, 90, 'DIRECTION '),
(8, 90, 'PFT'),
(9, 90, 'PGC'),
(10, 90, 'EPCS'),
(11, 90, 'TEXTILE'),
(12, 90, 'BAZAR'),
(13, 90, 'ACCUEIL'),
(14, 90, 'RESERVE-RECEPTION'),
(15, 90, 'SECURITE'),
(16, 90, 'COMPTABILITE'),
(17, 90, 'CAISSE'),
(18, 90, 'BAZAR'),
(19, 90, 'BOISSONS '),
(20, 90, 'DROGUERIE'),
(21, 90, 'PARFUMERIE  HYGIENE '),
(22, 90, 'MARKETING'),
(23, 90, 'BRICOLAGE'),
(24, 90, 'CONFORTDE LA MAISON'),
(25, 90, 'CULTURE-PAPETRIE'),
(26, 90, 'LOISIR - JOUETS'),
(27, 90, 'JARDIN ET ANIMALERIE'),
(28, 90, 'AUTO'),
(29, 90, 'CENTRE AUTO'),
(30, 90, 'GEM'),
(31, 90, 'PEM'),
(32, 90, 'PHOTO COMMUNICATION '),
(33, 90, 'IMAGE & SON'),
(34, 90, 'INFORMATIQUE'),
(35, 90, 'RADIOTELEPHONIE'),
(36, 90, 'CHAUSSURE '),
(37, 90, 'BEBE '),
(38, 90, 'ENFANT '),
(39, 90, 'FEMME '),
(40, 90, 'HOMME '),
(41, 90, 'LINGE DE MAISON '),
(42, 90, 'ACCESSOIRE'),
(43, 90, 'BIJOUTERIE'),
(44, 90, 'SERVICE INFORMATIQUE'),
(45, 90, 'DECORATION');

-- --------------------------------------------------------

--
-- Structure de la table `rayons`
--

CREATE TABLE IF NOT EXISTS `rayons` (
  `id_rayon` int(11) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `nom_rayon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rayons`
--

INSERT INTO `rayons` (`id_rayon`, `id_departement`, `nom_rayon`) VALUES
(13, 1, 'ASIATIQUE                     '),
(41, 4, 'PEM                           '),
(42, 4, 'PHOTO COMMUNICATION           '),
(43, 4, 'IMAGE & SON                   '),
(44, 4, 'INFORMATIQUE                  '),
(45, 4, 'RADIOTELEPHONIE               '),
(60, 6, 'CHAUSSURE                     '),
(61, 6, 'BEBE                          '),
(62, 6, 'ENFANT                        '),
(63, 6, 'FEMME                         '),
(64, 6, 'HOMME                         '),
(65, 6, 'LINGE DE MAISON               '),
(66, 6, 'ACCESSOIRE                    '),
(67, 6, 'BIJOUTERIE                    '),
(10, 1, 'BOISSONS                      '),
(11, 1, 'DROGUERIE                     '),
(12, 1, 'PARFUMERIE HYGIENE            '),
(14, 1, 'EPICERIE                      '),
(15, 1, 'P.L.S.                        '),
(20, 2, 'CHARCUTERIE/TRAITEUR          '),
(21, 2, 'POISSONNERIE                  '),
(22, 2, 'FRUITS ET LEGUMES             '),
(23, 2, 'BOULANGERIE / PATISSERIE      '),
(24, 2, 'BOUCHERIE / VOLAILLE          '),
(30, 3, 'BRICOLAGE                     '),
(31, 3, 'CONFORT DE LA MAISON          '),
(32, 3, 'CULTURE-PAPETRIE              '),
(33, 3, 'LOISIR - JOUETS               '),
(34, 3, 'JARDIN ET ANIMALERIE          '),
(35, 3, 'AUTO                          '),
(36, 3, 'CENTRE AUTO                   '),
(40, 4, 'GEM                           '),
(99, 1, 'INCONNU                       ');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`login`, `pass`) VALUES
('reda', '1112'),
('admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
