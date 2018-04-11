<?php

function _flatten(array &$out, array $arr, $prefix)
{
    foreach ($arr as $k => $v) {
        $key = (!strlen($prefix)) ? $k : "{$k}";
        if (is_array($v)) {
            _flatten($out, $v, $key);
        } else {
            $out[$key] = $v;
        }
    }
}

function flatten(array $arr)
{
    $flat = [];
    _flatten($flat, $arr, '');
    return $flat;
}
