<?php
/**
 * Output filter for parsing JSON input and returning specified field value.
 *
 * Example: [[*myJsonValue:parseJson=`myField`]]
 */
if (empty($input)) {
    return '';
}

$array = json_decode($input, true);

if (!count($array)) {
    return '';
}

if ($array[$options]) {
    return $array[$options];
}

return '';