<?php
function die_r($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    die();
}