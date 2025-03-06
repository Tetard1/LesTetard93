-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 06, 2025 at 10:26 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmr_cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id_films` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` varchar(999) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `durée` int NOT NULL,
  `affiche` text NOT NULL,
  PRIMARY KEY (`id_films`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id_films`, `titre`, `description`, `genre`, `durée`, `affiche`) VALUES
(52, 'Star Wars', 'Star Wars raconte la lutte entre le bien et le mal dans une galaxie lointaine. Luke Skywalker, un jeune fermier, découvre son destin de Jedi en affrontant l\'Empire dirigé par Dark Vador. Aidé par Obi-Wan Kenobi, la princesse Leia, Han Solo et Chewbacca, il rejoint la Rébellion pour détruire l’Étoile de la Mort et rétablir la paix. La Force, un pouvoir mystique, guide son aventure.', 'Science-fiction', 543, 'https://fr.web.img4.acsta.net/pictures/15/10/18/18/56/052074.jpg'),
(53, 'Avengers', 'Avengers suit un groupe de super-héros, dont Iron Man, Captain America, Thor, Hulk, Black Widow et Hawkeye, réunis par Nick Fury pour affronter Loki, qui menace la Terre avec une armée extraterrestre. Malgré leurs différences, ils unissent leurs forces pour protéger l’humanité et empêcher l’invasion. Ce film marque le début d’une alliance légendaire contre de puissantes menaces.', 'Science-fiction', 345, 'https://fr.web.img3.acsta.net/medias/nmedia/18/85/31/58/20042068.jpg'),
(54, 'Barbie', 'Barbie, une jeune exploratrice passionnée, découvre une île cachée remplie de merveilles et de secrets oubliés. Accompagnée de son fidèle ami Max, un aventurier intrépide et rusé, elle se lance dans une quête pour retrouver un trésor légendaire censé protéger l\'équilibre de la nature. Entre énigmes anciennes, créatures magiques et pièges mystérieux, Barbie et Max devront unir leurs forces pour surmonter les défis et sauver l’île d’une menace grandissante. Une aventure palpitante mêlant courage, amitié et magie !', 'Romance', 127, 'https://fr.web.img2.acsta.net/c_310_420/pictures/23/06/16/12/04/4590179.jpg'),
(57, 'Charlie et la chocolaterie', 'Charlie et la Chocolaterie suit Charlie Bucket, un garçon pauvre qui gagne un billet d\'or pour visiter la fabrique de chocolat magique de Willy Wonka. Avec quatre autres enfants gâtés, il découvre un monde fantastique rempli d’inventions sucrées et de surprises. Chaque enfant subit les conséquences de ses défauts, tandis que Charlie, humble et gentil, prouve qu’il mérite une récompense exceptionnelle.', 'Action', 114, 'https://fr.web.img3.acsta.net/medias/nmedia/18/35/48/68/18432369.jpg'),
(58, 'La reine des neiges', 'La Reine des Neiges suit Anna, une jeune princesse courageuse, qui part en quête pour retrouver sa sœur Elsa, dont les pouvoirs glacés ont plongé le royaume d’Arendelle dans un hiver éternel. Accompagnée de Kristoff, Sven et Olaf, elle affronte de nombreux défis. Anna découvre que seul un acte d’amour véritable peut briser la malédiction et réconcilier les deux sœurs.', 'Aventure', 135, 'https://fr.web.img4.acsta.net/r_1280_720/pictures/210/484/21048422_20131010144035367.jpg'),
(59, 'Franklin la tortue', 'Franklin la Tortue est une série animée mettant en scène Franklin, une tortue curieuse et courageuse qui vit des aventures avec ses amis. À travers des histoires éducatives et amusantes, Franklin apprend des leçons de vie importantes, comme l\'amitié, la responsabilité et la résolution de problèmes. La série montre comment surmonter les peurs et grandir tout en restant fidèle à soi-même.', 'Animation', 67, 'https://fr.web.img5.acsta.net/medias/nmedia/18/62/84/96/18682543.jpg'),
(60, 'Titanic', 'Un amour intemporel naît à bord du célèbre paquebot, le Titanic, entre Jack, un artiste pauvre, et Rose, une jeune aristocrate. Alors que le navire sombre, leur histoire passionnée survit aux événements tragiques, illustrant la lutte pour la survie et l\'amour face à la catastrophe.', 'Romance', 231, 'https://fr.web.img3.acsta.net/pictures/23/01/10/16/06/0622119.jpg'),
(61, 'Hunger Game', 'Dans un futur dystopique, Katniss Everdeen, une jeune fille courageuse, participe aux \"Hunger Games\", un combat à mort organisé par le gouvernement. Elle devient un symbole de résistance et lutte pour sa survie, tout en défendant l\'idée d\'espoir et de rébellion contre l\'oppression.', 'Science-fiction', 178, 'https://fr.web.img3.acsta.net/c_310_420/medias/nmedia/18/85/51/91/20018884.jpg'),
(62, 'Le roi lion', 'Simba, un jeune lion, doit accepter son rôle de roi après la mort tragique de son père Mufasa. Dans cette aventure émotive, il apprend la responsabilité, le courage et l\'importance de la famille. Un film rempli de musique, d\'émotion et de sagesse sur le cycle de la vie.', 'Aventure', 98, 'https://fr.web.img3.acsta.net/pictures/19/02/25/12/06/2908996.jpg'),
(63, 'Les Tuche', 'Les Tuche sont une famille un peu décalée qui devient soudainement extrêmement riche après avoir gagné à la loterie. Ils tentent de s\'adapter à leur nouvelle vie de luxe tout en restant fidèles à leurs racines. Une comédie pleine d\'humour et de situations absurdes.', 'Comédie', 91, 'https://fr.web.img2.acsta.net/medias/nmedia/18/79/51/22/19732939.jpg'),
(64, 'Maman j\'ai raté l\'avion', 'Kevin, un garçon de 8 ans, se retrouve accidentellement laissé derrière par sa famille qui part en vacances. Il doit alors défendre sa maison contre deux voleurs maladroits. Ce film familial mêle humour et aventure, devenant un classique des fêtes de fin d\'année.', 'Aventure', 112, 'https://fr.web.img5.acsta.net/pictures/17/11/15/15/14/4627669.jpg'),
(65, 'Harry Potter', 'Harry Potter, un jeune sorcier, découvre qu\'il est destiné à combattre les forces du mal et à sauver le monde magique. Entouré de ses amis Ron et Hermione, il vit des aventures épiques à Poudlard, une école de magie, où il affronte l\'infâme Lord Voldemort.', 'Fantastique', 143, 'https://fr.web.img2.acsta.net/pictures/18/07/02/17/25/3643090.jpg'),
(66, 'Cars 2', 'Lightning McQueen et son ami Mater partent en voyage à l\'international pour une course mondiale. Mais Mater, au milieu d\'un complot d\'espionnage, se retrouve malgré lui au centre d\'une aventure palpitante. Un film d\'animation qui mêle humour et action à grande vitesse.', 'Animation', 97, 'https://fr.web.img5.acsta.net/medias/nmedia/18/71/72/07/19770156.jpg'),
(67, 'Go Kart', 'Un adolescent passionné de karting rêve de participer à une compétition de haut niveau. Avec l\'aide de ses amis et d\'une équipe peu conventionnelle, il affronte des adversaires redoutables tout en apprenant des valeurs de travail d\'équipe, de persévérance et de passion. Un film inspirant et plein d\'énergie.', 'Aventure', 120, 'https://fr.web.img2.acsta.net/c_310_420/pictures/20/02/20/08/58/4575033.jpg'),
(68, 'A.X.L', 'Un jeune homme nommé Miles découvre un chien robotique militaire expérimental, A.X.L., qui possède des capacités impressionnantes. En s\'échappant de son créateur, A.X.L. devient l\'allié de Miles pour échapper à une organisation secrète qui veut le capturer. Ce film allie aventure, science-fiction et amitié, offrant une exploration de la loyauté et de l\'innovation technologique.', 'Science-fiction', 98, 'https://m.media-amazon.com/images/I/91DFonyx6CL._AC_UF894,1000_QL80_.jpg'),
(69, 'Thomas Langui', 'Thomas Langui, beauf absolu, règne en maître sur l’art du malaise. Fan de PH, de tuning et de saucisson, il balance des punchlines dignes des plus grands poètes de comptoir. \"Ohhh la boulette ! Baisse ta culotte, c\'est moi qui pilote !\" Toujours en claquettes-chaussettes, jamais sans sa bière, il incarne la grande classe… façon barbecue et pétanque.\r\n\r\n\r\nBaisse ta culotte, c\'est moi qui pilote', 'Drame', 69, 'https://media.licdn.com/dms/image/v2/D5603AQF5J7e1fENwsA/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1730969641482?e=2147483647&v=beta&t=cJt1aNImoxkX7T2SdPFEwzJiqpGiMjlB5dXTUU0qkVM'),
(70, 'Ethan Passard', 'Ethan Passard, prodige du tennis méconnu, cache son talent pour ne pas humilier Nadal. Petit par la taille, immense par le charisme, ses yeux bleus subliment sa perfection naturelle. Toujours chill, jamais énervé, fan absolu du PSG, il incarne l’élégance et le style. Unique ? Évidemment. Être lui-même suffit… car il est déjà la perfection.', 'Drame', 69, 'https://media.licdn.com/dms/image/v2/D4E03AQFVHONSeUwtcg/profile-displayphoto-shrink_200_200/B4EZPPoy6YH0AY-/0/1734355398911?e=2147483647&v=beta&t=OZCgTkWc3obwpGQM_cxf6fmtXVvpNi5GB9luHqofMD4'),
(71, 'Sebastien Lemoine', 'Sébastien Lemoine est un professeur exceptionnel, passionné et inspirant. Toujours investi, il captive ses élèves avec pédagogie et humour. Exigeant mais bienveillant, il les pousse à donner le meilleur d’eux-mêmes. Son mot fétiche ? \"Têtard\", qu’il utilise affectueusement pour s’adresser à eux. Pour ses élèves, il n’est pas juste un prof, c’est le meilleur.', 'Fantastique', 56, 'https://media.licdn.com/dms/image/v2/C4D03AQFNozS4pcqgDw/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1584648681477?e=2147483647&v=beta&t=T_nWbyWiD4aAHEA5cjXdTsq9zZaeT0FV_kXgAzSw3uY'),
(72, 'Tristan Matteï', 'Tristan Matteï est un professeur sérieux et exigeant, convaincu que seul le travail mène à la réussite. Il pousse ses élèves à donner le meilleur d’eux-mêmes, sans jamais rien lâcher. Derrière son air strict, il cache une grande bienveillance et un véritable souci de leur avenir. Son expression culte, \"Rond-point Goblet Dugny\", est son moyen humoristique de les motiver. Exigeant, oui, mais surtout un prof profondément gentil et investi.', 'Fantastique', 11, 'https://media.licdn.com/dms/image/v2/C4E03AQH4ZrzqLd0eiw/profile-displayphoto-shrink_400_400/profile-displayphoto-shrink_400_400/0/1516893151590?e=2147483647&v=beta&t=Ye1o1Rb6Qjs_fA8bplanmPGFDI6FpJCYVJNJY3XfRbc'),
(74, 'Sex entre amis', 'Sexe entre amis est une comédie romantique qui suit deux amis, Dylan et Jamie, qui décident de se lancer dans une relation purement physique, sans engagement émotionnel. Mais bien sûr, les choses ne se passent pas comme prévu et les frontières entre amitié et amour deviennent floues. Un film drôle et touchant qui explore les complications de l’amour moderne.', 'Romance', 69, 'https://fr.web.img4.acsta.net/c_310_420/medias/nmedia/18/82/69/35/19757410.jpg'),
(75, '50 nuance de Grey', '50 Nuances de Grey est un drame romantique centré sur l’histoire de Anastasia Steele et Christian Grey. Elle, une jeune étudiante, se laisse séduire par lui, un entrepreneur mystérieux au passé complexe. Leur relation intense et controversée explore le pouvoir, la soumission et les désirs cachés, tout en défiant les limites de l\'amour et de la confiance.', 'Romance', 113, 'https://fr.web.img6.acsta.net/pictures/14/11/14/11/08/371396.jpg'),
(76, '365 days', '365 Days est un drame romantique et érotique qui suit l’histoire de Laura, une femme en vacances en Sicile, qui se retrouve capturée par Massimo, un mafieux déterminé à la faire tomber amoureuse de lui en 365 jours. Entre passion et manipulation, leur relation intense et controversée explore les thèmes du contrôle, du désir et de la liberté.', 'Romance', 96, 'https://fr.web.img5.acsta.net/pictures/22/04/27/21/58/0515920.jpg'),
(77, 'Alice ou les désirs', 'Alice ou les désirs est un film érotique français qui suit Alice, une jeune femme en quête de liberté sexuelle et émotionnelle. À travers ses rencontres et ses expériences, elle explore ses désirs et sa sensualité. Le film traite de la quête d\'identité, des relations intimes et de la libération des conventions sociales, tout en plongeant dans un univers sensuel et provocant.', 'Romance', 100, 'https://fr.web.img4.acsta.net/c_310_420/medias/nmedia/18/72/69/84/19218235.jpg'),
(78, 'Lilo & Stich', 'Lilo & Stitch est une adaptation en prises de vues réelles du classique Disney. L\'histoire suit Lilo, une jeune fille hawaïenne, qui recueille un extraterrestre malicieux, Stitch, et les deux forment un duo improbable. Ensemble, ils surmontent des défis et découvrent ce que signifie la famille, l’amitié et l’amour. Ce film allie émotions, humour et aventure, tout en rendant hommage à l\'original.', 'Science-fiction', 112, 'https://fr.web.img3.acsta.net/r_1280_720/img/77/62/77624c99e40b672e7fb1bde485359acd.jpg'),
(79, 'Le labyrinthe', 'Le Labyrinthe suit un groupe de jeunes qui se réveille dans un labyrinthe géant sans souvenirs de leur passé. Leur objectif : s\'échapper en résolvant des énigmes et en affrontant des créatures menaçantes. Parmi eux, Thomas, un nouvel arrivant, cherche à comprendre ce qui se cache derrière ce piège et pourquoi ils ont été choisis. Un thriller captivant mêlant mystère, survie et action.', 'Aventure', 121, 'https://fr.web.img3.acsta.net/pictures/14/09/18/14/58/418353.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
