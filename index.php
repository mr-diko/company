<?php
require "app/start.php";

$pages = $db->getRows("Select * from tbl_company ");
//die_r($pages);
require VIEW_ROOT . "/home.php";