<?php

if (is_numeric($input)) {
    $tagScheme = $modx->getOption('link_tag_scheme', null, 'abs');
    return $modx->makeUrl($input, '', '', $tagScheme);
}

if (!preg_match('~^(?:f|ht)tps?://~i', $input)) {
    return 'http://' . $input;
}

return $input;
return;
