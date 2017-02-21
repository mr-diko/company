<?php
/*
 * Повертає масив без пустих значень
 */
function not_empty_values(array $arr) {
    if(isset($arr)){
        foreach ($arr as $key => $value) {
            if(!empty($value)){
                $mass[$key] = $value;
            }
        }

        return $mass;
    }
}
