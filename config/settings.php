<?php

return [
  'availableCountries' => [
    'name' => 'ilocation::availableCountries',
    'default' => [],
    'dynamicField' => [
      'type' => 'select',
      'props' => [
        'label' => 'ilocation::country.settings.availableCountries',
        'multiple' => true,
        'useChips' => true,
      ],
      'loadOptions' => [
        'apiRoute' => 'apiRoutes.qlocations.countries',
        'select' => ['label' => 'name', 'id' => 'iso2'],
        'filterByQuery' => true,
        'requestParams' => [
          'include' => 'translations',
          'filter' => [
            'indexAll' => true,
          ],
        ],
      ],
    ]
  ],
  'availableProvinces' => [
    'name' => 'ilocation::availableProvinces',
    'default' => [],
    'dynamicField' => [
      'type' => 'select',
      'props' => [
        'label' => 'ilocation::province.settings.availableProvinces',
        'multiple' => true,
        'clearable' => true,
      ],
      'loadOptions' => [
        'apiRoute' => 'apiRoutes.qlocations.provinces',
        'select' => ['label' => 'name', 'id' => 'iso2'],
        'filterByQuery' => true,
        'requestParams' => [
          'include' => 'translations',
          'filter' => [
            'indexAll' => true,
          ],
        ],
      ],
    ]
  ],
  'availableCities' => [
    'name' => 'ilocation::availableCities',
    'default' => [],
    'dynamicField' => [
      'type' => 'select',
      'props' => [
        'label' => 'ilocation::city.settings.availableCities',
        'multiple' => true,
        'clearable' => true,
      ],
      'loadOptions' => [
        'apiRoute' => 'apiRoutes.qlocations.cities',
        'select' => ['label' => 'name', 'id' => 'id'],
        'filterByQuery' => true,
        'requestParams' => [
          'include' => 'translations',
          'filter' => [
            'indexAll' => true,
          ],
        ],
      ],
    ]
  ],
];
