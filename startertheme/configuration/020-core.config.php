<?php
return [
    'categories' => [
        'Template variables' => [
            'parent' => '',
            'rank' => 0,
        ],
        'Header' => [
            'parent' => 'Template variables',
            'rank' => 0,
        ],
        'Site' => [
            'parent' => '',
            'rank' => 0,
        ],
        'Output filters' => [
            'parent' => 'Site',
            'rank' => 0,
        ],
        'HTML' => [
            'parent' => '',
            'rank' => 0,
        ],
        'General' => [
            'parent' => 'HTML',
            'rank' => 0,
        ],
        'Breadcrumbs' => [
            'parent' => 'HTML',
            'rank' => 1,
        ],
        'Forms' => [
            'parent' => 'HTML',
            'rank' => 2,
        ],
        'News' => [
            'parent' => 'HTML',
            'rank' => 3,
        ],
        'Overview' => [
            'parent' => 'HTML',
            'rank' => 4,
        ],
        'Search' => [
            'parent' => 'HTML',
            'rank' => 5,
        ],
        'Social Media' => [
            'parent' => 'HTML',
            'rank' => 6,
        ],
        'Tracking' => [
            'parent' => 'HTML',
            'rank' => 7,
        ],
    ],
    'content_types' => [
        'HTML' => [
            'file_extensions' => '',
        ]
    ],
    'contexts' => [
        'web' => [
            'name' => 'Website.nl',
            'description' => 'The website.nl context.',
        ]
    ],
    'menus' => [
        /**
         * 'migx' => [
         *     'permissions' => 'administrator',
         * ],
         */
    ],
    'media_sources' => [
        'Theme' => [
            'properties' => [
                'basePath' => [
                    'name' => 'basePath',
                    'desc' => 'prop_file.basePath_desc',
                    'type' => 'textfield',
                    'options' => [],
                    'value' => RELATIVE_PATH,
                    'lexicon' => 'core:source',
                ],
                'baseUrl' => [
                    'name' => 'baseUrl',
                    'desc' => 'prop_file.baseUrl_desc',
                    'type' => 'textfield',
                    'options' => [],
                    'value' => RELATIVE_PATH,
                    'lexicon' => 'core:source',
                ],
            ],
            'class_key' => 'sources.modFileMediaSource',
            'is_stream' => 1,
        ],
        'Uploads' => [
            'properties' => [
                'basePath' => [
                    'name' => 'basePath',
                    'desc' => 'prop_file.basePath_desc',
                    'type' => 'textfield',
                    'options' => [],
                    'value' => 'uploads/',
                    'lexicon' => 'core:source',
                ],
                'baseUrl' => [
                    'name' => 'baseUrl',
                    'desc' => 'prop_file.baseUrl_desc',
                    'type' => 'textfield',
                    'options' => [],
                    'value' => 'uploads/',
                    'lexicon' => 'core:source',
                ],
            ],
            'class_key' => 'sources.modFileMediaSource',
            'is_stream' => 1,
            'default' => true,
        ]
    ],
    'migx' => [
        /**
         * Place the MIGX JSON config files in the configuration folder.
         *
         * Example:
         * 'usps' => 'migx/usps.json',
         */
    ],
    'namespaces' => [
        THEME_NAME => [
            'path' => '{base_path}' . RELATIVE_PATH
        ]
    ],
    'access_policies' => [
        'Client' => [
            'name' => 'client.policy.xml',
            'type' => 'text/xml',
            'tmp_name' => CONFIGURATION_DIR . 'acl/client.policy.xml',
            'error' => 0,
            'size' => filesize(CONFIGURATION_DIR . 'acl/client.policy.xml'),
        ]
    ],
    'manager_customization' => [
        [
            'name' => 'Client',
            /* Example: 'usergroups' => [
                '@SELECT `id` AS `value` FROM `modx_membergroup_names` WHERE `name` = "Administrator"'
            ],*/
            'files' => [
                'resource/create' => [
                    'name' => 'set_create.xml',
                    'type' => 'text/xml',
                    'tmp_name' => CONFIGURATION_DIR . 'formcustomization/set_create.xml',
                    'error' => 0,
                    'size' => filesize(CONFIGURATION_DIR . 'formcustomization/set_create.xml'),
                ],
                'resource/update' => [
                    'name' => 'set_update.xml',
                    'type' => 'text/xml',
                    'tmp_name' => CONFIGURATION_DIR . 'formcustomization/set_update.xml',
                    'error' => 0,
                    'size' => filesize(CONFIGURATION_DIR . 'formcustomization/set_update.xml'),
                ],
            ],
            'active' => 1,
        ]
    ],
];
