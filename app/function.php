<?php
function die_r($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    die();
}

function escape($text){
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function get_phone_numbers($arr){
    $res = '';
    foreach($arr as $val){
        foreach ($val as $numbers){
            $res .= $numbers . '<br>';
        }
    }

    return $res;
}

function get_addresses($arr){
    return get_phone_numbers($arr);
}