-- Failed login attempts, used to slow down password guessing (see auth.php).
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `attempted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ip_time` (`ip`, `attempted_at`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
