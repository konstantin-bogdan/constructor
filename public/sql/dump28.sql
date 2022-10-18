
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `options` json DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '1',
  `number` smallint(6) NOT NULL DEFAULT '1',
  `page_id` bigint(20) unsigned NOT NULL,
  `block_id` bigint(20) unsigned DEFAULT NULL,
  `template_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blocks_page_id_foreign` (`page_id`),
  KEY `blocks_block_id_foreign` (`block_id`),
  KEY `blocks_template_id_foreign` (`template_id`),
  CONSTRAINT `blocks_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `blocks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `blocks_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `blocks_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `blocks` WRITE;
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` VALUES (4,'{\"2\": {\"title\": \"123\", \"subtitle\": \"123\", \"description\": \"123\"}, \"4\": {\"title\": null, \"subtitle\": null, \"description\": null}}',1,2,1,NULL,2,'2022-10-08 08:20:51','2022-10-13 15:37:43'),(5,'{\"2\": {\"title1\": \"123\", \"description1\": \"123\"}, \"4\": {\"title1\": \"dsafsdf\", \"description1\": \"werwer\"}}',1,1,1,NULL,1,'2022-10-08 13:32:29','2022-10-13 15:37:43'),(6,'{\"2\": {\"title\": \"234\", \"subtitle\": \"234\", \"description\": \"234\"}, \"4\": {\"title\": null, \"subtitle\": null, \"description\": null}}',1,3,1,NULL,2,'2022-10-08 13:33:04','2022-10-13 15:37:43'),(9,'{\"2\": {\"title\": \"dddddddddddd\"}, \"4\": {\"title\": null}}',1,4,1,NULL,3,'2022-10-09 16:35:33','2022-10-13 15:37:43'),(11,'{\"2\": {\"input\": \"rrrrrrrrrr\"}, \"4\": {\"input\": null}}',1,5,1,9,3,NULL,'2022-10-13 15:37:43'),(12,'{\"2\": {\"input\": null}, \"4\": {\"input\": null}}',1,6,1,9,3,NULL,'2022-10-13 15:37:43'),(15,'{\"2\": {\"title\": \"rrrrrrrrrrrrrrrrr\"}, \"4\": {\"title\": null}}',1,7,1,NULL,4,'2022-10-09 21:10:24','2022-10-13 15:37:43'),(16,'{\"2\": {\"title\": \"ffffffffffffffffffff\"}, \"4\": {\"title\": null}}',1,8,1,15,4,NULL,'2022-10-13 15:37:43'),(17,'{\"2\": {\"title\": null}, \"4\": {\"title\": null}}',1,12,1,15,4,NULL,'2022-10-13 15:37:43'),(18,'{\"2\": {\"title\": null}, \"4\": {\"title\": null}}',1,13,1,15,4,NULL,'2022-10-13 15:37:43'),(19,'{\"2\": {\"title\": null}, \"4\": {\"title\": null}}',1,14,1,15,4,NULL,'2022-10-13 15:37:43'),(20,'{\"2\": {\"title\": \"yyyyyyyyyyyyyyyyy\"}, \"4\": {\"title\": null}}',1,9,1,16,4,NULL,'2022-10-13 15:37:43'),(21,'{\"2\": {\"title\": \"gggggggggggggggg\"}, \"4\": {\"title\": null}}',1,10,1,16,4,NULL,'2022-10-13 15:37:43'),(22,'{\"2\": {\"title\": null}, \"4\": {\"title\": null}}',1,11,1,16,4,NULL,'2022-10-13 15:37:43'),(23,'{\"2\": {\"sdfgsdfg\": \"http://constructor/storege/blocks/23/2/sdfgsdfg/ wallperz.com_thumbs_bzgc6hwghcs2t2qffginzr0fkwjoq3.jpg\"}}',1,15,1,NULL,15,'2022-10-13 15:36:41','2022-10-13 15:37:43');
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '0',
  `number` smallint(6) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (2,'ua','UA',1,1,'2022-10-08 05:48:30','2022-10-16 14:50:40'),(4,'en','EN',1,2,'2022-10-08 05:59:57','2022-10-16 14:50:40'),(6,'sdf','df',0,500,'2022-10-16 16:52:57','2022-10-16 16:52:57');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` json DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '0',
  `number` smallint(6) NOT NULL DEFAULT '1',
  `menu_id` bigint(20) unsigned DEFAULT NULL,
  `template_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_menu_id_foreign` (`menu_id`),
  KEY `menus_template_id_foreign` (`template_id`),
  CONSTRAINT `menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `menus_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (52,'Homepage','header','{\"2\": {\"link\": \"/index\", \"title\": \"Homepage\"}, \"4\": {\"link\": null, \"title\": null}}',1,1,NULL,14,'2022-10-11 16:07:06','2022-10-11 16:08:32'),(53,'About','header','{\"2\": {\"link\": \"/about\", \"title\": \"Про компанії\"}, \"4\": {\"link\": null, \"title\": null}}',1,1,NULL,14,'2022-10-11 16:29:37','2022-10-11 16:32:47');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` json DEFAULT NULL,
  `number` smallint(6) NOT NULL DEFAULT '1',
  `show` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Homepage','/index',NULL,1,1,'2022-10-07 07:34:01','2022-10-08 15:28:34'),(2,'About','/about',NULL,1,1,'2022-10-07 07:35:22','2022-10-07 11:01:26');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `role_user_role_id_user_id_unique` (`role_id`,`user_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(3,2),(5,2),(8,2);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `templates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '0',
  `number` smallint(6) NOT NULL DEFAULT '1',
  `first_fields` json DEFAULT NULL,
  `second_fields` json DEFAULT NULL,
  `third_fields` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `templates_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;
