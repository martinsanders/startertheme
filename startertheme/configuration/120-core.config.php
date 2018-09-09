<?php
return [
    'client_config' => [
        'General' => [
            'sortorder' => 10,
            'description' => '',
            'fields' => [
                'company' => [
                    'label' => 'Company Name',
                    'description' => '',
                    'xtype' => 'textfield',
                    'sortorder' => '110',
                ],
                'street' => [
                    'label' => 'Street + number',
                    'description' => 'Enter the address of the company. For example: Kuipersweg 5',
                    'xtype' => 'textfield',
                    'sortorder' => '120',
                ],
                'zipcode' => [
                    'label' => 'Postcode',
                    'description' => 'Enter the postal code of the company. For example: 9285 SN',
                    'xtype' => 'textfield',
                    'sortorder' => '130',
                ],
                'city' => [
                    'label' => 'City',
                    'description' => 'Enter the city of this company',
                    'xtype' => 'textfield',
                    'sortorder' => '140',
                ],
                'email' => [
                    'label' => 'Email',
                    'description' => 'Enter the e-mail address. This is used for the forms on the website',
                    'xtype' => 'textfield',
                    'sortorder' => '150',
                    'is_required' => 1,
                ],
                'phone' => [
                    'label' => 'Phone number',
                    'description' => 'Enter the telephone number',
                    'xtype' => 'textfield',
                    'sortorder' => '160',
                ],
                'kvk_number' => [
                    'label' => 'Chamber of Commerce number',
                    'description' => 'The Chamber of Commerce number of the company',
                    'xtype' => 'textfield',
                    'sortorder' => '170',
                ],
                'vat_number' => [
                    'label' => 'BTW-nummer',
                    'description' => 'The VAT number of the company',
                    'xtype' => 'textfield',
                    'sortorder' => '180',
                ],
            ]
        ],
        'Social Media' => [
            'sortorder' => 20,
            'description' => '',
            'fields' => [
                'twitter' => [
                    'label' => 'Twitter Account',
                    'description' => 'Enter the link to the Twitter account',
                    'xtype' => 'textfield',
                    'sortorder' => '210',
                ],
                'facebook' => [
                    'label' => 'Facebook Account',
                    'description' => 'Enter the link to the Facebook account',
                    'xtype' => 'textfield',
                    'sortorder' => '220',
                ],
                'instagram' => [
                    'label' => 'Instagram Account',
                    'description' => 'Enter the link to the Instagram account',
                    'xtype' => 'textfield',
                    'sortorder' => '230',
                ],
                'linkedin' => [
                    'label' => 'LinkedIN Account',
                    'description' => 'Enter the link to the LinkedIN account',
                    'xtype' => 'textfield',
                    'sortorder' => '240',
                ],
                'youtube' => [
                    'label' => 'YouTube Account',
                    'description' => 'Enter the link to the YouTube account',
                    'xtype' => 'textfield',
                    'sortorder' => '250',
                ],
                'pinterest' => [
                    'label' => 'Pinterest Account',
                    'description' => 'Enter the link to the Pinterest account',
                    'xtype' => 'textfield',
                    'sortorder' => '260',
                ],
                'googleplus' => [
                    'label' => 'Google+ Account',
                    'description' => 'Enter the link to the Google+ account',
                    'xtype' => 'textfield',
                    'sortorder' => '270',
                ],
            ]
        ],
        'Default Images' => [
            'sortorder' => 30,
            'description' => '',
            'fields' => [
                'logo' => [
                    'label' => 'Website Logo',
                    'description' => '',
                    'xtype' => 'modx-panel-tv-image',
                    'value' => '',
                    'sortorder' => '110',
                ],
                'favicon' => [
                    'label' => 'Website Favicon',
                    'description' => '',
                    'xtype' => 'modx-panel-tv-image',
                    'value' => '',
                    'sortorder' => '120',
                ],
                'header-image' => [
                    'label' => 'Header Image',
                    'description' => '',
                    'xtype' => 'modx-panel-tv-image',
                    'value' => 'beach-cliffs-clouds-912472.jpg',
                    'sortorder' => '130',
                ]
            ]
        ]
    ],
    /*
     * Example:
     *
     * 'property_sets' => [
     *    'Test' => [
     *        'category' => 'Site',
     *        'description' => 'description',
     *        'properties' => [
     *            'Test' => [
     *                'name' => 'Test',
     *                'desc' => '',
     *                'type' => 'textfield',
     *                'value' => 'value',
     *                'lexicon' => null,
     *                'area' => '',
     *                'options' => [],
     *            ],
     *        ],
     *        'elements' => [
     *            [
     *                'element_class' => 'modSnippet',
     *                'element' => '@SELECT `id` as `value` FROM `modx_site_snippets` WHERE `name` = "getCache"',
     *            ]
     *        ]
     *    ]
     * ],
     */
];
