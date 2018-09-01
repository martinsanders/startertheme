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
        ],
    ],
];
