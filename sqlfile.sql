CREATE TABLE `baudrien_user` (
  `id` int(11) NOT NULL,
  `user_avatar` varchar(320) DEFAULT ('./assets/img/default_avatar.png'),
  `user_role`int(1) NOT NULL,
  `email` varchar(320) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `pwd` varchar(255) NOT NULL,
  `country` char(2) NOT NULL,
  `birthday` date NOT NULL,
  `pseudo` varchar(60) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp DEFAULT now() ON UPDATE CURRENT_TIMESTAMP,
  `token` char(40) DEFAULT NULL
) ENGINE=MariaDB DEFAULT CHARSET=utf8;