-- The store's games: catalogue, screenshots and review quotes.
-- Import after sql/schema.sql. Safe to run again: games are updated in place
-- and screenshots/reviews are replaced.

SET NAMES utf8mb4;

INSERT INTO `games` (`id`, `slug`, `title`, `developer`, `price`, `list_price`, `status`, `accent_color`, `card_image`, `banner_image`, `detail_image`, `description`, `sort_order`) VALUES
(1, 'reddead', 'Red Dead Redemption 2', 'Rockstar Games', 60.00, NULL, 'available', 'rgb(190, 6, 18)', 'Photos/Red Dead vertical.jpg', 'Photos/Reddead.jpg', 'Photos/reddead/r5.jpg', 'Winner of over 175 Game of the Year Awards and recipient of over 250 perfect scores
Red Dead Redemption 2 is an epic tale of honor and loyalty at the dawn of the modern age
America, 1899. Arthur Morgan and the Van der Linde gang are outlaws on the run
An open world you can get lost in and continue finding new things to do', 9),
(2, 'cyberpunk', 'Cyberpunk 2077', 'CD PROJEKT RED', 60.00, NULL, 'available', 'rgb(204, 204, 0)', 'Photos/Cyberpunk-compressed.jpg', 'Photos/cyberpunkk.jpg', 'Photos/cyberpunk/c5.jpg', 'Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power
You play as V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality
Enter the massive open world of Night City, a place that sets new standards in terms of visuals, complexity and depth
An open world you can get lost in and continue finding new things to do', 13),
(3, 'gta', 'GTA V', 'Rockstar Games', 30.00, NULL, 'available', 'rgb(88, 134, 34)', 'Photos/GTA vertical.jpg', 'Photos/GTA.jpg', 'Photos/gta/g5.jpg', 'Play as a young street hustler, a retired bank robber or a terrifying psychopath
You must pull off a series of dangerous heists to survive in a ruthless city
Grand Theft Auto V for PC also includes Grand Theft Auto Online
Explore the award-winning world of Los Santos and Blaine County', 10),
(4, 'borderlands', 'Borderlands 3', 'Gearbox Software', 60.00, NULL, 'available', 'rgb(250, 186, 0)', 'Photos/Borderlands3  vertical-compressed.jpg', 'Photos/border-min.jpg', 'Photos/borderlands/b2-min.jpg', 'The original shooter-looter returns
Packing bazillions of guns and a mayhem-fueled adventure!
Blast through new worlds & enemies and save your home from the most ruthless cult leaders in the galaxy
Stop the fanatical Calypso Twins from uniting the bandit clans and claiming the galaxy’s ultimate power', 14),
(5, 'witcher', 'The Witcher 3: Wild Hunt', 'CD PROJEKT RED', 15.00, 60.00, 'available', 'rgb(192, 192, 192)', 'Photos/witcherr.jpg', 'Photos/witcher/w4.jpg', 'Photos/witcher/w1.jpg', 'As war rages on throughout the Northern Realms, you take on the greatest contract of your life
tracking down the Child of Prophecy, a living weapon that can alter the shape of the world
Become a professional monster slayer and embark on an adventure of epic proportions!
Gruesomely destroy foes as a professional monster hunter armed with a range of weapons, potions, and magic.', 1),
(6, 'zombie', 'Zombie Army 4: Dead War', 'Rebellion Developments', 30.00, 60.00, 'available', 'rgb(195, 17, 17)', 'Photos/zombiee.jpg', 'Photos/zombie/z2.jpg', 'Photos/zombie/z1.jpg', 'Hitler’s hordes are back for more in this spine-chilling shooter from the makers of Sniper Elite 4!
Abominable occult enemies, epic weapons and a harrowing new campaign for 1-4 players await in 1940s Europe
The resistance have defeated Zombie Hitler – but the dead rise once again with greater hunger than before!
Fight the forces of darkness in corpse-riddled canals, survive a Zombie Zoo, and journey to dark', 2),
(7, 'maneater', 'Maneater', 'Tripwire Interactive', 42.00, 60.00, 'coming_soon', 'rgb(27, 119, 196)', 'Photos/maneaterr.jpg', 'Photos/maneater/m1.jpg', 'Photos/maneater/m3.jpg', 'Experience the ultimate power fantasy as the apex predator of the seas
Maneater is a single player, open world action RPG (ShaRkPG) where YOU are the SHARK!
Find the right resources and you can grow and evolve far beyond what nature intended
Eat your way up the ecosystem, and survive the harsh world', 3),
(8, 'odyssey', 'Assassin\'s Creed Odyssey', 'Ubisoft', 24.00, 60.00, 'available', 'rgb(209, 165, 65)', 'Photos/Odysseyy.jpg', 'Photos/odyssey/o1.jpg', 'Photos/odyssey/o3.jpg', 'Venture into the fabled realms of Greek mythology to discover your hero\'s true power
Explore three new worlds from Greek mythology: Elysium, the Underworld, and Atlantis!
Face legendary trials and encounter the gods themselves, including Persephone, Hades, Poseidon, and more!
Delve deeper into Assassin\'s Creed lore and uncover the mysterious power of the First Civilisation', 4),
(9, 'anno', 'Anno 1800', 'Ubisoft Blue Byte', 65.00, NULL, 'available', 'rgb(209, 190, 125)', 'Photos/Anno vertical.png', 'Photos/Anno.jpg', 'Photos/Anno/a2-compressed.jpg', 'Lead the Industrial Revolution in Anno 1800!
Welcome to the dawn of the Industrial Age. The path you choose will define your world
Are you an innovator or an exploiter? A conqueror or a liberator? How the world remembers your name is up to you
Combining beloved features with innovative gameplay, Anno 1800 is the beginning of a new era for the Anno franchise', 12),
(10, 'starwarsB', 'Star Wars Battlefront II', 'DICE, Motive Studios', 40.00, NULL, 'available', 'rgb(20, 120, 255)', 'Photos/starwarsB.jpg', 'Photos/battlefront-min.png', 'Photos/starwarsB/b2-compressed.jpg', 'Be the hero in the ultimate STAR WARS™ battle fantasy with STAR WARS™ Battlefront™ II
Put your mastery of the blaster, lightsaber, and the Force to the test online and offline!
Embark on an endless Star Wars™ journey from the best-selling Star Wars™ video game franchise
Experience rich multiplayer battlegrounds across all three eras - prequel, classic and new trilogy.', 15),
(11, 'starwarsJ', 'Star Wars Jedi: Fallen Order', 'Respawn Entertainment', 30.00, NULL, 'available', 'rgb(20, 120, 255)', 'Photos/Star Wars vertical.jpg', 'Photos/Starwars.jpg', 'Photos/starwarsJ/s3.jpg', 'A galaxy-spanning adventure awaits in STAR WARS Jedi: Fallen Order
The new 3rd person action-adventure title from Respawn Entertainment
Aided by a former Jedi Knight, a prickly pilot, and a fearless droid companion
You must escape the sinister machinations of the Imperial forces in this story driven adventure', 11),
(12, 'doom', 'DOOM Eternal', 'id Software', 45.00, NULL, 'available', 'rgb(211, 139, 31)', 'Photos/doomE.jpg', 'Photos/doom.jpg', 'Photos/doom/d3-compressed.jpg', 'Hell’s armies have invaded Earth. Become the Slayer in an epic single-player campaign
Armed with a shoulder-mounted flamethrower, retractable wrist-mounted blade, upgraded guns
The Slayer is faster, stronger, and more versatile than ever!
The Only Thing they Fear... Is You. RIP AND TEAR!', 16),
(13, 'ghost', 'Ghost of Tsushima', 'Sucker Punch Productions', 60.00, NULL, 'coming_soon', 'rgb(156, 33, 29)', 'Photos/Ghost-compressed.jpg', 'Photos/Ghost.jpg', 'Photos/ghost/g5.jpg', 'In this open-world action adventure, you’ll roam vast countrysides
Explore expansive terrain to encounter rich characters, and discover ancient landmarks.
The Rise of the Ghost: In his quest to reclaim Tsushima, Jin must seek support from old friends and new unlikely allies.
Forge a New Path as the Ghost', 17),
(14, 'control', 'Control', 'Remedy Entertainment', 28.00, NULL, 'available', 'rgb(205, 35, 58)', 'Photos/Control.png', 'Photos/control/c1-compressed.jpg', 'Photos/control/c3.jpg', 'After a secretive agency in New York is invaded by an otherworldly threat
You become the new Director struggling to regain Control.
Control is Jesse Faden’s story and her personal search for answers as she grows into the role of the Director
Jesse works with other Bureau agents and discovers strange experiments and secrets.', 5),
(15, 'satisfactory', 'Satisfactory', 'Coffee Stain Studios', 15.00, NULL, 'coming_soon', 'rgb(220, 123, 16)', 'Photos/Satisfactory.jpg', 'Photos/satisfactory/s1.jpg', 'Photos/satisfactory/s3-compressed.jpg', 'Satisfactory is a first-person open-world factory building game with a dash of exploration and combat.
Play alone or with friends, explore an alien planet, create multi-story factories, and enter conveyor belt heaven!
This is an early access game
Early Access games are still under development and may change significantly over time.', 6),
(16, 'tetris', 'Tetris Effect', 'Resonair, Monstars', 15.00, NULL, 'available', 'rgb(148, 0, 211)', 'Photos/Tetris.jpg', 'Photos/Tetris/t2.jpg', 'Photos/Tetris/t1-compressed (1).jpg', 'Tetris® Effect is playable in either traditional HD or fully immersive VR
Tetris Effect is Tetris like you\'ve never seen it, or heard it, or felt it before
An incredibly addictive, and breathtakingly gorgeous reinvention of one of the most popular puzzle games of all time
From the people who brought you the award-winning Rez Infinite and legendary puzzle game Lumines.', 7),
(17, 'snowrunner', 'SnowRunner', 'Saber Interactive', 40.00, NULL, 'available', 'rgb(255, 255, 255)', 'Photos/Snowrunner.jpg', 'Photos/snowrunner/s1.jpg', 'Photos/snowrunner/s3.jpg', 'Get ready for the next-generation off-road experience!
Drive powerful vehicles and overcome extreme open environments to complete dozens of challenging missions
Overcome mud, torrential waters, snow, and frozen lakes while taking on perilous contracts and missions
Expand and customize your fleet with many upgrades and accessories', 8)
ON DUPLICATE KEY UPDATE `title` = VALUES(`title`), `developer` = VALUES(`developer`), `price` = VALUES(`price`), `list_price` = VALUES(`list_price`), `status` = VALUES(`status`), `accent_color` = VALUES(`accent_color`), `card_image` = VALUES(`card_image`), `banner_image` = VALUES(`banner_image`), `detail_image` = VALUES(`detail_image`), `description` = VALUES(`description`), `sort_order` = VALUES(`sort_order`);

DELETE FROM `game_screenshots`;
INSERT INTO `game_screenshots` (`game_id`, `image`, `sort_order`) VALUES
(1, 'Photos/reddead/r1.jpg', 1),
(1, 'Photos/reddead/r2.jpg', 2),
(1, 'Photos/reddead/r3.jpg', 3),
(1, 'Photos/reddead/r4.jpg', 4),
(2, 'Photos/cyberpunk/c8.jpg', 1),
(2, 'Photos/cyberpunk/c6.jpg', 2),
(2, 'Photos/cyberpunk/c7.jpg', 3),
(3, 'Photos/GTA.jpg', 1),
(3, 'Photos/gta/g1.jpg', 2),
(3, 'Photos/gta/g2.jpg', 3),
(3, 'Photos/gta/g3.jpg', 4),
(3, 'Photos/gta/g4.jpg', 5),
(4, 'Photos/border-min.jpg', 1),
(4, 'Photos/borderlands/b1-min.jpg', 2),
(5, 'Photos/witcher/w4.jpg', 1),
(5, 'Photos/witcher/w3-min.png', 2),
(5, 'Photos/witcher/w2-min.png', 3),
(6, 'Photos/zombie/z2.jpg', 1),
(6, 'Photos/zombie/z3.jpg', 2),
(7, 'Photos/maneater/m1.jpg', 1),
(7, 'Photos/maneater/m2.jpg', 2),
(8, 'Photos/odyssey/o1.jpg', 1),
(8, 'Photos/odyssey/o2.jpg', 2),
(9, 'Photos/Anno.jpg', 1),
(9, 'Photos/Anno/a1-compressed.jpg', 2),
(10, 'Photos/battlefront-min.png', 1),
(10, 'Photos/starwarsB/b1-compressed.jpg', 2),
(11, 'Photos/Starwars.jpg', 1),
(11, 'Photos/starwarsJ/s1-compressed.jpg', 2),
(11, 'Photos/starwarsJ/s2.jpg', 3),
(12, 'Photos/doom.jpg', 1),
(12, 'Photos/doom/d1-compressed.jpg', 2),
(12, 'Photos/doom/d2-compressed.jpg', 3),
(13, 'Photos/Ghost.jpg', 1),
(13, 'Photos/ghost/g2-compressed.jpg', 2),
(13, 'Photos/ghost/g3-compressed.jpg', 3),
(13, 'Photos/ghost/g4-compressed.jpg', 4),
(14, 'Photos/control/c1-compressed.jpg', 1),
(14, 'Photos/control/c2-compressed.jpg', 2),
(15, 'Photos/satisfactory/s1.jpg', 1),
(15, 'Photos/satisfactory/s2.jpg', 2),
(16, 'Photos/Tetris/t2.jpg', 1),
(16, 'Photos/Tetris/t3.jpg', 2),
(17, 'Photos/snowrunner/s1.jpg', 1),
(17, 'Photos/snowrunner/s2-compressed.jpg', 2);

DELETE FROM `game_reviews`;
INSERT INTO `game_reviews` (`game_id`, `outlet`, `author`, `quote`, `url`, `sort_order`) VALUES
(1, 'Games Radar', 'David Meikleham', 'This is perhaps the boldest triple-A game ever made. Arthur’s tale undergoes the most ambitious twists', 'https://www.gamesradar.com/red-dead-redemption-2-review/', 1),
(1, 'Game Informer', 'Matt Bertz', 'Rockstar has once again created a game that redefines the open-world experience.', 'https://www.gameinformer.com/review/red-dead-redemption-ii/an-open-world-western-for-the-ages-0', 2),
(1, 'IGN', 'Luke Reilly', 'This is a game of rare quality; a meticulously polished open world ode to the outlaw era.', 'https://www.ign.com/articles/2018/10/25/red-dead-redemption-2-review', 3),
(1, 'Eurogamer', 'Martin Robinson', 'An astounding huge open world unlikely to be rivalled until well into the next gen of gaming.', 'https://www.eurogamer.net/articles/2018-10-25-red-dead-redemption-2-review_9', 4),
(2, 'PC Gamer', 'James Davenport', 'CD Projekt Red returns with an incredible setting undermined by an onslaught of bugs.', 'https://www.pcgamer.com/cyberpunk-2077-review/', 1),
(2, 'Game Informer', 'Andrew reiner', 'Cyberpunk 2077 is dark and disturbing at times, but the majority of its content is fascinating.', 'https://www.gameinformer.com/review/cyberpunk-2077/cyberpunk-2077-review-a-wild-time-in-night-city', 2),
(2, 'IGN', 'Tom Marks', 'A beautiful cityscape with a staggering amount of choice (and a few too many bugs).', 'https://www.ign.com/articles/cyberpunk-2077-review', 3),
(2, 'Eurogamer', 'Chris Tapsell', 'Exceptional characters, heartfelt storytelling, enjoyable action and endless bugs.', 'https://www.eurogamer.net/articles/2020-12-10-cyberpunk-2077-review-intoxicating-potential-half-undermined-half-met', 4),
(3, 'PC Gamer', 'Chris Thursten', 'A sandbox of extraordinary scope created with a masterful attention to detail.', 'https://www.pcgamer.com/gta-5-review/', 1),
(3, 'Game Informer', 'Matt Bertz', 'With a huge open world to explore, three playable characters, GTA V is the gift that keeps on giving', 'https://www.gameinformer.com/games/grand_theft_auto_v/b/xbox360/archive/2013/09/16/grand-theft-auto-v-review.aspx#:~:text=The%20narrative%20fails%20to%20match,and%20the%20promise%20of%20fortune.', 2),
(3, 'IGN', 'Dan Stapleton', 'Grand Theft Auto 5 is a masterpiece of a game, and the PC version is the best way to experience it.', 'https://www.ign.com/articles/2015/04/14/gta-5-pc-review', 3),
(3, 'Eurogamer', 'Tom Bramwell', 'GTA V makes you feel as though you can strike out in any direction and find something to do.', 'https://www.eurogamer.net/articles/2013-09-16-grand-theft-auto-5-review#:~:text=GTA%205%20captures%20the%20absurdity,fun%2C%20it\'s%20much%20more%20entertaining.', 4),
(4, 'PC Gamer', 'James Davenport', 'Borderlands 3 is an endless font of bad jokes and cool guns in the series\' most vapid story yet', 'https://www.pcgamer.com/borderlands-3-review/', 1),
(4, 'Game Informer', 'Matt Miller', 'An old formula executed well, Borderlands 3 rarely takes chances or strays from expectation', 'https://www.gameinformer.com/review/borderlands-3/borderlands-3-review-sticking-to-its-guns', 2),
(4, 'IGN', 'James Duggan', 'Borderlands 3 sticks to its guns and outdoes itself with an amazing arsenal of weapons, and missions.', 'https://www.ign.com/articles/2019/09/09/borderlands-3-review', 3),
(4, 'Eurogamer', 'Vikki Blake', 'The humour is even more annoying, the guns even more amazing, more divisive than it\'s ever been.', 'https://www.eurogamer.net/articles/2019-09-19-borderlands-3-review-bigger-better-and-even-more-polarising-than-ever-before', 4),
(5, 'PC Gamer', 'Shaun Prescott', 'A big, beautiful, sprawling action RPG full of rich stories, and suffused with an oppressive darkness.', 'https://www.pcgamer.com/the-witcher-3-review/', 1),
(5, 'Game Informer', 'Matt Miller', 'With superb storytelling, challenging combat, exciting choices, The Witcher 3 is a must-play', 'https://www.gameinformer.com/games/the_witcher_3_wild_hunt/b/playstation4/archive/2015/05/12/the-witcher-3-wild-hunt-review-game-informer.aspx', 2),
(5, 'IGN', 'Vince Ingenito', 'The Witcher 3: Wild Hunt is a unique combination of a non-linear story and an open world.', 'https://www.ign.com/articles/2015/05/12/the-witcher-3-the-wild-hunt-review', 3),
(5, 'Eurogamer', 'Oli Welsh', 'A majestic open-world adventure with great personality, this is the best role-playing game in years.', 'https://www.eurogamer.net/articles/2015-05-18-the-witcher-3-wild-hunt-review', 4),
(6, 'PC Gamer', 'Alex Spencer', 'An excellently-crafted shooter, especially with friends. Just don’t expect much in the way of brains.', 'https://www.pcgamer.com/zombie-army-4-dead-war-review/', 1),
(6, 'Tech Raptor', 'Mostafa Hossam', 'Zombie Army 4: Dead War brings the Sniper Elite experience to the zombie world.', 'https://techraptor.net/gaming/reviews/zombie-army-4-dead-war-review-endless-waves-of-nazi-zombies', 2),
(6, 'IGN', 'Kyle Hilliard', 'Zombie Army 4: Dead War is a great addition to the franchise, even if it\'s your first time experiencing it.', 'https://www.ign.com/articles/zombie-army-4-dead-war-review', 3),
(6, 'Gaming Trend', 'Codi Spence', 'The gunplay is awesome, especially if you activate a kill cam shot. The enemies provide a tough challenge.', 'https://gamingtrend.com/feature/reviews/the-warring-dead-zombie-army-4-dead-war-review/', 4),
(7, 'PC Gamer', 'Christopher Livingston', 'It looks great, but the fun and novelty of being an eternally hungry shark wears off quickly.', 'https://www.pcgamer.com/maneater-review/', 1),
(7, 'Games Radar', 'Rachel Weber', 'A salty, sometimes silly, single minded killing machines. Devour your enemies.', 'https://www.gamesradar.com/maneater-review/', 2),
(7, 'IGN', 'Dan Stapleton', 'It’s absolutely fun to play as mutant Jaws on steroids! Maneater let\'s you devour humans!', 'https://www.ign.com/articles/maneater-review', 3),
(7, 'Rock Paper Shotgun', 'Nate Crowley', 'An ecstatically violent murderous simulation of being a fool’s idea of a shark.', 'https://www.rockpapershotgun.com/2020/05/22/maneater-review/', 4),
(8, 'PC Gamer', 'Steven Messner', 'Though the main story suffers because of it, Assassin\'s Creed Odyssey is a remarkably massive RPG.', 'https://www.pcgamer.com/assassins-creed-odyssey-review/', 1),
(8, 'Games Radar', 'Sam Loveridge', 'Perfects everything Origins did and enhances them in ways you never thought possible.', 'https://www.gamesradar.com/assassins-creed-odyssey-review/', 2),
(8, 'IGN', 'Brandin Tyrrel', 'Assassin\'s Creed Odyssey\'s open-world adventure through ancient Greece is a gorgeous.', 'https://www.ign.com/articles/2018/10/01/assassins-creed-odyssey-review', 3),
(8, 'Eurogamer', 'Tom Phillips', 'Colossal in size, lavish in scope, Odyssey feels like a landmark and Ubisoft\'s biggest ever game.', 'https://www.eurogamer.net/articles/2018-10-01-assassins-creed-odyssey-review-a-vast-and-generous-voyage', 4),
(9, 'PC Gamer', 'Rick Lane', 'Despite an annoying story mode, Anno 1800 is the biggest and best entry in the series to date.', 'https://www.pcgamer.com/anno-1800-review/', 1),
(9, 'GameSpot', 'David Wildgoose', 'As exhaustive an Industrial Age city-builder as anyone could hope for. It looks gorgeous.', 'https://www.gamespot.com/reviews/anno-1800-review-the-prettiest-spreadsheet/1900-6417131/', 2),
(9, 'IGN', 'Charles Singletary Jr.', 'Welcome to the 19th Century, the dawn of the industrial age! Diplomacy, trade or warfare.', 'https://www.ign.com/articles/2019/04/18/anno-1800-review', 3),
(9, 'Game Revolution', 'Jason Faulkner', 'Anno 1800 is one of the most fun and complex city-builders I’ve played in a long time.', 'https://www.gamerevolution.com/review/532599-anno-1800-review', 4),
(10, 'PC Gamer', 'Tyler Wilde', 'A spectacular, occasionally very fun tour of Star Wars battles that disappoints with a boring story.', 'https://www.pcgamer.com/star-wars-battlefront-2-pc-review/', 1),
(10, 'GameSpot', 'Alessandro Fillari', 'Impressive set-pieces in the single-player campaign, and an exciting scope of online battles.', 'https://www.gamespot.com/reviews/star-wars-battlefront-ii-review/1900-6416810/', 2),
(10, 'IGN', 'David Jagneaux', 'Star Wars Battlefront 2 is a redemption story worthy of the Skywalker saga. It’s a big, beautiful shooter.', 'https://www.ign.com/articles/2019/12/17/star-wars-battlefront-2-review-2019', 3),
(10, 'Games Radar', 'Andy Hartup', 'It looks and feels like Star Wars Multiplayer is brilliant Starfighter sections are thrilling', 'https://www.gamesradar.com/star-wars-battlefront-2-review/', 4),
(11, 'PC Gamer', 'Tom Senior', 'Technical issues marr an otherwise slick and amazing adventure. A must for Star Wars fans.', 'https://www.pcgamer.com/star-wars-jedi-fallen-order-review/', 1),
(11, 'GameSpot', 'Phil Hornshaw', 'Combat is often harrowing and forces you to be intelligent, especially in the second half of the game.', 'https://www.gamespot.com/reviews/star-wars-jedi-fallen-order-review-a-good-feeling-/1900-6417364/', 2),
(11, 'IGN', 'Dan Stapleton', 'It’s been ages since we got a great single-player Star Wars game, but Fallen Order makes up for a it.', 'https://www.ign.com/articles/2019/11/15/star-wars-jedi-fallen-order-review', 3),
(11, 'Eurogamer', 'Emma Kent', 'Star Wars Jedi: Fallen Order delivers well-paced combat and unique environments which gets better.', 'https://www.eurogamer.net/articles/2019-11-14-star-wars-jedi-fallen-order-review-solid-combat-mired-in-shallow-storytelling-and-technical-problems', 4),
(12, 'PC Gamer', 'James Davenport', 'Doom is a ceaseless nightmare that pushes you to point and click with more style than ever before.', 'https://www.pcgamer.com/doom-eternal-review/', 1),
(12, 'Games Radar', 'Josh West', 'Screams at you to move faster and to fight harder, and you can do nothing but obey', 'https://www.gamesradar.com/doom-eternal-review/', 2),
(12, 'IGN', 'Ryan McCaffrey', 'Simply put, Doom Eternal is one of the best first-person shooter campaigns I’ve played in years.', 'https://www.ign.com/articles/doom-eternal-single-player-review', 3),
(12, 'Eurogamer', 'Edwin Evans-Thirlwell', 'An even faster and bloodier but slightly wayward follow-up to a thunderous shooter reboot.', 'https://www.eurogamer.net/articles/2020-03-16-doom-eternal-review', 4),
(13, 'Metro', 'James Davenport', 'The period atmosphere is excellent, with a beautiful open world and lots of attention to detail.', 'https://metro.co.uk/2020/07/14/ghost-tsushima-review-ps4-samurai-creed-12987992/', 1),
(13, 'Games Radar', 'Rachel Weber', 'Tsushima is a work of art, with a combat that keeps you on your samurai toes right until the end', 'https://www.gamesradar.com/ghost-of-tsushima-review/', 2),
(13, 'IGN', 'Mitchell Saltzman', 'Ghost of Tsushima is an enormous samurai adventure that often left me completely awestruck', 'https://www.ign.com/articles/ghost-of-tsushima-review', 3),
(13, 'Eurogamer', 'Chris Tapsell', 'Sucker Punch\'s samurai homage pairs okay action with enjoyably committed melodrama', 'https://www.eurogamer.net/articles/2020-07-14-ghost-of-tsushima-review-a-likeable-if-clunky-hollywood-blockbuster', 4),
(14, 'Metro', 'James Davenport', 'The period atmosphere is excellent, with a beautiful open world and lots of attention to detail.', 'https://metro.co.uk/2020/07/14/ghost-tsushima-review-ps4-samurai-creed-12987992/', 1),
(14, 'Games Radar', 'Rachel Weber', 'Tsushima is a work of art, with a combat that keeps you on your samurai toes right until the end', 'https://www.gamesradar.com/ghost-of-tsushima-review/', 2),
(14, 'IGN', 'Mitchell Saltzman', 'Ghost of Tsushima is an enormous samurai adventure that often left me completely awestruck', 'https://www.ign.com/articles/ghost-of-tsushima-review', 3),
(14, 'Eurogamer', 'Chris Tapsell', 'Sucker Punch\'s samurai homage pairs okay action with enjoyably committed melodrama', 'https://www.eurogamer.net/articles/2020-07-14-ghost-of-tsushima-review-a-likeable-if-clunky-hollywood-blockbuster', 4),
(15, 'Early Access', 'No Reviews', '', '', 1),
(16, 'PC Gamer', 'Malindy Hetfeld', 'Whole new sensory layers make Tetris Effect the best version of an already timeless game.', 'https://www.pcgamer.com/tetris-effect-pc-review/', 1),
(16, 'Metro', 'Rachel Weber', 'Tetirs Effect is a masterful reimagining of Tetris, and one of the most immersive games ever.', 'https://metro.co.uk/2019/07/24/tetris-effect-pc-review-the-ultimate-puzzle-game-10448999/', 2),
(16, 'IGN', 'Dan Crowd', 'Tetris Effect turns the game you know into something you’ve likely never experienced.', 'https://www.ign.com/articles/2018/11/09/tetris-effect-review', 3),
(16, 'Eurogamer', 'Christian Donlan', 'Tetris gets the Tetsuya Mizuguchi makeover, to dazzling breathtaking effect.', 'https://www.eurogamer.net/articles/2018-11-09-tetris-effect-review-the-eternal-puzzler-reimagined-on-a-truly-cosmic-scale_3', 4),
(17, 'PC Gamer', 'Andy Kelly', 'This deep off-road sim delights in giving you a hard time, but every victory is all the sweeter for it.', 'https://www.pcgamer.com/snowrunner-review/', 1),
(17, 'Metro', 'Rachel Weber', 'Tetirs Effect is a masterful reimagining of Tetris, and one of the most immersive games ever.', 'https://metro.co.uk/2019/07/24/tetris-effect-pc-review-the-ultimate-puzzle-game-10448999/', 2),
(17, 'IGN', 'Luke Reilly', 'An earnest, unapologetically tricky, and time-consuming trucking experience.', 'https://www.ign.com/articles/snowrunner-review', 3),
(17, 'Eurogamer', 'Christian Donlan', 'Snowrunner\'s another beautiful and hard game about getting nowhere slowly.', 'https://www.eurogamer.net/articles/2020-05-04-snowrunners-another-beautiful-game-about-getting-nowhere-slowly', 4);
