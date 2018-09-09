<?php
return [
    'system_settings' => [
        'site_name' => [
            'value' => 'Starter Theme',
        ],
        'link_tag_scheme' => [
            'value' => 'abs',
        ],
    ],
    'context_settings' => [
        'web' => [
            /**
             * Example:
             *
             * 'page_id_contact' => [
             *     'value' => '@SELECT `id` AS `value` FROM `{PREFIX}site_content` WHERE `pagetitle` = "Contact"'
             * ],
             */
            'site_name' => [
                'value' => 'Starter Theme',
            ],
        ]
    ],
    /**
     * Example:
     *
     * 'user_group_settings' => [
     *     2 => [
     *         'manager_language' => ['value' => 'nl'],
     *         'manager_lang_attribute' => ['value' => 'nl']
     *     ]
     * ]
     */
    'user_group_settings' => [],
];
