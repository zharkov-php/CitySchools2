<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
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

    <p>Пожалуйста, заполните поля:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label('Почта') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить меня')?>

                <div style="color:#999;margin:1em 0">
                    Вы можете поменять пароль <?= Html::a('сбросить', ['/user/default/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-5">
            <h3>Войти через FaceBook:</h3>
            <?= yii\authclient\widgets\AuthChoice::widget([
                'baseAuthUrl' => ['/user/default/auth'],
                'popupMode' => false,
            ]) ?>
        </div>
    </div>
</div>
