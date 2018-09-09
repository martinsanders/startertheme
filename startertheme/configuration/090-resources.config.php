<?php
return [
    'resources' => [
        /**
         * Example:
         *
         * 'Child page' => [
         *     'template' => '03 - Detailpagina',
         *     'parent' => 'Contact',
         *     'exclude_fields_from_update' => ['longtitle', 'description', 'introtext', 'content'],
         * ],
         */
        'Contact' => [
            'template' => 6,
            'exclude_fields_from_update' => ['longtitle', 'description', 'introtext', 'content'],
            'published' => 1
        ],
        'About' => [
            'template' => 2,
            'exclude_fields_from_update' => ['longtitle', 'description', 'introtext', 'content'],
            'published' => 1
        ],
        'Classes' => [
            'template' => 3,
            'exclude_fields_from_update' => ['longtitle', 'description', 'introtext', 'content'],
            'published' => 1
        ],
        'Trainers' => [
            'template' => 3,
            'exclude_fields_from_update' => ['longtitle', 'description', 'introtext', 'content'],
            'published' => 1
        ],
        'Store' => [
            'template' => 2,
            'exclude_fields_from_update' => ['longtitle', 'description', 'introtext', 'content'],
            'published' => 1,
        ],
        'Join' => [
            'template' => 3,
            'exclude_fields_from_update' => ['longtitle', 'description', 'introtext', 'content'],
            'published' => 1
        ]
    ],
];
