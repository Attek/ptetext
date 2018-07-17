CREATE TABLE `text` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `title` varchar(255) NOT NULL COMMENT 'Title',
  `slug` varchar(255) NOT NULL COMMENT 'Slug',
  `text` longtext COMMENT 'Text',
  `cr_user` int(11) DEFAULT NULL COMMENT 'Creation user',
  `cr_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Creation time',
  `mod_user` int(11) DEFAULT NULL COMMENT 'Modification user',
  `mod_date` timestamp NULL DEFAULT NULL COMMENT 'Modification time',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Status',
  PRIMARY KEY (`id`),
  KEY `text_cr_user_fk` (`cr_user`),
  KEY `text_mod_user_fk` (`mod_user`),
  CONSTRAINT `text_cr_user_fk` FOREIGN KEY (`cr_user`) REFERENCES `user` (`id`),
  CONSTRAINT `text_mod_user_fk` FOREIGN KEY (`mod_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;