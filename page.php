<?php

require 'app/start.php';

if (empty($_GET['page'])) {
    $page = false;
}else{
    $id = $_GET['page'];

    $page = $db->getRow("
			SELECT * 
			FROM tbl_company
			WHERE id = ?
	", [$id]);

    die_r($page);

}

require VIEW_ROOT . '/page/show.php';