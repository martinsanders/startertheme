<?php
return [
    'template_variables' => [
        /**
         * Example;
         *
         * 'exampleTV' => [
         *     'type' => 'image',
         *     'caption' => '',
         *     'category' => 'MIGX',
         *     'templates' => ['01 - Homepage'],
         *     'media_sources' => [
         *         'web' => '@SELECT `value` FROM `{PREFIX}system_settings` WHERE `key` = "default_media_source"',
         *     ],
         * ],
         */
        'migxImage' => [
            'type' => 'image',
            'caption' => '',
            'category' => 'MIGX',
        ],
        'migxPublished' => [
            'type' => 'listbox',
            'caption' => '',
            'category' => 'MIGX',
            'elements' => 'Ja==1||Nee==0',
        ],
        'migxResourceList' => [
            'type' => 'listbox',
            'caption' => '',
            'category' => 'MIGX',
            'elements' => '@SELECT \'- Selecteer pagina -\' AS name, \'\' AS id UNION ALL SELECT CONCAT(`pagetitle`,\' (\',`id`, \')\') AS `name`,`id` FROM `[[+PREFIX]]site_content` WHERE `published` = 1 AND `deleted` = 0 AND `context_key` = \'[[+context_key]]\'',
        ],
        'imageCTA' => [
            'type' => 'image',
            'caption' => 'CTA Image',
            'category' => 'CTA',
        ],
        'textCTA' => [
            'type' => 'text',
            'caption' => 'CTA Text',
            'category' => 'CTA',
        ],
        'linkCTA' => [
            'type' => 'text',
            'caption' => 'CTA Link',
            'category' => 'CTA',
        ],
        'migxCTA' => [
            'type' => 'calltoactiontv',
            'caption' => '',
            'category' => 'MIGX',
            'elements' => '@SELECT CONCAT(`pagetitle`, \' (\', `id`, \')\') AS `name`,`id` FROM `[[+PREFIX]]site_content` WHERE `published` = 1 AND `deleted` = 0 AND `context_key` = \'[[+context_key]]\'',
            'input_properties' => [
                'types' => 'resource||external',
                'styles' => '',
            ],
        ],
    ]
];
