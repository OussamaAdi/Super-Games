-- Super Games database structure (tables only, no data).
--
-- New install: create an empty database (the site expects "Project", see
-- includes/config.php), import this file, then import sql/games.sql.
--
-- Every table uses CREATE TABLE IF NOT EXISTS, so running this on an existing
-- database only adds the tables it is missing. It never deletes anything.

SET NAMES utf8mb4;

-- Accounts
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Failed logins, used to slow down password guessing (see includes/auth.php)
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `attempted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ip_time` (`ip`, `attempted_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- The store's catalogue: one row per game
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(40) NOT NULL,                  -- used in links: game.php?slug=...
  `title` varchar(100) NOT NULL,
  `developer` varchar(100) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `list_price` decimal(6,2) DEFAULT NULL,       -- original price, when the game is on sale
  `status` enum('available','coming_soon') NOT NULL DEFAULT 'available',
  `accent_color` varchar(30) NOT NULL,          -- CSS colour used on this game's pages
  `card_image` varchar(255) NOT NULL,           -- cover on All Games and the home page cards
  `banner_image` varchar(255) NOT NULL,         -- wide image: home carousel, cart, library
  `detail_image` varchar(255) NOT NULL,         -- next to the description on the game page
  `description` text NOT NULL,                  -- one paragraph per line
  `sort_order` int(11) NOT NULL DEFAULT 0,      -- order on All Games
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Screenshots shown in each game page's slideshow
CREATE TABLE IF NOT EXISTS `game_screenshots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `game_order` (`game_id`, `sort_order`),
  CONSTRAINT `game_screenshots_game` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Press review quotes shown on each game page
CREATE TABLE IF NOT EXISTS `game_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `outlet` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `quote` varchar(500) NOT NULL,
  `url` varchar(500) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `game_order` (`game_id`, `sort_order`),
  CONSTRAINT `game_reviews_game` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Games waiting in a user's cart
CREATE TABLE IF NOT EXISTS `cart_items` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`, `game_id`),
  KEY `game_id` (`game_id`),
  CONSTRAINT `cart_items_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cart_items_game` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Games a user owns (their library), with the price at the time of purchase
CREATE TABLE IF NOT EXISTS `purchases` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `price_paid` decimal(6,2) NOT NULL,
  `purchased_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`, `game_id`),
  KEY `game_id` (`game_id`),
  CONSTRAINT `purchases_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `purchases_game` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
