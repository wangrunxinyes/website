-- ---------------------------------------------------------
-- Database Name: wangrunxin
CREATE DATABASE IF NOT EXISTS `wangrunxin` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `wangrunxin`;
-- ---------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES 'utf8' */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='SYSTEM' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


--
-- Table structure for table main_web_general_settings
--

DROP TABLE IF EXISTS `main_web_general_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `main_web_general_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `identify` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table main_web_general_settings
--

INSERT INTO `main_web_general_settings` VALUES ( 1, 'main_web_im_ad_1', 'http://i3.tietuku.com/cada1485466e5a6d.jpg' );
INSERT INTO `main_web_general_settings` VALUES ( 2, 'main_web_im_ad_2', 'http://i3.tietuku.com/7072ead33325d672.jpg' );
INSERT INTO `main_web_general_settings` VALUES ( 3, 'main_web_im_ad_3', 'http://i3.tietuku.com/91c65e9fadb782d3.jpg' );
INSERT INTO `main_web_general_settings` VALUES ( 4, 'main_web_im_ad_4', 'video-replace-mobile.jpg' );
INSERT INTO `main_web_general_settings` VALUES ( 5, 'main_web_im_ad_5', 'http://i3.tietuku.com/327a8f39cebc4b00.jpg' );

--
-- Table structure for table oauth_consumer_registry
--

