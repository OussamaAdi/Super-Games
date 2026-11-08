<?php
// Copy this file to config.php and fill in your database details.
// config.php is git-ignored, so real credentials never get committed.
//
// Don't run the site as MySQL's root user. Create a user that can only
// read and write this database, for example:
//
//   CREATE USER 'supergames'@'localhost' IDENTIFIED BY 'choose-a-password';
//   GRANT SELECT, INSERT, UPDATE, DELETE ON Project.* TO 'supergames'@'localhost';
//
return [
    "host"     => "localhost",
    "user"     => "supergames",
    "password" => "choose-a-password",
    "database" => "Project",
];