INSERT INTO `templates` VALUES (1,'page','Great Block','dfgdsfg','http://constructor/storage/templates/dfgdsfg.0x0.jpg',0,1,'[{\"name\": \"title1\", \"type\": \"input\", \"label\": \"Title1\"}, {\"name\": \"description1\", \"type\": \"textarea\", \"label\": \"Description1\"}]','[]','[]','2022-10-07 14:46:55','2022-10-16 14:50:56'),(2,'page','Template','template','http://constructor/storage/templates/template.dbfbb3f95b834df945c0bb6657cdad76.jpeg',0,2,'[{\"name\": \"title\", \"type\": \"input\", \"label\": \"Title\"}, {\"name\": \"description\", \"type\": \"textarea\", \"label\": \"Description\"}, {\"name\": \"subtitle\", \"type\": \"input\", \"label\": \"Subtitle\"}, {\"name\": \"image\", \"type\": \"image\", \"label\": \"Image\"}]','[]','[]','2022-10-08 07:39:14','2022-10-16 14:50:56'),(3,'page','Two Level','two levels','http://constructor/storage/templates/two levels.qwe.jpg',0,3,'[{\"name\": \"title\", \"type\": \"input\", \"label\": \"Title\"}]','[{\"name\": \"image\", \"type\": \"image\", \"label\": \"Image\"}, {\"name\": \"input\", \"type\": \"input\", \"label\": \"Input\"}]','[]','2022-10-09 16:35:19','2022-10-16 14:50:56'),(4,'page','Three Levels','three','http://constructor/storage/templates/three.Без названия.jpg',0,4,'[{\"name\": \"title\", \"type\": \"input\", \"label\": \"Title\"}]','[{\"name\": \"title\", \"type\": \"input\", \"label\": \"Title\"}]','[{\"name\": \"title\", \"type\": \"input\", \"label\": \"Title\"}]','2022-10-09 21:09:37','2022-10-16 14:50:56'),(5,'page','dfgh','dfgh','http://constructor/storage/templates/dfgh.images (1).jpg',0,5,'[]','[]','[]','2022-10-09 22:45:52','2022-10-16 14:50:56'),(10,'page','ryr','rey','http://constructor/storage/templates/rey.images (2).jpg',0,6,'[{\"name\": \"fgh\", \"type\": \"input\", \"label\": \"fgh\"}]','[]','[]','2022-10-09 22:53:45','2022-10-16 14:50:56'),(14,'menu','Simple','simple','http://constructor/storage/templates/simple.Без названия.jpg',1,5000,'[{\"name\": \"title\", \"type\": \"input\", \"label\": \"Title\"}, {\"name\": \"link\", \"type\": \"input\", \"label\": \"Link\"}]','[]','[]','2022-10-11 16:06:29','2022-10-11 16:06:32'),(15,'page','Image','dfgdfg','http://constructor/storage/templates/dfgdfg.0a37dbac85e134cfb3a5-730x411.jpg',0,7,'[{\"name\": \"sdfgsdfg\", \"type\": \"image\", \"label\": \"fgsdfgdf\"}]','[]','[]','2022-10-13 15:36:22','2022-10-16 14:50:56');
/*!40000 ALTER TABLE `templates` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Kiko','konsotantin@gmail.com',NULL,'$2y$10$KlPrLH.XK4uouxVYJSkb.u17gh1uZXcxDEhrUKOrN2M5rNkyQnjqi',1,NULL,NULL,NULL),(2,'Editor','dss@dss.com',NULL,'$2y$10$VBGjUtyNH2P6iW/Hy33P0OiafFjFb5WsWx/o001MiT049yIr1vOyG',0,NULL,'2022-10-13 07:30:56','2022-10-13 07:30:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

