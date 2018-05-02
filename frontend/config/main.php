<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'ru',
    'components' => [
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'frontend\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
             //   ' ' => 'site/index',
              //  'kiev/avtoshkoly' => 'kiev/default/index',
              //  'avtoshkola/<name_url:\w+>' => 'kiev/avtoshkola/view',
                'profile/<nickname:\w+>' => 'user/profile/view',
                'post/<id:\d+>' => 'post/default/view',
            ],
        ],

    ],

    'modules' => [
        'user' => [
            'class' => 'frontend\modules\user\Module',
        ],
        'avtoshkoly' => [
            'class' => 'frontend\modules\avtoshkoly\Module',
        ],
        'post' => [
            'class' => 'frontend\modules\post\Module',
        ],
        'comment' => [
            'class' => 'frontend\modules\comment\Module',
        ],
        'instructors' => [
            'class' => 'frontend\modules\instructors\Module',
        ],
        'comment_instructor' => [
            'class' => 'frontend\modules\comment_instructor\Module',
        ],
    ],

    'params' => $params,
];