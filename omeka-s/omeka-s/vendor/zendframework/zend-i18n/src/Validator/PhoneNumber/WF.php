<?php
/**
 * @see       https://github.com/zendframework/zend-i18n for the canonical source repository
 * @copyright Copyright (c) 2005-2019 Zend Technologies USA Inc. (https://www.zend.com)
 * @license   https://github.com/zendframework/zend-i18n/blob/master/LICENSE.md New BSD License
 */

return [
    'code' => '681',
    'patterns' => [
        'national' => [
            'general' => '/^[5-7]\\d{5}$/',
            'fixed' => '/^(?:50|68|72)\\d{4}$/',
            'mobile' => '/^(?:50|68|72)\\d{4}$/',
            'emergency' => '/^1[578]$/',
        ],
        'possible' => [
            'general' => '/^\\d{6}$/',
            'emergency' => '/^\\d{2}$/',
        ],
    ],
];
