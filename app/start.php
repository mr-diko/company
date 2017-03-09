<?php
require "Database.php";
require "function.php";

define('APP_ROOT', __DIR__);
define('VIEW_ROOT', APP_ROOT . '/views');
define('BASE_URL', 'http://company.loc/company');

$db = new Database();