DROP TABLE IF EXISTS `oauth_consumer_registry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `oauth_consumer_registry` (
  `ocr_id` int(11) NOT NULL AUTO_INCREMENT,
  `ocr_usa_id_ref` int(11) DEFAULT NULL,
  `ocr_consumer_key` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ocr_consumer_secret` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ocr_signature_methods` varchar(255) NOT NULL DEFAULT 'HMAC-SHA1,PLAINTEXT',
  `ocr_server_uri` varchar(255) NOT NULL,
  `ocr_server_uri_host` varchar(128) NOT NULL,
  `ocr_server_uri_path` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ocr_request_token_uri` varchar(255) NOT NULL,
  `ocr_authorize_uri` varchar(255) NOT NULL,
  `ocr_access_token_uri` varchar(255) NOT NULL,
  `ocr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ocr_id`),
  UNIQUE KEY `ocr_consumer_key` (`ocr_consumer_key`,`ocr_usa_id_ref`,`ocr_server_uri`),
  KEY `ocr_server_uri` (`ocr_server_uri`),
  KEY `ocr_server_uri_host` (`ocr_server_uri_host`,`ocr_server_uri_path`),
  KEY `ocr_usa_id_ref` (`ocr_usa_id_ref`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table oauth_consumer_registry
--

INSERT INTO `oauth_consumer_registry` VALUES ( 1, 1, '3256e785485f8c52d516ea3e77500bdf055c03f9a', '8cd9b5d9281532728ad4970d3e102dc2', 'HMAC-SHA1,PLAINTEXT', 'http://www.wangrunxin.com/', 'www.wangrunxin.com', '王润心的个人网站', 'http://www.tongchengchina.com/interface/Requesttoken', 'http://www.wangrunxin.com/oauth_sdk/example.php', 'http://www.wangrunxin.com/oauth_sdk/example.php', '2015-08-04 12:29:15' );

--
-- Table structure for table oauth_consumer_token
--

DROP TABLE IF EXISTS `oauth_consumer_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `oauth_consumer_token` (
  `oct_id` int(11) NOT NULL AUTO_INCREMENT,
  `oct_ocr_id_ref` int(11) NOT NULL,
  `oct_usa_id_ref` int(11) NOT NULL,
  `oct_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `oct_token` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `oct_token_secret` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `oct_token_type` enum('request','authorized','access') DEFAULT NULL,
  `oct_token_ttl` datetime NOT NULL DEFAULT '9999-12-31 00:00:00',
  `oct_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`oct_id`),
  UNIQUE KEY `oct_ocr_id_ref` (`oct_ocr_id_ref`,`oct_token`),
  UNIQUE KEY `oct_usa_id_ref` (`oct_usa_id_ref`,`oct_ocr_id_ref`,`oct_token_type`,`oct_name`),
  KEY `oct_token_ttl` (`oct_token_ttl`),
  CONSTRAINT `oauth_consumer_token_ibfk_1` FOREIGN KEY (`oct_ocr_id_ref`) REFERENCES `oauth_consumer_registry` (`ocr_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table oauth_consumer_token
--


--
-- Table structure for table oauth_log
--

DROP TABLE IF EXISTS `oauth_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `oauth_log` (
  `olg_id` int(11) NOT NULL AUTO_INCREMENT,
  `olg_osr_consumer_key` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `olg_ost_token` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `olg_ocr_consumer_key` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `olg_oct_token` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `olg_usa_id_ref` int(11) DEFAULT NULL,
  `olg_received` text NOT NULL,
  `olg_sent` text NOT NULL,
  `olg_base_string` text NOT NULL,
  `olg_notes` text NOT NULL,
  `olg_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `olg_remote_ip` bigint(20) NOT NULL,
  PRIMARY KEY (`olg_id`),
  KEY `olg_osr_consumer_key` (`olg_osr_consumer_key`,`olg_id`),
  KEY `olg_ost_token` (`olg_ost_token`,`olg_id`),
  KEY `olg_ocr_consumer_key` (`olg_ocr_consumer_key`,`olg_id`),
  KEY `olg_oct_token` (`olg_oct_token`,`olg_id`),
  KEY `olg_usa_id_ref` (`olg_usa_id_ref`,`olg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table oauth_log
--


--
-- Table structure for table oauth_server_nonce
--

DROP TABLE IF EXISTS `oauth_server_nonce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `oauth_server_nonce` (
  `osn_id` int(11) NOT NULL AUTO_INCREMENT,
  `osn_consumer_key` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `osn_token` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `osn_timestamp` bigint(20) NOT NULL,
  `osn_nonce` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`osn_id`),
  UNIQUE KEY `osn_consumer_key` (`osn_consumer_key`,`osn_token`,`osn_timestamp`,`osn_nonce`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table oauth_server_nonce
--


--
-- Table structure for table oauth_server_registry
--

DROP TABLE IF EXISTS `oauth_server_registry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `oauth_server_registry` (
  `osr_id` int(11) NOT NULL AUTO_INCREMENT,
  `osr_usa_id_ref` int(11) DEFAULT NULL,
  `osr_consumer_key` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `osr_consumer_secret` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `osr_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `osr_status` varchar(16) NOT NULL,
  `osr_requester_name` varchar(64) NOT NULL,
  `osr_requester_email` varchar(64) NOT NULL,
  `osr_callback_uri` varchar(255) NOT NULL,
  `osr_application_uri` varchar(255) NOT NULL,
  `osr_application_title` varchar(80) NOT NULL,
  `osr_application_descr` text NOT NULL,
  `osr_application_notes` text NOT NULL,
  `osr_application_type` varchar(20) NOT NULL,
  `osr_application_commercial` tinyint(1) NOT NULL DEFAULT '0',
  `osr_issue_date` datetime NOT NULL,
  `osr_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`osr_id`),
  UNIQUE KEY `osr_consumer_key` (`osr_consumer_key`),
  KEY `osr_usa_id_ref` (`osr_usa_id_ref`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table oauth_server_registry
--

INSERT INTO `oauth_server_registry` VALUES ( 24, 1, '3256e785485f8c52d516ea3e77500bdf055c03f9a', '8cd9b5d9281532728ad4970d3e102dc2', 1, 'active', 'wangrunxin.com', 'wangrunxin.com', '', '', '', '', '', '', 0, '2015-08-04 12:29:15', '2015-08-04 12:29:15' );

--
-- Table structure for table oauth_server_token
--

DROP TABLE IF EXISTS `oauth_server_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `oauth_server_token` (
  `ost_id` int(11) NOT NULL AUTO_INCREMENT,
  `ost_osr_id_ref` int(11) NOT NULL,
  `ost_usa_id_ref` int(11) NOT NULL,
  `ost_token` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ost_token_secret` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ost_token_type` enum('request','access') DEFAULT NULL,
  `ost_authorized` tinyint(1) NOT NULL DEFAULT '0',
  `ost_referrer_host` varchar(128) NOT NULL,
  `ost_token_ttl` datetime NOT NULL DEFAULT '9999-12-31 00:00:00',
  `ost_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ost_verifier` char(10) DEFAULT NULL,
  `ost_callback_url` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`ost_id`),
  UNIQUE KEY `ost_token` (`ost_token`),
  KEY `ost_osr_id_ref` (`ost_osr_id_ref`),
  KEY `ost_token_ttl` (`ost_token_ttl`),
  CONSTRAINT `oauth_server_token_ibfk_1` FOREIGN KEY (`ost_osr_id_ref`) REFERENCES `oauth_server_registry` (`osr_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table oauth_server_token
--


--
-- Table structure for table weixin_basic_db
--

DROP TABLE IF EXISTS `weixin_basic_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `weixin_basic_db` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `weixin_app_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weixin_app_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weixin_open_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weixin_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weixin_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weixin_accesstoken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weixin_experid_time` int(11) unsigned DEFAULT NULL,
  `attributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table weixin_basic_db
--

INSERT INTO `weixin_basic_db` VALUES ( 1, 'wxeca0dc64dd540f5b', 'fdc6f0cbb93555b68873d3fe05d70c56', 'gh_0ee0f56d87c9', '测试号', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEJKawKEtTuyDOtFiaREhPPoMUq3GlCPdDIJZSt5DIiatlibMrAeS4dZ62lN0r8INJnkaW8ohESNKvNMw/64', 'B70G_XONKf8Q1-HweXKPOJrpjvprAdLQy3Ov0jEG_kYr3fkrvQOKnXSfp01qN_PA-EMzun-9kZj-cxLnC0DJL3Yiw8yCFC98fQ6jgQ9dcLwCRRhAGAGVV', 1451390491, 'wxeca0dc64dd540f5b' );

--
-- Table structure for table weixin_group_db
--

DROP TABLE IF EXISTS `weixin_group_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `weixin_group_db` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `weixin_app_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` tinyint(3) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num` tinyint(3) unsigned DEFAULT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` int(11) unsigned DEFAULT NULL,
  `state` tinyint(3) unsigned DEFAULT NULL,
  `attributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table weixin_group_db
--

INSERT INTO `weixin_group_db` VALUES ( 33, 'wxeca0dc64dd540f5b', 0, '未分组', 3, 1, 1442999136, 0, 'none' );
INSERT INTO `weixin_group_db` VALUES ( 34, 'wxeca0dc64dd540f5b', 1, '黑名单', 0, 1, 1442999136, 0, 'none' );
INSERT INTO `weixin_group_db` VALUES ( 35, 'wxeca0dc64dd540f5b', 2, '星标组', 0, 1, 1442999136, 0, 'none' );
INSERT INTO `weixin_group_db` VALUES ( 36, 'wxeca0dc64dd540f5b', 100, '测试组', 0, 1, 1442999136, 0, 'none' );
INSERT INTO `weixin_group_db` VALUES ( 37, 'wxeca0dc64dd540f5b', 101, '运营组', 0, 1, 1442999136, 0, 'none' );
INSERT INTO `weixin_group_db` VALUES ( 38, 'wxeca0dc64dd540f5b', 0, '默认组', 0, 'user_id', 1443509775, 0, 'none' );
INSERT INTO `weixin_group_db` VALUES ( 39, 'wxeca0dc64dd540f5b', 0, '默认组', 0, 'user_id', 1443509782, 0, 'none' );
INSERT INTO `weixin_group_db` VALUES ( 40, 'wxeca0dc64dd540f5b', 0, '默认组', 0, 'user_id', 1444798855, 0, 'none' );
INSERT INTO `weixin_group_db` VALUES ( 41, 'wxeca0dc64dd540f5b', 0, '默认组', 0, 'user_id', 1444804180, 0, 'none' );

--
-- Table structure for table weixin_membercard_db
--

DROP TABLE IF EXISTS `weixin_membercard_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `weixin_membercard_db` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_card_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` int(11) unsigned DEFAULT NULL,
  `start_time` int(11) unsigned DEFAULT NULL,
  `end_time` int(11) unsigned DEFAULT NULL,
  `score` tinyint(3) unsigned DEFAULT NULL,
  `state` tinyint(3) unsigned DEFAULT NULL,
  `attributes` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table weixin_membercard_db
--

INSERT INTO `weixin_membercard_db` VALUES ( 1, 'test_123456789', 'test_123456789', 'init_user', 1442369509, 1442369509, 1442369509, 0, 0, NULL );

--
-- Table structure for table weixin_message_db
--

DROP TABLE IF EXISTS `weixin_message_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `weixin_message_db` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fromusername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tousername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table weixin_message_db
--

INSERT INTO `weixin_message_db` VALUES ( 1, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'gh_0ee0f56d87c9', 'init_message', 1442457393, 'yes', 0 );

--
-- Table structure for table weixin_oauth_user_db
--

DROP TABLE IF EXISTS `weixin_oauth_user_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `weixin_oauth_user_db` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires_time` int(11) unsigned DEFAULT NULL,
  `refresh_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `openid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unionid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table weixin_oauth_user_db
--

INSERT INTO `weixin_oauth_user_db` VALUES ( 1, 'init', 1444806056, 'init', 'init', 'init', 'init', NULL );
INSERT INTO `weixin_oauth_user_db` VALUES ( 4, 'OezXcEiiBSKSxW0eoylIePRCmftEw-1c-1C8Ele9zuNmn7cVIjBkMcLWK1_e0phCFai24tsS0_69IVStO9ugru-TWuf6OPwlIhOtxT9eoZjkdVkdzU7Ob5_uchwj_co2SR4VAqvOgtmAEBtVhDll3A', NULL, 'OezXcEiiBSKSxW0eoylIePRCmftEw-1c-1C8Ele9zuNmn7cVIjBkMcLWK1_e0phCYPggDxAaZ66KI_J4JjYb1_w7gveHFpljlT2MsWhbiM2FWBJIJc8loSuXglAQm7SgP35zfmZZjRR4RQmo6xYjFA', 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'snsapi_base', NULL, NULL );

--
-- Table structure for table weixin_post_msg_db
--

DROP TABLE IF EXISTS `weixin_post_msg_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `weixin_post_msg_db` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `belong_to_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` int(11) unsigned DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table weixin_post_msg_db
--

INSERT INTO `weixin_post_msg_db` VALUES ( 1, 'none', 'test post msg', 'http://www.tongchengchina.com/files/wxeca0dc64dd540f5b/thumbnail/4a43510a0830d4d1c60cdf72abc2a193.jpg', 'www.baidu.com', 'user_id', 1442474991, 'edit', 'none' );
INSERT INTO `weixin_post_msg_db` VALUES ( 2, 'none', '新微信', 'http://www.tongchengchina.com/files/wxeca0dc64dd540f5b/thumbnail/4a43510a0830d4d1c60cdf72abc2a193.jpg', 'www.baidu.com', 1, 1443086261, 'new', 'none' );
INSERT INTO `weixin_post_msg_db` VALUES ( 3, 'none', '测试', 'http://localhost/cms/files/wxeca0dc64dd540f5b/caaaed77a71f620bc70a3e2346dc27e1.jpg', 'http://baidu.com', 1, 1442476738, 'new', 'none' );
INSERT INTO `weixin_post_msg_db` VALUES ( 4, 3, '新子菜单1', 'http://localhost/cms/files/wxeca0dc64dd540f5b/06c2620466b8e40fd93ca76918d2f5d2.png', 'http://baidu.com', 1, 1442476700, 'new', 'none' );
INSERT INTO `weixin_post_msg_db` VALUES ( 9, 'none', '微信推送测试-标题', 'http://localhost/cms/files/wxeca0dc64dd540f5b/49527034782822df61ecd58bb4dcde5e.jpg', 'http://', 1, 1443173123, 'new', 'none' );
INSERT INTO `weixin_post_msg_db` VALUES ( 10, 9, '子菜单-1', 'http://localhost/cms/files/wxeca0dc64dd540f5b/49527034782822df61ecd58bb4dcde5e.jpg', 'http://aaa', 1, 1443173123, 'new', 'none' );
INSERT INTO `weixin_post_msg_db` VALUES ( 11, 9, '子菜单-2', 'http://localhost/cms/files/wxeca0dc64dd540f5b/194497969c24e8811ed3f4b7ddb0f8a5.png', 'http://bbbb', 1, 1443173123, 'new', 'none' );
INSERT INTO `weixin_post_msg_db` VALUES ( 12, 2, '微信测试1', 'http://localhost/cms/files/wxeca0dc64dd540f5b/0ef673cca9a4e9c7136682e778ec4af9.jpg', 'http://www.baidu.com', 1, 1443086261, 'new', 'none' );

--
-- Table structure for table weixin_post_msg_record_db
--

DROP TABLE IF EXISTS `weixin_post_msg_record_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `weixin_post_msg_record_db` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_user_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_msg_id` tinyint(1) unsigned DEFAULT NULL,
  `post_by` tinyint(1) unsigned DEFAULT NULL,
  `post_time` int(11) unsigned DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table weixin_post_msg_record_db
--

INSERT INTO `weixin_post_msg_record_db` VALUES ( 1, 'all', 1, 1, 1442474671, 'finish', 'data from tencent.', 'none' );

--
-- Table structure for table weixin_reply_db
--

DROP TABLE IF EXISTS `weixin_reply_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `weixin_reply_db` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fromusername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tousername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  `messageid` tinyint(1) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idenitfyid` tinyint(1) unsigned DEFAULT NULL,
  `attributes` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table weixin_reply_db
--

INSERT INTO `weixin_reply_db` VALUES ( 1, 'gh_0ee0f56d87c9', 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'WRX_WEIXIN_READ', 1442477958, 1, 'text', 1, NULL );

--
-- Table structure for table weixin_user_db
--

DROP TABLE IF EXISTS `weixin_user_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `weixin_user_db` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `belong_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `real_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weixin_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weixin_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weixin_group` tinyint(3) unsigned DEFAULT NULL,
  `create_time` int(11) unsigned DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` tinyint(3) unsigned DEFAULT NULL,
  `weixin_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table weixin_user_db
--

INSERT INTO `weixin_user_db` VALUES ( 1, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'o', 'wxeca0dc64dd540f5b', 'unknown', 'unknown', 'wangrunxinyes', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEJKawKEtTuyDOtFiaREhPPoMUq3GlCPdDIJZSt5DIiatlibMrAeS4dZ62lN0r8INJnkaW8ohESNKvNMw/', 0, 1443501781, '', 'Kowloon City', '', 1, 'okNlYwAj_AIWKCelFZSPwMZLhoFI', 'unknown' );
INSERT INTO `weixin_user_db` VALUES ( 2, 'oXSVyw68KGbpxgLM90_mOIJFenz0', NULL, 'wxeca0dc64dd540f5b', 'unknown', 'unknown', 'Shibingyan', 'http://wx.qlogo.cn/mmopen/UdIorOKF3RSsn3UW53bhS9Oj5ymzDIqzSzwBE2KnGyFaf5BhvUIJ7WPibDhDAibFcvPIoPpKh4WlZsUBFOA4RZZA/', 0, 1441467327, '中国', '上海', '金山', 2, 'okNlYwFr4r0tPH1Ot1bvOPbEqLvI', 'unknown' );
INSERT INTO `weixin_user_db` VALUES ( 3, 'oXSVywxboKZGjPjePXGM1LkFdOFs', NULL, 'wxeca0dc64dd540f5b', 'unknown', 'unknown', '零丶感', 'http://wx.qlogo.cn/mmopen/x2picuKmNXNibrszm1GpHTkS3N7nl5zVaguRTxsRgNdqPd2mhFs7YkJEDPmJ0NicYqibLraneMmiaXISZvebrGHsx46DYAiaU1YRog/', 0, 1441875286, '中国香港', '九龙城区', '', 1, 'okNlYwGbKRdmvlX0IV_v5wM25vdU', 'unknown' );

--
-- Table structure for table worklog
--

DROP TABLE IF EXISTS `worklog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `worklog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table worklog
--

INSERT INTO `worklog` VALUES ( 1, 1444129593 );

--
-- Table structure for table wrx_image_db
--

DROP TABLE IF EXISTS `wrx_image_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `wrx_image_db` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `identify` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` int(11) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `des` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table wrx_image_db
--

INSERT INTO `wrx_image_db` VALUES ( 1, 'HJFHA18asFDF', 1444971857, 'img', 'init', 'icon.png', 'icon.png', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 2, 'test', 1444977412, 'img', 'init', 'test', 'test', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 3, 'wxeca0dc64dd540f5b', 1444977632, 'img', 'init', '4d6706ebbd97e6b4c6a699fbaa889a8d', '793b259795c30e469ccdfa4c345ccfd7.png', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 4, 'wxeca0dc64dd540f5b', 1444978915, 'img', 'init', 'baa61a77658ea1e805612d6ab2d0d33f', '058c5783afd5f2b077ff9ebcc4a95b6e.png', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 5, 'wxeca0dc64dd540f5b', 1444980080, 'img', 'init', 'baa61a77658ea1e805612d6ab2d0d33f', '21919e771c0e386332d578fdb180de90.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 6, 'wxeca0dc64dd540f5b', 1444982593, 'img', 'init', '7c82a2944b315f4de748576fa1978068', 'c9ae063a1f7517ce90fc217775c80d71.png', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 7, 'wxeca0dc64dd540f5b', 1444982614, 'img', 'init', '7c82a2944b315f4de748576fa1978068', '5c8893e593fde86de48e263877353aae.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 8, 'wxeca0dc64dd540f5b', 1444983994, 'img', 'init', '7c82a2944b315f4de748576fa1978068', '7b0b40be9d3efd63056c25a413d79a55.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 9, 'wxeca0dc64dd540f5b', 1444984198, 'img', 'init', '7c82a2944b315f4de748576fa1978068', '23228dfed61e26b6023a7689503769ae.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 10, 'wxeca0dc64dd540f5b', 1444984249, 'img', 'init', '7c82a2944b315f4de748576fa1978068', 'dc676c3551fa351cc9a200af21bb886c.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 11, 'wxeca0dc64dd540f5b', 1444986150, 'img', 'init', 'all', '5525ca20523cbb7d76cedb5f01eded97.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 12, 'wxeca0dc64dd540f5b', 1444986248, 'img', 'init', 'all', '6d02fb7314e4e1664ca7f8671d9bb33e.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 13, 'wxeca0dc64dd540f5b', 1444986252, 'img', 'init', 'all', 'eca10aca3bc3fe3eefe15f55dff95701.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 14, 'wxeca0dc64dd540f5b', 1444986257, 'img', 'init', 'all', 'a32818a9f3db8d8498ea2f67cfdff5fe.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 15, 'wxeca0dc64dd540f5b', 1444986262, 'img', 'init', 'all', 'aaea264c495d24584a7fd25c462a9401.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 16, 'wxeca0dc64dd540f5b', 1444986267, 'img', 'init', 'all', '1b0a72365183aa6337ceb1abe0affeb6.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 17, 'wxeca0dc64dd540f5b', 1444986579, 'img', 'init', 'e346daaf2737ba8f2ff9a109f584dec2', 'c855d48d314c76212f4630a2eeed8650.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 18, 'wxeca0dc64dd540f5b', 1444986834, 'img', 'init', 'e346daaf2737ba8f2ff9a109f584dec2', 'f867c009e23d147788da171e4142da63.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 19, 'wxeca0dc64dd540f5b', 1444991131, 'img', 'init', '2e4daccaacc4fe2c22327bfbbb9ce52f', 'a58e8569270b7c8da012d9781e3dfa58.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 20, 'wxeca0dc64dd540f5b', 1444991155, 'img', 'init', '2e4daccaacc4fe2c22327bfbbb9ce52f', '954e8191b4f3d6cfd14dcf85ebbf774d.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 21, 'wxeca0dc64dd540f5b', 1445236875, 'img', 'init', '7fa74d5c74a51f3df229758011934147', '55b2ed37da8141d95ad2381ba627d5d8.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 22, 'wxeca0dc64dd540f5b', 1445238602, 'img', 'init', '', 'feb71cb243e8e506e5a16fc76b8738b5.jpg', 'init', 'init' );
INSERT INTO `wrx_image_db` VALUES ( 23, 'wxeca0dc64dd540f5b', 1445238992, 'img', 'init', 'a42a7643405d5ed7e8d9099bc88180c6', 'a4c0ff62669d0d0f3b987a6b612818a3.jpg', 'init', 'init' );

--
-- Table structure for table wrx_model_behavior
--

DROP TABLE IF EXISTS `wrx_model_behavior`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `wrx_model_behavior` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behavior_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table wrx_model_behavior
--

INSERT INTO `wrx_model_behavior` VALUES ( 1, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'init', 'weixin', 1442816586, '218.255.228.166', 'null' );
INSERT INTO `wrx_model_behavior` VALUES ( 2, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'weixin_event', 110, 1442816667, '103.7.30.104', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 3, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'weixin_msg', 71, 1442816670, '103.7.30.104', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 4, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'weixin_event', 111, 1442816693, '103.7.30.104', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 7, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'website', 'upload', 1442817503, '218.255.228.166', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 8, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'website', 'upload', 1442819204, '218.255.228.166', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 9, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'website', 'notebook', 1442819209, '218.255.228.166', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 10, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'website', 'upload', 1442819297, '218.255.228.166', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 11, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'website', 'medicalbook', 1442819315, '218.255.228.166', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 12, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'weixin_msg', 73, 1442826902, '103.7.30.104', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 13, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'weixin_msg', 74, 1442826903, '103.7.30.104', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 14, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'weixin_msg', 75, 1442826903, '103.7.30.104', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 15, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'weixin_msg', 76, 1442826903, '103.7.30.104', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 16, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'weixin_msg', 77, 1442826904, '103.7.30.104', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 17, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'guest', 'wxeca0dc64dd540f5b', 'weixin_msg', 78, 1442826904, '103.7.30.104', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 18, 'guest', 'guest', 'unknown', 'website', 34, 1444200563, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 19, 'guest', 'guest', 'wxeca0dc64dd540f5b', 'website', 34, 1444201241, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 20, 'guest', 'guest', 'wxeca0dc64dd540f5b', 'website', 35, 1444201368, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 21, 'guest', 'guest', 'wxeca0dc64dd540f5b', 'website', 35, 1444201516, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 22, 'guest', 'guest', 'wxeca0dc64dd540f5b', 'website', 35, 1444201580, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 23, 'guest', 'guest', 'wxeca0dc64dd540f5b', 'product', 35, 1444201632, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 24, 'guest', 'guest', 'wxeca0dc64dd540f5b', 'product', 34, 1444202181, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 25, 'guest', 'guest', 'wxeca0dc64dd540f5b', 'product', 34, 1444202558, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 26, 'guest', 'guest', 'wxeca0dc64dd540f5b', 'product', 34, 1444202561, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 27, 'guest', 'guest', 'wxeca0dc64dd540f5b', 'product', 1, 1444202988, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 28, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 35, 1444286028, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 29, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 35, 1444286043, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 30, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444286047, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 31, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 35, 1444286088, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 32, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444286109, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 33, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 1, 1444287437, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 34, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444287450, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 35, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444287669, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 36, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444287727, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 37, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444287812, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 38, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444287841, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 39, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288021, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 40, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288180, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 41, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288199, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 42, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288245, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 43, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288387, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 44, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288427, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 45, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288452, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 46, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288485, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 47, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288516, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 48, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288532, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 49, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288587, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 50, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288642, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 51, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288694, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 52, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288717, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 53, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288763, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 54, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288849, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 55, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288879, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 56, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288948, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 57, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444288962, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 58, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289024, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 59, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289041, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 60, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289061, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 61, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289098, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 62, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289123, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 63, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289225, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 64, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289262, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 65, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289367, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 66, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289528, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 67, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', '', 1444289529, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 68, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289591, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 69, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289622, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 70, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289629, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 71, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289666, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 72, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289708, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 73, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289775, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 74, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444289802, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 75, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 1, 1444292143, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 76, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 35, 1444292175, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 77, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444292181, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 78, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444297282, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 79, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444727758, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 80, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444727828, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 81, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444730365, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 82, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444730435, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 83, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444730711, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 84, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444730750, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 85, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444730794, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 86, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 34, 1444731124, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 87, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'admin', 'wxeca0dc64dd540f5b', 'website', 'membercenter?code=001491fe2d6d661d1abc41e78a8913bF', 1444813964, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 88, 'oXSVyw2oToSVSWWKMfxvKdDsz8sU', 'admin', 'wxeca0dc64dd540f5b', 'website', 'membercenter?code=04176862d4531c3ff322d0b46a348042', 1444814058, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 89, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 36, 1444894965, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 90, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 37, 1444895215, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 91, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 39, 1444897038, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 92, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1444902994, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 93, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1444991169, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 94, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1444991250, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 95, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1444992883, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 96, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1444992958, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 97, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1444992984, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 98, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1444992997, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 99, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1444993424, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 100, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1444993450, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 101, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1444993679, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 102, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1444993958, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 103, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1445221546, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 104, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1445221654, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 105, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1445221682, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 106, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1445230979, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 107, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1445230984, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 108, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1445230990, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 109, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1445244714, '::1', NULL );
INSERT INTO `wrx_model_behavior` VALUES ( 110, 'guest', 'admin', 'wxeca0dc64dd540f5b', 'product', 46, 1445244805, '::1', NULL );

--
-- Table structure for table wrx_model_product_db
--

DROP TABLE IF EXISTS `wrx_model_product_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `wrx_model_product_db` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `p_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_belong` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_details` text COLLATE utf8mb4_unicode_ci,
  `p_image` text COLLATE utf8mb4_unicode_ci,
  `p_activity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_off_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_trigger_off_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_time` int(11) unsigned DEFAULT NULL,
  `p_show_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_custom_html` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_attributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_state` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table wrx_model_product_db
--

INSERT INTO `wrx_model_product_db` VALUES ( 46, '081a82874bd3febf7e8b895d7355d3d3', 'wxeca0dc64dd540f5b', 1, '%E6%B4%BB%E5%8A%9B', '%E8%AF%B7%E8%BE%93%E5%85%A5%E4%BA%A7%E5%93%81%E8%AF%A6%E7%BB%86%E4%BB%8B%E7%BB%8D', '%3Cdiv%20align%3D%22left%22%3E%0A%09%3Cstrong%3E%3Cstrong%3E%3C%2Fstrong%3E%E8%AF%B7%E8%BE%93%E5%85%A5%E4%BA%A7%E5%93%81%E8%AF%A6%E7%BB%86%E4%BB%8B%E7%BB%8D%3C%2Fstrong%3E%20%0A%3C%2Fdiv%3E', '[{\"title\":\"%E6%B5%8B%E8%AF%95\",\"img\":\"files%2Fwxeca0dc64dd540f5b%2F1b0a72365183aa6337ceb1abe0affeb6.jpg\",\"des\":\"%3Cstrong%3E123123123123%3C%2Fstrong%3E\",\"id\":\"undefined\"}]', 123, 123, 123, 'off', 1445239526, 'd', NULL, 'wrx_none_data', 'files%2Fwxeca0dc64dd540f5b%2Faaea264c495d24584a7fd25c462a9401.jpg', 'files%2Fwxeca0dc64dd540f5b%2F5525ca20523cbb7d76cedb5f01eded97.jpg', NULL );
INSERT INTO `wrx_model_product_db` VALUES ( 47, '274769abe24db0afac7c73db1e186f91', 'wxeca0dc64dd540f5b', 1, 123123, 123123, '%E8%AF%B7%E8%BE%93%E5%85%A5%E4%BA%A7%E5%93%81%E8%AF%A6%E7%BB%86%E4%BB%8B%E7%BB%8D', '[{\"title\":\"%E6%96%B0%E4%BB%8B%E7%BB%8D%E6%AE%B5%E8%90%BD\",\"img\":\"files%2Fwxeca0dc64dd540f5b%2Faaea264c495d24584a7fd25c462a9401.jpg\",\"des\":\"%E8%AF%B7%E8%BE%93%E5%85%A5%E4%BA%A7%E5%93%81%E8%AF%A6%E7%BB%86%E4%BB%8B%E7%BB%8D\",\"id\":\"undefined\"}]', 123, 123, 123, 'off', 1445252385, 'd', NULL, 'wrx_none_data', 'files%2Fwxeca0dc64dd540f5b%2F1b0a72365183aa6337ceb1abe0affeb6.jpg', 'files%2Fwxeca0dc64dd540f5b%2F6d02fb7314e4e1664ca7f8671d9bb33e.jpg', NULL );

--
-- Table structure for table wrx_model_system_basic
--

DROP TABLE IF EXISTS `wrx_model_system_basic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `wrx_model_system_basic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `s_state` tinyint(1) unsigned DEFAULT NULL,
  `s_reload_all_user_data` tinyint(3) unsigned DEFAULT NULL,
  `s_last_reload_all_user_data` int(11) unsigned DEFAULT NULL,
  `s_back_up_db` tinyint(3) unsigned DEFAULT NULL,
  `s_last_back_up_db` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table wrx_model_system_basic
--

INSERT INTO `wrx_model_system_basic` VALUES ( 1, 1, 0, 1444804303, 1, 1456308462 );

--
-- Table structure for table wrx_user_db
--

DROP TABLE IF EXISTS `wrx_user_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `wrx_user_db` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wrx_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wrx_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wrx_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wrx_type` tinyint(3) unsigned DEFAULT NULL,
  `wrx_level` tinyint(3) unsigned DEFAULT NULL,
  `wrx_state` tinyint(3) unsigned DEFAULT NULL,
  `wrx_last` int(11) unsigned DEFAULT NULL,
  `wrx_createtime` int(11) unsigned DEFAULT NULL,
  `wrx_weixin_json` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table wrx_user_db
--

INSERT INTO `wrx_user_db` VALUES ( 1, 'init_database', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEJKawKEtTuyDOtFiaREhPPoMUq3GlCPdDIJZSt5DIiatlibMrAeS4dZ62lN0r8INJnkaW8ohESNKvNMw/64', '57910fac9b0270812ff3c56028e6f4c2', 3, 0, 0, 1442369503, 1442369503, '[\"wxeca0dc64dd540f5b\"]', '{\"init\":\"data\"}' );
INSERT INTO `wrx_user_db` VALUES ( 2, 'test', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEJKawKEtTuyDOtFiaREhPPoMUq3GlCPdDIJZSt5DIiatlibMrAeS4dZ62lN0r8INJnkaW8ohESNKvNMw/64', '57910fac9b0270812ff3c56028e6f4c2', 3, 2, 0, 1442369503, 1442369503, '[\"wxeca0dc64dd540f5b\"]', '{\"init\":\"data\"}' );

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
