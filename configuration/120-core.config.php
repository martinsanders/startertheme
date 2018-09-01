<?php
return [
    'client_config' => [
        'Algemeen' => [
            'sortorder' => 10,
            'description' => '',
            'fields' => [
                'company' => [
                    'label' => 'Bedrijfsnaam',
                    'description' => 'Vul de naam van het bedrijf in',
                    'xtype' => 'textfield',
                    'sortorder' => '110',
                ],
                'street' => [
                    'label' => 'Straat + nummer',
                    'description' => 'Vul het adres in van het bedrijf. Bijvoorbeeld: Kuipersweg 5',
                    'xtype' => 'textfield',
                    'sortorder' => '120',
                ],
                'zipcode' => [
                    'label' => 'Postcode',
                    'description' => 'Vul de postcode in van het bedrijf. Bijvoorbeeld: 9285 SN',
                    'xtype' => 'textfield',
                    'sortorder' => '130',
                ],
                'city' => [
                    'label' => 'Stad',
                    'description' => 'Vul de stad in van dit bedrijf',
                    'xtype' => 'textfield',
                    'sortorder' => '140',
                ],
                'email' => [
                    'label' => 'E-mailadres',
                    'description' => 'Vul het e-mailadres in. Deze wordt gebruikt voor de formulieren op de website',
                    'xtype' => 'textfield',
                    'sortorder' => '150',
                    'is_required' => 1,
                ],
                'phone' => [
                    'label' => 'Telefoonnummer',
                    'description' => 'Vul het telefoonnummer in',
                    'xtype' => 'textfield',
                    'sortorder' => '160',
                ],
                'kvk_number' => [
                    'label' => 'KvK-nummer',
                    'description' => 'Het Kamer van Koophandel-nummer van het bedrijf',
                    'xtype' => 'textfield',
                    'sortorder' => '170',
                ],
                'vat_number' => [
                    'label' => 'BTW-nummer',
                    'description' => 'Het BTW-nummer van het bedrijf',
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
                    'description' => 'Vul de link naar het Twitter-account in',
                    'xtype' => 'textfield',
                    'sortorder' => '210',
                ],
                'facebook' => [
                    'label' => 'Facebook Account',
                    'description' => 'Vul de link naar het Facebook-account in',
                    'xtype' => 'textfield',
                    'sortorder' => '220',
                ],
                'instagram' => [
                    'label' => 'Instagram Account',
                    'description' => 'Vul de link naar het Instagram-account in',
                    'xtype' => 'textfield',
                    'sortorder' => '230',
                ],
                'linkedin' => [
                    'label' => 'LinkedIN Account',
                    'description' => 'Vul de link naar het LinkedIN-account in',
                    'xtype' => 'textfield',
                    'sortorder' => '240',
                ],
                'youtube' => [
                    'label' => 'YouTube Account',
                    'description' => 'Vul de link naar het YouTube-account in',
                    'xtype' => 'textfield',
                    'sortorder' => '250',
                ],
                'pinterest' => [
                    'label' => 'Pinterest Account',
                    'description' => 'Vul de link naar het Pinterest-account in',
                    'xtype' => 'textfield',
                    'sortorder' => '260',
                ],
                'googleplus' => [
                    'label' => 'Google+ Account',
                    'description' => 'Vul de link naar het Google+-account in',
                    'xtype' => 'textfield',
                    'sortorder' => '270',
                ],
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
