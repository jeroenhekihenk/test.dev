-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2014 at 06:17 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', '2014-04-03 13:12:56', '0000-00-00 00:00:00'),
(2, 'Henk', '2014-04-09 15:01:00', '0000-00-00 00:00:00'),
(7, 'jan', '2014-04-09 13:59:45', '2014-04-09 13:59:45');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `categorie_post`
--

INSERT INTO `categorie_post` (`id`, `post_id`, `categorie_id`) VALUES
(12, 1, 1),
(14, 2, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `naam`, `email`, `website`, `bericht`, `approved`, `created_at`, `updated_at`) VALUES
(1, 'Jeroen', 'jeroen@digitusmarketing.nl', '', 'Ik wil even kijken of ik de comment eruit kan krijgen.', 1, '2014-04-02 22:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comment_post`
--

INSERT INTO `comment_post` (`id`, `post_id`, `comment_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `metatags`
--

CREATE TABLE IF NOT EXISTS `metatags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `metatags`
--

INSERT INTO `metatags` (`id`, `metatitle`, `metadescription`, `robots`, `ogtitle`, `ogdescription`, `ogsitename`, `ogurl`, `ogimage`, `ogtype`, `created_at`, `updated_at`) VALUES
(1, 'Metatitle van eerste post', 'Metadescription van eerste post', '', 'De og title van de eerste post', 'De og description van de eerste post!', 'Digitus Marketing', 'http://localhost/test.v1/public/blog/de-eerste-post', '', 'article', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'De eerste page', 'De description van de eerste page!', '', 'ogtitle van de eerste page', 'De og description van de eerste page!', 'Digitus Marketing', 'ikhebgeenidee.nl', '', 'page', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Admin', 'Admin section', 'noindex, nofollow', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Blog', 'Description voor Blog', 'noindex, nofollow', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `body`, `author`, `slug`, `image`, `metatitle`, `metadescription`, `robots`, `ogtitle`, `ogdescription`, `ogsitename`, `ogurl`, `ogimage`, `ogtype`, `created_at`, `updated_at`) VALUES
(1, 'Eerste page', 'De bodytekst van de Eerste Page', '1', 'eerste_page', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Blog', '', '1', 'blog', '', 'Blog', '', 'noindex, nofollow', 'Blog', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Een pagina titel met ngo iet sderbij', 'Met een pagina body waar dus uitgebreide tekst in staat!', '1', 'een-pagina-titel-met-ngo-iet-sderbij', '', '', '', '', '', '', '', '', '', '', '2014-04-08 13:06:44', '2014-04-08 13:29:10'),
(6, 'Een pagina titel', 'Met een pagina body waar dus uitgebreide tekst in staat!', '1', 'een-pagina-titel', '', '', '', '', '', '', '', '', '', '', '2014-04-08 13:06:53', '2014-04-08 13:06:53');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `slug`, `metatitle`, `metadescription`, `robots`, `ogtitle`, `ogdescription`, `ogsitename`, `ogurl`, `ogimage`, `ogtype`, `created_at`, `updated_at`) VALUES
(1, 'de eerste post met bewerking!!', 'de eerste post haha!', '1', 'de-eerste-post-met-bewerking', '', '', '', '', '', '', '', '', '', '2014-04-09 14:40:20', '2014-04-09 12:40:20'),
(2, 'de tweede post van vandaag', 'met hopelijk een nieuwe tag derbij', '1', 'de-tweede-post-van-vandaag', '', '', '', '', '', '', '', '', '', '2014-04-03 13:34:32', '2014-04-03 13:34:32');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(1, 1, 1),
(4, 2, 4),
(7, 2, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`) VALUES
(5, 9, 2),
(8, 1, 1),
(9, 5, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'HEnk', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'nieuw', '2014-04-03 13:32:22', '2014-04-03 13:32:22'),
(3, 'Facebook marketing', '2014-04-09 14:09:34', '2014-04-09 14:09:34'),
(4, 'Facebook pagina', '2014-04-09 14:10:33', '2014-04-09 14:10:33'),
(5, 'Marketing', '2014-04-09 14:14:57', '2014-04-09 14:14:57');

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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `username`, `firstname`, `lastname`, `email`, `description`, `password`, `created_at`, `updated_at`) VALUES
(1, 'uploads/images/users/1/2222IMG_2259.jpg', 'jeroenheki', 'Jeroen', 'Venderbosch', 'jeroenvenderbosch@hotmail.com', '', '$2y$10$motIdEUg/z/3IMNy3eDHDupT4wwpHN6eBtHwntMlx4LGl7P1c5yQq', '2014-04-02 13:42:49', '2014-04-04 11:16:21'),
(5, '', 'parsifal', 'Parsifal', 'Tritsch', 'p.tritsch@gmail.com', '', '$2y$10$r./oOsWFgo4pYF/XcQFyfOI/WcEDNg8ebqWMFNzIPriN3vRM7NM2a', '2014-04-03 09:02:14', '2014-04-03 09:02:14'),
(9, '', 'selutrade', 'Selu', 'trade', 'selutrade@henk.nl', '', '$2y$10$dNXaDQlL1nMS0sxYNjDv9e0i1XThrYgwApm1Up730kLUZX4xoM9u.', '2014-04-09 10:03:40', '2014-04-09 10:03:40');

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
  ADD CONSTRAINT `post_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
