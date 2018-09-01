<?php
if (!is_numeric($input)) {
    $input = strtotime($input);
}

$options = $options !== null ? $options : '%e %B %Y';

return strftime($options, $input);