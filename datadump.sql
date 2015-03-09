-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成時間: 2015 年 3 月 09 日 11:45
-- サーバのバージョン: 5.5.9
-- PHP のバージョン: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- データベース: `GourRepo`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `description` varchar(1600) NOT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `thumbnails_url` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `del_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `movies`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE `restaurants` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gournabi_id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `latitude` int(11) DEFAULT NULL,
  `longitude` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
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
  `modified_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- テーブルのデータをダンプしています `restaurants`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `tags`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `tag_relations`
--

DROP TABLE IF EXISTS `tag_relations`;
CREATE TABLE `tag_relations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `tag_relations`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `del_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `users`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `user_favorite_movie_lists`
--

DROP TABLE IF EXISTS `user_favorite_movie_lists`;
CREATE TABLE `user_favorite_movie_lists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `user_favorite_movie_lists`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE `user_profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `modified_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `user_profiles`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `user_watch_movie_lists`
--

DROP TABLE IF EXISTS `user_watch_movie_lists`;
CREATE TABLE `user_watch_movie_lists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- テーブルのデータをダンプしています `user_watch_movie_lists`
--
