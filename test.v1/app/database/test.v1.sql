-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2014 at 06:08 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.24

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test.v1`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', '2014-04-03 13:12:56', '0000-00-00 00:00:00'),
(2, 'Henk', '2014-04-09 15:01:00', '0000-00-00 00:00:00'),
(3, 'Jan', '2014-04-10 08:19:31', '2014-04-10 08:19:31'),
(4, ' Willem', '2014-04-10 08:19:31', '2014-04-10 08:19:31'),
(5, ' Harry', '2014-04-10 08:19:31', '2014-04-10 08:19:31'),
(6, 'internet', '2014-04-15 10:26:19', '2014-04-15 10:26:19');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `categorie_post`
--

INSERT INTO `categorie_post` (`id`, `post_id`, `categorie_id`) VALUES
(7, 3, 1),
(10, 2, 1),
(11, 1, 2),
(12, 4, 1),
(13, 5, 6),
(14, 6, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

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
(10, 'Jeroen Venderbosch', 'jeroenvenderbosch@hotmail.com', 'https://www.facebook.com/Jvenderbosch', 'Hey hallo, werken de comments nog? :) \r\nIk ben bang dat er misschien iets misgaat! :o', 0, '2014-04-15 08:33:16', '2014-04-15 08:33:16');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comment_post`
--

INSERT INTO `comment_post` (`id`, `post_id`, `comment_id`) VALUES
(1, 1, 1),
(2, 3, 7),
(4, 1, 9),
(5, 1, 10);

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
('2014_04_08_103646_create_categorie_metatags_table', 12);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `layout`, `menu`, `footer`, `title`, `body`, `author`, `slug`, `image`, `metatitle`, `metadescription`, `robots`, `ogtitle`, `ogdescription`, `ogsitename`, `ogurl`, `ogimage`, `ogtype`, `created_at`, `updated_at`) VALUES
(1, 'front.page', '', '', 'Eerste page', 'De bodytekst van de Eerste Page', '1', 'eerste_page', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '', '', '', 'Blog', '', '1', 'blog', '', 'Blog', '', 'noindex, nofollow', 'Blog', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'front.page', 'front.menus.digimenu', 'front.footer.main', 'TESTEN', 'hey hallo ik wil graag testen of het mogelijk is om een palatje toe te voegen aan deze pagina, waaromd oet hij het hier wel en bij de posts niet?\r\n\r\n', '1', 'testen', '/uploads/images/pages/idee-offer-foto.png', 'TESTEN', 'hey hallo ik wil graag testen of het mogelijk is om een palatje toe te voegen aan deze pagina, waaromd oet hij het hier wel en bij de posts niet?\r\n\r\n', 'noindex, nofollow', 'TESTEN', 'hey hallo ik wil graag testen of het mogelijk is om een palatje toe te voegen aan deze pagina, waaromd oet hij het hier wel en bij de posts niet?\r\n\r\n', 'Digitus Marketing', '', '/uploads/images/pages/idee offer foto.png', 'Article', '2014-04-15 10:47:13', '2014-04-15 10:47:13');

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
  `image` varchar(50) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `slug`, `image`, `metatitle`, `metadescription`, `robots`, `ogtitle`, `ogdescription`, `ogsitename`, `ogurl`, `ogimage`, `ogtype`, `created_at`, `updated_at`) VALUES
(1, 'de eerste post met bewerking!!', 'de eerste post haha!', '1', 'de-eerste-post-met-bewerking', '', '', '', '', '', '', '', '', '', '', '2014-04-09 14:40:20', '2014-04-09 12:40:20'),
(2, 'de tweede post van vandaag', 'met hopelijk een nieuwe tag derbij', '1', 'de-tweede-post-van-vandaag', '', '', '', '', '', '', '', '', '', '', '2014-04-03 13:34:32', '2014-04-03 13:34:32'),
(3, 'De eerste post van iemand anders!', 'Met een geweldige bodytekst natuurlijk !!', '2', 'de-eerste-post-van-iemand-anders', '', '', '', '', '', '', '', '', '', '', '2014-04-10 08:12:19', '2014-04-10 08:12:19'),
(4, 'Idee offer foto!', 'Henkie henk henk henkie henkie kom bie mie', '1', 'idee-offer-foto', '', '', '', '', '', '', '', '', '', '', '2014-04-15 09:53:30', '2014-04-15 09:53:30'),
(5, 'Hey hallo', 'Funx radio oin the air!', '1', 'hey-hallo', '', '', '', '', '', '', '', '', '', '', '2014-04-15 10:25:55', '2014-04-15 10:25:55'),
(6, 'ksjdkjasdhaskjhdkjas', 'kjsdhfksdhjgsdgusdgodfijcnvkcnvd\r\nPLAATJE TOEGEOVED?!?!\r\nfjgdsflsdjaklfjxcklvsdfs\r\nef\r\nsdfdgsdgdaghdfghdfghd\r\naghdfgdgdsfasvvbdcxzAFDCSXJaxjczkc xkvsdjfwsdasxsa<br />\r\n\r\nsdasjdfsjfsdkgjdgjsdfkjasdfskfksdgksdgs', '1', 'ksjdkjasdhaskjhdkjas', '/uploads/images/posts/omslagfoto 2014.png', '', '', '', '', '', '', '', '/uploads/images/posts/omslagfoto 2014.png', '', '2014-04-15 15:27:59', '2014-04-15 13:27:59');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

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
(24, 6, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

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
(8, ' nieuw', '2014-04-10 08:44:40', '2014-04-10 08:44:40'),
(9, ' 1324', '2014-04-10 08:44:40', '2014-04-10 08:44:40'),
(10, ' test', '2014-04-15 10:23:10', '2014-04-15 10:23:10'),
(11, ' henk', '2014-04-15 10:23:10', '2014-04-15 10:23:10'),
(12, 'radio', '2014-04-15 10:25:36', '2014-04-15 10:25:36');

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
  `description` varchar(355) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `username`, `firstname`, `lastname`, `email`, `description`, `password`, `facebook`, `twitter`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'uploads/images/users/1/2222IMG_2259.jpg', 'jeroenheki', 'Jeroen', 'Venderbosch', 'jeroenvenderbosch@hotmail.com', '', '$2y$10$motIdEUg/z/3IMNy3eDHDupT4wwpHN6eBtHwntMlx4LGl7P1c5yQq', 'https://www.facebook.com/Jvenderbosch', '', '', '', '2014-04-02 13:42:49', '2014-04-11 08:03:07'),
(2, 'uploads/images/users/2/1184883_661248110554360_1218715576_n.png', 'Parsifal', 'Parsifal', 'Tritsch', 'p.tritsch@gmail.com', '', '$2y$10$Iz8MpylH922DLxQEe5PGwOrZwmaZ8gATdnWQGo05FCWMV9TEnQxHy', '', '', '', '', '2014-04-10 08:02:31', '2014-04-10 08:10:39');

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
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
