<?php
/**
 * Example usage:
 * <img [[setImageSrc? &img=`[[*introImage]]` &src=`680x160` &srcset=`["768x180","1538x360","680x160","1360x320"]`]]
 *      sizes="(max-width: 767px) 768px, 680px"
 *      alt="Image alt"/>
 *
 * @var $src
 */
$zc         = isset($zc) ? $zc : 1;
$srcHTML    = '';
$srcsetHTML = '';

if (empty($img)) {
    return '';
}

if (!isset($src)) {
    $src = '';
}

if (!empty($srcset)) {
    $srcset = json_decode($srcset, true);

    if (is_array($srcset)) {
        foreach ($srcset as $srcsetSrc) {
            /* Get sizes of image. */
            list($w, $h) = explode('x', $srcsetSrc);

            $image = $modx->runSnippet(
                'pthumb',
                [
                    'input'   => $img,
                    'options' => 'w=' . $w . '&h=' . $h . '&zc=' . $zc
                ]
            );

            /* Add to srcset. */
            $srcsetHTML .= $image . ' ' . $w . 'w,';

            /* If src size is equal to srcset size, set src HTML. */
            if ($src === $srcsetSrc) {
                $srcHTML = $image;
            }
        }
    }
}

$srcsetHTML = rtrim($srcsetHTML, ',');

return 'src="' . $srcHTML . '" srcset="' . $srcsetHTML . '"';