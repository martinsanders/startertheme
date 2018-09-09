<?php
return [
    'plugins' => [
        'ChildTemplate' => [
            'category' => 'Site',
            'source' => 'Theme',
            'static' => 1,
            'static_file' => 'elements/plugins/childtemplate.plugin.php',
            'events' => [
                'OnHandleRequest' => [],
            ],
        ],
    ]
];
