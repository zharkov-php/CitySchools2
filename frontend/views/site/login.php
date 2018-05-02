<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-6">
        <img src="/image/600_100.png" class="img-thumbnail" alt="Cinque Terre"></a>
    </div>
    <div class="col-lg-6">
        <img src="/image/600_100.png" class="img-thumbnail" alt="Cinque Terre"></a>
    </div>

</div><br>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для входа:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

<<<<<<< HEAD:frontend/modules/user/views/default/login.php
                <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label('Почта') ?>
=======
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
>>>>>>> f99e64dcca9b244702be3eee052774400c374928:frontend/views/site/login.php

                <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить меня') ?>

                <div style="color:#999;margin:1em 0">
<<<<<<< HEAD:frontend/modules/user/views/default/login.php
                    Если вы забыли свой пароль, вы можете <?= Html::a('сбросить его', ['/user/default/request-password-reset']) ?>.
=======
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
>>>>>>> f99e64dcca9b244702be3eee052774400c374928:frontend/views/site/login.php
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-3">
            <h3>Войти через FaceBook:</h3>
            <?= yii\authclient\widgets\AuthChoice::widget([
                'baseAuthUrl' => ['site/auth'],
                'popupMode' => false,
            ]) ?>
        </div>
    </div>
</div>
