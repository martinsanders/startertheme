<?php
return [
    'templates' => [
        '01 - Homepage' => [
            'description' => '',
            'source' => 'Theme',
            'icon' => 'icon-home',
            'static' => 1,
            'static_file' => 'elements/templates/01-homepage.template.tpl',
        ],
        '02 - Overzichtspagina' => [
            'description' => '',
            'source' => 'Theme',
            'icon' => '',
            'static' => 1,
            'static_file' => 'elements/templates/02-overview.template.tpl',
            'properties' => [
                [
                    'name' => 'childTemplate',
                    'value' => 3,
                    'type' => 'textfield',
                ]
            ],
        ],
        '03 - Detailpagina' => [
            'description' => '',
            'source' => 'Theme',
            'icon' => '',
            'static' => 1,
            'static_file' => 'elements/templates/03-detail.template.tpl',
            'default' => true,
        ],
        '04a - Nieuwsoverzicht' => [
            'description' => '',
            'source' => 'Theme',
            'icon' => '',
            'static' => 1,
            'static_file' => 'elements/templates/04a-news-overview.template.tpl',
            'properties' => [
                [
                    'name' => 'childTemplate',
                    'value' => 5,
                    'type' => 'textfield',
                ]
            ],
        ],
        '04b - Nieuwsdetail' => [
            'description' => '',
            'source' => 'Theme',
            'icon' => '',
            'static' => 1,
            'static_file' => 'elements/templates/04b-news-detail.template.tpl',
        ],
        '05 - Contact' => [
            'description' => '',
            'source' => 'Theme',
            'icon' => 'icon-address-card-o',
            'static' => 1,
            'static_file' => 'elements/templates/05-contact.template.tpl',
        ],
    ]
];
