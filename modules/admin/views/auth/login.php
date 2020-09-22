<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="login-box">
    <div class="login-logo">
        <a href="<?= Yii::$app->homeUrl ?>" class="back_home">
            Store - App
        </a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin([])?>

        <?=
            $form->field($model, 'username', [
                    'template' => "
                <div class='form-group has-feedback'>
                    {input}
                    <span class='glyphicon glyphicon-user form-control-feedback'></span>
                    <div>{error}</div>
                </div>"
            ])->textInput(['placeholder' => 'Login'])
        ?>

        <?=
            $form->field($model, 'password', [
                'template' => "
                        <div class='form-group has-feedback'>
                            {input}
                            <span class='glyphicon glyphicon-lock form-control-feedback'></span>
                            <div>{error}</div>
                        </div>"
            ])->passwordInput(['placeholder' => 'Password'])
        ?>

        <div class="row">
            <div class="col-md-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="col-md-4">
                <?= Html::submitButton('Log In', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
            </div>
        </div>

        <?php ActiveForm::end()?>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->