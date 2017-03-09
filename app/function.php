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