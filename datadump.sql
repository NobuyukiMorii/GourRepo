-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015 年 3 月 11 日 11:42
-- サーバのバージョン： 5.6.22
-- PHP Version: 5.5.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `GourRepo`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `description` varchar(1600) NOT NULL,
  `youtube_url` varchar(500) DEFAULT NULL,
  `thumbnails_url` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `del_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `movies`
--

INSERT INTO `movies` (`id`, `title`, `count`, `description`, `youtube_url`, `thumbnails_url`, `user_id`, `restaurant_id`, `created`, `del_flg`, `created_user_id`, `modified`, `modified_user_id`) VALUES
(1, '', 0, '', NULL, '', 0, 0, '2015-03-11 10:18:42', 0, 1, '2015-03-11 10:18:42', 1),
(2, '', 0, '', NULL, '', 0, 0, '2015-03-11 10:21:17', 0, 1, '2015-03-11 10:21:17', 1),
(3, '', 0, '', NULL, '', 0, 0, '2015-03-11 10:26:00', 0, 1, '2015-03-11 10:26:00', 1),
(4, '', 0, '', NULL, '', 0, 0, '2015-03-11 10:27:46', 0, 1, '2015-03-11 10:27:46', 1),
(5, '', 0, '', NULL, '', 0, 0, '2015-03-11 10:30:14', 0, 1, '2015-03-11 10:30:14', 1),
(6, 'Default Title', 0, 'Default description.', 'https://www.youtube.com/watch?v=46lEbgYrNS4', 'https://www.youtube.com/watch?v=https://i.ytimg.com/vi/46lEbgYrNS4/default.jpg', 0, 0, '2015-03-11 10:31:09', 0, 1, '2015-03-11 10:31:09', 1),
(7, 'Default Title', 0, 'Default description.', 'https://www.youtube.com/watch?v=46lEbgYrNS4', 'https://i.ytimg.com/vi/46lEbgYrNS4/default.jpg', 1, 10, '2015-03-11 11:03:54', 0, 1, '2015-03-11 11:03:54', 1),
(8, 'Default Title', 0, 'Default description.', 'https://www.youtube.com/watch?v=46lEbgYrNS4', 'https://i.ytimg.com/vi/46lEbgYrNS4/default.jpg', 1, 11, '2015-03-11 11:07:00', 0, 1, '2015-03-11 11:07:00', 1),
(9, 'Default Title', 0, 'Default description.', 'https://www.youtube.com/watch?v=46lEbgYrNS4', 'https://i.ytimg.com/vi/46lEbgYrNS4/default.jpg', 1, 12, '2015-03-11 11:07:10', 0, 1, '2015-03-11 11:07:10', 1),
(10, 'Default Title', 0, 'Default description.', 'https://www.youtube.com/watch?v=UuyxE8GuOS4', 'https://i.ytimg.com/vi/UuyxE8GuOS4/default.jpg', 1, 13, '2015-03-11 11:18:58', 0, 1, '2015-03-11 11:18:58', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
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
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `restaurants`
--

INSERT INTO `restaurants` (`id`, `user_id`, `gournabi_id`, `name`, `tel`, `address`, `latitude`, `longitude`, `category`, `url`, `url_mobile`, `opentime`, `holliday`, `access_line`, `access_station`, `access_station_exit`, `access_walk`, `access_note`, `parking_lots`, `pr`, `code_areacode`, `code_areaname`, `code_prefcode`, `code_prefname`, `budget`, `party`, `lunch`, `credit_card`, `equipment`, `del_flg`, `created`, `created_user_id`, `modified`, `modified_user_id`) VALUES
(1, 0, '7163584', '上海軒', '072-654-4233', '〒566-0052 大阪府摂津市鳥飼本町5-13-1 ', 35, 136, NULL, 'http://r.gnavi.co.jp/ktnvt2ry0000/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', 'http://mobile.gnavi.co.jp/shop/7163584/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', ',', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '〒566-0052 大阪府摂津市鳥飼本町5-13-1 <br/>TEL 072-654-4233', 'AREA120', '関西', NULL, '大阪府', NULL, NULL, NULL, NULL, NULL, 0, '2015-03-11 09:39:33', 1, '2015-03-11 09:39:33', 1),
(2, 0, '7163584', '上海軒', '072-654-4233', '〒566-0052 大阪府摂津市鳥飼本町5-13-1 ', 35, 136, NULL, 'http://r.gnavi.co.jp/ktnvt2ry0000/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', 'http://mobile.gnavi.co.jp/shop/7163584/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', ',', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '〒566-0052 大阪府摂津市鳥飼本町5-13-1 <br/>TEL 072-654-4233', 'AREA120', '関西', NULL, '大阪府', NULL, NULL, NULL, NULL, NULL, 0, '2015-03-11 10:01:26', 1, '2015-03-11 10:01:26', 1),
(3, 0, '7163584', '上海軒', '072-654-4233', '〒566-0052 大阪府摂津市鳥飼本町5-13-1 ', 35, 136, NULL, 'http://r.gnavi.co.jp/ktnvt2ry0000/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', 'http://mobile.gnavi.co.jp/shop/7163584/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', ',', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '〒566-0052 大阪府摂津市鳥飼本町5-13-1 <br/>TEL 072-654-4233', 'AREA120', '関西', NULL, '大阪府', NULL, NULL, NULL, NULL, NULL, 0, '2015-03-11 10:04:12', 1, '2015-03-11 10:04:12', 1),
(4, 0, '7163584', '上海軒', '072-654-4233', '〒566-0052 大阪府摂津市鳥飼本町5-13-1 ', 35, 136, NULL, 'http://r.gnavi.co.jp/ktnvt2ry0000/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', 'http://mobile.gnavi.co.jp/shop/7163584/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', ',', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '〒566-0052 大阪府摂津市鳥飼本町5-13-1 <br/>TEL 072-654-4233', 'AREA120', '関西', NULL, '大阪府', NULL, NULL, NULL, NULL, NULL, 0, '2015-03-11 10:18:42', 1, '2015-03-11 10:18:42', 1),
(5, 0, '7163584', '上海軒', '072-654-4233', '〒566-0052 大阪府摂津市鳥飼本町5-13-1 ', 35, 136, NULL, 'http://r.gnavi.co.jp/ktnvt2ry0000/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', 'http://mobile.gnavi.co.jp/shop/7163584/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', ',', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '〒566-0052 大阪府摂津市鳥飼本町5-13-1 <br/>TEL 072-654-4233', 'AREA120', '関西', NULL, '大阪府', NULL, NULL, NULL, NULL, NULL, 0, '2015-03-11 10:21:17', 1, '2015-03-11 10:21:17', 1),
(6, 0, 'g599603', 'Bistro Du Japon 裏椿', '050-5798-6635', '〒106-0032 東京都港区六本木7-9-4 惣慶ビル1F', 36, 140, 'おばんざい和風ビストロ', 'http://r.gnavi.co.jp/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', 'http://mobile.gnavi.co.jp/shop/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', '月～日 18:00～24:00(L.O.23:30),', NULL, '地下鉄日比谷線', '六本木駅', '4a出口', '3', NULL, NULL, '六本木駅すぐ！本格和食×ビストロ料理 【歓送迎会】2H飲放題付コース4,200円⇒19時迄のご来店で4,000円 【貸切】～20名様迄対応のBIGテーブル席が人気！庭園付個室有！', 'AREA110', '関東', NULL, '東京都', 3500, 4200, NULL, 'VISA,MasterCard,アメリカン・エキスプレス,JCB,', '個室あり,完全個室あり,宴会用飲み放題メニューあり,庭園がある,掘りごたつ席あり,カウンター席あり,3時間以上の宴会・パーティ可,はなれがある,ソフトバンク,NTT ドコモ,au,利用可,英語メニューあり,英語メニューあり,英語を話せるスタッフがいる,英語を話せるスタッフがいる,お子様連れOK,飲み放題メニューあり,誕生日特典あり,ベジタリアンメニューご相談,ワインセラーがある,座敷席あり,禁煙席あり,23時以降も食事ができる,日曜営業あり,女子会,夜の接待,デート,記念日,合コン,お一人様,同窓会,歓迎会,送別会,お祝い事,家族,大人数,不可,歓迎会・送別会,友人・知人,夫婦,ベビーカー入店OK,離乳食持ち込みOK,乳児からOK（終日）,', 0, '2015-03-11 10:26:00', 1, '2015-03-11 10:26:00', 1),
(7, 0, 'g599603', 'Bistro Du Japon 裏椿', '050-5798-6635', '〒106-0032 東京都港区六本木7-9-4 惣慶ビル1F', 36, 140, 'おばんざい和風ビストロ', 'http://r.gnavi.co.jp/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', 'http://mobile.gnavi.co.jp/shop/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', '月～日 18:00～24:00(L.O.23:30),', NULL, '地下鉄日比谷線', '六本木駅', '4a出口', '3', NULL, NULL, '六本木駅すぐ！本格和食×ビストロ料理 【歓送迎会】2H飲放題付コース4,200円⇒19時迄のご来店で4,000円 【貸切】～20名様迄対応のBIGテーブル席が人気！庭園付個室有！', 'AREA110', '関東', NULL, '東京都', 3500, 4200, NULL, 'VISA,MasterCard,アメリカン・エキスプレス,JCB,', '個室あり,完全個室あり,宴会用飲み放題メニューあり,庭園がある,掘りごたつ席あり,カウンター席あり,3時間以上の宴会・パーティ可,はなれがある,ソフトバンク,NTT ドコモ,au,利用可,英語メニューあり,英語メニューあり,英語を話せるスタッフがいる,英語を話せるスタッフがいる,お子様連れOK,飲み放題メニューあり,誕生日特典あり,ベジタリアンメニューご相談,ワインセラーがある,座敷席あり,禁煙席あり,23時以降も食事ができる,日曜営業あり,女子会,夜の接待,デート,記念日,合コン,お一人様,同窓会,歓迎会,送別会,お祝い事,家族,大人数,不可,歓迎会・送別会,友人・知人,夫婦,ベビーカー入店OK,離乳食持ち込みOK,乳児からOK（終日）,', 0, '2015-03-11 10:27:46', 1, '2015-03-11 10:27:46', 1),
(8, 0, 'g599603', 'Bistro Du Japon 裏椿', '050-5798-6635', '〒106-0032 東京都港区六本木7-9-4 惣慶ビル1F', 36, 140, 'おばんざい和風ビストロ', 'http://r.gnavi.co.jp/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', 'http://mobile.gnavi.co.jp/shop/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', '月～日 18:00～24:00(L.O.23:30),', NULL, '地下鉄日比谷線', '六本木駅', '4a出口', '3', NULL, NULL, '六本木駅すぐ！本格和食×ビストロ料理 【歓送迎会】2H飲放題付コース4,200円⇒19時迄のご来店で4,000円 【貸切】～20名様迄対応のBIGテーブル席が人気！庭園付個室有！', 'AREA110', '関東', NULL, '東京都', 3500, 4200, NULL, 'VISA,MasterCard,アメリカン・エキスプレス,JCB,', '個室あり,完全個室あり,宴会用飲み放題メニューあり,庭園がある,掘りごたつ席あり,カウンター席あり,3時間以上の宴会・パーティ可,はなれがある,ソフトバンク,NTT ドコモ,au,利用可,英語メニューあり,英語メニューあり,英語を話せるスタッフがいる,英語を話せるスタッフがいる,お子様連れOK,飲み放題メニューあり,誕生日特典あり,ベジタリアンメニューご相談,ワインセラーがある,座敷席あり,禁煙席あり,23時以降も食事ができる,日曜営業あり,女子会,夜の接待,デート,記念日,合コン,お一人様,同窓会,歓迎会,送別会,お祝い事,家族,大人数,不可,歓迎会・送別会,友人・知人,夫婦,ベビーカー入店OK,離乳食持ち込みOK,乳児からOK（終日）,', 0, '2015-03-11 10:30:14', 1, '2015-03-11 10:30:14', 1),
(9, 0, 'g599603', 'Bistro Du Japon 裏椿', '050-5798-6635', '〒106-0032 東京都港区六本木7-9-4 惣慶ビル1F', 36, 140, 'おばんざい和風ビストロ', 'http://r.gnavi.co.jp/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', 'http://mobile.gnavi.co.jp/shop/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', '月～日 18:00～24:00(L.O.23:30),', NULL, '地下鉄日比谷線', '六本木駅', '4a出口', '3', NULL, NULL, '六本木駅すぐ！本格和食×ビストロ料理 【歓送迎会】2H飲放題付コース4,200円⇒19時迄のご来店で4,000円 【貸切】～20名様迄対応のBIGテーブル席が人気！庭園付個室有！', 'AREA110', '関東', NULL, '東京都', 3500, 4200, NULL, 'VISA,MasterCard,アメリカン・エキスプレス,JCB,', '個室あり,完全個室あり,宴会用飲み放題メニューあり,庭園がある,掘りごたつ席あり,カウンター席あり,3時間以上の宴会・パーティ可,はなれがある,ソフトバンク,NTT ドコモ,au,利用可,英語メニューあり,英語メニューあり,英語を話せるスタッフがいる,英語を話せるスタッフがいる,お子様連れOK,飲み放題メニューあり,誕生日特典あり,ベジタリアンメニューご相談,ワインセラーがある,座敷席あり,禁煙席あり,23時以降も食事ができる,日曜営業あり,女子会,夜の接待,デート,記念日,合コン,お一人様,同窓会,歓迎会,送別会,お祝い事,家族,大人数,不可,歓迎会・送別会,友人・知人,夫婦,ベビーカー入店OK,離乳食持ち込みOK,乳児からOK（終日）,', 0, '2015-03-11 10:31:09', 1, '2015-03-11 10:31:09', 1),
(10, 1, 'g599603', 'Bistro Du Japon 裏椿', '050-5798-6635', '〒106-0032 東京都港区六本木7-9-4 惣慶ビル1F', 36, 140, 'おばんざい和風ビストロ', 'http://r.gnavi.co.jp/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', 'http://mobile.gnavi.co.jp/shop/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', '月～日 18:00～24:00(L.O.23:30),', NULL, '地下鉄日比谷線', '六本木駅', '4a出口', '3', NULL, NULL, '六本木駅すぐ！本格和食×ビストロ料理 【歓送迎会】2H飲放題付コース4,200円⇒19時迄のご来店で4,000円 【貸切】～20名様迄対応のBIGテーブル席が人気！庭園付個室有！', 'AREA110', '関東', NULL, '東京都', 3500, 4200, NULL, 'VISA,MasterCard,アメリカン・エキスプレス,JCB,', '個室あり,完全個室あり,宴会用飲み放題メニューあり,庭園がある,掘りごたつ席あり,カウンター席あり,3時間以上の宴会・パーティ可,はなれがある,ソフトバンク,NTT ドコモ,au,利用可,英語メニューあり,英語メニューあり,英語を話せるスタッフがいる,英語を話せるスタッフがいる,お子様連れOK,飲み放題メニューあり,誕生日特典あり,ベジタリアンメニューご相談,ワインセラーがある,座敷席あり,禁煙席あり,23時以降も食事ができる,日曜営業あり,女子会,夜の接待,デート,記念日,合コン,お一人様,同窓会,歓迎会,送別会,お祝い事,家族,大人数,不可,歓迎会・送別会,友人・知人,夫婦,ベビーカー入店OK,離乳食持ち込みOK,乳児からOK（終日）,', 0, '2015-03-11 11:03:54', 1, '2015-03-11 11:03:54', 1),
(11, 1, 'g599603', 'Bistro Du Japon 裏椿', '050-5798-6635', '〒106-0032 東京都港区六本木7-9-4 惣慶ビル1F', 36, 140, 'おばんざい和風ビストロ', 'http://r.gnavi.co.jp/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', 'http://mobile.gnavi.co.jp/shop/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', '月～日 18:00～24:00(L.O.23:30),', NULL, '地下鉄日比谷線', '六本木駅', '4a出口', '3', NULL, NULL, '六本木駅すぐ！本格和食×ビストロ料理 【歓送迎会】2H飲放題付コース4,200円⇒19時迄のご来店で4,000円 【貸切】～20名様迄対応のBIGテーブル席が人気！庭園付個室有！', 'AREA110', '関東', NULL, '東京都', 3500, 4200, NULL, 'VISA,MasterCard,アメリカン・エキスプレス,JCB,', '個室あり,完全個室あり,宴会用飲み放題メニューあり,庭園がある,掘りごたつ席あり,カウンター席あり,3時間以上の宴会・パーティ可,はなれがある,ソフトバンク,NTT ドコモ,au,利用可,英語メニューあり,英語メニューあり,英語を話せるスタッフがいる,英語を話せるスタッフがいる,お子様連れOK,飲み放題メニューあり,誕生日特典あり,ベジタリアンメニューご相談,ワインセラーがある,座敷席あり,禁煙席あり,23時以降も食事ができる,日曜営業あり,女子会,夜の接待,デート,記念日,合コン,お一人様,同窓会,歓迎会,送別会,お祝い事,家族,大人数,不可,歓迎会・送別会,友人・知人,夫婦,ベビーカー入店OK,離乳食持ち込みOK,乳児からOK（終日）,', 0, '2015-03-11 11:07:00', 1, '2015-03-11 11:07:00', 1),
(12, 1, 'g599603', 'Bistro Du Japon 裏椿', '050-5798-6635', '〒106-0032 東京都港区六本木7-9-4 惣慶ビル1F', 36, 140, 'おばんざい和風ビストロ', 'http://r.gnavi.co.jp/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', 'http://mobile.gnavi.co.jp/shop/g599603/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', '月～日 18:00～24:00(L.O.23:30),', NULL, '地下鉄日比谷線', '六本木駅', '4a出口', '3', NULL, NULL, '六本木駅すぐ！本格和食×ビストロ料理 【歓送迎会】2H飲放題付コース4,200円⇒19時迄のご来店で4,000円 【貸切】～20名様迄対応のBIGテーブル席が人気！庭園付個室有！', 'AREA110', '関東', NULL, '東京都', 3500, 4200, NULL, 'VISA,MasterCard,アメリカン・エキスプレス,JCB,', '個室あり,完全個室あり,宴会用飲み放題メニューあり,庭園がある,掘りごたつ席あり,カウンター席あり,3時間以上の宴会・パーティ可,はなれがある,ソフトバンク,NTT ドコモ,au,利用可,英語メニューあり,英語メニューあり,英語を話せるスタッフがいる,英語を話せるスタッフがいる,お子様連れOK,飲み放題メニューあり,誕生日特典あり,ベジタリアンメニューご相談,ワインセラーがある,座敷席あり,禁煙席あり,23時以降も食事ができる,日曜営業あり,女子会,夜の接待,デート,記念日,合コン,お一人様,同窓会,歓迎会,送別会,お祝い事,家族,大人数,不可,歓迎会・送別会,友人・知人,夫婦,ベビーカー入店OK,離乳食持ち込みOK,乳児からOK（終日）,', 0, '2015-03-11 11:07:10', 1, '2015-03-11 11:07:10', 1),
(13, 1, '6775685', 'GOENya', '03-6762-9005', '〒166-0001 東京都杉並区阿佐谷北2-2-8 ', 36, 140, '和風創作居酒屋', 'http://r.gnavi.co.jp/htwj7u9e0000/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', 'http://mobile.gnavi.co.jp/shop/6775685/?ak=2ooRLjRm48dzSYFXXFCec5Gqd4knObRSaqOLn4Fws1Q%3D', '火～木・日 17:00～翌2:00<BR>金・土 17:00～翌5:00,', NULL, 'ＪＲ中央線', '阿佐ケ谷駅', '北口', '徒歩1', NULL, NULL, '【阿佐ヶ谷駅徒歩1分】\n居酒屋の定番がつまったコース2,100円～\n季節や週ごとに変わるおばんざいとゆるーい雰囲気のお店！\n女子会やサク飲みにも', 'AREA110', '関東', NULL, '東京都', 2500, 3000, NULL, NULL, NULL, 0, '2015-03-11 11:18:58', 1, '2015-03-11 11:18:58', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) unsigned NOT NULL,
  `name` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `tag_relations`
--

CREATE TABLE IF NOT EXISTS `tag_relations` (
  `id` int(11) unsigned NOT NULL,
  `tag_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_favorite_movie_lists`
--

CREATE TABLE IF NOT EXISTS `user_favorite_movie_lists` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_profiles`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `user_watch_movie_lists`
--

CREATE TABLE IF NOT EXISTS `user_watch_movie_lists` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
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
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag_relations`
--
ALTER TABLE `tag_relations`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_favorite_movie_lists`
--
ALTER TABLE `user_favorite_movie_lists`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_watch_movie_lists`
--
ALTER TABLE `user_watch_movie_lists`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
