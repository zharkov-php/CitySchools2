<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
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
    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    $menuItems = [
        ['label' => 'На главную', 'url' => ['/site/index']],
        ['label' => 'Статьи', 'url' => ['/post/default/index']],

        ['label' => 'Автошколы',
            'url' => ['/comment/default/index'],
            'options'=>['class'=>'dropdown'],
            'template' => '<a href="{url}" class="url-class">{label}</a>',
            'items' => [
                ['label' => 'Все автошколы Украины', 'url' => ['/avtoshkoly/default/index']],
                ['label' => 'Киев и Киевская область', 'url' => ['/avtoshkoly/kiev_avtoshkola/index']],

            ]
        ],
        ['label' => 'Инструктора',
            'url' => ['/instructors/kiev/index'],
            'options'=>['class'=>'dropdown'],
        'template' => '<a href="{url}" class="url-class">{label}</a>',
        'items' => [
            ['label' => 'Все инструктора Украины', 'url' => ['/instructors/default/index']],
            ['label' => 'Киев и Киевская область', 'url' => ['/instructors/kiev/index']],

]
		],
        ['label' => 'Отзывы',
            'url' => ['/comment/default/index'],
            'options'=>['class'=>'dropdown'],
            'template' => '<a href="{url}" class="url-class">{label}</a>',
            'items' => [
                ['label' => 'Все Отзывы об Автошколах', 'url' => ['/comment/default/index']],
                ['label' => 'Все Отзывы об Инструкторов', 'url' => ['/comment_instructor/default/index']],

            ]
        ],
        ['label' => 'О нас', 'url' => ['/site/about']],
        ['label' => 'Контакты', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {

        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/user/default/signup']];
        $menuItems[] = ['label' => 'Вход', 'url' => ['/user/default/login']];

} else {

      //  $menuItems[] = ['label' => 'My profile', 'url' => ['/user/profile/view', 'nickname' => Yii::$app->user->identity->getNickname()]];
      //  $menuItems[] = ['label' => 'Create post', 'url' => ['/post/default/create']];

        $menuItems[] = '<li>'
            . Html::beginForm(['/user/default/logout'], 'post')
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.12&appId=2083460755244270&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
