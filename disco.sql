-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 07 fév. 2024 à 10:18
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `disco`
--

-- --------------------------------------------------------

--
-- Structure de la table `chanson`
--

CREATE TABLE `chanson` (
  `id` int NOT NULL,
  `idalbum` int NOT NULL,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `chanson`
--

INSERT INTO `chanson` (`id`, `idalbum`, `titre`) VALUES
(1, 1, 'Brown Sugar'),
(2, 1, 'Sway');

-- --------------------------------------------------------

--
-- Structure de la table `disques`
--

CREATE TABLE `disques` (
  `id` int NOT NULL,
  `album` varchar(255) DEFAULT NULL,
  `artiste` varchar(255) DEFAULT NULL,
  `genre` int DEFAULT NULL,
  `annee` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `image` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `background` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `disques`
--

INSERT INTO `disques` (`id`, `album`, `artiste`, `genre`, `annee`, `description`, `image`, `background`) VALUES
(1, 'Sticky Fingers', 'Rolling Stones', 1, '1971', 'L\'album \"Sticky Fingers\" des Rolling Stones, sorti en 1971, a marqué une étape significative dans leur carrière. Sa pochette emblématique, conçue par Andy Warhol, avec une fermeture éclair fonctionnelle, symbolise l\'audace créative du groupe. L\'album propose une palette musicale diversifiée, allant du rock brut aux ballades douces. Avec \"Sticky Fingers\", les Rolling Stones ont consolidé leur place dans l\'histoire du rock et ont ouvert la voie à une nouvelle ère de créativité et d\'innovation.', 'https://fr.shopping.rakuten.com/photo/1412602496.jpg', 'https://cdn-s-www.lalsace.fr/images/4289A9C3-326A-4481-9F2C-06E370FEE18A/NW_raw/les-rolling-stones-en-1973-mick-jagger-charlie-watts-keith-richards-bill-wyman-et-mick-taylor-photo-a-ubrey-powell-1598289985.jpg'),
(2, 'Voodoo Lounge', 'Rolling Stones', 1, '1994', '\"Voodoo Lounge\" est le 20e album studio des Rolling Stones, paru en 1994. Cet opus a marqué un retour aux sources pour le groupe emblématique du rock. Avec son mélange éclectique de styles musicaux, allant du rock classique au blues en passant par le reggae et le rock alternatif, l\'album dégage une énergie brute et un groove caractéristiques des Rolling Stones. Les singles à succès tels que \"Love Is Strong\", \"You Got Me Rocking\" et \"Out of Tears\" ont rencontré un vif succès commercial et ont été largement diffusés à la radio et à la télévision. Pour accompagner la sortie de l\'album, les Rolling Stones ont entamé une tournée mondiale impressionnante, la \"Voodoo Lounge Tour\", qui a captivé des millions de fans à travers le monde. En résumé, \"Voodoo Lounge\" représente un chapitre important dans l\'histoire du groupe, cimentant leur réputation légendaire en tant qu\'icônes du rock.', 'https://m.media-amazon.com/images/I/81Q+qcv756L._UF1000,1000_QL80_.jpg', 'https://cdn-s-www.lalsace.fr/images/4289A9C3-326A-4481-9F2C-06E370FEE18A/NW_raw/les-rolling-stones-en-1973-mick-jagger-charlie-watts-keith-richards-bill-wyman-et-mick-taylor-photo-a-ubrey-powell-1598289985.jpg'),
(3, 'Abbey Roads', 'Beatles', 1, '1969', '\"Abbey Road\" est le onzième et dernier album studio des Beatles, sorti en 1969. Il est salué comme l\'un de leurs plus grands chefs-d\'œuvre. L\'album présente une diversité musicale remarquable, avec des chansons emblématiques telles que \"Come Together\" et \"Here Comes the Sun\". La pochette, montrant les membres traversant un passage clouté, est devenue emblématique. \"Abbey Road\" reste un album incontournable dans l\'histoire de la musique populaire, captivant les auditeurs du monde entier.', 'https://www.thebeatles.com/sites/default/files/2021-06/Abbey%20Road.jpg', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.amazon.com%2F-%2Fes%2FP%25C3%25B3ster-Beatles-George-Harrison-Mccartney%2Fdp%2FB07CG9JWCF&psig=AOvVaw02SYQ8U_Q412aWBANtjdOS&ust=1707387331428000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCMjh4Mz_mIQDFQAAAAAdAAAAABAJ'),
(4, 'Help !', 'Beatles', 1, '1965', '\"Help!\" est le cinquième album studio des Beatles, sorti en 1965. Cet album marque une évolution musicale significative du groupe, avec des chansons telles que \"Help!\", \"Ticket to Ride\" et \"Yesterday\". Il est salué comme un classique du rock et a été un grand succès commercial et critique. La pochette de l\'album, représentant les membres du groupe formant le mot \"HELP\" avec leurs bras, est devenue emblématique. \"Help!\" reste un incontournable de la discographie des Beatles et continue à captiver les auditeurs du monde entier.', 'https://i1.sndcdn.com/artworks-Bs16uAKzCRrz8LC0-oP9r1Q-t500x500.jpg', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.amazon.com%2F-%2Fes%2FP%25C3%25B3ster-Beatles-George-Harrison-Mccartney%2Fdp%2FB07CG9JWCF&psig=AOvVaw02SYQ8U_Q412aWBANtjdOS&ust=1707387331428000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCMjh4Mz_mIQDFQAAAAAdAAAAABAJ'),
(5, 'Physical Graffiti', 'Led Zeppelin', 2, '1975', '\"Physical Graffiti\" est le sixième album studio de Led Zeppelin, sorti en 1975. Cet album double est salué comme l\'un des plus grands chefs-d\'œuvre du rock, avec des chansons emblématiques telles que \"Kashmir\", \"Trampled Under Foot\" et \"Ten Years Gone\". Il présente une diversité musicale remarquable, allant du hard rock au blues, en passant par le folk et le funk. La pochette de l\'album, avec ses fenêtres découpées, est devenue emblématique de l\'album et du groupe. \"Physical Graffiti\" reste un pilier de la musique rock et continue à influencer les générations d\'auditeurs et de musiciens.', 'https://www.newburycomics.com/cdn/shop/products/Led-Zeppelin-Physical-Graffiti-2LP-Vinyl-2078801_1024x1024.jpeg?v=1437499092', 'https://www.musicwaves.fr/files/users/bands/4000/4102/pictures/5696.jpg'),
(6, 'Led Zeppelin IV', 'Led Zeppelin', 2, '1971', '\"Led Zeppelin IV\", également connu sous le nom de \"Four Symbols\" ou \"Zoso\", est le quatrième album studio éponyme du groupe Led Zeppelin, sorti en 1971. Cet album est considéré comme l\'un des plus grands albums de rock de tous les temps, avec des titres emblématiques tels que \"Stairway to Heaven\", \"Black Dog\" et \"Rock and Roll\". L\'album présente une variété de styles musicaux, allant du hard rock au folk et au blues, démontrant la polyvalence musicale du groupe. La pochette de l\'album, avec son symbole mystérieux, est devenue emblématique de l\'album et du groupe. \"Led Zeppelin IV\" reste un incontournable de la musique rock et continue à captiver les auditeurs du monde entier.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnAt0kteVfro1tOkKhju5PVfGrj3W_Ikjhfg&usqp=CAU', 'https://www.musicwaves.fr/files/users/bands/4000/4102/pictures/5696.jpg'),
(7, 'Hotel California', 'The Eagles', 3, '1976', '\"Hotel California\" est le cinquième album studio des Eagles, sorti en 1976. Cet album est considéré comme l\'un des plus grands chefs-d\'œuvre du rock, avec des chansons emblématiques telles que le titre éponyme \"Hotel California\", \"New Kid in Town\" et \"Life in the Fast Lane\". L\'album présente un mélange de styles musicaux, allant du rock classique à la country et au folk, démontrant la polyvalence du groupe. La pochette de l\'album, représentant l\'hôtel Beverly Hills Hotel à Los Angeles, est devenue emblématique. \"Hotel California\" reste un pilier de la musique rock et continue à captiver les auditeurs du monde entier.', 'https://groundzero.fr/wp-content/uploads/2016/01/16752-EAGLES-HOTEL-CALIFORNIA-LP.jpg', 'https://cdn.britannica.com/50/198850-050-46C563B5/Eagles-Bernie-Leadon-Don-Henley-Glenn-Frey.jpg'),
(8, 'Desperado', 'The Eagles', 3, '1973', '\"Desperado\" est le deuxième album studio des Eagles, sorti en 1973. Cet album est un concept album explorant le thème de l\'ouest américain et des hors-la-loi, avec des chansons telles que \"Desperado\", \"Tequila Sunrise\" et \"Outlaw Man\". L\'album présente un mélange de country rock et de folk rock, montrant l\'évolution du style musical du groupe. La pochette de l\'album, représentant une scène de l\'ouest américain, capture l\'essence du thème de l\'album. \"Desperado\" est devenu un album culte pour les fans des Eagles et reste une pièce maîtresse de leur discographie.', 'https://upload.wikimedia.org/wikipedia/en/c/c0/The_Eagles_-_Desperado.jpg', 'https://cdn.britannica.com/50/198850-050-46C563B5/Eagles-Bernie-Leadon-Don-Henley-Glenn-Frey.jpg'),
(9, 'Cosmos Factory', 'Credence Clearwater Revival', 1, '1970', '\"Cosmo\'s Factory\" est le cinquième album studio de Creedence Clearwater Revival, sorti en 1970. Cet album est considéré comme l\'un des plus grands albums de rock de tous les temps, avec des chansons emblématiques telles que \"Bad Moon Rising\", \"Fortunate Son\" et \"Down on the Corner\". L\'album présente un son caractéristique de swamp rock et de blues rock, avec des paroles souvent politiquement chargées. La pochette de l\'album, représentant l\'usine de nettoyage Cosmo\'s Factory à Berkeley, en Californie, est devenue emblématique. \"Cosmo\'s Factory\" reste un incontournable de la musique rock et continue à captiver les auditeurs du monde entier.', 'https://lastfm.freetls.fastly.net/i/u/ar0/e6cdeffaa9584f1580d29a162ce1d464.jpg', 'https://upload.wikimedia.org/wikipedia/commons/e/ee/Creedence_Clearwater_Revival_1968.jpg'),
(10, 'Bayou Country', 'Credence Clearwater Revival', 1, '1969', '\"Bayou Country\" est le deuxième album studio de Creedence Clearwater Revival, sorti en 1969. Cet album a marqué un tournant dans la carrière du groupe et a contribué à établir leur son caractéristique de swamp rock et de blues rock. Il contient des chansons emblématiques telles que \"Proud Mary\" et \"Born on the Bayou\", qui ont contribué à populariser le groupe et à les élever au rang de légendes du rock. La pochette de l\'album, représentant un paysage de bayou typique de la Louisiane, capture l\'essence du son et de l\'atmosphère de l\'album. \"Bayou Country\" reste un pilier de la musique rock et continue à inspirer les auditeurs avec son énergie brute et son authenticité.', 'https://www.udiscovermusic.com/wp-content/uploads/2014/08/CCR-Bayou-Country-1.jpg', 'https://upload.wikimedia.org/wikipedia/commons/e/ee/Creedence_Clearwater_Revival_1968.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `genre`) VALUES
(1, 'Rock'),
(2, 'Hard Rock'),
(3, 'Country Rock');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `password`) VALUES
(1, 'yvon@gmail.com', '$2y$10$fwkLRx6bpyY7QIqDO1EJKu43b9c3rL7DJuOqcqNIcBkrekvatZ0dK'),
(3, 'nouveau_toto@gmail.com', '$2y$10$Bo1SHoHyQvjM8/bPgO51huw9Mz9zlAZUFZ3EQZaVjaZCOKWTePBhS');

--
-- Déclencheurs `utilisateurs`
--
DELIMITER $$
CREATE TRIGGER `before_utilisateur_update` AFTER UPDATE ON `utilisateurs` FOR EACH ROW INSERT INTO audit
 SET action = 'update',
     user_id = OLD.id,
     email = OLD.email,
     newemail = NEW.email,
     changedate = NOW()
$$
DELIMITER ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chanson`
--
ALTER TABLE `chanson`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `disques`
--
ALTER TABLE `disques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chanson`
--
ALTER TABLE `chanson`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `disques`
--
ALTER TABLE `disques`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
