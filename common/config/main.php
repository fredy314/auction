<?php

return [
    'preload'        => ['settings'],
    'sourceLanguage' => 'en',
    'aliases'        => [
        'frontend' => dirname(__FILE__) . '/../..' . '/frontend',
        'common'   => dirname(__FILE__) . '/../..' . '/common',
        'backend'  => dirname(__FILE__) . '/../..' . '/backend',
        'console'  => dirname(__FILE__) . '/../..' . '/console',
        'vendor'   => dirname(__FILE__) . '/../..' . '/common/lib/vendor',
        'root'     => dirname(__FILE__) . '/../..',
    ],
    'import'         => [
        'common.extensions.components.*',
        'common.components.*',
        'common.components.console.LogTrait',
        'common.components.messageQueue.*',
        'common.components.messageQueue.interfaces.*',
        'common.helpers.*',
        'common.models.*',
        'application.controllers.*',
        'application.components.*',
        'application.extensions.*',
        'application.helpers.*',
        'application.models.*',
        'common.models.Layers.BaseAuction.*',
        'common.extensions.mail.YiiMailMessage',
        'common.extensions.consoleRunner.ConsoleRunner',
    ],
    'components'     => [
        'settings'          => [
            'class' => 'frontend.components.Settings',
        ],
        'image'             => [
            'class'  => 'common.extensions.image.CImageComponent',
            'driver' => 'GD',
            'params' => [
                'directory' => '/opt/local/bin',
            ],
        ],
        'imageHandler'      => [
            'class' => 'common.components.CImageHandler',
        ],
        'log'               => [
            'class'   => 'CLogRouter',
            'enabled' => true,
            'routes'  => [
                array(
                    'class'=>'CFileLogRoute',
                    // 'levels'=>'error, warning',
                ),
            ],
        ],
        'emailQueue'        => [
            'class'           => 'common.components.messageQueue.EmailQueue',
            'logCategory'     => 'message_queue.emails',
            'isFirstVersion'  => true,
            'isSecondVersion' => false,
        ],
        'billing'           => [
            'class'             => 'common.components.billing.Billing',
            'currencyRateCache' => 60 * 60 // Время кэширования в секундах для получения курса валюты.
        ],
        'accessManager'     => ['class' => 'common.components.AccessManager'],

    ],
    'params'         => [
        'php.defaultCharset'       => 'utf-8',
        'php.timezone'             => 'Europe/Moscow',

        // Минимальный шаг ставки в процентах.
        'minStepRatePercentage'    => 1,

    ],
];
