CREATE TABLE `movies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `movies_genres` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `movies` (`id`, `name`, `description`)
VALUES
  (1, 'Big Lebowsky', 'My favorite movie, hands down.'),
  (2, 'Pulp fiction', 'Or this is my favorite movie?');

INSERT INTO `movies_genres` (`id`, `movie_id`, `name`)
VALUES
  (1, 1, 'Comedy'),
  (2, 1, 'Noir'),
  (3, 2, 'Crime');
