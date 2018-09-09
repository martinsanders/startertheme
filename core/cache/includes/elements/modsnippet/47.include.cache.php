<?php

if ($input) {
    $replacements = [
        '-',
        '.',
        '(',
        ')',
        '+'
    ];

    $input = preg_replace('([\s])', '', $input);
    $input = str_replace($replacements, '', $input);
    if ($options !== null && $options === 'whatsapp' && (string) substr($input, 0, 2) === '06') {
        $input = substr_replace($input, '316', 0, 2);
    }

    return $input;
}
return;
