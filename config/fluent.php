<?php
    return [
        'components' => [
            'user' => [
                'identityClass' => 'yii\fluent\models\User',
                'enableAutoLogin' => true,
                'loginUrl' => ['fluent/user/login']
            ],

            'urlManager' => [
                'rules' => [
                    [
                        'class' => 'yii\fluent\components\PagesRule',
                    ]
                ],
            ],

            'i18n' => [
                'translations' => [
                    'fluent/*' => [
                        'sourceLanguage' => 'en-US',
                        'basePath' => '@fluent/messages',
                        'class' => 'yii\i18n\PhpMessageSource',
                        'fileMap' => [
                            'fluent/user' => 'user.php',
                            'fluent/models' => 'models.php'
                        ]
                    ]
                ]
            ]
        ],

        'modules' => [
            'admin' => [
                'class' => 'yii\fluent\modules\admin\Module'
            ]
        ]
    ];