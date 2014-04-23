-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2014 at 07:55 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test.v1`
--
CREATE DATABASE IF NOT EXISTS `test.v1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test.v1`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', '2014-04-03 13:12:56', '0000-00-00 00:00:00'),
(2, 'Henk', '2014-04-09 15:01:00', '0000-00-00 00:00:00'),
(3, 'Jan', '2014-04-10 08:19:31', '2014-04-10 08:19:31'),
(4, ' Willem', '2014-04-10 08:19:31', '2014-04-10 08:19:31'),
(5, ' Harry', '2014-04-10 08:19:31', '2014-04-10 08:19:31'),
(6, 'internet', '2014-04-15 10:26:19', '2014-04-15 10:26:19'),
(7, 'Harry', '2014-04-18 11:22:23', '2014-04-18 11:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `categorie_post`
--

CREATE TABLE IF NOT EXISTS `categorie_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `categorie_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie_post_post_id_foreign` (`post_id`),
  KEY `categorie_post_categorie_id_foreign` (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `categorie_post`
--

INSERT INTO `categorie_post` (`id`, `post_id`, `categorie_id`) VALUES
(7, 3, 1),
(10, 2, 1),
(11, 1, 2),
(12, 4, 1),
(13, 5, 6),
(14, 6, 1),
(15, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorie_project`
--

CREATE TABLE IF NOT EXISTS `categorie_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categorie_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie_project_categorie_id_foreign` (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categorie_project`
--

INSERT INTO `categorie_project` (`id`, `categorie_id`, `project_id`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 4),
(4, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categorie_workshop`
--

CREATE TABLE IF NOT EXISTS `categorie_workshop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categorie_id` int(10) unsigned NOT NULL,
  `workshop_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie_workshop_categorie_id_foreign` (`categorie_id`),
  KEY `categorie_workshop_workshop_id_foreign` (`workshop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categorie_workshop`
--

INSERT INTO `categorie_workshop` (`id`, `categorie_id`, `workshop_id`) VALUES
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naam` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bericht` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `naam`, `email`, `website`, `bericht`, `approved`, `created_at`, `updated_at`) VALUES
(1, 'Jeroen', 'jeroen@digitusmarketing.nl', '', 'Ik wil even kijken of ik de comment eruit kan krijgen.', 1, '2014-04-02 22:00:00', '0000-00-00 00:00:00'),
(2, 'Jeroen Tritsch', 'jeroenvenderbosch@hotmail.com', 'https://www.facebook.com/Jvenderbosch', 'sdsadasdas', 1, '2014-04-11 09:02:47', '2014-04-11 09:02:47'),
(3, 'Jeroen Venderbosch', 'jeroenvenderbosch@hotmail.com', 'https://www.facebook.com/Jvenderbosch', 'sdfgjgsdfhdgfsgh', 0, '2014-04-11 09:03:35', '2014-04-11 09:03:35'),
(4, 'Jeroen Venderbosch', 'jeroenvenderbosch@hotmail.com', 'https://www.facebook.com/Jvenderbosch', '64r5tyuiytvyyhvjtkj', 0, '2014-04-11 09:04:48', '2014-04-11 09:04:48'),
(5, 'Jeroen Venderbosch', 'jeroenvenderbosch@hotmail.com', 'https://www.facebook.com/Jvenderbosch', 'u3r8942e3897tjeh nygniefyguifduiger', 0, '2014-04-11 09:05:43', '2014-04-11 09:05:43'),
(6, 'Jeroen Venderbosch', 'jeroenvenderbosch@hotmail.com', 'https://www.facebook.com/Jvenderbosch', '68765876586666768768687687687', 0, '2014-04-11 09:09:34', '2014-04-11 09:09:34'),
(7, 'Jeroen Venderbosch', 'jeroenvenderbosch@hotmail.com', 'https://www.facebook.com/Jvenderbosch', '68765876586666768768687687687', 0, '2014-04-11 09:10:50', '2014-04-11 09:10:50'),
(9, 'Jeroen Venderbosch', 'jeroenvenderbosch@hotmail.com', 'https://www.facebook.com/Jvenderbosch', 'Maaaaaar. is het ook de eerste post met een comment erbij? met een edit!', 0, '2014-04-11 10:36:51', '2014-04-11 10:44:09'),
(10, 'Jeroen Venderbosch', 'jeroenvenderbosch@hotmail.com', 'https://www.facebook.com/Jvenderbosch', 'Hey hallo, werken de comments nog? :) \r\nIk ben bang dat er misschien iets misgaat! :o', 0, '2014-04-15 08:33:16', '2014-04-15 08:33:16'),
(11, 'Jeroen venderbosch', 'jeroenvenderbosch@hotmail.com', 'http://www.digitusmarketing.nl', 'hey hallo,\r\n\r\nik kwam via via op deze pagina en vond dit blogbericht echt interessant! \r\n\r\nIk vraag mij af hoe het kan dat dat plaatje er zo goed uitziet en of deze tekst ook met dit formaat eruit komt!\r\n\r\nBij voorbaad dank,\r\nJeroen', 0, '2014-04-16 07:10:08', '2014-04-16 07:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `comment_post`
--

CREATE TABLE IF NOT EXISTS `comment_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `comment_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_comments_post_id_foreign` (`post_id`),
  KEY `post_comments_comment_id_foreign` (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `comment_post`
--

INSERT INTO `comment_post` (`id`, `post_id`, `comment_id`) VALUES
(1, 1, 1),
(2, 3, 7),
(4, 1, 9),
(5, 1, 10),
(6, 6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_04_02_150919_create-users-table', 1),
('2014_04_03_081027_create-roles-table', 2),
('2014_04_03_085647_create-user_roles-table', 3),
('2014_04_03_092741_create-users_roles-table', 4),
('2014_04_03_124926_create-comments-table', 5),
('2014_04_03_125730_create-categorie_post-table', 7),
('2014_04_03_130724_create-tags-table', 8),
('2014_04_03_130733_create-post_tags-table', 8),
('2014_04_03_124453_create-post_comments-table', 9),
('2014_02_09_225721_create_visitor_registry', 10),
('2014_04_08_083236_create_pages_table', 11),
('2014_04_08_092437_create_metatags_table', 12),
('2014_04_08_102638_create_post_metatags_table', 12),
('2014_04_08_103616_create_page_metatags_table', 12),
('2014_04_08_103629_create_tag_metatags_table', 12),
('2014_04_08_103646_create_categorie_metatags_table', 12),
('2014_04_17_081301_create_cases_table', 13),
('2014_04_17_145719_create_workshops_table', 14),
('2014_04_18_151556_create_categorie_workshop_table', 15),
('2014_04_18_151917_create_tag_workshop_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `layout` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `menu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `footer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `metatitle` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `metadescription` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `robots` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ogtitle` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `ogdescription` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `ogsitename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ogurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ogimage` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ogtype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `layout`, `menu`, `footer`, `title`, `body`, `author`, `slug`, `image`, `metatitle`, `metadescription`, `robots`, `ogtitle`, `ogdescription`, `ogsitename`, `ogurl`, `ogimage`, `ogtype`, `created_at`, `updated_at`) VALUES
(1, 'front.page', '', '', 'Eerste page', 'De bodytekst van de Eerste Page', '1', 'eerste_page', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'front.page', 'front.menus.digimenu', 'front.footer.main', 'TESTEN', 'hey hallo ik wil graag testen of het mogelijk is om een palatje toe te voegen aan deze pagina, waaromd oet hij het hier wel en bij de posts niet?\r\n\r\n', '1', 'testen', '/uploads/images/pages/idee-offer-foto.png', 'TESTEN', 'hey hallo ik wil graag testen of het mogelijk is om een palatje toe te voegen aan deze pagina, waaromd oet hij het hier wel en bij de posts niet?\r\n\r\n', 'noindex, nofollow', 'TESTEN', 'hey hallo ik wil graag testen of het mogelijk is om een palatje toe te voegen aan deze pagina, waaromd oet hij het hier wel en bij de posts niet?\r\n\r\n', 'Digitus Marketing', '', '/uploads/images/pages/idee offer foto.png', 'Article', '2014-04-15 10:47:13', '2014-04-15 10:47:13'),
(13, 'front.page', 'front.menus.digimenu', 'front.footer.main', 'Kennismaken', 'een stukje text erbij dan maar?', '1', 'kennismaken', '', 'Kennismaken', 'een stukje text erbij dan maar?', 'noindex, nofollow', 'Kennismaken', 'een stukje text erbij dan maar?', 'Digitus Marketing', '', '', 'Article', '2014-04-16 08:55:33', '2014-04-16 08:55:33'),
(15, 'front.page', 'front.menus.digimenu', 'front.footer.main', 'Insides', 'Pagina met blogberichten', '1', 'insides', '', 'Insides', 'Pagina met blogberichten', 'noindex, nofollow', 'Insides', 'Pagina met blogberichten', 'Digitus Marketing', '', '', 'Article', '2014-04-16 09:44:26', '2014-04-16 10:09:34'),
(16, 'front.page', 'front.menus.digimenu', 'front.footer.main', 'Cases', 'Body tekst voor cases pagina', '1', 'cases', '', 'Cases', 'Body tekst voor cases pagina', 'noindex, nofollow', 'Cases', 'Body tekst voor cases pagina', 'Digitus Marketing', '', '', 'Article', '2014-04-16 13:16:48', '2014-04-16 13:16:48'),
(17, 'front.page', 'front.menus.digimenu', 'front.footer.main', 'Workshops', 'Body text voor workshops', '1', 'workshops', '', 'Workshops', 'Body text voor workshops', 'noindex, nofollow', 'Workshops', 'Body text voor workshops', 'Digitus Marketing', '', '', 'Article', '2014-04-18 12:16:57', '2014-04-18 12:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) NOT NULL,
  `metatitle` varchar(80) NOT NULL,
  `metadescription` varchar(160) NOT NULL,
  `robots` varchar(50) NOT NULL,
  `ogtitle` varchar(80) NOT NULL,
  `ogdescription` varchar(300) NOT NULL,
  `ogsitename` varchar(255) NOT NULL,
  `ogurl` varchar(255) NOT NULL,
  `ogimage` varchar(64) NOT NULL,
  `ogtype` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `slug`, `image`, `metatitle`, `metadescription`, `robots`, `ogtitle`, `ogdescription`, `ogsitename`, `ogurl`, `ogimage`, `ogtype`, `created_at`, `updated_at`) VALUES
(1, 'de eerste post met bewerking!!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1', 'de-eerste-post-met-bewerking', 'uploads/images/posts/BZY17fMIQAADvBl.jpg', '', '', '', '', '', '', '', 'uploads/images/posts/BZY17fMIQAADvBl.jpg medium.jpg', '', '2014-04-17 15:23:06', '2014-04-17 13:06:55'),
(2, 'de tweede post van vandaag', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '1', 'de-tweede-post-van-vandaag', 'uploads/images/posts/1380409_10151726464262956_1981156502_n.jpg', '', '', '', '', '', '', '', 'uploads/images/posts/1380409_10151726464262956_1981156502_n.jpg', '', '2014-04-17 15:43:09', '2014-04-17 13:15:06'),
(3, 'De eerste post van iemand anders!', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '2', 'de-eerste-post-van-iemand-anders', 'uploads/images/posts/64372c3ceb5192ae7693a244c8ca98f3.JPG', '', '', '', '', '', '', '', 'uploads/images/posts/64372c3ceb5192ae7693a244c8ca98f3.JPG', '', '2014-04-17 15:43:13', '2014-04-17 13:15:31'),
(4, 'Seizoensgebonden omslagfoto''s', 'Henkie henk henk henkie henkie kom bie mie', '1', 'seizoensgebonden-omslagfotos', 'uploads/images/posts/1011859_713904245290700_1141923045_n.jpg', '', '', '', '', '', '', '', 'uploads/images/posts/1011859_713904245290700_1141923045_n.jpg', '', '2014-04-18 12:35:31', '2014-04-18 10:35:31'),
(5, 'Hey hallo', 'Funx radio oin the air!', '1', 'hey-hallo', '/uploads/images/posts/0ddontime01.jpg', '', '', '', '', '', '', '', '/uploads/images/posts/0ddontime01.jpg', '', '2014-04-16 14:43:22', '2014-04-16 12:43:22'),
(6, 'ksjdkjasdhaskjhdkjas', 'kjsdhfksdhjgsdgusdgodfijcnvkcnvd\r\nPLAATJE TOEGEOVED?!?!\r\nfjgdsflsdjaklfjxcklvsdfs\r\nef\r\nsdfdgsdgdaghdfghdfghd\r\naghdfgdgdsfasvvbdcxzAFDCSXJaxjczkc xkvsdjfwsdasxsa<br />\r\n\r\nsdasjdfsjfsdkgjdgjsdfkjasdfskfksdgksdgs', '1', 'ksjdkjasdhaskjhdkjas', '/uploads/images/posts/omslagfoto 2014.png', '', '', '', '', '', '', '', '/uploads/images/posts/omslagfoto 2014.png', '', '2014-04-15 15:27:59', '2014-04-15 13:27:59'),
(7, '10 redenen waarom je geen like share en win actie moet doen!', '<p><b>De waarheid over LIKE SHARE EN WIN acties!</b>\r\n\r\nBen je van plan om een LIKE SHARE EN WIN actie te lanceren? Lees dan het eerste deel van dit artikel! Ben je opzoek naar een manier om je Facebook pagina een boost te geven? Lees dan het hele artikel en ontdek wat je kunt doen om op sociale wijze in contact te komen met meer Facebook gebruikers.\r\n\r\n \r\n<h2>Hier 10 redenen:</h2>\r\n<ul>\r\n<li>1. Je bereikt veel meer niet geïnteresseerde gebruikers dan wel geïnteresseerde gebruikers. Als ik het heb over niet geïnteresseerde gebruikers, heb ik het over gebruikers die niet geïnteresseerd zijn in jouw bedrijf, product en/of dienst.</li>\r\n\r\n<li>2. De meeste gebruikers die mee doen aan LIKE SHARE EN WIN acties, zijn alleen geïnteresseerd in de prijs, niet in jouw bedrijf. Als de winnaar(s) bekend worden gemaakt, zijn er zelfs gebruikers die je Facebook pagina weer dis-liken. Dislikes hebben negatieve invloed op het (organische/gratis) bereik van toekomstige berichten.</li>\r\n\r\n<li>3. Gebruikers die zich ergeren aan berichten, kunnen deze verbergen en/of markeren als SPAM. Dit heeft ook negatieve invloed op de het (organische/gratis) bereik van toekomstige berichten!</li>\r\n\r\n<li>4. LIKE SHARE EN WIN acties zijn niet sociaal. Geloof het of niet, er zijn zelfs mensen die een apart Facebook account aanmaken om deel te nemen aan LIKE SHARE EN WIN acties.</li>\r\n\r\n<li>5. Je wordt echt niet serieus genomen! Gebruikers weten ondertussen ook dat het doel van een LIKE SHARE EN WIN actie is om meer likes te krijgen.</li>\r\n\r\n<li>6. Naamsbekendheid of irritatie? Er zijn veel gebruikers die zich irriteren aan LIKE SHARE EN WIN acties zonder dat je het weet! Dit kan negatieve invloed hebben op het imago van je bedrijf.</li>\r\n\r\n<li>7. Het is niet toegestaan om gebruikers te vragen je bericht te delen en deze hiervoor te belonen. De kans bestaat dat je pagina wordt opgeheven door Facebook (deze kans is wel heel erg klein).</li>\r\n\r\n<li>8. Je kunt advertenties richten op je fans of op vrienden van fans. Binnen deze doelgroep(en) scoren advertenties vele malen beter dan bij een onbekend publiek en brengen hierdoor lagere kosten met zich mee. Als jouw Facebook fans geen klanten of geïnteresseerde gebruikers zijn, vallen er een aantal effectieve advertentie strategieën, die je in de toekomst zeker wil toepassen, af.</li>\r\n\r\n<li>9. Facebook gaat over interactie, de meeste gebruikers die je pagina liken om iets te winnen, zullen nooit meer reageren op je berichten en zullen na een tijdje jouw berichten ook niet meer in hun nieuwsoverzicht te zien krijgen!</li>\r\n\r\n<li>10. De meeste gebruikers die deelnemen aan LIKE SHARE EN WIN acties zijn niet van plan ooit geld uit te geven aan één van jouw producten en/of diensten.</li>\r\n</ul>\r\n\r\n<h2>3 Nadelen voor gebruikers die deelnemen aan LIKE SHARE en WIN acties.</h2>\r\n\r\n<ul>\r\n<li>1. Niet alle gebruikers die een bericht delen, kunnen worden achterhaald. Alleen gebruikers die de Facebook privacy instellingen van berichten op openbaar hebben ingesteld, zijn te achterhalen.</li>\r\n\r\n<li>2. Je vraagt gebruikers om je pagina te liken. Helaas zijn niet alle gebruikers die je pagina geliked hebben, te achterhalen. Het overzicht van Facebook waar je kunt achterhalen wie je pagina heeft geliked, geeft alleen de laatste 300 tot 400 fans weer.</li>\r\n\r\n<li>3. Facebook vrienden van gebruikers die dit soort berichten delen, ergeren zich aan aan de LIKE SHARE EN WIN acties. Ook dit kan negatieve invloed hebben op het imago van je bedrijf.</li>\r\n</ul>\r\n\r\n<div class="extra"><p>\r\nIk ben benieuwd hoe jij denkt over Facebook LIKE SHARE EN WIN acties.. Ik heb zelf een hekel aan Like, share & win acties en markeer ze bijna altijd als spam, tenzij ik het bedrijf of de eigenaar ken, dan stuur ik vaak een bericht.\r\n</p></div>\r\n\r\n \r\n<h2><b>GEEN</b> LIKE SHARE EN WIN acties?? Wat dan wel?</h2>\r\n\r\n<p>Tijdlijn acties! Facebook heeft in maart 2013 de beleidsregels aangepast. Vóór maart 2013 was het niet toegestaan om acties te voeren via de tijdlijn. Acties mochten alleen gevoerd worden via Facebook tab apps en winnaars moesten op de hoogte worden gebracht via e-mail.</p>\r\n\r\n<h2>Wat is een tijdlijn actie?</h2>\r\n\r\n<p>Een tijdlijn actie is een bericht waarbij gebruikers wordt gevraagd om een actie uit te voeren op het bericht om kans te maken op een prijs. Verderop leg ik uit wat wel en niet is toegestaan. Het belangrijkste doel van een tijdlijn actie is interactie (reacties, likes op bericht) waardoor een bericht viraal (pietje heeft gereageerd op de foto van ….) meer Facebook gebruikers bereikt. Hieronder enkele voorbeelden:</p>\r\n\r\n<a href="#">Anytime Fitness Goor</a>\r\n<div id="fb-root"></div> <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs); }(document, ''script'', ''facebook-jssdk''));</script>\r\n<div class="fb-post" data-href="https://www.facebook.com/photo.php?fbid=220590068065222&set=a.170312373092992.5934.169961639794732&type=1" data-width="466"><div class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/photo.php?fbid=220590068065222&set=a.170312373092992.5934.169961639794732&type=1">Post</a> by <a href="https://www.facebook.com/AnytimeFitnessGoor">Anytime Fitness Goor</a>.</div></div>\r\n<hr>\r\n\r\n<a href="#">Horecapersoneel.biz</a>\r\n<div id="fb-root"></div> <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs); }(document, ''script'', ''facebook-jssdk''));</script>\r\n<div class="fb-post" data-href="https://www.facebook.com/HorecaPersoneel.biz/photos/a.185835371553932.44588.182203155250487/345570048913796/?type=1" data-width="466"><div class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/HorecaPersoneel.biz/photos/a.185835371553932.44588.182203155250487/345570048913796/?type=1">Post</a> by <a href="https://www.facebook.com/HorecaPersoneel.biz">Horecapersoneel.biz</a>.</div></div>\r\n\r\n<hr>\r\n<a href="#">Kings Wok</a>\r\n<div id="fb-root"></div> <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs); }(document, ''script'', ''facebook-jssdk''));</script>\r\n<div class="fb-post" data-href="https://www.facebook.com/photo.php?fbid=614302008606469&set=a.441059495930722.77934272.416793005024038&type=1" data-width="466"><div class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/photo.php?fbid=614302008606469&set=a.441059495930722.77934272.416793005024038&type=1">Post</a> by <a href="https://www.facebook.com/KingsWokBeckum">Kings Wok</a>.</div></div>\r\n\r\n<hr>\r\n<h2>Wat mag wel en wat mag niet?</h2>\r\n\r\n<b>Je mag:</b>\r\n<ul>\r\n<li>- Vragen om een reactie op een bericht (Laat in de reacties hieronder weten waarom jij zou moeten winnen).</li>\r\n<li>- Vragen om een like op een bericht (Like dit bericht en maak kans op ___).</li>\r\n<li>- Vragen om een like op een reactie (De reactie met de meeste/minste stemmen/likes wint).</li>\r\n<li>- Vragen om een bericht op de tijdlijn van je pagina te plaatsen.</li>\r\n<li>- Winnaars bekend maken via je Facebook pagina.</li>\r\n</ul>\r\n\r\n<b>Je mag niet:</b>\r\n<ul>\r\n<li>- Vragen om je pagina te liken (het is niet mogelijk om alle fans te achterhalen).</li>\r\n<li>- Vragen om een bericht of je pagina te delen (Het is niet altijd mogelijk om te achterhalen wie het bericht heeft gedeeld).</li>\r\n<li>- Vragen om zichzelf of anderen te taggen.</li>\r\n</ul>\r\n<i>(LET OP: bovenstaande mag je wel vragen maar niet als voorwaarde stellen om iets te winnen).</i>\r\n\r\n<p>Bekijk hier de <a href="https://fbcdn-dragon-a.akamaihd.net/hphotos-ak-ash3/851577_158705844322839_2031667568_n.pdf" target="_blank">officiële richtlijnen van Facebook</a>.</p>\r\n\r\n<h2>Wat wil je bereiken met de tijdlijn actie?</h2>\r\n\r\n<p>Voordat je een tijdlijn actie opzet is het belangrijk om van te voren één of meerdere doelen te stellen. Zoals:</p>\r\n<ul>\r\n<li>- Betrokkenheid met Facebook fans/gebruikers vergroten.</li>\r\n<li>- (nieuw)Product/dienst onder de aandacht brengen.</li>\r\n<li>- In contact komen met vrienden van fans/klanten.</li>\r\n<li>- Bereik vergroten.</li>\r\n<li>- Feedback over een product of dienst verzamelen.</li>\r\n</ul>\r\n\r\n<h2>Wat moet er in je tijdlijn actie staan?</h2>\r\n\r\n<ul>\r\n<li>- Wat gebruikers kunnen winnen.</li>\r\n<li>- Wat je moet doen om deel te nemen.</li>\r\n<li>- Hoe de winnaar wordt gekozen.</li>\r\n<li>- Hoe/waar/wanneer de winnaar(s) bekend wordt gemaakt.</li>\r\n<li>- Vrijwaring van Facebook:</li>\r\n</ul>\r\n<p>\r\n“Deze promotie is op geen enkele manier verbonden met Facebook en is op geen enkele wijze gesponsord, ondersteund of georganiseerd door Facebook.”</p>\r\n\r\n<div class="extra">\r\n<p><b>Extra</b>: Als je de moeite doet om een zo kort en eenvoudig mogelijke tijdlijn actie te schrijven, zodat het gehele bericht in één keer leesbaar is zonder dat gebruikers op ‘lees meer’ hoeven te klikken, is het jammer om dit te laten verpesten door de Facebook vrijwaring. Afhankelijk van de grootte van de pagina zou ik overwegen om dit toe te voegen. Het is een officiële regel maar zolang LIKE SHARE EN WIN acties niet worden bestraft maak ik me geen zorgen ;).\r\n\r\nTIP: Een oplossing hiervoor is om de voorwaarden op je website te plaatsen en een link naar de pagina te verwerken in het bericht. Voorwaarden: www.website.nl/voorwaarden of http://bit.ly/K93KJD\r\n</p>\r\n</div>\r\n\r\n \r\n<h2>TIPS voor een succesvolle tijdlijn actie!</h2>\r\n\r\n<ul>\r\n<li>- Bepaal je doel(en).</li>\r\n<li>- Houd het zo kort en simpel mogelijk.</li>\r\n<li>- Bedenk een actie die gerelateerd is aan jouw merk.</li>\r\n<li>- Bedenk een relevante prijs voor je fans/doelgroep.</li>\r\n<li>- Maak het gebruikers zo eenvoudig mogelijk om deel te nemen.</li>\r\n<li>- Geef gebruikers voldoende tijd om deel te nemen (minimaal 1 week).</li>\r\n<li>- Maak gebruik van Facebook advertenties.</li>\r\n<li>- Beperk de looptijd van de actie om irritatie te voorkomen, zeker als je gebruik maakt van Facebook advertenties. Niemand zit er op te wachten om 10 keer het zelfde bericht te zien.</li>\r\n<li>- Testen, testen en testen. Test verschillende tijdlijn acties om er achter te komen wat bij jouw fans het beste werkt.</li>\r\n</ul>\r\n\r\n<h2>Wat kost het om een tijdlijn actie te promoten?</h2>\r\n\r\nWat kost de gemiddelde tijdlijn actie?\r\n<img src="">\r\n</li>', '1', '10-redenen-waarom-je-geen-like-share-en-win-actie-moet-doen', 'uploads/images/posts/begging-for-likes.jpg', '', '', '', '', '', '', '', 'uploads/images/posts/begging-for-likes.jpg', '', '2014-04-22 15:52:17', '2014-04-22 13:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_tags_post_id_foreign` (`post_id`),
  KEY `post_tags_tag_id_foreign` (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(1, 1, 1),
(4, 2, 4),
(7, 2, 5),
(9, 3, 1),
(10, 3, 8),
(11, 3, 9),
(12, 4, 4),
(13, 4, 3),
(23, 5, 12),
(24, 6, 1),
(25, 7, 18),
(26, 7, 19),
(27, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `projecten`
--

CREATE TABLE IF NOT EXISTS `projecten` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `klant` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `klant_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `projecten`
--

INSERT INTO `projecten` (`id`, `title`, `body`, `slug`, `image`, `klant`, `klant_link`, `link`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Membership Machine', 'Als eerst moesten we een tab-app ontwerpen en bedenken die zou zorgen voor leden van deze nieuwe fitness club. - Facebook tab-app, - Facebook promoties', 'anytime-fitness', '/uploads/images/cases/AF-TAB.jpg', 'Anytime Fitness', 'http://www.wirelab.nl/work', 'https://www.facebook.com/AnytimeFitnessGoor/app_684197371613061', '1', '2014-04-17 08:42:23', '2014-04-17 08:42:23'),
(3, 'Luchtballon Vaart Twente', 'Een luchtballonvaart beschikbaar voor iedereen!', 'luchtballon', 'uploads/images/cases/7c0d5c6ab4ddecf474b928e661d8e394.png', 'Ballooning Twente', 'http://www.twenteballooning.nl', 'http://www.wirelab.nl/work', '1', '2014-04-17 09:02:46', '2014-04-17 09:02:46'),
(4, 'Online Bestellen', 'Voor Chinthai moesten we samen met Buro Selium een webshop bouwen zodat chinthai van thuisbezorgd af kon. Dit is natuurlijk gelukt!', 'online-bestellen', 'uploads/images/cases/1798695_10153988973455413_60662921_n.jpg', 'Chinthai', 'http://www.chinthai.nl', 'http://digitusweb.nl/nieuw/#', '1', '2014-04-17 12:21:40', '2014-04-17 12:21:40'),
(5, 'Staak de selfies', 'Selfies, wie kent ze niet. Een selfie nemen is een nieuw begrip overal ter wereld. Deze case moet er voor zorgen dat jongens GEEN selfies meer nemen..', 'staak-de-selfies', 'uploads/images/cases/1604795_656802971050474_206406275_n.png', 'Selfies Nederland', 'http://www.selfies.nl', 'http://www.wirelab.nl/work', '1', '2014-04-18 11:22:23', '2014-04-18 11:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `project_tag`
--

CREATE TABLE IF NOT EXISTS `project_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_tag_tag_id_foreign` (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `project_tag`
--

INSERT INTO `project_tag` (`id`, `tag_id`, `project_id`) VALUES
(1, 4, 2),
(2, 2, 3),
(3, 12, 4),
(4, 1, 5),
(5, 12, 5),
(6, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2014-04-02 22:00:00', '0000-00-00 00:00:00'),
(2, 'User', '2014-04-02 22:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_roles_user_id_foreign` (`user_id`),
  KEY `users_roles_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'HEnk', '2014-04-09 22:00:00', '0000-00-00 00:00:00'),
(2, 'nieuw', '2014-04-03 13:32:22', '2014-04-03 13:32:22'),
(3, 'Facebook marketing', '2014-04-09 14:09:34', '2014-04-09 14:09:34'),
(4, 'Facebook pagina', '2014-04-09 14:10:33', '2014-04-09 14:10:33'),
(5, 'Marketing', '2014-04-09 14:14:57', '2014-04-09 14:14:57'),
(6, 'jannnnn', '2014-04-10 08:41:27', '2014-04-10 08:41:27'),
(7, '1234', '2014-04-10 08:42:57', '2014-04-10 08:42:57'),
(8, 'nieuw', '2014-04-10 08:44:40', '2014-04-10 08:44:40'),
(9, '1324', '2014-04-10 08:44:40', '2014-04-10 08:44:40'),
(10, 'test', '2014-04-15 10:23:10', '2014-04-15 10:23:10'),
(11, 'henk', '2014-04-15 10:23:10', '2014-04-15 10:23:10'),
(12, 'radio', '2014-04-15 10:25:36', '2014-04-15 10:25:36'),
(13, 'interactie', '2014-04-18 13:19:03', '2014-04-18 13:19:03'),
(14, 'ergernissen', '2014-04-18 13:28:57', '2014-04-18 13:28:57'),
(15, 'adverteren', '2014-04-18 13:30:31', '2014-04-18 13:30:31'),
(16, 'basis', '2014-04-18 13:30:31', '2014-04-18 13:30:31'),
(17, 'succesvol', '2014-04-18 13:31:42', '2014-04-18 13:31:42'),
(18, 'Like Share en Win', '2014-04-22 13:29:03', '2014-04-22 13:29:03'),
(19, 'Actie', '2014-04-22 13:29:04', '2014-04-22 13:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `tag_workshop`
--

CREATE TABLE IF NOT EXISTS `tag_workshop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(10) unsigned NOT NULL,
  `workshop_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_workshop_tag_id_foreign` (`tag_id`),
  KEY `tag_workshop_workshop_id_foreign` (`workshop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tag_workshop`
--

INSERT INTO `tag_workshop` (`id`, `tag_id`, `workshop_id`) VALUES
(1, 13, 3),
(2, 14, 4),
(3, 15, 5),
(4, 16, 5),
(5, 17, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(900) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `google` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `username`, `firstname`, `lastname`, `email`, `description`, `password`, `facebook`, `twitter`, `linkedin`, `google`, `created_at`, `updated_at`) VALUES
(1, 'uploads/images/users/1/2222IMG_2259.jpg', 'Jeroen Venderbosch', 'Jeroen', 'Venderbosch', 'jeroenvenderbosch@hotmail.com', 'Jeroen Venderbosch is een leergierige internet marketeer met passie voor techniek. Hij werkt internet marketing concepten uit, meet en optimaliseert de resultaten. Hij vindt het vooral interessant hoe de kleinste wijzigingen op een webpagina het gedrag van bezoekers kan beïnvloeden. Om zijn kennis op pijl te houden discussieert hij over verschillende onderwerpen en ontwikkelingen op het gebied van internet marketing met experts over de hele wereld.', '$2y$10$motIdEUg/z/3IMNy3eDHDupT4wwpHN6eBtHwntMlx4LGl7P1c5yQq', 'https://www.facebook.com/Jvenderbosch', 'https://twitter.com/JeroenVendb', 'http://nl.linkedin.com/in/jeroenvendb/', 'https://plus.google.com/+JeroenVenderbosch/posts', '2014-04-02 13:42:49', '2014-04-18 09:33:05'),
(2, 'uploads/images/users/2/1184883_661248110554360_1218715576_n.png', 'Parsifal Tritsch', 'Parsifal', 'Tritsch', 'p.tritsch@gmail.com', 'Parsifal Tritsch bedenkt concepten en social media strategieën, hij schrijft dagelijks content voor bedrijven en onderhoudt verschillende Facebook en Google Adwords campagnes. Zijn interesse ligt vooral bij de psychologie achter online communicatie. Hoe, wat, waarom en wanneer communiceren mensen op het internet. Met passie deelt hij zijn kennis met ondernemers om ze zo wegwijs te maken in de snel groeiende internet marketing wereld. Zijn visie op marketing: “Stop met schreeuwen en start met luisteren naar je doelgroep. Ontdek waar je jouw doelgroep kunt helpen en speel hier op in!”.', '$2y$10$Iz8MpylH922DLxQEe5PGwOrZwmaZ8gATdnWQGo05FCWMV9TEnQxHy', '', '', '', '', '2014-04-10 08:02:31', '2014-04-16 11:51:57'),
(3, 'uploads/images/users/3/Stefan.jpg', 'Stefan', 'Stefan', 'Mol', 'mol@knal.nl', '', '$2y$10$osiQ4FNdELrWRf7PZwXSU.f4tcpAQ3op2N1nENO5Yy7Rk1DLuP6Eu', '', '', '', '', '2014-04-17 07:05:28', '2014-04-17 07:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE IF NOT EXISTS `workshops` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`id`, `title`, `body`, `slug`, `author`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Interactie met je fans', 'In deze workshop wordt uitgebreid uitgelegd hoe je het beste de interactie aan kan gaan met je fans EN hoe je dit het beste kan onderhouden!', 'interactie-met-je-fans', '1', 'uploads/images/workshops/285246_589106511118565_551419949_n.jpg', '2014-04-18 13:21:49', '2014-04-18 13:21:49'),
(4, 'Maak je niet dik', 'Maak je niet al te veel zorgen over wat je fans doen.', 'maak-je-niet-dik', '1', 'uploads/images/workshops/1604593_568561753231315_294890017_n.png', '2014-04-18 13:28:57', '2014-04-18 13:28:57'),
(5, 'Adverteren', 'De basis van het adverteren op Facebook wordt hier uitgelegd. ', 'adverteren', '1', 'uploads/images/workshops/BURN.jpeg', '2014-04-18 13:30:31', '2014-04-18 13:30:31'),
(6, 'Succesvol op Facebook', 'Yallahland', 'succesvol-op-facebook', '1', 'uploads/images/workshops/smiling mantis.jpg', '2014-04-18 13:31:42', '2014-04-18 13:31:42');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categorie_post`
--
ALTER TABLE `categorie_post`
  ADD CONSTRAINT `categorie_post_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `categorie_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `categorie_project`
--
ALTER TABLE `categorie_project`
  ADD CONSTRAINT `categorie_project_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `categorie_workshop`
--
ALTER TABLE `categorie_workshop`
  ADD CONSTRAINT `categorie_workshop_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `categorie_workshop_workshop_id_foreign` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`id`);

--
-- Constraints for table `comment_post`
--
ALTER TABLE `comment_post`
  ADD CONSTRAINT `post_comments_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `project_tag`
--
ALTER TABLE `project_tag`
  ADD CONSTRAINT `project_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tag_workshop`
--
ALTER TABLE `tag_workshop`
  ADD CONSTRAINT `tag_workshop_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `tag_workshop_workshop_id_foreign` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
