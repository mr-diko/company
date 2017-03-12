<?php

require 'app/start.php';

if (empty($_GET['page'])) {
    $$tbl_company = false;
}else{
    $id = $_GET['page'];

    $tbl_company = $db->getRow("
                        SELECT * 
                        FROM tbl_company
                        WHERE id = ?
                        ", [$id]);

    $tbl_phone_numbers = $db->getRows("
                        SELECT telephone 
                        FROM tbl_phone_numbers
                        WHERE company_id = ?
                        ", [$id]);

    $tbl_address = $db->getRows("
                        SELECT adress
                        FROM tbl_address
                        WHERE company_id = ?
                        ", [$id]);

    if($tbl_company['creation_date'])
        $tbl_company['creation_date'] = new DateTime($tbl_company['creation_date']);

//    die_r($tbl_company);

}

require VIEW_ROOT . '/page/show.php';