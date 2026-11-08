<?php
// Every page starts with:  require_once "includes/init.php";
// It starts the session and loads the database connection and shared helpers.

session_start();

require_once __DIR__ . "/helpers.php";
require_once __DIR__ . "/connection.php";
require_once __DIR__ . "/csrf.php";
require_once __DIR__ . "/auth.php";
require_once __DIR__ . "/store.php";
