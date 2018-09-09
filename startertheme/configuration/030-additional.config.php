<?php
return [
    'additional' => [
        'modxminify' => [
            'class' => 'modxMinify',
            'classes' => [
                [
                    'class_key' => 'modxMinifyGroup',
                    'name_field' => 'name',
                    'records' => [
                        'css' => [

                        ],
                        'js' => [

                        ]
                    ]
                ],
                [
                    'class_key' => 'modxMinifyFile',
                    'name_field' => 'filename',
                    'records' => [
                        '/' . RELATIVE_PATH . 'assets/scss/style.scss' => [
                            'position' => 0,
                            'group' => 1,
                        ],
                        '/' . RELATIVE_PATH . 'assets/js/script.js' => [
                            'position' => 0,
                            'group' => 2,
                        ]
                    ]
                ]
            ]
        ]
    ]
];
