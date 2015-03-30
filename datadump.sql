-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015 年 3 月 30 日 11:37
-- サーバのバージョン： 5.6.22
-- PHP Version: 5.5.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gourrepo`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `large_areas`
--

DROP TABLE IF EXISTS `large_areas`;
CREATE TABLE IF NOT EXISTS `large_areas` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pref_code` varchar(255) NOT NULL,
  `pref_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=265 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `large_categories`
--

DROP TABLE IF EXISTS `large_categories`;
CREATE TABLE IF NOT EXISTS `large_categories` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `middle_areas`
--

DROP TABLE IF EXISTS `middle_areas`;
CREATE TABLE IF NOT EXISTS `middle_areas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `l_code` varchar(255) NOT NULL,
  `pref_name` varchar(255) NOT NULL,
  `pref_code` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=770 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `description` varchar(1600) NOT NULL,
  `youtube_url` varchar(500) DEFAULT NULL,
  `youtube_iframe_url` varchar(255) NOT NULL,
  `thumbnails_url` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `del_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=691 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `preferences`
--

DROP TABLE IF EXISTS `preferences`;
CREATE TABLE IF NOT EXISTS `preferences` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `gournabi_id` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `latitude` decimal(12,9) DEFAULT NULL,
  `longitude` decimal(12,9) DEFAULT NULL,
  `category_code_l` varchar(255) DEFAULT NULL,
  `category_name_l` varchar(255) DEFAULT NULL,
  `category_code_s` varchar(255) DEFAULT NULL,
  `category_name_s` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `url_mobile` varchar(255) DEFAULT NULL,
  `opentime` varchar(255) DEFAULT NULL,
  `holliday` varchar(255) DEFAULT NULL,
  `access_line` varchar(255) DEFAULT NULL,
  `access_station` varchar(255) DEFAULT NULL,
  `access_station_exit` varchar(255) DEFAULT NULL,
  `access_walk` varchar(255) DEFAULT NULL,
  `access_note` varchar(255) DEFAULT NULL,
  `parking_lots` int(11) DEFAULT NULL,
  `pr` varchar(1000) DEFAULT NULL,
  `code_areacode` varchar(255) DEFAULT NULL,
  `code_areaname` varchar(255) DEFAULT NULL,
  `code_prefcode` varchar(255) DEFAULT NULL,
  `code_prefname` varchar(255) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `party` int(11) DEFAULT NULL,
  `lunch` int(11) DEFAULT NULL,
  `credit_card` varchar(255) DEFAULT NULL,
  `equipment` varchar(2000) DEFAULT NULL,
  `del_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=603 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `small_areas`
--

DROP TABLE IF EXISTS `small_areas`;
CREATE TABLE IF NOT EXISTS `small_areas` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `m_code` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `l_code` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `pref_code` varchar(255) NOT NULL,
  `pref_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=856 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `small_categories`
--

DROP TABLE IF EXISTS `small_categories`;
CREATE TABLE IF NOT EXISTS `small_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `l_code` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `tag_relations`
--

DROP TABLE IF EXISTS `tag_relations`;
CREATE TABLE IF NOT EXISTS `tag_relations` (
  `id` int(11) unsigned NOT NULL,
  `tag_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `del_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_favorite_movie_lists`
--

DROP TABLE IF EXISTS `user_favorite_movie_lists`;
CREATE TABLE IF NOT EXISTS `user_favorite_movie_lists` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `like_food` varchar(255) NOT NULL,
  `like_genre` varchar(255) NOT NULL,
  `like_price_zone` varchar(255) NOT NULL,
  `near_station` varchar(255) NOT NULL,
  `living_area` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `avatar_file_name` varchar(255) NOT NULL,
  `del_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_watch_movie_lists`
--

DROP TABLE IF EXISTS `user_watch_movie_lists`;
CREATE TABLE IF NOT EXISTS `user_watch_movie_lists` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=480 DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `large_areas`
--
ALTER TABLE `large_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `large_categories`
--
ALTER TABLE `large_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `middle_areas`
--
ALTER TABLE `middle_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `small_areas`
--
ALTER TABLE `small_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `small_categories`
--
ALTER TABLE `small_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_relations`
--
ALTER TABLE `tag_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_favorite_movie_lists`
--
ALTER TABLE `user_favorite_movie_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_watch_movie_lists`
--
ALTER TABLE `user_watch_movie_lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `large_areas`
--
ALTER TABLE `large_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=265;
--
-- AUTO_INCREMENT for table `large_categories`
--
ALTER TABLE `large_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `middle_areas`
--
ALTER TABLE `middle_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=770;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=691;
--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=603;
--
-- AUTO_INCREMENT for table `small_areas`
--
ALTER TABLE `small_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=856;
--
-- AUTO_INCREMENT for table `small_categories`
--
ALTER TABLE `small_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=208;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `tag_relations`
--
ALTER TABLE `tag_relations`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_favorite_movie_lists`
--
ALTER TABLE `user_favorite_movie_lists`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_watch_movie_lists`
--
ALTER TABLE `user_watch_movie_lists`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=480;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
