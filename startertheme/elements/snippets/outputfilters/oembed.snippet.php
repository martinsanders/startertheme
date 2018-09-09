<?php
$field = $options !== null ? $options : 'thumbnail_url';
$url = parse_url($input);
$host = $url['host'];

$oEmbedUrl = false;
switch ($host) {
    case 'youtube.com':
    case 'www.youtube.com':
    case 'youtu.be':
    case 'www.youtu.be':
        $oEmbedUrl = 'http://www.youtube.com/oembed?url=' . urlencode($input) . '&format=json';
        break;
    case 'vimeo.com':
    case 'www.vimeo.com':
        $oEmbedUrl = 'http://vimeo.com/api/oembed.json?url=' . urlencode($input);
        break;
}
$output = '';

if ($oEmbedUrl) {
    $curl = curl_init($oEmbedUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    $output = curl_exec($curl);
    curl_close($curl);
    $json = json_decode($output, true);
    $output = urldecode($json[$field]);
}

return $output;