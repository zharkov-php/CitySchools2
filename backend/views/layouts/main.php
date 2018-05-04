<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if(Yii::$app->user->identity->nickname === Null){



    }else
        $menuItems = [
            ['label' => 'Админка', 'url' => ['/site/index']],

            ['label' => 'Статьи',
                'url' => ['/post/default/index'],
                'options'=>['class'=>'dropdown'],
                'template' => '<a href="{url}" class="url-class">{label}</a>',
                'items' => [
                    ['label' => 'Все статьи', 'url' => ['/post/post/index']],
                    ['label' => 'Создать статью', 'url' => ['/post/post/create']],

                ]
            ],

            ['label' => 'Автошколы',
                'url' => ['/avtoshkoly/avtoshkoly/index'],
                'options'=>['class'=>'dropdown'],
                'template' => '<a href="{url}" class="url-class">{label}</a>',
                'items' => [
                    ['label' => 'Все Автошколы', 'url' => ['/avtoshkoly/avtoshkoly/index']],
                    ['label' => 'Создать Автошколу', 'url' => ['/avtoshkoly/avtoshkoly/create']],

                ]
            ],

            ['label' => 'Инструкторы',
                'url' => ['/instructor/instructor/index'],
                'options'=>['class'=>'dropdown'],
                'template' => '<a href="{url}" class="url-class">{label}</a>',
                'items' => [
                    ['label' => 'Все Инструктора', 'url' => ['/instructor/instructor/index']],
                    ['label' => 'Создать Инструктора', 'url' => ['/instructor/instructor/create']],

                ]
            ],

            ['label' => 'Пользователи',
                'url' => ['/user/user/index'],
                'options'=>['class'=>'dropdown'],
                'template' => '<a href="{url}" class="url-class">{label}</a>',
                'items' => [
                    ['label' => 'Все Пользователи', 'url' => ['/user/user/index']],
                    ['label' => 'Создать Пользователя', 'url' => ['/user/user/create']],

                ]
            ],
        ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
